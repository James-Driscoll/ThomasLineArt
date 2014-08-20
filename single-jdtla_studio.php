<?php
/**
 * Template Name: Studio & Research22
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */


get_header(); ?>

  <div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

      <?php /* The loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>



      <?php endwhile; ?>

    </div><!-- #content -->
  </div><!-- #primary -->


<?php get_footer(); ?>