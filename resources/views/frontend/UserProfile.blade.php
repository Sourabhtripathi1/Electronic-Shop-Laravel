@extends('frontend.layout.main')

@push('title')
    User Profile Page
@endpush

@push('custom')
    <link type="text/css" rel="stylesheet" href="{{ env('APP_URL') }}/frontend/css/UserDashboard.css" />
@endpush

@section('main-section')
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ env('APP_URL') }}" class="logo">
                            <img src="{{ env('APP_URL') }}/frontend/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->



                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix header-opt-cnt">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="{{ env('APP_URL') }}/user/wishlist">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">4</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ env('APP_URL') }}/frontend/img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ env('APP_URL') }}/frontend/img/product02.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ env('APP_URL') }}/frontend/img/product02.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ env('APP_URL') }}/frontend/img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="cart-summary">
                                    <small>4 Item(s) selected</small>
                                    <h5>SUBTOTAL: $2940.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="{{ env('APP_URL') }}/user/cart">View Cart</a>
                                    <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/shop">Shop </a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->



    <div class="menu" id="menu2">
        <div class="button">
            <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <style>
                    svg {
                        fill: #af3c64
                    }
                </style>
                <path
                    d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
            </svg>
        </div>
    </div>
    <div class="content-container">
        <div class="sidebar-container" id="sidebar-container">
            <div class="sidebar" id="sidebar">

                <ul>
                    <li>
                        <a href="{{ env('APP_URL') }}/user/dashboard">
                            <i class="fa-solid fa-chart-column"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ env('APP_URL') }}/user/profile">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ env('APP_URL') }}/user/cart">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Cart</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ env('APP_URL') }}/user/wishlist">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Wishlist</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ env('APP_URL') }}/user/active-orders">
                            <i class="fa-solid fa-building-user"></i>
                            <span>Active Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ env('APP_URL') }}/user/all-orders">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>All Orders</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ env('APP_URL') }}/user/logout">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>



        <div class="main-container">

            <div class="profile-header">
                <div>
                    <h1 style="color: #d10024">User Profile</h1>
                </div>
                <div>
                    <button class="save-button btn">Save Changes</button>
                </div>
            </div>


            <br>
            <div class="container">
                <div>
                    <div class="profile-record row">
                        <h3 class="col-md-4">Name</h3>
                        <input type="text" class="form-control col-md-4" name="name" id="profile_name"
                            value="{{ $user['Name'] }}">
                    </div>
                    <div class="profile-record row">
                        <h3 class="col-md-4">Username</h3>
                        <input type="text" class="form-control col-md-4" name="name" id="profile-uname"
                            value="{{ $user['Username'] }}">
                    </div>
                    <div class="profile-record row">
                        <h3 class="col-md-4">Email</h3>
                        <input type="text" class="form-control col-md-4" name="name" id="profile-email"
                            value="{{ $user['Email'] }}">
                    </div>

                </div>
            </div>


        </div>
    </div>


    <script>
        $(".save-button").click(function() {
            console.log("hello");

            var name = document.getElementById("profile_name").value;
            var Uname = document.getElementById("profile-uname").value;
            var email = document.getElementById("profile-email").value;

            $.ajax({
                type: "get",
                url: "{{ env('APP_URL') }}/user/update",
                data: {
                    name: name,
                    uname: Uname,
                    email: email,
                },
                success: function(response) {
                    console.log(response.message)
                    location.reload();
                }
            });
        });
    </script>
@endsection
