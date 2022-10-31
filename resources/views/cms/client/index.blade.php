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
                <a href="{{ route('home') }}">
                    <span class="icon">
                        <i class="fa-regular fa-globe"></i>
                    </span>
                    <span class="title">Home</span>
                </a>
            </li>

            <li>
                <a href="{{ route('client-home') }}">
                    <span class="icon">
                        <i class="fa-regular fa-house-blank"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>


            <li>
                <a href=" {{ route('plan') }} ">
                    <span class="icon">
                        <i class="fa-regular fa-bring-front"></i>
                    </span>
                    <span class="title">Investment Plans</span>
                </a>
            </li>

            <li>
                <a href=" {{ route('order-client.index') }} ">
                    <span class="icon">
                        <i class="fa-regular fa-bring-front"></i>
                    </span>
                    <span class="title">Investment Record</span>
                </a>
            </li>

            <li>
                <a href=" {{ route('client-wallet') }} ">
                    <span class="icon">
                        <i class="fa-regular fa-wallet"></i>
                    </span>
                    <span class="title">Wallet</span>
                </a>
            </li>

            <li>
                <a href=" {{ route('client-deposit') }} ">
                    <span class="icon">
                        <i class="fa-regular fa-wallet"></i>
                    </span>
                    <span class="title">Deposite Request</span>
                </a>
            </li>

            <li>
                <a href=" {{ route('client-withdrawal') }} ">
                    <span class="icon">
                        <i class="fa-regular fa-wallet"></i>
                    </span>
                    <span class="title">Withdrawal Request</span>
                </a>
            </li>

            <li>
                <a href=" {{ route('client-referral') }} ">
                    <span class="icon">
                        <i class="fa-regular fa-share-from-square"></i>
                    </span>
                    <span class="title">Referrals</span>
                </a>
            </li>

            <li>
                <a href=" {{ route('client-chat') }} ">
                    <span class="icon">
                        <i class="fa-regular fa-comment-captions"></i>
                    </span>
                    <span class="title">Chat</span>
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
                {{-- <img src="assets/imgs/customer01.jpg" alt=""> --}}
            </div>
        </div>
        <!-- =============== Navigation ================ -->


        <!-- ================ Order Details List ================= -->
        <div class='container'>
          
      
            @yield('content')
      </div>  

        </script>


        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- =========== Scripts =========  -->
        <script src="{{ asset('cms/client/js/main.js') }}"></script>



        @yield('script')

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
