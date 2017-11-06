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

    //$pages=$site->get_pages();

?>

<body class="skin-black sidebar-mini">

    <div class="wrapper">

        <div class="content-wrapper">

                  <section class="content-header">

                      <h1>

                        Discount

                      </h1>

                      <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">Discount</li>

                      </ol>

                </section><br />

                <a href="<?php echo $adminurl;?>discounts-add/" class="btn btn-primary pull-left" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp; Add Discount</a>

                <br /><br />

                

                <div class="box box-primary">

                

                <div class="box-header">

                </div><!-- /.box-header -->

                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">

                    <thead>

                      <tr>

                        <th width="150">Discount Title</th>

                        <th width="80">Order Type</th>

                        <th width="300">Date Range</th>

                        <th>Status</th>

                         <th>Created Date</th>

                        <th width="100">Actions</th>

                      </tr>

                    </thead>

                    <tbody>

                    <?php $i=0;

                    $discounts=$site->get_discounts();

                    if($discounts)

                    {

                    foreach($discounts as $key=>$val)

                    {

                      $id=$discounts[$key]['id'];

                      $e_date=strtotime($discounts[$key]['end_date']);

                      $a_date=strtotime(date("Y-m-d H:i:s"));

                    ?>

                      <tr>

                        <td>

                          <!--<span class="col-md-4"><img src="<?php echo $homeurl.$image[0];?>" height="60"></span>-->

                          <span class="col-md-8"><?php echo $discounts[$key]['code_name'];?></span>

                          </td>

                        <td><?php echo $discounts[$key]['discount_type'];?></td>

                        <td><?php echo date('m-d-Y H:i:s a',strtotime($discounts[$key]['start_date']));?> - 

                        <?php echo date('m-d-Y H:i:s a',strtotime($discounts[$key]['end_date']));?></td>

                        <td>

                          <?php if($a_date <= $e_date){echo "<span class='margin btn bg-green'>ACTIVE</span>";}

                          else{echo "<span class='margin btn bg-red'>EXPIRED</span>";};?>

                        </td>

                        <td><?php echo date('m-d-Y h:i:s a',strtotime($discounts[$key]['date']));?></td>

                        <td>

                            <a href="<?php echo $adminurl;?>discounts-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                             <a href="javascript:void(0)" data-href="discounts<?php echo $id;?>" data-table="discounts" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>

                        </td>

                         <div class="example-modal" id="discounts<?php echo $id;?>">

                            <div class="modal">

                              <div class="modal-dialog">

                                <div class="modal-content">

                                  <div class="modal-header">

                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>

                                    <h4 class="modal-title">Delete</h4>

                                  </div>

                                  <div class="modal-body">

                                    <p>Are You sure want to delete this discount?</p>

                                  </div>

                                  <div class="modal-footer">

                                  <button type="button" data-table="discounts" data-field="id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  

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

                      <tr><td colspan="6" style="text-align:center">No Records Found</td><td></td><td></td><td></td><td></td></td></tr>

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