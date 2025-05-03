<?php
session_start();
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();
$message = '';
$error = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add Machine
    if (isset($_POST['add_machine'])) {
        try {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $short_description = $_POST['short_description'] ?? '';
            $category_id = $_POST['category_id'] ?? '';

            // Validate required fields
            if (empty($name) || empty($short_description) || empty($category_id)) {
                throw new Exception("Name, short description, and category are required fields.");
            }

            // Handle image upload
            $image_path = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "../uploads/machines/";
                
                // Create directory if it doesn't exist
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                // Generate unique filename
                $image_path = uniqid() . '_' . basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $image_path;

                // Check file type
                $allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                if (!in_array($_FILES['image']['type'], $allowed_types)) {
                    throw new Exception("Only JPG, JPEG, PNG & GIF files are allowed.");
                }

                // Upload file
                if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    throw new Exception("Failed to upload image.");
                }
            }

            // Insert into database
            if ($image_path) {
                $sql = "INSERT INTO machines (name, description, short_description, image_path, category_id) VALUES (?, ?, ?, ?, ?)";
                $params = [$name, $description, $short_description, $image_path, $category_id];
            } else {
                $sql = "INSERT INTO machines (name, description, short_description, category_id) VALUES (?, ?, ?, ?)";
                $params = [$name, $description, $short_description, $category_id];
            }

            $stmt = $db->prepare($sql);
            if (!$stmt->execute($params)) {
                throw new Exception("Failed to add machine to database.");
            }

            $message = "Machine added successfully!";
            
            // Redirect to refresh the page
            header("Location: machines.php?success=added");
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
    
    // Update Machine
    if (isset($_POST['update_machine'])) {
        try {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $short_description = $_POST['short_description'];
            $category_id = $_POST['category_id'];
            
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "../uploads/machines/";
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                
                $image_path = uniqid() . '_' . basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $image_path;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // Delete old image if exists
                    $stmt = $db->prepare("SELECT image_path FROM machines WHERE id = ?");
                    $stmt->execute([$id]);
                    $old_image = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($old_image && $old_image['image_path']) {
                        $old_file = $target_dir . $old_image['image_path'];
                        if (file_exists($old_file)) {
                            unlink($old_file);
                        }
                    }
                    
                    $sql = "UPDATE machines SET name = ?, description = ?, short_description = ?, image_path = ?, category_id = ? WHERE id = ?";
                    $stmt = $db->prepare($sql);
                    if (!$stmt->execute([$name, $description, $short_description, $image_path, $category_id, $id])) {
                        throw new Exception("Error updating machine in database.");
                    }
                } else {
                    throw new Exception("Error uploading file.");
                }
            } else {
                $sql = "UPDATE machines SET name = ?, description = ?, short_description = ?, category_id = ? WHERE id = ?";
                $stmt = $db->prepare($sql);
                if (!$stmt->execute([$name, $description, $short_description, $category_id, $id])) {
                    throw new Exception("Error updating machine in database.");
                }
            }
            $message = "Machine updated successfully!";
            header("Location: machines.php?success=updated");
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
    
    // Delete Machine
    if (isset($_POST['delete_machine'])) {
        try {
            $id = $_POST['id'];
            
            // Get image path before deleting
            $stmt = $db->prepare("SELECT image_path FROM machines WHERE id = ?");
            $stmt->execute([$id]);
            $machine = $stmt->fetch();
            
            if ($machine && $machine['image_path']) {
                $image_file = "../uploads/machines/" . $machine['image_path'];
                if (file_exists($image_file)) {
                    unlink($image_file);
                }
            }
            
            $sql = "DELETE FROM machines WHERE id = ?";
            $stmt = $db->prepare($sql);
            if ($stmt->execute([$id])) {
                $message = "Machine deleted successfully!";
            } else {
                throw new Exception("Error deleting machine from database.");
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
}

// Fetch categories for dropdown
$stmt = $db->query("SELECT * FROM categories ORDER BY name");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch all machines
$stmt = $db->query("SELECT m.*, c.name as category_name FROM machines m LEFT JOIN categories c ON m.category_id = c.id ORDER BY m.created_at DESC");
$machines = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle success message from redirect
if (isset($_GET['success']) && $_GET['success'] === 'added') {
    $message = "Machine added successfully!";
} elseif (isset($_GET['success']) && $_GET['success'] === 'updated') {
    $message = "Machine updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container mt-4">
        <?php if ($message): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Add Machine Button -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMachineModal">
            Add New Machine
        </button>

        <!-- Machines List -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Short Description</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($machines as $machine): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($machine['name']); ?></td>
                        <td><?php echo strip_tags($machine['short_description']); ?></td>
                        <td><?php echo htmlspecialchars($machine['category_name'] ?? 'Uncategorized'); ?></td>
                        <td>
                            <?php if (!empty($machine['image_path'])): ?>
                                <img src="../uploads/machines/<?php echo htmlspecialchars($machine['image_path']); ?>" 
                                     alt="<?php echo htmlspecialchars($machine['name']); ?>" 
                                     style="max-width: 100px;">
                            <?php else: ?>
                                <span class="text-muted">No image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="editMachine(<?php echo $machine['id']; ?>, '<?php echo addslashes(htmlspecialchars($machine['name'])); ?>', '<?php echo addslashes(htmlspecialchars($machine['short_description'])); ?>', '<?php echo addslashes($machine['description']); ?>', <?php echo $machine['category_id']; ?>)">Edit</button>
                            <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this machine?');">
                                <input type="hidden" name="id" value="<?php echo $machine['id']; ?>">
                                <button type="submit" name="delete_machine" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Machine Modal -->
    <div class="modal fade" id="addMachineModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Machine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" enctype="multipart/form-data" id="addMachineForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Short Description</label>
                            <textarea class="form-control" name="short_description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category_id" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_machine" class="btn btn-primary">Add Machine</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Machine Modal -->
    <div class="modal fade" id="editMachineModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Machine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="edit_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Short Description</label>
                            <textarea class="form-control" name="short_description" id="edit_short_description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Description</label>
                            <textarea class="form-control" id="edit_description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category_id" id="edit_category_id" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <small class="form-text text-muted">Leave empty to keep current image</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_machine" class="btn btn-primary">Update Machine</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let addEditor, editEditor;

        // Initialize CKEditor for Add form
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                addEditor = editor;
            })
            .catch(error => {
                console.error(error);
            });

        // Initialize CKEditor for Edit form
        ClassicEditor
            .create(document.querySelector('#edit_description'))
            .then(editor => {
                editEditor = editor;
            })
            .catch(error => {
                console.error(error);
            });

        function editMachine(id, name, short_description, description, category_id) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_short_description').value = short_description;
            editEditor.setData(description || '');
            document.getElementById('edit_category_id').value = category_id;
            
            // Show the modal
            new bootstrap.Modal(document.getElementById('editMachineModal')).show();
        }

        // Clear form when modal is hidden
        document.getElementById('addMachineModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('addMachineForm').reset();
            addEditor.setData('');
        });
    </script>
</body>
</html>
