/**
 * NestUp — compare.js
 * Reads ?ids=1,2,3 from URL, fetches hostel data,
 * builds a full comparison table, and handles column removal.
 */

(function () {
  'use strict';

  /* ── Feature rows for the comparison table ──────────────── */
  const FEATURES = [
    { key: 'name',       label: 'Hostel Name',   type: 'text'    },
    { key: 'city',       label: 'City',          type: 'text'    },
    { key: 'price',      label: 'Monthly Price', type: 'price'   },
    { key: 'distance',   label: 'Distance',      type: 'dist'    },
    { key: 'rating',     label: 'Rating',        type: 'rating'  },
    { key: 'wifi',       label: 'WiFi',          type: 'bool'    },
    { key: 'ac',         label: 'AC Rooms',      type: 'bool'    },
    { key: 'solar',      label: 'Solar Energy',  type: 'bool'    },
    { key: 'mess',       label: 'Mess Food',     type: 'bool'    },
    { key: 'laundry',    label: 'Laundry',       type: 'bool'    },
    { key: 'cctv',       label: 'CCTV Security', type: 'bool'    },
  ];

  /* ── State ───────────────────────────────────────────────── */
  let hostelData = []; // Array of hostel objects currently in table

  /* ── DOM References ──────────────────────────────────────── */
  const compareTableContainer = document.getElementById('compare-table');
  const compareMessage        = document.getElementById('compare-message');
  const comparePageTitle      = document.getElementById('compare-page-title');

  /* ── Utility: Format cell value by type ─────────────────── */
  function formatCell(hostel, feature) {
    const val = hostel[feature.key];

    switch (feature.type) {
      case 'bool':
        return val
          ? '<span class="compare-tick" aria-label="Available">✔</span>'
          : '<span class="compare-cross" aria-label="Not available">✘</span>';

      case 'price':
        return val
          ? 'Rs. ' + parseInt(val, 10).toLocaleString('en-PK') + '<small style="font-size:0.75em;"> /mo</small>'
          : '—';

      case 'dist':
        return val
          ? val + ' km from ' + (hostel.university || 'campus')
          : '—';

      case 'rating':
        if (!val) return '—';
        const stars = '★'.repeat(Math.round(parseFloat(val)));
        return '<span style="color:var(--color-amber);">' + stars + '</span> <strong>' + val + '</strong>';

      default:
        return val || '—';
    }
  }

  /* ── Build Comparison Table ──────────────────────────────── */
  function buildTable(hostels) {
    if (!compareTableContainer) return;

    if (!hostels || hostels.length === 0) {
      showMessage('No hostel data found. Please go back and select hostels to compare.');
      return;
    }

    hostelData = hostels;
    hideMessage();

    /* ── Build <table> ──────────────────────────────────────── */
    const wrapper = document.createElement('div');
    wrapper.className = 'compare-table-wrapper';

    const table = document.createElement('table');
    table.className = 'compare-table';
    table.setAttribute('role', 'table');
    table.setAttribute('aria-label', 'Hostel comparison table');

    /* ── thead ── */
    const thead  = document.createElement('thead');
    const headerRow = document.createElement('tr');

    // First column header: "Feature"
    const thFeature = document.createElement('th');
    thFeature.textContent = 'Feature';
    thFeature.scope = 'col';
    headerRow.appendChild(thFeature);

    // One column per hostel
    hostels.forEach(function (hostel, index) {
      const th = document.createElement('th');
      th.scope = 'col';
      th.setAttribute('data-index', index);
      th.innerHTML =
        '<div style="position:relative;padding-right:22px;">' +
          '<div style="font-size:0.9rem;font-weight:600;margin-bottom:2px;">' + hostel.name + '</div>' +
          '<div style="font-size:0.75rem;opacity:0.8;font-weight:400;">📍 ' + (hostel.city || 'Lahore') + '</div>' +
          '<button class="compare-remove-btn" data-index="' + index + '" aria-label="Remove ' + hostel.name + ' from comparison" title="Remove">✕</button>' +
        '</div>';
      headerRow.appendChild(th);
    });

    thead.appendChild(headerRow);
    table.appendChild(thead);

    /* ── tbody ── */
    const tbody = document.createElement('tbody');

    FEATURES.forEach(function (feature) {
      const row = document.createElement('tr');

      // Feature label cell
      const tdLabel = document.createElement('td');
      tdLabel.textContent = feature.label;
      tdLabel.style.fontWeight = '500';
      row.appendChild(tdLabel);

      // Data cell per hostel
      hostels.forEach(function (hostel) {
        const td = document.createElement('td');
        td.innerHTML = formatCell(hostel, feature);
        row.appendChild(td);
      });

      tbody.appendChild(row);
    });

    /* ── View Details row ──────────────────────────────────── */
    const actionRow = document.createElement('tr');
    const tdEmpty = document.createElement('td');
    tdEmpty.textContent = '';
    actionRow.appendChild(tdEmpty);

    hostels.forEach(function (hostel) {
      const td = document.createElement('td');
      td.innerHTML =
        '<a href="/NestUp/hostel-detail.php?id=' + hostel.id + '" class="btn-primary" ' +
        'style="font-size:0.82rem;padding:8px 14px;">View Details</a>';
      actionRow.appendChild(td);
    });

    tbody.appendChild(actionRow);
    table.appendChild(tbody);
    wrapper.appendChild(table);

    /* ── Inject ────────────────────────────────────────────── */
    compareTableContainer.innerHTML = '';
    compareTableContainer.appendChild(wrapper);

    /* ── Remove hostel buttons ─────────────────────────────── */
    table.querySelectorAll('.compare-remove-btn').forEach(function (btn) {
      btn.addEventListener('click', function () {
        const idx = parseInt(this.dataset.index, 10);
        removeHostel(idx);
      });
    });
  }

  /* ── Remove a hostel column by index ────────────────────── */
  function removeHostel(index) {
    hostelData.splice(index, 1);

    // Update URL
    const newIds = hostelData.map(function (h) { return h.id; });
    const url    = new URL(window.location.href);
    if (newIds.length > 0) {
      url.searchParams.set('ids', newIds.join(','));
      window.history.replaceState({}, '', url.toString());
    }

    if (hostelData.length < 2) {
      buildTable(hostelData); // Rebuild (will show message if < 2)
      showMessage('Add more hostels to compare. <a href="/NestUp/search.php" class="btn-primary" style="margin-top:12px;display:inline-block;">Back to Search</a>', true);
      if (compareTableContainer) compareTableContainer.innerHTML = '';
    } else {
      buildTable(hostelData.slice()); // Rebuild with remaining
    }
  }

  /* ── Show / Hide message ─────────────────────────────────── */
  function showMessage(html, isHTML) {
    if (!compareMessage) return;
    if (isHTML) {
      compareMessage.innerHTML = html;
    } else {
      compareMessage.textContent = html;
    }
    compareMessage.style.display = 'block';
  }

  function hideMessage() {
    if (compareMessage) compareMessage.style.display = 'none';
  }

  /* ── Fetch Comparison Data ───────────────────────────────── */
  function fetchComparison(ids) {
    if (!ids || ids.length === 0) {
      showMessage('No hostels selected. Please go to the search page and select hostels to compare.');
      return;
    }

    // Show loading state
    if (compareTableContainer) {
      compareTableContainer.innerHTML =
        '<div style="text-align:center;padding:60px;color:var(--color-text-muted);">' +
        '<div class="spinner" style="margin:0 auto 16px;"></div>' +
        '<p>Loading comparison...</p>' +
        '</div>';
    }
    hideMessage();

    fetch('/NestUp/ajax/compare_hostels.php?ids=' + ids.join(','))
      .then(function (response) {
        if (!response.ok) {
          throw new Error('Network response not OK. Status: ' + response.status);
        }
        return response.json();
      })
      .then(function (data) {
        buildTable(data);
      })
      .catch(function (error) {
        if (compareTableContainer) compareTableContainer.innerHTML = '';
        showMessage(
          '⚠️ Could not load comparison data. Please check your connection and try again. ' +
          '<a href="/NestUp/search.php" style="color:var(--color-primary);">Back to Search</a>',
          true
        );
        console.error('NestUp compare.js error:', error);
      });
  }

  /* ── Init: Read IDs from URL ─────────────────────────────── */
  function init() {
    const params  = new URLSearchParams(window.location.search);
    const idsParam = params.get('ids');

    if (!idsParam || idsParam.trim() === '') {
      showMessage(
        'No hostels selected for comparison. <br>' +
        '<a href="/NestUp/search.php" style="color:var(--color-primary);font-weight:500;margin-top:8px;display:inline-block;">Browse Hostels →</a>',
        true
      );
      if (compareTableContainer) compareTableContainer.innerHTML = '';
      return;
    }

    const ids = idsParam.split(',').map(function (id) {
      return id.trim();
    }).filter(function (id) {
      return id !== '';
    });

    if (ids.length < 2) {
      showMessage(
        'Please select at least 2 hostels to compare. ' +
        '<a href="/NestUp/search.php" style="color:var(--color-primary);">Back to Search</a>',
        true
      );
      return;
    }

    fetchComparison(ids);
  }

  init();

})();
