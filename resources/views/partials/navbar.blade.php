<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
        aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form class="nav-link px-3" action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Sign out</button>
            </form>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item ">
                        <a class="nav-link {{ $judul === 'Dashboard' ? 'active' : '' }}" aria-current="page"
                            href="/">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    {{-- <li class="nav-item ">
                        <a class="nav-link {{ $judul === 'Product' ? 'active' : '' }}" href="/product">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Products
                        </a>
                    </li> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $judul === 'Product' ? 'active' : '' }}" href="/product">
                            <span data-feather="package" class="align-text-bottom"></span>
                            Product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#dashboard-collapse" aria-expanded="false">
                            <span data-feather="dollar-sign" class="align-text-bottom"></span>
                            Transaksi
                        </a>
                        <div class="collapse " id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-medium small baru">
                                <li><a href=""
                                        class="link-dark d-inline-flex text-decoration-none rounded "><span
                                            data-feather="tag" class="mx-1 align-content-center"></span>Penjualan</a>
                                </li>
                                <li><a href=""
                                        class="link-dark d-inline-flex text-decoration-none rounded "><span
                                            data-feather="layers"
                                            class="mx-1 align-content-center"></span>Pengeluaran</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#dashboard-collapse-" aria-expanded="false">
                            <span data-feather="database" class="align-text-bottom"></span>
                            Data
                        </a>
                        <div class="collapse " id="dashboard-collapse-">
                            <ul class="btn-toggle-nav list-unstyled fw-medium small baru">
                                <li><a href="{{ route('category.index') }}"
                                        class="link-dark d-inline-flex text-decoration-none rounded "><i
                                            class="bi bi-circle mx-1 "></i>Kategori</a>
                                </li>
                                <li><a href="/product"
                                        class="link-dark d-inline-flex text-decoration-none rounded {{ $judul === 'Product' ? 'active' : '' }}"><i
                                            class="bi bi-circle mx-1"></i>Products</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                {{-- <h6
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul> --}}
            </div>
        </nav>
        <div class="container mt-3">

            @yield('container')
        </div>

    </div>
</div>
