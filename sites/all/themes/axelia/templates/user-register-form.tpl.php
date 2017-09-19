<?php
global $base_url;
?> 
 <!--body cont start here-->
        <div class="body-cont">
            <div class="row">
            	<section class="col-sm-12 product-row login-row">
                    


<form action="<?php echo $base_url;?>/user/register" method="post" id="user-register-form" accept-charset="UTF-8">						
                    <!--login box start here-->
                    <div class="col-sm-8 login-box register-box">
                    	<div class="col-sm-6">
                        	<h3>Create An account</h3>
                            <div class="form-horizontal">
                            	 <div class="form-group">
                                 Please enter your email address to create an account.
                                </div>
                            	<div class="form-group">
                                	<label>Email address</label>
                                    <div><input type="text" class="form-control" id="edit-mail" name="mail" placeholder="-Enter Emial-"></div>
                                </div>
                                <div class="form-group">
                                	<label>Password</label>
                                    <div><input type="password" class="form-control" id="edit-pass-pass1" name="pass[pass1]" placeholder="*********"></div>
                                </div>
								 <div class="form-group">
                                	<label>Confirm Password</label>
                                    <div><input type="password" class="form-control" id="edit-pass-pass2" name="pass[pass2]" placeholder="*********"></div>
                                </div>
								<?php print drupal_render($form['form_build_id']);
									print drupal_render($form['form_id']);?>
							 <?php //print drupal_render_children($form); ?>
                                <div class="form-group login-btn">
                                	 <div class="site-btn">
                                	<i class="fa fa-user btn-icon"></i>
									<input type="submit"  id="edit-submit" name="op" class="btn btn-danger btn-orange" value="Create an account"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			</form>		
                    <!--login box end here-->
                </section>
            </div>
        </div>
        <!--body cont end here-->