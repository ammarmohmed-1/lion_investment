<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | @yield('title')</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('cms/admin/assets/css/style.css') }}">

    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('assets/icon/font-awesome/css/all.min.css') }}">
    @yield('style')
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="navigation">
        <ul>
            <li>
                <span class="logo">
                    <img src="{{ asset('site/assets/uploads/logo/logo.png') }}" alt="logo">
                </span>
            </li>
            <li>
                <a href="{{ route('admin-home') }}">
                    <span class="icon">
                        <i class="fa-regular fa-house-blank"></i>
                    </span>
                    <span class="title">Home</span>
                </a>
            </li>

            <li>
                <a href="{{ route('home') }}">
                    <span class="icon">
                        <i class="fa-regular fa-globe"></i>
                    </span>
                    <span class="title">Website</span>
                </a>
            </li>
{{--  --}}
            @if  (Auth::user()->role_id==2)
            
                <li>
                    <a href="{{ route('admin.index') }}">
                        <span class="icon">
                            <i class="fa-regular fa-user-crown"></i>
                        </span>
                        <span class="title">Admins</span>
                    </a>
                </li>
            @endif
{{--  --}}
            <li>
                <a href="{{ route('client.index') }}">
                    <span class="icon">
                        <i class="fa-regular fa-user"></i>
                    </span>
                    <span class="title">Clients</span>
                </a>
            </li>
            @if  (Auth::user()->role_id==2)
            <li>
                <a href="{{ route('plan.index') }}">
                    <span class="icon">
                        <i class="fa-regular fa-swatchbook"></i>
                    </span>
                    <span class="title">Plans</span>
                </a>
            </li>

            <li>
                <a href="{{ route('payment.index') }}">
                    <span class="icon">
                        <i class="fa-regular fa-envelope-open-dollar"></i>
                    </span>
                    <span class="title">Payments</span>
                </a>
            </li>

            <li>
                <a href="{{ route('deposit.index') }}">
                    <span class="icon">
                        <i class="fa-regular fa-money-from-bracket"></i>
                    </span>
                    <span class="title">Deposit Requests</span>
                </a>
            </li>

            <li>
                <a href="{{ route('withdrawal.index') }}">
                    <span class="icon">
                        <i class="fa-regular fa-money-simple-from-bracket"></i>
                    </span>
                    <span class="title">Withdrawal Requests</span>
                </a>
            </li>
@endif
            <li>
                <a href=" {{ route('order.index') }} ">
                    <span class="icon">
                        <i class="fa-regular fa-bring-front"></i>
                    </span>
                    <span class="title">orders</span>
                </a>
            </li>

            <li>
                <a href=" {{ route('message.index') }} ">
                    <span class="icon">
                        <i class="fa-regular fa-comment-captions"></i>
                    </span>
                    <span class="title">Chats</span>
                </a>
            </li>
            @if  (Auth::user()->role_id==2)
            <li>
                <a href=" {{ route('forget.index') }} ">
                    <span class="icon">
                        <i class="fa-regular fa-key"></i>
                    </span>
                    <span class="title">Password recovery requests</span>
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('blog.index') }}">
                    <span class="icon">
                        <i class="fa-regular fa-newspaper"></i>
                    </span>
                    <span class="title">Plog</span>
                </a>
            </li>

            <li>
                <a href="{{ route('contact.index') }}">
                    <span class="icon">
                        <i class="fa-regular fa-headset"></i>
                    </span>
                    <span class="title">Contact Us</span>
                </a>
            </li>

            <li>
                <a href="{{ route('sign-out') }}">
                    <span class="icon">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- ====== Main ====== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="user">
                {{-- <img src="{{ asset('assets/imgs/customer01.jpg') }}" alt=""> --}}
            </div>
        </div>
        <!-- =============== Navigation ================ -->


        <!-- ================ Order Details List ================= -->
        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <!-- =========== Scripts =========  -->
        <script src="{{ asset('cms/admin/assets/js/main.js') }}"></script>

        @yield('script')
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
