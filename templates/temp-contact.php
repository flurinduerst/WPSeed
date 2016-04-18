<?
/**
 * Template with an API-configured Google Map
 *
 * @author			Flurin Dürst
 * @version			1.2
 * @since			WPegg 0.13
 *
 */
?>

<? /* Template Name: Contact */ ?>

<? get_header(); ?>

<!--- content » map --->

	<div id="map" class="map"></div>

	<div class="content contact">

		<? if (have_posts() ) : while (have_posts()) : the_post(); ?>
			<article>
				<h1><? the_title(); ?></h1>
				<? the_post_thumbnail('thumbnail'); ?>
				<? the_content(); ?>
			</article>
		<? endwhile; endif; ?>

	</div>

<? get_footer(); ?>
