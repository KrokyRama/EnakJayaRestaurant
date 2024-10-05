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
            @foreach($allmenus as $menu)
                <div class="col-lg-4 col-md-6 text-center {{ strtolower($menu->kategori) }}">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="{{ url('product', $menu->menu_id) }}">
                                <img src="{{ asset($menu->foto) }}" alt="{{ $menu->nama_menu }}">
                            </a>
                        </div>
                        <h3>{{ $menu->nama_menu }}</h3>
                        <p class="product-price"><span>Per Pcs</span> Rp {{ number_format($menu->price, 0, ',', '.') }} </p>
                        <form id="addToCartForm-{{ $menu->menu_id }}" action="{{ route('addToCart') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->menu_id }}">
                        </form>

                        <a href="javascript:void(0);" class="cart-btn" onclick="document.getElementById('addToCartForm-{{ $menu->menu_id }}').submit();">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end products -->
