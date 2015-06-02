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

$args = Array(
  'post_type' => 'prints',
  'order' => 'DESC',
  'orderby' => 'date',
  'type_print' => 'art');
include("prints-gallery.php");
?>
