<?php



if(isset($_SESSION['guest_id'])){

    $sql=mysqli_query($con,"select a.*,b.p_id,b.p_name,b.p_price from order_master a,product_master b where 

       a.sess_id='".$_SESSION['guest_id']."' and a.pid=b.p_id and a.om_status=1 order by a.last_updated desc");

  }

  else if(isset($_SESSION['user_id']))

  {

    $sql=mysqli_query($con,"select a.*,b.p_id,b.p_name,b.p_price  from order_master a,product_master b where 

      a.userid='".$_SESSION['user_id']."' and a.pid=b.p_id and a.om_status=1 order by a.last_updated desc");

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

                                    <td class="text-left width16">Subtotal</td>

                                    <td class="text-left width16">Measurement</td>

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



                                                   $fabric=explode("{",$r['om_fab']);

                                                   $fabric=explode(",",$fabric[1]);

                                                   $fabric_price=explode(":",$fabric[0]);

                                                   $fabric_id = explode(":",trim($fabric[1],"}"));



                                                    



                                              //  $sql2=mysqli_query($con,"select w_id from wishlist_master where userid='".$_SESSION['user_id']."' and  pid='".$r['pid']."'");

                                            ?>

                                            <tr class="cart_<?php echo $r['om_id'];?>">

                                               <td>

                                                <div class="cart-img col-md-4">

                                                  <?php //if($r['om_style']==""){?>

                                                        <img src="<?php echo $homeurl.$r1['p_img'];?>" alt="Shop item">

                                                  <?php //} else if($r['om_style']!='') {

                                                   /*$get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");

 

                                                   if(mysqli_num_rows($get_fab_def_img) > 0) { 

                                                     $fab_def_img = mysqli_fetch_array($get_fab_def_img);

                                                  ?>

                                                     <img src="<?php echo $homeurl.$fab_def_img['default_img'];?>" alt="Customizer item">

                                                   <?php } } */ ?> 

                                                  </div>

                                                </td>

                                                    <td>

                                               <div class="col-md-8  product-div" >

                                                    <?php if($r['om_style']!='') { ?>

                                                      <h4>Custom <?php echo $r['p_name'];?></h4>

                                                    <?php } else { ?>

                                                      <h4><?php echo $r['p_name'];?></h4>

                                                    <?php } ?>

                                                    <span class="price">$<?php echo number_format($r['om_price'],2);?></span><br>



                                                    <?php  if($r['om_style']!=''): ?>



                                                      <a class="btn btn-mini btn-primary"  data-toggle="modal" data-target="#viewDetails<?php echo $z;?>" href="javascript:void(0);">View Details</a>                                                    

                                                      

                                                      <form name="edit_customizer" class="<?php echo 'edit_customizer_'.$z;?>" action="<?php echo $homeurl;?>customize/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/style/" method="post">

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

                                                                <h3 class="modal-title">

                                                                  <?php echo "Custom ". $r['p_name']?> - Customizer Details</h3>

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

                                                                              else if($r['p_type']=='coat') 

                                                                              {

                                                                                if($st[0] == 'coat_fit' && trim($st[1]) == '0') {

                                                                                  $st[1] = 'Straight';

                                                                                }
                                                                                else if($st[0] == 'coat_fit' && trim($st[1]) == '1') {

                                                                                  $st[1] = 'Slim';

                                                                                }
                                                                                else if($st[0] == 'coat_pockets' && trim($st[1]) == '0') {

                                                                                  $st[1] = 'No Pockets';

                                                                                }
                                                                                else if($st[0] == 'coat_pockets' && trim($st[1]) == '2') {

                                                                                  $st[1] = '2 Pockets';

                                                                                }
                                                                                else if($st[0] == 'coat_pockets' && trim($st[1]) == '3') {

                                                                                  $st[1] = '3 Pockets';

                                                                                }
                                                                                else if($st[0] == 'coat_pockets_type' && trim($st[1]) == '1' || $st[0] == 'coat_pockets_type' && trim($st[1]) == '6') {

                                                                                  $st[1] = 'Flap Pocket';

                                                                                }
                                                                                else if($st[0] == 'coat_pockets_type' && trim($st[1]) == '2' || $st[0] == 'coat_pockets_type' && trim($st[1]) == '7') {

                                                                                  $st[1] = 'Double-welted';

                                                                                }
                                                                                else if($st[0] == 'coat_pockets_type' && trim($st[1]) == '3') {

                                                                                  $st[1] = 'Patched';

                                                                                }
                                                                                 else if($st[0] == 'coat_pockets_type' && trim($st[1]) == '4') {

                                                                                  $st[1] = 'Diagonal';

                                                                                }
                                                                                 else if($st[0] == 'coat_pockets_type' && trim($st[1]) == '5') {

                                                                                  $st[1] = ' Diag-zipper';

                                                                                }
                                                                                else if($st[0] == 'coat_pockets_type' && trim($st[1]) == '5') {

                                                                                  $st[1] = ' Diag-zipper';

                                                                                }
                                                                                else if($st[0] == 'coat_backcut' && trim($st[1]) == '0') {

                                                                                  $st[1] = 'No';

                                                                                }
                                                                                else if($st[0] == 'coat_backcut' && trim($st[1]) == '0') {

                                                                                  $st[1] = 'No';

                                                                                }
                                                                                else if($st[0] == 'coat_backcut' && trim($st[1]) == '1') {

                                                                                  $st[1] = 'Center Vent';

                                                                                }
                                                                                else if($st[0] == 'coat_backcut' && trim($st[1]) == '2') {

                                                                                  $st[1] = 'Side Vents';

                                                                                }
                                                                                else if($st[0] == 'coat_shoulder' && trim($st[1]) == '0') {

                                                                                  $st[1] = 'No';

                                                                                }
                                                                                else if($st[0] == 'coat_shoulder' && trim($st[1]) == '1') {

                                                                                  $st[1] = 'Yes';

                                                                                }

                                                                                else if($st[0] == 'coat_chest_pocket' && trim($st[1]) == '0') {

                                                                                  $st[1] = 'No Pockets';

                                                                                }

                                                                                else if($st[0] == 'coat_belt' && trim($st[1]) == '0') {

                                                                                  $st[1] = 'No';

                                                                                }

                                                                                else if($st[0] == 'coat_sleeve' && trim($st[1]) == '0') {

                                                                                  $st[1] = 'No';

                                                                                }

                                                                                else if($st[0] == 'coat_closure_type_boton' && trim($st[1]) == '0') {

                                                                                  $st[1] = 'No';

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

                                                                              <img src="<?php echo $homeurl;?>assets/dimg/fabric/<?php echo $fab['fab_rand'];?>_normal.jpg" style="height:150px;width:400px;">

                                                                              <p><strong>Name:</strong> <?php echo $fab['fab_name']; ?></p>

                                                                              <p><strong>Description:</strong> <?php echo strip_tags($fab['fab_desc']); ?></p>

                                                                              

                                                                              <?php if($fabric_name[1]!='') { ?>

                                                                                <p><strong>In Store Fabric:</strong> <?php echo $fabric_name[1]; ?></p>



                                                                                <?php } ?> 

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

                                                                             

                                                                             if(strpos($ac,'jacket_lining_id')!== false)

                                                                                {

                                                                                  $lin=explode(" : ", $ac);

                                                                                  

                                                                                  if(trim($lin[1])!='') {

                                                                                  ?>



                                                                                <p><strong>Custom Lining :</strong></p> <img  src="<?php echo $homeurl; ?>assets/dimg/lining/default/<?php echo trim($lin[1]);?>_big.jpg" alt="" style="width:400px;height:150px;">

                                                                                <?php }

                                                                             }



                                                                                $ac = explode(" : ",$ac);



                                                                                if(trim($ac[1])!='' && trim($ac[0])!='lining_price' && trim($ac[0])!='jacket_lining_id' && trim($ac[0])!='font_price' && trim($ac[0])!='metal_button_price' && trim($ac[0])!='neck_lining_price' && trim($ac[0])!='elbow_price' && trim($ac[0])!='handkerchief_price' && trim($ac[0])!='button_holes_price' && trim($ac[0])!='cuff_lining_price') 

                                                                                   echo "<p><strong>".ucwords(str_replace('_',' ',$ac[0]))."</strong>: ".ucwords(str_replace('_',' ',$ac[1]))."</p>";

                                                                           ?>

                                                                          </p>

                                                                          <?php } }

                                                                          ?>

                                                                            </div>

                                                                          </div>

                                                                        </div>

                                                                    </div>

                                                                    <div style="width:315px;float:right;height:250px;" class="pop-img">

                                                                        

                                                                     

                                                                      <?php //if($r['om_style']==""){?>

                                                                          <img src="<?php echo $homeurl.$r1['p_img'];?>" alt="Shop item">

                                                                    <?php //} else if($r['om_style']!='') {

                                                                     /*$get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");

                   

                                                                     if(mysqli_num_rows($get_fab_def_img) > 0) { 

                                                                       $fab_def_img = mysqli_fetch_array($get_fab_def_img);

                                                                    ?>

                                                                       <img src="<?php echo $homeurl.$fab_def_img['default_img'];?>" alt="Customizer item">

                                                                     <?php } } */?> 

                                                                  

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

                                                    <a href="javascript:void(0);" data-id="<?php echo $r['om_id'];?>" data-order-id="<?php echo $r['order_id'];?>" data-toggle="modal" data-target="#deleteCart<?php echo $r['om_id'];?>" data-title="Delete Product" data-message="Are you sure you want to delete?" class="del_cart btn btn-primary btn-mini">Remove</a>

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

                                                        <button type="button" class="btn btn-danger del-cart" data-table="order_master" data-field='om_id' data-order-id="<?php echo $r['order_id'];?>" data-id="<?php echo $r['om_id'];?>">Delete</button>

                                                      </div>

                                                    </div>

                                                  </div>

                                                </div>

                                                <td>

                                                    <input class="form-control spinner-quantity q_<?php echo $r['om_id'];?>" readonly value="<?php echo $r['om_quantity'];?>"

                                                    aria-valuenow="4"   id="quantity1" required>

                                                    <a href="javascript:void(0);" class="update_qty btn btn-primary btn-mini" data-id="<?php echo $r['om_id'];?>">Update</a>

                                                </td>

                                                <td class="text-left price1_<?php echo $r['om_id'];?>">

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

                                                          <div class="modal-dialog modal-lg" style="top:0% !important;">

                                                            

                                                              <!-- Modal content-->

                                                              <div class="modal-content">

                                                                <div class="modal-header">

                                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                                  <h4 class="modal-title">Measurement Profile</h4>

                                                                </div>

                                                                <div class="modal-body">

                                                                  <div class="custom-value">                                    

                                                                    <p><strong>Name:</strong> <?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_name'])); ?> </p>

                                                                    <p><strong>Height:</strong> <?php echo $measurement_dtl['mp_height']; ?> </p>

                                                                    <p><strong>Weight:</strong> <?php echo ucwords(str_replace("_"," ", $measurement_dtl['mp_weight'])); ?> </p>

                                                               

                                                                    <p><strong>Chest:</strong> <?php echo $measurement_dtl['mp_chest']; ?> </p>

                                                                    <p><strong>Abdomen:</strong> <?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_abdomen'])); ?> </p>

                                                                    <p><strong>Buttocks:</strong> <?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_buttocks'])); ?></p>

                                                                  



                                                                    <p><strong>Hips:</strong> <?php echo $measurement_dtl['mp_hips']; ?></p>

                                                                    <?php 

                                                                    $sql22=mysqli_query($con,"select a.mpf_value,b.labelname from measurement_profile_value a,

                                                                     measurement_profile_fields b where a.mpid='".$measurement_dtl['mp_id']."' and a.mpfid=b.mpf_id");

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

                                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                                </div>

                                                              </div>

                                                              

                                                            </div>

                                                        </div>  

                                                    <?php } } else if(isset($_SESSION['login_succ'])) { ?>

                                                        <td class="text-left">
                                                           <?php if($r['subcatid']!="5")
                                                          { 
                                                            ?>
                                                           <a href="<?php echo $homeurl;?>my-measurements/<?php echo $r["om_id"]; ?>/<?php echo $r["order_id"]; ?>/" class="btn btn-primary btn-mini">Add Measurement</a>

                                                           <input type="hidden" name="add-measurement" value="1">
                                                           <?php }?>
                                                           </td>

                                                        <?php } else { ?>

                                                        <td class="text-left">
                                                        <?php if($r['subcatid']!="5")
                                                          { 
                                                            ?>
                                                           <button type="button" class="btn add-wishlist btn-info btn-mini"

                                                            data-pid="<?php echo $r['p_id'];?>" data-id="<?php echo $r['om_id'];?>">

                                                                Add to Measurement</button>

                                                           <input type="hidden" name="add-measurement" value="1">     
                                                           <?php 
                                                         }
                                                        ?>

                                                        </td>

                                                <?php } ?>

                                            </tr>

                                             <?php 

                                           }







                                         }

                                           

                                           



                                       



                                    }



                                            $t1="";

                                            if(isset($_SESSION['guest_id']))

                                            {

                                              $gift=mysqli_query($con,"select * from gift_card_master where sess_id='".$_SESSION['guest_id']."' and status=0 order by created_date desc");



                                            }

                                            else if(isset($_SESSION['user_id']))

                                            {

                                              $gift=mysqli_query($con,"select * from gift_card_master where userid='".$_SESSION['user_id']."' and status=0 order by created_date desc");



                                            }

                                            

                                            if(mysqli_num_rows($gift))

                                            {



                                              while ($gf=mysqli_fetch_array($gift))

                                               {

                                                $t1=$t1 + ($gf['amount'] * $gf['quantity']);

                                                ?>

                                                  <tr class="gift_cart_<?php echo $gf['gc_id'];?>">

                                                    <td>Gift Card<br>

                                                    (<?php echo $gf['gift_code'];?>)<br>

                                                    <?php echo "$".number_format($gf['amount'],2);?></td>

                                                    <td>&nbsp;</td>

                                                    <td>

                                                    <a href="javascript:void(0);" data-order="<?php echo $gf['orderid'];?>" data-id="<?php echo $gf['gc_id'];?>" data-toggle="modal" data-target="#deleteGift<?php echo $gf['gc_id'];?>" data-title="Delete Product" data-message="Are you sure you want to delete?" class="del_gift btn btn-primary btn-mini">Remove</a>

                                               <div class="modal fade" id="deleteGift<?php echo $gf['gc_id'];?>" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true" class="delete_product">

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

                                                        <button type="button" class="btn btn-danger del-gift" data-table="gift_card_master" data-field="gc_id" data-order="<?php echo $gf['orderid'];?>" data-id="<?php echo $gf['gc_id'];?>">Delete</button>

                                                      </div>

                                                    </div>

                                                  </div>

                                                </div>

                                                    </td>

                                                    <td class="text-left">

                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                      &nbsp;&nbsp;<?php echo $gf['quantity'];?>

                                                    </td>

                                                    <td class="text-left gift_price1_<?php echo $gf['gc_id'];?>">

                                                      <strong>

                                                        <?php echo "$".number_format($gf['quantity'] * 

                                                      $gf['amount'],2);?></strong>

                                                    </td>

                                                    <td>&nbsp;</td>

                                                  </tr>

                                              <?php 

                                              }

                                            }



                                if(mysqli_num_rows($sql) <=0 && mysqli_num_rows($gift) <=0)

                                {

                                ?>

                                <tr>

                                    <td colspan="5">Empty Cart !!!<br><br>

                                        <button type="button" onclick="window.location.href='<?php echo $homeurl;?>';" class="btn btn-default pull-left">Continue shopping</button>

                                    </td>

                                </tr>

                                <?php }

                                ?>

                                 <tr style="display:none;" class="emptycart">

                                    <td colspan="5" class="empty_cart">

                                    </td>

                                </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                     <?php 

                     $pay=$site->get_payment_information();

                     $shipping_cost=$pay[0]['shipping_cost'];

                     ?>

                    <?php  if(mysqli_num_rows($sql) || mysqli_num_rows($gift))

                      {

                        ?>

                         <?php

                         if(isset($_SESSION['guest_id']))

                                   {

                                      $g8=mysqli_query($con,"select amount,code,gca_id,gcid from gift_card_applied where sess_id='".$_SESSION['guest_id']."' and status=0");
                                      $coupon8=mysqli_query($con,"select * from coupon_applied where sess_id='".$_SESSION['guest_id']."' and status=0");



                                   }

                                   else if(isset($_SESSION['user_id']))

                                   {

                                    $g8=mysqli_query($con,"select amount,code,gca_id,gcid from gift_card_applied where userid='".$_SESSION['user_id']."' and status=0");
                                    $coupon8=mysqli_query($con,"select * from coupon_applied where userid='".$_SESSION['user_id']."' and status=0");




                                   }

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



                                   


                         if(isset($_SESSION['guest_id']))

                         {

                            $g5=mysqli_query($con,"select amount as amount from gift_card_applied where sess_id='".$_SESSION['guest_id']."' and status=0");

                            $cp1=mysqli_query($con,"select * from coupon_applied where sess_id='".$_SESSION['guest_id']."' and status=0");

                         }

                         else if(isset($_SESSION['user_id']))

                         {

                          $g5=mysqli_query($con,"select amount as amount from gift_card_applied where userid='".$_SESSION['user_id']."' and status=0");

                          $cp1=mysqli_query($con,"select * from coupon_applied where userid='".$_SESSION['user_id']."' and status=0");



                         }

                          

                          $r5=mysqli_fetch_array($g5);

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

                    <div class="col-sm-6 col-md-4 form-inline offer offer_dtl">

                        <div class="form-group">

                            <label for="promo-code" class="sr-only">Promo code</label>

                            <input type="text" class="form-control" id="promo-code" required placeholder="Enter promo code">

                        </div><!--

                        --><button type="button" 

                        data-amt="<?php echo (($tot+ $t1) - $r5['amount']) - $ca2 ;?>"

                        data-oid="<?php echo $oid;?>" class="btn apply_promo btn-primary btn-small">Apply</button><br><br>

                        <span class="coup_msg"></span>

                         <div class="form-group">

                          <input type="checkbox" class="gift_check">Have Gift Card?

                        </div><br><br>

                        <div  class="gift_check_div hide">

                        <div class="form-group ">

                            <label for="promo-code" class="sr-only">Promo code</label>

                            <input type="text" class="form-control" id="gift-code" required placeholder="Enter Gift Voucher code">

                        </div><!--

                        -->



                        <button type="button" class="btn btn-primary gift_apply btn-small"

                        data-oid="<?php echo $oid;?>"

                         data-amt="<?php echo (($tot+ $t1) - $r5['amount']) - $ca2 ;?>">Apply</button>

                         <br>

                         <div class="gift_msg">

                         </div>

                        </div>

                         

                    </div>



                      

                   

                    <div class="col-sm-6 col-md-4 col-md-offset-4 subdiv">

                        <div class="table">

                            <table class="price-calc">

                                <tbody>

                                    <tr>

                                        <th>Subtotal</th>

                                        <td class="text-right subtotal">

                                            <strong>$<?php echo $m=number_format($tot + $t1,2);

                                              $sb=$tot  + $t1;?></strong>

                                        </td>

                                    </tr>

                                      <?php 

                                     
                                     

                                   if(isset($_SESSION['guest_id']))

                                   {

                                      $g4=mysqli_query($con,"select amount,code,gca_id,gcid from gift_card_applied where sess_id='".$_SESSION['guest_id']."' and status=0");



                                      $coupon=mysqli_query($con,"select * from coupon_applied where sess_id='".$_SESSION['guest_id']."' and status=0");

                                   }

                                   else if(isset($_SESSION['user_id']))

                                   {

                                    $g4=mysqli_query($con,"select amount,code,gca_id,gcid from gift_card_applied where userid='".$_SESSION['user_id']."' and status=0");



                                    $coupon=mysqli_query($con,"select * from coupon_applied where userid='".$_SESSION['user_id']."' and status=0");



                                   }


                                    
                                   $g4a=array();$g4b=0;$dis=0;

                                    if(mysqli_num_rows($g4) )

                                    {


                                      $g41=mysqli_fetch_array($g4);
                                      /*while($g41=mysqli_fetch_array($g4))

                                      {*/

                                        $g4a[$g4b]=$g41['amount'];

                                        ?>

                                        <tr class="gift_sec">

                                          <th>

                                           <a href="javascript:void(0);" class="remove_gift" data-gid="<?php echo $g41['gcid'];?>" data-id="<?php echo $g41['gca_id'];?>"><i class="fa fa-trash"></i></a>

                                          

                                          Gift Card (<?php echo $g41['code'];?>)</th>

                                            <td class="text-right" gift_sec="<?php echo $g41['amount'];?>">

                                                <strong> $<?php echo number_format($g41['amount'],2);?></strong>

                                            </td>

                                        </tr>

                                        <?php $g4b++;

                                       //}

                                      }

                                      if(mysqli_num_rows($coupon))

                                      {

                                        $coupons=mysqli_fetch_array($coupon);

                                        ?>

                                          <tr>

                                            <th>

                                               <a href="javascript:void(0);" class="remove_coupon" data-cid="<?php echo $coupons['ca_id'];?>"><i class="fa fa-trash"></i></a>

                                                 Coupon (<?php echo $coupons['code'];?>)

                                               <td class="text-right coupon_sec" coup_sec="<?php echo $coupons['value']; ?>" coup_type="<?php echo $coupons['coupon_type']; ?>">

                                                <?php

                                                if($coupons['coupon_type']=="$")

                                                {

                                                  ?>

                                                  <strong> $<?php echo number_format($coupons['value'],2);?></strong>

                                                  <?php

                                                }

                                                else  if($coupons['coupon_type']=="Discount")

                                                {

                                                  ?>

                                                  <strong> <?php echo number_format($coupons['value'],2);?>%</strong>

                                                  <?php

                                                }

                                                else if($coupons['coupon_type']=="Free Shipping")

                                                {

                                                  ?>

                                                  <strong> Free Shipping</strong>

                                                  <?php

                                                }

                                                ?>

                                               </td>

                                            </th>

                                          </tr>

                                        <?php

                                      }

                                      if(mysqli_num_rows($g4) || mysqli_num_rows($coupon))

                                      {

                                       ?>

                                        <!--<tr>

                                         <th>Subtotal</th>-->

                                          <!--<td class="text-right subtotal1">

                                              <strong>$-->

                                              <?php 

                                              if($coupons['coupon_type']=="Discount")

                                              {

                                                $dis=(($sb - array_sum($g4a)) / 100) * $coupons['value'];

                                              }

                                              else  if($coupons['coupon_type']=="$")

                                              {

                                                if( ($sb - array_sum($g4a))  >=  $coupons['value'])

                                                  $dis= $coupons['value']; 

                                                else

                                                  $dis = $sb - array_sum($g4a);

                                              }

                                              else if($coupons['coupon_type']=="Free Shipping")

                                              {

                                                $shipping_cost= 0; 

                                                $dis= 0; 

                                              }

                                              //echo number_format(($sb - array_sum($g4a)) - $dis,2);

                                              $sb=($sb - array_sum($g4a)) - $dis;?></strong>

                                          <!--</td>

                                        </tr>-->

                                        <?php

                                      }

                                      ?>

                                     <?php 

                                      $userid=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "0";

                                      $tax=$site->get_tax($userid);

                                      if($tax!=0 || $tax!="0" || $tax!="")

                                      {

                                    ?>

                                    <tr>

                                        <th>Tax</th>

                                        <td class="text-right tax" tax="<?php echo $tax; ?>">

                                            <strong><small>(+)</small>

                                            <?php echo number_format($tax,2);?>%</strong>

                                        </td>

                                    </tr>

                                    <?php }?>



                                    <tr>

                                        <th>Shipping</th>

                                        <td class="text-right ship_cost" ship_cost="<?php echo $shipping_cost; ?>">

                                            <strong>$<?php echo number_format($shipping_cost,2);?></strong>

                                        </td>

                                    </tr>

                                 

                                    <tr class="order-total">

                                        <th>Order total</th>

                                        <td class="text-right ordertotal">

                                            $<?php 

                                            $tp=($sb / 100) * $tax;

                                            echo number_format((($tot + $tp +  $t1 + $shipping_cost) - array_sum($g4a) - $dis),2);?>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <input type="hidden" value="<?php echo $oid; ?>" name="o_id">

                    <div class="col-xs-12">

                    <?php

                    $uinfo=$site->get_user($_SESSION['user_id']);

                    $prov=$uinfo[0]['province'];

                    if(isset($_SESSION['guest_id'])){$prov="1";}

                    if($prov=="0" || $prov=="")

                    {

                      echo "<div class='text-right'>Please update your billing address to proceed.<br>

                          <a href='".$homeurl."address-book/' class='btn btn-mini btn-danger'>Update Address</a></div>";

                    }

                    else

                    {

                    ?>

                        <button type="button" onclick="window.location.href='<?php echo $homeurl;?>Shop/';" class="btn btn-default pull-left">Continue shopping</button>

                        <a href="#"  class="btn proceed_to_checkout btn-primary pull-right">Proceed to checkout</a>

                  <?php }?>

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



