<?php
// Test database connection and table creation
require_once 'config/database.php';

try {
    $database = new Database();
    $db = $database->getConnection();
    
    echo "✅ Database connection successful!\n";
    
    // Test query to check if users table exists
    $stmt = $db->query("SELECT COUNT(*) as count FROM users");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "✅ Users table exists with " . $result['count'] . " users\n";
    
    // Show all users
    $stmt = $db->query("SELECT id, full_name, email, user_type, created_at FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "\n📋 Current Users:\n";
    foreach ($users as $user) {
        echo "- ID: " . $user['id'] . " | Name: " . $user['full_name'] . " | Email: " . $user['email'] . " | Type: " . $user['user_type'] . " | Created: " . $user['created_at'] . "\n";
    }
    
    echo "\n🎉 Database setup is complete!\n";
    echo "Default admin credentials:\n";
    echo "Email: admin@dtexindia.com\n";
    echo "Password: admin123\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
?> 