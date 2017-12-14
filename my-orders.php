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
                          --><li>My Orders</li>
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
                  <h2 class="strong-header large-header">My orders</h2>
                  <div class="table table-responsive">
                    
                      <table class="table my-order">
                          <thead>
                              <tr>
                                  <td class="width20"> Order No. </td>
                                  <td class="width30"> Order Date </td>
                                  <td> Quantity</td>
                                  <td> Total </td>
                                  <td> Status </td>
                                  <td class="text-right width13"> Details </td>
                              </tr>
                          </thead>
                          <tbody>
              <?php 
                $sql=mysqli_query($con,"select sum(om_quantity) as om_quantity,order_id,created_date,sum(om_price) as om_price,order_status,mpid from order_master where userid='".$_SESSION['user_id']."' and om_status=0 group by order_id 
                  order by created_date desc");
              
                $gift_sql = mysqli_query($con,"select sum( b.amount ) , sum( quantity ) as quantity , b.orderid from gift_card_master b where not exists (select * from order_master a where b.orderid = a.order_id) group by b.orderid order by b.created_date desc");

                
              @$tot=mysqli_num_rows($sql);
              
              if($tot>0)
              {
                while($r=mysqli_fetch_array($sql))
                {
                  $gift_card = mysqli_query($con,"select count(gift_code) as gift_count from gift_card_master where userid='".$_SESSION['user_id']."' and orderid='".$r['order_id']."'");
                  $gift_dtl = mysqli_fetch_array($gift_card);
                  $his=mysqli_query($con,"select * from order_history_master where orderid='".$r['order_id']."'");
                  $h=mysqli_fetch_array($his);
                  $measurement_dtl_qry=mysqli_query($con,"select * from measurement_profile_master where mp_id='".$r['mpid']."'");?>
                  <tr>
                      <td><a href="<?php echo $homeurl;?>view-orders/<?php echo $r['order_id'];?>/"><strong><?php echo $r['order_id'];?></strong></a></td>
                      <td><?php echo date('M d, Y',strtotime($h['oh_date']));?></td>
                      <td><?php echo $r['om_quantity']+$gift_dtl['gift_count'];?></td>
                      <td>$<?php echo number_format($h['tot_amount'],2);?></td>
                      <td><span class="btn-info btn-small"><?php echo $r['order_status'];?></span></td>
                      <td class="text-right">
                      
                       <a class="btn-small table-btn"   href="<?php echo $homeurl;?>view-orders/<?php echo $r['order_id'];?>/" >View</a>
                      
                      
                      </td>
                      
                  </tr>
                 <?php } } /*if(mysqli_num_rows($gift_sql)>0)
                {
                while($g_dtl=mysqli_fetch_array($gift_sql))
                {
                  $his=mysqli_query($con,"select * from order_history_master where orderid='".$g_dtl['orderid']."'");
                  $h=mysqli_fetch_array($his);
                  
                ?>
                  <tr>
                      <td><a href="<?php echo $homeurl;?>view-orders/<?php echo $g_dtl['orderid'];?>/"><strong><?php echo $g_dtl['orderid'];?></strong></a></td>
                      <td><?php echo date('M d, Y',strtotime($h['oh_date']));?></td>
                      <td><?php echo $g_dtl['quantity'];?></td>
                      <td>$<?php echo number_format($h['tot_amount'],2);?></td>
                      <td><span class="btn-info btn-small"><?php echo '-';?></span></td>
                      <td class="text-right">
                      
                       <a class="btn-small table-btn"   href="<?php echo $homeurl;?>view-orders/<?php echo $g_dtl['orderid'];?>/" >View</a>
                      
                      
                      </td>
                      
                  </tr>
                 <?php } } */ else {?>
                 <tr>
                      <td colspan="6"><p>Orders Details Not Available ! </p></td>
                  </tr>
                  <?php } ?>
              </tbody>
          </table>
      </div>
     </div>
    </section>
   </div>
  </section>
  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->
<?php }?>