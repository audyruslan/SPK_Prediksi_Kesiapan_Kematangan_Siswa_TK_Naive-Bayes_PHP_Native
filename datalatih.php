<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Gejala - Naive Bayes (NB)";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'functions.php';

$user = $_SESSION["username"];
$query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user'");
$admin = mysqli_fetch_assoc($query);
require 'layouts/sidebar.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Latih</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Latih</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-secondary">
                <div class="row">
                    <div class="col">
                        <a href="add_datalatih.php" class="btn btn-primary ml-2 mt-3 mb-3">
                            Tambah Data Latih
                        </a>
                        <div class="col-12">
                            <table class="table table-bordered table-hover" id="tableDataLatih" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Usia</th>
                                        <th>Kemampuan Membaca</th>
                                        <th>Kemampuan Menulis</th>
                                        <th>Kemampuan Menghitung</th>
                                        <th>Kemandirian</th>
                                        <th>Kesiapan</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM tb_data");
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row[1]; ?></td>
                                        <td><?= $row[2]; ?></td>
                                        <td><?= $row[3]; ?></td>
                                        <td><?= $row[4]; ?></td>
                                        <td><?= $row[5]; ?></td>
                                        <td><?= $row[6]; ?></td>
                                        <td><?= $row[7]; ?></td>
                                        <td><?= $row[8]; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-sm ubah" data-toggle="modal" data-target="#EditModal<?= $row[0]; ?>"><i class="fas fa-edit"></i> </a>
                                            <a class="btn btn-danger btn-sm hapus_datalatih" href="data_latih/hapus.php?id=<?= $row[0]; ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="EditModal<?= $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="#EditModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="EditModalLabel">Ubah Data Latih</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="data_latih/ubah.php" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $row[0]; ?>">
                                                        <div class="form-group">
                                                            <label for="no_kk">No. KK</label>
                                                            <input type="text" autocomplete="off" class="form-control" id="no_kk" name="no_kk" value="<?= $row[1]; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" autocomplete="off" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $row[2]; ?>" readonly>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="usia">Usia</label>
                                                                    <input type="number" autocomplete="off" class="form-control" id="usia" name="usia" value="<?= $row[4]; ?>" placeholder="Nama Kondisi">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                                    <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Pendidikan Terakhir'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[5] == $kriteria[2]) echo 'selected="selected"'; ?>><?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pekerjaan">Pekerjaan</label>
                                                                    <select class="form-control" name="pekerjaan" id="pekerjaan">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Pekerjaan'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[6] == $kriteria[2]) echo 'selected="selected"'; ?>><?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="pendapatan_perbulan">Pendapatan Perbulan</label>
                                                                    <select class="form-control" name="pendapatan_perbulan" id="pendapatan_perbulan">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Pendapatan Perbulan'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[7] == $kriteria[2]) echo 'selected="selected"'; ?>><?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kondisi_hunian">Kondisi Hunian</label>
                                                                    <select class="form-control" name="kondisi_hunian" id="kondisi_hunian">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kondisi Hunian'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[8] == $kriteria[2]) echo 'selected="selected"'; ?>><?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sejahtera">Sejahtera</label>
                                                                    <select class="form-control" name="sejahtera" id="sejahtera">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Sejahtera'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[9] == $kriteria[2]) echo 'selected="selected"'; ?>><?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembail</button>
                                                        <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>

                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require 'layouts/footer.php'; ?>