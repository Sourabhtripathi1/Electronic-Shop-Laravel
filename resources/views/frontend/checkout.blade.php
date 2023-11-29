@extends('frontend.layout.main')

@push('title')
    Checkout Page
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

    @if (count($cart) == 0)
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="breadcrumb-header">Cart Is Empty ! </h3>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>

        <div style="display: flex; justify-content:center;">
            <img src="{{ env('APP_URL') }}/frontend/img/3385483.webp" alt="">
        </div>
    @else
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="breadcrumb-header">Checkout</h3>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>

        <div class="section">
            <!-- container -->
            <div class="container">

                <form action="{{ env('APP_URL') }}/user/checkout" method="post" id="checkout-form">
                    @csrf
                    <!-- row -->
                    <div class="row">

                        <div class="col-md-7">
                            <!-- Billing Details -->
                            <div class="billing-details">
                                <div class="section-title">
                                    <h3 class="title">Billing address</h3>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="name" placeholder="Name"
                                        value="{{ $user['Name'] }}">
                                </div>

                                <div class="form-group">
                                    <input class="input" type="email" name="email" placeholder="Email"
                                        value="{{ $user['Email'] }}">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="Hno" placeholder="Hno">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="area" placeholder="area">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="city" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="state" placeholder="State">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="country" placeholder="Country">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="zip" placeholder="ZIP Code">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="tel" placeholder="Telephone">
                                </div>


                                <!-- /Billing Details -->
                            </div>
                        </div>

                        <!-- Order Details -->
                        <div class="col-md-5 order-details">
                            <div class="section-title text-center">
                                <h3 class="title">Your Order</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>PRODUCT</strong></div>
                                    <div><strong>TOTAL</strong></div>
                                </div>
                                <div class="order-products">
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart as $item)
                                        <div class="order-col">
                                            <div><b>{{ $item['Quantity'] }}</b> x
                                                {{ getProductNameFromVariant($item['Variant_id'], $variants, $products) }}
                                                &nbsp;({{ getVariantColor($item['Variant_id'], $variants) }})
                                            </div>
                                            <div>
                                                <b> ₹{{ $item['Price'] * $item['Quantity'] }}</b>

                                                @php
                                                    $total += $item['Price'] * $item['Quantity'];
                                                @endphp

                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="order-col">
                                    <div>Shiping</div>
                                    <div><strong>₹50</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>TOTAL</strong></div>
                                    <div><strong class="order-total">₹{{ $total + 50 }}</strong></div>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="input-radio">
                                    <input type="radio" name="payment" id="payment-1" value="UPI">
                                    <label for="payment-1">
                                        <span></span>
                                        UPI
                                    </label>
                                    <div class="caption">
                                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p> --}}
                                    </div>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="payment" id="payment-2" value="COD">
                                    <label for="payment-2">
                                        <span></span>
                                        Cash on Delivery
                                    </label>
                                    <div class="caption">
                                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="terms">
                                <label for="terms">
                                    <span></span>
                                    I've read and accept the <a href="#">terms & conditions</a>
                                </label>
                            </div>
                            <div class="place-order">
                                <button type="submit" class="primary-btn order-submit" id="place-order-button">
                                    Place Order
                                </button>
                            </div>


                        </div>
                        <!-- /Order Details -->
                    </div>
                    <!-- /row -->
                </form>

            </div>
            <!-- /container -->
        </div>
    @endif

@endsection
