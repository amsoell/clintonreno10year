<?php
/**
 * The template for displaying all single posts.
 *
 * @package clintonreno10year
 */

get_header(); ?>
<div id="content" class="site-content">
  <div class="colmask leftmenu">
    <div class="colright">
      <div class="col1wrap">
        <section class="col1">
      		<?php while ( have_posts() ) : the_post(); ?>
      			<?php get_template_part( 'content', 'single' ); ?>
      			<?php the_post_navigation(); ?>
      		<?php endwhile; // end of the loop. ?>
        </section>
      </div>
      <div class="col2 bottom">
        <?php get_sidebar('blog'); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
