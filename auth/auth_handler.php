<?php
session_start();
require_once __DIR__ . '/../config/database.php';

class AuthHandler {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function signup($fullName, $email, $password) {
        try {
            // Check if email already exists
            $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            
            if ($stmt->fetch()) {
                return ['success' => false, 'message' => 'Email already registered'];
            }
            
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert new user
            $stmt = $this->db->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$fullName, $email, $hashedPassword]);
            
            return ['success' => true, 'message' => 'Registration successful! Please login.'];
            
        } catch(PDOException $e) {
            return ['success' => false, 'message' => 'Registration failed: ' . $e->getMessage()];
        }
    }
    
    public function login($email, $password) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['full_name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_type'] = $user['user_type'];
                $_SESSION['logged_in'] = true;
                
                return [
                    'success' => true, 
                    'message' => 'Login successful!',
                    'user_type' => $user['user_type'],
                    'redirect' => $user['user_type'] === 'admin' ? 'admin_dashboard.php' : 'user_profile.php'
                ];
            } else {
                return ['success' => false, 'message' => 'Invalid email or password'];
            }
            
        } catch(PDOException $e) {
            return ['success' => false, 'message' => 'Login failed: ' . $e->getMessage()];
        }
    }
    
    public function logout() {
        session_destroy();
        return ['success' => true, 'message' => 'Logged out successfully'];
    }
    
    public function isLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    
    public function requireAuth() {
        if (!$this->isLoggedIn()) {
            header('Location: D.tex indai.html');
            exit();
        }
    }
    
    public function requireAdmin() {
        $this->requireAuth();
        if ($_SESSION['user_type'] !== 'admin') {
            header('Location: user_profile.php');
            exit();
        }
    }
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth = new AuthHandler();
    $action = $_POST['action'] ?? '';
    
    header('Content-Type: application/json');
    
    switch($action) {
        case 'signup':
            $result = $auth->signup(
                $_POST['full_name'] ?? '',
                $_POST['email'] ?? '',
                $_POST['password'] ?? ''
            );
            echo json_encode($result);
            break;
            
        case 'login':
            $result = $auth->login(
                $_POST['email'] ?? '',
                $_POST['password'] ?? ''
            );
            echo json_encode($result);
            break;
            
        case 'logout':
            $result = $auth->logout();
            echo json_encode($result);
            break;
            
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
    exit();
}
?> 