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
  <meta property="og:url" content="https://www.bloomsopenhandafh.com/" />
  <link rel="canonical" href="https://www.bloomsopenhandafh.com/" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <style>
  @media (max-width: 768px) {
    .trust-item{
      width:100%;
      align-items:center;
      justify-content:start;
    }
}
  </style>
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
          <span class="compact-hero-eyebrow">Where Care Meets Heart, and Family Comes First.</span>
          <h1>Bloom’s Open Hand AFH LLC</h1>
          <p>A small family home where everyday care, health support, meaningful company, and dignity come together under one roof.</p>
          <div class="compact-hero-actions">
            <a href="schedule.php" class="btn btn-accent">Schedule a Tour</a>
            <a href="tel:<?=front_phone_href($phone)?>" class="compact-hero-phone">📞 <?=front_h($phone)?></a>
          </div>
        </div>
        <div class="compact-hero-card">
          <span class="compact-hero-card-icon">✓</span>
          <div><strong>Bloom’s Open Hand, AFH LLC</strong><small>Small resident count · Caregiver awake overnight · Family-centered care</small></div>
        </div>
      </div>
    </section>

    <!-- ===== TRUST BAR ===== -->
    <div class="trust-bar" role="complementary" aria-label="Trust indicators">
      <div class="trust-bar-inner container">
        <div class="trust-item">
          <!-- <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> -->
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
          <span>Licensed Adult Family Home in Washington</span>
        </div>
        <div class="trust-item">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
          <span>Individual care plans built around real needs</span>
        </div>
        <div class="trust-item">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
          <span>A caregiver is awake in the house all night</span>
        </div>
        <div class="trust-item">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
          <span>Small home where caregivers know each resident</span>
        </div>
        <div class="trust-item">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <span>Alzheimer’s, dementia &amp; Parkinson’s support</span>
        </div>
      </div>
    </div>

    <!-- ===== ABOUT PREVIEW ===== -->
    <section class="section about-preview" id="about" aria-labelledby="about-heading">
      <div class="container">
        <div class="about-preview-grid">
          <div class="about-image-mosaic fade-in" aria-hidden="true">
            <img
              src="./updated_backyard.JPG"
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
              src="./bedroom1_updated.JPG"
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
            <h2 id="about-heading" class="section-title">Care in a House Where Everyone Knows Each Other</h2>

            <p>Bloom’s Open Hand looks after a small number of residents at any one time. That allows caregivers to notice the small changes that matter—when someone is quieter than usual, leaves half a sandwich, or moves differently than before.</p>

            <p>We are a family home in Marysville. Residents have their own bedrooms and furniture and share a kitchen, living room, and yard with the people who look after them. There is no wing or numbered room.</p>

            <div class="motto-box">
              "Where care meets heart, and family comes first." Our approach is simple: people come before procedures, dignity matters in the small moments, and families remain part of everyday life.
            </div>

            <div class="value-chips" role="list" aria-label="Our core values">
              <span class="chip" role="listitem">People Before Procedures</span>
              <span class="chip" role="listitem">Small &amp; Steady Team</span>
              <span class="chip" role="listitem">Purpose in Each Day</span>
              <span class="chip" role="listitem">Family Always Welcome</span>
              <span class="chip" role="listitem">Dignity in the Small Moments</span>
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
          <h2 id="services-heading" class="section-title">Everyday Care, Health Support and Company Under One Roof</h2>
          <p class="section-subtitle">Not every resident needs every service. We build each person’s plan around what they actually need, so families can focus on being family.</p>
        </div>

        <div class="services-grid">
          <article class="service-card fade-in fade-in-delay-1">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/></svg>
            </div>
            <h3>Help with Daily Living</h3>
            <p>Support with bathing, dressing, grooming, toileting, and oral care while encouraging each resident to do as much as they can independently.</p>
          </article>

          <article class="service-card fade-in fade-in-delay-2">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.89 2 1.99 2H19c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>
            </div>
            <h3>Medications &amp; Health Monitoring</h3>
            <p>Medications are stored securely and given as prescribed. We monitor weight, blood pressure, appetite, and hydration, and communicate changes with the family and healthcare team.</p>
          </article>

          <article class="service-card fade-in fade-in-delay-3">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 1.99 2h14.02C20.1 21 21 20.1 21 19V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg>
            </div>
            <h3>Activities &amp; Company</h3>
            <p>Activities are offered without pressure—from cards and crafts to music, gardening, conversation, or simply sitting together.</p>
          </article>

          <article class="service-card fade-in">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M12 3C6.48 3 2 7.48 2 13c0 4.42 2.87 8.17 6.84 9.49.5.09.68-.22.68-.48v-1.69c-2.78.6-3.37-1.34-3.37-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.89 1.52 2.34 1.08 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.64 0 0 .84-.27 2.75 1.02.8-.22 1.65-.33 2.5-.33s1.7.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02.55 1.37.2 2.39.1 2.64.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.85v2.74c0 .27.18.58.69.48C19.13 21.16 22 17.42 22 13c0-5.52-4.48-10-10-10z"/></svg>
            </div>
            <h3>Memory &amp; Cognitive Care</h3>
            <p>Calm, familiar routines and gentle redirection support people living with Alzheimer’s disease, other dementias, and memory changes related to Parkinson’s.</p>
          </article>

          <article class="service-card fade-in fade-in-delay-1">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M18.5 2h-13C4.67 2 4 2.67 4 3.5v17l8-3 8 3V3.5c0-.83-.67-1.5-1.5-1.5zm-1.5 14l-5-2.18L7 16V4h10v12z"/></svg>
            </div>
            <h3>Meals</h3>
            <p>Meals are cooked in our own kitchen and adjusted for diabetes, heart conditions, swallowing difficulties, allergies, and personal preferences.</p>
          </article>

          <article class="service-card fade-in fade-in-delay-2">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 4.3c1.49 0 2.7 1.21 2.7 2.7 0 1.49-1.21 2.7-2.7 2.7-1.49 0-2.7-1.21-2.7-2.7 0-1.49 1.21-2.7 2.7-2.7zm0 13.4c-2.25 0-4.24-1.15-5.4-2.9.03-1.79 3.6-2.77 5.4-2.77 1.8 0 5.37.98 5.4 2.77-1.16 1.75-3.15 2.9-5.4 2.9z"/></svg>
            </div>
            <h3>Overnight &amp; End-of-Life Support</h3>
            <p>A caregiver is awake in the house overnight, while end-of-life support is coordinated with the hospice team to keep residents comfortable and families supported.</p>
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
            <span class="section-label">What Families Appreciate About Our Small Home</span>
            <h2 id="why-heading" class="section-title">The Practical Difference a Small Family Home Makes</h2>
            <p class="section-subtitle">A small home makes it possible to notice details, keep routines familiar, and build relationships that grow over time.</p>

            <div class="why-features" role="list">
              <div class="why-feature" role="listitem">
                <div class="why-feature-num" aria-hidden="true">01</div>
                <div class="why-feature-text">
                  <h4>Caregivers Know the Person</h4>
                  <p>A caregiver responsible for a few residents can notice changes in mood, appetite, mobility, or routine that might otherwise be easy to miss.</p>
                </div>
              </div>
              <div class="why-feature" role="listitem">
                <div class="why-feature-num" aria-hidden="true">02</div>
                <div class="why-feature-text">
                  <h4>Overnight Care Is Present</h4>
                  <p>A caregiver is awake in the house all night. Residents who need turning, toileting, reassurance, or help with something unexpected can receive it when needed.</p>
                </div>
              </div>
              <div class="why-feature" role="listitem">
                <div class="why-feature-num" aria-hidden="true">03</div>
                <div class="why-feature-text">
                  <h4>Each Day Has Room for Purpose</h4>
                  <p>We learn about each resident’s life, preferences, and interests and use that knowledge to make everyday moments meaningful—from choosing music to helping with familiar tasks.</p>
                </div>
              </div>
              <div class="why-feature" role="listitem">
                <div class="why-feature-num" aria-hidden="true">04</div>
                <div class="why-feature-text">
                  <h4>Family Are Not Visitors</h4>
                  <p>Families are welcome to visit, share a meal, join an activity, or simply spend time together. The home is meant to feel like a home, not a facility.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="why-image-stack fade-in fade-in-delay-1" aria-hidden="true">
            <img
              src="./bedroom4_updated.JPG"
              alt="Spacious, comfortable private room at <?=front_h($organization)?>"
              class="why-img-main"
              width="450" height="400"
            />
            <img
              src="./BathroomWide.JPG"
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

    <!-- ===== LANDING PAGE DETAILS ===== -->
    <section class="section" aria-labelledby="day-heading" style="background:#f8fafc;">
      <div class="container">
        <div class="text-center fade-in">
          <span class="section-label">A Day at Home</span>
          <h2 id="day-heading" class="section-title">A Gentle Rhythm, Not a Strict Schedule</h2>
          <p class="section-subtitle">No two days are exactly alike. Residents get up when they are ready, share meals at the table, enjoy activities or quiet time, and settle in for the evening at their own pace.</p>
        </div>
        <div class="services-grid" style="margin-top:2.5rem;">
          <article class="service-card fade-in"><h3>Morning</h3><p>Help with washing and dressing, breakfast at the table, and simple activities such as stretching, a walk, watering plants, or calling family.</p></article>
          <article class="service-card fade-in fade-in-delay-1"><h3>Afternoon</h3><p>A home-cooked main meal, rest time, personal care and health checks, followed by music, cards, baking, crafts, visitors, or conversation.</p></article>
          <article class="service-card fade-in fade-in-delay-2"><h3>Evening &amp; Overnight</h3><p>Favorite shows, music, hand massage, a warm drink, and bedtime when each person is ready. A caregiver remains awake through the night.</p></article>
        </div>
      </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials" id="testimonials" aria-labelledby="testimonials-heading">
      <div class="container">
        <div class="text-center fade-in">
          <span class="section-label">What Families Have Told Us</span>
          <h2 id="testimonials-heading" class="section-title">In Their Own Words</h2>
          <p class="section-subtitle">Choosing care for someone you love means relying on other people’s experience. These are sample website testimonials based on the themes in our care guide.</p>
        </div>

        <div class="testimonials-grid" role="list">

          <article class="testimonial-card fade-in fade-in-delay-1" role="listitem">
            <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
            <blockquote>
              "“I spent months feeling like I was failing my mother. Within two weeks the caregivers knew she liked honey in her tea and the oldies station on the radio. She is calmer, and so am I.”"
            </blockquote>
            <div class="testimonial-author">
              <div class="author-avatar" aria-hidden="true">A</div>
              <div class="author-info">
                <strong>Diane R.</strong>
                <span>Daughter of a resident, Marysville</span>
              </div>
            </div>
          </article>

          <article class="testimonial-card fade-in fade-in-delay-2" role="listitem">
            <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
            <blockquote>
              "“We toured several places. This was the one where someone asked what my father used to do for a living and then actually talked with him about it. Knowing someone is awake at night matters more than I expected.”"
            </blockquote>
            <div class="testimonial-author">
              <div class="author-avatar" aria-hidden="true">D</div>
              <div class="author-info">
                <strong>Thomas and Priya N.</strong>
                <span>Children of a resident, Marysville</span>
              </div>
            </div>
          </article>

          <article class="testimonial-card fade-in fade-in-delay-3" role="listitem">
            <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
            <blockquote>
              "“My grandfather has always been the funniest person in any room. The caregivers bring that side of him out. He still teases them, and they know how to play along.”"
            </blockquote>
            <div class="testimonial-author">
              <div class="author-avatar" aria-hidden="true">J</div>
              <div class="author-info">
                <strong>Marcus L.</strong>
                <span>Grandson of a resident, Lake Stevens</span>
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
            <h2 id="cta-heading">Come and See the House</h2>
            <p>If you are considering Bloom’s Open Hand for someone you love, visit the house, meet the caregivers, sit at the kitchen table, and ask whatever you like. There is no sales pitch and no pressure to decide.</p>
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