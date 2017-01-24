<?
/**
 * Template for the Home-Site containing a teaser-image.
 *
 * @author      Flurin Dürst
 * @version     1.1.1
 * @since       WPSeed 0.2
 *
 */
?>
<? /* Template Name: Home */ ?>

<? get_header(); ?>

<!-- content » home -->

  <div class="teaser" style="background-image: url(<? the_post_thumbnail_url('large', $post->ID) ?>)"></div>

  <div class="content home">

    <? if (have_posts() ) : while (have_posts()) : the_post(); ?>
      <article>
        <h1><? the_title(); ?></h1>
        <? the_content(); ?>
      </article>
    <? endwhile; endif; ?>

  </div>

<? get_footer(); ?>
