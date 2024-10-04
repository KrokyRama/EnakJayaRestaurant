@extends('home.headerfooter')
@section('content')
<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="{{ url('/') }}">
                            <img src="assets/img/LOGOS.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a>
                            </li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                            <li class="current-list-item"><a href={{ url('shop')}}>Shop</a>
                                <ul class="sub-menu">
                                    <li><a href={{ url('shop')}}>Shop</a></li>
                                    <li><a href="{{ url('checkout') }}">Check Out</a></li>
                                    <li><a href="{{ url('cart')}}">Cart</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i></a>
                                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <input type="text" placeholder="Keywords">
                        <button type="submit">Search <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search arewa -->

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Taste of Java</p>
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".makanan">Makanan</li>
                        <li data-filter=".ekstra">Ekstra</li>
                        <li data-filter=".minuman">Minuman</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            <div class="col-lg-4 col-md-6 text-center makanan">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{ url('product') }}"><img src="assets/img/products/nasigoreng.jpg" alt=""></a>
                    </div>
                    <h3>Nasi Goreng</h3>
                    <p class="product-price"><span>Per Pcs</span> 85$ </p>
                    <a href="{{ url('cart') }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center makanan">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{ url('product') }}"><img src="assets/img/products/mujaer.jpg" alt=""></a>
                    </div>
                    <h3>Mujair Bakar</h3>
                    <p class="product-price"><span>Per Pcs</span> 70$ </p>
                    <a href="{{ url('cart') }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center makanan">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{ url('product') }}"><img src="assets/img/products/nasigudeg.jpg" alt=""></a>
                    </div>
                    <h3>Nasi Gudeg</h3>
                    <p class="product-price"><span>Per Pcs</span> 35$ </p>
                    <a href="{{ url('cart') }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center ekstra">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{ url('product') }}"><img src="assets/img/products/cahkangkung.jpg" alt=""></a>
                    </div>
                    <h3>Cah kangkung</h3>
                    <p class="product-price"><span>Per Pcs</span> 50$ </p>
                    <a href="{{ url('cart') }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center ekstra">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{ url('product') }}"><img src="assets/img/products/tempemedoan.jpg" alt=""></a>
                    </div>
                    <h3>Tempe Mendoan</h3>
                    <p class="product-price"><span>Per Pcs</span> 45$ </p>
                    <a href="{{ url('cart') }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center minuman">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{ url('product') }}"><img src="assets/img/products/esteh.jpg" alt=""></a>
                    </div>
                    <h3>Es Teh</h3>
                    <p class="product-price"><span>Per Pcs</span> 80$ </p>
                    <a href="{{ url('cart') }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end products -->