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

	        <div class="container header">
	            <h1 class="title"><a href="http://james-driscoll.co.uk">James Driscoll</a></h1>
	            <div class="intro">
	                <img height="150" width="152" src="<?php echo get_stylesheet_directory_uri() ?>/images/portrait.jpg" alt="Portrait Image">
	                <div class="intro-details">
	                    <strong class="intro-sub-title">BSc Computing Student</strong>
	                    <span class="intro-text">I am a dedicated individual with a strong interest in modern technology and how it can be applied and uitilised in business.</span>
	                    <h4 class="intro-sub-name">James Driscoll</h4>
	                </div>
	            </div>
	            <div class="contact">
	                <ul>
	                    <li class="email"><a href="mailto:enquiries@james-driscoll.co.uk">enquiries@james-driscoll.co.uk</a></li>
	                    <li class="linked"><a href="http://uk.linkedin.com/pub/james-driscoll/5a/19/40b/" target="_blank">my LinkedIn</a></li>
	                    <li class="web"><a href="http://webdevelopment.james-driscoll.co.uk" target="_blank">webdevelopment.james-driscoll.co.uk</a></li>
	                </ul>
	            </div>
	        </div>
