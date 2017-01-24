<?
/**
 * @author      Flurin Dürst
 * @version     1.2.1
 * @since       WPSeed 0.1
 */
?>

<? get_header(); ?>

<!-- content » page -->

  <div class="content page">

    <? if (have_posts() ) : while (have_posts()) : the_post(); ?>
      <article>
        <h1><? the_title(); ?></h1>
        <? the_post_thumbnail('medium'); ?>
        <? the_content(); ?>
      </article>
    <? endwhile; endif; ?>

  </div>

<? get_footer(); ?>
