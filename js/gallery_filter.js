jQuery(document).ready(function() {
  function gallery_filter(event) {
    jQuery('section#thumbs .thumbnail:visible').fadeOut('slow').promise().done(function() {
      var filter = '';
      jQuery('form .filter :checked').each(function() {
        if (jQuery(this).val()!=='') {
          filter += '.'+jQuery(this).val();
        }
      });
      jQuery('section#thumbs .thumbnail'+filter).fadeIn('slow');
    });
  }

  jQuery("select").selectmenu({
    change: gallery_filter
  });

  jQuery(':input.filter').on({
    change: gallery_filter
  });

  jQuery('div.filter :input').on({
    change: function() {
      jQuery(this).siblings('label').removeClass('current');
      jQuery(this).siblings('label[for='+jQuery(this).attr('id')+']').addClass('current');
      gallery_filter();
    }
  });
});
