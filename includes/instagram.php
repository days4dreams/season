<?php
/**
 * The row of six photos above the footer, with a button to Instagram.
 * Change the list below: [photo, description of the photo].
 */
$instagramPhotos = [
    ['/images/instagram/autumn-stems.jpg', 'Autumn stems in a vase at Autumn House'],
    ['/images/instagram/windowsill.jpg', "Flowers on the windowsill at Winter's Nook"],
    ['/images/instagram/house-sign.jpg', 'The Autumn House sign'],
    ['/images/instagram/blue-door.jpg', "The front door at Winter's Nook"],
    ['/images/instagram/green-lamp.jpg', 'A green lamp at Autumn House'],
    ['/images/instagram/cushions.jpg', "Cushions on the sofa at Winter's Nook"],
]
?>
<section class="instagram band torn" aria-label="Instagram">
  <div class="wrap">
    <div class="instagram-row">
<?php foreach ($instagramPhotos as [$src, $alt]): ?>
      <?= content_image($src, $alt, '', '1/1') ?>
<?php endforeach; ?>
      <a class="btn btn--paper instagram-handle" href="<?= e($site['instagram_url']) ?>"<?= link_attrs($site['instagram_url']) ?>><?= e($site['instagram_handle']) ?></a>
    </div>
  </div>
</section>
