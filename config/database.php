<?php
class Database {
    private $db;
    
    public function __construct() {
        try {
            $dbPath = __DIR__ . '/../database/users.db';
            $this->db = new PDO('sqlite:' . $dbPath);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->createTables();
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    private function createTables() {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            full_name TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL,
            user_type TEXT DEFAULT 'user',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        
        $this->db->exec($sql);
        
        // Create admin user if not exists
        $adminEmail = 'admin@dtexindia.com';
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$adminEmail]);
        
        if (!$stmt->fetch()) {
            $adminPassword = password_hash('admin123', PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO users (full_name, email, password, user_type) VALUES (?, ?, ?, ?)");
            $stmt->execute(['Admin User', $adminEmail, $adminPassword, 'admin']);
        }
    }
    
    public function getConnection() {
        return $this->db;
    }
}
?> 