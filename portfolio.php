<?php
require_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

// Get selected category
$category_id = isset($_GET['category']) ? $_GET['category'] : null;

// Fetch categories
$stmt = $db->query("SELECT * FROM categories ORDER BY name");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch machines
$query = "SELECT m.*, c.name as category_name 
          FROM machines m 
          LEFT JOIN categories c ON m.category_id = c.id";
if ($category_id) {
    $query .= " WHERE m.category_id = " . intval($category_id);
}
$query .= " ORDER BY m.created_at DESC";
$stmt = $db->query($query);
$machines = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'includes/header.php';
?>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Machine Portfolio</h2>
        
        <!-- Category Filter -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-center flex-wrap">
                    <a href="portfolio.php" class="btn btn-outline-primary m-1 <?php echo !$category_id ? 'active' : ''; ?>">
                        All
                    </a>
                    <?php foreach ($categories as $category): ?>
                    <a href="portfolio.php?category=<?php echo $category['id']; ?>" 
                       class="btn btn-outline-primary m-1 <?php echo $category_id == $category['id'] ? 'active' : ''; ?>">
                        <?php echo htmlspecialchars($category['name']); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Machines Grid -->
        <div class="row">
            <?php foreach ($machines as $machine): ?>
            <div class="col-md-4 portfolio-item">
                <div class="card">
                    <?php if ($machine['image_path']): ?>
                    <img src="uploads/machines/<?php echo htmlspecialchars($machine['image_path']); ?>" 
                         class="card-img-top" alt="<?php echo htmlspecialchars($machine['name']); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($machine['name']); ?></h5>
                        <p class="card-text"><?php echo strip_tags($machine['short_description']); ?></p>
                        <p class="card-text">
                            <small class="text-muted">
                                Category: <?php echo htmlspecialchars($machine['category_name']); ?>
                            </small>
                        </p>
                      <!--  <button type="button" class="btn btn-primary" 
                                onclick="window.location.href='contact.php?subject=Enquiry about <?php echo urlencode($machine['name']); ?>'">
                            Enquire Now
                        </button> -->
                        <div class="card-footer bg-transparent border-0 pt-0 text-center">
                                <a href="machine-details.php?id=<?php echo $machine['id']; ?>" 
                                   class="btn btn-primary btn-sm px-3">View Details</a>
                            </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
