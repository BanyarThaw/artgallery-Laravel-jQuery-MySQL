<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                <form action="#" method="post" class="app-search d-none d-md-block">
                    @csrf
                    <div class="position-relative">
                        <input type="text" class="form-control" name="keyword" placeholder="Search..." autocomplete="off"
                            id="search-options" value="" style="display:none;">
                        <!-- <span class="mdi mdi-magnify search-widget-icon"></span> -->
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                            id="search-close-options"></span>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">
                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-plus-circle fs-22'></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                        <div class="p-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ route('categories.create') }}">
                                        <i class='bx bx-layer fs-22'></i>
                                        <span>Create Category</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ route('types.create') }}">
                                        <i class='bx bx-list-ul fs-22'></i>
                                        <span>Create Type</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ route('sub-types.create') }}">
                                        <i class='bx bx-detail fs-22'></i>
                                        <span>Create Sub Type</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ route('sectors.create') }}">
                                        <i class='bx bx-grid-alt fs-22'></i>
                                        <span>Create Sector</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ route('sub-sectors.create') }}">
                                        <i class='bx bx-dock-left fs-22'></i>
                                        <span>Create Sub Sector</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ route('specific-detail.create') }}">
                                      <i class='bx bx-spreadsheet fs-22'></i>
                                      <span>Create Detail</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="{{ asset('images/super-admin-icon.jpg') }}"
                                alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Admin</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="{{ route('change.password.form') }}"><i class="bx bx-edit-alt fs-16 align-middle me-1"></i><span
                                class="align-middle" >change password</span></a>

                        <!-- item-->
                        <a class="dropdown-item" href="{{ route('login.logout') }}"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle" >Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
