<?
/**
 * The template for displaying all single posts and attachments
 *
 * @author      Flurin Dürst
 * @version     1.3.2
 * @since       WPegg 0.18
 */
?>

<? get_header() ?>

<main id="post">

  <section>
    <? if (have_posts() ) : while (have_posts()) : the_post() ?>
      <article>
        <h2><? the_title() ?></h2>
        <div class="postinfo"><?= get_the_date_german() ?></div>
        <? the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
        <? the_content() ?>
      </article>
    <? endwhile; endif; ?>
  </section>

</main>

<? get_footer() ?>
