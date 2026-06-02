<?php
session_start();
require_once 'config/database.php';
require_once 'includes/functions.php';

$conn = getDBConnection();
$job_openings = $conn->query("SELECT * FROM job_openings WHERE is_active = 1 ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers - Sky Enterprises</title>
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
                <li class="nav-item"><a class="nav-link active" href="careers.php">Careers</a></li>
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
        <h1 class="display-4 fw-bold" data-aos="fade-up">Join Our Team</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Build Your Career with Sky Enterprises</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7" data-aos="fade-right">
                <h2 class="section-title">Current <span class="text-gradient">Openings</span></h2>
                <p class="mb-4">We're always looking for talented individuals to join our growing team. Check out our current openings below.</p>
                
                <?php if(isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
                <?php endif; ?>
                <?php if(isset($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
                <?php endif; ?>
                
                <div class="accordion" id="jobsAccordion">
                    <?php $job_count = 0; while($job = $job_openings->fetch_assoc()): $job_count++; ?>
                    <div class="accordion-item mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="<?php echo $job_count * 50; ?>">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?php echo $job_count > 1 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#job<?php echo $job['id']; ?>">
                                <div>
                                    <strong><?php echo htmlspecialchars($job['title']); ?></strong>
                                    <br>
                                    <small class="text-muted">
                                        <i class="bi bi-building"></i> <?php echo $job['department']; ?> | 
                                        <i class="bi bi-geo-alt"></i> <?php echo $job['location']; ?> | 
                                        <i class="bi bi-briefcase"></i> <?php echo $job['employment_type']; ?>
                                    </small>
                                </div>
                            </button>
                        </h2>
                        <div id="job<?php echo $job['id']; ?>" class="accordion-collapse collapse <?php echo $job_count == 1 ? 'show' : ''; ?>" data-bs-parent="#jobsAccordion">
                            <div class="accordion-body">
                                <h6>Job Description:</h6>
                                <p><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
                                <h6>Requirements:</h6>
                                <p><?php echo nl2br(htmlspecialchars($job['requirements'])); ?></p>
                                <p><strong>Experience Required:</strong> <?php echo $job['experience_required']; ?></p>
                                <button class="btn btn-primary" onclick="document.getElementById('applyForm').scrollIntoView({behavior: 'smooth'}); document.querySelector('select[name=\"job_title\"]').value='<?php echo addslashes($job['title']); ?>'">
                                    Apply Now <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php if($job_count == 0): ?>
                    <div class="alert alert-info">No job openings at the moment. Please check back later!</div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="col-lg-5" data-aos="fade-left">
                <div class="card shadow-sm border-0 rounded-4 p-4 sticky-top" style="top: 100px;" id="applyForm">
                    <h3 class="mb-4">Apply Now</h3>
                    <form action="process_careers.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Select Job Position *</label>
                            <select name="job_title" class="form-select" required>
                                <option value="">Select a position</option>
                                <?php 
                                $conn2 = getDBConnection();
                                $jobs = $conn2->query("SELECT title FROM job_openings WHERE is_active = 1");
                                while($j = $jobs->fetch_assoc()): ?>
                                <option value="<?php echo htmlspecialchars($j['title']); ?>"><?php echo $j['title']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number *</label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Total Experience</label>
                                <input type="text" name="experience" class="form-control" placeholder="e.g., 2-4 years">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Current Company</label>
                                <input type="text" name="current_company" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload Resume (PDF/DOC) *</label>
                            <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                            <small class="text-muted">Max file size: 5MB</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cover Letter</label>
                            <textarea name="cover_letter" class="form-control" rows="4" placeholder="Why do you want to join Sky Enterprises?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-lg">Submit Application <i class="bi bi-send"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Why Work With <span class="text-gradient">Us</span></h2>
        </div>
        <div class="row g-4">
            <div class="col-md-3" data-aos="zoom-in">
                <div class="text-center p-3">
                    <i class="bi bi-graph-up fs-1 text-primary"></i>
                    <h5 class="mt-2">Growth Opportunities</h5>
                    <small>Fast career progression</small>
                </div>
            </div>
            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="50">
                <div class="text-center p-3">
                    <i class="bi bi-cash-stack fs-1 text-primary"></i>
                    <h5 class="mt-2">Competitive Salary</h5>
                    <small>Best in industry</small>
                </div>
            </div>
            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
                <div class="text-center p-3">
                    <i class="bi bi-mortarboard fs-1 text-primary"></i>
                    <h5 class="mt-2">Learning & Development</h5>
                    <small>Regular training programs</small>
                </div>
            </div>
            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="150">
                <div class="text-center p-3">
                    <i class="bi bi-people fs-1 text-primary"></i>
                    <h5 class="mt-2">Great Culture</h5>
                    <small>Supportive environment</small>
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