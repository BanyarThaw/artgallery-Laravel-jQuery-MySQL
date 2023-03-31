<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('images/logo.jpg') }}" class="rounded-circle" alt="" width="22" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('images/logo.jpg') }}" class="rounded-circle" alt="" width="50" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link  @yield('dashboard')" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                    <div class="collapse menu-dropdown @yield('dashboard-show')" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link  @yield('categories')"> categories </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('types.index') }}" class="nav-link @yield('types')"> types </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sub-types.index') }}" class="nav-link @yield('sub-types')"> sub types </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sectors.index') }}" class="nav-link @yield('sectors')"> sectors </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sub-sectors.index') }}" class="nav-link @yield('sub-sectors')"> sub sectors </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->

                <!-- using static functions to reduce code duplication-->
                @php   
                    $categories = \App\Models\Category::get_categories();
                    $types = \App\Models\Type::get_types();
                    $sectors = \App\Models\Sector::get_sectors();
                @endphp

                <!-- category section -->
                @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('contents.category',$category->id) }}" id="c-{{ $category->id }}">
                            <i class='bx bx-layer fs-18'></i> <span >{{ $category->name }}</span>
                        </a>
                    </li> 
                @endforeach
               
                <!-- type section -->
                @foreach($types as $type)
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('sub_types.list',$type->id) }}" id="t-{{ $type->id }}">
                            <i class="bx bx-list-ul fs-18"></i> <span>{{ $type->name }}</span>
                        </a>
                    </li> 
                @endforeach

                <!-- sector section -->
                @foreach($sectors as $sector)
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('sub_sectors.list',$sector->id) }}" id="s-{{ $sector->id }}">
                            <i class="bx bx-grid-alt fs-18"></i> <span >{{ $sector->name }}</span>
                        </a>
                    </li> 
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
