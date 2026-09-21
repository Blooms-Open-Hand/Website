<?php
require_once __DIR__ . "/site.php";
require_once __DIR__ . "/smtp_mail.php";

$contactSent = false;
$contactError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $visitorEmail = trim($_POST['email'] ?? '');
    $visitorPhone = trim($_POST['phone'] ?? '');
    $tourScheduleId = (int)($_POST['tourSchedule'] ?? 0);
    $relationship = trim($_POST['relationship'] ?? '');
    $careNeeds = trim($_POST['careNeeds'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (!$firstName || !$lastName || !filter_var($visitorEmail, FILTER_VALIDATE_EMAIL) || !$message) {
        $contactError = 'Please complete your first name, last name, email address, and message.';
    } else {
        try {
            $tour = null;

            if ($tourScheduleId > 0) {
                $tourStmt = $pdo->prepare("SELECT * FROM tours WHERE id = ? AND status = 'upcoming' AND tour_date >= CURDATE() LIMIT 1");
                $tourStmt->execute([$tourScheduleId]);
                $tour = $tourStmt->fetch();

                if (!$tour) {
                    throw new RuntimeException('The selected tour schedule is no longer available. Please choose another schedule.');
                }
            }

            $fullName = trim($firstName . ' ' . $lastName);
            $subject = $tour
                ? 'Client Tour Request - ' . $fullName
                : 'New Website Message - ' . $fullName;

            $tourDate = $tour['tour_date'] ?? null;
            $tourTime = $tour['tour_time'] ?? null;
            $tourLocation = $tour['location'] ?? $address;
            $meetingType = $tour ? ($tour['title'] ?: 'Tour / Care Consultation') : 'General Message';

            if ($tour) {
                $description =
                    "Client: {$fullName}\n" .
                    "Email: {$visitorEmail}\n" .
                    "Phone: {$visitorPhone}\n" .
                    "Relationship: {$relationship}\n" .
                    "Care needs: {$careNeeds}\n" .
                    "Meeting type: {$meetingType}\n" .
                    "Preferred date: {$tourDate}\n" .
                    "Preferred time: {$tourTime}\n" .
                    "Message: {$message}";

                $instructions = 'Client request submitted from the website. Please contact the client to confirm the appointment.';

                $stmt = $pdo->prepare("
                    INSERT INTO tours
                    (title, tour_date, tour_time, location, description, instructions, status)
                    VALUES (?, ?, ?, ?, ?, ?, 'upcoming')
                ");
                $stmt->execute([
                    'Client Request - ' . $fullName,
                    $tourDate,
                    $tourTime,
                    $tourLocation,
                    $description,
                    $instructions
                ]);
            }

            $safeName = front_h($fullName);
            $safeEmail = front_h($visitorEmail);
            $safePhone = front_h($visitorPhone ?: 'Not provided');
            $safeRelationship = front_h($relationship ?: 'Not provided');
            $safeCareNeeds = front_h($careNeeds ?: 'Not provided');
            $safeMeetingType = front_h($meetingType);
            $safeDate = $tourDate ? front_h(date('F j, Y', strtotime($tourDate))) : 'Not selected';
            $safeTime = $tourTime ? front_h(date('g:i A', strtotime($tourTime))) : 'Not selected';
            $safeMessage = nl2br(front_h($message));

            $emailHtml = "
                <div style=\"font-family:Arial,sans-serif;max-width:700px;margin:0 auto;color:#334155\">
                    <h2 style=\"color:#0b6b52\">\".($tour ? \"New Client Tour Request\" : \"New Website Message\").\"</h2>
                    <table style=\"width:100%;border-collapse:collapse\">
                        <tr><td style=\"padding:8px;font-weight:bold\">Name</td><td style=\"padding:8px\">{$safeName}</td></tr>
                        <tr><td style=\"padding:8px;font-weight:bold\">Email</td><td style=\"padding:8px\">{$safeEmail}</td></tr>
                        <tr><td style=\"padding:8px;font-weight:bold\">Phone</td><td style=\"padding:8px\">{$safePhone}</td></tr>
                        <tr><td style=\"padding:8px;font-weight:bold\">Tour / Meeting</td><td style=\"padding:8px\">{$safeMeetingType}</td></tr>
                        <tr><td style=\"padding:8px;font-weight:bold\">Preferred Date</td><td style=\"padding:8px\">{$safeDate}</td></tr>
                        <tr><td style=\"padding:8px;font-weight:bold\">Preferred Time</td><td style=\"padding:8px\">{$safeTime}</td></tr>
                        <tr><td style=\"padding:8px;font-weight:bold\">Relationship</td><td style=\"padding:8px\">{$safeRelationship}</td></tr>
                        <tr><td style=\"padding:8px;font-weight:bold\">Care Needs</td><td style=\"padding:8px\">{$safeCareNeeds}</td></tr>
                        <tr><td style=\"padding:8px;font-weight:bold\">Message</td><td style=\"padding:8px\">{$safeMessage}</td></tr>
                    </table>
                </div>
            ";

            try {
                blooms_smtp_mail(
                    'yoesfsahle48@gmail.com',
                    $subject,
                    $emailHtml,
                    $visitorEmail
                );
            } catch (Throwable $mailError) {
                // Keep the database request/message even if SMTP is temporarily unavailable.
                error_log('Blooms Open Hand SMTP notification failed: ' . $mailError->getMessage());
            }

            $contactSent = true;
        } catch (Throwable $e) {
            $contactError = $e->getMessage() ?: 'We could not submit your request right now. Please try again or call us directly.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from https://annahomecareeverett.com/contact by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:58 GMT -->
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
  <title>Contact Us &amp; Schedule a Tour | <?=front_h($organization)?> Everett, WA</title>
  <meta name="description" content="Contact <?=front_h($organization)?> in <?=front_h($address ?: "South Everett / North Mill Creek, WA")?>. Schedule a free tour, ask questions about our senior care services, or reach us by phone, email, or visit. 10630 44th Ave SE, Everett WA 98208." />
  <meta name="keywords" content="Contact <?=front_h($organization)?>, Adult Family Home Everett WA, Schedule Senior Care Tour, Elder Care Contact Washington" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://www.homecareanna.com/contact.php" />
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
      <span>We have private rooms open — tours available 7 days a week, no appointment needed</span>
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

  <!-- ===== NAVIGATION ===== -->
  <nav class="navbar" id="navbar" role="navigation" aria-label="Main navigation">
    <div class="navbar-inner">
      <a href="index.php" class="navbar-logo" aria-label="<?=front_h($organization)?> Home"><img src="Logo.png" alt="<?=front_h($organization)?>" style="height:70px;width:auto;display:block;" /></a>
      <ul class="navbar-links" role="list">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php" class="active">Contact</a></li>
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
      <a href="schedule.php" class="btn btn-primary">Schedule a Tour</a>
    </div>
  </div>

  <main class="page-top">

    <!-- ===== PAGE HERO ===== -->
    <section class="page-hero" aria-label="Contact page header">
      <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a>
          <span aria-hidden="true">›</span>
          <span aria-current="page">Contact Us</span>
        </nav>
        <h1>Get in Touch &amp; Schedule a Tour</h1>
        <p>We'd love to hear from you. Reach out by phone, email, or fill out the form below — we typically respond within a few hours.</p>
      </div>
    </section>

    <!-- ===== CONTACT MAIN ===== -->
    <section class="section contact-section" aria-labelledby="contact-heading">
      <div class="container">
        <div class="contact-grid">

          <!-- Contact Info -->
          <div class="fade-in">
            <span class="section-label">Reach Us</span>
            <h2 id="contact-heading" class="section-title">We're Here for You</h2>
            <p>Whether you have questions about our services, want to discuss a loved one's care needs, or simply want to schedule a visit — we are always happy to talk. No pressure, no obligation.</p>

            <div class="contact-items">
              <div class="contact-item">
                <div class="contact-item-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                </div>
                <div class="contact-item-body">
                  <strong>Our Address</strong>
                  <span><?=nl2br(front_h($address))?></span>
                </div>
              </div>

              <div class="contact-item">
                <div class="contact-item-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
                </div>
                <div class="contact-item-body">
                  <strong>Phone Numbers</strong>
                  <a href="tel:<?=front_phone_href($phone)?>"><?=front_h($phone)?></a><br>
                  <a href="tel:+14253323490">(425) 332-3490</a>
                </div>
              </div>

              <div class="contact-item">
                <div class="contact-item-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                </div>
                <div class="contact-item-body">
                  <strong>Email Address</strong>
                  <?= $email ? '<a href="mailto:'.front_h($email).'">'.front_h($email).'</a>' : '' ?>
                </div>
              </div>

              <div class="contact-item">
                <div class="contact-item-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24"><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 1.99 2h14.02C20.1 21 21 20.1 21 19V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg>
                </div>
                <div class="contact-item-body">
                  <strong>Tour Hours</strong>
                  <span><?= $workingHours ? nl2br(front_h($workingHours)) : "Available 7 days a week<br>Please call to schedule your visit" ?></span>
                </div>
              </div>

              <div class="contact-item">
                <div class="contact-item-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                </div>
                <div class="contact-item-body">
                  <strong>Website</strong>
                  <a href="<?=front_h($mapsUrl ?: "#")?>" target="_blank" rel="noopener noreferrer">www.homecareanna.com</a>
                </div>
              </div>
            </div>

            <!-- Click-to-Call CTA -->
            <a href="tel:<?=front_phone_href($phone)?>" class="call-btn" aria-label="Call <?=front_h($organization)?> at <?=front_h($phone)?>">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
              Tap to Call: <?=front_h($phone)?>
            </a>
          </div>

          <!-- Contact Form -->
          <div class="fade-in fade-in-delay-1">
            <div class="contact-form-card">
              <h3>Send Us a Message</h3>
              <p>Fill out the form below and a member of our care team will get back to you shortly — usually within a few hours.</p>

              <form id="contactForm" aria-label="Contact form">
                <div class="form-row">
                  <div class="form-group">
                    <label for="firstName">First Name *</label>
                    <input type="text" id="firstName" name="firstName" placeholder="Jane" required autocomplete="given-name" />
                  </div>
                  <div class="form-group">
                    <label for="lastName">Last Name *</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Smith" required autocomplete="family-name" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">Email Address *</label>
                  <input type="email" id="email" name="email" placeholder="jane@example.com" required autocomplete="email" />
                </div>

                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="tel" id="phone" name="phone" placeholder="(206) 555-0100" autocomplete="tel" />
                </div>

                <div class="form-group">
                  <label for="tourSchedule">Preferred Tour Schedule</label>
                  <select id="tourSchedule" name="tourSchedule">
                    <option value="" selected>Select an available schedule...</option>
                    <?php foreach ($upcomingTours as $tour): ?>
                      <option value="<?=front_h($tour['id'])?>">
                        <?=front_h(front_date($tour['tour_date']))?><?= $tour['tour_time'] ? ' · '.front_h(front_time($tour['tour_time'])) : '' ?><?= $tour['title'] ? ' · '.front_h($tour['title']) : '' ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="relationship">Your Relationship to the Resident</label>
                  <select id="relationship" name="relationship">
                    <option value="" disabled selected>Select one...</option>
                    <option value="self">I am the future resident</option>
                    <option value="child">Son / Daughter</option>
                    <option value="spouse">Spouse / Partner</option>
                    <option value="sibling">Sibling</option>
                    <option value="friend">Friend</option>
                    <option value="professional">Social Worker / Professional</option>
                    <option value="other">Other</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="careNeeds">Primary Care Needs (optional)</label>
                  <select id="careNeeds" name="careNeeds">
                    <option value="" disabled selected>Select care needs...</option>
                    <option value="personal">Personal &amp; Daily Living Care</option>
                    <option value="memory">Alzheimer's / Memory Care</option>
                    <option value="medical">Medical Management</option>
                    <option value="hospice">Hospice / End-of-Life Care</option>
                    <option value="general">General Assisted Living</option>
                    <option value="unsure">Not Sure Yet</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="message">Your Message or Questions *</label>
                  <textarea id="message" name="message" placeholder="Tell us a little about your situation, any questions you have, or when you'd like to schedule a tour..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary form-submit">
                  <svg viewBox="0 0 24 24" width="18" height="18" fill="white" aria-hidden="true" style="margin-right:0.25rem;"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                  Send Message
                </button>

                <p style="font-size:0.78rem; color:var(--text-light); margin-top:0.75rem; text-align:center;">
                  We respect your privacy. Your information is never shared with third parties.
                </p>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ===== MAP SECTION ===== -->
    <section class="section-sm map-section" aria-labelledby="map-heading">
      <div class="container">
        <div class="text-center fade-in" style="margin-bottom:2rem;">
          <span class="section-label">Find Us</span>
          <h2 id="map-heading" class="section-title">Our Location in Everett, WA</h2>
          <p class="section-subtitle">Conveniently located in a quiet residential neighborhood in <?=front_h($address ?: "South Everett / North Mill Creek, WA")?> — easy to find and easy to visit.</p>
        </div>
        <div class="map-container fade-in">
          <iframe
            title="<?=front_h($organization)?> — <?=front_h($address)?>"
            src="<?=front_h(str_contains($mapsUrl, '/embed') ? $mapsUrl : 'https://www.google.com/maps?q='.rawurlencode($address).'&output=embed')?>"
            width="100%"
            height="420"
            style="border:0;display:block;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
        <div class="text-center" style="margin-top:1.5rem;">
          <a href="https://maps.google.com/?q=10630+44th+Ave+SE+Everett+WA+98208"
             target="_blank" rel="noopener noreferrer" class="btn btn-outline">
            Get Directions on Google Maps →
          </a>
        </div>
      </div>
    </section>

    <!-- ===== FAQ SECTION ===== -->
    <section class="section" style="background: var(--warm);" aria-labelledby="faq-heading">
      <div class="container">
        <div class="text-center fade-in">
          <span class="section-label">Common Questions</span>
          <h2 id="faq-heading" class="section-title">Frequently Asked Questions</h2>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.5rem; margin-top:2.5rem;" class="fade-in">

          <div style="background:white; border-radius:var(--radius); padding:1.5rem; border:1px solid var(--border);">
            <h4 style="margin-bottom:0.5rem; color:var(--primary);">Do you accept Medicaid?</h4>
            <p style="font-size:0.9rem; margin:0;">Yes! We accept both Medicaid and private pay. We're happy to discuss your specific financial situation and help you explore options.</p>
          </div>

          <div style="background:white; border-radius:var(--radius); padding:1.5rem; border:1px solid var(--border);">
            <h4 style="margin-bottom:0.5rem; color:var(--primary);">How many residents do you care for?</h4>
            <p style="font-size:0.9rem; margin:0;">We have 6 private rooms, allowing us to maintain a truly intimate, home-like setting where every resident receives personal, devoted attention.</p>
          </div>

          <div style="background:white; border-radius:var(--radius); padding:1.5rem; border:1px solid var(--border);">
            <h4 style="margin-bottom:0.5rem; color:var(--primary);">Are family visits allowed anytime?</h4>
            <p style="font-size:0.9rem; margin:0;">Absolutely. We warmly welcome and encourage family involvement. Family members are welcome to visit, join meals, and participate in activities anytime.</p>
          </div>

          <div style="background:white; border-radius:var(--radius); padding:1.5rem; border:1px solid var(--border);">
            <h4 style="margin-bottom:0.5rem; color:var(--primary);">What is the staff-to-resident ratio?</h4>
            <p style="font-size:0.9rem; margin:0;">With only 6 residents and 24/7 fully awake staff, our caregiver-to-resident ratio is exceptional — far better than most larger facilities.</p>
          </div>

          <div style="background:white; border-radius:var(--radius); padding:1.5rem; border:1px solid var(--border);">
            <h4 style="margin-bottom:0.5rem; color:var(--primary);">Do you have room availability?</h4>
            <p style="font-size:0.9rem; margin:0;">Availability varies. Please call us directly at <?=front_h($phone)?> or send us a message to inquire about current openings — we'd love to discuss your loved one's needs.</p>
          </div>

          <div style="background:white; border-radius:var(--radius); padding:1.5rem; border:1px solid var(--border);">
            <h4 style="margin-bottom:0.5rem; color:var(--primary);">Can I tour before committing?</h4>
            <p style="font-size:0.9rem; margin:0;">Of course! We strongly encourage families to schedule a free, no-pressure tour. Seeing the home in person is the best way to experience what we offer.</p>
          </div>

        </div>
      </div>
    </section>

  </main>

  <!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>

  <script data-cfasync="false" src=""></script><script src="script.js"></script>

  <!-- SUCCESS OVERLAY -->
  <div id="formSuccess" style="display:<?= $contactSent ? "flex" : "none" ?>;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:white;border-radius:24px;padding:3rem 2.5rem;text-align:center;max-width:420px;width:90%;box-shadow:0 20px 60px rgba(0,0,0,0.3);animation:popIn 0.4s cubic-bezier(0.34,1.56,0.64,1);">
      <div id="checkAnim" style="width:80px;height:80px;margin:0 auto 1.5rem;background:linear-gradient(135deg,#2E6B8A,#6BBFA0);border-radius:50%;display:flex;align-items:center;justify-content:center;">
        <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12" style="stroke-dasharray:30;stroke-dashoffset:30;animation:drawCheck 0.5s 0.2s ease forwards;"/>
        </svg>
      </div>
      <h2 style="font-family:'Cormorant Garamond',serif;font-size:1.8rem;color:#1C2B36;margin-bottom:0.5rem;">Message Sent!</h2>
      <p style="color:#4A5E6A;font-size:0.95rem;line-height:1.7;margin-bottom:1.75rem;">Thank you for reaching out. A member of our care team will be in touch shortly — usually within a few hours.</p>
      <a href="tel:<?=front_phone_href($phone)?>" style="display:block;background:linear-gradient(135deg,#2E6B8A,#6BBFA0);color:white;padding:0.85rem;border-radius:50px;font-weight:600;font-size:0.95rem;text-decoration:none;margin-bottom:0.75rem;">📞 Call Us Now: <?=front_h($phone)?></a>
      <button onclick="document.getElementById('formSuccess').style.display='none';" style="background:none;border:none;color:#7A8F9A;font-size:0.85rem;cursor:pointer;padding:0.5rem;">Close</button>
    </div>
  </div>

  <style>
    @keyframes popIn {
      from { transform:scale(0.8); opacity:0; }
      to { transform:scale(1); opacity:1; }
    }
    @keyframes drawCheck {
      to { stroke-dashoffset:0; }
    }
  </style>

  <script>
    <?php if ($contactError): ?>
    alert(<?= json_encode($contactError) ?>);
    <?php endif; ?>

    const contactForm = document.getElementById('contactForm');

    if (contactForm) {
      contactForm.addEventListener('submit', function() {
        const btn = contactForm.querySelector('[type="submit"]');
        if (btn) {
          btn.innerHTML = 'Sending...';
          btn.disabled = true;
        }
      });
    }

    <?php if ($contactSent): ?>
    if (contactForm) {
      contactForm.reset();
    }
    <?php endif; ?>
  </script>


</body>

<!-- Mirrored from https://annahomecareeverett.com/contact by HTTrack Website Copier/3.x [XR&CO], Wed, 16 Sep 2026 20:50:58 GMT -->
</html>
