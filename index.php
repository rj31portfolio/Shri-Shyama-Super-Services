<?php
session_start();
require_once __DIR__ . '/config/database.php';

$database = new Database();
$db = $database->getConnection();

// Fetch banners
$stmt = $db->query("SELECT * FROM banners ORDER BY created_at DESC");
$banners = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch machines with categories

// Set the limit for the number of products
 $limit = 12; // You can adjust this number based on your requirement

$query = "SELECT m.*, c.name as category_name 
          FROM machines m 
          LEFT JOIN categories c ON m.category_id = c.id 
          ORDER BY m.created_at DESC
          LIMIT $limit";
           

$stmt = $db->prepare($query);
$stmt->execute();
$machines = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch categories for filter
$stmt = $db->query("SELECT * FROM categories ORDER BY name");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle category filter
$selected_category = isset($_GET['category']) ? $_GET['category'] : '';
if ($selected_category) {
    $filtered_machines = array_filter($machines, function($machine) use ($selected_category) {
        return $machine['category_id'] == $selected_category;
    });
    $machines = $filtered_machines;
}

$current_page = 'home';
include __DIR__ . '/includes/header.php';
?>

<!-- Carousel Banner -->
<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-top: 15px;">
    <div class="carousel-indicators">
        <?php foreach ($banners as $key => $banner): ?>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="<?php echo $key; ?>" 
                    <?php echo $key === 0 ? 'class="active"' : ''; ?>></button>
        <?php endforeach; ?>
    </div>
    <div class="carousel-inner">
        <?php if (!empty($banners)): ?>
    <?php foreach ($banners as $index => $banner): ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
            <img src="uploads/banners/<?= htmlspecialchars($banner['image_path']); ?>" 
                 class="d-block w-100" 
                 style="height: 100%; object-fit: cover;" 
                 alt="Creative Banner">
            <?php if (!empty($banner['text'])): ?>
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <p class="text-white bg-dark bg-opacity-50 p-3 rounded fs-4 fw-bold text-center">
                        <?= htmlspecialchars($banner['text']); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert alert-info text-center">
        No banners to display. Stay tuned for exciting updates!
    </div>


            <div class="carousel-item active">
                <div class="d-block w-100 bg-secondary" style="height: 500px;">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <h3 class="text-Black">Welcome to Machine Deal</h3>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>


<!-- Featured Categories -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 text-uppercase">Featured Categories</h2>
        <div class="row">
            <?php foreach ($categories as $category): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-lg">
                        <div class="card-body text-center">
                            <!-- Category Icon -->
                            <div class="mb-3">
                                <i class="fas fa-layer-group fa-4x text-primary"></i>
                            </div>
                            <h5 class="card-title text-uppercase"><?php echo htmlspecialchars($category['name']); ?></h5>
                            <p class="card-text text-muted"><?php echo htmlspecialchars($category['description'] ?? 'Explore our premium range of machines.'); ?></p>
                            <a href="?category=<?php echo $category['id']; ?>" class="btn btn-outline-primary btn-sm">View Machines</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Machines Section -->
