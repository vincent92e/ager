<div class="input-group mb-2 col pr-0">
  <div class="input-group-prepend">
    <div class="input-group-text"><i class="fa fa-envelope mr-2"></i>Email:</div>
  </div>
    <?Php print render($form['subscribe']); ?>
</div>
<?Php print render($form['button']); ?>

<!-- Render any remaining elements, such as hidden inputs (token, form_id, etc). -->
<?php print drupal_render_children($form); ?>