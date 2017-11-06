<?php

if(isset($_SESSION['admin_user_id']) || isset($_SESSION['manu_user_id']) || isset($_SESSION['emp_user_id']))

{

    require_once('includes/topbar.php');



    require_once('includes/sidebar.php');



    //$site=new Site();



    $user_count=$site->get_counts("user_master");



    $pro_count=$site->get_counts("product_master");



    $order_count=$site->get_counts("order_master");



    $fab_count=$site->get_counts("fabric_master");



?>



<body class="skin-black sidebar-mini">



<div class="wrapper">



<div class="content-wrapper">



    <section class="content-header">



          <h1>



            Dashboard



            <small>Control panel</small>



          </h1>



          <ol class="breadcrumb">



            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>



            <li class="active">Dashboard</li>



          </ol>



        </section>



        <section class="content">



          <!-- Small boxes (Stat box) -->



          <!-- ./col -->



             <?php if(isset($_SESSION['admin_user_id'])){?>



            <div class="col-lg-3 col-xs-6">



              <!-- small box -->

            

              <div class="small-box bg-yellow">



                <div class="inner">



                  <h3><?php echo $user_count;?></h3>



                  <p>User Registrations</p>



                </div>



                <div class="icon">



                  <i class="ion ion-person-stalker"></i>



                </div>



                <a href="<?php echo $adminurl;?>users/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>



              </div>



            </div><!-- ./col -->



            <div class="col-lg-3 col-xs-6">



              <!-- small box--> 



              <div class="small-box bg-red">



                <div class="inner">

                <?php 
                $sale=mysqli_query($con,"select sum(tot_amount) as amount from order_history_master");
                $r=mysqli_fetch_array($sale);
                ?>

                    <h3><?php echo number_format($r['amount'],2);?></h3>



                  <p>Sales</p>



                </div>



                <div class="icon">



                  <i class="ion ion-social-usd"></i>



                </div>



                <a href="<?php echo $adminurl;?>orders/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>



              </div>



            </div><!-- ./col -->

            <?php } if (isset($_SESSION['emp_user_id']) || isset($_SESSION['manu_user_id']) || isset($_SESSION['admin_user_id'])) {?>



             <div class="col-lg-3 col-xs-6">



             <!--  small box -->



              <div class="small-box bg-green">
                <div class="inner">
                <?php 
                $count=mysqli_query($con,"select count(oh_id) as id from order_history_master");
                $rc=mysqli_fetch_array($count);
                ?>
                  <h3><?php echo $rc['id'];?></h3>
                  <p>Orders</p>
                </div>
                <div class="icon">



                  <i class="ion ion-android-contacts"></i>



                </div>



                <a href="<?php echo $adminurl;?>orders/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>



              </div>



            </div><!-- ./col -->

            <?php 

            }?>

            <?php if(isset($_SESSION['admin_user_id']))

            {?>

            <div class="row">



            <div class="col-lg-3 col-xs-6">



            <!--  small box -->



              <div class="small-box bg-aqua">



                <div class="inner">



                  <h3><?php echo $fab_count;?></h3>



                  <p>Fabrics</p>



                </div>



                <div class="icon">



                  <i class="ion ion-scissors"></i>



                </div>



                <a href="<?php echo $adminurl;?>fabrics/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>



              </div>



            </div>



          </div><!-- /.row -->

<?php }?>


 <div class="row">
      <div class="col-md-12">
              <!-- AREA CHART -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Sales Tracker</h3>
                  <div class="box-tools pull-right" >
                    <select class="input-sm form-control sales_class">
                        <option value="1">Last 7 Days</option>
                        <option value="2">Monthly</option>
                        <option value="3">Yearly</option>

                        <!--<option value="3">Yearly</option>-->
                    </select>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height: 330px; width: 510px;" width="510" height="230"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div>

              <!-- DONUT CHART -->
             

            </div>
   </div>




          <!-- Main row -->



          <!-- /.row (main row) -->







        </section>



</div>



<?php require('includes/footer.php');?>



</div>



</body>



<?php



}



else



{

    header("Location:{$adminurl}");



}







?>