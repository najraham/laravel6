
<header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
        <ul>
            @guest
                <li>
                    <a class="nav-link scrollto {{ Request::is('login') ? 'active': '' }}" href="{{ route('login') }}">
                        <i class="bx bx-log-in"></i>
                        <span>{{ __('Login') }}  </span>
                    </a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a class="nav-link scrollto {{ Request::is('register') ? 'active': '' }}" href="{{ route('register') }}">
                            <i class="bx bx-notepad"></i>
                            <span>{{ __('Register') }}</span>
                        </a>
                    </li>
                @endif
            @else
                <li>
                    <a class="nav-link active" href="javascrit:void(0)">
                        <i class="bx bx-user-check"></i>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                              document.getElementById('logout-form').submit();">
                        <i class="bx bx-log-out"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @if(Auth::user()->is_admin)
                    <li>
                        <a href="{{ route('users_index') }}" class="nav-link scrollto {{ Request::is('users') ? 'active': '' }}">
                            <i class="bx bxs-user"></i> <span>Users</span>
                        </a>
                    </li>
                @endif
            @endguest
            <li>
                <a href="{{ route('index') }}" class="nav-link scrollto {{ Request::is('/') ? 'active': '' }}">
                    <i class="bx bx-home"></i> <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('blogs_index') }}" class="nav-link scrollto {{ Request::is('blogs/*') || Request::is('blog/*') ? 'active': '' }}">
                    <i class="bx bx-note"></i>
                    <span>Blogs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="nav-link scrollto {{ Request::is('contact') ? 'active': '' }}">
                    <i class="bx bx-envelope"></i>
                    <span>Contact</span>
                </a>
            </li>
        </ul>
    </nav><!-- .nav-menu -->

</header><!-- End Header -->
