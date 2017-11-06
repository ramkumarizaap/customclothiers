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
?>
<body class="skin-black sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
                  <section class="content-header">
                      <h1>
                        Sub Category
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Sub Category</li>
                      </ol>
                </section><br />
               <!-- <a href="<?php echo $adminurl;?>sub-category-add/" class="btn btn-primary pull-left" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp; Add Sub Category</a>
                <br /><br />-->
                
                <div class="box box-primary">
                
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th  width="300">Category Name</th>
                        <th width="350">Sub Category Name</th>
                        <th>Created Date</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    $sub=$site->get_all_sub_category();
                    if($sub)
                    {
                    foreach($sub as $key=>$val)
                    {
                      $id=$sub[$key]['id'];
                    ?>
                      <tr>
                        <td>
                          <!--<span class="col-md-4"><img src="<?php echo $homeurl.$image[0];?>" height="60"></span>-->
                          <span class="col-md-8"><?php echo $sub[$key]['category_name'];?></span>
                          </td>
                        <!--<td><?php echo $product[$key]['description'];?></td>-->
                        <td><?php echo $sub[$key]['subcat_name'];?></td>
                        <td><?php echo date('m-d-Y h:i:s a',strtotime($sub[$key]['date']));?></td>
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
}?>