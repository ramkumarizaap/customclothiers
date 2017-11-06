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



    if(isset($_GET['type']))



    {



      $id=$_GET['type'];



      $banner=$site->get_mpf_feilds($id);



      $name=$banner[0]['name'];



      $button="Update";



      $action="update";



   }



   else



    {



      $name="";$button="Save";$action="save";$id="1";$desc="";$img="";



    }



?>



<body class="skin-black sidebar-mini">



    <div class="wrapper">



        <div class="content-wrapper">



                  <section class="content-header">



                      <h1>



                      Add Field</h1>



                      <ol class="breadcrumb">



                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>



                        <li class="active">Add Field</li>



                      </ol>



                </section>



                <section class="content">



                  <div class="row">



                    <!-- left column -->



                    <div class="col-md-12">



                      <!-- general form elements -->



                      <div class="box box-primary">



                        <div class="box-header with-border">



                        </div><!-- /.box-header -->



                        <!-- form start -->



                        <form class="fields" id="field-form" method="post" action="" autocomplete="off" enctype="multipart/form-data">



                        <input type="hidden" name="type" value="fields">



                        <input type="hidden" value="<?php echo $action;?>" name="action">



                        <input type="hidden" value="<?php echo $id;?>" name="id">



                          <div class="box-body">



                           <div class="form-group">



                              <label for="exampleInputEmail1">Label Name</label>



                              <input type="text" class="form-control" name="label_name" value="<?php echo $name;?>" placeholder="Enter Label Name">



                            </div>



                          </div><!-- /.box-body -->



                          <div class="box-footer">



                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>



                            <input type="submit" name="field_add" class="btn btn-primary" value="<?php echo $button;?>">



                          </div>



                        </form>



                      </div><!-- /.box -->



                    </div><!--/.col (left) -->



                    <div class="example-modal" id="modal1">



                      <div class="modal">



                        <div class="modal-dialog">



                          <div class="modal-content">



                            <div class="modal-header">



                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>pro-fields/";' aria-label="Close"><span aria-hidden="true">×</span></button>



                              <h4 class="modal-title">Field</h4>



                            </div>



                            <div class="modal-body popup-body">



                              <p>Field has been save successfully!!!</p>



                            </div>



                            <div class="modal-footer">



                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>pro-fields/";'>Close</button>



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