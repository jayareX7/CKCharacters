<?php

/**
 * @file
 * Admin page callbacks for the path level blocks module.
 *
 * @name Node-level Blocks Admin
 * @author skilip
 */

/**
 * Extra form elements for the node type form.
 */
function node_level_blocks_node_type_form(&$form, &$form_state) {
  $settings = node_level_blocks_node_type_settings($form['#node_type']->type);

  $module_options = array();
  foreach (module_implements('block_info') as $module) {
    $module_options[$module] = $module;
  }

  $form['node_level_blocks'] = array(
    '#type' => 'fieldset',
    '#title' => t('Node-level Blocks'),
    '#collapsible' => TRUE,
    '#group' => 'additional_settings',
    '#collapsed' => !($settings->enabled),
    '#access' => user_access('administer node_level_blocks'),
    '#tree' => TRUE,
  );
  $form['node_level_blocks']['node_level_blocks_enabled'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Node-level Blocks functionality'),
    '#description' => '',
    '#default_value' => $settings->enabled,
  );
  $form['node_level_blocks']['settings'] = array(
    '#type' => 'container',
    '#states' => array(
      'visible' => array(
        'input[name=node_level_blocks_enabled]' => array('checked' => TRUE),
      ),
    ),
  );
  $form['node_level_blocks']['settings']['node_level_blocks_display_node_edit'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display blocks on node-edit pages'),
    '#default_value' => $settings->display_node_edit,
  );

  if (module_exists('nodeblock') && nodeblock_type_enabled($form['#node_type']->type)) {
    $form['node_level_blocks']['settings']['node_level_blocks_nodeblock'] = array(
      '#type' => 'checkbox',
      '#title' => t('Node Block integration'),
      '#description' => t('When a Node Block is used in the Node Level Blocks configuration, check the Node Blocks for Node Level Blocks as well.'),
      '#default_value' => isset($settings->nodeblock) ? $settings->nodeblock : FALSE,
    );
  }
  $form['node_level_blocks']['settings']['node_level_blocks_multi'] = array(
    '#type' => 'checkbox',
    '#title' => t('Allow duplication of blocks on node pages'),
    '#default_value' => $settings->multi,
  );
  $form['node_level_blocks']['settings']['node_level_blocks_regions'] = array(
    '#type' => 'select',
    '#title' => t('Enabled regions'),
    '#description' => t('Choose which regions are available for the current content type'),
    '#options' => system_region_list(variable_get('theme_default', 'garland')),
    '#multiple' => TRUE,
    '#default_value' => $settings->regions,
    '#size' => 10,
  );
  $form['node_level_blocks']['settings']['node_level_blocks_modules'] = array(
    '#type' => 'select',
    '#title' => t('Modules'),
    '#description' => t('Here you can choose which modules to use for providing block contents.'),
    '#options' => $module_options,
    '#multiple' => TRUE,
    '#default_value' => ($settings->modules ? $settings->modules : $module_options),
    '#size' => 10,
  );

  array_unshift($form['#submit'], 'node_level_blocks_node_type_form_submit');
  $form['#attached']['js'][] = drupal_get_path('module', 'node_level_blocks') . '/js/node_level_blocks.js';
}

/**
 * Custom submit callback for the node type form.
 */
function node_level_blocks_node_type_form_submit($form, &$form_state) {
  $settings = (object) array(
    'enabled' => $form_state['values']['node_level_blocks']['node_level_blocks_enabled'],
    'display_node_edit' => $form_state['values']['node_level_blocks']['settings']['node_level_blocks_display_node_edit'],
    'multi' => $form_state['values']['node_level_blocks']['settings']['node_level_blocks_multi'],
    'regions' => $form_state['values']['node_level_blocks']['settings']['node_level_blocks_regions'],
    'modules' => $form_state['values']['node_level_blocks']['settings']['node_level_blocks_modules'],
  );

  if (isset($form_state['values']['node_level_blocks']['settings']['node_level_blocks_nodeblock'])) {
    $settings->nodeblock = $form_state['values']['node_level_blocks']['settings']['node_level_blocks_nodeblock'];
  }

  variable_set('node_level_blocks_enabled_' . $form_state['values']['type'], $settings);
  // Unset to make sure no variables are made.
  unset($form_state['values']['node_level_blocks']);
}

/**
 * Extra form elements for the node form.
 */
function node_level_blocks_node_form(&$form, &$form_state) {
  $node = $form['#node'];

  $language = $node->language;
  $new_translation = FALSE;
  if (module_exists('entity_translation')) {
    // Get the language of the form (not of the existing node).
    if ($handler = entity_translation_entity_form_get_handler($form, $form_state)) {
      if (!$handler->isNewEntity()) {
        $language = $handler->getFormLanguage();
      }
    }
    $new_translation = !isset($node->translations->data[$language]);
  }

  $submitted = $form_state['submitted'] && isset($form_state['values']['node_level_blocks']);

  // Take node blocks from this language.
  $node_blocks = (!$submitted && isset($node->node_level_blocks['blocks'][$language])) ? $node->node_level_blocks['blocks'][$language] : array();

  // Take node blocks from existing language.
  if ($new_translation && isset($node->node_level_blocks['blocks'][$node->language])) {
    $node_blocks = $node->node_level_blocks['blocks'][$node->language];
  }

  // If a node is submitted with the 'preview' button,
  // the data can be collected using the form state.
  // Otherwise the stored nodes, or default values can be used.
  if ($submitted) {
    foreach ($form_state['values']['node_level_blocks']['blocks'][$language] as $node_block) {
      $node_blocks[$node_block['moddelta']] = (object) $node_block;
    }
  }
  $context = array('node' => $node, 'language' => $language);

  // Set default settings.
  $settings = isset($node->node_level_blocks['settings']) ? $node->node_level_blocks['settings'] : node_level_blocks_node_type_settings($node->type);
  
  $form['node_level_blocks'] = array(
    '#type' => 'fieldset',
    '#title' => t('Blocks'),
    '#collapsible' => TRUE,
    '#tree' => TRUE,
    '#group' => 'additional_settings',
    '#collapsed' => !($settings->enabled),
    '#access' => ($settings->enabled && user_access('edit node_level_blocks')),
    '#multilingual' => TRUE,
  );

  $form['node_level_blocks']['settings'] = array(
    '#type' => 'value',
    '#value' => $settings,
  );
  node_level_blocks_block_overview($form['node_level_blocks'], $node_blocks, $settings, $context);
}

