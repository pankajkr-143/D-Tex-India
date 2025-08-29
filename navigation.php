<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D TEX INDIA - Navigation</title>
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
            background: linear-gradient(135deg, #fdfdfd, #f2f6ff);
            min-height: 100vh;
            padding: 40px 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .header h1 {
            color: var(--brand);
            font-size: 36px;
            margin-bottom: 10px;
        }
        
        .header p {
            color: var(--muted);
            font-size: 18px;
        }
        
        .nav-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .nav-card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 25px;
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid var(--brand);
        }
        
        .nav-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,.12);
        }
        
        .nav-card h3 {
            color: var(--brand);
            margin-bottom: 10px;
            font-size: 20px;
        }
        
        .nav-card p {
            color: var(--muted);
            margin-bottom: 15px;
            line-height: 1.6;
        }
        
        .nav-card .btn {
            display: inline-block;
            padding: 8px 16px;
            background: var(--brand);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .status {
            background: var(--brand2);
            padding: 15px;
            border-radius: var(--radius);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .status h3 {
            color: #111;
            margin-bottom: 5px;
        }
        
        .status p {
            color: #333;
            font-size: 14px;
        }
        
        .footer {
            text-align: center;
            color: var(--muted);
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>D TEX INDIA</h1>
            <p>Website Navigation & Development</p>
        </div>
        
        <div class="status">
            <h3>🚀 Server Status: Running</h3>
            <p>PHP Development Server is active on localhost:8000</p>
        </div>
        
        <div class="nav-grid">
            <a href="D.tex indai.html" class="nav-card">
                <h3>🏠 Main Website</h3>
                <p>D TEX INDIA's main website with products, about us, and contact information.</p>
                <span class="btn">Visit Website</span>
            </a>
            
            <a href="login.php" class="nav-card">
                <h3>🔐 Login & Signup</h3>
                <p>User authentication system with registration and login functionality.</p>
                <span class="btn">Access Login</span>
            </a>
            
            <a href="user_dashboard.php" class="nav-card">
                <h3>👤 User Dashboard</h3>
                <p>Personalized dashboard for registered users with account information.</p>
                <span class="btn">View Dashboard</span>
            </a>
            
            <a href="admin_dashboard.php" class="nav-card">
                <h3>⚙️ Admin Dashboard</h3>
                <p>Administrative panel for managing users and system settings.</p>
                <span class="btn">Admin Panel</span>
            </a>
            
            <a href="test_db.php" class="nav-card">
                <h3>🗄️ Database Test</h3>
                <p>Test database connection and view current users in the system.</p>
                <span class="btn">Test Database</span>
            </a>
            
            <a href="README.md" class="nav-card">
                <h3>📖 Documentation</h3>
                <p>Complete setup instructions and system documentation.</p>
                <span class="btn">Read Docs</span>
            </a>
        </div>
        
        <div class="footer">
            <p><strong>Default Admin Credentials:</strong></p>
            <p>Email: admin@dtexindia.com | Password: admin123</p>
            <p>&copy; 2024 D TEX INDIA • All Rights Reserved</p>
        </div>
    </div>
</body>
</html> 