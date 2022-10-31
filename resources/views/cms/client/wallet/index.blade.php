@extends('cms.client.index')

@section('title', 'Home')

@section('style')

@endsection

@section('content')

    <div class='container'>
        <div class="header-page">
            <h2>Wallet</h2>
        </div>

        <div class="cardBox">

            <div class="card">
                <div>
                    <div class="numbers">{{ auth()->user()->total_balance }} $</div>
                    <h6 class="cardName"> total balance</h6>
                </div>
                <div class="iconBx">
                    <i class="fa-regular fa-money-bill"></i>
                </div>
            </div>
    
            <div class="card">
                <div>
                    <div class="numbers">{{ auth()->user()->used_balance }} $</div>
                    <h6 class="cardName">Balance used</h6>
                </div>
                <div class="iconBx">
                    <i class="fa-regular fa-money-bill"></i>
                </div>
            </div>
    
            <div class="card">
                <div>
                    <div class="numbers">{{ auth()->user()->available_balance }} $</div>
                    <div class="cardName">the available balance</div>
                </div>
                <div class="iconBx">
                    <i class="fa-regular fa-money-bill"></i>
                </div>
            </div>
    
            <div class="card">
                <div>
                    <div class="numbers">{{ auth()->user()->profit_from_referral }} $</div>
                    <div class="cardName">porfits from referrals</div>
                </div>
                <div class="iconBx">
                    <i class="far fa-money-bill-wave"></i>
                </div>
            </div>
    
            <div href="massages.html" class="card">
                <div>
                    <div class="numbers">{{ auth()->user()->profit_from_investment }} $</div>
                    <h6 class="cardName">Profits from investment</h6>
                </div>
                <div class="iconBx">
                    <i class="far fa-hand-holding-usd"></i>
                </div>
            </div>
    
            <div class="card">
                <div>
                    <div class="numbers">{{ auth()->user()->total_profit }} $</div>
                    <h6 class="cardName">Total Profit</h6>
                </div>
                <div class="iconBx">
                    <i class="far fa-envelope-open-dollar"></i>
                </div>
            </div>
    
            <div class="card">
                <div>
                    <div class="numbers">{{ auth()->user()->withdrawable_balance}}$</div>
                    <div class="cardName">Withdrawable balance</div>
                </div>
                <div class="iconBx">
                    <i class="far fa-hands-usd"></i>
                </div>
            </div>
        </div>

        <div class="header-page">
            <h2>Deposit Requests</h2>
        </div>
        <div class="details">
            <div class="recentOrders">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Amount</td>
                            <td>status</td>
                            <td>Balance</td>
                            <td>created date</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($deposits as $deposit)
                            <tr>
                                <td>{{ $deposit->id }}</td>
                                <td>{{ $deposit->amount }}</td>
                                <td>{{ $deposit->status_text }}</td>
                                <td style="color: @if($deposit->status) green; @else coral; @endif">@if($deposit->status) + @endif {{ $deposit->amount }}</td>
                                <td>{{ $deposit->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="header-page">
            <h2>Withdrawal Requests</h2>
        </div>
        <div class="details">
            <div class="recentOrders">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Amount</td>
                            <td>status</td>
                            <td>Balance</td>
                            <td>created date</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($withdrawals as $withdrawal)
                            <tr>
                                <td>{{ $withdrawal->id }}</td>
                                <td>{{ $withdrawal->amount }}</td>
                                <td>{{ $withdrawal->status }}</td>
                                <td style="color: @if($withdrawal->status) red; @else coral; @endif" >@if($withdrawal->status) - @endif {{ $withdrawal->amount }} $</td>
                                <td>{{ $withdrawal->created_at }}</td>
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
