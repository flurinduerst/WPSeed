<?
/**
 * The template displaying the posts-overview
 *
 * @author         Flurin Dürst
 * @version        1.02
 * @since          WPegg 0.18
 */

?>

<? get_header(); ?>

<!--===== CONTENT - Blog Home =====-->
	<div class="content blog">

		<? if (have_posts() ) : while (have_posts()) : the_post(); ?>
			<article class="fcf">
				<h2><? the_title(); ?></h2>
				<div class="postinfo"><?= wpegg_get_the_date_german(); ?></div>
				<? the_post_thumbnail('large'); ?>
				<? the_content(); ?>
			</article>
		<? endwhile; endif; ?>


	</div>

<? get_footer(); ?>
