<?php
session_start();
require_once __DIR__ . '/config/database.php';

$database = new Database();
$db = $database->getConnection();

// Get machine ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Handle enquiry form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_enquiry'])) {
    try {
        // Create enquiries table if not exists
        $db->exec("CREATE TABLE IF NOT EXISTS enquiries (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(50) NOT NULL,
            message TEXT NOT NULL,
            machine_id INT(11) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO enquiries (name, email, phone, message, machine_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        if ($stmt->execute([$name, $email, $phone, $message, $id])) {
            $success_message = "Your enquiry has been submitted successfully. We will contact you soon!";
        } else {
            $error_message = "Failed to submit enquiry. Please try again.";
        }
    } catch (PDOException $e) {
        $error_message = "An error occurred. Please try again later.";
    }
}

// Fetch machine details
$stmt = $db->prepare("SELECT m.*, c.name as category_name 
                      FROM machines m 
                      LEFT JOIN categories c ON m.category_id = c.id 
                      WHERE m.id = ?");
$stmt->execute([$id]);
$machine = $stmt->fetch(PDO::FETCH_ASSOC);

// If machine not found, redirect to home
if (!$machine) {
    header('Location: index.php');
    exit;
}

include __DIR__ . '/includes/header.php';
?>

<div class="container mt-4">
    <?php if (isset($success_message)): ?>
        <div class="alert alert-success"><?php echo $success_message; ?></div>
    <?php endif; ?>
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <?php if (!empty($machine['image_path'])): ?>
                <img src="uploads/machines/<?php echo htmlspecialchars($machine['image_path']); ?>" 
                     class="img-fluid rounded" alt="<?php echo htmlspecialchars($machine['name']); ?>">
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <h4><?php echo htmlspecialchars($machine['name']); ?></h4>
            <p>Category: <?php echo htmlspecialchars($machine['category_name']); ?></p>
            <div class="mb-4">
                <h5>Machines Information:</h5>
                <div class="description-content">
                    <?php echo $machine['description']; ?>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#enquiryModal">
                    Send Enquiry
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="enquiryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Enquiry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
                    <input type="hidden" name="submit_enquiry" value="1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
