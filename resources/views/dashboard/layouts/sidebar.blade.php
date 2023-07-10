<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/cars*') ? 'active' : '' }}" aria-current="page" href="/dashboard/cars">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Data Mobil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/loans*') ? 'active' : '' }}" aria-current="page" href="/dashboard/loans">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Peminjaman
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/returns*') ? 'active' : '' }}" aria-current="page" href="/dashboard/returns">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Pengembalian
                </a>
            </li>


        </ul>

        {{-- @can(['must-admin'])
            
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
            <span>Administrator</span>
        </h6> --}}

        {{-- @endcan --}}

    </div>
</nav>
