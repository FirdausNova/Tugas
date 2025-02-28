<?php
include '../php/Koneksi.php'; // Pastikan koneksi ke database benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Cek apakah password dan konfirmasi password sama
    if ($password !== $confirm_password) {
        die("Password dan Konfirmasi Password tidak sama!");
    }

    // Enkripsi password biar aman
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username atau email sudah digunakan
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("Username atau Email sudah terdaftar!");
    }

    // Insert data ke database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Registrasi berhasil! <a href='../login/Index.html'>Login sekarang</a>";
    } else {
        echo "Terjadi kesalahan.";
    }
}
?>
