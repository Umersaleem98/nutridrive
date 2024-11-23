<div class="site-navbar py-2 custom-navbar">
  <div class="container">
      <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
              <div class="site-logo">
                  <a href="{{ url('/') }}" class="js-logo-clone">
                      <img src="{{ asset('templates/images/logo.png') }}" alt="Nutri-drive Logo" style="height: 70px; width: 90px">
                  </a>
              </div>
          </div>
          <div class="main-nav d-none d-lg-block">
              <nav class="site-navigation text-right text-md-center" role="navigation">
                  <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li class="active"><a href="{{ url('/') }}">Home</a></li>
                      <li><a href="{{ url('/store') }}">Store</a></li>
                      <li class="has-children">
                          <a href="#">Dropdown</a>
                          <ul class="dropdown">
                              <li><a href="#">Supplements</a></li>
                              <li class="has-children">
                                  <a href="#">Vitamins</a>
                                  <ul class="dropdown">
                                      <li><a href="#">Supplements</a></li>
                                      <li><a href="#">Vitamins</a></li>
                                      <li><a href="#">Diet &amp; Nutrition</a></li>
                                      <li><a href="#">Tea &amp; Coffee</a></li>
                                  </ul>
                              </li>
                              <li><a href="#">Diet &amp; Nutrition</a></li>
                              <li><a href="#">Tea &amp; Coffee</a></li>
                          </ul>
                      </li>
                      <li><a href="{{ url('/about') }}">About</a></li>
                      <li><a href="{{ url('/contact') }}">Contact</a></li>
                      @if(Auth::check())
                          <li class="nav-item">
                              <form action="{{ url('userlogout') }}" method="POST" class="d-inline">
                                  @csrf
                                  <button type="submit" class="btn btn-link nav-link" style="border: none; padding: 0;">Logout</button>
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
              <a href="{{ url('cart') }}" class="icons-btn d-inline-block bag">
                  <span class="icon-shopping-bag"></span>
                  <span class="number">2</span>
              </a>
              <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
      </div>
  </div>
</div>
