<?php
require_once 'auth_check.php';
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $_POST['description'];
    
    try {
        // Handle image upload
        $image_path = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "../uploads/about/";
            $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            $new_filename = uniqid() . '.' . $file_extension;
            $target_file = $target_dir . $new_filename;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = $new_filename;
            }
        }

        // Check if about entry exists
        $stmt = $db->query("SELECT COUNT(*) FROM about");
        $exists = $stmt->fetchColumn() > 0;

        if ($exists) {
            if ($image_path) {
                $stmt = $db->prepare("UPDATE about SET description = ?, image_path = ?");
                $success = $stmt->execute([$description, $image_path]);
            } else {
                $stmt = $db->prepare("UPDATE about SET description = ?");
                $success = $stmt->execute([$description]);
            }
        } else {
            $stmt = $db->prepare("INSERT INTO about (description, image_path) VALUES (?, ?)");
            $success = $stmt->execute([$description, $image_path]);
        }

        if ($success) {
            $message = "About page updated successfully!";
        } else {
            $message = "Error updating about page.";
        }
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}

// Fetch current about content
$stmt = $db->query("SELECT * FROM about LIMIT 1");
$about = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container mt-4">
        <?php if ($message): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">About Page Content</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="10"><?php 
                            echo htmlspecialchars($about['description'] ?? ''); 
                        ?></textarea>
                    </div>

                    <?php if (isset($about['image_path']) && $about['image_path']): ?>
                    <div class="mb-3">
                        <label class="form-label">Current Image</label>
                        <div>
                            <img src="../uploads/about/<?php echo htmlspecialchars($about['image_path']); ?>" 
                                 alt="About" style="max-width: 300px; height: auto;">
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload New Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
