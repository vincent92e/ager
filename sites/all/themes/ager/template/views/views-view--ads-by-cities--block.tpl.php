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
<div class="ads-by-cities">
  <div class="container">
    <div class="row">

      <div class="col-sm-10 ml-auto mr-auto">
        <div class="cities-container">
          <h2 class="text-center">Browse by cities</h2>
          <p class="text-center">Checkout the most popular searches by <span class="custom">cities</span></p>
          <div class="row mb-3">

            <!-- Iterate view rows -->
            <?php foreach ($ads_by_cities as $key => $value): ?>

              <!-- display content for first three rows -->
              <?php if ($key <= 2): ?>
                <div class="col-md-6 col-lg-4 city mb-3">
                  <?php if ($ads_by_cities): ?>
                    <div class="individual-city">
                      <div class="image"><?php print render($ads_by_cities[$key]['image']);?></div>
                      <div class="combined-cont">
                        <div class="city mb-1"><?php print render($ads_by_cities[$key]['city']);?></div>
                        <div class="ads"><?php print render($ads_by_cities[$key]['ads']) . ' ads';?></div>
                      </div>
                      <div class="overlay"></div>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <!-- /display content for first three rows -->

              <!-- display content for the fourth row -->
              <?php if ($key == 3): ?>
                <div class="col-md-6 col-lg-6 city mb-3">
                  <?php if ($ads_by_cities): ?>
                    <div class="individual-city">
                      <div class="image"><?php print render($ads_by_cities[$key]['image']);?></div>
                      <div class="combined-cont">
                        <div class="city mb-1"><?php print render($ads_by_cities[$key]['city']);?></div>
                        <div class="ads"><?php print render($ads_by_cities[$key]['ads']) . ' ads';?></div>
                      </div>
                      <div class="overlay"></div>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <!-- /display content for the fourth row -->

              <!-- display content for the remaining rows -->
              <?php if ($key > 3): ?>
                <div class="col col-lg-6 city">
                  <?php if ($ads_by_cities): ?>
                    <div class="individual-city">
                      <div class="image"><?php print render($ads_by_cities[$key]['image']);?></div>
                      <div class="combined-cont">
                        <div class="city mb-1"><?php print render($ads_by_cities[$key]['city']);?></div>
                        <div class="ads"><?php print render($ads_by_cities[$key]['ads']) . ' ads';?></div>
                      </div>
                      <div class="overlay"></div>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <!-- /display content for the remaining rows -->

            <?php endforeach; ?>
            <!-- /Iterate view rows -->

          </div>
          <div class="text-center button"><a class="agr-btn btn btn-primary mt-4" href="#" role="button">All Locations</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
