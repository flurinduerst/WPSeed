<?
/**
 * @author      Flurin Dürst
 * @version     1.2
 * @since       WPSeed 0.1
 */
?>

<? get_header(); ?>

<!--- content » index --->

  <div class="content">

    <? if (have_posts() ) : while (have_posts()) : the_post(); ?>

      <article>
        <h1><? the_title(); ?></h1>
        <? the_post_thumbnail('thumbnail'); ?>
        <? the_content(); ?>
      </article>

    <? endwhile; endif; ?>

  </div>

<? get_footer(); ?>
