<?php global $base_url; 
      global $user;

if(((empty($user->uid) || $user->uid==0)) && drupal_is_front_page()){
	
 drupal_goto('user/login');
}
else if(($user->uid) && drupal_is_front_page()){
	
	drupal_goto('adjudication-queue');
}

?>



     
