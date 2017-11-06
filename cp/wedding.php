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
        <h1>Wedding</h1>
          <ol class="breadcrumb">
           <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
           <li class="active">Wedding</li>
          </ol>
      </section><br />
          <a href="<?php echo $adminurl;?>wedding-add/" class="btn btn-primary pull-left" style="margin-left: 5px;"><i class="fa fa-plus"></i> Add Wedding</a>
          <br /><br />
          <div class="box">
          <div class="box-header">
          </div><!-- /.box-header -->
          <div class="box-body">
           <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                   <th  style="width:500px">Name</th>
                  <th width="150">Image</th>
                  <th>Status</th>
                  <th width="240">Created Date</th>
                  <th width="150">Actions</th>
               </tr>
              </thead>
             <tbody>
                    <?php $i=0;
                    $wed=$site->get_wedding();
                    if($wed)
                    {
                    foreach($wed as $key=>$val)
                    {
                      $id=$wed[$key]['id'];$st=$wed[$key]['block'];
                    ?>
                     <tr>
                       <td><span class="col-md-8"><?php echo $wed[$key]['title'];?></span></td>
                      <td><img src="<?php echo $homeurl.$wed[$key]['img'];?>" style="height:100px;width:100px;"></td>
                        <td>
                        <?php if($st=="0"){?>
                            <a href="javascript:void;" class="btn btn-danger do_visible hide" 
                            data-table="wedding_master" data-id="<?php echo $id;?>" data-where="w_id" 
                            data-field="block" data-value="0"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success do_visible" 
                            data-table="wedding_master"  data-id="<?php echo $id;?>" data-where="w_id" 
                            data-field="block" data-value="1"><i class="ion ion-checkmark"></i></a>
                         <?php }else{?>
                          <a href="javascript:void;" class="btn btn-danger do_visible" data-where="w_id" data-table="wedding_master" data-id="<?php echo $id;?>"
                             data-field="block" data-value="0"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success hide do_visible" data-where="w_id" data-table="wedding_master" data-id="<?php echo $id;?>"
                            data-field="block" data-value="1"><i class="ion ion-checkmark"></i></a>
                          <?php }?>                  
                        </td>
                       <td><?php echo date('m-d-Y h:i:s a',strtotime($wed[$key]['created_date']));?></td>
                       <td>
                          <a href="<?php echo $adminurl;?>wedding-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                          <a href="javascript:void(0)" data-href="wed<?php echo $id;?>" data-table="work_master" data-field="w_id" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                        </td>
                         <div class="example-modal" id="wed<?php echo $id;?>">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                 </div>
                                  <div class="modal-body">
                                    <p>Are You sure want to delete this wedding?</p>
                                 </div>
                                  <div class="modal-footer">
                                  <button type="button" data-table="wedding_master" data-field="w_id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  
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
                      <tr><td colspan="6">No Records Founds</td></tr>
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