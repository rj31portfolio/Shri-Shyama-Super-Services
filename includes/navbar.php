<?php
// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Machine Deal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact.php">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if ($isLoggedIn): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/admin/dashboard.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="/admin/machines.php">Machines</a></li>
                            <li><a class="dropdown-item" href="/admin/categories.php">Categories</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/admin/logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
