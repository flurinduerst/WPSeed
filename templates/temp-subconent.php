<?
/**
 * Template for Sites with Sub-Sites.
 *
 * @author      Flurin Dürst
 * @version     1.2
 * @since       WPSeed 0.2
 *
 */
?>
<? /* Template Name: Subcontent */ ?>

<? get_header(); ?>

<!--- content » subcontent --->

  <div class="content subcontent">

    <div class="summary">
      <p><? the_content(); ?><p>
    </div>

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
        <section>
          <img src="<? $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(250,250), false); echo $thumbnail[0]; ?>">
          <h2><? the_title(); ?></h2>
          <p><? the_content(); ?></p>
        </section>
      <? endwhile; ?>
    <? endif; wp_reset_query(); ?>

  </div>

<? get_footer(); ?>
