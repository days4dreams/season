<?php
/*
 * The Staying Season homepage: the whole site is this one page, pointing to
 * the four homes. The wording is written straight into the HTML below: edit it here.
 * The four homes are in the $homes list just below, in the order they appear.
 */
$title = '';   // the homepage uses the site name and tagline as its title
require __DIR__ . '/includes/content.php';
require __DIR__ . '/includes/head.php';

/*
 * The four homes. For each one:
 *   'id'      the jump-link name, e.g. stayingseason.com/#spring
 *   'season'  the small handwritten word over the photo
 *   'colour'  the colour of the card's top edge (a colour from css/style.css)
 *   'photo'   a photo in /images/photos, or '' for an illustration instead
 *   'status'  a short line under the description (leave '' for none)
 *   'link'    where the button goes ('' for a button that isn't a link yet)
 */
$homes = [
    [
        'id' => 'autumn', 'season' => 'Autumn', 'colour' => 'var(--tertiary)',
        'name' => 'Autumn House', 'place' => 'Alnwick, Northumberland',
        'photo' => '/images/photos/autumn-house.jpg', 'photo_alt' => 'The living room and wood burner at Autumn House',
        'text' => 'A two-bedroom stone cottage in the heart of Alnwick, sleeping four. Curl up by the wood burner after a day at the castle, the gardens or the Northumberland coast.',
        'status' => 'Open for bookings',
        'button' => 'Visit Autumn House', 'link' => 'https://autumn.stayingseason.com',
    ],
    [
        'id' => 'winter', 'season' => 'Winter', 'colour' => 'var(--burgundy)',
        'name' => "Winter's Nook", 'place' => 'Gosforth, Newcastle',
        'photo' => '/images/photos/winters-nook.jpg', 'photo_alt' => "The living room at Winter's Nook",
        'text' => 'A calm one-bedroom flat on a quiet, car-free mews in Gosforth, made for longer stays: work placements, contracts and moving home. Ten minutes by Metro to central Newcastle.',
        'status' => 'Open for bookings',
        'button' => "Visit Winter's Nook", 'link' => 'https://winter.stayingseason.com',
    ],
    [
        'id' => 'spring', 'season' => 'Spring', 'colour' => 'var(--shade)',
        'name' => 'Spring Hideaway', 'place' => 'Kingston Park',
        'photo' => '', 'illustration' => 'illustrations/10-seedling.svg', 'panel' => 'var(--primary-light)',
        'text' => "A small but perfectly formed home in the popular suburb of Kingston Park, Newcastle. With a stunning kitchen, cosy living space, one bedroom and modern bathroom, it's the ideal home from home. Dedicated off-street parking, a private back garden and plenty of home touches. Just seven minutes' drive from Newcastle Airport, and fifteen from the city centre, it's ideally positioned; what's more, a mere six-minute walk gets you to the Metro system, or Kingston Park's popular amenities: gym, supermarket, bakery and retail stores.",
        'status' => 'Currently in renovation.',
        'button' => 'Enquire for Spring 2026', 'link' => '/enquire?home=spring-hideaway',
    ],
    [
        'id' => 'summer', 'season' => 'Summer', 'colour' => 'var(--sand)',
        'name' => 'Summer Season', 'place' => 'Coming Soon',
        'photo' => '', 'illustration' => 'illustrations/04-flower.svg', 'panel' => 'var(--sand-light)',
        'text' => "Our next adventure with Staying Season, Summer Season is in the works. We'll reveal full property details here soon.",
        'status' => 'Currently in renovation.',
        'button' => 'Coming Soon', 'link' => '',
    ],
];
?>

<section class="band intro-band">
  <div class="wrap stack centre">
    <p class="hand intro-hand">Welcome to Staying Season</p>
    <h1>Homes from home in <em>Northumberland and Newcastle</em></h1>
    <p class="intro-text">We're Lauren and David, and Staying Season is our small collection of homes, one for each season. Each has its own website, where you can see inside and book direct with us.</p>
    <div class="btns"><a class="btn btn--fill" href="#homes">See our homes</a><a class="btn" href="#about">About us</a></div>
  </div>
</section>

<section class="band torn" id="homes" style="--band: var(--primary-light)">
  <div class="wrap stack" style="gap: 2.5rem">
    <div class="stack centre">
      <p class="label">Our homes</p>
      <h2>Four seasons, <em>four homes</em></h2>
    </div>
    <div class="homes">
<?php foreach ($homes as $home): ?>
      <article class="home-card" id="<?= e($home['id']) ?>" style="--card-colour: <?= e($home['colour']) ?>">
        <div class="home-media"<?= $home['photo'] === '' ? ' style="--panel: ' . e($home['panel']) . '"' : '' ?>>
<?php if ($home['photo'] !== ''): ?>
          <?= content_image($home['photo'], $home['photo_alt'], '', '3/2') ?>
<?php else: ?>
          <div class="home-panel"><?= svg($home['illustration'], 'illustration') ?></div>
<?php endif; ?>
          <span class="hand home-season"><?= e($home['season']) ?></span>
        </div>
        <div class="home-body">
          <p class="label"><?= e($home['place']) ?></p>
          <h3><?= e($home['name']) ?></h3>
          <p><?= e($home['text']) ?></p>
<?php if ($home['status'] !== ''): ?>
          <p class="home-status"><?= e($home['status']) ?></p>
<?php endif; ?>
          <div class="btns">
<?php if ($home['link'] !== ''): ?>
            <a class="btn btn--fill" href="<?= e($home['link']) ?>"><?= e($home['button']) ?></a>
<?php else: ?>
            <span class="btn btn--waiting"><?= e($home['button']) ?></span>
<?php endif; ?>
          </div>
        </div>
      </article>
<?php endforeach; ?>
    </div>
  </div>
</section>

<section class="band torn torn--flip" id="about">
  <div class="wrap split">
    <div class="stack">
      <p class="label">About us</p>
      <h2>We're Lauren and David, and <em>we look after every home ourselves.</em></h2>
      <p>Born and raised in the North East, we spent years living abroad, including several in New Zealand, before coming home. Today Lauren runs a sustainable design studio and David a tax advisory firm, and together we run Staying Season.</p>
      <p>We're more "picnic on the beach" than "posh dinner", and we've put the same love of the outdoors and the simple things into each of our homes.</p>
      <ul class="about-list">
        <li><strong>Book direct with us:</strong> it's always cheaper than booking through a platform, and you deal with us, not a call centre.</li>
        <li><strong>Short breaks or longer stays:</strong> from a weekend away to a month or more.</li>
        <li><strong>Thoughtful touches:</strong> eco-friendly toiletries and sustainable essentials in every home.</li>
      </ul>
      <div class="btns"><a class="btn" href="/enquire">Send us a message</a></div>
    </div>
    <div class="media">
      <div class="card-torn tilt-r"><div><?= content_image('/images/photos/hosts.jpg', 'Lauren and David, your hosts', '', '4/5') ?><span class="hand">Lauren &amp; David</span></div></div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
