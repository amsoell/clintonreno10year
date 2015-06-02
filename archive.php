<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package clintonreno10year
 */

get_header(); ?>



		<?php if ( have_posts() ) : ?>
      <div id="content" class="site-content">
        <div class="colmask leftmenu">
          <div class="colright">
            <div class="col1wrap">
		<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
            </div>
            <div class="col2">
              <?php get_sidebar('blog-index'); ?>
              <?php get_sidebar('blog'); ?>
            </div>
          </div>
        </div>
      </div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>



<?php get_footer(); ?>
