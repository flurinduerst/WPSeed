<?
/**
 * The template for displaying all single posts and attachments
 *
 * @author         Flurin Dürst
 * @version        1.2.1
 * @since          WPegg 0.18
 */
?>

<? get_header(); ?>

<!--- content » single post --->

	<div class="content post">

		<? if (have_posts() ) : while (have_posts()) : the_post(); ?>
			<article>
				<h2><? the_title(); ?></h2>
				<div class="postinfo"><?= wpseed_get_the_date_german(); ?></div>
				<? the_post_thumbnail('medium'); ?>
				<? the_content(); ?>
				<? previous_post_link('<div class="postlink_prev>%link</div>'); ?>
				<? next_post_link('<div class="postlink_next>%link</div>'); ?>
			</article>
		<? endwhile; endif; ?>

	</div>

<? get_footer(); ?>
