<?php

/**
 * Implements hook_node_level_blocks_enabled_page() for the workbench_moderation module.
 */
function workbench_moderation_node_level_blocks_enabled_page($node, $settings) {
  // Node draft view.
  if (preg_match('#^node/\d+/draft$#', current_path())) {
    return TRUE;
  }
}

/**
 * Implements hook_node_level_blocks_current_node() for the workbench_moderation module.
 */
function workbench_moderation_node_level_blocks_current_node($node) {
  // Node draft view.
  if (preg_match('#^node/\d+/draft$#', current_path())) {
    return workbench_moderation_node_current_load($node);
  }
}
