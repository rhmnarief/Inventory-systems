<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #0A1C22 !important">
    <!-- Brand Logo -->
    <div class="brand-link d-flex align-items-center">
        <span class="iconify" data-icon="fluent:sport-16-filled"
            style="font-size:42px; margin-right: 10px;"></span>
        <h1>
            <span class="brand-text font-weight-light" style="color:#E2DC0E;">
                <strong>
                    Tian <br> Sport
                </strong>
            </span>
        </h1>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('changePassword') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                @if (auth()->user()->level == 'admin' || auth()->user()->level == 'super-admin')
                    <a href="{{ route('getStock') }}" class="nav-link d-flex">
                        <span class="iconify" data-icon="healthicons:rdt-result-out-stock"
                            style="font-size:24px; margin-right: 10px;"></span>
                        <p>
                            Penyimpanan <br> Bahan Baku
                        </p>
                    </a>
                    <a href="{{ route('getProduct') }}" class="nav-link d-flex">
                        <span class="iconify" data-icon="ion:shirt"
                            style="font-size:24px; margin-right: 10px;"></span>
                        <p>
                            Penyimpanan <br> Produk Pakaian
                        </p>
                    </a>
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Laporan Catatan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'super-admin')
                            <li class="nav-item">
                                <a href="{{ route('getRecordProduct') }}" class="nav-link d-flex">
                                    <span class="iconify" data-icon="eva:car-fill"
                                        style="font-size:24px; margin-right: 10px;"></span>
                                    <p>Produk Masuk dan Keluar</p>
                                </a>
                                <a href="{{ route('getRecordStock') }}" class="nav-link d-flex">
                                    <span class="iconify" data-icon="eva:car-fill"
                                        style="font-size:24px; margin-right: 10px;"></span>
                                    <p>Bahan Baku Masuk dan Keluar</p>
                                </a>
                            </li>
                        @endif

                    </ul>
                </li>

                <li class="nav-item">
                    @if (auth()->user()->level == 'super-admin')
                    <a href="{{ route('register') }}" class="nav-link">
                        <span class="iconify" data-icon="akar-icons:person-add"
                            style="font-size:22px; margin-right: 10px;"></span>
                        Register Admin
                    </a>
                    @endif
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
