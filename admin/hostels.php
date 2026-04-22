<?php 
require_once '../includes/db.php';

// Handle Actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action = $_GET['action'];
    
    if ($action == 'approve') {
        $conn->query("UPDATE hostels SET status='verified' WHERE id=$id");
        $msg = "Hostel approved successfully!";
    } elseif ($action == 'reject') {
        $conn->query("UPDATE hostels SET status='rejected' WHERE id=$id");
        $msg = "Hostel rejected.";
    }
}

require_once '../includes/header.php'; 
?>

<?php if(isset($msg)): ?>
    <div class="flash-message"><?php echo $msg; ?></div>
<?php endif; ?>

<div class="admin-card">
    <div class="card-header">
        <div class="card-title">Hostel Verification Queue</div>
        <div class="header-actions">
            <!-- Filter maybe? -->
        </div>
    </div>
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Hostel Details</th>
                    <th>City/Location</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $hostels = $conn->query("SELECT * FROM hostels ORDER BY status='pending' DESC, created_at DESC");
                    if ($hostels && $hostels->num_rows > 0) {
                        while($row = $hostels->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>
                                    <div style='font-weight:600;'>{$row['name']}</div>
                                    <div style='font-size:0.75rem; color:var(--admin-text-muted);'>Near {$row['university_near']}</div>
                                  </td>";
                            echo "<td>{$row['city']}</td>";
                            echo "<td>Rs. " . number_format($row['price_per_month']) . "</td>";
                            echo "<td><span class='status-badge badge-{$row['status']}'>{$row['status']}</span></td>";
                            echo "<td class='action-btns'>";
                                if ($row['status'] == 'pending') {
                                    echo "<a href='?action=approve&id={$row['id']}' class='btn-icon approve' title='Approve'><i class='fas fa-check'></i></a>";
                                    echo "<a href='?action=reject&id={$row['id']}' class='btn-icon reject' title='Reject'><i class='fas fa-times'></i></a>";
                                }
                                echo "<a href='/NestUp/hostel-detail.php?id={$row['id']}' class='btn-icon' title='View' target='_blank'><i class='fas fa-eye'></i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' style='text-align:center; padding:30px; color:var(--admin-text-muted);'>No hostels found.</td></tr>";
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
