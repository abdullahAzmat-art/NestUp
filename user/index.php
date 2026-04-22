<?php require_once '../includes/header.php'; ?>

<section class="user-dashboard" style="padding: 100px 0; background: var(--bg-soft);">
    <div class="container">
        <div style="display: grid; grid-template-columns: 300px 1fr; gap: 30px;">
            
            <!-- User Sidebar -->
            <aside style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); height: fit-content;">
                <div style="text-align: center; margin-bottom: 30px;">
                    <div style="width: 100px; height: 100px; background: var(--primary); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; font-weight: 700; margin: 0 auto 15px;">
                        JD
                    </div>
                    <h3 style="margin-bottom: 5px;">John Doe</h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Student at FAST NUCES</p>
                </div>
                
                <nav style="display: flex; flex-direction: column; gap: 10px;">
                    <a href="#" style="padding: 12px 15px; background: var(--bg-soft); color: var(--primary); border-radius: 8px; font-weight: 600; text-decoration: none;">
                        <i class="fas fa-user" style="margin-right: 10px;"></i> My Profile
                    </a>
                    <a href="#" style="padding: 12px 15px; color: var(--text-main); border-radius: 8px; text-decoration: none; transition: 0.3s;" onmouseover="this.style.background='var(--bg-soft)'" onmouseout="this.style.background='transparent'">
                        <i class="fas fa-heart" style="margin-right: 10px;"></i> Favorites
                    </a>
                    <a href="#" style="padding: 12px 15px; color: var(--text-main); border-radius: 8px; text-decoration: none; transition: 0.3s;" onmouseover="this.style.background='var(--bg-soft)'" onmouseout="this.style.background='transparent'">
                        <i class="fas fa-calendar-alt" style="margin-right: 10px;"></i> Bookings
                    </a>
                    <hr style="border: 0; border-top: 1px solid #eee; margin: 10px 0;">
                    <a href="../logout.php" style="padding: 12px 15px; color: #EF4444; border-radius: 8px; text-decoration: none;">
                        <i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i> Logout
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main>
                <div style="background: #fff; padding: 40px; border-radius: 15px; box-shadow: var(--shadow-sm); margin-bottom: 30px;">
                    <h2 style="margin-bottom: 25px;">Welcome back, John!</h2>
                    <p style="color: var(--text-muted); line-height: 1.6;">Manage your profile, view your favorite hostels, and track your booking status all in one place.</p>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm);">
                        <h4 style="margin-bottom: 15px;">Favorite Hostels</h4>
                        <p style="font-size: 0.9rem; color: var(--text-muted);">You haven't saved any hostels yet.</p>
                        <a href="../search.php" style="display: inline-block; margin-top: 15px; color: var(--primary); font-weight: 600; text-decoration: none;">Browse Hostels →</a>
                    </div>
                    <div style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm);">
                        <h4 style="margin-bottom: 15px;">Recent Bookings</h4>
                        <p style="font-size: 0.9rem; color: var(--text-muted);">No active bookings found.</p>
                    </div>
                </div>
            </main>

        </div>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
