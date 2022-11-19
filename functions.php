<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "nb_db");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Hapus Data Siswa
function hapus_siswa($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_siswa WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Kondisi
function hapus_kondisi($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_kondisi WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Admin
function hapus_admin($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM admin WHERE username = '$id'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Kriteria
function hapus_kriteria($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_kriteria WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Kelas
function hapus_kelas($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_kelas WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Latih
function hapus_datalatih($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_data WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

function upload_gambar()
{
    $namaFile = $_FILES['gambar']['name'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmpName, '../assets/img/penyakit/' . $namaFile);

    return $namaFile;
}

function avatar($character)
{
    $path = "image/" . time() . ".png";
    $image = imagecreate(200, 200);
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);
    imagecolorallocate($image, $red, $green, $blue);
    $textcolor = imagecolorallocate($image, 255, 255, 255);

    $font = dirname(__FILE__) . "/assets/font/arial.ttf";

    imagettftext($image, 100, 0, 55, 150, $textcolor, $font, $character);
    imagepng($image, $path);
    imagedestroy($image);
    return $path;
}
