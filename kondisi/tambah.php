<?php
session_start();
require '../functions.php';

function tambah_kondisi($data)
{
    global $conn;

    $nama_kriteria = $data['nama_kriteria'];
    $kondisi = $data['kondisi'];

    $query = "INSERT INTO tb_kondisi
                (nama_kriteria,kondisi)
				VALUES 
				('$nama_kriteria','$kondisi')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah_kondisi($_POST) > 0) {
        $_SESSION['status'] = "Data Kondisi";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: ../kondisi.php");
    } else {
        $_SESSION['status'] = "Data Kondisi";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: ../kondisi.php");
    }
}
