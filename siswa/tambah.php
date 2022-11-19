<?php
session_start();
require '../functions.php';

function tambah_siswa($data)
{
    global $conn;

    $nama_lengkap = $data['nama_lengkap'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $usia = $data['usia'];
    $tmp_lahir = $data['tmp_lahir'];
    $tgl_lahir = $data['tgl_lahir'];
    $nama_ayah = $data['nama_ayah'];
    $nama_ibu = $data['nama_ibu'];
    $agama = $data['agama'];
    $pekerjaan_ayah = $data['pekerjaan_ayah'];
    $pekerjaan_ibu = $data['pekerjaan_ibu'];

    $query = "INSERT INTO tb_siswa
				VALUES 
				('','$nama_lengkap','$jenis_kelamin','$usia','$tmp_lahir','$tgl_lahir','$nama_ayah','$nama_ibu','$agama','$pekerjaan_ayah','$pekerjaan_ibu','0')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah_siswa($_POST) > 0) {
        $_SESSION['status'] = "Data Siswa";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: ../siswa.php");
    } else {
        $_SESSION['status'] = "Data Siswa";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: ../siswa.php");
    }
}
