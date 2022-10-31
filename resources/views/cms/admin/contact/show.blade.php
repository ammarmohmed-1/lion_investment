@extends('cms.admin.index')

@section('title', 'Contact Us')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Contact Us / {{ $contactUs->title }}</h2>
        </div>

        <div class="details">
            <div class="recentOrders">
                {{ $contactUs->description }}
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
