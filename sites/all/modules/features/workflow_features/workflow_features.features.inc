<?php
/**
 * @file
 * workflow_features.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function workflow_features_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "services" && $api == "services") {
    return array("version" => "3");
  }
}

/**
 * Implements hook_views_api().
 */
function workflow_features_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function workflow_features_node_info() {
  $items = array(
    'application_step_field_config' => array(
      'name' => t('Application Step field Configuration'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'forward_and_backword_arrow' => array(
      'name' => t('Forward and Backword Arrow'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'platform_step' => array(
      'name' => t('Application Step'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'program_type' => array(
      'name' => t('Program Type'),
      'base' => 'node_content',
      'description' => t('This content type deals with different types of programs APIs'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'telos_error_message' => array(
      'name' => t('Telos Error Message'),
      'base' => 'node_content',
      'description' => t('Telos Error Message '),
      'has_title' => '1',
      'title_label' => t('Message Code'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
