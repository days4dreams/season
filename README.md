# Staying Season

The parent website at **https://stayingseason.com**: one page that points to
the four homes (Autumn House, Winter's Nook, Spring Hideaway and Summer
Season), with a little about Lauren and David, and an Enquire form.

Plain PHP and HTML: no database, no framework. Fonts and scripts are
self-hosted. It was made from the Winter's Nook site (days4dreams/winter),
with the property pages, Guide and FAQs taken out.

## Where things live

| To change… | Edit this |
| --- | --- |
| The homepage wording, and the four homes (text, photos, buttons) | `index.php` (the four homes are the `$homes` list at the top) |
| The Enquire page and its form | `enquire.php` |
| Site name, menu, Instagram, announcement bar | `includes/config.php` |
| Colours and fonts | The top of `css/style.css` (burgundy is Winter's Nook's colour) |
| Header, footer, Instagram row | `includes/header.php`, `footer.php`, `instagram.php` |
| Logo | `images/logos/primary-logo.svg` |

## Previewing on your computer

In Terminal, in this folder:

    php -S localhost:8000 router.php

then open http://localhost:8000.

## Publishing

Every change merged into `main` is checked and uploaded automatically by
GitHub Actions (`.github/workflows/deploy.yml`). Pull requests are only checked.

stayingseason.com is the hosting account's main domain, so this site lives in
`public_html`. The upload refuses any other folder, and only ever deletes
files it uploaded itself, so cPanel's own files (`cgi-bin`, `.well-known`) and
the property sites (in their own folders beside `public_html`) are never touched.
The first three lines of `.htaccess` are cPanel's: keep them.

**Settings it needs** (github.com → this repo → Settings → Secrets and variables → Actions):

| Name | Kind | Value |
| --- | --- | --- |
| `SFTP_HOST`, `SFTP_USER`, `SFTP_PASSWORD`, `SFTP_KNOWN_HOSTS` | Secrets | The same as Autumn House and Winter's Nook |
| `REMOTE_DIR` | Variable | `public_html` |
| `ENQUIRY_EMAIL` | Variable | Where the Enquire form sends messages |

## Launch day

1. In `includes/config.php`, change `'launched' => false` to `true`.
2. In cPanel's File Manager, delete Krystal's holding page from `public_html`:
   `home.html`, `home1.html`, `404.shtml`, `favicon.ico` and the `krystal-assets` folder.
3. Add the site to Google Search Console and submit `https://stayingseason.com/sitemap.xml`.
