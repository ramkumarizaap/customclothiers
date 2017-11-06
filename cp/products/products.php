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
                        Products
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Products</li>
                      </ol>
                </section><br />
                <a href="<?php echo $adminurl;?>product-add/" class="btn btn-primary pull-left" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp; Add Product</a>
                <br /><br />
                
                <div class="box box-primary">
                
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th  width="300">Product Title</th>
                        <!--<th width="350">Product Description</th>-->
                        <th>Price </th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th width="80">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    $product=$site->get_all_products('','','1','1');
                    if($product)
                    {
                    foreach($product as $key=>$val)
                    {
                      $image=$product[$key]['image'];
                      $image=explode(",",$image);
                      $price=str_replace(',', '', $product[$key]['price']);
                      $id=$product[$key]['id'];$st=$product[$key]['status'];
                    ?>
                      <tr>
                        <td>
                          <!--<span class="col-md-4"><img src="<?php echo $homeurl.$image[0];?>" height="60"></span>-->
                          <span class="col-md-8"><?php echo $product[$key]['product_name'];?></span>
                          </td>
                        <!--<td><?php echo $product[$key]['description'];?></td>-->
                        <td><?php echo number_format($price,2,'.',',');?></td>
                        <td><?php if($st=="1"){?>
                            <a href="javascript:void;" class="btn btn-danger do_visible hide" 
                            data-table="product_master" data-id="<?php echo $id;?>" data-where="p_id" data-field="p_status" 
                                  data-value="1"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success do_visible" data-table="product_master" 
                            data-id="<?php echo $id;?>" data-where="p_id" data-field="p_status" data-value="0">
                              <i class="ion ion-checkmark"></i></a>
                          <?php }else{?>
                          <a href="javascript:void;" class="btn btn-danger do_visible" data-where="p_id" data-table="product_master" data-id="<?php echo $id;?>"
                             data-field="p_status" data-value="1"><i class="ion ion-close"></i></a>
                            <a href="javascript:void;" class="btn btn-success hide do_visible" data-where="p_id" data-table="product_master" data-id="<?php echo $id;?>"
                            data-field="p_status" data-value="0"><i class="ion ion-checkmark"></i></a>
                          <?php }?>
                        </td>
                        <td><?php echo date('m-d-Y h:i:s a',strtotime($product[$key]['date']));?></td>
                        <td>
                            <a href="<?php echo $adminurl;?>product-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                             <a href="javascript:void(0)" data-href="product<?php echo $id;?>" data-table="prdoucts" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                        </td>
                         <div class="example-modal" id="product<?php echo $id;?>">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are You sure want to delete this product?</p>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" data-table="product_master" data-field="p_id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  
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