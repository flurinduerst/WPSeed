<?
/**
 * Shows a Navigation with all sibling-sites
 * adds class 'active' to current li
 *
 * @author 			Flurin Dürst
 * @version   		1.0
 * @since 			WPegg 0.5.0
 *
 */
?>
<?
	// get parent items for subnav
	$args          = [
	'post_type'      => 'page',
	'posts_per_page' => -1,
	'post_parent'    => $post->post_parent,
	'order'          => 'ASC',
	'orderby'        => 'menu_order'
	 ];
	$parent         = new WP_Query( $args );

	// get current page ID for active subnav
	$current_page_id = $post->ID;
?>

<? if ( $parent->have_posts() ) : ?>
<ul>
	<? while ( $parent->have_posts() ) : $parent->the_post(); ?>
			<a href="<? the_permalink() ?>"><li<?= ($post->ID == $current_page_id ? ' class="active"' : '') ?>><? the_title(); ?></li></a>
	<? endwhile; ?>
</ul>
<? endif; wp_reset_query(); ?>
