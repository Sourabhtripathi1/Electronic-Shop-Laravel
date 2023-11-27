@extends('frontend.layout.main')

@push('title')
    Product : {{ $pna }} details Page
@endpush

@section('main-section')
    @php

        $v = [];

        foreach ($var as $a) {
            $v = array_merge($v, json_decode($a['Picture'], true));
        }

    @endphp

    @if (session('error'))
        <script>
            alert("{{ session('error') }}")
        </script>
    @endif

    @if (session('success'))
        <script>
            alert("{{ session('success') }}")
        </script>
    @endif
    {{-- <pre>
        @php

        @endphp
    </pre> --}}
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

    <br><br>


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">

                        @foreach ($pics as $p)
                            @if (in_array($p['Picture_id'], $v))
                                <img src="{{ asset('/storage/site-assets/') }}/{{ $p['Source'] }}" alt="">
                            @endif
                        @endforeach


                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        @foreach ($pics as $p)
                            @if (in_array($p['Picture_id'], $v))
                                <img src="{{ asset('/storage/site-assets/') }}/{{ $p['Source'] }}" alt="">
                            @endif
                        @endforeach

                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{ $prod['Product_name'] }}</h2>

                        <div>
                            <h3 class="product-price" id="product-price">₹{{ $var[0]['Price'] }}</h3>
                        </div>

                        <ul class="product-links">
                            <li>Category:</li>
                            <li><a href="#">{{ $cat_na }}</a></li>
                        </ul>
                        <ul class="product-links">
                            <li>Brand:</li>
                            <li><a href="#">{{ $br_na }}</a></li>
                        </ul>



                        <div class="product-options">
                            <label>
                                Color
                                <select class="input-select" id="varCol" onChange="changePr()">

                                    @foreach ($var as $v)
                                        <option value="{{ $v['Color'] }}" data-price="{{ $v['Price'] }}"
                                            data-id="{{ $v['variant_id'] }}">
                                            {{ $v['Color'] }}
                                        </option>
                                    @endforeach


                                </select>


                            </label>
                        </div>

                        <div class="add-to-cart">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="number" disabled value=1 id="qty">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>

                            <form action="{{ env('APP_URL') }}/user/cart/add" method="POST" id="cart_form"
                                style="display: none">
                                @csrf
                                <input type="text" name="prod_id" id="prod_id" value="{{ $id }}">
                                <input type="text" name="var_id" id="var_id"
                                    value="{{ $var[0]['variant_id'] }}">
                                <input type="text" name="qty" id="qtny" value="">


                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>

                            <button class="add-to-cart-btn" onClick="cart_form_submit()"><i
                                    class="fa fa-shopping-cart"></i> add
                                to
                                cart</button>



                        </div>
                        <span class="product-available">In Stock</span>
                        <br><br>


                        <ul class="product-btns">
                            <li><a href="{{ env('APP_URL') }}/products/wishlist/add/{{ $id }}/{{ getFirstVariant($id, $products, $variants) }}/2"
                                    id="add_wishlist_button"><i class="fa fa-heart-o"></i> add to wishlist</a></li>

                        </ul>


                        <script>
                            function changePr() {
                                var selectBox = document.getElementById('varCol');

                                const selectedOption = selectBox.options[selectBox.selectedIndex];
                                const selectedAction = selectedOption.getAttribute('data-price');
                                const selectedAction2 = selectedOption.getAttribute('data-id');
                                const wishlist_url = "{{ env('APP_URL') }}/products/wishlist/add/{{ $id }}"

                                document.getElementById('product-price').innerText = "₹" + selectedAction;

                                document.getElementById('var_id').value = selectedAction2;
                                console.log(document.getElementById('var_id').value);

                                console.log(wishlist_url + "/" + selectedAction2);

                                document.getElementById('add_wishlist_button').href = wishlist_url + "/" + selectedAction2 + "/2";
                            }
                        </script>




                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">Details</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            @php
                                                echo str_replace('. ', '.<br>', $prod['Description']);
                                            @endphp
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="display: flex;align-items: baseline;">
                                            <h4>Name :- </h4> &nbsp;<h5> {{ $pna }}</h5>
                                        </div>
                                        <div style="display: flex;align-items: baseline;">
                                            <h4>Category :- </h4>&nbsp; <h5> {{ $cat_na }}</h5>
                                        </div>
                                        <div style="display: flex;align-items: baseline;">
                                            <h4>Brand :- </h4> &nbsp;<h5> {{ $br_na }}</h5>
                                        </div>
                                        <h4>Description :-&nbsp; </h4><br>
                                        <p>
                                            @php
                                                echo str_replace('. ', '.<br>', $prod['Description']);
                                            @endphp
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->

                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">

                                    <!-- Reviews -->
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews">

                                                @foreach ($reviews as $item)
                                                <li class="review_tab">
                                                    <div class="review-heading">
                                                        <h5 class="name">{{ $item['name'] }}</h5>
                                                        <p class="date">{{ $item['Review_Date'] }}</p>

                                                    </div>
                                                    <div class="review-body">
                                                        <p>{{ $item['content'] }}</p>
                                                    </div>
                                                </li>
                                                @endforeach

                                            </ul>
                                            <ul class="reviews-pagination">

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-6">
                                        <div id="review-form">
                                            <form class="review-form"
                                                action="{{ env('APP_URL') }}/products/{{ $id }}/add-review"
                                                method="POST">
                                                @csrf
                                                <input class="input" type="text" placeholder="Your Name"
                                                    name="name">
                                                <input class="input" type="text" placeholder="Your Email"
                                                    name="mail">
                                                <textarea class="input" placeholder="Your Review" name="content"></textarea>

                                                <button class="primary-btn" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>

                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ env('APP_URL') }}/frontend/img/product01.png" alt="">
                            <div class="product-label">
                                <span class="sale">-30%</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->



            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->




    <script>
        $(document).ready(function() {

            addReviewPagination();
            reviewPagination(1);

            $(".paginate-review").click(function($this) {
                const page = parseInt($(this).data("page"));
                reviewPagination(page);

            });

        });

        function reviewPagination(page) {
            var itemsPerPage = 4;
            var products = $(".review_tab");

            $(".review_tab").each(function() {
                $(this).addClass("hidden");
            });

            var tot = products.length;

            const totalPages = Math.ceil(tot / itemsPerPage);

            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            for (let index = startIndex; index < endIndex; index++) {
                $(".review_tab").eq(index).removeClass("hidden");
            }
        }

        function addReviewPagination() {
            var cnt = 4;
            var products = $(".review_tab");

            var tot = products.length;

            const totalPages = Math.ceil(tot / cnt);

            for (let i = 1; i <= totalPages; i++) {
                $(".reviews-pagination").append(
                    `<li><a href="#" class="paginate-review"  data-page="${i}">${i}</a></li>`
                );

                if (i==5) {
                    break;
                }
            }


        }
    </script>
@endsection
