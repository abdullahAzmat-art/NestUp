<?php 
require_once '../includes/header.php'; 

// Fetch basic stats
$stats = [
    'total_hostels' => 0,
    'pending_hostels' => 0,
    'total_users' => 0,
    'flagged_reviews' => 0
];

// Wrap in try-catch in case DB isn't initialized
try {
    $res = $conn->query("SELECT COUNT(*) as count FROM hostels");
    if($res) $stats['total_hostels'] = $res->fetch_assoc()['count'];

    $res = $conn->query("SELECT COUNT(*) as count FROM hostels WHERE status='pending'");
    if($res) $stats['pending_hostels'] = $res->fetch_assoc()['count'];

    $res = $conn->query("SELECT COUNT(*) as count FROM users");
    if($res) $stats['total_users'] = $res->fetch_assoc()['count'];

    $res = $conn->query("SELECT COUNT(*) as count FROM reviews WHERE status='flagged'");
    if($res) $stats['flagged_reviews'] = $res->fetch_assoc()['count'];
} catch (Exception $e) {
    // Fallback if tables don't exist
}

?>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-info">
            <h3>Total Hostels</h3>
            <div class="stat-value"><?php echo $stats['total_hostels']; ?></div>
        </div>
        <div class="stat-icon blue">
            <i class="fas fa-building"></i>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-info">
            <h3>Pending Verifications</h3>
            <div class="stat-value"><?php echo $stats['pending_hostels']; ?></div>
        </div>
        <div class="stat-icon yellow">
            <i class="fas fa-clock"></i>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-info">
            <h3>Total Users</h3>
            <div class="stat-value"><?php echo $stats['total_users']; ?></div>
        </div>
        <div class="stat-icon green">
            <i class="fas fa-users"></i>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-info">
            <h3>Flagged Reviews</h3>
            <div class="stat-value"><?php echo $stats['flagged_reviews']; ?></div>
        </div>
        <div class="stat-icon purple">
            <i class="fas fa-flag"></i>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="card-header">
        <div class="card-title">Recent Hostel Listings</div>
        <a href="hostels.php" style="font-size:0.85rem; color:var(--admin-primary); font-weight:500;">View All</a>
    </div>
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Hostel Name</th>
                    <th>City</th>
                    <th>Posted Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $recent_hostels = $conn->query("SELECT * FROM hostels ORDER BY created_at DESC LIMIT 5");
                    if ($recent_hostels && $recent_hostels->num_rows > 0) {
                        while($row = $recent_hostels->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><strong>{$row['name']}</strong></td>";
                            echo "<td>{$row['city']}</td>";
                            echo "<td>" . date('M d, Y', strtotime($row['created_at'])) . "</td>";
                            echo "<td><span class='status-badge badge-{$row['status']}'>{$row['status']}</span></td>";
                            echo "<td class='action-btns'>
                                    <a href='hostel-detail.php?id={$row['id']}' class='btn-icon' title='View'><i class='fas fa-eye'></i></a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' style='text-align:center; padding:30px; color:var(--admin-text-muted);'>No recent listings found.</td></tr>";
                    }
                } catch (Exception $e) {
                    echo "<tr><td colspan='5' style='text-align:center; padding:30px; color:var(--admin-text-muted);'>Error fetching data. Ensure database is setup.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
