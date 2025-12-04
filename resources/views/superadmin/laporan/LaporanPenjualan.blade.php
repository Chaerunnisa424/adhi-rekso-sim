<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adhi Rekso - Dashboard Superadmin</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- di dalam <head> -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                <div class="sidebar-brand-text mx-3">Adhi Rekso</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MASTER DATA
            </div>

            <!-- Nav Item - Kategori Produk -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/superadmin/kategoriproduk') }}">
                    <i class="fas fa-tags mr-2"></i>  <!-- Tambahkan margin kanan biar icon agak renggang -->
                    <span>Kategori Produk</span>
                </a>
            </li>


            <!-- Nav Item - Data Produk -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/superadmin/produk') }}">
                    <i class="fas fa-box-open"></i>
                    <span>Data Produk</span>
                </a>
            </li>

            <!-- Nav Item - Data Supplier -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/superadmin/supplier') }}">
                    <i class="fas fa-truck-loading"></i>
                    <span>Data Supplier</span>
                </a>
            </li>

            <!-- Nav Item - Data User -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/superadmin/user') }}">
                    <i class="fas fa-users"></i>
                    <span>Data User</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                TRANSAKSI
            </div>

            <!-- Nav Item - Pembelian -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePembelian"
                    aria-expanded="true" aria-controls="collapsePembelian">
                    <i class="fas fa-shopping-basket"></i>
                    <span>Pembelian</span>
                </a>
                <div id="collapsePembelian" class="collapse" aria-labelledby="headingPembelian" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Pembelian:</h6>
                        <a class="collapse-item" href="{{ url('/superadmin/pembelian/create') }}">Catat Transaksi</a>
                        <a class="collapse-item" href="{{ url('/superadmin/pembelian') }}">Daftar Transaksi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Penjualan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePenjualan"
                    aria-expanded="true" aria-controls="collapsePenjualan">
                    <i class="fas fa-cash-register"></i>
                    <span>Penjualan</span>
                </a>
                <div id="collapsePenjualan" class="collapse" aria-labelledby="headingPenjualan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Penjualan:</h6>
                        <a class="collapse-item" href="{{ url('/superadmin/penjualan/create') }}">Catat Transaksi</a>
                        <a class="collapse-item" href="{{ url('/superadmin/penjualan') }}">Daftar Transaksi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pengeluaran -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/superadmin/pengeluaran') }}">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Pengeluaran</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                LAPORAN
            </div>

            <!-- Nav Item - Laporan Transaksi -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                    aria-expanded="true" aria-controls="collapseLaporan">
                    <i class="fas fa-file-alt"></i>
                    <span>Laporan Transaksi</span>
                </a>
                <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item " href="{{ url('/superadmin/laporan/LaporanPembelian') }}">Laporan Pembelian</a>
                        <a class="collapse-item active" href="{{ url('/superadmin/laporan/LaporanPenjualan') }}">Laporan Penjualan</a>
                        <a class="collapse-item" href="{{ url('/superadmin/laporan/LaporanPengeluaran') }}">Laporan Pengeluaran</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Laporan Laba & Rugi -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/superadmin/laporan/laporan-labarugi') }}">
                    <i class="fas fa-chart-line"></i>
                    <span>Laporan Laba & Rugi</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                ANALISIS
            </div>

            <!-- Nav Item - Keuntungan Produk -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/superadmin/analisis-keuntungan') }}">
                    <i class="fas fa-balance-scale"></i>
                    <span>Keuntungan Produk</span>
                </a>
            </li>

            <!-- Nav Item - Prediksi Permintaan Produk -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/superadmin/analisis-permintaan') }}">
                    <i class="fas fa-chart-bar"></i>
                    <span>Prediksi Permintaan Produk</span>
                </a>
            </li>

            {{-- <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li> --}}

            <!-- Sidebar Toggler (Sidebar) -->
            {{-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> --}}


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Super Admin</span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
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

