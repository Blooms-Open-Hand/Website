<?php require_once __DIR__ . "/site.php"; ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from https://annahomecareeverett.com/blog by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:46 GMT -->
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
  <title>Senior Care Blog | Adult Family Home Resources | <?=front_h($organization)?> Everett, WA</title>
  <meta name="description" content="Expert senior care guides for Everett and Snohomish County families. Learn about adult family homes, Alzheimer's care, Medicaid, Parkinson's, caregiver burnout, and more." />
  <meta name="keywords" content="Senior Care Blog Everett WA, Adult Family Home Guide Washington, Alzheimer's Care Snohomish County, Parkinson's Care Everett, Medicaid Senior Care Washington" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://www.homecareanna.com/blog.php" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="blog.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
</head>
<body>

  <div class="announce-bar" id="announceBar" role="alert">
    <div class="announce-inner">
      <span class="announce-dot" aria-hidden="true"></span>
      <strong>Now Accepting Residents</strong>
      <span class="announce-divider">·</span>
      <span>Limited private rooms available — call today</span>
      <a href="tel:<?=front_phone_href($phone)?>" class="announce-cta">Call <?=front_h($phone)?> →</a>
    </div>
    <button class="announce-close" id="announceClose" aria-label="Close">✕</button>
  </div>

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

  <nav class="navbar" id="navbar" role="navigation">
    <div class="navbar-inner">
      <a href="index.php" class="navbar-logo"><img src="Logo.png" alt="<?=front_h($organization)?>" style="height:70px;width:auto;display:block;" /></a>
      <ul class="navbar-links" role="list">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="blog.php" class="active">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <div class="navbar-cta">
        <a href="tel:<?=front_phone_href($phone)?>" class="navbar-phone">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
          <?=front_h($phone)?>
        </a>
        <a href="schedule.php" class="btn btn-primary">Schedule a Tour</a>
      </div>
      <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false" aria-controls="mobileMenu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  <div class="mobile-menu" id="mobileMenu" role="menu">
    <a href="index.php">Home</a><a href="about.php">About Us</a><a href="services.php">Services</a>
    <a href="gallery.php">Gallery</a><a href="blog.php">Blog</a><a href="contact.php">Contact</a>
    <div class="mobile-menu-cta">
      <a href="tel:<?=front_phone_href($phone)?>" class="btn btn-outline">📞 <?=front_h($phone)?></a>
      <a href="contact.php" class="btn btn-primary">Schedule a Tour</a>
    </div>
  </div>

  <main class="page-top">

    <section class="blog-page-hero">
      <div class="container">
        <span class="section-label" style="color:rgba(255,255,255,0.6);">Resources for Families</span>
        <h1>Senior Care Insights</h1>
        <p>Data-driven guides to help Everett &amp; Snohomish County families navigate senior care with confidence.</p>
      </div>
    </section>

    <section class="section" style="background:var(--white);padding-top:50px;">
      <div class="container">

        <div class="blog-filter fade-in">
          <button class="blog-filter-btn active" data-cat="all">All Articles</button>
          <button class="blog-filter-btn" data-cat="costs">Costs &amp; Paying</button>
          <button class="blog-filter-btn" data-cat="memory">Memory Care</button>
          <button class="blog-filter-btn" data-cat="family">Family Guide</button>
          <button class="blog-filter-btn" data-cat="health">Senior Health</button>
          <button class="blog-filter-btn" data-cat="checklist">Checklists</button>
        </div>

        <div class="blog-index-grid" id="blogGrid">
<?php foreach ($publishedBlogs as $i => $post):
    $slug = trim($post['slug'] ?? '');
    if ($slug === '') $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $post['title']), '-'));
    $cat = front_blog_category($post['title']);
?>
          <a href="blog-post.php?slug=<?=urlencode($slug)?>" class="blog-card<?=($i===0 ? ' featured' : '')?> fade-in" data-cat="<?=front_h($cat)?>">
            <div class="blog-card-thumb">
              <img src="<?=front_h(front_image($post['featured_image'], 'blog-caregiver-senior.png'))?>" alt="<?=front_h($post['title'])?>" loading="lazy" />
            </div>
            <div class="blog-card-body">
              <div class="blog-card-meta"><span class="blog-card-tag"><?=front_h(ucwords(str_replace(['-','_'],' ',$cat)))?></span><span class="blog-card-date"><?=front_h(front_date($post['published_at'] ?: $post['created_at']))?></span></div>
              <div class="blog-card-title"><?=front_h($post['title'])?></div>
              <p class="blog-card-excerpt"><?=front_h($post['excerpt'])?></p>
              <span class="blog-card-read">Read article <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></span>
            </div>
          </a>
<?php endforeach; ?>
        </div>

      </div>
    </section>
  </main>

  <?php include 'footer.php'; ?>

  <script src="script.js"></script>
  <script>
    const filterBtns = document.querySelectorAll('.blog-filter-btn');
    const cards = document.querySelectorAll('.blog-card');
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const cat = btn.dataset.cat;
        cards.forEach(card => {
          const show = cat === 'all' || card.dataset.cat === cat;
          card.style.opacity = show ? '1' : '0.25';
          card.style.pointerEvents = show ? 'auto' : 'none';
          card.style.transform = show ? '' : 'scale(0.97)';
          card.style.transition = 'all 0.3s';
        });
      });
    });
  </script>

</body>


<!-- Mirrored from https://annahomecareeverett.com/blog by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:57 GMT -->
</html>