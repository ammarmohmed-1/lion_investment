@extends('site.index')

@section('title', 'blog')

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
                    Blog
                </h2>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-lg-8 no-gutters">
                    <div class="page-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.7s">
                                <a href="javascript:void(0)">Blog</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /PAGE-BANNER -->

    <!-- BLOG -->
    <section id="blog">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="heading-container">
                        <h6 class="topheading">Blog</h6>
                        <h3 class="heading">READ OUR BLOG</h3>
                        <p class="slogan">
                            Help agencies to define their new business objectives and then
                            create professional software.
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
                                    {{ $blog->description }}</br>
                                    {{ $blog->image->name }}</br>
                                    {{ $blog->image->created_at }}
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

@endsection

@section('script')
@endsection
