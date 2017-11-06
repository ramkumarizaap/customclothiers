<?php

if(isset($_SESSION['admin_user_id']) ||  isset($_SESSION['emp_user_id']))

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

            <h1>Cart</h1>

              <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">Cart</li>

              </ol>

          </section>

             <br /><br />



          <div class="box box-primary">

            <div class="box-header">

                <h3 class="col-md-10">Cart Items</h3>

                <div class="pull-right col-md-2">

                      <?php include_once("includes/basket.php");?>

                </div>



            </div><!-- /.box-header -->

               <div class="box-body">

                <table class="table table-striped cartdiv">

                    <thead>

                         <th colspan="2">Product</th>

                          <th>Options</th>

                          <th style="text-align:center;">Quantity</th>

                          <th>Total</th>

                          <th>Measurement</th>

                    </thead>

                    <tbody>

                    <?php 

                    $id=$_GET['id'];$tot="";$z=0;

                  $gift=mysqli_query($con,"select * from gift_card_master where userid=$id and status=0 order by created_date desc");

                    
                    $sql=mysqli_query($con,"select a.*,b.p_name,b.p_price from order_master a,

                      product_master b  where a.userid=$id and a.om_status=1 and a.pid=b.p_id order by a.last_updated desc");

                    $num=mysqli_num_rows($sql);

                    if(mysqli_num_rows($sql)){

                    while ($r=mysqli_fetch_array($sql)) 

                    {

                      $orderid=$r['order_id'];$uid=$r['userid'];

                      $tot= $tot + ($r['om_quantity'] * $r['om_price']);

                     $sql1=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");

                      $r1=mysqli_fetch_array($sql1);

                      $fabric=explode("{",$r['om_fab']);

                       $fabric=explode(",",$fabric[1]);

                       $fabric_price=explode(":",$fabric[0]);

                       $fabric_id = explode(":",trim($fabric[1],"}"));



                     

                    ?>

                    <tr style="height:150px;vertical-align:middle;">

                     <td  style="vertical-align:middle;width:100px;">

                        <?php //if($r['om_style']==""){?>

                            <img src="<?php echo $homeurl.$r1['p_img'];?>" alt="Shop item" style="width:100px;height:150px;">

                        <?php /*}

                         else if($r['om_style']!='')

                          {                       

                           $get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");



                                 if(mysqli_num_rows($get_fab_def_img) > 0) { 

                                   $fab_def_img = mysqli_fetch_array($get_fab_def_img);

                                ?> 

                           <img src="<?php echo $homeurl.$fab_def_img['default_img'];?>" alt="Customizer item" style="width:100px;height:150px;">

                           <?php   

                              }

                          }*/

                        ?>

                      </td>

                      <td style="vertical-align:middle;">

                      <?php if($r['om_style']!=""){?>

                        <?php echo "Custom " .$r['p_name'];?><br>

                      <?php } else { ?>

                      <?php echo $r['p_name'];?><br>

                      <?php } ?>

                        <?php if($r['om_style']!=''){?>

                        <a href="javascript:void(0)" class="btn btn-xs btn-info modal-btn" data-toggle="modal" data-target="#viewDetails<?php echo $r['om_id'];?>">View Customize</a><br>

                        <a href="<?php echo $adminurl;?>customize/edit/style/<?php echo $uid;?>/<?php echo $r['pid'];?>/1/<?php echo $r['subcatid'];?>/<?php echo $r['om_id'];?>/" class="btn btn-xs btn-info">Edit</a>

                        <?php }?>

                      </td>

                      <td  style="vertical-align:middle;">

                        <a href="javascript:void(0);" class="del_cart btn btn-danger

                        btn-xs" data-user-id="<?php echo $id; ?>" data-order-id="<?php echo $r['order_id'];?>" data-id="<?php echo $r['om_id'];?>">Remove</a>

                      </td>

                      <td  style="vertical-align:middle;text-align:center;">

                        <input type="number"  max="10" min="1" class="q_<?php echo $r['om_id'];?>"  value="<?php echo $r['om_quantity'];?>"><br><br>

                        <a href="javascript:void(0);" data-id="<?php echo $r['om_id'];?>" class="update_qty btn btn-xs btn-info">Update</a>

                      </td>

                      <td  style="vertical-align:middle;">

                        <?php echo "$".number_format($r['om_quantity'] * $r['om_price'],2);?>

                      </td>

                       <td  style="vertical-align:middle;">



                         <?php 
                         if($r['subcatid']!=="5")
                         {

                          $sql1=mysqli_query($con,"select * from measurement_profile_master where

                           mp_id=".$r['mpid']);

                          $r1=mysqli_fetch_array($sql1);

                          if(mysqli_num_rows($sql1)){

                          ?>

                          Name : <?php echo $r1['mp_name'];?><br>

                          Height : <?php echo $r1['mp_height'];?><br>

                          Weight : <?php echo $r1['mp_weight'];?><br>

                          <a href="javascript:void(0);" data-oid="<?php echo $r['om_id'];?>"

                           data-href="measurement"  class="btn mp_pop_btn btn-info btn-xs popup">

                          Change Measurement</a><br>

                            <a href="javascript:void(0);" data-oid="<?php echo $r['om_id'];?>"

                           data-href="mp_details<?php echo $r['om_id'];?>"  class="btn btn-info btn-xs popup">

                          View Details</a>

                          <?php } else{?>

                        <a href="javascript:void(0);" data-oid="<?php echo $r['om_id'];?>"

                           data-href="measurement" class="btn mp_pop_btn btn-info btn-sm popup">Add Measurement</a>

                            <input type="hidden" name="add-measurement" value="1">

                           <?php }

                        }?>

                       </td>

                            <div class="example-modal" id="mp_details<?php echo $r['om_id'];?>">

                            <div class="modal" style="display: none;">

                              <div class="modal-dialog modal-lg">

                                <div class="modal-content">

                                  <div class="modal-header">

                                    <button type="button" class="close close-btn" onClick="window.location.href=&quot;&quot;;" aria-label="Close"><span aria-hidden="true">×</span></button>

                                    <h4 class="modal-title">Measurement Profile Details </h4>

                                  </div>

                                  <div class="modal-body">

                                    <div class="custom-value">

                                     <?php 

                                    $sql2=mysqli_query($con,"select * from measurement_profile_master where

                                     mp_id=".$r['mpid']);

                                    $r2=mysqli_fetch_array($sql2);

                                    ?>

                                      <p><strong>Name :</strong> <?php echo $r2['mp_name'];?></p>

                                       <p><strong>Height:</strong> <?php echo $r2['mp_height']; ?> </p>

                                        <p><strong>Weight:</strong> <?php echo $r2['mp_weight']; ?> </p>

                                        <p><strong>Chest:</strong> <?php echo $r2['mp_chest']; ?> </p>

                                        <p><strong>Abdomen:</strong> <?php echo $r2['mp_abdomen']; ?> </p>

                                        <p><strong>Buttocks:</strong> <?php echo $r2['mp_buttocks']; ?></p>

                                        <p><strong>Hips:</strong> <?php echo $r2['mp_hips']; ?></p>

                                         <?php 

                                        $sql22=mysqli_query($con,"select a.mpf_value,b.labelname from measurement_profile_value a,

                                         measurement_profile_fields b where a.mpid='".$r2['mp_id']."' and a.mpfid=b.mpf_id");

                                        while($r22=mysqli_fetch_array($sql22)){
                                          if($r22['mpf_value']!=0){?>

                                          <?php if($r22['labelname']=='Neck') {
                                            $m_type="cm";
                                          }
                                          else
                                          {
                                            $m_type="inches";
                                          }
                                          ?>

                                         <p><strong><?php echo $r22['labelname']; ?>:</strong> <?php echo $r22['mpf_value']; ?> <?php echo $m_type; ?>

                                        <?php }}?>

                                      

                                    </div>

                                  </div>

                                  <div class="modal-footer">

                                    <button type="button" class="btn btn-default pull-right" onClick="window.location.href=&quot;&quot;" ;="">Close</button>

                                  </div>

                                </div><!-- /.modal-content -->

                              </div><!-- /.modal-dialog -->

                            </div><!-- /.modal -->

                          </div>



                          <!--Customize Details-->

                             <div class="ad-customize modal fade" id="viewDetails<?php echo $r['om_id'];?>" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">

                                  <div class="modal-content">

                                    <div class="modal-header">

                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                      <h3 class="modal-title"><?php echo "Custom " .$r['p_name']?> - Customizer Details</h3>

                                    </div>

                                    <div class="modal-body">

                                      <div style="width:500px;display:inline-block;min-height:534px;">

                                          <div class="tabs">

                                            <ul class="nav nav-tabs">

                                              <li class="active"><a href="#style<?php echo $z;?> " data-toggle="tab">Style</a></li>

                                              <li><a href="#fab<?php echo $z;?>" data-toggle="tab">Fabric</a></li>

                                              <li><a href="#ext<?php echo $z;?>" data-toggle="tab">Accents</a></li>

                                            </ul>



                                            <div class="tab-content">

                                               <div class="tab-pane fade in active" id="style<?php echo $z;?>"><br>

                                                   <?php 

                                                  $style=explode(",",$r['om_style']);

                                                  

                                                  for ($k=0; $k < count($style); $k++) { 

                                                      $st=str_replace(":"," : ",$style[$k]);

                                                      $st=str_replace("{","",$st);

                                                      $st=str_replace("}","",$st);

                                                      $st = explode(" : ",$st);



                                                      if($r['p_type']=='blazers' || $r['p_type']=='trousers' || $r['p_type']=='suits') 

                                                        {  



                                                          if($st[0] == 'jacket_fit' && trim($st[1]) == '0') {

                                                            $st[1] = 'Classic Fit';

                                                          }

                                                          else if($st[0] == 'jacket_fit' && trim($st[1]) == '1') {

                                                            $st[1] = 'Slim Fit';

                                                          }

                                                          else if($st[0] == 'jacket_buttons' && trim($st[1]) =='0') {

                                                            $st[1] = 'No Buttons';

                                                          }

                                                          else if($st[0] == 'jacket_buttons' && trim($st[1]) =='1') {

                                                            $st[1] = '1 Button';

                                                          }

                                                          else if($st[0] == 'jacket_buttons' && trim($st[1]) =='2') {

                                                            $st[1] = '2 Buttons';

                                                          }

                                                          else if($st[0] == 'jacket_buttons' && trim($st[1]) =='3') {

                                                            $st[1] = '3 Buttons';

                                                          }

                                                          else if($st[0] == 'jacket_buttons' && trim($st[1]) =='4') {

                                                            $st[1] = '4 Buttons';

                                                          }

                                                          else if($st[0]=='jacket_pockets' && trim($st[1])=='0') {

                                                            $st[1] ='No Pockets';

                                                          }

                                                          else if($st[0]=='jacket_pockets' && trim($st[1])=='2') {

                                                            $st[1] ='2 Pockets';

                                                          }

                                                          else if($st[0]=='jacket_pockets' && trim($st[1])=='3') {

                                                            $st[1] ='3 Pockets';

                                                          }

                                                          else if($st[0]=='jacket_sleeve_buttons' && trim($st[1])=='0') {

                                                            $st[1]='No Buttons';

                                                          }

                                                          else if($st[0]=='jacket_sleeve_buttons' && trim($st[1])=='2') {

                                                            $st[1]='2 Buttons';

                                                          }

                                                          else if($st[0]=='jacket_sleeve_buttons' && trim($st[1])=='3') {

                                                            $st[1]='3 Buttons';

                                                          }

                                                          else if($st[0]=='jacket_sleeve_buttons' && trim($st[1])=='4') {

                                                            $st[1]='4 Buttons';

                                                          }

                                                          else if($st[0]=='pants_back_pocket_type' && trim($st[1])=='A') {

                                                            $st[1]='piped pocket with button';

                                                          }

                                                          else if($st[0]=='pants_back_pocket_type' && trim($st[1])=='B') {

                                                            $st[1]='Patched';

                                                          }

                                                          else if($st[0]=='pants_peg' && trim($st[1])=='0') {

                                                            $st[1]='No Pleats';

                                                          }

                                                          else if($st[0]=='pants_peg' && trim($st[1])=='1') {

                                                            $st[1]='Pleated';

                                                          }

                                                          else if($st[0]=='pants_peg' && trim($st[1])=='2') {

                                                            $st[1]='Double Pleated';

                                                          }

                                                          else if($st[0]=='pants_belt' && trim($st[1])=='0') {

                                                            $st[1]='Centered';

                                                          }

                                                          else if($st[0]=='pants_belt' && trim($st[1])=='1') {

                                                            $st[1]='Displaced';

                                                          }

                                                          else if($st[0]=='pants_back_pocket' && trim($st[1])=='0') {

                                                            $st[1]='No Pockets';

                                                          }

                                                          else if($st[0]=='jacket_pockets_type' && trim($st[1])=='') {

                                                            $st[1]='-';

                                                          }

                                                          else if($st[0]=='pants_back_pocket_type' && trim($st[1])=='') {

                                                            $st[1]='-';

                                                          }

                                                          else if($st[0]=='pants_back_pocket' && trim($st[1])=='1') {

                                                            $st[1]='1 Back Pocket';

                                                          }

                                                          else if($st[0]=='pants_back_pocket' && trim($st[1])=='2') {

                                                            $st[1]='2 Back Pockets';

                                                          }

                                                          else if($st[0]=='pants_cuff' && trim($st[1])=='0') {

                                                            $st[1]='No Pant Cuffs';

                                                          }

                                                          else if($st[0]=='pants_cuff' && trim($st[1])=='1') {

                                                            $st[1]='With Pant Cuffs';

                                                          }

                                                          else if($st[0]=='waistcoat_buttons' && trim($st[1])=='3') {

                                                            $st[1]='3 Buttons';

                                                          }

                                                          else if($st[0]=='waistcoat_buttons' && trim($st[1])=='4') {

                                                            $st[1]='4 Buttons';

                                                          }

                                                          else if($st[0]=='waistcoat_buttons' && trim($st[1])=='5') {

                                                            $st[1]='5 Buttons';

                                                          }

                                                          else if($st[0]=='waistcoat_buttons' && trim($st[1])=='6') {

                                                            $st[1]='6 Buttons';

                                                          }

                                                          else if($st[0]=='waistcoat_chest_pocket' && trim($st[1])=='0') {

                                                            $st[1]='No';

                                                          }

                                                          else if($st[0]=='waistcoat_chest_pocket' && trim($st[1])=='1') {

                                                            $st[1]='Yes';

                                                          }

                                                          else if($st[0]=='waistcoat_pockets_num' && trim($st[1])=='0') {

                                                            $st[1]='No';

                                                          }

                                                          else if($st[0]=='waistcoat_pockets_num' && trim($st[1])=='0') {

                                                            $st[1]='No Pockets';

                                                          }

                                                          else if($st[0]=='waistcoat_pockets_num' && trim($st[1])=='2') {

                                                            $st[1]='2 Pockets';

                                                          }

                                                          else if($st[0]=='waistcoat_pockets_num' && trim($st[1])=='3') {

                                                            $st[1]='3 Pockets';

                                                          }

                                                          else if($st[0]=='waistcoat_pockets' && trim($st[1])=='3' || $st[0]=='waistcoat_pockets' && trim($st[1])=='2') {

                                                            $st[1]='Welt Pockets ';

                                                          }

                                                          else if($st[0]=='waistcoat_pockets' && trim($st[1])=='3a' || $st[0]=='waistcoat_pockets' && trim($st[1])=='2a') {

                                                            $st[1]='Double Welt ';

                                                          }

                                                          else if($st[0]=='waistcoat_pockets' && trim($st[1])=='3b' || $st[0]=='waistcoat_pockets' && trim($st[1])=='2b') {

                                                            $st[1]='with flap';

                                                          }

                                                          else if($st[0]=='waistcoat_pockets' && trim($st[1])=='') {

                                                            $st[1]='-';

                                                          }

                                                          else if($st[0]=='pants_cuff' && trim($st[1])=='1') {

                                                            $st[1]='With Pant Cuffs';

                                                          }

                                                          else if($st[0]=='pants_cuff' && trim($st[1])=='1') {

                                                            $st[1]='With Pant Cuffs';

                                                          }



                                                          else if($st[0]=='pants_back_pocket_type' && trim($st[1])=='C') {

                                                            $st[1]='Flap Pockets';

                                                          }

                                                          else if($st[0] == 'jacket_chest_pocket' && trim($st[1]) =='1') {

                                                            $st[1] = 'Yes';

                                                          }

                                                          else if($st[0] == 'jacket_chest_pocket' && trim($st[1]) =='0') {

                                                            $st[1] = 'No';

                                                          }

                                                          else if($st[0] == 'jacket_pockets' && trim($st[1]) =='0') {

                                                            $st[1] = 'No Pockets';

                                                          }

                                                          else if($st[0] == 'jacket_pockets_type' && trim($st[1]) =='2') {

                                                            $st[1] = 'With Flap';

                                                          }

                                                          else if($st[0] == 'jacket_pockets_type' && trim($st[1]) =='2a') {

                                                            $st[1] = 'Double Welt';

                                                          }

                                                          else if($st[0]=='jacket_sleeve_buttonholes' && trim($st[1])=='')

                                                          {

                                                            $st[1]='-';

                                                          }

                                                          else if($st[0]=='jacket_lapels' && trim($st[1])=='')

                                                          {

                                                            $st[1]='-';

                                                          }

                                                          else if($st[0]=='jacket_buttons' && trim($st[1])=='')

                                                          {

                                                            $st[1]='-';

                                                          }

                                                          else if($st[0] == 'jacket_pockets_type' && trim($st[1]) =='2b') {

                                                            $st[1] = 'Patched';

                                                          }

                                                          else if($st[0] == 'jacket_pockets_type' && trim($st[1]) =='3') {

                                                            $st[1] = 'With Flap';

                                                          }

                                                          else if($st[0] == 'jacket_pockets_type' && trim($st[1]) =='3a') {

                                                            $st[1] = 'Double Welt';

                                                          }

                                                          

                                                          else if($st[0] == 'jacket_vent' && trim($st[1]) == '0') {

                                                            $st[1] = 'Ventless';

                                                          }

                                                          else if($st[0] == 'jacket_vent' && trim($st[1]) == '1') {

                                                            $st[1] = 'Center Vent';

                                                          }

                                                          else if($st[0] == 'jacket_vent' && trim($st[1]) == '2') {

                                                            $st[1] = 'Side Vent';

                                                          }

                                                          else if($st[0] == 'jacket_sleeve_buttons' && trim($st[1]) =='0') {

                                                            $st[1] = 'No Sleeve Button';

                                                          }

                                                          else if($st[0] == 'jacket_sleeve_buttons' && trim($st[1]) == '0') {

                                                            $st[1] = 'No Sleeve Button';

                                                          }

                                                          else if($st[0] == 'jacket_sleeve_buttonholes' && trim($st[1]) == '0') {

                                                            $st[1] = 'Fake';

                                                          }

                                                          else if($st[0] == 'jacket_sleeve_buttonholes' && trim($st[1]) == '1') {

                                                            $st[1] = 'Real(Functional Buttons)';

                                                          }

                                                        }



                                                        

                                                        else if($r['p_type']=='shirts') 

                                                        {



                                                          if($st[0]=='shirt_neck' && trim($st[1])=='1') {

                                                            $st[1]='Kent collar';

                                                          }

                                                          else if($st[0]=='shirt_neck' && trim($st[1])=='2') {

                                                            $st[1]='Cutaway collar';

                                                          }

                                                          else if($st[0]=='shirt_neck' && trim($st[1])=='3') {

                                                            $st[1]='Long collar';

                                                          }

                                                          else if($st[0]=='shirt_neck' && trim($st[1])=='4') {

                                                            $st[1]='Button-down';

                                                          }

                                                          else if($st[0]=='shirt_neck' && trim($st[1])=='5') {

                                                            $st[1]='Stand-up collar';

                                                          }

                                                          else if($st[0]=='shirt_neck' && trim($st[1])=='6') {

                                                            $st[1]='Wing collar';

                                                          }

                                                          else if($st[0]=='shirt_neck' && trim($st[1])=='7') {

                                                            $st[1]='Rounded collar ';

                                                          }

                                                          else if($st[0]=='shirt_neck_no_interfacing' && trim($st[1])=='1') {

                                                            $st[1]='Soft';

                                                          }

                                                          else if($st[0]=='shirt_neck_no_interfacing' && trim($st[1])=='0') {

                                                            $st[1]='No Soft';

                                                          }

                                                          else if($st[0]=='shirt_neck_buttons' && trim($st[1])=='1') {

                                                            $st[1]='1 Button';

                                                          }

                                                          else if($st[0]=='shirt_neck_buttons' && trim($st[1])=='2') {

                                                            $st[1]='2 Buttons';

                                                          }
                                                          else if($st[0]=='shirt_neck_buttons' && trim($st[1])=='') {

                                                              $st[1]='No Button';

                                                            }

                                                          else if($st[0]=='shirt_chest_pocket' && trim($st[1])=='0') {

                                                            $st[1]='No Pocket';

                                                          }

                                                          else if($st[0]=='shirt_chest_pocket' && trim($st[1])=='1') {

                                                            $st[1]='1 Breast Pocket';

                                                          }

                                                          else if($st[0]=='shirt_chest_pocket' && trim($st[1])=='2') {

                                                            $st[1]='2 Breast Pockets';

                                                          }

                                                          else if($st[0]=='shirt_chest_pocket_type' && trim($st[1])=='1' || $st[0]=='shirt_chest_pocket_type' && trim($st[1])=='3') {

                                                            $st[1]='Flap Pockets';

                                                          }

                                                          else if($st[0]=='shirt_chest_pocket_type' && trim($st[1])=='2' || $st[0]=='shirt_chest_pocket_type' && trim($st[1])=='4') {

                                                            $st[1]='No Flap Pockets';

                                                          }

                                                          else if($st[0]=='shirt_neck_no_interfacing' && trim($st[1])=='') {

                                                            $st[1]='-';

                                                          }

                                                          else if($st[0]=='shirt_chest_pocket_type' && trim($st[1])=='') {

                                                            $st[1]='-';

                                                          }

                                                           else if($st[0]=='shirt_button_close' && trim($st[1])=='1') {

                                                            $st[1]='French';

                                                          }

                                                          else if($st[0]=='shirt_button_close' && trim($st[1])=='2') {

                                                            $st[1]='Hidden Buttons';

                                                          }

                                                          else if($st[0]=='shirt_button_close' && trim($st[1])=='3') {

                                                            $st[1]='Standard';

                                                          }

                                                          else if($st[0]=='shirt_pleats' && trim($st[1])=='0') {

                                                            $st[1]='No Pleats';

                                                          }

                                                          else if($st[0]=='shirt_pleats' && trim($st[1])=='1') {

                                                            $st[1]='Box pleat';

                                                          }

                                                          else if($st[0]=='shirt_pleats' && trim($st[1])=='2') {

                                                            $st[1]='Side folds';

                                                          }



                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='1') {

                                                            $st[1]='Single Cuff 1 Button';

                                                          }

                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='2') {

                                                            $st[1]='Single Cuff 2 Buttons';

                                                          }

                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='3') {

                                                            $st[1]='One Button Cut';

                                                          }

                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='4') {

                                                            $st[1]='Two Button Cut';

                                                          }

                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='5') {

                                                            $st[1]='Single French Cuff';

                                                          }

                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='6') {

                                                            $st[1]='Double French Cuff';

                                                          }

                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='7') {

                                                            $st[1]='Rounded 1 Button';

                                                          }

                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='8') {

                                                            $st[1]='Rounded 2 Buttons';

                                                          }

                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='9') {

                                                            $st[1]='Rounded French Cuff';

                                                          }

                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='10') {

                                                            $st[1]='Double Rounded French Cuff';

                                                          }

                                                          else if($st[0]=='shirt_cuffs' && trim($st[1])=='') {

                                                            $st[1]='-';

                                                          }

                                                        }

                                



                                                      

                                                      

                                                   ?>

                                                   <?php if($st[0]!='waistcoat_price'): ?>

                                                      <p><strong><?php echo str_replace("_"," ",strtoupper($st[0])); ?></strong> : <?php echo str_replace("_"," ",strtoupper($st[1])); ?></p>

                                                    <?php endif; ?>

                                                   <?php

                                                  }

                                                  ?>

                                                    <p>

                                                      

                                                    </p>

                                                </div>

                                                <div class="tab-pane fade" id="fab<?php echo $z;?>">

                                                <br><br>

                                                    <?php 

                                                     $fabric=explode("{",$r['om_fab']);

                                                     $fabric=explode(",",$fabric[1]);



                                                     $fabric_id = explode(":",trim($fabric[1],"}"));



                                                     $fabric_name= explode(":",trim($fabric[2],"}"));



                                                    $sql5=mysqli_query($con,"select * from fabric_master where fab_rand='".trim($fabric_id[1])."'");

                                                      if(mysqli_num_rows($sql5) > 0)

                                                      {

                                                        while($fab=mysqli_fetch_array($sql5)) {



                                                       ?>

                                                      <img src="<?php echo $homeurl.$fab['fab_img'];?>" style="height:150px;width:400px;">

                                                      <p><strong>Name :</strong> <?php echo $fab['fab_name']; ?></p>

                                                      <p><strong>Description :</strong> <?php echo strip_tags($fab['fab_desc']); ?></p>



                                                      <?php if($fabric_name[1]!='') { ?>

                                                      <p><strong>In Store Fabric :</strong> <?php echo $fabric_name[1]; ?> </p>



                                                      <?php } ?> 



                                                      <?php } } ?>

                                                </div>

                                                <div class="tab-pane fade" id="ext<?php echo $z;?>">

                                                <br><br>

                                                   <?php $accents=explode(",",$r['om_accents']);

                                                    if($accents[0] == '') { ?>

                                                    <p><strong>Accents Details Not Available !</strong>

                                                    <?php }

                                                    else {

                                                    foreach ($accents as $key => $value) {?>

                                                  <p>

                                                                           <?php 

                                                                           $ac=str_replace("{","",$accents[$key]);

                                                                             $ac=str_replace(":"," : ", trim($ac,"}"));

                                                                             

                                                                             if(strpos($ac,'jacket_lining_id')!== false)

                                                                                {

                                                                                  $lin=explode(" : ", $ac);

                                                                                  

                                                                                  if(trim($lin[1])!='') {

                                                                                  ?>



                                                                                <p><strong>Custom Lining :</strong></p> <img  src="<?php echo $homeurl; ?>assets/dimg/lining/default/<?php echo trim($lin[1]);?>_normal.jpg" alt="" style="width:400px;height:150px;">

                                                                                <?php }

                                                                             }



                                                                                $ac = explode(" : ",$ac);



                                                                                if(trim($ac[1])!='' && trim($ac[0])!='lining_price' && trim($ac[0])!='jacket_lining_id' && trim($ac[0])!='font_price' && trim($ac[0])!='metal_button_price' && trim($ac[0])!='neck_lining_price' && trim($ac[0])!='elbow_price' && trim($ac[0])!='handkerchief_price' && trim($ac[0])!='button_holes_price' && trim($ac[0])!='cuff_lining_price') 

                                                                                   echo "<p><strong>".ucwords(str_replace('_',' ',$ac[0]))." : </strong>  ".ucwords(str_replace('_',' ',$ac[1]))."</p>";

                                                                           ?>

                                                                          </p>

                                                  <?php } }

                                                  ?>

                                                </div>

                                            </div>

                                          </div>

                                        </div>

                                        <div style="width:330px;float:right;min-height:534px;">

                                          <?php 

                                          $fab=explode(",",$r['om_fab']);

                                          $fab=trim($fab[1],"}");

                                          $fab=explode(":",$fab);

                                            $f_rand=mysqli_query($con,"select * from fabric_master where fab_rand = ".$fab[1]."");

                                              $fr=mysqli_fetch_array($f_rand);

                                              $sql1_im=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");

                                             $r123=mysqli_fetch_array($sql1_im);

                                            ?>

                                             <img src="<?php echo $homeurl.$r123['p_img'];?>" alt="Shop item" style="width:300px;">

                                             <?php ;?>

                                     </div>

                                     </div>

                                  </div>

                                </div>

                              </div>



                          <!--End Customize Details-->



                    </tr>

                  <?php $z++;} }

                  $t1="";

                  if(mysqli_num_rows($gift))

                  {

                  while ($g1=mysqli_fetch_array($gift))

                   {

                     $t1=$t1 + ($g1['amount'] * $g1['quantity']);

                    ?>

                    <tr>

                      <td colspan="2">Gift Card<br>

                        <?php echo $g1['gift_code']."<br>$".number_format($g1['amount'],2);?>

                        <td>

                          <a href="javascript:void(0);" class="del-gift btn btn-danger btn-xs" data-user-id="<?php echo $id; ?>" data-order-id="<?php echo $g1['orderid'];?>" data-id="<?php echo $g1['gc_id'];?>">

                            Remove</a>

                        </td>

                        <td class="text-center">

                          <?php echo $g1['quantity'];?>

                        </td>

                        <td class="text-center">

                          <?php echo "$".number_format($g1['amount'],2);?>

                        </td>

                        <td>&nbsp;</td>

                    </tr>

                  <?php                   

                   }

                 }

                

                  else if(mysqli_num_rows($gift) <=0 && mysqli_num_rows($sql) <=0)

                    {

                      ?>

                      <tr>

                        <td colspan="6">

                        <p>No Records Found.</p>

                            <a href="<?php echo $adminurl;?>new-order/<?php echo $_GET['id'];?>/" 

                              class="btn btn-danger">

                            Conitnue Shopping</a>

                        </td>

                      </tr>

                      <?php

                      }?>

                  </tbody>

                  </table>



                  <div class="example-modal" id="measurement">

                            <div class="modal" style="display: none;">

                              <div class="modal-dialog modal-lg">

                                <div class="modal-content">

                                  <div class="modal-header">

                                    <button type="button" class="close close-btn" onClick="window.location.href=&quot;&quot;;" aria-label="Close"><span aria-hidden="true">×</span></button>

                                    <h4 class="modal-title">Measurement Profile </h4>

                                  </div>

                                  <div class="modal-body">

                                   <input type="hidden" class="o_id">

                                  <div class="mp_table">

                                   <a href="javascript:void(0);" class="new_profile btn btn-primary">Add New Profile</a><br><br>

                                  

                                    <table id="example1" class="table table-striped">

                                      <thead>

                                        <th>Name</th><th>Gender</th><th>Weight</th>

                                        <th>Height</th><th>Options</th>

                                      </thead>

                                      <tbody class="tbody_measure">

                                      <?php 

                                      $sql=mysqli_query($con,"select * from measurement_profile_master where mp_userid=".$_GET['id']);

                                      while ($r=mysqli_fetch_array($sql))

                                      {

                                      ?>

                                        <tr class="tr_<?php echo $r['mp_id'];?>">

                                          <td><?php echo $r['mp_name'];?></td>

                                          <td><?php echo $r['gender'];?></td>

                                          <td><?php echo $r['mp_height'];?></td>

                                          <td><?php echo $r['mp_weight'];?></td>

                                          <td>

                                            <a href="javascript:void(0)" data-id="<?php echo $r['mp_id'];?>" class="select_mp btn btn-xs btn-danger">

                                            Select</a>

                                            <a href="javascript:void(0)" data-id="<?php echo $r['mp_id'];?>"class="up_mp btn btn-xs btn-danger">

                                            Modify</a>

                                            <a href="javascript:void(0)" data-id="<?php echo $r['mp_id'];?>" class="btn btn-xs btn-danger del_mp">

                                            Delete</a>

                                          </td>

                                        </tr>

                                      <?php }?>

                                      </tbody>

                                    </table>

                                    </div>

                                  </div>

                                  <div class="modal-footer">

                                  <button type="button" class="btn hide btn-danger save_mp_btn pull-right">Save</button>

                                   <span style="width:15px;" class="pull-right">&nbsp;</span>

                                    <button type="button" class="btn btn-default pull-right" onClick="window.location.href=&quot;&quot;" ;="">Close</button>

                                  </div>

                                </div><!-- /.modal-content -->

                              </div><!-- /.modal-dialog -->

                            </div><!-- /.modal -->

                          </div>

                  <?php  if($num > 0 || mysqli_num_rows($gift)){?>

                   <div class="col-sm-6 col-md-4 pull-left">

                    <br>

                    <?php
                      
                      $g8=mysqli_query($con,"select amount,code,gca_id,gcid from gift_card_applied where userid=$id and status=0");
                      $coupon8=mysqli_query($con,"select * from coupon_applied where userid=$id and status=0");

                       $g81 = mysqli_fetch_array($g8);
                       $c81 = mysqli_fetch_array($coupon8);

                       if( ($tot+ $t1) - $g81['amount']  >= $c81['amount'])

                        {

                          if($c81['coupon_type']=="$")

                            $ca3=$c81['value'];

                          else if($c81['coupon_type']=="Discount")

                            $ca3= (($tot+ $t1 - $g81['amount']) / 100) * $c81['value'];

                        }

                        else

                          $ca3=($tot+ $t1) - $g81['amount'];

                       
                       $sb1=$tot  + $t1;

                       $tot_amt_dtl=(($tot+ $t1) - $g81['amount']) - $ca3;
                       $gft_amt = $g81['amount'];



                       if($tot_amt_dtl < 0)
                       {
                       
                        
                        if($sb1 < $g81['amount'])
                        {
                        
                       
                          $gift_card_sql = mysqli_query($con,"select amount from gift_card_master where gift_code='".$g81['code']."'");
                          $gift_card_dtls = mysqli_fetch_array($gift_card_sql);
                          $balance = $gift_card_dtls['amount']-$sb1;
                          $upd_qry = mysqli_query($con,"update gift_card_master set balance='".$balance."' where gift_code='".$g81['code']."'");
                          $upd_qry1 = mysqli_query($con,"update gift_card_applied set amount='".$sb1."' where code='".$g81['code']."'");
                          $del_qry = mysqli_query($con,"delete from coupon_applied where code='".$c81['code']."'");
                         } 

                         else if($sb1 > $g81['amount'])
                         {
                          $del_qry = mysqli_query($con,"delete from coupon_applied where code='".$c81['code']."'");
                         }
                       }

                      $g5=mysqli_query($con,"select amount as amount from gift_card_applied where userid=$id and status=0");

                      $r5=mysqli_fetch_array($g5);

                      $cp1=mysqli_query($con,"select * from coupon_applied where userid=$id and status=0");

                        $ca1=mysqli_fetch_array($cp1);

                        if( ($tot+ $t1) - $r5['amount']  >= $ca1['amount'])

                        {

                          if($ca1['coupon_type']=="$")

                            $ca2=$ca1['value'];

                          else if($ca1['coupon_type']=="Discount")

                            $ca2= (($tot+ $t1 - $r5['amount']) / 100) * $ca1['value'];

                        }

                        else

                          $ca2=($tot+ $t1) - $r5['amount'];

                    ?>

                    <div class="form-group col-md-12 padding-zero">

                      <div class="col-md-8 padding-zero">

                        <input type="text" id="promo-code" class="form-control" placeholder="Enter Coupon Code">

                      </div>&nbsp;&nbsp;&nbsp;

                      <input type="button" class="btn btn-danger apply_promo" value="Apply" 

                       data-user-id="<?php echo $_GET['id']; ?>"  data-oid="<?php echo $_GET['oid'];?>" 

                         data-amt="<?php echo ($tot+ $t1) - $r5['amount']-$ca2;?>">

                         <br>

                         <div class="coup_msg"></div>

                    </div>

                    <div class="form-group col-md-12 padding-zero">

                      <input type="checkbox" class="flat-red gift_check">

                            &nbsp;&nbsp;&nbsp;Have Gift Card

                    </div>

                    <div class="form-group col-md-12 padding-zero gift_check_div hide">

                      <div class="col-md-8 padding-zero">

                        <input type="text" class="form-control" id="gift-code" 

                          placeholder="Enter Gift Voucher Code">

                      </div>&nbsp;&nbsp;&nbsp;

                        

                      <input type="button" class="btn btn-danger gift_apply" value="Apply" 

                      data-oid="<?php echo $_GET['oid'];?>" data-user-id="<?php echo $_GET['id']; ?>"

                         data-amt="<?php echo (($tot+ $t1) - $r5['amount'])  - $ca2;?>">

                    </div><br>

                    <div class="gift_msg">

                    </div><br>

                        <a href="<?php echo $adminurl;?>new-order/<?php echo $_GET['id'];?>/" class="btn btn-danger"

                          >Continue Shopping</a>

                    </div>

                     <?php 

                     $pay=$site->get_payment_information();

                      $tax=$site->get_tax($id);

                    $shipping_cost=$pay[0]['shipping_cost'];

                     ?>

                    <div class="col-sm-6 col-md-6 col-md-offset-2 pull-right">

                        <div class="table">

                            <table class="price-calc col-md-10 pull-right">

                                <tbody>

                                    <tr>

                                        <th><h4>Subtotal</h4></th>

                                        <td style="text-align:right" class="sub_tot" subtot="<?php echo $tot + $t1; ?>">

                                            <h4><strong>$<?php echo number_format($tot + $t1,2);

                                            $sb=$tot + $t1;?></strong></h4>

                                        </td>

                                    </tr>

                                     <?php 

                                    $g4a=array();$g4b=0;

                                    $g4=mysqli_query($con,"select amount,code,gca_id,gcid from gift_card_applied where userid=$id and status=0");

                                    $coupon=mysqli_query($con,"select * from coupon_applied where userid=$id and status=0");

                                    if(mysqli_num_rows($g4) > 0)

                                    {
                                      $g41=mysqli_fetch_array($g4);
                                      /*while($g41=mysqli_fetch_array($g4))

                                      {*/

                                        $g4a[$g4b]=$g_amt=$g41['amount'];

                                        ?>

                                        <tr>

                                        <th>

                                         <a href="javascrip:void(0);" class="remove_gift" data-gid="<?php echo $g41['gcid'];?>" data-id="<?php echo $g41['gca_id'];?>"><i class="fa fa-trash"></i></a>

                                        

                                        Gift Card <br>(<?php echo $g41['code'];?>)</th>

                                          <td class="text-right">

                                              <h4><strong> $<?php echo number_format($g41['amount'],2);?></strong></h4>

                                          </td>

                                        </tr>

                                         <tr>

                                        <?php $g4b++;

                                      //}

                                    }

                                    if( mysqli_num_rows($coupon) )

                                    {

                                      $cr=mysqli_fetch_array($coupon);

                                      ?>

                                        <tr>

                                          <th>

                                            <a href="javascrip:void(0);" class="remove_coupon" data-cid="<?php echo $cr['ca_id'];?>"><i class="fa fa-trash"></i></a>

                                            Coupon ( <?php echo $cr['code'];?> )

                                          </th>

                                          <td class="text-right">

                                              <h4>

                                               <?php

                                                if($cr['coupon_type']=="$")

                                                {

                                                  ?>

                                                  <strong> $<?php echo number_format($cr['value'],2);?></strong>

                                                  <?php

                                                }

                                                else  if($cr['coupon_type']=="Discount")

                                                {

                                                  ?>

                                                  <strong> <?php echo number_format($cr['value'],2);?>%</strong>

                                                  <?php

                                                }

                                                else if($cr['coupon_type']=="Free Shipping")

                                                {

                                                  ?>

                                                  <strong> Free Shipping</strong>

                                                  <?php

                                                }

                                                ?>

                                              </h4>

                                          </td>

                                        </tr>

                                      <?php

                                    }

                                    if( mysqli_num_rows($g4) || mysqli_num_rows($coupon) )

                                    {

                                    ?>

                                    <!--<th><h4>Subtotal</h4></th>-->

                                        <?php

                                              if($cr['coupon_type']=="Discount")

                                              {

                                                $dis=(($sb - array_sum($g4a)) / 100) * $cr['value'];

                                              }

                                              else  if($cr['coupon_type']=="$")

                                              {

                                                if( ($sb - array_sum($g4a))  >=  $cr['value'])

                                                  $dis= $cr['value']; 

                                                else

                                                  $dis = $sb - array_sum($g4a);

                                              }

                                              else if($cr['coupon_type']=="Free Shipping")

                                              {

                                                $shipping_cost= 0; 

                                                $dis= 0; 

                                              }

                                          ?>

                                        <!--<td class="text-right sub_tot1" subtot="<?php echo ($sb - array_sum($g4a)) - $dis; ?>">

                                            <h4><strong>$-->

                                            <?php

                                             //echo number_format(($sb - array_sum($g4a)) - $dis,2);

                                             $sb=($sb - array_sum($g4a)) - $dis;?></strong></h4>

                                        <!--</td>

                                      </tr>-->

                                    <?php

                                    }

                                    ?>

                                    <tr>

                                      <th><h4>Discount(In Price) </h4></th>

                                        <td class="text-right">

                                          <input type="text" name="discount" class="order_discount" id="discount" value="" style="width:34%;">

                                        </td>

                                      </tr>

                                    <?php

                                    if($tax!="" || $tax!=0 || $tax!="0")

                                    {

                                    ?>

                                    <tr>

                                        <th><h4>Tax</h4></th>

                                        <td class="text-right tax" tax="<?php echo $tax; ?>">

                                            <h4><strong>

                                            <strong><small>(+)</small>

                                            <?php if($sb!='0'){echo number_format($tax,2);}

                                            else{echo "0";}?>%</strong></h4>

                                        </td>

                                    </tr>

                                    <?php }?>

                                     <tr>

                                        <th><h4>Shipping</h4></th>

                                        <td class="text-right">

                                            <h4><strong><small>(+)</small>

                                            $<?php echo number_format($shipping_cost,2);?></strong></h4>

                                        </td>

                                    </tr>

                                    <?php 

                                    $tp=($sb / 100) * $tax;

                                    ?>

                                    <tr class="order-total">

                                        <th><h4>Order total</h4></th>

                                        <td class="text-right">

                                            <h4 class="order_tot1"><strong>$<?php echo number_format((($tot+ $t1 + $tp + $shipping_cost) - array_sum($g4a)) - $dis,2);?></strong></h4>

                                            <input type="hidden" class="order_tot" name="order_tot" value="<?php echo (($tot+ $t1 ) - array_sum($g4a) ) - $dis; ?>" 

                                              data-ship="<?php echo $shipping_cost;?>" data-tax="<?php echo $tax;?>">



                                        </td>

                                    </tr>

                                    <tr class="order-total">

                                      <td>&nbsp;</td>

                                    </tr>

                                    <!--<tr class="order-total">

                                       <td><a href="<?php echo $adminurl;?>checkout/<?php echo $_GET['id'];?>/<?php echo $orderid?>/" class="btn btn-lg btn-danger proceed_to_checkout">Checkout</a></td>

                                    </tr>-->

                                    <tr class="order-total">

                                    <td>

                                    <?php

                                        $uinfo=$site->get_user($id);

                                    if($uinfo[0]['province']=='' || $uinfo[0]['province']=="0")

                                    {

                                        echo "Please update the billing address.<br><a href='".$adminurl."add-user/".$id."/' class='btn btn-danger btn-xs'>Update</a>";

                                    }

                                    else

                                    {?>

                                       <a href="<?php echo $adminurl;?>checkout/<?php echo $_GET['id'];?>/<?php echo $orderid?>/" class="btn btn-lg btn-danger proceed_to_checkout">Checkout</a>

                                       <?php }?>

                                       </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <?php }?>

                </div><!-- /.box-body -->

              </div>

              <br/>         

              <br/>

        </div>

        <?php require('includes/footer.php');?>

    </div>

     <div class="example-modal" id="select_mp">

        <div class="modal" style="display:none;">

          <div class="modal-dialog">

            <div class="modal-content">

              <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

                Select Measurement

              </div>

              <div class="modal-body">

                Please Select Measurement Profile

              </div>

              <div class="modal-footer">

                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>

             </div>

          </div>

        </div>

      </div>

</body>

<?php 

}

else 

{

   header("Location:{$adminurl}logout/");

}

?>