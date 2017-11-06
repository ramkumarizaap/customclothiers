<?php
if(isset($_SESSION['admin_user_id']) || isset($_SESSION['manu_user_id']) 
          || isset($_SESSION['emp_user_id']))
{
   require_once('includes/topbar.php');
    require_once('includes/sidebar.php');
    $site=new Site();
    //$user_count=$site->get_user_count();
?>
<body class="skin-black sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>Order ID - <?php  echo $_GET['type'];?></h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Order Details</li>
          </ol><br>
          <a href="<?php echo $adminurl;?>orders/" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
      </section><br />

      <?php if(isset($_SESSION['admin_user_id']) || isset($_SESSION['emp_user_id'])): ?>
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header box-info">
              <h3>Customer Details</h3>
              <hr/>
            </div>
            <div class="box-body">
              <?php 
                $sql34=mysqli_query($con,"select a.* from user_master a,order_master b where a.user_id=b.userid and b.order_id='".$_GET['type']."'");
                $r34=mysqli_fetch_array($sql34);
                 $user=$r34['user_id'];
              ?>
              <div class="col-md-6">
                <p><strong><?php echo $r34['firstname']." ".$r34['lastname'];?></strong></p>             
                <p><?php echo $r34['address1'];?></p>
                <p> <?php echo $r34['address2'];?></p>
                <p><?php echo $r34['city']." - ".$r34['zipcode'];?></p>
                <p> <?php echo $r34['province'];?>
                <p> <?php echo $r34['country'];?></p>
                <p> <?php echo $r34['email'];?></p>
                <p><?php echo $r34['mobile'];?></p>
              </div>
            </div>
          </div>
        </div>  
        <div class="col-md-6">
          <div class="box box-primary" style="margin-left:0px;">
            <div class="box-header box-info">
              <h3>Shipping Address</h3>
              <hr/>
            </div>
            <div class="box-body">
              <?php 
               $sql2=mysqli_query($con,"select a.*,b.carrier_name,b.order_status,b.track_id from 
                shipping_address a,order_master b where b.order_id='".$_GET['type']."' and 
                b.ship_id=a.sa_id");
                $r2=mysqli_fetch_array($sql2);
              ?>
              <div class="col-md-6">
                <p>
                  <strong>
                    <?php echo ucfirst($r2['sa_firstname'])." ".ucfirst($r2['sa_lastname']);?>
                  </strong>
                </p>
                <p><?php echo ucfirst($r2['sa_address1']);?></p>
                <?php if($r2['sa_address2']!='')
                {
                ?>
                <p><?php echo ucfirst($r2['sa_address2']);?></p>
                <?php 
                }
                ?>
                <p><?php echo ucfirst($r2['sa_city'])." - ".$r2['sa_zipcode'];?></p>
                <p><?php echo ucfirst($r2['sa_province']);?></p>
                <p><?php echo ucfirst($r2['sa_country']);?></p><br>
              </div>
              <?php if($r2['carrier_name']!='')
              {
                ?>
                <div class="col-md-6">
                  <p><strong>Carrier Details</strong></p>
                  <p>Order Status - <strong><?php echo $r2['order_status'];?></strong></p>
                  <p>Carrier Name - <strong><?php echo $r2['carrier_name'];?></strong></p>
                  <p>Track ID - <strong><?php echo $r2['track_id'];?></strong></p> 
                </div>
                <?php 
              }
              ?>
            </div>
          </div>
        </div>  
      </div>
    <?php endif; ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3>Order Details</h3>
              <hr/>
            </div>
            <div class="box-body">
              <table class="table table-responsive table-striped">
                <thead>
                  <th width="600">Product Name</th>
                  <th style="text-align:center;">Quantity</th>
                   <?php if(isset($_SESSION['admin_user_id']) || isset($_SESSION['emp_user_id'])): ?>
                     <th>Price</th>
                   <?php endif; ?>
                  <th>Options</th>
                </thead>
                <tbody>
                  
                   <?php 
                   $tot="";$a=0;$b=1;$c=1;
                    $sql=mysqli_query($con,"select a.*,b.p_name from order_master a,product_master b
                    where a.order_id='".$_GET['type']."' and a.pid=b.p_id order by a.created_date desc");
                    while($r=mysqli_fetch_array($sql))
                    {
                      $su_arr = $r['subcatid'];
                      $a++;
                      $fabric=explode("{",$r['om_fab']);
                      $fabric=explode(",",$fabric[1]);
                      $fabric_price=explode(":",$fabric[0]);
                      $fabric_id = explode(":",trim($fabric[1],"}"));
                      $fabric_name = explode(":",trim($fabric[2],"}"));
                      $sql1=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");
                      $r1=mysqli_fetch_array($sql1);
                      $sql2=mysqli_query($con,"select * from product_master where p_id='".$r['pid']."'");
                      $r4=mysqli_fetch_array($sql2);
                      $tot=$tot + ($r['om_quantity'] * $r['om_price']);

                      $get_mp = mysqli_query($con,"select * from measurement_profile_master where 
                          mp_id='".$r['mpid']."'");
                      $m_dtl = mysqli_fetch_array($get_mp);
                         ?>
                      <tr>
                          <td>
                            
                              <?php //if($r['om_style']=="")
                              //{
                                ?>
                                <img src="<?php echo $homeurl.$r1['p_img'];?>" 
                              style="height:100px !important;width: 60px !important;">
                                <?php 
                              /*} 
                              else if($r['om_style']!='')
                              {
                                $get_fab_def_img = mysqli_query($con,"select default_img from 
                                  fabric_master where fab_rand='".trim($fabric_id[1])."'");
                                if(mysqli_num_rows($get_fab_def_img) > 0) 
                                { 
                                  $fab_def_img = mysqli_fetch_array($get_fab_def_img);
                                 ?>
                                    <img src="<?php echo $homeurl.$fab_def_img['default_img'];?>" 
                                      alt="Customizer item" style="height:100px;width:70px;">
                                  <?php 
                                } 
                              }*/
                              ?>
                              <?php if($r['om_style']=="")
                              {
                                ?> 
                              <?php echo $r['p_name'];?>
                              <?php } else { ?>
                              <?php echo "Custom". "&nbsp; ".$r['p_name']."";?>
                              <?php } ?>
                          </td>
                           <td style="text-align:center;">
                            <?php echo $r['om_quantity'];?>
                          </td>
                          <?php if(isset($_SESSION['admin_user_id']) || isset($_SESSION['emp_user_id'])): ?>
                           <td>
                            <?php echo "$".number_format($r['om_quantity'] * $r['om_price'],2);?>
                          </td>
                        <?php endif; ?>
                           <td>
                           <?php 
                            if($su_arr['subcatid']!="5")
                            {
                              ?>
                                <a class="btn btn-warning btn-xs popup" 
                                  data-href="measure<?php echo $r['om_id'];?>">Measurement Details</a><br><br>
                                  <?php 
                                  include("pop_measure.php");
                                  if($r['om_style']!='')
                                  {
                                    ?>
                                   <a class="btn btn-success btn-xs popup"  
                                    data-href="customize<?php echo $r['om_id'];?>">Customize Details</a>
                                     
                                <?php if(isset($_SESSION['admin_user_id'])): ?>
                                  <a class="btn btn-success btn-xs popup" 
                                  href="<?php echo $adminurl;?>customize/edit/style/<?php echo $r['userid'];?>/<?php echo $r['pid'];?>/1/<?php echo $r['subcatid'];?>/<?php echo $r['om_id'];?>/<?php echo $r['order_id'];?>/">Modify Order</a><br><br> 
                                <?php endif; ?>   

                                   <?php 
                                    include("pop_cu.php");

                                  }
                              }
                               ?> 
                               <?php if(isset($_SESSION['admin_user_id'])): ?>
                               <a href="javascript:void(0);" class="delete-order btn btn-danger btn-xs" data-user-id="<?php echo $r['userid']; ?>" data-order-id="<?php echo $r['order_id'];?>" data-om-id="<?php echo $r['om_id'];?>">

                               Delete Order</a>   
                               <?php endif; ?>                             
                              </td>
                      </tr>
                         <?php 
                    }
                         $a1=array();
                         $oid=$_GET['type'];
                         $gift=mysqli_query($con,"select * from gift_card_master where orderid='".$_GET['type']."' order by created_date desc");
                         if(mysqli_num_rows($gift))
                         {
                           while($g=mysqli_fetch_array($gift))
                            {
                            $a1[]=$g['amount'];
                           ?>
                           <tr>
                            <td>
                              <div class="col-md-12">
                                Gift Card<br>
                                <?php echo $g['gift_code'];?><br>
                                <?php echo "$".number_format($g['amount'],2);?>
                              </div>
                            </td>
                            <td class="text-center">
                              1
                            </td>
                            <?php if(isset($_SESSION['admin_user_id']) || isset($_SESSION['emp_user_id'])): ?>
                             <td>
                              <?php echo "$".number_format($g['amount'],2);?>
                             </td>
                            <?php endif; ?>
                            <?php if(isset($_SESSION['admin_user_id'])): ?>
                            <td>
                            <a href="javascript:void(0);" class="delete-gift-order btn btn-danger btn-xs" data-user-id="<?php echo $g['userid']; ?>" data-gift-code="<?php echo $g['gift_code'];?>" data-order-id="<?php echo $g['orderid'];?>" data-user-id="<?php echo $g['userid'];?>">

                               Delete Order
                            </a>
                            </td>
                          <?php endif; ?>
                           </tr>
                           <?php 
                            }
                         }
                         ?>
                      </tbody>
              </table>                    
               <div class="row col-md-12">      
                  <hr style="border: 1px solid #eee !important;">
                  <?php if(isset($_SESSION['admin_user_id']) || isset($_SESSION['emp_user_id'])): ?>
                    <div class="row col-md-12">
                      <div class="col-md-6 pull-right tot_dtl">
                        <h4><strong>Subtotal : </strong> 
                          <?php echo "$".number_format($tot + array_sum($a1),2);?></h4>
                        <hr style="border: 1px solid #eee !important;">
                        <?php 
                          $a2=array();
                          $app=mysqli_query($con,"select * from gift_card_applied where orderid='".$_GET['type']."'");
                          if(mysqli_num_rows($app))
                          {
                            $ap=mysqli_fetch_array($app);
                            /*while($ap=mysqli_fetch_array($app))
                            {*/
                                $a2[]=$ap['amount'];
                                ?>
                                <h4><span><strong>Gift Card </strong>
                                  <small>(<?php echo $ap['code'];?>)</small> :</span> (-)$<?php echo number_format($ap['amount'],2);?></h4>
                                <hr style="border: 1px solid #eee !important;">
                              <?php 
                            //}
                          }
                             $pay=$site->get_payment_information();
                            $shipping_cost=$pay[0]['shipping_cost'];
                         $coupon=mysqli_query($con,"select * from coupon_applied where orderid='".$_GET['type']."'");
                          if(mysqli_num_rows($coupon))
                            {
                              $cr=mysqli_fetch_array($coupon);
                              if($cr['coupon_type']=="Discount")
                                {
                                  $dis=((($tot + array_sum($a1)) - array_sum($a2)) / 100) * $cr['value'];
                                }
                                else  if($cr['coupon_type']=="$")
                                {
                                  if( (($tot + array_sum($a1)) - array_sum($a2)) >=  $cr['value'])
                                    $dis= $cr['value']; 
                                  else
                                    $dis = (($tot + array_sum($a1)) - array_sum($a2));
                                }
                                else if($cr['coupon_type']=="Free Shipping")
                                {
                                  $shipping_cost= 0; 
                                  $dis= 0; 
                                }
                              ?>
                               <h4><span><strong>Coupon</strong>
                                    <small>(<?php echo $cr['code'];?>)</small> :</span> (-)
                                    <?php if($cr['coupon_type']=="$")
                                      echo "$".number_format($cr['value'],2);
                                     else if($cr['coupon_type']=="Discount")
                                      echo number_format($cr['value'],2)."%";
                                    else if($cr['coupon_type']=="Free Shipping")
                                      echo "Free Shipping";
                                      ?></h4>
                                  <hr style="border: 1px solid #eee !important;">
                              <?php
                            }
                          ?>
                        
                        <?php 
                        if(mysqli_num_rows($app) || mysqli_num_rows($coupon))
                        {
                        ?>
                        <h4><strong>Subtotal : </strong> 
                          <?php echo "$".number_format((($tot + array_sum($a1)) - array_sum($a2)) - $dis ,2);?></h4>
                        <hr style="border: 1px solid #eee !important;">
                        <?php 
                      }
                      ?>
                      <?php 
                          
                          $discount=mysqli_query($con,"select discount from order_history_master where orderid='".$_GET['type']."'");
                          if(mysqli_num_rows($discount))
                          {
                               $discount_dtl=mysqli_fetch_array($discount);
                                $dis_amt=$discount_dtl['discount'];
                                ?>
                                <h4><strong>Discount: </strong>
                                  (-) $<?php echo number_format($dis_amt,2);?></h4>
                                <hr style="border: 1px solid #eee !important;">
                              <?php 
                          }
                             
                        ?>
                       <?php 
                        $tax=$site->get_tax($user);
                        if(count($a2) > 0)
                          $tp=(((($tot + array_sum($a1) - array_sum($a2)) - $dis_amt) - $dis) / 100) * $tax;
                        else
                         $tp=(((($tot + array_sum($a1)) - $dis_amt) - $dis) / 100) * $tax;
                      //$tp=(($tot + array_sum($a1)) / 100) * $tax;
                      if($tax!=0 || $tax!='' || $tax!="0"){
                      ?>
                      <h4><strong>Tax : </strong> (+)<?php echo number_format($tax,2);?>%</h4>
                      <hr style="border: 1px solid #eee !important;">
                      <?php }?>
                        <h4><strong>Shipping : </strong> (+)$<?php echo number_format($shipping_cost,2);?></h4>
                        <hr style="border: 1px solid #eee !important;">
                        <h4><strong>Total : </strong> 
                          <?php echo "$".number_format(((($tot + $tp + array_sum($a1) + $shipping_cost) - 
                            array_sum($a2))-$dis_amt) - $dis,2);?></h4>

                          <?php $refund_amt=mysqli_query($con,"select refund_amount from refund_order_master where order_id='".$_GET['type']."'");


                      if(mysqli_num_rows($refund_amt))
                        {
                             $refund_dtl=mysqli_fetch_array($refund_amt);

                             $refund_amt = $refund_dtl['refund_amount'];
                         ?>
                         <hr style="border: 1px solid #eee !important;">
                          <h4><strong>Refunded Amount : </strong> <?php echo "$".$refund_amt; ?> </strong> 

                       <?php      
                        }
                        ?>
                      </div>
                  </div>
                <?php endif; ?>
                  <a href="<?php echo $adminurl;?>orders/" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
               </div>                       
            </div>
          </div>

        </div>
      </div>

    </div>
        <?php require('includes/footer.php');?>
  </div>
</body>
<?php 

}
else{
    header("Location:{$adminurl}");
}?>