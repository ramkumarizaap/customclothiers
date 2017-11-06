<?php
if(isset($_SESSION['admin_user_id'])  || isset($_SESSION['emp_user_id']))
{
    require_once('includes/topbar.php');
    require_once('includes/sidebar.php');
    $site=new Site(); 
?>

<body class="skin-black sidebar-mini">

 <div class="wrapper">

  <div class="content-wrapper">

   <section class="content-header">

    <h1>User Add Form</h1>

      <ol class="breadcrumb">

        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">User Form</li>

      </ol>

   </section>

   <section class="content">

     

        <div class="box-body">

          <!--Form-->

          <div class="nav-tabs-custom">

                    <ul class="nav nav-tabs">

                      <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">General</a></li>

                    </ul>

            <div class="tab-content">

               <div class="tab-pane active" id="tab_1">

               <form action="<?php echo $adminurl;?>includes/action.php" method="post" id="new-customer" enctype="multipart/form-data" class="customer" >


    
                  <div class="row">

                      <div class="col-md-6">

                        <div class="form-group">

                         <label for="exampleInputEmail1">First Name</label>

                           <input type="text" class="form-control" name="firstname"

                                   placeholder="Enter Firstname" value="">

                        </div>

                        <div class="form-group">

                         <label for="exampleInputEmail1">Last Name</label>

                         <input type="text" class="form-control" name="lastname"

                                placeholder="Enter Lastname" value="">

                        </div>

                         <div class="form-group">

                         <label for="exampleInputEmail1">Mobile</label>

                         <input type="text" class="form-control" name="mobile"

                                placeholder="Enter Mobile">

                        </div>

                         <div class="form-group">

                         <label for="exampleInputEmail1">Email</label>

                         <input type="text" class="form-control check_mail" name="email"

                                placeholder="Enter Email">

                              <div class="check_mail_div">

                              </div>

                        </div>

                         <div class="form-group">

                         <label for="exampleInputEmail1">Password</label>

                         <input type="password" class="form-control" name="password"

                                placeholder="Enter Password">

                        </div>

                        <div class="form-group">

                          <label for="exampleInputEmail1">Address 1</label>

                            <input type="text" class="form-control" name="address1" placeholder="Enter Address 1">

                        </div>

                        <!--<div class="form-group">

                          <label for="exampleInputEmail1">Address 2</label>

                            <input type="text" class="form-control" name="address2" 

                            placeholder="Enter Address 2">

                       </div>-->

                       <div class="form-group">

                        <label for="exampleInputEmail1">City</label>

                         <input type="text" class="form-control" name="city" placeholder="Enter City">

                       </div>

                       <div class="form-group">

                         <label for="exampleInputEmail1">State</label>

                         <!--<input type="text" class="form-control" name="province" 

                          placeholder="Enter State">-->

                          <select class="chosen chosen-select-deselect form-control" id="state" data-placeholder=" "  tabindex="1" name="province">
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

                        <label for="exampleInputEmail1">Country</label>

                        <!--<input type="text" class="form-control" name="country" 

                          placeholder="Enter Country">-->

                          <select name="country" class="chosen chosen-select-deselect form-control" id="country" required data-placeholder=" " tabindex="1">

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

                       <div class="form-group">

                         <label for="exampleInputEmail1">Zipcode</label>

                         <input type="text" class="form-control" name="zipcode" 

                          placeholder="Enter Zipcode">

                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Photo 1 (Front)</label>
                             <?php 
                             if(isset($_GET['type']))
                             {
                              ?>
                              <br><img src="<?php echo $homeurl.$img1;?>" style="height:100px;width:100px"><br><br>
                              <?php 
                             }
                             ?>
                           <input type="file" class="form-control" name="photo1">
                           <input type="hidden" class="form-control" name="old_image_1" 
                           value="<?php echo $img1;?>">
                         </div>
                      
                      <div class="form-group">
                           <label for="exampleInputEmail1">Photo 2 (Back)</label>
                           <?php 
                             if(isset($_GET['type']))
                             {
                              ?>
                              <br><img src="<?php echo $homeurl.$img2;?>" style="height:100px;width:100px"><br><br>
                              <?php 
                             }
                             ?>
                           <input type="file" class="form-control" name="photo2">
                           <input type="hidden" class="form-control" name="old_image_2" 
                           value="<?php echo $img2;?>">
                         </div>
                      
                      <div class="form-group">
                           <label for="exampleInputEmail1">Photo 3 (Side)</label>
                           <?php 
                             if(isset($_GET['type']))
                             {
                              ?>
                              <br><img src="<?php echo $homeurl.$img3;?>" style="height:100px;width:100px"><br><br>
                              <?php 
                             }
                             ?>
                           <input type="file" class="form-control" name="photo3">
                           <input type="hidden" class="form-control" name="old_image_3" 
                           value="<?php echo $img3;?>">
                         </div>

                    </div>

                </div>

                 <div class="col-md-12">

                      <div class="box-footer">

                         <a href="javascript:void(0);" data-href="vendor-add" class="popup save" style="display:none;">asd</a>

                          <button type="submit" name="save_customer" class="save_btn btn btn-primary">Save</button>

                          <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo $adminurl;?>orders/';">Cancel</button>

                      </div>

                  </div>

                 </form>

            </div><!-- /.tab-pane -->

          

         

        </div><!-- /.tab-content -->

      </div>

  <!--End Form-->

                     <div class="example-modal" id="vendor-add">

                        <div class="modal">

                          <div class="modal-dialog">

                            <div class="modal-content">

                               <div class="modal-header">

                                  <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>

                                <h4 class="modal-title">User</h4>

                              </div>

                              <div class="modal-body">

                                <p>User has been saved successfully!!!</p>

                              </div>

                              <div class="modal-footer">

                                <button type="button" class="btn btn-default pull-right" onclick='window.location.href="";'>Close</button>

                              </div>

                            </div><!-- /.modal-content--> 

                          </div><!-- /.modal-dialog -->

                        </div><!-- /.modal -->

                      </div>  

                <!--Save Button-->

                

                  <!--End Save and Cancel Buttons-->

               </div>

           

        </section>

        </div>

    </div>

 </body>

<?php

}

else

{

   header("Location:{$adminurl}");

}
?>