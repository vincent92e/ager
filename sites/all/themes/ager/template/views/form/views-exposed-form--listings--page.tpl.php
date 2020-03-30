<div class="form-inline form-ejike p-1"><!-- Print form children-->
    <?php print render($form['q']); ?>
    <!-- End -->

    <div class="form-item form-type-select form-item-field-category col-sm-2 mt-0 mb-0 pl-0">
    <i class="fa fa-bars"></i>
    <?php print render($form['field_category']); ?>
    </div>
    <div class="input-group mb-2 col pr-0 pl-0 keyword">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-key mr-2" aria-hidden="true"></i>What?</div>
    </div>
    <?php print render($form['search_api_views_fulltext']); ?>
    </div>
    <div class="input-group mb-2 col pr-0 pl-0 address">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-location-arrow mr-2"></i>Where?</div>
    </div>
    <?php print render($form['search_api_views_fulltext_1']); ?>
    </div>
    <?php print render($form['submit']); ?>
    
    <!-- Print form children-->
    <?php print render($form['form_build_id']); ?>
    <?php print render($form['form_token ']); ?>
    <?php print render($form['form_id']); ?>
    <!-- End -->
</div>