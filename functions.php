<?php

/**
 * Theme customizations
 *
 * @package      Lakeholm
 * @author       Kylea Jackson
 * @copyright    Copyright (c) 2016, Kylea Jackson
 * @license      GPL-2.0+
 */

// Load child theme textdomain.
load_child_theme_textdomain( 'lakeholm' );

add_action( 'genesis_setup', 'lakeholm_setup', 15 );
/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */
function lakeholm_setup() {

  //Define Theme constants.
  define('CHILD_THEME_NAME', 'Lakeholm');
  define('CHILD_THEME_URL', 'http://github.com/knjackson30974/lakeholm');
  define('CHILD_THEME_VERSION', '1.0.0');

  // Add HTML5 markup structure.
  add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'  ) );
  
  // Add viewport meta tag for mobile browsers.
  add_theme_support( 'genesis-responsive-viewport' );
  
  // Add theme support for accessibility.
  add_theme_support( 'genesis-accessibility', array(
    '404-page',
    'drop-down-menu',
    'headings',
    'rems',
    'search-form',
    'skip-links',
  ) );

    // Add theme support for footer widgets.
  add_theme_support( 'genesis-footer-widgets', 3 );

  // Unregister layouts that use secondary sidebar.
  genesis_unregister_layout( 'content-sidebar-sidebar' );
  genesis_unregister_layout( 'sidebar-content-sidebar' );
  genesis_unregister_layout( 'sidebar-sidebar-content' );

  /** Remove Genesis footer widgets **/
  remove_theme_support( 'genesis-footer-widgets', 3 );
  
  /** Add support for 1 footer widget **/
  add_theme_support( 'genesis-footer-widgets', 1 );


  // Unregister secondary sidebar.
  unregister_sidebar( 'sidebar-alt' );

  // Add theme widget areas.
  include_once( get_stylesheet_directory() . '/includes/widget-areas.php' );

  // Add Google Font stylesheet.
  add_action( 'wp_enqueue_scripts', 'lakeholm_equeue_styles' );
  function lakeholm_equeue_styles() {

  wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic|Lobster' );

  }

  add_filter('genesis_footer_creds_text', 'custom_footer_creds');
  function custom_footer_creds(){
    $creds = '©2016 Kylea Jackson';
    return $creds;
  }

  add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');


  remove_filter('genesis_site_title', 'genesis_seo_site_title');
  remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

  remove_action( 'genesis_header', 'genesis_do_header' );

  //enqueues our external font awesome stylesheet
  function enqueue_our_required_stylesheets(){
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
  }
  add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');

  //enqueues our external font awesome stylesheet
  function enqueue_fae_stylesheets(){
    wp_enqueue_style('font-awesome-ex', get_stylesheet_directory_uri() . '/includes/fontawesome_ex/font-awesome-extension.css'); 
  }
  add_action('wp_enqueue_scripts','enqueue_fae_stylesheets');

  
  // Enqueue Scripts and Styles
  add_action( 'wp_enqueue_scripts', 'custom_enqueue_scripts_styles' );
  function custom_enqueue_scripts_styles() {

    // wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300italic,700italic,700,300', array(), CHILD_THEME_VERSION );
    wp_enqueue_style( 'dashicons' );

    wp_enqueue_script( 'responsive-menu', get_stylesheet_directory_uri() . '/lib/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
    $output = array(
      'mainMenu' => __( 'Menu', 'my-theme-text-domain' ),
      'subMenu'  => __( 'Menu', 'my-theme-text-domain' ),
    );
    wp_localize_script( 'responsive-menu', 'ResponsiveMenuL10n', $output );

  }

}
