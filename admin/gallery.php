<?php
require_once 'auth_check.php';
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

// Create gallery table if not exists
try {
    $db->exec("CREATE TABLE IF NOT EXISTS gallery (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        short_description TEXT,
        image VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
} catch (PDOException $e) {
    // Table might already exist
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'delete' && isset($_POST['id'])) {
            // Get image name before deletion
            $stmt = $db->prepare("SELECT image FROM gallery WHERE id = ?");
            $stmt->execute([$_POST['id']]);
            $gallery = $stmt->fetch(PDO::FETCH_ASSOC);

            // Delete the record
            $stmt = $db->prepare("DELETE FROM gallery WHERE id = ?");
            if ($stmt->execute([$_POST['id']])) {
                // Delete the image file if exists
                if ($gallery && $gallery['image']) {
                    $image_path = "../uploads/gallery/" . $gallery['image'];
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
                $success = "Gallery item deleted successfully.";
            } else {
                $error = "Failed to delete gallery item.";
            }
        }
    } else {
        $title = $_POST['title'];
        $short_description = $_POST['short_description'];
        
        // Handle image upload
        $image = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = "../uploads/gallery/";
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $image = uniqid() . '.' . $file_extension;
            $target_path = $upload_dir . $image;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                // Image uploaded successfully
            } else {
                $error = "Failed to upload image.";
            }
        }

        if (!isset($error)) {
            $sql = "INSERT INTO gallery (title, short_description, image) VALUES (?, ?, ?)";
            $stmt = $db->prepare($sql);
            if ($stmt->execute([$title, $short_description, $image])) {
                $success = "Gallery item added successfully.";
            } else {
                $error = "Failed to add gallery item.";
            }
        }
    }
}

// Fetch all gallery items
$stmt = $db->query("SELECT * FROM gallery ORDER BY id DESC");
$gallery_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Management - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container mt-4">
        <h2 class="mb-4">Gallery Management</h2>

        <?php if (isset($success)): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?php echo $success; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Add New Gallery Item</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <textarea class="form-control" id="short_description" name="short_description" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Add Gallery Item</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Gallery Items</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gallery_items as $item): ?>
                            <tr>
                                <td>
                                    <?php if (!empty($item['image'])): ?>
                                        <img src="../uploads/gallery/<?php echo htmlspecialchars($item['image']); ?>" 
                                             alt="Gallery Image" 
                                             style="width: 100px; height: 100px; object-fit: cover;">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($item['title']); ?></td>
                                <td><?php echo htmlspecialchars($item['short_description']); ?></td>
                                <td>
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Are you sure you want to delete this item?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
