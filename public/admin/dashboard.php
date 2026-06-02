<?php
// File: admin/dashboard.php - Admin Dashboard
session_start();
require_once '../config/database.php';

// Check if admin is logged in
if (!isAdminLoggedIn()) {
    header("Location: login.php");
    exit();
}

$conn = getDBConnection();

// Get statistics
$enquiries_count = $conn->query("SELECT COUNT(*) as count FROM enquiries")->fetch_assoc()['count'];
$applications_count = $conn->query("SELECT COUNT(*) as count FROM job_applications")->fetch_assoc()['count'];
$clients_count = $conn->query("SELECT COUNT(*) as count FROM clients")->fetch_assoc()['count'];
$subscribers_count = $conn->query("SELECT COUNT(*) as count FROM newsletter_subscribers")->fetch_assoc()['count'];
$jobs_count = $conn->query("SELECT COUNT(*) as count FROM job_openings WHERE is_active = 1")->fetch_assoc()['count'];

// Handle actions
if (isset($_GET['delete_enquiry'])) {
    $id = intval($_GET['delete_enquiry']);
    $conn->query("DELETE FROM enquiries WHERE id = $id");
    logActivity('Delete Enquiry', "Deleted enquiry ID: $id");
    header("Location: dashboard.php?tab=enquiries");
    exit();
}

if (isset($_GET['delete_application'])) {
    $id = intval($_GET['delete_application']);
    $conn->query("DELETE FROM job_applications WHERE id = $id");
    logActivity('Delete Application', "Deleted application ID: $id");
    header("Location: dashboard.php?tab=applications");
    exit();
}

if (isset($_GET['update_status'])) {
    $id = intval($_GET['update_status']);
    $status = sanitizeInput($_GET['status']);
    $table = sanitizeInput($_GET['table']);
    $conn->query("UPDATE $table SET status = '$status' WHERE id = $id");
    logActivity('Update Status', "Updated $table ID: $id to status: $status");
    header("Location: dashboard.php?tab=" . ($table == 'enquiries' ? 'enquiries' : 'applications'));
    exit();
}

// Export to Excel
if (isset($_GET['export_enquiries'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=enquiries_' . date('Y-m-d') . '.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Name', 'Email', 'Phone', 'Service', 'Message', 'Status', 'Date']);
    $result = $conn->query("SELECT * FROM enquiries ORDER BY created_at DESC");
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [$row['id'], $row['name'], $row['email'], $row['phone'], $row['service'], $row['message'], $row['status'], $row['created_at']]);
    }
    fclose($output);
    exit();
}

if (isset($_GET['export_applications'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=applications_' . date('Y-m-d') . '.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Job Title', 'Name', 'Email', 'Phone', 'Experience', 'Current Company', 'Status', 'Date']);
    $result = $conn->query("SELECT * FROM job_applications ORDER BY created_at DESC");
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [$row['id'], $row['job_title'], $row['full_name'], $row['email'], $row['phone'], $row['experience'], $row['current_company'], $row['status'], $row['created_at']]);
    }
    fclose($output);
    exit();
}

