@extends('frontend.layout.main')

@push('title')
Active Orders Page
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
                        <div class="qty">{{$wish_count}}</div>
                    </a>
                </div>
                <!-- /Wishlist -->

                <!-- Cart -->
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Your Cart</span>
                        @if (session('user_id') !== null)
                        <div class="qty">{{count($cart)}}</div>
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
                                            <h3 class="product-name"><a href="{{ env('APP_URL') }}/product/{{ $item['Product_id'] }}">
                                                {{ getProductName($item['Product_id'], $products) }}</a>
                                            </h3>
                                            <h4 class="product-price"><span class="qty">{{$item['Quantity']}}x</span>₹{{ getPrice($item['Product_id'], $variants) }}</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="cart-summary">
                                    <small>{{count($cart)}} Item(s) selected</small>
                                    <h5>SUBTOTAL: ₹{{getCartTotal($cart)}}</h5>
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
        <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <style>
                svg {
                    fill: #af3c64
                }
            </style>
            <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
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
                <li class="active">
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
        @if (count($orders) > 0)
        <h1 style="color: #d10024;">Active orders</h1>

        <br>
        <table class="table table-striped allOrders-table">

            <thead>
                <tr>

                    <th>
                      <div style="display: flex;justify-content: space-between;">
                        <div>Product</div>
                        <div>Price</div>
                      </div>
                    </th>

                    <th>
                        <div>
                            Status
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    @php
                        $ord = getOrders($item['Order_id'], $order_details);
                    @endphp
                    <tr>
                        <td class="order-product">
                            @foreach ($ord as $ord_item)
                                <div class="prod-set">
                                    <div class="prod-img">
                                        <img src="{{ asset('/storage/site-assets/') }}/{{ getVariantImage($ord_item['Variant_id'], $variants, $pictures) }}"
                                            alt="">


                                    </div>
                                    <div class="prod-title" >
                                        {{ getProductName($ord_item['Product_id'], $products) }}
                                        ({{ getVariantColor($ord_item['Variant_id'], $variants) }})

                                            <b>* {{ $ord_item['Quantity'] }}</b>

                                    </div>


                                    <div class="prod-price">
                                        :{{ getVariantPrice($ord_item['Variant_id'], $variants) * $ord_item['Quantity'] }}
                                    </div>
                                </div>
                            @endforeach


                        </td>
                        <td>
                           {{ $item['Status']}}
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        @else
        <h1 style="color: #d10024;">No Active orders</h1>
        @endif

    </div>
</div>
@endsection
