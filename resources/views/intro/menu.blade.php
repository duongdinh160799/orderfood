
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bistro | Menu</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/bistro-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/navigation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/owl.transitions.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/jquery.fancybox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/zerogrid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/loader.css') }}">
    <link rel="shortcut icon" href="images/favicon.png">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!--Loader-->
<div class="loader">
    <div class="cssload-container">
        <div class="cssload-circle"></div>
        <div class="cssload-circle"></div>
    </div>
</div>

<!--Top bar-->
<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="pull-left hidden-xs">bistro Healthcare Come to Expect the Best in Town</p>
                <p class="pull-right"><i class="fa fa-ambulance"></i>Emergency Line (+001) 321-125-152</p>
            </div>
        </div>
    </div>
</div>

<header id="main-navigation">
    <div id="navigation" data-spy="affix" data-offset-top="20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#fixed-collapse-navbar" aria-expanded="false">
                                <span class="icon-bar top-bar"></span> <span class="icon-bar middle-bar"></span> <span class="icon-bar bottom-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo" class="img-responsive"></a>
                        </div>

                        <div id="fixed-collapse-navbar" class="navbar-collapse collapse navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="{{ asset('/') }}" >Home</a>

                                </li>
                                <li><a href="{{ asset('food') }}">Our Food</a></li>
                                <li class="dropdown active">
                                    <a data-toggle="dropdown" href="#." class="dropdown-toggle">pages</a>
                                    <ul class="dropdown-menu ">
                                        <li><a href="{{ asset('about') }}">About Us</a></li>
                                        <li class="active" ><a href="{{ asset('menu') }}" >Menu</a></li>
                                        <li><a href="{{ asset('faq') }}">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="{{ asset('gallery') }}" >gallery</a>
                                </li>
                                <li><a href="{{ asset('blog') }}">blog</a></li>
                                <li><a href="">Order Now</a></li>
                                <li class="dropdown">
                                    <a href="{{ asset('location') }}" >Location</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>


<!--Page header & Title-->
<section id="page_header">
    <div class="page_title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Menu</h2>
                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Pricings-->
<section id="pricing" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading">Our menu</h2>
                <hr class="heading_space">
            </div>
            <div class="col-sm-6">
                <div class="price padding-bottom">
                    <div class="price_body">
                        <ul class="pricing_feature">
                            <li>Zoozoo Chicken<strong>$40</strong></li>
                            <li>Daeji Bulgogi <strong>$35</strong> </li>
                            <li>Chow mein <strong>$100 - $25</strong> </li>
                            <li>yeast muffins <strong>$280</strong> </li>
                            <li>Crispy Chicken & Vagi Rolls <strong>$786</strong> </li>
                            <li>Salmon Filet <strong>$700</strong> </li>
                            <li>yeast muffins<strong>$999</strong> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="price padding-bottom">
                    <div class="price_body">
                        <ul class="pricing_feature">
                            <li>Special Spaghetti  <strong>$40</strong> </li>
                            <li>Salmon Filet <strong>$35</strong> </li>
                            <li> The Space Chicken <strong>$25</strong> </li>
                            <li>Spice Chicken <strong>$20</strong> </li>
                            <li>Steaks in Garlic-Lime <strong>$7</strong> </li>
                            <li>Salmon Filet <strong>$10</strong> </li>
                            <li>yeast muffins<strong>$999</strong> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading">Our menu</h2>
                <hr class="heading_space">
            </div>
            <div class="col-sm-6">
                <div class="price padding-bottom">
                    <div class="price_body">
                        <ul class="pricing_feature">
                            <li>Zoozoo Chicken  <strong>$40</strong> </li>
                            <li>Daeji Bulgogi <strong>$35</strong> </li>
                            <li>Chow mein <strong>$100 - $25</strong> </li>
                            <li>yeast muffins <strong>$280</strong> </li>
                            <li>Crispy Chicken & Vagi Rolls <strong>$786</strong> </li>
                            <li>Salmon Filet <strong>$700</strong> </li>
                            <li>yeast muffins<strong>$999</strong> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="price padding-bottom">
                    <div class="price_body">
                        <ul class="pricing_feature">
                            <li>Special Spaghetti  <strong>$40</strong> </li>
                            <li>Salmon Filet <strong>$35</strong> </li>
                            <li> The Space Chicken <strong>$25</strong> </li>
                            <li>Spice Chicken <strong>$20</strong> </li>
                            <li>Steaks in Garlic-Lime <strong>$7</strong> </li>
                            <li>Salmon Filet <strong>$10</strong> </li>
                            <li>yeast muffins<strong>$999</strong> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading">Drinks</h2>
                <hr class="heading_space">
            </div>
            <div class="col-sm-6">
                <div class="price padding-bottom">
                    <div class="price_body">
                        <ul class="pricing_feature">
                            <li>LYCHEE  <strong>$4</strong> </li>
                            <li>SPARKLING PEAR <strong>$35</strong> </li>
                            <li>Chow mein <strong>$100 - $25</strong> </li>
                            <li>yeast muffins <strong>$280</strong> </li>
                            <li>Crispy Chicken & Vagi Rolls <strong>$786</strong> </li>
                            <li>Salmon Filet <strong>$700</strong> </li>
                            <li>yeast muffins<strong>$999</strong> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="price padding-bottom">
                    <div class="price_body">
                        <ul class="pricing_feature">
                            <li>Special Spaghetti  <strong>$40</strong> </li>
                            <li>Salmon Filet <strong>$35</strong> </li>
                            <li> The Space Chicken <strong>$25</strong> </li>
                            <li>Spice Chicken <strong>$20</strong> </li>
                            <li>Steaks in Garlic-Lime <strong>$7</strong> </li>
                            <li>Salmon Filet <strong>$10</strong> </li>
                            <li>yeast muffins<strong>$999</strong> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Footer-->
