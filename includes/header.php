<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NestUp - Find Your Hostel</title>
  <meta name="description" content="NestUp — Discover verified student hostels near your university with real reviews. Find your home away from home.">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="/NestUp/css/style.css">
</head>
<body>

<!-- =========================================================
     PAGE PRELOADER / LOGO SPLASH
     ========================================================= -->
<div id="nestup-preloader" role="status" aria-label="Loading NestUp" aria-live="polite">
  <div class="preloader-inner">

    <!-- Animated logo -->
    <div class="preloader-logo" id="preloader-logo">
      <span class="logo-nest">Nest</span><span class="logo-up">Up</span>
    </div>

    <!-- Tagline fades in after logo -->
    <p class="preloader-tagline" id="preloader-tagline">
      Find your home away from home
    </p>

    <!-- Progress bar -->
    <div class="preloader-bar-wrap" aria-hidden="true">
      <div class="preloader-bar" id="preloader-bar"></div>
    </div>

  </div>
</div>

<!-- =========================================================
     NAVBAR
     ========================================================= -->
<nav class="navbar" id="main-navbar" role="navigation" aria-label="Main navigation">
  <div class="navbar-inner">

    <!-- Logo -->
    <a class="logo" href="/NestUp/" aria-label="NestUp Home">NestUp</a>

    <!-- Centre: Search -->
    <div class="navbar-search">
      <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
           viewBox="0 0 24 24" fill="none" stroke="currentColor"
           stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <circle cx="11" cy="11" r="8"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
      </svg>
      <input
        type="search"
        id="navbar-search-input"
        placeholder="Search hostels..."
        aria-label="Search hostels"
        autocomplete="off"
        onkeydown="if(event.key==='Enter'){ window.location='/NestUp/search.php?q='+encodeURIComponent(this.value); }"
      >
    </div>

    <!-- Right: Nav links + Auth buttons -->
    <div class="navbar-actions">
      <nav class="nav-links" aria-label="Site links">
        <a href="/NestUp/" id="nav-home">Home</a>
        <a href="/NestUp/search.php" id="nav-search">Search Hostels</a>
        <a href="/NestUp/compare.php" id="nav-compare">Compare</a>
      </nav>

      <a href="/NestUp/login.php" class="btn-outline" id="btn-login">Login</a>
      <a href="/NestUp/register.php" class="btn-primary" id="btn-register">Register</a>
    </div>

    <!-- Hamburger (mobile) -->
    <button class="hamburger" id="hamburger-btn" aria-label="Toggle menu" aria-expanded="false" aria-controls="mobile-menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div><!-- /.navbar-inner -->
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobile-menu" aria-hidden="true">
  <a href="/NestUp/" id="mob-nav-home">Home</a>
  <a href="/NestUp/search.php" id="mob-nav-search">Search Hostels</a>
  <a href="/NestUp/compare.php" id="mob-nav-compare">Compare Hostels</a>
  <div class="mobile-btns">
    <a href="/NestUp/login.php" class="btn-outline" id="mob-btn-login">Login</a>
    <a href="/NestUp/register.php" class="btn-primary" id="mob-btn-register">Register</a>
  </div>
</div>
