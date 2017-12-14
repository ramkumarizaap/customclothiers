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

                          --><!--<li><a href="<?php echo $homeurl;?>product-listing/">Shop</a></li><!--

                          --><li>Address Book</li>

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

                          <li class="active"><span><a href="<?php echo $homeurl;?>address-book/">Address book</a></span></li>

                          <!--<li><a href="<?php echo $homeurl;?>wishlist/">My wishlist</a></li>-->

                          <li><a href="<?php echo $homeurl;?>logout/">Logout</a></li>

                      </ul>

                  </nav>

              </div>

              <div class="clearfix visible-xs space-30"></div>

              <div class="col-sm-9 space-left-30">

                  <h2 class="strong-header large-header">Address Book</h2>

                  <div class="row">

                  <?php if(isset($_SESSION['address_succ'])){?>

                  <div class="alert alert-info alert-dismissable">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                      <?php echo $_SESSION['address_succ'];?>

                  </div>

                  <?php unset($_SESSION['address_succ']);}?>

                      <div class="col-sm-6">



                        <?php 

                        $sql=mysqli_query($con,"select * from shipping_address where userid='".$_SESSION['user_id']."' order by sa_id desc limit 1");

                        $r=mysqli_fetch_array($sql);

                        ?>

                          <h3 class="strong-header">Billing address</h3>

                         <?php if($country!='' || $state!='' || $zipcode!='')

                         {?>

                          <p>

                              <br>

                              <?php echo $firstname." ".$lastname;?><br>

                              <?php echo $address1;?>,<br>

                              <?php echo $city;?> - <?php echo $zipcode;?>,<br>

                              <?php echo $state;?>,<br>

                              <?php echo $country;?>.<br>

                              <br>

                          </p>

                          <a href="<?php echo $homeurl;?>edit-billing-address/" class="btn btn-default btn-small">Edit</a>

                         <?php }else{?>

                         <a href="<?php echo $homeurl;?>add-billing-address/" class="btn btn-default btn-small">Add</a>

                         <?php }?>

                          <hr class="visible-xs">

                      </div>

                      <div class="col-sm-6">

                          <h3 class="strong-header">Shipping address</h3>

                           <?php if(mysqli_num_rows($sql) > 0)

                          {?>

                          <p>

                              <br>

                              <?php echo $r['sa_firstname']." ".$r['sa_lastname'];?><br>

                              <?php echo $r['sa_address1'];?>,<br>

                              <?php echo $r['sa_city'];?> - <?php echo $r['sa_zipcode'];?>,<br>

                              <?php echo $r['sa_province'];?>,<br>

                              <?php echo $r['sa_country'];?>.<br>

                              <br>

                          </p>

                          <a href="<?php echo $homeurl;?>edit-shipping-address/" class="btn btn-default btn-small">Edit</a>

                           <?php }else{?>

                            <a href="<?php echo $homeurl;?>add-shipping-address/" class="btn btn-default btn-small">Add</a>

                           <?php }?>

                      </div>

                  </div>

              </div>

          </section>

      </div>

  </section>



  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->

<?php }?>