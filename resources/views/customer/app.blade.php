<!DOCTYPE html>
<html lang="en">

<head>

    <title>iDeaThings - Education</title>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="landing/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="landing/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="landing/css/owl.carousel.css">
    <link rel="stylesheet" href="landing/css/owl.theme.default.min.css">
    <link rel="shortcut icon" type="image/png" href="admin/images/logos/logo-new.png" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="landing/css/templatemo-style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>

    <!-- MENU -->
    @include('customer.navbar')

    <!-- HOME -->
    <section id="home">
    <div class="row">
        <div class="owl-carousel owl-theme home-slider">
            <div class="item item-first">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-12">
                            <h1>Distance Learning Education Center</h1>
                            <h3>Our online courses are designed to fit in your industry supporting
                                all-round with latest technologies.</h3>
                            <a href="#courses" class="btn btn-success mt-4">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item item-second">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-12">
                            <h1>Empower Your Skills</h1>
                            <h3>Join our professional courses to improve your knowledge and career
                                opportunities.</h3>
                            <a href="#courses" class="btn btn-success mt-4">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item item-third">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-12">
                            <h1>Flexible Learning</h1>
                            <h3>Learn anytime, anywhere with our expert-led online courses.</h3>
                            <a href="#courses" class="btn btn-success mt-4">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- instructor -->
    <section id="team">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Teachers <small>Meet Professional Trainers</small></h2>
                    </div>
                </div>

                @foreach($teachers as $teacher)
                <div class="col-md-3 col-sm-6" style="margin-bottom: 10px;">
                    <div class="team-thumb" style="border-radius: 15px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center; padding: 15px;">
                        <div class="team-image" style="overflow: hidden;">
                            {{-- <img width="100" src="{{ url('storage/users/' . $teacher->foto) }}" 
                                style="transition: transform 0.3s ease;"> --}}
                        </div>
                        <div class="team-info">
                            <h3>{{ $teacher->name }}</h3>
                            <span>{{ $teacher->bio }}</span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Courses -->
    <section id="courses">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Popular Courses <small>Upgrade your skills with the newest courses</small></h2>
                    </div>

                    <div class="owl-carousel owl-theme owl-courses">
                        @foreach($courses as $course)
                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="courses-thumb" style="border-radius: 15px; overflow: hidden">

                                    <!-- Course Image -->
                                    <div class="courses-top" style="overflow: hidden;">
                                        <div class="courses-image">
                                            <img src="{{ asset('storage/course/' . $course->foto) }}" class="img-responsive" alt="Course Image" 
                                                style="border-top-left-radius: 15px; border-top-right-radius: 15px; transition: transform 0.3s ease;">
                                        </div>
                                    </div>

                                    <!-- Course Details -->
                                    <div class="courses-detail text-center">
                                        <h3><a href="{{$course->url}}">{{ $course->title }}</a></h3>
                                        <p>{{ $course->description }}</p>
                                    </div>

                                    <!-- Course Info -->
                                    <div class="courses-info d-flex justify-content-between align-items-center">
                                        <div class="courses-author d-flex align-items-center">
                                            <img src="{{ asset('storage/users/' . $course->instructor->user->foto) }}" class="img-responsive" alt="Instructor Image" 
                                                style="border-radius: 50%; width: 40px; ">
                                            <span class="ml-2">{{ $course->instructor->user->name }}</span>
                                        </div>
                                        
                                        <div class="courses-price">
                                            <a href="#" class="btn btn-outline-primary bg-success">
                                                {{ $course->price > 0 ? 'Rp. ' . number_format($course->price, 0, ',', '.') : 'Free' }}
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Detail Button -->
                                    <div class="text-center mt-5" style="padding: 20px;">
                                        <a href="{{ $course->url }}" class="btn" style="background-color: #b5e51e;">Course Detail &rarr;</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section id="testimonial">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Student Reviews <small>from around the world</small></h2>
                    </div>
                    <div class="owl-carousel owl-theme owl-client">
                            @foreach ($reviews as $item)    
                            <div class="col-md-4 col-sm-4">
                                <div class="item" style="border-radius: 15px; overflow: hidden;">
                                    <div class="tst-image">
                                        <img src="storage/users/{{ $item->user->foto }}" class="img-responsive" alt="{{ $item->user->foto }}">
                                    </div>
                                    <div class="tst-author">
                                        <h4>{{ $item->user->name }}</h4>
                                        <span>{{ $item->course->title }}</span>
                                    </div>
                                    <p>{{ $item->komentar }}</p>
                                    <div class="tst-rating">
                                        @for ($i = 0; $i < $item->bintang; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                        @for ($i = $item->bintang; $i < 5; $i++)
                                            <i class="fa fa-star-o"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
    </section>

    <!-- FOOTER -->
    @include('customer.footer')

    <!-- SCRIPTS -->
    <script src="landing/js/jquery.js"></script>
    <script src="landing/js/bootstrap.min.js"></script>
    <script src="landing/js/owl.carousel.min.js"></script>
    <script src="landing/js/smoothscroll.js"></script>
    <script src="landing/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
  $(document).ready(function(){
    $(".home-slider").owlCarousel({
      items: 1,              // Tampilkan satu item per slide
      loop: true,            // Looping otomatis
      autoplay: true,        // Auto-slide aktif
      autoplayTimeout: 4000, // Waktu antar slide (ms)
      autoplayHoverPause: true, // Pause saat hover
      nav: true,             // Tampilkan tombol navigasi
      dots: true,            // Tampilkan indikator slide
      navText: ["<", ">"],   // Custom tombol navigasi
      animateOut: 'fadeOut', // Efek transisi keluar
      animateIn: 'fadeIn'    // Efek transisi masuk
    });
  });
</script>


</body>

</html>