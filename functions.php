<?php

  error_reporting(E_ALL); //Turn on Error reporting

  /* Starkers Items*/
  require_once( 'external/starkers-utilities.php' );
  add_filter( 'body_class', 'add_slug_to_body_class' );


  /* --------------------------------------------------
  Location Rewriting based on the URL, including templating!
  -----------------------------------------------------*/

  // REWRITE RULES
  add_filter('rewrite_rules_array','wp_insertMyRewriteRules');
  add_filter('query_vars','wp_insertMyRewriteQueryVars');
  add_filter('init','flushRules');

  // Remember to flush_rules() when adding rules
  function flushRules(){
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
  }

  // Adding a new rule
  function wp_insertMyRewriteRules($rules){
    $newrules = array();
    //If the URL matches any of the locations, do an internal re-write.
    $locations = require("locations.php");
    $newrules['(.?.+?)(/[0-9]+)?/('.$locations.')'] = 'index.php?pagename=$matches[1]&page=$matches[2]&placename=$matches[3]';
    return $newrules + $rules;
  }

  // Adding the id var so that WP recognizes it
  function wp_insertMyRewriteQueryVars($vars){
    array_push($vars, 'placename');
    return $vars;
  }

  //Modify buffer here, and then return the updated code
  function location_callback($buffer) {
    //{##around #location# and surrounding areas##|## or this ##}
    $location = get_query_var("placename");
    
    //Replace any instances of #location# with the actual location (based on the URL)
    $location = str_replace("-"," ",$location);
    $location = ucwords($location);

    //We have a location! lets remove the stuff we don't want (from the | onwards)
    $buffer = str_replace('$location',$location,$buffer);
    if (strlen($location)){
      $buffer = preg_replace("/\|(.*?)}%/","%",$buffer);
    } else {
      $buffer = preg_replace("/%{(.*?)}\|/","%",$buffer);
    }
      $buffer = str_replace(array("%{","}%"),"",$buffer);
    return $buffer;
  }

  function buffer_start() { ob_start("location_callback"); }
  function buffer_end() { ob_end_flush(); }

  add_action('wp', 'buffer_start');
  add_action('wp_footer', 'buffer_end');

  /* -------------------------------------------------------
  	Post Thumbnails
  ------------------------------------------------------- */
  add_image_size( 'post-background', 960, 345, true );
  add_image_size( 'post-large', 450, 350, true );
  add_image_size( 'post-medium', 230, 230, true );
  add_image_size( 'post-small', 60, 60, true );
  add_image_size( 'post-thumb', 100,100, true );
  add_image_size( 'page-heading', 580, 260, true );
  add_image_size( 'page-casestudy', 221, 105, true );

  /* --------------------------------------------------
   * Register Custom Menu
    -------------------------------------------------- */
  register_nav_menus(
    array(
      'top_navigation' => "Main Navigation Menu",
    )
  );

  /* -------------------------------------------------------
      Custom Post Types
  ------------------------------------------------------- */
  //hook into the init action and call create_book_taxonomies when it fires
  add_action( 'init', 'custom_post_studio');

  //create two taxonomies, genres and writers for the post type "book"
  function custom_post_studio() {

    $labels = array(
      'name' => 'Studios',
      'singular_name' => 'Studio',
      'add_new' => 'New Studio',
      'add_new_item' => 'Add New Studio',
      'edit_item' => 'Edit Studio',
      'new_item' => 'New Studio',
      'all_items' => 'All Studios',
      'view_item' => 'View Studio',
      'search_items' => 'Search Studios',
      'not_found' =>  'No Studios found',
      'not_found_in_trash' => 'No Studios found in trash',
      'parent_item_colon' => '',
      'menu_name' => 'Studio & Research'
    );
    
    $args = array(
      'labels' => $labels,
      'description' => 'Holds all Studio & Research items.',
      'public' => true,
      'publicly_queryable' => false,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'studio'),
      'capability_type' => 'post',
      'has_archive' => false,
      'show_in_admin_bar' => true,
      'hierarchical' => false,
      'menu_position' => 5,
      'supports' => array(
        'title',
        'thumbnail',
      )//,
      //'menu_icon' => get_stylesheet_directory_uri()."/images/admin/studio.png",
    );

    register_post_type('jdtla_studio', $args);
    flush_rewrite_rules();

  }

  //Add filter to ensure the text Studio, or studio, is displayed when user updates a studio. (Rather than just using 'post')
  add_filter('post_updated_messages', 'custom_post_type_updated_messages');

  function custom_post_type_updated_messages( $messages ) {
    global $post, $post_ID;
    $messages['jdtla_studio'] = array(
      0 => '', // Unused. Messages start at index 1.
      1 => sprintf( __('Studio updated. <a href="%s">View Studio</a>'), esc_url( get_permalink($post_ID) ) ),
      2 => __('Custom field updated.'),
      3 => __('Custom field deleted.'),
      4 => __('Studio updated.'),
      /* translators: %s: date and time of the revision */
      5 => isset($_GET['revision']) ? sprintf( __('Studio restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
      6 => sprintf( __('Studio published. <a href="%s">View Studio</a>'), esc_url( get_permalink($post_ID) ) ),
      7 => __('Studio saved.'),
      8 => sprintf( __('Studio submitted. <a target="_blank" href="%s">Preview Studio</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
      9 => sprintf( __('Studio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Studio</a>'),
      // translators: Publish box date format, see php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
      10 => sprintf( __('Studio draft updated. <a target="_blank" href="%s">Preview Studio</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );
    return $messages;
  }

  /* -------------------------------------------------------
      Custom Meta
  ------------------------------------------------------- */
  // Re-define meta box path and URL
  define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri())."meta/" );
  define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH  )."meta/" );

  add_action( 'init', 'create_metaboxes');

  function create_metaboxes(){
    require "meta/meta-box.php";

    $meta_boxes[] = array(
      'id'    => 'studio_image',
      'title' => 'Upload Studio & Research Image Here',
      'pages' => array( 'jdtla_studio'),
      'fields' => array(
        array(
          'name' => 'Image:',
          'id' => 'studio_images',
          'type' => 'thickbox_image',
        ),
      )
    );

    if (class_exists( 'RW_Meta_Box' )) {
        foreach ( $meta_boxes as $meta_box ) {
            new RW_Meta_Box( $meta_box );
        }
    }
  }

  /* -------------------------------------------------------
      Make the site private
  ------------------------------------------------------- */
  function is_local(){
    $whitelist = array('127.0.0.1');
    return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
  }

  function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
  }

  if (isset($_GET["importer"])) {
    require "importer.php";
  }