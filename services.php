<?php require_once __DIR__ . "/site.php"; ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from https://annahomecareeverett.com/services by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:42 GMT -->
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
  <title>Our Services | <?=front_h($organization)?> | Senior Care Marysville, WA</title>
  <meta name="description" content="Comprehensive senior care services at <?=front_h($organization)?> in <?=front_h($address ?: "Marysville, WA")?>. 24/7 staffing, Alzheimer's &amp; dementia care, medication management, personal care, hospice support, and enriching daily activities. Medicaid accepted." />
  <meta name="keywords" content="Senior Care Services Marysville WA, Alzheimer Care Washington, 24/7 Assisted Living, Medication Management, Hospice Care, Adult Family Home Services" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://www.Bloomsopenhandafh.com/services.php" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
</head>
<body>

  <!-- ANNOUNCEMENT BANNER -->
  <div class="announce-bar" id="announceBar" role="alert">
    <div class="announce-inner">
      <span class="announce-dot" aria-hidden="true"></span>
      <strong>Rooms Available Now</strong>
      <span class="announce-divider">·</span>
      <span>We currently have rooms open — tours can be scheduled 7 days a week, with no appointment required</span>
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
        <li><a href="about.php">About Us</a></li>
        <li><a href="services.php" class="active">Services</a></li>
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
    <section class="page-hero" aria-label="Services page header">
      <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a>
          <span aria-hidden="true">›</span>
          <span aria-current="page">Services</span>
        </nav>
        <h1>Our Care Services</h1>
        <p>Comprehensive, compassionate support for every part of daily life — from medical care to meaningful activities that nourish the spirit.</p>
      </div>
    </section>

    <!-- ===== FEATURED SERVICES ===== -->
    <section class="section services-full" aria-labelledby="services-main-heading">
      <div class="container">
        <div class="text-center fade-in">
          <span class="section-label">What We Provide</span>
          <h2 id="services-main-heading" class="section-title">Care That Addresses the Whole Person</h2>
          <p class="section-subtitle">We go far beyond basic assistance. Every program at <?=front_h($organization)?> is designed to support physical health, emotional well-being, and a vibrant sense of life.</p>
        </div>

        <div class="services-list-grid" style="margin-top:3rem;">

          <article class="service-detail-card fade-in">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/></svg>
            </div>
            <h3>Personal &amp; Daily Living Care</h3>
            <p>Respectful, dignified assistance with all activities of daily living, tailored to each resident's needs and preferences.</p>
            <ul aria-label="Personal care services">
              <li>Bathing &amp; grooming assistance</li>
              <li>Dressing support</li>
              <li>Incontinence &amp; hygiene care</li>
              <li>Mobility &amp; transfer assistance</li>
              <li>Full wheelchair accessibility</li>
            </ul>
          </article>

          <article class="service-detail-card fade-in fade-in-delay-1">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.89 2 1.99 2H19c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>
            </div>
            <h3>Medical &amp; Health Management</h3>
            <p>Comprehensive medical support provided by trained caregivers in close coordination with physicians and specialists.</p>
            <ul aria-label="Medical services">
              <li>Medication management &amp; administration</li>
              <li>Vital signs monitoring</li>
              <li>Dressing &amp; wound care</li>
              <li>Home visiting doctor coordination</li>
              <li>Congestive heart failure management</li>
            </ul>
          </article>

          <article class="service-detail-card fade-in fade-in-delay-2">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M12 3C6.48 3 2 7.48 2 13c0 4.42 2.87 8.17 6.84 9.49.5.09.68-.22.68-.48v-1.69c-2.78.6-3.37-1.34-3.37-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.89 1.52 2.34 1.08 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.64 0 0 .84-.27 2.75 1.02.8-.22 1.65-.33 2.5-.33s1.7.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02.55 1.37.2 2.39.1 2.64.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.85v2.74c0 .27.18.58.69.48C19.13 21.16 22 17.42 22 13c0-5.52-4.48-10-10-10z"/></svg>
            </div>
            <h3>Memory &amp; Cognitive Care</h3>
            <p>Specialized, gentle support for residents living with Alzheimer's, dementia, or Parkinson's disease in a safe, structured environment.</p>
            <ul aria-label="Memory care services">
              <li>Alzheimer's &amp; dementia specialized care</li>
              <li>Parkinson's disease support</li>
              <li>Cognitive engagement activities</li>
              <li>Safe, structured daily routines</li>
              <li>Family education &amp; support</li>
            </ul>
          </article>

          <article class="service-detail-card fade-in fade-in-delay-3">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 1.99 2h14.02C20.1 21 21 20.1 21 19V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg>
            </div>
            <h3>Enriching Activity Programs</h3>
            <p>Our thoughtfully designed activity programs do far more than fill the time — they create purpose, joy, and connection every single day.</p>
            <ul aria-label="Activity programs">
              <li>Caregiver-assisted exercises</li>
              <li>Music &amp; movement therapy</li>
              <li>Gardening &amp; outdoor activities</li>
              <li>Social &amp; mindful games</li>
              <li>Themed celebrations &amp; events</li>
              <li>Creative craft expressions</li>
            </ul>
          </article>

          <article class="service-detail-card fade-in">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M18.5 2h-13C4.67 2 4 2.67 4 3.5v17l8-3 8 3V3.5c0-.83-.67-1.5-1.5-1.5zm-1.5 14l-5-2.18L7 16V4h10v12z"/></svg>
            </div>
            <h3>Nutrition &amp; Meal Services</h3>
            <p>Wholesome, home-cooked meals prepared fresh each day — because good food is foundational to health, happiness, and community.</p>
            <ul aria-label="Nutrition services">
              <li>Daily home-cooked meals</li>
              <li>Dietary accommodations &amp; restrictions</li>
              <li>Family-style dining experience</li>
              <li>Nutrition-focused meal planning</li>
              <li>Hydration monitoring</li>
            </ul>
          </article>

          <article class="service-detail-card fade-in fade-in-delay-1">
            <div class="service-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 4.3c1.49 0 2.7 1.21 2.7 2.7 0 1.49-1.21 2.7-2.7 2.7-1.49 0-2.7-1.21-2.7-2.7 0-1.49 1.21-2.7 2.7-2.7zm0 13.4c-2.25 0-4.24-1.15-5.4-2.9.03-1.79 3.6-2.77 5.4-2.77 1.8 0 5.37.98 5.4 2.77-1.16 1.75-3.15 2.9-5.4 2.9z"/></svg>
            </div>
            <h3>Hospice &amp; End-of-Life Care</h3>
            <p>Compassionate, dignified support for residents and their families through life's most profound transitions — with grace, comfort, and peace.</p>
            <ul aria-label="Hospice services">
              <li>Hospice &amp; end-of-life support</li>
              <li>Pain &amp; comfort management</li>
              <li>Emotional &amp; spiritual support</li>
              <li>Family guidance &amp; coordination</li>
              <li>Grief &amp; bereavement resources</li>
            </ul>
          </article>

        </div>
      </div>
    </section>

    <!-- ===== FULL SERVICES LIST ===== -->
    <section class="section full-services-list" aria-labelledby="full-services-heading">
      <div class="container">
        <div class="text-center fade-in">
          <span class="section-label">Complete Care Offerings</span>
          <h2 id="full-services-heading" class="section-title">Everything We Offer</h2>
          <p class="section-subtitle">A complete overview of every service available at <?=front_h($organization)?> — because truly great care leaves nothing to chance.</p>
        </div>

        <div class="services-checklist-grid" style="margin-top:2.5rem;" role="list" aria-label="Complete list of services">
          <div class="check-item fade-in" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            24/7 Fully Awake Staff
          </div>
          <div class="check-item fade-in fade-in-delay-1" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            6 Licensed Beds
          </div>
          <div class="check-item fade-in fade-in-delay-2" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Full Wheelchair Access
          </div>
          <div class="check-item fade-in" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Central Air &amp; Heating
          </div>
          <div class="check-item fade-in fade-in-delay-1" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Medication Management
          </div>
          <div class="check-item fade-in fade-in-delay-2" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Alzheimer's &amp; Dementia Care
          </div>
          <div class="check-item fade-in" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Home Visiting Doctor
          </div>
          <div class="check-item fade-in fade-in-delay-1" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Incontinence Care
          </div>
          <div class="check-item fade-in fade-in-delay-2" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Daily Home-Cooked Meals
          </div>
          <div class="check-item fade-in" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Bathing Assistance
          </div>
          <div class="check-item fade-in fade-in-delay-1" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Vital Signs Monitoring
          </div>
          <div class="check-item fade-in fade-in-delay-2" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Dressing &amp; Wound Care
          </div>
          <div class="check-item fade-in" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Hospice / End-of-Life Care
          </div>
          <div class="check-item fade-in fade-in-delay-1" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Arthritis Management
          </div>
          <div class="check-item fade-in fade-in-delay-2" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Parkinson's Care
          </div>
          <div class="check-item fade-in" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Congestive Heart Failure
          </div>
          <div class="check-item fade-in fade-in-delay-1" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Music Therapy
          </div>
          <div class="check-item fade-in fade-in-delay-2" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Gardening &amp; Community
          </div>
          <div class="check-item fade-in" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Caregiver-Assisted Exercises
          </div>
          <div class="check-item fade-in fade-in-delay-1" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Creative Craft Expressions
          </div>
          <div class="check-item fade-in fade-in-delay-2" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Themed Celebrations
          </div>
        </div>
      </div>
    </section>

    <!-- ===== PAYMENT SECTION ===== -->
    <section class="section payment-section" aria-labelledby="payment-heading">
      <div class="container">
        <div class="text-center fade-in">
          <span class="section-label">Financial Options</span>
          <h2 id="payment-heading" class="section-title">We Work With Your Budget</h2>
          <p class="section-subtitle">We believe quality care should be accessible. <?=front_h($organization)?> accepts multiple payment options to accommodate a range of financial situations.</p>
        </div>
        <div class="payment-options fade-in" role="list" aria-label="Accepted payment methods">
          <div class="payment-badge" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
            <strong>Medicaid Accepted</strong>
            <span>We work with Washington State Medicaid programs</span>
          </div>
          <div class="payment-badge" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 4H4c-1.11 0-2 .89-2 2v12c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
            <strong>Private Pay</strong>
            <span>Flexible private pay arrangements available</span>
          </div>
          <div class="payment-badge" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            <strong>Long-Term Care Insurance</strong>
            <span>We can help verify your coverage benefits</span>
          </div>
          <div class="payment-badge" role="listitem">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M11.5 2C6.81 2 3 5.81 3 10.5S6.81 19 11.5 19h.5v3c4.86-2.34 8-7 8-11.5C20 5.81 16.19 2 11.5 2zm1 14.5h-2v-2h2v2zm0-4h-2c0-3.25 3-3 3-5 0-1.1-.9-2-2-2s-2 .9-2 2h-2c0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.5-3 2.75-3 5z"/></svg>
            <strong>Have Questions?</strong>
            <span>Call us — we're happy to discuss your options</span>
          </div>
        </div>
        <div class="text-center" style="margin-top:2.5rem;">
          <a href="contact.php" class="btn btn-primary">Get a Free Care Assessment →</a>
        </div>
      </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="cta-banner" aria-labelledby="cta-services-heading">
      <div class="container">
        <div class="cta-banner-inner fade-in">
          <div class="cta-banner-content">
            <h2 id="cta-services-heading">Questions About Our Services?</h2>
            <p>Our team is happy to answer any questions and help you decide whether <?=front_h($organization)?> is the right fit for your loved one. Reach out anytime.</p>
          </div>
          <div class="cta-banner-actions">
            <a href="schedule.php" class="btn btn-outline-white">Contact Us</a>
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

<!-- Mirrored from https://annahomecareeverett.com/services by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:42 GMT -->
</html>