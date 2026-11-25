<?php
/**
 * Small helpers for page content. (The property sites also read Guide posts
 * and FAQs from text files; this one-page site doesn't need them.)
 */
require_once __DIR__ . '/config.php';

/**
 * A photo from /images, or the placeholder if the file isn't there yet.
 * $alt describes the photo for people who can't see it; $ratio is width/height, e.g. '4/5'.
 */
function content_image($src, $alt, $class = '', $ratio = '')
{
    $isLocal = is_string($src) && preg_match('#^/images/[A-Za-z0-9/_.-]+$#', $src) && is_file(__DIR__ . '/..' . $src);
    if (!$isLocal) {
        return placeholder($alt, $class, $ratio);
    }
    $style = $ratio ? ' style="aspect-ratio:' . e($ratio) . '"' : '';
    $size = @getimagesize(__DIR__ . '/..' . $src);
    $dims = $size ? ' width="' . $size[0] . '" height="' . $size[1] . '"' : '';
    // The big photo at the top of a page loads straight away; the rest load as you scroll.
    $loading = ($class === 'band-photo') ? ' fetchpriority="high"' : ' loading="lazy"';
    return '<img src="' . e($src) . '" alt="' . e($alt) . '" class="photo ' . e($class) . '"' . $style . $dims . $loading . '>';
}
