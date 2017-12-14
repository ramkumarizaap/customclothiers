<?php

if(!isset($_SESSION['user_id']))

{

  header("Location:{$homeurl}login/");

}

else

{

require_once('includes/action/config.php');



if(is_numeric($_GET['id'])) {

  $id = $_GET['id'];

}

else {

  $id = $_GET['id'];

}



if(is_numeric($_GET['orderid'])) {

  $orderid = $_GET['orderid'];

}

else {

  $orderid = $_GET['orderid'];

}



/*$id=isset($_GET['id']) ? $_GET['id'] : "";



$orderid=isset($_GET['orderid']) ? $_GET['orderid'] : "";*/

$ids = mysqli_real_escape_string($con,$id);

if(!empty($ids) && is_numeric($id)) 

{

    $measurement_id = $_GET['id'];

    $action="update";

    $measurement_full_dtl_qry = mysqli_query($con,"select b.*,a.mp_id,a.mp_weight,a.mp_height,a.mp_name,a.mp_name,a.mp_chest,a.mp_abdomen,a.mp_buttocks,a.mp_hips,c.labelname FROM measurement_profile_master a,measurement_profile_value b,measurement_profile_fields c  WHERE a.mp_id=$id  and a.mp_id=b.mpid and b.mpfid=c.mpf_id");

    if(mysqli_num_rows($measurement_full_dtl_qry)) {

      $measurement_full_dtl=mysqli_fetch_array($measurement_full_dtl_qry);

       $mp_height =  preg_replace('/[^a-zA-Z\s]/', '', $measurement_full_dtl['mp_height']);

  }

}

else

{

  $action="save";

}

$ids1 = mysqli_real_escape_string($con,$orderid);



if(!empty($ids1) && is_numeric($orderid)) {

     $order_dtl_qry = mysqli_query($con, 'select order_id,subcatid from order_master where om_id="'.$_GET["orderid"].'"' );

     if(mysqli_num_rows($order_dtl_qry)) {

      $order_dtl=mysqli_fetch_array($order_dtl_qry);

      $order_id = $order_dtl['order_id'];

      $subcatid = $order_dtl['subcatid'];

      if($subcatid!='') {

        $type_dtl_qry = mysqli_query($con, 'select sub_cat_name from sub_category_master where sub_cat_id="'.$subcatid.'"' );

          if(mysqli_num_rows($type_dtl_qry)) {

            $type_dtl=mysqli_fetch_array($type_dtl_qry);

            $type = $type_dtl['sub_cat_name'];

          }

      }



  }

}



}



?>



<script type="text/javascript">

    var region_url = '/en/';

    var currency = {

        "iso": "EUR",

        "symbol": "\u20ac"

    };

    var cdn_host = 'https://localhost/shopping-cart/';

    var ready_callbacks = [];

    var ga_callbacks = [];

    var mobile_enabled = false;

    var dataLayer = [{

        "region": "en",

        "lang": "en",

        "currency": {

            "iso": "EUR",

            "symbol": "\u20ac"

        },

        "length_units": "cm",

        "weigth_units": "kg",

        "gender": "woman",

        "menu_item": "customer",

        "cart_n_products": 0,

        "cart_price": 9.95,

        "isAdmin": false,

        "mobile_device": false,

        "mobile_ready": true,

        "mobile_enabled": false,

        "customer_logged": 1,

        "device_type": "desktop",

        "customer_id": "252887",

        "customer_segment": "voyeur",

        "customer_n_orders": "0",

        "customer_samples": "0",

        "customer_last_order": null

    }];

