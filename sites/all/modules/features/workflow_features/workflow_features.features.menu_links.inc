<?php
/**
 * @file
 * workflow_features.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function workflow_features_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: management_configre-error-message:configre-error-message
  $menu_links['management_configre-error-message:configre-error-message'] = array(
    'menu_name' => 'management',
    'link_path' => 'configre-error-message',
    'router_path' => 'configre-error-message',
    'link_title' => 'Configre Error Message',
    'options' => array(
      'attributes' => array(
        'title' => 'Configre Error Message',
      ),
      'alter' => TRUE,
      'identifier' => 'management_configre-error-message:configre-error-message',
    ),
    'module' => 'system',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -48,
    'customized' => 1,
    'parent_identifier' => 'management_configuration-settings:<front>',
  );
  // Exported menu link: management_configuration-settings:<front>
  $menu_links['management_configuration-settings:<front>'] = array(
    'menu_name' => 'management',
    'link_path' => '<front>',
    'router_path' => '',
    'link_title' => 'Configuration Settings',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'alter' => TRUE,
      'menu_icon' => array(
        'enable' => 0,
        'path' => 'sites/all/modules/contrib/menu_icons/images/default_icon.png',
        'image_style' => 'menu_icon',
      ),
      'identifier' => 'management_configuration-settings:<front>',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 1,
    'has_children' => 1,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 1,
  );
  // Exported menu link: management_manage-base-url:telos_url
  $menu_links['management_manage-base-url:telos_url'] = array(
    'menu_name' => 'management',
    'link_path' => 'telos_url',
    'router_path' => 'telos_url',
    'link_title' => 'Manage Base Url',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'alter' => TRUE,
      'menu_icon' => array(
        'enable' => 0,
        'path' => 'sites/all/modules/contrib/menu_icons/images/default_icon.png',
        'image_style' => 'menu_icon',
      ),
      'identifier' => 'management_manage-base-url:telos_url',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -47,
    'customized' => 1,
    'parent_identifier' => 'management_configuration-settings:<front>',
  );
  // Exported menu link: management_manage-field-level-configuartion:configure-multistep-form
  $menu_links['management_manage-field-level-configuartion:configure-multistep-form'] = array(
    'menu_name' => 'management',
    'link_path' => 'configure-multistep-form',
    'router_path' => 'configure-multistep-form',
    'link_title' => 'Manage Field Level Configuartion',
    'options' => array(
      'attributes' => array(
        'title' => 'Manage Field Level Configuartion',
      ),
      'alter' => TRUE,
      'menu_icon' => array(
        'enable' => 0,
        'path' => 'sites/all/modules/contrib/menu_icons/images/default_icon.png',
        'image_style' => 'menu_icon',
      ),
      'identifier' => 'management_manage-field-level-configuartion:configure-multistep-form',
    ),
    'module' => 'system',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -49,
    'customized' => 1,
    'parent_identifier' => 'management_configuration-settings:<front>',
  );
  // Exported menu link: management_manage-other-parameters:telos_config
  $menu_links['management_manage-other-parameters:telos_config'] = array(
    'menu_name' => 'management',
    'link_path' => 'telos_config',
    'router_path' => 'telos_config',
    'link_title' => 'Manage Other Parameters',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'alter' => TRUE,
      'menu_icon' => array(
        'enable' => 0,
        'path' => 'sites/all/modules/contrib/menu_icons/images/default_icon.png',
        'image_style' => 'menu_icon',
      ),
      'identifier' => 'management_manage-other-parameters:telos_config',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 1,
    'parent_identifier' => 'management_configuration-settings:<front>',
  );
  // Exported menu link: management_manage-program:manage-program
  $menu_links['management_manage-program:manage-program'] = array(
    'menu_name' => 'management',
    'link_path' => 'manage-program',
    'router_path' => 'manage-program',
    'link_title' => 'Manage Program',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'alter' => TRUE,
      'menu_icon' => array(
        'enable' => 0,
        'path' => 'sites/all/modules/contrib/menu_icons/images/default_icon.png',
        'image_style' => 'menu_icon',
      ),
      'identifier' => 'management_manage-program:manage-program',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 1,
    'parent_identifier' => 'management_configuration-settings:<front>',
  );
  // Exported menu link: management_manage-steps:manage-steps
  $menu_links['management_manage-steps:manage-steps'] = array(
    'menu_name' => 'management',
    'link_path' => 'manage-steps',
    'router_path' => 'manage-steps',
    'link_title' => 'Manage Steps',
    'options' => array(
      'attributes' => array(
        'title' => 'Manage Steps',
      ),
      'alter' => TRUE,
      'identifier' => 'management_manage-steps:manage-steps',
    ),
    'module' => 'system',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -50,
    'customized' => 1,
    'parent_identifier' => 'management_configuration-settings:<front>',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Configre Error Message');
  t('Configuration Settings');
  t('Manage Base Url');
  t('Manage Field Level Configuartion');
  t('Manage Other Parameters');
  t('Manage Program');
  t('Manage Steps');


  return $menu_links;
}
