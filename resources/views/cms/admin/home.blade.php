@extends('cms.admin.index')

@section('title', 'Home')
@section('title-page', 'Home / Dashboard')

@section('style')

@endsection

@section('content')
    <!-- ======================= Cards ================== -->
    <div class="cardBox">
        <div class="card">
            <a href="{{ route('admin.index') }}">
                <div>
                    <div class="numbers">{{ $numberOfAdmins }}</div>
                    <h6 class="cardName">Number Of Admins</h6>
                </div>
            </a>
            <div class="iconBx">
                <i class="fa-regular fa-user-crown"></i>
            </div>
        </div>

        <div class="card">
            <a href="{{ route('client.index') }}">
                <div>
                    <div class="numbers">{{ $numberOfClients }}</div>
                    <h6 class="cardName">Number Of Clients</h6>
                </div>
            </a>
            <div class="iconBx">
                <i class="fa-regular fa-user"></i>
            </div>
        </div>

        <div class="card">
            <a href="{{ route('blog.index') }}">
                <div>
                    <div class="numbers">{{ $numberOfBlogs }}</div>
                    <h6 class="cardName">Number Of Blogs</h6>
                </div>
            </a>
            <div class="iconBx">
                <i class="fa-regular fa-newspaper"></i>
            </div>
        </div>

        <div class="card">
            <a href="{{ route('plan.index') }}">
                <div>
                    <div class="numbers">{{ $numberOfPlans }}</div>
                    <h6 class="cardName">Number Of Plans</h6>
                </div>
            </a>
            <div class="iconBx">
                <i class="fa-regular fa-swatchbook"></i>
            </div>
        </div>

        <div class="card">
            <a href="{{ route('payment.index') }}">
                <div>
                    <div class="numbers">{{ $numberOfPayments }}</div>
                    <h6 class="cardName">Number Of Payment methods</h6>
                </div>
            </a>


            <div class="iconBx">
                <i class="fa-regular fa-envelope-open-dollar"></i>
            </div>
        </div>

        <div class="card">
            <a href="{{ route('contact.index') }}">
                <div>
                    <div class="numbers">{{ $numberOfContactUss }}</div>
                    <h6 class="cardName">Number Of Contact Us</h6>
                </div>
            </a>


            <div class="iconBx">
                <i class="fa-regular fa-headset"></i>
            </div>
        </div>

        {{-- <div class="card">
            <div>
                <div class="numbers"></div>
                <div class="cardName">Earning</div>
            </div>

            <div class="iconBx">
                <ion-icon name="cash-outline"></ion-icon>
            </div>
        </div> --}}

        @foreach ($plans as $plan)
            <div class="card">
                <div>
                    <div class="numbers">{{ count($plan->orders) }}</div>
                    <div class="cardName">Order From The {{ $plan->name }}</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="bar-chart-outline"></ion-icon>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('script')

@endsection
