<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package clintonreno10year
 */

if ( ! is_active_sidebar( 'sidebar-blog-index' ) ) {
	return;
}
?>

<ul class="sidebar">
	<?php dynamic_sidebar( 'sidebar-blog-index' ); ?>
</ul><!-- #secondary -->
