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
    <meta name="description" content="Sky Enterprises - Professional Exam Invigilation, IT Networking, CCTV Installation, Fiber Optic Cabling and Technical Manpower Services">
    <title>Sky Enterprises - Professional Business Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/assets/css/style.css">
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

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-4">Empowering Your Business with <span class="text-gradient">Professional Excellence</span></h1>
                <p class="lead mb-4">Comprehensive solutions in Exam Management, IT Infrastructure, Security Systems, and Technical Manpower Services.</p>
                <div class="d-flex gap-3">
                    <a href="contact.php" class="btn btn-primary btn-lg">Get Started <i class="bi bi-arrow-right"></i></a>
                    <a href="services.php" class="btn btn-outline-primary btn-lg">Our Services</a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=600" alt="Business Solutions" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<section class="stats-section py-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3" data-aos="zoom-in">
                <div class="stat-box">
                    <i class="bi bi-people fs-1 text-primary"></i>
                    <h2 class="counter" data-target="500">0</h2>
                    <p>Happy Clients</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
                <div class="stat-box">
                    <i class="bi bi-briefcase fs-1 text-primary"></i>
                    <h2 class="counter" data-target="1000">0</h2>
                    <p>Projects Completed</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
                <div class="stat-box">
                    <i class="bi bi-award fs-1 text-primary"></i>
                    <h2 class="counter" data-target="25">0</h2>
                    <p>Years Experience</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
                <div class="stat-box">
                    <i class="bi bi-geo-alt fs-1 text-primary"></i>
                    <h2 class="counter" data-target="15">0</h2>
                    <p>Cities Covered</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Why Choose <span class="text-gradient">Sky Enterprises</span></h2>
            <p class="lead">What makes us your trusted business partner</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="flip-left">
                <div class="feature-card text-center p-4">
                    <i class="bi bi-trophy fs-1 text-primary"></i>
                    <h4 class="mt-3">Industry Expertise</h4>
                    <p>25+ years of experience across multiple industries with proven track record.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
                <div class="feature-card text-center p-4">
                    <i class="bi bi-shield-check fs-1 text-primary"></i>
                    <h4 class="mt-3">Quality Assurance</h4>
                    <p>ISO certified processes ensuring highest quality standards in every project.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="flip-left" data-aos-delay="200">
                <div class="feature-card text-center p-4">
                    <i class="bi bi-headset fs-1 text-primary"></i>
                    <h4 class="mt-3">24/7 Support</h4>
                    <p>Round-the-clock technical support and customer service availability.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Our Core <span class="text-gradient">Services</span></h2>
            <p class="lead">Comprehensive solutions tailored to your business needs</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-mortarboard"></i></div>
                    <h4>Exam Invigilation</h4>
                    <p>Professional exam management and invigilation services for educational institutions and recruitment drives.</p>
                    <a href="services.php" class="btn-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-wifi"></i></div>
                    <h4>IT Networking</h4>
                    <p>Enterprise-grade network infrastructure setup and management solutions.</p>
                    <a href="services.php" class="btn-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-camera-video"></i></div>
                    <h4>CCTV Installation</h4>
                    <p>Advanced surveillance systems for complete security coverage.</p>
                    <a href="services.php" class="btn-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-fiber"></i></div>
                    <h4>Fiber Solutions</h4>
                    <p>High-speed fiber optic cabling and infrastructure deployment.</p>
                    <a href="services.php" class="btn-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-people"></i></div>
                    <h4>Technical Manpower</h4>
                    <p>Skilled technical professionals for your project requirements.</p>
                    <a href="services.php" class="btn-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-tools"></i></div>
                    <h4>AMC Services</h4>
                    <p>Annual maintenance contracts for all your IT and security needs.</p>
                    <a href="services.php" class="btn-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="industries-section py-5 bg-dark text-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title text-white">Industries We <span class="text-gradient">Serve</span></h2>
            <p>Trusted by leading organizations across diverse sectors</p>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-2 col-4" data-aos="zoom-in"><i class="bi bi-bank fs-1"></i><p class="mt-2">Banking</p></div>
            <div class="col-md-2 col-4" data-aos="zoom-in" data-aos-delay="50"><i class="bi bi-building fs-1"></i><p>Corporate</p></div>
            <div class="col-md-2 col-4" data-aos="zoom-in" data-aos-delay="100"><i class="bi bi-hospital fs-1"></i><p>Healthcare</p></div>
            <div class="col-md-2 col-4" data-aos="zoom-in" data-aos-delay="150"><i class="bi bi-mortarboard fs-1"></i><p>Education</p></div>
            <div class="col-md-2 col-4" data-aos="zoom-in" data-aos-delay="200"><i class="bi bi-shop fs-1"></i><p>Retail</p></div>
            <div class="col-md-2 col-4" data-aos="zoom-in" data-aos-delay="250"><i class="bi bi-globe fs-1"></i><p>Government</p></div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">What Our <span class="text-gradient">Clients Say</span></h2>
            <p>Real feedback from our valued partners</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-right">
                <div class="testimonial-card">
                    <i class="bi bi-quote fs-1 text-primary"></i>
                    <p>Sky Enterprises has been instrumental in setting up our complete IT infrastructure. Their team is professional and responsive.</p>
                    <h5 class="mt-3">Rajesh Sharma</h5>
                    <small>IT Director, Tech Mahindra</small>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="testimonial-card">
                    <i class="bi bi-quote fs-1 text-primary"></i>
                    <p>The exam invigilation services provided were top-notch. Highly professional and well-managed processes.</p>
                    <h5 class="mt-3">Priya Mehta</h5>
                    <small>HR Head, ICICI Bank</small>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-left">
                <div class="testimonial-card">
                    <i class="bi bi-quote fs-1 text-primary"></i>
                    <p>Excellent CCTV installation and maintenance services. Their team ensured complete security coverage for our facilities.</p>
                    <h5 class="mt-3">Amit Kumar</h5>
                    <small>Operations Manager, L&T</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" id="contact">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="mb-4">Get In Touch</h2>
                <p class="mb-4">Have questions? We're here to help. Send us a message and we'll respond within 24 hours.</p>
                <?php if(isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
                <?php endif; ?>
                <?php if(isset($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
                <?php endif; ?>
                <form action="process_contact.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6"><input type="text" name="name" class="form-control form-control-lg" placeholder="Your Name" required></div>
                        <div class="col-md-6"><input type="email" name="email" class="form-control form-control-lg" placeholder="Your Email" required></div>
                        <div class="col-md-6"><input type="tel" name="phone" class="form-control form-control-lg" placeholder="Phone Number" required></div>
                        <div class="col-md-6">
                            <select name="service" class="form-select form-select-lg">
                                <option value="">Select Service</option>
                                <option>Exam Invigilator</option>
                                <option>IT Networking</option>
                                <option>CCTV Installation</option>
                                <option>Fiber Solutions</option>
                                <option>Technical Manpower</option>
                            </select>
                        </div>
                        <div class="col-12"><textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea></div>
                        <div class="col-12"><button type="submit" class="btn btn-primary btn-lg">Send Message <i class="bi bi-send"></i></button></div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="bg-white text-dark p-4 rounded-4">
                    <h3 class="mb-4">Newsletter Subscription</h3>
                    <p>Subscribe to receive updates, news, and special offers.</p>
                    <form action="subscribe.php" method="POST" class="d-flex gap-2">
                        <input type="email" name="email" class="form-control" placeholder="Your Email Address" required>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                    <hr class="my-4">
                    <h4>Contact Information</h4>
                    <p><i class="bi bi-geo-alt"></i> 7th Floor, Business Tower, Andheri East, Mumbai - 400069</p>
                    <p><i class="bi bi-telephone"></i> +91 22 4567 8900, +91 98765 43210</p>
                    <p><i class="bi bi-envelope"></i> info@skyenterprises.com</p>
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
<script src="/public/assets/js/main.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        counter.innerText = '0';
        const updateCounter = () => {
            const target = +counter.getAttribute('data-target');
            const current = +counter.innerText;
            const increment = target / 200;
            if (current < target) {
                counter.innerText = Math.ceil(current + increment);
                setTimeout(updateCounter, 10);
            } else {
                counter.innerText = target;
            }
        };
        updateCounter();
    });
</script>
</body>
</html>