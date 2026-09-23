<?php require_once __DIR__ . "/site.php"; ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from https://annahomecareeverett.com/gallery by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="BLOOMS OPEN HAND LLC" />
<link rel="manifest" href="/site.webmanifest" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Photo Gallery | <?=front_h($organization)?> | Everett, WA Senior Care</title>
  <meta name="description" content="Explore photos of <?=front_h($organization)?> — our warm home, loving caregivers, enriching activities, and vibrant community life. Located in <?=front_h($address ?: "South Everett / North Mill Creek, WA")?>." />
  <meta name="keywords" content="<?=front_h($organization)?> Gallery, Senior Care Photos Everett WA, Adult Family Home Images, Elder Care Community Washington" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://www.homecareanna.com/gallery.php" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
</head>
<body>

 

  <!-- IDENTITY BAR -->
  <div class="identity-bar">
    <div class="container">
      <div class="identity-bar-inner">
        <span class="identity-name"><?=front_h($organization)?></span>
        <span class="identity-divider" aria-hidden="true">·</span>
        <span class="identity-sub">Licensed Adult Family Home</span>
        <span class="identity-divider" aria-hidden="true">·</span>
        <span class="identity-loc">📍 <?=front_h($address ?: "South Everett / North Mill Creek, WA")?></span>
        <span class="identity-divider identity-divider-hide" aria-hidden="true">·</span>
        <a href="tel:<?=front_phone_href($phone)?>" class="identity-phone">📞 <?=front_h($phone)?></a>
      </div>
    </div>
  </div>

  <!-- ===== NAVIGATION ===== -->
  <nav class="navbar" id="navbar" role="navigation" aria-label="Main navigation">
    <div class="navbar-inner">
      <a href="index.php" class="navbar-logo" aria-label="<?=front_h($organization)?> Home"><img src="Logo.png" alt="<?=front_h($organization)?>" style="height:70px;width:auto;display:block;" /></a>
      <ul class="navbar-links" role="list">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="gallery.php" class="active">Gallery</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <div class="navbar-cta">
        <a href="tel:<?=front_phone_href($phone)?>" class="navbar-phone">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
          <?=front_h($phone)?>
        </a>
        <a href="schedule.php" class="btn btn-primary">Schedule a Tour</a>
      </div>
      <button class="hamburger" id="hamburger" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobileMenu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  <div class="mobile-menu" id="mobileMenu" role="menu">
    <a href="index.php" role="menuitem">Home</a>
    <a href="about.php" role="menuitem">About Us</a>
    <a href="services.php" role="menuitem">Services</a>
    <a href="gallery.php" role="menuitem">Gallery</a>
    <a href="blog.php" role="menuitem">Blog</a>
    <a href="contact.php" role="menuitem">Contact</a>
    <div class="mobile-menu-cta">
      <a href="tel:<?=front_phone_href($phone)?>" class="btn btn-outline">📞 <?=front_h($phone)?></a>
      <a href="contact.php" class="btn btn-primary">Schedule a Tour</a>
    </div>
  </div>

  <main class="page-top">

    <!-- ===== PAGE HERO ===== -->
    <section class="page-hero" aria-label="Gallery page header">
      <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a>
          <span aria-hidden="true">›</span>
          <span aria-current="page">Photo Gallery</span>
        </nav>
        <h1>Life at <?=front_h($organization)?></h1>
        <p>A glimpse into the warmth, joy, and vibrant community life that our residents experience every day.</p>
      </div>
    </section>

    <!-- ===== GALLERY ===== -->
    <section class="section gallery-section" aria-labelledby="gallery-heading">
      <div class="container">
        <div class="text-center fade-in">
          <span class="section-label">Our Community in Photos</span>
          <h2 id="gallery-heading" class="section-title">See the Difference for Yourself</h2>
          <p class="section-subtitle">From our comfortable private rooms to enriching daily activities and warm caregiver relationships — this is what home looks like at <?=front_h($organization)?>.</p>
        </div>

        <!-- Filter Buttons -->
        <div class="gallery-filter fade-in" role="tablist" aria-label="Gallery filter">
          <button class="filter-btn active" data-filter="all" role="tab" aria-selected="true">All Photos</button>
          <button class="filter-btn" data-filter="home" role="tab" aria-selected="false">Our Home</button>
          <button class="filter-btn" data-filter="care" role="tab" aria-selected="false">Care &amp; Support</button>
          <button class="filter-btn" data-filter="activities" role="tab" aria-selected="false">Activities</button>
          <button class="filter-btn" data-filter="community" role="tab" aria-selected="false">Community</button>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-grid">
<?php foreach ($publishedGallery as $i => $item): ?>
          <div class="gallery-item<?=($i % 6 === 0 ? ' large' : '')?>" data-category="<?=front_h(strtolower($item['category'] ?: 'all'))?>" role="listitem">
            <img src="<?=front_h(front_image($item['image_url']))?>" alt="<?=front_h($item['title'] ?: $organization)?>" loading="lazy" width="<?=($i % 6 === 0 ? '760' : '380')?>" height="<?=($i % 6 === 0 ? '380' : '285')?>" />
            <div class="gallery-item-overlay"><span><?=front_h($item['title'] ?: 'Gallery Image')?></span></div>
          </div>
<?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ===== VIDEO / VIRTUAL TOUR CTA ===== -->
    <section class="section" style="background: var(--warm);" aria-labelledby="tour-cta-heading">
      <div class="container text-center">
        <div class="fade-in">
          <span class="section-label">Experience More</span>
          <h2 id="tour-cta-heading" class="section-title">Photos Only Tell Part of the Story</h2>
          <p class="section-subtitle">The best way to truly understand what makes <?=front_h($organization)?> special is to visit in person. We'd love to welcome you and your family for a personal, no-pressure tour.</p>
          <div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap; margin-top:2rem;">
            <a href="schedule.php" class="btn btn-primary">Schedule a Free Tour →</a>
            <a href="tel:<?=front_phone_href($phone)?>" class="btn btn-outline">📞 Call <?=front_h($phone)?></a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>

  <script data-cfasync="false" src=""></script><script src="script.js"></script>

</body>

<!-- Mirrored from https://annahomecareeverett.com/gallery by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:46 GMT -->
</html>
