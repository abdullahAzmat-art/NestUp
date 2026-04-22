<?php require_once 'includes/header.php'; ?>

<!-- =========================================================
     HERO SECTION
     ========================================================= -->
<!-- =========================================================
     HERO CAROUSEL SECTION
     ========================================================= -->
<section class="hero-carousel" id="hero-carousel" aria-label="Hostel Showcase">
  
  <!-- Blurred Background Layer -->
  <div class="carousel-bg" id="carousel-bg">
    <img src="/NestUp/assets/hostel-hero-1.png" alt="" id="bg-blur-img">
    <div class="bg-overlay"></div>
  </div>

  <div class="container carousel-wrapper">
    
    <!-- Main Content Area -->
    <div class="carousel-main">
      <div class="carousel-content">
        <h1 id="hero-heading">Find Your Home Away From Home</h1>
        <p>Verified hostels near your university with real student reviews. Safe, affordable, and just a search away.</p>

        <form class="hero-search" action="/NestUp/search.php" method="GET" role="search" aria-label="Hostel search">
          <input
            type="text"
            name="q"
            id="hero-search-input"
            placeholder="Search university, city or area..."
            aria-label="Search hostels"
            autocomplete="off"
          >
          <button type="submit" id="hero-search-btn" aria-label="Search">
            🔍 Search
          </button>
        </form>
      </div>

      <!-- Main Featured Image -->
      <div class="carousel-main-img-wrap">
        <img src="/NestUp/assets/hostel-hero-1.png" alt="Featured Hostel" id="main-carousel-img">
      </div>
    </div>

    <!-- Thumbnail Navigation ("small small pictures") -->
    <div class="carousel-thumbs" id="carousel-thumbs">
      <button class="thumb-item active" data-index="0" aria-label="View slide 1">
        <img src="/NestUp/assets/hostel-hero-1.png" alt="Hostel Exterior thumbnail">
      </button>
      <button class="thumb-item" data-index="1" aria-label="View slide 2">
        <img src="/NestUp/assets/hostel-hero-2.png" alt="Hostel Room thumbnail">
      </button>
      <button class="thumb-item" data-index="2" aria-label="View slide 3">
        <img src="/NestUp/assets/hostel-hero-3.png" alt="Common Area thumbnail">
      </button>
      <button class="thumb-item" data-index="3" aria-label="View slide 4">
        <img src="/NestUp/assets/hostel-hero-4.png" alt="Dining Hall thumbnail">
      </button>
    </div>

  </div>
</section>

<!-- =========================================================
     HOW IT WORKS SECTION
     ========================================================= -->
<section class="how-it-works" id="how-it-works" aria-labelledby="how-title">
  <div class="container">
    <h2 class="section-title" id="how-title">How NestUp Works</h2>

    <div class="how-grid">

      <!-- Step 1 -->
      <div class="how-card" id="how-card-1">
        <div class="how-icon" aria-hidden="true">🔍</div>
        <h3>Search</h3>
        <p>Find hostels near your university by entering your campus name or city. Results update instantly.</p>
      </div>

      <!-- Step 2 -->
      <div class="how-card" id="how-card-2">
        <div class="how-icon" aria-hidden="true">⚙️</div>
        <h3>Filter</h3>
        <p>Filter by WiFi, AC, mess food, price range, and distance from campus to match your exact needs.</p>
      </div>

      <!-- Step 3 -->
      <div class="how-card" id="how-card-3">
        <div class="how-icon" aria-hidden="true">🏠</div>
        <h3>Choose</h3>
        <p>Read real student reviews, compare top options side-by-side, and pick the hostel that's right for you.</p>
      </div>

    </div>
  </div>
</section>

<!-- =========================================================
     FEATURED HOSTELS SECTION
     ========================================================= -->
