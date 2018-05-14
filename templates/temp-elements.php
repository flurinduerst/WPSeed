<?
/**
 * Template for ACF flexible elements
 *
 * @author      Flurin Dürst
 * @version     1.1
 * @since       WPSeed 0.10.0
 *
 */
?>
<? /* Template Name: Elements */ ?>

<? get_header(); ?>

<!-- content » elements -->

	<div class="content elements">

		<? if (have_posts()): while (have_posts()): the_post() ?>

			<? WPSeed_elements() ?>

		<? endwhile; endif ?>

	</div>

<? get_footer() ?>
