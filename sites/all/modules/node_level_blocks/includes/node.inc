<?php

/**
 * Implements hook_node_level_blocks_enabled_page() for the node module.
 */
function node_node_level_blocks_enabled_page($node, $settings) {
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
 * Implements hook_node_level_blocks_current_node() for the node module.
 */
function node_node_level_blocks_current_node($node) {
  // Node revisions view.
  if (preg_match('#^node/\d+/revisions/\d+/view#', current_path())) {
    return node_load($node->nid, arg(3));
  }
}
