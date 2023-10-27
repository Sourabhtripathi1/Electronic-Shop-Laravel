@extends('frontend.layout.main')

@push('title')
    User Wishlist Page
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
                        <a href="#" class="logo">
                            <img src="{{ env('APP_URL') }}/frontend/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
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
                                    <a href="{{env('APP_URL')}}/user/cart">View Cart</a>
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
                    <li><a href="#">Laptops</a></li>
                    <li><a href="#">Smartphones</a></li>
                    <li><a href="#">Cameras</a></li>
                    <li><a href="#">Accessories</a></li>
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
                        <a href="{{env('APP_URL')}}/user/dashboard">
                            <i class="fa-solid fa-chart-column"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{env('APP_URL')}}/user/profile">
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
                    <li class="active">
                        <a href="{{ env('APP_URL') }}/user/wishlist">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Wishlist</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{env('APP_URL')}}/user/active-orders">
                            <i class="fa-solid fa-building-user"></i>
                            <span>Active Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{env('APP_URL')}}/user/all-orders">
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
            <h1>Wishlist</h1>


            <div class="cart-table">
                @if (count($wishlist) > 0)
                    <h3 style="color: #d10024;"> Your Cart :</h3><br>
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlist as $item)
                                <tr>
                                    <td><img src="{{ env('APP_URL') }}/storage/site-assets/{{ getVariantImage($item['Variant_id'], $variants, $pictures) }}"
                                            alt="" height="40px" width="80px"></td>
                                    <td> {{ getProductNameFromVariant($item['Variant_id'], $variants, $products) }} x
                                        <b>{{ $item['Quantity'] }}</b>
                                    </td>

                                    <td>{{ getVariantPrice($item['Variant_id'], $variants) }}
                                    </td>
                                    <td>
                                        <a href="{{ env('APP_URL') }}/user/wishlist/remove/{{ $item['Sno'] }}">
                                            <button class="btn btn-sm btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                    viewBox="0 0 448 512">
                                                    <style>
                                                        svg {
                                                            fill: #ffffff
                                                        }
                                                    </style>
                                                    <path
                                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                </svg>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>


                    <div class="btn-checkout-container">
                        <a href=""><button class="btn btn-checkout btn-lg">Checkout</button></a>
                    </div>
                @else
                    <h1 style="color: #d10024;">Cart Is Empty</h1>
                @endif

            </div>


<pre>
   @php
       print_r($wishlist)
   @endphp
</pre>

        </div>
    </div>
@endsection