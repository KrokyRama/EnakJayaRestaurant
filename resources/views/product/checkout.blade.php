<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Checkout</title>

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
@if(session('cart') && count(session('cart')) > 0)
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

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
                                    <li><a href="{{ url('cart')}}">Cart</a></li>
                                    <li><a href="{{ url('checkout') }}">Check Out</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i></a>
                                    @if (Auth::check())
                                        <!-- Tombol Logout -->
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <!-- Tombol Login -->
                                        <a href="{{ url('/login') }}">
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
<!-- end search arewa -->

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Taste of Java</p>
                    <h1>Check Out Product</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">

                            <!-- Metode Pembayaran -->
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Metode Pembayaran
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="payment-method">
                                            <!-- Start of the form -->
                                            <form id="checkout-form" action="{{ route('processCheckout') }}" method="POST">
                                                @csrf
                                                <p>
                                                    <input type="radio" id="cash" name="payment_option" value="cash" required>
                                                    <label for="cash">Cash</label>
                                                </p>
                                                <p>
                                                    <input type="radio" id="qris" name="payment_option" value="qris" required>
                                                    <label for="qris">QRIS (Cashless)</label>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Pilihan Layanan -->
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Pilihan Layanan
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">
                                            <p>
                                                <input type="radio" id="dinein" name="service_option" value="dinein" onclick="updateServiceOption('dinein')" required>
                                                <label for="dinein">Dine In</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="takeaway" name="service_option" value="takeaway" onclick="updateServiceOption('takeaway')" required>
                                                <label for="takeaway">Takeaway</label>
                                            </p>
                                            <div id="table-options" style="display: none;">
                                                <p>Pilih Meja:</p>
                                                <select name="table_option">
                                                    <option value="1">Meja 1</option>
                                                    <option value="2">Meja 2</option>
                                                    <option value="3">Meja 3</option>
                                                    <option value="4">Meja 4</option>
                                                    <option value="5">Meja 5</option>
                                                    <option value="6">Meja 6</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                            <tr>
                                <th>Order Details</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody class="order-details-body">
                            @foreach(session('cart') as $id => $details)
                                <tr>
                                    <td>{{ $details['name'] }}</td>
                                    <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tbody class="checkout-details">
                            <tr>
                                <td>Subtotal</td>
                                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            </tr>
                            <tr id="takeaway-fee-row" style="display: none;">
                                <td>Take Away Fee</td>
                                <td>+ Rp.3000</td>
                            </tr>
                            @if($discountedAmount > 0)
                                <tr>
                                    <td>Diskon</td>
                                    <td>- Rp.{{ number_format($discountedAmount, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Total</td>
                                <td id='total-price'>Rp {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- Place order button inside the form -->
                        <a href="#" class="boxed-btn" onclick="event.preventDefault(); document.getElementById('checkout-form').submit();">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
<!-- end check out section -->

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
@else
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Cart Kosong!</h4>
                    <p>Sepertinya cart mu kosong, lanjutkan belanja untuk mengisinya!</p>
                    <hr>
                    <a href="{{ url('shop') }}" class="btn btn-primary">Go To Shop</a>
                </div>
            </div>
        </div>
    </div>
@endif

{{--menambahkan takeaway fee --}}
<script>
    function updateServiceOption(option) {
        // Untuk Takeaway, sembunyikan opsi meja dan tampilkan biaya Takeaway
        if (option === 'takeaway') {
            hideTableOptions();
            document.getElementById('takeaway-fee-row').style.display = 'table-row';
            updateTotalPrice(3000);  // Tambahkan biaya takeaway ke total
        } else if (option === 'dinein') {
            // Untuk Dine In, tampilkan opsi meja dan sembunyikan biaya Takeaway
            showTableOptions();
            document.getElementById('takeaway-fee-row').style.display = 'none';
            updateTotalPrice(0);  // Tidak ada biaya takeaway
        }
    }

    function showTableOptions() {
        document.getElementById("table-options").style.display = "block";
    }

    function hideTableOptions() {
        document.getElementById("table-options").style.display = "none";
    }

    function updateTotalPrice(takeawayFee) {
        const subtotal = {{ ($subtotal) }};
        const discount = {{ ($discountedAmount) }};
        const total = subtotal - discount + takeawayFee;

        // Perbarui total di halaman
        document.getElementById('total-price').innerText = 'Rp ' + total.toLocaleString('id-ID');
    }
</script>
</body>
</html>

