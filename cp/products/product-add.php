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
    $vd=$site->get_all_vendors();

    if(isset($_GET['type']))

    {

      $id=$_GET['type'];

      $pro=$site->get_product_by_id($id);

      $pro_name=$pro[0]['product_name'];$pro_id=$pro[0]['id'];

      $info=$pro[0]['p_info'];$waist_price=$pro[0]['waist_price'];$option3=$pro[0]['backend'];

      $pro_desc=$pro[0]['description'];$fab_nam=explode(",",$pro[0]['fabid']);
      $extra_pant=$pro[0]['extra_pant'];
      $price=str_replace(",","",$pro[0]['price']);

      $price=number_format($price);$option2=$pro[0]['frontend'];

      //$cprice=str_replace(",","",$pro[0]['compare_price']);

      //$cprice=number_format($cprice);

      //$weight=$pro[0]['weight'];

      $images=$pro[0]['image'];$style=$pro[0]['style'];

     

      

      //$variants=$pro[0]['variants'];$vendor=explode(",",$pro[0]['vendor']);

      //$sku=$pro[0]['sku'];

      $action="products_update";$subcatid=$pro[0]['sub_category'];

      $cat_name=$pro[0]['category'];$subcat_name=$pro[0]['sub_category'];$button="Update Product";

      $featured=$pro[0]['featured'];$h_img=$pro[0]['h_img'];

      $highlighted=$pro[0]['highlighted'];

      //$row_id=count($variants);

    }

    else

    {

      $pro_id="";$pro_name="";$pro_desc="";$price="";$cprice="";$sku="";$weight="";$action="products_add";

      $button="Save Product";$vendor=array();$row_id="1000";$subcat_name="";$fab_nam=array();

      $cat_name="";$featured="";$highlighted="";$h_img="";$waist_price="";

    }

?>

