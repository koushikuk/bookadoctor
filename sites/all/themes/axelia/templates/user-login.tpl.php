<?php global $base_url; ?>

      <div class="container-fluid row">
		<div class="col-xs-12 loginLogo">
			<img src="<?php echo axelia_get_img_path()?>/img/login-wiphy-logo.png" alt="logo"/>
		</div>
<form class="log_pos clearfix" action="<?php echo $base_url;?>/user/login" method="post" id="user-login" accept-charset="UTF-8">			
			<div class="col-xs-6 col-xs-offset-3">
				<div class="loginContainer">
					<div class="loginHead">Login</div>
					<div class="innerLoginContainer">
						<div class="form-group emailField">
							<label for="emailAddress">Username</label>
							<input type="text" class="form-control" id="edit-name" name="name" placeholder="-Enter UserName-">
							<label for="hintEmail">Enter your username.</label>
						</div>
						<div class="form-group passField">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="edit-pass" name="pass" placeholder="*********">
							<label for="hintPassword">Enter the password that accompanies your e-mail.</label>
						</div>
					    <?php print drupal_render($form['form_build_id']);
						 print drupal_render($form['form_id']);?>               
									   
						<div class="btnLog">
							<button type="submit" id="edit-submit" name="op" class="btn custom-btn btn-primary btn-block">Login</button>
						</div>
						<div class="form-check">
							<div class="requestPassword"><a href="javascript:void(0)">Request New Password?</a></div>
						</div>
					</div>
				</div>
			</div>
      </form>


    </div> 