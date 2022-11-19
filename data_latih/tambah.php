<?php
session_start();
require '../functions.php';

function tambah_datalatih($data)
{
    global $conn;

    $nama_lengkap = $data['nama_lengkap'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $usia = $data['usia'];
    $kemampuan_membaca = $data['kemampuan_membaca'];
    $kemampuan_menulis = $data['kemampuan_menulis'];
    $kemampuan_menghitung = $data['kemampuan_menghitung'];
    $kemandirian = $data['kemandirian'];
    $kesiapan = $data['kesiapan'];

    $query = "INSERT INTO tb_data
				VALUES 
				('','$nama_lengkap','$jenis_kelamin','$usia','$kemampuan_membaca','$kemampuan_menulis','$kemampuan_menghitung','$kemandirian','$kesiapan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah_datalatih($_POST) > 0) {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: ../datalatih.php");
    } else {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: ../datalatih.php");
    }
}
