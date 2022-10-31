@extends('cms.admin.index')

@section('title', 'Deposit Requests')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Deposit Request / Index</h2>
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
                        @foreach ($deposits as $deposit)
                            <tr>
                                <td>{{ $deposit->id }}</td>
                                <td>{{ $deposit->client->email }}</td>
                                <td>{{ $deposit->payment->name }}</td>
                                <td>{{ $deposit->amount }}</td>
                                <td style="color: @if($deposit->status) green; @else coral; @endif">{{ $deposit->status_text }}</td>
                                <td>{{ $deposit->created_at }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="action group">
                                        <a href="{{ route('deposit.show' , $deposit->id)}}"class="btn btn-success"><i class="fa-regular fa-eye"></i></a>
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
