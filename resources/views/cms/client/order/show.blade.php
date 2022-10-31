@extends('cms.client.index')

@section('title', 'Orders')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Orders / {{ $order->id }}</h2>
            <div>
                <a href="{{ route('order-client.index') }}" class="btn btn-primary">Index All Orders</a>
                <a href="{{ route('order-client.create') }}" class="btn btn-primary">Create New Order</a>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
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
                        {{-- <p class="text-muted mb-0">id : {{ $order->client->id }} /
                            {{ $order->client->first_name . ' ' . $order->client->last_name }}</p> --}}
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Plan</p>
                    </div>
                    <div class="col-sm-9">
                        {{-- <p class="text-muted mb-0">id : {{ $order->plan->id }} / {{ $order->plan->name }} /
                            {{ $order->plan->min_price }}$ -
                            {{ $order->plan->max_price }}$ </p> --}}
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
                        {{-- <p class="text-muted mb-0">{{ $order->plan->profit }}%</p> --}}
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
        </div>

    </div>
@endsection

@section('script')
@endsection
