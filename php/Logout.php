<?php
session_start();

// Simpan username sebelum menghapus sesi (untuk pesan feedback)
$username = isset($_SESSION["username"]) ? $_SESSION["username"] : "";

// Hapus semua variabel sesi
$_SESSION = array();

// Hapus cookie sesi
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Hapus cookie remember me jika ada
if (isset($_COOKIE['remember_token'])) {
    setcookie("remember_token", "", time() - 3600, "/");
}

// Hancurkan sesi
session_destroy();

// Redirect dengan umpan balik
header("Location: ../Navbar/Navbar.php?logout=success&user=" . urlencode($username));
exit();
?>