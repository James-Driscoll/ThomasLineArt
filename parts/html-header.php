<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html class="no-js" lang="en"><!--<![endif]-->
	<head>

		<title><?php wp_title( 'Thomas Line Art |' ); ?></title>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  	<meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>

        <!-- Icon  -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>

		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- Custom Style -->
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css?v=3" rel="stylesheet">

		<!-- DNS Prefetch -->
		<link rel="dns-prefetch" href="<?php echo get_bloginfo("url"); ?>" />
		<link rel="dns-prefetch" href="//ajax.googleapis.com" />
		<link rel="dns-prefetch" href="//maps.google.com" />

		<!-- IE Stuff -->
		<meta http-equiv="imagetoolbar" content="false" />

		<?php wp_head(); ?>

    	<script>site = {ss: "<?php echo get_stylesheet_directory_uri(); ?>"};</script>

    </head>

    <body <?php body_class(); ?>>

        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<div class="container">

			<div class="left-side">

		      <div class="logo">
		        <a href="<?php echo get_site_url(); ?>">
		          <img height="" width="140" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-smaller.png" alt="Thomas Line Art">
		        </a>
		      </div>

		      <div class="navWrapper">
		        <?php wp_nav_menu (array('theme_location' => 'page_navigation','container_class' => 'nav')); ?>
		      </div>

		      <div class="social">
		        <ul>
		          <li><a href="https://instagram.com/tomline92/" target="_blank"><i class="fa fa-instagram"></i></a></li>
		          <li><a href="https://twitter.com/TomLine3" target="_blank"><i class="fa fa-twitter"></i></a></li>
		          <li><a href="https://vimeo.com/thomasline" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
		          <li><a href="https://www.facebook.com/ThomasLineFilmmaker" target="_blank"><i class="fa fa-facebook"></i></a></li>
		        </ul>
		      </div>

		    </div>

			<div class="right-side">
