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
                        Fabrics
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Fabrics</li>
                      </ol>
                </section><br />
                <a href="<?php echo $adminurl;?>fabrics-add/" class="btn btn-primary pull-left" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp; Add Fabrics</a>
                <br /><br />
                
                <div class="box box-primary">
                
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th  width="200">Fabric Name</th>
                        <th width="90">Fabric Image</th>
                        <th width="340">Fabric Description</th>
                        <th width="340">Category</th>
                        <th  width="180">Created Date</th>
                        <th width="80">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    $fab=$site->get_fabrics();
                    if($fab)
                    {
                    foreach($fab as $key=>$val)
                    {
                      $id=$fab[$key]['id'];
                    ?>
                      <tr>
                        <td>
                          <!--<span class="col-md-4"><img src="<?php echo $homeurl.$image[0];?>" height="60"></span>-->
                          <span class="col-md-8"><?php echo $fab[$key]['fab_name'];?></span>
                          </td>
                        <!--<td><?php echo $product[$key]['description'];?></td>-->
                        <td><img src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" height="50" width="70"></td>
                        <td><?php echo $fab[$key]['fab_desc'];?></td>
                        <td><?php echo $fab[$key]['sub_cat_name'];?></td>
                        <td><?php echo date('m-d-Y h:i:s a',strtotime($fab[$key]['date']));?></td>
                        <td>
                            <a href="<?php echo $adminurl;?>fabrics-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0)" data-href="fabric<?php echo $id;?>" data-table="fabric_master" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                        </td>
                        <div class="example-modal" id="fabric<?php echo $id;?>">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are You sure want to delete this fabric?</p>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" data-table="fabric_master" data-field="fab_id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  
                                    <button type="button" class="btn btn-default pull-right" onclick='window.location.href=""';>Close</button>
                                  </div>
                                </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                          </div>  
                      </tr>
                     <?php }
                   }
                   else
                   {
                    ?>
                      <tr><td>No Records Founds</td><td></td><td></td><td></td><td></td><td></td></tr>
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