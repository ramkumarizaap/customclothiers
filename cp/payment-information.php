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

    $pay=$site->get_payment_information();

    $paypal_id=$pay[0]['paypal_id'];

    $payment_mode=$pay[0]['payment_mode'];

    $cash_delivery=$pay[0]['cash_delivery'];

    $in_store=$pay[0]['in_store'];

    $shipping_cost=$pay[0]['shipping_cost'];

?>

<body class="skin-black sidebar-mini">

    <div class="wrapper">

        <div class="content-wrapper">

                  <section class="content-header">

                      <h1>

                      Payment Details</h1>

                      <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active"> Payment Details</li>

                      </ol>

                </section>

                <section class="content">

                  <div class="row">

                    <!-- left column -->

                    <div class="col-md-12">

                      <!-- general form elements -->

                      <div class="box box-primary">

                        <div class="box-header with-border">

                        </div><!-- /.box-header -->

                        <!-- form start -->

                        <form class="banner" method="post" action="" autocomplete="off" enctype="multipart/form-data">

                        <input type="hidden" name="type" value="payment">

                        <input type="hidden" value="<?php echo $action;?>" name="action">

                        <input type="hidden" value="<?php echo $id;?>" name="id">

                          <div class="box-body">

                           <div class="form-group">

                              <label for="exampleInputEmail1">Paypal ID</label>

                              <input type="text" class="form-control" name="paypal_id"

                                 value="<?php echo $paypal_id;?>" placeholder="Enter Paypal ID">

                            </div>

                            <div class="form-group">

                              <label for="exampleInputEmail1">Payment Mode</label>

                                <select class="form-control" name="payment_mode">

                                  <option <?php if($payment_mode=="0"){?> selected <?php }?> value="0">Test</option>

                                  <option <?php if($payment_mode=="1"){?> selected <?php }?> value="1">Live</option>

                                </select>

                            </div>

                            

                            <div class="form-group">

                              <label for="exampleInputEmail1">Cash On Delivery </label><br>

                              <input type="radio" name="cash_delivery" class="flat-red" value="0" 

                              <?php if($cash_delivery=="0"){?> checked <?php }?> >

                                Enable

                                <input type="radio" name="cash_delivery" class="flat-red" value="1" 

                                <?php if($cash_delivery=="1"){?> checked <?php }?>>

                                Disable

                            </div>

                             <div class="form-group">

                              <label for="exampleInputEmail1">In Store Credit </label><br>

                              <input type="radio" name="in_store" class="flat-red" value="0" 

                              <?php if($in_store=="0"){?> checked <?php }?> >

                                Enable

                                <input type="radio" name="in_store" class="flat-red" value="1" 

                                <?php if($in_store=="1"){?> checked <?php }?> >

                                Disable

                            </div>

                             <div class="form-group">

                              <label for="exampleInputEmail1">Shipping Cost</label><br>

                              <input type="radio" name="shipping_cost" class="flat-red" value="0"   <?php if($shipping_cost!="0"){?> checked <?php }?>>

                                Enable

                                <input type="radio" name="shipping_cost" class="flat-red" value="1"  <?php if($shipping_cost=="0"){?> checked <?php }?>>

                                Disable

                            </div>

                             <div class="form-group ship_price_div">

                              <label for="exampleInputEmail1">Shipping Price</label>

                              <div class="input-group col-md-2">

                               <span class="input-group-addon"><i class="fa fa-dollar"></i></span>

                                <input type="text" class="form-control " name="ship_price"

                                 value="<?php echo $shipping_cost;?>" placeholder="USD">

                              </div>

                            </div>

                            <h4><strong>Tax</strong></h4>

                             <div class="form-group col-md-2">

                              <label for="exampleInputEmail1">Select State</label>

                                <select class="form-control tax_state" name="tax_state">

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

                            <div class="tax_div1">

                              <div class="col-md-2">

                                <label>Percent</label>

                                <div class="input-group  col-md-12">

                                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                  <input type="text" class="form-control" placeholder="Percentage"

                                   name="tax_per" value="">

                                </div>

                                </div>

                                <div class="col-md-2">

                                <label>Status</label>

                                </div>

                            </div>

                          </div><!-- /.box-body -->

                          <div class="box-footer">

                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>

                            <input type="submit" name="banner_add" class="btn btn-primary" value="Save">

                          </div>

                        </form>

                      </div><!-- /.box -->

                    </div><!--/.col (left) -->

                    <div class="example-modal" id="modal1">

                      <div class="modal">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>payment-information/";' aria-label="Close"><span aria-hidden="true">×</span></button>

                              <h4 class="modal-title">Payment</h4>

                            </div>

                            <div class="modal-body popup-body">

                              <p>Payment Information has been successfully saved!!!</p>

                            </div>

                            <div class="modal-footer">

                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>payment-information/";'>Close</button>

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