<?php 
require_once '../includes/db.php';

// Handle Actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action = $_GET['action'];
    
    if ($action == 'hide') {
        $conn->query("UPDATE reviews SET status='hidden' WHERE id=$id");
        $msg = "Review hidden from public view.";
    } elseif ($action == 'delete') {
        $conn->query("DELETE FROM reviews WHERE id=$id");
        $msg = "Review deleted permanently.";
    } elseif ($action == 'approve') {
        $conn->query("UPDATE reviews SET status='visible' WHERE id=$id");
        $msg = "Review restored to visible.";
    }
}

require_once '../includes/admin-header.php'; 
?>

<?php if(isset($msg)): ?>
    <div class="flash-message"><?php echo $msg; ?></div>
<?php endif; ?>

<div class="admin-card">
    <div class="card-header">
        <div class="card-title">Monitor & Control Reviews</div>
        <p style="font-size:0.85rem; color:var(--admin-text-muted);">Prevent fake information and moderate student feedback.</p>
    </div>
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Reviewer</th>
                    <th>Hostel</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $sql = "SELECT r.*, u.name as user_name, h.name as hostel_name 
                            FROM reviews r 
                            JOIN users u ON r.user_id = u.id 
                            JOIN hostels h ON r.hostel_id = h.id 
                            ORDER BY r.created_at DESC";
                    $reviews = $conn->query($sql);
                    if ($reviews && $reviews->num_rows > 0) {
                        while($row = $reviews->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['user_name']}</td>";
                            echo "<td>{$row['hostel_name']}</td>";
                            echo "<td><div style='color:var(--color-amber);'>★★★★★ <span style='color:inherit; font-size:0.8rem;'>({$row['rating']})</span></div></td>";
                            echo "<td style='max-width:300px;'><div style='white-space:nowrap; overflow:hidden; text-overflow:ellipsis;'>{$row['comment']}</div></td>";
                            echo "<td><span class='status-badge badge-" . ($row['status'] == 'visible' ? 'verified' : 'hidden') . "'>{$row['status']}</span></td>";
                            echo "<td class='action-btns'>";
                                if ($row['status'] == 'visible') {
                                    echo "<a href='?action=hide&id={$row['id']}' class='btn-icon reject' title='Hide Review'><i class='fas fa-eye-slash'></i></a>";
                                } else {
                                    echo "<a href='?action=approve&id={$row['id']}' class='btn-icon approve' title='Show Review'><i class='fas fa-eye'></i></a>";
                                }
                                echo "<a href='?action=delete&id={$row['id']}' class='btn-icon delete' title='Delete' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash'></i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' style='text-align:center; padding:30px; color:var(--admin-text-muted);'>No reviews found.</td></tr>";
                    }
                } catch (Exception $e) {
                    echo "<tr><td colspan='6' style='text-align:center; padding:30px; color:var(--admin-text-muted);'>Error fetching data. Ensure database is setup.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../includes/admin-footer.php'; ?>
