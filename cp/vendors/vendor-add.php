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

      if(isset($_GET['type']))

	    {

	     $id=$_GET['type'];

	      $vd=$site->get_user_role($id,'3');

	      $v_name=$vd[0]['name'];$v_id=$vd[0]['id'];

	      $address1=$vd[0]['address1'];$address2=$vd[0]['address2'];

	      $city=$vd[0]['city'];$state=$vd[0]['state'];$country=$vd[0]['country'];

	      $zipcode=$vd[0]['zipcode'];$email=$vd[0]['email'];$mobile=$vd[0]['mobile'];

	      $username=$vd[0]['username'];$password=$vd[0]['password'];

	      $action="role_update";$tit="Edit";

	      $button="Update Vendor";

	    }

	    else

	    {

	      $v_id="";$v_name="";$abbrevation="";$address1="";$address2="";$city="";$state="";$country="";$zipcode="";

	      $username="";$password="";$email="";$mobile="";

	      $action="role_add";$tit="Add";

	      $cat_name="";$button="Save Vendor";

	    }

?>

<body class="skin-black sidebar-mini">

    <div class="wrapper">

        <div class="content-wrapper">

                  <section class="content-header">

                      <h1>

                        <?php echo $tit;?> Vendor

                      </h1>

                      <?php //echo "<pre>";print_r($pro);?>

                      <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">Vendor Form</li>

                      </ol>

                </section>

                <section class="content">

		          		<form action="" id="emp-form" method="post" enctype="mulpipart/form-data" 

		          					class="vendor" >

		        	    		<input type="hidden" name="vendor_id" value="<?php echo $v_id;?>">

                        <input type="hidden" name="type" value="user_role">

                        <input type="hidden" name="usertype" value="3">

                        <input type="hidden" name="action" value="<?php echo $action;?>">

                        <div class="box box-primary">

	                        <div class="box-header with-border">          

	                          <h3 class="box-title">General</h3>   

	                        </div>        

	                        <!-- form start -->

	                       

	                        

	                          <div class="box-body">

	                            <div class="form-group">

			                              <label for="exampleInputEmail1">Vendor Name</label>

			                              <input type="text" class="form-control" name="vendor_name" placeholder="Enter Vendor Name"

			                                value="<?php echo $v_name;?>">

		                            </div>

	                               <div class="form-group">

			                              <label for="exampleInputEmail1">Address 1</label>

			                              <input type="text" class="form-control" name="address1" placeholder="Enter Address 1"

			                                value="<?php echo $address1;?>">

		                            </div>

		                             <!--<div class="form-group">

			                              <label for="exampleInputEmail1">Address 2</label>

			                              <input type="text" class="form-control" name="address2" placeholder="Enter Address 2"

			                                value="<?php echo $address2;?>">

		                            </div>-->

		                             <div class="form-group">

			                              <label for="exampleInputEmail1">City</label>

			                              <input type="text" class="form-control" name="city" placeholder="Enter City"

			                                value="<?php echo $city;?>">

		                            </div>

		                             <div class="form-group">

			                              <label for="exampleInputEmail1">State</label>

			                              <select class="chosen chosen-select-deselect form-control" id="state" data-placeholder=" "  tabindex="1" name="state">

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

			                              <!--<input type="text" class="form-control" name="country" placeholder="Enter Country"

			                                value="<?php echo $country;?>">-->

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

			                              <input type="text" class="form-control" name="zipcode" placeholder="Enter Zipcode"

			                                value="<?php echo $zipcode;?>">

		                            </div>                   

	                          </div><!-- /.box-body -->

                      	</div>

	                      <div class="box box-info  col-md-12">

	                            <div class="box-header with-border">          

	                              <h3 class="box-title">Primary Contact</h3>   

	                            </div> 

	                            <div class="box-body">

	                            	<div class="form-group">

				                              <label for="exampleInputEmail1">Email</label>

				                             <input <?php if(isset($_GET['type'])){ ?> disabled <?php }?>

				                             type="text" class="form-control check_mail" name="primary_email" placeholder="Enter Email" value="<?php echo $email;?>">

	 																	 <div class="has-error check_mail_div">

				                             </div>

			                          </div>

			                          <div class="form-group">

				                              <label for="exampleInputEmail1">Username</label>

				                             <input type="text" class="form-control" name="username" placeholder="Enter Username"

				                                value="<?php echo $username?>">

			                          </div>

			                          <div class="form-group">

				                              <label for="exampleInputEmail1">Password</label>

				                             <input type="password" class="form-control" name="password" placeholder="Enter Password"

					                                value="<?php echo $password;?>">

			                          </div>

			                          <div class="form-group">

				                              <label for="exampleInputEmail1">Phone</label>

				                             <input type="text" class="form-control" name="primary_phone" placeholder="Enter Phone Number"

				                                value="<?php echo $mobile;?>">

			                          </div>                                       

	                            </div>

	                      </div>

	                      <div class="row">

			                	  <div class="col-md-12">

	                    			<div class="box-footer">

	                          	<a href="javascript:void(0);" data-href="vendor-add" class="popup save" style="display:none;">asd</a>

	                          	<button type="submit" class="save_btn btn btn-primary"><?php echo $button;?></button>

	                            <button type="button" class="btn btn-info" onClick="window.location.href='<?php echo $adminurl;?>vendors/';">Cancel</button>

	                    			</div>

	                				</div>

		              			</div>

	                			<!--End Form-->

	                		 	<div class="example-modal" id="vendor-add">

		                      <div class="modal">

		                        <div class="modal-dialog">

		                          <div class="modal-content">

		                            <div class="modal-header">

		                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>vendors/";' aria-label="Close"><span aria-hidden="true">×</span></button>

		                              <h4 class="modal-title">Vendor</h4>

		                            </div>

		                            <div class="modal-body popup-body">

		                              <p>Vendor Details has been successfully saved!!!</p>

		                            </div>

		                            <div class="modal-footer">

		                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>vendors/";'>Close</button>

		                            </div>

		                          </div><!-- /.modal-content--> 

		                        </div><!-- /.modal-dialog -->

		                      </div><!-- /.modal -->

		                    </div>  

                			<!--Save Button-->

	                		<!--End Save and Cancel Buttons-->

		            </form>

		          </section>

        </div>

    </div>

 </body>

<?php

}

?>