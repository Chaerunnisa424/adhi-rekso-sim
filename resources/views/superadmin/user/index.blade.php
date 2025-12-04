<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adhi Rekso - Superadmin</title>

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
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/superadmin/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MASTER DATA
            </div>

            <!-- Nav Item - Kategori -->
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/superadmin/kategoriproduk') }}">
                    <i class="fas fa-tags"></i>
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
            <li class="nav-item active">
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
                        <a class="collapse-item" href="{{ url('/superadmin/pembelian/catatpembelian') }}">Catat Transaksi</a>
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                    aria-expanded="true" aria-controls="collapseLaporan">
                    <i class="fas fa-file-alt"></i>
                    <span>Laporan Transaksi</span>
                </a>
                   <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" href="{{ url('/superadmin/laporan/LaporanPembelian') }}">Laporan Pembelian</a>
                        <a class="collapse-item" href="{{ url('/superadmin/laporan/LaporanPenjualan') }}">Laporan Penjualan</a>
                        <a class="collapse-item" href="{{ url('/superadmin/laporan/LaporanPengeluaran') }}">Laporan Pengeluaran</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Laporan Laba & Rugi -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/superadmin/laporan-labarugi') }}">
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
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border small" placeholder="Cari..."
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

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <span class="badge badge-danger badge-counter">3+</span>
                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">Alerts Center</h6>
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
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->


<!-- ===================================================================================================================================================== -->


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>

        <button class="btn btn-primary btn-sm shadow-sm" data-toggle="modal" data-target="#tambahUserModal">
            <i class="fas fa-plus mr-1"></i> Tambah User
        </button>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-left" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th style="width: 18%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $i => $item)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->role }}</td>

                            <td>

                                <!-- Edit -->
                                <button class="btn btn-warning btn-sm text-white"
                                        data-toggle="modal"
                                        data-target="#editUser{{ $item->id_user }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Delete -->
                                <button class="btn btn-danger btn-sm" onclick="hapusUser({{ $item->id_user }})">
                                    <i class="fas fa-trash"></i>
                                </button>

                                <!-- Hidden Form Delete -->
                                <form id="hapus-{{ $item->id_user }}"
                                      action="{{ route('superadmin.user.destroy', $item->id_user) }}"
                                      method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editUser{{ $item->id_user }}" tabindex="-1">
                            <div class="modal-dialog">
                                <form action="{{ route('superadmin.user.update', $item->id_user) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5>Edit User</h5>
                                            <button class="close" data-dismiss="modal">×</button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap"
                                                       value="{{ $item->nama_lengkap }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username"
                                                       value="{{ $item->username }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Password (kosongkan jika tidak diubah)</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>

                                            <div class="form-group">
                                                <label>Role</label>
                                                <select class="form-control" name="role" required>
                                                    <option value="Super Admin"
                                                        {{ $item->role == 'Super Admin' ? 'selected' : '' }}>
                                                        Super Admin
                                                    </option>
                                                    <option value="Admin"
                                                        {{ $item->role == 'Admin' ? 'selected' : '' }}>
                                                        Admin
                                                    </option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-save mr-2"></i> Simpan
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahUserModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('superadmin.user.store') }}" method="POST">
                @csrf

                <div class="modal-content">

                    <div class="modal-header">
                        <h5>Tambah User</h5>
                        <button class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" required>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role" required>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i> Simpan
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>

<!-- ===================================================================================================================================================== -->


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
   <script>
$(document).ready(function(){
    $('.editBtn').click(function(){
        var id = $(this).data('id');
        var nama = $(this).data('nama');

        // Set value input modal
        $('#edit_nama_kategori').val(nama);

        // Set action form ke route update dengan ID kategori
        $('#editForm').attr('action', '/superadmin/kategoriproduk/update/' + id);

        // Tampilkan modal
        $('#editKategoriModal').modal('show');
    });
});
</script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function hapusUser(id) {
    Swal.fire({
        title: 'Hapus User?',
        text: 'Data yang dihapus tidak bisa dikembalikan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Batal',
        reverseButtons: false, // tombol OK di kiri
        customClass: {
            confirmButton: 'btn btn-primary mx-2 swal-btn',
            cancelButton: 'btn btn-primary mx-2 swal-btn'
        },
        buttonsStyling: false
    }).then((result) => {

        if (result.isConfirmed) {

            Swal.fire({
                title: 'Terhapus!',
                text: 'User berhasil dihapus.',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary swal-btn'
                },
                buttonsStyling: false
            }).then(() => {
                document.getElementById('hapus-' + id).submit();
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {

            Swal.fire({
                title: 'Dibatalkan',
                text: 'Penghapusan user dibatalkan.',
                icon: 'info',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary swal-btn'
                },
                buttonsStyling: false
            });

        }

    });
}
</script>

</body>
</html>

