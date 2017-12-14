<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content=" ">
    <meta name="author" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" >

    <title>Decima - Cart Items</title>

    <link rel="stylesheet" type="text/css" href="css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="css/chosen.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.js"></script>
      <script src="bootstrap/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="wrapper">

  <header id="MainNav">
    <div class="container">
      <div class="row">
        <section class="col-md-12" id="TopBar">
          <a href="08-a-shop-account-login.html" class="btn btn-link pull-left btn-login">
            Login
          </a>

          <!-- SHOPPING CART -->
          <div class="shopping-cart-widget pull-right">
            <button type="button" class="btn btn-link pull-right">
              <span aria-hidden="true" data-icon="&#xe006;"></span> 2 items: $89.00 <b class="caret"></b>
            </button>
            <div role="complementary">
              <!-- SHOP SUMMARY ITEM -->
              <article class="shop-summary-item">
                <img src="images/content/cart-purchased-small-1.jpg"  alt="Shop item in cart">
                    <div class="item-info-name-features-price">
                        <h4><a href="#">Leggings in Denim Look</a></h4>
                        <span class="features">Black, S</span><br>
                        <span class="quantity">1</span><b>&times;</b><span class="price">$24.00</span>
                    </div>
                <button type="button" class="close" aria-hidden="true"><span aria-hidden="true" data-icon="&#xe005;"></span></button>
              </article>
              <!-- !SHOP SUMMARY ITEM -->
              <!-- SHOP SUMMARY ITEM -->
              <article class="shop-summary-item">
                <img src="images/content/cart-purchased-small-2.jpg"  alt="Shop item in cart">
                      <div class="item-info-name-features-price">
                          <h4><a href="#">Denim Jacket in Oversized Boyfriend Fit in Vintage Wash</a></h4>
                          <span class="features">Light Blue, M</span><br>
                          <span class="quantity">1</span><b>&times;</b><span class="price">$65.00</span>
                      </div>
                <button type="button" class="close" aria-hidden="true"><span aria-hidden="true" data-icon="&#xe005;"></span></button>
              </article>
              <!-- !SHOP SUMMARY ITEM -->
              <hr>
              <span class="total-price-tag pull-left">Cart subtotal</span><span class="total-price pull-right">$89.00</span>
              <div class="clearfix"></div>
              <a href="05-b-shop-shopping-cart.html" class="btn btn-primary btn-block">
                View shopping cart
              </a>
              <a href="06-a-shop-checkout.html" class="btn btn-default btn-block">
                Proceed to checkout
              </a>
            </div>
          </div>
          <!-- !SHOPPING CART -->
        </section>
        <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle btn btn-primary">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=" "></a>
          </div>

          <div class="navbar-collapse navbar-main-collapse" role="navigation">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Home <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="index.html">Home Version 1</a></li>
                  <li><a href="02-home-two.html">Home Version 2</a></li>
                </ul>
              </li>
              <li class="active dropdown">
                <a href="03-shop-products-list.html" class="dropdown-toggle" data-toggle="dropdown">Shop <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="03-shop-products-list.html">Product list</a></li>
                  <li><a href="04-shop-product-single.html">Single product</a></li>
                  <li class="dropdown">
                    <a href="05-b-shop-shopping-cart.html" class="dropdown-toggle" data-toggle="dropdown">Shopping cart</a>
                    <ul class="dropdown-menu">
                      <li><a href="05-b-shop-shopping-cart.html">Full cart</a></li>
                      <li><a href="05-a-shop-shopping-cart-empty.html">Empty cart</a></li>
                    </ul>
                  </li>
                  <li><a href="06-a-shop-checkout.html">Checkout</a></li>
                  <li><a href="09-a-shop-account-dashboard.html">My account</a></li>
                  <li><a href="09-e-shop-account-my-wishlist.html">Wishlist</a></li>
                  <li><a href="10-b-shop-customer-service-faq.html">Customer FAQ</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="11-a-portfolio-4-columns.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="11-a-portfolio-4-columns.html">4 columns</a></li>
                  <li><a href="12-a-portfolio-single-horizontal.html">Single Horizontal</a></li>
                  <li><a href="12-b-portfolio-single-vertical.html">Single Vertical</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="14-pages-blog.html" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="14-pages-blog.html">Blog list</a></li>
                  <li><a href="15-pages-blog-single.html">Blog single</a></li>
                  <li><a href="13-pages-about.html">About</a></li>
                  <li><a href="16-pages-contact.html">Contact</a></li>
                  <li><a href="19-icons.html">Icons</a></li>
                  <li><a href="17-pages-404.html">404</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="18-a-shortcodes-elements.html" class="dropdown-toggle" data-toggle="dropdown">Shortcodes <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="18-a-shortcodes-elements.html">Elements</a></li>
                  <li><a href="18-b-shortcodes-buttons-typography.html">Buttons & Typography</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-right navbar-search" role="search">
              <div class="form-group">
                <label class="sr-only" for="navbar-search">Your search</label>
                <input type="search" id="navbar-search" class="form-control">
              </div>
              <button class="btn btn-default navbar-search">
                <span class="fa fa-search">
                    <span class="sr-only">Search</span>
                </span>
              </button>
            </form>
          </div>
          <!-- /.navbar-collapse -->
        </nav>
      </div>
    </div>
  </header>

  <section id="Content" role="main">
        <div class="container">

            <!-- SECTION EMPHASIS 1 -->
            <!-- FULL WIDTH -->
        </div><!-- !container -->
        <div class="full-width section-emphasis-1 page-header">
            <div class="container">
                <header class="row">
                    <div class="col-md-12">
                        <h1 class="strong-header pull-left">
                            Shopping cart
                        </h1>
                        <!-- BREADCRUMBS -->
                        <ul class="breadcrumbs list-inline pull-right">
                            <li><a href="index.html">Home</a></li><!--
                        --><li><a href="03-shop-products.html">Shop</a></li><!--
                        --><li>Shopping cart</li>
                        </ul>
                        <!-- !BREADCRUMBS -->
                    </div>
                </header>
            </div>
        </div><!-- !full-width -->
        <div class="container">
            <!-- !FULL WIDTH -->
            <style type="text/css">
            .table tbody > tr > td
            {
              line-height: 3 !important;
            }
            </style>
            <!-- !SECTION EMPHASIS 1 -->

            <section class="row">
                <form action="billing-address.php" method="post" novalidate>
                    <div class="col-xs-12">
                        <div class="table table-responsive cart-summary">
                            <table>
                                <thead>
                                <tr>
                                    <td colspan="2" class="width20">Product</td>
                                    <td class="width20">Options</td>
                                    <td class="width16">Quantity</td>
                                    <td class="text-right width16">Subtotal</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                          <img src="images/content/front/model_front.png" alt="" class="" style="z-index: 10000;height:155px;width:55px;position:absolute;">
                                        <img src="images/content/front/pants_front.png" alt="" class="" style="z-index: 10001;
                                        height:155px;width:55px;position:absolute;">
                                        <img src="images/content/front/shirt_front.png" alt="" width="343" class="" 
                                        style="z-index: 10002;height:155px;width:55px;position:absolute;">
                                        <img src="images/content/front/neck+style_simple+collar_lapel_short+lapel_wide+fit_straight+body_cut_0+fastening_standard.png" alt="" width="343" class="" style="z-index: 11004;height:155px;width:55px;position:absolute;">
                                        <img src="images/content/front/style_simple+length_short+fit_straight+body_cut_0+fastening_standard.png" alt="" width="343" class="" style="z-index: 11006;height:155px;width:55px;position:absolute;">
                                        <img src="images/content/front/pockets_flap+fit_straight+body_cut_0.png" alt="" width="343" class="" style="z-index: 11008;height:155px;width:55px;position:absolute;">
                                        <img src="images/content/front/mano_left.png" alt="" width="343" class="" style="z-index: 11010;height:155px;width:55px;position:absolute;">
                                        <img src="images/content/front/sleeves_standard.png" alt="" width="343" class="" style="z-index: 11011;height:155px;width:55px;position:relative;">
                                    </td>
                                    <td>
                                        <h4><a href="#">Pants</a></h4>
                                        <span class="price">$50.00</span>
                                        <br><br>
                                        <a href="#">Add to wishlist</a>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <a href="#view1" class="modal-popup-type2">View</a>&nbsp;&nbsp;&nbsp;
                                        <a href="#">Edit</a>&nbsp;&nbsp;&nbsp;
                                        <a href="#">Delete</a>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <input readonly class="form-control spinner-quantity" id="quantity1" required>
                                    </td>
                                    <td class="text-right">
                                        <strong>$24.00</strong>
                                    </td>
                                        <div id="view1" class="popup">
                                          <div class="popup-container">
                                            <div class="popup-content">
                                              <div style="width:480px;float:left;max-height:540px;overflow-x:auto;">
                                                 <h3>Product 1</h3>
                                                 <hr></hr>
                                                 <h4><strong>Pants</strong></h4>
                                                 <h5><strong>Style</strong></h5>
                                                  <div style="width:480px;float:left;max-height:540px;overflow-x:auto;">
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                     <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                     <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                     <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                     <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>


                                                  </div>
                                              </div>
                                               <div class="cart-img" style="width:100px;float:left;">
                                                  <img src="images/content/front/model_front.png" alt="" class="" style="z-index: 10000;height:450px;width:150px;position:absolute;">
                                                  <img src="images/content/front/pants_front.png" alt="" class="" style="z-index: 10001;
                                                  height:450px;width:150px;position:absolute;">
                                                  <img src="images/content/front/shirt_front.png" alt="" class="" 
                                                  style="z-index: 10002;height:450px;width:150px;position:absolute;">
                                                  <img src="images/content/front/neck+style_simple+collar_lapel_short+lapel_wide+fit_straight+body_cut_0+fastening_standard.png" alt="" class="" style="z-index: 11004;height:450px;width:150px;position:absolute;">
                                                  <img src="images/content/front/style_simple+length_short+fit_straight+body_cut_0+fastening_standard.png" alt="" width="343" class="" style="z-index: 11006;height:450px;width:150px;position:absolute;">
                                                  <img src="images/content/front/pockets_flap+fit_straight+body_cut_0.png" alt="" width="343" class="" style="z-index: 11008;height:450px;width:150px;position:absolute;">
                                                  <img src="images/content/front/mano_left.png" alt="" width="343" class="" style="z-index: 11010;height:450px;width:150px;position:absolute;">
                                                  <img src="images/content/front/sleeves_standard.png" alt="" width="343" class="" style="z-index: 11011;height:450px;width:150px;position:absolute;">
                                               </div>
                                               <div class="popup-close js-popup-close modal-close">X</div>
                                            </div>
                                          </div>
                                        </div>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="https://localhost/customizer/3d/woman/models/1/front/model_front.png" alt="" width="343" class="" style="z-index: 10000;height:155px;width:55px;position:absolute;">
                                        <img src="https://localhost/customizer/3d/woman/pants/shirt/front/shirt_front_medium.png" alt="" width="343" class="" style="z-index: 10001;height:85px;width:55px;position:absolute;">
                                        <img src="https://localhost/customizer/3d/woman/pants/1082_fabric/front/length_long+cut_skinny+crotch_medium.png" alt="" width="343" class="" style="z-index: 20000;height:155px;width:55px;position:absolute;">
                                        <img src="https://localhost/customizer/3d/woman/pants/1082_fabric/front/front_closure_center_button+belt_loops_standard+crotch_medium.png" alt="" width="343" class="" style="z-index: 22000;height:155px;width:55px;position:absolute;">
                                        <img src="https://localhost/customizer/3d/woman/pants/1082_fabric/front/belt_loops_standard+crotch_medium.png" alt="" width="343" class="" style="z-index: 23000;height:155px;width:55px;position:absolute;">
                                        <img src="https://localhost/customizer/3d/woman/pants/1082_fabric/front/front_pocket_straight+crotch_medium.png" alt="" width="343" class="" style="z-index: 21500;height:155px;width:55px;">
                                    </td>
                                    <td>
                                        <h4><a href="#">Coat</a></h4>
                                        <span class="price">$65.00</span>
                                        <br><br>
                                        <a href="#">Add to wishlist</a>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td>
                                       <a href="#view2" class="modal-popup-type2">View</a>&nbsp;&nbsp;&nbsp;
                                        <a href="#">Edit</a>&nbsp;&nbsp;&nbsp;
                                        <a href="#">Delete</a>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <input type="text" readonly class="form-control spinner-quantity" size="10"  id="quantity2" required>
                                    </td>
                                    <td class="text-right">
                                        <strong>$65.00</strong>
                                    </td>
                                       <div id="view2" class="popup">
                                          <div class="popup-container">
                                            <div class="popup-content">
                                              <div style="width:480px;float:left;max-height:540px;overflow-x:auto;">
                                                 <h3>Product 2</h3>
                                                 <hr></hr>
                                                 <h4><strong>Pants</strong></h4>
                                                 <h5><strong>Style</strong></h5>
                                                  <div style="width:480px;float:left;max-height:540px;overflow-x:auto;">
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                     <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                     <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                     <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                     <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>
                                                    <div style="width:300px;">
                                                      <label style="width:100px;">Fit : </label>
                                                      <label style="width:150px;">Fit</label>
                                                    </div>


                                                  </div>
                                              </div>
                                               <div class="cart-img" style="width:100px;float:left;">
                                                <img src="https://localhost/customizer/3d/woman/models/1/front/model_front.png" class="" style="z-index: 10000;height:450px;width:150px;position:absolute;">
                                                <img src="https://localhost/customizer/3d/woman/pants/shirt/front/shirt_front_medium.png" class="" style="z-index: 10001;height:255px;width:150px;position:absolute;">
                                                <img src="https://localhost/customizer/3d/woman/pants/1082_fabric/front/length_long+cut_skinny+crotch_medium.png" class="" style="z-index: 20000;height:450px;width:150px;position:absolute;">
                                                <img src="https://localhost/customizer/3d/woman/pants/1082_fabric/front/front_closure_center_button+belt_loops_standard+crotch_medium.png" class="" style="z-index: 22000;height:450px;width:150px;position:absolute;">
                                                <img src="https://localhost/customizer/3d/woman/pants/1082_fabric/front/belt_loops_standard+crotch_medium.png"  class="" style="z-index: 23000;height:450px;width:150px;position:absolute;">
                                                <img src="https://localhost/customizer/3d/woman/pants/1082_fabric/front/front_pocket_straight+crotch_medium.png" class="" style="z-index: 21500;height:450px;width:150px;">
                                               </div>
                                               <div class="popup-close js-popup-close modal-close">X</div>
                                            </div>
                                          </div>
                                        </div>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 form-inline">
                        <div class="form-group">
                            <label for="promo-code" class="sr-only">Promo code</label>
                            <input type="text" class="form-control" id="promo-code" required placeholder="Enter promo code">
                        </div><!--
                        --><button type="button" class="btn btn-primary btn-small">Apply</button>
                    </div>
                    <div class="col-sm-6 col-md-4 col-md-offset-4">
                        <div class="table">
                            <table class="price-calc">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td class="text-right">
                                            <strong>$99.00</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td class="text-right">
                                            <button type="button" class="btn btn-link shipment-calc-toggle">Calculate</button>
                                        </td>
                                    </tr>
                                    <tr class="shipment-calc">
                                        <td colspan="2">
                                            <div class="form-group">
                                                <label for="country" class="sr-only">Country</label>
                                                <select class="chosen chosen-select-deselect form-control" id="country" data-placeholder="Select your country" tabindex="1">
                                                    <option value=""> </option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Aland Islands">Aland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                </select>
                                                <label for="state" class="sr-only">State</label>
                                                <select class="chosen chosen-select-deselect form-control" id="state" data-placeholder="Select your state" tabindex="1">
                                                    <option value=""> </option>
                                                    <option value="">Alaska</option>
                                                    <option value="">Arizona</option>
                                                    <option value="">Arkansas</option>
                                                    <option value="">California</option>
                                                    <option value="">Colorado</option>
                                                    <option value="">Connecticut</option>
                                                    <option value="">Delaware</option>
                                                    <option value="">Florida</option>
                                                    <option value="">Georgia</option>
                                                    <option value="">Hawaii</option>
                                                    <option value="">Idaho</option>
                                                    <option value="">Illinois</option>
                                                    <option value="">Indiana</option>
                                                    <option value="">Iowa</option>
                                                    <option value="">Kansas</option>
                                                    <option value="">Kentucky</option>
                                                </select>
                                                <label for="postal-code" class="sr-only">Postal code / Zip code</label>
                                                <input type="text" class="form-control" id="postal-code" required placeholder="Postal code / Zip code">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order total</th>
                                        <td class="text-right">
                                            $89.00
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <button type="button" class="btn btn-default pull-left">Continue shopping</button>
                        <button type="submit" class="btn btn-primary pull-right">Proceed to checkout</button>
                    </div>
                </form>
            </section>
        </div>
  </section>

  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->

  <footer>
    <div class="container">
      <section class="row">
        <div class="col-md-3 col-sm-6">
          <h3 class="strong-header">
            Company
          </h3>

          <div class="link-widget">
            <ul class="list-unstyled">
              <li><a href="13-pages-about.html">About us</a></li>
              <li><a href="#">Jobs</a></li>
              <li><a href="#">Affiliates</a></li>
              <li><a href="16-pages-contact.html">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <h3 class="strong-header">
            Help
          </h3>

          <div class="link-widget">
            <ul class="list-unstyled">
              <li><a href="10-a-shop-customer-service-track-order.html">Track order</a></li>
              <li><a href="10-b-shop-customer-service-faq.html">FAQs</a></li>
              <li><a href="#">Shipping info</a></li>
              <li><a href="#">Payment</a></li>
              <li><a href="#">Returns</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <h3 class="strong-header">
            Quick links
          </h3>

          <div class="link-widget">
            <ul class="list-unstyled">
              <li><a href="#">Size guide</a></li>
              <li><a href="09-a-shop-account-dashboard.html">My account</a></li>
              <li><a href="09-e-shop-account-my-wishlist.html">Wishlist</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <h3 class="strong-header">
            Follow us
          </h3>

          <div class="social-widget">
            <ul class="list-inline">
              <li><a href="#" class="fb"><span class="sr-only">Facebook</span></a></li>
              <li><a href="#" class="tw"><span class="sr-only">Twitter</span></a></li>
              <li><a href="#" class="gp"><span class="sr-only">Google+</span></a></li>
              <li><a href="#" class="pt"><span class="sr-only">Pinterest</span></a></li>
              <li><a href="#" class="in"><span class="sr-only">LinkedIn</span></a></li>
            </ul>
          </div>
        </div>
      </section>
      <hr>
      <section class="row">
        <div class="col-md-12">
          <span class="copyright pull-left">&copy; 2014 Decima Store</span>
          <ul class="payment-methods list-inline pull-right">
            <li>
              <span class="payment-visa"><span class="sr-only">Visa</span></span>
            </li>
            <li>
              <span class="payment-mastercard"><span class="sr-only">MasterCard</span></span>
            </li>
            <li>
              <span class="payment-paypal"><span class="sr-only">PayPal</span></span>
            </li>
            <li>
              <span class="payment-americanexpress"><span class="sr-only">American Express</span></span>
            </li>
          </ul>
        </div>
      </section>
    </div>
  </footer>

</div>

<!-- SCRIPTS -->
<!-- core -->
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- !core -->

<!-- plugins -->
<script src="js/jquery.flexslider-min.js"></script>

<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.ba-bbq.min.js"></script>

<script src="js/jquery-ui-1.10.3.custom.min.js"></script>

<script src="js/jquery.raty.min.js"></script>

<script src="js/jquery.prettyPhoto.js"></script>

<script src="js/chosen.jquery.min.js"></script>
<!-- !plugins -->

<script src="js/main.js"></script>
<script src="js/jquery.stepframemodal.js"></script>
  <script type="text/javascript">

  $("a[href^=#]").click(function(e){
    e.preventDefault();
  });

 $('.modal-popup-type2').setupModal({id: 'popMod2', modal: true, transition:'slideDown'});
 $(".popup-close").click(function(){
          $(".popup").hide();
      });
</script>
</body>
</html>