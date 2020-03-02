<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title','FrontEnd Layout')</title>

    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/styles.css')}}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/magnific-popup.css')}}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>


</head>


<body class=" ">

<header class="header" id="site-header">

    <div class="container">

        <div class="header-content-wrapper">

            <ul class="nav-add">
                <li class="cart">

                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                        <span class="cart-count">{{Cart::content()->count()}}</span>
                    </a>

                    <div class="cart-popup-wrap">
                        <div class="popup-cart">
                            @if(!Cart::total())
                                <h4 class="title-cart">No products in the cart!</h4>
                                <p class="subtitle">Please make your choice.</p>
                            @else
                                <h4 class="title-cart align-center">${{Cart::total()}}</h4>
                                <br>
                                <a href="{{route('cart.show')}}">
                                    <div class="btn btn-small btn--dark">
                                        <span class="text">View Cart</span>
                                    </div>
                                </a>
                            @endif

                        </div>
                    </div>

                </li>
            </ul>
        </div>

    </div>

</header>


<div class="content-wrapper">

    <div class="container">
        <div class="row pt120">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="heading align-center mb60">
                    <h4 class="h1 heading-title">Simple E-commerce</h4>
                    <p class="heading-text">Buy books, and we ship to you.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Books products grid -->

    @yield('content')
</div>

<!-- Footer -->

<footer class="footer">
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="{{asset('ecommerce/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('ecommerce/js/crum-mega-menu.js')}}"></script>
<script src="{{asset('ecommerce/js/swiper.jquery.min.js')}}"></script>
<script src="{{asset('ecommerce/js/theme-plugins.js')}}"></script>
<script src="{{asset('ecommerce/js/main.js')}}"></script>
<script src="{{asset('ecommerce/js/form-actions.js')}}"></script>

<script src="{{asset('ecommerce/js/velocity.min.js')}}"></script>
<script src="{{asset('ecommerce/js/ScrollMagic.min.js')}}"></script>
<script src="{{asset('ecommerce/js/animation.velocity.min.js')}}"></script>

<!-- ...end JS Script -->


</body>

<!-- Mirrored from theme.crumina.net/html-seosight/16_shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 13:03:04 GMT -->
</html><!DOCTYPE html>
