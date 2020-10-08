<!doctype html>
<html lang="en">
  <head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?= $pageTitle; ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <meta name="msapplication-TileColor" content="#206bc4"/>
    <meta name="theme-color" content="#206bc4"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>
    <meta name="robots" content="noindex,nofollow,noarchive"/>
    
    <?= $this->Html->meta('favicon.ico',$this->Url->image('favicon.ico'), ['type' => 'image/x-icon', 'rel' => 'icon']);?>
    <?= $this->Html->meta('favicon.ico',$this->Url->image('favicon.ico'), ['type' => 'image/x-icon', 'rel' => 'shortcut icon']);?>

    <!-- CSS style -->
    <?php echo $this->Html->css('../libs/jqvmap/dist/jqvmap.min'); ?>
    <?php echo $this->Html->css('../libs/selectize/dist/css/selectize'); ?>
    <?php echo $this->Html->css('../libs/flatpickr/dist/flatpickr.min'); ?>
    <?php echo $this->Html->css('../libs/nouislider/distribute/nouislider.min'); ?>
    <?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'); ?>
    <?php echo $this->Html->css('tabler.min.css'); ?>
    <?php echo $this->Html->css('theme-custom.css'); ?>
    <?php echo $this->Html->css('jquery-ui'); ?>

    <?php echo $this->Html->css("bootstrap-datetimepicker.min"); ?> 
    <?php echo $this->Html->css('custom-left-menu.css'); ?>
	
    <!--required these three js files on top-->
    <?php echo $this->Html->script('../libs/jquery/dist/jquery-3.5.1.min'); ?>
    <?php echo $this->Html->script('../libs/bootstrap/dist/js/popper.min'); ?>
    <?php echo $this->Html->script('../libs/bootstrap/dist/js/bootstrap.min'); ?>
    <?php echo $this->Html->script('https://unpkg.com/sweetalert/dist/sweetalert.min.js'); ?>
	<!--  these are for toast message-->
	<?php //echo $this->Html->script('https://code.jquery.com/jquery-3.5.1.min.js'); ?>
	<?php echo $this->Html->script('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'); ?>
	<?php echo $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js'); ?>
	<!--  for datetime picker-->
	<?php echo $this->Html->script('datetime.js'); ?>

    <!-- for event calender -->
	<?// $this->Html->script('fullcalendar/lib/jquery.min'); ?>
	<?= $this->Html->script('fullcalendar/lib/moment.min'); ?>
	<?= $this->Html->script('fullcalendar/fullcalendar.min'); ?>
	<?= $this->Html->css('fullcalendar/fullcalendar.min'); ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('scriptBottom') ?>

    <style> body { display: none; } </style>
    <style type="text/css">.error { color: red;} a.btn-primary, a.btn-primary:hover{
    color: #fff;
  }</style>
  </head>
  <body class="antialiased">

    
    <div class="page">
      
     
      <?php echo $this->element('header'); ?>

		<div class="wrapper">
       
      <?php echo $this->element('navigation'); ?>
      
      
     

     <div id="content" class="pt-0">
	 <?= $this->Flash->render() ?>
	 
      <div class="content">
        <div class="container-fluid">
         
          <?= $this->fetch('content') ?>
          
        </div>
       
        <?php echo $this->element('footer'); ?>
       
      </div>
     
    </div>
	</div>
    
    <?php echo $this->Html->script('../libs/autosize/dist/autosize.min'); ?>
    <?php echo $this->Html->script('../libs/imask/dist/imask.min'); ?>
    <?php echo $this->Html->script('../libs/selectize/dist/js/standalone/selectize.min'); ?>
    <?php echo $this->Html->script('../libs/flatpickr/dist/flatpickr.min'); ?>
    <?php echo $this->Html->script('../libs/flatpickr/dist/plugins/rangePlugin'); ?>
    <?php echo $this->Html->script('../libs/nouislider/distribute/nouislider.min'); ?>
    
    <?php //echo $this->Html->script('../libs/apexcharts/dist/apexcharts.min'); ?>
    <?php echo $this->Html->script('../libs/jqvmap/dist/jquery.vmap.min'); ?>
    <?php echo $this->Html->script('../libs/jqvmap/dist/maps/jquery.vmap.world'); ?>
    <?php echo $this->Html->script('../libs/peity/jquery.peity.min'); ?>

    <?php echo $this->Html->script('jquery-ui.min'); ?>
    <?php echo $this->Html->script('jquery.validate.min'); ?>
    <?php echo $this->Html->script('additional-methods.min'); ?>

    <!-- Tabler Core -->
    <?php echo $this->Html->script('tabler'); ?>
    <?php echo $this->Html->script('moment.min.js'); ?>
    <?php echo $this->Html->script('bootstrap-datetimepicker.min'); ?>
    <?php echo $this->Html->script('jquery.mask.min'); ?>
    
    <?php echo $this->Html->script('theme-custom'); ?>

    <script>
      document.body.style.display = "block"
    </script>

  </body>
</html>