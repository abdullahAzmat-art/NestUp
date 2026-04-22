<?php require_once '../includes/header.php'; ?>

<div class="admin-card" style="border-radius: 20px; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.04); overflow: hidden;">
    <div class="card-header" style="background: #fff; padding: 30px; border-bottom: 1px solid #f1f5f9;">
        <div>
            <div class="card-title" style="font-size: 1.3rem; font-weight: 700; color: #0f172a;">My Hostel Listings</div>
            <p style="color: #64748b; font-size: 0.85rem; margin-top: 4px;">You have 3 active listings on NestUp.</p>
        </div>
        <a href="add-hostel.php" class="btn-primary" style="padding: 12px 24px; font-size: 0.9rem;">
            <i class="fas fa-plus" style="margin-right: 8px;"></i> Add New
        </a>
    </div>
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr style="background: #f8fafc;">
                    <th style="padding: 20px 25px;">Hostel Details</th>
                    <th>City</th>
                    <th>Monthly Rent</th>
                    <th>Status</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Hostel 1 -->
                <tr>
                    <td style="padding: 25px;">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="width: 50px; height: 50px; border-radius: 12px; background: #e2e8f0; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">🏨</div>
                            <div>
                                <div style="font-weight: 700; color: #1e293b; font-size: 1rem;">Al-Noor Boys Hostel</div>
                                <div style="font-size: 0.8rem; color: #64748b;">Near FAST NUCES Lahore</div>
                            </div>
                        </div>
                    </td>
                    <td><span style="font-weight: 500;">Lahore</span></td>
                    <td><span style="font-weight: 700; color: var(--mgr-primary);">Rs. 8,500</span></td>
                    <td><span class="status-badge badge-verified" style="background: #dcfce7; color: #166534; padding: 6px 12px; border-radius: 8px; font-weight: 600;">Active</span></td>
                    <td style="text-align: center;">
                        <div class="action-btns" style="justify-content: center;">
                            <a href="#" class="btn-icon" title="Edit" style="background: #f1f5f9; color: #64748b;"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn-icon" title="View" style="background: #f1f5f9; color: #64748b;"><i class="fas fa-eye"></i></a>
                        </div>
                    </td>
                </tr>

                <!-- Hostel 2 -->
                <tr>
                    <td style="padding: 25px;">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="width: 50px; height: 50px; border-radius: 12px; background: #e2e8f0; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">🏠</div>
                            <div>
                                <div style="font-weight: 700; color: #1e293b; font-size: 1rem;">City Girls Residency</div>
                                <div style="font-size: 0.8rem; color: #64748b;">Near NUST Islamabad</div>
                            </div>
                        </div>
                    </td>
                    <td><span style="font-weight: 500;">Islamabad</span></td>
                    <td><span style="font-weight: 700; color: var(--mgr-primary);">Rs. 12,000</span></td>
                    <td><span class="status-badge badge-pending" style="background: #fef3c7; color: #92400e; padding: 6px 12px; border-radius: 8px; font-weight: 600;">Pending Review</span></td>
                    <td style="text-align: center;">
                        <div class="action-btns" style="justify-content: center;">
                            <a href="#" class="btn-icon" title="Edit" style="background: #f1f5f9; color: #64748b;"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn-icon" title="View" style="background: #f1f5f9; color: #64748b;"><i class="fas fa-eye"></i></a>
                        </div>
                    </td>
                </tr>

                <!-- Hostel 3 -->
                <tr>
                    <td style="padding: 25px;">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="width: 50px; height: 50px; border-radius: 12px; background: #e2e8f0; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">🏘️</div>
                            <div>
                                <div style="font-weight: 700; color: #1e293b; font-size: 1rem;">Green View Hostel</div>
                                <div style="font-size: 0.8rem; color: #64748b;">Near UET Lahore</div>
                            </div>
                        </div>
                    </td>
                    <td><span style="font-weight: 500;">Lahore</span></td>
                    <td><span style="font-weight: 700; color: var(--mgr-primary);">Rs. 7,000</span></td>
                    <td><span class="status-badge badge-rejected" style="background: #fee2e2; color: #991b1b; padding: 6px 12px; border-radius: 8px; font-weight: 600;">Action Required</span></td>
                    <td style="text-align: center;">
                        <div class="action-btns" style="justify-content: center;">
                            <a href="#" class="btn-icon" title="Edit" style="background: #f1f5f9; color: #64748b;"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn-icon" title="View" style="background: #f1f5f9; color: #64748b;"><i class="fas fa-eye"></i></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
