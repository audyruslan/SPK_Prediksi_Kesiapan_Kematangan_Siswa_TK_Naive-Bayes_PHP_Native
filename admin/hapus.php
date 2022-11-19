<?php
session_start();
require '../functions.php';

$id = $_GET["username"];

// Query Data Admin
$sql = mysqli_query($conn, "SELECT * FROM admin
                    WHERE username = '$id'");
$image = mysqli_fetch_assoc($sql);

// Hapus Gambar Admin
$gambar = $image['img_dir'];
if (file_exists("$gambar")) {
    unlink("$gambar");
}

if (hapus_admin($id) > 0) {
    $_SESSION['status'] = "Data Admin";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil Dihapus";
    header("Location: ../admin.php");
} else {
    $_SESSION['status'] = "Data Admin";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal Dihapus";
    header("Location: ../admin.php");
}
