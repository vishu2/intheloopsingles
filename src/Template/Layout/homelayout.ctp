<!doctype html>
<html lang="en">
<head>

<title><?= $pageTitle; ?></title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<?= $this->Html->meta('icon', 'img/logo.ico')?>
<?= $this->Html->css('font'); ?>
<?= $this->Html->css('owl.carousel.min'); ?>
<?= $this->Html->css('bootstrap.min'); ?>

<?= $this->Html->css('datepicker.min'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
<?= $this->Html->css('custom'); ?>
<?= $this->Html->script('jquery-3.5.1.min'); ?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?= $this->Html->script('popper.min'); ?>
<?= $this->Html->script('bootstrap.min'); ?>

    <!-- for event calender -->
<?= $this->Html->script('fullcalendar/lib/jquery.min'); ?>
<?= $this->Html->script('fullcalendar/lib/moment.min'); ?>
<?= $this->Html->script('fullcalendar/fullcalendar.min'); ?>
<?= $this->Html->css('fullcalendar/fullcalendar.min'); ?>
<script src="https://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.css"/>



<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<?= $this->fetch('scriptBottom'); ?>

</head>
<style>
    span.error, label.error{
        color: #fa4654;
        font-size: 14px;
    }
</style>
<body>

	<?php echo $this->element('home_header'); ?>
	<?php if(($this->request->getParam('controller') == 'Users') && ($this->request->getParam('action') == 'home')){
		echo $this->element('home_banner');
	} ?>

	<?= $this->fetch('content') ?>
	
    <?= $this->element('home_footer'); ?>

    
    <?= $this->Html->script('owl.carousel'); ?>
    <?= $this->Html->script('moment.min'); ?>
    <?= $this->Html->script('datepicker.min'); ?>
    <?= $this->Html->script('jquery.validate.min'); ?>
    <?= $this->Html->script('additional-methods.min'); ?>
    <?= $this->Html->script('https://unpkg.com/sweetalert/dist/sweetalert.min.js'); ?>
    <?= $this->Html->script('jquery.mask.min'); ?>
   <script> function createFcn(nm){(window.freshsales)[nm]=function(){(window.freshsales).push([nm].concat(Array.prototype.slice.call(arguments,0)))}; } (function(url,appToken,formCapture){window.freshsales=window.freshsales||[];if(window.freshsales.length==0){list='init identify trackPageView trackEvent set'.split(' ');for(var i=0;i<list.length;i++){var nm=list[i];createFcn(nm);}var t=document.createElement('script');t.async=1;t.src='https://d952cmcgwqsjf.cloudfront.net/assets/analytics.js';var ft=document.getElementsByTagName('script')[0];ft.parentNode.insertBefore(t,ft);freshsales.init('https://itlsingles.freshsales.io','2f3f96d3243d8ccf6e3839ad2487f6ed94e5f74e263e9cd98c4618825a843f13',true);}})();</script>
 
</body>
</html>