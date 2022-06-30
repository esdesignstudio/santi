<!doctype html>
<html <?php language_attributes(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
   <meta charset="UTF-8">
   <link href="<?php echo get_template_directory_uri(); ?>/assets/imgs/icons/favicon.ico" rel="shortcut icon">
   <link href="<?php echo get_template_directory_uri(); ?>/assets/imgs/icons/touch.png" rel="apple-touch-icon-precomposed">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <meta name='viewport' content='width=device-width, initial-scale=1.0' />
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <header id="header">
      <div class="es_wrap">
         <div id="eslogo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo.svg" alt=""></a>
         </div>
         <nav id="esnav">
            <?php main_menu(); ?>
         </nav>
      </div>
   </header>