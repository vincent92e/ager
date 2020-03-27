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
<div class="page-facet">
  <div class="container">
    <div class="row">

      <!-- display leftsidebar region -->
      <div class="col-md-4 col-lg-3 mb-4">
        <div class="facet-title">Narrow Search</div>
        <div class="left-sidebar listing-facets">
          <?php $region = block_get_blocks_by_region('left_sidebar');
          print render($region);
          ?>
        </div>
      </div>
      <!-- /display leftsidebar region -->

      <div class="col">
        <div class="listings-content">

          <!-- display breadcrumb -->
          <div class="row">
            <div class="col">
              <div class="breadcrumb-row mb-4">
                <i class="fa fa-home"><?php print render($custom_breadcrumb); ?></i>
              </div>
            </div>
          </div>
          <!-- /display breadcrumb -->

          <div class="row">

            <!-- Iterate view rows -->
            <?php foreach ($listings as $key => $value): ?>
              <div class="col-6 col-md-6 col-lg-4 mb-3">
                <?php if ($listings[$key]): ?>
                  <div class="individual-ad">

                    <!-- display image -->
                    <?php if ($listings[$key]['image']): ?>
                      <div class="image"><div class="adv-hover text-center">ad</div><?php print render($listings[$key]['image']); ?></div>
                    <?php endif; ?>
                    <!-- /display image -->

                    <div class="ad-cont p-3">
                      <!-- display location -->
                      <?php if ($listings[$key]['location']): ?>
                        <div class="address mb-3">
                          <img class="mr-1" src="<?php print $base_url . '/sites/all/themes/ager/img/place.png'; ?>"><?php print render($listings[$key]['location']); ?>
                        </div>
                      <?php endif; ?>
                      <!-- /display location -->

                      <!-- display title -->
                      <?php if ($listings[$key]['title']): ?>
                        <div class="title mb-3"><?php print ($listings[$key]['title']); ?></div>
                      <?php endif; ?>
                      <!-- /display title -->

                      <!-- display price -->
                      <?php if ($listings[$key]['price']): ?>
                        <div class="price"><?php print '$' . render($listings[$key]['price']); ?></div>
                      <?php endif; ?>
                      <!-- /display price -->

                      <div class="star"><i class="fa fa-star"></i></div>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
            <!-- /Iterate view rows -->

          </div>

          <!-- display pager -->
          <div class="row listings-pager mt-auto">
            <div class="col"><?php print render($pager); ?></div>
          </div>
          <!-- /display pager -->

        </div>
      </div>
    </div>
  </div>
</div>
