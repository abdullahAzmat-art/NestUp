<?php 
require_once '../includes/db.php';

// Handle Actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action = $_GET['action'];
    
    if ($action == 'block') {
        $conn->query("UPDATE users SET status='blocked' WHERE id=$id");
        $msg = "User blocked successfully.";
    } elseif ($action == 'activate') {
        $conn->query("UPDATE users SET status='active' WHERE id=$id");
        $msg = "User activated successfully.";
    }
}

require_once '../includes/header.php'; 
?>

<?php if(isset($msg)): ?>
    <div class="flash-message"><?php echo $msg; ?></div>
<?php endif; ?>

<div class="admin-card">
    <div class="card-header">
        <div class="card-title">Manage User Accounts</div>
    </div>
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $users = $conn->query("SELECT * FROM users ORDER BY created_at DESC");
                    if ($users && $users->num_rows > 0) {
                        while($row = $users->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><strong>{$row['name']}</strong></td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td><span style='text-transform:capitalize;'>{$row['role']}</span></td>";
                            echo "<td><span class='status-badge badge-" . ($row['status'] == 'blocked' ? 'rejected' : 'verified') . "'>{$row['status']}</span></td>";
                            echo "<td>" . date('M d, Y', strtotime($row['created_at'])) . "</td>";
                            echo "<td class='action-btns'>";
                                if ($row['role'] != 'admin') {
                                    if ($row['status'] == 'active') {
                                        echo "<a href='?action=block&id={$row['id']}' class='btn-icon reject' title='Block User'><i class='fas fa-user-slash'></i></a>";
                                    } else {
                                        echo "<a href='?action=activate&id={$row['id']}' class='btn-icon approve' title='Activate User'><i class='fas fa-user-check'></i></a>";
                                    }
                                }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' style='text-align:center; padding:30px; color:var(--admin-text-muted);'>No users found.</td></tr>";
                    }
                } catch (Exception $e) {
                    echo "<tr><td colspan='6' style='text-align:center; padding:30px; color:var(--admin-text-muted);'>Error fetching data. Ensure database is setup.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