<section class="featured-section" id="featured-hostels" aria-labelledby="featured-title">
  <div class="container">
    <h2 class="section-title" id="featured-title">Featured Hostels</h2>

    <div class="cards-grid">

      <!-- Card 1: Al-Noor Boys Hostel
      <article class="hostel-card" id="featured-card-1" aria-label="Al-Noor Boys Hostel">
        <div class="card-image-wrap">
          <img
            src="/NestUp/assets/hostel-1.jpg"
            alt="Al-Noor Boys Hostel exterior"
            class="card-image"
            loading="lazy"
            onerror="this.style.background='linear-gradient(135deg,#1D9E75,#0F6E56)';this.style.height='200px';"
          >
        </div>
        <div class="card-body">
          <div class="card-top">
            <h3 class="card-name">Al-Noor Boys Hostel</h3>
            <span class="card-city">📍 Lahore</span>
          </div>
          <p class="card-distance">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round" aria-hidden="true">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
              <circle cx="12" cy="10" r="3"/>
            </svg>
            0.3 km from FAST NUCES
          </p>
          <div class="card-badges">
            <span class="badge badge-wifi">📶 WiFi</span>
            <span class="badge badge-ac">❄️ AC</span>
            <span class="badge badge-food">🍽️ Mess Food</span>
          </div>
          <div class="card-price-row">
            <span class="card-price">Rs. 8,000<small style="font-size:0.7em;font-weight:400;">/mo</small></span>
            <div class="card-rating">
              <span class="stars" aria-label="4.7 stars">★★★★★</span>
              <span class="rating-num">4.7</span>
            </div>
          </div>
          <div class="card-footer">
            <a href="/NestUp/hostel-detail.php?id=1" class="btn-primary" id="view-hostel-1">View Details</a>
          </div>
        </div>
      </article> -->

      <!-- Card 2: Green View Hostel -->
      <article class="hostel-card" id="featured-card-2" aria-label="Green View Hostel">
        <div class="card-image-wrap">
          <img
            src="/NestUp/assets/hostel-2.jpg"
            alt="Green View Hostel exterior"
            class="card-image"
            loading="lazy"
            onerror="this.style.background='linear-gradient(135deg,#10b981,#059669)';this.style.height='200px';"
          >
        </div>
        <div class="card-body">
          <div class="card-top">
            <h3 class="card-name">Green View Hostel</h3>
            <span class="card-city">📍 Lahore</span>
          </div>
          <p class="card-distance">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round" aria-hidden="true">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
              <circle cx="12" cy="10" r="3"/>
            </svg>
            0.8 km from UET Lahore
          </p>
          <div class="card-badges">
            <span class="badge badge-wifi">📶 WiFi</span>
            <span class="badge badge-laundry">👕 Laundry</span>
          </div>
          <div class="card-price-row">
            <span class="card-price">Rs. 6,500<small style="font-size:0.7em;font-weight:400;">/mo</small></span>
            <div class="card-rating">
              <span class="stars" aria-label="4.2 stars">★★★★☆</span>
              <span class="rating-num">4.2</span>
            </div>
          </div>
          <div class="card-footer">
            <a href="/NestUp/hostel-detail.php?id=2" class="btn-primary" id="view-hostel-2">View Details</a>
          </div>
        </div>
      </article>

      <!-- Card 3: City Boys Hostel -->
      <article class="hostel-card" id="featured-card-3" aria-label="City Boys Hostel">
        <div class="card-image-wrap">
          <img
            src="/NestUp/assets/hostel-3.jpg"
            alt="City Boys Hostel exterior"
            class="card-image"
            loading="lazy"
            onerror="this.style.background='linear-gradient(135deg,#3b82f6,#1d4ed8)';this.style.height='200px';"
          >
        </div>
        <div class="card-body">
          <div class="card-top">
            <h3 class="card-name">City Boys Hostel</h3>
            <span class="card-city">📍 Lahore</span>
          </div>
          <p class="card-distance">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round" aria-hidden="true">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
              <circle cx="12" cy="10" r="3"/>
            </svg>
            1.2 km from Punjab University
          </p>
          <div class="card-badges">
            <span class="badge badge-wifi">📶 WiFi</span>
            <span class="badge badge-solar">☀️ Solar</span>
            <span class="badge badge-food">🍽️ Mess Food</span>
          </div>
          <div class="card-price-row">
            <span class="card-price">Rs. 5,000<small style="font-size:0.7em;font-weight:400;">/mo</small></span>
            <div class="card-rating">
              <span class="stars" aria-label="3.9 stars">★★★★☆</span>
              <span class="rating-num">3.9</span>
            </div>
          </div>
          <div class="card-footer">
            <a href="/NestUp/hostel-detail.php?id=3" class="btn-primary" id="view-hostel-3">View Details</a>
          </div>
        </div>
      </article>

    </div><!-- /.cards-grid -->

    <div style="text-align:center; margin-top:40px;">
      <a href="/NestUp/search.php" class="btn-outline" id="browse-all-btn">Browse All Hostels →</a>
    </div>

  </div>
</section>

<!-- =========================================================
     WHY NESTUP SECTION
     ========================================================= -->
<section class="why-nestup" id="why-nestup" aria-labelledby="why-title">
  <div class="container">
    <h2 class="section-title" id="why-title">Why Students Trust NestUp</h2>

    <div class="why-grid">

      <div class="why-card" id="why-card-1">
        <span class="why-icon" aria-hidden="true">✅</span>
        <h3>Verified Listings</h3>
        <p>Every hostel on NestUp is physically verified by our team before going live. No fake listings.</p>
      </div>

      <div class="why-card" id="why-card-2">
        <span class="why-icon" aria-hidden="true">⭐</span>
        <h3>Real Reviews</h3>
        <p>All reviews come from actual residents — no paid promotions, no fake ratings. 100% authentic.</p>
      </div>

      <div class="why-card" id="why-card-3">
        <span class="why-icon" aria-hidden="true">⚖️</span>
        <h3>Easy Comparison</h3>
        <p>Compare up to 3 hostels side-by-side across price, facilities, distance, and ratings.</p>
      </div>

      <div class="why-card" id="why-card-4">
        <span class="why-icon" aria-hidden="true">🎓</span>
        <h3>Student Focused</h3>
        <p>Built specifically for university students in Pakistan with affordable options near every campus.</p>
      </div>

    </div>
  </div>
</section>

<!-- Carousel Logic -->
<script src="/NestUp/js/carousel.js"></script>

<?php require_once 'includes/footer.php'; ?>
