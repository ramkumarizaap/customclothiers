<?php
if(!isset($_SESSION['admin_user_id']))
{
    header("Location:{$adminurl}");
}
else
{
    require_once('includes/topbar.php');
    require_once('includes/sidebar.php');
    $site=new Site();
    //$user_count=$site->get_user_count();
    if(isset($_GET['type']))
    {
      $id=mysqli_real_escape_string($con,trim($_GET['type']));
      $dis=$site->get_discounts($id);
      if($dis)
      {
        $name=$dis[0]['code_name'];$start_date=date("Y-m-d H:i:s",strtotime($dis[0]['start_date']));
        $end_date=date("Y-m-d H:i:s",strtotime($dis[0]['end_date']));
        $order_type=$dis[0]['discount_type'];$order_amount=$dis[0]['discount_amount'];
        $dis_per=$dis[0]['discount_percentage'];$orders_on=$dis[0]['orders_on'];
        $over_amount=$dis[0]['over_amount'];$p_name=explode(",",$dis[0]['product_name']);
        $button="Update Discount";
        $action="update";
    }
    else
    {
    ?>
    <body class="skin-black sidebar-mini">
      <div class="wrapper">
          <div class="content-wrapper">
                  <section class="content-header">
                    Sorry!! No Records Found.
                  </section>
            </div>
         </div>
      </body>
       <?php
      exit;
    }
    }
    else
    {
      $name="";$button="Save Discount";$action="save";$id="";
      $start_date="";$end_date="";$order_type="";$order_amount="";$dis_per="";$over_amount="";$orders_on="";$p_name="";
    }
?>
<body class="skin-black sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
                  <section class="content-header">
                      <h1>
                        Discounts Add Form
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Discounts Form</li>
                      </ol>
                </section>
                <section class="content">
                  <div class="dg" style="display:none;">
                  asdkj
                  </div>
                  <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form class="dicounts" id="discount-form" method="post" action="<?php echo $adminurl;?>ajax/form-post.php" autocomplete="off">
                        <input type="hidden" name="type" value="discounts">
                        <input type="hidden" value="<?php echo $action;?>" name="action">
                        <input type="hidden" value="<?php echo $id;?>" name="id">
                          <div class="box-body">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Code Name</label>
                              <input type="text" class="form-control" name="code_name" value="<?php echo $name;?>" placeholder="Enter Code Name">
                              <span class="help-block">e.g. CODE100</span>
                            </div>
                            <div class="box-header with-border">
                              <h3 class="box-title">Apply Discounts in</h3>
                            </div>
                               <div class="form-group">
                                <label for="exampleInputEmail1">Discount Type</label>
                                  <select class="form-control dis_type" name="discount_type">
                                    <option value="">--Select--</option>
                                    <option <?php if($order_type=="$"){?> selected <?php }?>
                                       data-class="rupees" value="$">$</option>
                                    <option <?php if($order_type=="Discount"){?> selected <?php }?>
                                      data-class="discount" value="Discount">Discount</option>
                                    <option <?php if($order_type=="Free Shipping"){?> selected <?php }?>
                                      value="Free Shipping">Free Shipping</option>
                                  </select>
                              </div>
                              <div class="">
                              <?php 
                              if($order_type=="Discount"){$class1="";}else{$class1="hide";}
                              if($order_type=="$"){$class="";}else{$class="hide";}
                              ?>
                               <?php if($order_type=="$"){?>
                                <div class="form-group onchange-ip rupees">
                                  <label for="exampleInputEmail1">Amount</label>
                                  <input type="number" class="form-control" name="discount_amount" value="<?php echo $order_amount;?>" placeholder="Enter $">
                                </div>                      
                                <?php }else{?>       
                                 <div class="form-group onchange-ip rupees" style="display: none;">
                                  <label for="exampleInputEmail1">Amount</label>
                                  <input type="number" class="form-control" name="discount_amount" value="<?php echo $order_amount;?>" placeholder="Enter $">
                                </div>                      
                                <?php }?>
                                 <?php if($order_type=="Discount"){?>
                                <div class="form-group onchange-ip discount ">
                                  <label for="exampleInputEmail1">Percentage</label>
                                  <input type="number" class="form-control" name="discount_percentage" value="<?php echo $dis_per;?>" placeholder="Enter %">
                                </div>
                                <?php }else{?>
                                <div class="form-group onchange-ip discount " style="display: none;">
                                  <label for="exampleInputEmail1">Percentage</label>
                                  <input type="number" class="form-control" name="discount_percentage" value="<?php echo $dis_per;?>" placeholder="Enter %">
                                </div>
                                <?php }?>
                                <?php 
                              if($orders_on=="All"){$oclass1="";}else{$oclass1="hide";}
                              if($orders_on=="Over"){$oclass2="";}else{$oclass2="hide";}
                              if($orders_on=="Specific"){$oclass3="";}else{$oclass3="hide";}
                              ?>
                                <?php 
                               if($order_type!="Free Shipping" && ($order_type=="$" || $order_type=="Discount") )
                               {
                               ?>
                                <div class="form-group onchange-ip rupees discount">
                                  <label for="exampleInputEmail1">Orders on</label>
                                  <select class="form-control order_type" name="order_type">
                                    <option <?php if($orders_on=="All"){?> selected <?php }?>
                                      value="All">All Orders</option>
                                    <option <?php if($orders_on=="Over"){?> selected <?php }?>
                                      data-class="order-over" value="Over">Orders Over</option>
                                    <option <?php if($orders_on=="Specific"){?> selected <?php }?>
                                      data-class="specific-product" value="Specific">Specific Product</option>
                                  </select>
                                </div>
                               <?php }else{?>
                                <div class="form-group onchange-ip rupees discount" style="display: none;">
                                  <label for="exampleInputEmail1">Orders on</label>
                                  <select class="form-control order_type" name="order_type">
                                    <option <?php if($orders_on=="All"){?> selected <?php }?>
                                      value="All">All Orders</option>
                                    <option <?php if($orders_on=="Over"){?> selected <?php }?>
                                      data-class="order-over" value="Over">Orders Over</option>
                                    <option <?php if($orders_on=="Specific"){?> selected <?php }?>
                                      data-class="specific-product" value="Specific">Specific Product</option>
                                  </select>
                                </div>
                               <?php }?>
                              

                                <div class="form-group orderchange-ip <?php echo $oclass2;?>  order-over">
                                  <label for="exampleInputEmail1">Enter Amount</label>
                                  <input type="number" class="form-control" name="order_amount" value="<?php echo $over_amount;?>" placeholder="Enter Amount Over Orders">
                                 </div>
                                
                                
                                <div class="form-group  orderchange-ip <?php echo $oclass3;?> specific-product">
                                  <label for="exampleInputEmail1">Product</label>
                                    <select class="form-control select2 select2-hidden-accessible" name="order_products[]" multiple="" data-placeholder="Choose a Product" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                      <?php $pro=$site->get_all_products();
                                      foreach ($pro as $key => $value) {
                                      ?>
                                        <option <?php if(in_array($pro[$key]['id'],$p_name)){?> selected <?php }?>
                                          value="<?php echo $pro[$key]['id'];?>"><?php echo $pro[$key]['product_name'];?></option>
                                      <?php
                                      }?>
                                     </select>
                                </div>
                                
                              </div>
                           </div>
                            <div class="col-md-6">
                              <div class="box-header with-border">
                                <h3 class="box-title">Date Range</h3>
                              </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Start Date</label>
                              <input type="text" class="form-control date-time" name="start_date" placeholder="Enter Start Date" value="<?php echo $start_date;?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">End Date</label>
                              <input type="text" class="form-control date-time" name="end_date" value="<?php echo $end_date;?>" placeholder="Enter End Date">
                            </div>
                           </div>
                          </div><!-- /.box-body -->
                          <div class="box-footer">
                          <a href="javascript:void(0);" data-href="discount" class="popup save" style="display:none;">asd</a>
                            <input type="submit" name="variant_add" class="btn btn-primary" value="<?php echo $button;?>">
                          </div>
                        </form>
                      </div><!-- /.box -->
                    </div><!--/.col (left) -->
                    <div class="example-modal" id="discount">
                      <div class="modal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>discounts/";' aria-label="Close"><span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Discount</h4>
                            </div>
                            <div class="modal-body popup-body">
                              <p>Discount has been save successfully!!!</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>discounts/";'>Close</button>
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                    </div>  
                    <!-- right column -->
                    
                  </div>   <!-- /.row -->
        </section>
        </div>
    </div>
</body>
<?php }
?>