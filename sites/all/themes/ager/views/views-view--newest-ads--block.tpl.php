<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any.
 *
 * @ingroup views_templates
 */
?>
<div class="newest-ads">
  <div class="row">

    <!-- Iterate view rows -->
    <?php foreach ($newest_ads as $key => $value): ?>
    <div class="col-6 col-md-4 col-lg-3">
      <div class="individual-ad mb-3">

        <!-- display ad image -->
        <?php if ($newest_ads[$key]['image']): ?>
          <div class="image"><div class="adv-hover text-center">ad</div><?php print render($newest_ads[$key]['image']); ?></div>
        <?php endif; ?>
        <!-- /display ad image -->

        <div class="ad-cont p-3">
          <!-- display ad location -->
          <?php if ($newest_ads[$key]['location']): ?>
            <div class="address mb-3">
              <img class="mr-1" src="<?php print $base_url . '/sites/all/themes/ager/img/place.png'; ?>"><?php print render($newest_ads[$key]['location']); ?>
            </div>
          <?php endif; ?>
          <!-- /display ad location -->

          <!-- display ad title -->
          <?php if ($newest_ads[$key]['title']): ?>
            <div class="title mb-3"><?php print ($newest_ads[$key]['title']); ?></div>
          <?php endif; ?>
          <!-- /display ad title -->

          <!-- display ad price -->
          <?php if ($newest_ads[$key]['price']): ?>
            <div class="price"><?php print '$' . render($newest_ads[$key]['price']); ?></div>
          <?php endif; ?>
          <!-- /display ad price -->

          <div class="star"><i class="fa fa-star"></i></div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    <!-- /Iterate view rows -->

  </div>
</div>
