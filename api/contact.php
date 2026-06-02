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
    <title>Contact Us - Sky Enterprises</title>
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
                <li class="nav-item"><a class="nav-link" href="clients.php">Clients</a></li>
                <li class="nav-item"><a class="nav-link" href="careers.php">Careers</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
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
        <h1 class="display-4 fw-bold" data-aos="fade-up">Contact Us</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">We'd Love to Hear From You</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <?php if(isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
        <?php endif; ?>
        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
        <?php endif; ?>
        
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h3 class="mb-4">Get in Touch</h3>
                    <div class="contact-info mb-4">
                        <div class="d-flex mb-3">
                            <i class="bi bi-geo-alt fs-4 text-primary me-3"></i>
                            <div>
                                <h6 class="mb-0">Corporate Office</h6>
                                <p class="mb-0 text-muted">7th Floor, Business Tower, Andheri East, Mumbai - 400069</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="bi bi-telephone fs-4 text-primary me-3"></i>
                            <div>
                                <h6 class="mb-0">Phone Numbers</h6>
                                <p class="mb-0 text-muted">+91 22 4567 8900<br>+91 98765 43210</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="bi bi-envelope fs-4 text-primary me-3"></i>
                            <div>
                                <h6 class="mb-0">Email Addresses</h6>
                                <p class="mb-0 text-muted">info@skyenterprises.com<br>careers@skyenterprises.com<br>support@skyenterprises.com</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-clock fs-4 text-primary me-3"></i>
                            <div>
                                <h6 class="mb-0">Business Hours</h6>
                                <p class="mb-0 text-muted">Monday-Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <h5>Follow Us</h5>
                        <div class="social-links mt-2">
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle me-2"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle me-2"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle me-2"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7" data-aos="fade-left">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h3 class="mb-4">Send Us a Message</h3>
                    <form action="process_contact.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Your Name *</label>
                                <input type="text" name="name" class="form-control form-control-lg" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address *</label>
                                <input type="email" name="email" class="form-control form-control-lg" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" name="phone" class="form-control form-control-lg" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Select Service</label>
                                <select name="service" class="form-select form-select-lg">
                                    <option value="">Select a service</option>
                                    <option>Exam Invigilator Services</option>
                                    <option>IT Networking Solutions</option>
                                    <option>CCTV Installation</option>
                                    <option>Fiber Optic Cabling</option>
                                    <option>Technical Manpower Services</option>
                                    <option>Annual Maintenance Contract</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Your Message *</label>
                                <textarea name="message" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">Send Message <i class="bi bi-send"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Maps Section -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="card border-0 shadow-sm overflow-hidden rounded-4">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1x3770.265545007145!2d72.86922267471216!3d19.11346098209477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c97f346be48b%3A0x9a0f0b5b8e9e8e8e!2sAndheri%20East%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
                width="100%" 
                height="400" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
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