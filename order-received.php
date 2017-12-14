  <?php


 $ord_recv_cnt_qry = mysqli_query($con,"select * from order_received_master");

 $ord_recv_cnt=mysqli_fetch_row($ord_recv_cnt_qry);


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

                          Order received

                      </h1>

                      <!-- BREADCRUMBS -->

                      <ul class="breadcrumbs list-inline pull-right">

                          <li><a href="<?php echo $homeurl;?>">Home</a></li><!--

                          --><!--<li><a href="<?php echo $homeurl;?>product-listing/">Shop</a></li><!--

                          --><li>Order received</li>

                      </ul>

                      <!-- !BREADCRUMBS -->

                  </div>

              </header>

          </div>

      </div><!-- !full-width -->

      <div class="container">

          <!-- !FULL WIDTH -->

          <!-- !SECTION EMPHASIS 1 -->



          <div class="row">

            <?php 

            $oid=$_SESSION['order_id'];
            $msg= isset ($_GET['id']) ? $_GET['id'] : "0";
            

            $recd=$site->get_received_order($oid);

            //echo "<pre>";print_r($recd);echo "</pre>";exit;



            ?>

              <section class="col-sm-6 col-md-5">
              <?php if($msg=="success" || $msg=="0")
              {?>

                  <p>

                       <?php echo $ord_recv_cnt[1]; ?><br><br>

                  </p>

                  <p>
                  <?php 
                     $ship=mysqli_query($con,"select tot_amount,pay_type,shipping_cost,oh_date
                     from order_history_master where orderid='$oid'");
                      $sp=mysqli_fetch_array($ship);
                      $ship_cost=$sp['tot_amount'];
                    ?>
                      Order number: <strong><?php echo $oid;?></strong><br>

                      Date: <strong><?php echo date('M d, Y',strtotime($sp['oh_date']));?></strong><br>

                      Total: <strong>$<?php echo $ship_cost;?></strong><br>

                      <?php if(isset($msg))
                      {?>
                      Payment method: <strong><?php echo $sp['pay_type'];?></strong>
                      <?php 
                    }
                      ?>

                  </p>

                  <p>

                      <?php echo $ord_recv_cnt[3]; ?>

                  </p>

                  <!--<h3 class="strong-header pull-left">Our bank account details&nbsp;&nbsp;&nbsp;</h3>

                  <a href="#" class="print-link pull-left">Print</a>

                  <div class="clearfix"></div>

                  <p>

                      Account name: <strong>Decima store</strong><br>

                      Account number: <strong>123456789</strong><br>

                      Store code: <strong>01-02-03</strong><br>

                      Bank name: <strong>Sample Bank</strong><br>

                      IBAN: <strong>GB29 NWBK 6016 1331 9268 19</strong>

                  </p>-->
                  <?php }
                  else
                  {?>
                <p>

                      Your transaction hs been failed!<br><br>

                  </p>

                  <p>

                      Order number: <strong><?php echo $oid;?></strong><br>
                      Date: <strong><?php echo date('M d, Y',strtotime($recd[0]['created_date']));?></strong><br>

                      Total: <strong>$<?php echo number_format(5 + $recd[0]['price'],2);?></strong><br>

                <?php

                  }
                  ?>

              </section>

              <div class="clearfix visible-xs space-30"></div>

              <aside class="col-sm-6 col-md-7">

                  <img  src="<?php echo $homeurl;?>/<?php echo $ord_recv_cnt[2]; ?>" alt="Order Received"  title="Order Received">

                  <div class="space-30"></div>

                  <a href="<?php echo $homeurl;?>Shop/" class="btn btn-default">Continue shopping</a>

              </aside>

          </div>



      </div>

  </section>



  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->

