<?
/**
 * @author      Flurin Dürst
 * @version     1.3.3
 * @since       WPSeed 0.1
 */
?>

<? get_header(); ?>

<main id="page">

  <? if (has_post_thumbnail()) : ?>
    <section>
      <div class="element teaser">
        <? the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
      </div>
    </section>
  <? endif?>

  <section>
    <? while (have_posts()) : the_post(); ?>
      <div class="element text">
        <h1><? the_title(); ?></h1>
        <? the_content(); ?>
      </div>
    <? endwhile; ?>
  </section>

</main>

<? get_footer(); ?>
