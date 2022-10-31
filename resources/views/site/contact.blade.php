@extends('site.index')

@section('title', 'Contact Us')

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
                    data-wow-delay="0.35s">Contact Us</h2>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-lg-8 no-gutters">
                    <div class="page-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s"><a
                                    href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.7s"><a
                                    href="javascript:void(0)">Contact US</a></li>
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
                                <div class="form-group mb-30">
                                    <input class="form-control" type="text" id="name" placeholder="Name">
                                </div>

                                <div class="form-group mb-30">
                                    <input class="form-control" type="email" id="email" placeholder="Email">
                                </div>

                                <div class="form-group mb-20">
                                    <input class="form-control" type="text" id="title" placeholder="Title">
                                </div>

                                <div class="form-floating mb-20">
                                    <textarea style="min-height: 8rem;" class="form-control" type="text" id="description" placeholder="Description"></textarea>
                                </div>

                                <div class="btn-area">
                                    <button onclick="store()" class="btn-login login-auth-btn"
                                        type="button"><span>Send</span></button>
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
        function store() {
            axios.post('contact', {
                    name: document.getElementById("name").value,
                    email: document.getElementById("email").value,
                    title: document.getElementById("title").value,
                    description: document.getElementById("description").value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
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
