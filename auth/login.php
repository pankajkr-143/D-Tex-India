<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: ' . ($_SESSION['user_type'] === 'admin' ? 'admin_dashboard.php' : 'user_dashboard.php'));
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - D TEX INDIA</title>
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
        
        .btn.secondary {
            background: var(--brand2);
            color: #111;
        }
        
        .btn.secondary:hover {
            background: #e6c200;
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
        
        .form {
            display: none;
        }
        
        .form.active {
            display: block;
        }
        
        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            color: var(--brand);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .back-link:hover {
            text-decoration: underline;
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
    <a href="../D.tex indai.html" class="back-link">← Back to Home</a>
    
    <div class="container">
        <div class="header">
            <h1>D TEX INDIA</h1>
            <p>Welcome back! Please login to your account.</p>
        </div>
        
        <div class="form-container">
            <!-- Alert Messages -->
            <div id="alert" class="alert" style="display: none;"></div>
            
            <!-- Login Form -->
            <form id="loginForm" class="form active">
                <div class="form-group">
                    <label for="loginEmail">Email Address</label>
                    <input type="email" id="loginEmail" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" name="password" required>
                </div>
                
                <button type="submit" class="btn">Login</button>
                
                <div class="form-toggle">
                    Don't have an account? <a href="#" onclick="toggleForm('signup')">Sign up</a>
                </div>
            </form>
            
            <!-- Signup Form -->
            <form id="signupForm" class="form">
                <div class="form-group">
                    <label for="signupName">Full Name</label>
                    <input type="text" id="signupName" name="full_name" required>
                </div>
                
                <div class="form-group">
                    <label for="signupEmail">Email Address</label>
                    <input type="email" id="signupEmail" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="signupPassword">Password</label>
                    <input type="password" id="signupPassword" name="password" required minlength="6">
                </div>
                
                <div class="form-group">
                    <label for="signupConfirmPassword">Confirm Password</label>
                    <input type="password" id="signupConfirmPassword" name="confirm_password" required>
                </div>
                
                <button type="submit" class="btn secondary">Create Account</button>
                
                <div class="form-toggle">
                    Already have an account? <a href="#" onclick="toggleForm('login')">Login</a>
                </div>
            </form>
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
        
        function toggleForm(formType) {
            document.getElementById('loginForm').classList.remove('active');
            document.getElementById('signupForm').classList.remove('active');
            document.getElementById(formType + 'Form').classList.add('active');
        }
        
        // Login Form Handler
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData();
            formData.append('action', 'login');
            formData.append('email', document.getElementById('loginEmail').value);
            formData.append('password', document.getElementById('loginPassword').value);
            
            fetch('auth/auth_handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert(data.message, 'success');
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1000);
                } else {
                    showAlert(data.message, 'error');
                }
            })
            .catch(error => {
                showAlert('An error occurred. Please try again.', 'error');
            });
        });
        
        // Signup Form Handler
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const password = document.getElementById('signupPassword').value;
            const confirmPassword = document.getElementById('signupConfirmPassword').value;
            
            if (password !== confirmPassword) {
                showAlert('Passwords do not match', 'error');
                return;
            }
            
            const formData = new FormData();
            formData.append('action', 'signup');
            formData.append('full_name', document.getElementById('signupName').value);
            formData.append('email', document.getElementById('signupEmail').value);
            formData.append('password', password);
            
            fetch('auth/auth_handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert(data.message, 'success');
                    setTimeout(() => {
                        toggleForm('login');
                    }, 2000);
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