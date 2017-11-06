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



      $var=$site->get_variant_by_id($id);



      $name=$var[0]['name'];$options=$var[0]['options'];



      $button="Update";



      $action="update";



    }



    else



    {



      $name="";$button="Save";$action="save";$id="";$options="";



    }



?>



<body class="skin-black sidebar-mini">



    <div class="wrapper">



        <div class="content-wrapper">



                  <section class="content-header">



                      <h1>



                        Variants Add Form



                      </h1>



                      <ol class="breadcrumb">



                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>



                        <li class="active">Variants Form</li>



                      </ol>



                </section>



                <section class="content">



                  <div class="dg" style="display:none;">



                  asdkj



                  </div>



                  <div class="row">



                    <!-- left column -->



                    <div class="col-md-8">



                      <!-- general form elements -->



                      <div class="box box-primary">



                        <div class="box-header with-border">



                          



                        </div><!-- /.box-header -->



                        <!-- form start -->



                        <form class="variant" method="post" action="" autocomplete="off">



                        <input type="hidden" name="type" value="variants">



                        <input type="hidden" value="<?php echo $action;?>" name="action">



                        <input type="hidden" value="<?php echo $id;?>" name="id">



                          <div class="box-body">



                            <div class="form-group">



                              <label for="exampleInputEmail1">Variant Title</label>



                              <input type="text" class="form-control" name="title" value="<?php echo $name;?>" placeholder="Enter Title of Variant">



                            </div>



                             <div class="form-group">



                              <label for="exampleInputEmail1">Variant Options</label>



                              <input type="text" class="form-control tags_1" name="options[]" value="<?php echo $options;?>" placeholder="Enter Options Separated by Comma">



                            </div>



                          </div><!-- /.box-body -->



                          <div class="box-footer">



                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>



                            <input type="submit" name="variant_add" class="btn btn-primary" value="<?php echo $button;?>">



                          </div>



                        </form>



                      </div><!-- /.box -->



                    </div><!--/.col (left) -->



                    <div class="example-modal" id="modal1">



                      <div class="modal">



                        <div class="modal-dialog">



                          <div class="modal-content">



                            <div class="modal-header">



                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>variants/";' aria-label="Close"><span aria-hidden="true">×</span></button>



                              <h4 class="modal-title">Variant</h4>



                            </div>



                            <div class="modal-body popup-body">



                              <p>Variant has been save successfully!!!</p>



                            </div>



                            <div class="modal-footer">



                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>variants/";'>Close</button>



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



