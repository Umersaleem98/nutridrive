<div class="site-navbar py-2 custom-navbar">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between w-100">
            <div class="logo">
                <div class="site-logo">
                    <a href="{{ url('/') }}" class="js-logo-clone">
                        <img src="{{ asset('templates/images/logo.png') }}" alt="Nutri-drive Logo" style="height: 70px; width: 90px">
                    </a>
                </div>
            </div>
            <div class="main-nav d-none d-lg-flex justify-content-center w-100">
                <nav class="site-navigation" role="navigation">
                    <ul class="site-menu js-clone-nav d-flex justify-content-center m-0">
                        <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                            <a href="{{ url('/about') }}">About</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'store' ? 'active' : '' }}">
                            <a href="{{ url('/store') }}">Store</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                            <a href="{{ url('/contact') }}">Contact</a>
                        </li>
                        @if(Auth::check())
                            <li class="nav-item">
                                <form action="{{ url('userlogout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('userlogin') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('userregister') }}">Register</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
          
            <div class="icons">
                @if(Auth::check())
                <a href="{{ url('cart') }}" class="icons-btn d-inline-block bag">
                    <span class="icon-shopping-bag"></span>
                </a>
                @endif
                <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
            </div>
            
        </div>
    </div>
</div>
