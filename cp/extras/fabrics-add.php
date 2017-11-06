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

    $cat=$site->get_all_category();

    if(isset($_GET['type']))

    {

      $id=$_GET['type'];

       $var=$site->get_fabrics($id);
$rand=$var[0]['f_rand'];
      $name=$var[0]['fab_name'];
            $price=$var[0]['fab_price'];

      $fabric_img=$var[0]['fab_img'];$fabric_desc=$var[0]['fab_desc'];
      $category=$var[0]['category'];
      $default_img=$var[0]['default_img'];
      $button="Update";

      $action="update";

    }

    else

    {

      $name="";$button="Save";$action="save";$id="";$fabric_img="";$price="";$fabric_desc="";
      $default_img="";$category="";

    }

?>

<body class="skin-black sidebar-mini">

    <div class="wrapper">

        <div class="content-wrapper">

                  <section class="content-header">

                      <h1>

                        Fabrics Add Form

                      </h1>

                      <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">Fabrics Form</li>

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

                        <form class="fabric" method="post" action="" autocomplete="off" enctype="multipart/form-data" id="fabric-form">

                        <input type="hidden" name="type" value="fabrics">

                        <input type="hidden" value="<?php echo $action;?>" name="action">

                        <input type="hidden" value="<?php echo $id;?>" name="id">
                        <input type="hidden" value="<?php echo $rand;?>" name="rand">

                          <div class="box-body">

                            <div class="form-group">

                              <label for="exampleInputEmail1">Fabrics Name</label>

                               <input type="text" class="form-control" name="fabric_name" placeholder="Enter Fabric Name" 

                               value="<?php echo $name;?>">

                            </div>

                             <div class="form-group">

                              <label for="exampleInputEmail1">Fabric Image</label>

                              <input type="file" class="form-control product_image" data-img="fabric" name="userfile">

                            </div>

                            <input type="hidden" name="old_image" value="<?php echo $fabric_img;?>">

                            <div class="pro_images">

                              <?php if(isset($_GET['type'])){?>

                              <img src="<?php echo $homeurl.$fabric_img;?>" height="150" width="200"><?php }?>

                            </div><br>

                             <div class="form-group">

                              <label for="exampleInputEmail1">Fabric Dscription</label>

                              <textarea class="form-control description" name="fabric_desc" rows="7"  placeholder="Enter Description for Fabric"><?php echo $fabric_desc;?></textarea>

                            </div>
                            <div class="form-group">

                              <label for="exampleInputEmail1">Fabrics Price</label>

                               <input type="text" class="form-control" name="fabric_price" placeholder="Enter Fabric Price" 

                               value="<?php echo $price;?>">

                            </div>
                              <?php if(!isset($_GET['type'])){?>
                            <div class="row">
                               <div class="col-md-2">
                                 <div class="form-group">
                                    <button type="button" class="add_fab btn btn-danger btn-xs"><i class="fa fa-plus"></i> Add More</button>
                                 </div>
                               </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                      <select class="form-control" name="category[]">
                                        <?php $sub=$site->get_all_sub_category();
                                        foreach ($sub as $key => $value) {
                                          if($value['id']!="6")
                                          {
                                          ?>
                                          <option <?php if($category==$sub[$key]['id']) {?> selected <?php }?>
                                           value="<?php echo $sub[$key]['id'];?>"><?php echo $sub[$key]['subcat_name'];?></option>
                                        <?php
                                        }
                                      }
                                        ?>
                                      </select>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Default Product Image</label>
                                  <input type="file" class="form-control" name="default_img[]"><br>
                                </div>
                              </div>
                              </div>

                            <div class="more_fab">
                            </div>
                             <div class="loading">
                             </div>
                            <?php }else{?>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                      <select class="form-control" name="category">
                                        <?php $sub=$site->get_all_sub_category();
                                        foreach ($sub as $key => $value) {
                                          if($value['id']!="6")
                                          {
                                          ?>
                                          <option <?php if($category==$sub[$key]['id']) {?> selected <?php }?>
                                           value="<?php echo $sub[$key]['id'];?>"><?php echo $sub[$key]['subcat_name'];?></option>
                                        <?php
                                      }
                                        }
                                        ?>
                                      </select>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Default Product Image</label>
                                  <input type="file" class="form-control" name="default_img"><br>
                                </div>
                              </div>
                                <input type="hidden" name="old_image1" value="<?php echo $default_img;?>">
                              </div>
                               <?php if(isset($_GET['type'])){?>

                              <img src="<?php echo $homeurl.$default_img;?>" height="150" width="200"><?php }?>

                            <?php }?>
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

                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>fabrics/";' aria-label="Close"><span aria-hidden="true">×</span></button>

                              <h4 class="modal-title">Fabrics</h4>

                            </div>

                            <div class="modal-body popup-body">


                            </div>

                            <div class="modal-footer">

                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>fabrics/";'>Close</button>

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

