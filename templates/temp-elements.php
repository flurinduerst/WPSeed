<?
/**
 * Template for ACF flexible elements
 *
 * @author      Flurin Dürst
 * @version     1.0.1
 * @since       WPSeed 0.10.0
 *
 */
?>
<? /* Template Name: Elements */ ?>

<? get_header(); ?>

<!-- content » elements -->

	<div class="content elements">

		<? if (have_posts()): while (have_posts()): the_post() ?>

			<? elements_teaser() ?>

			<? if (get_the_content() != ''): ?>
				<section class="text intro">
					<h1><? the_title(); ?></h1>
					<? the_content(); ?>
				</section>
			<? endif; ?>

			<? elements() ?>

		<? endwhile; endif ?>

	</div>

<? get_footer() ?>
