@extends('site.index')

@section('title', 'plan')

@section('style')

@endsection

@section('content')

    <style>
        #page-banner {
            background-image: linear-gradient(90deg,
                    rgba(7, 11, 40, 0.65) 0%,
                    rgba(7, 11, 40, 0.65) 100%),
                url({{ asset('site/assets/uploads/content/vv.jpg') }});
        }
    </style>

    <!-- PAGE-BANNER -->
    <section id="page-banner">
        <div class="container">
            <div class="page-header">
                <h2 class="fontubonto font-weight-medium text-uppercase wow fadeIn" data-wow-duration="1s"
                    data-wow-delay="0.35s">
                    Plan
                </h2>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-lg-8 no-gutters">
                    <div class="page-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.7s">
                                <a href="javascript:void(0)">Plan</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /PAGE-BANNER -->

    <!-- the plans -->
    <section id="investment" class="secbg-1">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="heading-container">
                        <h6 class="topheading">INVEST OFFER</h6>
                        <h3 class="heading">Investment Plans</h3>
                        <p class="slogan">
                            We offer professional and dynamic investment plans with a high return to serve your ambitions and aspirations
                        </p>
                    </div>
                </div>
            </div>

            <div class="investment-wrapper">
                <div class="row">
                    @foreach ($plans as $plan)
                        <div class="col-md-6 col-lg-4">
                            <div class="card-type-1 card align-items-start wow fadeInUp" data-wow-duration="1s"
                                data-wow-delay="0.15s">
                                <h3 class="h3 themecolor">{{ $plan->name }}</h4>
                                    <h5 class="h5">for {{ $plan->days }} days</h5>

                                    <h4 class="h4 themecolor">
                                        ${{ $plan->min_price }} - ${{ $plan->max_price }}
                                    </h4>
                                    <div class="d-flex align-items-baseline">
                                        <h4 class="h4">{{ $plan->profit }}%</h4>
                                        <h6 class="ml-5">Every Day</h6>
                                    </div>
                                    <hr class="hr" />

                                    <a href="{{ route('order-client.create') }}"
                                        class="btn-base text-uppercase mt-30 investNow" @auth('admin') hidden @endauth>
                                        Invest Now
                                    </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- / the plans -->
@endsection

@section('script')
@endsection
