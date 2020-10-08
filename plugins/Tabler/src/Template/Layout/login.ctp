<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.7
* @link https://github.com/tabler/tabler
* Copyright 2018-2019 The Tabler Authors
* Copyright 2018-2019 codecalm.net Paweł Kuna
* Licensed under MIT (https://tabler.io/license)
-->
<html lang="en">
  <head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
   
    <title><?= $this->fetch('title') ?></title>
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
    
    <!-- CSS files -->
    <?php echo $this->Html->css('libs/jqvmap/dist/jqvmap.min'); ?>
    <?php echo $this->Html->css('tabler.min.css'); ?>
    <?php echo $this->Html->css('demo.min.css'); ?>

    <style>
      body {
      	display: none;
      }
    </style>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('scriptBottom') ?>

  </head>

  <body class="antialiased border-top-wide border-primary d-flex flex-column">
          <?= $this->Flash->render() ?>

    <!----Middle Content Block---->
    <?= $this->fetch('content') ?>
    <!----Middle Content Block---->
    
    <!-- Libs JS -->
    <?php echo $this->Html->script('libs/bootstrap/dist/js/bootstrap.bundle.min'); ?>
    <?php echo $this->Html->script('libs/jquery/dist/jquery-3.5.1.min'); ?>

    <!-- Tabler Core -->
    <?php echo $this->Html->script('js/tabler.min'); ?>

    <script>
      document.body.style.display = "block"
    </script>

    <script type="text/javascript">
        $(document).ready(function(){

          $( "#loginForm" ).validate({
              rules: {
                username: {
                  required: true,
                },
                password: {
                  required: true
                }
              },
              messages:{
                        username: {
                           required: "Please enter your username"
                        },
                        password: {
                           required: "Please enter your password"
                        }
                    }
            });
        });
    </script>

  </body>
</html>
