@extends('site.index')

@section('title', 'Home')

@section('style')
@endsection

@section('content')
    <header id="hero">
        <div class="container">
            <div class="d-flex align-content-center justify-content-center">
                <div class="col-md-8">
                    <div class="hero-content h-100 text-center">
                        <h1 class="h1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                            BEST INVESTMENTS
                        </h1>
                        <h1 class="h1 mt-10 mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                            PLAN FOR WORLDWIDE
                        </h1>
                        <h6 class="h6 mb-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                            Put your investing ideas into action with full range of
                            investments. Enjoy real benefits and rewards on your accrue
                            investing.
                        </h6>
                        <a class="btn-hero mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s"
                            href="{{ route('plan')}}" @auth('admin') hidden @endauth>
                            <span>Invest Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- FEATURE -->
    <section id="feature">
        <div class="feature-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-type-1 card wow fadeInUp" data-wow-duration="1s" data-wow-dealy="0.1s">
                            <div class="card-icon">
                                <img class="card-img-top"
                                    src="{{ asset('site/assets/uploads/content/6059cfe53e23c1616498661.png') }}"
                                    alt="...." />
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{ $client }}</h3>
                                <h5 class="card-text">All Members</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-type-1 card wow fadeInUp" data-wow-duration="1s" data-wow-dealy="0.1s">
                            <div class="card-icon">
                                <img class="card-img-top"
                                    src="{{ asset('site/assets/uploads/content/6059cffa761cf1616498682.png') }}"
                                    alt="...." />
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{ $order_count }} $</h3>
                                <h5 class="card-text">Average Investment</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-type-1 card wow fadeInUp" data-wow-duration="1s" data-wow-dealy="0.1s">
                            <div class="card-icon">
                                <img class="card-img-top"
                                    src="{{ asset('site/assets/uploads/content/6059d009691101616498697.png') }}"
                                    alt="...." />
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">200</h3>
                                <h5 class="card-text">Countries Supported</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /FEATURE -->



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

    <!-- Questions -->
    <section id="investment-plan">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="heading-container">
                        <h6 class="topheading">CHOOSE INVESTMENT</h6>
                        <h3 class="heading">Why Choose  Lion Investment</h3>
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

    <!-- the plan -->
    <section id="investment">
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
                                        <h6 class="ml-5">Every day</h6>
                                    </div>
                                    <hr class="hr" />

                                    <a href="{{ route('order-client.create') }}" class="btn-base text-uppercase mt-30 investNow"
                                        @auth('admin') hidden @endauth>
                                        Invest Now
                                    </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /the plan -->

    <!-- BLOG -->
    <section id="blog">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="heading-container">
                        <h6 class="topheading">Blog</h6>
                        <h3 class="heading">READ OUR BLOG</h3>
                        <p class="slogan">
                            Articles submitted by our team for you to continue to develop yourself and keep pace with economic and financial progress
                        </p>
                    </div>
                </div>
            </div>

            <div class="blog-wrapper">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-6 col-lg-4">
                            <a class="card-blog card wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.15s"
                                href="{{ route('blog-details', $blog->id) }}">
                                <div class="fig-container">
                                    <img src="{{ asset($blog->image->path) }}" alt="Image Missing" />
                                </div>
                                <h5 class="h5 mt-5 mb-5">{{ $blog->title }}</h5>
                                <p class="trunc text">
                                    {{ $blog->description }}
                                </p>
                                <div class="date-wrapper colorbg-1">
                                    <h4 class="font-weight-medium fontubonto">{{ date_parse($blog->created_at)['day'] }}
                                    </h4>
                                    <h4 class="font-weight-medium fontubonto">
                                        {{ date('F', mktime(0, 0, 0, date_parse($blog->created_at)['month'], 10)) }}</h4>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /BLOG -->

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

    <!-- PAYMENT-METHOD -->
    <section id="payment-method">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="heading-container">
                        <h6 class="topheading">PAYMENTS</h6>
                        <h3 class="heading">payment methods</h3>
                        <p class="slogan">
                            Deposit and withdrawal methods available on our website at the moment
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="carousel-container wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.15s">
                <div class="carousel-payment owl-carousel owl-theme">
                    @foreach ($payments as $payment)
                        <div class="item-carousel">
                            <div class="payment-fig">
                                <img src="{{ asset($payment->image->path)}}" alt="Payeer" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /PAYMENT-METHOD -->
@endsection

@section('script')
@endsection
