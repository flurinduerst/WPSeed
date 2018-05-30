<?php
/**
 * functions to output ACF flexible elements
 * WPSeed_Text and WPSeed_Gallery are placeholder presets.
 *
 * @author     Flurin Dürst
 * @version    1.2.3
 * @since      WPSeed 0.10.0
 *
 */


/* ADD TITLES TO ELEMENT BARS
/----------------------------*/
// adds the title-sub_field to the ACF-element bar. Edit `name` at `add_filter` to match your ACF-value.
// » https://www.advancedcustomfields.com/resources/acf-fields-flexible_content-layout_title/
function WPSeed_acf_flexiblecontent_title( $title, $field, $layout, $i ) {
  if (!empty(get_sub_field('title'))) {          // remove layout title from text
  	$title = get_sub_field('title')." ($title)";  // add new title
  }
  return $title;
}
add_filter('acf/fields/flexible_content/layout_title/name=element_content', 'WPSeed_acf_flexiblecontent_title', 10, 4);


/* GATHER ELEMENTS
/--------------------------*/
function WPSeed_elements() {
  ob_start('sanitize_output');
  if (have_rows('element_content')):
    while (have_rows('element_content')): the_row();
      if (get_row_layout() == 'text'): WPSeed_Text(); endif;
      if (get_row_layout() == 'gallery'): WPSeed_Gallery(); endif;
      if (get_row_layout() == 'seperator'): echo '<hr>'; endif;
    endwhile;
  endif;
  return ob_get_flush();
}


/* TEXT
/––––––––––––––––––––––––*/
function WPSeed_Text() {
  ob_start('sanitize_output') ?>
  <section class="text">
    <h2><?php the_sub_field('title') ?></h2>
    <a class="anchor" id="<?= slugify(get_sub_field('title')) ?>">&nbsp;</a>
    <?php the_sub_field('content') ?>
  </section>
  <?php return ob_get_flush();
}


/* GALLERY
/––––––––––––––––––––––––*/
function WPSeed_Gallery() {
  ob_start('sanitize_output') ?>
    <section class="gallery">
      <h2><?php the_sub_field('title') ?></h2>
      <a class="anchor" id="<?= slugify(get_sub_field('title')) ?>">&nbsp;</a>
      <?php if (have_rows('galleryimg')): ?>
        <ul>
          <?php while (have_rows('galleryimg')) : the_row(); ?>
            <?php $img = get_sub_field('img') ?>
            <li><img src="<?= $img['url'] ?>" /></li>
          <?php endwhile ?>
        </ul>
      <?php endif ?>
    </section>
  <?php return ob_get_flush();
}
?>
