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

   if(isset($_GET['type']))

    {


      $id=$_GET['type'];

      $ord_reci=$site->get_ord_received($id);

      $id=$ord_reci[0]['id'];

      $title=$ord_reci[0]['title'];$image=$ord_reci[0]['img'];

      $desc=$ord_reci[0]['desc'];

      $button="Update";

      $tit="Edit";

      $action="update";

      $action="update";

      

    }

    else

    {
      $id="";

      $title="";$desc="";

      $name="";$button="Save";$action="save";$id="";$tit="Add";

    	$action="save";

    }

?>

<body class="skin-black sidebar-mini">

    <div class="wrapper">

        <div class="content-wrapper">

             <section class="content-header">

                 <h1>Order Received Form</h1>

                      <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">Order Received Form</li>

                     </ol>

                </section>

                <section class="content">

                  <div class="row">

                    <!-- left column -->

                    <div class="col-md-8">

                      <!-- general form elements -->

                      <div class="box box-primary">

                        <div class="box-header with-border">

                       </div><!-- /.box-header -->

                        <!-- form start -->

                        <form class="work" id="order-received-form" method="post" action="" autocomplete="off">

                        <input type="hidden" name="type" value="order-received-form">

                        <input type="hidden" name="old_image" value="<?php echo $image;?>">

                        <input type="hidden" value="<?php echo $action;?>" name="action">

                        <input type="hidden" value="<?php echo $id;?>" name="id">

                          <div class="box-body">

                            <div class="form-group">

                              <label for="exampleInputEmail1">Order Received Success Message</label>

                              <textarea class="form-control description" rows="10" name="ord_reciv_succ_msg"><?php echo $title; ?></textarea>

                            </div>

                            <div class="form-group">

                              <label for="exampleInputEmail1">Banner Image</label>

                              <input type="file" class="form-control" name="ord_banner_image" accept="image/*">

                              <span class="help-block">

                            </div>

                            <div class="form-group">

                              <label for="exampleInputEmail1">Description About Order</label>

                              <textarea class="form-control description" rows="10" name="ord_desc"><?php echo $desc; ?></textarea>

                            </div>

                       </div><!-- /.box-body -->

                       <div class="box-footer">

                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>

                          <input type="submit" name="order_received_add" class="btn btn-primary" value="SAVE">

                        </div>

                      </form>

                    </div><!-- /.box -->

                    </div><!--/.col (left) -->

                    <div class="example-modal" id="modal1">

                      <div class="modal">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>order-received-add/1/";' aria-label="Close"><span aria-hidden="true">×</span></button>

                                <h4 class="modal-title">Order Received</h4>

                            </div>

                            <div class="modal-body popup-body">

                              <p>Order Content has been save successfully!!!</p>

                            </div>

                            <div class="modal-footer">

                              <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>

                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>order-received-add/1/";'>Close</button>

                            </div>

                          </div><!-- /.modal-content -->

                        </div><!-- /.modal-dialog -->

                      </div><!-- /.modal -->

                    </div>  

                  <!-- right column -->         

                 </div>   <!-- /.row -->

        </section>

        </div>

    </div>

</body>

<?php }

?>