$active_tab = $_GET['tab'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sky Enterprises</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { background: #1a1a2e; min-height: 100vh; position: sticky; top: 0; }
        .sidebar .nav-link { color: rgba(255,255,255,0.8); padding: 12px 20px; margin: 5px 0; border-radius: 10px; transition: all 0.3s; }
        .sidebar .nav-link:hover { background: rgba(255,255,255,0.1); color: white; }
        .sidebar .nav-link.active { background: #0d6efd; color: white; }
        .sidebar .nav-link i { margin-right: 10px; width: 20px; }
        .stat-card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); transition: transform 0.3s; cursor: pointer; }
        .stat-card:hover { transform: translateY(-5px); }
        .stat-icon { font-size: 2.5rem; opacity: 0.3; position: absolute; right: 20px; top: 20px; }
        .content-wrapper { padding: 20px; }
        .page-header { background: white; border-radius: 15px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 p-0 sidebar">
                <div class="text-center py-4">
                    <i class="bi bi-cloud-sun fs-1 text-white"></i>
                    <h5 class="text-white mt-2">Sky Enterprises</h5>
                    <small class="text-secondary">Admin Panel</small>
                </div>
                <nav class="nav flex-column px-3">
                    <a class="nav-link <?php echo $active_tab == 'dashboard' ? 'active' : ''; ?>" href="?tab=dashboard">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                    <a class="nav-link <?php echo $active_tab == 'enquiries' ? 'active' : ''; ?>" href="?tab=enquiries">
                        <i class="bi bi-envelope"></i> Enquiries 
                        <span class="badge bg-danger float-end mt-1"><?php echo $enquiries_count; ?></span>
                    </a>
                    <a class="nav-link <?php echo $active_tab == 'applications' ? 'active' : ''; ?>" href="?tab=applications">
                        <i class="bi bi-file-person"></i> Job Applications
                        <span class="badge bg-warning float-end mt-1"><?php echo $applications_count; ?></span>
                    </a>
                    <a class="nav-link <?php echo $active_tab == 'clients' ? 'active' : ''; ?>" href="?tab=clients">
                        <i class="bi bi-building"></i> Clients
                    </a>
                    <a class="nav-link <?php echo $active_tab == 'jobs' ? 'active' : ''; ?>" href="?tab=jobs">
                        <i class="bi bi-briefcase"></i> Job Openings
                    </a>
                    <a class="nav-link <?php echo $active_tab == 'subscribers' ? 'active' : ''; ?>" href="?tab=subscribers">
                        <i class="bi bi-envelope-paper"></i> Subscribers
                    </a>
                    <hr class="bg-secondary my-3">
                    <a class="nav-link" href="../index.php" target="_blank">
                        <i class="bi bi-eye"></i> View Site
                    </a>
                    <a class="nav-link text-danger" href="logout.php">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </nav>
                <div class="text-center text-secondary small py-3">
                    Logged in as: <strong><?php echo $_SESSION['admin_name']; ?></strong>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10 p-0">
                <div class="content-wrapper">
                    <!-- Dashboard Tab -->
                    <?php if($active_tab == 'dashboard'): ?>
                    <div class="page-header">
                        <h2 class="mb-0">Welcome, <?php echo $_SESSION['admin_name']; ?>!</h2>
                        <p class="text-muted mb-0">Here's what's happening with your business today.</p>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="card stat-card bg-primary text-white">
                                <div class="card-body">
                                    <i class="bi bi-envelope stat-icon"></i>
                                    <h3 class="mb-0"><?php echo $enquiries_count; ?></h3>
                                    <p class="mb-0">Total Enquiries</p>
                                    <small>New enquiries from website</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card bg-success text-white">
                                <div class="card-body">
                                    <i class="bi bi-people stat-icon"></i>
                                    <h3 class="mb-0"><?php echo $applications_count; ?></h3>
                                    <p class="mb-0">Job Applications</p>
                                    <small>Total applications received</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card bg-info text-white">
                                <div class="card-body">
                                    <i class="bi bi-building stat-icon"></i>
                                    <h3 class="mb-0"><?php echo $clients_count; ?></h3>
                                    <p class="mb-0">Happy Clients</p>
                                    <small>Trusted partners</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card bg-warning text-white">
                                <div class="card-body">
                                    <i class="bi bi-envelope-paper stat-icon"></i>
                                    <h3 class="mb-0"><?php echo $subscribers_count; ?></h3>
                                    <p class="mb-0">Newsletter Subs</p>
                                    <small>Email subscribers</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Enquiries -->
                    <div class="card mt-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="bi bi-clock-history"></i> Recent Enquiries</h5>
                            <a href="?tab=enquiries" class="btn btn-sm btn-primary">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr><th>ID</th><th>Name</th><th>Email</th><th>Service</th><th>Date</th><th>Action</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php $recent = $conn->query("SELECT * FROM enquiries ORDER BY created_at DESC LIMIT 5");
                                        while($row = $recent->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['service'] ?: 'General'; ?></td>
                                            <td><?php echo date('d M', strtotime($row['created_at'])); ?></td>
                                            <td><a href="?delete_enquiry=<?php echo $row['id']; ?>&tab=dashboard" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="bi bi-trash"></i></a></td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Enquiries Tab -->
                    <?php if($active_tab == 'enquiries'): ?>
                    <div class="page-header d-flex justify-content-between align-items-center">
                        <div><h2 class="mb-0">Contact Enquiries</h2><p class="text-muted mb-0">Manage all customer enquiries</p></div>
                        <a href="?export_enquiries=1" class="btn btn-success"><i class="bi bi-file-excel"></i> Export to Excel</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-hover" id="enquiriesTable">
                                <thead>
                                    <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Service</th><th>Message</th><th>Status</th><th>Date</th><th>Action</th></tr>
                                </thead>
                                <tbody>
                                    <?php $result = $conn->query("SELECT * FROM enquiries ORDER BY created_at DESC");
                                    while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['service'] ?: 'General'; ?></td>
                                        <td><?php echo truncateText($row['message'], 50); ?></td>
                                        <td>
                                            <select class="form-select form-select-sm" style="width: 100px;" onchange="window.location.href='?update_status=<?php echo $row['id']; ?>&status='+this.value+'&table=enquiries&tab=enquiries'">
                                                <option value="new" <?php echo $row['status'] == 'new' ? 'selected' : ''; ?>>New</option>
                                                <option value="read" <?php echo $row['status'] == 'read' ? 'selected' : ''; ?>>Read</option>
                                                <option value="replied" <?php echo $row['status'] == 'replied' ? 'selected' : ''; ?>>Replied</option>
                                            </select>
                                        </td>
                                        <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                                        <td>
                                            <a href="?delete_enquiry=<?php echo $row['id']; ?>&tab=enquiries" class="btn btn-sm btn-danger" onclick="return confirm('Delete this enquiry?')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Applications Tab -->
                    <?php if($active_tab == 'applications'): ?>
                    <div class="page-header d-flex justify-content-between align-items-center">
                        <div><h2 class="mb-0">Job Applications</h2><p class="text-muted mb-0">Manage all job applications</p></div>
                        <a href="?export_applications=1" class="btn btn-success"><i class="bi bi-file-excel"></i> Export to Excel</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-hover" id="applicationsTable">
                                <thead>
                                    <tr><th>ID</th><th>Job Title</th><th>Name</th><th>Email</th><th>Phone</th><th>Experience</th><th>Resume</th><th>Status</th><th>Date</th><th>Action</th></tr>
                                </thead>
                                <tbody>
                                    <?php $result = $conn->query("SELECT * FROM job_applications ORDER BY created_at DESC");
                                    while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['job_title']; ?></td>
                                        <td><?php echo $row['full_name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['experience'] ?: 'N/A'; ?></td>
                                        <td><?php if($row['resume_path']): ?><a href="../<?php echo $row['resume_path']; ?>" target="_blank" class="btn btn-sm btn-info">View</a><?php endif; ?></td>
                                        <td>
                                            <select class="form-select form-select-sm" style="width: 110px;" onchange="window.location.href='?update_status=<?php echo $row['id']; ?>&status='+this.value+'&table=job_applications&tab=applications'">
                                                <option value="pending" <?php echo $row['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                <option value="shortlisted" <?php echo $row['status'] == 'shortlisted' ? 'selected' : ''; ?>>Shortlisted</option>
                                                <option value="rejected" <?php echo $row['status'] == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                                <option value="hired" <?php echo $row['status'] == 'hired' ? 'selected' : ''; ?>>Hired</option>
                                            </select>
                                        </td>
                                        <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                                        <td><a href="?delete_application=<?php echo $row['id']; ?>&tab=applications" class="btn btn-sm btn-danger" onclick="return confirm('Delete this application?')"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Clients Tab -->
                    <?php if($active_tab == 'clients'): ?>
                    <div class="page-header">
                        <h2 class="mb-0">Manage Clients</h2>
                        <p class="text-muted mb-0">Add, edit or remove clients</p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addClientModal"><i class="bi bi-plus"></i> Add New Client</button>
                            <table class="table table-striped" id="clientsTable">
                                <thead><tr><th>ID</th><th>Client Name</th><th>Industry</th><th>Featured</th><th>Action</th></tr></thead>
                                <tbody>
                                    <?php $clients = $conn->query("SELECT * FROM clients ORDER BY client_name");
                                    while($c = $clients->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $c['id']; ?></td>
                                        <td><?php echo $c['client_name']; ?></td>
                                        <td><?php echo $c['industry']; ?></td>
                                        <td><?php echo $c['is_featured'] ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>'; ?></td>
                                        <td><button class="btn btn-sm btn-danger" onclick="if(confirm('Delete?')) window.location.href='?delete_client=<?php echo $c['id']; ?>&tab=clients'"><i class="bi bi-trash"></i></button></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add Client Modal -->
    <div class="modal fade" id="addClientModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Add New Client</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <form method="POST" action="?tab=clients">
                    <div class="modal-body">
                        <div class="mb-3"><label>Client Name *</label><input type="text" name="client_name" class="form-control" required></div>
                        <div class="mb-3"><label>Industry</label><input type="text" name="industry" class="form-control"></div>
                        <div class="mb-3"><label>Website URL</label><input type="url" name="website_url" class="form-control"></div>
                        <div class="mb-3"><label>Testimonial</label><textarea name="testimonial" class="form-control" rows="3"></textarea></div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" name="add_client" class="btn btn-primary">Add Client</button></div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#enquiriesTable, #applicationsTable, #clientsTable').DataTable({ pageLength: 25, responsive: true });
        });
    </script>
</body>
</html>