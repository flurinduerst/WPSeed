<?
/**
 * Template for the Home-Site.
 *
 * @author 			Flurin Dürst
 * @version   		1.0
 * @since 			WPegg 0.2
 *
 */
?>
<? /* Template Name: Home */ ?>

	<? get_header(); ?>

	<!--===== CONTENT - Home =====-->

		<div class="teaser" style="background-image: url(<? the_post_thumbnail_url('large', $post->ID) ?>)"></div>

		<div class="content home">

			<? if (have_posts() ) : while (have_posts()) : the_post(); ?>

				<section>
					<h1><? the_title(); ?></h1>
					<? the_content(); ?>
				</section>

			<? endwhile; endif; ?>

		</div>

	<? get_footer(); ?>
