<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Data Siswa - Naive Bayes (NB)";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'functions.php';
require 'tgl_indo.php';
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
                    <h1 class="m-0">Data Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Siswa</li>
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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary ml-2 mt-3 mb-3" data-toggle="modal" data-target="#tambahModal">
                            Tambah Data
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="siswa/tambah.php" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" autocomplete="off" placeholder="Nama Lengkap">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin">Jenis Kelamin</label><select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                            <option>--Silahkan Pilih--</option>
                                                            <option value="Laki-laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="usia">Usia</label>
                                                        <input type="number" class="form-control" id="usia" name="usia" autocomplete="off" placeholder="Usia">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tmp_lahir">Tempat Lahir</label>
                                                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" autocomplete="off" placeholder="Tempat Lahir">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" autocomplete="off" placeholder="Tanggal Lahir">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="agama">Agama</label>
                                                        <input type="text" class="form-control" id="agama" name="agama" autocomplete="off" placeholder="Agama">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama_ayah">Nama Ayah</label>
                                                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" autocomplete="off" placeholder="Nama Ayah">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama_ibu">Nama Ibu</label>
                                                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" autocomplete="off" placeholder="Nama Ibu">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" autocomplete="off" placeholder="Pekerjaan Ayah">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" autocomplete="off" placeholder="Pekerjaan Ibu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-hover" id="tableSiswa" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Usia</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM tb_siswa");
                                while ($row = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['nama_lengkap']; ?></td>
                                        <td><?= $row['jenis_kelamin']; ?></td>
                                        <td><?= $row['usia']; ?></td>
                                        <td><?= $row['tmp_lahir']; ?>, <?= tgl_indo($row['tgl_lahir']); ?></td>
                                        <td><?= $row['agama']; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-sm ubah" data-toggle="modal" data-target="#EditModal<?= $row["id"]; ?>"><i class="fas fa-edit"></i> </a>
                                            <a class="btn btn-danger btn-sm hapus_siswa" href="siswa/hapus.php?id=<?= $row["id"]; ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="EditModal<?= $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="#EditModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="EditModalLabel">Ubah Siswa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="siswa/ubah.php" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $row["nama_lengkap"]; ?>" autocomplete="off" placeholder="Nama Lengkap">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <option value="Laki-laki" <?php if ($row["jenis_kelamin"] == "Laki-laki") echo 'selected="selected"'; ?>>Laki-Laki</option>
                                                                        <option value="Perempuan" <?php if ($row["jenis_kelamin"] == "Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="usia">Usia</label>
                                                                    <input type="number" class="form-control" id="usia" name="usia" value="<?= $row["usia"]; ?>" autocomplete="off" placeholder="Usia">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tmp_lahir">Tempat Lahir</label>
                                                                    <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= $row["tmp_lahir"]; ?>" autocomplete="off" placeholder="Tempat Lahir">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $row["tgl_lahir"]; ?>" autocomplete="off" placeholder="Tanggal Lahir">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="agama">Agama</label>
                                                                    <input type="text" class="form-control" id="agama" name="agama" value="<?= $row["agama"]; ?>" autocomplete="off" placeholder="Agama">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_ayah">Nama Ayah</label>
                                                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $row["nama_ayah"]; ?>" autocomplete="off" placeholder="Nama Ayah">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_ibu">Nama Ibu</label>
                                                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $row["nama_ibu"]; ?>" autocomplete="off" placeholder="Nama Ibu">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?= $row["pekerjaan_ayah"]; ?>" autocomplete="off" placeholder="Pekerjaan Ayah">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?= $row["pekerjaan_ibu"]; ?>" autocomplete="off" placeholder="Pekerjaan Ibu">
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