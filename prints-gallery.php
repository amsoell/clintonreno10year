<?php
wp_enqueue_script('gallery_filter', get_template_directory_uri().'/js/gallery_filter.js', array('jquery'));
get_header();

$Q = new GetPostsQuery();

$prints = $Q->get_posts($args);

$years = array_unique(array_map(function ($a) { return date('Y', strtotime($a['date'])); }, $prints));
rsort($years);

$c = array_map(function ($a) { return preg_split('/[\["?,"?\]]+/', strtolower($a['colors_print']), -1, PREG_SPLIT_NO_EMPTY); }, $prints);
$colors = Array();
foreach ($c as $d) $colors = array_merge($colors, $d);
$colors = array_unique($colors);
asort($colors);

$c = array_map(function ($a) { return preg_split('/[\["?,"?\]]+/', ucwords(strtolower($a['subject'])), -1, PREG_SPLIT_NO_EMPTY); }, $prints);
$subjects = Array();
foreach ($c as $d) $subjects = array_merge($subjects, $d);
$subjects = array_unique($subjects);
asort($subjects);

?>
<form>
  <nav id="gallery-nav"><?php wp_nav_menu(array('menu'=>'Prints')); ?></nav>
  <div class="cart">
    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&business=sales@galaxyreno.com&display=1">View Cart</a>
  </div>
  <div id="gallery" class="colmask leftmenu">
    <div class="colright">
      <div class="col2 top">
        <div class="sortbox">
          <h2>Sort</h2>
          <hr />
          <div class="item">
            <label for="filter_year">Date</label>&nbsp;<select id="filter_year" class="filter">
              <option value="">All Time</option><?php array_map(function($a) { echo '<option value="year'.$a.'">'.$a.'</a>'; }, $years); ?>
            </select>
          </div>
          <hr />
          <div class="item">
              <label for="filter_color">Subject</label>&nbsp;<select id="filter_subject" class="filter">
              <option value="">All</option>
              <?php array_map(function ($a) { print '<option value="subject'.strtolower(preg_replace('/[^A-Za-z0-9]/', '', $a)).'">'.ucwords($a).'</option>'; }, $subjects); ?>
            </select>
          </div>
          <hr />
          <div class="item">
            <label for="filter_color">Color</label>&nbsp;<select id="filter_color" class="filter">
              <option value="">All</option>
              <?php array_map(function ($a) { print '<option value="color'.$a.'">'.ucfirst($a).'</option>'; }, $colors); ?>
            </select>
          </div>
          <hr />
          <div class="item">
            <label for="filter_availability">Availability</label>&nbsp;<select id="filter_availability" class="filter">
              <option value="">All</option>
              <option value="available">In Stock</option>
              <option value="unavailable">Out of Stock</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col1wrap">
        <section id="thumbs" class="col1">
<? foreach ($prints as $print) : if (! is_null($print)) : $print['colors_print'] = preg_split('/[\["?,"?\]]+/', $print['colors_print'], -1, PREG_SPLIT_NO_EMPTY); $print['subject'] = preg_split('/[\["?,"?\]]+/', $print['subject'], -1, PREG_SPLIT_NO_EMPTY); ?><div class="thumbnail year<?php echo date('Y',strtotime($print['date'])); ?> <?php if (((time() - strtotime($print['date']))/60/60/24)<14) echo "new"; ?>  <?php echo $print['type_print']; ?> <?php if ($print['quantity']>0):?>available<?php else: ?>unavailable<?php endif; ?> <?php if (is_array($print['colors_print'])) foreach ($print['colors_print'] as $color) echo 'color'.strtolower(str_replace(' ', '', $color)).' '; foreach ($print['subject'] as $subject) echo 'subject'.strtolower(preg_replace('/[^A-Za-z0-9]/', '', $subject)).' '; ?>"><a href="<?php echo $print['permalink']; ?>"><?php echo wp_get_attachment_image($print['thumbnail']); ?><aside><?php echo $print['post_title']; ?></aside></a><?php if (((time() - strtotime($print['date']))/60/60/24)<14) echo "<img src='/wp-content/themes/clintonreno10year/images/new.png' class='ribbon' />"; ?></div><?php endif; endforeach; ?>
        </section>
      </div>
    </div>
  </div>
</form>
<?php get_footer(); ?>