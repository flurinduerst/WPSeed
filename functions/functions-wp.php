<?
/**
 * File for general, WordPress related functions
 *
 * @author         Flurin Dürst
 * @version 	   1.2
 * @since 		   WPegg 0.11
 *
 */


/* SHORTCODES
/===================================================== */

    /* IMAGES DIV
    /------------------------*/
    // [images_start]
    function shortcode_images_start($type) {
            return '<div class="images">';
    }
    add_shortcode('images_start', 'shortcode_images_start');

    // [images_end]
    function shortcode_images_end($type) {
            return '</div>';
    }
    add_shortcode('images_end', 'shortcode_images_end');


     /* SOCIAL MEDIA ICONS
     /------------------------*/
     // Usage: [button type="facebook"], [button type="twitter"]
     function wpegg_button_shortcode($type) {
         extract(shortcode_atts(array(
             'type' => 'type'
         ), $type));

         switch ($type) {
             case 'twitter':
                 return '<a href="http://twitter.com/wpegg"><img src="'.get_bloginfo('template_directory').'/assets/icons/icon_twitter.png"></a>';
                 break;
             case 'facebook':
                 return '<a href="http://facebook.com/wpegg"><img src="'.get_bloginfo('template_directory').'/assets/icons/icon_fb.png"></a>';
                 break;
         }
     }
     add_shortcode('button', 'wpegg_button_shortcode');


 /* BLOG
 /===================================================== */

     /* OUTPUT FORMATTED POST-DATE IN GERMAN
     /--------------------------------------*/
     function wpegg_get_the_date_german() {
     	$months_de = ['Januar','Februar','März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'];
     	return get_the_date('d.').' '.$months_de[intval(get_the_date('m'))-1].' '.get_the_date('Y.');
     }

     /* EDIT «READ MORE» BUTTON
     /---------------------------*/
     add_filter( 'the_content_more_link', 'modify_read_more_link' );
     function modify_read_more_link() {
         return ' <span class="readmore"><a href="' . get_permalink() . '">[read more]</a>';
     }

     /* EMPTY «READ MORE»
     /---------------------------*/
    //  add_filter( 'the_content_more_link', 'modify_read_more_link' );
    //  function modify_read_more_link() {
    //      return;
    //  }


/* OTHERS
/===================================================== */

     /* THUMBNAIL URL
     /------------------------*/
     // output the absolute url of the featured image
	 // => usage: wpegg_the_post_thumbnail_url($post->ID, 'large');
     function wpegg_the_post_thumbnail_url($size, $postid) {
         echo wp_get_attachment_image_src( get_post_thumbnail_id($postid), $size )['0'];
     }

     /* FLEXBOX FILLUP
     /------------------------*/
     // usage: flexfill('item', 3) to generate 3 empty `item ff` divs
     function flexfill($class, $amount) {
         $output = '';
         for ($i=0; $i < $amount; $i++) {
             $output .= '<div class="'.$class.' ff"></div>';
         }
         echo $output;
     }

	 /* TINY_MCE CUSTOM STYLES DROPDOWN
	 /---------------------------------*/
	 // => http://www.wpbeginner.com/wp-tutorials/how-to-add-custom-styles-to-wordpress-visual-editor/
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
	             'title' => 'Bild Weit',
	             'selector' => 'img',
	             'classes' => 'weit'
	 		],
	         [
	             'title' => 'Beispiel',
	             'selector' => 'p',
	             'classes' => 'example',
	         ]
	     ];
	     $settings['style_formats'] = json_encode( $style_formats );
	     return $settings;
	 }

 /* PLUGIN RELATED
 /===================================================== */
