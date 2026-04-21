/**
 * NestUp — carousel.js
 * Handles the hero carousel logic: thumbnail clicks, auto-play,
 * and synchronized background blur updates.
 */

(function () {
  'use strict';

  const carouselImg    = document.getElementById('main-carousel-img');
  const bgBlurImg      = document.getElementById('bg-blur-img');
  const thumbItems     = document.querySelectorAll('.thumb-item');
  const carouselSect   = document.getElementById('hero-carousel');
  
  if (!carouselSect || !carouselImg || !bgBlurImg || thumbItems.length === 0) return;

  let currentIndex = 0;
  const slideInterval = 5000; // 5 seconds
  let autoPlayTimer;

  // Image data matches index.php thumbnails
  const slides = [
    '/NestUp/assets/hostel-hero-1.png',
    '/NestUp/assets/hostel-hero-2.png',
    '/NestUp/assets/hostel-hero-3.png',
    '/NestUp/assets/hostel-hero-4.png'
  ];

  /**
   * Updates the carousel display to a specific index
   */
  function updateCarousel(index) {
    if (index === currentIndex && !arguments[1]) return; // arguments[1] to force update

    // 1. Update main and bg images
    // Fade out effect
    carouselImg.style.opacity = '0.5';
    bgBlurImg.style.opacity   = '0.5';

    setTimeout(() => {
      carouselImg.src = slides[index];
      bgBlurImg.src   = slides[index];
      
      carouselImg.style.opacity = '1';
      bgBlurImg.style.opacity   = '1';
    }, 200);

    // 2. Update thumbnails
    thumbItems.forEach((item, idx) => {
      if (idx === index) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });

    currentIndex = index;
  }

  /**
   * Switches to the next slide
   */
  function nextSlide() {
    let nextIndex = (currentIndex + 1) % slides.length;
    updateCarousel(nextIndex);
  }

  /**
   * Starts or resets the auto-play timer
   */
  function startAutoPlay() {
    stopAutoPlay();
    autoPlayTimer = setInterval(nextSlide, slideInterval);
  }

  function stopAutoPlay() {
    if (autoPlayTimer) clearInterval(autoPlayTimer);
  }

  // Event Listeners for thumbnails
  thumbItems.forEach((thumb) => {
    thumb.addEventListener('click', function () {
      const index = parseInt(this.getAttribute('data-index'));
      updateCarousel(index);
      startAutoPlay(); // Reset timer on manual click
    });
  });

  // Pause on hover
  carouselSect.addEventListener('mouseenter', stopAutoPlay);
  carouselSect.addEventListener('mouseleave', startAutoPlay);

  // Initialize
  startAutoPlay();

})();
