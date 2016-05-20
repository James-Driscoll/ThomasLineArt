<?php
/**
 * Template Name: Index Template
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */

 get_template_parts( array( 'head') );
 get_template_parts( array( 'nav') ); ?>

 <div class="col-md-10 col-md-offset-1 top">
 	<div class="container">

 	<div class="row">
 		<h1>Posts</h1>
 	</div>

 	<?php echo do_shortcode('[searchandfilter fields="post_tag" headings]'); ?>

 	</div>
 </div>

 <?php get_template_parts( array( 'footer') ); ?>
