<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $model['title'] ?? 'Dashboard' ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://proyek-1.test/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="http://proyek-1.test/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="http://proyek-1.test/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="http://proyek-1.test/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://proyek-1.test/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="http://proyek-1.test/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="http://proyek-1.test/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="http://proyek-1.test/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="http://proyek-1.test/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #009427;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="nav-icon fas fa-door-open"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #009427">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="http://proyek-1.test/dist/img/Logo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">UKM ESSENSIAL</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="http://proyek-1.test/dist/img/User_logo.png" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/Profile" class="d-block"><?= $model['user']['name'] ?? 'ini d404' ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="/Laporan" class="nav-link active">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/rekaplaporan" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Rekap Laporan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Akumulasi laporan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="col mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Buat Laporan</h1>
                        </div>
                        <br>
                        <br>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Laporan</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="post" action="/Laporan">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Laporan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_laporan" placeholder="nama laporan" name="nama_laporan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">NOMOR KK</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="nama_laporan" placeholder="no kk" name="no_kk">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Rumah</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="nama_laporan" placeholder="jumlah rumah" name="jumlah_rumah">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Anggota keluarga</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="nama_laporan" placeholder="jumlah anggota keluarga" name="jumlah_anggota_keluarga">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Langit Langit:</label>
                                        <div class="col-sm-10">
                                            <label for="langit langit">tidak ada</label>
                                            <input type="radio" class="form-control" id="Langit langit" name="langit_langit" value="0">
                                            <label for="langit langit">Ada Kotor</label>
                                            <input type="radio" class="form-control" id="Langit langit" name="langit_langit" value="1">
                                            <label for="langit langit">Ada Bersih</label>
                                            <input type="radio" class="form-control" id="Langit langit" name="langit_langit" value="2">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Dinding:</label>
                                        <div class="col-sm-10">
                                            <label for="Dinding">Bukan tembok</label>
                                            <input type="radio" class="form-control" id="Dinding" name="dinding" value="0">
                                            <label for="langit langit">Semi Permanen</label>
                                            <input type="radio" class="form-control" id="Dinding" name="dinding" value="1">
                                            <label for="langit langit">Permanen</label>
                                            <input type="radio" class="form-control" id="Dinding" name="dinding" value="2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Lantai:</label>
                                        <div class="col-sm-10">
                                            <label for="">Tanah</label>
                                            <input type="radio" class="form-control" id="Dinding" name="lantai" value="0">
                                            <label for="langit langit">Papan</label>
                                            <input type="radio" class="form-control" id="Dinding" name="lantai" value="1">
                                            <label for="langit langit">Keramik</label>
                                            <input type="radio" class="form-control" id="Dinding" name="lantai" value="2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Jendela kamar tidur:</label>
                                        <div class="col-sm-10">
                                            <label for="">Tidak ada</label>
                                            <input type="radio" class="form-control" id="Dinding" name="jendela_kamar_tidur" value="0">
                                            <label for="langit langit">Ada</label>
                                            <input type="radio" class="form-control" id="Dinding" name="jendela_kamar_tidur" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Jendela ruang keluarga:</label>
                                        <div class="col-sm-10">
                                            <label for="">Tidak ada</label>
                                            <input type="radio" class="form-control" id="Dinding" name="jendela_ruang_keluarga" value="0">
                                            <label for="langit langit">Ada</label>
                                            <input type="radio" class="form-control" id="Dinding" name="jendela_ruang_keluarga" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Ventilasi:</label>
                                        <div class="col-sm-10">
                                            <label for="">Tidak ada</label>
                                            <input type="radio" class="form-control" id="Dinding" name="ventilasi" value="0">
                                            <label for="langit langit">Ada luas < 10% </label>
                                            <input type="radio" class="form-control" id="Dinding" name="ventilasi" value="1">
                                            <label for="langit langit">Ada luas > 10%</label>
                                            <input type="radio" class="form-control" id="Dinding" name="ventilasi" value="2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Lubang asap dapur:</label>
                                        <div class="col-sm-10">
                                            <label for="">Tidak ada</label>
                                            <input type="radio" class="form-control" id="Dinding" name="lubang_asap_dapur" value="0">
                                            <label for="langit langit">Ada luas < 10% </label>
                                            <input type="radio" class="form-control" id="Dinding" name="lubang_asap_dapur" value="1">
                                            <label for="langit langit">Ada luas > 10%</label>
                                            <input type="radio" class="form-control" id="Dinding" name="lubang_asap_dapur" value="2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Pencahayaan</label>
                                        <div class="col-sm-10">
                                            <label for="">Tidak terang</label>
                                            <input type="radio" class="form-control" id="Dinding" name="pencahayaan" value="0">
                                            <label for="langit langit">Kurang terang</label>
                                            <input type="radio" class="form-control" id="Dinding" name="pencahayaan" value="1">
                                            <label for="langit langit">terang tidak silau </label>
                                            <input type="radio" class="form-control" id="Dinding" name="pencahayaan" value="2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Sarana Air Minum (SG/SGP/SBPT/SBJ/L/TA/PAH/MA) </label>
                                        <div class="col-sm-10">
                                            <label for="">Tidak Ada </label>
                                            <input type="radio" class="form-control" id="Dinding" name="sarana_air_minum" value="0">
                                            <label for="langit langit">Ada, bukan milik sendiri,TMS</label>
                                            <input type="radio" class="form-control" id="Dinding" name="sarana_air_minum" value="1">
                                            <label for="langit langit">Ada ,milik sendiri,TMS </label>
                                            <input type="radio" class="form-control" id="Dinding" name="sarana_air_minum" value="2">
                                            <label for="langit langit">Ada,bkn milik sendiri,MS </label>
                                            <input type="radio" class="form-control" id="Dinding" name="sarana_air_minum" value="3">
                                            <label for="langit langit">Ada, milik sendiri,MS</label>
                                            <input type="radio" class="form-control" id="Dinding" name="sarana_air_minum" value="4">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Jamban (LA/P/C/MCK) </label>
                                        <div class="col-sm-10">
                                            <label for="">Tidak Ada </label>
                                            <input type="radio" class="form-control" id="Dinding" name="jamban" value="0">
                                            <label for="langit langit">Ada,bkn Leher angsa,tdk ditutup,disalurkan ke sungai/kolam (TMS)</label>
                                            <input type="radio" class="form-control" id="Dinding" name="jamban" value="1">
                                            <label for="langit langit">Ada,bkn Leher angsa,ada tutup,disalurkan ke sungai/kolam (TMS) </label>
                                            <input type="radio" class="form-control" id="Dinding" name="jamban" value="2">
                                            <label for="langit langit">Ada,bkn Leher angsa,ada tutup,septic tank/kolaem (TMS) </label>
                                            <input type="radio" class="form-control" id="Dinding" name="jamban" value="3">
                                            <label for="langit langit">Ada,leher angsa,septic tank (MS)</label>
                                            <input type="radio" class="form-control" id="Dinding" name="jamban" value="4">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">SPAL </label>
                                        <div class="col-sm-10">
                                            <label for="">Tidak Ada </label>
                                            <input type="radio" class="form-control" id="Dinding" name="spal" value="0">
                                            <label for="langit langit">Ada, diresapkan tetapi mencemari sumber air (< 10 m dr sbr air)</label>
                                            <input type="radio" class="form-control" id="Dinding" name="spal" value="1">
                                            <label for="langit langit">Ada,bkn Leher angsa,ada tutup,disalurkan ke sungai/kolam (TMS) </label>
                                            <input type="radio" class="form-control" id="Dinding" name="spal" value="2">
                                            <label for="langit langit">Ada,bkn Leher angsa,ada tutup,septic tank/kolaem (TMS) </label>
                                            <input type="radio" class="form-control" id="Dinding" name="spal" value="3">
                                            <label for="langit langit">Ada,leher angsa,septic tank (MS)</label>
                                            <input type="radio" class="form-control" id="Dinding" name="spal" value="4">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">TPS: </label>
                                        <div class="col-sm-10">
                                            <label for="">Tidak Ada </label>
                                            <input type="radio" class="form-control" id="Dinding" name="tps" value="0">
                                            <label for="langit langit">Ada,tdk kedap Air, tdk tertutup</label>
                                            <input type="radio" class="form-control" id="Dinding" name="tps" value="1">
                                            <label for="langit langit">Ada, kedap Air, tdk tertutup</label>
                                            <input type="radio" class="form-control" id="Dinding" name="tps" value="2">
                                            <label for="langit langit">Ada, kedap Air,  tertutup</label>
                                            <input type="radio" class="form-control" id="Dinding" name="tps" value="3">
                                        
                                        </div>
                                    </div>

                                    
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info float-right">Submit</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid"></div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="http://proyek-1.test/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="http://proyek-1.test/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="http://proyek-1.test/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="http://proyek-1.test/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="http://proyek-1.test/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="http://proyek-1.test/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="http://proyek-1.test/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="http://proyek-1.test/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="http://proyek-1.test/vplugins/moment/moment.min.js"></script>
    <script src="http://proyek-1.test/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="http://proyek-1.test/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="http://proyek-1.test/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="http://proyek-1.test/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://proyek-1.test/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="http://proyek-1.test/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="http://proyek-1.test/dist/js/pages/dashboard.js"></script>
</body>

</html>