<nav class="main-sidebar ps-menu">
    <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div>
    <div class="sidebar-header">
        <div class="text">KliKlinik</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="active">
                <a href="/" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-desktop"></i>
                    <span>Pemeriksaan</span>
                </a>
                <ul class="sub-menu ">
                    <li><a href="/checkup/tambah" class="link"><span>Periksa Pasien</span></a></li>
                    <li><a href="/pasien/semua" class="link"><span>Riwayat Medis</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-book"></i>
                    <span>Obat</span>
                </a>
                <ul class="sub-menu ">
                    <li><a href="/obat/semua" class="link">
                            <span>Daftr Obat</span></a>
                    </li>
                    <li><a href="/kategori-obat/semua" class="link">
                            <span>Kategori Obat</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-user"></i>
                    <span>Pengguna</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="/pengguna/semua" class="link"><span>Karyawan</span></a></li>
                    <li><a href="/jabatan/semua" class="link"><span>Jabatan</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-settings"></i>
                    <span>Setting</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="auth-login.html" class="link"><span>Login</span></a></li>
                    <li><a href="auth-register.html" class="link"><span>Register</span></a></li>
                </ul>
            </li>
            {{-- <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-write"></i>
                    <span>Tables</span>
                </a>
                <ul class="sub-menu ">
                    <li><a href="table-basic.html" class="link"><span>Table Basic</span></a></li>
                    <li><a href="table-datatables.html" class="link"><span>DataTables</span></a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</nav> 