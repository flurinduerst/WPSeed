<?
/**
 * @author      Flurin Dürst
 * @version     1.4.1
 * @since       WPSeed 0.1
 */
?>

<? get_header() ?>

<main id="page">

  <section>
    <? while (have_posts()) : the_post() ?>
      <article>
        <h1><? the_title() ?></h1>
        <? the_content() ?>
      </article>
    <? endwhile; ?>
  </section>

</main>

<? get_footer() ?>
