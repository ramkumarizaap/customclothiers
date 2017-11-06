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
                        Showroom
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Showroom</li>
                      </ol>
                </section><br />
                <a href="<?php echo $adminurl;?>showroom-add/" class="btn btn-primary pull-left" style="margin-left: 10px;"><i class="fa fa-plus"></i> &nbsp;Add Showroom</a>
                <br /><br />
                
                <div class="box box-primary">
                
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped show_list">
                    <thead>
                      <tr>
                        <th  style="width:200px">Name</th>
                        <th width="150">Image</th>
                        <th>Address</th>
                        <th width="300">Timings</th>
                        <th>Status</th>
                        <th width="240">Created Date</th>
                        <th width="150">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    $room=$site->get_showrooms();
                    if($room)
                    {
                    foreach($room as $key=>$val)
                    {
                      $id=$room[$key]['id'];$st=$room[$key]['block'];
                    ?>
                      <tr>
                        <td>
                          <!--<span class="col-md-4"><img src="<?php echo $homeurl.$image[0];?>" height="60"></span>-->
                          <span class="col-md-8"><?php echo $room[$key]['name'];?>
                          <br><?php echo $room[$key]['email'];?></span>
                          </td>
                        <td><img src="<?php echo $homeurl.$room[$key]['image'];?>" style="height:100px;width:100px;"></td>
                        <td><?php echo $room[$key]['address'];?></td>
                        <td style="min-width:260px;">
                        <span class="show_day">Monday:</span>
                                    <?php echo $room[$key]['monday'];?><br>
                        <span class="show_day">Tuesday:</span>
                         <?php echo $room[$key]['tuesday'];?><br>
                        <span class="show_day">Wednesday:</span>  <?php echo $room[$key]['wednesday'];?><br>
                        <span class="show_day">Thursday:</span> <?php echo $room[$key]['thursday'];?><br>
                        <span class="show_day">Friday:</span>
                         <?php echo $room[$key]['friday'];?><br>
                        <span class="show_day">Saturday:</span>
                         <?php echo $room[$key]['saturday'];?><br>
                        <span class="show_day">Sunday:</span>
                         <?php echo $room[$key]['sunday'];?><br>
                        </td>
                        <td>
                        <?php if($st=="0"){?>
                            <a href="javascript:void;" class="btn btn-danger do_visible hide" 
                            data-table="showroom_master" data-id="<?php echo $id;?>" data-where="sr_id" data-field="block" 
                                  data-value="0"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success do_visible" data-table="showroom_master" 
                            data-id="<?php echo $id;?>" data-where="sr_id" data-field="block" data-value="1">
                              <i class="ion ion-checkmark"></i></a>
                          <?php }else{?>
                          <a href="javascript:void;" class="btn btn-danger do_visible" data-where="sr_id" data-table="showroom_master" data-id="<?php echo $id;?>"
                             data-field="block" data-value="0"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success hide do_visible" data-where="sr_id" data-table="showroom_master" data-id="<?php echo $id;?>"
                            data-field="block" data-value="1"><i class="ion ion-checkmark"></i></a>
                          <?php }?>
                          
                        </td>
                        <td><?php echo date('m-d-Y h:i:s a',strtotime($room[$key]['created_date']));?></td>
                        <td>
                            <a href="<?php echo $adminurl;?>showroom-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                             <a href="javascript:void(0)" data-href="showroom<?php echo $id;?>" data-table="prdocuts" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                        </td>
                         <div class="example-modal" id="showroom<?php echo $id;?>">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are You sure want to delete this showroom?</p>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" data-table="showroom_master" data-field="sr_id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  
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
                      <tr><td>No Records Founds</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                      <td>&nbsp;</td><td>&nbsp;</td></tr>
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