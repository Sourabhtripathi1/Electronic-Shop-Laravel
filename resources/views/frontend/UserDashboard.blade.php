@extends('frontend.layout.main')

@push('title')
    User Dashboard Page
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
                                <div class="qty">{{ $wish_count }}</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                @if (session('user_id') !== null)
                                    <div class="qty">{{ count($cart) }}</div>
                                @else
                                    <div class="qty">0</div>
                                @endif
                            </a>
                            <div class="cart-dropdown">
                                @if (session('user_id') !== null)
                                    @if (count($cart) > 0)
                                        <div class="cart-list">
                                            @foreach ($cart as $item)
                                                <div class="product-widget">
                                                    <div class="product-img">
                                                        <img src="{{ asset('/storage/site-assets/') }}/{{ getVariantImage(getFirstVariant($item['Product_id'], $products, $variants), $variants, $pictures) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-name"><a
                                                                href="{{ env('APP_URL') }}/product/{{ $item['Product_id'] }}">
                                                                {{ getProductName($item['Product_id'], $products) }}</a>
                                                        </h3>
                                                        <h4 class="product-price"><span
                                                                class="qty">{{ $item['Quantity'] }}x</span>₹{{ getPrice($item['Product_id'], $variants) }}
                                                        </h4>
                                                    </div>
                                                    <button class="delete"><i class="fa fa-close"></i></button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="cart-summary">
                                            <small>{{ count($cart) }} Item(s) selected</small>
                                            <h5>SUBTOTAL: ₹{{ getCartTotal($cart) }}</h5>
                                        </div>
                                    @else
                                        cart is empty
                                    @endif
                                    <div class="cart-btns">
                                        <a href="{{ env('APP_URL') }}/user/cart">View Cart</a>
                                        <a href="{{ env('APP_URL') }}/user/checkout">Checkout <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                @else
                                    Please Login !

                                    <br>

                                    <a href="{{ env('APP_URL') }}/user/dashboard"
                                        class="cart_login"><button>Login</button></a>
                                @endif
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
                    <li class="active">
                        <a href="{{ env('APP_URL') }}/user/dashboard">
                            <i class="fa-solid fa-chart-column"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
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


            <div class="card-wrapper-d">

                <div class="card-d">
                    <div class="card-container-d">
                        <a href="{{ env('APP_URL') }}/user/cart">
                            <div class="card-body-d">
                                <div class="content">
                                    <div class="card-heading-d">
                                        <h4>Cart</h4>
                                    </div>
                                    <div class="card-count">
                                        <h3>13</h3>
                                    </div>
                                </div>
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="36"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path fill="#d10024"
                                            d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card-d">
                    <div class="card-container-d">
                        <a href="{{ env('APP_URL') }}/user/wishlist">
                            <div class="card-body-d">
                                <div class="content">
                                    <div class="card-heading-d">
                                        <h4>Wishlist</h4>
                                    </div>
                                    <div class="card-count">
                                        <h3>13</h3>
                                    </div>
                                </div>
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32"
                                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path fill="#d10024"
                                            d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card-d">
                    <div class="card-container-d">
                        <a href="{{ env('APP_URL') }}/user/active-orders">
                            <div class="card-body-d">
                                <div class="content">
                                    <div class="card-heading-d">
                                        <h4>Active Orders</h4>
                                    </div>
                                    <div class="card-count">
                                        <h3>13</h3>
                                    </div>
                                </div>
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="24"
                                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path fill="#d10024"
                                            d="M280 64h40c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h40 9.6C121 27.5 153.3 0 192 0s71 27.5 78.4 64H280zM64 112c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320c8.8 0 16-7.2 16-16V128c0-8.8-7.2-16-16-16H304v24c0 13.3-10.7 24-24 24H192 104c-13.3 0-24-10.7-24-24V112H64zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card-d">
                    <div class="card-container-d">
                        <a href="{{ env('APP_URL') }}/user/all-orders">
                            <div class="card-body-d">
                                <div class="content">
                                    <div class="card-heading-d">
                                        <h4>All Orders</h4>
                                    </div>
                                    <div class="card-count">
                                        <h3>13</h3>
                                    </div>
                                </div>
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="24"
                                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path fill="#d10024"
                                            d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM305 273L177 401c-9.4 9.4-24.6 9.4-33.9 0L79 337c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L271 239c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>






        </div>
    </div>

@endsection
