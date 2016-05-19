<?
/**
 * Shows a Navigation with all sibling-sites
 * adds class 'active' to current li
 *
 * @author			Flurin Dürst
 * @version			1.0
 * @since			WPSeed 0.5.0
 *
 */
?>
<?
	// get siblings for subnav
	$args = [
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'post_parent'    => $post->post_parent,
		'order'          => 'ASC',
		'orderby'        => 'menu_order'
	];
	$query = new WP_Query( $args );

	// get current_page_id to determinate active subnav
	$current_page_id = $post->ID;
?>

<? if ( $query->have_posts() ) : ?>
	<ul>
		<? while ( $query->have_posts() ) : $query->the_post(); ?>
			<a href="<? the_permalink() ?>"><li<?= ($post->ID == $current_page_id ? ' class="active"' : '') ?>><? the_title(); ?></li></a>
		<? endwhile; ?>
	</ul>
<? endif; wp_reset_query(); ?>
