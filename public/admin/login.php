<?php
session_start();
require_once '../config/database.php';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $conn = getDBConnection();
    $result = $conn->query("SELECT * FROM admin_users WHERE username = '$username'");
    
    if ($result && $row = $result->fetch_assoc()) {
        // Try both: direct compare AND password_verify
        if ($password == $row['password'] || password_verify($password, $row['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_name'] = $row['full_name'];
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $row['username'];
            
            logActivity('Admin Login', "User: {$row['username']} logged in successfully");
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid password";
            logActivity('Failed Login', "Failed attempt for username: $username");
        }
    } else {
        $error = "Invalid username";
        logActivity('Failed Login', "Failed attempt for username: $username");
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Sky Enterprises</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .login-card { border-radius: 20px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .login-header { background: linear-gradient(135deg, #1a73e8, #0d47a1); padding: 2rem; text-align: center; }
        .btn-login { background: linear-gradient(135deg, #1a73e8, #0d47a1); border: none; padding: 12px; border-radius: 10px; }
        .form-control { border-radius: 10px; padding: 12px 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5">
                <div class="card login-card">
                    <div class="login-header text-white">
                        <i class="bi bi-building fs-1"></i>
                        <h3 class="mt-2 mb-0">Sky Enterprises</h3>
                        <p class="mb-0 opacity-75">Admin Portal</p>
                    </div>
                    <div class="card-body p-4">
                        <?php if($error): ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <i class="bi bi-exclamation-triangle"></i> <?php echo $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label"><i class="bi bi-person"></i> Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter username" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="bi bi-lock"></i> Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-login w-100">
                                <i class="bi bi-box-arrow-in-right"></i> Login to Dashboard
                            </button>
                        </form>
                        <div class="text-center mt-4">
                            <small class="text-muted">
                                <i class="bi bi-info-circle"></i> Default: admin / admin123
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>