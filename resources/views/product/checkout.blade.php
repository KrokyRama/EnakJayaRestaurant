@extends('home.headerfooter')
section('content')
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
                                        <form>
                                            <p>
                                                <input type="radio" id="cash" name="payment_option" value="cash">
                                                <label for="cash">Cash</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="qris" name="payment_option" value="qris">
                                                <label for="qris">QRIS (Cashless)</label>
                                            </p>
                                        </form>
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
                                        <form>
                                            <p>
                                                <input type="radio" id="dinein" name="service_option" value="dinein" onclick="showTableOptions()">
                                                <label for="dinein">Dine In</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="takeaway" name="service_option" value="takeaway" onclick="hideTableOptions()">
                                                <label for="takeaway">Takeaway</label>
                                            </p>
                                            <div id="table-options" style="display: none;">
                                                <p>Pilih Meja:</p>
                                                <select>
                                                    <option value="1">Meja 1</option>
                                                    <option value="2">Meja 2</option>
                                                    <option value="3">Meja 3</option>
                                                    <option value="4">Meja 4</option>
                                                    <option value="5">Meja 5</option>
                                                    <option value="6">Meja 6</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Confirm -->
                        <div class="confirm-button">
                            <a href="#" class="boxed-btn">Confirm</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="order-details-wrap">
                    <table class="order-details">
                        <thead>
                        <tr>
                            <th>Your order Details</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody class="order-details-body">
                        <tr>
                            <td>Nasi Goreng</td>
                            <td>$85.00</td>
                        </tr>
                        <tr>
                            <td>Es Teh</td>
                            <td>$80.00</td>
                        </tr>
                        <tr>
                            <td>Tempe Mendoan</td>
                            <td>$45.00</td>
                        </tr>
                        </tbody>
                        <tbody class="checkout-details">
                        <tr>
                            <td>Subtotal</td>
                            <td>$190</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>$50</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>$240</td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="#" class="boxed-btn">Place Order</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end check out section -->
