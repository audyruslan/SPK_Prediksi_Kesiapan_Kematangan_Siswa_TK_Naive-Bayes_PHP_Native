<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Ubah Password - Naive Bayes (NB)";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'functions.php';

$user = $_SESSION["username"];
$query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user'");
$admin = mysqli_fetch_assoc($query);
require 'layouts/sidebar.php';

if (isset($_POST["ubah"])) {

    $username = $_POST["username"];
    $password_lama = $_POST["password_lama"];
    $password_baru = $_POST["password_baru"];
    $konfirmasi_password = $_POST["konfirmasi_password"];


    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password_lama, $row["password"])) {
        if ($password_baru == $konfirmasi_password) {
            // enkripsi password
            $password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
            $query = "UPDATE admin SET password = '$password_baru' WHERE username = '$username' ";
            mysqli_query($conn, $query);
            $_SESSION['pesan'] = "<strong>Password Berhasil Diubah!</strong>";
        } else {
            $_SESSION['error'] = "<strong>Konfirmasi Password Salah!</strong>";
        }
    } else {
        $_SESSION['error'] = "<strong>Password Lama Salah!</strong>";
    }


    $error = true;
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Password</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-secondary">
                <div class="row m-3">
                    <div class="col-4">
                        <?php if (isset($_SESSION['pesan'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $_SESSION['pesan'];  ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php unset($_SESSION['pesan']); ?>
                        <?php } ?>
                        <?php if (isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $_SESSION['error'];  ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php unset($_SESSION['error']); ?>
                        <?php } ?>
                        <form action="" method="POST">
                            <input type="hidden" name="username" value="<?= $_SESSION["username"]; ?>">
                            <div class="form-group">
                                <label for="password_lama">Masukkan Password Lama</label>
                                <input type="password" autocomplete="off" class="form-control" id="password_lama" name="password_lama" placeholder="Masukkan Password Lama">
                            </div>
                            <div class="form-group">
                                <label for="password_baru">Masukkan Password Baru</label>
                                <input type="password" autocomplete="off" class="form-control" id="password_baru" name="password_baru" placeholder="Masukkan Password Baru">
                            </div>
                            <div class="form-group">
                                <label for="konfirmasi_password">Konfirmasi Password</label>
                                <input type="password" autocomplete="off" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="ubah">Ubah Password!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require 'layouts/footer.php'; ?>