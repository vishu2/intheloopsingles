<?= $this->element('frontend/header') ?>
<style>.error{color: #fa4654;}</style>
<div class="page">
<?php  if((isset($user) && (($user->role_id==1)||($user->role_id==2)))){ ?>
		<?php echo $this->element('nav_adminview'); ?>
	 <?php } else { ?>
		<?php  echo $this->element('nav'); ?> 
	 <?php } ?>
<?= $this->Flash->render() ?>

<div class="content">
    <div class="container-fluid ">
        <?= $this->fetch('content') ?>
    </div>
</div>
<?= $this->element('frontend/footer') ?>