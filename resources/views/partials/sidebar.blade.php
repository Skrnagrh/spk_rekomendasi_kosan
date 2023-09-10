<style>
    a{
        margin-top: -10px
    }
</style>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark bg-drak" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading text-light">Core</div>
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-gauge"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading text-muted" style="margin-top: -15px">Interface</div>
                <a class="nav-link {{ Request::is('dashboard/alternatif*') ? 'active' : '' }}" href="/dashboard/alternatif">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Alternatif
                </a>
                <a class="nav-link {{ Request::is('dashboard/kriteria*') ? 'active' : '' }}" href="/dashboard/kriteria">
                    <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                    Kriteria
                </a>
                <a class="nav-link {{ Request::is('dashboard/subkriteria*') ? 'active' : '' }}" href="/dashboard/subkriteria">
                    <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                    Subkriteria
                </a>
                <a class="nav-link {{ Request::is('dashboard/nilai-bobot*') ? 'active' : '' }}" href="/dashboard/nilai-bobot">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Nilai Bobot
                </a>

                <div class="sb-sidenav-menu-heading text-muted" style="margin-top: -15px">Proses</div>
                <a class="nav-link {{ Request::is('dashboard/perhitungan') ? 'active' : '' }}" href="/dashboard/perhitungan">
                    <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                    Perhitungan
                </a>
                <a class="nav-link {{ Request::is('dashboard/hasil') ? 'active' : '' }}" href="/dashboard/hasil">
                    <div class="sb-nav-link-icon"><i class="fas fa-award"></i></div>
                    Hasil Rangking
                </a>

                @if (Auth::user()->role == 'admin')
                <div class="sb-sidenav-menu-heading text-muted" style="margin-top: -15px">Data Petugas</div>
                <a class="nav-link {{ Request::is('datapengguna*') ? 'active' : '' }}" href="/datapengguna">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Data Petugas
                </a>
                @endif
            </div>
        </div>
    </nav>
</div>
