<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- title -->
    <title>Contact</title>

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
    @yield('content')

<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">About Us</h2>
                    <p>Enak Jaya Restoran menghadirkan cita rasa khas kuliner tradisional Jawa langsung ke meja Anda.
                        Dengan resep turun-temurun yang dijaga keasliannya, setiap hidangan kami olah dengan penuh dengan dedikasi.
                        <br><br>
                        Rasakan perjalanan kuliner yang merayakan budaya Jawa, di mana kelezatan dan tradisi bersatu dalam harmoni yang sempurna.
                        <br><br>
                        Selamat datang di Enak Jaya – Di Sini, Setiap Hidangan Terasa Seperti di Rumah!
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
