  <?php 

      $n=0;

      $oid=mysqli_real_escape_string($con,trim($_GET['id']));$tot="";

      $sql=mysqli_query($con,"select a.*,b.p_name,b.p_description,b.subcatid from order_master 

          a,product_master b where a.userid='".$_SESSION['user_id']."' and a.pid=b.p_id and a.om_status=1 order by a.last_updated desc");

      

      while($r=mysqli_fetch_array($sql))

      {

        $tot= $tot + ($r['om_quantity'] * $r['om_price']);

        $sql1=mysqli_query($con,"select * from product_images where pid='".$r['pid']."'");
        if($r['subcatid']!="5")
        {
          $measurement_dtl_qry = mysqli_query($con, "select * from measurement_profile_master where mp_id = '".$r['mpid']."'");
          $m += mysqli_num_rows($measurement_dtl_qry);
          ++$n;
        }

      }    

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

                          Checkout

                      </h1>

                      <!-- BREADCRUMBS -->

                      <ul class="breadcrumbs list-inline pull-right">

                          <li><a href="<?php echo $homeurl;?>">Home</a></li><!--

                          --><li><a href="<?php echo $homeurl;?>shop/">Shop</a></li><!--

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
<?php
            if(isset($_SESSION['payment_status']) && $_SESSION['payment_status']=="cancelled")
            {
              ?>
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                   Sorry! You cancelled the payment. Try again!
                </div>

            <?php
            }
if(isset($_SESSION['payment_status']) && $_SESSION['payment_status']=="failed")
            {
              ?>
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                   Sorry! Your payment has been failed. Please try again!
                </div>

            <?php
            }
?>


            <div class="col-md-6 space-right-20">

              <?php if(!isset($_SESSION['login_succ'])){?>

                <section class="login ">

                      <h5 class="strong-header ">

                          Please Login to Proceed with Checkout

                      </h5>

                      <?php 

                      if(isset($_SESSION['login_fail']))

                      {

                        echo "<span style='color:red;'>".$_SESSION['login_fail']."</span>";

                        unset($_SESSION['login_fail']);

                      }

                      ?>

                      <form role="form" id="login-form" action="<?php echo $homeurl;?>includes/action/action.php" method="post" novalidate>

                        <input type="hidden" name="type" value="checkout_login">

                        <input type="hidden" name="return_url" 

                                value="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">

                          <div class="form-group">

                              <label for="email">Email address</label>

                              <input type="email" class="form-control" id="email" name="email">

                          </div>

                          <div class="form-group">

                              <label for="password">Password</label>

                              <input type="password" class="form-control" id="password" name="password">

                          </div>

                          <button type="submit" name="user_login" class="btn btn-primary pull-left">Login</button>

                          <a href="<?php echo $homeurl; ?>forgot-password/" class="btn btn-link pull-right">Forgot your password?</a>

                          <div class="clearfix"></div>

                      </form>

                  </section>



                  <?php } else if(isset($_SESSION['login_succ'])  && $n==$m){

                  $sql1=$site->select_query("select * from shipping_address where userid='".$_SESSION['user_id']."' order by sa_id desc limit 1");

                  if($sql1)

                  {

                   $id=$sql1[0];$firstname=$sql1[2];$lastname=$sql1[3];$address1=$sql1[4];$address2=$sql1[5];

                    $city=$sql1[6];$state=$sql1[7];$zipcode=$sql1[9];

                    $country=$sql1[8];

                  }



                  

                  else

                  {

                    $firstname="";$lastname="";$address1="";$address2="";$country="";

                    $city="";$state="";$zipcode="";

                  }



                

                  ?>



                     

                 

                    

                      <section class="checkout addr1 hide checkout-step-2 checkout-step-next element-emphasis-strong clearfix">

                      <h2 class="strong-header element-header">

                          1. Shipping address

                      </h2>

                    </section>

                   <section class="checkout addr2 checkout-step-2 checkout-step-next element-emphasis-strong clearfix">

                      <h2 class="strong-header element-header">

                          1. Shipping address

                      </h2>

                      <form role="form" action="" id="shipping-form" method="post" novalidate>

                        <input type="hidden" name="type" value="update_address">

                        <input type="hidden" name="a_id" value="<?php echo $id;?>">

                          <div class="form-group">

                              <label for="country">Country</label>

                              

                              <select class="chosen chosen-select-deselect form-control" id="country" data-placeholder=" " tabindex="1" name="country">

                                  <option value="">--Select Country--</option>

                                 <?php

                                 $c_list=$site->get_countries();

                                    foreach ($c_list as $key => $value) {?>

                                      <option <?php if($c_list[$key]['country_name']==$country){?>

                                          selected <?php }?>

                                        value="<?php echo $c_list[$key]['country_name'];?>">

                                      <?php echo $c_list[$key]['country_name'];?></option>

                                      <?php

                                      }

                                  ?>

                                  

                              </select>

                          </div>

                          <div class="row">

                              <div class="col-xs-6">

                                  <div class="form-group">

                                      <label for="first-name">First name</label>

                                      <input type="text" class="form-control" id="firstname" name="firstname" required value="<?php echo $firstname;?>" maxlength="50">

                                  </div>

                              </div>

                              <div class="col-xs-6">

                                  <div class="form-group">

                                      <label for="last-name">Last name</label>

                                      <input type="text" class="form-control" id="lastname" 

                                      name="lastname" required value="<?php echo $lastname;?>" maxlength="50">

                                  </div>

                              </div>

                          </div>

                          <div class="form-group">

                              <label for="street-address">Address</label>

                              <input type="text" class="form-control" id="street-address"

                              name="address1" placeholder="Street address" required 

                                value="<?php echo $address1;?>" maxlength="350">

                              <!--<label for="apartment-number" class="sr-only">Apartment</label>

                              <input type="text" class="form-control" id="apartment-number" 

                              name="address2" placeholder="Apartment, suite, unit etc. (optional)" 

                              value="<?php echo $address2;?>" maxlength="350">-->

                          </div>

                          <div class="form-group">

                              <label for="city">City</label>

                              <input type="text" class="form-control" id="city" name="city" required 

                              value="<?php echo $city;?>" maxlength="40">

                          </div>

                          <div class="form-group">

                              <label for="region">State/Province/Region <small class="explanation">(if applicable)</small></label>

                              <select class="chosen chosen-select-deselect form-control" id="state" data-placeholder=" "  tabindex="1" name="state">

                                <option value="">--Select State--</option>

                                 <?php

                                 $s_list=$site->get_state();

                                 foreach ($s_list as $key => $value) {?>

                                      <option <?php if($s_list[$key]['name']==$state){?>

                                          selected <?php }?>

                                        value="<?php echo $s_list[$key]['name'];?>">

                                      <?php echo $s_list[$key]['name'];?></option>

                                      <?php

                                      }

                                 ?>

                                 </select>

                          </div>

                          <div class="form-group">

                              <label for="zip-code">Postal code/Zip code</label>

                              <input type="text" class="form-control" id="zip-code" name="zipcode" required 

                              value="<?php echo $zipcode;?>" maxlength="20">

                          </div>

                          <button type="submit" name="update_addr" class="ship-address btn btn-primary pull-right">Continue</button>

                          <div class="clearfix"></div>

                      </form>

                  </section>



                  <section class="checkout pay-method1 checkout-step-3 checkout-step-next element-emphasis-weak" style="max-height:80px;overflow:hidden">

                      <h2 class="strong-header element-header">

                          2. Payment methods

                      </h2>

                     </section>

                  <section class="checkout pay-method2 hide checkout-step-3 checkout-step-next element-emphasis-weak">

                      <h2 class="strong-header element-header">

                          2. Payment methods

                      </h2><br><br>

                        <?php 

                          $pay=$site->get_payment_information();

                          $shipping_cost=$pay[0]['shipping_cost'];

                          $cash_delivery=$pay[0]['cash_delivery'];

                          if($cash_delivery==0){

                            $url=$homeurl."includes/action/action.php";

                            $checked="";

                          }

                            else

                            {

                              $url=$homeurl."paypal/paypal.php";$checked="checked";

                            }

                        ?>

                      <form role="form" class="checkout-form" action="<?php echo $url;?>" method="post" novalidate>

                                            

                      <input type="hidden" name="o_id" value="<?php echo $_GET['id'];?>">

                        <input type="hidden" name="a_id" value="<?php echo $id;?>">

                           <?php

                            if($cash_delivery==0){

                          ?>

                              <div class="form-group">

                                  <input type="radio" name="payment-methods" class="large sr-only" id="direct-bank-transfer" value="Cash on Delivery" checked>

                                  <label for="direct-bank-transfer">Cash on Delivery</label>

                              </div>

                              <span class="help-block">

                                  Make your payment directly to our executive when your product is delivery to you home address.

                              </span>

                            <?php }?>

                              <div class="form-group">

                                  <input type="radio" <?php echo $checked;?> name="payment-methods" class="large sr-only" id="paypal" value="paypal">

                                  <label for="paypal">Paypal <a href="#"><img src="<?php echo $homeurl;?>assets/images/paypal-logo.png" alt="Paypal"></a></label>

                              </div>

                              <button type="submit" name="place_order" class="btn btn-primary pull-right">Place order</button>

                              <div class="clearfix"></div>

                          </form>

                  </section>

                  <?php }?>

            </div>



            <!-- Order Summary -->

             <?php if(isset($_SESSION['login_succ'])  && $n==$m) { ?>

             <div class="col-md-6 space-left-50">

                  <section class="order-summary element-emphasis-weak">

                      <h3 class="strong-header element-header pull-left">

                          Order summary

                      </h3>

                      <a href="<?php echo $homeurl;?>shopping-cart/<?php echo $_GET['id'];?>/" class="pull-right">

                          Edit cart

                      </a>

                      <div class="clearfix"></div>

                      <?php $oid=mysqli_real_escape_string($con,trim($_GET['id']));$tot="";

                            $sql=mysqli_query($con,"select a.*,b.p_name,b.p_description from order_master 

                              a,product_master b where a.userid='".$_SESSION['user_id']."' and a.pid=b.p_id and a.om_status=1 order by a.created_date desc");

                              while($r=mysqli_fetch_array($sql)){

                            $tot= $tot + ($r['om_quantity'] * $r['om_price']);

                            $sql1=mysqli_query($con,"select * from product_images where pid='".$r['pid']."'");

                            $measurement_dtl_qry = mysqli_query($con, "select * from measurement_profile_master where mp_id = '".$r['mpid']."'");

                             $fabric=explode("{",$r['om_fab']);

                             $fabric=explode(",",$fabric[1]);

                             $fabric_price=explode(":",$fabric[0]);

                             $fabric_id = explode(":",trim($fabric[1],"}"));    

                      ?> 

                      <div class="col-md-12" style="border-bottom:1px solid #ddd;">

                      <div class="col-md-6">

                      <article class="shop-summary-item">

                          <?php $r1=mysqli_fetch_array($sql1); ?>

                            <?php //if($r['om_style']==""){?>

                                <img src="<?php echo $homeurl.$r1['p_img'];?>" style="height:120px;width:70px;" alt="Shop item">

                                <?php /*} else if($r['om_style']!='') {

                                 $get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");



                                 if(mysqli_num_rows($get_fab_def_img) > 0) { 

                                   $fab_def_img = mysqli_fetch_array($get_fab_def_img);

                                ?>

                                   <img src="<?php echo $homeurl.$fab_def_img['default_img'];?>" alt="Customizer item" style="height:120px;width:70px;">

                          <?php } } */ ?> 

                          <header class="item-info-name-features-price">

                            <?php if($r['om_style']!='') { ?>

                              <h4>Custom <?php echo $r['p_name'];?></h4>

                            <?php } else { ?>

                              <h4><?php echo $r['p_name'];?></h4>

                            <?php } ?>

                              <!--<span class="features">Black, S</span>--><br>

                              <span class="quantity"><?php echo $r['om_quantity'];?></span><b>&times;</b>

                                <span class="price">$<?php echo @number_format($r['om_quantity'] * $r['om_price'],2);?></span>

                          </header>

                      </article>

                      </div>

                      <?php if(mysqli_num_rows($measurement_dtl_qry) > 0) {

                            $measurement_dtl = mysqli_fetch_array($measurement_dtl_qry); ?>

                      <div class="col-md-6">

                      <article class="shop-summary-item">

                          <header class="item-info-name-features-price">

                             <h3>Profile</h3>

                              <h4><a href="#"  data-toggle="modal" data-target="#myModal<?php echo $measurement_dtl['mp_id']; ?>"><?php echo $measurement_dtl['mp_name'];?></a></h4>

                              <h4><?php echo $measurement_dtl['mp_height'];?></h4>

                                <h4><?php echo $measurement_dtl['mp_weight'];?></h4>

                                <a href="#" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#myModal<?php echo $measurement_dtl['mp_id']; ?>">View Details</a>

                          </header>

                      </article>

                      </div>

                      </div>

                     

                      <!-- Measurement Full Details-->

                      <div class="modal fade" id="myModal<?php echo $measurement_dtl['mp_id']; ?>" role="dialog">

                          <div class="modal-dialog">

                          

                            <div class="modal-content">

                              <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                <h4 class="modal-title">Measurement Profile</h4>

                              </div>

                              <div class="modal-body">

                                <div class="custom-value">                                    

                                      <p><strong>Name:</strong> <?php echo $measurement_dtl['mp_name']; ?> </p>

                                      <p><strong>Height:</strong> <?php echo $measurement_dtl['mp_height']; ?> </p>

                                      <p><strong>Weight:</strong> <?php echo $measurement_dtl['mp_weight']; ?> </p>

                                 

                                      <p><strong>Chest:</strong> <?php echo $measurement_dtl['mp_chest']; ?> </p>

                                      <p><strong>Abdomen:</strong> <?php echo $measurement_dtl['mp_abdomen']; ?> </p>

                                      <p><strong>Buttocks:</strong> <?php echo $measurement_dtl['mp_buttocks']; ?></p>

                                    



                                      <p><strong>Hips:</strong> <?php echo $measurement_dtl['mp_hips']; ?></p>

                                   <?php 

                                    $sql22=mysqli_query($con,"select a.mpf_value,b.labelname from measurement_profile_value a,

                                        measurement_profile_fields b where a.mpid='".$measurement_dtl['mp_id']."' and a.mpfid=b.mpf_id");

                                   while($r22=mysqli_fetch_array($sql22)){

                                   if($r22['mpf_value']!=0){?>

                                    <?php if($r22['labelname']=='Neck') {
                                      $m_type="cm";
                                    }
                                    else
                                    {
                                      $m_type="inches";
                                    }
                                    ?>

                                       <p><strong><?php echo $r22['labelname']; ?>:</strong> <?php echo $r22['mpf_value']; ?> <?php echo $m_type; ?>

                                  <?php } }?>

                                    

                                    </div>

                              </div>

                              <div class="modal-footer">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                              </div>

                            </div>

                            

                          </div>

                        </div>

                      <?php } ?>

                      <div class="clearfix"></div>

                      <?php }?>                     

                      <?php 

                      $gm=array();$ac=0;

                      $gift=mysqli_query($con,"select amount,quantity from gift_card_master where userid='".$_SESSION['user_id']."' and 

                        status=0 order by created_date desc");

                      if(mysqli_num_rows($gift) > 0)

                      while($gca=mysqli_fetch_array($gift))

                      {

                        $gm[$ac]=$gca['amount'] * $gca['quantity'];

                      ?>

                      <div class="col-md-12" style="margin-top:10px;border-bottom:1px solid #ddd;padding-bottom: 10px;display: flex;">

                        <div class="col-md-6">

                          Gift Card

                        </div>

                        <div class="col-md-4">

                          <?php echo $gca['quantity']." x $".number_format($gca['amount'],2);?>

                        </div>

                         <div class="col-md-2">

                          <?php echo "$".number_format($gca['amount']*$gca['quantity'],2);?>

                        </div>

                      </div>

                      <?php $ac++; }?>

                      <!-- !SHOP SUMMARY ITEM  -->

                       <dl class="order-summary-price">

                          <dt>Subtotal</dt>

                          <dd><strong>$<?php echo @number_format($tot + array_sum($gm),2);

                          $sb=$tot + array_sum($gm);?></strong></dd>

                          <?php 

                          $tax=$site->get_tax($_SESSION['user_id']);

                          ?>

                           <?php 

                           $dis="0";

                          $gift_applied=mysqli_query($con,"select * from gift_card_applied where

                            userid='".$_SESSION['user_id']."' and status=0");

                          $coupon_applied=mysqli_query($con,"select * from coupon_applied where userid='".$_SESSION['user_id']."' and status=0");

                            if(mysqli_num_rows($gift_applied))

                              {

                                ?>

                                  <dt><strong style="color:#000;">Gift Voucher</strong></dt>

                                  <dd>&nbsp;</dd>

                                  <?php 

                                  $voucher=array();$v=0;

                                  $rg=mysqli_fetch_array($gift_applied);
                                  /*while ($rg=mysqli_fetch_array($gift_applied))

                                  {*/

                                    $voucher[$v]=$rg['amount'];

                                    ?>

                                      <dt><?php echo $rg['code'];?></dt>

                                      <dd>$<?php echo number_format($rg['amount'],2);?></dd>

                                      <?php $v++;

                                  //}

                                }

                                if(mysqli_num_rows($coupon_applied))

                                {

                                  $cr=mysqli_fetch_array($coupon_applied);

                                  ?>

                                  <dt>

                                    <strong style="color:#000;">Coupon</strong>

                                    <small>( <?php echo $cr['code'];?> )</small>

                                   </dt>

                                   <dd><strong>

                                      <?php

                                        if($cr['coupon_type']=="$")

                                        {

                                            echo "$".number_format($cr['value'],2);

                                            $dis=$cr['value'];

                                        }

                                        if($cr['coupon_type']=="Discount")

                                        {

                                          echo number_format($cr['value'],2)."%";

                                          $dis= ((($tot + array_sum($gm))- array_sum($voucher)) / 100) * $cr['value'];

                                        }

                                        if($cr['coupon_type']=="Free Shipping")

                                        {

                                          echo "Free Shipping";

                                          $dis="0";

                                          $shipping_cost=0;

                                        }

                                      ?>

                                      </strong>

                                    </dd>

                                  <?php

                                }

                                if(mysqli_num_rows($gift_applied) || mysqli_num_rows($coupon_applied))

                                {

                                  ?>

                                    <!--<dt>Subtotal</dt>

                                   <dd>$<?php echo number_format((($tot+array_sum($gm)) - array_sum($voucher) ) - $dis,2);

                                   $sb=(($tot+array_sum($gm)) - array_sum($voucher)) - $dis;?></dd>-->

                                  <?php

                                }

                                ?>

                          <dt>Tax</dt>

                          <dd><?php echo number_format($tax,2);?>%</dd>

                          <dt>Shipping</dt>

                          <dd>$<?php echo number_format($shipping_cost,2);?></dd>

                         

                          <dt class="total-price">Order total</dt>

                          <dd class="total-price">

                            <strong>$<?php 

                            $tp=($sb / 100 ) * $tax;

                            echo @number_format((($tot + $tp + $shipping_cost + array_sum($gm)) 

                                           - array_sum($voucher)) - $dis,2);?></strong></dd>

                      </dl>

                  </section>

             </div>

            <?php 
          } 
          else if(isset($_SESSION['login_succ']) && $n!=$m) 
          { 
            ?>

              <div class="col-md-6 space-right-20" style="float:none;">

                <h5 class="strong-header ">

                    Please Select All Measurement Profile From Your Order

                </h5>

                <div class="clearfix"></div>

                <a href="<?php echo $homeurl; ?>shopping-cart/<?php echo $_GET['id']; ?>/" class="pull-left">Click here to View your Order Details</a> 

              </div>

            <?php 
          } 
        ?>

            </div>

          </section>

      <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->



  