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
      $id=$_GET['type'];
      $room=$site->get_showrooms($id);
      $id=$room[0]['id'];
      $name=$room[0]['name'];$image=$room[0]['image'];$email=$room[0]['email'];
      $address=$room[0]['address'];
      if($room[0]['monday']!="Closed"){
          $monday=explode("-",$room[0]['monday']);}else{$monday=$room[0]['monday'];}
      if($room[0]['tuesday']!="Closed"){
      $tuesday=explode("-",$room[0]['tuesday']);}else{$tuesday=$room[0]['tuesday'];}
      if($room[0]['wednesday']!="Closed"){
      $wednesday=explode("-",$room[0]['wednesday']);}else{$wednesday=$room[0]['wednesday'];}
      if($room[0]['thursday']!="Closed"){
      $thursday=explode("-",$room[0]['thursday']);}else{$thursday=$room[0]['thursday'];}
      if($room[0]['friday']!="Closed"){
      $friday=explode("-",$room[0]['friday']);}else{$friday=$room[0]['friday'];}
      if($room[0]['saturday']!="Closed"){
      $saturday=explode("-",$room[0]['saturday']);}else{$saturday=$room[0]['saturday'];}
      if($room[0]['sunday']!="Closed"){
      $sunday=explode("-",$room[0]['sunday']);}else{$sunday=$room[0]['sunday'];}
      $button="Update";
      $tit="Edit";
      $action="update";
    }
    else
    {
      $id="";
      $monday[0]="";$monday[1]="";$tuesday[0]="";$tuesday[1]="";$wednesday[0]="";$wednesday[1]="";
      $thursday[0]="";$thursday[1]="";$friday[0]="";$friday[1]="";$saturday[0]="";$saturday[1]="";
      $sunday[0]="";$sunday[1]="";$address="";$image="";$email="";
      $name="";$button="Save";$action="save";$id="";$tit="Add";
    }
