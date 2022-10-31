@extends('cms.admin.index')

@section('title', 'Orders')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Orders / {{ $order->id }}</h2>
            <div>
                <a href="{{ route('order.index') }}" class="btn btn-primary">Index All Orders</a>
            </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">Information</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Actions</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">

                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Order Id</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $order->id }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Order Date & Time</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $order->created_at }}</p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Client</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">id : {{ $order->client->id }} /
                            {{ $order->client->first_name . ' ' . $order->client->last_name }}</p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Plan</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">id : {{ $order->plan->id }} / {{ $order->plan->name }} /
                            {{ $order->plan->min_price }}$ -
                            {{ $order->plan->max_price }}$ </p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Amount</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">
                            {{ $order->price }}
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Profit</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $order->plan->profit }}%</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Status</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $order->status }}</p>
                    </div>
                </div>
                <hr>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <div class="details">
                    <div class="recentOrders">
                        {{-- <button type="button" onclick="#" class="btn btn-primary">Update
                            Order</button>

                        <button type="button" onclick="#" class="btn btn-primary">Update
                            Order</button>

                        <button type="button" onclick="#" class="btn btn-primary">Update
                            Order</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
