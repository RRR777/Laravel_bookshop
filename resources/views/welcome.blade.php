<!DOCTYPE html>

<html lang="en">
<head>
<title>Bookshop</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="e-commerce site well design with responsive view." />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,100,200,500,900,800,700,600' rel='stylesheet' type='text/css'>
<link href="{{ asset('assets/css/stylesheet.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('assets/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/js/owl-carousel/owl.transitions.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />

</head>
<body class="category col-2 left-col">
<div class="preloader loader" style="display: block;"> <img src="image/loader.gif"  alt="#"/></div>
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="top-left pull-left">
                      <div id="search" class="input-group">
                        <input type="text" name="search" value="" placeholder="Search" class="form-control input-lg" />
                      </div>
                    </div>
                    <div class="top-right pull-right">
                        <div id="top-links" class="nav pull-right">
                            <ul class="list-inline">
                              @if (Route::has('login'))
                                <li class="dropdown"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span>My Account</span> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                      @auth
                                        <li><a href="{{ url('/user/books') }}">My Books</a></li>
                                      @else
                                          <li><a href="{{ route('login') }}">Login</a></li>
                                        @if (Route::has('register'))
                                          <li><a href="{{ route('register') }}">Register</a></li>
                                        @endif
                                      @endauth
                                    </ul>
                                </li>
                              @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav id="menu" class="navbar">
    <div class="nav-inner container">
        <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
            <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
        </div>
        <div class="navbar-collapse">
            <ul class="main-navigation">
              @foreach ($genres as $genre)
                <li><a href="genres.html" >{{ $genre->name }}</a> </li>
              @endforeach
            </ul>
        </div>
    </div>
</nav>
<div class="container">
  <div class="row">
    <div id="content" class="col-sm-9">
      <div class="category-page-wrapper">
        <div class="col-md-6 list-grid-wrapper">
          <div class="btn-group btn-list-grid">
            <button type="button" id="list-view" class="btn btn-default list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
          </div>
        </div>
      </div>
      <br />




      <div class="grid-list-wrapper">
        @foreach ($books as $book)
        <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image product-imageblock"> <a href="product.html"> <img src="{{ $book->cover ? $book->cover->getUrl('cover') : "https://via.placeholder.com/217x384.png?text=Book+photo" }}" alt="women's clothing stores" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                <button type="button" class="addtocart-btn">Add to Cart</button>
                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
              </div>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"> <a href="product.html" title="lorem ippsum dolor dummy"> {{ $book->title }} </a> </h4>
              <p class="product-desc"> {{ $book->description }}</p>
              <p class="price product-price"><span class="price-old">$272.00</span> ${{ $book->price }} <span class="price-tax">Ex Tax: $100.00</span> </p>
              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
            </div>
            <div class="button-group">
              <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
              <button type="button" class="addtocart-btn">Add to Cart</button>
              <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>

        @endforeach


      </div>
      <div class="category-page-wrapper">
        <div class="result-inner">Showing 1 to 8 of 10 (2 Pages)</div>
        <div class="pagination-inner">
          <ul class="pagination">
            <li class="active"><span>1</span></li>
            <li><a href="category.html">2</a></li>
            <li><a href="category.html">&gt;</a></li>
            <li><a href="category.html">&gt;|</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 footer-block">
                <h5 class="footer-title">Information</h5>
                <ul class="list-unstyled ul-wrapper">
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="checkout.html">Delivery Information</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                </ul>
            </div>
            <div class="col-sm-3 footer-block">
                <h5 class="footer-title">Customer Service</h5>
                <ul class="list-unstyled ul-wrapper">
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">Wish List</a></li>
                </ul>
            </div>
            <div class="col-sm-3 footer-block">
                <h5 class="footer-title">Extras</h5>
                <ul class="list-unstyled ul-wrapper">
                    <li><a href="#">Brands</a></li>
                    <li><a href="gift.html">Gift Vouchers</a></li>
                    <li><a href="affiliate.html">Affiliates</a></li>
                    <li><a href="#">Specials</a></li>
                </ul>
            </div>
            <div class="col-sm-3 footer-block">
                <div class="content_footercms_right">
                    <div class="footer-contact">
                        <h5 class="contact-title footer-title">Contact Us</h5>
                        <ul class="ul-wrapper">
                            <li><i class="fa fa-map-marker"></i><span class="location2"> Warehouse & Offices,<br>
                                12345 Street name, California<br>
                                USA</span></li>
                            <li><i class="fa fa-envelope"></i><span class="mail2"><a href="#">info@localhost.com</a></span></li>
                            <li><i class="fa fa-mobile"></i><span class="phone2">+91 0987-654-321</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="scrollup">Scroll</a> </footer>
<div class="footer-bottom">
  <div class="container">
    <div class="copyright">Powered By<a class="yourstore" href="http://www.lionode.com/">lionode &copy; 2016 </a> </div>
    <div class="footer-bottom-cms">
      <div class="footer-payment">
        <ul>
          <li class="mastero"><a href="#"><img alt="" src="image/payment/mastero.jpg"></a></li>
          <li class="visa"><a href="#"><img alt="" src="image/payment/visa.jpg"></a></li>
          <li class="currus"><a href="#"><img alt="" src="image/payment/currus.jpg"></a></li>
          <li class="discover"><a href="#"><img alt="" src="image/payment/discover.jpg"></a></li>
          <li class="bank"><a href="#"><img alt="" src="image/payment/bank.jpg"></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('assets/js//jquery-2.1.1.min.js') }}" ></script>
<script src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}" ></script>
<script src="{{ asset('assets/js/template_js/jstree.min.js') }}" ></script>
<script src="{{ asset('assets/js/template_js/template.js') }}" ></script>
<script src="{{ asset('assets/js/common.js') }}" ></script>
<script src="{{ asset('assets/js/global.js') }}" ></script>
<script src="{{ asset('assets/js/owl-carousel/owl.carousel.min.js') }}" ></script>

</body>
</html>