?>
<body class="skin-black sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
                  <section class="content-header">
                      <h1>
                        Showroom <?php echo $tit;?> Form
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Showroom Form</li>
                      </ol>
                </section>
                <section class="content">
                  <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                      <!-- general form elements -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form id="showroom-form" class="showroom" method="post" action="" autocomplete="off">
                        <input type="hidden" name="type" value="showroom">
                        <input type="hidden" value="<?php echo $action;?>" name="action">
                        <input type="hidden" value="<?php echo $image;?>" name="old_image">
                        <input type="hidden" value="<?php echo $id;?>" name="id">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Showroom Name</label>
                              <input type="text" class="form-control" name="title" value="<?php echo $name;?>" placeholder="Enter Showroom Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Showroom Email-ID</label>
                              <input type="text" class="form-control" name="email" value="<?php echo $email;?>" placeholder="Enter Showroom Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Showroom Image</label>
                              <input type="file" class="form-control" name="userfile">
                              <span class="help-block">The Image size must be 400px Width and 400px Height.
                            </div>
                            <?php if($image!=''){?>
                            <div class="col-md-12">
                              <img src="<?php echo $homeurl.$image;?>" style="height:100px;width:100px;">
                            </div>
                            <?php }?>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Address</label>
                              <textarea class="form-control description" rows="10" name="address"><?php echo $address;?></textarea>
                            </div>
                           <div class="form-group">
                              <label class="col-md-12" for="exampleInputEmail1">Monday Timings</label>
                              <div class="col-md-12">
                              <select class="form-control sel_option" name="mon_sel" data-day="mon">
                                  <option <?php if($monday!="Closed"){?>selected <?php }?> value="0">Open</option>
                                  <option <?php if($monday=="Closed"){?>selected <?php }?> value="1">Closed</option>
                              </select><br>
                              </div>
                              <div class="mon_div">
                                <div class="col-md-4">
                                 <input type="text" class="form-control col-md-2 time-example" name="monday_start" 
                                 value="<?php echo trim($monday[0]);?>" placeholder="Enter Start Timings">
                                </div>
                                <div class="form-group col-md-4">
                                 <input type="text" class="form-control col-md-2 time-example" name="monday_close" 
                                 value="<?php echo trim($monday[1]);?>" placeholder="Enter Close Timings">
                                </div>
                              </div>
                            </div>
                                 <div class="form-group">
                              <label class="col-md-12" for="exampleInputEmail1">Tuesday Timings</label>
                              <div class="col-md-12">
                              <select class="form-control sel_option" name="tue_sel" data-day="tue">
                                 <option <?php if($tuesday!="Closed"){?>selected <?php }?> value="0">Open</option>
                                  <option <?php if($tuesday=="Closed"){?>selected <?php }?> value="1">Closed</option>
                              </select><br>
                              </div>
                              <div class="tue_div">
                                <div class="col-md-4">
                                 <input type="text" class="form-control col-md-2 time-example" name="tuesday_start" 
                                 value="<?php echo trim($tuesday[0]);?>" placeholder="Enter Start Timings">
                                </div>
                                <div class="form-group col-md-4">
                                 <input type="text" class="form-control col-md-2 time-example" name="tuesday_close" value="<?php echo trim($tuesday[1]);?>" placeholder="Enter Close Timings">
                                </div>
                              </div>
                            </div>
                                <div class="form-group">
                                <label class="col-md-12" for="exampleInputEmail1">Wednesday Timings</label>
                                <div class="col-md-12">
                                  <select class="form-control sel_option" name="wed_sel" data-day="wed">
                                     <option <?php if($wednesday!="Closed"){?>selected <?php }?> value="0">Open</option>
                                  <option <?php if($wednesday=="Closed"){?>selected <?php }?> value="1">Closed</option>
                                  </select><br>
                                  </div>
                                  <div class="wed_div">
                                    <div class="col-md-4">
                                     <input type="text" class="form-control col-md-2 time-example" name="wednesday_start" value="<?php echo trim($wednesday[0]);?>" placeholder="Enter Start Timings">
                                    </div>
                                    <div class="form-group col-md-4">
                                     <input type="text" class="form-control col-md-2 time-example" name="wednesday_close" value="<?php echo trim($wednesday[1]);?>" placeholder="Enter Close Timings">
                                    </div>
                                  </div>
                              </div>
                                <div class="form-group">
                                <label class="col-md-12" for="exampleInputEmail1">Thursday Timings</label>
                                <div class="col-md-12">
                                  <select class="form-control sel_option" name="thu_sel" data-day="thu">
                                      <option <?php if($thursday!="Closed"){?>selected <?php }?> value="0">Open</option>
                                  <option <?php if($thursday=="Closed"){?>selected <?php }?> value="1">Closed</option>
                                  </select><br>
                                  </div>
                                  <div class="thu_div">
                                    <div class="col-md-4">
                                     <input type="text" class="form-control col-md-2 time-example" name="thursday_start" value="<?php echo trim($thursday[0]);?>" placeholder="Enter Start Timings">
                                    </div>
                                    <div class="form-group col-md-4">
                                     <input type="text" class="form-control col-md-2 time-example" name="thursday_close" value="<?php echo trim($thursday[1]);?>" placeholder="Enter Close Timings">
                                    </div>
                                  </div>
                              </div>
                                <div class="form-group">
                                <label class="col-md-12" for="exampleInputEmail1">Friday Timings</label>
                                <div class="col-md-12">
                                  <select class="form-control sel_option" name="fri_sel" data-day="fri">
                                      <option <?php if($friday!="Closed"){?>selected <?php }?> value="0">Open</option>
                                  <option <?php if($friday=="Closed"){?>selected <?php }?> value="1">Closed</option>
                                  </select><br>
                                  </div>
                                  <div class="fri_div">
                                    <div class="col-md-4">
                                     <input type="text" class="form-control col-md-2 time-example" name="friday_start" value="<?php echo trim($friday[0]);?>" placeholder="Enter Start Timings">
                                    </div>
                                    <div class="form-group col-md-4">
                                     <input type="text" class="form-control col-md-2 time-example" name="friday_close" value="<?php echo trim($friday[1]);?>" placeholder="Enter Close Timings">
                                    </div>
                                  </div>
                              </div>
                                <div class="form-group">
                                <label class="col-md-12" for="exampleInputEmail1">Saturday Timings</label>
                                <div class="col-md-12">
                                  <select class="form-control sel_option" name="sat_sel" data-day="sat">
                                       <option <?php if($saturday!="Closed"){?>selected <?php }?> value="0">Open</option>
                                  <option <?php if($saturday=="Closed"){?>selected <?php }?> value="1">Closed</option>
                                  </select><br>
                                  </div>
                                  <div class="sat_div">
                                    <div class="col-md-4">
                                     <input type="text" class="form-control col-md-2 time-example" name="saturday_start" value="<?php echo trim($saturday[0]);?>" placeholder="Enter Start Timings">
                                    </div>
                                    <div class="form-group col-md-4">
                                     <input type="text" class="form-control col-md-2 time-example" name="saturday_close" value="<?php echo trim($saturday[1]);?>" placeholder="Enter Close Timings">
                                    </div>
                                  </div>
                              </div>
                               <div class="form-group">
                                <label class="col-md-12" for="exampleInputEmail1">Sunday Timings</label>
                                <div class="col-md-12">
                                  <select class="form-control sel_option" name="sun_sel" data-day="sun">
                                    <option <?php if($sunday!="Closed"){?>selected <?php }?> value="0">Open</option>
                                    <option <?php if($sunday=="Closed"){?>selected <?php }?> value="1">Closed</option>
                                  </select><br>
                                  </div>
                                  <div class="sun_div">
                                      <div class="col-md-4">
                                       <input type="text" class="form-control col-md-2 time-example" name="sunday_start" value="<?php echo trim($sunday[0]);?>" placeholder="Enter Start Timings">
                                      </div>
                                      <div class="form-group col-md-4">
                                       <input type="text" class="form-control col-md-2 time-example" name="sunday_close" value="<?php echo trim($sunday[1]);?>" placeholder="Enter Close Timings">
                                    </div>
                                  </div>
                            </div>
                          </div><!-- /.box-body -->
                          <div class="box-footer">
                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>
                            <input type="submit" name="variant_add" class="btn btn-primary" value="<?php echo $button;?>">
                          </div>
                        </form>
                      </div><!-- /.box -->
                    </div><!--/.col (left) -->
                    <div class="example-modal" id="modal1">
                      <div class="modal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>showrooms/";' aria-label="Close"><span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Showroom</h4>
                            </div>
                            <div class="modal-body popup-body">
                              <p>Showroom has been save successfully!!!</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>showrooms/";'>Close</button>
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