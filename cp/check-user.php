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
                      <h1>User</h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">User</li>
                      </ol>
                </section><br />

             
                <br /><br />
                <div class="box">
                  <div class="box-header">
                    <h2>Select Customer Type</h2>
                  </div>
                <div class="box-body">
                <div class="row">
                <div class="col-md-6 margin-auto">
               
                  <div class="col-md-6 user-select-div">   
                   <a href="<?php echo $adminurl;?>new-customer/">
                    <h1><i class="fa fa-user-plus"></i></h1>
                    <h4>New Customer</h4>
                    </a>
                  </div>

             
                   <div class="col-md-6 pull-right user-select-div">   
                   <a href="<?php echo $adminurl;?>old-customer/">
                    <h1><i class="fa fa-users"></i></h1>
                    <h4>Existing Customer</h4>
                    </a>
                  </div>
                </a>
                </div>
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