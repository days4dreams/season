<?php
/**
 * Builds /sitemap.xml for Google and other search engines: the homepage and
 * the Enquire page (the menu's other links jump down the homepage).
 */
require __DIR__ . '/includes/content.php';

$pages = ['/', '/enquire'];

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($pages as $page) {
    echo '  <url><loc>' . e($site['url'] . $page) . "</loc></url>\n";
}
echo "</urlset>\n";
