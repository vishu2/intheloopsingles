<header class="header">
	<div class="container">
	 <?php  if((isset($user) && (($user->role_id==1)||($user->role_id==2)))){ ?>
		<?php echo $this->element('nav_adminview'); ?>
	 <?php } else { ?>
		<?php  echo $this->element('nav'); ?> 
	 <?php } ?>
	</div>
</header>
