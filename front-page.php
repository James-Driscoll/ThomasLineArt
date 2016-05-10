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
?>

<?php get_template_parts( array( 'header') );

$vimeo_embed = get_field('vimeo_video_embed', false, false); ?>

<a href="https://vimeo.com/thomasline" target="_blank">
    <iframe class="feature" src="<?php echo $vimeo_embed; ?>" width="100%" height="640" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</a>

<?php get_template_parts( array( 'footer') ); ?>
