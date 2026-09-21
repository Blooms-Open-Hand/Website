<?php
require_once __DIR__ . "/site.php";
require_once __DIR__ . "/smtp_mail.php";

$pageTitle = 'Schedule a Tour';
$pageDescription = 'Request a tour or care meeting with ' . $organization . '.';

$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phoneNumber = trim($_POST['phone'] ?? '');
    $date = trim($_POST['tour_date'] ?? '');
    $time = trim($_POST['tour_time'] ?? '');
    $meetingType = trim($_POST['meeting_type'] ?? 'Tour / Care Consultation');
    $message = trim($_POST['message'] ?? '');

    /*
     * Validate required fields
     */
    if (
        !$name ||
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        !$phoneNumber ||
        !$date ||
        !$time
    ) {
        $error = 'Please complete your name, email, phone, preferred date, and preferred time.';
    }

    /*
     * Make sure the selected date/time is in the future
     */
    elseif (strtotime($date . ' ' . $time) <= time()) {
        $error = 'Please select a future date and time.';
    }

    else {
        try {

            $title = 'Client Request - ' . $meetingType . ' - ' . $name;

            $location = $address;

            $description =
                "Client: {$name}\n" .
                "Email: {$email}\n" .
                "Phone: {$phoneNumber}\n" .
                "Meeting type: {$meetingType}\n" .
                "Preferred date: {$date}\n" .
                "Preferred time: {$time}\n" .
                "Message: {$message}";

            $instructions =
                'New client request. Please review and contact the client to confirm the appointment.';

            $stmt = $pdo->prepare("
                INSERT INTO tours
                (
                    title,
                    tour_date,
                    tour_time,
                    location,
                    description,
                    instructions,
                    status
                )
                VALUES(?,?,?,?,?,?,?)
            ");

            $stmt->execute([
                $title,
                $date,
                $time,
                $location,
                $description,
                $instructions,
                'upcoming'
            ]);

            /*
             * Send an email notification after the schedule request
             * has been successfully stored in the database.
             */
            try {
                $safeName = front_h($name);
                $safeEmail = front_h($email);
                $safePhone = front_h($phoneNumber);
                $safeDate = front_h(date('F j, Y', strtotime($date)));
                $safeTime = front_h(date('g:i A', strtotime($time)));
                $safeMeetingType = front_h($meetingType);
                $safeMessage = nl2br(front_h($message ?: 'No additional message provided.'));

                $emailHtml = "
                    <div style=\"font-family:Arial,sans-serif;max-width:700px;margin:0 auto;color:#334155\">
                        <h2 style=\"color:#0b6b52\">New Schedule Request</h2>
                        <p>A visitor submitted a new tour/care consultation request from the website.</p>
                        <table style=\"width:100%;border-collapse:collapse\">
                            <tr><td style=\"padding:8px;font-weight:bold\">Name</td><td style=\"padding:8px\">{$safeName}</td></tr>
                            <tr><td style=\"padding:8px;font-weight:bold\">Email</td><td style=\"padding:8px\">{$safeEmail}</td></tr>
                            <tr><td style=\"padding:8px;font-weight:bold\">Phone</td><td style=\"padding:8px\">{$safePhone}</td></tr>
                            <tr><td style=\"padding:8px;font-weight:bold\">Meeting Type</td><td style=\"padding:8px\">{$safeMeetingType}</td></tr>
                            <tr><td style=\"padding:8px;font-weight:bold\">Preferred Date</td><td style=\"padding:8px\">{$safeDate}</td></tr>
                            <tr><td style=\"padding:8px;font-weight:bold\">Preferred Time</td><td style=\"padding:8px\">{$safeTime}</td></tr>
                            <tr><td style=\"padding:8px;font-weight:bold\">Message</td><td style=\"padding:8px\">{$safeMessage}</td></tr>
                        </table>
                        <p style=\"margin-top:20px\">The request is also saved in the website admin Tour Schedule.</p>
                    </div>
                ";

                blooms_smtp_mail(
                    'yoesfsahle48@gmail.com',
                    'New Schedule Request - ' . $name,
                    $emailHtml,
                    $email
                );
            } catch (Throwable $mailError) {
                // Do not lose the booking if email delivery has a temporary problem.
                error_log('Blooms Open Hand SMTP notification failed: ' . $mailError->getMessage());
            }

            /*
             * Submission was successful
             */
            $sent = true;

        } catch (Throwable $e) {

            $error = 'We could not submit your request right now. Please call or email us directly.';

        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="BLOOMS OPEN HAND LLC" />
<link rel="manifest" href="/site.webmanifest" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?=front_h($pageTitle)?> | <?=front_h($organization)?> Everett, WA</title>
  <meta name="description" content="<?=front_h($pageDescription)?> Schedule a free tour with <?=front_h($organization)?> in <?=front_h($address ?: "South Everett / North Mill Creek, WA")?>." />
  <meta name="keywords" content="Schedule a Tour, <?=front_h($organization)?>, Adult Family Home Everett WA, Senior Care Tour, Elder Care Washington" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://www.homecareanna.com/schedule.php" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <script src="https://cdn.tailwindcss.com"></script>
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
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <div class="navbar-cta">
        <a href="tel:<?=front_phone_href($phone)?>" class="navbar-phone">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
          <?=front_h($phone)?>
        </a>
        <a href="schedule.php" class="btn btn-primary active">Schedule a Tour</a>
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
    <section class="page-hero" aria-label="Schedule page header">
      <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a>
          <span aria-hidden="true">›</span>
          <span aria-current="page">Schedule a Tour</span>
        </nav>
        <h1 class="section-title text-6xl">Let&rsquo;s find a time that works for your family.</h1>
        <p>Request a tour or care consultation and our team will review your preferred time and follow up to confirm the appointment.</p>
      </div>
    </section>

    <!-- ===== SCHEDULE MAIN ===== -->
    <section class="section contact-section" aria-labelledby="schedule-heading">
      <div class="container">
        <div class="contact-grid">

          <!-- LEFT INFORMATION -->
          <div class="fade-in">
            <span class="section-label">A simple next step</span>
            <h2 id="schedule-heading" class="section-title">Come experience the home.</h2>
            <p>A visit gives families an opportunity to see our residential setting, ask questions, discuss care needs, and learn whether <?=front_h($organization)?> is the right fit.</p>

            <div class="contact-items">

              <div class="contact-item">
                <div class="contact-item-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                </div>
                <div class="contact-item-body">
                  <strong>24-hour resident care</strong>
                  <span>Staffed and operating around the clock.</span>
                </div>
              </div>

              <div class="contact-item">
                <div class="contact-item-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                </div>
                <div class="contact-item-body">
                  <strong>6 licensed beds</strong>
                  <span>A small, familiar home environment.</span>
                </div>
              </div>

              <div class="contact-item">
                <div class="contact-item-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                </div>
                <div class="contact-item-body">
                  <strong>Owner-led communication</strong>
                  <span>Direct and responsive family support.</span>
                </div>
              </div>

              <div class="contact-item">
                <div class="contact-item-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
                </div>
                <div class="contact-item-body">
                  <strong>Prefer to talk?</strong>
                  <a href="tel:<?=front_phone_href($phone)?>"><?=front_h($phone)?></a>
                </div>
              </div>

            </div>

            <!-- Click-to-Call CTA -->
            <a href="tel:<?=front_phone_href($phone)?>" class="call-btn" aria-label="Call <?=front_h($organization)?> at <?=front_h($phone)?>">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
              Tap to Call: <?=front_h($phone)?>
            </a>
          </div>

          <!-- FORM CARD -->
          <div class="fade-in fade-in-delay-1">
            <div class="contact-form-card">
              <h3>Request a tour or meeting</h3>
              <p>Your request will be sent to our scheduling database for review. We&rsquo;ll follow up to confirm the appointment.</p>

              <?php if ($sent): ?>
                <div class="mt-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-900" role="status">
                  <strong class="block">Request received.</strong>
                  <span>Thank you, <?=front_h($name)?>. We received your preferred schedule and will contact you to confirm the appointment.</span>
                </div>
              <?php endif; ?>

              <?php if ($error): ?>
                <div class="mt-5 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700" role="alert">
                  <?=front_h($error)?>
                </div>
              <?php endif; ?>

              <form id="scheduleForm" method="POST" novalidate aria-label="Schedule form">

                <div class="form-group">
                  <label for="name">Your Name *</label>
                  <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?= $sent ? '' : front_h($_POST['name'] ?? '') ?>"
                    placeholder="Jane Smith"
                    required
                    autocomplete="name"
                  />
                </div>

                <div class="form-group">
                  <label for="email">Email Address *</label>
                  <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= $sent ? '' : front_h($_POST['email'] ?? '') ?>"
                    placeholder="jane@example.com"
                    required
                    autocomplete="email"
                  />
                </div>

                <div class="form-group">
                  <label for="phone">Phone Number *</label>
                  <input
                    type="tel"
                    id="phone"
                    name="phone"
                    value="<?= $sent ? '' : front_h($_POST['phone'] ?? '') ?>"
                    placeholder="(206) 555-0100"
                    required
                    autocomplete="tel"
                  />
                </div>

                <div class="form-group">
                  <label for="meeting_type">What would you like to schedule?</label>
                  <select id="meeting_type" name="meeting_type">
                    <option value="Tour / Care Consultation">Tour / Care Consultation</option>
                    <option value="Care Consultation">Care Consultation</option>
                    <option value="Home Tour">Home Tour</option>
                    <option value="Respite Care Discussion">Respite Care Discussion</option>
                  </select>
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label for="tour_date">Preferred Date *</label>
                    <input
                      type="date"
                      id="tour_date"
                      name="tour_date"
                      min="<?=date('Y-m-d')?>"
                      value="<?= $sent ? '' : front_h($_POST['tour_date'] ?? '') ?>"
                      required
                    />
                    <p id="dateError" class="hidden mt-2 text-sm text-red-600">Please select today or a future date.</p>
                  </div>
                  <div class="form-group">
                    <label for="tour_time">Preferred Time *</label>
                    <input
                      type="time"
                      id="tour_time"
                      name="tour_time"
                      value="<?= $sent ? '' : front_h($_POST['tour_time'] ?? '') ?>"
                      required
                    />
                    <p id="timeError" class="hidden mt-2 text-sm text-red-600">Please select a future date and time.</p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="message">Tell us a little about your needs <span style="font-weight:400;color:var(--text-light)">(optional)</span></label>
                  <textarea
                    id="message"
                    name="message"
                    placeholder="Share any questions, care needs, or context that would help us prepare for your visit..."
                  ><?= $sent ? '' : front_h($_POST['message'] ?? '') ?></textarea>
                </div>

                <button type="submit" id="submitButton" class="btn btn-primary form-submit">
                  <svg viewBox="0 0 24 24" width="18" height="18" fill="white" aria-hidden="true" style="margin-right:0.25rem;"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                  Submit Schedule Request
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

  </main>

  <!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>

  <script src="script.js"></script>

  <!-- SUCCESS OVERLAY -->
  <div id="formSuccess" style="display:<?= $sent ? "flex" : "none" ?>;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:white;border-radius:24px;padding:3rem 2.5rem;text-align:center;max-width:420px;width:90%;box-shadow:0 20px 60px rgba(0,0,0,0.3);animation:popIn 0.4s cubic-bezier(0.34,1.56,0.64,1);">
      <div id="checkAnim" style="width:80px;height:80px;margin:0 auto 1.5rem;background:linear-gradient(135deg,#2E6B8A,#6BBFA0);border-radius:50%;display:flex;align-items:center;justify-content:center;">
        <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12" style="stroke-dasharray:30;stroke-dashoffset:30;animation:drawCheck 0.5s 0.2s ease forwards;"/>
        </svg>
      </div>
      <h2 style="font-family:'Cormorant Garamond',serif;font-size:1.8rem;color:#1C2B36;margin-bottom:0.5rem;">Request Submitted!</h2>
      <p style="color:#4A5E6A;font-size:0.95rem;line-height:1.7;margin-bottom:1.75rem;">Thank you<?= $sent && $name ? ', '.front_h($name) : '' ?>. Your tour or care consultation request has been received. Our team will follow up to confirm the appointment.</p>
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
    document.addEventListener('DOMContentLoaded', function () {

      const form = document.getElementById('scheduleForm');
      const dateInput = document.getElementById('tour_date');
      const timeInput = document.getElementById('tour_time');
      const dateError = document.getElementById('dateError');
      const timeError = document.getElementById('timeError');

      /* ======================================================
       * DATE/TIME HELPERS
       * ====================================================== */

      function getToday() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
      }

      function updateMinimumDateTime() {
        const today = getToday();
        dateInput.min = today;

        if (dateInput.value === today) {
          const now = new Date();
          const hours = String(now.getHours()).padStart(2, '0');
          const minutes = String(now.getMinutes()).padStart(2, '0');
          timeInput.min = `${hours}:${minutes}`;
        } else {
          timeInput.removeAttribute('min');
        }
      }

      function validateDateTime(showErrors = true) {
        const selectedDate = dateInput.value;
        const selectedTime = timeInput.value;

        dateError.classList.add('hidden');
        timeError.classList.add('hidden');
        dateInput.classList.remove('border-red-500');
        timeInput.classList.remove('border-red-500');

        if (!selectedDate || !selectedTime) {
          return true;
        }

        const today = getToday();

        if (selectedDate < today) {
          if (showErrors) {
            dateError.textContent = 'Please select today or a future date.';
            dateError.classList.remove('hidden');
            dateInput.classList.add('border-red-500');
          }
          return false;
        }

        const selectedDateTime = new Date(`${selectedDate}T${selectedTime}`);
        const now = new Date();

        if (selectedDateTime <= now) {
          if (showErrors) {
            timeError.textContent = 'Please select a future date and time.';
            timeError.classList.remove('hidden');
            timeInput.classList.add('border-red-500');
          }
          return false;
        }

        return true;
      }

      dateInput.addEventListener('change', function () {
        updateMinimumDateTime();
        validateDateTime(true);
      });

      timeInput.addEventListener('change', function () {
        validateDateTime(true);
      });

      dateInput.addEventListener('input', function () {
        updateMinimumDateTime();
        validateDateTime(false);
      });

      timeInput.addEventListener('input', function () {
        validateDateTime(false);
      });

      form.addEventListener('submit', function (event) {
        updateMinimumDateTime();

        const valid = validateDateTime(true);

        if (!valid) {
          event.preventDefault();
          const errorField = document.querySelector('.border-red-500');
          if (errorField) {
            errorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
            errorField.focus();
          }
          return false;
        }

        const btn = document.getElementById('submitButton');
        if (btn) {
          btn.innerHTML = 'Sending...';
          btn.disabled = true;
        }
      });

      updateMinimumDateTime();

      setInterval(function () {
        updateMinimumDateTime();
        if (dateInput.value && timeInput.value) {
          validateDateTime(false);
        }
      }, 30000);

      if (<?= $sent ? 'true' : 'false' ?>) {
        if (form) form.reset();
      }
    });
  </script>

</body>
</html>