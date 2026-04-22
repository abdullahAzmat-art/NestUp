<?php require_once '../includes/dashboard-header.php'; ?>

<div class="admin-card" style="max-width: 900px; margin: 0 auto; border-radius: 20px; overflow: hidden; border: none; box-shadow: 0 20px 50px rgba(0,0,0,0.05);">
    <div class="card-header" style="background: #fff; padding: 30px; border-bottom: 1px solid #f1f5f9;">
        <div class="card-title" style="font-size: 1.5rem; font-weight: 700; color: #0f172a;">Add New Hostel Listing</div>
        <p style="color: #64748b; font-size: 0.9rem; margin-top: 5px;">Fill in the details below to list your hostel on NestUp.</p>
    </div>
    
    <div class="admin-content" style="padding: 40px; background: #fff;">
        
        <form action="#" method="POST" enctype="multipart/form-data" class="hostel-form">
            
            <h4 style="margin-bottom: 20px; color: var(--mgr-primary); font-size: 1.1rem; border-left: 4px solid var(--mgr-primary); padding-left: 15px;">Basic Information</h4>
            
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:25px; margin-bottom:30px;">
                <div class="form-group">
                    <label class="form-label" for="name">Hostel Name *</label>
                    <input type="text" name="name" id="name" class="form-input" placeholder="e.g. Al-Noor Excellence Boys" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="city">City *</label>
                    <input type="text" name="city" id="city" class="form-input" placeholder="e.g. Lahore" required>
                </div>
            </div>

            <div class="form-group" style="margin-bottom:30px;">
                <label class="form-label" for="address">Complete Address *</label>
                <input type="text" name="address" id="address" class="form-input" placeholder="House #, Street, Area..." required>
            </div>

            <div style="display:grid; grid-template-columns: 2fr 1fr; gap:25px; margin-bottom:30px;">
                <div class="form-group">
                    <label class="form-label" for="university">Nearest University *</label>
                    <input type="text" name="university" id="university" class="form-input" placeholder="e.g. FAST NUCES Lahore" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="distance">Distance (km) *</label>
                    <input type="number" step="0.1" name="distance" id="distance" class="form-input" placeholder="e.g. 0.5" required>
                </div>
            </div>

            <h4 style="margin-bottom: 20px; color: var(--mgr-primary); font-size: 1.1rem; border-left: 4px solid var(--mgr-primary); padding-left: 15px;">Pricing & Media</h4>

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:25px; margin-bottom:30px;">
                <div class="form-group">
                    <label class="form-label" for="price">Monthly Rent (Rs.) *</label>
                    <input type="number" name="price" id="price" class="form-input" placeholder="e.g. 8500" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="main_image">Main Image *</label>
                    <div style="position: relative;">
                        <input type="file" name="main_image" id="main_image" class="form-input" required style="padding: 10px;">
                    </div>
                </div>
            </div>

            <h4 style="margin-bottom: 20px; color: var(--mgr-primary); font-size: 1.1rem; border-left: 4px solid var(--mgr-primary); padding-left: 15px;">Facilities & Description</h4>

            <div class="form-group" style="margin-bottom:30px;">
                <label class="form-label">Available Amenities</label>
                <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap:15px; background:#f8fafc; padding:25px; border-radius:15px; border: 1px solid #e2e8f0;">
                    <label style="display:flex; align-items:center; gap:10px; cursor:pointer; font-size: 0.95rem; color: #475569;">
                        <input type="checkbox" name="facilities[]" value="wifi" style="width: 18px; height: 18px; accent-color: var(--mgr-primary);"> 📶 WiFi
                    </label>
                    <label style="display:flex; align-items:center; gap:10px; cursor:pointer; font-size: 0.95rem; color: #475569;">
                        <input type="checkbox" name="facilities[]" value="ac" style="width: 18px; height: 18px; accent-color: var(--mgr-primary);"> ❄️ AC
                    </label>
                    <label style="display:flex; align-items:center; gap:10px; cursor:pointer; font-size: 0.95rem; color: #475569;">
                        <input type="checkbox" name="facilities[]" value="mess" style="width: 18px; height: 18px; accent-color: var(--mgr-primary);"> 🍽️ Mess Food
                    </label>
                    <label style="display:flex; align-items:center; gap:10px; cursor:pointer; font-size: 0.95rem; color: #475569;">
                        <input type="checkbox" name="facilities[]" value="solar" style="width: 18px; height: 18px; accent-color: var(--mgr-primary);"> ☀️ Solar Power
                    </label>
                    <label style="display:flex; align-items:center; gap:10px; cursor:pointer; font-size: 0.95rem; color: #475569;">
                        <input type="checkbox" name="facilities[]" value="laundry" style="width: 18px; height: 18px; accent-color: var(--mgr-primary);"> 👕 Laundry
                    </label>
                    <label style="display:flex; align-items:center; gap:10px; cursor:pointer; font-size: 0.95rem; color: #475569;">
                        <input type="checkbox" name="facilities[]" value="cctv" style="width: 18px; height: 18px; accent-color: var(--mgr-primary);"> 🛡️ CCTV
                    </label>
                </div>
            </div>

            <div class="form-group" style="margin-bottom:40px;">
                <label class="form-label" for="description">Detailed Description</label>
                <textarea name="description" id="description" rows="5" class="form-input" placeholder="Describe the room types, rules, and other details..." style="resize:vertical; min-height:120px;"></textarea>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" name="submit_hostel" class="btn-primary" style="flex: 2; padding: 16px; font-size: 1.1rem; letter-spacing: 0.5px;">
                    🚀 Submit Listing for Review
                </button>
                <button type="reset" class="btn-outline" style="flex: 1; padding: 16px;">
                    Clear Form
                </button>
            </div>

        </form>
    </div>
</div>

<?php require_once '../includes/dashboard-footer.php'; ?>
