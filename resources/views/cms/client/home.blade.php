@extends('cms.client.index')

@section('title', 'Home')

@section('style')

@endsection

@section('content')
    <!-- ======================= Cards ================== -->
    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">{{ count(auth()->user()->orders)}}</div>
                <h6 class="cardName">Number of active packages</h6>
            </div>
            <div class="iconBx">
                <i class="fa-regular fa-swatchbook"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ count(auth()->user()->referrals)}}</div>
                <h6 class="cardName">number of referrals</h6>
            </div>
            <div class="iconBx">
                <i class="fa-regular fa-share-from-square"></i>
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

        <div class="card">
            <div>
                <div class="numbers">{{ auth()->user()->total_balance }} $</div>
                <h6 class="cardName">Total Balance</h6>
            </div>
            <div class="iconBx">
                <i class="far fa-money-bill"></i>
            </div>
        </div>

        <div href="massages.html" class="card">
            <div>
                <div class="numbers">{{ auth()->user()->available_balance }} $</div>
                <h6 class="cardName">the available balance</h6>
            </div>
            <div class="iconBx">
                <i class="far fa-money-bill-wave"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ auth()->user()->total_profit }} $</div>
                <div class="cardName">your Earning</div>
            </div>
            <div class="iconBx">
                <i class="far fa-envelope-open-dollar"></i>
            </div>
        </div>
    </div>


@endsection

@section('script')

@endsection
