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

                          --><li>Orders</li>

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

                          <li class="active"><span>My orders</span></li>

                          <li><a href="<?php echo $homeurl;?>my-measurements/">My Measurements</a></li>

                          <li><a href="<?php echo $homeurl;?>address-book/">Address book</a></li>

                          <!--<li><a href="<?php echo $homeurl;?>wishlist/">My wishlist</a></li>-->

                          <li><a href="<?php echo $homeurl;?>logout/">Logout</a></li>

                      </ul>

                  </nav>

              </div>

              <div class="clearfix visible-xs space-30"></div>

              <div class="col-sm-9 space-left-30">

                  <h2 class="strong-header large-header">Order Details - <?php echo $_GET['id'];?></h2>

                  <div class="table table-responsive">

                     <!-- Product Cart Section Ends --> 

                      <?php $i=0;

                          $sql=mysqli_query($con,"select a.*,b.p_name,b.p_price,d.p_img,c.* from order_master a,product_master b,shipping_address c,product_images d

                           where a.order_id='".$_GET['id']."' and a.pid=b.p_id and a.ship_id=c.sa_id and b.p_id=d.pid and a.om_status=0 order by a.created_date desc");

                          while($r=mysqli_fetch_array($sql))

                          {

                            $i++;

                            $fabric=explode("{",$r['om_fab']);

                            $fabric=explode(",",$fabric[1]);

                            $fabric_price=explode(":",$fabric[0]);

                            $fabric_id = explode(":",trim($fabric[1],"}"));

                             $measurement_dtl_qry = mysqli_query($con,"select * from measurement_profile_master where mp_id = '".$r['mpid']."'");

                             $measurement_dtl = mysqli_fetch_array($measurement_dtl_qry); 

                              $status = $r['order_status'];

                              if($i==1)

                              {

                                if($status!="Cancelled")

                                {

                                  if($status=="Processing")

                                    {

                                      $pstat1="active";$text1="<i class='fa fa-check'></i>";

                                    }

                                  if($status=="In Production")

                                    {

                                      $pstat1="complete";

                                      $pstat2="active";

                                      $text1=$text2="<i class='fa fa-check'></i>";

                                    }

                                  if($status=="Ready to Pickup")

                                  {

                                    $pstat1=$pstat2="complete";

                                    $pstat3="active";

                                    $text1=$text2=$text3="<i class='fa fa-check'></i>";

                                  }

                                  if($status=="Shipped")

                                    {

                                      $pstat1=$pstat2=$pstat3="complete";

                                      $pstat4="active";

                                      $text1=$text2=$text3=$text4="<i class='fa fa-check'></i>";

                                    }

                                  if($status=="Delivered")

                                    {

                                      $pstat1=$pstat2=$pstat3=$pstat4= $pstat5="complete";

                                      $text1=$text2=$text3=$text4=$text5="<i class='fa fa-check'></i>";

                                    }

                                    ?>

                                       <div class="row bs-wizard" style="border-bottom:0;">

                                        <div class="col-xs-2 bs-wizard-step <?php echo $pstat1;?> ">

                                          <div class="text-center bs-wizard-stepnum">Step 1</div>

                                          <div class="progress"><div class="progress-bar"></div></div>

                                          <a href="javascript:void(0);" class="bs-wizard-dot"><?php echo $text1;?></a>

                                          <div class="bs-wizard-info text-center">Processing</div>

                                        </div>

                                         <div class="col-xs-3 bs-wizard-step <?php echo $pstat2;?>">

                                          <div class="text-center bs-wizard-stepnum">Step 2</div>

                                          <div class="progress"><div class="progress-bar"></div></div>

                                          <a href="javascript:void(0);" class="bs-wizard-dot"><?php echo $text2;?></a>

                                          <div class="bs-wizard-info text-center">In Production</div>

                                        </div>

                                         <div class="col-xs-2 bs-wizard-step  <?php echo $pstat3;?>">

                                          <div class="text-center bs-wizard-stepnum">Step 3</div>

                                          <div class="progress"><div class="progress-bar"></div></div>

                                          <a href="javascript:void(0);" class="bs-wizard-dot"><?php echo $text3;?></a>

                                          <div class="bs-wizard-info text-center">Ready to Pickup</div>

                                        </div>

                                         <div class="col-xs-3 bs-wizard-step  <?php echo $pstat4;?>">

                                          <div class="text-center bs-wizard-stepnum">Step 4</div>

                                          <div class="progress"><div class="progress-bar"></div></div>

                                          <a href="javascript:void(0);" class="bs-wizard-dot"><?php echo $text4;?></a>

                                          <div class="bs-wizard-info text-center">Shipped

                                           <?php 

                                          $car_name=$r['carrier_name'];$track_id=$r['track_id'];

                                          if( ($status=="Shipped" || $status=="Delivered") && $car_name!='' && $track_id!='')

                                            {

                                              echo "<br><p class='ship-text'>Carrier Name : ".$car_name."</p>";

                                              echo "<p class='ship-text'>Tracking ID : #".$track_id."</p><br>";

                                            }

                                          ?>

                                          </div>

                                        </div>

                                         <div class="col-xs-2 bs-wizard-step  <?php echo $pstat5;?>">

                                          <div class="text-center bs-wizard-stepnum">Step 5</div>

                                          <div class="progress"><div class="progress-bar"></div></div>

                                          <a href="javascript:void(0);" class="bs-wizard-dot"><?php echo $text5;?></a>

                                          <div class="bs-wizard-info text-center">Delivered!</div>

                                        </div>

                                      </div>

                                    <?php

                                }

                              }

                          ?>                     

                          <div class="element-emphasis-weak col-md-12" style="display:table;">

                              <div class="pull-left col-md-3">

                                  <?php //if($r['om_style']==""){?>

                                    <img src="<?php echo $homeurl.$r['p_img'];?>" alt="Shop item">

                                  <?php /*} else if($r['om_style']!='') {

                                   $get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");

                                   if(mysqli_num_rows($get_fab_def_img) > 0) { 

                                     $fab_def_img = mysqli_fetch_array($get_fab_def_img);

                                  ?>

                                     <img src="<?php echo $homeurl.$fab_def_img['default_img'];?>" alt="Customizer item">

                                   <?php } }*/ ?> 

                              </div>

                              

                              <div class="pull-left col-md-5">

                                  <?php if($r['om_style']!='') { ?>

                                     <p style="font-size:18px;"><strong>Custom <?php echo $r['p_name'];?></strong></p>

                                  <?php } else { ?>

                                     <p style="font-size:18px;"><strong><?php echo $r['p_name'];?></strong></p>

                                  <?php } ?>

                                  <p><strong>$<?php echo number_format($r['om_quantity'] * $r['om_price'],2);?></strong></p>

                                  <p><strong>Shipping Address : </strong></p>

                                  <p><?php echo $r['sa_firstname']." ".$r['sa_lastname'];?></p>

                                  <p><?php echo $r['sa_address1'];?>,</p>

                                  <!--<p><?php echo $r['sa_address2'];?>,</p>-->

                                  <p><?php echo $r['sa_city'];?> - <?php echo $r['sa_zipcode'];?>,</p>

                                  <p><?php echo $r['sa_province'];?>, <?php echo $r['sa_country'];?></p>

                              </div>

                              <?php if(mysqli_num_rows($measurement_dtl_qry)){?>

                              <div class="pull-right col-md-4">

                                <p style="font-size:18px;"><strong>Measurement Profile</strong></p>

                                      <p><strong>Name:</strong> <?php echo $measurement_dtl['mp_name']; ?> </p>

                                      <p><strong>Height:</strong> <?php echo $measurement_dtl['mp_height']; ?> </p>

                                      <p><strong>Weight:</strong> <?php echo $measurement_dtl['mp_weight']; ?> </p>

                                      <p><strong>Chest:</strong> <?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_chest'])); ?> </p>

                                      <p><strong>Abdomen:</strong> <?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_abdomen'])); ?> </p>

                                      <p><strong>Buttocks:</strong> <?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_buttocks'])); ?></p>

                                      <p><strong>Hips:</strong> <?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_hips'])); ?></p>

                                     <?php 

                                     $sql22=mysqli_query($con,"select a.mpf_value,b.labelname from measurement_profile_value a,

                                     measurement_profile_fields b where a.mpid='".$measurement_dtl['mp_id']."' and a.mpfid=b.mpf_id");

                                     while($r22=mysqli_fetch_array($sql22)){

                                        if($r22['mpf_value']!=0){

                                      ?>
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

                              <?php }?>

                          

                      </div>

                      <?php }?>

                     <!-- Product Cart Section Ends --> 

                      <!-- Gift Cart Section Starts-->

                      <?php 

                          $gift_sql=mysqli_query($con,"select * from gift_card_master

                           where orderid='".$_GET['id']."' and status=1 order by created_date desc");

                          if(mysqli_num_rows($gift_sql) > 0) 

                          {

                            while($gift=mysqli_fetch_array($gift_sql))

                            {

                            

                          ?>                     

                          <div class="element-emphasis-weak col-md-12" style="display:table;">

                              

                              

                              <div class="pull-left col-md-5">

                                  <p><strong>Gift Code : </strong><?php echo $gift['gift_code']; ?></p>

                                  <p><strong>Gift Amount :  </strong><?php echo $gift['amount']; ?> </p>

                                  <p><strong>Gift Type : </strong><?php echo $gift['gift_type']; ?> </p>

                                 

                              </div>

                            </div>

                      <?php } } ?>

                      <!-- Gift Cart Section Ends -->

                  </div>

                  <a href="<?php echo $homeurl;?>my-orders/" class="btn btn-primary">Back</a>

              </div>

          </section>

      </div>

  </section>

  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->

<?php }?>