<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
function check_login() {
    // If user is not logged in, redirect to login page with a message
    if (!isset($_SESSION['username'])) {
        // Store the current URL to redirect back after login
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        
        // Redirect to login page with a message
        header("Location: ../php/Login.php?required=true");
        exit();
    }
    return true;
}

// Function to check if login is required for specific pages
// This can be called conditionally within pages
function require_login() {
    return check_login();
}
?>