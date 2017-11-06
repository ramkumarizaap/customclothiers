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
                        Gift Card
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Gift Card </li>
                      </ol>
                </section><br />
                <a href="<?php echo $adminurl;?>gift-card-add/" class="btn btn-primary pull-left" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp; Add Gift Card</a>
                <br /><br />
               
                <div class="box box-primary">
                
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                   
                        <th  width="300">Code</th>
                        <th>Amount </th>
                        <th>Balance</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    $gift=$site->get_gift_card();
                    if($gift)
                    {
                    foreach($gift as $key=>$val)
                    {
                      $st=$gift[$key]['status'];$id=$gift[$key]['id'];
                    ?>
                      <tr>
                       
                        <td>
                          <span class="col-md-8"><?php echo $gift[$key]['gift_code'];?></span>
                          </td>
                        <td>
                          <?php 
                         
                            echo "$".number_format($gift[$key]['amount'] * $gift[$key]['quantity'],2);?>
                        </td>
                        <td>
                        <?php echo "$".number_format($gift[$key]['balance'],2);?>
                        </td>
                        <td>
                          <?php echo $gift[$key]['name'];?><br>
                          <?php echo $gift[$key]['email'];?>
                        </td>
                        <td><?php echo date('m-d-Y h:i:s a',strtotime($gift[$key]['created_date']));?></td>
<td>
                           <!-- <a href="<?php echo $adminurl;?>banner-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a> -->
                           <a href="javascript:void(0)" data-href="gift<?php echo $id;?>" data-table="gift_card_master" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                        </td>
                        <div class="example-modal" id="gift<?php echo $id;?>">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are You sure want to delete this gift card?</p>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" data-table="gift_card_master" data-field="gc_id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  
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
                      <tr><td>No Records Founds</td><td></td><td></td><td></td><td></td></tr>
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