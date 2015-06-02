<?php
wp_enqueue_script('gallery_filter', get_template_directory_uri().'/js/gallery_filter.js', array('jquery'));
get_header();

$Q = new GetPostsQuery();
$shirts = $Q->get_posts($args);

$years = array_unique(array_map(function ($a) { return date('Y', strtotime($a['date'])); }, $shirts));
rsort($years);

$c = array_map(function ($a) { return preg_split('/[\["?,"?\]]+/', ucwords(strtolower($a['subject'])), -1, PREG_SPLIT_NO_EMPTY); }, $shirts);
$subjects = Array();
foreach ($c as $d) $subjects = array_merge($subjects, $d);
$subjects = array_unique($subjects);
asort($subjects);

?>
<form>
  <nav id="gallery-nav"><?php wp_nav_menu(array('menu'=>'Shirts')); ?></nav>
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
            <label for="filter_year">Year</label>&nbsp;<select id="filter_year" class="filter">
            <option value="">All Time</option><?php array_map(function($a) { echo '<option value="year'.$a.'">'.$a.'</a>'; }, $years); ?>
            </select>
          </div>
          <hr />
          <div class="item">
            <label for="filter_color">Collection</label>&nbsp;<select id="filter_collection" class="filter">
              <option value="">All</option>
              <?php array_map(function ($a) { print '<option value="collection'.strtolower(preg_replace('/[^A-Za-z0-9]/', '', $a)).'">'.ucwords($a).'</option>'; }, $subjects); ?>
              </select>
          </div>
        </div>
      </div>
      <div class="col1wrap">
        <section id="thumbs" class="col1">
<? foreach ($shirts as $shirt) : if (! is_null($shirt)) : $shirt['subject'] = preg_split('/[\["?,"?\]]+/', $shirt['subject'], -1, PREG_SPLIT_NO_EMPTY); ?>
          <span class="thumbnail year<?php echo date('Y',strtotime($shirt['date'])); ?> <?php echo $shirt['type_shirt']; ?> <?php foreach ($shirt['subject'] as $subject) echo 'collection'.strtolower(preg_replace('/[^A-Za-z0-9]/', '', $subject)).' ';?>">
            <a href="<?php echo $shirt['permalink']; ?>">
              <?php echo wp_get_attachment_image($shirt['thumbnail']); ?>
              <aside><?php echo $shirt['post_title']; ?></aside>
            </a>
          </span>
<?php endif; endforeach; ?>
        </section>
      </div>
    </div>
  </div>
</form>
<?php get_footer(); ?>
