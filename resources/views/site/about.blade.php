@extends('site.index')

@section('title', 'About Us')

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
                    About Us
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
                                <a href="javascript:void(0)">About Us</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /PAGE-BANNER -->

       <!-- Questions -->
       <section id="investment-plan">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="heading-container">
                        <h6 class="topheading">CHOOSE INVESTMENT</h6>
                        <h3 class="heading">Why Choose lion Investment</h3>
                        <p class="slogan">
                            Stick to your path to financial freedom We offer valuable opportunities for long-term investment
                        </p>
                    </div>
                </div>
            </div>

            <div class="investment-plan-wrapper">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-type-1 card align-items-start wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.15s">
                            <div class="media">
                                <div class="card-icon">
                                    <img src="{{ asset('site/assets/uploads/content/6059d1dc3d49c1616499164.png') }}"
                                        alt="..." />
                                </div>
                                <div class="media-body ml-20">
                                    <h5 class="mb-15">Expert Management</h5>
                                    <p class="text">
                                        We have a professional team working in a dynamic way, aiming to achieve long-term
                                        investment profits while maintaining a safe capital.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-type-1 card align-items-start wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.15s">
                            <div class="media">
                                <div class="card-icon">
                                    <img src="{{ asset('site/assets/uploads/content/6059d1f3e73c31616499187.png') }}"
                                        alt="..." />
                                </div>
                                <div class="media-body ml-20">
                                    <h5 class="mb-15">Registered Company</h5>
                                    <p class="text">
                                        Our company is registered in many countries and there are certificates of
                                        recommendations submitted for our project.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-type-1 card align-items-start wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.15s">
                            <div class="media">
                                <div class="card-icon">
                                    <img src="{{ asset('site/assets/uploads/content/6059d211043951616499217.png') }}"
                                        alt="..." />
                                </div>
                                <div class="media-body ml-20">
                                    <h5 class="mb-15">Secure Investment</h5>
                                    <p class="text">
                                        Investing with us is safe and risk-free, your money is safe and we have a cold bank
                                        account that covers the capital of investors, rest assured of our professional work.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-type-1 card align-items-start wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.15s">
                            <div class="media">
                                <div class="card-icon">
                                    <img src="{{ asset('site/assets/uploads/content/6059d256689491616499286.png') }}"
                                        alt="..." />
                                </div>
                                <div class="media-body ml-20">
                                    <h5 class="mb-15">Verified Security</h5>
                                    <p class="text">
                                        Guaranteed security of your investment. Withdraw high interest everyday.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-type-1 card align-items-start wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.15s">
                            <div class="media">
                                <div class="card-icon">
                                    <img src="{{ asset('site/assets/uploads/content/6059d265882661616499301.png') }}"
                                        alt="..." />
                                </div>
                                <div class="media-body ml-20">
                                    <h5 class="mb-15">Instant Withdrawal</h5>
                                    <p class="text">
                                        Payments are processed manually and take ten minutes from the time you place the order
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-type-1 card align-items-start wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.15s">
                            <div class="media">
                                <div class="card-icon">
                                    <img src="{{ asset('site/assets/uploads/content/6059d277c4a551616499319.png') }}"
                                        alt="..." />
                                </div>
                                <div class="media-body ml-20">
                                    <h5 class="mb-15">24 hour support service. call us</h5>
                                    <p class="text">
                                        Have a question? Or maybe a suggestion that will help us improve the website? We are
                                        always here to help you at any time. We provide support in English language.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Questions -->


    <!-- ABOUT-US -->
    <section id="about-us">
        <div class="container">
            <div class="heading-container">
                <h6 class="topheading">ABOUT US</h6>
                <h3 class="heading">Welcome to Lion investment</h3>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="wrapper d-flex justify-content-center justify-content-xl-start wow fadeInLeft"
                        data-wow-duration="1s" data-wow-delay="0.35s">
                        <div class="d-flex position-relative">
                            <div class="about-fig">
                                <img src="{{ asset('site/assets/uploads/content/6059d0567cd0e1616498774.jpg') }}"
                                    alt="Image Missing" />
                            </div>
                            <div class="about-overlay-fig">
                                <img class="img-fill"
                                    src="{{ asset('site/assets/uploads/content/6059d0567cd0e1616498774.jpg') }}"
                                    alt="Image Missing" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex align-items-center h-fill">
                        <div class="text-wrapper wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.35s">
                            <h6 class="h6 text-center text-xl-left">
                                Our company offers you a stake in a highly profitable business based on cryptocurrency
                                mining and trading. Being in the cryptocurrency market since 2012, we have accumulated a
                                huge knowledge base and experience in this field. Our team employs professional traders,
                                analysts, political scientists and sociologists. We have developed a hassle free system, and
                                our revenue is constantly increasing. We guarantee a stable profit to every investor in the
                                company.
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /ABOUT-US -->

@endsection

@section('script')
@endsection
