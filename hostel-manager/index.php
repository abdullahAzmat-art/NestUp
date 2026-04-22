<?php require_once '../includes/dashboard-header.php'; ?>

<div class="stats-grid" style="margin-bottom: 40px;">
    <!-- My Hostels Card -->
    <div class="stat-card" style="border-left: 5px solid #16a34a; background: linear-gradient(135deg, #fff 0%, #f0fdf4 100%);">
        <div class="stat-info">
            <h3 style="font-weight: 600; color: #166534;">My Hostels</h3>
            <div class="stat-value" style="color: #15803d; font-size: 2.2rem;">3</div>
            <p style="font-size: 0.8rem; color: #16a34a; margin-top: 5px;"><i class="fas fa-arrow-up"></i> All active</p>
        </div>
        <div class="stat-icon" style="background: #dcfce7; color: #16a34a; width: 60px; height: 60px; border-radius: 15px;">
            <i class="fas fa-building"></i>
        </div>
    </div>
    
    <!-- Total Reviews Card -->
    <div class="stat-card" style="border-left: 5px solid #2563eb; background: linear-gradient(135deg, #fff 0%, #eff6ff 100%);">
        <div class="stat-info">
            <h3 style="font-weight: 600; color: #1e40af;">Total Reviews</h3>
            <div class="stat-value" style="color: #1d4ed8; font-size: 2.2rem;">12</div>
            <p style="font-size: 0.8rem; color: #3b82f6; margin-top: 5px;"><i class="fas fa-star"></i> 4.5 avg rating</p>
        </div>
        <div class="stat-icon" style="background: #dbeafe; color: #2563eb; width: 60px; height: 60px; border-radius: 15px;">
            <i class="fas fa-star"></i>
        </div>
    </div>
    
    <!-- New Messages Card -->
    <div class="stat-card" style="border-left: 5px solid #d97706; background: linear-gradient(135deg, #fff 0%, #fffbeb 100%);">
        <div class="stat-info">
            <h3 style="font-weight: 600; color: #92400e;">New Inquiries</h3>
            <div class="stat-value" style="color: #b45309; font-size: 2.2rem;">5</div>
            <p style="font-size: 0.8rem; color: #d97706; margin-top: 5px;"><i class="fas fa-clock"></i> Last 24 hours</p>
        </div>
        <div class="stat-icon" style="background: #fef3c7; color: #d97706; width: 60px; height: 60px; border-radius: 15px;">
            <i class="fas fa-envelope"></i>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
    <!-- Quick Actions -->
    <div class="admin-card" style="border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.03);">
        <div class="card-header" style="background: #fff; padding: 25px;">
            <div class="card-title" style="font-size: 1.2rem; color: #334155;">Recent Activity</div>
        </div>
        <div class="admin-content" style="padding: 25px;">
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div style="display: flex; gap: 15px; align-items: center; padding-bottom: 15px; border-bottom: 1px solid #f1f5f9;">
                    <div style="width: 10px; height: 10px; border-radius: 50%; background: #10b981;"></div>
                    <div style="flex: 1;">
                        <div style="font-weight: 600; font-size: 0.95rem;">Hostel "Al-Noor" was verified</div>
                        <div style="font-size: 0.8rem; color: #64748b;">Today, 10:45 AM</div>
                    </div>
                </div>
                <div style="display: flex; gap: 15px; align-items: center; padding-bottom: 15px; border-bottom: 1px solid #f1f5f9;">
                    <div style="width: 10px; height: 10px; border-radius: 50%; background: #3b82f6;"></div>
                    <div style="flex: 1;">
                        <div style="font-weight: 600; font-size: 0.95rem;">New 5-star review received</div>
                        <div style="font-size: 0.8rem; color: #64748b;">Yesterday, 04:20 PM</div>
                    </div>
                </div>
                <div style="display: flex; gap: 15px; align-items: center;">
                    <div style="width: 10px; height: 10px; border-radius: 50%; background: #f59e0b;"></div>
                    <div style="flex: 1;">
                        <div style="font-weight: 600; font-size: 0.95rem;">New inquiry for "City Residency"</div>
                        <div style="font-size: 0.8rem; color: #64748b;">Yesterday, 11:15 AM</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Manager Shortcut -->
    <div class="admin-card" style="border-radius: 15px; border: none; background: var(--mgr-sidebar); color: #fff; padding: 30px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
        <div style="font-size: 3rem; margin-bottom: 20px;">🏠</div>
        <h3 style="margin-bottom: 10px; font-weight: 700;">Ready to expand?</h3>
        <p style="font-size: 0.9rem; color: rgba(255,255,255,0.7); margin-bottom: 25px;">Add another hostel listing to reach more students across the city.</p>
        <a href="add-hostel.php" class="btn-primary" style="background: #fff; color: var(--mgr-sidebar); width: 100%;">+ Add Listing</a>
    </div>
</div>

<?php require_once '../includes/dashboard-footer.php'; ?>
