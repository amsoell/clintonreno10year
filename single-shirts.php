<?php
/**
 * Sample template for displaying single poster posts.
 * Save this file as as single-poster.php in your current theme.
 *
 * This sample code was based off of the Starkers Baseline theme: http://starkerstheme.com/
 */
setlocale(LC_MONETARY, 'en_US');
get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); $img = get_custom_field('fullsize:to_image_array'); ?>
<nav id="gallery-nav"><?php wp_nav_menu(array('menu'=>'Shirts')); ?></nav>
<div class="cart">
  <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&business=sales@galaxyreno.com&display=1">View Cart</a>
</div>
<div id="gallery" class="colmask leftmenu">
  <div class="colright">
    <div class="details col2 top">
      <div class="sortbox">
        <h2><?php the_title(); ?></h2>
        <?php print_custom_field('summary:do_shortcode'); ?>
        <?php get_template_part('social'); ?>
        <?php if (get_custom_field('forsale')>0) : ?>
        <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
          <ul class="info">
            <?php if (strlen(get_custom_field('shirt_print'))>0) : ?>
            <li>
              <label>Original print</label> <span><?php print_custom_field('shirt_print'); ?></span>
            </li>
            <?php endif; ?>
            <li>
              <label>Size</label>
              <span>
                <select name="os1">
        					<option value=""></option>
        					<?php if (get_custom_field('type_shirt')=='kid') : ?>
        					<option value="Kid's 2T">Kid's 2T</option>
        					<option value="Kid's 4T">Kid's 4T</option>
        					<option value="Kid's 6">Kid's 6</option>
        					<option value="Kid's 8">Kid's 8</option>
        					<option value="Kid's 10">Kid's 10</option>
        					<option value="Kid's 12">Kid's 12</option>
        					<?php else: ?>
        					<optgroup label="Mens">
        					  <option value="Men's Medium">Medium</option>
        					  <option value="Men's Large">Large</option>
        					  <option value="Men's XL">X-Large</option>
        					  <option value="Men's XXL">2X-Large</option>
        					</optgroup>
        					<optgroup label="Womens">
        					  <option value="Women's XS">X-Small</option>
        					  <option value="Women's Small">Small</option>
        					  <option value="Women's Medium">Medium</option>
        					  <option value="Women's Large">Large</option>
        					  <option value="Women's XL">X-Large</option>
        					</optgroup>
        					<?php endif; ?>
      					</select>
              </span>
            </li>
            <li>
              <label>Quantity</label>
              <span><input type="number" name="quantity" maxlength="2" value="1" min="1" class="inputField quantity"></span>
            </li>
          </ul>

          <aside class="cart">
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
  					<input type="hidden" name="on1" value="Size">
  					<input type="hidden" name="rm" value="1">
  					<input type="hidden" name="return" value="http://clintonreno.com/shop/success">
  					<input type="hidden" name="cancel_return" value="http://clintonreno.com/shop/cancel">
  					<input type="hidden" name="weight_unit" value="lbs">
  					<input type="hidden" name="add" value="1">
  					<span class="form-fields clearfix">
    					<span class="price"><?php print money_format("%n", get_custom_field('price')); ?></span>
  						<input name="submit" type="submit" value="Add to Cart" class="inputButton">
  					</span>
  					<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
          </aside>
        </form>
        <?php endif; ?>
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