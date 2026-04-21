/**
 * NestUp — main.js
 * Global UI behaviours: hamburger menu, navbar scroll shadow,
 * active nav link highlighting, flash message auto-hide.
 */

(function () {
  'use strict';

  /* ── DOM References ──────────────────────────────────────── */
  const navbar       = document.getElementById('main-navbar');
  const hamburgerBtn = document.getElementById('hamburger-btn');
  const mobileMenu   = document.getElementById('mobile-menu');
  const flashMsg     = document.querySelector('.flash-message');
  const preloader    = document.getElementById('nestup-preloader');

  /* ── 0. Preloader Splash Screen ──────────────────────────── */
  if (preloader) {
    window.addEventListener('load', function () {
      // The total CSS animation takes about 2.4s. 
      // We start fading out the preloader shortly after the progress bar finishes.
      setTimeout(function () {
        preloader.classList.add('fade-out');
        
        // Remove from DOM after CSS transition finishes
        setTimeout(function () {
          if (preloader.parentNode) {
            preloader.parentNode.removeChild(preloader);
          }
        }, 600);
      }, 2500); 
    });
  }

  /* ── 1. Navbar Shadow on Scroll ──────────────────────────── */
  function handleNavbarScroll() {
    if (!navbar) return;
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  }

  window.addEventListener('scroll', handleNavbarScroll, { passive: true });
  handleNavbarScroll(); // Run once on load

  /* ── 2. Hamburger Menu Toggle ─────────────────────────────── */
  function openMenu() {
    if (!hamburgerBtn || !mobileMenu) return;
    hamburgerBtn.classList.add('open');
    mobileMenu.classList.add('open');
    hamburgerBtn.setAttribute('aria-expanded', 'true');
    mobileMenu.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    if (!hamburgerBtn || !mobileMenu) return;
    hamburgerBtn.classList.remove('open');
    mobileMenu.classList.remove('open');
    hamburgerBtn.setAttribute('aria-expanded', 'false');
    mobileMenu.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  function toggleMenu() {
    const isOpen = mobileMenu && mobileMenu.classList.contains('open');
    isOpen ? closeMenu() : openMenu();
  }

  if (hamburgerBtn) {
    hamburgerBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      toggleMenu();
    });
  }

  // Close menu when clicking outside
  document.addEventListener('click', function (e) {
    if (!mobileMenu || !mobileMenu.classList.contains('open')) return;
    if (!mobileMenu.contains(e.target) && e.target !== hamburgerBtn) {
      closeMenu();
    }
  });

  // Close menu on escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeMenu();
  });

  // Close menu when a mobile nav link is clicked
  if (mobileMenu) {
    mobileMenu.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });
  }

  /* ── 3. Active Nav Link Highlighting ─────────────────────── */
  function setActiveNavLink() {
    const currentPath = window.location.pathname.replace(/\/$/, '');

    const navMappings = [
      { ids: ['nav-home', 'mob-nav-home'],       match: ['/NestUp', '/NestUp/index', '/NestUp/index.php'] },
      { ids: ['nav-search', 'mob-nav-search'],   match: ['/NestUp/search', '/NestUp/search.php'] },
      { ids: ['nav-compare', 'mob-nav-compare'], match: ['/NestUp/compare', '/NestUp/compare.php'] },
    ];

    navMappings.forEach(function (mapping) {
      const isActive = mapping.match.some(function (path) {
        return currentPath === path || currentPath === path.replace('.php', '');
      });
      mapping.ids.forEach(function (id) {
        const el = document.getElementById(id);
        if (el) {
          if (isActive) {
            el.classList.add('active');
          } else {
            el.classList.remove('active');
          }
        }
      });
    });
  }

  setActiveNavLink();

  /* ── 4. Flash Message Auto-Hide ─────────────────────────── */
  if (flashMsg) {
    setTimeout(function () {
      flashMsg.classList.add('fade-out');
      flashMsg.addEventListener('transitionend', function () {
        if (flashMsg.parentNode) {
          flashMsg.parentNode.removeChild(flashMsg);
        }
      });
    }, 3000);
  }

  /* ── 5. Navbar Search → Redirect ────────────────────────── */
  const navbarSearchInput = document.getElementById('navbar-search-input');
  if (navbarSearchInput) {
    navbarSearchInput.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' && this.value.trim() !== '') {
        window.location.href = '/NestUp/search.php?q=' + encodeURIComponent(this.value.trim());
      }
    });
  }

})();
