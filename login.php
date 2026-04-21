<?php require_once 'includes/header.php'; ?>

<!-- Include Authentication CSS -->
<link rel="stylesheet" href="/NestUp/css/auth.css">

<main class="auth-page">
  
  <!-- LEFT SIDE: Form -->
  <section class="auth-section-form">
    <div class="auth-container">
      
      <div class="auth-header">
        <h1>Welcome Back</h1>
        <p>Log in to your NestUp student account</p>
      </div>

      <!-- Login Form -->
      <form action="/NestUp/login.php" method="POST" id="login-form">
        
        <!-- Email Field -->
        <div class="form-group">
          <label for="email" class="form-label">Email Address</label>
          <div class="form-input-wrap">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <input 
              type="email" 
              id="email" 
              name="email" 
              class="form-input" 
              placeholder="student@university.edu.pk" 
              required 
              aria-required="true"
            >
          </div>
        </div>

        <!-- Password Field -->
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <div class="form-input-wrap">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            <input 
              type="password" 
              id="password" 
              name="password" 
              class="form-input" 
              placeholder="••••••••" 
              required 
              aria-required="true"
            >
          </div>
        </div>

        <!-- Options Row -->
        <div class="auth-options">
          <label class="remember-me">
            <input type="checkbox" name="remember" id="remember">
            <span>Remember me</span>
          </label>
          <a href="/NestUp/forgot-password.php" class="forgot-password">Forgot Password?</a>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-primary auth-submitBtn" aria-label="Log In">
          Log In
        </button>

      </form>

      <!-- Footer Links -->
      <div class="auth-footer">
        Don't have an account? <a href="/NestUp/register.php">Create one</a>
      </div>

    </div>
  </section>

  <!-- RIGHT SIDE: Split Image -->
  <section class="auth-section-image" aria-hidden="true">
    <div class="auth-image-bg" style="background-image: url('/NestUp/assets/login-bg.png');"></div>
    <div class="auth-image-overlay">
      <div class="auth-image-content">
        <div class="auth-quote-mark">“</div>
        <h2>Your hostel should feel like home.</h2>
        <p>Join thousands of students across Pakistan discovering safe, verified, and affordable places to live.</p>
      </div>
    </div>
  </section>

</main>

<?php require_once 'includes/footer.php'; ?>
