
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
                <img src="admin/images/logos/IdeaThings.png" width="70" alt="" />
            </a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse" aria-expanded="false">
            <ul class="nav navbar-nav navbar-nav-first">
                <li><a href="#top" class="smoothScroll">Home</a></li>
                <li><a href="#about" class="smoothScroll">About</a></li>
                <li><a href="#team" class="smoothScroll">Our Teacher</a></li>
                <li><a href="#courses" class="smoothScroll">Courses</a></li>
                <li><a href="#testimonial" class="smoothScroll">Reviews</a></li>
                <li><a href="#contact" class="smoothScroll">Contact</a></li>
            </ul>

            @guest
            <ul class="nav navbar-nav navbar-right">
                {{-- <li><a href="#"><i class="fa fa-bell"></i>Notification <span class="badge badge-pill badge-danger"></span></a></li> --}}
                <li><a href="login"><i class="fa fa-user"></i> Login/Register</a></li>
            </ul>
            @endguest

            @auth
            <ul class="nav navbar-nav navbar-right">
                {{-- <li><a href="#"><i class="fa fa-bell"></i>Notification <span class="badge badge-pill badge-danger"></span></a></li> --}}
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light">
                        <a href="profile" class="dropdown-item has-icon">
                            <i class=""></i><span>Profile</span>
                        </a>
                        <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger">
                            <i class=""></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</section>

<!-- jQuery script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Smooth scrolling
    $('.smoothScroll').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 500);

        // Remove 'active' class from all navbar items
        $('.navbar-nav-first li').removeClass('active');
        // Add 'active' class to the clicked item
        $(this).parent().addClass('active');
    });

    // Activate section on scroll
    $(window).on('scroll', function() {
        var scrollPos = $(document).scrollTop();

        $('.smoothScroll').each(function() {
            var sectionOffset = $($(this).attr('href')).offset().top - 50;

            if (scrollPos >= sectionOffset) {
                $('.navbar-nav-first li').removeClass('active');
                $(this).parent().addClass('active');
            }
        });
    });
</script>
