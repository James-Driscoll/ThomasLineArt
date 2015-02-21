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
add_theme_support( 'post-thumbnails' ); 

if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Secondary Image',
            'id' => 'secondary-image',
            'post_type' => 'jdtla_studio'
            
        )
    );
}

/* --------------------------------------------------
 * Register Custom Menu
  -------------------------------------------------- */
register_nav_menus(
  array(
    'page_navigation' => "Page Navigation Menu",
  )
);

/* -------------------------------------------------------
    Custom Post Types
------------------------------------------------------- */
//hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'register_jdtla_studio');
add_action('init', 'register_jdtla_work');
add_action('init', 'create_jdtla_work_taxonomies', 0 );

function register_jdtla_studio() {
  register_post_type( 'jdtla_studio',
    array('labels' => array(
      'name' => __('Studios', 'post type general name'), /* The Title of the Group */
      'singular_name' => __('Custom Post', 'post type singular name'), /* The individual type */
      'add_new' => __('Add New', 'custom post type item'), /* The add new menu item */
      'add_new_item' => __('Add New Studio'), /* Add New Display Title */
      'edit' => __( 'Edit' ), /* Edit Dialog */
      'edit_item' => __('Edit Studio'), /* Edit Display Title */
      'new_item' => __('New Studio'), /* New Display Title */
      'view_item' => __('View Studios'), /* View Display Title */
      'search_items' => __('Search Studios'), /* Search Custom Type Title */ 
      'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
      'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
      'parent_item_colon' => ''
      ), /* end of arrays */
      'description' => __( 'This is the Studio custom post type.' ), /* Custom Type Description */
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */ 
      'rewrite' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'thumbnail')
    ) /* end of options */
  ); /* end of register post type */
}

function register_jdtla_work() {
  
  $labels = array(
      'name' => _x('Work', 'post type general name'),
      'singular_name' => _x('Work Item', 'post type singular name'),
      'add_new' => _x('Add New', 'work item'),
      'add_new_item' => __('Add New Work Item'),
      'edit_item' => __('Edit Work Item'),
      'new_item' => __('New Work Item'),
      'view_item' => __('View Work Item'),
      'search_items' => __('Search Work Items'),
      'not_found' =>  __('Nothing found'),
      'not_found_in_trash' => __('Nothing found in Trash'),
      'parent_item_colon' => ''
  );
  $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'menu_position' => 8,
      'supports' => array('title','editor','thumbnail')
  );
  register_post_type( 'jdtla_work' , $args );
}

//add_action('init', 'portfolio_register');
function create_jdtla_work_taxonomies() {
  $labels = array(
      'name'              => _x( 'Categories', 'taxonomy general name' ),
      'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Categories' ),
      'all_items'         => __( 'All Categories' ),
      'parent_item'       => __( 'Parent Category' ),
      'parent_item_colon' => __( 'Parent Category:' ),
      'edit_item'         => __( 'Edit Category' ),
      'update_item'       => __( 'Update Category' ),
      'add_new_item'      => __( 'Add New Category' ),
      'new_item_name'     => __( 'New Category Name' ),
      'menu_name'         => __( 'Categories' ),
  );

  $args = array(
      'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'categories' ),
  );
  register_taxonomy( 'jdtla_work_categories', array( 'jdtla_work' ), $args );
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
