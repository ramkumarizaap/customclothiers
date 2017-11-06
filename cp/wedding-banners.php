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
        <h1>Wedding Banner</h1>
          <ol class="breadcrumb">
           <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
           <li class="active">Wedding Banner</li>
          </ol>
      </section><br />
          <a href="<?php echo $adminurl;?>wedding-banner-add/" class="btn btn-primary pull-left" style="margin-left: 5px;"><i class="fa fa-plus"></i> Add Wedding Banner</a>
          <br /><br />
          <div class="box">
          <div class="box-header">
          </div><!-- /.box-header -->
          <div class="box-body">
           <table id="example3" class="table table-bordered table-striped">
              <thead>
                <tr>
                   
                  <th width="150">Image</th>
                  <th width="240">Created Date</th>
                  <th width="150">Actions</th>
               </tr>
              </thead>
             <tbody>
                    <?php $i=0;
                    $work=$site->get_wedding_banner();
                    if($work)
                    {
                    foreach($work as $key=>$val)
                    {
                      $id=$work[$key]['id'];$st=$work[$key]['block'];
                    ?>
                     <tr>
                      <td><img src="<?php echo $homeurl.$work[$key]['img'];?>" style="height:100px;width:100px;"></td>
                        
                       <td><?php echo date('m-d-Y h:i:s a',strtotime($work[$key]['created_date']));?></td>
                       <td>
                          <a href="<?php echo $adminurl;?>wedding-banner-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                          <a href="javascript:void(0)" data-href="wedding-banner<?php echo $id;?>" data-table="wedding_banner_master" data-field="w_id" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                        </td>
                         <div class="example-modal" id="wedding-banner<?php echo $id;?>">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                 </div>
                                  <div class="modal-body">
                                    <p>Are You sure want to delete this Banner?</p>
                                 </div>
                                  <div class="modal-footer">
                                  <button type="button" data-table="wedding_banner_master" data-field="w_id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  
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