<?php global $user ?>
			<!-- header part-->
			<?php if($user->uid){?>
			<div class="header col-xs-12 no-left-padding no-right-padding">
				<div class="container">
				    <?php if ($logo): ?>
					  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
						<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
					  </a>
					<?php endif; ?>
					<ul class="col-xs-7 col-md-3 header-right-links pull-right">
						<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>My Account</a></li>
						<li><a href="/user/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
					</ul>
		
				</div>
            </div>
			<?php  } ?>	