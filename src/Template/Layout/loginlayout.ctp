<!doctype html>
<html lang="en">
<head>
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
<?= $this->Html->css('custom'); ?>
<?= $this->Html->script('jquery-3.5.1.min'); ?>
<title><?= $pageTitle; ?></title>
</head>
<style>
    .error{
        color: #fa4654;
        font-size: 14px;
    }
</style>
<body>

	<?php echo $this->element('home_header'); ?>
	<?= $this->fetch('content') ?>
	<?= $this->element('home_footer'); ?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?= $this->Html->script('popper.min'); ?>
<?= $this->Html->script('bootstrap.min'); ?>
<?= $this->Html->script('owl.carousel'); ?>
<?= $this->Html->script('jquery.validate.min'); ?>
<?php //$this->Html->script('https://unpkg.com/sweetalert/dist/sweetalert.min.js'); ?>
<?= $this->Html->script('jquery.mask.min'); ?>

</body>
</html>