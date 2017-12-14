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
                          --><li>Checkout</li>
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
               
                  <h2 class="strong-header large-header">Add Shipping Address</h2>
                  <div class="row">
                    <form action="<?php echo $homeurl;?>includes/action/action.php" method="post">
                          <div class="col-xs-12">
                            <div class="form-group">
                                <label for="last-name">First Name</label>
                                <input type="text" class="form-control" id="firstname"  
                                name="firstname" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" class="form-control" id="lastname" 
                                name="lastname" required >
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="last-name">Address 1</label>
                                <input type="text" class="form-control" id="address1" 
                                name="address1" required >
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="last-name">Address 2</label>
                                <input type="text" class="form-control" id="address2" 
                                name="address2"  >
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="last-name">City</label>
                                <input type="text" class="form-control" id="city" 
                                name="city" required >
                            </div>
                        </div>
                         <div class="col-xs-12">
                            <div class="form-group">
                                <label for="last-name">Zipcode</label>
                                <input type="text" class="form-control" id="zipcode" 
                                name="zipcode" required >
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="last-name">State</label>
                                <input type="text" class="form-control" id="state" 
                                name="state" required >
                            </div>
                        </div>
                         <div class="col-xs-12">
                          <div class="form-group">
                              <label for="country">Country</label>
                              <select class="chosen chosen-select-deselect form-control" id="country" data-placeholder=" "  tabindex="1" name="country">
                                  <option value="">--Select Country--</option>
                                 <?php
                                 $c_list=$site->get_countries();
                                    foreach ($c_list as $key => $value) {?>
                                      <option value="<?php echo $c_list[$key]['country_name'];?>">
                                      <?php echo $c_list[$key]['country_name'];?></option>
                                      <?php
                                      }
                                  ?>
                                  
                              </select>
                          </div>
                        </div>
                        <button type="submit" name="add_shipping_addr" class="ship-address btn btn-primary pull-right">Save</button>
                      </form>
                  </div>
              </div>
          </section>
      </div>
  </section>

  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->
<?php }?>