<?
/**
 * @author         Flurin Dürst
 * @version        1.1
 * @since          WPegg 0.1
 */
?>

<? get_header(); ?>

<!--===== CONTENT - index =====-->
	<div class="content">

		<? if (have_posts() ) : while (have_posts()) : the_post(); ?>

			<article>
				<h1><? the_title(); ?></h1>
				<? the_post_thumbnail('thumbnail'); ?>
				<? the_content(); ?>
			</article>

		<? endwhile; endif; ?>

	</div><!--/.content -->

<? get_footer(); ?>
