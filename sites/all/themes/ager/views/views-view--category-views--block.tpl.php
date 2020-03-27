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
<div class="category-views">
  <div class="container">
    <div class="row">

      <div class="col-sm-9 ml-auto mr-auto text-center">
        <div class="category-container">
          <h2>Explore categories</h2>
          <p>If you looking for something specific check the most visited <span class="custom">categories</span></p>
          <div class="row">

            <!-- Iterate view rows -->
            <?php foreach ($category_view_count as $key => $value): ?>
              <div class="col-md-6 col-lg-3 mb-3">
                <div class="category">
                  <?php if ($category_view_count): ?>

                    <!-- display category image -->
                    <div class="image mb-4"><?php print render($category_view_count[$key]['image']);?></div>
                    <!-- /display category image -->

                    <!-- display category title -->
                    <div class="title"><?php print render($category_view_count[$key]['title']);?></div>
                    <!-- /display category title -->

                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- /Iterate view rows -->

          </div>
          <div class="button"><a class="agr-btn btn btn-primary mt-4" href="#" role="button">All Categories</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