<!-- ==================================================================================================================================================  -->
<!-- ==================================================================================================================================================  -->


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading + Dropdown Export -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Laporan Penjualan</h1>

        <div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-file-export mr-1"></i> Export
            </button>
            <div class="dropdown-menu dropdown-menu-right shadow">
                <a class="dropdown-item" href="#"><i class="fas fa-file-pdf mr-2 text-danger"></i>Export PDF</a>
                <a class="dropdown-item" href="#"><i class="fas fa-file-excel mr-2 text-success"></i>Export Excel</a>
            </div>
        </div>
    </div>

    <!-- FILTER LAPORAN -->
    <div class="card shadow mb-4 card-header-transaksi">
        <div class="card-body">
            <h5 class="font-weight-bold mb-3 text-primary">
                <i class="fas fa-filter mr-1"></i> Filter Laporan
            </h5>

            <form id="filterLaporanForm">
                <div class="form-row">

                    <!-- Periode -->
                    <div class="form-group col-md-4">
                        <label for="periode">Periode</label>
                        <input type="month" class="form-control" id="periode">
                    </div>

                    <!-- Jenis Transaksi -->
                    <div class="form-group col-md-4">
                        <label for="jenis_transaksi">Jenis Transaksi</label>
                        <select class="form-control" id="jenis_transaksi">
                            <option value="">Semua</option>
                            <option>Penjualan Barang</option>
                            <option>Retur Penjualan</option>
                        </select>
                    </div>

                    <!-- Tombol Filter -->
                    <div class="form-group col-md-4 d-flex align-items-end">
                        <button class="btn btn-primary btn-block">
                            <i class="fas fa-search mr-1"></i> Terapkan Filter
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>


    <!-- 4 Cards -->
    <div class="row">

        <!-- Total Penjualan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penjualan</div>
                        <div class="h5 font-weight-bold text-gray-800">Rp 245,500,000</div>
                    </div>

                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center"
                         style="width:45px; height:45px;">
                        <i class="fas fa-cash-register text-white"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- Total Transaksi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Transaksi</div>
                        <div class="h5 font-weight-bold text-gray-800">182 Transaksi</div>
                    </div>

                    <div class="rounded-circle bg-success d-flex align-items-center justify-content-center"
                         style="width:45px; height:45px;">
                        <i class="fas fa-file-invoice-dollar text-white"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- Total Item Terjual -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Item Terjual</div>
                        <div class="h5 font-weight-bold text-gray-800">4,750 Item</div>
                    </div>

                    <div class="rounded-circle bg-info d-flex align-items-center justify-content-center"
                        style="width:45px; height:45px;">
                        <i class="fas fa-boxes text-white"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- Rata-rata Penjualan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Rata-rata Penjualan</div>
                        <div class="h5 font-weight-bold text-gray-800">Rp 1,350,000</div>
                    </div>

                    <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center"
                         style="width:45px; height:45px;">
                        <i class="fas fa-chart-line text-white"></i>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Grafik Row -->
    <div class="row d-flex align-items-stretch mb-4">

        <!-- Tren Penjualan Bulanan -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow card-line-chart">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="font-weight-bold text-primary m-0">Tren Penjualan Bulanan (2025)</h6>
                </div>
                <div class="card-body">
                    <canvas id="chartPenjualan"></canvas>
                </div>
            </div>
        </div>

        <!-- Proporsi Penjualan per Kategori -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow h-80">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="font-weight-bold text-primary m-0">Proporsi Penjualan per Kategori</h6>
                </div>

                <div class="card-body">
                    <canvas id="chartKategori"></canvas>
                </div>
            </div>
        </div>

    </div>


    <!-- Tabel Riwayat Penjualan -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="font-weight-bold text-primary m-0">Riwayat Penjualan</h6>

            <div class="d-flex align-items-center">
                <span class="mr-2 text-gray-600">Show</span>
                <select class="custom-select custom-select-sm w-auto" id="showEntries">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="ml-2 text-gray-600">entries</span>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode Transaksi</th>
                        <th>Jumlah Item</th>
                        <th>Total Bayar (Rp)</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>12/01/2025</td>
                        <td>JL-00123</td>
                        <td>12</td>
                        <td>3,500,000</td>
                        <td>Admin1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>13/01/2025</td>
                        <td>JL-00124</td>
                        <td>8</td>
                        <td>2,150,000</td>
                        <td>Admin2</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>14/01/2025</td>
                        <td>JL-00125</td>
                        <td>15</td>
                        <td>4,250,000</td>
                        <td>Admin1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- End Page Content -->




<!-- ==================================================================================================================================================  -->
<!-- ==================================================================================================================================================  -->


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Adhi Rekso 2026</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Keluar dari Aplikasi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    Pilih "Logout" di bawah ini jika Anda yakin ingin mengakhiri sesi saat ini.
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary equal-btn" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary equal-btn" href="login.html">Logout</a>
                </div>

            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    <!-- Tambahan: pastikan jQuery & Bootstrap collapse aktif -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Aktifkan semua dropdown collapse jika belum
            $('.collapse').collapse({
                toggle: false
            });

            // Tambahan: pastikan klik sidebar bekerja
            $('[data-toggle="collapse"]').on('click', function (e) {
                e.preventDefault();
                var target = $(this).attr('data-target');
                $(target).collapse('toggle');
            });
        });
    </script>
    <!-- Chart.js harus di atas -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>

    <!-- Baru panggil file grafik -->
    <script src="{{ asset('js/superadmin/laporan_penjualan.js') }}"></script>


</body>
</html>

