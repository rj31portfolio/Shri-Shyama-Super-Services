<?php
require_once 'auth_check.php';
require_once '../config/database.php';
require_once 'includes/upload_helper.php';

$database = new Database();
$db = $database->getConnection();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'add' && isset($_FILES['image'])) {
            $uploadResult = uploadFile($_FILES['image'], "../uploads/banners/");
            if ($uploadResult['success']) {
                $stmt = $db->prepare("INSERT INTO banners (image_path, text) VALUES (?, ?)");
                $stmt->execute([$uploadResult['file_path'], $_POST['text']]);
            }
        } elseif ($_POST['action'] === 'delete' && isset($_POST['id'])) {
            $stmt = $db->prepare("SELECT image_path FROM banners WHERE id = ?");
            $stmt->execute([$_POST['id']]);
            $banner = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($banner && file_exists("../uploads/banners/" . $banner['image_path'])) {
                unlink("../uploads/banners/" . $banner['image_path']);
            }
            
            $stmt = $db->prepare("DELETE FROM banners WHERE id = ?");
            $stmt->execute([$_POST['id']]);
        }
    }
    header("Location: banners.php");
    exit;
}

// Fetch all banners
$stmt = $db->query("SELECT * FROM banners ORDER BY created_at DESC");
$banners = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Management - Machinedeal Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Banner Management</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBannerModal">
                Add New Banner
            </button>
        </div>

        <div class="row">
            <?php foreach ($banners as $banner): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../uploads/banners/<?php echo htmlspecialchars($banner['image_path']); ?>" 
                         class="card-img-top" alt="Banner" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <p class="card-text"><?php echo htmlspecialchars($banner['text']); ?></p>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $banner['id']; ?>">
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this banner?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Add Banner Modal -->
    <div class="modal fade" id="addBannerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="add">
                        <div class="mb-3">
                            <label for="image" class="form-label">Banner Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Banner Text (Optional)</label>
                            <textarea class="form-control" id="text" name="text" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
