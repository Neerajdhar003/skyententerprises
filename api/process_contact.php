<?php
session_start();
require_once 'config/database.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $service = sanitizeInput($_POST['service'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');
    
    $errors = [];
    
    if (empty($name)) $errors[] = "Name is required";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required";
    if (empty($phone)) $errors[] = "Phone number is required";
    if (empty($message)) $errors[] = "Message is required";
    
    if (empty($errors)) {
        $conn = getDBConnection();
        $stmt = $conn->prepare("INSERT INTO enquiries (name, email, phone, service, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $service, $message);
        
        if ($stmt->execute()) {
            // Send email notification to admin
            $subject = "New Enquiry from Sky Enterprises Website";
            $emailContent = "<h3>New Enquiry Received</h3>
                            <p><strong>Name:</strong> $name</p>
                            <p><strong>Email:</strong> $email</p>
                            <p><strong>Phone:</strong> $phone</p>
                            <p><strong>Service:</strong> " . ($service ?: 'General') . "</p>
                            <p><strong>Message:</strong> $message</p>
                            <hr>
                            <p>Login to admin panel to view all enquiries.</p>";
            
            sendEmailNotification("info@skyenterprises.com", $subject, $emailContent);
            
            // Send auto-reply to customer
            $customerSubject = "Thank you for contacting Sky Enterprises";
            $customerContent = "<h3>Thank you, $name!</h3>
                               <p>We have received your enquiry and our team will get back to you within 24 hours.</p>
                               <p><strong>Your Enquiry Details:</strong></p>
                               <p><strong>Service:</strong> " . ($service ?: 'General') . "</p>
                               <p><strong>Message:</strong> $message</p>
                               <br>
                               <p>Best Regards,<br>Sky Enterprises Team</p>";
            
            sendEmailNotification($email, $customerSubject, $customerContent);
            
            $_SESSION['success_message'] = "Thank you! Your enquiry has been submitted successfully. We will contact you soon.";
        } else {
            $_SESSION['error_message'] = "Something went wrong. Please try again.";
        }
        $stmt->close();
        $conn->close();
    } else {
        $_SESSION['error_message'] = implode(", ", $errors);
    }
    
    // Redirect back to contact page
    $redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'contact.php';
    header("Location: $redirect_url");
    exit();
} else {
    header("Location: contact.php");
    exit();
}
?>