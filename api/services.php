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
    <title>Our Services - Sky Enterprises</title>
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
                <li class="nav-item"><a class="nav-link active" href="services.php">Services</a></li>
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
        <h1 class="display-4 fw-bold" data-aos="fade-up">Our Services</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Comprehensive Solutions Tailored to Your Business Needs</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Service 1 -->
            <div class="col-lg-6" data-aos="fade-up">
                <div class="service-detail-card p-4 rounded-4 shadow-sm h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-mortarboard fs-1"></i>
                        </div>
                        <h2 class="mb-0">Exam Invigilator Services</h2>
                    </div>
                    <p class="lead">Professional examination management and invigilation services.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-lg text-primary me-2"></i> End-to-end exam management</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Trained invigilators</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Digital exam support</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Secure exam center management</li>
                    </ul>
                </div>
            </div>
            
            <!-- Service 2 -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-detail-card p-4 rounded-4 shadow-sm h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-wifi fs-1"></i>
                        </div>
                        <h2 class="mb-0">IT Networking Solutions</h2>
                    </div>
                    <p class="lead">Enterprise-grade network infrastructure setup and management.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Network design & implementation</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Router & switch configuration</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Firewall security setup</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Wireless network solutions</li>
                    </ul>
                </div>
            </div>
            
            <!-- Service 3 -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-detail-card p-4 rounded-4 shadow-sm h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-camera-video fs-1"></i>
                        </div>
                        <h2 class="mb-0">CCTV Installation</h2>
                    </div>
                    <p class="lead">Advanced surveillance systems for complete security coverage.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-lg text-primary me-2"></i> HD & 4K Camera installation</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Remote monitoring setup</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Night vision cameras</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Recording & storage solutions</li>
                    </ul>
                </div>
            </div>
            
            <!-- Service 4 -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-detail-card p-4 rounded-4 shadow-sm h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-fiber fs-1"></i>
                        </div>
                        <h2 class="mb-0">Fiber Optic Cabling</h2>
                    </div>
                    <p class="lead">High-speed fiber optic infrastructure deployment.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Fiber optic cable laying</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Splicing & termination</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> FTTH solutions</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Testing & certification</li>
                    </ul>
                </div>
            </div>
            
            <!-- Service 5 -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-detail-card p-4 rounded-4 shadow-sm h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-people fs-1"></i>
                        </div>
                        <h2 class="mb-0">Technical Manpower Services</h2>
                    </div>
                    <p class="lead">Skilled technical professionals for your project requirements.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-lg text-primary me-2"></i> IT support staff</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Network technicians</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> CCTV engineers</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Temporary staffing solutions</li>
                    </ul>
                </div>
            </div>
            
            <!-- Service 6 -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                <div class="service-detail-card p-4 rounded-4 shadow-sm h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-tools fs-1"></i>
                        </div>
                        <h2 class="mb-0">Annual Maintenance Contract</h2>
                    </div>
                    <p class="lead">Comprehensive maintenance for all your IT and security needs.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-lg text-primary me-2"></i> 24/7 technical support</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Preventive maintenance</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Emergency response</li>
                        <li><i class="bi bi-check-lg text-primary me-2"></i> Spare parts replacement</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Why Choose Our <span class="text-gradient">Services</span></h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="flip-left">
                <div class="text-center p-4">
                    <i class="bi bi-clock-history fs-1 text-primary"></i>
                    <h4 class="mt-3">24/7 Availability</h4>
                    <p>Round-the-clock support for all your business needs</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
                <div class="text-center p-4">
                    <i class="bi bi-trophy fs-1 text-primary"></i>
                    <h4 class="mt-3">Certified Experts</h4>
                    <p>Highly trained and certified professionals</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="flip-left" data-aos-delay="200">
                <div class="text-center p-4">
                    <i class="bi bi-gem fs-1 text-primary"></i>
                    <h4 class="mt-3">Best Price Guarantee</h4>
                    <p>Competitive pricing with premium quality</p>
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