<?php global $user;?>
<div class="background-inner"></div>
<div class="col-xs-12 no-left-padding no-right-padding">
<?php include ('header.inc');?>
 <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>
<div class="main-content col-xs-12 no-left-padding no-right-padding"> 
<?php if($user->uid) { ?>
	<div class="col-md-12 no-left-padding no-right-padding">
					<nav class="navbar navbar-default navigate">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="main-menu">
								<ul class="nav navbar-nav navigation-list no-left-padding">
									
								<?php if ($main_menu): ?>
							  <div id="main-menu" class="collapse navbar-collapse">
								<?php print theme('links__system_main_menu', array(
								  'links' => $main_menu,
								  'attributes' => array(
									'id' => 'main-menu-links',
									'class' => array('nav navbar-nav navigation-list no-left-padding'),
								  ),
								)); ?>
							  </div> <!-- /#main-menu -->
							<?php endif; ?>			
							
								</ul>
							</div>
						</div>
					</nav>
				</div>

    <?php } ?>
<div class="container">
<div class="details-div col-md-12 no-left-padding no-right-padding ">	
 <?php print render($page['content']); ?>
</div> 
</div> 
</div> 
<?php include ('footer.inc');?>

</div>