<?php
session_start();
require '../functions.php';

$id = $_GET["id"];

if (hapus_siswa($id) > 0) {
    $_SESSION['status'] = "Data Siswa";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil Diubah";
    header("Location: ../siswa.php");
} else {
    $_SESSION['status'] = "Data Siswa";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal Diubah";
    header("Location: ../siswa.php");
}
