<?php
session_start();
require '../functions.php';

function ubah_kriteria($data)
{
    global $conn;
    $id = $data["id"];
    $nama_kriteria = $data['nama_kriteria'];

    $query = "UPDATE tb_kriteria 
                SET
				nama_kriteria = '$nama_kriteria'
                WHERE id = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Ubah Data
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah_kriteria($_POST) > 0) {
        $_SESSION['status'] = "Data Kriteria";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Diubah";
        header("Location: ../kriteria.php");
    } else {
        $_SESSION['status'] = "Data Kriteria";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Diubah";
        header("Location: ../kriteria.php");
    }
}
