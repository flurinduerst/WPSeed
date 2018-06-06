<?
/**
 * Article Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it get's included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      Flurin Dürst
 * @version     1.0.2
 * @since       WPSeed 2.0
 *
 */
 ?>

<section>

  <article>

    <?php
    $image = get_sub_field('image')['ID'];
    if ($image) :
      echo wp_get_attachment_image( $image, 'large', "", ['class' => 'modernizr-of']);
    endif;
    ?>

    <div class="text">
      <h2><? the_title(); ?></h2>
      <a class="anchor" id="<?= slugify(get_sub_field('title')) ?>">&nbsp;</a>
      <?php the_sub_field('content') ?>
    </div>

  </article>

</section>
