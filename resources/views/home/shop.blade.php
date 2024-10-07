<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Shop</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- socmed -->
    <link rel="stylesheet" href="assets/css/socmed.css">

    <script src="https://kit.fontawesome.com/7b94ce0608.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

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
                                    <li><a href="{{ url('cart')}}">Cart</a></li>
                                    <li><a href="{{ url('checkout') }}">Check Out</a></li>
                                </ul>
                            </li>
                            <li>
                            <div class="header-icons">
                                <a class="shopping-cart" href="{{ url('/cart') }}"><i class="fas fa-shopping-cart"></i></a>
                                @if (Auth::check())
                                    <!-- Link ke halaman Member -->
                                    <a href="{{ url('/member') }}" title="Member Area">
                                        <i class="fas fa-user"></i>
                                    </a>
                                    <!-- Tombol Logout -->
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Logout">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <!-- Tombol Login -->
                                    <a href="{{ url('/login') }}" title="Login">
                                        <i class="fas fa-user"></i>
                                    </a>
                                @endif
                            </div>
                            </li>
                        </ul>
                    </nav>
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
<!-- end search area -->

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

<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">About Us</h2>
                    <p>Enak Jaya Restoran menghadirkan cita rasa khas kuliner tradisional Jawa langsung ke meja Anda.
                        Dengan resep turun-temurun yang dijaga keasliannya, setiap hidangan kami olah dengan penuh dengan dedikasi.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Get in Touch</h2>
                    <ul>
                        <li>Jl. Dr. Ir. H. Soekarno 60115, Mulyorejo, Surabaya</li>
                        <li>enakjayasupport@gmail.com</li>
                        <li>326032</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Pages</h2>
                    <ul>
                        <li><a href="{{ url('/')}}">Home</a></li>
                        <li><a href="{{ url('/shop') }}">Shop</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Our Social Media</h2>
                    <div class="socmed-icons">
                        <a href="https://www.instagram.com/naufal_rama/">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/sage.fahmi.3/">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="https://www.tiktok.com/@attahalilintar?lang=id-ID">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->


<!-- jquery -->
<script src="assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="assets/js/sticker.js"></script>
<!-- form validation js -->
<script src="assets/js/form-validate.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>
</body>
</html>

