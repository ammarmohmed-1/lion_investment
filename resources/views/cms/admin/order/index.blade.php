@extends('cms.admin.index')

@section('title', 'Orders')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Orders / Index</h2>
        </div>

        <div class="details">
            <div class="recentOrders">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Client</td>
                            <td>plan</td>
                            <td>Amount</td>
                            <td>profit</td>
                            <td>created date</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->client->first_name . $order->client->last_name }}</td>
                                <td>{{ $order->plan->name }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->total_profit }}</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
