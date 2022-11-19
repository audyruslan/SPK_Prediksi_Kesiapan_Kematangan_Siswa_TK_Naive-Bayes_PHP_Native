<?php
session_start();
require '../functions.php';

function tambah_admin($data)
{
    global $conn;

    $nama_lengkap = $data['nama_lengkap'];
    $username = $data['username'];
    $password = $data['password'];
    $img_dir = avatar(strtoupper($data["nama_lengkap"][0]));

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO admin (username,password,nama_lengkap,img_dir) VALUES('$username', '$password','$nama_lengkap','$img_dir')");

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah_admin($_POST) > 0) {
        $_SESSION['status'] = "Admin Baru";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: ../admin.php");
    } else {
        $_SESSION['status'] = "Admin Baru";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: ../admin.php");
    }
}
