<?php
session_start();
require 'functions.php';

function tambah_data($data)
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

    $query2 = "UPDATE tb_siswa
               SET 
               status = '1'
               WHERE nama_lengkap = '$nama_lengkap'";

    mysqli_query($conn, $query);
    mysqli_query($conn, $query2);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["simpan"])) {

    if (tambah_data($_POST) > 0) {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: perhitungan.php");
    } else {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: perhitungan.php");
    }
}
