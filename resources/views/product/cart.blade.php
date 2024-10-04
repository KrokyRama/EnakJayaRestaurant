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
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                        <tr class="table-head-row">
                            <th class="product-remove"></th>
                            <th class="product-image">Product Image</th>
                            <th class="product-name">Name</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-body-row">
                            <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                            <td class="product-image"><img src="assets/img/products/nasigoreng.jpg" alt=""></td>
                            <td class="product-name">Nasi Goreng</td>
                            <td class="product-price">$85</td>
                            <td class="product-quantity"><input type="number" placeholder="0"></td>
                            <td class="product-total">1</td>
                        </tr>
                        <tr class="table-body-row">
                            <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                            <td class="product-image"><img src="assets/img/products/esteh.jpg" alt=""></td>
                            <td class="product-name">Es Teh</td>
                            <td class="product-price">$80</td>
                            <td class="product-quantity"><input type="number" placeholder="0"></td>
                            <td class="product-total">1</td>
                        </tr>
                        <tr class="table-body-row">
                            <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                            <td class="product-image"><img src="assets/img/products/tempemedoan.jpg" alt=""></td>
                            <td class="product-name">Tempe Mendoan</td>
                            <td class="product-price">$45</td>
                            <td class="product-quantity"><input type="number" placeholder="0"></td>
                            <td class="product-total">1</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                        <tr class="table-total-row">
                            <th>Total</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="total-data">
                            <td><strong>Subtotal: </strong></td>
                            <td>$500</td>
                        </tr>
                        <tr class="total-data">
                            <td><strong>Shipping: </strong></td>
                            <td>$45</td>
                        </tr>
                        <tr class="total-data">
                            <td><strong>Total: </strong></td>
                            <td>$545</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <a href="" class="boxed-btn">Update Cart</a>
                        <a href="{{ url('checkout') }}" class="boxed-btn black">Check Out</a>
                    </div>
                </div>

                <div class="coupon-section">
                    <h3>Apply Coupon</h3>
                    <div class="coupon-form-wrap">
                        <form action="">
                            <p><input type="text" placeholder="Coupon"></p>
                            <p><input type="submit" value="Apply"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cart -->
