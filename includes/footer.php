<?php
/**
 * Ends every page: the Instagram photo row, the site footer and the scripts.
 * Nothing should come after it.
 */
?>
</main>
<?php include __DIR__ . '/instagram.php'; ?>
<footer class="site-footer band torn" style="--band: var(--burgundy)">
  <div class="wrap">
    <div class="footer-grid">
      <div>
        <p class="label">Our homes</p>
        <ul class="footer-links">
          <li><a href="https://autumn.stayingseason.com">Autumn House</a></li>
          <li><a href="https://winter.stayingseason.com">Winter's Nook</a></li>
          <li><a href="/#spring">Spring Hideaway</a></li>
          <li><a href="/#summer">Summer Season</a></li>
        </ul>
      </div>
      <div class="footer-centre">
        <a href="/" class="footer-mark"><?= svg('logos/primary-logo.svg', 'footer-logo', $site['name'] . ' home') ?: '<span class="logo-text">' . e($site['name']) . '</span>' ?></a>
        <p>Homes from home in Northumberland and Newcastle, looked after by Lauren and David.</p>
        <a class="btn btn--light" href="<?= e($site['booking_url']) ?>">Enquire</a>
      </div>
      <div>
        <p class="label">Stay in touch</p>
        <ul class="footer-links">
          <li><a href="<?= e($site['instagram_url']) ?>"<?= link_attrs($site['instagram_url']) ?>>Instagram</a></li>
          <li><a href="/enquire">Send us a message</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-base">
      <p>&copy; <?= e($site['name']) ?> <?= e($site['year']) ?></p>
      <p><a href="<?= e($site['credit']['url']) ?>"<?= link_attrs($site['credit']['url']) ?>><?= e($site['credit']['text']) ?></a></p>
    </div>
  </div>
</footer>
</body>
</html>
