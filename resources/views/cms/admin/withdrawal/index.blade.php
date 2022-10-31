@extends('cms.admin.index')

@section('title', 'Withdrawal Requests')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Withdrawal Request / Index</h2>
        </div>

        <div class="details">
            <div class="recentOrders">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Client</td>
                            <td>Payment Method</td>
                            <td>Amount</td>
                            <td>status</td>
                            <td>created date</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($withdrawals as $withdrawal)
                            <tr>
                                <td>{{ $withdrawal->id }}</td>
                                <td>{{ $withdrawal->client->email }}</td>
                                <td>{{ $withdrawal->payment->name }}</td>
                                <td>{{ $withdrawal->amount }}</td>
                                <td style="color: @if($withdrawal->status) green; @else coral; @endif">{{ $withdrawal->status_text }}</td>
                                <td>{{ $withdrawal->created_at }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="action group">
                                        <a href="{{ route('withdrawal.show' , $withdrawal->id)}}"class="btn btn-success"><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </td>
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
