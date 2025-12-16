<?php
session_start();

// Menghapus semua data session
session_unset();
session_destroy();

// Mengarahkan kembali ke halaman login
header("Location: login.php");
exit();
?>