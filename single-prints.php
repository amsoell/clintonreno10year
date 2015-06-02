<?php
/**
 * Sample template for displaying single poster posts.
 * Save this file as as single-poster.php in your current theme.
 *
 * This sample code was based off of the Starkers Baseline theme: http://starkerstheme.com/
 */
setlocale(LC_MONETARY, 'en_US');
add_thickbox();
get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); $img = get_custom_field('fullsize:to_image_array'); $detailimages = get_custom_field('detailimages:to_image_array'); ?>

<nav id="gallery-nav"><?php wp_nav_menu(array('menu'=>'Prints')); ?></nav>
<div class="cart">
  <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&business=sales@galaxyreno.com&display=1">View Cart</a>
</div>
<div id="gallery" class="colmask leftmenu">
  <div class="colright">
    <div class="col2 top details">
      <div class="sortbox">
        <h2><?php the_title(); ?></h2>
        <?php print_custom_field('summary:do_shortcode'); ?>
        <?php get_template_part('social'); ?>
        <?php if(is_array(get_custom_field('subject'))) : ?>
        <div>
          <label>Tags</label> <span class="value"><?php echo implode(', ', get_custom_field('subject')); ?></span>
        </div>
        <hr />
        <?php endif; ?>
        <div>
          <label>Size</label> <span class="value"><?php print_custom_field('size'); ?></span>
        </div>
        <hr />
        <div>
          <label>Date</label> <span class="value"><?php print_custom_field('date'); ?></span>
        </div>
        <hr />
        <div>
          <label>Client</label> <span class="value"><?php if (strlen(get_custom_field('clienturl'))>0): ?><a href="<?php print_custom_field('clienturl'); ?>"><?php endif; ?><?php print_custom_field('client'); ?><?php if (strlen(get_custom_field('clienturl'))>0): ?></a><?php endif; ?></span>
        </div>
        <hr />
        <?php if(is_array(get_custom_field('colors_print'))) : ?>
        <div>
          <label>Colors</label> <span class="value"><?php echo implode(', ', get_custom_field('colors_print')); ?></span>
        </div>
        <hr />
        <?php endif; ?>
        <div>
          <label>Stock</label> <span class="value"><?php if (get_custom_field('quantity')>0) : ?><?php print_custom_field('quantity'); ?> available<? else: ?>Sold Out<? endif; ?></span>
        </div>
      </div>
      <?php if (get_custom_field('quantity')>0) : ?>
      <aside class="cart">
        <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="business" value="sales@galaxyreno.com">
					<input type="hidden" name="lc" value="US">
					<input type="hidden" name="item_name" value="<?php echo htmlspecialchars(get_the_title()); ?>">
					<input type="hidden" name="item_number" value="<?php echo htmlspecialchars(get_custom_field('itemid'))?>">
					<input type="hidden" name="amount" value="<?php print_custom_field('price'); ?>">
					<input type="hidden" name="currency_code" value="USD">
					<input type="hidden" name="no_note" value="1">
					<input type="hidden" name="no_shipping" value="2">
					<input type="hidden" name="on0" value="Item ID">
					<input type="hidden" name="os0" value="<?php echo htmlspecialchars(get_custom_field('itemid'))?>">
					<input type="hidden" name="rm" value="1">
					<input type="hidden" name="return" value="http://clintonreno.com/shop/success">
					<input type="hidden" name="cancel_return" value="http://clintonreno.com/shop/cancel">
					<input type="hidden" name="weight_unit" value="lbs">
					<input type="hidden" name="add" value="1">
					<span class="form-fields clearfix">
  					<span class="price"><?php print money_format("%n", get_custom_field('price')); ?></span><br />
							Qty: <input type="number" name="quantity" maxlength="2" value="1" min="1" class="inputField quantity"><br />
						<input name="submit" type="submit" value="Add to Cart" class="inputButton">
					</span>
					<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
      </aside>
      <?php endif; ?>
      <div class="detailimages">
        <?php foreach ($detailimages as $detailimage) : if (is_array($detailimage)) : ?>
        <span class="thumb"><a href="<?php echo $detailimage[0]; ?>?width=<?php echo $detailimage[1]; ?>&height=<?php echo $detailimage[2]+29; ?>" class="thickbox"><img src="<?php echo $detailimage[0]; ?>" /></a></span>
        <?php endif; endforeach; ?>
      </div>
    </div>
    <div class="col1wrap">
      <section id="thumbs" class="single col1">
        <a href="<?php echo $img[0]; ?>?width=<?php echo $img[1];?>&height=<?php echo $img[2]+29;?>" class="thickbox"><img src="<?php echo $img[0]; ?>" class="fullsize" /></a>
      </section>
    </div>
  </div>
</div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>