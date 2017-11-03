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

<!-- content » onepage -->

  <div class="content onepage">

    <?
    $args = array(
      'post_type' => 'page',
      'orderby'   => 'menu_order',
      'order'     => 'ASC'
    );
    ?>
    <?  $page_query = new WP_Query( $args ); ?>
    <?  while( $page_query->have_posts() ) : $page_query->the_post(); ?>

        <? if (basename(get_page_template()) != 'temp-onepage.php') : ?>
          <? if (basename(get_page_template()) == 'page.php') : ?>
            <? include(basename('wp-page.php')) ?>
          <? else : ?>
            <? include(basename(get_page_template())) ?>
          <? endif ?>
        <? endif ?>

    <?  endwhile ?>
    <?  wp_reset_postdata();?>

  </div>

<? get_footer(); ?>
