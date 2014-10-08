<?php
/**
 * 
 * This is the template for displaying a single Studio custom post type.
 * 
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

//Get The Header
get_template_parts( array( 'parts/html-header') ); ?>

<div class="container">
	<div class="single-studio">

			<?php the_post_thumbnail('full'); ?>
			<ul class="details">
				<li class="title"><h1>Title: <?php the_title(); ?></h1></li>
				<li class="materials"><h2>Materials: <?php echo rwmb_meta("smaterials") ?></h2></li>
				<li class=""><h2>Details: <?php echo rwmb_meta("spar2") ?></h2></li>
				<li class=""><h2>References: <?php echo rwmb_meta("spar3") ?></h2></li>
				<li class=""><h2>Extra Parameter 4: <?php echo rwmb_meta("spar4") ?></h2></li>
			</ul>

	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>