<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="#" class="text-nowrap logo-img">
                <img src="admin/images/logos/IdeaThings.png" width="60" alt="" />
            </a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse" aria-expanded="false">
            <ul class="nav navbar-nav navbar-nav-first">
                <li><a href="/" class="smoothScroll">Home</a></li>
                <li><a href="#about" class="smoothScroll">About</a></li>
                <li><a href="#team" class="smoothScroll">Our Teacher</a></li>
                <li><a href="#courses" class="smoothScroll">Courses</a></li>
                <li><a href="#testimonial" class="smoothScroll">Reviews</a></li>
                <li><a href="#contact" class="smoothScroll">Contact</a></li>
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
                            
                            <div class="d-sm-none d-lg-inline-block"><img alt="image" src="{{ url('storage/users/'.Auth::user()->foto) }}" class="rounded-circle mr-2" style="width: 30px; height: 30px; object-fit: cover;">  {{ Auth::user()->name }}</div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end bg-light">
                        <li><a href="profileuser" class="dropdown-item has-icon"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="progress" class="dropdown-item has-icon"><i class="fa fa-chart-line"></i> Progress</a></li>
                        <li><a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>            
            @endauth


        </div>
    </div>
</section>
