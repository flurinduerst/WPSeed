<?php
/**
 * Backend related functions
 *
 * @author      Flurin Dürst
 * @version     1.3.2
 * @since       WPSeed 0.11.3
 *
 */


/*==================================================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
1.0 SHORTCODES
2.0 WYSIWYG EDITOR
3.0 MEDIA
4.0 USER CAPABILITIES
==================================================================================*/



/*==================================================================================
  1.0 SHORTCODES
==================================================================================*/


/* BUTTON
/––––––––––––––––––––––––*/
// Usage: [button link="https://twitter.com" text="Twitter"]
function shortcode_button($atts) {
   $link = $atts['link'];
   $text = $atts['text'];
   return '<a href="'.$link.'" class="button">'.$text.'</a>';
}
add_shortcode('button', 'shortcode_button');



/*==================================================================================
  2.0 WYSIWYG EDITOR
==================================================================================*/


/* TINY_MCE CUSTOM STYLES DROPDOWN
/---------------------------------*/
// » http://www.wpbeginner.com/wp-tutorials/how-to-add-custom-styles-to-wordpress-visual-editor/
// Show "Styles" Dropdown
add_filter( 'mce_buttons_2', 'mce_editor_buttons' );
function mce_editor_buttons( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
// Add classes to the "Styles" Dropdown
add_filter( 'tiny_mce_before_init', 'mce_before_init' );
function mce_before_init( $settings ) {

  $style_formats = [
    [
      'title' => 'Image Example',
      'selector' => 'img',
      'classes' => 'imgexample'
    ],
    [
      'title' => 'Example',
      'selector' => 'p',
      'classes' => 'example',
    ]
  ];
  $settings['style_formats'] = json_encode( $style_formats );
  return $settings;
}



/*==================================================================================
  3.0 MEDIA
==================================================================================*/


/* Allow svg uploads
/––––––––––––––––––––––––*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



/*==================================================================================
  4.0 USER CAPABILITIES
==================================================================================*/


/* Hide core update info for non-admins
/---------------------------------------*/
function onlyadmin_update() {
  if (!current_user_can('update_core')) {
      remove_action( 'admin_notices', 'update_nag', 3 );
  }
}
add_action( 'admin_head', 'onlyadmin_update', 1 );


?>
