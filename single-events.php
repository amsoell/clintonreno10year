<?php
/**
 * Sample template for displaying single poster posts.
 * Save this file as as single-poster.php in your current theme.
 *
 * This sample code was based off of the Starkers Baseline theme: http://starkerstheme.com/
 */
setlocale(LC_MONETARY, 'en_US');
get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="colmask rightmenu">
  <div class="colleft">
    <section class="details col2">
      <h2><?php the_title(); ?></h2>
      <p><?php print_custom_field('summary:do_shortcode'); ?></p>
      <h3>Details</h3>
      <ul class="info">
        <li>
          <label>Size</label> <span><?php print_custom_field('size'); ?></span>
        </li>
        <li>
          <label>Date</label> <span><?php print_custom_field('date'); ?></span>
        </li>
        <li>
          <label>Client</label> <span><?php if (strlen(get_custom_field('clienturl'))>0): ?><a href="<?php print_custom_field('clienturl'); ?>"><?php endif; ?><?php print_custom_field('client'); ?><?php if (strlen(get_custom_field('clienturl'))>0): ?></a><?php endif; ?></span>
        </li>
        <li>
          <label>Stock</label> <span><?php if (get_custom_field('quantity')>0) : ?><?php print_custom_field('quantity'); ?> available<? else: ?>Sold Out<? endif; ?></span>
        </li>
      </ul>
<?php if (get_custom_field('quantity')>0) : ?>
      <aside class="cart">
        <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="business" value="sales@galaxyreno.com">
					<input type="hidden" name="lc" value="US">
					<input type="hidden" name="item_name" value="<?php echo htmlspecialchars(get_the_title())?>">
					<input type="hidden" name="amount" value="<?php print_custom_field('price'); ?>">
					<input type="hidden" name="currency_code" value="USD">
					<input type="hidden" name="no_note" value="1">
					<input type="hidden" name="no_shipping" value="2">
					<input type="hidden" name="on0" value="Item ID">
					<input type="hidden" name="os0" value="<?php echo htmlspecialchars(get_the_title()); ?>">
					<input type="hidden" name="rm" value="1">
					<input type="hidden" name="return" value="http://clintonreno.com/shop/success">
					<input type="hidden" name="cancel_return" value="http://clintonreno.com/shop/cancel">
					<input type="hidden" name="weight_unit" value="lbs">
					<input type="hidden" name="add" value="1">
					<span class="form-fields clearfix">
  					<span class="price"><?php print money_format("%n", get_custom_field('price')); ?></span>
							Qty: <input type="number" name="quantity" maxlength="2" value="1" min="1" class="inputField quantity">
						<input name="submit" type="submit" value="Add to Cart" class="inputButton">
					</span>
					<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
      </aside>
<?php endif; ?>
    </section>
  </div>
</div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>