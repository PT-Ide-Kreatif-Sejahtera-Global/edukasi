<!DOCTYPE html>
<html lang="en">

<head>

    <title>IdeaThings - E-Learning</title>
    <!--

Known Template

http://www.templatemo.com/tm-516-known

-->
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
    <link rel="shortcut icon" type="image/png" href="admin/images/logos/IdeaThings.png" />

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
                                <a href="#courses" class="btn btn-success mt-4">Take a
                                    Discover More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- FEATURE -->
    <section id="feature">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-4">
                    <div class="feature-thumb">
                        <span>01</span>
                        <h3>Trending Courses</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et
                            dolore magna.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="feature-thumb">
                        <span>02</span>
                        <h3>Books & Library</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et
                            dolore magna.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="feature-thumb">
                        <span>03</span>
                        <h3>Certified Teachers</h3>
                        <p>templatemo delivers a wide variety of HTML5 templates for you at absolutely no charge. Please
                            tell your friends.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="about-info">
                        <h2>Start your journey to a better life with online practical courses</h2>

                        <figure>
                            <span><i class="fa fa-users"></i></span>
                            <figcaption>
                                <h3>Professional Trainers</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                            </figcaption>
                        </figure>

                        <figure>
                            <span><i class="fa fa-certificate"></i></span>
                            <figcaption>
                                <h3>International Certifications</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                            </figcaption>
                        </figure>

                        <figure>
                            <span><i class="fa fa-bar-chart-o"></i></span>
                            <figcaption>
                                <h3>Free for 3 months</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <div class="col-md-offset-1 col-md-4 col-sm-12">
                    <div class="entry-form">
                        <form action="#" method="post">
                            <h2>Signup today</h2>
                            <input type="text" name="full name" class="form-control" placeholder="Full name"
                                required="">

                            <input type="email" name="email" class="form-control" placeholder="Your email address"
                                required="">

                            <input type="password" name="password" class="form-control" placeholder="Your password"
                                required="">

                            <button class="submit-btn form-control" id="form-submit">Get started</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- TEAM -->
    <section id="team">
        <div class="container">
            <div class="row">
    
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Teachers <small>Meet Professional Trainers</small></h2>
                    </div>
                </div>
    
                @foreach($teachers as $teacher)
                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                        <div class="team-image">
                            <img width="100" height="100" src="{{ url('storage/users/' . $teacher->foto) }}">
                        </div>
                        <div class="team-info">
                            <h3>{{ $teacher->name }}</h3>
                            <span>{{ $teacher->bio }}</span>
                        </div>
                        {{-- <ul class="social-icon">
                            @if($teacher->facebook)
                                <li><a href="{{ $teacher->facebook }}" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                            @endif
                            @if($teacher->twitter)
                                <li><a href="{{ $teacher->twitter }}" class="fa fa-twitter"></a></li>
                            @endif
                            @if($teacher->instagram)
                                <li><a href="{{ $teacher->instagram }}" class="fa fa-instagram"></a></li>
                            @endif
                            @if($teacher->google)
                                <li><a href="{{ $teacher->google }}" class="fa fa-google"></a></li>
                            @endif
                            @if($teacher->linkedin)
                                <li><a href="{{ $teacher->linkedin }}" class="fa fa-linkedin"></a></li>
                            @endif
                        </ul> --}}
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
                                <div class="courses-thumb">
                                    <div class="courses-top">
                                        <div class="courses-image">
                                            <img src="{{ asset('storage/' . $course->image) }}" class="img-responsive" alt="">
                                        </div>
                                    </div>
    
                                    <div class="courses-detail">
                                        <h3><a href="#">{{ $course->title }}</a></h3>
                                        <p>{{ $course->description }}</p>
                                    </div>
    
                                    <div class="courses-info">
                                        <div class="courses-author">
                                            <img src="{{ asset('storage/users/' . $course->instructor->user->foto) }}" class="img-responsive" alt="">
                                            <span>{{ $course->instructor->user->name }}</span> <!-- Instructor's name -->
                                        </div>
                                        <div class="courses-price">
                                            <a href="#"><span>{{ $course->price > 0 ? 'Rp. ' . $course->price : 'Free' }}</span></a>
                                        </div>
                                    </div>
    
                                    <!-- Detail Button -->
                                    <div class="text-center mt-3">
                                        <a href="{{ route('detail', $course->id) }}" class="btn btn-primary">Detail</a>
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
                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="landing/images/tst-image1.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="tst-author">
                                    <h4>Jackson</h4>
                                    <span>Shopify Developer</span>
                                </div>
                                <p>You really do help young creative minds to get quality education and professional job
                                    search assistance. I’d recommend it to everyone!</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="landing/images/tst-image2.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="tst-author">
                                    <h4>Camila</h4>
                                    <span>Marketing Manager</span>
                                </div>
                                <p>Trying something new is exciting! Thanks for the amazing law course and the great
                                    teacher who was able to make it interesting.</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="landing/images/tst-image3.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="tst-author">
                                    <h4>Barbie</h4>
                                    <span>Art Director</span>
                                </div>
                                <p>Donec erat libero, blandit vitae arcu eu, lacinia placerat justo. Sed sollicitudin
                                    quis felis vitae hendrerit.</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="landing/images/tst-image4.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="tst-author">
                                    <h4>Andrio</h4>
                                    <span>Web Developer</span>
                                </div>
                                <p>Nam eget mi eu ante faucibus viverra nec sed magna. Vivamus viverra sapien ex,
                                    elementum varius ex sagittis vel.</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </section>

    <!-- CONTACT -->
    <section id="contact">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <form id="contact-form" role="form" action="" method="post">
                        <div class="section-title">
                            <h2>Contact us <small>we love conversations. let us talk!</small></h2>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter full name" name="name"
                                required="">

                            <input type="email" class="form-control" placeholder="Enter email address"
                                name="email" required="">

                            <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message"
                                required=""></textarea>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <input type="submit" class="form-control" name="send message" value="Send Message">
                        </div>

                    </form>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="contact-image">
                        <img src="landing/images/contact-image.jpg" class="img-responsive" alt="Smiling Two Girls">
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer id="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2>Headquarter</h2>
                        </div>
                        <address>
                            <p>1800 dapibus a tortor pretium,<br> Integer nisl dui, ABC 12000</p>
                        </address>

                        <ul class="social-icon">
                            <li><a href="#" class="fa-brands fa-twitter"></a></li>
                            <li><a href="#" class="fa-brands fa-facebook"></a></li>
                            <li><a href="#" class="fa-brands fa-instagram"></a></li>
                        </ul>

                        <div class="copyright-text">
                            <p>Copyright &copy; 2023 Company</p>
                            <p>Design: <a rel="nofollow" href="http://templatemo.com" title="html5 templates"
                                    target="_parent">Template Mo</a></p>
                            <p>Distribution: <a href="https://themewagon.com/">ThemeWagon</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2>Contact Info</h2>
                        </div>
                        <address>
                            <p>+65 2244 1100, +66 1800 1100</p>
                            <p><a href="mailto:youremail.com">hello@youremail.co</a></p>
                        </address>

                        <div class="footer_menu">
                            <h2>Quick Links</h2>
                            <ul>
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Investor</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="footer-info newsletter-form">
                        <div class="section-title">
                            <h2>Newsletter Signup</h2>
                        </div>
                        <div>
                            <div class="form-group">
                                <form action="#" method="get">
                                    <input type="email" class="form-control" placeholder="Enter your email"
                                        name="email" id="email" required="">
                                    <input type="submit" class="form-control" name="submit" id="form-submit"
                                        value="Send me">
                                </form>
                                <span><sup>*</sup> Please note - we do not spam your email.</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>


    <!-- SCRIPTS -->
    <script src="landing/js/jquery.js"></script>
    <script src="landing/js/bootstrap.min.js"></script>
    <script src="landing/js/owl.carousel.min.js"></script>
    <script src="landing/js/smoothscroll.js"></script>
    <script src="landing/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
