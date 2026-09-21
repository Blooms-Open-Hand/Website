<?php require_once __DIR__ . "/site.php"; ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from https://annahomecareeverett.com/about by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:39 GMT -->
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
  <title>About Us | <?=front_h($organization)?> | Adult Family Home Marysville, WA</title>
  <meta name="description" content="Learn about <?=front_h($organization)?> LLC — our mission, values, and the compassionate team dedicated to enriching the lives of seniors in <?=front_h($address ?: "Marysville, WA")?>. Open Hands. Open Hearts. A True Home for Your Loved One." />
  <meta name="keywords" content="About <?=front_h($organization)?>, Senior Care Marysville WA, Adult Family Home Mission, Compassionate Elder Care Washington" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://www.Bloomsopenhandafh.com/about.php" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
</head>
<body>

  <!-- ANNOUNCEMENT BANNER -->
  <!-- <div class="announce-bar" id="announceBar" role="alert">
    <div class="announce-inner">
      <span class="announce-dot" aria-hidden="true"></span>
      <strong>Rooms Available Now</strong>
      <span class="announce-divider">·</span>
      <span>We have private rooms open — tours available 7 days a week, no appointment needed</span>
      <a href="tel:<?=front_phone_href($phone)?>" class="announce-cta">Call <?=front_h($phone)?> →</a>
    </div>
    <button class="announce-close" id="announceClose" aria-label="Close">✕</button>
  </div> -->

  <!-- IDENTITY BAR -->
  <div class="identity-bar">
    <div class="container">
      <div class="identity-bar-inner">
        <span class="identity-name"><?=front_h($organization)?></span>
        <span class="identity-divider" aria-hidden="true">·</span>
        <span class="identity-sub">Licensed Adult Family Home</span>
        <span class="identity-divider" aria-hidden="true">·</span>
        <span class="identity-loc">📍 <?=front_h($address ?: "Marysville, WA")?></span>
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
        <li><a href="about.php" class="active">About Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="gallery.php">Gallery</a></li>
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
    <section class="page-hero" aria-label="About page header">
      <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a>
          <span aria-hidden="true">›</span>
          <span aria-current="page">About Us</span>
        </nav>
        <h1>Our Story &amp; Our Mission</h1>
        <p>Founded on compassion, guided by purpose — we are more than a care home. We are a family dedicated to celebrating every resident's life.</p>
      </div>
    </section>

    <!-- ===== MISSION SECTION ===== -->
    <section class="section mission-section" aria-labelledby="mission-heading">
      <div class="container">
        <div class="mission-grid">
          <div class="fade-in">
            <span class="section-label">Who We Are</span>
            <h2 id="mission-heading" class="section-title">A Home Built on Purpose &amp; Love</h2>

            <p><?=front_h($organization)?> LLC was founded on a single conviction: that the final chapters of a person's life should hold as much joy, dignity, and purpose as any other. Set in a quiet residential neighborhood in Marysville, Washington, our small home offers a level of personalized care that simply is not possible in larger facilities.</p>

            <p>We are a licensed Adult Family Home — a small, community-based setting where every resident is truly known, not just a name on a chart. With only six licensed beds across private and semi-private rooms, our caregivers build genuine relationships with residents and their families, learning the stories, preferences, and personalities that make each person unique.</p>

            <div class="motto-box">
              Our guiding motto — <strong>"Open Hands. Open Hearts. A True Home for Your Loved One."</strong> — is more than a tagline. It reflects how we approach every interaction, every activity, and every moment of care we provide.
            </div>

            <p>We believe that true well-being goes far beyond meeting basic physical needs. It means nurturing the human spirit, fostering community, and helping every resident stay connected to the world and the people they love.</p>

            <a href="schedule.php" class="btn btn-primary" style="margin-top:1rem;">Schedule a Visit →</a>
          </div>

          <div class="fade-in fade-in-delay-1">
            <img
              src="frontyard_updated.jpg"
              alt="<?=front_h($organization)?> — beautiful home in Marysville, WA"
              class="story-image"
              width="560" height="400"
            />

            <div class="mission-values" role="list" aria-label="Our core values">
              <div class="value-card" role="listitem">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                <h4>Compassion First</h4>
                <p>Every choice we make is guided by genuine care for each resident's well-being.</p>
              </div>
              <div class="value-card" role="listitem">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                <h4>Community &amp; Belonging</h4>
                <p>We actively connect residents to one another, to their families, and to the world around them.</p>
              </div>
              <div class="value-card" role="listitem">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                <h4>Dignity &amp; Respect</h4>
                <p>Every resident's privacy, autonomy, and individuality is honored in every aspect of care.</p>
              </div>
              <div class="value-card" role="listitem">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                <h4>Excellence in Care</h4>
                <p>We hold ourselves to the highest standards in both clinical care and human connection.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== DEDICATION / TEAM SECTION ===== -->
    <section class="section team-section" aria-labelledby="dedication-heading">
      <div class="container">
        <div class="text-center fade-in">
          <span class="section-label">Our Dedication</span>
          <h2 id="dedication-heading" class="section-title">Professional, Compassionate, &amp; Devoted</h2>
          <p class="section-subtitle team-intro">Our caregivers are more than employees — they are committed partners in each resident's journey, trained to deliver both clinical excellence and heartfelt human connection.</p>
        </div>

        <div class="dedication-grid" role="list">
          <article class="dedication-card fade-in fade-in-delay-1" role="listitem">
            <img
              src="Updated_livingroom.jpg"
              alt="Professional medical caregivers at <?=front_h($organization)?>"
              class="dedication-card-img"
              width="380" height="220"
            />
            <div class="dedication-card-body">
              <h3>Professional Expertise</h3>
              <p>Our team is trained in medication management, vital signs monitoring, wound care, Alzheimer's support, and a full range of medical and daily living assistance — so residents always receive skilled, attentive care.</p>
            </div>
          </article>

          <article class="dedication-card fade-in fade-in-delay-2" role="listitem">
            <img
              src="bedroom4_updated.jpg"
              alt="Caregiver providing compassionate support to senior resident"
              class="dedication-card-img"
              width="380" height="220"
            />
            <div class="dedication-card-body">
              <h3>Compassionate Support</h3>
              <p>Beyond clinical care, our team is trained in empathetic communication, active listening, and emotional support — building genuine trust and comfort with every resident and their family over time.</p>
            </div>
          </article>

          <article class="dedication-card fade-in fade-in-delay-3" role="listitem">
            <img
              src="Bedroom2.jpg"
              alt="Caregiver helping resident with personalized daily care"
              class="dedication-card-img"
              width="380" height="220"
            />
            <div class="dedication-card-body">
              <h3>Personalized Daily Care</h3>
              <p>We take the time to learn each resident's unique history, preferences, and personality. This is not cookie-cutter care — it is thoughtful, personalized support that honors who each person truly is.</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ===== COMMUNITY SECTION ===== -->
    <section class="section" style="background: var(--white);" aria-labelledby="community-heading">
      <div class="container">
        <div class="about-preview-grid">
          <div class="fade-in">
            <span class="section-label">Our Community</span>
            <h2 id="community-heading" class="section-title">A Community That Truly Embraces Life</h2>

            <p>At <?=front_h($organization)?>, we believe a true home is a community that embraces life. We cultivate this vibrant environment by actively connecting our residents to the world around them.</p>

            <p>We do not just provide care; we are a family. We help each resident preserve and share their life story, nurturing a deep sense of purpose and belonging that cannot be replaced.</p>

            <p>We also host engaging activities and events and encourage families to take part, ensuring that our residents stay connected with their loved ones and the broader community. Themed celebrations, community outings, and regular family gatherings are all part of life at <?=front_h($organization)?>.</p>

            <div style="display:flex; gap:0.85rem; flex-wrap:wrap; margin-top:1.75rem;">
              <a href="gallery.php" class="btn btn-primary">See Our Community →</a>
              <a href="services.php" class="btn btn-outline">View Our Services</a>
            </div>
          </div>

          <div class="about-image-mosaic fade-in fade-in-delay-1" aria-hidden="true">
            <img
              src="updated_backyard.jpg"
              alt="Seniors enjoying group activities at <?=front_h($organization)?>"
              class="mosaic-img mosaic-img-1"
              width="420" height="300"
            />
            <img
              src="bedroom1_updated.jpg"
              alt="Caregiver and resident sharing a joyful moment"
              class="mosaic-img mosaic-img-2"
              width="300" height="240"
            />
            <img
              src="bedroom4_updated.jpg"
              alt="Senior resident in comfortable home setting"
              class="mosaic-img mosaic-img-3"
              width="260" height="180"
            />
            <div class="mosaic-badge">
              <span class="mosaic-badge-num">❤</span>
              <span class="mosaic-badge-text">Family First</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="cta-banner" aria-labelledby="cta-about-heading">
      <div class="container">
        <div class="cta-banner-inner fade-in">
          <div class="cta-banner-content">
            <h2 id="cta-about-heading">See Our Home for Yourself</h2>
            <p>We invite you and your family to tour <?=front_h($organization)?> and experience the warmth, care, and community that set us apart. No pressure — just an honest look at what makes us different.</p>
          </div>
          <div class="cta-banner-actions">
            <a href="schedule.php" class="btn btn-outline-white">Schedule a Free Tour</a>
            <a href="tel:<?=front_phone_href($phone)?>" class="btn" style="background:white; color:var(--primary); font-weight:600;">📞 <?=front_h($phone)?></a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>

  <script data-cfasync="false" src=""></script><script src="script.js"></script>

</body>

<!-- Mirrored from https://annahomecareeverett.com/about by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:42 GMT -->
</html>