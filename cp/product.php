<?php
if(isset($_SESSION['admin_user_id']) || isset($_SESSION['emp_user_id']) || isset($_SESSION['manu_user_id']))
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
                </section><br />
               <a href="<?php echo $adminurl;?>create-order/" class="btn btn-primary pull-left" style="margin-left: 5px;"><i class="fa fa-arrow-left"></i> Back</a>
             
                <br /><br />
                <div class="box">
                <div class="box-body">
                <?php 
                $id=$_GET['type'];
                $pro=$site->get_product_by_id($id);
                ?>
                  <div class="col-md-2" 
                    style="height:150px;border:1px solid #eee;text-align:center;margin-bottom:20px;margin-left:20px;">
                      <img src="<?php echo $homeurl.$pro[0]['image'][0]['image'];?>" 
                      style="width:50%;height:70%;margin:0 auto;"><br>
                      <p><?php echo $pro[0]['product_name'];?><br>
                      $<?php echo number_format($pro[0]['price'],2);?></p>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input type="radio" name="customer" value="New" checked>New Customer&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="customer" value="Old">Existing Customer
                    </div>
                  </div><br><br>
                  <!-- NEw Customer-->
                <div class="stepwizard">
                  <div class="stepwizard-row setup-panel">
                      <div class="stepwizard-step new_customer">
                          <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                          <p>Personal Details</p>
                      </div>
                      <div class="stepwizard-step new_customer">
                          <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                          <p>Measurement</p>
                      </div>
                      <div class="stepwizard-step new_customer">
                          <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                          <p>Shipping</p>
                      </div>
                       <div class="stepwizard-step old_customer hide">
                          <a href="#step-4" type="button" class="btn btn-default btn-info" >1</a>
                          <p>User Details</p>
                      </div>
                       <div class="stepwizard-step old_customer hide">
                          <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                          <p>Measurement</p>
                      </div>
                       <div class="stepwizard-step old_customer hide">
                          <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                          <p>Shipping</p>
                      </div>
              </div>
              </div>

              <!--End New Customer-->
             

              <!--Old Customer-->
              <!--End Old Customer-->

              <!-- New Customer Form-->
              <div class="new_customer">
              <form role="form" class="create-order" id="order-form1" action="<?php echo $adminurl;?>includes/action.php" method="post">
              <input type="hidden" name="product" value="<?php echo $id;?>">
              <input type="hidden" name="price" value="<?php echo $pro[0]['price'];?>">
              <input type="hidden" name="subcatid" value="<?php echo $pro[0]['sub_category'];?>">
              <input type="hidden" name="catid" value="<?php echo $pro[0]['category'];?>">
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Personal Details</h3>
                            <div class="form-group">
                                <label class="control-label">First Name</label>
                                <input  maxlength="100" type="text" class="form-control" placeholder="Enter First Name" name="firstname"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Name</label>
                                <input maxlength="100" type="text" class="form-control" placeholder="Enter Last Name" name="lastname" />
                            </div>
                             <div class="form-group">
                                <label class="control-label">Email Address</label>
                                <input maxlength="100" type="text"  class="form-control" placeholder="Enter Email" name="email" />
                            </div>
                             <div class="form-group">
                                <label class="control-label">Phone</label>
                                <input maxlength="100" type="text"  class="form-control" placeholder="Enter Phone" name="phone" />
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Measurement</h3>
                            <div class="form-group col-md-6">
                                <label class="control-label">Height</label>
                                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Height" name="height" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label"> Weight</label>
                                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Weight" name="weight"  />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label"> Chest</label><br>
                                <input type="radio" name="param_chest" value="very_small">Very Small
                                <input type="radio" name="param_chest" value="small">Small
                                <input type="radio" name="param_chest" checked value="normal">Normal
                                <input type="radio" name="param_chest" value="big">Large
                                <input type="radio" name="param_chest" value="very_big">Very Large
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label"> Abdomen</label><br>
                                <input type="radio" name="param_abdomen" value="very_small">Very Flat
                                <input type="radio" name="param_abdomen" value="small">Flat
                                <input type="radio" name="param_abdomen" checked value="normal">Normal
                                <input type="radio" name="param_abdomen" value="big">Large
                                <input type="radio" name="param_abdomen" value="very_big">Very Large
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label"> Buttocks</label><br>
                                <input type="radio" name="param_buttocks" value="very_small">Very Flat
                                <input type="radio" name="param_buttocks" value="small">Flat
                                <input type="radio" name="param_buttocks" checked value="normal">Normal
                                <input type="radio" name="param_buttocks" value="big">Large
                                <input type="radio" name="param_buttocks" value="very_big">Very Large
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label"> Hips</label><br>
                                <input type="radio" name="param_hip" value="very_small">Very Narrow
                                <input type="radio" name="param_hip" value="small">Narrow
                                <input type="radio" name="param_hip" checked value="normal">Normal
                                <input type="radio" name="param_hip" value="big">Wide
                                <input type="radio" name="param_hip" value="very_big">Very Wide
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label">Coat/Trench Length</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="coat_length" />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Torso Length</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="body_length" />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Dress Length</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches"  name="dress_length"/>
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Sleeves Length</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches"  name="sleeves_length"/>
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Shoulder Width</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches"  name="shoulders"/>
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Neck</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="neck" />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Chest Around</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="chest" />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Stomach</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="stomach" />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Breast Point</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="breast_point" />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Waist Point</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="waist_point" />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Pants Length</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches"  name="pants_length"/>
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Skirt Length</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="skirt_length" />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Hips</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="hips" />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Waist</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches"  name="waist"/>
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Rise</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="crotch" />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Thigh</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches"  name="thigh"/>
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Bicep Around</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches"  name="biceps"/>
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Pant Waist</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches" name="pants_position"  />
                            </div>
                             <div class="form-group col-md-2">
                                <label class="control-label">Skirt Position</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Inches"  name="skirt_position"/>
                            </div>
                         
                            </div>


                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                        </div>
                    </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Shipping Address</h3>
                            <div class="form-group col-md-12">
                                <label class="control-label">Address 1</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Address 1" name="address1" />
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Address 2</label>
                                <input maxlength="200" type="text" class="form-control" placeholder="Address 2" name="address2" />
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">City</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="City" name="city"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Zipcode</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Zipcode" name="zipcode"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Province</label>
                                <input maxlength="200" type="text"  class="form-control" placeholder="Province" name="province"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Country</label>
                                <input maxlength="200" type="text" class="form-control" placeholder="Country" name="country" />
                            </div>
                            <input class="btn btn-success order1 btn-lg pull-right" name="create_order"
                               type="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <!--End New Customer Form-->


            <!--Old Customer Form-->
            <div class="old_customer hide">
                     <form role="form" class="create-order" action="<?php echo $adminurl;?>includes/action.php" method="post">
                        <input type="hidden" name="product" value="<?php echo $id;?>">
                        <input type="hidden" name="price" value="<?php echo $pro[0]['price'];?>">
                        <input type="hidden" name="subcatid" value="<?php echo $pro[0]['sub_category'];?>">
                        <input type="hidden" name="catid" value="<?php echo $pro[0]['category'];?>">
                          <div class="row setup-content step_4" id="step-4">
                              <div class="col-xs-12">
                                  <div class="col-md-12">
                                      <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                          <th></th>
                                            <th>Firstname</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                          </thead>
                                          <tbody><?php $users=$site->get_all_users();
                                          foreach ($users as $key => $value) {?>
                                            <tr>
                                              <td>
                                                <input type="radio" name="user_id" class="user_radio" value="<?php echo $users[$key]['id'];?>">
                                              </td>
                                              <td>
                                                <?php echo $users[$key]['firstname'];?>
                                              </td>
                                              <td><?php echo $users[$key]['email'];?></td>
                                              <td><?php echo $users[$key]['mobile'];?></td>
                                            </tr>
                                            <?php }?>
                                          </tbody>
                                      </table>
                                       <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                                  </div>
                              </div>
                          </div>

                           <div class="row setup-content" id="step-5">
                              <div class="col-xs-12">
                                  <div class="col-md-12">
                                      <table id="" class="example1 table table-bordered table-striped">
                                          <thead>
                                          <th></th>
                                            <th>Name</th>
                                            <th>Height</th>
                                            <th>Height</th>
                                          </thead>
                                          <tbody class="user_profile">
                                          </tbody>
                                      </table>
                                       <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                                  </div>
                              </div>
                          </div>
                          <div class="row setup-content" id="step-6">
                              <div class="col-xs-12">
                                  <div class="col-md-12 old_shipping">
                                  </div>
                                      <button class="btn btn-success btn-lg pull-right"
                                       name="create_order2" type="submit">Finish!</button>
                                </div>
                          </div>


                      </form>
              </div>

            <!--End Old Customer Form-->


                </div><!-- /.box-body -->
              </div>
        </div>
        <?php //require('includes/footer.php');?>
    </div>
</body>
<?php 
}
else
{
    header("Location:{$adminurl}");
}
?>