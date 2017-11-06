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

      $color=$site->get_colors($id);

      $subcat=$color[0]['subcat'];

      $style=$color[0]['style_id'];$style_name=$color[0]['style'];

	    $name=explode(",",$color[0]['name']);

      $cvalue=explode(",",$color[0]['value']);

      $img=explode(",",trim($color[0]['img'],","));

      $button="Update";

      $action="update";

   }

   else

    {

      $style="";$button="Save";$action="save";$id="1";$subcat="";$img="";$style_name="";

      $cvalue="";$name="";$old_image="1";

    }

?>

<body class="skin-black sidebar-mini">

    <div class="wrapper">

        <div class="content-wrapper">

                  <section class="content-header">

                      <h1>

                      Add Colors</h1>

                      <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">Add Colors</li>

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

                        <form class="colors" method="post" action="<?php echo $adminurl;?>ajax/form-post.php" autocomplete="off" enctype="multipart/form-data" id="color-form">

                        <input type="hidden" name="type" value="colors">

                        <input type="hidden" value="<?php echo $action;?>" name="action">

                        <input type="hidden" value="<?php echo $id;?>" name="id">

                        <input type="hidden" value="<?php echo $style;?>" name="style_id">

                        <input type="hidden" value="<?php echo $subcat; ?>" name="sub_cat_id">

                          <div class="box-body">

                           

                            <div class="form-group">

                              <label for="exampleInputEmail1">Sub Category Name </label>

                              <select class="form-control"  

                                 style="width: 100%;"

                              data-placeholder="Choose Sub Category" name="subcat_name">

                                  <option <?php if($subcat=="1"){?> selected <?php }?>

                                    value="1">Suits & Blazers

                                  </option>

                                  <option <?php if($subcat=="2"){?> selected <?php }?>

                                    value="2">Shirts

                                  </option>

                                   <option <?php if($subcat=="5"){?> selected <?php }?>

                                    value="5">Coat

                                  </option>

                              </select>

                            </div>

                             <div class="form-group">

                              <label for="exampleInputEmail1">Style Name </label>

                              <?php if(!isset($_GET['type'])){?>

                              <select class="form-control" name="style_name"  

                                style="width: 100%;" tabindex="-1" aria-hidden="true">

                                <option <?php if($style=="1"){?> selected <?php }?> value="1">Monogram Thread Color</option>

                                <option <?php if($style=="2"){?> selected <?php }?> value="2">Neck Lining</option>

                                <option <?php if($style=="3"){?> selected <?php }?> value="3">Elbow Patches</option>

                                <option <?php if($style=="4"){?> selected <?php }?> value="4">Pocket Square</option>

                                <option <?php if($style=="5"){?> selected <?php }?> value="5">Button Holes</option>

                                <option <?php if($style=="6"){?> selected <?php }?> value="6">Button Threads</option>

                                <option <?php if($style=="7"){?> selected <?php }?> value="7">Lapel Color</option>

                                <option <?php if($style=="8"){?> selected <?php }?> value="8">MONOGRAM POSITION CUFF POCKET COLLAR</option>

                                <option <?php if($style=="9"){?> selected <?php }?> value="9">CUSTOMIZE COLLAR LINING</option>

                                <option <?php if($style=="10"){?> selected <?php }?> value="10">CUSTOMIZE CUFF STYLING</option>
                                <option <?php if($style=="11"){?> selected <?php }?> value="11">Jacket Lining</option>

                              </select>

                              <?php }else{?>

                                <p><?php echo $style_name;?></p>

                              <?php }?>

                            </div>

                            <div class="col-md-1 pull-right">

                            <a href="javascript:void(0);" class="add_color btn btn-info btn-xs">

                              <i class="fa fa-plus"></i> Add More</a>

                            </div>

                            <div class="col-md-12">

                              <table class="responsive table table-border color_table">

                                <thead>

                                  <th width="250">Color Name</th>

                                  <th width="250">Color Value</th>

                                  <th>Image</th>

                                  <th>Actions</th>

                                </thead>

                                <tbody>

                                <?php 

                                if(!isset($_GET['type']))

                                {

                                ?>

                                  <tr>

                                    <td>

                                      <input type="text" class="form-control" name="color_name[]"

                                       placeholder="Color Name">

                                    </td>

                                    <td>

                                      <input type="text" class="form-control my-color" name="color_value[]"

                                       data-control="hue" value="#000000">

                                   </td>

                                    <td>

                                      <input type="file" name="col_img[]" class="form-control" 

                                        placeholder="Color Name">

                                        <input type="hidden" name="old_image[]" 

                                          value="<?php echo $old_image;?>">

                                    </td>

                                    <td>

                                      <a href="javascript:void(0);" class="rem_col btn btn-danger btn-xs">

                                        <i class="fa fa-trash"></i> Remove

                                      </a>

                                    </td>

                                  </tr>

                                  <?php 

                                  }

                                  else

                                  {

                                    for ($j=0; $j <count($name) ; $j++)

                                    { 

                                    ?>

                                    <tr>

                                      <td>

                                        <input type="text" class="form-control" name="color_name[]"

                                        placeholder="Color Name" value="<?php echo $name[$j];?>">

                                      </td>

                                      <td>

                                       <input type="text" class="form-control my-color" 

                                       name="color_value[]" data-control="hue"

                                        value="<?php echo $cvalue[$j];?>">

                                      </td>

                                      <td>

                                        <div class="col-md-2">

                                          <img src="<?php echo $homeurl.$img[$j];?>" 

                                          style="height:30px !important;">

                                          </div>

                                          <div class="col-md-10">

                                          <input type="file" class="form-control" name="col_img[]">

                                          <input type="hidden" name="old_image[]" 

                                          value="<?php echo $img[$j];?>">

                                          </div>

                                          

                                      </td>

                                      <td>

                                      <a href="javascript:void(0);" class="rem_col btn btn-danger btn-xs">

                                        <i class="fa fa-trash"></i> Remove

                                      </a>

                                      </td>

                                    </tr>

                                    <?php  

                                    }

                                  }

                                  ?>

                                </tbody>

                              </table>

                            </div>

                          </div><!-- /.box-body -->

                          <div class="box-footer">

                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>

                            <input type="submit" name="banner_add" class="btn btn-primary" value="<?php echo $button;?>">

                          </div>

                        </form>

                      </div><!-- /.box -->

                    </div><!--/.col (left) -->

                    <div class="example-modal" id="modal1">

                      <div class="modal">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>colors/";' aria-label="Close"><span aria-hidden="true">×</span></button>

                              <h4 class="modal-title">Color</h4>

                            </div>

                            <div class="modal-body popup-body">

                              <p>Custom Colors has been save successfully!!!</p>

                            </div>

                            <div class="modal-footer">

                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>colors/";'>Close</button>

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