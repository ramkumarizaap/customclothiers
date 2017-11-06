<?php 
//require('../common.php');
require('../includes/action/config.php');
if(isset($_SESSION['admin_user_id']))
{
    header("Location:{$adminurl}dashboard/");
}
else
{
?>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
           <a href="<?php echo $homeurl;?>cp/"><b><img src="<?php echo $homeurl;?>assets/images/logo1.jpg"></b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to manage your store</p>
        <?php if(isset($_SESSION['log_fail'])){?>
        <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-ban"></i> <?php echo $_SESSION['log_fail'];?></h5>
                    
                  </div>
        <?php unset($_SESSION['log_fail']);}?>
        <form action="<?php echo $adminurl;?>includes/action.php" method="post" class="admin-login">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control"  name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <!--<div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4 pull-right">
              <button type="submit" class="btn btn-primary pull-right" name="admin_login" style="padding:10px;">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
        <div>
        </div>
        
       <!-- <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>-->
      </div><!-- /.login-box-body -->
      <div class="clearfix"></div><br />
      <div class="col-md-12">
            <p style="text-align: center;">&copy; Copyright <?php echo date('Y');?> Custom Clothiers. All Rights Reserved.</p>
        </div>
    </div><!-- /.login-box -->
<?php } ?>
  <?php require('includes/scripts.php');?>
  