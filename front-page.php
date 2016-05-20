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

$vimeo_video_embed = get_field('vimeo_video_embed');
$vimeo_link = get_field('vimeo_link') ?>

<iframe class="feature" src="<?php echo $vimeo_video_embed; ?>" width="100%" height="640" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

<?php get_template_parts( array( 'footer') ); ?>
