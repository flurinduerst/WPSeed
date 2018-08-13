<?php
/**
 * functions to output ACFs flexible blocks (called "blocks" in WPSeed)
 *
 * @author     Flurin Dürst
 * @version    1.3.0
 * @since      WPSeed 0.10.0
 *
 * was 'functions-elements' until 1.3.0
 *
 */


/*==================================================================================
  SETTINGS/SETUP
==================================================================================*/


/* ADD TITLES BLOCKS
/––––––––––––––––––––––––––––––––––––*/
// adds the title sub-field to the ACF-row. Edit `name` at `add_filter` to match your ACF-value.
// » https://www.advancedcustomfields.com/resources/acf-fields-flexible_content-layout_title/
function WPSeed_blocks_backendtitle( $title, $field, $layout, $i ) {
  if (!empty(get_sub_field('title'))) {
  	$title = get_sub_field('title')." ($title)";
  }
  return $title;
}
add_filter('acf/fields/flexible_content/layout_title/name=blocks', 'WPSeed_blocks_backendtitle', 10, 4);


/* GATHER BLOCKS
/––––––––––––––––––––––––*/
function WPSeed_blocks() {
  ob_start('sanitize_output');
  if (have_rows('blocks')):
    while (have_rows('blocks')): the_row();
      if (get_row_layout() == 'article'): WPSeed_block_article(); endif;
      if (get_row_layout() == 'seperator'): echo '<hr>'; endif;
    endwhile;
  endif;
  return ob_get_flush();
}


/*==================================================================================
  BLOCKS
==================================================================================*/
// add your custom blocks here...

/* ARTICLE
/––––––––––––––––––––––––*/
function WPSeed_block_article() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-article.php');
  return ob_get_flush();
}
?>
