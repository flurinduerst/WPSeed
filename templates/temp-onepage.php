<?
/**
 * OnePage Template
 * use this as front-page to show all pages within their respective template in one page
 *
 * @author      Flurin Dürst
 * @version     1.0
 * @since       WPSeed 0.9.0
 */
?>
<? /* Template Name: OnePage-Index */ ?>

<? get_header(); ?>

  <?
  $args = array(
    'post_type' => 'page',
    'orderby'   => 'menu_order',
    'order'     => 'ASC',
    'offset'     => '1'
  );
  ?>
  <?  $page_query = new WP_Query( $args ); ?>
  <?  while( $page_query->have_posts() ) : $page_query->the_post(); ?>

      <? include(basename(get_page_template())) ?>

  <?  endwhile ?>
  <?  wp_reset_postdata();?>

<? get_footer(); ?>
