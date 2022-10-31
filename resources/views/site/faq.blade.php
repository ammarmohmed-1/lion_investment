@extends('site.index')

@section('title', 'FAQ')

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
                    data-wow-delay="0.35s">
                    FAQ
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
                                <a href="javascript:void(0)">FAQ</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /PAGE-BANNER -->

        <!--  Q & A -->
        <section id="faq">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="heading-container">
                            <h6 class="topheading">ANY QUESTIONS</h6>
                            <h3 class="heading">We've Got Answers</h3>
                            <p class="slogan">
                                We can answer any question or inquiry about our website. We accept any opinions that contribute to improving the site and developing the work plan
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq-wrapper">
                    <div class="faq-accordion">
                        <div class="faq-card card">
                            <div class="card-header">
                                <button class="btn-faq rotate-icon">
                                    How do we invest ?
                                </button>
                            </div>
                            <div class="card-body preview">
                                <div class="faq-content">
                                    <p class="text">
                                        Our site offers the service of investing money with ease. Choose an appropriate investment plan from the available plans, make a deposit with the appropriate amount for the plan, get a percentage of the profits, and withdraw your profits at any time
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="faq-card card">
                            <div class="card-header">
                                <button class="btn-faq rotate-icon">
                                    How long will the project last ?
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="faq-content">
                                    <p class="text">
                                        Our project is long-term and ongoing. Our team is ready to meet all challenges to maintain a stable flow plan that meets your financial desires
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="faq-card card">
                            <div class="card-header">
                                <button class="btn-faq rotate-icon">
                                    Will my money be safe
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="faq-content">
                                    <p class="text">
                                        Rest assured that your money is safe We have a reserve fund that is able to cover any potential loss on capital and avoid any financial difficulties we may face You are safe
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="faq-card card">
                            <div class="card-header">
                                <button class="btn-faq rotate-icon">
                                    Do we have another project?
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="faq-content">
                                    <p class="text">
                                        We have several huge investment projects on the ground and we have a seasoned expert team that takes us towards a better financial future
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- / Q & A -->

@endsection

@section('script')
@endsection
