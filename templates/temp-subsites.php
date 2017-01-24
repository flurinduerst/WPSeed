<?
/**
 * Template for Sites with Sub-Sites.
 *
 * @author      Flurin Dürst
 * @version     1.4.1
 * @since       WPSeed 0.2
 *
 */
?>
<? /* Template Name: Subsites */ ?>

<? get_header(); ?>

<!-- content » subsites -->

  <div class="content subsites">

    <? if (have_posts() ) : while (have_posts()) : the_post(); ?>
      <div class="summary">
        <h1><? the_title(); ?></h1>
        <p><? the_content(); ?><p>
      </div>
    <? endwhile; endif; ?>

    <? // Child Pages
    $args = [
      'post_type'      => 'page',
      'posts_per_page' => -1,
      'post_parent'    => $post->ID,
      'order'          => 'ASC',
      'orderby'        => 'menu_order'
     ];
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : ?>
      <? while ( $query->have_posts() ) : $query->the_post(); ?>

        <article>
          <h2><? the_title(); ?></h2>
          <? if (has_post_thumbnail()) : ?>
            <div class="thumbnail" style="background-image: url(<? the_post_thumbnail_url() ?>)"></div>
          <? endif ?>
          <p><? the_content(); ?></p>
        </article>

      <? endwhile; ?>
    <? endif; wp_reset_query(); ?>

  </div>

<? get_footer(); ?>
