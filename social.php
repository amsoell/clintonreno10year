<div class="social">
  <div class="fb-like" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
  <div class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo htmlentities('Check out this awesome '.substr(get_post_type( $post ), 0, -1).': "'.get_the_title().'" by Clinton Reno'); ?>" data-via="mr_reno" data-related="mr_reno" data-count="none">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></div>
  <div class="pinterest">
    <a href="//www.pinterest.com/pin/create/button/?url=<?php echo urldecode(get_custom_field('permalink')); ?>&media=<?php echo urlencode($img[0]); ?>&description=<?php echo urlencode('"'.get_the_title().'" by Clinton Reno'); ?>" data-pin-do="buttonPin" data-pin-config="beside" data-pin-color="red"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a>
    <!-- Please call pinit.js only once per page -->
    <script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
  </div>
</div>
