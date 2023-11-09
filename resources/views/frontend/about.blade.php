@extends('frontend.layout.main')

@push('title')
About Page
@endpush

@section('main-section')
<!-- MAIN HEADER -->
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
                            <div class="qty">3</div>
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
                            </div>
                            <div class="cart-summary">
                                <small>3 Item(s) selected</small>
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
                <li class="active"><a href="/about">About</a></li>
                <li><a href="/contact">Contact Us</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<div class="responsive-container-block bigContainer">
    <div class="responsive-container-block Container">
        <img class="mainImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/eaboutus1.svg">
        <div class="allText aboveText">
            <p class="text-blk headingText">
                Our Service
            </p>
            <p class="text-blk subHeadingText">
                {{env('APP_URL')}}
            </p>
            <p class="text-blk description">
                We focus on availing easy & personlized service for out customers. Your order is processed in a minimal time with atmost care. We have tie-up with major courier suppliers (Fedex, DHL, etc.) to deliver at any part of the world. </p>
        </div>
    </div>
    <div class="responsive-container-block Container bottomContainer">
        <img class="mainImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/xpraup2.svg">
        <div class="allText bottomText">
            <p class="text-blk headingText">
                Our policy
            </p>
            <p class="text-blk subHeadingText">
                {{env('APP_URL')}}
            </p>
            <p class="text-blk description">
                Offering quality products to the electronists with the best price at your door step (where ever & when ever you need it).
            </p>
        </div>
    </div>
</div>
@endsection