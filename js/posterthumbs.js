var $j = jQuery.noConflict();

$j(document).ready(function() {
  $j('section#thumbs .thumbnail').hover(function() {
    $j(this).find('aside').slideDown(200);
  }, function() {
    $j(this).find('aside').slideUp();
  });
});