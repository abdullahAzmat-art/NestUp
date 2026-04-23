<?php 
// Make sure to include your database connection so $pdo works!
require_once '../includes/db.php';
require_once '../includes/header.php'; 
?>

<style>
    /* Admin Color Palette */
    :root {
        --admin-primary: #4F46E5;
        --admin-text: #1F2937;
        --admin-text-muted: #6B7280;
        --card-bg: #FFFFFF;
        --border-color: #E5E7EB;
    }

    /* --- 1. Stats Grid (Top Cards) --- */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin: 30px 0;
        padding: 0 20px;
    }

    .stat-card {
        background: var(--card-bg);
        border-radius: 12px;
        padding: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
    }

    .stat-info h3 {
        font-size: 0.9rem;
        color: var(--admin-text-muted);
        margin: 0 0 8px 0;
        font-weight: 500;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--admin-text);
    }

    /* --- 2. Icons inside the Stats Cards --- */
    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-icon.blue { background: #DBEAFE; color: #2563EB; }
    .stat-icon.yellow { background: #FEF3C7; color: #D97706; }
    .stat-icon.green { background: #D1FAE5; color: #059669; }
    .stat-icon.purple { background: #EDE9FE; color: #7C3AED; }

    /* --- 3. Recent Listings Table Card --- */
    .admin-card {
        background: var(--card-bg);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin: 0 20px 40px 20px;
        overflow: hidden; /* Keeps the table corners rounded */
    }

    .card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-weight: 600;
        font-size: 1.1rem;
        color: var(--admin-text);
    }

    /* --- 4. The Table Itself --- */
    .admin-table-wrap {
        overflow-x: auto; /* Adds a scrollbar on tiny screens */
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .admin-table th {
        padding: 14px 24px;
        background: #F9FAFB;
        color: var(--admin-text-muted);
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        border-bottom: 1px solid var(--border-color);
    }

    .admin-table td {
        padding: 16px 24px;
        border-bottom: 1px solid var(--border-color);
        color: var(--admin-text);
        font-size: 0.95rem;
    }

    .admin-table tr:hover td {
        background-color: #F9FAFB; /* Light highlight when mouse hovers over row */
    }

    /* --- 5. Status Badges & Buttons --- */
    .status-badge {
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-pending { background: #FEF3C7; color: #D97706; }
    .badge-approved { background: #D1FAE5; color: #059669; }
    .badge-rejected { background: #FEE2E2; color: #DC2626; }

    .action-btns .btn-icon {
        color: var(--admin-text-muted);
        transition: color 0.2s;
        text-decoration: none;
    }

    .action-btns .btn-icon:hover {
        color: var(--admin-primary);
    }
</style>

<?php
// Fetch basic stats
$stats = [
    'total_hostels' => 0,
    'pending_hostels' => 0,
    'total_users' => 0,
    'flagged_reviews' => 0
];

// Wrap in try-catch in case DB isn't initialized
try {
    $res = $pdo->query("SELECT COUNT(*) as count FROM hostels");
    if($res) $stats['total_hostels'] = $res->fetch()['count'];

    $res = $pdo->query("SELECT COUNT(*) as count FROM hostels WHERE status='pending'");
    if($res) $stats['pending_hostels'] = $res->fetch()['count'];

    $res = $pdo->query("SELECT COUNT(*) as count FROM users");
    if($res) $stats['total_users'] = $res->fetch()['count'];

    $res = $pdo->query("SELECT COUNT(*) as count FROM reviews WHERE status='flagged'");
    if($res) $stats['flagged_reviews'] = $res->fetch()['count'];
} catch (PDOException $e) {
    // Fallback if tables don't exist yet
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
                    $recent_hostels = $pdo->query("SELECT * FROM hostels ORDER BY created_at DESC LIMIT 5");
                    if ($recent_hostels && $recent_hostels->rowCount() > 0) {
                        while($row = $recent_hostels->fetch()) {
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
                } catch (PDOException $e) {
                    echo "<tr><td colspan='5' style='text-align:center; padding:30px; color:var(--admin-text-muted);'>Error fetching data. Ensure database is setup.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>