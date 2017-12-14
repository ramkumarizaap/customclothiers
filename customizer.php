<?php session_start(); $fabID="443" ; $_SESSION[ 'fabID']=$fabID; ?>
<!DOCTYPE html>
<html lang="en" xml:lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content=" ">
    <meta name="author" content=" ">
    <meta http-equiv="content-language" content="en" />

    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <title>Kootoor Store - Customizer</title>

    <link rel="stylesheet" type="text/css" href="css/flexslider.css">
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
    <script type="text/javascript">
        var region_url = '/en/';
        var currency = {
            "iso": "EUR",
            "symbol": "\u20ac"
        };
        var cdn_host = 'https://localhost/shopping-cart/';
        //var cdn_host = 'https://162.144.41.156/~izaapinn/customizer/woman/';
        var ready_callbacks = [];
        var ga_callbacks = [];
        var mobile_enabled = false;
        var dataLayer = [{
            "region": "en",
            "lang": "en",
            "currency": {
                "iso": "EUR",
                "symbol": "\u20ac"
            },
            "length_units": "cm",
            "weigth_units": "kg",
            "gender": "woman",
            "menu_item": "personalize",
            "cart_n_products": 1,
            "cart_price": 159,
            "isAdmin": false,
            "mobile_device": false,
            "mobile_ready": true,
            "mobile_enabled": false,
            "customer_logged": 0,
            "device_type": "desktop"
        }];
    </script>
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
                                    <img src="images/content/cart-purchased-small-1.jpg" alt="Shop item in cart">
                                    <div class="item-info-name-features-price">
                                        <h4><a href="#">Leggings in Denim Look</a></h4>
                                        <span class="features">Black, S</span>
                                        <br>
                                        <span class="quantity">1</span><b>&times;</b><span class="price">$24.00</span>
                                    </div>
                                    <button type="button" class="close" aria-hidden="true"><span aria-hidden="true" data-icon="&#xe005;"></span>
                                    </button>
                                </article>
                                <!-- !SHOP SUMMARY ITEM -->
                                <!-- SHOP SUMMARY ITEM -->
                                <article class="shop-summary-item">
                                    <img src="images/content/cart-purchased-small-2.jpg" alt="Shop item in cart">
                                    <div class="item-info-name-features-price">
                                        <h4><a href="#">Denim Jacket in Oversized Boyfriend Fit in Vintage Wash</a></h4>
                                        <span class="features">Light Blue, M</span>
                                        <br>
                                        <span class="quantity">1</span><b>&times;</b><span class="price">$65.00</span>
                                    </div>
                                    <button type="button" class="close" aria-hidden="true"><span aria-hidden="true" data-icon="&#xe005;"></span>
                                    </button>
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
                            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=" ">
                            </a>
                        </div>

                        <div class="navbar-collapse navbar-main-collapse" role="navigation">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Home <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.html">Home Version 1</a>
                                        </li>
                                        <li><a href="02-home-two.html">Home Version 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="03-shop-products-list.html" class="dropdown-toggle" data-toggle="dropdown">Shop <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="03-shop-products-list.html">Product list</a>
                                        </li>
                                        <li><a href="04-shop-product-single.html">Single product</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="05-b-shop-shopping-cart.html" class="dropdown-toggle" data-toggle="dropdown">Shopping cart</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="05-b-shop-shopping-cart.html">Full cart</a>
                                                </li>
                                                <li><a href="05-a-shop-shopping-cart-empty.html">Empty cart</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="06-a-shop-checkout.html">Checkout</a>
                                        </li>
                                        <li><a href="09-a-shop-account-dashboard.html">My account</a>
                                        </li>
                                        <li><a href="09-e-shop-account-my-wishlist.html">Wishlist</a>
                                        </li>
                                        <li><a href="10-b-shop-customer-service-faq.html">Customer FAQ</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="11-a-portfolio-4-columns.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="11-a-portfolio-4-columns.html">4 columns</a>
                                        </li>
                                        <li><a href="12-a-portfolio-single-horizontal.html">Single Horizontal</a>
                                        </li>
                                        <li><a href="12-b-portfolio-single-vertical.html">Single Vertical</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="active dropdown">
                                    <a href="14-pages-blog.html" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="14-pages-blog.html">Blog list</a>
                                        </li>
                                        <li><a href="15-pages-blog-single.html">Blog single</a>
                                        </li>
                                        <li><a href="13-pages-about.html">About</a>
                                        </li>
                                        <li><a href="16-pages-contact.html">Contact</a>
                                        </li>
                                        <li><a href="19-icons.html">Icons</a>
                                        </li>
                                        <li><a href="17-pages-404.html">404</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="18-a-shortcodes-elements.html" class="dropdown-toggle" data-toggle="dropdown">Shortcodes <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="18-a-shortcodes-elements.html">Elements</a>
                                        </li>
                                        <li><a href="18-b-shortcodes-buttons-typography.html">Buttons & Typography</a>
                                        </li>
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
            </div>
            <!-- !container -->
            <div class="full-width section-emphasis-1 page-header">
                <div class="container">
                    <header class="row">
                        <div class="col-md-12">
                            <h1 class=" pull-left">
                            Blog
                        </h1>
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumbs list-inline pull-right">
                                <li><a href="index.html">Home</a>
                                </li>
                                <!--
                            -->
                                <li><a href="index.html">Pages</a>
                                </li>
                                <!--
                            -->
                                <li>Blog</li>
                            </ul>
                            <!-- !BREADCRUMBS -->
                        </div>
                    </header>
                </div>
            </div>
            <!-- !full-width -->
            <!-- !FULL WIDTH -->
            <!-- !SECTION EMPHASIS 1 -->

            <div class="container" style="min-height:900px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 article-wrapper">
                                <form method="post" class="garment_form" id="garment_form_5427">
                                    <div id="garment_loading_5427" class="garment_loading">
                                        <div class="icon-loading"></div>
                                    </div>
                                    <header class="garment_header">
                                        <h1>COAT CUSTOMIZER</h1>
                                    </header>
                                    <nav class="garment_nav">
                                        <div class="row">
                                            <div class="col-xs-7">
                                                <ul class="nav nav-tabs">
                                                    <li><a href="#config" class="tab">Style</a>
                                                    </li>
                                                    <li><a href="#fabric" class="tab">Fabric</a>
                                                    </li>
                                                    <li><a href="#extra" class="tab">Accents</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-5">
                                                <div class="garment_price pull-left"><small>€</small>
                                                </div>
                                                <input type="hidden" name="garment_price">
                                                <a href="javascript:;" class="step_next btn btn-default pull-right">NEXT STEP</a>
                                                <a href="javascript:;" class="step_prev btn btn-default pull-right">previous</a>
                                            </div>
                                        </div>
                                    </nav>
                                    <div class="garment_container" style="min-height: 1150px">

                                        <div class="garment_blocks">
                                            <div class="garment_block garment_block_config" style="display:none;">
                                                <div class="config_block config_block_woman_coat" data-block="woman_coat">
                                                    <div class="config_block_title"></div>

                                                    <div class="config_field coat_fit">
                                                        <div class="box_title">FIT(WAISTED):</div>
                                                        <div class="box_opt box_opt_radio mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_fit" value="straight" checked="checked" /> Straight
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_fit" value="waisted" /> Waisted
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="config_field coat_style">
                                                        <div class="box_title">LOOK:</div>
                                                        <div class="box_opt box_opt_radio mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_style" value="simple" checked="checked" /> Single breasted</label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_style" value="crossed" /> Double breasted</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="config_field coat_collar">
                                                        <div class="box_title">COLLAR:</div>
                                                        <div class="box_opt box_opt_image mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_collar_classic.jpg" alt="Classic" pagespeed_url_hash="2923604366" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_collar" value="classic" /> Classic
                                                                </label>
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_collar_standup.jpg" alt="Standup" pagespeed_url_hash="2100492489" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_collar" value="standup" /> Standup
                                                                </label>
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_collar_void.jpg" alt="Collarless" pagespeed_url_hash="1398090494" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_collar" value="void" /> Collarless
                                                                </label>

                                                            </div>
                                                            <div style="display: block; float: left;">
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_collar_lady.jpg" alt="Round" pagespeed_url_hash="1319215128" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_collar" value="lady" /> Round
                                                                </label>
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_collar_lapel_short.jpg" alt="Short lapel" pagespeed_url_hash="1866117535" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_collar" value="lapel_short" checked="checked" /> Short lapel</label>
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_collar_lapel_long.jpg" alt="Long lapel" pagespeed_url_hash="1204303583" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_collar" value="lapel_long" /> Long lapel</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="config_field coat_lapel">
                                                        <div class="box_title">LAPEL WIDTH:</div>
                                                        <div class="box_opt box_opt_radio mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_lapel" value="narrow" /> Standard
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_lapel" value="wide" checked="checked" /> Wide
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="config_field coat_buttons">
                                                        <div class="box_title">NUMBER OF BUTTONS:</div>
                                                        <div class="box_opt box_opt_radio mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_buttons" value="2" /> 2
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_buttons" value="4" checked="checked" /> 4
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_buttons" value="8" /> 8
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_buttons" value="12" /> 12
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="config_field coat_length">
                                                        <div class="box_title">LENGTH:</div>
                                                        <div class="box_opt box_opt_radio mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_length" value="short" checked="checked" /> Short
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_length" value="long" /> Long
                                                                </label>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="config_field coat_fastening">
                                                        <div class="box_title">FASTENING:</div>
                                                        <div class="box_opt box_opt_radio mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_fastening" value="standard" checked="checked" /> Standard
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_fastening" value="hide" /> Hidden
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_fastening" value="horn" /> Horn toggle</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="config_field coat_pockets_type">
                                                        <div class="box_title">POCKET STYLE:</div>
                                                        <div class="box_opt box_opt_image mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_pockets_type_0.jpg" alt="No pockets" pagespeed_url_hash="1127119087" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_pockets_type" value="0" /> No pockets</label>
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_pockets_type_flap.jpg" alt="With flap" pagespeed_url_hash="3402328440" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_pockets_type" value="flap" checked="checked" /> With flap</label>
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_pockets_type_diagonal.jpg" alt="Slanted flap" pagespeed_url_hash="1202688944" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_pockets_type" value="diagonal" /> Slanted flap</label>
                                                               
                                                            </div>
                                                            <div style="display: block; float: left;">
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_pockets_type_double_welt.jpg" alt="Double welt" pagespeed_url_hash="2422135911" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_pockets_type" value="double_welt" /> Double welt</label>
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_pockets_type_diagonal_button.jpg" alt="Diagonal with button" pagespeed_url_hash="4122061007" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_pockets_type" value="diagonal_button" /> Diagonal with button</label>
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_pockets_type_patched.jpg" alt="Patched" pagespeed_url_hash="3703194994" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_pockets_type" value="patched" /> Patched
                                                                </label>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="config_field coat_sleeves">
                                                        <div class="box_title">SLEEVES:</div>
                                                        <div class="box_opt box_opt_radio mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_sleeves" value="standard" checked="checked" /> Standard
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_sleeves" value="buttons" /> Buttons
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_sleeves" value="tape" /> Tape
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_sleeves" value="wide" /> Wide
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="config_field coat_belt">
                                                        <div class="box_title">BELT:</div>
                                                        <div class="box_opt box_opt_image mobile_layer" icon-fixed="B">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_belt_0.jpg" alt="Without belt" pagespeed_url_hash="368220850" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_belt" value="0" checked="checked" /> None</label>
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_belt_sewed.jpg" alt="Sewed" pagespeed_url_hash="3626528830" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_belt" value="sewed" /> Sewed
                                                                </label>
                                                                <label class="option option_image t4l_radio"><img src="images/personalize/woman_coat/coat_belt_loose.jpg" alt="Loose" pagespeed_url_hash="4292739352" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="coat_belt" value="loose" /> Loose
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="config_field coat_backcut">
                                                        <div class="box_title">BACK STYLE:</div>
                                                        <div class="box_opt box_opt_radio mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_backcut" value="0" checked="checked" /> Ventless
                                                                </label>
                                                                <label class="option option_radio t4l_radio">
                                                                    <input type="radio" name="coat_backcut" value="1" /> Center vent</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="garment_block garment_block_fabric" style="display: none;">
                                                <div data-block-name="woman_coat" class="fabric_block fabric_block_woman_coat" style="display: block;">
                                                    <div class="fabric_block_title">woman_coat</div>
                                                    <div class="fabric_preview fabric_preview_woman_coat" style="display: block;">
                                                        <div class="infobar"><span class="title fabric_main_title">Magic Black</span><span class="composition">80% cashmere &amp; 20% wool</span>
                                                        </div>
                                                        <a href="#"><img src="dimg/fabric/coat/<?php echo $_SESSION['fabID']; ?>_big.jpg" class="fabric_main_image"></a>
                                                    </div>
                                                    <input type="hidden" value="<?php echo $_SESSION['fabID']; ?>" data-block-name="woman_coat" name="woman_coat" class="fabric_input required">
                                                    <div class="fabric_filters">
                                                        <input type="hidden" value="woman_coat" name="fabric_block">
                                                        <div class="fabric_filter fabric_filter_nav"></div>
                                                        <div id="current_filters" style="display: none;"></div>
                                                    </div>

                                                    <div class="fabric_list loaded">
                                                        <div class="fabric_thumb fabric_443 current">
                                                            <a rel="443" class="select" href="#"> <img alt="Magic Black" src="dimg/fabric/coat/443_normal.jpg" class="b-lazy b-loaded"> </a>
                                                            <div class="title fabric_title">Magic Black</div>
                                                            <div class="composition"></div>
                                                        </div>

                                                        <div class="fabric_thumb fabric_964">
                                                            <a rel="964" class="select " href="#"> <img alt="Newark" src="dimg/fabric/coat/964_normal.jpg" class="b-lazy b-loaded"> </a>
                                                            <div class="price price_part">+12€</div>
                                                            <div class="price price_total">+12€</div>
                                                            <div class="title fabric_title">Newark</div>
                                                            <div class="composition"></div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="garment_block garment_block_extra" style="display:none;">
                                                <div class="extra_block extra_block_woman_coat" data-block-name="woman_coat">
                                                    <div class="extra_container coat_lining extra_container_lining active" data-extra-name="coat_lining" data-extra-type="lining" info-icon="I"><a href="#" class="discard">Delete</a>
                                                        <div class="extra_title">Customize Lining</div>
                                                        <div class="extra_content" style="display: block;">
                                                            <div class="extra_field">
                                                                <input type="hidden" name="coat_lining[lining_id]" class="id" value="" />
                                                                <div class="lining_slider_contents" data-name="coat_lining">
                                                                    <div class="fabric_thumb lining_thumb lining_121 current" value="121">
                                                                        <a href="#" data-id="121" class="extra_select">
                                                                            <img class="b-lazy image b-loaded" src="dimg/lining/default/121_normal.jpg" alt="">
                                                                        </a>
                                                                        <div class="price">9,95€</div>
                                                                        <div class="title">Paris</div>
                                                                    </div>

                                                                    <div class="fabric_thumb lining_thumb lining_96" value="96">
                                                                        <a href="#" data-id="96" class="extra_select">
                                                                            <img class="b-lazy image b-loaded" src="dimg/lining/default/96_normal.jpg" alt="">
                                                                        </a>
                                                                        <div class="price">14,95€</div>
                                                                        <div class="title">Cergy</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="extra_container coat_initials extra_container_initials" data-extra-name="coat_initials" data-extra-type="initials" info-icon="R"><a href="#" class="discard">Delete</a>
                                                        <div class="extra_title">Add monogram</div>
                                                        <div class="extra_content">
                                                            <input type="hidden" class="initials_price" name="initials_price" value="9.95">
                                                            <div class="extra_field extra_field_initials_text required">
                                                                <div class="box_title">WRITE HERE:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <input value="" type="text" name="coat_initials[text]" class="text initials_text" placeholder="Type your initials" maxlength="10">
                                                                        <span class="extra_price">(+ 9,95€ )</span> </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field extra_field_initials_fonts required">
                                                                <div class="box_title">FONT:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <label class="t4l_radio garamond">
                                                                            <input type="radio" class="font" name="coat_initials[font]" value="garamond">
                                                                            <img src="images/personalize/initials/garamond.png" alt="Garamond" pagespeed_url_hash="2694130881" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                        </label>
                                                                        <label class="t4l_radio harrington">
                                                                            <input type="radio" class="font" name="coat_initials[font]" value="harrington">
                                                                            <img src="images/personalize/initials/harrington.png" alt="Harrington" pagespeed_url_hash="3894416190" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                        </label>
                                                                        <label class="t4l_radio times">
                                                                            <input type="radio" class="font" name="coat_initials[font]" value="times">
                                                                            <img src="images/personalize/initials/times.png" alt="Times new Roman" pagespeed_url_hash="500874088" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                        </label>
                                                                        <label class="t4l_radio arial">
                                                                            <input type="radio" class="font" name="coat_initials[font]" value="arial">
                                                                            <img src="images/personalize/initials/arial.png" alt="Arial" pagespeed_url_hash="946517873" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field extra_field_initials_color required">
                                                                <div class="box_title">INITIALS COLOR:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="ffcf10" name="coat_initials[color]" value="9">
                                                                            <span class="thread_color" style="background: #ffcf10"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="4477cf" name="coat_initials[color]" value="11">
                                                                            <span class="thread_color" style="background: #4477cf"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="ffffff" name="coat_initials[color]" value="12">
                                                                            <span class="thread_color" style="background: #ffffff"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="a48239" name="coat_initials[color]" value="13">
                                                                            <span class="thread_color" style="background: #a48239"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="4d020d" name="coat_initials[color]" value="14">
                                                                            <span class="thread_color" style="background: #4d020d"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="b3b3b3" name="coat_initials[color]" value="15">
                                                                            <span class="thread_color" style="background: #b3b3b3"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="331b00" name="coat_initials[color]" value="16">
                                                                            <span class="thread_color" style="background: #331b00"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="000000" name="coat_initials[color]" value="17">
                                                                            <span class="thread_color" style="background: #000000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="b80e58" name="coat_initials[color]" value="18">
                                                                            <span class="thread_color" style="background: #b80e58"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="0ba133" name="coat_initials[color]" value="19">
                                                                            <span class="thread_color" style="background: #0ba133"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="c20000" name="coat_initials[color]" value="25">
                                                                            <span class="thread_color" style="background: #c20000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="ff7912" name="coat_initials[color]" value="31">
                                                                            <span class="thread_color" style="background: #ff7912"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="5f1970" name="coat_initials[color]" value="32">
                                                                            <span class="thread_color" style="background: #5f1970"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color  ">
                                                                            <input type="radio" class="color" data-color="b8f2f2" name="coat_initials[color]" value="33">
                                                                            <span class="thread_color" style="background: #b8f2f2"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="extra_container coat_neck extra_container_colors" style="visibility:hidden;" data-extra-name="coat_neck" data-extra-type="colors" info-icon="T"><a href="#" class="discard">Delete</a>
                                                        <div class="extra_title">Neck lining</div>
                                                        <div class="extra_content">
                                                            <div class="extra_field required extra_field_image contrast" data-field-name="contrast">
                                                                <div class="box_opt box_opt_no_title">
                                                                    <div class="box_opt_fix">
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABBAEEDASIAAhEBAxEB/8QAGwABAAMBAQEBAAAAAAAAAAAAAAQFBgMCBwj/xAA4EAACAQQBAgQCBwUJAAAAAAABAgMABAURBhIhBxMxURVBFBYiMmFxgRdCQ5GhI0RygpKVorHT/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AP2XSlKBSlKBSlQM7lbXDY/6delhF50MH2db6pZVjX1IH3nFBPpSlApSlBBz+PTLYLIYuRyiXltJbswOiA6ld/1qm8KMxJn/AA045mJzue5x0LTHWtyBAGI/DqBrT18i49yTIeHnA8bxnIcYyc2TsWFjEylTDfPskNCwJZy42QgXa9+rpUFgG98P85Ln+NpdXSCO+t55rK9QDQWeGRo5NDv2JUsO57EV05Ny7jPGiiZzN2VlNINxQPJuaX/BGNu/+UGsTxThnMJ1ypyeZfjWLyeSmyJx2McNeAylSyyXXog2CSIlB+12kNbTjPDuMcblluMNhrW2upiTNdkGS4lJ9euV9u36k0FGvidi5iTZ8a5rdxD0lj45dKjDetgui7rP+K/JrzPeH2Tx+K4dy9rqQRvD1YlgC8ciSa1vq79Ot6/WvrVKDJL4gYCLXxaLLYNT/EyeNmt4R+cxXyx+rVqbeaK4gjnglSWGRQ8ciMGV1I2CCOxBHzqByy4Wz4rlrtm6VgsZpCfYKhO/6VA8MUEfhtxhAAAuHtBoDX8FKDRUpSgVl4bOO68ULu+uIVl+H4m3jtHY78p5ZZ/O6R8iVjh2fmAK4+LWSydhxNIMJdNa5TJ39rjraZVDNGZplV3AbttY/MYb+a168PLHJ2c+d+MZM5S7W+WBbpoFiaSJIYyvUq9urbNsjQPqAN6oNPc3EFtF5txMkSb11O2hv2/OoEt3k7k9ONsliQ/3i92oA91jH2m/Jin4E1Q8o53xfHZP4XDf/T86qnpssbate3arsA/YTfl+o7voe9U7S87zDMw4DZC36x0/WLODqdfcwW8csan0133/AFoNBc3tmsjJec+it5gdPHA9rGoPsFdWYf6ia4ibjbt1tm8zeFv3obu5I/lFoVzgbxKjjEUGG4ZZxIQI40yFw4C+3aBdfy/77e5P2nsf7McOi7fvG5fv/wAaD3cQcdu7Sa0kPJZYZ0ZHHVkGBUgg+uxr1rj4KXjTeHWNxtw0n07Cr8KvFkUq4kgAQFg3cdShHG/k4qXB+0MO/n/VZ1P3QnnqR2+e97769qhwxcnxWdmztzhrCaG5hEeQjxtyzyyFCPLmVHRdlVLhgGLMOnQJUAhtaVQfW/C+2U/2m6/86UGO5Tym25JyHj6cSxl9yqPGXkl7JNYdK2gkELxIrXLkRkblZiELMOgdqshwrOcgkkuOZchmjhnPVJicJI9rbka10ySgiWU6ABIKA6+7qt4iKiBEUKqjQAGgK9UFXxvj2C43YCwwGIssZbfOO2hCBj7nXqfxOzVpSlApSlApSlApSlApSlApSlApSlApSlApSlB//9k=" alt="By default" pagespeed_url_hash="545097666" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="coat_neck[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                                            <span class="name">By default</span>
                                                                        </label>
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABBAEEDASIAAhEBAxEB/8QAHAABAAICAwEAAAAAAAAAAAAAAAQGBQcBAgMI/8QAOBAAAQMDAgQEAQgLAAAAAAAAAQIDEQAEBQYhBxIxQRMiUWGBFBUWMlJxgpEjM0JTVnKSlKGx0f/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APsulKUClKUClKguZW0Rn2cIVKN29auXSQIgNoWhJneeqxG3Y/EJ1KUoFKUoKXxQuFY650llkLKSxqG3YUnstNyldsQfuLwV+GspxBzjumtLvZ1CApmzeZcuhEkW/ioDyhuN0oKlfCofFTF5DJ6at1Yy1N5cY/J2eR+SpcCFXCWH0OlCVHYKITtJAkAEiZqm8R9XXOp8LlNFY/S18XspjnGHVXribc2viIIStwDm5QOsHzGNk8srAbeqpZjiNo7G3Tln87DIXragldrjWV3jqFEwApLQVyH+aKpz2HyGcYDesc5cZNooCDYWnNbWcQAQpAJW7Jj9YpQ6QkExWZx1vj8baC1x9oxaW43DbDaUI6dYG3SfhPaSuUSm+J2McTzo05q0pIkFWHcTtE9FQelV7J6qdd4p4HOt6Y1Kiztsde2VyVWAJSXXGFIUOVRkSyue4jpNWLxgPMSuZ2336/n1HtuOxBKOvjA/a/x7e33dvTb6qSozWG1rpzKXiLFq/VbXrhhFresOWrqzEwlLqUle2/lmrFWrcw6HNQ6VaHMSrMoJBBI2aeM7bde5J3mJMlW0qoUpSgVq3S1vONVfcpDuQfcvHFE8yl+IsqSSR18vIB1iB1hIEjiDk9Tva2dx+nsy5jmcLgXMtcITaoeTcvKcKWWnArcoKWntklJmDOwqXice1itO2bFxcNJbtbVttbq1AJhKAJk7R19t/QnmDzedbaV4Zc5llMhtKeZREHePTrudveJKo7xyBbU846xj2Ykqd87gM7zuEpI+9W/oQeTFHUttk3nW9HWmQ1E6kq51YtlKWC5MQq5dIaHrsoq2HeIlsYHXTyxc/RbTTKoHJ8tzTrjyI2A5hbqA27AxPtFSDq4/YKV+k1OpY+wh1odz9hIPQAfhG2wB6j5qIMXmTcPcpcuDP1vQx3V3+PUnKN4biGoguW2lkDuE3twuOvctCev++smeUYHiCTK3dLp9gXzB23mB3Ht29BCCsanXa2LFhnGRk3DiMgzeKDjdwoeGlQS9uoQD4ZXvt6HrA3Qy428yh5lxLja0hSFpMhQIkEHuKoowWs/CAcGnnDEEBx1KTtv1QY7+v5SKmaaub3S9izh89ZtW1g2SizvLZwu27Lf7LThKUlvlGwURywEgq5utFxpXTxmf3qP6hSg1bhshqXM6m1DldL6dft28obdhjK5ppTNum3abMKTbkh5xRWt0gEISQUnm7VmbHhhh3i09qu9u9UPN7oavSE2bZiPJbJhERt5+c+9XylB527LNuwhi3abZaQIQhtISlI9AB0r0pSgUpSgVwpKVJKVAKSRBBGxFc0oK59BNF/wphf7NH/KVY6UClKUClKUClKUClKUClKUH/9k=" alt="Custom color" pagespeed_url_hash="2461528834" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="coat_neck[contrast]" value="custom" data-field-name="contrast" data-price="3.95">
                                                                            <span class="name">Custom color</span><span class="price">+3,95€</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field required extra_field_neck_lining color" data-field-name="color">
                                                                <input type="hidden" name="coat_neck[color]" value="">
                                                                <div class="fabric_thumb thread_thumb " data-id="2"><a href="javascript:;"><span class="image" style="background: #d89f6b"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="3"><a href="javascript:;"><span class="image" style="background: #ea1c1e"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="5"><a href="javascript:;"><span class="image" style="background: #b2a995"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="4"><a href="javascript:;"><span class="image" style="background: #212534"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="6"><a href="javascript:;"><span class="image" style="background: #34322c"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="1"><a href="javascript:;"><span class="image" style="background: #e7e7e7"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="7"><a href="javascript:;"><span class="image" style="background: #1f1f1f"></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="extra_container coat_patches extra_container_colors" style="visibility:hidden;" data-extra-name="coat_patches" data-extra-type="colors" info-icon="L"><a href="#" class="discard">Delete</a>
                                                        <div class="extra_title">Add elbow patches </div>
                                                        <div class="extra_content">
                                                            <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
                                                                <div class="box_opt box_opt_no_title">
                                                                    <div class="box_opt_fix">
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="coat_patches[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                                            <span class="name">By default</span>
                                                                        </label>
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="coat_patches[contrast]" value="custom" data-field-name="contrast" data-price="12.95">
                                                                            <span class="name">Custom color</span><span class="price">+12,95€</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field required extra_field_patches color" data-field-name="color">
                                                                <input type="hidden" name="coat_patches[color]" value="">
                                                                <div class="fabric_thumb patch_thumb " data-id="55"><a href="javascript:;"><span class="image" style="background:url(dimg/patches/default/x55_thumb.jpg.pagespeed.ic.b_t9mMJkHE)"></span></a>
                                                                    <div class="title">Black</div>
                                                                </div>
                                                                <div class="fabric_thumb patch_thumb " data-id="56"><a href="javascript:;"><span class="image" style="background:url(dimg/patches/default/x56_thumb.jpg.pagespeed.ic.wqJfpJ01vZ)"></span></a>
                                                                    <div class="title">Brown</div>
                                                                </div>
                                                                <div class="fabric_thumb patch_thumb " data-id="57"><a href="javascript:;"><span class="image" style="background:url(dimg/patches/default/x57_thumb.jpg.pagespeed.ic.Kgy_HNRBZQ)"></span></a>
                                                                    <div class="title">Beige</div>
                                                                </div>
                                                                <div class="fabric_thumb patch_thumb " data-id="58"><a href="javascript:;"><span class="image" style="background:url(dimg/patches/default/x58_thumb.jpg.pagespeed.ic.vRTOnEEYcZ)"></span></a>
                                                                    <div class="title">Brown-Grey</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="extra_container coat_threads extra_container_threads" style="visibility:hidden;" data-extra-name="coat_threads" data-extra-type="threads" info-icon="O"><a href="#" class="discard">Delete</a>
                                                        <div class="extra_title">Add colored button holes / threads</div>
                                                        <div class="extra_content">
                                                            <div class="extra_field extra_field_radio contrast" data-field-name="contrast">
                                                                <div class="box_opt box_opt_no_title">
                                                                    <div class="box_opt_fix">
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="coat_threads[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                                            <span class="name">By default</span>
                                                                        </label>
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="coat_threads[contrast]" value="all" data-field-name="contrast" data-price="3.5">
                                                                            <span class="name">All</span><span class="price"> (+3,5€)</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field color required extra_field_threads threads" data-field-name="threads">
                                                                <div class="box_title">BUTTON THREADS:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffcf10" name="coat_threads[threads][color]" data-field-name="threads-color" value="9">
                                                                            <span class="thread_color" style="background: #ffcf10"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="4477cf" name="coat_threads[threads][color]" data-field-name="threads-color" value="11">
                                                                            <span class="thread_color" style="background: #4477cf"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffffff" name="coat_threads[threads][color]" data-field-name="threads-color" value="12">
                                                                            <span class="thread_color" style="background: #ffffff"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="a48239" name="coat_threads[threads][color]" data-field-name="threads-color" value="13">
                                                                            <span class="thread_color" style="background: #a48239"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="4d020d" name="coat_threads[threads][color]" data-field-name="threads-color" value="14">
                                                                            <span class="thread_color" style="background: #4d020d"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b3b3b3" name="coat_threads[threads][color]" data-field-name="threads-color" value="15">
                                                                            <span class="thread_color" style="background: #b3b3b3"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="331b00" name="coat_threads[threads][color]" data-field-name="threads-color" value="16">
                                                                            <span class="thread_color" style="background: #331b00"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="000000" name="coat_threads[threads][color]" data-field-name="threads-color" value="17">
                                                                            <span class="thread_color" style="background: #000000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b80e58" name="coat_threads[threads][color]" data-field-name="threads-color" value="18">
                                                                            <span class="thread_color" style="background: #b80e58"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="0ba133" name="coat_threads[threads][color]" data-field-name="threads-color" value="19">
                                                                            <span class="thread_color" style="background: #0ba133"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="c20000" name="coat_threads[threads][color]" data-field-name="threads-color" value="25">
                                                                            <span class="thread_color" style="background: #c20000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ff7912" name="coat_threads[threads][color]" data-field-name="threads-color" value="31">
                                                                            <span class="thread_color" style="background: #ff7912"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="5f1970" name="coat_threads[threads][color]" data-field-name="threads-color" value="32">
                                                                            <span class="thread_color" style="background: #5f1970"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b8f2f2" name="coat_threads[threads][color]" data-field-name="threads-color" value="33">
                                                                            <span class="thread_color" style="background: #b8f2f2"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field color required extra_field_holes holes" data-field-name="holes">
                                                                <div class="box_title">BUTTON HOLES:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffcf10" name="coat_threads[holes][color]" data-field-name="holes-color" value="9">
                                                                            <span class="thread_color" style="background: #ffcf10"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="4477cf" name="coat_threads[holes][color]" data-field-name="holes-color" value="11">
                                                                            <span class="thread_color" style="background: #4477cf"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffffff" name="coat_threads[holes][color]" data-field-name="holes-color" value="12">
                                                                            <span class="thread_color" style="background: #ffffff"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="a48239" name="coat_threads[holes][color]" data-field-name="holes-color" value="13">
                                                                            <span class="thread_color" style="background: #a48239"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="4d020d" name="coat_threads[holes][color]" data-field-name="holes-color" value="14">
                                                                            <span class="thread_color" style="background: #4d020d"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b3b3b3" name="coat_threads[holes][color]" data-field-name="holes-color" value="15">
                                                                            <span class="thread_color" style="background: #b3b3b3"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="331b00" name="coat_threads[holes][color]" data-field-name="holes-color" value="16">
                                                                            <span class="thread_color" style="background: #331b00"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="000000" name="coat_threads[holes][color]" data-field-name="holes-color" value="17">
                                                                            <span class="thread_color" style="background: #000000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b80e58" name="coat_threads[holes][color]" data-field-name="holes-color" value="18">
                                                                            <span class="thread_color" style="background: #b80e58"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="0ba133" name="coat_threads[holes][color]" data-field-name="holes-color" value="19">
                                                                            <span class="thread_color" style="background: #0ba133"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="c20000" name="coat_threads[holes][color]" data-field-name="holes-color" value="25">
                                                                            <span class="thread_color" style="background: #c20000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ff7912" name="coat_threads[holes][color]" data-field-name="holes-color" value="31">
                                                                            <span class="thread_color" style="background: #ff7912"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="5f1970" name="coat_threads[holes][color]" data-field-name="holes-color" value="32">
                                                                            <span class="thread_color" style="background: #5f1970"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b8f2f2" name="coat_threads[holes][color]" data-field-name="holes-color" value="33">
                                                                            <span class="thread_color" style="background: #b8f2f2"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="garment_render">
                                            <div class="render">

                                                <div class="controls"><a data-icon="O" class="icon zoom in" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a> </div>
                                                <div resize_fix="margin-top: -40px; height: " style="width: 390px; margin-top: -40px; margin-left: 0px;" class="render3d resize_fix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </section>

        <div class="clearfix visible-xs visible-sm"></div>
        <!-- fixes floating problems when mobile menu is visible -->

    </div>

    <!-- SCRIPTS -->
    <!-- core -->

    <script src="js/jquery.min.js"></script>

    <script type="text/javascript">
        var garment_opt = {
            "product_type": "woman_coat",
            "price_detail": {
                "base": 159,
                "fabric_woman_coat": 0
            },
            "current": {
                "config": {
                    "coat_style": $('input[name=coat_style]:checked').val(),
                    "coat_collar": $('input[name=coat_collar]:checked').val(),
                    "coat_lapel": $('input[name=coat_lapel]:checked').val(),
                    "coat_length": $('input[name=coat_length]:checked').val(),
                    "coat_fit": $('input[name=coat_fit]:checked').val(),
                    "coat_pockets_type": $('input[name=coat_pockets_type]:checked').val(),
                    "coat_belt": $('input[name=coat_belt]:checked').val(),
                    "coat_backcut": $('input[name=coat_backcut]:checked').val(),
                    "coat_sleeves": $('input[name=coat_sleeves]:checked').val(),
                    "coat_epaulettes": $('input[name=coat_epaulettes]:checked').val()
                },
                "fabric": {
                    "woman_coat": "<?php echo $_SESSION['fabID']; ?>"
                },
                "extras": []
            },
            "errors": [],
            "render_info": {
                "model": 1,
                "size": "390x674:0x0",
                "webview": {
                    "height": 1150,
                    "top": -40,
                    "updown": false
                },
                "mobileview": {
                    "height": 200,
                    "top": -37
                }
            },
            "config": {
                "coat_style": {
                    "simple": ["disable#config:woman_coat:coat_buttons"],
                    "crossed": ["disable#config:woman_coat:coat_fastening", "disable#config:woman_coat:coat_collar:[standup,lady,void]"]
                },
                "coat_collar": {
                    "standup": ["disable#config:woman_coat:coat_lapel", "disable#extra:woman_coat:coat_neck"],
                    "classic": ["disable#config:woman_coat:coat_lapel", "disable#config:woman_coat:coat_buttons:[2,4]"],
                    "lady": ["disable#config:woman_coat:coat_lapel"],
                    "void": ["disable#config:woman_coat:coat_lapel", "disable#extra:woman_coat:coat_neck"],
                    "lapel_short": ["disable#config:woman_coat:coat_fastening", "disable#config:woman_coat:coat_buttons:[2,12]"],
                    "lapel_long": ["disable#config:woman_coat:coat_fastening", "disable#config:woman_coat:coat_buttons:[8,12]"]
                },
                "coat_lapel": false,
                "coat_length": false,
                "coat_fit": false,
                "coat_fastening": {
                    "hide": ["disable#extra:woman_coat:coat_threads"],
                    "horn": ["disable#extra:woman_coat:coat_threads"]
                },
                "coat_buttons": false,
                "coat_pockets_type": false,
                "coat_belt": false,
                "coat_backcut": false,
                "coat_sleeves": false,
                "coat_epaulettes": false
            },
            "fabric": {
                "woman_coat": {
                    "fabric_type": "coat",
                    "price": {
                        "thickness": {
                            "thick": 12
                        }
                    }
                }
            },
            "extra": {
                "coat_lining": {
                    "extra_type": "lining"
                },
                "coat_initials": {
                    "extra_type": "initials"
                },
                "coat_neck": {
                    "extra_type": "colors",
                    "contrast": {
                        "default": ["disable#extra:woman_coat:coat_neck:[color]"]
                    }
                },
                "coat_patches": {
                    "extra_type": "colors",
                    "contrast": {
                        "default": ["disable#extra:woman_coat:coat_patches:[color]"],
                        "custom": ["required#extra:woman_coat:coat_patches:[color]"]
                    }
                },
                "coat_threads": {
                    "extra_type": "threads",
                    "contrast": {
                        "default": ["disable#extra:woman_coat:coat_threads:[threads]", "disable#extra:woman_coat:coat_threads:[holes]"],
                        "all": ["required#extra:woman_coat:coat_threads:[threads]", "required#extra:woman_coat:coat_threads:[holes]"]
                    }
                }
            },
            "garment_id": 5427
        };


        ready_callbacks.push(function() {
            var $g = new Garment('#garment_form_' + garment_opt.garment_id, garment_opt);
            $g.initGarment();
            window.t4l_inputs_enabled = true;
            var current = $g.getCurrentLayers();
            current['render_info'] = $g.render_info;
            current['view'] = 'front';
            if (garment_opt.product_type == 'woman_suitpants' || garment_opt.product_type == 'woman_suitskirt') {
                $g.getLayers = function() {
                    return {
                        'coat_model': {
                            'src': '/3d/woman/models/#model#/#view#/'
                        },
                        'coat_pants': {
                            'src': '/3d/woman/coat/pants/#view#/'
                        },
                        'coat_shirt': {
                            'src': '/3d/woman/coat/shirt/#view#/'
                        },
                        'coat_neck': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_body': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_parche': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_belt': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_hand': {
                            'src': '/3d/woman/models/#model#/#view#/'
                        },
                        'coat_sleeve': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_pockets': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_epaulettes': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_buttons_epaulettes': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_neck': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_body': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_pockets': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_sleeve': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_ribbons_neck': {
                            'src': '/3d/woman/coat/cierre_trench/'
                        },
                        'coat_ribbons_body': {
                            'src': '/3d/woman/coat/cierre_trench/'
                        },
                        'coat_threads_extra_neck': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_body': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_pockets': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_sleeve': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_neck': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_body': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_pockets': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_sleeve': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_extra_lining': {
                            'src': '/3d/woman/coat/linings/'
                        },
                        'coat_back_body': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_belt': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_body_cut': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_backcut': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                    };
                }
                $g.renderGetImages = function() {
                    images = [];
                    var config = current['config'];
                    var fabric = current['fabric']['woman_coat'];
                    var extras = (empty(current['extras'])) ? [] : current['extras'];
                    var model = 1;
                    if (!empty(current['model'])) {
                        var model = current['model'];
                    }
                    var coat_body_cut = '0';
                    if (current['view'] == 'front') {
                        show_lining = false;
                        if (!empty(current['_show_lining']) && !empty(extras['coat_lining']['lining_id'])) {
                            show_lining = true;
                            id_t4l_lining = extras['coat_lining']['lining_id'];
                        }
                        array_push(images, {
                            'layer': 'coat_model',
                            'src': 'model_front.png',
                            'zIndex': 10000
                        });
                        array_push(images, {
                            'layer': 'coat_pants',
                            'src': 'pants_front.png',
                            'zIndex': 10001
                        });
                        var collar_lapel = "";
                        if (!empty(config['coat_collar']) && config['coat_collar'] == 'void') collar_lapel = "+collar_" + config['coat_collar'];
                        array_push(images, {
                            'layer': 'coat_shirt',
                            'src': 'shirt_front' + collar_lapel + '.png',
                            'zIndex': 10002
                        });
                        var coat_lapel = '';
                        if (!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) {
                            coat_lapel = '+lapel_' + config['coat_lapel'];
                        }
                        var coat_buttons = '';
                        var coat_fastening = '';
                        if (!empty(config['coat_style']) && config['coat_style'] == 'crossed') {
                            if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short') {
                                if (!empty(config['coat_fit']) && config['coat_fit'] == 'straight' && coat_body_cut == '1') {
                                    coat_buttons = '+buttons_' + config['coat_buttons'];
                                } else {
                                    coat_buttons = '+buttons_8';
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'classic' && !empty(config['coat_fit']) && config['coat_fit'] == 'straight' && coat_body_cut == '1') {
                                if (!empty(config['coat_buttons']) && config['coat_buttons'] == '8') {
                                    coat_buttons = '+buttons_4';
                                } else {
                                    coat_buttons = '';
                                }
                            }
                        } else {
                            if (!empty(config['coat_fastening']) && config['coat_fastening'] != 'standard') {
                                if ((!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) && (config['coat_fastening'] == 'hide' || config['coat_fastening'] == 'horn')) {
                                    coat_fastening = '+fastening_standard';
                                } else {
                                    coat_fastening = '+fastening_' + config['coat_fastening'];
                                }
                            } else {
                                coat_fastening = '+fastening_standard';
                            }
                        }
                        var coat_fit = '+fit_' + config['coat_fit'];
                        if ((!empty(config['coat_fit']) && config['coat_fit'] == 'straight') && (!empty(config['coat_belt']) && config['coat_belt'] == 'loose')) {
                            coat_fit = '+fit_waisted';
                        }
                        var neck_img = 'neck+style_' + config['coat_style'] + '+collar_' + config['coat_collar'] + coat_lapel + coat_buttons + coat_fit + '+body_cut_' + coat_body_cut + coat_fastening;
                        array_push(images, {
                            'layer': 'coat_neck',
                            'src': neck_img + '.png',
                            'zIndex': 11004
                        });
                        if (!empty(config['coat_epaulettes']) && config['coat_epaulettes'] != '0') {
                            var epaulettes_img = 'epaulettes_' + config['coat_epaulettes'];
                            array_push(images, {
                                'layer': 'coat_epaulettes',
                                'src': epaulettes_img + '.png',
                                'zIndex': 11005
                            });
                        }
                        var collar_lapel = "";
                        var coat_fastening = '';
                        var coat_buttons = '';
                        if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long') {
                            collar_lapel = "+collar_" + config['coat_collar'];
                        }
                        if (!empty(config['coat_style']) && config['coat_style'] == 'simple') {
                            if (!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) {
                                coat_fastening = '+fastening_standard';
                            } else {
                                coat_fastening = '+fastening_' + config['coat_fastening'];
                            }
                        } else {
                            if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' && !empty(config['coat_buttons'])) {
                                collar_lapel = "+collar_" + config['coat_collar'];
                                if (config['coat_buttons'] == '2' || config['coat_buttons'] == '12') {
                                    coat_buttons = '+buttons_4';
                                } else {
                                    coat_buttons = '+buttons_' + config['coat_buttons'];
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'classic') {
                                collar_lapel = "+collar_lapel_short";
                                if (!empty(config['coat_buttons']) && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) {
                                    coat_buttons = '+buttons_4';
                                } else if (!empty(config['coat_buttons']) && config['coat_buttons'] == '12') {
                                    coat_buttons = '+buttons_8';
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long') {
                                if (!empty(config['coat_buttons']) && (config['coat_buttons'] == '2' || config['coat_buttons'] == '8' || config['coat_buttons'] == '12')) {
                                    coat_buttons = '+buttons_4';
                                } else if (!empty(config['coat_buttons']) && config['coat_buttons'] == '4') {
                                    coat_buttons = '+buttons_8';
                                }
                            } else {
                                coat_buttons = '+buttons_4';
                            }
                        }
                        var body_img = 'style_' + config['coat_style'] + collar_lapel + coat_buttons + '+length_' + config['coat_length'] + '+fit_' + config['coat_fit'] + '+body_cut_' + coat_body_cut + coat_fastening;
                        array_push(images, {
                            'layer': 'coat_body',
                            'src': body_img + '.png',
                            'zIndex': 11006
                        });
                        if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'wide') {
                            var parche_img = 'parche+sleeves_wide';
                            array_push(images, {
                                'layer': 'coat_parche',
                                'src': parche_img + '.png',
                                'zIndex': 11007
                            });
                        }
                        if (!empty(config['coat_pockets_type'])) {
                            var coat_fit = '';
                            if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] != 'patched' || (config['coat_pockets_type'] == 'diagonal' && coat_body_cut == '1')) {
                                coat_fit = "+fit_" + config['coat_fit'];
                            }
                            var body_cut = '';
                            if (!empty(config['coat_fit']) && (config['coat_fit'] == 'straight' && !empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'flap' || config['coat_pockets_type'] == 'double_welt' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button'))) {
                                body_cut = '+body_cut_' + coat_body_cut;
                                if ((config['coat_pockets_type'] == 'patched' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button') && (config['coat_fit'] == 'straight' && coat_body_cut == '0')) {
                                    body_cut = '';
                                    coat_fit = '';
                                }
                            } else if (!empty(config['coat_fit']) && config['coat_fit'] == 'waisted' && !empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'patched' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button')) {
                                coat_fit = '';
                            }
                            var coat_sleeves = '';
                            if (!empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button') && !empty(config['coat_sleeves']) && (config['coat_sleeves'] == 'wide')) {
                                coat_sleeves = '+sleeves_' + config['coat_sleeves'];
                            }
                            var pockets_img = 'pockets_' + config['coat_pockets_type'] + coat_fit + body_cut + coat_sleeves;
                            array_push(images, {
                                'layer': 'coat_pockets',
                                'src': pockets_img + '.png',
                                'zIndex': 11008
                            });
                        }
                        if (!empty(config['coat_belt']) && (config['coat_belt'] != '0' && config['coat_belt'] != 'sewed')) {
                            if (!empty(config['coat_fit'])) coat_fit = "+fit_" + config['coat_fit'];
                            var belt_img = 'belt_' + config['coat_belt'] + coat_fit;
                            array_push(images, {
                                'layer': 'coat_belt',
                                'src': belt_img + '.png',
                                'zIndex': 50000
                            });
                        }
                        array_push(images, {
                            'layer': 'coat_hand',
                            'src': 'mano_left.png',
                            'zIndex': 11010
                        });
                        var sleeve_img = 'sleeves_' + config['coat_sleeves'];
                        array_push(images, {
                            'layer': 'coat_sleeve',
                            'src': sleeve_img + '.png',
                            'zIndex': 11011
                        });
                        if (!empty(current['fabric']['_button_code'])) {
                            if (!empty(config['coat_epaulettes']) && config['coat_epaulettes'] == '1') {
                                if (!empty(epaulettes_img)) array_push(images, {
                                    'layer': 'coat_buttons_epaulettes',
                                    'src': current['fabric']['_button_code'] + '_' + epaulettes_img + '.png',
                                    'zIndex': 43005
                                });
                            }
                            if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long' || !empty(config['coat_style']) && config['coat_style'] == 'crossed')) {
                                if (!empty(neck_img)) array_push(images, {
                                    'layer': 'coat_buttons_neck',
                                    'src': current['fabric']['_button_code'] + '_' + neck_img + '.png',
                                    'zIndex': 43006
                                });
                                if (!empty(body_img)) array_push(images, {
                                    'layer': 'coat_buttons_body',
                                    'src': current['fabric']['_button_code'] + '_' + body_img + '.png',
                                    'zIndex': 43007
                                });
                            }
                            if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                if (!empty(pockets_img)) array_push(images, {
                                    'layer': 'coat_buttons_pockets',
                                    'src': current['fabric']['_button_code'] + '_' + pockets_img + '.png',
                                    'zIndex': 43008
                                });
                            }
                            if (!empty(config['coat_sleeves']) && (config['coat_sleeves'] == 'tape' || config['coat_sleeves'] == 'buttons')) {
                                if (!empty(sleeve_img)) array_push(images, {
                                    'layer': 'coat_buttons_sleeve',
                                    'src': current['fabric']['_button_code'] + '_' + sleeve_img + '.png',
                                    'zIndex': 43009
                                });
                            }
                        }
                        if (!empty(config['coat_style']) && config['coat_style'] == 'simple' && !empty(config['coat_fastening']) && config['coat_fastening'] == 'horn' && !empty(current['fabric']['_ribbon_color'])) {
                            if (!empty(config['coat_collar']) && config['coat_collar'] != 'lapel_short' && !empty(config['coat_collar']) && config['coat_collar'] != 'lapel_long') {
                                if (neck_img) array_push(images, {
                                    'layer': 'coat_ribbons_neck',
                                    'src': current['fabric']['_ribbon_color'] + '_' + neck_img + '.png',
                                    'zIndex': 43005
                                });
                                if (body_img) array_push(images, {
                                    'layer': 'coat_ribbons_body',
                                    'src': current['fabric']['_ribbon_color'] + '_' + body_img + '.png',
                                    'zIndex': 43006
                                });
                            }
                        }
                        if (show_lining) {
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': 'fondo.png',
                                'zIndex': 43106
                            });
                            array_push(images, {
                                'layer': 'coat_body',
                                'src': 'abrigo.png',
                                'zIndex': 43107
                            });
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': id_t4l_lining + '_coat_lining.png',
                                'zIndex': 43108
                            });
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': 'camisa.png',
                                'zIndex': 43109
                            });
                        }
                        if (!empty(extras['coat_threads']['contrast']) && extras['coat_threads']['contrast'] == 'all') {
                            if (!empty(extras['coat_threads']['threads-color'])) {
                                var threads = extras['coat_threads']['threads-color'];
                            }
                            if (!empty(extras['coat_threads']['threads'])) {
                                var threads = extras['coat_threads']['threads']['color'];
                            }
                            if (threads) {
                                if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long')) {
                                    if (neck_img) array_push(images, {
                                        'layer': 'coat_threads_extra_neck',
                                        'src': threads + '_thread_' + neck_img + '.png',
                                        'zIndex': 43011
                                    });
                                    if (!empty(config['coat_style']) && config['coat_style'] == 'crossed' && !empty(config['coat_collar']) && !empty(config['coat_buttons']) && ((config['coat_collar'] == 'classic' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) || (config['coat_collar'] == 'lapel_short' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '12')) || (config['coat_collar'] == 'lapel_long' && config['coat_buttons'] == '2'))) {} else {
                                        if ((!empty(config['coat_collar']) && config['coat_collar'] != 'simple') || (!empty(config['coat_collar']) && config['coat_collar'] != 'crossed')) {
                                            if (body_img) array_push(images, {
                                                'layer': 'coat_threads_extra_body',
                                                'src': threads + '_thread_' + body_img + '.png',
                                                'zIndex': 43012
                                            });
                                        }
                                    }
                                }
                                if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                    if (pockets_img) array_push(images, {
                                        'layer': 'coat_threads_extra_pockets',
                                        'src': threads + '_thread_' + pockets_img + '.png',
                                        'zIndex': 43013
                                    });
                                }
                                if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'tape') {
                                    if (sleeve_img) array_push(images, {
                                        'layer': 'coat_threads_extra_sleeve',
                                        'src': threads + '_thread_' + sleeve_img + '.png',
                                        'zIndex': 43014
                                    });
                                }
                            }
                        }
                        if (!empty(extras['coat_threads']['contrast']) && extras['coat_threads']['contrast'] == 'all') {
                            if (!empty(extras['coat_threads']['holes-color'])) {
                                var holes = extras['coat_threads']['holes-color'];
                            }
                            if (!empty(extras['coat_threads']['holes'])) {
                                var holes = extras['coat_threads']['holes']['color'];
                            }
                            if (holes) {
                                if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long')) {
                                    if (neck_img) array_push(images, {
                                        'layer': 'coat_holes_extra_neck',
                                        'src': holes + '_hole_' + neck_img + '.png',
                                        'zIndex': 43001
                                    });
                                    if (!empty(config['coat_style']) && config['coat_style'] == 'crossed' && !empty(config['coat_collar']) && !empty(config['coat_buttons']) && ((config['coat_collar'] == 'classic' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) || (config['coat_collar'] == 'lapel_short' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '12')))) {} else {
                                        if (body_img) array_push(images, {
                                            'layer': 'coat_holes_extra_body',
                                            'src': holes + '_hole_' + body_img + '.png',
                                            'zIndex': 43002
                                        });
                                    }
                                }
                                if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                    if (pockets_img) array_push(images, {
                                        'layer': 'coat_holes_extra_pockets',
                                        'src': holes + '_hole_' + pockets_img + '.png',
                                        'zIndex': 43003
                                    });
                                }
                                if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'tape') {
                                    if (sleeve_img) array_push(images, {
                                        'layer': 'coat_holes_extra_sleeve',
                                        'src': holes + '_hole_' + sleeve_img + '.png',
                                        'zIndex': 43004
                                    });
                                }
                            }
                        }
                    } else {
                        if (!empty(config['coat_backcut']) && config['coat_backcut'] != '0') {
                            array_push(images, {
                                'layer': 'coat_back_backcut',
                                'src': 'fit_' + config['coat_fit'] + '+backcut_' + config['coat_backcut'] + '.png',
                                'zIndex': 10003
                            });
                        }
                        if (coat_body_cut == '1') {
                            array_push(images, {
                                'layer': 'coat_back_belt',
                                'src': 'fit_' + config['coat_fit'] + '+body_cut_' + coat_body_cut + '.png',
                                'zIndex': 10002
                            });
                        }
                        if (!empty(config['coat_belt']) && config['coat_belt'] != '0') {
                            array_push(images, {
                                'layer': 'coat_back_belt',
                                'src': 'fit_' + config['coat_fit'] + '+belt_' + config['coat_belt'] + '.png',
                                'zIndex': 10001
                            });
                        }
                        if (!empty(config['coat_fit']) && config['coat_fit']) {
                            array_push(images, {
                                'layer': 'coat_back_body',
                                'src': 'fit_' + config['coat_fit'] + '.png',
                                'zIndex': 10000
                            });
                        }
                    }
                    return this.parseImages(images, current);
                }
            } else {
                $g.getLayers = function() {
                    return {
                        'coat_model': {
                            'src': '/3d/woman/models/#model#/#view#/'
                        },
                        'coat_pants': {
                            'src': '/3d/woman/coat/pants/#view#/'
                        },
                        'coat_shirt': {
                            'src': '/3d/woman/coat/shirt/#view#/'
                        },
                        'coat_neck': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_body': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_parche': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_belt': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_hand': {
                            'src': '/3d/woman/models/#model#/#view#/'
                        },
                        'coat_sleeve': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_pockets': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_epaulettes': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_buttons_epaulettes': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_neck': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_body': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_pockets': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_sleeve': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_ribbons_neck': {
                            'src': '/3d/woman/coat/cierre_trench/'
                        },
                        'coat_ribbons_body': {
                            'src': '/3d/woman/coat/cierre_trench/'
                        },
                        'coat_threads_extra_neck': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_body': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_pockets': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_sleeve': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_neck': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_body': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_pockets': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_sleeve': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_extra_lining': {
                            'src': '/3d/woman/coat/linings/'
                        },
                        'coat_back_body': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_belt': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_body_cut': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_backcut': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                    };
                }
                $g.renderGetImages = function() {
                    images = [];
                    var config = current['config'];
                    var fabric = current['fabric']['woman_coat'];
                    var extras = (empty(current['extras'])) ? [] : current['extras'];
                    var model = 1;
                    if (!empty(current['model'])) {
                        var model = current['model'];
                    }
                    var coat_body_cut = '0';
                    if (current['view'] == 'front') {
                        show_lining = false;
                        if (!empty(current['_show_lining']) && !empty(extras['coat_lining']['lining_id'])) {
                            show_lining = true;
                            id_t4l_lining = extras['coat_lining']['lining_id'];
                        }
                        array_push(images, {
                            'layer': 'coat_model',
                            'src': 'model_front.png',
                            'zIndex': 10000
                        });
                        array_push(images, {
                            'layer': 'coat_pants',
                            'src': 'pants_front.png',
                            'zIndex': 10001
                        });
                        var collar_lapel = "";
                        if (!empty(config['coat_collar']) && config['coat_collar'] == 'void') collar_lapel = "+collar_" + config['coat_collar'];
                        array_push(images, {
                            'layer': 'coat_shirt',
                            'src': 'shirt_front' + collar_lapel + '.png',
                            'zIndex': 10002
                        });
                        var coat_lapel = '';
                        if (!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) {
                            coat_lapel = '+lapel_' + config['coat_lapel'];
                        }
                        var coat_buttons = '';
                        var coat_fastening = '';
                        if (!empty(config['coat_style']) && config['coat_style'] == 'crossed') {
                            if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short') {
                                if (!empty(config['coat_fit']) && config['coat_fit'] == 'straight' && coat_body_cut == '1') {
                                    coat_buttons = '+buttons_' + config['coat_buttons'];
                                } else {
                                    coat_buttons = '+buttons_8';
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'classic' && !empty(config['coat_fit']) && config['coat_fit'] == 'straight' && coat_body_cut == '1') {
                                if (!empty(config['coat_buttons']) && config['coat_buttons'] == '8') {
                                    coat_buttons = '+buttons_4';
                                } else {
                                    coat_buttons = '';
                                }
                            }
                        } else {
                            if (!empty(config['coat_fastening']) && config['coat_fastening'] != 'standard') {
                                if ((!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) && (config['coat_fastening'] == 'hide' || config['coat_fastening'] == 'horn')) {
                                    coat_fastening = '+fastening_standard';
                                } else {
                                    coat_fastening = '+fastening_' + config['coat_fastening'];
                                }
                            } else {
                                coat_fastening = '+fastening_standard';
                            }
                        }
                        var coat_fit = '+fit_' + config['coat_fit'];
                        if ((!empty(config['coat_fit']) && config['coat_fit'] == 'straight') && (!empty(config['coat_belt']) && config['coat_belt'] == 'loose')) {
                            coat_fit = '+fit_waisted';
                        }
                        var neck_img = 'neck+style_' + config['coat_style'] + '+collar_' + config['coat_collar'] + coat_lapel + coat_buttons + coat_fit + '+body_cut_' + coat_body_cut + coat_fastening;
                        array_push(images, {
                            'layer': 'coat_neck',
                            'src': neck_img + '.png',
                            'zIndex': 11004
                        });
                        if (!empty(config['coat_epaulettes']) && config['coat_epaulettes'] != '0') {
                            var epaulettes_img = 'epaulettes_' + config['coat_epaulettes'];
                            array_push(images, {
                                'layer': 'coat_epaulettes',
                                'src': epaulettes_img + '.png',
                                'zIndex': 11005
                            });
                        }
                        var collar_lapel = "";
                        var coat_fastening = '';
                        var coat_buttons = '';
                        if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long') {
                            collar_lapel = "+collar_" + config['coat_collar'];
                        }
                        if (!empty(config['coat_style']) && config['coat_style'] == 'simple') {
                            if (!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) {
                                coat_fastening = '+fastening_standard';
                            } else {
                                coat_fastening = '+fastening_' + config['coat_fastening'];
                            }
                        } else {
                            if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' && !empty(config['coat_buttons'])) {
                                collar_lapel = "+collar_" + config['coat_collar'];
                                if (config['coat_buttons'] == '2' || config['coat_buttons'] == '12') {
                                    coat_buttons = '+buttons_4';
                                } else {
                                    coat_buttons = '+buttons_' + config['coat_buttons'];
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'classic') {
                                collar_lapel = "+collar_lapel_short";
                                if (!empty(config['coat_buttons']) && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) {
                                    coat_buttons = '+buttons_4';
                                } else if (!empty(config['coat_buttons']) && config['coat_buttons'] == '12') {
                                    coat_buttons = '+buttons_8';
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long') {
                                if (!empty(config['coat_buttons']) && (config['coat_buttons'] == '2' || config['coat_buttons'] == '8' || config['coat_buttons'] == '12')) {
                                    coat_buttons = '+buttons_4';
                                } else if (!empty(config['coat_buttons']) && config['coat_buttons'] == '4') {
                                    coat_buttons = '+buttons_8';
                                }
                            } else {
                                coat_buttons = '+buttons_4';
                            }
                        }
                        var body_img = 'style_' + config['coat_style'] + collar_lapel + coat_buttons + '+length_' + config['coat_length'] + '+fit_' + config['coat_fit'] + '+body_cut_' + coat_body_cut + coat_fastening;
                        array_push(images, {
                            'layer': 'coat_body',
                            'src': body_img + '.png',
                            'zIndex': 11006
                        });
                        if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'wide') {
                            var parche_img = 'parche+sleeves_wide';
                            array_push(images, {
                                'layer': 'coat_parche',
                                'src': parche_img + '.png',
                                'zIndex': 11007
                            });
                        }
                        if (!empty(config['coat_pockets_type'])) {
                            var coat_fit = '';
                            if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] != 'patched' || (config['coat_pockets_type'] == 'diagonal' && coat_body_cut == '1')) {
                                coat_fit = "+fit_" + config['coat_fit'];
                            }
                            var body_cut = '';
                            if (!empty(config['coat_fit']) && (config['coat_fit'] == 'straight' && !empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'flap' || config['coat_pockets_type'] == 'double_welt' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button'))) {
                                body_cut = '+body_cut_' + coat_body_cut;
                                if ((config['coat_pockets_type'] == 'patched' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button') && (config['coat_fit'] == 'straight' && coat_body_cut == '0')) {
                                    body_cut = '';
                                    coat_fit = '';
                                }
                            } else if (!empty(config['coat_fit']) && config['coat_fit'] == 'waisted' && !empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'patched' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button')) {
                                coat_fit = '';
                            }
                            var coat_sleeves = '';
                            if (!empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button') && !empty(config['coat_sleeves']) && (config['coat_sleeves'] == 'wide')) {
                                coat_sleeves = '+sleeves_' + config['coat_sleeves'];
                            }
                            var pockets_img = 'pockets_' + config['coat_pockets_type'] + coat_fit + body_cut + coat_sleeves;
                            array_push(images, {
                                'layer': 'coat_pockets',
                                'src': pockets_img + '.png',
                                'zIndex': 11008
                            });
                        }
                        if (!empty(config['coat_belt']) && (config['coat_belt'] != '0' && config['coat_belt'] != 'sewed')) {
                            if (!empty(config['coat_fit'])) coat_fit = "+fit_" + config['coat_fit'];
                            var belt_img = 'belt_' + config['coat_belt'] + coat_fit;
                            array_push(images, {
                                'layer': 'coat_belt',
                                'src': belt_img + '.png',
                                'zIndex': 50000
                            });
                        }
                        array_push(images, {
                            'layer': 'coat_hand',
                            'src': 'mano_left.png',
                            'zIndex': 11010
                        });
                        var sleeve_img = 'sleeves_' + config['coat_sleeves'];
                        array_push(images, {
                            'layer': 'coat_sleeve',
                            'src': sleeve_img + '.png',
                            'zIndex': 11011
                        });
                        if (!empty(current['fabric']['_button_code'])) {
                            if (!empty(config['coat_epaulettes']) && config['coat_epaulettes'] == '1') {
                                if (!empty(epaulettes_img)) array_push(images, {
                                    'layer': 'coat_buttons_epaulettes',
                                    'src': current['fabric']['_button_code'] + '_' + epaulettes_img + '.png',
                                    'zIndex': 43005
                                });
                            }
                            if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long' || !empty(config['coat_style']) && config['coat_style'] == 'crossed')) {
                                if (!empty(neck_img)) array_push(images, {
                                    'layer': 'coat_buttons_neck',
                                    'src': current['fabric']['_button_code'] + '_' + neck_img + '.png',
                                    'zIndex': 43006
                                });
                                if (!empty(body_img)) array_push(images, {
                                    'layer': 'coat_buttons_body',
                                    'src': current['fabric']['_button_code'] + '_' + body_img + '.png',
                                    'zIndex': 43007
                                });
                            }
                            if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                if (!empty(pockets_img)) array_push(images, {
                                    'layer': 'coat_buttons_pockets',
                                    'src': current['fabric']['_button_code'] + '_' + pockets_img + '.png',
                                    'zIndex': 43008
                                });
                            }
                            if (!empty(config['coat_sleeves']) && (config['coat_sleeves'] == 'tape' || config['coat_sleeves'] == 'buttons')) {
                                if (!empty(sleeve_img)) array_push(images, {
                                    'layer': 'coat_buttons_sleeve',
                                    'src': current['fabric']['_button_code'] + '_' + sleeve_img + '.png',
                                    'zIndex': 43009
                                });
                            }
                        }
                        if (!empty(config['coat_style']) && config['coat_style'] == 'simple' && !empty(config['coat_fastening']) && config['coat_fastening'] == 'horn' && !empty(current['fabric']['_ribbon_color'])) {
                            if (!empty(config['coat_collar']) && config['coat_collar'] != 'lapel_short' && !empty(config['coat_collar']) && config['coat_collar'] != 'lapel_long') {
                                if (neck_img) array_push(images, {
                                    'layer': 'coat_ribbons_neck',
                                    'src': current['fabric']['_ribbon_color'] + '_' + neck_img + '.png',
                                    'zIndex': 43005
                                });
                                if (body_img) array_push(images, {
                                    'layer': 'coat_ribbons_body',
                                    'src': current['fabric']['_ribbon_color'] + '_' + body_img + '.png',
                                    'zIndex': 43006
                                });
                            }
                        }
                        if (show_lining) {
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': 'fondo.png',
                                'zIndex': 43106
                            });
                            array_push(images, {
                                'layer': 'coat_body',
                                'src': 'abrigo.png',
                                'zIndex': 43107
                            });
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': id_t4l_lining + '_coat_lining.png',
                                'zIndex': 43108
                            });
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': 'camisa.png',
                                'zIndex': 43109
                            });
                        }
                        if (!empty(extras['coat_threads']['contrast']) && extras['coat_threads']['contrast'] == 'all') {
                            if (!empty(extras['coat_threads']['threads-color'])) {
                                var threads = extras['coat_threads']['threads-color'];
                            }
                            if (!empty(extras['coat_threads']['threads'])) {
                                var threads = extras['coat_threads']['threads']['color'];
                            }
                            if (threads) {
                                if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long')) {
                                    if (neck_img) array_push(images, {
                                        'layer': 'coat_threads_extra_neck',
                                        'src': threads + '_thread_' + neck_img + '.png',
                                        'zIndex': 43011
                                    });
                                    if (!empty(config['coat_style']) && config['coat_style'] == 'crossed' && !empty(config['coat_collar']) && !empty(config['coat_buttons']) && ((config['coat_collar'] == 'classic' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) || (config['coat_collar'] == 'lapel_short' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '12')) || (config['coat_collar'] == 'lapel_long' && config['coat_buttons'] == '2'))) {} else {
                                        if ((!empty(config['coat_collar']) && config['coat_collar'] != 'simple') || (!empty(config['coat_collar']) && config['coat_collar'] != 'crossed')) {
                                            if (body_img) array_push(images, {
                                                'layer': 'coat_threads_extra_body',
                                                'src': threads + '_thread_' + body_img + '.png',
                                                'zIndex': 43012
                                            });
                                        }
                                    }
                                }
                                if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                    if (pockets_img) array_push(images, {
                                        'layer': 'coat_threads_extra_pockets',
                                        'src': threads + '_thread_' + pockets_img + '.png',
                                        'zIndex': 43013
                                    });
                                }
                                if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'tape') {
                                    if (sleeve_img) array_push(images, {
                                        'layer': 'coat_threads_extra_sleeve',
                                        'src': threads + '_thread_' + sleeve_img + '.png',
                                        'zIndex': 43014
                                    });
                                }
                            }
                        }
                        if (!empty(extras['coat_threads']['contrast']) && extras['coat_threads']['contrast'] == 'all') {
                            if (!empty(extras['coat_threads']['holes-color'])) {
                                var holes = extras['coat_threads']['holes-color'];
                            }
                            if (!empty(extras['coat_threads']['holes'])) {
                                var holes = extras['coat_threads']['holes']['color'];
                            }
                            if (holes) {
                                if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long')) {
                                    if (neck_img) array_push(images, {
                                        'layer': 'coat_holes_extra_neck',
                                        'src': holes + '_hole_' + neck_img + '.png',
                                        'zIndex': 43001
                                    });
                                    if (!empty(config['coat_style']) && config['coat_style'] == 'crossed' && !empty(config['coat_collar']) && !empty(config['coat_buttons']) && ((config['coat_collar'] == 'classic' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) || (config['coat_collar'] == 'lapel_short' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '12')))) {} else {
                                        if (body_img) array_push(images, {
                                            'layer': 'coat_holes_extra_body',
                                            'src': holes + '_hole_' + body_img + '.png',
                                            'zIndex': 43002
                                        });
                                    }
                                }
                                if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                    if (pockets_img) array_push(images, {
                                        'layer': 'coat_holes_extra_pockets',
                                        'src': holes + '_hole_' + pockets_img + '.png',
                                        'zIndex': 43003
                                    });
                                }
                                if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'tape') {
                                    if (sleeve_img) array_push(images, {
                                        'layer': 'coat_holes_extra_sleeve',
                                        'src': holes + '_hole_' + sleeve_img + '.png',
                                        'zIndex': 43004
                                    });
                                }
                            }
                        }
                    } else {
                        if (!empty(config['coat_backcut']) && config['coat_backcut'] != '0') {
                            array_push(images, {
                                'layer': 'coat_back_backcut',
                                'src': 'fit_' + config['coat_fit'] + '+backcut_' + config['coat_backcut'] + '.png',
                                'zIndex': 10003
                            });
                        }
                        if (coat_body_cut == '1') {
                            array_push(images, {
                                'layer': 'coat_back_belt',
                                'src': 'fit_' + config['coat_fit'] + '+body_cut_' + coat_body_cut + '.png',
                                'zIndex': 10002
                            });
                        }
                        if (!empty(config['coat_belt']) && config['coat_belt'] != '0') {
                            array_push(images, {
                                'layer': 'coat_back_belt',
                                'src': 'fit_' + config['coat_fit'] + '+belt_' + config['coat_belt'] + '.png',
                                'zIndex': 10001
                            });
                        }
                        if (!empty(config['coat_fit']) && config['coat_fit']) {
                            array_push(images, {
                                'layer': 'coat_back_body',
                                'src': 'fit_' + config['coat_fit'] + '.png',
                                'zIndex': 10000
                            });
                        }
                    }
                    return this.parseImages(images, current);
                }
            }
        });
    </script>

    <script type="text/javascript" src="js/default.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/garment.js" charset="utf-8"></script>

</body>
</html>