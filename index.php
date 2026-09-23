<?php require_once __DIR__ . "/site.php"; ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from https://annahomecareeverett.com/ by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:49:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?=front_h($organization)?> | Adult Family Home Marysville, WA | Senior Care</title>
  <meta name="description" content="<?=front_h($organization)?> LLC provides compassionate, round-the-clock assisted living in <?=front_h($address ?: "Marysville, WA")?>. Personalized senior care, memory support, and daily living assistance in a warm, family-centered home. Medicaid & private pay accepted." />
  <meta name="keywords" content="Adult Family Home Marysville WA, Senior Care Marysville Washington, 24/7 Assisted Living, Alzheimer Care Marysville, Elderly Care Washington, <?=front_h($organization)?>" />
  <meta name="robots" content="index, follow" />
  <meta property="og:title" content="<?=front_h($organization)?> | Adult Family Home Marysville, WA" />
  <meta property="og:description" content="Compassionate, family-centered senior care in <?=front_h($address ?: "Marysville, WA")?>. 24/7 staffing, personalized care plans, Medicaid accepted." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://www.Bloomsopenhandafh.com/" />
  <link rel="canonical" href="https://www.Bloomsopenhandafh.com/" />
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
        <span class="identity-loc">📍 <?=front_h($address ?: "Marysville, WA")?></span>
        <span class="identity-divider identity-divider-hide" aria-hidden="true">·</span>
        <a href="tel:<?=front_phone_href($phone)?>" class="identity-phone">📞 <?=front_h($phone)?></a>
      </div>
    </div>
  </div>

  <!-- ===== NAVIGATION ===== -->
  <nav class="navbar" id="navbar" role="navigation" aria-label="Main navigation">
    <div class="navbar-inner">
      <a href="index.php" class="navbar-logo" aria-label="<?=front_h($organization)?> Home"><img src="./Logo.png" alt="<?=front_h($organization)?>" style="height:70px;width:auto;display:block;" /></a>

      <ul class="navbar-links" role="list">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>

      <div class="navbar-cta">
        <a href="tel:<?=front_phone_href($phone)?>" class="navbar-phone" aria-label="Call us at +1-206-657-3021">
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

  <!-- Mobile Menu -->
  <div class="mobile-menu" id="mobileMenu" role="menu" aria-label="Mobile navigation">
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

  <main>

    <!-- ===== COMPACT WELCOME BANNER ===== -->
    <section class="compact-hero" aria-label="Welcome to <?=front_h($organization)?>">
      <div class="compact-hero-image" aria-hidden="true"></div>
      <div class="compact-hero-overlay" aria-hidden="true"></div>
      <div class="container compact-hero-inner">
        <div class="compact-hero-copy">
          <span class="compact-hero-eyebrow">A true home for your loved one</span>
          <h1>Open Hands. Open Hearts.</h1>
          <p>Personalized, family-centered care in a warm residential home.</p>
          <div class="compact-hero-actions">
            <a href="schedule.php" class="btn btn-accent">Schedule a Tour</a>
            <a href="tel:<?=front_phone_href($phone)?>" class="compact-hero-phone">📞 <?=front_h($phone)?></a>
          </div>
        </div>
        <div class="compact-hero-card">
          <span class="compact-hero-card-icon">✓</span>
          <div><strong>Licensed Adult Family Home</strong><small>6 beds · 24/7 awake staff · Medicaid accepted</small></div>
        </div>
      </div>
    </section>

    <!-- ===== TRUST BAR ===== -->
    <div class="trust-bar" role="complementary" aria-label="Trust indicators">
      <div class="trust-bar-inner container">
        <div class="trust-item">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          <span>State-Licensed by WA DSHS</span>
        </div>
        <div class="trust-item">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
          <span>Medicaid Accepted — We Handle the Paperwork</span>
        </div>
        <div class="trust-item">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
          <span>Staff Awake 24/7 — Not On-Call, Actually There</span>
        </div>
        <div class="trust-item">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
          <span>Small Resident Count — Your Parent Is Never a Number</span>
        </div>
        <div class="trust-item">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <span>Alzheimer's, Dementia &amp; Parkinson's Care</span>
        </div>
      </div>
    </div>

    <!-- ===== ABOUT PREVIEW ===== -->
    <section class="section about-preview" id="about" aria-labelledby="about-heading">
      <div class="container">
        <div class="about-preview-grid">
          <div class="about-image-mosaic fade-in" aria-hidden="true">
            <img
              src="./updated_backyard.jpg"
              alt="Beautiful backyard deck at <?=front_h($organization)?>"
              class="mosaic-img mosaic-img-1"
              width="420" height="300"
            />
            <img
              src="./Updated_livingroom.JPG"
              alt="Warm, welcoming living room at <?=front_h($organization)?>"
              class="mosaic-img mosaic-img-2"
              width="300" height="250"
            />
            <img
              src="./bedroom1_updated.jpg"
              alt="Comfortable private bedroom at <?=front_h($organization)?>"
              class="mosaic-img mosaic-img-3"
              width="260" height="180"
            />
            <div class="mosaic-badge">
              <span class="mosaic-badge-num">★</span>
              <span class="mosaic-badge-text">Top-Rated Care</span>
            </div>
          </div>

          <div class="about-content fade-in fade-in-delay-1">
            <span class="section-label">Why Families Choose Us</span>
            <h2 id="about-heading" class="section-title">We Know Your Parent by Name — And by Their Story.</h2>

            <p>Many families say the same thing after their first visit: "This feels different." And it truly is. Because we care for only a small number of residents, our caregivers do more than manage daily needs — they form real, lasting relationships. They come to understand who your parent is beyond any diagnosis.</p>

            <p>We are located in Marysville, Washington, in a genuine residential home — not a wing of a facility, not a unit in a complex. A home with a living room, a fireplace, a backyard deck, and people who will remember your parent's favorite music and ask how their day went.</p>

            <div class="motto-box">
              "Open Hands. Open Hearts. A True Home for Your Loved One." — we mean this. Every meal, every activity, every moment of care is built around the person, never around the paperwork.
            </div>

            <div class="value-chips" role="list" aria-label="Our core values">
              <span class="chip" role="listitem">Family-Centered</span>
              <span class="chip" role="listitem">Person-First Care</span>
              <span class="chip" role="listitem">Daily Purpose</span>
              <span class="chip" role="listitem">Community Connection</span>
              <span class="chip" role="listitem">Dignity &amp; Respect</span>
            </div>

            <a href="schedule.php" class="btn btn-primary">Come See It for Yourself →</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== SERVICES PREVIEW ===== -->
    <section class="section services-preview" id="services" aria-labelledby="services-heading">
      <div class="container">
        <div class="text-center fade-in">
          <span class="section-label">What We Provide</span>
          <h2 id="services-heading" class="section-title">Everything Your Parent Needs. All in One Home.</h2>
          <p class="section-subtitle">From medication management to memory care, daily meals to meaningful activities — we take care of it all, so you can go back to being a son or daughter, not a caregiver.</p>
        </div>

        <div class="services-grid">
          <article class="service-card fade-in fade-in-delay-1">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/></svg>
            </div>
            <h3>Personalized Daily Care</h3>
            <p>Bathing, dressing, grooming, and incontinence support — all delivered with warmth, respect, and genuine dignity by our trained caregivers.</p>
          </article>

          <article class="service-card fade-in fade-in-delay-2">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.89 2 1.99 2H19c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>
            </div>
            <h3>Medical &amp; Health Management</h3>
            <p>Medication management, vital signs monitoring, wound care, and coordination with visiting physicians to help keep health on track.</p>
          </article>

          <article class="service-card fade-in fade-in-delay-3">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 1.99 2h14.02C20.1 21 21 20.1 21 19V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg>
            </div>
            <h3>Enriching Activity Programs</h3>
            <p>Caregiver-assisted exercise, music therapy, gardening, crafts, social games, and themed celebrations to nourish the spirit every day.</p>
          </article>

          <article class="service-card fade-in">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M12 3C6.48 3 2 7.48 2 13c0 4.42 2.87 8.17 6.84 9.49.5.09.68-.22.68-.48v-1.69c-2.78.6-3.37-1.34-3.37-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.89 1.52 2.34 1.08 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.64 0 0 .84-.27 2.75 1.02.8-.22 1.65-.33 2.5-.33s1.7.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02.55 1.37.2 2.39.1 2.64.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.85v2.74c0 .27.18.58.69.48C19.13 21.16 22 17.42 22 13c0-5.52-4.48-10-10-10z"/></svg>
            </div>
            <h3>Alzheimer's &amp; Memory Care</h3>
            <p>Specialized, gentle support for residents living with Alzheimer's, dementia, and Parkinson's — in a safe, structured, and compassionate setting.</p>
          </article>

          <article class="service-card fade-in fade-in-delay-1">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M18.5 2h-13C4.67 2 4 2.67 4 3.5v17l8-3 8 3V3.5c0-.83-.67-1.5-1.5-1.5zm-1.5 14l-5-2.18L7 16V4h10v12z"/></svg>
            </div>
            <h3>Home-Cooked Meals Daily</h3>
            <p>Nutritious, home-cooked meals prepared fresh every day — because good food is part of good care and brings everyone together.</p>
          </article>

          <article class="service-card fade-in fade-in-delay-2">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 4.3c1.49 0 2.7 1.21 2.7 2.7 0 1.49-1.21 2.7-2.7 2.7-1.49 0-2.7-1.21-2.7-2.7 0-1.49 1.21-2.7 2.7-2.7zm0 13.4c-2.25 0-4.24-1.15-5.4-2.9.03-1.79 3.6-2.77 5.4-2.77 1.8 0 5.37.98 5.4 2.77-1.16 1.75-3.15 2.9-5.4 2.9z"/></svg>
            </div>
            <h3>Hospice &amp; End-of-Life Support</h3>
            <p>Compassionate, dignified end-of-life care that brings comfort, peace, and support to residents and their families during life's most important moments.</p>
          </article>
        </div>

        <div class="text-center">
          <a href="services.php" class="btn btn-outline">View All Services →</a>
        </div>
      </div>
    </section>

    <!-- ===== WHY CHOOSE US ===== -->
    <section class="section why-us" aria-labelledby="why-heading">
      <div class="container">
        <div class="why-grid">
          <div class="why-content fade-in">
            <span class="section-label">The Honest Difference</span>
            <h2 id="why-heading" class="section-title">What You Will Never Have to Worry About Again After Visiting Us</h2>
            <p class="section-subtitle">Families who tour <?=front_h($organization)?> tell us they finally feel like they can breathe. Here is why.</p>

            <div class="why-features" role="list">
              <div class="why-feature" role="listitem">
                <div class="why-feature-num" aria-hidden="true">01</div>
                <div class="why-feature-text">
                  <h4>Your Parent Will Never Be a Stranger Here</h4>
                  <p>Because we serve only a small number of residents, our caregivers know your parent by name, by story, and by preference. There are no shift handoffs where details get lost — the same familiar faces show up every day.</p>
                </div>
              </div>
              <div class="why-feature" role="listitem">
                <div class="why-feature-num" aria-hidden="true">02</div>
                <div class="why-feature-text">
                  <h4>Someone Is Always Awake. Always.</h4>
                  <p>Our team is fully awake and present around the clock — not on-call from home, not resting in a break room. At 3am, someone is there. That is not standard practice everywhere. It is here.</p>
                </div>
              </div>
              <div class="why-feature" role="listitem">
                <div class="why-feature-num" aria-hidden="true">03</div>
                <div class="why-feature-text">
                  <h4>Your Parent's Life Still Has Purpose Here</h4>
                  <p>We help each resident share and preserve their personal history — creating real connection and reminding them that who they are matters far beyond what they can or cannot do anymore.</p>
                </div>
              </div>
              <div class="why-feature" role="listitem">
                <div class="why-feature-num" aria-hidden="true">04</div>
                <div class="why-feature-text">
                  <h4>You Can Drop By Anytime. We Mean It.</h4>
                  <p>No visiting hours. No scheduled appointments. Come for lunch. Join an activity. Stop by on your way home from work. We want you here — and so does your parent.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="why-image-stack fade-in fade-in-delay-1" aria-hidden="true">
            <img
              src="./bedroom4_updated.jpg"
              alt="Spacious, comfortable private room at <?=front_h($organization)?>"
              class="why-img-main"
              width="450" height="400"
            />
            <img
              src="./BathroomWide.jpg"
              alt="Accessible, well-equipped bathroom"
              class="why-img-accent"
              width="260" height="220"
            />
            <div class="why-stat-card">
              <div class="why-stat-dot" aria-hidden="true"></div>
              <span>Staff awake &amp; caring 24/7</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials" id="testimonials" aria-labelledby="testimonials-heading">
      <div class="container">
        <div class="text-center fade-in">
          <span class="section-label">Real Families. Real Words.</span>
          <h2 id="testimonials-heading" class="section-title">They Were Where You Are. Here Is What They Found.</h2>
          <p class="section-subtitle">Every family who walks through our door shares the same worry: am I making the right choice? Here is what they tell us afterward.</p>
        </div>

        <div class="testimonials-grid" role="list">

          <article class="testimonial-card fade-in fade-in-delay-1" role="listitem">
            <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
            <blockquote>
              "Choosing this home for my mother was the best decision our family could have made. The caregivers genuinely know her — her favorite songs, her stories, her little habits. She is not simply cared for, she is treasured. I rest easy knowing she is in such loving hands."
            </blockquote>
            <div class="testimonial-author">
              <div class="author-avatar" aria-hidden="true">A</div>
              <div class="author-info">
                <strong>Amanda R.</strong>
                <span>Daughter of resident, Marysville WA</span>
              </div>
            </div>
          </article>

          <article class="testimonial-card fade-in fade-in-delay-2" role="listitem">
            <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
            <blockquote>
              "After touring several facilities, <?=front_h($organization)?> stood out right away. It genuinely feels like a home — warm, clean, and full of laughter. My father has thrived here, and the 24/7 awake staff gives our whole family real peace of mind."
            </blockquote>
            <div class="testimonial-author">
              <div class="author-avatar" aria-hidden="true">D</div>
              <div class="author-info">
                <strong>David &amp; Karen P.</strong>
                <span>Family of resident, Everett WA</span>
              </div>
            </div>
          </article>

          <article class="testimonial-card fade-in fade-in-delay-3" role="listitem">
            <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
            <blockquote>
              "The personalized care my grandmother receives goes beyond anything I expected. The caregivers remember every small detail about her life. The way they honor her story moved our whole family — in the best possible way."
            </blockquote>
            <div class="testimonial-author">
              <div class="author-avatar" aria-hidden="true">J</div>
              <div class="author-info">
                <strong>Julia N.</strong>
                <span>Granddaughter of resident, Seattle WA</span>
              </div>
            </div>
          </article>

        </div>
      </div>
    </section>

    <!-- ===== CTA BANNER ===== -->
    <section class="cta-banner" aria-labelledby="cta-heading">
      <div class="container">
        <div class="cta-banner-inner fade-in">
          <div class="cta-banner-content">
            <h2 id="cta-heading">You Do Not Have to Figure This Out Alone.</h2>
            <p>Rooms are available now. A tour takes about 30 minutes, costs nothing, and carries no obligation. Come see the home, meet the team, and ask us anything. Most families tell us they wish they had called sooner.</p>
          </div>
          <div class="cta-banner-actions">
            <a href="schedule.php" class="btn btn-outline-white">Schedule a Free Tour — No Pressure</a>
            <a href="tel:<?=front_phone_href($phone)?>" class="btn" style="background:white; color:var(--primary); font-weight:600;">📞 Call or Text <?=front_h($phone)?></a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>

    <script data-cfasync="false" src=""></script><script src="script.js"></script>

</body>

<!-- Mirrored from https://annahomecareeverett.com/ by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:38 GMT -->
</html>