@extends('sign.index')
@section('title', 'Forget Password')

@section('style')
@endsection

@section('content')

    <style>
        #page-banner {
            background-image: linear-gradient(90deg,
                    rgba(7, 11, 40, 0.65) 0%,
                    rgba(7, 11, 40, 0.65) 100%),
                url({{ asset('site/assets/uploads/logo/banner.jpg') }});
        }
    </style>
    <!-- PAGE-BANNER -->
    <section id="page-banner">
        <div class="container">
            <div class="page-header">
                <h2 class="fontubonto font-weight-medium text-uppercase wow fadeIn" data-wow-duration="1s"
                    data-wow-delay="0.35s">Forget Password</h2>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-lg-8 no-gutters">
                    <div class="page-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s"><a
                                    href="#">Home</a></li>
                            <li class="breadcrumb-item wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.7s"><a
                                    href="#">Foget Password</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /PAGE-BANNER -->
    <section id="about-us" class="about-page secbg-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-block py-5">
                        <form class="login-form" method="post" @auth('admin') hidden @endauth>
                            @csrf
                            <div class="signin">
                                <h3 class="title mb-30">Forget Password Form</h3>

                                <div class="form-group mb-30">
                                    <input class="form-control" id="email" type="text" placeholder="Email">
                                </div>

                                <div class="form-group mb-20">
                                    <input class="form-control" id="password" type="password"
                                        placeholder="The password you want">
                                </div>

                                <div class="btn-area">
                                    <button onclick="forgetPassword()" class="btn-login login-auth-btn"
                                        type="button"><span>Forget
                                            Password</span></button>
                                </div>

                                <div class="login-query mt-30 text-center">
                                    <a href="{{ route('sign-up') }}">Don't have any account? Sign Up</a>
                                </div>

                                <div class="login-query mt-30 text-center">
                                    <a href="{{ route('sign-in', 'client') }}">Already have an account?
                                        Login</a>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="connectivity wow fadeIn" data-wow-duration="1s" data-wow-delay="0.35s">
                        <div class="d-flex align-items-center justify-content-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

    <script>
        function forgetPassword() {
            axios.post('/forget-password', {
                    email: document.getElementById("email").value,
                    password: document.getElementById("password").value,
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
@endsection
