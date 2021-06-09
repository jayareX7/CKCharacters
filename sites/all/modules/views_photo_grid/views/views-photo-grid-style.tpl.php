<?php

/**
 * @file
 * Template for the Photo Grid style.
 *
 * - $items contains an array of images to display.
 *
 * @ingroup views_templates
 */
?>

<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<div class="views-photo-grid-container">
  <?php foreach ($items as $key => $item): ?>
    <div class="views-photo-grid-item"><div class="img-grid"><?php print $item; ?></div></div>
  <?php endforeach; ?>
</div>


