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
                        <a href="#">
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
                                <a href="#">View Cart</a>
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


<div class="sidebar-container" >
        <div class="sidebar">
        <div class="logo"></div>
        <ul>
            <li class="active">
                <a href="#">
                    <i class="fa-solid fa-chart-column"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-regular fa-file-lines"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-building-user"></i>
                    <span>Active Orders</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-regular fa-file-lines"></i>
                    <span>All Orders</span>
                </a>
            </li>

            <li>
                <a href="{{env('APP_URL')}}/logout">
                    <i class="fa-regular fa-file-lines"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>


    <div class="main-container">
        hello

        </div>
</div>

@endsection