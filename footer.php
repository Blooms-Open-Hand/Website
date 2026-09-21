<footer class="footer" role="contentinfo">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <div class="footer-logo">
            <img src="Logo.png" alt="<?=front_h($organization)?>" style="height:52px; width:auto; margin-bottom:0.5rem;" />
          </div>
          <p>A licensed Adult Family Home offering compassionate, 24/7 senior care in a warm, family-centered setting. Because every life deserves to be celebrated.</p>
          <span class="footer-tagline">"Open Hands. Open Hearts. A True Home for Your Loved One."</span>
        </div>

        <div class="footer-col">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="services.php">Our Services</a></li>
            <li><a href="gallery.php">Photo Gallery</a></li>
            <li><a href="contact.php">Contact &amp; Tours</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Our Services</h4>
          <ul>
            <li><a href="services.php">24/7 Personal Care</a></li>
            <li><a href="services.php">Memory &amp; Dementia Care</a></li>
            <li><a href="services.php">Medication Management</a></li>
            <li><a href="services.php">Hospice Support</a></li>
            <li><a href="services.php">Activity Programs</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Contact Us</h4>
          <div class="footer-contact-item">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            <span><?=nl2br(front_h($address))?></span>
          </div>
          <div class="footer-contact-item">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
            <span><a href="tel:<?=front_phone_href($phone)?>"><?=front_h($phone)?></a><br><a href="tel:+14253323490">(425) 332-3490</a></span>
          </div>
          <div class="footer-contact-item">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
            <span><?= $email ? '<a href="mailto:'.front_h($email).'">'.front_h($email).'</a>' : '' ?></span>
          </div>
          <div class="footer-contact-item">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
            <span><a href="<?=front_h($mapsUrl ?: "#")?>" target="_blank" rel="noopener noreferrer">www.Bloomsopenhandafh.com</a></span>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <p>© 2025 <?=front_h($organization)?> LLC. All rights reserved.</p>
        <div style="display:flex; gap:1.5rem;">
          <p class="text-lg">Designed and Developed By <a href="https://www.kulfinet.com" target="_blank" class="underline text-white font-bold">Kulfinet</a></p>
        </div>
      </div>
    </div>
  </footer>