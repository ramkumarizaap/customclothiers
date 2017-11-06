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

<style type="text/css">

  .stripped:nth-of-type(2n+1) {

    background: #f9f9f9;

    padding-bottom: 8px;

    padding-top: 8px;

}

</style>

<body class="skin-black sidebar-mini">

    <div class="wrapper">

        <div class="content-wrapper">

          <section class="content-header">

            <h1>Users</h1>

              <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">User</li>

              </ol>

          </section><br /><br />

          <a href="<?php echo $adminurl;?>add-user/" class="btn btn-primary pull-left" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp; Add User</a>          <br /><br />

          <div class="box box-primary">

            <div class="box-header">

            </div><!-- /.box-header -->

          <div class="box-body">

             <table id="example1" class="table table-bordered table-striped">

                <thead>

                  <tr>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Mobile</th>

                    <!--<th>Username</th>-->

                    <th >Status</th>

                    <th>Options</th>

                    <th>Actions</th>

                  </tr>

                  </thead>

                   <tbody>

                    <?php $i=0;

                    $users=$site->get_all_users();$a=1;$b=1;$c=1;

                    foreach($users as $key=>$val)

                    {

                      $id=$users[$key]['id'];$st=$users[$key]['block'];

                    ?>

                      <tr>

                        <td><?php echo $users[$key]['firstname'];?>&nbsp;<?php echo $users[$key]['lastname'];?><br>

                         

                        </td>

                        <td><?php echo $users[$key]['email'];?></td>

                        <td><?php echo $users[$key]['mobile'];?></td>

                        <!--<td><?php echo $users[$key]['username'];?></td>-->

                         <td align="center">

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

                         <td align="center"> <a href="javascript:void(0)" data-href="user<?php echo $id;?>" class="btn btn-xs btn-info popup">View Details</a></td>

                       <td align="center"> 

                        <a href="<?php echo $adminurl;?>add-user/<?php echo $id;?>/" data-href="user<?php echo $id;?>" class="btn  btn-primary"><i class="fa fa-edit"></i></a>
                      
                      <a href="javascript:void(0)" data-href="userdelete<?php echo $id;?>" data-table="users" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>
                      </td>

                     </tr>                     

                       <div class="example-modal" id="user<?php echo $id;?>">

                           <div class="modal">

                              <div class="modal-dialog modal-lg" >

                                <div class="modal-content">

                                   <div class="modal-header">

                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                      <h4 class="modal-title"><?php echo $users[$key]['firstname'];?>&nbsp;<?php echo $users[$key]['lastname'];?></h4>

                                    </div>

                                    <div class="modal-body">

                                    <div class="nav-tabs-custom">

                                            <ul class="nav nav-tabs">

                                              <li class="active"><a href="#pro_<?php echo $a;?>" data-toggle="tab">Profile</a></li>

                                              <li><a href="#mea_<?php echo $b;?>" data-toggle="tab">Measurement Profile</a></li>

                                              <li><a href="#od_<?php echo $c;?>" data-toggle="tab">Orders</a></li>                 

                                            </ul>

                                            <div class="tab-content">

                                              <div class="tab-pane active" id="pro_<?php echo $a;?>">

                                                  <p><strong>Firstname</strong> : <?php echo $users[$key]['firstname'];?><p>

                                                  <p><strong>Lastname</strong> : <?php echo $users[$key]['lastname'];?><p>

                                                  <p><strong>Email</strong> : <?php echo $users[$key]['email'];?><p>

                                                  <p><strong>Password</strong> : <?php echo $users[$key]['password'];?><p>

                                                  <p><strong>Phone</strong> : <?php echo $users[$key]['mobile'];?><p>

                                                  <p><strong>Address</strong> : 

                                                      <?php echo $users[$key]['address1'].", ";

                                                      if($users[$key]['address2']){

                                                          echo $users[$key]['address2'].", ";

                                                        }

                                                        echo $users[$key]['city']." - ".$users[$key]['zipcode'].", ";

                                                        echo $users[$key]['province'].",".$users[$key]['country'].".";

                                                        ?>

                                                      <p>

                                                  <p><strong>Status</strong> : 

                                                  <?php if($users[$key]['block']=="0")

                                                    echo "Active";

                                                  else

                                                    echo "Inactive";

                                                    ?>

                                                  </p>

                                                   <p><strong>Photo</strong> :</p> 

                                                    <p>

                                                    <?php 

                                                    if($users[$key]['photo']!='')

                                                     {

                                                       echo "<img src='".$homeurl.$users[$key]['photo']."' style='float:left;' height=70 width=70 >";

                                                     }

                                                     if($users[$key]['img2']!='')

                                                     {

                                                       echo "<img src='".$homeurl.$users[$key]['img2']."' style='float:left;' height=70 width=70 >";

                                                     }

                                                     if($users[$key]['img3']!='')

                                                     {

                                                       echo "<img src='".$homeurl.$users[$key]['img3']."' style='float:left;' height=70 width=70 >";

                                                     }

                                                    ?>

                                                    </p>

                                              </div><!-- /.tab-pane -->

                                              <div class="tab-pane" id="mea_<?php echo $b;?>">

                                                  <p class="col-md-12 stripped">

                                                    <span class="col-md-3">Name</span>

                                                    <span class="col-md-3">Gender</span> 

                                                    <span class="col-md-3">Height</span>  

                                                    <span class="col-md-3">Weight</span>  

                                                    <!--<span class="col-md-3">Options</span>   -->

                                                  </p>

                                                  <?php 

                                                  $mp=$site->get_mesurement_by_user($id);

                                                   if($mp!=0){

                                                  foreach ($mp as $key => $value) {?>

                                                    <p class="col-md-12 stripped">

                                                    <span class="col-md-3"><?php echo $mp[$key]['name'];?></span>

                                                    <span class="col-md-3">Male</span> 

                                                    <span class="col-md-3"><?php echo $mp[$key]['height'];?></span>  

                                                    <span class="col-md-3"><?php echo $mp[$key]['weight'];?></span>  

                                                    <!--<span class="col-md-3"><a href="javascript:void(0);" data-href="mp<?php echo $mp[$key]['id'];?>" class="popup btn-xs btn-primary">View</a></span>   -->

                                                  </p>

                                                

                                                  <?php

                                                  }

                                                }

                                                    else{

                                                  echo "No Records Found";

                                                }

                                                  ?>

                                              </div>

                                              <div class="tab-pane" id="od_<?php echo $c;?>">

                                                   <p class="col-md-12 stripped">

                                                   <span class="col-md-5">Order ID</span>

                                                    <!--<span class="col-md-5">Product Name</span>

                                                    <span class="col-md-1">Quantity</span> -->

                                                    <span class="col-md-2">Order Amount</span>  

                                                    <span class="col-md-2">Order Status</span>  

                                                    <span class="col-md-3">Ordered Date</span>

                                                  </p>

                                                  <?php 

                                                  $ord=$site->get_orders_by_user($id);

                                                  if($ord!=0){

                                                  foreach ($ord as $key => $value) {



                                                     $ord1 = mysqli_query($con,"select order_status from order_master where order_id='".$ord[$key]['order_id']."'");

                                                     if(mysqli_num_rows($ord1) > 0)

                                                     {

                                                      $or = mysqli_fetch_array($ord1);

                                                      $st = $or['order_status'];

                                                      if($st=="Processing"){$class="bg-maroon";}

                                                      elseif($st=="In Production"){$class="bg-purple";}

                                                      elseif($st=="Ready to Pickup"){$class="bg-purple";}

                                                      elseif($st=="Cancelled"){$class="btn-danger";}

                                                      elseif($st=="Shipped"){$class="btn-warning";}

                                                      elseif($st=="Delivered"){$class="btn-success";}

                                                      elseif($st=="Refunded"){$class="btn-success";}

                                                     }

                                                    ?>

                                                    <p class="col-md-12 stripped">

                                                    <span class="col-md-5"><a href="<?php echo $adminurl;?>view-order/<?php echo $ord[$key]['order_id'];?>/"><?php echo $ord[$key]['order_id'];?></a></span>

                                                    <span class="col-md-2"><?php echo "$".number_format($ord[$key]['price'],2);?></span>  

                                                    <span class="col-md-2 <?php echo $class; ?>"><?php echo $st;?></span>  

                                                    <span class="col-md-3"><?php echo date('m-d-Y h:i:s a',strtotime($ord[$key]['created_date']));?></span>



                                                    <!--<span class="col-md-3"><a href="javascript:void(0);" data-href="mp<?php echo $mp[$key]['id'];?>" class="popup btn-xs btn-primary">View</a></span>   -->

                                                  </p>

                                                

                                                  <?php

                                                  }

                                                }

                                                else{

                                                  echo "No Records Found";

                                                }



                                                  ?>

                                              </div>

                                            </div>

                                    </div>

                                   <div class="modal-footer">

                                     <button type="button" class="btn btn-default close-btn pull-right" data-dismiss="modal">Close</button>

                                   </div>

                                  </div>

                              </div>

                           </div>

                       </div>

                       </div>

                       


                       <div class="example-modal" id="userdelete<?php echo $id;?>">

                            <div class="modal">

                              <div class="modal-dialog">

                                <div class="modal-content">

                                  <div class="modal-header">

                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>

                                    <h4 class="modal-title">Delete</h4>

                                  </div>

                                  <div class="modal-body">

                                    <p>Are You sure want to delete this user?</p>

                                  </div>

                                  <div class="modal-footer">

                                  <button type="button" data-table="user_master" data-field="user_id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  

                                    <button type="button" class="btn btn-default pull-right" onclick='window.location.href=""';>Close</button>

                                  </div>

                                </div><!-- /.modal-content -->

                              </div><!-- /.modal-dialog -->

                            </div><!-- /.modal -->

                          </div> 


                    <?php $a++;$b++;$c++; }?>

                    </tbody>

                 </table>

                </div><!-- /.box-body -->

              </div>

              <br/>              <br/>

              

        </div>

        <?php require('includes/footer.php');?>

    </div>

</body>

<?php 

}?>