<?php
session_start();
require '../functions.php';

function ubah_datalatih($data)
{
    global $conn;
    $id = $data["id"];
    $usia = $data['usia'];
    $pendidikan_terakhir = $data['pendidikan_terakhir'];
    $pekerjaan = $data['pekerjaan'];
    $pendapatan_perbulan = $data['pendapatan_perbulan'];
    $kondisi_hunian = $data['kondisi_hunian'];
    $sejahtera = $data['sejahtera'];

    $query = "UPDATE tb_data
                SET
				usia = '$usia',
				pendidikan_terakhir = '$pendidikan_terakhir',
				pekerjaan = '$pekerjaan',
				pendapatan_perbulan = '$pendapatan_perbulan',
				kondisi_hunian = '$kondisi_hunian',
				sejahtera = '$sejahtera'
                WHERE id = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Ubah Data
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah_datalatih($_POST) > 0) {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Diubah";
        header("Location: ../datalatih.php");
    } else {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Diubah";
        header("Location: ../datalatih.php");
    }
}
