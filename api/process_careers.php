<?php
session_start();
require_once 'config/database.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_title = sanitizeInput($_POST['job_title'] ?? '');
    $full_name = sanitizeInput($_POST['full_name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $experience = sanitizeInput($_POST['experience'] ?? '');
    $current_company = sanitizeInput($_POST['current_company'] ?? '');
    $cover_letter = sanitizeInput($_POST['cover_letter'] ?? '');
    
    $errors = [];
    
    if (empty($job_title)) $errors[] = "Job title is required";
    if (empty($full_name)) $errors[] = "Full name is required";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required";
    if (empty($phone)) $errors[] = "Phone number is required";
    
    $resume_path = '';
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/resumes/';
        
        // Create directory if not exists
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_ext = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));
        $allowed_ext = ['pdf', 'doc', 'docx'];
        
        if (in_array($file_ext, $allowed_ext)) {
            $resume_path = $upload_dir . time() . '_' . preg_replace('/[^a-zA-Z0-9]/', '_', $full_name) . '.' . $file_ext;
            move_uploaded_file($_FILES['resume']['tmp_name'], $resume_path);
        } else {
            $errors[] = "Only PDF, DOC, and DOCX files are allowed";
        }
    } else {
        $errors[] = "Resume file is required";
    }
    
    if (empty($errors)) {
        $conn = getDBConnection();
        $stmt = $conn->prepare("INSERT INTO job_applications (job_title, full_name, email, phone, experience, current_company, resume_path, cover_letter) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $job_title, $full_name, $email, $phone, $experience, $current_company, $resume_path, $cover_letter);
        
        if ($stmt->execute()) {
            // Send email notification
            $subject = "New Job Application - $job_title";
            $emailContent = "<h3>New Job Application Received</h3>
                            <p><strong>Position:</strong> $job_title</p>
                            <p><strong>Name:</strong> $full_name</p>
                            <p><strong>Email:</strong> $email</p>
                            <p><strong>Phone:</strong> $phone</p>
                            <p><strong>Experience:</strong> " . ($experience ?: 'Not specified') . "</p>
                            <p><strong>Current Company:</strong> " . ($current_company ?: 'Not specified') . "</p>
                            <p><strong>Resume:</strong> <a href='http://localhost/skyenterprises/$resume_path'>View Resume</a></p>
                            <hr>
                            <p>Login to admin panel to manage applications.</p>";
            
            sendEmailNotification("careers@skyenterprises.com", $subject, $emailContent);
            
            // Send confirmation to applicant
            $applicantSubject = "Application Received - Sky Enterprises";
            $applicantContent = "<h3>Dear $full_name,</h3>
                                <p>Thank you for applying for the position of <strong>$job_title</strong> at Sky Enterprises.</p>
                                <p>We have received your application and our HR team will review it shortly.</p>
                                <p>If your profile matches our requirements, we will contact you within 5-7 working days.</p>
                                <br>
                                <p>Best Regards,<br>HR Team<br>Sky Enterprises</p>";
            
            sendEmailNotification($email, $applicantSubject, $applicantContent);
            
            $_SESSION['success_message'] = "Application submitted successfully! We will review your profile and get back to you soon.";
        } else {
            $_SESSION['error_message'] = "Submission failed. Please try again.";
        }
        $stmt->close();
        $conn->close();
    } else {
        $_SESSION['error_message'] = implode(", ", $errors);
    }
    
    header("Location: careers.php");
    exit();
} else {
    header("Location: careers.php");
    exit();
}
?>