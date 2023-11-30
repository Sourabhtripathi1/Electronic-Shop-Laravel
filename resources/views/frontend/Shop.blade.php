@extends('frontend.layout.main')

@push('title')
    Shop Page
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
                                                        <img src="{{ asset('/storage/site-assets/') }}/{{ getVariantImage(getFirstVariant($item['Product_id'], $products, $variants), $variants, $pictures) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-name"><a
                                                                href="{{ env('APP_URL') }}/product/{{ $item['Product_id'] }}">
                                                                {{ getProductName($item['Product_id'], $products_all) }}
                                                            </a>
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
                    <li class="active"><a href="/shop">Shop </a></li>
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


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">



                <div style="padding:0 15px; ">
                    <div id="filterSection" class="container">
                        <div class="filter">
                            <div>
                                Filter
                            </div>
                            <div class="sign">
                                +
                            </div>

                            <div class="sign- hidden">
                                -
                            </div>
                        </div>
                        <div class="innerFilter hidden">

                        </div>
                    </div>
                </div>

                <div class="mainfilter">

                    <!-- ASIDE -->

                    <div id="aside" class="col-md-3">
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Categories</h3>
                            <div class="checkbox-filter">

                                @foreach ($category as $item)
                                    <div class="input-checkbox">
                                        <input type="checkbox" id="cat{{ $item['Category_id'] }}" class="category_check"
                                            value="{{ $item['Category_id'] }}">
                                        <label for="cat{{ $item['Category_id'] }}">
                                            <span></span>
                                            {{ $item['Category_Name'] }}
                                            <small>({{ getCatCount($item['Category_id'], $products_all) }})</small>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Price</h3>
                            <div class="price-filter">
                                <div id="price-slider"></div>
                                <div class="input-number price-min">
                                    <input id="price-min" type="number" value=1>
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input id="price-max" type="number" value=999999>
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Brand</h3>
                            <div class="checkbox-filter">
                                @foreach ($brands as $item)
                                    <div class="input-checkbox">
                                        <input type="checkbox" id="brand{{ $item['Brand_id'] }}" class="brand_checkbox"
                                            value="{{ $item['Brand_id'] }}">
                                        <label for="brand{{ $item['Brand_id'] }}">
                                            <span></span>
                                            {{ $item['Brand_Name'] }}
                                            <small>({{ getBrndCount($item['Brand_id'], $products_all) }})</small>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <div class="aside">
                            <button class="btn" id="apply_filters">
                                Apply Filters
                            </button>
                        </div>

                    </div>
                    <!-- /ASIDE -->
                </div>

                @if (count($products) > 0)
                    <!-- STORE -->
                    <div id="store" class="col-md-9">
                        <!-- store products -->
                        <div class="row">
                            <!-- product -->

                            @foreach ($products as $item)
                                <div class="col-md-4 col-xs-6 product_tab ">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('/storage/site-assets/') }}/{{ getVariantImage(getFirstVariant($item['Product_id'], $products, $variants), $variants, $pictures) }}"
                                                alt="">
                                            <div class="product-label">
                                                {{-- <span class="sale">-30%</span>
                                <span class="new">NEW</span> --}}
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
                                                    @if (session('user_id')) onclick="add_to_wishlist(`{{ env('APP_URL') }}/products/wishlist/add/{{ $item['Product_id'] }}/{{ getFirstVariant($item['Product_id'], $products, $variants) }}`)" @else onclick="alert('Unauthenticated user \nPlease login !'); window.location.href=`{{ env('APP_URL') }}/user/login`" @endif>
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
                                </div>
                            @endforeach
                        </div>
                        <!-- /store products -->

                        <!-- store bottom filter -->
                        <div class="store-filter clearfix">
                            <span class="store-qty">Paginate </span>
                            <ul class="store-pagination">

                                {{-- <li><a href="#"><i class="fa fa-angle-right"></i></a></li> --}}
                            </ul>
                        </div>
                        <!-- /store bottom filter -->
                    </div>
                    <!-- /STORE -->
                @else
                    <h2 style="color: #d10024">No Product found of applied filter </h2>
                @endif
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
