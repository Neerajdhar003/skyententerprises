<?php
// File: admin/logout.php - Admin Logout
session_start();

// Log activity before logout
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    require_once '../config/database.php';
    logActivity('Admin Logout', "User: {$_SESSION['admin_username']} logged out");
}

// Destroy all session data
session_unset();
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?>