<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('backend') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('/img/logo/logo-invert.png') }}" alt="" class="img-fluid">
        </div>
        <div class="sidebar-brand-text mx-1">rentgarage'ar</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/backend') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item @yield('sideUsr')">
        <a class="nav-link" href="{{ url('/user-backend') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Users</span>
        </a>
    </li>
    <li class="nav-item @yield('sideRts')">
        <a class="nav-link" href="{{ url('/renter-backend') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Renters</span>
        </a>
    </li>
    <li class="nav-item @yield('sideVty')">
        <a class="nav-link" href="{{ url('/vehicleType-backend') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Vehicle Types</span>
        </a>
    </li>
    <li class="nav-item @yield('sideVhs')">
        <a class="nav-link" href="{{ url('/vehicle-backend') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Vehicles</span>
        </a>
    </li>
    <li class="nav-item @yield('sideSls')">
        <a class="nav-link" href="{{ url('/simList-backend') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>SIM Lists</span>
        </a>
    </li>
    <li class="nav-item @yield('sideRcl')">
        <a class="nav-link" href="{{ url('/rentClass-backend') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Rent Classes</span>
        </a>
    </li>
    <li class="nav-item @yield('sideGlc')">
        <a class="nav-link" href="{{ url('/garageLocation-backend') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Garage Locations</span>
        </a>
    </li>
    <li class="nav-item @yield('sideGrm')">
        <a class="nav-link" href="{{ url('/garageRoom-backend') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Garage Rooms</span>
        </a>
    </li>
    <li class="nav-item @yield('sideGrg')">
        <a class="nav-link" href="{{ url('/garage-backend') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Garages</span>
        </a>
    </li>
    <li class="nav-item @yield('sideRnt')">
        <a class="nav-link" href="{{ url('/rent-backend') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Rents</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
