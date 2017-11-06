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
                        Vendors
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Vendors</li>
                      </ol>
                </section><br />
                <a href="<?php echo $adminurl;?>vendor-add/" class="btn btn-primary pull-left" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp; Add Vendor</a>
                <br /><br />
                
                <div class="box box-primary">
                
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th  style="width:300px">Name</th>
                        <th width="150">Email</th>
                        <th>Username</th>
                        <th width="300">Address</th>
                        <th>Status</th>
                        <th width="240">Created Date</th>
                        <th width="100">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    $vendor=$site->get_user_role('','3');
                    if($vendor)
                    {
                    foreach($vendor as $key=>$val)
                    {
                      $id=$vendor[$key]['id'];$st=$vendor[$key]['block'];
                    ?>
                      <tr>
                       <td>
                          <!--<span class="col-md-4"><img src="<?php echo $homeurl.$image[0];?>" height="60"></span>-->
                          <span class="col-md-8"><?php echo $vendor[$key]['name'];?></span>
                          </td>
                        <td><?php echo $vendor[$key]['email'];?></td>
                        <td><?php echo $vendor[$key]['username'];?></td>
                        <td>
                        <?php echo $vendor[$key]['address1'].",<br>".$vendor[$key]['address2'].",<br>".
                        $vendor[$key]['city']." - ".$vendor[$key]['zipcode'].",<br>".$vendor[$key]['state'].","
                        .$vendor[$key]['country'].".<br> Ph : ".$vendor[$key]['mobile'];?>
                        </td>
                        <td>
                        <?php if($st=="0"){?>
                            <a href="javascript:void;" class="btn btn-danger do_visible hide" 
                            data-table="user_master" data-id="<?php echo $id;?>" data-where="user_id" data-field="block" 
                                  data-value="0"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success do_visible" data-table="user_master" 
                            data-id="<?php echo $id;?>" data-where="user_id" data-field="block" data-value="1">
                              <i class="ion ion-checkmark"></i></a>
                          <?php }else{?>
                          <a href="javascript:void;" class="btn btn-danger do_visible" data-where="user_id" data-table="user_master" data-id="<?php echo $id;?>"
                             data-field="block" data-value="0"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success hide do_visible" data-where="user_id" data-table="user_master" data-id="<?php echo $id;?>"
                            data-field="block" data-value="1"><i class="ion ion-checkmark"></i></a>
                          <?php }?>
                          
                        </td>
                        <td><?php echo date('m-d-Y h:i:s a',strtotime($vendor[$key]['created_date']));?></td>
                        <td>
                            <a href="<?php echo $adminurl;?>vendor-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                             <a href="javascript:void(0)" data-href="vendor<?php echo $id;?>" data-table="prdocuts" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                        </td>
                         <div class="example-modal" id="vendor<?php echo $id;?>">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are You sure want to delete this vendor?</p>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" data-table="user_master" data-field="user_id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  
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
                      <tr><td>No Records Founds</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
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