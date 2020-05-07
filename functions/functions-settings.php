<?php
/**
 * Theme-settings and general functions that normally don't need much editing
 *
 * @author      Flurin Dürst
 * @version     2.7.0
 * @since       WPSeed 0.1.6
 *
 * was part of 'functions-wpsetup.php' before 2.0.0
 *
 */


/*==================================================================================
 Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 THEME SETTINGS
    1.1 enqueue scripts/styles
    1.2 theme support

  2.0 GENERAL SETTINGS
    2.1 wphead cleanup
    2.2 preload fonts
    2.3 get cache-busted css file
    2.4 reset inline image dimensions (for css-scaling of images)
    2.5 reset image-processing
    2.6 hide core-updates for non-admins
    2.7 disable backend-theme-editor
    2.8 load textdomain (based on locale)
  3.0 USER CAPABILITIES
==================================================================================*/



/*==================================================================================
  1.0 THEME SETTINGS
==================================================================================*/


/* 1.1 ENQUEUE SCRIPTS/STYLES
/––––––––––––––––---––––––––*/
// enqueues scripts and styles (optional typekit embed)
// » https://developer.wordpress.org/reference/functions/wp_enqueue_script/
function WPSeed_enqueue() {
  // jQuery (from wp core)
  wp_deregister_script( 'jquery' );
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.3.1');
  wp_enqueue_script( 'jquery' );
  // disable Gutenberg block styles
  global $load_default_block_styles;
  if (!$load_default_block_styles) :
    wp_dequeue_style( 'wp-block-library' );
  endif;
  // scripts
  wp_register_script('wpseed/scripts', get_template_directory_uri() . '/dist/script.min.js', false, array( 'jquery' ), true);
  wp_enqueue_script('wpseed/scripts');
  // styles
  wp_enqueue_style('wpseed/styles', get_template_directory_uri() . wpseed_get_cachebusted_css(), false, null);
  // Typekit
  global $typekit_id;
  if ($typekit_id) :
    wp_enqueue_style('typekit/styles', 'https://use.typekit.net/'.$typekit_id.'.css', false, null);
  endif;
}
add_action('wp_enqueue_scripts', 'WPSeed_enqueue');


/* 1.2 THEME SUPPORT
/––––––––––––––––––––––––*/
function wpseed_theme_support()  {

  // Enable plugins to manage the document title
  // => http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support( 'title-tag');

  // Add Theme Support for Menus
  // => http://codex.wordpress.org/Navigation_Menus
  add_theme_support('menus');

  // Add HTML5 markup for search forms, comment forms, comment lists, gallery, and caption
  // => https://codex.wordpress.org/Theme_Markup
  add_theme_support('html5');

  /* Gutenberg -> enable wide images
  /––––––––––––––––––––––––*/
  add_theme_support( 'align-wide' );


}
add_action( 'after_setup_theme', 'wpseed_theme_support');


/*==================================================================================
  2.0 GENERAL SETTINGS
==================================================================================*/


/* 2.1 WPHEAD CLEANUP
/––––––––––––––––––––––––*/
// remove unused stuff from wp_head()

function wpseed_wphead_cleanup () {
  // remove the generator meta tag
  remove_action('wp_head', 'wp_generator');
  // remove wlwmanifest link
  remove_action('wp_head', 'wlwmanifest_link');
  // remove RSD API connection
  remove_action('wp_head', 'rsd_link');
  // remove wp shortlink support
  remove_action('wp_head', 'wp_shortlink_wp_head');
  // remove next/previous links (this is not affecting blog-posts)
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
  // remove generator name from RSS
  add_filter('the_generator', '__return_false');
  // disable emoji support
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
  // disable automatic feeds
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'feed_links', 2);
  // remove rest API link
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10);
  // remove oEmbed link
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
  remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('after_setup_theme', 'wpseed_wphead_cleanup');


/* 2.2 PRELOAD FONTS
/––––––––––––––––––––––––*/
// preloads fonts that are hosted locally into the page header
// » check https://caniuse.com/#search=preload
// add your desired fonts and font-types into $font_names and $font_formats
function WPSeed_preload_fonts() {
  // font_names and font_formats are defined in 'functions-setup.php'
  global $preload_fonts;
  if ($preload_fonts) {
    global $font_names;
    global $font_formats;
    // define font folder
    $font_folder = '/dist/fonts/';
    // loop through fonts
    foreach($font_names as $font_name) {
      // loop through font-formats
      foreach($font_formats as $font_format) {
        $path = get_bloginfo('template_url').$font_folder.$font_name.'.'.$font_format;
        echo '<link rel="preload" href="'.$path.'" as="font" type="font/'.$font_format.'" crossorigin="anonymous">'."\r\n";
      }
    }
  }
}



/* 2.3 GET CACHE-BUSTED CSS FILE
/––––––––––––––––––––––––––––––*/
// get the url to the busted css-file, or the default css-file if working locally (on the TLD `.vm`)
// the busted css file is generated by `gulp cachebust` and is located through dist/rev-manifest.json
function wpseed_get_cachebusted_css() {
  $current_tld = substr(strrchr(get_bloginfo('url'),"."),1);
  if ($current_tld == 'vm') :
    $css_src = '/dist/style.min.css';
  else :
    $css_manifest_url = get_template_directory_uri() . '/dist/rev-manifest.json';
    $css_manifest_content = json_decode(file_get_contents($css_manifest_url), true);
    $css_src = '/dist/'.$css_manifest_content['style.min.css'];
  endif;
  return $css_src;
}


/* 2.4 RESET INLINE IMAGE DIMENSIONS (FOR CSS-SCALING OF IMAGES)
/–––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––*/
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);


/* 2.5 RESET IMAGE-PROCESSING
/––––––––––––––––––––––––*/
add_filter('jpeg_quality', function($arg){return 100;});
add_filter('wp_editor_set_quality', function($arg){return 100;});


/* 2.6 HIDE CORE-UPDATES FOR NON-ADMINS
/––––––––––––––––––––––––––––––––––––*/
function onlyadmin_update() {
  if (!current_user_can('update_core')) { remove_action( 'admin_notices', 'update_nag', 3 ); }
}
add_action( 'admin_head', 'onlyadmin_update', 1 );


/* 2.7 DISABLE BACKEND-THEME-EDITOR
/–––––––––––––––––––––––––––––––––*/
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);


/* 2.8 LOAD TEXTDOMAIN (BASED ON LOCALE)
/––––––––––––––––––––––––––––––––––––––*/
load_theme_textdomain('WPSeed', get_template_directory() . '/languages');



/*==================================================================================
  3.0 USER CAPABILITIES
==================================================================================*/

/* EDITOR
/––––––––––––––––––––––––––––––––––––––*/

// add theme-options menu for «editor»-user
$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );

// restrict rights to menu only
function capabilities_editor_themeoptions(){
  // get current login user's role
  $roles = wp_get_current_user()->roles;
  // check role
  if( !in_array('editor',$roles)){
    return;
  }
  // remove menu
  remove_menu_page( 'tools.php' ); //Tools
  // remove theme selection
  remove_submenu_page( 'themes.php', 'themes.php' );
  // remove widgets
  remove_submenu_page( 'themes.php', 'widgets.php' );
  // remove customizer
  remove_submenu_page( 'themes.php', 'customize.php' );
  global $submenu; unset($submenu['themes.php'][6]);
}
add_action( 'admin_menu', 'capabilities_editor_themeoptions' , 100 );

?>
