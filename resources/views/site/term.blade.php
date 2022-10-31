@extends('site.index')

@section('title', ' Terms & Conditions')

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
                    data-wow-delay="0.35s"> Terms &amp; Conditions</h2>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-lg-8 no-gutters">
                    <div class="page-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s"><a
                                    href="../index.html">Home</a></li>
                            <li class="breadcrumb-item wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.7s"><a
                                    href="javascript:void(0)"> Terms &amp; Conditions</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /PAGE-BANNER -->

    <!-- POLICY -->
    <section id="policy">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="heading-container">
                        <h3 class="heading">Terms &amp; Conditions</h3>
                    </div>
                </div>
            </div>

            <div class="policy wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.35s">
                <p>
                    1. Investing in startups is associated with high risks, so you should choose reliable companies like ours, and dealing with a startup may lead to the complete loss of your investment. You should not invest money that you can only afford to lose in strong companies like Lion Investment. Investing through our site is a long-term investment suitable for long-term investors. The investment opportunities at the present time are strong. The user should read this agreement carefully as it explains the details of the service provided by Lion Investment and specifies the obligations and rights between the Lion Investment platform and the user. The use of the platform is prohibited in the event of not understanding and understanding all the articles of the agreement. This is the agreement of Lion Investment and all its sub-pages and all contractual relationships between the company
                </p>
                <p><br /></p>
                <p>
                    2. The Lion Investment Collective Funding Company Terms and Conditions ("Terms and Conditions") are the comprehensive general document of the terms and conditions of use of our site and are applicable in all its corners and its primary purpose is to set the general characteristics of investment through the site.
                </p>
                <p><br /></p>
                <p>
                    3. The terms and conditions are in force and in force, which the site may resort to amending, updating, and developing from time to time in order to protect its interests and the interests of its users and visitors.
                </p>
                <p><br /></p>
                <p>4. Users of the site should read the terms and conditions of the Lion Investment site very carefully as they explain the details of the service provided by our site and specify the obligations and rights between the site and its users.</p>
                <p><br /></p>
                <p>5. Lion Investment offers investment services in financial markets and cryptocurrencies; for investors to benefit; They exchange profits.
                </p>
                <p><br /></p>
                <p>6. This preamble is an integral part of the platform terms and conditions document; It has been drafted only to simplify to the users of our site, but it does not limit, limit or limit the effects or enforceability of the terms and conditions or any other document that may be subject to the users of the site by virtue of their use of the site. Lion Investment©</p>
            </div>
        </div>
    </section>
    <!-- /POLICY -->
@endsection

@section('script')
@endsection