/**
 * Helper function to return the blocks overview.
 */
function node_level_blocks_block_overview(&$form, $node_blocks, $settings, $context) {
  $language = $context['language'];

  // set default theme for retrieving regions and blocks
  $theme_key = variable_get('theme_default', 'garland');

  // Fetch and sort blocks
  $blocks = _block_rehash($theme_key);

  // Loop through the blocks array to do some last cleanup stuff.
  foreach ($blocks as $i => $block) {
    $moddelta = $block['module'] . ':' . $block['delta'];

    // If the blocks for the current block's module has been disabled, unset it.
    if (is_array($settings->modules) && !in_array($block['module'], $settings->modules)) {
      unset($blocks[$i]);
    }
    // If the block has been selected and region is not disabled.
    elseif (isset($node_blocks[$moddelta]) && in_array($node_blocks[$moddelta]->region, $settings->regions)) {
      // Overwrite the block weights here to make sure the list is ordered correctly.
      $blocks[$i]['weight'] = $node_blocks[$moddelta]->weight;
    }
    else {
      // The block isn't assigned to a snippet region.
      // Set the weight parameter to a fixed value in order to force sorting by info.
      $blocks[$i]['weight'] = -10;
    }
  }

  usort($blocks, '_node_level_blocks_compare');

  // Allow modules to override the blocks.
  drupal_alter('node_level_blocks', $blocks, $context);

  $system_regions = system_region_list($theme_key);
  $block_regions = array(BLOCK_REGION_NONE => '<' . t('none') . '>');

  // Remove unused regions for this node type.
  foreach ($settings->regions as $key) {
    if (isset($system_regions[$key])) {
      $block_regions[$key] = $system_regions[$key];
    }
  }

  // Allow modules to override the visible regions.
  drupal_alter('node_level_blocks_regions', $block_regions, $context);

  // Weights range from -delta to +delta, so delta should be at least half
  // of the amount of blocks present. This makes sure all blocks in the same
  // region get an unique weight.
  $weight_delta = round(count($blocks) / 2);

  $form['blocks'][$language] = array(
    '#theme' => 'node_level_blocks_fieldset',
    '#settings' => $settings,
    '#attached' => array(
      'css' => array(
        drupal_get_path('module', 'block') . '/block.css',
      ),
      'js' => array(
        'misc/tableheader.js',
        drupal_get_path('module', 'block') . '/block.js',
        drupal_get_path('module', 'node_level_blocks') . '/js/node_level_blocks.js',
      ),
    ),
  );

  foreach ($block_regions as $region => $title) {
    drupal_add_tabledrag('blocks', 'match', 'sibling', 'block-region-select', 'block-region-' . $region, NULL, FALSE);
    drupal_add_tabledrag('blocks', 'order', 'sibling', 'block-weight', 'block-weight-' . $region);
  }

  foreach ($blocks as $i => $block) {
    $key = $block['module'] . '_' . $block['delta'];
    $moddelta = $block['module'] . ':' . $block['delta'];

    $form['blocks'][$language][$key]['module'] = array(
      '#type' => 'value',
      '#value' => $block['module'],
    );
    $form['blocks'][$language][$key]['moddelta'] = array(
      '#type' => 'value',
      '#value' => $moddelta,
    );
    $form['blocks'][$language][$key]['delta'] = array(
      '#type' => 'value',
      '#value' => $block['delta'],
    );
    $form['blocks'][$language][$key]['info'] = array(
      '#markup' => check_plain($block['info']),
    );
    $form['blocks'][$language][$key]['theme'] = array(
      '#type' => 'hidden',
      '#value' => $theme_key,
    );
    $form['blocks'][$language][$key]['weight'] = array(
      '#type' => 'weight',
      '#default_value' => $block['weight'],
      '#delta' => $weight_delta,
    );
    $form['blocks'][$language][$key]['region'] = array(
      '#type' => 'select',
      '#default_value' => (isset($node_blocks[$moddelta]) ? $node_blocks[$moddelta]->region : BLOCK_REGION_NONE),
      '#options' => $block_regions,
    );

    if (!empty($block['nlb_force_region'])) {
      if (!user_access('edit all node_level_blocks')) {
        $region = is_string($block['nlb_force_region']) && isset($block_regions[$block['nlb_force_region']]) ?
            $block['nlb_force_region'] :
            $form['blocks'][$language][$key]['region']['#default_value'];

        // Force this region here.
        $form['blocks'][$language][$key]['region']['#options'] = array_intersect_key($block_regions, array($region => 1));
        $form['blocks'][$language][$key]['region']['#value'] = $form['blocks'][$key]['region']['#default_value'] = $region;

        // Hide the dropdown and add explanation.
        $form['blocks'][$language][$key]['region']['#attributes']['style'] = 'display: none';
        $form['blocks'][$language][$key]['region']['#suffix'] = t('Fixed in region %region', array('%region' => $block_regions[$region]));
      }
    }
  }
}
