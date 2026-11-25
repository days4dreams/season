<?php
/**
 * Structured data for Google: describes Staying Season as a business and
 * links it to its homes' own sites. Shown on the homepage only.
 * Test it at https://search.google.com/test/rich-results
 */
$data = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => $site['name'],
    'description' => $site['description'],
    'url' => $site['url'] . '/',
    'logo' => $site['url'] . '/images/apple-touch-icon.png',
    'founder' => [['@type' => 'Person', 'name' => 'Lauren'], ['@type' => 'Person', 'name' => 'David']],
    'sameAs' => [$site['instagram_url']],
    'subOrganization' => [
        ['@type' => 'LodgingBusiness', 'name' => 'Autumn House', 'url' => 'https://autumn.stayingseason.com/'],
        ['@type' => 'LodgingBusiness', 'name' => "Winter's Nook", 'url' => 'https://winter.stayingseason.com/'],
    ],
];
?>
  <script type="application/ld+json"><?= json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_HEX_TAG) ?></script>
