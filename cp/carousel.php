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
                        Carousel
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Carousel </li>
                      </ol>
                </section><br />
                <a href="<?php echo $adminurl;?>carousel-add/" class="btn btn-primary pull-left" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp; Add Carousel</a>
                <br /><br />
                
                <div class="box box-primary">
                
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                   
                        <th width="300">Title</th>
                        <th width="300">Title2</th>
                        <th>Image</th>
                        <th>Description </th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th width="80">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    $car=$site->get_carousel('','','admin');
                    if($car)
                    {
                    foreach($car as $key=>$val)
                    {
                      $st=$car[$key]['status'];$id=$car[$key]['id'];
                    ?>
                      <tr>
                       
                        <td>
                          <!--<span class="col-md-4"><img src="<?php echo $homeurl.$image[0];?>" height="60"></span>-->
                          <span class="col-md-8"><?php echo $car[$key]['heading'];?></span>
                          </td>
                         <td>
                          <!--<span class="col-md-4"><img src="<?php echo $homeurl.$image[0];?>" height="60"></span>-->
                          <span class="col-md-8"><?php echo $car[$key]['heading2'];?></span>
                          </td>
                        <td>
                          <img src="<?php echo $homeurl.$car[$key]['img'];?>" 
                              style="height:100px;width:80px;">
                        </td>
                        <td>
                          <?php echo $car[$key]['desc'];?>
                        </td>
                        <td><?php if($st=="1"){?>
                            <a href="javascript:void;" class="btn btn-danger do_visible hide" 
                            data-table="carousel_master" data-id="<?php echo $id;?>" data-where="cm_id" data-field="status" 
                                  data-value="1"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success do_visible" data-table="carousel_master" 
                            data-id="<?php echo $id;?>" data-where="cm_id" data-field="status" data-value="0">
                              <i class="ion ion-checkmark"></i></a>
                          <?php }else{?>
                          <a href="javascript:void;" class="btn btn-danger do_visible" data-where="cm_id" data-table="carousel_master" data-id="<?php echo $id;?>"
                             data-field="status" data-value="1"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success hide do_visible" data-where="cm_id" data-table="carousel_master" data-id="<?php echo $id;?>"
                            data-field="status" data-value="0"><i class="ion ion-checkmark"></i></a>
                          <?php }?>
                        </td>
                        <td><?php echo date('m-d-Y h:i:s a',strtotime($car[$key]['created_date']));?></td>
                        <td>
                            <a href="<?php echo $adminurl;?>carousel-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                             <a href="javascript:void(0)" data-href="quotes<?php echo $id;?>" data-table="banner_master" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                        </td>
                         <div class="example-modal" id="quotes<?php echo $id;?>">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are You sure want to delete this Carousel?</p>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" data-table="carousel_master" data-field="cm_id" 
                                  data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  
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
                      <tr><td colspan="5">No Records Founds</td><td></td></tr>
                    <?php
                   }
                     ?>
                    </tbody>
                   
                  </table>
                </div><!-- /.box-body -->
              </div>
  <br /><br />
        </div>
        <?php require('includes/footer.php');?>
    </div>
</body>
<?php 
}?>