<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Admin - Naive Bayes (NB)";
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
                    <h1 class="m-0">Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
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
                            Tambah Admin
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="admin/tambah.php" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                        <input type="text" autocomplete="off" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" autocomplete="off" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" autocomplete="off" class="form-control" id="password" name="password" placeholder="Masukkan Password">
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
                            <table class="table table-bordered table-hover" id="example" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM admin");
                                while ($row = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['nama_lengkap']; ?></td>
                                        <td><?= $row['username']; ?></td>
                                        <td>
                                            <a class="btn btn-danger btn-sm hapus_admin" href="admin/hapus.php?username=<?= $row["username"]; ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
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