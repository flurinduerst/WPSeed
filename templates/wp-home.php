<?
/**
 * The template displaying the posts-overview
 *
 * @author      Flurin Dürst
 * @version     1.4.1
 * @since       WPSeed 0.18
 */

?>

<? get_header(); ?>

<!-- content » blog home -->

  <div class="content blog">

    <? if (have_posts() ) : while (have_posts()) : the_post(); ?>
      <article>
        <h2><? the_title(); ?></h2>
        <div class="postinfo"><?= get_the_date_german(); ?></div>
          <? if (has_post_thumbnail()) : ?>
          <div class="thumbnail" style="background-image: url(<? the_post_thumbnail_url() ?>)"></div>
          <? endif ?>
        <? the_content(); ?>
      </article>
    <? endwhile; endif; ?>

  </div>

<? get_footer(); ?>
