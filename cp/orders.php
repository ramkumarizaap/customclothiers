<?php
if(isset($_SESSION['admin_user_id']) || isset($_SESSION['emp_user_id']) || isset($_SESSION['manu_user_id']))
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
                        Orders
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Orders</li>
                      </ol>
                </section><br />
                 <?php 
        if(isset($_SESSION['admin_user_id']) || isset($_SESSION['emp_user_id'])){
        ?>
              <a href="<?php echo $adminurl;?>create-order/" class="btn btn-primary pull-left" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp; Create Order</a>
      <?php }?>
                <br /><br />
                <?php if(isset($_SESSION['ord_success'])){?>
              <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Success</h4>
                   <?php echo $_SESSION['ord_success'];?>
                  </div>
                  <?php unset($_SESSION['ord_success']);
                  }?>
                
                <div class="box box-primary">
                
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="162">Order ID</th>
                        <!--<th  width="300">Product Name</th>-->
                        <?php if(!isset($_SESSION['manu_user_id'])): ?>
                          <th  width="375">Order Amount</th>
                        <?php endif; ?>
                        <th width="281">Placed By</th>
                        <th width="281">Order Status</th>
                        <th width="181">View Details</th>
                        <th width="185">Ordered Date</th>
                        <!--<th width="80">Actions</th>-->
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    $order=$site->get_orders();
                    if($order)
                    {
                    foreach($order as $key=>$val)
                    {
                      if($order[$key]['placed_by']=='1'){
                        $placed_by="Administrator(Admin)";
                      }
                      else 
                      {
                        if($order[$key]['placed_by']=='0')
                        {
                          $where=" user_id='".$order[$key]['userid']."'";
                          $utype="User";
                        }
                        else
                        {
                         $where=" user_id='".$order[$key]['placed_by']."'"; 
                         $utype="Employee";
                        }
                        $sql=mysqli_query($con,"select firstname,email from user_master where $where");
                        $r=mysqli_fetch_array($sql);
                        $placed_by=$r['firstname']."($utype)<br>".$r['email'];    
                      }
                      
                    
                      $st=$order[$key]['order_status'];$id=$order[$key]['om_id'];
                      $order_id=$order[$key]['order_id'];
                      $ord=mysqli_query($con,"select * from order_history_master where orderid='$order_id'");
                      $od=mysqli_fetch_array($ord);
                      if($st=="Processing"){$class="bg-maroon";}
                      elseif($st=="In Production"){$class="bg-purple";}
                      elseif($st=="Ready to Pickup"){$class="bg-purple";}
                      elseif($st=="Cancelled"){$class="btn-danger";}
                      elseif($st=="Shipped"){$class="btn-warning";}
                      elseif($st=="Delivered"){$class="btn-success";}
                      elseif($st=="Refunded"){$class="btn-success";}
                    ?>
                      <tr>
                        <td><?php echo $order[$key]['order_id'];?><br><br>
                         <?php if($od['notes']!=''){?>
                         <a href="#" data-href="create_note" data-id="<?php echo $order[$key]['order_id'];?>" 
                             class="popup btn create_note bg-orange"><i class="fa fa-book"></i> Read Note</a>
                         <?php } else{?>
                         <a href="#" data-href="create_note" data-id="<?php echo $order[$key]['order_id'];?>" 
                             class="popup btn create_note btn-primary"><i class="fa fa-plus"></i> Create Note</a>
                          <?php }?>
                   
                        </td>
                        <?php if(!isset($_SESSION['manu_user_id'])): ?>
                          <td>
                          <?php 
                          $a=array();
                          $gift=mysqli_query($con,"select sum(amount) as amt from gift_card_master 
                            where orderid='".$order[$key]['order_id']."' and userid=".$order[$key]['userid']."");
                          if(mysqli_num_rows($gift))
                          {
                            $g=mysqli_fetch_array($gift);
                            $gf=$g['amt'];
                          }
                          else
                          {
                            $gf="";
                          }

                          $app=mysqli_query($con,"select amount as amt from gift_card_applied 
                            where orderid='".$order[$key]['order_id']."'' and 
                            userid=".$order[$key]['userid']."");
                          if(mysqli_num_rows($app))
                          {
                            $ap=mysqli_fetch_array($app);
                            $ap1=$ap['amt'];
                          }
                          else
                          {
                            $ap1="";
                          }
                          ?>

                          <span class="col-md-8">
                            <?php echo "$".$od['tot_amount'];?></span>
                          </td>
                        <?php endif; ?>
                          <td><?php echo ucfirst($placed_by);?><br></td>
                        <td><span class="btn <?php echo $class;?>"><?php echo $st;?></span><br><br>
                          <a href="javascript:void(0);" class="btn bg-purple btn-xs change_st_btn" data-id="<?php echo $order_id;?>">Change Status</a>
                          <div class="col-md-12">
                          <select class="form-control select_st  st_<?php echo $order_id;?> hide" data-id="<?php echo $order_id;?>">
                            <option value="Processing">Processing</option>
                            <option value="In Production">In Production</option>
                            <option value="Ready to Pickup">Ready to Pickup</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Delivered">Delivered</option>
                            <?php if(isset($_SESSION['admin_user_id'])): ?>
                            <option value="Refunded">Refunded</option>
                          <?php endif; ?>
                          </select>
                          </div>
                          <div class="col-md-12">
                          <input type="text" placeholder="Shipping Carrier Name" class="hide carrier_<?php echo $order_id;?> ip_<?php echo $order_id;?> form-control">
                          <input type="text" placeholder="Tracking ID #" class="hide ip_<?php echo $order_id;?> form-control track_<?php echo $order_id;?>">
                        <br>
                        <input type="text" placeholder="Refund Amount" class="hide carrier_<?php echo $order_id;?> refund_<?php echo $order_id;?> form-control">
                          <a href="javascript:void(0);" class="btn btn-primary btn-xs change_status up_<?php echo $order_id;?> hide" 
                          data-id="<?php echo $order_id;?>">Update</a>
                        </div>
                        </td>
                        <td>  <a class="help-block btn btn-info popup" href="<?php echo $adminurl;?>view-order/<?php echo $order[$key]['order_id'];?>/">Click Here to View</a></td>
                        <td><?php echo date('m-d-Y h:i:s a',strtotime($od['created_date']));?></td>
                        <!--<td>
                            <a href="<?php echo $adminurl;?>banner-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                             <a href="javascript:void(0)" data-href="banner<?php echo $id;?>" data-table="banner_master" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                        </td>-->
                         <div class="example-modal" id="banner<?php echo $id;?>">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are You sure want to delete this banner?</p>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" data-table="banner_master" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  
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
                      <tr><td>No Records Founds</td><td></td><td></td>
                        <td></td>
                      <td></td><td width="0"></td><td width="0"></td><td width="0"></td></tr>
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
<div class="example-modal" id="create_note">
      <div class="modal">
        <div class="modal-dialog">
          <div class="modal-content">
          <form action="" method="post" class="note-form">
             <div class="modal-header">
              <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Create Note</h4>
            </div>
            <div class="modal-body" style="height:450px;overflow:auto;">
            <input type="hidden" value="note" name="type">
            <input type="hidden" class="form-control old_image" name="old_image">
              <div class="note-msg" style="color:blue;font-weight:bold;font-size:14px;"></div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Order ID</label>
                    <input type="text" class="form-control order_id" name="order_id" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Attachment</label>
                    <input type="file" class="form-control" name="userfile" ><br>
                    <div class="att_img">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class=" form-control note_desc" rows="10" name="desc"></textarea>
                  </div>
            </div>
            <div class="modal-footer">
            <button type="submit" style="margin-left:10px;" class="btn save_note btn-danger pull-right">Save</button>  
            <button type="button" class="btn btn-default pull-right " onclick='window.location.href=""';>Close</button>
            </div>
         </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
</body>
<?php 
}
else
{
  
    header("Location:{$adminurl}");
}
?>