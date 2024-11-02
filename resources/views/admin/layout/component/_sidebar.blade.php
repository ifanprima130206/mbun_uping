<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <div class="sidenav-menu-heading">Dasbor</div>
                <a class="nav-link" href="{{ route('dashboard.overview') }}">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Ikhtisar
                </a>

                @if (Auth::user()->role == '0')
                    <div class="sidenav-menu-heading">Manajemen</div>
                    <a class="nav-link" href="charts.html">
                        <div class="nav-link-icon"><i data-feather="corner-down-left"></i></div>
                        Pemasukan
                    </a>
                    <a class="nav-link" href="charts.html">
                        <div class="nav-link-icon"><i data-feather="corner-down-right"></i></div>
                        Pengeluaran
                    </a>

                    <div class="sidenav-menu-heading">Master</div>
                    <a class="nav-link" href="{{ route('dashboard.users.index') }}">
                        <div class="nav-link-icon"><i data-feather="users"></i></div>
                        User
                    </a>
                    <a class="nav-link" href="{{ route('dashboard.products.index') }}">
                        <div class="nav-link-icon"><i data-feather="package"></i></div>
                        Produk
                    </a>
                    <a class="nav-link" href="charts.html">
                        <div class="nav-link-icon"><i data-feather="layers"></i></div>
                        Harga Bahan
                    </a>
                    <a class="nav-link" href="charts.html">
                        <div class="nav-link-icon"><i data-feather="book"></i></div>
                        Resep
                    </a>
                @endif

                <div class="sidenav-menu-heading">Proses</div>
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="shopping-cart"></i></div>
                    Pesanan
                </a>
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="clock"></i></div>
                    Proses
                </a>
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="check-square"></i></div>
                    Selesai
                </a>
            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>
            </div>
        </div>
    </nav>
</div>
