<!DOCTYPE html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HONO - Multi Purpose HTML Template</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
</head>
<body>
    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <div class="main-menu menu-color--black menu-hover-color--golden">
                                <nav>
                                    <ul>
                                        <li class="has-dropdown has-megaitem">
                                            <a href="product-details-default.html">Thể loại <i
                                                    class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    @foreach ($chunkedGenres as $chunkedGenre)
                                                    <li class="mega-menu-item">
                                                        <ul class="mega-menu-sub">
                                                            @foreach($chunkedGenre as  $genre)
                                                            <li><a href="{{route('genre', $genre['slug'])}}">{{$genre['title']}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                     @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-dropdown has-megaitem">
                                            <a href="product-details-default.html">Quốc gia <i
                                                    class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    @foreach($countries as  $country)
                                                    <li class="mega-menu-item">
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="{{route('country', $country->slug)}}">{{$country->title}}</a></li>
                                                        </ul>
                                                    </li>
                                                    @endforeach                                                    
                                                </ul>
                                            </div>
                                        </li>
                                        @foreach($categories as $category)
                                        <li class="mega"><a title="{{$category->title}}" href="{{route('category', $category->slug)}}">{{$category->title}}</a></li>
                                        @endforeach
                                       
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                
                    <div class="mobile-right-side">
                        <ul class="header-action-link action-color--black action-hover-color--golden">
                        
                           
                            <li>
                                <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                     
                        <li>
                            <a href="#"><span>Thể loại</span></a>
                            @foreach ($chunkedGenres as $chunkedGenre)
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="{{route('genre', $chunkedGenre[0]['slug'])}}">{{$chunkedGenre[0]['title']}}</a>
                                    <ul class="mobile-sub-menu">
                                        @foreach($chunkedGenre as  $genre)
                                        <li><a href="{{route('genre', $genre['slug'])}}">{{$genre['title']}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            @endforeach
                        </li>
                        <li>
                            <a href="#"><span>Quốc gia</span></a>
                           @foreach ($countries as $key => $country)
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="{{route('country', $country->slug)}}">{{$country->title}}</a>
                                </li>
                            </ul>
                            @endforeach
                        </li>
                        @foreach($categories as $category)
                        <li ><a title="{{$category->title}}" href="{{route('category', $category->slug)}}">{{$category->title}}</a></li>
                        @endforeach
                       
                       
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo_white.png" alt=""></a>
                </div>

                <address class="address">
                    <span>Address: Your address goes here.</span>
                    <span>Call Us: 0123456789, 0123456789</span>
                    <span>Email: demo@example.com</span>
                </address>

                <ul class="social-link">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>

                <ul class="user-link">
                    <li><a href="wishlist.html">Wishlist</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                </ul>
            </div>
            <!-- End Mobile contact Info -->

        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

 
    <div class="offcanvas-overlay"></div>
    <div class="banner-section section-top-gap-100 section-fluid">
        <div class="banner-wrapper">
            <div class="container-fluid">
                <div class="row mb-n6">

                    <div class="col-lg-6 col-12 mb-6">
                        <!-- Start Banner Single Item -->
                        <div class="banner-single-item banner-style-1 banner-animation img-responsive"
                            data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="assets/images/banner/banner-style-1-img-1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">Mini rechargeable
                                    Table Lamp - E216</h4>
                                <h5 class="sub-title">We design your home</h5>
                                <a href="product-details-default.html"
                                    class="btn btn-lg btn-outline-golden icon-space-left"><span
                                        class="d-flex align-items-center">discover now <i
                                            class="ion-ios-arrow-thin-right"></i></span></a>
                            </div>
                        </div>
                        <!-- End Banner Single Item -->
                    </div>

                    <div class="col-lg-6 col-12 mb-6">
                        <div class="row mb-n6">
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-1.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Kitchen <br>
                                            utensils</h4>
                                        <a href="product-details-default.html" class="link-text"><span>Shop
                                                now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-2.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Sofas and <br>
                                            Armchairs</h4>
                                        <a href="product-details-default.html" class="link-text"><span>Shop
                                                now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-3.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Chair & Bar<br>
                                            stools</h4>
                                        <a href="product-details-default.html" class="link-text"><span>Shop
                                                now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-4.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4>Interior <br>
                                            lighting</h4>
                                        <a href="product-details-default.html"><span>Shop now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <button class="material-scrolltop" type="button"></button>
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>



</html>