<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package clintonreno10year
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<ul class="latest">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</ul><!-- #secondary -->
