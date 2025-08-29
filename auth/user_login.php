<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if ($_SESSION['user_type'] === 'admin') {
        header('Location: admin_dashboard.php');
    } else {
        header('Location: ../pages/user_profile.php');
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - D TEX INDIA</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        
        .header {
            background: var(--brand);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .header p {
            opacity: 0.9;
            font-size: 14px;
        }
        
        .form-container {
            padding: 30px 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text);
            font-size: 14px;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            outline: none;
        }
        
        .form-group input:focus {
            border-color: var(--brand);
        }
        
        .btn {
            width: 100%;
            padding: 14px;
            background: var(--brand);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .btn:hover {
            background: #003d7a;
        }
        
        .form-toggle {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }
        
        .form-toggle a {
            color: var(--brand);
            text-decoration: none;
            font-weight: 600;
        }
        
        .form-toggle a:hover {
            text-decoration: underline;
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-link a {
            color: var(--brand);
            text-decoration: none;
            font-weight: 600;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .alert.success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        
        .alert.error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        
        @media (max-width: 480px) {
            .container {
                margin: 10px;
            }
            
            .header {
                padding: 20px 15px;
            }
            
            .form-container {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>D TEX INDIA</h1>
            <p>Welcome back! Please login to your account.</p>
        </div>
        
        <div class="form-container">
            <!-- Alert Messages -->
            <div id="alert" class="alert" style="display: none;"></div>
            
            <!-- User Login Form -->
            <form id="userLoginForm">
                <div class="form-group">
                    <label for="userEmail">Email Address</label>
                    <input type="email" id="userEmail" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="userPassword">Password</label>
                    <input type="password" id="userPassword" name="password" required>
                </div>
                
                <button type="submit" class="btn">Login</button>
            </form>
            
            <div class="form-toggle">
                Don't have an account? <a href="user_signup.php">Sign up</a>
            </div>
            
            <div class="back-link">
                <a href="../D.tex indai.html">← Back to Website</a>
            </div>
        </div>
    </div>

    <script>
        function showAlert(message, type = 'error') {
            const alert = document.getElementById('alert');
            alert.textContent = message;
            alert.className = `alert ${type}`;
            alert.style.display = 'block';
            
            setTimeout(() => {
                alert.style.display = 'none';
            }, 5000);
        }
        
        // User Login Form Handler
        document.getElementById('userLoginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData();
            formData.append('action', 'login');
            formData.append('email', document.getElementById('userEmail').value);
            formData.append('password', document.getElementById('userPassword').value);
            
            fetch('auth/auth_handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.user_type === 'user') {
                        showAlert(data.message, 'success');
                        setTimeout(() => {
                            window.location.href = '../pages/user_profile.php';
                        }, 1000);
                    } else {
                        showAlert('Please use admin login for administrator access.', 'error');
                    }
                } else {
                    showAlert(data.message, 'error');
                }
            })
            .catch(error => {
                showAlert('An error occurred. Please try again.', 'error');
            });
        });
    </script>
</body>
</html> 