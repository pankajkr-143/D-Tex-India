<?php
require_once 'auth/auth_handler.php';
$auth = new AuthHandler();
$auth->requireAuth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - D TEX INDIA</title>
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
            background: linear-gradient(135deg, var(--brand), #003d7a);
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
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
        
        .quick-actions {
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
                <div class="user-info">
                    Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
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
            <h2>Welcome to Your Dashboard</h2>
            <p>Manage your account and explore D TEX INDIA's premium textile solutions</p>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">
            <!-- Account Information -->
            <div class="card">
                <h3>Account Information</h3>
                <p>Your account details and preferences</p>
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                        <div class="stat-label">Full Name</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo htmlspecialchars($_SESSION['user_email']); ?></span>
                        <div class="stat-label">Email Address</div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <h3>Quick Actions</h3>
                <p>Access frequently used features</p>
                <div class="quick-actions">
                    <a href="#products" class="action-btn">
                        📦 Browse Products
                    </a>
                    <a href="#enquiry" class="action-btn">
                        💬 Send Enquiry
                    </a>
                    <a href="https://wa.me/8780674899?text=Hello%20D%20TEX%20INDIA%2C%20I%20want%20to%20enquire." target="_blank" class="action-btn">
                        📱 WhatsApp Chat
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card">
                <h3>Recent Activity</h3>
                <p>Your latest interactions with D TEX INDIA</p>
                <div style="margin-top: 15px;">
                    <div style="padding: 10px; background: #f8fafc; border-radius: 8px; margin-bottom: 10px;">
                        <strong>Account Created</strong><br>
                        <small style="color: var(--muted);"><?php echo date('F j, Y'); ?></small>
                    </div>
                    <div style="padding: 10px; background: #f8fafc; border-radius: 8px;">
                        <strong>Last Login</strong><br>
                        <small style="color: var(--muted);"><?php echo date('F j, Y g:i A'); ?></small>
                    </div>
                </div>
            </div>

            <!-- Company Updates -->
            <div class="card">
                <h3>Company Updates</h3>
                <p>Latest news and announcements from D TEX INDIA</p>
                <div style="margin-top: 15px;">
                    <div style="padding: 15px; background: #f0f9ff; border-left: 4px solid var(--brand); border-radius: 8px; margin-bottom: 15px;">
                        <strong>New Product Line</strong><br>
                        <small style="color: var(--muted);">Check out our latest DTY collection with improved quality standards.</small>
                    </div>
                    <div style="padding: 15px; background: #f0f9ff; border-left: 4px solid var(--accent); border-radius: 8px;">
                        <strong>Export Expansion</strong><br>
                        <small style="color: var(--muted);">We're now serving new international markets with faster delivery times.</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="card" style="margin-top: 30px;">
            <h3>Need Help?</h3>
            <p>Get in touch with our support team for any assistance</p>
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">📧</span>
                    <div class="stat-label">info@dtexindia.com</div>
                </div>
                <div class="stat-item">
                    <span class="stat-number">📱</span>
                    <div class="stat-label">+91-9999999999</div>
                </div>
                <div class="stat-item">
                    <span class="stat-number">📍</span>
                    <div class="stat-label">Surat, Gujarat, India</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> D TEX INDIA • All Rights Reserved</p>
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