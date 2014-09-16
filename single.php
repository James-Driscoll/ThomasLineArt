<?php
/**
 * Template Name: Index Template
 *
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */

//Get the header(s)
get_template_parts( array( 'parts/html-header') ); ?>


    <div class="content">
        <div class="container">
            
            <?php if (have_posts()) ?>
              <?php while (have_posts()) : the_post(); ?>
                
                <h1 class="title"><?php the_title(); ?></h1>

            <?php endwhile; ?>
            
        </div>
   </div>

 <?php 
   //Get the footer(s)
   get_template_parts( array( 'parts/footer','parts/html-footer' ) );
?>