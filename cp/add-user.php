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
      $user=$site->get_user($id);
      $fname=$user[0]['firstname'];$lname=$user[0]['lastname'];
      $userid=$user[0]['id'];
      $address1=$user[0]['address1'];$address2=$user[0]['address2'];
      $city=$user[0]['city'];$state=$user[0]['province'];$country=$user[0]['country'];
      $zipcode=$user[0]['zipcode'];$email=$user[0]['email'];$mobile=$user[0]['mobile'];
      $username=$user[0]['username'];$password=$user[0]['password'];
      $img1=$user[0]['img'];$img2=$user[0]['img2'];$img3=$user[0]['img3'];
      $action="update";$tit="Edit";
      $button="Update User";
   }
   else
   {
     $userid="";$fname="";$lname="";$abbrevation="";$address1="";$address2="";$city="";$state="";$country="";
     $zipcode="";$username="";$email="";$mobile="";$action="save";$tit="Add";
     $img1="";$img2="";$img3="";
	 $cat_name="";$button="Save User";
   }
?>
<body class="skin-black sidebar-mini">
 <div class="wrapper">
  <div class="content-wrapper">
   <section class="content-header">
    <h1>User <?php echo $tit;?> Form</h1>
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
		                  <?php if(isset($_GET['type'])){?>
                      <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Measurement Profile</a></li>
                      <?php }?>
		                </ul>
            <div class="tab-content">
               <div class="tab-pane active" id="tab_1">
               <form action="<?php echo $adminurl;?>ajax/form-post.php" id="customer-form" method="post" enctype="multipart/form-data" class="vendor" >
		  	    <input type="hidden" name="user_id" value="<?php echo $userid;?>">
		        <input type="hidden" name="type" value="users">
		        <input type="hidden" name="action" value="<?php echo $action;?>">
                	<div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                         <label for="exampleInputEmail1">First Name</label>
                           <input type="text" class="form-control" name="firstname"
		                               placeholder="Enter Firstname" value="<?php echo $fname;?>">
                        </div>
                        <div class="form-group">
                         <label for="exampleInputEmail1">Last Name</label>
                         <input type="text" class="form-control" name="lastname"
                                placeholder="Enter Lastname" value="<?php echo $lname;?>">
                        </div>
                         <?php //if(!isset($_GET['type'])){?>
                         <div class="form-group">
                         <label for="exampleInputEmail1">Mobile</label>
                         <input type="text" class="form-control" name="mobile" value="<?php echo $mobile;?>"
                                placeholder="Enter Mobile">
                        </div>
                         <div class="form-group">
                         <label for="exampleInputEmail1">Email</label>
                         <input type="text" class="form-control check_mail" name="email" value="<?php echo $email;?>"
                                placeholder="Enter Email">
                              <div class="check_mail_div">
                              </div>
                        </div>
                         <div class="form-group">
                         <label for="exampleInputEmail1">Password</label>
                         <input type="password" class="form-control" name="password"
                                placeholder="Enter Password" value="<?php echo $password;?>">
                        </div>
                        <?php //}?>
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
                      <div class="form-group">
                           <label for="exampleInputEmail1">Photo 1 (Front)</label>
                             <?php 
                             if($img1!='')
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
                             if($img2!='')
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
                             if($img3!='')
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
                          <button type="submit" class="save_btn btn btn-primary"><?php echo $button;?></button>
                          <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo $adminurl;?>users/';">Cancel</button>
	                    </div>
	                </div>
	               </form>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              <table class="table talbe-responsive table-striped" id="example1">
              		<thead>
              			<th>Name</th>
              			<th>Height</th>
              			<th>Weight</th>
              			<th>Actions</th>
              		</thead>
              		<tbody>
              		<?php 
              		$sql=mysqli_query($con,"select * from measurement_profile_master where mp_userid='".$_GET['type']."'");
              		while ($r=mysqli_fetch_array($sql))
              		{
              		?>
              			<tr>
              				<td><?php echo $r['mp_name'];?></td>
              				<td><?php echo $r['mp_height'];?></td>
              				<td><?php echo $r['mp_weight'];?></td>
              				<td>
              					<a href="javascript:void(0);" data-id="<?php echo $r['mp_id'];?>" 
              					data-href="user-add"class="popup btn-primary btn edit_mp">
              						<i class="fa fa-edit"></i>
              					</a>
              					<a href="javascript:void(0);" class="btn-danger btn">
              						<i class="fa fa-trash"></i>
              					</a>
              					
              				</td>
              			</tr>
              		<?php }?>
              		</tbody>
              </table>
          </div><!-- /.tab-pane -->
         
        </div><!-- /.tab-content -->
      </div>
	<!--End Form-->
                		 <div class="example-modal" id="vendor-add">
	                      <div class="modal">
	                        <div class="modal-dialog">
	                          <div class="modal-content">
                               <div class="modal-header">
                                  <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                              <h4 class="modal-title">User</h4>
	                            </div>
	                            <div class="modal-body">
	                              <p>User Details has been successfully saved!!!</p>
	                            </div>
	                            <div class="modal-footer">
	                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>users/";'>Close</button>
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


                 <div class="example-modal" id="user-add">
	                      <div class="modal">
	                        <div class="modal-dialog" style="width: 937px !important;">
	                          <div class="modal-content modal-lg">
	                          <form action="" method="post" id="mp-form">
                               <div class="modal-header">
                                  <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                              <h4 class="modal-title">Measurement</h4>
	                            </div>
	                            <div class="modal-body mp_body">
	                            
	                            </div>
	                            <div class="modal-footer">
	                              <button type="button" class="close modal-close btn btn-default pull-right" data-dismiss="modal" aria-label="Close">Close</button>
	                              <button type="button" class="btn btn-primary save_mp pull-right">Save</button>
	                            </div>
	                            </form>
	                          </div><!-- /.modal-content--> 
	                        </div><!-- /.modal-dialog -->
	                      </div><!-- /.modal -->
	                    </div>  


 </body>
<?php
}
?>