/**
 * NestUp — search.js
 * Handles filter interactions, AJAX hostel fetching,
 * card rendering, and the compare feature.
 */

(function () {
  'use strict';

  /* ── DOM References ──────────────────────────────────────── */
  const searchInput    = document.getElementById('search-q');
  const priceSlider    = document.getElementById('price');
  const priceDisplay   = document.getElementById('price-display');
  const filterCheckboxes = document.querySelectorAll('.filter-input');
  const distanceSelect = document.getElementById('distance');
  const searchBtn      = document.getElementById('search-btn');

  const loadingDiv     = document.getElementById('loading');
  const noResultsDiv   = document.getElementById('no-results');
  const resultsGrid    = document.getElementById('results-grid');
  const resultsHeader  = document.getElementById('results-header');
  const resultsCount   = document.getElementById('results-count-text');

  const compareBar     = document.getElementById('compare-bar');
  const compareCount   = document.getElementById('compare-count');
  const compareNowBtn  = document.getElementById('compare-now-btn');
  const clearCompBtn   = document.getElementById('clear-compare-btn');

  /* ── Compare State ───────────────────────────────────────── */
  let selectedHostels = []; // Array of hostel IDs selected for comparison

  /* ── Utility: Format price as Rs. 15,000 ────────────────── */
  function formatPrice(value) {
    return 'Rs. ' + parseInt(value, 10).toLocaleString('en-PK');
  }

  /* ── Utility: Generate star string ──────────────────────── */
  function generateStars(rating) {
    const full  = Math.floor(rating);
    const half  = (rating % 1) >= 0.5 ? 1 : 0;
    const empty = 5 - full - half;
    return '★'.repeat(full) + (half ? '½' : '') + '☆'.repeat(empty);
  }

  /* ── Utility: Badge HTML ─────────────────────────────────── */
  function buildBadges(hostel) {
    let html = '';
    if (hostel.wifi)    html += '<span class="badge badge-wifi">📶 WiFi</span>';
    if (hostel.ac)      html += '<span class="badge badge-ac">❄️ AC</span>';
    if (hostel.mess)    html += '<span class="badge badge-food">🍽️ Mess Food</span>';
    if (hostel.solar)   html += '<span class="badge badge-solar">☀️ Solar</span>';
    if (hostel.laundry) html += '<span class="badge badge-laundry">👕 Laundry</span>';
    if (hostel.cctv)    html += '<span class="badge badge-cctv">📷 CCTV</span>';
    return html || '<span class="badge badge-laundry">No extras listed</span>';
  }

  /* ── 1. Price Slider Live Update ─────────────────────────── */
  if (priceSlider && priceDisplay) {
    priceSlider.addEventListener('input', function () {
      priceDisplay.textContent = formatPrice(this.value);
    });
  }

  /* ── 2. Read All Filter Values ───────────────────────────── */
  function getFilters() {
    return {
      q:        searchInput   ? searchInput.value.trim()   : '',
      price:    priceSlider   ? priceSlider.value           : '15000',
      wifi:     document.getElementById('wifi')    ? document.getElementById('wifi').checked    : false,
      ac:       document.getElementById('ac')      ? document.getElementById('ac').checked      : false,
      solar:    document.getElementById('solar')   ? document.getElementById('solar').checked   : false,
      mess:     document.getElementById('mess')    ? document.getElementById('mess').checked    : false,
      laundry:  document.getElementById('laundry') ? document.getElementById('laundry').checked : false,
      cctv:     document.getElementById('cctv')    ? document.getElementById('cctv').checked    : false,
      distance: distanceSelect ? distanceSelect.value : '',
    };
  }

  /* ── 3. Build Query String ───────────────────────────────── */
  function buildQueryString(filters) {
    const params = new URLSearchParams();
    Object.keys(filters).forEach(function (key) {
      if (filters[key] !== '' && filters[key] !== false) {
        params.set(key, filters[key]);
      }
    });
    return params.toString();
  }

  /* ── 4. Show / Hide UI States ────────────────────────────── */
  function showLoading() {
    if (loadingDiv)    { loadingDiv.style.display = 'flex'; loadingDiv.classList.add('visible'); }
    if (noResultsDiv)  { noResultsDiv.style.display = 'none'; noResultsDiv.classList.remove('visible'); }
    if (resultsGrid)   { resultsGrid.style.display = 'none'; }
    if (resultsHeader) { resultsHeader.style.display = 'none'; }
  }

  function hideLoading() {
    if (loadingDiv) { loadingDiv.style.display = 'none'; loadingDiv.classList.remove('visible'); }
  }

  function showNoResults() {
    if (noResultsDiv) { noResultsDiv.style.display = 'flex'; noResultsDiv.classList.add('visible'); }
    if (resultsGrid)  { resultsGrid.style.display = 'none'; }
    if (resultsHeader){ resultsHeader.style.display = 'none'; }
  }

  function showResults(count) {
    if (noResultsDiv)  { noResultsDiv.style.display = 'none'; noResultsDiv.classList.remove('visible'); }
    if (resultsGrid)   { resultsGrid.style.display = 'grid'; }
    if (resultsHeader) { resultsHeader.style.display = 'flex'; }
    if (resultsCount)  {
      resultsCount.innerHTML = 'Showing <strong>' + count + '</strong> hostel' + (count !== 1 ? 's' : '');
    }
  }

  /* ── 5. Render Cards ─────────────────────────────────────── */
  function renderCards(hostels) {
    if (!resultsGrid) return;
    resultsGrid.innerHTML = '';

    if (!hostels || hostels.length === 0) {
      showNoResults();
      return;
    }

    showResults(hostels.length);

    hostels.forEach(function (hostel) {
      const isChecked = selectedHostels.includes(String(hostel.id));
      const stars     = generateStars(parseFloat(hostel.rating) || 0);
      const imgSrc    = hostel.image || '/NestUp/assets/hostel-placeholder.jpg';

      const card = document.createElement('article');
      card.className = 'hostel-card';
      card.setAttribute('data-id', hostel.id);
      card.setAttribute('aria-label', hostel.name);

      card.innerHTML = `
        <div class="compare-checkbox-wrap">
          <label>
            <input
              type="checkbox"
              class="compare-checkbox"
              data-id="${hostel.id}"
              aria-label="Compare ${hostel.name}"
              ${isChecked ? 'checked' : ''}
            >
            Compare
          </label>
        </div>

        <div class="card-image-wrap">
          <img
            src="${imgSrc}"
            alt="${hostel.name} exterior"
            class="card-image"
            loading="lazy"
            onerror="this.style.background='linear-gradient(135deg,#1D9E75,#0F6E56)';this.style.height='200px';"
          >
        </div>

        <div class="card-body">
          <div class="card-top">
            <h3 class="card-name">${hostel.name}</h3>
            <span class="card-city">📍 ${hostel.city || 'Lahore'}</span>
          </div>
          <p class="card-distance">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
              <circle cx="12" cy="10" r="3"/>
            </svg>
            ${hostel.distance ? hostel.distance + ' km from ' + (hostel.university || 'campus') : 'On-campus area'}
          </p>
          <div class="card-badges">${buildBadges(hostel)}</div>
          <div class="card-price-row">
            <span class="card-price">Rs. ${parseInt(hostel.price, 10).toLocaleString('en-PK')}<small style="font-size:0.7em;font-weight:400;">/mo</small></span>
            <div class="card-rating">
              <span class="stars" aria-label="${hostel.rating} stars">${stars}</span>
              <span class="rating-num">${hostel.rating}</span>
            </div>
          </div>
          <div class="card-footer">
            <a href="/NestUp/hostel-detail.php?id=${hostel.id}" class="btn-primary" id="view-hostel-${hostel.id}">
              View Details
            </a>
          </div>
        </div>
      `;

      // Attach compare checkbox event
      const checkbox = card.querySelector('.compare-checkbox');
      if (checkbox) {
        checkbox.addEventListener('change', handleCompareCheckbox);
      }

      resultsGrid.appendChild(card);
    });
  }

  /* ── 6. Fetch Hostels from API ───────────────────────────── */
  function fetchHostels() {
    const filters     = getFilters();
    const queryString = buildQueryString(filters);

    showLoading();

    fetch('/NestUp/ajax/search_hostels.php?' + queryString)
      .then(function (response) {
        if (!response.ok) {
          throw new Error('Network response was not OK. Status: ' + response.status);
        }
        return response.json();
      })
      .then(function (data) {
        hideLoading();
        renderCards(data);
      })
      .catch(function (error) {
        hideLoading();
        if (resultsGrid) {
          resultsGrid.style.display = 'block';
          resultsGrid.innerHTML =
            '<p style="color:#B91C1C;text-align:center;padding:40px;font-size:0.9rem;">' +
            '⚠️ Could not load hostels. Please check your connection and try again.' +
            '</p>';
        }
        console.error('NestUp fetchHostels error:', error);
      });
  }

  /* ── 7. Compare Feature ──────────────────────────────────── */
  function updateCompareBar() {
    const count = selectedHostels.length;
    if (compareCount) compareCount.textContent = count;

    if (compareBar) {
      if (count >= 2) {
        compareBar.classList.add('visible');
        compareBar.setAttribute('aria-hidden', 'false');
      } else {
        compareBar.classList.remove('visible');
        compareBar.setAttribute('aria-hidden', 'true');
      }
    }
  }

  function handleCompareCheckbox(e) {
    const checkbox = e.target;
    const hostelId = String(checkbox.dataset.id);

    if (checkbox.checked) {
      if (selectedHostels.length >= 3) {
        checkbox.checked = false;
        alert('You can compare a maximum of 3 hostels at once. Please uncheck one before adding another.');
        return;
      }
      if (!selectedHostels.includes(hostelId)) {
        selectedHostels.push(hostelId);
      }
    } else {
      selectedHostels = selectedHostels.filter(function (id) { return id !== hostelId; });
    }

    updateCompareBar();
  }

  // Compare Now → redirect
  if (compareNowBtn) {
    compareNowBtn.addEventListener('click', function () {
      if (selectedHostels.length >= 2) {
        window.location.href = '/NestUp/compare.php?ids=' + selectedHostels.join(',');
      }
    });
  }

  // Clear Compare
  if (clearCompBtn) {
    clearCompBtn.addEventListener('click', function () {
      selectedHostels = [];
      document.querySelectorAll('.compare-checkbox').forEach(function (cb) {
        cb.checked = false;
      });
      updateCompareBar();
    });
  }

  /* ── 8. Filter Event Listeners ───────────────────────────── */
  // Auto-fetch on checkbox change
  filterCheckboxes.forEach(function (cb) {
    cb.addEventListener('change', fetchHostels);
  });

  // Auto-fetch on dropdown change
  if (distanceSelect) {
    distanceSelect.addEventListener('change', fetchHostels);
  }

  // Search button
  if (searchBtn) {
    searchBtn.addEventListener('click', fetchHostels);
  }

  // Search input enter key
  if (searchInput) {
    searchInput.addEventListener('keydown', function (e) {
      if (e.key === 'Enter') fetchHostels();
    });
  }

  /* ── 9. Pre-fill from URL params ─────────────────────────── */
  function prefillFromURL() {
    const params = new URLSearchParams(window.location.search);
    if (params.get('q') && searchInput) {
      searchInput.value = params.get('q');
    }
    if (params.get('price') && priceSlider) {
      priceSlider.value = params.get('price');
      if (priceDisplay) priceDisplay.textContent = formatPrice(params.get('price'));
    }
    ['wifi', 'ac', 'solar', 'mess', 'laundry', 'cctv'].forEach(function (id) {
      const el = document.getElementById(id);
      if (el && params.get(id) === 'true') el.checked = true;
    });
    if (distanceSelect && params.get('distance')) {
      distanceSelect.value = params.get('distance');
    }
  }

  /* ── 10. Init ─────────────────────────────────────────────── */
  prefillFromURL();
  fetchHostels(); // Load all hostels on page load

})();
