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
                        Reviews
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Reviews </li>
                      </ol>
                </section><br />
                <br /><br />
                
                <div class="box box-primary">
                
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th  width="100">Category</th>
                      <th width="600">Product Title</th>
                       <th  width="100">Name</th>
                       <th  width="40">Ratings</th>
                       <th  width="200">City - State</th>
                        <th  width="300">Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th width="80">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    $ban=$site->get_all_reviews();
                    if($ban)
                    {
                    foreach($ban as $key=>$val)
                    {
                      $st=$ban[$key]['status'];$id=$ban[$key]['id'];
                      if(!empty($val['pid'])) 
                      {
                        $get_product = mysqli_query($con,"select p_name from product_master where p_id='".$val['pid']."'");
                        if(mysqli_num_rows($get_product) > 0) 
                        {
                          $p_dtl = mysqli_fetch_array($get_product);
                          $p_name = $p_dtl['p_name'];
                        }
                      } 
                      else
                      {
                        $p_name='-';
                      }
                      $get_sub_cat = mysqli_query($con,"select sub_cat_name from sub_category_master where sub_cat_id='".$val['subcatid']."'");
                      if(mysqli_num_rows($get_sub_cat) > 0) 
                      {
                        $sub_cat_dtl = mysqli_fetch_array($get_sub_cat);
                        $sub_cat_name = $sub_cat_dtl['sub_cat_name'];
                      }
                    ?>
                      <tr>
                        <td><?php echo $sub_cat_name;?></td>
                        <td><?php echo $p_name;?></td>
                        <td><?php echo $ban[$key]['name'];?></td>
                        <td><?php echo $ban[$key]['score'];?></td>
                        <td><?php echo $ban[$key]['city']." - ".$ban[$key]['state'];?></td>
                        <td><?php echo $ban[$key]['title'];?></td>
                        <td><?php echo $ban[$key]['description'];?></td>
                        <td><?php if($st=="1"){?>
                            <a href="javascript:void;" class="btn btn-danger do_visible hide" 
                            data-table="reviews" data-id="<?php echo $id;?>" data-where="r_id" data-field="status" 
                                  data-value="1"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success do_visible" data-table="reviews" 
                            data-id="<?php echo $id;?>" data-where="r_id" data-field="status" data-value="0">
                              <i class="ion ion-checkmark"></i></a>
                          <?php }else{?>
                          <a href="javascript:void;" class="btn btn-danger do_visible" data-where="r_id" data-table="reviews" data-id="<?php echo $id;?>"
                             data-field="status" data-value="1"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success hide do_visible" data-where="r_id" data-table="reviews" data-id="<?php echo $id;?>"
                            data-field="status" data-value="0"><i class="ion ion-checkmark"></i></a>
                          <?php }?>
                        </td>
                        <td><?php echo date('m-d-Y h:i:s a',strtotime($ban[$key]['created_date']));?></td>
                        <td>
                            <a href="<?php echo $adminurl;?>reviews-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                             <a href="javascript:void(0)" data-href="reviews<?php echo $id;?>" data-table="banner_master" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                        </td>
                         <div class="example-modal" id="reviews<?php echo $id;?>">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are You sure want to delete this review?</p>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" data-table="reviews" data-field="r_id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  
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