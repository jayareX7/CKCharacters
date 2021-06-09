<?php

/**
 * @file
 * API documentation for Node level blocks module.
 */

/**
 * Allow modules to override the blocks list.
 * @param type $blocks the list of blocks.
 * @param type $context contains the node on which the node level blocks are shown.
 */
function hook_node_level_blocks_alter(&$blocks, $context) {
  if ($context['node']->type == 'page') {
    foreach ($blocks as &$block) {
      if ($block['delta'] == 'block_delta') {
        $block['nlb_force_region'] = TRUE;
      }
      unset($block);
    }
  }
}

/**
 * Allow modules to override the regions list.
 * @param type $regions the list of regions.
 * @param type $context contains the node on which the node level blocks are shown.
 */
function hook_node_level_blocks_regions_alter(&$regions, $context) {
}

/**
 * Allow other modules to enable NLB on a particular node page.
 *
 * @param type $node the node of this page
 * @param type $settings the NLB settings of this node (or the defaults).
 * @return boolean
 */
function hook_node_level_blocks_enabled_page($node, $settings) {
  // Display on node edit.
  if ($settings->display_node_edit && preg_match('#^node/\d+/edit#', current_path())) {
    return TRUE;
  }

  // Node view.
  if (preg_match('#^node/\d+$#', current_path())) {
    return TRUE;
  }

  // Node revisions view.
  if (preg_match('#^node/\d+/revisions/\d+/view#', current_path())) {
    return TRUE;
  }
}

/**
 * Allow other modules to override the node object that contains the Node-level
 * blocks. For example to show another revision.
 *
 * A page callback SHOULD only end up with one node that is returned by a call
 * to node_level_blocks_current_node. Always the last item in the results array
 * is used.
 *
 * @param type $node the node of this page
 * return $node
 */
function hook_node_level_blocks_current_node($node) {
  // Node revisions view.
  if (preg_match('#^node/\d+/revisions/\d+/view#', current_path())) {
    return node_load($node->nid, arg(3));
  }
}
