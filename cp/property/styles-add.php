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



    $subcat=$site->get_all_sub_category();



    $pros=$site->get_properties();



    if(isset($_GET['type']))



    {



      $id=$_GET['type'];



      $var=$site->get_properties_styles($id);



      $name=$var[0]['value'];$id=$var[0]['id'];$psid=$var[0]['psid'];



      $subcatid=explode(",",$var[0]['subcatid']);



      $subid=explode(",",$var[0]['subid']);



      $button="Update";



      $action="update";



    }



    else



    {



      $name="";$button="Save";$action="save";$id=array();$subcatid=array();$subid=array();$psid="";



    }



?>



<body class="skin-black sidebar-mini">



    <div class="wrapper">



        <div class="content-wrapper">



                  <section class="content-header">



                      <h1>



                        Label Style Add Form



                      </h1>



                      <ol class="breadcrumb">



                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>



                        <li class="active">Label Style Form</li>



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



                        <form class="variant" method="post" action="" autocomplete="off">



                        <input type="hidden" name="type" value="property_style_details">



                        <input type="hidden" value="<?php echo $action;?>" name="action">



                        <input type="hidden" value="<?php echo $id;?>" name="id">



                          <div class="box-body">



                            <div class="form-group">



                              <label for="exampleInputEmail1">Property Label</label>



                                <select name="label" class="form-control">



                                <option value="">--Select Sub Category--</option>



                                  <?php foreach($pros as $key =>$val){?>



                                    <option <?php if($pros[$key]['id']==$psid){?> selected <?php }?>



                                       value="<?php echo $pros[$key]['id'];?>"><?php echo $pros[$key]['label'];?></option>



                                    <?php }?>



                                </select>



                             </div>                         



                            <div class="form-group">



                              <label for="exampleInputEmail1">Sub Category Title</label>



                                <select name="sub_category[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Choose a Options" style="width: 100%;" tabindex="-1" aria-hidden="true">



                                <option value="">--Select Sub Category--</option>



                                  <?php foreach($subcat as $key =>$val){?>



                                    <option <?php if(in_array($subcat[$key]['id'],$subid)){?> selected <?php }?>



                                       value="<?php echo $subcat[$key]['id'];?>"><?php echo $subcat[$key]['subcat_name'];?></option>



                                    <?php }?>



                                </select>



                                  <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0"><ul class="select2-selection__rendered"></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>



                            </div>



                            <div class="form-group">



                                <label for="exampleInputEmail1">Label Style Title</label>



                                <input type="text" class="form-control" name="style_name" value="<?php echo $name;?>" placeholder="Enter Title of Label Style">



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



                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>styles/";' aria-label="Close"><span aria-hidden="true">×</span></button>



                              <h4 class="modal-title">Label Styles</h4>



                            </div>



                            <div class="modal-body popup-body">



                              <p>Label Styles has been save successfully!!!</p>



                            </div>



                            <div class="modal-footer">



                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>styles/";'>Close</button>



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



