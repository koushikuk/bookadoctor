<?php
function axelia_get_img_path(){
	return base_path().drupal_get_path('theme', 'axelia').'/'; 
}

function axelia_theme($existing, $type, $theme, $path) {
  $items = array();
    
  $items['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'axelia') . '/templates',
    'template' => 'user-login',
    'preprocess functions' => array(
       'axelia_preprocess_user_login'
    ),
  );
   /*$items['user_register_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'axelia') . '/templates',
    'template' => 'user-register-form',
    'preprocess functions' => array(
      'axelia_preprocess_user_register_form'
    ),
  );*/

  return $items;
}
function axelia_preprocess_user_login(&$vars) {
  $vars['intro_text'] = t('This is my awesome login form');
}

 function axelia_preprocess_user_register_form(&$vars) {
  $vars['intro_text'] = t('This is my super awesome reg form');
}
/*
function atoz_preprocess_user_pass(&$vars) {
  $vars['intro_text'] = t('This is my super awesome request new password form');
}
 */
 
function axelia_form_alter(&$form, &$form_state, $form_id){
	/* global $user;
	if (!empty($form['edit_delete'])) {
        foreach(element_children($form['edit_delete']) as $key) {
			// Load and wrap the line item to have the title in the submit phase.
			if (!empty($form['edit_delete'][$key]['#line_item_id'])) {
				$form['edit_delete'][$key]['#value'] = t('');
				//$form['edit_delete'][$key]['#value'] = theme('image', array('path' => url('sites/all/themes/atoz/img/minusIcon.png', array('absolute' => TRUE))));
			}
        }
    }
	//p($form['actions']);
	//$form['actions']['submit']['#src']='sites/all/themes/atoz/img/minusIcon.png';
	//$form['actions']['submit']['#type']='image_button';
    //$form['actions']['submit']['#src']='sites/all/themes/atoz/img/minusIcon.png';
	$form['actions']['submit']['#attributes']['class'] = array('btn btn-danger btn-grey');
	$form['actions']['checkout']['#attributes']['class'] = array('btn btn-danger');
	switch($form_id){
		case 'commerce_checkout_form_checkout':
		{
			unset($form['cart_contents']['#title']);
			//p($form,false);
			//$form['commerce_coupon']['#prefix']='<div class="body-cont"><div class="row"><section class="col-sm-12 shipping-row">';
			//$form['commerce_coupon']['coupon_code']['#prefix']='<div class="shipping-box"><div class="ship-cont"><div class="form-group"><div class="col-sm-6">';
			//$form['commerce_coupon']['coupon_code']['#attributes'] = array('class' => array('form-control'));
			$form['commerce_coupon']['coupon_add']['#attributes'] = array('class' => array('commerce_coupon btn btn-info'));
			//$form['commerce_coupon']['coupon_add']['#suffix']='</div></div></div></div>';
			//$form['actions']['#suffix']='</section></div></div>'; 
			break; 
		}
 
   } */
}

/* this is custom function
* Call image path from theme folder
*/
 

 /**
 * Implements hook_preprocess_page().
 */
 
?>