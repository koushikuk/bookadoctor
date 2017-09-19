<?php
/**
 * @file
 * workflow_features.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function workflow_features_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'applicaion_steps';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Application Steps';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Application Steps';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'title' => 'title',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'title' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Application Page */
  $handler->display->display_options['fields']['field_application_page']['id'] = 'field_application_page';
  $handler->display->display_options['fields']['field_application_page']['table'] = 'field_data_field_application_page';
  $handler->display->display_options['fields']['field_application_page']['field'] = 'field_application_page';
  $handler->display->display_options['fields']['field_application_page']['delta_offset'] = '0';
  $handler->display->display_options['fields']['field_application_page']['multi_type'] = 'ol';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Contextual filter: Content: Application Type (field_platform_type) */
  $handler->display->display_options['arguments']['field_platform_type_tid']['id'] = 'field_platform_type_tid';
  $handler->display->display_options['arguments']['field_platform_type_tid']['table'] = 'field_data_field_platform_type';
  $handler->display->display_options['arguments']['field_platform_type_tid']['field'] = 'field_platform_type_tid';
  $handler->display->display_options['arguments']['field_platform_type_tid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['field_platform_type_tid']['default_argument_type'] = 'taxonomy_tid';
  $handler->display->display_options['arguments']['field_platform_type_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_platform_type_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_platform_type_tid']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'platform_step' => 'platform_step',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'application-steps';
  $export['applicaion_steps'] = $view;

  $view = new view();
  $view->name = 'configre_error_message';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Configre_error_message';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Configre_error_message';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'role';
  $handler->display->display_options['access']['role'] = array(
    3 => '3',
    4 => '4',
  );
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'editableviews_table';
  /* Header: Global: PHP */
  $handler->display->display_options['header']['php']['id'] = 'php';
  $handler->display->display_options['header']['php']['table'] = 'views';
  $handler->display->display_options['header']['php']['field'] = 'php';
  $handler->display->display_options['header']['php']['empty'] = TRUE;
  $handler->display->display_options['header']['php']['php_output'] = '<?php
global $base_url;
?>
<a href = "<?php echo $base_url?>/node/add/telos-error-message">Add Message</a>';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = 'Message Code';
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Field: Content: Message Type (editable) */
  $handler->display->display_options['fields']['field_message_type_editable']['id'] = 'field_message_type_editable';
  $handler->display->display_options['fields']['field_message_type_editable']['table'] = 'field_data_field_message_type';
  $handler->display->display_options['fields']['field_message_type_editable']['field'] = 'field_message_type_editable';
  $handler->display->display_options['fields']['field_message_type_editable']['label'] = 'Message Type';
  $handler->display->display_options['fields']['field_message_type_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_message_type_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_message_type_editable']['suppress_description'] = 0;
  /* Field: Content: Message Text (editable) */
  $handler->display->display_options['fields']['field_message_test_editable']['id'] = 'field_message_test_editable';
  $handler->display->display_options['fields']['field_message_test_editable']['table'] = 'field_data_field_message_test';
  $handler->display->display_options['fields']['field_message_test_editable']['field'] = 'field_message_test_editable';
  $handler->display->display_options['fields']['field_message_test_editable']['label'] = 'Message Text';
  $handler->display->display_options['fields']['field_message_test_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_message_test_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_message_test_editable']['suppress_description'] = 0;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'telos_error_message' => 'telos_error_message',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'configre-error-message';
  $handler->display->display_options['menu']['type'] = 'normal';
  $handler->display->display_options['menu']['title'] = 'Configre Error Message';
  $handler->display->display_options['menu']['description'] = 'Configre Error Message';
  $handler->display->display_options['menu']['weight'] = '0';
  $handler->display->display_options['menu']['name'] = 'management';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $export['configre_error_message'] = $view;

  $view = new view();
  $view->name = 'manage_forward_backword_arrow';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Manage forward backword arrow';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Manage forward backword arrow';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'editableviews_table';
  /* Field: Content: Forward and Backword Arrow (editable) */
  $handler->display->display_options['fields']['field_forward_and_backword_arrow_editable']['id'] = 'field_forward_and_backword_arrow_editable';
  $handler->display->display_options['fields']['field_forward_and_backword_arrow_editable']['table'] = 'field_data_field_forward_and_backword_arrow';
  $handler->display->display_options['fields']['field_forward_and_backword_arrow_editable']['field'] = 'field_forward_and_backword_arrow_editable';
  $handler->display->display_options['fields']['field_forward_and_backword_arrow_editable']['label'] = '';
  $handler->display->display_options['fields']['field_forward_and_backword_arrow_editable']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_forward_and_backword_arrow_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_forward_and_backword_arrow_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_forward_and_backword_arrow_editable']['suppress_description'] = 0;
  /* Field: Content: Application Page (editable) */
  $handler->display->display_options['fields']['field_application_page_editable']['id'] = 'field_application_page_editable';
  $handler->display->display_options['fields']['field_application_page_editable']['table'] = 'field_data_field_application_page';
  $handler->display->display_options['fields']['field_application_page_editable']['field'] = 'field_application_page_editable';
  $handler->display->display_options['fields']['field_application_page_editable']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_application_page_editable']['delta_offset'] = '0';
  $handler->display->display_options['fields']['field_application_page_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_application_page_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_application_page_editable']['suppress_description'] = 0;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'forward_and_backword_arrow' => 'forward_and_backword_arrow',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'manage-forward-backword-arrow';
  $export['manage_forward_backword_arrow'] = $view;

  $view = new view();
  $view->name = 'manage_platform_steps';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'manage_platform_steps';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'manage_platform_steps';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'editableviews_table';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Field: Content: Application Type (editable) */
  $handler->display->display_options['fields']['field_platform_type_editable']['id'] = 'field_platform_type_editable';
  $handler->display->display_options['fields']['field_platform_type_editable']['table'] = 'field_data_field_platform_type';
  $handler->display->display_options['fields']['field_platform_type_editable']['field'] = 'field_platform_type_editable';
  $handler->display->display_options['fields']['field_platform_type_editable']['label'] = 'Platform Type';
  $handler->display->display_options['fields']['field_platform_type_editable']['type'] = 'services';
  $handler->display->display_options['fields']['field_platform_type_editable']['settings'] = array(
    'data_element_key' => '',
    'skip_safe' => 0,
    'skip_empty_values' => 0,
    'term_name' => 1,
  );
  $handler->display->display_options['fields']['field_platform_type_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_platform_type_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_platform_type_editable']['suppress_description'] = 0;
  /* Field: Broken/missing handler */
  $handler->display->display_options['fields']['field_step_editable']['id'] = 'field_step_editable';
  $handler->display->display_options['fields']['field_step_editable']['table'] = 'field_data_field_step';
  $handler->display->display_options['fields']['field_step_editable']['field'] = 'field_step_editable';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'platform_step' => 'platform_step',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['access'] = FALSE;
  $handler->display->display_options['access']['type'] = 'role';
  $handler->display->display_options['access']['role'] = array(
    3 => '3',
    4 => '4',
  );
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'editableviews_table';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = 'Platform Title';
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Field: Content: Application Type (editable) */
  $handler->display->display_options['fields']['field_platform_type_editable']['id'] = 'field_platform_type_editable';
  $handler->display->display_options['fields']['field_platform_type_editable']['table'] = 'field_data_field_platform_type';
  $handler->display->display_options['fields']['field_platform_type_editable']['field'] = 'field_platform_type_editable';
  $handler->display->display_options['fields']['field_platform_type_editable']['label'] = 'Platform Type';
  $handler->display->display_options['fields']['field_platform_type_editable']['type'] = 'services';
  $handler->display->display_options['fields']['field_platform_type_editable']['settings'] = array(
    'data_element_key' => '',
    'skip_safe' => 0,
    'skip_empty_values' => 0,
    'term_name' => 1,
  );
  $handler->display->display_options['fields']['field_platform_type_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_platform_type_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_platform_type_editable']['suppress_description'] = 0;
  /* Field: Content: Application Page (editable) */
  $handler->display->display_options['fields']['field_application_page_editable']['id'] = 'field_application_page_editable';
  $handler->display->display_options['fields']['field_application_page_editable']['table'] = 'field_data_field_application_page';
  $handler->display->display_options['fields']['field_application_page_editable']['field'] = 'field_application_page_editable';
  $handler->display->display_options['fields']['field_application_page_editable']['label'] = 'Application  Pages';
  $handler->display->display_options['fields']['field_application_page_editable']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_application_page_editable']['delta_offset'] = '0';
  $handler->display->display_options['fields']['field_application_page_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_application_page_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_application_page_editable']['suppress_description'] = 0;
  $handler->display->display_options['path'] = 'manage-steps';
  $handler->display->display_options['menu']['type'] = 'normal';
  $handler->display->display_options['menu']['title'] = 'Manage Steps';
  $handler->display->display_options['menu']['description'] = 'Manage Steps';
  $handler->display->display_options['menu']['weight'] = '0';
  $handler->display->display_options['menu']['name'] = 'management';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $export['manage_platform_steps'] = $view;

  $view = new view();
  $view->name = 'manage_program';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'manage program';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'manage program';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'editableviews_table';
  /* Header: Global: PHP */
  $handler->display->display_options['header']['php']['id'] = 'php';
  $handler->display->display_options['header']['php']['table'] = 'views';
  $handler->display->display_options['header']['php']['field'] = 'php';
  $handler->display->display_options['header']['php']['php_output'] = '<?php
global $base_url;
?>
<a href = "<?php echo $base_url?>/node/add/program-type">Add Program</a>
';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Program Name */
  $handler->display->display_options['fields']['field_program_name']['id'] = 'field_program_name';
  $handler->display->display_options['fields']['field_program_name']['table'] = 'field_data_field_program_name';
  $handler->display->display_options['fields']['field_program_name']['field'] = 'field_program_name';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'program_type' => 'program_type',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Program Name (editable) */
  $handler->display->display_options['fields']['field_program_name_editable']['id'] = 'field_program_name_editable';
  $handler->display->display_options['fields']['field_program_name_editable']['table'] = 'field_data_field_program_name';
  $handler->display->display_options['fields']['field_program_name_editable']['field'] = 'field_program_name_editable';
  $handler->display->display_options['fields']['field_program_name_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_program_name_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_program_name_editable']['suppress_description'] = 0;
  /* Field: Content: Program Price (editable) */
  $handler->display->display_options['fields']['field_program_price_editable']['id'] = 'field_program_price_editable';
  $handler->display->display_options['fields']['field_program_price_editable']['table'] = 'field_data_field_program_price';
  $handler->display->display_options['fields']['field_program_price_editable']['field'] = 'field_program_price_editable';
  $handler->display->display_options['fields']['field_program_price_editable']['settings'] = array(
    'thousand_separator' => '',
    'decimal_separator' => '.',
    'scale' => '2',
    'prefix_suffix' => 1,
  );
  $handler->display->display_options['fields']['field_program_price_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_program_price_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_program_price_editable']['suppress_description'] = 0;
  /* Field: Content: Program Image (editable) */
  $handler->display->display_options['fields']['field_program_image_editable']['id'] = 'field_program_image_editable';
  $handler->display->display_options['fields']['field_program_image_editable']['table'] = 'field_data_field_program_image';
  $handler->display->display_options['fields']['field_program_image_editable']['field'] = 'field_program_image_editable';
  $handler->display->display_options['fields']['field_program_image_editable']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_program_image_editable']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['field_program_image_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_program_image_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_program_image_editable']['suppress_description'] = 0;
  /* Field: Content: Program Enable (editable) */
  $handler->display->display_options['fields']['field_program_enable_editable']['id'] = 'field_program_enable_editable';
  $handler->display->display_options['fields']['field_program_enable_editable']['table'] = 'field_data_field_program_enable';
  $handler->display->display_options['fields']['field_program_enable_editable']['field'] = 'field_program_enable_editable';
  $handler->display->display_options['fields']['field_program_enable_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_program_enable_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_program_enable_editable']['suppress_description'] = 0;
  $handler->display->display_options['path'] = 'manage-program';
  $export['manage_program'] = $view;

  $view = new view();
  $view->name = 'multistep_form_configuration';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Multistep Form Configuration';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Multistep Form Configuration';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'editableviews_table';
  /* Field: Content: Application Screen */
  $handler->display->display_options['fields']['field_application_screen']['id'] = 'field_application_screen';
  $handler->display->display_options['fields']['field_application_screen']['table'] = 'field_data_field_application_screen';
  $handler->display->display_options['fields']['field_application_screen']['field'] = 'field_application_screen';
  $handler->display->display_options['fields']['field_application_screen']['type'] = 'taxonomy_term_reference_plain';
  /* Field: Content: Form Fields (editable) */
  $handler->display->display_options['fields']['field_form_fields_editable']['id'] = 'field_form_fields_editable';
  $handler->display->display_options['fields']['field_form_fields_editable']['table'] = 'field_data_field_form_fields';
  $handler->display->display_options['fields']['field_form_fields_editable']['field'] = 'field_form_fields_editable';
  $handler->display->display_options['fields']['field_form_fields_editable']['type'] = 'field_collection_fields';
  $handler->display->display_options['fields']['field_form_fields_editable']['settings'] = array(
    'view_mode' => 'full',
  );
  $handler->display->display_options['fields']['field_form_fields_editable']['delta_offset'] = '0';
  $handler->display->display_options['fields']['field_form_fields_editable']['widget_type'] = '0';
  $handler->display->display_options['fields']['field_form_fields_editable']['suppress_label'] = 0;
  $handler->display->display_options['fields']['field_form_fields_editable']['suppress_description'] = 0;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'application_step_field_config' => 'application_step_field_config',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'configure-multistep-form';
  $handler->display->display_options['menu']['type'] = 'normal';
  $handler->display->display_options['menu']['title'] = 'Manage Field Level Configuartion';
  $handler->display->display_options['menu']['description'] = 'Manage Field Level Configuartion';
  $handler->display->display_options['menu']['weight'] = '0';
  $handler->display->display_options['menu']['name'] = 'management';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $export['multistep_form_configuration'] = $view;

  return $export;
}