</script>





  <section id="Content" role="main">

      <div class="container">



          <!-- SECTION EMPHASIS 1 -->

          <!-- FULL WIDTH -->

      </div><!-- !container -->

      <div class="full-width section-emphasis-1 page-header">

          <div class="container">

              <header class="row">

                  <div class="col-md-12">

                      <h1 class="strong-header pull-left">

                          My account

                      </h1>

                      <!-- BREADCRUMBS -->

                      <ul class="breadcrumbs list-inline pull-right">

                          <li><a href="index.html">Home</a></li><!--

                          --><li><a href="<?php echo $homeurl;?>shop/">Shop</a></li><!--

                          --><li>Add Profile</li>

                      </ul>

                      <!-- !BREADCRUMBS -->

                  </div>

              </header>

          </div>

      </div><!-- !full-width -->

      <div class="container">

          <!-- !FULL WIDTH -->

          <!-- !SECTION EMPHASIS 1 -->



          <section class="row" id="measure_wizard">

              <div class="col-sm-3">

                  <nav class="shop-section-navigation element-emphasis-weak">

                      <ul class="list-unstyled">

                          <!--<li><a href="09-a-shop-account-dashboard.html">Account dashboard</a></li>-->

                           <li><a href="<?php echo $homeurl;?>account-information/">Account information</a></li>

                          <li><a href="<?php echo $homeurl;?>my-orders/">My orders</a></li>

                          <li class="active"><span><a href="<?php echo $homeurl;?>my-measurements/">My Measurements</span></a></li>

                          <li><a href="<?php echo $homeurl;?>address-book/">Address book</a></li>

                          <!--<li><a href="#">My wishlist</a></li>-->

                          <li><a href="<?php echo $homeurl;?>logout/">Logout</a></li>

                      </ul>

                  </nav>

              </div>

              <div class="clearfix visible-xs space-30"></div>

            <form role="form" action="#" id="measure_wizard_form" method="post" novalidate>

            <input type="hidden" name="type" value="measurements">

            <input type="hidden" name="measurement_id" value="<?php if(!empty($measurement_full_dtl['mp_id'])) { echo $measurement_full_dtl['mp_id']; } ?>">

            <input type="hidden" name="mp_height" value="<?php if(!empty($mp_height)) { echo $mp_height; } ?>">

            <input type="hidden" name="action" value="<?php echo $action; ?>">

            <input type="hidden" name="mp_weight" value="<?php if(!empty($measurement_full_dtl['mp_weight'])) { echo intval($measurement_full_dtl['mp_weight']); } ?>"/>

            <input type="hidden" name="order_id" value="<?php if(!empty($_GET['orderid'])) { echo $_GET['orderid']; } ?>">

            <input type="hidden" name="order_id1" value="<?php if(!empty($order_id)) { echo $order_id; } ?>">

            <input type="hidden" name="from_id" value="<?php if(!empty($id)) { echo $id; } ?>">

            <input type="hidden" name="switch_opt" value="">

             <div class="wizard_step start">

                <h2 class="strong-header large-header">Add New Profile</h2>

                    <div class="">

                      <div class="col first_info col-md-4 col-sm-4 new-profile-form">

                          <div class="form start_form">

                              <div class="input name form-group">

                                  <label class="title">Name</label>

                                  <input type="text" class="text profile_name form-control" name="title" maxlength="50" value="<?php if(!empty($measurement_full_dtl['mp_name'])) { echo $measurement_full_dtl['mp_name']; } ?>" placeholder="Name" />

                              </div>

                              <div class="input height form-group">

                                  <label class="title">Height </label> <br />

                                  <input class="text num height_cm form-control mx-330" name="height" size="6" value="<?php if(!empty($measurement_full_dtl['mp_height'])) { echo intval($measurement_full_dtl['mp_height']); } ?>" placeholder="Height" />

                                  

                                  <select class="num height_en feet" name="feet">

                                      <option value=""></option>

                                      <option value="4" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],0,1) == '4'){ ?> selected="selected"<?php }?>>4</option>

                                      <option value="5" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],0,1) == '5'){ ?> selected="selected"<?php }?>>5</option>

                                      <option value="6" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],0,1) == '6'){ ?> selected="selected"<?php }?>>6</option>

                                      <option value="7" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],0,1) == '7'){ ?> selected="selected"<?php }?>>7</option>

                                  </select>

                                  <span class="feet height_en bold">feet&nbsp;&nbsp;</span>

                                  <select class="num height_en inches" name="height_in">

                                      <option value=""></option>

                                      <option value="1" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '1'){ ?> selected="selected"<?php }?>>1</option>

                                      <option value="2" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '2'){ ?> selected="selected"<?php }?>>2</option>

                                      <option value="3" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '3'){ ?> selected="selected"<?php }?>>3</option>

                                      <option value="4" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '4'){ ?> selected="selected"<?php }?>>4</option>

                                      <option value="5" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '5'){ ?> selected="selected"<?php }?>>5</option>

                                      <option value="6" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '6'){ ?> selected="selected"<?php }?>>6</option>

                                      <option value="7" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '7'){ ?> selected="selected"<?php }?>>7</option>

                                      <option value="8" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '8'){ ?> selected="selected"<?php }?>>8</option>

                                      <option value="9" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '9'){ ?> selected="selected"<?php }?>>9</option>

                                      <option value="10" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '10'){ ?> selected="selected"<?php }?>>10</option>

                                      <option value="11" <?php if(!empty($measurement_full_dtl['mp_height']) && substr($measurement_full_dtl['mp_height'],7,1) == '11'){ ?> selected="selected"<?php }?>>11</option>

                                  </select>

                                  <span class="units bold">cm</span>

                              </div>

                              <div class="input weight form-group">

                                  <label class="title">Weight</label>

                                  <input class="text num weight form-control mx-330" name="weight" size="6" value="<?php if(!empty($measurement_full_dtl['mp_weight'])) { echo intval($measurement_full_dtl['mp_weight']); } ?>" placeholder="Weight"/><span class="units weight">kg</span>

                                  

                              </div>

                              <div class="input height form-group">

                                  <label class="title">Gender </label> <br />                                  

                                  <select class="num" name="gender">

                                      <option value="male" <?php if(!empty($measurement_full_dtl['gender']) && $measurement_full_dtl['gender'] == 'male'){ ?> selected="selected"<?php } else { ?>selected="selected" <?php } ?>>Male</option>

                                      <option value="female" <?php if(!empty($measurement_full_dtl['gender']) && $measurement_full_dtl['gender'] == 'female'){ ?> selected="selected"<?php } ?>>Female</option>

                                  </select>

                                 <span class="invalid_imc" style="display:none;"><em>Invalid Height or Weight</em></span>

                              </div>

                             <div class="input switch form-group">

                                  <a href="javascript:;" class="switch btn btn-primary btn-mini"> 

                                    <span class="iso">Switch to metric</span>

                                     <span class="en">Switch to imperial</span>

                                  </a>

                              </div>

                            </div>

                          </div>

                          <div class="col  constitutions col-md-5 col-sm-5" >

                            <div id="models_woman" class="models_woman">

                              <div class="col">

                                  <div class="constitution chest">

                                      <p class="title"><strong>Chest</strong></p>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_chest" value="very_small" <?php if(!empty($measurement_full_dtl['mp_chest']) && $measurement_full_dtl['mp_chest']=="very_small"){?> checked="checked" <?php } ?>> <span>Very small</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_chest" value="small" <?php if(!empty($measurement_full_dtl['mp_chest']) && $measurement_full_dtl['mp_chest']=="small"){?> checked="checked" <?php } ?>> <span>Small</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_chest" value="normal" <?php if(!empty($measurement_full_dtl['mp_chest']) && $measurement_full_dtl['mp_chest']=="normal"){?> checked="checked" <?php } else if(empty($measurement_full_dtl['mp_chest'])) { ?> checked="checked" <?php } ?>> <span>Normal</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_chest" value="big" <?php if(!empty($measurement_full_dtl['mp_chest']) && $measurement_full_dtl['mp_chest']=="big"){?> checked="checked" <?php } ?>> <span>Large</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_chest" value="very_big" <?php if(!empty($measurement_full_dtl['mp_chest']) && $measurement_full_dtl['mp_chest']=="very_big"){?> checked="checked" <?php } ?>> <span>Very large</span>

                                      </label>

                                  </div>



                                  <div class="constitution abdomen">

                                      <p class="title"><strong>Abdomen</strong></p>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_abdomen" value="very_small" <?php if(!empty($measurement_full_dtl['mp_abdomen']) && $measurement_full_dtl['mp_abdomen']=="very_small"){?> checked="checked" <?php } ?>> <span>Very flat</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_abdomen" value="small" <?php if(!empty($measurement_full_dtl['mp_abdomen']) && $measurement_full_dtl['mp_abdomen']=="small"){?> checked="checked" <?php } ?>> <span>Flat</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_abdomen" value="normal" <?php if(!empty($measurement_full_dtl['mp_abdomen']) && $measurement_full_dtl['mp_abdomen']=="normal"){?> checked="checked" <?php } else if(empty($measurement_full_dtl['mp_abdomen'])) { ?> checked="checked" <?php } ?>> <span>Normal</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_abdomen" value="big" <?php if(!empty($measurement_full_dtl['mp_abdomen']) && $measurement_full_dtl['mp_abdomen']=="big"){?> checked="checked" <?php } ?>> <span>Large</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_abdomen" value="very_big" <?php if(!empty($measurement_full_dtl['mp_abdomen']) && $measurement_full_dtl['mp_abdomen']=="very_big"){?> checked="checked" <?php } ?>> <span>Very large</span>

                                      </label>

                                  </div>



                              </div>

                              

                              <div class="col">

                                  <div class="constitution buttocks">

                                      <!-- CULO: buttocks -->

                                      <p class="title"><strong>Buttocks</strong></p>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_buttocks" value="very_small" <?php if(!empty($measurement_full_dtl['mp_buttocks']) && $measurement_full_dtl['mp_buttocks']=="very_small"){?> checked="checked" <?php } ?>> <span>Very Flat</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_buttocks" value="small" <?php if(!empty($measurement_full_dtl['mp_buttocks']) && $measurement_full_dtl['mp_buttocks']=="small"){?> checked="checked" <?php } ?>> <span>Flat</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_buttocks" value="normal" <?php if(!empty($measurement_full_dtl['mp_buttocks']) && $measurement_full_dtl['mp_buttocks']=="normal"){?> checked="checked" <?php } else if(empty($measurement_full_dtl['mp_buttocks'])) { ?> checked="checked" <?php } ?>> <span>Normal</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_buttocks" value="big" <?php if(!empty($measurement_full_dtl['mp_buttocks']) && $measurement_full_dtl['mp_buttocks']=="big"){?> checked="checked" <?php } ?>> <span>Large</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_buttocks" value="very_big" <?php if(!empty($measurement_full_dtl['mp_buttocks']) && $measurement_full_dtl['mp_buttocks']=="very_big"){?> checked="checked" <?php } ?>> <span>Very Large</span>

                                      </label>

                                  </div>



                                  <div class="constitution hip">

                                      <p class="title"><strong>Hips</strong></p>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_hip" value="very_small" <?php if(!empty($measurement_full_dtl['mp_hips']) && $measurement_full_dtl['mp_hips']=="very_small"){?> checked="checked" <?php } ?>> <span>Very narrow</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_hip" value="small" <?php if(!empty($measurement_full_dtl['mp_hips']) && $measurement_full_dtl['mp_hips']=="small"){?> checked="checked" <?php } ?>> <span>Narrow</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_hip" value="normal" <?php if(!empty($measurement_full_dtl['mp_hips']) && $measurement_full_dtl['mp_hips']=="normal"){?> checked="checked" <?php } else if(empty($measurement_full_dtl['mp_hips'])){ ?> checked="checked" <?php } ?>> <span>Normal</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_hip" value="big" <?php if(!empty($measurement_full_dtl['mp_hips']) && $measurement_full_dtl['mp_hips']=="big"){?> checked="checked" <?php } ?>> <span>Wide</span>

                                      </label>

                                      <label class="opt t4l_radio">

                                          <input type="radio" name="param_hip" value="very_big" <?php if(!empty($measurement_full_dtl['mp_hips']) && $measurement_full_dtl['mp_hips']=="very_big"){?> checked="checked" <?php } ?>> <span>Very wide</span>

                                      </label>

                                  </div>

                              </div>

                          </div>

                          

                          <br />

                          <div class="actions">

                            <a href="javascript:;" class="button measure btn btn-primary btn-mini">



                            <?php 

                            $ids2=mysqli_real_escape_string($con,$_GET['id']);

                            if(!empty($ids2) && is_numeric(mysqli_real_escape_string($con,$_GET['id']))) { ?>Modify Measurements <?php } else { ?> Add Measurements<?php  }?></a>

                        </div>

                      </div>

                  </div>

                  

                </div>



                  <!-- Step: Measures -->

                        <div class="wizard_step measures" style="display:none;">

                            <div class="summary step-1-continue col-md-9 col-sm-9">

                                <div class="profile_name"><span class="value profile_name"></span>

                                <h2 class="strong-header large-header">Profile</h2>

                                </div>

                                <div class="options col-md-12 col-sm-12">

                                    <div class="op col-md-3"><b>Height:</b> <span class="height value"></span><span class="units">cm</span>

                                    </div>

                                    <div class="op col-md-3"><b>Weight:</b> <span class="weight value"></span><span class="units weight">kg</span>

                                    </div>

                                    <div class="op col-md-3"><b>Hips:</b> <span id="op_param_hip" class="value param_hip"></span>

                                    </div>



                                </div>

                                <div class="clearfix"></div> 

                                <div class="options params col-md-12 col-sm-12">

                                    

                                    <div class="op col-md-3"><b>Abdomen:</b> <span id="op_param_abdomen" class="value param_abdomen"></span>

                                    </div>

                                    <div class="op col-md-3"><b>Chest:</b> <span id="op_param_chest" class="value param_chest"></span>

                                    </div>

                                    <div class="op col-md-3"><b>Buttocks:</b> <span id="op_param_buttocks" class="value param_buttocks"></span>

                                    </div>

                                    <div class="col-md-3"><a href="javascript:;" class="edit btn btn-primary btn-mini">Modify</a>

                                  </div> 

                                </div> 

                            </div>





                            <div class="process">

                            

                                <div class="inputs col-md-9 col-sm-9 custom-column step-2-continue">

                                <?php if(isset($_GET['id']) && $_GET['id']!="cart"){

                                  $query1= mysqli_query($con,"select b.*,a.mp_weight,a.mp_name,c.labelname FROM measurement_profile_master a,measurement_profile_value b,measurement_profile_fields c  WHERE a.mp_id='".$_GET['id']."'  and a.mp_id=b.mpid and b.mpfid=c.mpf_id");

                                  while($qr1=mysqli_fetch_array($query1))

                                  {?>

                                <div class="col-sm-6 col-md-3  input input_coat_length form-group">

                                <?php if($qr1['labelname']=='Neck') { 
                                          $m_type='cm';
                                      }
                                      else
                                      {
                                      	$m_type="inches";
                                      }
                                   ?>

                                      <label class="name"><?php echo $qr1['labelname'];?></label>

                                      <input type="text" class="num text  mx-330" value="<?php echo $qr1['mpf_value'];?>" size="4" name="field[value][]" /> 

                                      <input type="hidden" class="" value="<?php echo $qr1['mpfid'] ?>" size="4" name="field[name][]" /> 

                                      <span class="units1"><?php echo $m_type; ?></span>

                                  </div>

                                  <?php 

                                  }

                                  ?>

                                <?php 

                                ?>

                                  <?php } else{?>

                                  <?php $field=$site->get_mpf_feilds('','1');

                                foreach ($field as $key => $value) {?>

                                <?php if($value['name']=='Neck') { 
                                          $m_type='cm';
                                      }
                                      else
                                      {
                                      	$m_type="inches";
                                      }
                                   ?>

                                 <div class="col-sm-6 col-md-3  input input_coat_length form-group">

                                      <label class="name"><?php echo $value['name'];?></label>

                                      <input type="text" class="num text  mx-330" value="" size="4" name="field[value][]" /> 

                                      <input type="hidden" class="" value="<?php echo $value['id'] ?>" size="4" name="field[name][]" /> 

                                      <span class="units1"><?php echo $m_type; ?></span>

                                  </div>

                                    <?php

                                    }}?>



                                <!--Coat Measurement-

                                <?php if(!empty($type) && $type=="coats") { ?>

                                  <div class="col-sm-6 col-md-3  input input_coat_length form-group">

                                      <label class="name">Coat/ Trench Coat length</label>

                                      <input type="text" class="num text coat_length mx-330" value="<?php if(!empty($measurement_full_dtl['coat_length'])) { echo $measurement_full_dtl['coat_length']; } ?>" size="4" name="coat_length" /> <span class="units1">inches</span>

                                  </div>

                                  <div class="col-sm-6 col-md-3  input input_sleeves_length form-group">

                                    <label class="name">Sleeves length</label>

                                    <input type="text" class="num text sleeves_length" value="<?php if(!empty($measurement_full_dtl['sleeve_length'])) {  echo $measurement_full_dtl['sleeve_length']; } ?>" size="4" name="sleeves_length" /> <span class="units1">inches</span>

                                  </div>

                                  <div class="col-sm-6 col-md-3  input input_shoulders form-group">

                                      <label class="name">Shoulder width</label>

                                      <input type="text" class="num text shoulders" value="<?php if(!empty($measurement_full_dtl['shoulder_width'])) {  echo $measurement_full_dtl['shoulder_width']; } ?>" size="4" name="shoulders" /> <span class="units1">inches</span>

                                  </div>

                                  <div class="col-sm-6 col-md-3  input input_chest form-group">

                                        <label class="name">Chest around</label>

                                        <input type="text" class="num text chest" value="<?php if(!empty($measurement_full_dtl['chest_around'])) { echo $measurement_full_dtl['chest_around']; } ?>" size="4" name="chest" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_stomach form-group">

                                        <label class="name">Stomach</label>

                                        <input type="text" class="num text stomach" value="<?php if(!empty($measurement_full_dtl['stomach'])) { echo $measurement_full_dtl['stomach']; } ?>" size="4" name="stomach" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_hips form-group">

                                        <label class="name">Hips</label>

                                        <input type="text" class="num text hips" value="<?php if(!empty($measurement_full_dtl['hips'])) { echo $measurement_full_dtl['hips']; } ?>" size="4" name="hips" /> <span class="units1">inches</span>

                                    </div>

                                     <div class="col-sm-6 col-md-3  input input_biceps form-group">

                                        <label class="name">Bicep around</label>

                                        <input type="text" class="num text biceps" value="<?php if(!empty($measurement_full_dtl['bicep_around'])) { echo $measurement_full_dtl['bicep_around']; } ?>" size="4" name="biceps" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_waist form-group">

                                        <label class="name">Waist</label>

                                        <input type="text" class="num text waist" value="<?php if(!empty($measurement_full_dtl['waist'])) {  echo $measurement_full_dtl['waist']; } ?>" size="4" name="waist" /> <span class="units1">inches</span>

                                    </div>

                               <!--Blouse Measurement-

                               <?php } else if(!empty($type) && $type=="blouses" || !empty($type) && $type=="shirts") { ?>

                                    <div class="col-sm-6 col-md-3  input input_body_length form-group">

                                        <label class="name">Torso length</label>

                                        <input type="text" class="num text body_length" value="<?php if(!empty($measurement_full_dtl['torso_length'])) { echo $measurement_full_dtl['torso_length']; } ?>" size="4" name="body_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_sleeves_length form-group">

                                        <label class="name">Sleeves length</label>

                                        <input type="text" class="num text sleeves_length" value="<?php if(!empty($measurement_full_dtl['sleeve_length'])) {  echo $measurement_full_dtl['sleeve_length']; } ?>" size="4" name="sleeves_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_shoulders form-group">

                                        <label class="name">Shoulder width</label>

                                        <input type="text" class="num text shoulders" value="<?php if(!empty($measurement_full_dtl['shoulder_width'])) {  echo $measurement_full_dtl['shoulder_width']; } ?>" size="4" name="shoulders" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_neck form-group">

                                        <label class="name">Neck</label>

                                        <input type="text" class="num text neck" value="<?php if(!empty($measurement_full_dtl['neck'])) { echo $measurement_full_dtl['neck']; } ?>" size="4" name="neck" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_chest form-group">

                                        <label class="name">Chest around</label>

                                        <input type="text" class="num text chest" value="<?php if(!empty($measurement_full_dtl['chest_around'])) { echo $measurement_full_dtl['chest_around']; } ?>" size="4" name="chest" /> <span class="units1">inches</span>

                                    </div>

                                     <div class="col-sm-6 col-md-3  input input_waist form-group">

                                        <label class="name">Waist</label>

                                        <input type="text" class="num text waist" value="<?php if(!empty($measurement_full_dtl['waist'])) {  echo $measurement_full_dtl['waist']; } ?>" size="4" name="waist" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_stomach form-group">

                                        <label class="name">Stomach</label>

                                        <input type="text" class="num text stomach" value="<?php if(!empty($measurement_full_dtl['stomach'])) { echo $measurement_full_dtl['stomach']; } ?>" size="4" name="stomach" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_hips form-group">

                                        <label class="name">Hips</label>

                                        <input type="text" class="num text hips" value="<?php if(!empty($measurement_full_dtl['hips'])) { echo $measurement_full_dtl['hips']; } ?>" size="4" name="hips" /> <span class="units1">inches</span>

                                    </div>

                                   <div class="col-sm-6 col-md-3  input input_biceps form-group">

                                        <label class="name">Bicep around</label>

                                        <input type="text" class="num text biceps" value="<?php if(!empty($measurement_full_dtl['bicep_around'])) { echo $measurement_full_dtl['bicep_around']; } ?>" size="4" name="biceps" /> <span class="units1">inches</span>

                                    </div>



                                <!--Skirt Measurement-



                                <?php } else if(!empty($type) && $type =="skirts") { ?>

                                    <div class="col-sm-6 col-md-3  input input_skirt_length form-group">

                                        <label class="name">Skirt length</label>

                                        <input type="text" class="num text skirt_length" value="<?php if(!empty($measurement_full_dtl['skirt_length'])) {  echo $measurement_full_dtl['skirt_length']; } ?>" size="4" name="skirt_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_skirt_position form-group">

                                        <label class="name">Skirt position</label>

                                        <input type="text" class="num text skirt_position" value="<?php if(!empty($measurement_full_dtl['skirt_position'])) { echo $measurement_full_dtl['skirt_position']; } ?>" size="4" name="skirt_position" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_hips form-group">

                                        <label class="name">Hips</label>

                                        <input type="text" class="num text hips" value="<?php if(!empty($measurement_full_dtl['hips'])) { echo $measurement_full_dtl['hips']; } ?>" size="4" name="hips" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_stomach form-group">

                                        <label class="name">Stomach</label>

                                        <input type="text" class="num text stomach" value="<?php if(!empty($measurement_full_dtl['stomach'])) { echo $measurement_full_dtl['stomach']; } ?>" size="4" name="stomach" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_waist form-group">

                                        <label class="name">Waist</label>

                                        <input type="text" class="num text waist" value="<?php if(!empty($measurement_full_dtl['waist'])) {  echo $measurement_full_dtl['waist']; } ?>" size="4" name="waist" /> <span class="units1">inches</span>

                                    </div>

                                

                                <!--Pant Measurement-



                                <?php } else if(!empty($type) && $type == "pants") { ?>

                                    <div class="col-sm-6 col-md-3  input input_pants_length form-group">

                                        <label class="name">Pants Length</label>

                                        <input type="text" class="num text pants_length" value="<?php if(!empty($measurement_full_dtl['pant_length'])) { echo $measurement_full_dtl['pant_length']; } ?>" size="4" name="pants_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_pants_position form-group">

                                        <label class="name">Pants Waist</label>

                                        <input type="text" class="num text pants_position" value="<?php if(!empty($measurement_full_dtl['pant_waist'])) {  echo $measurement_full_dtl['pant_waist']; } ?>" size="4" name="pants_position" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_crotch form-group">

                                        <label class="name">Rise</label>

                                        <input type="text" class="num text crotch" value="<?php if(!empty($measurement_full_dtl['rise'])) {  echo $measurement_full_dtl['rise']; } ?>" size="4" name="crotch" /> <span class="units1">inches</span>

                                    </div>

                                     <div class="col-sm-6 col-md-3  input input_hips form-group">

                                        <label class="name">Hips</label>

                                        <input type="text" class="num text hips" value="<?php if(!empty($measurement_full_dtl['hips'])) { echo $measurement_full_dtl['hips']; } ?>" size="4" name="hips" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_thigh form-group">

                                        <label class="name">Thigh</label>

                                        <input type="text" class="num text thigh" value="<?php if(!empty($measurement_full_dtl['thigh'])) {  echo $measurement_full_dtl['thigh']; } ?>" size="4" name="thigh" /> <span class="units1">inches</span>

                                    </div>

                                <!--Jacket Measurement-

                                <?php } else if(!empty($type) && $type == "jackets") { ?>

                                    <div class="col-sm-6 col-md-3  input input_body_length form-group">

                                        <label class="name">Torso length</label>

                                        <input type="text" class="num text body_length" value="<?php if(!empty($measurement_full_dtl['torso_length'])) { echo $measurement_full_dtl['torso_length']; } ?>" size="4" name="body_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_sleeves_length form-group">

                                        <label class="name">Sleeves length</label>

                                        <input type="text" class="num text sleeves_length" value="<?php if(!empty($measurement_full_dtl['sleeve_length'])) {  echo $measurement_full_dtl['sleeve_length']; } ?>" size="4" name="sleeves_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_shoulders form-group">

                                        <label class="name">Shoulder width</label>

                                        <input type="text" class="num text shoulders" value="<?php if(!empty($measurement_full_dtl['shoulder_width'])) {  echo $measurement_full_dtl['shoulder_width']; } ?>" size="4" name="shoulders" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_chest form-group">

                                        <label class="name">Chest around</label>

                                        <input type="text" class="num text chest" value="<?php if(!empty($measurement_full_dtl['chest_around'])) { echo $measurement_full_dtl['chest_around']; } ?>" size="4" name="chest" /> <span class="units1">inches</span>

                                    </div>

                                     <div class="col-sm-6 col-md-3  input input_waist form-group">

                                        <label class="name">Waist</label>

                                        <input type="text" class="num text waist" value="<?php if(!empty($measurement_full_dtl['waist'])) {  echo $measurement_full_dtl['waist']; } ?>" size="4" name="waist" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_stomach form-group">

                                        <label class="name">Stomach</label>

                                        <input type="text" class="num text stomach" value="<?php if(!empty($measurement_full_dtl['stomach'])) { echo $measurement_full_dtl['stomach']; } ?>" size="4" name="stomach" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_hips form-group">

                                        <label class="name">Hips</label>

                                        <input type="text" class="num text hips" value="<?php if(!empty($measurement_full_dtl['hips'])) { echo $measurement_full_dtl['hips']; } ?>" size="4" name="hips" /> <span class="units1">inches</span>

                                    </div>

                                   <div class="col-sm-6 col-md-3  input input_biceps form-group">

                                        <label class="name">Bicep around</label>

                                        <input type="text" class="num text biceps" value="<?php if(!empty($measurement_full_dtl['bicep_around'])) { echo $measurement_full_dtl['bicep_around']; } ?>" size="4" name="biceps" /> <span class="units1">inches</span>

                                    </div>

                                    

                                    <!--Suit Measurement-

                                    <?php } else if(!empty($type) && $type == "business Suits" || !empty($type) && $type == "jacket and skirt" ) { ?>

                                    <div class="col-sm-6 col-md-3  input input_body_length form-group">

                                        <label class="name">Torso length</label>

                                        <input type="text" class="num text body_length" value="<?php if(!empty($measurement_full_dtl['torso_length'])) { echo $measurement_full_dtl['torso_length']; } ?>" size="4" name="body_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_sleeves_length form-group">

                                        <label class="name">Sleeves length</label>

                                        <input type="text" class="num text sleeves_length" value="<?php if(!empty($measurement_full_dtl['sleeve_length'])) {  echo $measurement_full_dtl['sleeve_length']; } ?>" size="4" name="sleeves_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_shoulders form-group">

                                        <label class="name">Shoulder width</label>

                                        <input type="text" class="num text shoulders" value="<?php if(!empty($measurement_full_dtl['shoulder_width'])) {  echo $measurement_full_dtl['shoulder_width']; } ?>" size="4" name="shoulders" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_chest form-group">

                                        <label class="name">Chest around</label>

                                        <input type="text" class="num text chest" value="<?php if(!empty($measurement_full_dtl['chest_around'])) { echo $measurement_full_dtl['chest_around']; } ?>" size="4" name="chest" /> <span class="units1">inches</span>

                                    </div>

                                     <div class="col-sm-6 col-md-3  input input_waist form-group">

                                        <label class="name">Waist</label>

                                        <input type="text" class="num text waist" value="<?php if(!empty($measurement_full_dtl['waist'])) {  echo $measurement_full_dtl['waist']; } ?>" size="4" name="waist" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_stomach form-group">

                                        <label class="name">Stomach</label>

                                        <input type="text" class="num text stomach" value="<?php if(!empty($measurement_full_dtl['stomach'])) { echo $measurement_full_dtl['stomach']; } ?>" size="4" name="stomach" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_hips form-group">

                                        <label class="name">Hips</label>

                                        <input type="text" class="num text hips" value="<?php if(!empty($measurement_full_dtl['hips'])) { echo $measurement_full_dtl['hips']; } ?>" size="4" name="hips" /> <span class="units1">inches</span>

                                    </div>

                                   <div class="input input_biceps form-group">

                                        <label class="name">Bicep around</label>

                                        <input type="text" class="num text biceps" value="<?php if(!empty($measurement_full_dtl['bicep_around'])) { echo $measurement_full_dtl['bicep_around']; } ?>" size="4" name="biceps" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_skirt_length form-group">

                                        <label class="name">Skirt length</label>

                                        <input type="text" class="num text skirt_length" value="<?php if(!empty($measurement_full_dtl['skirt_length'])) {  echo $measurement_full_dtl['skirt_length']; } ?>" size="4" name="skirt_length" /> <span class="units1">inches</span>

                                    </div>

                                     <div class="col-sm-6 col-md-3  input input_skirt_position form-group">

                                        <label class="name">Skirt position</label>

                                        <input type="text" class="num text skirt_position" value="<?php if(!empty($measurement_full_dtl['skirt_position'])) { echo $measurement_full_dtl['skirt_position']; } ?>" size="4" name="skirt_position" /> <span class="units1">inches</span>

                                    </div>

                                    <?php } else { ?>



                                    <div class="col-sm-6 col-md-3  input input_coat_length form-group">

                                        <label class="name">Coat/ Trench Coat length</label>

                                        <input type="text" class="num text coat_length" value="<?php if(!empty($measurement_full_dtl['coat_length'])) { echo $measurement_full_dtl['coat_length']; } ?>" size="4" name="coat_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_body_length form-group">

                                        <label class="name">Torso length</label>

                                        <input type="text" class="num text body_length" value="<?php if(!empty($measurement_full_dtl['torso_length'])) { echo $measurement_full_dtl['torso_length']; } ?>" size="4" name="body_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_dress_length form-group">

                                        <label class="name">Dress length</label>

                                        <input type="text" class="num text dress_length" value="<?php if(!empty($measurement_full_dtl['dress_length'])) { echo $measurement_full_dtl['dress_length']; } ?>" size="4" name="dress_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_sleeves_length form-group">

                                        <label class="name">Sleeves length</label>

                                        <input type="text" class="num text sleeves_length" value="<?php if(!empty($measurement_full_dtl['sleeve_length'])) {  echo $measurement_full_dtl['sleeve_length']; } ?>" size="4" name="sleeves_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_shoulders form-group">

                                        <label class="name">Shoulder width</label>

                                        <input type="text" class="num text shoulders" value="<?php if(!empty($measurement_full_dtl['shoulder_width'])) {  echo $measurement_full_dtl['shoulder_width']; } ?>" size="4" name="shoulders" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_neck form-group">

                                        <label class="name">Neck</label>

                                        <input type="text" class="num text neck" value="<?php if(!empty($measurement_full_dtl['neck'])) { echo $measurement_full_dtl['neck']; } ?>" size="4" name="neck" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_chest form-group">

                                        <label class="name">Chest around</label>

                                        <input type="text" class="num text chest" value="<?php if(!empty($measurement_full_dtl['chest_around'])) { echo $measurement_full_dtl['chest_around']; } ?>" size="4" name="chest" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_stomach form-group">

                                        <label class="name">Stomach</label>

                                        <input type="text" class="num text stomach" value="<?php if(!empty($measurement_full_dtl['stomach'])) { echo $measurement_full_dtl['stomach']; } ?>" size="4" name="stomach" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_breast_point form-group">

                                        <label class="name">Breast point</label>

                                        <input type="text" class="num text breast_point" value="<?php if(!empty($measurement_full_dtl['breast_point'])) { echo $measurement_full_dtl['breast_point']; } ?>" size="4" name="breast_point" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_waist_point form-group">

                                        <label class="name">Waist point</label>

                                        <input type="text" class="num text waist_point" value="<?php if(!empty($measurement_full_dtl['waist_point'])) {  echo $measurement_full_dtl['waist_point']; } ?>" size="4" name="waist_point" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_pants_length form-group">

                                        <label class="name">Pants Length</label>

                                        <input type="text" class="num text pants_length" value="<?php if(!empty($measurement_full_dtl['pant_length'])) { echo $measurement_full_dtl['pant_length']; } ?>" size="4" name="pants_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_skirt_length form-group">

                                        <label class="name">Skirt length</label>

                                        <input type="text" class="num text skirt_length" value="<?php if(!empty($measurement_full_dtl['skirt_length'])) {  echo $measurement_full_dtl['skirt_length']; } ?>" size="4" name="skirt_length" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_hips form-group">

                                        <label class="name">Hips</label>

                                        <input type="text" class="num text hips" value="<?php if(!empty($measurement_full_dtl['hips'])) { echo $measurement_full_dtl['hips']; } ?>" size="4" name="hips" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_waist form-group">

                                        <label class="name">Waist</label>

                                        <input type="text" class="num text waist" value="<?php if(!empty($measurement_full_dtl['waist'])) {  echo $measurement_full_dtl['waist']; } ?>" size="4" name="waist" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_crotch form-group">

                                        <label class="name">Rise</label>

                                        <input type="text" class="num text crotch" value="<?php if(!empty($measurement_full_dtl['rise'])) {  echo $measurement_full_dtl['rise']; } ?>" size="4" name="crotch" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_thigh form-group">

                                        <label class="name">Thigh</label>

                                        <input type="text" class="num text thigh" value="<?php if(!empty($measurement_full_dtl['thigh'])) {  echo $measurement_full_dtl['thigh']; } ?>" size="4" name="thigh" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_biceps form-group">

                                        <label class="name">Bicep around</label>

                                        <input type="text" class="num text biceps" value="<?php if(!empty($measurement_full_dtl['bicep_around'])) { echo $measurement_full_dtl['bicep_around']; } ?>" size="4" name="biceps" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_pants_position form-group">

                                        <label class="name">Pants Waist</label>

                                        <input type="text" class="num text pants_position" value="<?php if(!empty($measurement_full_dtl['pant_waist'])) {  echo $measurement_full_dtl['pant_waist']; } ?>" size="4" name="pants_position" /> <span class="units1">inches</span>

                                    </div>

                                    <div class="col-sm-6 col-md-3  input input_skirt_position form-group">

                                        <label class="name">Skirt position</label>

                                        <input type="text" class="num text skirt_position" value="<?php if(!empty($measurement_full_dtl['skirt_position'])) { echo $measurement_full_dtl['skirt_position']; } ?>" size="4" name="skirt_position" /> <span class="units1">inches</span>

                                    </div>

                                    <?php } ?>

                                    <div class="tooltip">

                                        <span class="warning">Slightly out of range</span>

                                        <span class="error">Far out of range</span>

                                    </div>

                                </div>

                                <!--<div class="col-md-5 col-sm-5">

                                  <img src="<?php echo $homeurl;?>images/content/prod-001.png">

                                </div>-->

                                <div class="instructions col-md-6 col-sm-6">

                                </div>

                                <div class="clearfix"></div>

                                

                                <div class="col-md-3">&nbsp;</div>

                                <div class="actions col-md-8 text-center">

                                   <a href="javascript:;" class="button confirm-measure btn btn-primary btn-mini">CONFIRM MEASUREMENTS</a>

                                </div>

                            </div>



                        </div>





                </form>

            </section>

      </div>

  </section>



  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->



