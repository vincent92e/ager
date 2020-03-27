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
<div class="latest-news">
  <div class="container">
    <div class="row">

      <div class="col-sm-10 ml-auto mr-auto">
        <div class="news-container">
          <h2 class="text-center">Latest News</h2>
          <p class="text-center">Find out latest classifieds tips and tricks on our <span class="custom">news page</span></p>
          <div class="row">

            <!-- Iterate view rows -->
            <?php foreach ($latest_news as $key => $value): ?>
              <div class="col-12 col-md-4 news mb-3">
                <?php if ($latest_news): ?>
                  <div class="individual-news">

                    <!-- display image -->
                    <div class="image"><?php print render($latest_news[$key]['image']);?></div>
                    <!-- /display image -->

                    <div class="combined-cont">

                      <!-- display topic -->
                      <div class="tips"><?php print render($latest_news[$key]['topic']);?></div>
                      <!-- /display topic -->

                      <!-- display title -->
                      <div class="title"><?php print render($latest_news[$key]['title']);?></div>
                      <!-- /display title -->

                    </div>
                    <div class="overlay"></div>
                  </div>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
            <!-- /Iterate view rows -->

          </div>
          <div class="text-center button"><a class="agr-btn btn btn-primary mt-4" href="#" role="button">All News</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
