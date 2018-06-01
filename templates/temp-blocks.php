<?
/**
 * Template for ACF flexible elements
 *
 * @author      Flurin Dürst
 * @version     1.2
 * @since       WPSeed 0.10.0
 *
 * was 'temp-elements' until 1.2
 *
 */
?>
<? /* Template Name: Blocks */ ?>

<? get_header(); ?>

<main id="blocks">

  <? if (have_posts()): while (have_posts()): the_post() ?>

    <? WPSeed_blocks() ?>

  <? endwhile; endif ?>

</main>

<? get_footer() ?>