<section class="bg-light py-5">
    <div class="container">
        <!-- Header Section with Filter -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase fw-bold">Our Machines</h2>
            <form action="" method="GET" class="d-flex">
                <select name="category" class="form-select me-2" style="max-width: 200px;">
                    <option value="">All Categories</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" 
                                <?php echo $selected_category == $category['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

        <!-- Machines Grid -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php if (!empty($machines)): ?>
                <?php foreach ($machines as $machine): ?>
                    <div class="col">
                        <div class="card h-100 shadow-lg border-0 hover-effect">
                            <!-- Image Section -->
                            <?php if (!empty($machine['image_path'])): ?>
                                <div class="position-relative">
                                    <img src="uploads/machines/<?php echo htmlspecialchars($machine['image_path']); ?> " 
                                         class="card-img-top rounded-top" 
                                         alt="<?php echo htmlspecialchars($machine['name']); ?>" 
                                         style="height: 200px; object-fit: cover;">
                                    <span class="badge bg-primary position-absolute top-0 end-0 m-2">New</span>
                                </div>
                            <?php else: ?>
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                     style="height: 200px; border-bottom: 1px solid #ddd;">
                                    <span class="text-muted">No Image</span>
                                </div>
                            <?php endif; ?>

                            <!-- Card Body -->
                            <div class="card-body text-center">
                                <h5 class="card-title text-truncate text-dark fw-bold" title="<?php echo htmlspecialchars($machine['name']); ?>">
                                    <?php echo htmlspecialchars($machine['name']); ?>
                                </h5>
                                <p class="card-text text-muted mb-2" style="height: 4.5em; overflow: hidden; font-size: 0.9rem;">
                                    <?php echo htmlspecialchars($machine['short_description']); ?>
                                </p>
                                <p class="card-text mb-0">
                                    <small class="text-muted">
                                        Category: <?php echo htmlspecialchars($machine['category_name'] ?? 'Uncategorized'); ?>
                                    </small>
                                </p>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer bg-transparent border-0 pt-0 text-center">
                                <a href="machine-details.php?id=<?php echo $machine['id']; ?>" 
                                   class="btn btn-primary btn-sm px-3">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- No Machines Found -->
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No machines found. <?php echo $selected_category ? 'Try selecting a different category.' : ''; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Our Services</h2>
        <div class="row text-center">
            <!-- Service 1 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-body">
                        <i class="fas fa-tools fa-4x mb-3 text-success"></i>
                        <h5 class="card-title">Spring Machine Sales</h5>
                        <p class="card-text">We offer a diverse range of high-performance spring machines, ideal for various industries, including manufacturing and construction. Our machines are engineered for precision, durability, and heavy-duty operations.</p>
                    </div>
                </div>
            </div>
            <!-- Service 2 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-body">
                        <i class="fas fa-cogs fa-4x mb-3 text-primary"></i>
                        <h5 class="card-title">Custom Machinery Solutions</h5>
                        <p class="card-text">We specialize in creating custom spring machines tailored to your specific operational needs, ensuring optimal performance and efficiency for your business operations.</p>
                    </div>
                </div>
            </div>
            <!-- Service 3 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-body">
                        <i class="fas fa-shipping-fast fa-4x mb-3 text-warning"></i>
                        <h5 class="card-title">Delivery & Installation</h5>
                        <p class="card-text">We manage the delivery and seamless installation of all our spring machines, ensuring quick integration into your processes so you can start benefiting from them right away.</p>
                    </div>
                </div>
            </div>
            <!-- Service 4 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-body">
                        <i class="fas fa-recycle fa-4x mb-3 text-danger"></i>
                        <h5 class="card-title">Quality Assurance & Testing</h5>
                        <p class="card-text">We rigorously test each spring machine to ensure that it meets the highest industry standards. Our quality checks guarantee that every machine operates at peak efficiency and durability.</p>
                    </div>
                </div>
            </div>
            <!-- Service 5 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-body">
                        <i class="fas fa-wrench fa-4x mb-3 text-info"></i>
                        <h5 class="card-title">Spring Machine Maintenance</h5>
                        <p class="card-text">Our expert maintenance services ensure that your spring machines operate smoothly, minimizing downtime and maximizing productivity, so your business stays on track.</p>
                    </div>
                </div>
            </div>
            <!-- Service 6 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-body">
                        <i class="fas fa-user-shield fa-4x mb-3 text-secondary"></i>
                        <h5 class="card-title">Expert Consultation</h5>
                        <p class="card-text">Professional guidance to help you choose the right machinery for your business.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 text-uppercase">Gallery</h2>
        <div class="row">
            <?php
            $gallery = $db->query("SELECT * FROM gallery ORDER BY id DESC LIMIT 6")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($gallery as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-lg border-0 d-flex flex-column align-items-center">
                        <div class="image-wrapper my-3">
                            <img src="uploads/gallery/<?php echo htmlspecialchars($item['image']); ?>" 
                                 alt="Gallery Image"
                                 class="rounded"
                                 style="width: 100%; max-width: 250px; height: 250px; object-fit: cover;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title text-truncate"><?php echo htmlspecialchars($item['title']); ?></h5>
                            <p class="card-text text-muted"><?php echo htmlspecialchars($item['short_description']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.hover-effect {
    transition: transform 0.2s ease-in-out;
}
.hover-effect:hover {
    transform: translateY(-5px);
}
</style>

<?php include __DIR__ . '/includes/footer.php'; ?>
