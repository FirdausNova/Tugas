<?php
require_once 'Koneksi.php';

// Check if the role column already exists
$checkColumnQuery = "SHOW COLUMNS FROM users LIKE 'role'";
$result = $conn->query($checkColumnQuery);

if ($result->num_rows == 0) {
    // Role column doesn't exist, add it
    $sql = "ALTER TABLE users ADD COLUMN role VARCHAR(20) DEFAULT 'user' AFTER password";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table users modified successfully. Added 'role' column.\n";
    } else {
        echo "Error modifying table: " . $conn->error . "\n";
    }
} else {
    echo "The 'role' column already exists in the users table.\n";
}

// Update existing users to set admin role for testing
// You can change this email to the one you want to set as admin
$adminEmail = "novatty059@gmail.com"; // This is from the .env file

$updateRoleQuery = "UPDATE users SET role = 'admin' WHERE email = '$adminEmail'";

if ($conn->query($updateRoleQuery) === TRUE) {
    echo "Updated user with email $adminEmail to admin role.\n";
} else {
    echo "Error updating user role: " . $conn->error . "\n";
}

$conn->close();
echo "Database update completed.\n";
?>