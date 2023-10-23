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
                    <i class="fa-solid fa-building-user"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-regular fa-file-lines"></i>
                    <span>Invoices</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-regular fa-file-lines"></i>
                    <span>Items</span>
                </a>
            </li>
        </ul>
    </div>


    <div class="main-container">
        hello

        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi magni cumque, placeat asperiores maiores nihil laboriosam non accusamus dicta ducimus quisquam qui! Odit consequatur ducimus repellendus voluptatibus facilis blanditiis provident, commodi illo perspiciatis cupiditate numquam sunt in, nesciunt suscipit quam. Voluptatum dolores, ipsum esse minus optio quos, itaque, quis voluptatibus ut rem quibusdam eaque obcaecati debitis. Soluta nihil ea, et pariatur natus labore sunt, velit sint consequuntur numquam corporis voluptates. Odit non beatae, tenetur iure dolor ratione ea? Nam, tempora debitis voluptates ad eaque et sapiente! Id distinctio, nulla rerum assumenda quod consequatur facilis temporibus repellendus accusamus nisi voluptas, vitae a fuga in repellat ipsa, expedita rem laboriosam quibusdam maiores! Facere hic asperiores repudiandae molestias ea vero nobis, temporibus nostrum, exercitationem eos nam, commodi consequuntur quae consectetur fuga accusamus quod explicabo non vel reprehenderit quam ipsam tempore! Fugiat eum recusandae ipsa esse quas eos sunt. Incidunt, provident. Atque, fuga exercitationem. Quisquam expedita quibusdam quo officia nulla iste, numquam modi ea aliquid incidunt quam consectetur sint adipisci minus doloremque soluta, blanditiis quos, magnam provident. Quos corporis magni veritatis repellat! Id dignissimos eum exercitationem a, cupiditate libero aspernatur totam modi excepturi harum corrupti? Molestias soluta quam optio a ratione nobis eligendi minima dignissimos eum eos vero, illum officiis atque ab quidem iure omnis sit, alias impedit labore! Porro, perferendis accusantium ducimus voluptatibus sapiente nihil praesentium? Deserunt voluptas accusantium ipsa deleniti incidunt magnam architecto ducimus est, assumenda repudiandae dignissimos perspiciatis tenetur eos alias in iste. Optio quia commodi cum officiis corporis magnam placeat maiores ducimus illum blanditiis. Accusantium rem cum harum praesentium, animi commodi repudiandae sed est similique quaerat, soluta numquam nam a pariatur eius quasi rerum excepturi quo ratione consequatur aspernatur sit beatae! Exercitationem possimus accusantium consequuntur consectetur veritatis! Harum laborum in beatae quaerat suscipit mollitia! Esse eaque eligendi minus ducimus? Magni facere voluptates, officia enim ad ab officiis tempore sint hic totam nisi optio culpa, provident sunt earum vero! Distinctio nostrum quas fugiat, at, consectetur saepe ipsam amet nemo sapiente porro, quo quis veritatis et! Sed eaque aperiam quia ex. Consectetur fugit eveniet animi autem veniam impedit! Soluta culpa officiis dolorem asperiores dolore dolorum, sed alias quasi enim minus repudiandae, amet quam recusandae harum expedita assumenda in deleniti nisi ea unde illum quod! Quae, laborum quis sit dolores nobis corrupti quasi odit natus illo? Cumque, impedit labore dolor animi vel provident dolorum dolorem, est reprehenderit recusandae facere rem quisquam. Ad ullam cumque quod id quam possimus officiis iure aut voluptatum debitis adipisci in corporis ex dicta perspiciatis minus exercitationem ratione, et esse, unde incidunt natus quas sequi vitae! Distinctio soluta maiores enim, ea ipsam iste cum libero eligendi laudantium esse mollitia excepturi laboriosam asperiores magni autem nobis unde, veniam fuga voluptates. Fugit perferendis nemo, at nobis magnam iusto aspernatur, id officia sed nesciunt beatae reprehenderit nisi expedita consequatur cum, aperiam ipsum possimus animi voluptatem. Veniam voluptate commodi, fugiat, dolorum ipsa non ullam adipisci assumenda molestias eveniet obcaecati quo in hic est nihil facilis vel dicta ipsum qui! Ex facere labore, aspernatur porro aperiam dolores laudantium a facilis similique voluptatum maxime alias nisi, mollitia nemo? Excepturi commodi dolorum fugiat voluptate ipsam ipsum sit earum deserunt provident, laudantium quasi sint quas alias! Sed error, dignissimos consectetur minima amet nobis accusantium aliquid culpa eligendi doloribus modi dolore omnis molestias, ipsum saepe officiis obcaecati explicabo consequuntur quasi nesciunt. Aliquam fuga culpa perspiciatis? Obcaecati dolores aperiam nulla consequuntur cumque? Vitae deserunt labore vel aliquam earum modi recusandae doloremque optio temporibus ab! Placeat tempore veritatis laboriosam vel explicabo quaerat labore! In accusamus deleniti ipsam labore aspernatur natus reiciendis et officiis nobis hic. Doloremque commodi saepe facilis aliquam illo molestiae deserunt quidem, beatae voluptate dicta aliquid possimus alias nulla? Labore delectus non necessitatibus placeat minus. Magni atque aut maxime quasi quis autem porro, fuga dolorum, reprehenderit harum perferendis praesentium maiores cum molestiae? Sit consectetur dicta enim beatae asperiores accusantium, reprehenderit incidunt, animi rerum porro, consequuntur aspernatur exercitationem! Perferendis, illo ipsa! Officia animi corrupti porro reprehenderit provident laudantium incidunt. Tempora, aliquam incidunt! Consectetur rem impedit non illo sit minima modi, asperiores est vel! Id mollitia dicta omnis quaerat accusamus voluptatibus! Dignissimos vel consequatur ullam provident odit unde quo, magni, dolorem enim eaque deserunt, dicta aspernatur natus explicabo? Hic, adipisci autem. Quos recusandae magni deleniti dolores quis est repudiandae quam. A qui amet nobis iusto eligendi quos fugit iste rem sed minima aliquid repudiandae quo, quas velit in laudantium voluptates? Ipsam accusamus, explicabo dolore atque, dolor laudantium et iure itaque deserunt, suscipit facere! Doloribus, expedita. Hic minus dolorem deleniti dolor suscipit vel ratione molestiae, voluptas explicabo expedita, adipisci libero animi deserunt soluta illo! Sequi totam, eveniet consectetur mollitia delectus nesciunt quos. Magni dolores consequuntur praesentium mollitia officia velit molestias, nesciunt, beatae deleniti, placeat quas! Deleniti repudiandae hic similique quis pariatur molestias culpa impedit aliquam quisquam, sunt enim at eum minima veritatis ratione earum sapiente ipsum maxime tempora architecto accusamus harum quod ut nulla! Quae distinctio possimus nihil illo, quod perferendis facilis odio eum architecto officiis quia tempore exercitationem amet molestias esse nisi corporis enim vitae sunt provident non cumque rerum a! Voluptates velit officiis dicta quibusdam illum repellendus excepturi impedit cupiditate voluptatem ea suscipit neque veritatis accusamus repudiandae nesciunt sapiente ullam labore, cumque omnis, vero animi magni? Odit repellendus nemo repellat vel natus esse, praesentium numquam eaque accusamus laborum eum consequuntur consectetur vitae doloribus ullam qui vero aut aspernatur nisi sapiente error veritatis. Nesciunt fugiat provident unde debitis harum neque quidem odit excepturi hic mollitia maiores et corporis cum consectetur ipsum commodi iure suscipit, eaque sunt tempora? Ipsum, quae voluptatem nihil illo voluptatibus sit aperiam. At consectetur unde voluptates, tempore quo dolor repellat voluptatibus veritatis ex hic ipsam. Ea labore nihil ut, eligendi suscipit autem aspernatur harum voluptatum quisquam cumque sapiente, quas enim magnam ipsa voluptatem libero tempora. Ipsam, rem praesentium. Optio officia dignissimos, laboriosam praesentium nulla animi doloremque ex inventore blanditiis, ipsam non eius deserunt at, a repudiandae! Reiciendis quo repellendus quod consequatur quis vero aliquid ducimus? Aut alias sapiente voluptatum corporis aliquam temporibus consequuntur corrupti necessitatibus fuga nihil!
    </div>
</div>

@endsection
