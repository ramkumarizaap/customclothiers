<?php
if(isset($_SESSION['admin_user_id']) || isset($_SESSION['manu_user_id']) || isset($_SESSION['emp_user_id']))
{
    require_once('includes/topbar.php');
    require_once('includes/sidebar.php');
?>
<body class="skin-black sidebar-mini">
<div class="wrapper">
<div class="content-wrapper">
    <section class="content-header">
          <h1>
            Appointments
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Appointments</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-info">
                <div class="box-body no-pading">
                <form action="" id="apt-add" method="post">
                  <input type="hidden" name="apt_form" value="apt">
                <div class="col-md-12">
                 <label class="control-label"> Filter By </label>
                    <select class="form-control select_rooms" name="sr_id">
                      <option value="">--Select--</option>
                      <?php 
                      $rooms=$site->get_showrooms();
                      foreach ($rooms as $key => $value) {
                      ?>
                        <option value="<?php echo $rooms[$key]['id'];?>"><?php echo $rooms[$key]['name'];?></option>
                      <?php }?>
                    </select>
                    </div><br><br><br>
                    <div class="col-md-12 sr-email-div hide">
                      <?php
                      $semail=$site->get_showrooms();
                      foreach ($semail as $key => $value)
                      {
                        echo "<p class='sr_email_".$value['id']." hide'>".$value['email']."</p>";
                      }
                      ?>  
                    </div>
                   <div class="col-md-12">
                      <label class="control-label">Create Appointment</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" value="" placeholder="Enter Name of User">
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Date</label>
                        <input type="text" class="form-control date-example" name="date" value="" placeholder="Select Date">
                  </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Time</label>
                        <select class="form-control " id="app_timings" name="timings" style="margin:0px;">
                          <option value="">--Select Date First--</option>
                        </select>
                    </div>
                  <input type="hidden" name="comments">
                  <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" value="" placeholder="Enter Email of User">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" value="" placeholder="Enter Address of User">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" name="phone" value="" placeholder="Enter Phone of User">
                   </div>
                 
                   <input type="button" value="Create" class="create-apt btn btn-primary pull-right">
                   </form>
                </div>
              </div>
            </div>
            <div class="col-md-9 pull-right">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar" class="calendar2 fc fc-ltr fc-unthemed">
                        </div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
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