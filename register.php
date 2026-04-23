<?php
// 1. Start the session
session_start();

// 2. Connect to the database
require_once 'includes/db.php';

// 3. Check if the green "Sign Up" button was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Grab all the data from Abdullah's text fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Rule 1: Make sure the user didn't make a typo in their password
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match! Please try again.');</script>";
    } else {
        
        // Rule 2: Check if this email is already registered in our database
        $checkEmail = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $checkEmail->execute(['email' => $email]);
        
        if ($checkEmail->rowCount() > 0) {
            // Email is already in the database!
            echo "<script>alert('This email is already registered. Please go to the Log In page.');</script>";
        } else {
            
            // SUCCESS PATH: Everything is correct!
            
            // 1. Encrypt the password mathematically
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = 'student'; // Everyone registering through this form is a student
            
            // 2. Insert the brand new user into your XAMPP database
            $insertQuery = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
            
            if ($insertQuery->execute(['name' => $name, 'email' => $email, 'password' => $hashed_password, 'role' => $role])) {
                
                // 3. Show success message and automatically redirect to the login page!
                echo "<script>
                        alert('Registration Successful! Welcome to NestUp. Please log in.');
                        window.location.href = 'login.php';
                      </script>";
                exit();
            } else {
                echo "<script>alert('Database error. Could not register user.');</script>";
            }
        }
    }
}
?>



<?php require_once 'includes/header.php'; ?>

<!-- Include Authentication CSS -->
<link rel="stylesheet" href="/NestUp/css/auth.css">

<main class="auth-page">
  
  <!-- LEFT SIDE: Form -->
  <section class="auth-section-form">
    <div class="auth-container">
      
      <div class="auth-header">
        <h1>Create Account</h1>
        <p>Join NestUp to find and review hostels</p>
      </div>

      <!-- Registration Form -->
      <form action="/NestUp/register.php" method="POST" id="register-form">
        
        <!-- Full Name Field -->
        <div class="form-group">
          <label for="name" class="form-label">Full Name</label>
          <div class="form-input-wrap">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <input 
              type="text" 
              id="name" 
              name="name" 
              class="form-input" 
              placeholder="John Doe" 
              required 
              aria-required="true"
            >
          </div>
        </div>

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

        <!-- Confirm Password Field -->
        <div class="form-group">
          <label for="confirm_password" class="form-label">Confirm Password</label>
          <div class="form-input-wrap">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            <input 
              type="password" 
              id="confirm_password" 
              name="confirm_password" 
              class="form-input" 
              placeholder="••••••••" 
              required 
              aria-required="true"
            >
          </div>
        </div>

        <!-- Options Row -->
        <div class="auth-options" style="margin-bottom:28px;">
          <label class="terms-checkbox">
            <input type="checkbox" name="terms" id="terms" required aria-required="true">
            <span>I agree to the <a href="#" style="color:var(--color-primary);text-decoration:none;font-weight:500;">Terms & Conditions</a></span>
          </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-primary auth-submitBtn" aria-label="Create Account">
          Sign Up
        </button>

      </form>

      <!-- Footer Links -->
      <div class="auth-footer">
        Already have an account? <a href="/NestUp/login.php">Log In</a>
      </div>

    </div>
  </section>

  <!-- RIGHT SIDE: Split Image -->
  <section class="auth-section-image" aria-hidden="true">
    <div class="auth-image-bg" style="background-image: url('/NestUp/assets/register-bg.png');"></div>
    <div class="auth-image-overlay">
      <div class="auth-image-content">
        <div class="auth-quote-mark">“</div>
        <h2>A community that supports you.</h2>
        <p>Your academics are stressful enough. Discover verified hostels with the amenities you need to succeed.</p>
      </div>
    </div>
  </section>

</main>

<?php require_once 'includes/footer.php'; ?>
