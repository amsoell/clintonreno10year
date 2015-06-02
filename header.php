<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package clintonreno10year
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="<?php echo the_title('Clinton Reno: '); ?>">
<?php if (have_posts()) : ?>
<?php   while (have_posts()) : the_post(); $img = get_custom_field('fullsize:to_image_array'); ?>
<meta property="og:image" content="<?php echo $img[0]; ?>">
<meta property="og:description" content="<?php echo htmlentities(strip_tags(get_custom_field('summary'))) ?>">
<meta property="og:url" content="<?php get_custom_field('permalink') ?>">
<?php   endwhile; ?>
<?php  endif; ?>
<meta property="og:type" content="website">
<meta property="og:locale" content="en_us">
<meta property="og:site_name" content="Clinton Reno">
<meta property="fb:admins" 	content="594333035,540138872">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Abel" type="text/css">
<link rel="author" href="/humans.txt" />
<?php wp_enqueue_script("jquery"); ?>
<?php wp_enqueue_script("jquery-ui-core"); ?>
<?php wp_enqueue_script("jquery-ui-selectmenu"); ?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/ui-theme.css" type="text/css">
<?php wp_head(); ?>
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/posterthumbs.js"></script>
</head>

<body <?php body_class(); ?>>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1543133759279832&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <div id="page" class="hfeed site">
    <header>
      <a href="/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" alt="Clinton Reno" id="logo" /></a>
      <div class="<?php echo get_post_type( $post ); ?>">
        <nav id="primary"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></nav>
      </div>
    </header>
   	<div id="content" class="site-content">