@extends('cms.client.index')

@section('title', 'Orders')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Investment Plans</h2>
        </div>

        <div class="details">
            <div class="recentOrders">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>plan</td>
                            <td>Amount</td>
                            <td>profit</td>
                            <td>total profit</td>
                            <td>created date</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->plan->name }}</td>
                                <td>{{ $order->price }} $</td>
                                <td>
                                    {{ $order->profit }} $ evary Day for {{ $order->plan->days }} Days
                                </td>
                                <td>{{ $order->total_profit }} $</td>
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
