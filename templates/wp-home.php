<?
/**
 * The template displaying the posts-overview
 *
 * @author      Flurin Dürst
 * @version     1.5.2
 * @since       WPSeed 0.18
 */

?>

<? get_header() ?>

  <main id="blog">

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
