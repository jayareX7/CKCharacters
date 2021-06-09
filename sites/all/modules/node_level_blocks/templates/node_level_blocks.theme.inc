<?php

/**
 * Preprocess variables for node_level_blocks-fieldset.tpl.php.
 *
 * The $variables array contains the following arguments:
 * - $form
 *
 * @see block-admin-display.tpl.php
 * @see theme_block_admin_display()
 */
function template_preprocess_node_level_blocks_fieldset(&$variables) {
  // set default theme for retrieving regions and blocks
  $theme_key = variable_get('theme_default', 'garland');

  $settings = $variables['form']['#settings'];

  $block_regions = system_region_list($theme_key);

  $variables['block_regions'] = $block_regions + array(BLOCK_REGION_NONE => t('Disabled'));

  foreach (array_keys($block_regions) as $key) {
    // Initialize an empty array for the region.
    if (in_array($key, $settings->regions)) {
      $variables['block_listing'][$key] = array();
    }
    else {
      unset($variables['block_regions'][$key]);
    }
  }

  // Initialize disabled blocks array.
  $variables['block_listing'][BLOCK_REGION_NONE] = array();

  foreach (element_children($variables['form']) as $i) {
    $block = &$variables['form'][$i];

    // Only take form elements that are blocks.
    if (isset($block['info'])) {
      // Fetch region for current block.
      $region = $block['region']['#default_value'];

      // Set special classes needed for table drag and drop.
      $variables['form'][$i]['region']['#attributes']['class'] = array('block-region-select block-region-' . $region);
      $variables['form'][$i]['weight']['#attributes']['class'] = array('block-weight block-weight-' . $region);

      $variables['block_listing'][$region][$i] = new stdClass();
      $variables['block_listing'][$region][$i]->row_class = !empty($block['#attributes']['class']) ? implode(' ', $block['#attributes']['class']) : '';
      $variables['block_listing'][$region][$i]->block_modified = !empty($block['#attributes']['class']) && in_array('block-modified', $block['#attributes']['class']);
      $variables['block_listing'][$region][$i]->block_title = drupal_render($block['info']);
      $variables['block_listing'][$region][$i]->region_select = drupal_render($block['region']) . drupal_render($block['theme']);
      $variables['block_listing'][$region][$i]->weight_select = drupal_render($block['weight']);
      $variables['block_listing'][$region][$i]->printed = FALSE;
    }
  }
}
