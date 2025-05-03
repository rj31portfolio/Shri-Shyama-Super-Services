<?php
require_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

// Fetch about content
$stmt = $db->query("SELECT * FROM about LIMIT 1");
$about = $stmt->fetch(PDO::FETCH_ASSOC);

include 'includes/header.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <?php if ($about && $about['image_path']): ?>
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="uploads/about/<?php echo htmlspecialchars($about['image_path']); ?>" 
                     class="img-fluid rounded" alt="About Us">
            </div>
            <?php endif; ?>
            <div class="col-md-<?php echo ($about && $about['image_path']) ? '6' : '12'; ?>">
                <!-- <h2 class="mb-4"></h2> -->
                <?php if ($about && $about['description']): ?>
                    <?php echo $about['description']; ?>
                <?php else: ?>
                    <p>Content coming soon...</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<!-- <section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Meet Our Team</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm border-light">
                    <div class="card-body">
                        <div class="team-icon mb-3">
                            <img src="path/to/john_doe_photo.jpg" class="rounded-circle img-fluid" alt="John Doe">
                        </div>
                        <h5 class="card-title font-weight-bold">John Doe</h5>
                        <p class="card-text text-muted">CEO & Founder</p>
                        <p class="text-muted">Passionate leader and visionary driving the company forward.</p>
                        <a href="mailto:john.doe@example.com" class="btn btn-outline-primary btn-sm mt-2">Contact John</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm border-light">
                    <div class="card-body">
                        <div class="team-icon mb-3">
                            <img src="path/to/jane_smith_photo.jpg" class="rounded-circle img-fluid" alt="Jane Smith">
                        </div>
                        <h5 class="card-title font-weight-bold">Jane Smith</h5>
                        <p class="card-text text-muted">Technical Director</p>
                        <p class="text-muted">Expert in technical innovation and ensuring quality in every project.</p>
                        <a href="mailto:jane.smith@example.com" class="btn btn-outline-primary btn-sm mt-2">Contact Jane</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm border-light">
                    <div class="card-body">
                        <div class="team-icon mb-3">
                            <img src="path/to/mike_johnson_photo.jpg" class="rounded-circle img-fluid" alt="Mike Johnson">
                        </div>
                        <h5 class="card-title font-weight-bold">Mike Johnson</h5>
                        <p class="card-text text-muted">Sales Manager</p>
                        <p class="text-muted">Skilled in client relations and driving sales for maximum growth.</p>
                        <a href="mailto:mike.johnson@example.com" class="btn btn-outline-primary btn-sm mt-2">Contact Mike</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  -->
<style>
    .team-icon img {
        max-width: 120px;
        border: 4px solid #f8f9fa;
        transition: all 0.3s ease-in-out;
    }

    .team-icon img:hover {
        transform: scale(1.1);
        border-color: #007bff;
    }

    .card-body {
        padding: 2rem;
    }

    .card {
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-primary {
        transition: all 0.2s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }
</style>

<?php include 'includes/footer.php'; ?>
