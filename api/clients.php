<?php
session_start();
require_once 'config/database.php';
require_once 'includes/functions.php';

$conn = getDBConnection();
$clients = $conn->query("SELECT * FROM clients ORDER BY is_featured DESC, client_name ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Clients - Sky Enterprises</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="bi bi-cloud-sun fs-2"></i>
            <span class="fw-bold">Sky Enterprises</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                <li class="nav-item"><a class="nav-link active" href="clients.php">Clients</a></li>
                <li class="nav-item"><a class="nav-link" href="careers.php">Careers</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item">
                    <button class="btn btn-outline-light ms-2" id="darkModeToggle">
                        <i class="bi bi-moon-stars"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="page-header bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="display-4 fw-bold" data-aos="fade-up">Our Valued Clients</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Trusted by Industry Leaders Across India</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Our <span class="text-gradient">Clients</span></h2>
            <p class="lead">We are proud to serve these prestigious organizations</p>
        </div>
        <div class="row g-4 justify-content-center">
            <?php while($client = $clients->fetch_assoc()): ?>
            <div class="col-md-3 col-6" data-aos="zoom-in">
                <div class="client-card text-center p-4 border rounded-3 shadow-sm h-100">
                    <i class="bi bi-building fs-1 text-primary"></i>
                    <h5 class="mt-3"><?php echo htmlspecialchars($client['client_name']); ?></h5>
                    <small class="text-muted"><?php echo $client['industry']; ?></small>
                    <?php if($client['testimonial']): ?>
                        <p class="mt-2 small"><?php echo substr($client['testimonial'], 0, 80); ?>...</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Project <span class="text-gradient">Showcase</span></h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="project-card rounded-3 overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=400" class="w-100" style="height: 200px; object-fit: cover;">
                    <div class="p-3 bg-white">
                        <h5>IT Infrastructure Setup</h5>
                        <p class="text-muted">Complete network setup for Tech Mahindra's new campus</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="project-card rounded-3 overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1558002038-1055907df827?w=400" class="w-100" style="height: 200px; object-fit: cover;">
                    <div class="p-3 bg-white">
                        <h5>CCTV Surveillance</h5>
                        <p class="text-muted">500+ cameras installed across ICICI Bank branches</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="project-card rounded-3 overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?w=400" class="w-100" style="height: 200px; object-fit: cover;">
                    <div class="p-3 bg-white">
                        <h5>Fiber Optic Network</h5>
                        <p class="text-muted">100km fiber optic cabling for Reliance Jio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer pt-5 pb-3">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h4><i class="bi bi-cloud-sun"></i> Sky Enterprises</h4>
                <p>Your trusted partner for comprehensive business solutions since 1999.</p>
                <div class="social-links">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <h5>Quick Links</h5>
                <ul class="list-unstyled"><li><a href="index.php">Home</a></li><li><a href="about.php">About</a></li><li><a href="services.php">Services</a></li><li><a href="contact.php">Contact</a></li></ul>
            </div>
            <div class="col-lg-3">
                <h5>Our Services</h5>
                <ul class="list-unstyled"><li>Exam Invigilation</li><li>IT Networking</li><li>CCTV Installation</li><li>Fiber Optic Cabling</li></ul>
            </div>
            <div class="col-lg-3">
                <h5>Business Hours</h5>
                <p>Monday-Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
            </div>
        </div>
        <hr class="mt-4">
        <div class="text-center py-3">
            <p class="mb-0">&copy; 2024 Sky Enterprises. All rights reserved.</p>
        </div>
    </div>
</footer>

<a href="https://wa.me/919876543210" class="whatsapp-float" target="_blank"><i class="fab fa-whatsapp"></i></a>
<button id="scrollTop" class="scroll-top"><i class="bi bi-arrow-up"></i></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="assets/js/main.js"></script>
<script>AOS.init();</script>
</body>
</html>