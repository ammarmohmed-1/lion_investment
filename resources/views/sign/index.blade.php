<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- tittle -->
    <title> lion investment | @yield('title')</title>
    <!-- img tittle  -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/uploads/logo/favicon.png') }}" />

    <meta name="apple-mobile-web-app-title" content="lion investment | Home" />
    <meta itemprop="name" content="lion investment | Home" />



    <!-- font fammily -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&amp;family=Open+Sans&amp;family=Ubuntu:wght@300;400;500;700&amp;display=swap" />
    <!-- font fammily  -->

    <!-- libery -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/themes/deepblue/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/themes/deepblue/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/themes/deepblue/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/themes/deepblue/css/icofont.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/themes/deepblue/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/themes/deepblue/css/flags.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/themes/deepblue/css/owl.carousel.min.css') }}" />

    <!-- style.css -->
    <link rel="stylesheet" href="{{ asset('site/assets/themes/deepblue/css/main/main.css') }}">

    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('assets/icon/font-awesome/css/all.min.css') }}">

    @yield('style')


    <style>
        @media only screen and (max-width: 423px) {
            .xs-dropdown-menu {
                transform: translateX(-20px) !important;
            }
        }
    </style>


    <style>
        #hero {
            position: relative;
            padding: 170px 0;
            background-image: linear-gradient(90deg,
                    rgba(7, 11, 40, 0.8) 0%,
                    rgba(7, 11, 40, 0.8) 100%),
                url({{ asset('site/assets/uploads/content/nn.jpg') }} );
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav id="navbar">
        <div class="container">
            <div class="navbar navbar-expand-md flex-wrap">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('site/assets/uploads/logo/logo.png') }}" alt="trader ar" />
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#investmentnavbar">
                    <span class="menu-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="investmentnavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('plan') }}">Plan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                        </li>

                        <li class="nav-item" @auth('admin') hidden @endauth @auth('client') hidden @endauth>
                            <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav nav-registration d-none d-md-block">
                        @auth('admin')
                            <li class="nav-item">
                                <a href="{{ route('admin-home') }}"><span>Dashboard</span></a>
                            </li>
                        @endauth
                        @auth('client')
                            <li class="nav-item">
                                <a href="{{ route('client-home') }}"><span>Dashboard</span></a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- / navbar -->
    <style>
        #page-banner {
            background-image: linear-gradient(90deg,
                    rgba(7, 11, 40, 0.65) 0%,
                    rgba(7, 11, 40, 0.65) 100%),
                url(assets/uploads/logo/banner.jpg);
        }
    </style>

    <div id="content">
        @yield('content')
    </div>


    <!-- FOOTER -->
    <footer id="footer">
        <div class="container">
            <div class="row responsive-footer">
                <div class="col-sm-6 col-lg-4">
                    <div class="footer-links wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.15s">
                        <div class="footer-brand">
                            <img src="{{ asset('site/assets/uploads/logo/logo.png') }}" alt="..." />

                            <p class="text mt-30 mb-30">
                                We are a full service like readable english. Many desktop
                                publishing packages and web page editor now use lorem Ipsum
                                sites still in their.
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="footer-links wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h5 class="h5">Useful Links</h5>
                        <ul class="">
                            <li>
                                <a href="{{ route('home') }}">
                                    <i class="icofont-thin-right"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}">
                                    <i class="icofont-thin-right"></i>
                                    Blog
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('about-us') }}">
                                    <i class="icofont-thin-right"></i>
                                    About Us
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('faq') }}">
                                    <i class="icofont-thin-right"></i>
                                    FAQ
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('terms-conditions') }}">
                                    <i class="icofont-thin-right"></i>
                                    Terms &amp; Conditions
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('privacy-policy') }}">
                                    <i class="icofont-thin-right"></i>
                                    Privacy Policy
                                </a>
                            </li>

                            <li class="left-0" @auth('admin') hidden @endauth @auth('client') hidden @endauth>
                                <a href="{{ route('sign-in') }}">
                                    <i class="icofont-thin-right"></i>
                                    Sign In
                                </a>
                            </li>

                            <li @auth('admin') hidden @endauth @auth('client') hidden @endauth>
                                <a href="{{ route('sign-up') }}">
                                    <i class="icofont-thin-right"></i>
                                    register
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->

    <!-- MODAL-LOGIN -->
    <div id="modal-login">
        <div class="modal-wrapper">
            <div class="modal-login-body">
                <div class="btn-close">&times;</div>
                <div class="form-block">
                    <form class="login-form" id="login-form">
                        @csrf
                        <div class="signin">
                            <h3 class="title mb-30">Sign In</h3>

                            <div class="form-group mb-30">
                                <input autocomplete="off" class="form-control" type="email" id="in_email"
                                    placeholder="Email" />
                            </div>

                            <div class="form-group mb-20">
                                <input autocomplete="off" class="form-control" type="password" id="in_password"
                                    placeholder="Password" />
                                <span class="text-danger passwordError"></span>
                            </div>

                            <div
                                class="remember-me d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-between mb-30">
                                <div class="checkbox custom-control custom-checkbox mt-10">
                                    <input autocomplete="off" id="in_remember" type="checkbox"
                                        class="custom-control-input" name="remember" />
                                    <label class="custom-control-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                <a class="btn-forget mt-10" href="javascript:void(0)">
                                    Forgot password?
                                </a>
                            </div>

                            <div class="btn-area">
                                <button class="btn-login login-auth-btn" onclick="signIn()">
                                    <span>Login</span>
                                </button>
                            </div>

                            <div class="login-query mt-30 text-center">
                                <a class="btn-signup" href="javascript:void(0)">
                                    Don't have any account? Sign Up
                                </a>
                            </div>
                        </div>
                    </form>

                    <form class="login-form" id="reset-form" method="post">
                        <input type="hidden" name="_token" value="XhAV3ElRQp8mPX3NcXonilzjFp6nPrdIBsbJUdv5" />
                        <div class="reset-password">
                            <h3 class="title mb-30">Reset Password</h3>
                            <div class="form-group mb-30">
                                <input autocomplete="off" class="form-control" type="email" id="forget-email"
                                    value="" placeholder="Enter your Email Address" />
                                <span class="text-danger emailError"></span>
                            </div>
                            <div class="form-group mb-30">
                                <input autocomplete="off" class="form-control" type="password" id="forget-password"
                                    value="" placeholder="The Password You Want" />
                                <span class="text-danger emailError"></span>
                            </div>

                            <div class="btn-area">
                                <button class="btn-login login-recover-auth-btn" onclick="forgetPassword()">
                                    <span>Reset Password</span>
                                </button>
                            </div>
                            <div class="login-query mt-30 text-center">
                                <a class="btn-login-back" href="javascript:void(0)">
                                    Already have any account? Login
                                </a>
                            </div>
                        </div>
                    </form>

                    <form class="login-form" id="signup-form">
                        @csrf
                        <div class="register">
                            <h3 class="title mb-30">SIGN UP FORM</h3>

                            <div class="form-group mb-30">
                                <input autocomplete="off" class="form-control" type="text" id="up_first_name"
                                    value="" placeholder="First Name" />
                                <span class="text-danger firstnameError"></span>
                            </div>

                            <div class="form-group mb-30">
                                <input autocomplete="off" class="form-control" type="text" id="up_last_name"
                                    value="" placeholder="Last Name" />
                                <span class="text-danger lastnameError"></span>
                            </div>

                            <div class="form-group mb-30">
                                <input autocomplete="off" class="form-control" type="text" id="up_email"
                                    value="" placeholder="Email Address" />
                                <span class="text-danger emailError"></span>
                            </div>

                            <div class="form-group mb-30">
                                <input autocomplete="off" class="form-control" type="text" id="up_phone"
                                    value="" placeholder="Phone" />
                                <span class="text-danger emailError"></span>
                            </div>

                            <div class="form-group mb-30">
                                <input autocomplete="off" class="form-control" type="password" id="up_password"
                                    value="" placeholder="Password" />
                                <span class="text-danger passwordError"></span>
                            </div>

                            <div class="form-group mb-30">
                                <input autocomplete="off" class="form-control" type="password"
                                    id="up_password_confirmation" placeholder="Confirm Password" />
                            </div>

                            <div class="btn-area">
                                <button class="btn-login login-signup-auth-btn"
                                    onclick="signUp(@if ($ref != null) {{ $ref->id }} @else 22 @endif)">
                                    <span>Sign Up</span>
                                </button>
                            </div>
                            <div class="login-query mt-30 text-center">
                                <a class="btn-login-back" href="javascript:void(0)">
                                    Already have an account? Login
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="connectivity wow fadeIn" data-wow-duration="1s" data-wow-delay="0.35s"></div>
            </div>
        </div>

    </div>
    <!-- /MODAL-LOGIN -->


    <!-- All scripts  -->
    <script src="{{ asset('site/assets/themes/deepblue/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('site/assets/global/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('site/assets/global/js/popper.min.js') }}"></script>
    <script src="{{ asset('site/assets/global/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('site/assets/global/js/notiflix-aio-2.7.0.min.js') }}"></script>
    <script src="{{ asset('site/assets/themes/deepblue/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('site/assets/themes/deepblue/js/wow.min.js') }}"></script>
    <script src="{{ asset('site/assets/themes/deepblue/js/jquery.flagstrap.min.js') }}"></script>
    <script src="{{ asset('site/assets/themes/deepblue/js/slick.min.js') }}"></script>
    <script src="{{ asset('site/assets/themes/deepblue/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/assets/themes/deepblue/js/multi-animated-counter.js') }}"></script>
    <script src="{{ asset('site/assets/themes/deepblue/js/radialprogress.js') }}"></script>

    <script src="{{ asset('site/assets/global/js/pusher.min.js') }}"></script>
    <script src="{{ asset('site/assets/global/js/vue.min.js') }}"></script>
    <script src="{{ asset('site/assets/global/js/axios.min.js') }}"></script>

    <script src="{{ asset('site/assets/themes/deepblue/js/script.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        'use strict';
        (function($) {
            $(document).on('click', '.investNow', function() {
                $('#investment-modal').toggleClass('modal-open')
                let data = $(this).data('resource')
                let price = $(this).data('price')
                let symbol = '$'
                let currency = 'USD'
                $('.price-range').text(`Invest: ${price}`)

                if (data.fixed_amount == '0') {
                    $('.invest-amount').val('')
                    $('#amount').attr('readonly', false)
                } else {
                    $('.invest-amount').val(data.fixed_amount)
                    $('#amount').attr('readonly', true)
                }

                $('.profit-details').html(
                    `<strong> Interest: ${
              data.profit_type == '1'
                ? `${data.profit} %`
                : `${data.profit} ${currency}`
            }  </strong>`,
                )
                $('.profit-validity').html(
                    `<strong>  Per ${data.schedule} hours ,  ${
              data.is_lifetime == '0' ? `${data.repeatable} times` : `Lifetime`
            } </strong>`,
                )
                $('.plan-name').text(data.name)
                $('.plan-id').val(data.id)
            })

            $('.btn-close-investment').on('click', function() {
                $('#investment-modal').removeClass('modal-open')
            })

            $('#investment-modal .modal-wrapper').on('click', function(e) {
                e.preventDefault()
                $('#modal-login').removeClass('modal-open')
            })
        })(jQuery)
    </script>

    <script>
        'use strict'
        $(document).ready(function() {
            setDialCode()
            $(document).on('change', '.dialCode-change', function() {
                setDialCode()
            })

            function setDialCode() {
                let currency = $('.dialCode-change').val()
                $('.dialcode-set').val(currency)
            }
        })
    </script>




    <script>
        function signIn() {
            axios.post('/sign-in', {
                    email: document.getElementById("in_email").value,
                    password: document.getElementById("in_password").value,
                    remember: document.getElementById("in_remember").checked,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    if (response.data.guard == 'admin') {
                        window.location.href = '/cms/admin/home'
                    } else {
                        window.location.href = '/cms/client/home'
                    }
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    swal(error.response.data.title, error.response.data.details, error.response.data.icon);
                })
                .then(function() {
                    // always executed
                });
        }

        function signUp(ref) {
            axios.post('/sign-up', {
                    first_name: document.getElementById("up_first_name").value,
                    last_name: document.getElementById("up_last_name").value,
                    phone: document.getElementById("up_phone").value,
                    email: document.getElementById("up_email").value,
                    password: document.getElementById("up_password").value,
                    referrer_id: ref,
                    password_confirmation: document.getElementById("up_password_confirmation").value
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    window.location.href = '/sign-in'
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    swal(error.response.data.title, error.response.data.details, error.response.data.icon);
                })
                .then(function() {
                    // always executed

                });
        }

        function forgetPassword() {
            axios.post('/forget-password', {
                    email: document.getElementById("forget-email").value,
                    password: document.getElementById("forget-password").value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    // window.location.href = '/'
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    swal(error.response.data.title, error.response.data.details, error.response.data.icon);
                })
                .then(function() {
                    // always executed
                });
        }
    </script>

    @yield('script')
</body>

</html>
