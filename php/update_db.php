<?php
// Script to update database structure for password reset and email verification functionality
include 'Koneksi.php';

// Add reset_token and reset_expires columns if they don't exist
$sql1 = "ALTER TABLE users 
       ADD COLUMN IF NOT EXISTS reset_token VARCHAR(255) DEFAULT NULL, 
       ADD COLUMN IF NOT EXISTS reset_expires DATETIME DEFAULT NULL";

// Add email verification columns if they don't exist
$sql2 = "ALTER TABLE users 
       ADD COLUMN IF NOT EXISTS email_verified TINYINT(1) NOT NULL DEFAULT 0, 
       ADD COLUMN IF NOT EXISTS verification_token VARCHAR(255) DEFAULT NULL, 
       ADD COLUMN IF NOT EXISTS verification_expires DATETIME DEFAULT NULL";

$success = true;

if ($conn->query($sql1) === TRUE) {
    echo "Database updated successfully: Added password reset fields to users table.<br>";
} else {
    echo "Error updating database (password reset fields): " . $conn->error . "<br>";
    $success = false;
}

if ($conn->query($sql2) === TRUE) {
    echo "Database updated successfully: Added email verification fields to users table.<br>";
} else {
    echo "Error updating database (email verification fields): " . $conn->error . "<br>";
    $success = false;
}

if ($success) {
    echo "<br>All database updates completed successfully.";
}

$conn->close();
?>