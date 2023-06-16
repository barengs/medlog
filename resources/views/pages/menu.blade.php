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
            <li class="{{ Request::is('/') ? 'active' : '' }}">
                <a href="/" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('checkup/*', 'pasien/*', 'periksa/*') ? 'open active' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-desktop"></i>
                    <span>Pemeriksaan</span>
                </a>
                <ul class="sub-menu {{ Request::is('checkup/*', 'pasien/*', 'periksa/*') ? 'expand' : '' }}">
                    <li class="{{ Request::is('checkup/*') ? 'active' : '' }}"><a href="/checkup/semua"
                            class="link"><span>Antrian</span></a></li>
                    <li class="{{ Request::is('periksa/*') ? 'active' : '' }}"><a href="{{ route('periksa.semua') }}"
                            class="link"><span>Pemeriksaan</span></a></li>
                    <li class="{{ Request::is('pasien/*') ? 'active' : '' }}"><a href="/pasien/semua"
                            class="link"><span>Pasien</span></a></li>
                </ul>
            </li>
            <li class="{{ Request::is('obat/*', 'kategori-obat/*') ? 'open active' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-book"></i>
                    <span>Obat</span>
                </a>
                <ul class="sub-menu {{ Request::is('obat/*', 'kategori-obat/*') ? 'expand' : '' }}">
                    <li class="{{ Request::is('obat/*') ? 'active' : '' }}"><a href="/obat/semua"
                            class="link"><span>Daftar Obat</span></a></li>
                    <li class="{{ Request::is('kategori-obat/*') ? 'active' : '' }}"><a href="/kategori-obat/semua"
                            class="link"><span>Kategori Obat</span></a></li>
                </ul>
            </li>
            <li class="{{ Request::is('karyawan/*', 'jabatan/*', 'role/*', 'permission/*') ? 'open active' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-user"></i>
                    <span>Pengguna</span>
                </a>
                <ul
                    class="sub-menu {{ Request::is('karyawan/*', 'jabatan/*', 'role/*', 'permission/*') ? 'expand' : '' }}">
                    <li class="{{ Request::is('karyawan/*') ? 'active' : '' }}"><a href="/karyawan/semua"
                            class="link"><span>Karyawan</span></a></li>
                    <li class="{{ Request::is('jabatan/*') ? 'active' : '' }}"><a href="/jabatan/semua"
                            class="link"><span>Jabatan</span></a></li>
                    <li class="{{ Request::is('role/*') ? 'active' : '' }}"><a href="/role/semua"
                            class="link"><span>Peran</span></a></li>
                    <li class="{{ Request::is('permission/*') ? 'active' : '' }}"><a href="/permission/semua"
                            class="link"><span>Izin</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-settings"></i>
                    <span>Pengaturan</span>
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
