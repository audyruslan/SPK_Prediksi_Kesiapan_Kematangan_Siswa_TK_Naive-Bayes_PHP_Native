<?php
session_start();
require '../functions.php';

function ubah_siswa($data)
{
    global $conn;
    $id = $data["id"];
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

    $query = "UPDATE tb_siswa
                SET
				nama_lengkap = '$nama_lengkap',
				jenis_kelamin = '$jenis_kelamin',
				usia = '$usia',
				tmp_lahir = '$tmp_lahir',
				tgl_lahir = '$tgl_lahir',
				nama_ayah = '$nama_ayah',
				nama_ibu = '$nama_ibu',
				agama = '$agama',
				pekerjaan_ayah = '$pekerjaan_ayah',
				pekerjaan_ibu = '$pekerjaan_ibu'
                WHERE id = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Ubah Data
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah_siswa($_POST) > 0) {
        $_SESSION['status'] = "Data Siswa";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Diubah";
        header("Location: ../siswa.php");
    } else {
        $_SESSION['status'] = "Data Siswa";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Diubah";
        header("Location: ../siswa.php");
    }
}
