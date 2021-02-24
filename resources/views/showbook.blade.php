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
                <li><a href="index.html"   class="parent"  >Home</a> </li>
                <li><a href="category.html"   class="parent"  >Electronics</a> </li>
                <li><a href="category.html"   class="parent"  >Mobile</a> </li>
                <li><a href="category.html"   class="parent"  >Fashio & Beauty</a> </li>
                <li><a href="category.html"   class="parent"  >Audio</a> </li>
                <li><a href="category.html"   class="parent"  >Home & Family</a> </li>
                <li><a href="#" class="active parent">Page</a>
                    <ul>
                        <li><a href="category.html">Category Page</a></li>
                        <li><a href="cart.html">Cart Page</a></li>
                        <li><a href="checkout.html">Checkout Page</a></li>
                        <li><a href="blog.html" >Blog Page</a></li>
                        <li><a href="singale-blog.html" >Singale Blog Page</a></li>
                        <li><a href="register.html">Register Page</a></li>
                        <li><a href="contact.html">Contact Page</a></li>
                    </ul>
                </li>
                <li><a href="blog.html" class="parent"  >Blog</a></li>
                <li><a href="about-us.html" >About us</a></li>
                <li><a href="contact.html" >Contact Us</a> </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
  <div class="row">
    <div id="content" class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <div class="thumbnails">
            <div><a class="thumbnail fancybox" href="{{ asset('image/product/product1.jpg')}}" title="lorem ippsum dolor dummy">
              <img src="{{ asset('image/product/product1.jpg')}}" title="lorem ippsum dolor dummy" alt="lorem ippsum dolor dummy" /></a>


              <img alt="{{ $book->name }}" class="lg:w-1/3 w-full h-96 object-cover object-center rounded"
                     src="{{ asset($book->cover->getUrl('cover')) }}">


            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <h1 class="productpage-title">lorem ippsum dolor dummy</h1>
          <div class="rating product"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="review-count"> <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">1 reviews</a> / <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a></span>
            <hr>
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like" ></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
            <script type="text/javascript" src="../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>
            <!-- AddThis Button END -->
          </div>
          <ul class="list-unstyled productinfo-details-top">
            <li>
              <h2 class="productpage-price">$122.00</h2>
            </li>
            <li><span class="productinfo-tax">Ex Tax: $100.00</span></li>
          </ul>
          <hr>
          <ul class="list-unstyled product_info">
            <li>
              <label>Brand:</label>
              <span> <a href="#">Apple</a></span></li>
            <li>
              <label>Product Code:</label>
              <span> product 20</span></li>
            <li>
              <label>Availability:</label>
              <span> In Stock</span></li>
          </ul>
          <hr>
          <p class="product-desc"> More room to move.
            With 80GB or 160GB of storage and up to 40 hours of battery life, the new lorem ippsum dolor dummy lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.
            Cover Flow.
            Browse through your music collection by flipping..</p>
          <div id="product">
            <div class="form-group">
              <label class="control-label qty-label" for="input-quantity">Qty</label>
              <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control productpage-qty" />
              <input type="hidden" name="product_id" value="48" />
              <div class="btn-group">
                <button type="button" data-toggle="tooltip" class="btn btn-default wishlist" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                <button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block addtocart">Add to Cart</button>
                <button type="button" data-toggle="tooltip" class="btn btn-default compare" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="productinfo-tab">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
          <li><a href="#tab-review" data-toggle="tab">Reviews (1)</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-description">
            <div class="cpt_product_description ">
              <div>
                <p> <strong>More room to move.</strong></p>
                <p> With 80GB or 160GB of storage and up to 40 hours of battery life, the new lorem ippsum dolor dummy lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.</p>
                <p> <strong>Cover Flow.</strong></p>
                <p> Browse through your music collection by flipping through album art. Select an album to turn it over and see the track list.</p>
                <p> <strong>Enhanced interface.</strong></p>
                <p> Experience a whole new way to browse and view your music and video.</p>
                <p> <strong>Sleeker design.</strong></p>
                <p> Beautiful, durable, and sleeker than ever, lorem ippsum dolor dummy now features an anodized aluminum and polished stainless steel enclosure with rounded edges.</p>
              </div>
            </div>
            <!-- cpt_container_end --></div>
          <div class="tab-pane" id="tab-review">
            <form class="form-horizontal">
              <div id="review"></div>
              <h2>Write a review</h2>
              <div class="form-group required">
                <div class="col-sm-12">
                  <label class="control-label" for="input-name">Your Name</label>
                  <input type="text" name="name" value="" id="input-name" class="form-control" />
                </div>
              </div>
              <div class="form-group required">
                <div class="col-sm-12">
                  <label class="control-label" for="input-review">Your Review</label>
                  <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                  <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                </div>
              </div>
              <div class="form-group required">
                <div class="col-sm-12">
                  <label class="control-label">Rating</label>
                  &nbsp;&nbsp;&nbsp; Bad&nbsp;
                  <input type="radio" name="rating" value="1" />
                  &nbsp;
                  <input type="radio" name="rating" value="2" />
                  &nbsp;
                  <input type="radio" name="rating" value="3" />
                  &nbsp;
                  <input type="radio" name="rating" value="4" />
                  &nbsp;
                  <input type="radio" name="rating" value="5" />
                  &nbsp;Good</div>
              </div>
              <div class="buttons clearfix">
                <div class="pull-right">
                  <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                </div>
              </div>
            </form>
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

