/* ============================================
   ANNA HOME CARE — script.js
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {

  /* ---- Announcement Bar Close ---- */
  const announceBar = document.getElementById('announceBar');
  const announceClose = document.getElementById('announceClose');
  if (announceClose && announceBar) {
    announceClose.addEventListener('click', () => {
      announceBar.classList.add('hidden');
    });
  }

  /* ---- Sticky Navbar Shadow ---- */
  const navbar = document.getElementById('navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 20);
    });
  }

  /* ---- Hamburger / Mobile Menu ---- */
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', () => {
      const isOpen = mobileMenu.classList.toggle('open');
      hamburger.classList.toggle('open', isOpen);
      hamburger.setAttribute('aria-expanded', isOpen);
    });

    // Close on link click
    mobileMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', false);
      });
    });

    // Close on outside click
    document.addEventListener('click', (e) => {
      if (!navbar.contains(e.target) && !mobileMenu.contains(e.target)) {
        mobileMenu.classList.remove('open');
        hamburger.classList.remove('open');
      }
    });
  }

  /* ---- Fade-In on Scroll ---- */
  const fadeEls = document.querySelectorAll('.fade-in');
  if ('IntersectionObserver' in window && fadeEls.length) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    fadeEls.forEach(el => observer.observe(el));
  } else {
    fadeEls.forEach(el => el.classList.add('visible'));
  }

  /* ---- Active Nav Link Highlight ---- */
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.navbar-links a, .mobile-menu a').forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage || (currentPage === '' && href === 'index.html')) {
      link.classList.add('active');
    }
  });

  /* ---- Gallery Filter ---- */
  const filterBtns = document.querySelectorAll('.filter-btn');
  const galleryItems = document.querySelectorAll('.gallery-item');

  if (filterBtns.length && galleryItems.length) {
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.dataset.filter;
        galleryItems.forEach(item => {
          const show = filter === 'all' || item.dataset.category === filter;
          item.style.opacity = show ? '1' : '0.25';
          item.style.pointerEvents = show ? 'auto' : 'none';
          item.style.transform = show ? 'scale(1)' : 'scale(0.97)';
          item.style.transition = 'opacity 0.3s, transform 0.3s';
        });
      });
    });
  }

});

/* ---- Homepage Hero Slider ---- */
(function initHeroSlider() {
  const slider = document.getElementById('homeHero');
  if (!slider) return;

  const slides = Array.from(slider.querySelectorAll('.hero-slide'));
  const dots = Array.from(slider.querySelectorAll('.hero-slider-dot'));
  const prev = slider.querySelector('.hero-slider-prev');
  const next = slider.querySelector('.hero-slider-next');
  const progress = slider.querySelector('.hero-slider-progress');
  if (slides.length <= 1) return;

  let current = 0;
  let timer = null;
  const interval = 6000;

  function showSlide(index) {
    current = (index + slides.length) % slides.length;
    slides.forEach((slide, i) => slide.classList.toggle('is-active', i === current));
    dots.forEach((dot, i) => {
      const active = i === current;
      dot.classList.toggle('is-active', active);
      dot.setAttribute('aria-selected', active ? 'true' : 'false');
    });
    if (progress) {
      progress.classList.remove('is-running');
      void progress.offsetWidth;
      progress.classList.add('is-running');
    }
  }

  function start() {
    stop();
    timer = setInterval(() => showSlide(current + 1), interval);
  }
  function stop() {
    if (timer) clearInterval(timer);
    timer = null;
  }

  prev?.addEventListener('click', () => { showSlide(current - 1); start(); });
  next?.addEventListener('click', () => { showSlide(current + 1); start(); });
  dots.forEach((dot, i) => dot.addEventListener('click', () => { showSlide(i); start(); }));

  slider.addEventListener('mouseenter', stop);
  slider.addEventListener('mouseleave', start);
  slider.addEventListener('focusin', stop);
  slider.addEventListener('focusout', (e) => {
    if (!slider.contains(e.relatedTarget)) start();
  });

  let touchStartX = 0;
  slider.addEventListener('touchstart', e => { touchStartX = e.changedTouches[0].screenX; }, {passive:true});
  slider.addEventListener('touchend', e => {
    const delta = e.changedTouches[0].screenX - touchStartX;
    if (Math.abs(delta) > 45) {
      showSlide(current + (delta < 0 ? 1 : -1));
      start();
    }
  }, {passive:true});

  showSlide(0);
  start();
})();
