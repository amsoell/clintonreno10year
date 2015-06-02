<?php
if ( ! class_exists( 'Easy_Instagram_Utils' ) ) :
	_e( 'Please install the Easy Instagram plugin.', 'Easy_Instagram' );
else :
	$ei_utils = new Easy_Instagram_Utils();
	$kses_author = array(
		'a' => array( 'href' => array(), 'title' => array(), 'target' => array() )
	);


?>
<h1 class="widget-title">Latest Instagram</h1>
<?php foreach ( $easy_instagram_elements as $element ) : ?>
<div class="textwidget"><a href="<?php echo $element['thumbnail_link_url']; ?>" style="background-image: url('<?php echo $element['thumbnail_url']; ?>'); background-position: top center;"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Transparent.gif" width="222" height="156"></a></div>
<?php endforeach; ?>
<?php endif; ?>