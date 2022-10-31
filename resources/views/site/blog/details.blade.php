@extends('site.index')

@section('title', 'blog Details')

@section('style')
@endsection

@section('content')
    <!-- PAGE-BANNER -->
    <section id="page-banner">
        <div class="container">
            <div class="page-header">
                <h2 class="fontubonto font-weight-medium text-uppercase wow fadeIn" data-wow-duration="1s"
                    data-wow-delay="0.35s">
                    Blog Details
                </h2>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-lg-8 no-gutters">
                    <div class="page-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                <a href="../../index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.7s">
                                <a href="javascript:void(0)">Blog Details</a>
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
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-blog card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.35s">
                        <div class="fig-container">
                            <img class="br-4 w-fill" src="{{ asset($blog->image->path) }}" alt="Amet pulvinar varius" />
                        </div>
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between w-fill mt-15 mb-15">
                                <p class="text">BY- {{ $blog->writer }}</p>
                                <p class="text">
                                    {{ date_parse($blog->created_at)['day'] . ' - ' . date('F', mktime(0, 0, 0, date_parse($blog->created_at)['month'], 10)) . ' - ' . date_parse($blog->created_at)['year'] }}
                                </p>
                            </div>

                            <h5 class="h5 mb-15 mt-15">{{ $blog->title }}</h5>
                            <div class="paragraph mb-10">
                                <p>
                                    {{ $blog->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-wrapper wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
                            <h6 class="h6 mb-20">Recent Post</h6>
                            <div class="recent-post">
                                @foreach ($blogs as $blog)
                                    <a class="media align-items-center" href="{{route('blog-details' , $blog->id )}}">
                                        <div class="media-img">
                                            <img class="br-4"
                                                src="{{$blog->image->path}}"
                                                alt="Amet pulvinar varius" />
                                        </div>
                                        <div class="media-body ml-15">
                                            <p class="text hover-text">{{$blog->title}}</p>
                                            <p class="text">{{$blog->created_at}}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /BLOG -->
@endsection

@section('script')
@endsection