<footer class="padding-top bg_black">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 footer_column">
                <h4 class="heading">Why Bistro?</h4>
                <hr class="half_space">
                <p class="half_space">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore dolor in hendrerit in vulputate.</p>
                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.</p>
            </div>
            <div class="col-md-3 col-sm-6 footer_column">
                <h4 class="heading">Quick Links</h4>
                <hr class="half_space">
                <ul class="widget_links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="location.html">Locations</a></li>
                    <li><a href="menu.html">Menu</a></li>
                    <li><a href="faq.html">Faq's</a></li>
                    <li><a href="order.html">Order Now</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="food.html">Food</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 footer_column">
                <h4 class="heading">Newsletter</h4>
                <hr class="half_space">
                <p class="icon"><i class="icon-dollar"></i>Sign up with your name and email to get updates fresh updates.</p>
                <div id="result1" class="text-center"></div>

                <form action="http://themesindustry.us13.list-manage.com/subscribe/post-json?u=4d80221ea53f3a4487ddebd93&id=494727d648&c=?" method="get" onSubmit="return false" class="newsletter">
                    <div class="form-group">
                        <input type="email" placeholder="E-mail Address" required name="EMAIL" id="EMAIL" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn-submit button3" value="Subscribe" />
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 footer_column">
                <h4 class="heading">Get in Touch</h4>
                <hr class="half_space">
                <p>Restaurant, to consequat ipsum nec sagittis sem.</p>
                <p class="address"><i class="icon-location"></i>Restaurant, Manhattan 1258,New York, USA Lahore</p>
                <p class="address"><i class="fa fa-phone"></i>(+1) 234 567 8901</p>
                <p class="address"><i class="icon-dollar"></i><a href="mailto:hello@website.com">hello@website.com</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright clearfix">
                    <p>Copyright &copy; 2016 Bistro. All Right Reserved</p>
                    <ul class="social_icon">
                        <li><a href="#." class="facebook"><i class="icon-facebook5"></i></a></li>
                        <li><a href="#." class="twitter"><i class="icon-twitter4"></i></a></li>
                        <li><a href="#." class="google"><i class="icon-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="#." id="back-top"><i class="fa fa-angle-up fa-2x"></i></a>

<script src="js/jquery-2.2.3.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery-countTo.js"></script>
<script src="js/owl.carousel.min.js" type="text/javascript"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/functions.js" type="text/javascript"></script>
</body>
</html>
