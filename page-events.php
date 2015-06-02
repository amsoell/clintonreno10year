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
$args = array();
$args = Array(
  'post_type' => 'events',
  'order' => 'DESC',
  'orderby' => 'date');
$events = $Q->get_posts($args);

?>
      <section id="events">
<? foreach ($events as $event) : if (! is_null($event)) : ?>
        <article>
          <?php echo wp_get_attachment_image($event['fullsize'], 'full'); ?>
          <h1 class="entry-title"><?php echo $event['post_title']; ?></h1>
          <div class="entry-meta"><?php echo $event['date'];?><?php if (strlen($event['enddate'])>0) : ?> &ndash; <?php echo $event['enddate']; ?><?php elseif (isset($event['time'])):?> &mdash; <?php echo $event['time']; ?><?php endif; ?><?php if (isset($event['venue'])) : ?> at <?php echo $event['venue']; ?><?php endif; ?></div>
          <aside><?php echo $event['summary']; ?></aside>
          <?php if (strlen($event['link'])>0) : ?>
            <p class="footnote">For more information visit <a href="<?php echo $event['link']; ?>"><?php echo $event['link']; ?></a></p>
          <?php endif; ?>
        </article>
<?php endif; endforeach; ?>
      </section>
<?php get_footer(); ?>