<body class="skin-black sidebar-mini">

    <div class="wrapper">

        <div class="content-wrapper">

                  <section class="content-header">

                      <h1>

                        Add Product

                      </h1>

                      <?php 

                      $default=array();

                      $style=explode(",",$style);

                      for ($i=0; $i < count($style); $i++) { 

                      $default[$i]=explode(":",$style[$i]);

                      }

                      ?>

                      <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">Add Product</li>

                      </ol>

                </section>

                <section class="content">

                <form  method="post" id="product-add" class="products" action="" enctype="multipart/form-data">

                <div class="row">

                    <!-- left column -->

                    <div class="col-md-12">

                      <!-- general form elements -->

                      <div class="box box-primary">

                        <div class="box-header with-border">          

                          <h3 class="box-title">General</h3>   

                        </div>        

                        <!-- form start -->

                       

                        <input type="hidden" name="product_id" value="<?php echo $pro_id;?>">

                        <input type="hidden" name="type" value="products">

                        <input type="hidden" name="action" value="<?php echo $action;?>">

                          <div class="box-body">

                            <div class="form-group">

                              <label for="exampleInputEmail1">Title</label>

                              <input type="text" class="form-control" name="product_title" placeholder="Enter Title of Product"

                                value="<?php echo $pro_name;?>">

                            </div>

                            <div class="form-group">

                              <label for="exampleInputPassword1">Description</label>

                              <textarea class="description form-control" name="product_desc" placeholder="Enter Description of Product"><?php echo $pro_desc;?></textarea>

                            </div>    

                              <div class="form-group">

                              <label for="exampleInputPassword1">Additional Info</label>

                              <textarea class="description form-control" name="product_info" placeholder="Enter Description of Product"><?php echo $info;?></textarea>

                            </div>    

                              <div class="form-group">

                                    <label for="exampleInputFile">Product Price</label>

                                    <input type="text" class="form-control price-ip" name="price" id="product_price" placeholder="Price"

                                    value="<?php echo $price;?>">

                               </div>                                                  

                          </div><!-- /.box-body -->

        

                        

                      </div><!-- /.box -->

                       <div class="box box-primary style_properties col-md-12">

                            <div class="box-header with-border">          

                              <h3 class="box-title">Options</h3>   

                            </div> 

                            <div class="box-body">    

                                  <div class="form-group">

                                      <label style="width:150px;" for="exampleInputEmail1">Featured Product</label>

                                      <label class="" style="margin-left:10px;">

                                        <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">

                                          <input type="checkbox" name="option1" value="1" <?php if($featured=="1"){?> checked <?php }?>

                                                               class="flat-red"  style="position: absolute; opacity: 0;">       

                                          <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 

                                            height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">

                                          </ins>

                                        </div>&nbsp;&nbsp;Yes

                                      </label>

                                    </div>

                                     <div class="form-group">

                                      <label style="width:150px;" for="exampleInputEmail1">Display Product in</label>

                                      <label class="" style="margin-left:10px;">

                                       <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">

                                          <input type="checkbox" name="option2" value="1" <?php if($option2=="1"){?> checked <?php }?> class="flat-red"  style="position: absolute; opacity: 0;">



                                        </div>&nbsp;&nbsp;Frontend

                                      </label>

                                       <label class="" style="margin-left:10px;">

                                       <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">

                                          <input type="checkbox" name="option3" value="1" <?php if($option3=="1"){?> checked <?php }?> class="flat-red"  style="position: absolute; opacity: 0;">



                                        </div>&nbsp;&nbsp;Backend

                                      </label>

                                    </div>

                            </div>

                      </div>

                    </div><!--/.col (left) -->

                    <div class="col-md-12">

                         <div class="box box-info">

                            <div class="box-header with-border">          

                              <h3 class="box-title">Images</h3>   

                            </div> 

                            <div class="box-body">      

                               <?php if(isset($_GET['type'])){?>

                                  <div class="form-group col-md-12">

                                    <label for="exampleInputFile">Product Images</label><br />

                                        <?php 

                                        if(!empty($images))

                                        {

                                          $pro_img='1';

                                          

                                        foreach ($images as $key => $value) {

                                        ?>

                                        <div class="image-list" style="width:150px;float:left;">

                                          <img src="<?php echo $homeurl.$images[$key]['image'];?>" height="100"  width="133"

                                          style="margin-left:10px;margin-top:10px;">

                                          <div class="image-hover">

                                            <a href="javascript:void(0);" style="margin-left:20px;" alt="Delete" title="Delete" data-field="p_img_id" class="delete-data" data-table="product_images" data-id="<?php echo $images[$key]['i_id']?>"><i class="fa fa-trash"></i></a>

                                            <a href="javascript:void(0);" style="margin-left:20px;" data-img="<?php echo $homeurl.$images[$key]['image'];?>" data-href="view-image" alt="View" title="View" class="popup view-image-btn" data-table="product_images" data-id="<?php echo $images[$key]['i_id']?>"><i class="fa fa-eye"></i></a>

                                          </div>

                                        </div>

                                        <?php 

                                        }

                                      }

                                        ?>

                                  </div>

                                   <div class="example-modal" id="view-image">

                                    <div class="modal">

                                      <div class="modal-dialog">

                                        <div class="modal-content">

                                          <div class="modal-header">

                                            <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>

                                            <h4 class="modal-title">View Image</h4>

                                          </div>

                                          <div class="modal-body image-div-view" style="max-height: 450px;overflow: auto;">

                                                 

                                          </div>

                                          <div class="modal-footer">

                                          <button type="button" class="btn btn-default pull-right" onclick='window.location.href=""';>Close</button>

                                          </div>

                                        </div><!-- /.modal-content -->

                                      </div><!-- /.modal-dialog -->

                                    </div><!-- /.modal -->

                                  </div>  

                                  <?php }?>

                                  <div class="form-group">

                                    <label for="exampleInputFile">Choose Product Images</label>

                                    <input type="file" name="userfile[]" data-img="product" class="product_image form-control" multiple id="exampleInputFile">

                                    <p class="help-block">You can choose multiple images by holding Ctrl button.<br>The Product Image Size must be  390px width and 

                                    674px height </p>

                                  </div>

                                  <input type='hidden' name='pro_img' value="<?php echo $pro_img;?>">

                                   <div class="form-group image-div hide" style="display: block;">

                                      <label for="exampleInputFile col-md-12">Product Images</label>

                                      <div class="col-md-12 pro_images">

                                        <p>Images will be shown here.</p>

                                      </div><br /><br /><br />

                                  </div>

                            </div>

                          </div> 

                          <div class="box box-danger">

                            <div class="box-header with-border">          

                              <h3 class="box-title">Categories</h3>   

                            </div> 

                            <div class="box-body">      

                                

                                

                                   <div class="form-group">

                                      <label for="exampleInputEmail1">Category</label>

                                        <select class="form-control category" name="category">

                                          <option value="">--Select Category--</option>

                                          <?php 

                                          foreach($cat as $key=>$val)

                                          {

                                             if($cat[$key]['name']=="Shop")

                                            {

                                          ?>

                                            <option <?php if($cat_name==$cat[$key]['id']){?> selected <?php }?>

                                              value="<?php echo $cat[$key]['id'];?>"><?php echo $cat[$key]['name'];?></option>

                                          <?php 

                                            }

                                          }

                                          ?>

                                        </select>

                                    </div>

                                  <div class="sub_cat">

                                      <?php 

                                      

                                      if(isset($_GET['type']))

                                      {

                                        $subcat=$site->get_all_sub_category('',$cat_name);

                                       ?>

                                         <div class="form-group">

                                          <label for="exampleInputEmail1">Sub Category</label>

                                            <select class="form-control sub_category" name="sub_category">

                                              <option value="">--Select Sub Category--</option>

                                              <?php 

                                              foreach($subcat as $key=>$val)

                                              {



                                              ?>

                                                <option <?php if($subcat_name==$subcat[$key]['id']){?> selected <?php }?>

                                                  value="<?php echo $subcat[$key]['id'];?>"><?php echo $subcat[$key]['subcat_name'];?></option>

                                              <?php 

                                              }

                                              ?>

                                            </select>

                                        </div>

                                        <?php 

                                      }

                                      ?>

                                    </div>
                                    <?php 
                                    if($subcat_name=="5")
                                      $s_class="style='display:none;'";
                                    ?>
                                    <div class="form-group fab-div" <?php echo $s_class;?>>

                                      <label for="exampleInputEmail1">Fabric</label>

                                        <select class="form-control fabric-class select2 select2-hidden-accessible" name="fabric[]" multiple="" data-placeholder="Choose a Fabric" style="width: 100%;" tabindex="-1" aria-hidden="true">

                                          <option value="">--Select Fabric--</option>

                                          <?php 
                                           $fab=$site->get_fabrics2('','',$subcat_name);

                                          foreach($fab as $key=>$val)

                                          {

                                          ?>

                                            <option data-id="<?php echo $fab[$key]['sub_cat_id'];?>"

                                               <?php if(in_array($fab[$key]['id'],$fab_nam)){?> selected <?php }?>

                                              value="<?php echo $fab[$key]['id'];?>"><?php echo $fab[$key]['fab_name']." - ".$fab[$key]['sub_cat_name'];?></option>

                                          <?php 

                                          }

                                          ?>

                                        </select>

                                        <div class="fab_images">

                                          <?php 

                                           foreach($fab as $key=>$val)

                                            if(in_array($fab[$key]['id'],$fab_nam)){

                                          {

                                          if($val['fab_name']!='In-Store Fabric Selection') {?>

                                          <img src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" 

                                          style="width:100px;height:100px;margin-top:20px;">
                                          <?php } else { ?>
                                          <img src="<?php echo $homeurl; ?>assets/dimg/fabric/instore_fab.jpg" 

                                          style="width:100px;height:100px;margin-top:20px;">
                                          <?php } ?>

                                        <?php

                                          }

                                        }

                                          ?>

                                        </div>

                                    </div>

                                    <?php if(isset($_GET['type']) && $subcatid=="1" ){?>

                                      <div class="form-group waist_div">

                                        <label for="exampleInputEmail1">Vest Price </label>

                                         <input type="text" class="form-control waist_ip" name="waist_price" placeholder="Vest Price"

                                    value="<?php echo $waist_price;?>">

                                    </div>

                                    <?php }else{?>

                                    <div class="form-group waist_div hide">

                                        <label for="exampleInputEmail1">Vest Price </label>

                                         <input type="text" class="form-control waist_ip" name="waist_price" placeholder="Vest Price"

                                    value="<?php echo $waist_price;?>">

                                    </div>

                                    <?php }?>


                                    <?php if(isset($_GET['type']) && $subcatid=="1" ){?>

                                      <div class="form-group waist_div">

                                        <label for="exampleInputEmail1">Extra Pant Price</label>

                                         <input type="text" class="form-control waist_ip" name="extra_pant" placeholder="Extra Pant Price"

                                    value="<?php echo $extra_pant;?>">

                                    </div>

                                    <?php }else{?>

                                    <div class="form-group waist_div hide">

                                        <label for="exampleInputEmail1">Extra Pant Price </label>

                                         <input type="text" class="form-control waist_ip" name="extra_pant" placeholder="Extra Pant Price"

                                    value="<?php echo $extra_pant;?>">

                                    </div>

                                    <?php }?>

                            </div>

                          </div>

                    </div>

                  </div>

                   <div class="box box-success style_properties col-md-12" <?php echo $s_class;?>>

                            <div class="box-header with-border">          

                              <h3 class="box-title">Default Style Properties</h3>   

                            </div> 

                            <div class="box-body style_div">

                            </div>

                      </div>

                  <div class="row">

                    <!-- right column -->

                    <div class="example-modal" id="product-add">

                      <div class="modal">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>products/";' aria-label="Close"><span aria-hidden="true">×</span></button>

                              <h4 class="modal-title">Product</h4>

                            </div>

                            <div class="modal-body popup-body">

                              <p>Prodcut has been save successfully!!!</p>

                            </div>

                            <div class="modal-footer">

                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>products/";'>Close</button>

                            </div>

                          </div><!-- /.modal-content--> 

                        </div><!-- /.modal-dialog -->

                      </div><!-- /.modal -->

                    </div>  

                  

                    <div class="col-md-12">

                    <div class="box-footer">

                          <a href="javascript:void(0);" data-href="product-add" class="popup save" style="display:none;">asd</a>

                            <button type="submit" class="btn btn-primary"><?php echo $button;?></button>

                               <button type="button" class="btn btn-info" onClick="window.location.href='<?php echo $adminurl;?>products/';">Cancel</button>

                          </div>

                    </div>

                 

                </div>

                 </form>

        </section>

        </div>

    </div>

</body>

<?php }

?>