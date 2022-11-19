<?php
session_start();
$title = "Tentang - Naive Bayes (NB)";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tentang Sistem</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tentang Sistem</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-dark">
                        <h3 class="widget-user-username">Sistem Pendukung Keputusan</h3>
                        <h5 class="widget-user-desc mt-2">Naive Bayes (NB)</h5>
                    </div>
                    <div class="widget-user-image mt-2">
                        <img class="img-circle elevation-2" src="assets/img/logo.png" alt="InstaCode Logo">
                    </div>
                    <div class="card-footer">
                        <div class="row mt-4">
                        <div class="col-4 border-right">
                            <div class="description-block">
                                <span class="description-text">Ulul Asmi</span>
                            <h5 class="description-header">Pengguna Sistem</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-4 border-right">
                            <div class="description-block">
                                <span class="description-text">Wirdayanti,S.T.,M.Eng..</span>
                            <h5 class="description-header">Dosen Pembimbing</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="description-block">
                                <span class="description-text">Audy Ruslan</span>
                            <h5 class="description-header">Software Engineer</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        </div>

                        <div class="row text-center mt-5">

                        <p>Sistem ini dapat membantu dalam menyeleksi dan memberikan pendukung terhadap suatu keputusan yang akan diambil, sistem ini juga bertujuan untuk menyediakan informasi, membimbing, memberikan prediksi serta mengarahkan kepada pengguna informasi agar dapat melakukan pengambilan keputusan dengan lebih baik.</p>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
require 'layouts/footer.php';
?>