<?php
session_start();
include '../config/koneksi.php';
include '../config/rupiah.php';
include '../scripts.php';
setlocale(LC_TIME, 'id_ID.utf8');
if (@$_SESSION['Karyawan']) {
?>
    <?php
    if (@$_SESSION['Karyawan']) {
        $sesi = @$_SESSION['Karyawan'];
    }
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$sesi'") or die(mysqli_error($koneksi));
    $data = mysqli_fetch_array($sql);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Halaman Karyawan</title>
        <!-- Custom fonts for this template -->
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <?= $data['nama_karyawan']; ?>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Beranda</span></a>
                </li>


                <!-- Nav Item - Pages Collapse Menu -->


                <li class="nav-item">
                    <a class="nav-link" href="?page=absen">
                        <i class="fas fa-address-book"></i>
                        <span>Data Absensi</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=gaji">
                        <i class="fas fa-money-check"></i>
                        <span>Data Penggajian</span></a>
                </li>




                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <form class="form-inline">
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?= $data['nama_karyawan']; ?>
                                    </span>
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="?page=profil">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <?php
                        error_reporting();
                        $page = @$_GET['page'];
                        $act = @$_GET['act'];

                        if ($page == 'karyawan') {
                            if ($act == '') {
                                include 'modul/karyawan/data_karyawan.php';
                            } elseif ($act == 'add') {
                                include 'modul/karyawan/add_karyawan.php';
                            } elseif ($act == 'edit') {
                                include 'modul/karyawan/edit_karyawan.php';
                            } elseif ($act == 'detail') {
                                include 'modul/karyawan/detail_karyawan.php';
                            } elseif ($act == 'del') {
                                include 'modul/karyawan/del_karyawan.php';
                            }
                        } elseif ($page == 'gaji') {
                            if ($act == '') {
                                include 'modul/gaji/data_gaji.php';
                            } elseif ($act == 'add') {
                                include 'modul/gaji/add_gaji.php';
                            } elseif ($act == 'edit') {
                                include 'modul/gaji/edit_gaji.php';
                            } elseif ($act == 'del') {
                                include 'modul/gaji/del_gaji.php';
                            } elseif ($act == 'detail') {
                                include 'modul/gaji/detail_gaji.php';
                            } elseif ($act == 'hitung') {
                                include 'modul/gaji/hitung_gaji.php';
                            }
                        } elseif ($page == 'absen') {
                            if ($act == '') {
                                include 'modul/absen/data_absen.php';
                            } elseif ($act == 'add') {
                                include 'modul/absen/add_absen.php';
                            } elseif ($act == 'edit') {
                                include 'modul/absen/edit_absen.php';
                            }
                        } elseif ($page == 'profil') {
                            if ($act == '') {
                                include 'modul/profil/data_profil.php';
                            }
                        } elseif ($page == '') {
                            include 'home.php';
                        } else {
                            echo "<b>4014!</b> Tidak ada halaman !";
                        }

                        ?>
                    </div>

                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Silahkan pilih logout untuk keluar</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/js/jquery.min.js"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../assets/js/sb-admin-2.min.js"></script>

        <script src="../assets/js/demo/chart-bar-demo.js"></script>

        <!-- Page level plugins -->
        <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../assets/js/demo/datatables-demo.js"></script>


    <?php } else {

    include 'modul/500.html';
}

    ?>

    </body>

    </html>