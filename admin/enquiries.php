<?php
require_once 'auth_check.php';
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    try {
        $stmt = $db->prepare("DELETE FROM enquiries WHERE id = ?");
        $stmt->execute([$_POST['id']]);
        header("Location: enquiries.php");
        exit;
    } catch (PDOException $e) {
        $error = "Error deleting enquiry";
    }
}

// Create enquiries table if not exists
try {
    $db->exec("CREATE TABLE IF NOT EXISTS enquiries (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(50) NOT NULL,
        message TEXT NOT NULL,
        machine_id INT(11) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
} catch (PDOException $e) {
    // Table might already exist, continue
}

// Fetch all enquiries with machine names
try {
    $stmt = $db->query("SELECT e.*, m.name as machine_name 
                        FROM enquiries e 
                        LEFT JOIN machines m ON e.machine_id = m.id 
                        ORDER BY e.created_at DESC");
    $enquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $enquiries = [];
    $error = "Error fetching enquiries";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries Management - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container mt-4">
        <h2 class="mb-4">Enquiries Management</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Machine</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($enquiries)): ?>
                                <?php foreach ($enquiries as $enquiry): ?>
                                <tr>
                                    <td><?php echo date('d M Y', strtotime($enquiry['created_at'])); ?></td>
                                    <td><?php echo htmlspecialchars($enquiry['name']); ?></td>
                                    <td><?php echo htmlspecialchars($enquiry['email']); ?></td>
                                    <td><?php echo htmlspecialchars($enquiry['phone']); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" 
                                                onclick="viewMessage('<?php echo htmlspecialchars($enquiry['message']); ?>')">
                                            View Message
                                        </button>
                                    </td>
                                    <td><?php echo htmlspecialchars($enquiry['machine_name'] ?? 'N/A'); ?></td>
                                    <td>
                                        <form method="POST" class="d-inline">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?php echo $enquiry['id']; ?>">
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this enquiry?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No enquiries found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- View Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enquiry Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p id="messageContent"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewMessage(message) {
            document.getElementById('messageContent').textContent = message;
            new bootstrap.Modal(document.getElementById('messageModal')).show();
        }
    </script>
</body>
</html>
