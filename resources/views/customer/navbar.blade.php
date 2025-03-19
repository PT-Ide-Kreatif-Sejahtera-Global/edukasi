<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="/education" class="text-nowrap logo-img" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <img src="admin/images/logos/Logo-new.png" width="50" alt="Ideathings Education Logo" style="padding-top: 10px; margin-right: 10px; margin-left: 10px;" />
                <h1 style="margin-top: 17px; font-size: 18px;">Education iDeaThings</h1>
            </a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse" aria-expanded="false">
            <ul class="nav navbar-nav navbar-nav-first">
                <li class="{{ Request::is('education') ? 'active' : '' }}">
                    <a href="/education" class="smoothScroll">Home</a>
                    </li>
                    <li class="{{ Request::is('education') ? 'active' : '' }}">
                        <a href="{{ Request::is('education') ? '#team' : '/education#team' }}" class="smoothScroll">Our Teacher</a>
                    </li>
                    <li class="{{ Request::is('education') ? 'active' : '' }}">
                        <a href="{{ Request::is('education') ? '#courses' : '/education#courses' }}" class="smoothScroll">Courses</a>
                    </li>
                    <li class="{{ Request::is('education') ? 'active' : '' }}">
                        <a href="{{ Request::is('education') ? '#testimonial' : '/education#testimonial' }}" class="smoothScroll">Reviews</a>
                    </li>
                    <li class="{{ Request::is('education') ? 'active' : '' }}">
                        <a href="{{ Request::is('education') ? '#contact' : '/education#contact' }}" class="smoothScroll">Contact</a>
                </li>
            </ul>

            @guest
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login"><i class="fa fa-user"></i> Login/Register</a></li>
            </ul>
            @endguest

            @auth
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Menambahkan foto di samping nama -->
                        <div class="d-flex align-items-center">

                            <div class="d-sm-none d-lg-inline-block"><img alt="image" src="{{ url('storage/users/'.Auth::user()->foto) }}" class="rounded-circle mr-2" style="width: 30px; height: 30px; object-fit: cover;"> {{ Auth::user()->name }}</div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end bg-light">
                        <li><a href="/profileuser" class="dropdown-item has-icon"><i class="fa fa-user"></i> Profile</a></li>
                        {{-- <li><a href="/progress" class="dropdown-item has-icon"><i class="fa fa-chart-line"></i> Progress</a></li> --}}
                        {{-- <li><a href="{{ route('paymentlist') }}" class="dropdown-item has-icon"><i class="fa fa-cart-shopping"></i> Payment List</a></li> --}}
                        <li><a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
            @endauth


        </div>
    </div>
</section>