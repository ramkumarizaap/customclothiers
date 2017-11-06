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
                      <h1>Apointments List</h1>
                      <ol class="breadcrumb">
                        <li>
                          <a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a>
                        </li>
                        <li class="active">Appointments List</li>
                      </ol>
                </section><br />
               <br />
                <div class="box box-primary">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th width="300">Email </th>
                        <th>Phone</th>
                        <th>Timings</th>
                        <th>Address</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    $sql=mysqli_query($con,"select a.*,b.sr_title from appointment_master a,showroom_master b where a.srid=b.sr_id order by a.a_timings desc");
                    if(mysqli_num_rows($sql))
                    {
                    while($r=mysqli_fetch_array($sql))
                    {
                    ?>
                      <tr>
                       <td><?php echo $r['a_name'];?></span></td>
                      <td><?php echo $r['a_email'];?></td>
                      <td><?php echo $r['a_phone'];?></td>
                      <td><?php echo $r['a_timings'];?></td>
                      <td><?php echo $r['a_address'];?></td>
                      </tr>
                    <?php }
                   }
                  else
                   {
                    ?>
                      <tr><td>No Records Founds</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <?php
                   }
                     ?>
                    </tbody>        
                 </table>
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