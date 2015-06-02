<?php
/**
 * @package clintonreno10year
 */
?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('col1'); ?>>
        	<header class="entry-header">
        		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

        		<?php if ( 'post' == get_post_type() ) : ?>
        		<div class="entry-meta">
        			<?php clintonreno10year_posted_on(); ?><br />
              <?php clintonreno10year_entry_footer(); ?>
        		</div><!-- .entry-meta -->
        		<?php endif; ?>
        	</header><!-- .entry-header -->

        	<div class="entry-content">
        		<?php
        			/* translators: %s: Name of current post */
        			the_content( sprintf(
        				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'clintonreno10year' ),
        				the_title( '<span class="screen-reader-text">"', '"</span>', false )
        			) );
        		?>

        		<?php
        			wp_link_pages( array(
        				'before' => '<div class="page-links">' . __( 'Pages:', 'clintonreno10year' ),
        				'after'  => '</div>',
        			) );
        		?>
        	</div><!-- .entry-content -->

        	<footer class="entry-footer">
        		<?php clintonreno10year_entry_footer(); ?>
        	</footer><!-- .entry-footer -->
        </article>