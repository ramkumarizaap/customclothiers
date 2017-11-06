<?php
if(isset($_SESSION['admin_user_id'])  || isset($_SESSION['emp_user_id']))
{
    require_once('includes/topbar.php');
    require_once('includes/sidebar.php');
    $site=new Site();
    //$user_count=$site->get_user_count();
?>
<style type="text/css">
  .stripped:nth-of-type(2n+1) {
    background: #f9f9f9;
    padding-bottom: 8px;
    padding-top: 8px;
}
</style>
<body class="skin-black sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
          <section class="content-header">
            <h1>Users</h1>
              <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">User</li>
              </ol>
          </section>
             <br /><br />
          <div class="box box-primary">
            <div class="box-header">
            </div><!-- /.box-header -->
          <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Username</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                   <tbody>
                    <?php $i=0;
                    $users=$site->get_all_users();$a=1;$b=1;$c=1;
                    foreach($users as $key=>$val)
                    {
                      $id=$users[$key]['id'];$st=$users[$key]['block'];
                    ?>
                      <tr>
                        <td><?php echo $users[$key]['firstname'];?>&nbsp;<?php echo $users[$key]['lastname'];?><br>
                         
                        </td>
                        <td><?php echo $users[$key]['email'];?></td>
                        <td><?php echo $users[$key]['mobile'];?></td>
                        <td><?php echo $users[$key]['username'];?></td>
                         <td align="center">
                          <a href="<?php echo $adminurl;?>new-order/<?php echo $id;?>/" class="btn btn-mini btn-info">Select</a>
                        </td>
                           
                     </tr>                     
                       


                    <?php $a++;$b++;$c++; }?>
                    </tbody>
                 </table>
                </div><!-- /.box-body -->
              </div>
              <br/>              <br/>
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