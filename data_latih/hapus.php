<?php
session_start();
require '../functions.php';

$id = $_GET["id"];

if (hapus_datalatih($id) > 0) {
    $_SESSION['status'] = "Data Latih";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil Dihapus";
    header("Location: ../datalatih.php");
} else {
    $_SESSION['status'] = "Data Latih";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal Dihapus";
    header("Location: ../datalatih.php");
}
