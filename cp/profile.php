<?php

if(isset($_SESSION['admin_user_id']) || isset($_SESSION['emp_user_id']) || isset($_SESSION['manu_user_id']))

{

    require_once('includes/topbar.php');

    require_once('includes/sidebar.php');

//    require_once('../inlcudes/action/functions.php');

    $site=new Site();
    if(isset($_SESSION['admin_user_id']))
    {
      $uid=$_SESSION['admin_user_id'];
      $utype="Site Admin";
    }
    else if(isset($_SESSION['emp_user_id']))
    {
      $uid=$_SESSION['emp_user_id'];
      $utype="Employee Admin";
    }
    else
    {
      $uid=$_SESSION['manu_user_id'];
      $utype="Vendor Admin";
    }
    $user=$site->get_user($uid);

?>

<body class="skin-black sidebar-mini">

<div class="wrapper">

<div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

          <h1>

            User Profile

          </h1>

          <ol class="breadcrumb">

            <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">User profile</li>

          </ol>

        </section>



        <!-- Main content -->

        <section class="content">



          <div class="row">

            <div class="col-md-3">



              <!-- Profile Image -->

              <div class="box box-primary">

                <div class="box-body box-profile">

                  <img class="profile-user-img img-responsive img-circle" src="<?php echo $homeurl.$user[0]['photo'];?>" alt="User profile picture">

                  <h3 class="profile-username text-center"><?php echo $user[0]['firstname'];?></h3>

                  <p class="text-muted text-center"><?php echo $utype;?></p>



                  <ul class="list-group list-group-unbordered">

                    <li class="list-group-item">

                      <b>Email</b> <a class="pull-right"><?php echo $user[0]['email'];?></a>

                    </li>

                    <li class="list-group-item">

                      <b>Phone</b> <a class="pull-right"><?php echo $user[0]['mobile'];?></a>

                    </li>

                    <!--<li class="list-group-item">

                      <b></b> <a class="pull-right">13,287</a>

                    </li>-->    

                  </ul>



                <!--  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->

                </div><!-- /.box-body -->

              </div><!-- /.box -->



              <!-- About Me Box -->

            </div><!-- /.col -->

            <?php if(isset($_SESSION['settings_save'])){?>

            <div class="col-md-5">

              <div class="box box-success box-solid">

                <div class="box-header with-border">

                  <h3 class="box-title">Success</h3>

                  <div class="box-tools pull-right">

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                  </div><!-- /.box-tools -->

                </div><!-- /.box-header -->

                <div class="box-body">

                  <?php echo $_SESSION['settings_save'];?>

                </div><!-- /.box-body -->

              </div><!-- /.box -->

            </div>

            <?php unset($_SESSION['settings_save']);}?>

               <?php if(isset($_SESSION['pass_wrong'])){?>

            <div class="col-md-5">

              <div class="box box-danger box-solid">

                <div class="box-header with-border">

                  <h3 class="box-title">Password Wrong</h3>

                  <div class="box-tools pull-right">

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                  </div><!-- /.box-tools -->

                </div><!-- /.box-header -->

                <div class="box-body">

                  <?php echo $_SESSION['pass_wrong'];?>

                </div><!-- /.box-body -->

              </div><!-- /.box -->

            </div>

            <?php unset($_SESSION['pass_wrong']);}?>

            <div class="col-md-9">

              <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">

                  <li class="active"><a href="#photo" data-toggle="tab">Photo</a></li>

                  <li><a href="#settings" data-toggle="tab">Profile Settings</a></li>

                  <li><a href="#password" data-toggle="tab">Change Password</a></li>

                </ul>

                <div class="tab-content">

                  <div class="active tab-pane" id="photo">

                    <form class="admin-photo" method="post" enctype="multipart/form-data"
                         action="<?php echo $adminurl;?>includes/action.php">

                    <input type="hidden" name="user_id" value="<?php echo $user[0]['id'];?>">
                    <div class="row form-horizontal">
                      <div class="form-group">

                        <label for="inputName" class="col-sm-2 control-label">Profile Photo</label>

                        <div class="col-sm-10">

                            <img src="<?php echo $homeurl.$user[0]['photo'];?>" height="150" width="150" style="border-radius: 100px;border:3px solid #bababa;">    

                        </div>

                      </div>

                      <div class="form-group">

                        <label for="inputEmail" class="col-sm-2 control-label">Upload New Photo</label>

                        <div class="col-sm-10">

                          <input type="file" class="form-control" name="userfile">

                          <input type="hidden" class="form-control" value="<?php echo $user[0]['photo'];?>" name="old_img">

                        </div>

                      </div>                

                      <div class="form-group">

                        <div class="col-sm-offset-2 col-sm-10">

                          <input type="submit" class="btn btn-danger" name="admin_photo" 
                            value="Save Photo">

                        </div>

                      </div>
                      </div>
                    </form>

                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">

                    <form class="admin-profile" method="post" action="<?php echo $adminurl;?>includes/action.php">
                    <div class="row form-horizontal">
                    <input type="hidden" name="user_id" value="<?php echo $user[0]['id'];?>">

                      <div class="form-group">

                        <label for="inputName" class="col-sm-2 control-label">Firstname</label>

                        <div class="col-sm-10">

                          <input type="text" class="form-control" id="inputName" name="firstname" placeholder="Name" value="<?php echo $user[0]['firstname'];?>">

                        </div>

                      </div>

                      <div class="form-group">

                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">

                          <input type="email"  class="form-control" name="email" id="inputEmail" placeholder="Email" value="<?php echo $user[0]['email'];?>">

                        </div>

                      </div>

                      <div class="form-group">

                        <label for="inputName" class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-10">

                          <input type="text" class="form-control" name="mobile" id="inputName" placeholder="Phone" value="<?php echo $user[0]['mobile'];?>">

                        </div>

                      </div>

                      

                      <div class="form-group">

                        <div class="col-sm-offset-2 col-sm-10">

                          <button type="submit" class="btn btn-danger" name="admin_profile">Save Profile</button>

                        </div>

                      </div>
                      </div>
                    </form>

                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="password">

                    <form class="admin-password" method="post" action="<?php echo $adminurl;?>includes/action.php">

                    <input type="hidden" name="user_id" value="<?php echo $user[0]['id'];?>">
                    <div class="form-horizontal">
                      <div class="form-group">

                        <label for="inputName" class="col-sm-3 control-label">Old Password</label>

                        <div class="col-sm-9">

                          <input type="password" class="form-control" id="inputName" name="o_password" placeholder="Enter Old Password">

                        </div>

                      </div>

                      <div class="form-group">

                        <label for="inputEmail" class="col-sm-3 control-label">New Password</label>

                        <div class="col-sm-9">

                          <input type="password"  class="form-control" name="n_password" id="inputEmail" placeholder="Enter New Password">

                        </div>

                      </div>

                      <div class="form-group">

                        <label for="inputName" class="col-sm-3 control-label">Confirm Password</label>

                        <div class="col-sm-9">

                          <input type="password" class="form-control" name="c_password" id="inputName" placeholder="Enter Confirm Password">

                        </div>

                      </div>

                      

                      <div class="form-group">

                        <div class="col-sm-offset-3 col-sm-12">

                            <button type="submit" class="btn btn-danger" name="admin_password">Save Password</button>
                        </div>

                      </div>
                      </div>
                    </form>

                  </div>

                  

                </div><!-- /.tab-content -->

              </div><!-- /.nav-tabs-custom -->

            </div><!-- /.col -->

          </div><!-- /.row -->



        </section><!-- /.content -->

        

      </div>

       <?php require('includes/footer.php');?>



      </div>

      

</body>

<?php

}

else
{
    header("Location:{$adminurl}/logout/");

}
?>