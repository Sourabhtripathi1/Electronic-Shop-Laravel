@extends('frontend.layout.main')

@push('title')
User Cart Page
@endpush

@push('custom')
<link type="text/css" rel="stylesheet" href="{{ env('APP_URL') }}/frontend/css/UserDashboard.css" />
@endpush

@section('main-section')


@if (session('success'))
<script>
    alert("{{ session('success') }}")
</script>
@endif

<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
                <div class="header-logo">
                    <a href="{{ env('APP_URL') }}/" class="logo">
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
                            @if ($wish_count > 0)
                            <div class="qty">{{ $wish_count }}</div>
                            @endif
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
                            @endif
                        </a>
                        <div class="cart-dropdown">
                            @if (session('user_id') !== null)
                            @if (count($cart) > 0)
                            <div class="cart-list">
                                @foreach ($cart as $item)
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{ asset('/storage/site-assets/') }}/{{ getVariantImage(getFirstVariant($item['Product_id'], $products, $variants), $variants, $pictures) }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="{{ env('APP_URL') }}/product/{{ $item['Product_id'] }}">
                                                {{ getProductName($item['Product_id'], $products) }}</a>
                                        </h3>
                                        <h4 class="product-price"><span class="qty">{{ $item['Quantity'] }}x</span>₹{{ getPrice($item['Product_id'], $variants) }}
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
                                <a href="{{ env('APP_URL') }}/user/checkout">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                            @else
                            Please Login !

                            <br>

                            <a href="{{ env('APP_URL') }}/user/dashboard" class="cart_login"><button class="btn btn-lg">Login</button></a>
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
                <li class="active">
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

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="cart-table">
            @if (count($cart) > 0)
            <h3 style="color: #d10024;"> Your Cart :</h3><br>
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $cart_item)
                    <tr>
                        <td class="cart_image">
                            <img src="{{ env('APP_URL') }}/storage/site-assets/{{ getVariantImage($cart_item['Variant_id'], $variants, $pictures) }}">
                        </td>
                        <td style="display: flex; justify-content: space-between; ">


                            <div style="overflow-wrap: anywhere;                                  padding: 0px 6px;">
                                {{ getProductNameFromVariant($cart_item['Variant_id'], $variants, $products) }}
                                x
                                <b id="qtypg">{{ $cart_item['Quantity'] }}</b>
                            </div>
                            <div class="btn-pm">
                                <div>
                                    @if ($cart_item['Quantity'] > 1)
                                    <button class="dec_cart" id="{{ $cart_item['Sno'] }}">
                                        -
                                    </button>
                                    @endif
                                </div>
                                <div>
                                    @if ($cart_item['Quantity'] < getVariantStock($cart_item['Variant_id'], $variants)) <button class="inc_cart" id="{{ $cart_item['Sno'] }}">
                                        +
                                        </button>
                                        @endif
                                </div>
                            </div>
                        </td>

                        <td id="prct">
                            {{ getVariantPrice($cart_item['Variant_id'], $variants) * $cart_item['Quantity'] }}
                        </td>
                        <td>
                            <a href="{{ env('APP_URL') }}/user/cart/remove/{{ $cart_item['Sno'] }}">
                                <button class="btn btn-sm btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512">
                                        <style>
                                            svg {
                                                fill: #ffffff
                                            }
                                        </style>
                                        <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                    </svg>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            <script>
                $(".inc_cart").click(async function(e) {

                    var ex = e.target.id;
                    await $.ajax({
                        type: "get",
                        url: `{{ env('APP_URL') }}/user/cart/inc/${ex}`,
                        success: function(response) {
                            location.reload();

                        },
                        error: function(response) {
                            console.error('Error occured');

                        }
                    });
                });

                $(".dec_cart").click(async function(e) {

                    var ex = e.target.id;
                    await $.ajax({
                        type: "get",
                        url: `{{ env('APP_URL') }}/user/cart/dec/${ex}`,
                        success: function(response) {
                            location.reload();

                        },
                        error: function(response) {
                            console.error('Error occured');

                        }
                    });
                });
            </script>


            <div class="btn-checkout-container">
                <a href="{{ env('APP_URL') }}/user/checkout"><button class="btn-checkout btn-lg">Checkout</button></a>
            </div>
            @else
            <h1 style="color: #d10024;">Cart Is Empty</h1>
            @endif

        </div>

    </div>
</div>
@endsection