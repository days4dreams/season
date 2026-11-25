<?php
/**
 * Site settings: the ONE place to change these details.
 * Every page reads from here, so a change here updates the whole site.
 *
 * stayingseason.com is the parent site: one page pointing to the four homes.
 * It was made from Winter's Nook (days4dreams/winter), with the property
 * pages, Guide and FAQs taken out.
 */

$site = [
    'name'     => 'Staying Season',
    'tagline'  => 'Homes from home in the North East',
    // The homepage's title in Google and browser tabs (after the name).
    'home_title' => 'Holiday and long-stay homes in Northumberland and Newcastle',
    'url'      => 'https://stayingseason.com', // no trailing slash
    'year'     => date('Y'), // updates itself every January

    // false while the site is being checked: Google is asked not to list it.
    // Change to true on launch day.
    'launched' => false,

    // Where the "Enquire" buttons in the header and footer go.
    'booking_url' => '/enquire',

    // The Enquire form's emails come "from" this address (replies go to the guest).
    'mail_from' => 'noreply@stayingseason.com',

    // The small credit at the bottom of every page.
    'credit' => ['text' => 'Site by Green Smoke Studio', 'url' => 'https://www.greensmokestudio.com/'],

    'instagram_url'    => 'https://www.instagram.com/atstayingseason/',
    'instagram_handle' => '@atstayingseason',

    // The thin bar across the very top of every page. Leave 'text' empty ('') to switch it off.
    'announcement' => [
        'text'       => '',
        'link'       => '',
        'link_words' => '',
    ],

    // Shown on Google and when a page is shared, unless a page sets its own.
    'description'   => 'Staying Season is Lauren and David\'s small collection of homes from home in Northumberland and Newcastle: Autumn House, Winter\'s Nook, Spring Hideaway and Summer Season.',
    'default_image' => '/images/photos/autumn-house.jpg',
];

/** The menu, in order: this is a one-page site, so most links jump down the page. */
$menu = [
    '/#homes'  => 'Our homes',
    '/#about'  => 'About us',
    '/enquire' => 'Enquire',
];

/**
 * Private settings written by the publishing workflow (not in the public
 * repository): currently just the address the Enquire form sends to.
 */
$private = is_file(__DIR__ . '/private.php') ? (include __DIR__ . '/private.php') : [];
$site['enquiry_email'] = $private['enquiry_email'] ?? '';

/** Escape text before printing it into HTML. Use for anything that isn't hard-coded markup. */
function e($text)
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

/** The current page's clean path, e.g. "/the-guide/slow-weekend" (no query string, no trailing slash). */
function current_path()
{
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $path = preg_replace('#\.(php|html)$#', '', $path);
    if ($path === '/index') {
        $path = '/';
    }
    return ($path === '/') ? '/' : rtrim($path, '/');
}

/** Is this menu link the section we're in? "/the-guide" is also current on every Guide post. */
function is_current($link)
{
    $path = current_path();
    if ($link === '/') {
        return $path === '/';
    }
    return $path === $link || strpos($path, $link . '/') === 0;
}

/**
 * The announcement bar's text, with its link on just the 'link_words'
 * (or on the whole text if those words aren't found).
 */
function announcement_html($a)
{
    $text = e($a['text']);
    if (($a['link'] ?? '') === '') {
        return $text;
    }
    $open = '<a href="' . e($a['link']) . '"' . link_attrs($a['link']) . '>';
    $words = e($a['link_words'] ?? '');
    $at = ($words !== '') ? strpos($text, $words) : false;
    if ($at === false) {
        return $open . $text . '</a>';
    }
    return substr($text, 0, $at) . $open . $words . '</a>' . substr($text, $at + strlen($words));
}

/** Attributes for a link that may go to another website: those open in a new tab. */
function link_attrs($url)
{
    return preg_match('#^https?://#', $url) ? ' target="_blank" rel="noopener"' : '';
}

/**
 * Print an SVG file from /images straight into the page, so CSS can colour
 * it (logos and illustrations follow the text colour around them).
 * Areas that were white in Affinity take the background colour instead.
 */
function svg($file, $class = '', $label = '')
{
    static $count = 0;
    $path = __DIR__ . '/../images/' . $file;
    if (!preg_match('#^[a-z0-9/_-]+\.svg$#', $file) || !is_file($path)) {
        return '';
    }
    $svg = file_get_contents($path);
    $svg = substr($svg, strpos($svg, '<svg'));                       // drop the XML header
    $svg = preg_replace('/\s(serif:id|xml:space|xmlns:serif|xmlns:xlink|width|height)="[^"]*"/', '', $svg);
    $svg = str_replace(['fill:white;', 'fill:#fff;', 'fill="#fff"'], ['fill:var(--knockout);', 'fill:var(--knockout);', 'fill="var(--knockout)"'], $svg);
    // Each SVG's internal names get a unique prefix so two on one page don't clash.
    $prefix = 's' . (++$count) . '-';
    $svg = preg_replace('/\bid="([^"]+)"/', 'id="' . $prefix . '$1"', $svg);
    $svg = preg_replace('/url\(#([^)]+)\)/', 'url(#' . $prefix . '$1)', $svg);
    $svg = preg_replace('/href="#([^"]+)"/', 'href="#' . $prefix . '$1"', $svg);
    $a11y = ($label !== '') ? ' role="img" aria-label="' . e($label) . '"' : ' aria-hidden="true" focusable="false"';
    $svg = preg_replace('/<svg\b/', '<svg class="' . e($class) . '"' . $a11y, $svg, 1);
    return preg_replace('/>\s+</', '><', $svg);
}

/** The placeholder image, until real photos go in. $ratio is width/height, e.g. '4/5'. */
function placeholder($alt = '', $class = '', $ratio = '')
{
    $style = $ratio ? ' style="aspect-ratio:' . e($ratio) . '"' : '';
    return '<img src="/images/placeholder.svg" alt="' . e($alt) . '" class="photo ' . e($class) . '"' . $style . ' loading="lazy">';
}
