@extends('sign.index')

@section('title', 'temp')

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
                    data-wow-delay="0.35s">Register a new Client</h2>
                <h3 class="title mb-30">
                    @if ($ref != null)
                        You have been referred by the Client {{ $ref->first_name . ' ' . $ref->last_name }}
                    @endif
                </h3>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-lg-8 no-gutters">
                    <div class="page-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s"><a
                                    href="#">Home</a></li>
                            <li class="breadcrumb-item wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.7s"><a
                                    href="#">Register a new client</a></li>
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
                        <form class="login-form">
                            @csrf
                            <div class="signin">
                                <h3 class="title mb-5">SIGN UP FORM</h3>
                                <h6 class="title mb-30">
                                    @if ($ref != null)
                                        You have been referred by the Client {{ $ref->first_name . ' ' . $ref->last_name }}
                                    @endif
                                </h6>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-30">
                                            <input class="form-control" type="text" id="first_name" value=""
                                                placeholder="First Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-30">
                                            <input class="form-control " type="text" id="last_name" value=""
                                                placeholder="Last Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group mb-30">
                                            <input class="form-control" type="text" id="email" value=""
                                                placeholder="Email Address">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-30">
                                            <input class="form-control" type="number" id="phone" value=""
                                                placeholder="Phone">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-20">
                                            <input class="form-control" type="password" id="password"
                                                placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-20">
                                            <input class="form-control" type="password" id="password_confirmation"
                                                placeholder="Confirm Password">
                                        </div>
                                    </div>

                                </div>


                                <div class="btn-area">
                                    <button class="btn-login login-auth-btn"
                                        onclick="signUp(@if ($ref != null) {{ $ref->id }} @else null @endif)"
                                        type="button"><span>Sign
                                            Up</span>
                                    </button>
                                </div>

                                <div class="login-query mt-30 text-center">
                                    <a href="{{ route('sign-in', 'client') }}">Already have an account?
                                        Login</a>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')
    <script>
        function signUp(ref) {
            axios.post('/sign-up', {
                    first_name: document.getElementById("first_name").value,
                    last_name: document.getElementById("last_name").value,
                    phone: document.getElementById("phone").value,
                    email: document.getElementById("email").value,
                    password: document.getElementById("password").value,
                    referrer_id: ref,
                    password_confirmation: document.getElementById("password_confirmation").value
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
    </script>
@endsection
