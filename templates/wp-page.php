<?
/**
 * @author         Flurin Dürst
 * @version        1.1
 * @since          WPegg 0.1
 */
?>

<? get_header(); ?>

<!--===== CONTENT - page =====-->
	<div class="content page">

		<? if (have_posts() ) : while (have_posts()) : the_post(); ?>

			<section>
				<h1><? the_title(); ?></h1>
				<? the_post_thumbnail('medium'); ?>
				<? the_content(); ?>
			</section>

		<? endwhile; endif; ?>

	</div>

<? get_footer(); ?>
