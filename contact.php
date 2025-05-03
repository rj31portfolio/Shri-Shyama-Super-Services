<?php
session_start();
require_once __DIR__ . '/config/database.php';

$database = new Database();
$db = $database->getConnection();

$success_message = '';
$error_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Create enquiries table if not exists
        $db->exec("CREATE TABLE IF NOT EXISTS enquiries (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(50) NOT NULL,
            message TEXT NOT NULL,
            machine_id INT(11) DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $sql = "INSERT INTO enquiries (name, email, phone, message) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        if ($stmt->execute([$name, $email, $phone, $message])) {
            $success_message = "Thank you for contacting us. We will get back to you soon!";
        } else {
            $error_message = "Failed to send message. Please try again.";
        }
    } catch (PDOException $e) {
        $error_message = "An error occurred. Please try again later.";
    }
}

include __DIR__ . '/includes/header.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="mb-4 display-4 font-weight-bold text-primary">Contact Us</h2>
                <p class="lead text-muted mb-4">We'd love to hear from you! Get in touch with us for any inquiries about our machines or services.</p>
                
                <div class="mb-4">
                    <h5 class="font-weight-bold">Address</h5>
                    <p>Khasra No. 230 Nangli Sakrawati, Industrial Area, Najafgarh, New Delhi, Delhi 110043</p>
                </div>
                
                <div class="mb-4">
                    <h5 class="font-weight-bold">Phone</h5>
                    <p><a href="tel:+918700335277" class="text-primary">+91 8700335277</a></p>
                </div>
                
                <div class="mb-4">
                    <h5 class="font-weight-bold">Email</h5>
                    <p><a href="mailto:shrishyamass.com" class="text-primary">info@shrishyamass.com</a></p>
                </div>
                
                <div class="social-links">
                    <h5 class="font-weight-bold">Follow Us</h5>
                    <a href="#" class="text-dark me-2 social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-dark me-2 social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-dark me-2 social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-dark social-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-md-6">
                <div class="contact-form">
                    <?php if ($success_message): ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error_message): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control shadow-sm" id="name" name="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control shadow-sm" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control shadow-sm" id="phone" name="phone" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control shadow-sm" id="message" name="message" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-lg btn-primary w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="row no-gutters">
        <div class="col-md-12">
            <h3 class="text-center mb-4">Find Us</h3>
            <div class="ratio ratio-21x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.3383303917167!2d77.00179597457233!3d28.61962038466862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d0fdfcb262147%3A0xa4e961c2f428383b!2sShri%20Shyama%20Super%20Services!5e0!3m2!1sen!2sin!4v1736571411191!5m2!1sen!2sin" 
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>

<style>
    /* Full-width adjustments */
    section.py-5 {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }

    .ratio-21x9 {
        position: relative;
        width: 100%;
        padding-bottom: 42.85%; /* 21:9 aspect ratio */
        height: 0;
        overflow: hidden;
        background: #eee;
    }

    .ratio-21x9 iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>


<?php include 'includes/footer.php'; ?>
