<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>PEMU AGRIFOOD ACADEMY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="PEMU" name="keywords">
    <meta content="PEMU" name="description">


    <!-- Admin css -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Admin/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet"
        href="{{ asset('Admin/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">






    <!-- Admin css -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/pemufavicon.png') }}">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">




    <!------ Include the above in your HEAD tag ---------->

    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/survey.css') }}" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>


</head>

<body>


    <!-- Topbar Start -->
    <div class="container-fluid px-0 d-none d-lg-block">
        <div class="row gx-5 py-3 align-items-center">
            <div class="col-lg-3 d-flex align-items-center justify-content-start ms-0">
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('img/lgo.jpeg') }}" alt="Your Logo" height="200">
                </a>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-center">
                    <h2 style="text-align: center">Growing Together, Regenerating the Future</h2>
                </div>
            </div>
            <div class="col-lg-3 d-flex align-items-center justify-content-end">
                <a class="btn btn-primary btn-square rounded-circle me-2" href="https://twitter.com/" target="_blank"><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-primary btn-square rounded-circle me-2" href="https://www.facebook.com/"
                    target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-primary btn-square rounded-circle me-2" href="https://www.linkedin.com/"
                    target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->



    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex d-lg-none">
            <h1 class="m-0 display-4 text-secondary"><span class="text-white">PEMU</span>AGRIFOOD</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0"
                style="display: flex; justify-content: space-between; align-items: center;">
                <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}"
                    class="nav-item nav-link {{ request()->is('about-us') ? 'active' : '' }}">About</a>
                <a href="{{ route('services') }}"
                    class="nav-item nav-link {{ request()->is('regenerative-farming-services') ? 'active' : '' }}">Services</a>
                <a href="{{ route('blogs') }}"
                    class="nav-item nav-link {{ request()->is('blogs') ? 'active' : '' }}">Farming Insights</a>
                <a href="{{ route('contact') }}"
                    class="nav-item nav-link {{ request()->is('contact-us') ? 'active' : '' }}">Contact</a>
                @auth
                @else
                    <a href="/login" class="nav-item nav-link {{ request()->is('login') ? 'active' : '' }}">Join Us</a>
                @endauth
            </div>
            <div class="ms-auto">
                @auth
                    <a href="{{ route('profile') }}" class="btn btn-warning"><i class="fa fa-user"
                            aria-hidden="true"></i> View Profile</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out
                    </a>

                @endauth
            </div>
        </div>
    </nav>
    <!-- Navbar End -->






    {{ $slot }}



    <!-- Footer Start -->
    <div class="container-fluid bg-footer bg-primary text-white mt-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <h4 class="text-white mb-4">Get In Touch</h4>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-white me-2"></i>
                                <p class="text-white mb-0">Nairobi, Kenya</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-white me-2"></i>
                                <p class="text-white mb-0">info@pemuagrifood.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-white me-2"></i>
                                <p class="text-white mb-0">+254 345 67890</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-secondary btn-square rounded-circle me-2"
                                    href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-square rounded-circle me-2"
                                    href="https://www.facebook.com/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-square rounded-circle me-2"
                                    href="https://www.linkedin.com/" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-white mb-2" href="/"><i
                                        class="bi bi-arrow-right text-white me-2"></i>Home</a>
                                <a class="text-white mb-2" href="{{ route('blogs') }}"><i
                                        class="bi bi-arrow-right text-white me-2"></i>Latest Blog</a>
                                <a class="text-white" href="{{ route('contact') }}"><i
                                        class="bi bi-arrow-right text-white me-2"></i>Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-white mb-4">Popular Links</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-white mb-2" href="/"><i
                                        class="bi bi-arrow-right text-white me-2"></i>Home</a>
                                <a class="text-white mb-2" href="{{ route('about') }}"><i
                                        class="bi bi-arrow-right text-white me-2"></i>About Us</a>
                                <a class="text-white mb-2" href="{{ route('services') }}"><i
                                        class="bi bi-arrow-right text-white me-2"></i>Our Services</a>
                                <a class="text-white mb-2" href="{{ route('blogs') }}"><i
                                        class="bi bi-arrow-right text-white me-2"></i>Latest Blog</a>
                                <a class="text-white" href="{{ route('contact') }}"><i
                                        class="bi bi-arrow-right text-white me-2"></i>Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-n5">
                    <div
                        class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-secondary p-5">
                        <h4 class="text-white">Newsletter</h4>
                        <h6 class="text-white">Subscribe Our Newsletter</h6>
                        <p>Growing Together, Regenerating the Future</p>
                        <form action="/pemu/subscriber/store" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Your Email"
                                    name="email">
                                <button class="btn btn-primary" type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 <a class="text-secondary fw-bold" href="/">pemuagrifood.com</a>. All
                Rights Reserved</p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


    <x-flash-message />
    <x-flash-error />
</body>

</html>
