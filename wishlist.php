<?php
if(!isset($_SESSION['user_id'])) 
{
  header("Location:{$homeurl}login/");
}
else
{
?>
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
                          My account
                      </h1>
                      <!-- BREADCRUMBS -->
                      <ul class="breadcrumbs list-inline pull-right">
                          <li><a href="<?php echo $homeurl;?>">Home</a></li><!--
                          --><li><a href="<?php echo $homeurl;?>product-listing/">Shop</a></li><!--
                          --><li>Wishlist</li>
                      </ul>
                      <!-- !BREADCRUMBS -->
                  </div>
              </header>
          </div>
      </div><!-- !full-width -->
      <div class="container">
          <!-- !FULL WIDTH -->
          <!-- !SECTION EMPHASIS 1 -->

          <section class="row">
              <div class="col-sm-3">
                  <nav class="shop-section-navigation element-emphasis-weak">
                      <ul class="list-unstyled">
                          <!--<li><a href="09-a-shop-account-dashboard.html">Account dashboard</a></li>-->
                          <li><a href="<?php echo $homeurl;?>account-information/">Account information</a></li>
                          <li><a href="<?php echo $homeurl;?>my-orders/">My orders</a></li>
                          <li><a href="<?php echo $homeurl;?>my-measurements/">My Measurements</a></li>
                          <li><a href="<?php echo $homeurl;?>address-book/">Address book</a></li>
                          <li class="active"><span><a href="<?php echo $homeurl;?>wishlist/">My wishlist</a></span></li>
                          <li><a href="<?php echo $homeurl;?>logout/">Logout</a></li>
                      </ul>
                  </nav>
              </div>
              <div class="clearfix visible-xs space-30"></div>
              <div class="col-sm-9 space-left-30">
                  <h2 class="strong-header large-header">My wishlist</h2>
                  <div class="row">

                    <?php 
                    $sql=mysqli_query($con,"select a.*,b.p_id,b.p_name,b.p_price from wishlist_master a,product_master b where a.userid='".$_SESSION['user_id']."' and a.pid=b.p_id");
                    if(mysqli_num_rows($sql) > 0)
                    {
                    while($r=mysqli_fetch_array($sql)){
                      $sql1=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");
                      $r1=mysqli_fetch_array($sql1);
                    ?>

                      <div class="col-xs-6 col-sm-4 col-md-3">
                          <!-- SHOP FEATURED ITEM -->
                          <article class="shop-item shop-item-wishlist overlay-element">
                              <div class="overlay-wrapper">
                                  <a href="<?php echo $homeurl;?>view-product/<?php echo $r['p_id'];?>/">
                                      <img src="<?php echo $homeurl.$r1['p_img'];?>" alt="Shop item">
                                  </a>
                                  <div class="overlay-contents">
                                      <div class="shop-item-actions">
                                          <button class="close del_wish" data-id="<?php echo $r['w_id'];?>">
                                              <span class="sr-only">Remove</span>
                                              <span aria-hidden="true" data-icon="&#xe005;"></span>
                                          </button>
                                          <button class="btn btn-primary btn-block btn-small">
                                              Add to cart
                                          </button>
                                      </div>
                                  </div>
                              </div>
                              <header class="item-info-name-features-price">
                                  <h4><a href="<?php echo $homeurl;?>view-product/<?php echo $r['p_id'];?>/"><?php echo $r['p_name'];?></a></h4>
                                  <!--<span class="features">Multi, S</span><br>-->
                                  <span class="price">$<?php echo number_format($r['p_price'],2);?></span>
                              </header>
                              <!--<span class="low-in-stock-tag">Low in stock</span>-->
                          </article>
                          <!-- !SHOP FEATURED ITEM -->
                      </div>
                     <?php }
                   }
                   else
                   {
                    echo "No Wishlist Found.";
                   }
                   ?>
                     
                  </div>
              </div>
          </section>
      </div>
  </section>

  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->
<?php }?>