</div>

<div class="modal fade" id="myModal" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">

<div class="modal-dialog">

  <div class="modal-content">

    <div class="modal-header">

      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

      <h4 class="modal-title">Save Measurement</h4>

    </div>

    <div class="modal-body">

      <p>Failed to Save Measurement Profile</p>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>

    </div>

  </div>

</div>

</div>

<script type="text/javascript">

                    ga_callbacks.push(['set', 'dimension4', 'wizard_']);

                    var num_measures_required = '19';

                    ga_callbacks.push(['set', 'dimension6', num_measures_required]);

                    var options = {

                        'region': 'en',

                        'gender': 'woman',

                        'product_type': '',

                        'profile': false,

                        'is_customer_account': true,

                        'is_customer': true,

                        'cart_mobile_saved': false,

                        'measures': {

                            "required": {

                                "coat_length": {

                                    "range": 50,

                                    "required": ["woman_coat"],

                                    "backoffice": ["woman_coat"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Coat\/ Trench Coat length"

                                },

                                "body_length": {

                                    "range": 30,

                                    "required": ["woman_jacket", "woman_shirt", "woman_blouse"],

                                    "backoffice": ["woman_jacket", "woman_shirt", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Torso length"

                                },

                                "dress_length": {

                                    "range": 50,

                                    "required": ["woman_suit"],

                                    "backoffice": ["woman_suit"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Dress length"

                                },

                                "sleeves_length": {

                                    "range": 30,

                                    "required": ["woman_jacket", "woman_shirt", "woman_coat", "woman_blouse"],

                                    "backoffice": ["woman_jacket", "woman_shirt", "woman_coat", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Sleeves length"

                                },

                                "shoulders": {

                                    "range": 30,

                                    "required": ["woman_jacket", "woman_shirt", "woman_suit", "woman_coat", "woman_blouse"],

                                    "backoffice": ["woman_jacket", "woman_shirt", "woman_suit", "woman_coat", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Shoulder width"

                                },

                                "neck": {

                                    "range": 30,

                                    "required": ["woman_shirt", "woman_blouse"],

                                    "backoffice": ["woman_shirt", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Neck"

                                },

                                "chest": {

                                    "range": 30,

                                    "required": ["woman_jacket", "woman_shirt", "woman_suit", "woman_coat", "woman_blouse"],

                                    "backoffice": ["woman_jacket", "woman_shirt", "woman_suit", "woman_coat", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Chest around"

                                },

                                "stomach": {

                                    "range": 30,

                                    "required": ["woman_jacket", "woman_shirt", "woman_suit", "woman_coat", "woman_skirt", "woman_blouse"],

                                    "backoffice": ["woman_jacket", "woman_shirt", "woman_suit", "woman_coat", "woman_skirt", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Stomach"

                                },

                                "breast_point": {

                                    "range": 50,

                                    "required": ["woman_jacket", "woman_shirt", "woman_suit", "woman_coat", "woman_blouse"],

                                    "backoffice": ["woman_jacket", "woman_shirt", "woman_suit", "woman_coat", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Breast point"

                                },

                                "waist_point": {

                                    "range": 50,

                                    "required": ["woman_jacket", "woman_shirt", "woman_suit", "woman_coat", "woman_blouse"],

                                    "backoffice": ["woman_jacket", "woman_shirt", "woman_suit", "woman_coat", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Waist point"

                                },

                                "pants_length": {

                                    "range": 60,

                                    "required": ["woman_pants"],

                                    "backoffice": ["woman_pants"],

                                    "position": "down",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Pants Length"

                                },

                                "skirt_length": {

                                    "range": 30,

                                    "required": ["woman_skirt"],

                                    "backoffice": ["woman_skirt"],

                                    "position": "down",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Skirt length"

                                },

                                "hips": {

                                    "range": 30,

                                    "required": ["woman_jacket", "woman_shirt", "woman_suit", "woman_skirt", "woman_pants", "woman_coat", "woman_blouse"],

                                    "backoffice": ["woman_jacket", "woman_shirt", "woman_suit", "woman_skirt", "woman_pants", "woman_coat", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Hips"

                                },

                                "waist": {

                                    "range": 30,

                                    "required": ["woman_jacket", "woman_shirt", "woman_suit", "woman_skirt", "woman_coat", "woman_blouse"],

                                    "backoffice": ["woman_jacket", "woman_shirt", "woman_suit", "woman_skirt", "woman_coat", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Waist"

                                },

                                "crotch": {

                                    "range": 30,

                                    "required": ["woman_pants"],

                                    "backoffice": ["woman_pants"],

                                    "position": "down",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Rise"

                                },

                                "thigh": {

                                    "range": 30,

                                    "required": ["woman_pants"],

                                    "backoffice": ["woman_pants"],

                                    "position": "down",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Thigh"

                                },

                                "biceps": {

                                    "range": 30,

                                    "required": ["woman_jacket", "woman_shirt", "woman_coat", "woman_blouse"],

                                    "backoffice": ["woman_jacket", "woman_shirt", "woman_coat", "woman_blouse"],

                                    "position": "up",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Bicep around"

                                },

                                "pants_position": {

                                    "range": 100,

                                    "required": ["woman_pants"],

                                    "backoffice": ["woman_pants"],

                                    "position": "down",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Pants Waist"

                                },

                                "skirt_position": {

                                    "range": 10,

                                    "required": ["woman_skirt"],

                                    "backoffice": ["woman_skirt"],

                                    "position": "down",

                                    "tolerance": {

                                        "normal": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        },

                                        "xl": {

                                            "base": [-5, 5],

                                            "max": [-10, 10]

                                        }

                                    },

                                    "title": "Skirt position"

                                }

                            }

                        },

                        'region_metric_system': 'iso',

                    };

</script>

<!-- SCRIPTS -->

<!-- core -->

    









