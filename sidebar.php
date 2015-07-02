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
<?php
  //! Prints widget
  $args = Array(
    'post_type'   => 'prints',
    'order'       => 'DESC',
    'orderby'     => 'date');

  $Q = new GetPostsQuery();
  $prints = $Q->get_posts($args);

  if (count($prints)>0):
    $print = $prints[0];
?>
  <aside id="shortcode-widget-2" class="widget shortcode_widget">
    <h1 class="widget-title">Latest Print</h1>
    <div class="textwidget">
      <a href="<?php echo $print['permalink']; ?>"><?php echo wp_get_attachment_image($print['thumbnail']); ?></a></div>
  </aside>
<?php
  endif;

  //! Shirts widget
  $args = Array(
    'post_type'   => 'shirts',
    'order'       => 'DESC',
    'orderby'     => 'date');

  $Q = new GetPostsQuery();
  $shirts = $Q->get_posts($args);

  if (count($shirts)>0):
    $shirt = $shirts[0];
?>
  <aside id="shortcode-widget-2" class="widget shortcode_widget">
    <h1 class="widget-title">Latest Shirt</h1>
    <div class="textwidget">
      <a href="<?php echo $shirt['permalink']; ?>"><?php echo wp_get_attachment_image($shirt['thumbnail']); ?></a></div>
  </aside>
<?php
  endif;

  //! Events widget
  $args = Array(
    'post_type'   => 'events',
    'order'       => 'ASC',
    'orderby'     => 'cdate');

  $Q = new GetPostsQuery();
  $events = $Q->get_posts($args);

  $i = 0;
  do {
    $event = $events[$i++];
  } while (strtotime($event['date'])<time());
?>
  <aside id="shortcode-widget-2" class="widget shortcode_widget">
    <h1 class="widget-title">Upcoming Events</h1>
    <div class="textwidget">
      <a href="/events"><?php echo wp_get_attachment_image($event['fullsize'], 'full'); ?></a></div>
  </aside>
<?php

  // Theme widgets
  dynamic_sidebar( 'sidebar-1' );
?>
</ul><!-- #secondary -->
