<?php
/**
 * Functions to output ACF flexible elements.
 * WPSeed_Text and WPSeed_Gallery are placeholder presets.
 *
 * @author     Flurin Dürst
 * @version    1.0
 * @since      WPSeed 0.10.0
 *
 */


/* GATHER ELEMENTS
/--------------------------*/
function elements() {
  ob_start('sanitize_output');
  if (have_rows('elements')):
    while (have_rows('elements')): the_row();
      if (get_row_layout() == 'text'): WPSeed_Text(); endif;
      if (get_row_layout() == 'gallery'): WPSeed_Gallery(); endif;
      if (get_row_layout() == 'seperator'): echo '<hr>'; endif;
    endwhile;
  endif;
  return ob_get_flush();
}

/* TEXT
/------------------------*/
function WPSeed_Text() {
  ob_start('sanitize_output') ?>
  <section class="text">
    <h2><? the_sub_field('title') ?></h2>
    <? the_sub_field('content') ?>
  </section>
  <? return ob_get_flush();
}

/* GALLERY
/------------------------*/
function WPSeed_Gallery() {
  ob_start('sanitize_output') ?>
    <section class="gallery">
      <h2><? the_sub_field('title') ?></h2>
      <? if (have_rows('galleryimg')): ?>
        <ul>
          <? while (have_rows('galleryimg')) : the_row(); ?>
            <? $img = get_sub_field('img') ?>
            <li><img src="<?= $img['url'] ?>" /></li>
          <? endwhile ?>
        </ul>
      <? endif ?>
    </section>
  <? return ob_get_flush();
}
?>
