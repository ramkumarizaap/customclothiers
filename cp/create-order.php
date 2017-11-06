<?php

if(isset($_SESSION['admin_user_id']) || isset($_SESSION['emp_user_id']))

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

                      <h1>Create Order</h1>

                      <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">Create Order</li>

                      </ol>

                      <br><br>

                    <div class="hide alert cart_succ alert-warning alert-dismissable">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    <h4><i class="icon fa fa-check"></i> Success!</h4>

                    Product has been added to cart.

                  </div>
                  <?php if(isset($_SESSION['user_succ']))
                  {?>
                  <div class="alert alert-warning alert-dismissable">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    <h4><i class="icon fa fa-check"></i> Success!</h4>

                    User has been added to the system.

                  </div>
                  <?php unset($_SESSION['user_succ']);}?>

                </section><br />



             

                <br /><br />

                <div class="box">

                <div class="box-body">

                <div class="row">

                  <div class="col-md-12">

                    <div class="row">

                    <div class="col-md-8">

                    <div class="custom-checkbox">

                           <strong>Filter :&nbsp;</strong>  

                           <input type="checkbox" id="chk0" checked name="chk" value="all" class="p_type">

                           <label for="chk0">All</label>

                           <input type="checkbox" id="chk1" name="chk" value="suits" class="p_type">

                           <label for="chk1">Suits</label>

                           

                           <input type="checkbox" id="chk2" name="chk" value="shirts" class="p_type">

                           <label for="chk2">Shirts</label>

                           

                           <input type="checkbox" id="chk3" name="chk" value="blazers" class="p_type">

                           <label for="chk3">Blazers</label>

                           

                           <input type="checkbox" id="chk4" name="chk" value="trousers" class="p_type">

                           <label for="chk4">Trousers</label>

       

                    </div>              

                    </div>

                    <div class="col-md-2 pull-right">

                      <?php include_once("includes/basket.php");?>

                    </div>

                    </div>

                                    <br>                      



                    <!-- -->

                  </div><br><br><br>

                <?php 

                $pro=$site->get_all_products('','backend');

                foreach ($pro as $key => $value) {

                  $cat_name=str_replace(" ","-",strtolower($pro[$key]['sub_cat_name']));

                  ?>

                  <!--

                  <a href="<?php echo $adminurl;?>product/<?php echo $_GET['type'];?>/<?php echo $pro[$key]['id'];?>/">

                    <div class="col-md-2 <?php echo $cat_name;?> p_list" 

                      style="height:150px;border:1px solid #eee;text-align:center;margin-bottom:20px;margin-left:20px;">

                        <img src="<?php echo $homeurl.$pro[$key]['image'];?>" 

                        style="width:50%;height:70%;margin:0 auto;"><br>

                        <p><?php echo $pro[$key]['product_name'];?><br>

                        $<?php echo number_format($pro[$key]['price'],2);?></p>

                    </div>

                  </a>-->

                    <div class="col-lg-3 <?php echo $cat_name;?> p_list" style="margin-bottom:30px;">

                        <div class="cuadro_intro_hover " style="background-color:#cccccc;">

                        <p style="text-align:center;">

                          <img src="<?php echo $homeurl.$pro[$key]['image'];?>"   class="img-responsive" alt="">

                        </p>

                        <div class="caption">

                          <div class="blur"></div>

                          <div class="caption-text">

                            <h3 style="border-top:0px solid white; border-bottom:2px solid white; padding:20px;">

                                <?php echo $pro[$key]['product_name'];?><br>

                                <?php echo "$".number_format($pro[$key]['price'],2);?>

                            </h3>

                            <?php if($pro[$key]['sub_category']=="1" || $pro[$key]['sub_category']=="2" 

                            || $pro[$key]['sub_category']=="3"|| $pro[$key]['sub_category']=="4"){?>

                            <a class=" btn btn-danger btn-mini" href="<?php echo $adminurl."customize/style/".$_GET['type']."/".$pro[$key]['id']."/".$pro[$key]['category']."/".$pro[$key]['sub_category']."/";?>"><span class="fa fa-eye"> Customize</span></a><br><br>

                            <?php }?>

                            <a class=" btn btn-info add_cart" data-sid="<?php echo $pro[$key]['sub_category'];?>" data-pid="<?php echo $pro[$key]['id'];?>" data-user="<?php echo $_GET['type'];?>"

                               href="javascript:void(0);"><span class="fa fa-plus"> Add to Cart</span></a>

                          </div>

                        </div>

                      </div>

                    

                  </div>

                  <?php }?>

                </div>



                </div><!-- /.box-body -->

              </div>

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