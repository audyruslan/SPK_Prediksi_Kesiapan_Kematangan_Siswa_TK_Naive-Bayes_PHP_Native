<?php
session_start();
require '../functions.php';

function tambah_kriteria($data)
{
    global $conn;

    $nama_kriteria = $data['nama_kriteria'];

    $query = "INSERT INTO tb_kriteria
                (nama_kriteria)
				VALUES 
				('$nama_kriteria')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah_kriteria($_POST) > 0) {
        $_SESSION['status'] = "Data Kriteria";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: ../kriteria.php");
    } else {
        $_SESSION['status'] = "Data Kriteria";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: ../kriteria.php");
    }
}
