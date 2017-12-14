<?php

if(isset($_SESSION['guest_id'])){
    $sql=mysqli_query($con,"select a.*,b.p_id,b.p_name,b.p_price from order_master a,product_master b where 
       a.sess_id='".$_SESSION['guest_id']."' and a.pid=b.p_id and a.om_status=1 order by a.created_date desc");
  }
  else if(isset($_SESSION['user_id']))
  {
    $sql=mysqli_query($con,"select a.*,b.p_id,b.p_name,b.p_price  from order_master a,product_master b where 
      a.userid='".$_SESSION['user_id']."' and a.pid=b.p_id and a.om_status=1 order by a.created_date desc");
  }

$oid=mysqli_real_escape_string($con,trim($_GET['id']));
/*$sql=mysqli_query($con,"select a.*,b.p_name,b.p_description,b.p_id from order_master a,product_master b where 
    a.order_id=$oid and a.pid=b.p_id and a.om_status=1");*/



//$r=mysqli_fetch_array($sql);
?>
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
                            Shopping cart
                        </h1>
                        <!-- BREADCRUMBS -->
                        <ul class="breadcrumbs list-inline pull-right">
                            <li><a href="<?php echo $homeurl;?>">Home</a></li><!--
                        --><li><a href="<?php echo $homeurl;?>shop/">Shop</a></li><!--
                        --><li>Shopping cart</li>
                        </ul>
                        <!-- !BREADCRUMBS -->
                    </div>
                </header>
            </div>
        </div><!-- !full-width -->
        <div class="container">
            <!-- !FULL WIDTH -->
            <!-- !SECTION EMPHASIS 1 -->

            <section class="row">
                
                    <div class="col-xs-12">
                        <div class="table table-responsive cart-summary">
                            <table>
                                <thead>
                                <tr>
                                    <td>Product</td>
                                    <td>&nbsp;</td>
                                    <td class="width16">Options</td>
                                    <td class="width16">Quantity</td>
                                    <td class="text-right width16">Subtotal</td>
                                    <td class="text-right width16">Measurement</td>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($sql)
                                    {
                                        if(mysqli_num_rows($sql) > 0)
                                        {
                                            $tot="";$z=0;
                                            while($r=mysqli_fetch_array($sql))
                                            {
                                              $z++;
                                                $order_id=$r['order_id'];
                                                $tot=$tot + ($r['om_quantity'] * $r['om_price']);
                                                $sql1=mysqli_query($con,"select * from product_images where pid='".$r['pid']."'");
                                                $r1=mysqli_fetch_array($sql1);

                                                   $get_sub_cat = $site->get_all_sub_category($r['subcatid']);

                                                   $fabid = explode("{",$r['fabid']);
                                                    $fabid = explode(",",$fabid[1]);
                                                    $fabid1 = explode(":",$fabid[0]);
                                                    $fabid2 = explode(":",$fabid[1]);

                                                    $fabid=$fabid1[1];
                                                    $fabid1=trim($fabid2[1],"}");

                                              //  $sql2=mysqli_query($con,"select w_id from wishlist_master where userid='".$_SESSION['user_id']."' and  pid='".$r['pid']."'");
                                            ?>
                                            <tr class="cart_<?php echo $r['om_id'];?>">
                                               <td>
                                                <div class="cart-img col-md-4">
                                                        <img src="<?php echo $homeurl.$r1['p_img'];?>" alt="Shop item">
                                                    
                                                   
                                                    </div>
                                                    </td>
                                                    <td>
                                               <div class="col-md-8  product-div" >
                                                    <h4><?php echo $r['p_name'];?></h4>
                                                    <span class="price">$<?php echo number_format($r['om_price'],2);?></span><br>

                                                    <?php if($r['om_img']!=''): ?>

                                                      <a class="btn btn-mini btn-primary"  data-toggle="modal" data-target="#viewDetails<?php echo $z;?>" href="javascript:void(0);">View Details</a>                                                    
                                                      
                                                      <form name="edit_customizer" class="<?php echo 'edit_customizer_'.$z;?>" action="<?php echo $homeurl;?>customize/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/" method="post">
                                                        <input type="hidden" name="orderid" value="<?php echo $r['om_id'];?>">
                                                        <input type="hidden" name="p_id" value="<?php echo $r['p_id'];?>">
                                                        <a class="btn btn-mini btn-primary custom-edit" href="javascript:;" data-id="<?php echo $z;?>">Edit</a>
                                                      </form>

                                                    <?php endif; ?>

                                                      <button type="button" class="modal-btn hide btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
                                                        <!-- Modal Dialog -->
                                                        <div class="modal fade" id="viewDetails<?php echo $z;?>" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                          <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h3 class="modal-title"><?php echo $r['p_name']?> - Customizer Details</h3>
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
                                                                            <div class="tab-pane fade in active" id="style<?php echo $z;?>">
                                                                            <?php 
                                                                            $style=explode(",",$r['om_style']);
                                                                            
                                                                            for ($k=0; $k < count($style); $k++) { 
                                                                                $st=str_replace(":"," : ",$style[$k]);
                                                                                $st=str_replace("{","",$st);
                                                                                $st=str_replace("}","",$st);
                                                                                $st = explode(" : ",$st);
                                                                                if($st[0] == 'breast_pocket' && $st[1] =='0') {
                                                                                  $st[1] = 'No';
                                                                                }
                                                                                else if($st[0] == 'breast_pocket' && $st[1] =='1') {
                                                                                  $st[1]='Yes';
                                                                                }
                                                                                else if($st[0] =='coat_belt' && $st[1] =='0') {
                                                                                  $st[1] = 'No';
                                                                                }
                                                                                else if($st[0] =='coat_back_cut' && $st[1] =='0') {
                                                                                  $st[1] ='Ventless';
                                                                                }
                                                                                else if($st[0] =='coat_pocket_type' && $st[1] =='0') {
                                                                                  $st[1] ='No Pocket';
                                                                                }
                                                                                else if($st[0] =='back_style' && $st[1] =='1_cut') {
                                                                                  $st[1] ='Center Vent';
                                                                                }
                                                                                
                                                                                else if($st[0] =='back_style' && $st[1] =='2_cut') {
                                                                                  $st[1] ='Side Vent';
                                                                                }
                                                                                 else if($st[0] =='back_style' && $st[1] =='uncut') {
                                                                                  $st[1] ='Ventless';
                                                                                }
                                                                                else if($st[0] =='back_pockets' && $st[1] =='0') {
                                                                                  $st[1] ='No';
                                                                                }
                                                                                
                                                                                
                                                                                else if($st[0] =='coat_back_cut' && $st[1] =='1') {
                                                                                  $st[1]='Center Vent';
                                                                                }
                                                                                 else if($st[0] =='pant_back_pockets' && $st[1] =='0') {
                                                                                  $st[1]='No';
                                                                                }
                                                                               else if($st[0] =='back_pockets' && $st[1] =='0') {
                                                                                  $st[1]='No';
                                                                                }
                                                                              else if($st[0] =='back_pockets' && $st[1] =='1') {
                                                                                  $st[1]='1 Pockets';
                                                                                }
                                                                              else if($st[0] =='back_pockets' && $st[1] =='2') {
                                                                                  $st[1]='2 Pockets';
                                                                                }
                                                                               else if($st[0] =='coat_buttons' && $st[1] =='2') {
                                                                                  $st[1]='2 Buttons';
                                                                                }
                                                                               else if($st[0] =='coat_buttons' && $st[1] =='4') {
                                                                                  $st[1]='4 Buttons';
                                                                                }
                                                                              else if($st[0] =='coat_buttons' && $st[1] =='8') {
                                                                                  $st[1]='8 Buttons';
                                                                                }
                                                                              else if($st[0] =='coat_buttons' && $st[1] =='12') {
                                                                                  $st[1]='12 Buttons';
                                                                                }
                                                                               else if($st[0] =='buttons' && $st[1] =='1') {
                                                                                  $st[1]='1 Button';
                                                                                }
                                                                               else if($st[0] =='buttons' && $st[1] =='2') {
                                                                                  $st[1]='2 Buttons';
                                                                                }
                                                                              else if($st[0] =='buttons' && $st[1] =='3') {
                                                                                  $st[1]='3 Buttons';
                                                                                }
                                                                              else if($st[0] =='buttons' && $st[1] =='4') {
                                                                                  $st[1]='4 Buttons';
                                                                                }
                                                                             else if($st[0] =='buttons' && $st[1] =='5') {
                                                                                  $st[1]='5 Buttons';
                                                                                }
                                                                              else if($st[0] =='buttons' && $st[1] =='6') {
                                                                                  $st[1]='6 Buttons';
                                                                                }

                                                                               else if($st[0] =='number_of_button' && $st[1] =='1') {
                                                                                  $st[1]='1 Button';
                                                                                }
                                                                               else if($st[0] =='number_of_button' && $st[1] =='2') {
                                                                                  $st[1]='2 Buttons';
                                                                                }
                                                                              else if($st[0] =='number_of_button' && $st[1] =='3') {
                                                                                  $st[1]='3 Buttons';
                                                                                }
                                                                              else if($st[0] =='number_of_button' && $st[1] =='4') {
                                                                                  $st[1]='4 Buttons';
                                                                                }
                                                                             else if($st[0] =='number_of_button' && $st[1] =='5') {
                                                                                  $st[1]='5 Buttons';
                                                                                }
                                                                              else if($st[0] =='number_of_button' && $st[1] =='6') {
                                                                                  $st[1]='6 Buttons';
                                                                                }
                                                                                
                                                                                else if($ac[0] == 'PANT BACK POCKETS' && $ac[1]== '1') {
                                                                                  $st[1]='Yes';
                                                                                }
                                                                             ?>
                                                                                <p><strong><?php echo str_replace("_"," ",strtoupper($st[0])); ?></strong> : <?php echo str_replace("_"," ",strtoupper($st[1])); ?></p>
                                                                             <?php
                                                                            }
                                                                            ?>
                                                                              <p>
                                                                                
                                                                              </p>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="fab<?php echo $z;?>">
                                                                              
                                                                              <?php if($fabid!='' && $fabid1!='' && is_numeric($fabid) && is_numeric($fabid1)) { ?>
                                                                              <p><strong>Jacket and Skirt:</strong></p>

                                                                              <?php $sql5=mysqli_query($con,"select * from fabric_master where fab_rand IN ($fabid,$fabid1)");
                                                                              if(mysqli_num_rows($sql5) > 0)
                                                                              {
                                                                                while($fab=mysqli_fetch_array($sql5)) {

                                                                               ?>
                                                                              <img src="<?php echo $homeurl;?>assets/dimg/fabric/<?php echo $fab['fab_rand'];?>_normal.jpeg" style="height:150px;width:400px;">
                                                                              <p><strong><?php echo $fab['fab_name']; ?></strong></p>
                                                                              <p><strong><?php echo strip_tags($fab['fab_desc']); ?></strong></p>

                                                                              <?php } } } else { ?>                                                                              
                                                                              <?php 
                                                                              $sql4=mysqli_query($con,"select * from fabric_master where fab_rand IN ('".$r['fabid']."')");
                                                                              if(mysqli_num_rows($sql4) > 0)
                                                                              {
                                                                                $fab=mysqli_fetch_array($sql4);

                                                                               ?>
                                                                              <p><strong>Fabric:</strong></p><img src="<?php echo $homeurl;?>assets/dimg/fabric/<?php echo $fab['fab_rand'];?>_normal.jpeg" style="height:150px;width:400px;">
                                                                              <p><strong><?php echo $fab['fab_name']; ?></strong></p>
                                                                              <p><strong><?php echo strip_tags($fab['fab_desc']); ?></strong></p>
                                                                            <?php } } ?>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="ext<?php echo $z;?>">
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
                                                                             if(strpos($ac,'lining')!== false)
                                                                                {
                                                                                  $lin=explode(" : ", $ac);
                                                                                  if($lin[1]!='') {
                                                                                  ?>

                                                                                <p><strong>Custom Lining :</strong></p> <img  src="https://izaapinnovations.com/kootoor/assets/dimg/lining/default/<?php echo $lin[1];?>_normal.jpg" alt="" style="width:400px;height:150px;">
                                                                                <?php }
                                                                             }

                                                                                $ac = explode(" : ",$ac);
                                                                                if(!empty($ac[1])) {
                                                                                  if($ac[0] == 'coatlining' || $ac[0] =='jacket_lining' || $ac[0] =='lining') {
                                                                                    $ac[0] ='';$ac[1]='';
                                                                                  }
                                                                                  else{
                                                                                   if($ac[0] =='coat_color' || $ac[0] == 'color') { ?>
                                                                                   <p><strong><?php echo ucwords(str_replace('_',' ',$ac[0])); ?>:</strong> <?php echo '#'.$ac[1]; ?></p>
                                                                                    
                                                                                   <?php } else { 
                                                                                  echo "<p><strong>".ucwords(str_replace('_',' ',$ac[0]))."</strong>: ".ucfirst($ac[1])."</p>";
                                                                                }

                                                                                }
                                                                               }
                                                                            
                                                                           ?>
                                                                          </p>
                                                                          <?php } }
                                                                          ?>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="width:315px;float:right;height:250px;" class="pop-img">
                                                                        
                                                                     
                                                                      <img src="<?php echo $homeurl.$r1['p_img'];?>" alt="Shop item">
                                                                  
                                                                    </div>
                                                                    
                                                              </div>

                                                              <!--<div class="modal-footer">
                                                              </div>-->
                                                            </div>
                                                          </div>
                                                        </div>
                                                        </div>
                                                </td>
                                                <td>
                                                    <!--<a href="#">Edit</a>-->&nbsp;&nbsp;&nbsp;
                                                    <a href="javascript:void(0);" data-id="<?php echo $r['om_id'];?>" data-toggle="modal" data-target="#deleteCart<?php echo $r['om_id'];?>" data-title="Delete Product" data-message="Are you sure you want to delete?" class="del_cart btn btn-primary btn-mini">Remove</a>
                                                </td>
                                                <!-- Modal Dialog -->
                                                <div class="modal fade" id="deleteCart<?php echo $r['om_id'];?>" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true" class="delete_product">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Delete Parmanently</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>Are you sure want to delete it ?</p>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger del-cart" data-id="<?php echo $r['om_id'];?>">Delete</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <td>
                                                    <input class="form-control spinner-quantity q_<?php echo $r['om_id'];?>" readonly value="<?php echo $r['om_quantity'];?>"
                                                    aria-valuenow="4"   id="quantity1" required>
                                                    <a href="javascript:void(0);" class="update_qty btn btn-primary btn-mini" data-id="<?php echo $r['om_id'];?>">Update</a>
                                                </td>
                                                <td class="text-right price1_<?php echo $r['om_id'];?>">
                                                    <strong>$<?php echo number_format($r['om_quantity'] * $r['om_price'],2);?></strong>
                                                </td>
                                                <?php if($r['mpid']!='0' && isset($_SESSION['login_succ'])) { 
                                                      $measurement_dtl_qry = mysqli_query($con,"select * from measurement_profile_master where mp_id='".$r['mpid']."'");
                                                      if(mysqli_num_rows($measurement_dtl_qry) > 0) {
                                                        $measurement_dtl = mysqli_fetch_array($measurement_dtl_qry);
                                                ?>
                                                <td class="text-left">
                                                   <a href="#" data-toggle="modal" data-target="#myModal<?php echo $measurement_dtl['mp_id']; ?>">Name : <?php echo $measurement_dtl['mp_name']; ?></a><br>
                                                   <span>Height : <?php echo $measurement_dtl['mp_height']; ?></span><br>
                                                   <span>Weight : <?php echo $measurement_dtl['mp_weight']; ?></span><br><br>
                                                   <span><a href="#" data-toggle="modal" class="btn btn-primary btn-mini" data-target="#myModal<?php echo $measurement_dtl['mp_id']; ?>">View Details</a></span>
                                                   <a href="<?php echo $homeurl;?>my-measurements/<?php echo $r["om_id"]; ?>/<?php echo $r["order_id"]; ?>/" class="btn btn-primary btn-mini">Change Measurement</a>
                                                 </td> 
                                                        <div class="modal fade" id="myModal<?php echo $measurement_dtl['mp_id']; ?>" role="dialog">
                                                          <div class="modal-dialog">
                                                            
                                                              <!-- Modal content-->
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                  <h4 class="modal-title">Measurement Profile</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <div class="custom-value">                                    
                                                                    <p><strong>Name:</strong> <?php echo $measurement_dtl['mp_name']; ?> </p>
                                                                    <p><strong>Height:</strong> <?php echo $measurement_dtl['mp_height']; ?> </p>
                                                                    <p><strong>Weight:</strong> <?php echo $measurement_dtl['mp_weight']; ?> </p>
                                                               
                                                                    <p><strong>Chest:</strong> <?php echo $measurement_dtl['mp_chest']; ?> </p>
                                                                    <p><strong>Abdomen:</strong> <?php echo $measurement_dtl['mp_abdomen']; ?> </p>
                                                                    <p><strong>Buttocks:</strong> <?php echo $measurement_dtl['mp_buttocks']; ?></p>
                                                                  

                                                                    <p><strong>Hips:</strong> <?php echo $measurement_dtl['mp_hips']; ?></p>
                                                                    <?php if(!empty($measurement_dtl['coat_length'])) { ?>
                                                                    <p><strong>Coat Length:</strong> <?php echo $measurement_dtl['coat_length']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['torso_length'])) { ?>
                                                                    <p><strong>Torso Length:</strong> <?php echo $measurement_dtl['torso_length']; ?> <span>cm</span></p>
                                                                    <?php } ?>

                                                                    <?php if(!empty($measurement_dtl['dress_length'])) { ?>
                                                                    <p><strong>Dress Length:</strong> <?php echo $measurement_dtl['dress_length']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['sleeve_length'])) { ?>
                                                                    <p><strong>Sleeve Length:</strong> <?php echo $measurement_dtl['sleeve_length']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['shoulder_width'])) { ?>
                                                                    <p><strong>Shoulder Width:</strong> <?php echo $measurement_dtl['shoulder_width']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['neck'])) { ?>
                                                                    <p><strong>Neck:</strong> <?php echo $measurement_dtl['neck']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['chest_around'])) { ?>
                                                                    <p><strong>Chest Around:</strong> <?php echo $measurement_dtl['chest_around']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['stomach'])) { ?>
                                                                    <p><strong>Stomach:</strong> <?php echo $measurement_dtl['stomach']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                  
                                                                    <?php if(!empty($measurement_dtl['breast_point'])) { ?>
                                                                    <p><strong>Breast Point:</strong> <?php echo $measurement_dtl['breast_point']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['waist_point'])) { ?>
                                                                    <p><strong>Waist Point:</strong> <?php echo $measurement_dtl['waist_point']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['pant_length'])) { ?>
                                                                    <p><strong>Pants Length:</strong> <?php echo $measurement_dtl['pant_length']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                 
                                                                    <?php if(!empty($measurement_dtl['skirt_length'])) { ?>
                                                                    <p><strong>Skirt Length:</strong> <?php echo $measurement_dtl['skirt_length']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['hips'])) { ?>
                                                                    <p><strong>Hips:</strong> <?php echo $measurement_dtl['hips']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['waist'])) { ?>
                                                                    <p><strong>Waist:</strong> <?php echo $measurement_dtl['waist']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                  
                                                                    <?php if(!empty($measurement_dtl['rise'])) { ?>
                                                                    <p><strong>Rise:</strong> <?php echo $measurement_dtl['rise']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['thigh'])) { ?>
                                                                    <p><strong>Thigh:</strong> <?php echo $measurement_dtl['thigh']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['bicep_around'])) { ?>
                                                                    <p><strong>Bicep Around:</strong> <?php echo $measurement_dtl['bicep_around']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                  
                                                                    <?php if(!empty($measurement_dtl['pant_waist'])) { ?>
                                                                    <p><strong>Pants Waist:</strong> <?php echo $measurement_dtl['pant_waist']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                    <?php if(!empty($measurement_dtl['skirt_position'])) { ?>
                                                                    <p><strong>Skirt Position:</strong> <?php echo $measurement_dtl['skirt_position']; ?> <span>cm</span></p>
                                                                    <?php } ?>
                                                                  
                                                                  </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                              </div>
                                                              
                                                            </div>
                                                        </div>  
                                                    <?php } } else if(isset($_SESSION['login_succ'])) { ?>
                                                        <td class="text-right">
                                                           <a href="<?php echo $homeurl;?>my-measurements/<?php echo $r["om_id"]; ?>/<?php echo $r["order_id"]; ?>/" class="btn btn-primary btn-mini">Add Measurement</a>
                                                           <input type="hidden" name="add-measurement" value="1">
                                                           </td>
                                                        <?php } else { ?>
                                                        <td class="text-right">
                                                           <button type="button" class="btn add-wishlist btn-info btn-mini"
                                                            data-pid="<?php echo $r['p_id'];?>" data-id="<?php echo $r['om_id'];?>">
                                                                Add to Measurement</button>
                                                           <input type="hidden" name="add-measurement" value="1">     
                                                        </td>
                                                <?php } ?>
                                            </tr>
                                           <?php }
                                        }

                                        else
                                        {
                                        ?>
                                            <tr>
                                                <td colspan="5">Empty Cart !!!<br><br>
                                                   <button type="button" onclick="window.location.href='<?php echo $homeurl;?>';" class="btn btn-default pull-left">Continue shopping</button>
                                               </td>
                                            </tr>
                                        <?php
                                        }

                                    }
                                else
                                {
                                ?>
                                <tr>
                                    <td colspan="5">Empty Cart !!!<br><br>
                                        <button type="button" onclick="window.location.href='<?php echo $homeurl;?>';" class="btn btn-default pull-left">Continue shopping</button>
                                    </td>
                                </tr>
                                <?php }?>
                                 <tr style="display:none;" class="emptycart">
                                    <td colspan="5" class="empty_cart">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php  if(mysqli_num_rows($sql) > 0)
                                        {?>
                    <div class="col-sm-6 col-md-4 form-inline offer">
                        <div class="form-group">
                            <label for="promo-code" class="sr-only">Promo code</label>
                            <input type="text" class="form-control" id="promo-code" required placeholder="Enter promo code">
                        </div><!--
                        --><button type="button" class="btn btn-primary btn-small">Apply</button>
                    </div>
                   
                    <div class="col-sm-6 col-md-4 col-md-offset-4 subdiv">
                        <div class="table">
                            <table class="price-calc">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td class="text-right subtotal">
                                            <strong>$<?php echo number_format($tot,2);?></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td class="text-right">
                                            <strong>$5.00</strong>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order total</th>
                                        <td class="text-right ordertotal">
                                            $<?php echo number_format($tot + 5,2);?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $order_id; ?>" name="o_id">
                    <div class="col-xs-12">
                        <button type="button" onclick="window.location.href='<?php echo $homeurl;?>Shop/';" class="btn btn-default pull-left">Continue shopping</button>
                        <a href="#"  class="btn proceed_to_checkout btn-primary pull-right">Proceed to checkout</a>
                    </div>
                     
                     <?php }
                    ?>
                
            </section>
        </div>
  </section>

    <!-- Modal Dialog -->
            <div class="modal fade" id="myModals" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true" class="select_measurement">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Select Measurement</h4>
                  </div>
                  <div class="modal-body">
                    <p>Please Select Measurement Profile</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                  </div>
                </div>
              </div>
            </div>

  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?php echo $homeurl;?>includes/action.php" method="post" id="ajax-login-form">
        <input type="hidden" name="return_url" value="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login to Add Measurement</h4>
      </div>
      <div class="modal-body">
        <div class="error-msg hide" style="color:red;padding:5px;">
             Invalid
          </div>
         <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email">
        </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
          </div>
      </div>
      <div class="modal-footer">
         <button type="submit" name="ajax_login" class="btn btn-primary pull-right">Login</button>
         <label for="password" class="pull-right">&nbsp;</label>
         <a href="<?php echo $homeurl; ?>signup/" class="pull-left" style="text-decoration:none;"><h4>Not yet registered?</h4></a>  
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
      </div>
    </div>
</form>
  </div>
</div>

<style>
@media (max-width: 767px) {
.modal-backdrop  { display:none;} 
  
}

</style>
<!-- SCRIPTS -->
<!-- core -->

