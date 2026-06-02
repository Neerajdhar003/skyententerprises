<?php
session_start();
require_once 'config/database.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Sky Enterprises</title>
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
                <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="clients.php">Clients</a></li>
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
        <h1 class="display-4 fw-bold" data-aos="fade-up">About Sky Enterprises</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Your Trusted Partner Since 1999</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title">Who We Are</h2>
                <p class="lead">Sky Enterprises is a leading provider of comprehensive business solutions, established in 1999 with a vision to deliver excellence.</p>
                <p>Over the past 25+ years, we have grown into a trusted partner for organizations across India, offering specialized services in Exam Management, IT Infrastructure, Security Systems, and Technical Manpower.</p>
                <p>Our commitment to quality, innovation, and customer satisfaction has made us the preferred choice for Fortune 500 companies, educational institutions, and government organizations.</p>
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-primary fs-4 me-2"></i>
                            <span>25+ Years Experience</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-primary fs-4 me-2"></i>
                            <span>500+ Happy Clients</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-primary fs-4 me-2"></i>
                            <span>1000+ Projects</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-primary fs-4 me-2"></i>
                            <span>15+ Cities Covered</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600" alt="Team" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <i class="bi bi-eye fs-1 text-primary"></i>
                        <h3 class="mt-3">Our Vision</h3>
                        <p>To be the most trusted and innovative business solutions provider, setting new standards of excellence in every industry we serve.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <i class="bi bi-bullseye fs-1 text-primary"></i>
                        <h3 class="mt-3">Our Mission</h3>
                        <p>To deliver exceptional value through professional expertise, cutting-edge technology, and unwavering commitment to customer success.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Our Core <span class="text-gradient">Values</span></h2>
        </div>
        <div class="row g-4">
            <div class="col-md-3" data-aos="zoom-in">
                <div class="text-center p-3">
                    <i class="bi bi-star fs-1 text-primary"></i>
                    <h5 class="mt-2">Excellence</h5>
                </div>
            </div>
            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="50">
                <div class="text-center p-3">
                    <i class="bi bi-shield-check fs-1 text-primary"></i>
                    <h5 class="mt-2">Integrity</h5>
                </div>
            </div>
            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
                <div class="text-center p-3">
                    <i class="bi bi-lightbulb fs-1 text-primary"></i>
                    <h5 class="mt-2">Innovation</h5>
                </div>
            </div>
            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="150">
                <div class="text-center p-3">
                    <i class="bi bi-people fs-1 text-primary"></i>
                    <h5 class="mt-2">Customer First</h5>
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