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

<body <?php body_class(); ?> id="body-background">
  <!-- Content Begins Here -->

  <?php
    //Get the header
    get_template_parts( array( 'parts/html-header') );
  ?>
    
    <div class="inner-container">

    <!--<a class="home-logo container" href="<?php echo get_site_url(); ?>">
    <img class="vim" height="600" width="800" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-holder.png" alt="Thomas Line Art logo">
    </a>

    <!-- Content ends here -->
    </div>
    <?php
    //Get the footer
    get_template_parts( array( 'parts/html-footer') );
    ?>
