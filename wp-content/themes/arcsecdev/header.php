<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link rel="icon" type="image/ico" href="<?php echo TEMPLATE_URI_IMG ?>/favicon.png">

    <!--[if lt IE 9]>

    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    <?php wp_head(); ?>

    <!--    ==== Header scripts ====-->
    <?php echo get_field('header_scripts', 'option') ?>
    <!--    ==== END Header scripts ====-->
</head>



<body <?php body_class(THEME_NAME); ?>>
<!--    ==== Body scripts ====-->
<?php echo get_field('body_scripts', 'option') ?>
<!--    ==== END Body scripts ====-->
<div id="app" <?php post_class( 'site-container app') ?>>

    <header class="main-header">
        <div class="inner">

        </div>
    </header>
