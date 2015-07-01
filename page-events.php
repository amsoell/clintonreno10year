<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package clintonreno10year
 */

get_header();

$Q = new GetPostsQuery();

$args = Array(
  'post_type'   => 'events',
  'order'       => 'ASC',
  'orderby'     => 'cdate');

$events = $Q->get_posts($args);
$upcomingEvents = "";
$pastEvents = "";
?>
      <section id="events">
<?
  foreach ($events as $event) {
    if (! is_null($event)) {
      if (strlen($event['enddate'])>0) {
        // has an end date
        if (date("F Y", strtotime($event['date']))==date("F Y", strtotime($event['enddate']))) {
          // same month
          $event_displaydate = date("F j", strtotime($event['date'])) .'&ndash;'.date("j, Y", strtotime($event['enddate']));
        } else {
          // different month
          $event_displaydate = date("F j", strtotime($event['date'])) .'&ndash;'.date("F j, Y", strtotime($event['enddate']));
        }
      } else {
        $event_displaydate = date("F j, Y", strtotime($event['date']));
      }

      $event_fullsize = wp_get_attachment_image($event['fullsize'], 'full');
      $event_title = $event['post_title'];
      $event_summary = $event['summary'];
      $event_timestamp = strtotime($event['date']);
      if (strlen($event['venue'])>0) {
        $event_venue = "&bullet; " . $event['venue'] . "<br />";
      } else {
        $event_venue = "";
      }
      if (strlen($event['time'])>0) {
        $event_time = "&bullet; " . $event['time'] . "<br />";
      } else {
        $event_time = "";
      }
      if (strlen($event['link'])>0) {
        $event_link = '<p class="footnote">For more information visit <a href="'.$event['link'].'">'.$event['link'].'</a></p>';
      } else {
        $event_link = "";
      }
      $event_layout = <<<EOF
          <article>
            $event_fullsize
            <h1 class="entry-title">$event_title</h1>
            <div class="entry-meta">$event_displaydate<br />
            $event_venue
            $event_time
            <aside>$event_summary</aside>
            $event_link
          </article>
EOF;
      if (strtotime($event['date'])>time()) {
        // future event
        $upcomingEvents .= $event_layout;
      } else {
        $pastEvents = $event_layout.$pastEvents;
      }
    }
  }

print '<h1>Upcoming events</h1>';
print $upcomingEvents;
print '<br /><br /><hr style="clear:both; margin-top:20px;" />';
print '<h1>Past events</h1>';
print $pastEvents;
?>
      </section>
<?php get_footer(); ?>
