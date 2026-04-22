<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'db.php'; 

// Identify role (assuming it's set in session, otherwise fallback based on directory)
if (!isset($_SESSION['role'])) {
    if (strpos($_SERVER['PHP_SELF'], '/admin/') !== false) {
        $_SESSION['role'] = 'admin';
    } elseif (strpos($_SERVER['PHP_SELF'], '/hostel-manager/') !== false) {
        $_SESSION['role'] = 'manager';
    } else {
        $_SESSION['role'] = 'user';
    }
}
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($role); ?> Dashboard - NestUp</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Unified Stylesheets -->
    <link rel="stylesheet" href="/NestUp/css/style.css">
    <link rel="stylesheet" href="/NestUp/css/admin.css">
    <?php if($role == 'manager'): ?>
    <link rel="stylesheet" href="/NestUp/css/manager.css">
    <?php endif; ?>
</head>
<body>

<div class="admin-wrapper">
    <!-- Sidebar -->
    <aside class="admin-sidebar" id="admin-sidebar" <?php if($role == 'manager') echo 'style="background: linear-gradient(180deg, #166534 0%, #064e3b 100%);"'; ?>>
        <div class="sidebar-logo">
            NestUp <span style="color:#fff; font-weight:400; font-size:0.8rem;"><?php echo ucfirst($role); ?></span>
        </div>
        
        <nav class="sidebar-nav">
            <?php if ($role == 'admin'): ?>
                <!-- Admin Links -->
                <a href="/NestUp/admin/index.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
                <a href="/NestUp/admin/hostels.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'hostels.php') ? 'active' : ''; ?>">
                    <i class="fas fa-building"></i> Verify Hostels
                </a>
                <a href="/NestUp/admin/add-hostel.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'add-hostel.php') ? 'active' : ''; ?>">
                    <i class="fas fa-plus-circle"></i> Add New Hostel
                </a>
                <a href="/NestUp/admin/users.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'users.php') ? 'active' : ''; ?>">
                    <i class="fas fa-users"></i> Manage Users
                </a>
                <a href="/NestUp/admin/reviews.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'reviews.php') ? 'active' : ''; ?>">
                    <i class="fas fa-star"></i> Monitor Reviews
                </a>
            <?php elseif ($role == 'manager'): ?>
                <!-- Hostel Manager Links -->
                <a href="/NestUp/hostel-manager/index.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
                <a href="/NestUp/hostel-manager/my-hostels.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'my-hostels.php') ? 'active' : ''; ?>">
                    <i class="fas fa-building"></i> My Hostels
                </a>
                <a href="/NestUp/hostel-manager/add-hostel.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'add-hostel.php') ? 'active' : ''; ?>">
                    <i class="fas fa-plus-circle"></i> Add New Hostel
                </a>
            <?php endif; ?>
        </nav>
        
        <div class="sidebar-footer">
            <a href="/NestUp/index.php" class="nav-item">
                <i class="fas fa-external-link-alt"></i> View Site
            </a>
            <a href="/NestUp/logout.php" class="nav-item" style="color:#EF4444;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <header class="admin-header">
            <div class="header-title">
                <h2><?php 
                    $page = basename($_SERVER['PHP_SELF']);
                    if ($role == 'admin') {
                        switch($page) {
                            case 'hostels.php': echo 'Hostel Verification'; break;
                            case 'users.php': echo 'User Management'; break;
                            case 'reviews.php': echo 'Review Moderation'; break;
                            default: echo 'Admin Dashboard';
                        }
                    } else {
                        switch($page) {
                            case 'my-hostels.php': echo 'My Hostel Listings'; break;
                            case 'add-hostel.php': echo 'Add New Hostel'; break;
                            default: echo 'Manager Dashboard';
                        }
                    }
                ?></h2>
            </div>
            
            <div class="admin-profile">
                <div class="admin-info" style="text-align:right;">
                    <div style="font-weight:600; font-size:0.9rem;"><?php echo ($role == 'admin') ? 'Admin User' : 'Hostel Owner'; ?></div>
                    <div style="font-size:0.75rem; color:var(--admin-text-muted);"><?php echo ($role == 'admin') ? 'Main Administrator' : 'Manager Account'; ?></div>
                </div>
                <div class="admin-avatar" <?php if($role == 'manager') echo 'style="background: #166534;"'; ?>>
                    <?php echo ($role == 'admin') ? 'AD' : 'HM'; ?>
                </div>
            </div>
        </header>
        
        <div class="admin-content">
