<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
    <div class="navbar-wrapper ">
        <div class="navbar-brand header-logo">
            {{-- <a href="index.html" class="b-brand">
                <img src="../assets/images/logo.svg" alt="" class="logo images">
                <img src="../assets/images/logo-icon.svg" alt="" class="logo-thumb images">
            </a> --}}
            <a href="" class="text-white">Klinik dr. Eddy</a>
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu</label>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Beranda</span></a>
                </li>
                @if (session('user_roles') == 'Petugas')
                <li class="nav-item">
                    <a href="/patients/registration" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user-plus"></i></span><span class="pcoded-mtext">Pendaftaran</span></a>
                </li>
                @elseif(session('user_roles') == 'Dokter')
                <li class="nav-item">
                    <a href="/records" class="nav-link"><span class="pcoded-micon"><i class="feather icon-save"></i></span><span class="pcoded-mtext">Rekam Medis</span></a>
                </li>
                @elseif(session('user_roles') == 'Kasir')
                <li class="nav-item">
                    <a href="/payments" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Pembayaran</span></a>
                </li>
                @elseif(session('user_roles') == 'Admin')
                <li class="nav-item">
                    <a href="/patients/registration" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user-plus"></i></span><span class="pcoded-mtext">Pendaftaran</span></a>
                </li>
                <li class="nav-item">
                    <a href="/payments" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Pembayaran</span></a>
                </li>
                <li class="nav-item">
                    <a href="/medicines" class="nav-link"><span class="pcoded-micon"><i class="feather icon-plus-square"></i></span><span class="pcoded-mtext">Data Obat</span></a>
                </li>
                <li class="nav-item">
                    <a href="/users" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Data Pengguna</span></a>
                </li>
                @endif
                
        </div>
    </div>
</nav>