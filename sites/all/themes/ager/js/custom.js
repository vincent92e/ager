/**
 * @file
 * Javascript for ninesixtyrobots theme.
 */
(function ($) {

// Prefill the search box with Search... text.
Drupal.behaviors.ninesixtyrobots = {
  attach: function (context) {

    jQuery('.featured .individual-ad, .listings-content .individual-ad, .rand-ads').hover(function (e) {
      if (e.type === 'mouseenter') {
        jQuery('.adv-hover', this).css('display', 'block');
        //jQuery('.fa', this).attr('style', 'border-color: #1dd2af');
      }
      if (e.type === 'mouseleave') {
        jQuery('.adv-hover', this).css('display', 'none');
        //jQuery('.fa', this).attr('style', 'border-color: #ffffff');
      }
    });

    // Add form-inline class to subscribe form element
    jQuery('#subscribe-form div').addClass('form-inline');
    //jQuery('#edit-field-category :first-child').attr('selected', 'selected');

    jQuery('.block-facetapi h2').click(function() {
        jQuery(this).siblings('.content').children('.item-list').toggle();
    });
  }
};

})(jQuery);
