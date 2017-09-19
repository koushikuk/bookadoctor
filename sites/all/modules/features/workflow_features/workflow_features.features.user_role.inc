<?php
/**
 * @file
 * workflow_features.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function workflow_features_user_default_roles() {
  $roles = array();

  // Exported role: telosuser.
  $roles['telosuser'] = array(
    'name' => 'telosuser',
    'weight' => 3,
  );

  return $roles;
}
