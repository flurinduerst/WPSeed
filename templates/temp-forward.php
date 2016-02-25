<?
/**
 * Template to forward to the first child-page
 *
 * @author 			Flurin Dürst
 * @version   		1.0
 * @since 			WPegg 0.4.0
 *
 */
?>
<? /* Template Name: Weiterleitung zu Unterseite */ ?>

<?
	$childpages = get_pages('child_of='.$post->ID.'&sort_column=menu_order');
	if ($childpages) {
		$firstchild = $childpages[0];
		wp_redirect(get_permalink($firstchild->ID));
	} else {
		// FallBack
	}
?>
