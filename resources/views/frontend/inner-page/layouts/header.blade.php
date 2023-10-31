<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="home">
            <a href="{{ route('home') }}"><img src="{{ asset('/img/logo.png') }}" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('home') }}">Home</a></li>
                @can('user')
                    <li class="dropdown @yield('navUsr')">
                        <a>
                            <span>{{ Auth()->user()->name }}</span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li class="btn">
                                <a href="{{ route('profile') }}">Profile</a>
                            </li>
                            <li class="btn">
                                <a href="{{ url('/vehicles') }}">Vehicles</a>
                            </li>
                            <li class="btn">
                                <a href="{{ url('/simLists') }}">SIM</a>
                            </li>
                            <li class="btn">
                                <a href="{{ url('/rent') }}">Rents</a>
                            </li>
                            <li class="btn btn-light">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="btn fw-bold"
                                        onclick="return confirm('Are you sure ?')">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endcan
                @cannot('user')
                    <li>
                        <a href="{{ route('login') }}" class="@yield('navLgn')">Login</a>
                    </li>
                @endcannot
                <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
