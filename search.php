<?php require_once 'includes/header.php'; ?>

<!-- Extra stylesheets for this page -->
<link rel="stylesheet" href="/NestUp/css/search.css">
<link rel="stylesheet" href="/NestUp/css/hostel-card.css">

<!-- =========================================================
     SEARCH PAGE
     ========================================================= -->
<main class="search-page" id="search-page">
  <div class="container">

    <div class="search-page-header">
      <h1>Find Your Hostel</h1>
      <p>Use the filters below to discover the perfect hostel near your university.</p>
    </div>

    <!-- Two-column layout -->
    <div class="search-layout">

      <!-- ===================================================
           LEFT: Filter Sidebar
           =================================================== -->
      <aside class="filter-sidebar" id="filter-sidebar" aria-label="Search filters">

        <h2 class="filter-heading">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
               stroke-linejoin="round" aria-hidden="true">
            <line x1="4" y1="6" x2="20" y2="6"/>
            <line x1="8" y1="12" x2="16" y2="12"/>
            <line x1="11" y1="18" x2="13" y2="18"/>
          </svg>
          Filters
        </h2>

        <!-- University / City Search -->
        <div class="filter-section">
          <label class="filter-label" for="search-q">University or City</label>
          <input
            type="text"
            id="search-q"
            class="sidebar-search-input"
            placeholder="University or city name"
            autocomplete="off"
            aria-label="Search by university or city"
          >
        </div>

        <div class="filter-divider"></div>

        <!-- Price Range -->
        <div class="filter-section">
          <div class="price-slider-row">
            <label class="filter-label" for="price">Max Price</label>
            <span class="price-value-display" id="price-display">Rs. 15,000</span>
          </div>
          <input
            type="range"
            id="price"
            class="price-slider"
            min="3000"
            max="30000"
            step="500"
            value="15000"
            aria-label="Maximum price range"
          >
          <div class="price-range-limits">
            <span>Rs. 3,000</span>
            <span>Rs. 30,000</span>
          </div>
        </div>

        <div class="filter-divider"></div>

        <!-- Facilities Checkboxes -->
        <div class="filter-section">
          <span class="filter-label">Facilities</span>
          <div class="checkbox-group" role="group" aria-label="Facility filters">

            <label class="checkbox-item">
              <input type="checkbox" id="wifi" class="filter-input" aria-label="WiFi Available">
              <span class="checkbox-label">📶 WiFi Available</span>
            </label>

            <label class="checkbox-item">
              <input type="checkbox" id="ac" class="filter-input" aria-label="AC Rooms">
              <span class="checkbox-label">❄️ AC Rooms</span>
            </label>

            <label class="checkbox-item">
              <input type="checkbox" id="solar" class="filter-input" aria-label="Solar Energy">
              <span class="checkbox-label">☀️ Solar Energy</span>
            </label>

            <label class="checkbox-item">
              <input type="checkbox" id="mess" class="filter-input" aria-label="Mess Food">
              <span class="checkbox-label">🍽️ Mess Food</span>
            </label>

            <label class="checkbox-item">
              <input type="checkbox" id="laundry" class="filter-input" aria-label="Laundry">
              <span class="checkbox-label">👕 Laundry</span>
            </label>

            <label class="checkbox-item">
              <input type="checkbox" id="cctv" class="filter-input" aria-label="CCTV Security">
              <span class="checkbox-label">📷 CCTV Security</span>
            </label>

          </div>
        </div>

        <div class="filter-divider"></div>

        <!-- Distance Dropdown -->
        <div class="filter-section">
          <label class="filter-label" for="distance">Distance from Campus</label>
          <select id="distance" class="filter-select" aria-label="Distance from campus">
            <option value="">Any Distance</option>
            <option value="0.5">Under 0.5 km</option>
            <option value="1">Under 1 km</option>
            <option value="2">Under 2 km</option>
            <option value="5">Under 5 km</option>
          </select>
        </div>

        <div class="filter-divider"></div>

        <!-- Search Button -->
        <button
          id="search-btn"
          class="btn-primary filter-submit"
          aria-label="Search hostels with selected filters"
        >
          🔍 Search Hostels
        </button>

      </aside><!-- /.filter-sidebar -->

      <!-- ===================================================
           RIGHT: Results Area
           =================================================== -->
      <section class="results-area" id="results-area" aria-label="Search results" aria-live="polite">

        <!-- Results Header (count) -->
        <div class="results-header" id="results-header" style="display:none;">
          <p class="results-count" id="results-count-text"></p>
        </div>

        <!-- Loading Spinner -->
        <div id="loading" role="status" aria-label="Loading results">
          <div class="spinner" aria-hidden="true"></div>
          <p>Finding hostels for you...</p>
        </div>

        <!-- No Results Message -->
        <div id="no-results" role="alert" aria-live="assertive">
          <span class="no-results-icon" aria-hidden="true">🏠</span>
          <h3>No hostels found</h3>
          <p>No hostels found. Try changing your filters or search term.</p>
        </div>

        <!-- Results Grid — JavaScript fills this -->
        <div id="results-grid" class="results-grid" aria-label="Hostel listings"></div>

      </section><!-- /.results-area -->

    </div><!-- /.search-layout -->

  </div><!-- /.container -->
</main>

<!-- =========================================================
     FLOATING COMPARE BAR
     ========================================================= -->
<div id="compare-bar" role="complementary" aria-label="Compare bar" aria-hidden="true">
  <p class="compare-bar-text">
    Compare selected hostels
    <span id="compare-count" aria-live="polite">0</span>
  </p>
  <div class="compare-bar-actions">
    <button id="compare-now-btn" aria-label="Compare selected hostels now">Compare Now</button>
    <button id="clear-compare-btn" aria-label="Clear all selected hostels">Clear</button>
  </div>
</div>

<!-- Search page JS -->
<script src="/NestUp/js/search.js"></script>

<?php require_once 'includes/footer.php'; ?>
