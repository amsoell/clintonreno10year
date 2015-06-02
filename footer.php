<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package clintonreno10year
 */
?>

	</div><!-- #content -->
<?php wp_footer(); ?>
  <footer>
  <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?> <em><nobr>all content &copy; 2005&mdash;<?php print date('Y'); ?> Clinton Reno unless otherwise noted</nobr></em>
  <?php wp_nav_menu( array( 'theme_location' => 'socialmedia' ) ); ?>
  </footer>
</div><!-- #page -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1828049-9', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
