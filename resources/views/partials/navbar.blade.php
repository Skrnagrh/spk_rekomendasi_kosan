<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <a class="navbar-brand ps-3" href="/dashboard">
        <img src="/beranda/assets/img/house.png" width=20px />
        <span class="text-dark font-weight-bold">Rekomendasi Kosan</span>
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link text-capitalize" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">{{
                auth()->user()->name }}
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/"><i class="fas fa-house"></i> Home</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="/userprofile"><i class="fas fa-user"></i> Profile</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <form id="logoutForm" action="/logout" method="post">
                        @csrf
                        <button type="button" class="dropdown-item px-3 bg-light border-0 text-dark"
                            data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fas fa-person-walking-dashed-line-arrow-right"></i> Keluar
                        </button>
                    </form>


                </li>
            </ul>
        </li>
    </ul>
</nav>
