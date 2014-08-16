<?php
/**
 * Template Name: Homepage
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */

//if ( have_posts() ) while ( have_posts() ) : the_post();
 ?>

<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
            
        <!-- Load up Google Fonts FAST -->
        <link href='http://fonts.googleapis.com/css?family=Neuton:300,400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
        
        <title><?php wp_title( '|' ); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css?v=3"/>
        <!--<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/normalize.css?v=3"/>-->

        <meta name="viewport" content="width=device-width">

        <!-- DNS Prefetch -->
        <link rel="dns-prefetch" href="<?php echo get_bloginfo("url"); ?>" />
        <link rel="dns-prefetch" href="//ajax.googleapis.com" />
        <link rel="dns-prefetch" href="//maps.google.com" />

        <!-- IE Stuff -->
        <meta http-equiv="imagetoolbar" content="false" />

        <!-- JQuery -->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.7.1.min.js" ></script>

        <!-- BxSlider -->
        <script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.bxSlider.min.js"></script>

        <!-- Site Javascript -->
        <script src="<?php echo get_stylesheet_directory_uri();?>/js/site.js"></script>



<?php wp_head(); ?>

        <script>site = {ss: "<?php echo get_stylesheet_directory_uri(); ?>"};</script>
        </head>
        <body <?php body_class(); ?>>


<!-- Content Begins Here -->

<div class="home-nav">
    <?php
        //Output the navigation
        $args = array(
            "theme_location" => "top_navigation",
            'container_class' => 'top-navigation container'
        );
        wp_nav_menu($args);
    ?>
</div>

<a class="home-logo" href="<?php echo get_site_url(); ?>">
    <img class="logo" height="576" width="720" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-home.gif" alt="Thomas Line Art logo">
</a>

<!-- Content ends here -->