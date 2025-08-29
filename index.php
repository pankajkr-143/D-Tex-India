<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Only redirect admins to admin dashboard
    if ($_SESSION['user_type'] === 'admin') {
        header('Location: admin_dashboard.php');
        exit();
    }
    // Regular users stay on landing page
}

// Redirect to main website
header('Location: D.tex indai.html');
exit();
?> 