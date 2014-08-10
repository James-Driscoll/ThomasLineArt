<?php
/**
 * Template Name: Under Construction
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */

//Get the header(s)
get_template_parts( array( 'parts/html-header') );


function em($name,$echo = true){
	$meta = rwmb_meta($name);
	if ($echo){
		echo $meta;
	}
	return $meta;
}

if ( have_posts() ) while ( have_posts() ) : the_post(); 
?>

<div class="content">
	<div class="container paragraph">
    	<h1 class="title"><?php echo strtolower(get_the_title()); ?></h1>
    	<h2 class="coming-soon">Coming Soon!</h2>
    	<br />
    	<br />
    	<p>The <?php echo get_the_title(); ?> page is currently under construction.</p>
   
	</div>
</div>


 <?php endwhile;
 //Get the footer(s)
 get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>