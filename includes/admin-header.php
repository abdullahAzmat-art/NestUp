<?php require_once 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - NestUp</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Admin Stylesheet -->
    <link rel="stylesheet" href="/NestUp/css/style.css">
    <link rel="stylesheet" href="/NestUp/css/admin.css">
</head>
<body>

<div class="admin-wrapper">
    <!-- Sidebar -->
    <aside class="admin-sidebar" id="admin-sidebar">
        <div class="sidebar-logo">
            NestUp <span style="color:#fff; font-weight:400; font-size:0.8rem;">Admin</span>
        </div>
        
        <nav class="sidebar-nav">
            <a href="/NestUp/admin/index.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                <i class="fas fa-chart-line"></i>
                Dashboard
            </a>
            <a href="/NestUp/admin/hostels.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'hostels.php') ? 'active' : ''; ?>">
                <i class="fas fa-building"></i>
                Verify Hostels
            </a>
            <a href="/NestUp/admin/users.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'users.php') ? 'active' : ''; ?>">
                <i class="fas fa-users"></i>
                Manage Users
            </a>
            <a href="/NestUp/admin/reviews.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'reviews.php') ? 'active' : ''; ?>">
                <i class="fas fa-star"></i>
                Monitor Reviews
            </a>
        </nav>
        
        <div class="sidebar-footer">
            <a href="/NestUp/index.php" class="nav-item">
                <i class="fas fa-external-link-alt"></i>
                View Site
            </a>
            <a href="/NestUp/logout.php" class="nav-item" style="color:#EF4444;">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <header class="admin-header">
            <div class="header-title">
                <h2><?php 
                    $page = basename($_SERVER['PHP_SELF']);
                    switch($page) {
                        case 'hostels.php': echo 'Hostel Verification'; break;
                        case 'users.php': echo 'User Management'; break;
                        case 'reviews.php': echo 'Review Moderation'; break;
                        default: echo 'Admin Dashboard';
                    }
                ?></h2>
            </div>
            
            <div class="admin-profile">
                <div class="admin-info" style="text-align:right;">
                    <div style="font-weight:600; font-size:0.9rem;">Admin User</div>
                    <div style="font-size:0.75rem; color:var(--admin-text-muted);">Main Administrator</div>
                </div>
                <div class="admin-avatar">AD</div>
            </div>
        </header>
        
        <div class="admin-content">
