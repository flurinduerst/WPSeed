<?
/**
 * @author      Flurin Dürst
 * @version     1.3.4
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
      <article>
        <h1><? the_title(); ?></h1>
        <? the_content(); ?>
      </article>
    <? endwhile; ?>
  </section>

</main>

<? get_footer(); ?>
