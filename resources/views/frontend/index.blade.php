@extends('frontend.layout.main')

@push('title')
    Home Page
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

                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>

                            </a>
                            <div class="cart-dropdown">
                                @if (session('user_id') !== null)
                                    @if (count($cart) > 0)
                                        <div class="cart-list">
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{ env('APP_URL') }}/frontend/img/product01.png"
                                                        alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">product name goes here</a>
                                                    </h3>
                                                    <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                                </div>
                                                <button class="delete"><i class="fa fa-close"></i></button>
                                            </div>

                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{ env('APP_URL') }}/frontend/img/product02.png"
                                                        alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">product name goes here</a>
                                                    </h3>
                                                    <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                                </div>
                                                <button class="delete"><i class="fa fa-close"></i></button>
                                            </div>
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{ env('APP_URL') }}/frontend/img/product02.png"
                                                        alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">product name goes here</a>
                                                    </h3>
                                                    <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                                </div>
                                                <button class="delete"><i class="fa fa-close"></i></button>
                                            </div>
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{ env('APP_URL') }}/frontend/img/product01.png"
                                                        alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">product name goes here</a>
                                                    </h3>
                                                    <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                                </div>
                                                <button class="delete"><i class="fa fa-close"></i></button>
                                            </div>
                                        </div>
                                        <div class="cart-summary">
                                            <small>4 Item(s) selected</small>
                                            <h5>SUBTOTAL: $2940.00</h5>
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
                    <li class="active"><a href="/">Home</a></li>
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

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ env('APP_URL') }}/frontend/img/shop01.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Laptop<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ env('APP_URL') }}/frontend/img/shop03.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Accessories<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ env('APP_URL') }}/frontend/img/shop02.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Cameras<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">

                                    @foreach ($products as $item)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ asset('/storage/site-assets/') }}/{{ getVariantImage(getFirstVariant($item['Product_id'], $products, $variants), $variants, $images) }}"
                                                    alt="">
                                                <div class="product-label">

                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">
                                                    {{ getCategory($item['Category'], $category) }}
                                                </p>
                                                <h3 class="product-name"><a
                                                        href="{{ env('APP_URL') }}/product/{{ $item['Product_id'] }}">
                                                        {{ $item['Product_name'] }}
                                                    </a></h3>
                                                <h4 class="product-price">₹{{ getPrice($item['Product_id'], $variants) }}
                                                    {{-- <del
                                                        class="product-old-price">$990.00</del> --}}
                                                </h4>
                                                <div class="product-rating">

                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"
                                                        @if (session('user_id')) onclick="add_to_wishlist(`{{ env('APP_URL') }}/products/wishlist/add/{{ $item['Product_id'] }}/{{ getFirstVariant($item['Product_id'], $products, $variants) }}`)"

                                        @else
                                        onclick="alert('Unauthenticated user \nPlease login !'); window.location.href=`{{ env('APP_URL') }}/user/login`" @endif>
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="tooltipp">
                                                            add to wishlist
                                                        </span>
                                                    </button>

                                                    <button class="quick-view"><a
                                                            href="{{ env('APP_URL') }}/product/{{ $item['Product_id'] }}">
                                                            <i class="fa fa-eye"></i>
                                                            <span class="tooltipp">
                                                                quick view
                                                            </span> </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"
                                                    onclick="add_to_cart(`{{ env('APP_URL') }}/user/cart/add/{{ $item['Product_id'] }}/{{ getFirstVariant($item['Product_id'], $products, $variants) }}`)">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    add to cart
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Laptops Products</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">

                                    @foreach ($laptop_products as $item)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ asset('/storage/site-assets/') }}/{{ getVariantImage(getFirstVariant($item['Product_id'], $products, $variants), $variants, $images) }}"
                                                    alt="">
                                                <div class="product-label">

                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">
                                                    {{ getCategory($item['Category'], $category) }}
                                                </p>
                                                <h3 class="product-name"><a
                                                        href="{{ env('APP_URL') }}/product/{{ $item['Product_id'] }}">
                                                        {{ $item['Product_name'] }}
                                                    </a></h3>
                                                <h4 class="product-price">₹{{ getPrice($item['Product_id'], $variants) }}
                                                    {{-- <del
                                                    class="product-old-price">$990.00</del> --}}
                                                </h4>
                                                <div class="product-rating">

                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"
                                                        @if (session('user_id')) onclick="add_to_wishlist(`{{ env('APP_URL') }}/products/wishlist/add/{{ $item['Product_id'] }}/{{ getFirstVariant($item['Product_id'], $products, $variants) }}`)"

                                    @else
                                    onclick="alert('Unauthenticated user \nPlease login !'); window.location.href=`{{ env('APP_URL') }}/user/login`" @endif>
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="tooltipp">
                                                            add to wishlist
                                                        </span>
                                                    </button>

                                                    <button class="quick-view"><a
                                                            href="{{ env('APP_URL') }}/product/{{ $item['Product_id'] }}">
                                                            <i class="fa fa-eye"></i>
                                                            <span class="tooltipp">
                                                                quick view
                                                            </span> </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"
                                                    onclick="add_to_cart(`{{ env('APP_URL') }}/user/cart/add/{{ $item['Product_id'] }}/{{ getFirstVariant($item['Product_id'], $products, $variants) }}`)">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    add to cart
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Smart Phone Products</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">

                                    @foreach ($con_products as $item)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ asset('/storage/site-assets/') }}/{{ getVariantImage(getFirstVariant($item['Product_id'], $products, $variants), $variants, $images) }}"
                                                    alt="">
                                                <div class="product-label">

                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">
                                                    {{ getCategory($item['Category'], $category) }}
                                                </p>
                                                <h3 class="product-name"><a
                                                        href="{{ env('APP_URL') }}/product/{{ $item['Product_id'] }}">
                                                        {{ $item['Product_name'] }}
                                                    </a></h3>
                                                <h4 class="product-price">₹{{ getPrice($item['Product_id'], $variants) }}
                                                    {{-- <del
                                                    class="product-old-price">$990.00</del> --}}
                                                </h4>
                                                <div class="product-rating">

                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"
                                                        @if (session('user_id')) onclick="add_to_wishlist(`{{ env('APP_URL') }}/products/wishlist/add/{{ $item['Product_id'] }}/{{ getFirstVariant($item['Product_id'], $products, $variants) }}`)"

                                    @else
                                    onclick="alert('Unauthenticated user \nPlease login !'); window.location.href=`{{ env('APP_URL') }}/user/login`" @endif>
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="tooltipp">
                                                            add to wishlist
                                                        </span>
                                                    </button>

                                                    <button class="quick-view"><a
                                                            href="{{ env('APP_URL') }}/product/{{ $item['Product_id'] }}">
                                                            <i class="fa fa-eye"></i>
                                                            <span class="tooltipp">
                                                                quick view
                                                            </span> </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"
                                                    onclick="add_to_cart(`{{ env('APP_URL') }}/user/cart/add/{{ $item['Product_id'] }}/{{ getFirstVariant($item['Product_id'], $products, $variants) }}`)">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    add to cart
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <br><br><br>

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product08.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product09.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product01.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product02.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product03.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product04.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product05.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product06.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product08.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product09.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-5" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product01.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product02.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product03.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product04.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product05.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ env('APP_URL') }}/frontend/img/product06.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
