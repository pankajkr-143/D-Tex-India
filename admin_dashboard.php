<?php
require_once 'auth/auth_handler.php';
$auth = new AuthHandler();
$auth->requireAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - D TEX INDIA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #ffffff;
            --card: #FFD100;
            --muted: #475569;
            --text: #044C97;
            --brand: #004C97;
            --brand2: #FFD100;
            --accent: #2CAB57;
            --radius: 16px;
            --shadow: 0 10px 30px rgba(0,0,0,.08);
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Inter', system-ui, Segoe UI, Roboto, Arial;
            background: #f8fafc;
            color: var(--text);
        }
        
        .navbar {
            background: white;
            border-bottom: 3px solid var(--brand2);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 50;
        }
        
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--brand);
        }
        
        .brand img {
            height: 40px;
            border-radius: 8px;
        }
        
        .brand h1 {
            font-size: 20px;
            font-weight: 700;
        }
        
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .admin-badge {
            background: #dc2626;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            background: var(--brand2);
            border-radius: 25px;
            font-weight: 600;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: var(--brand);
            color: white;
        }
        
        .btn-primary:hover {
            background: #003d7a;
        }
        
        .btn-secondary {
            background: #ef4444;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #dc2626;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }
        
        .welcome-section {
            background: linear-gradient(135deg, #dc2626, #991b1b);
            color: white;
            padding: 40px;
            border-radius: var(--radius);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .welcome-section h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }
        
        .welcome-section p {
            font-size: 18px;
            opacity: 0.9;
        }
        
        .admin-badge-large {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            margin-top: 15px;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 25px;
            border-left: 4px solid var(--brand);
        }
        
        .card h3 {
            color: var(--brand);
            margin-bottom: 15px;
            font-size: 20px;
        }
        
        .card p {
            color: var(--muted);
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
            background: #f8fafc;
            border-radius: 10px;
        }
        
        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: var(--brand);
            display: block;
        }
        
        .stat-label {
            color: var(--muted);
            font-size: 14px;
            margin-top: 5px;
        }
        
        .admin-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .action-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            background: var(--brand2);
            color: #111;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .action-btn:hover {
            background: #e6c200;
            transform: translateY(-2px);
        }
        
        .action-btn.danger {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .action-btn.danger:hover {
            background: #fecaca;
        }
        
        .table-container {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-top: 30px;
        }
        
        .table-header {
            background: var(--brand);
            color: white;
            padding: 20px;
        }
        
        .table-header h3 {
            margin: 0;
            font-size: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        
        th {
            background: #f8fafc;
            font-weight: 600;
            color: var(--text);
        }
        
        tr:hover {
            background: #f8fafc;
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-active {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-admin {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .footer {
            text-align: center;
            padding: 30px 20px;
            color: var(--muted);
            border-top: 1px solid #e5e7eb;
            margin-top: 50px;
        }
        
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }
            
            .welcome-section {
                padding: 30px 20px;
            }
            
            .welcome-section h2 {
                font-size: 24px;
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .table-container {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="D.tex indai.html" class="brand">
                <img src="logo.jpeg" alt="D TEX INDIA Logo">
                <h1>D TEX INDIA</h1>
            </a>
            <div class="nav-actions">
                <span class="admin-badge">ADMIN</span>
                <div class="user-info">
                    <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                </div>
                <a href="D.tex indai.html" class="btn btn-primary">View Website</a>
                <button onclick="logout()" class="btn btn-secondary">Logout</button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h2>Admin Dashboard</h2>
            <p>Manage D TEX INDIA's website, users, and business operations</p>
            <div class="admin-badge-large">Administrator Access</div>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">
            <!-- System Overview -->
            <div class="card">
                <h3>System Overview</h3>
                <p>Current system statistics and performance metrics</p>
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number">25</span>
                        <div class="stat-label">Total Users</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">12</span>
                        <div class="stat-label">Active Users</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">8</span>
                        <div class="stat-label">New This Month</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">99.9%</span>
                        <div class="stat-label">Uptime</div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <h3>Quick Actions</h3>
                <p>Common administrative tasks</p>
                <div class="admin-actions">
                    <a href="manage_users.php" class="action-btn">
                        👥 Manage Users
                    </a>
                    <a href="manage_products.php" class="action-btn">
                        📦 Manage Products
                    </a>
                    <a href="view_enquiries.php" class="action-btn">
                        💬 View Enquiries
                    </a>
                    <a href="system_settings.php" class="action-btn">
                        ⚙️ System Settings
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card">
                <h3>Recent Activity</h3>
                <p>Latest system events and user activities</p>
                <div style="margin-top: 15px;">
                    <div style="padding: 10px; background: #f8fafc; border-radius: 8px; margin-bottom: 10px;">
                        <strong>New User Registration</strong><br>
                        <small style="color: var(--muted);">John Doe registered - 2 hours ago</small>
                    </div>
                    <div style="padding: 10px; background: #f8fafc; border-radius: 8px; margin-bottom: 10px;">
                        <strong>Product Update</strong><br>
                        <small style="color: var(--muted);">DTY specifications updated - 1 day ago</small>
                    </div>
                    <div style="padding: 10px; background: #f8fafc; border-radius: 8px;">
                        <strong>System Backup</strong><br>
                        <small style="color: var(--muted);">Database backup completed - 2 days ago</small>
                    </div>
                </div>
            </div>

            <!-- System Health -->
            <div class="card">
                <h3>System Health</h3>
                <p>Current system status and performance</p>
                <div style="margin-top: 15px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background: #f0f9ff; border-radius: 8px; margin-bottom: 10px;">
                        <span>Database Status</span>
                        <span style="color: var(--accent); font-weight: 600;">✓ Online</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background: #f0f9ff; border-radius: 8px; margin-bottom: 10px;">
                        <span>Storage Usage</span>
                        <span style="color: var(--brand); font-weight: 600;">45%</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background: #f0f9ff; border-radius: 8px;">
                        <span>Memory Usage</span>
                        <span style="color: var(--brand); font-weight: 600;">62%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="table-container">
            <div class="table-header">
                <h3>Registered Users</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Registration Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Admin User</td>
                        <td>admin@dtexindia.com</td>
                        <td><span class="status-badge status-admin">Admin</span></td>
                        <td><?php echo date('M j, Y'); ?></td>
                        <td><span class="status-badge status-active">Active</span></td>
                        <td>
                            <button class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td><span class="status-badge status-active">User</span></td>
                        <td><?php echo date('M j, Y', strtotime('-2 days')); ?></td>
                        <td><span class="status-badge status-active">Active</span></td>
                        <td>
                            <button class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>jane@example.com</td>
                        <td><span class="status-badge status-active">User</span></td>
                        <td><?php echo date('M j, Y', strtotime('-5 days')); ?></td>
                        <td><span class="status-badge status-active">Active</span></td>
                        <td>
                            <button class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> D TEX INDIA • All Rights Reserved • Admin Panel</p>
    </footer>

    <script>
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                const formData = new FormData();
                formData.append('action', 'logout');
                
                fetch('auth/auth_handler.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = 'login.php';
                    }
                })
                .catch(error => {
                    console.error('Logout error:', error);
                    window.location.href = 'login.php';
                });
            }
        }
    </script>
</body>
</html> 