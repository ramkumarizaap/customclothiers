<div class="tab-pane active" id="style_<?php echo $a;?>">
 	<?php 
   $style=explode("{",$r['om_style']);
   $style=explode(",",$style[1]);
   $jacket_style = explode(":",$style[0]);
   $jacket_fit = explode(":",$style[1]);
   $jacket_lapel_type = explode(":",$style[2]);
   $jacket_buttons = explode(":",$style[3]);
   $jacket_chest_pocket = explode(":",$style[4]);
   $jacket_pockets = explode(":",$style[5]);
   $jacket_pockets_type = explode(":",$style[6]);
   $jacket_vent = explode(":",$style[7]);
   $jacket_sleeve_buttons = explode(":",$style[8]);
   $jacket_sleeve_buttonholes = explode(":",trim($style[9],"}"));
   $p_img_qry=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");
      $p_imgs=mysqli_fetch_array($p_img_qry);
  ?>
  	<div id="body" class="man_suit2_configure garment_container">
     	<div class="body_box" id="features">
       	<div class="body_product_box_3d">
        	<div id="man_suit">          
          	<form  id="configure_form" class="configure_form">
          	  <div class="box_right_3d suit">
                <div id="box_mini_next_3d"></div>
                <div id="move">
                  <div id="control_suit">
                    <!-- Rotate model -->                                           
                  </div>
                  <!-- MODEL 3D -->
                  <div id="loading"></div>            
                  <div id="model_3d_preview1" class="man_suit" style="position: relative;">
                   <?php
                    /*if($r['om_style']!='')
                     {
                        $get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");
                        if(mysqli_num_rows($get_fab_def_img) > 0)
                         { 
                            $fab_def_img = mysqli_fetch_array($get_fab_def_img);
                            ?>*/
                               echo "<img src=".$homeurl.$p_imgs['p_img']." alt='Customizer item'>";
                            /*<?php 
                          } 
                      }*/ ?>
                  </div>
                  <!-- CONTROLS -->
                  <br style="clear: both;">                                          
                </div>
              </div>
              <div class="opt_box">
	              <div class="content suit garment_block" id="max_height_move" style="display:block;">
	                <!-- JACKET CONFIG -->
	                <div class="box_title" style="margin-top: 20px;">
	                  <h1 class="title suit">
	                    Jacket
	                  </h1>
	                </div>
	                <div class="box_opts" product_type="jacket">
                    <!-- Jacket: Style -->
                    <div class="conf_opt config_3d">
                      <div class="box_title">
                        <p>
                          Style:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div id="options_jacket_style" class="radio_opt">
                          <label class="option <?php if($jacket_style[1]!='' && trim($jacket_style[1])=='simple') { ?> checked <?php } ?>">
                            <div class="radio">
                             <span class="<?php if($jacket_style[1]!='' && trim($jacket_style[1])=='simple') { ?> checked <?php } ?>">
                              <input layer="jacket_corpus" class="uniform radio_opt  jacket_style" id="jacket_style_simple" type="radio" name="jacket_style" value="simple" <?php if($jacket_style[1]!='' && trim($jacket_style[1])=='simple') { ?> checked <?php } ?> >
                              Single breasted
                             </span>
                            </div>
                          </label>
                          <label class="option <?php if($jacket_style[1]!='' && trim($jacket_style[1])=='crossed') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if($jacket_style[1]!='' && trim($jacket_style[1])=='crossed') { ?> checked <?php } ?>"> 
                              <input layer="jacket_corpus" class="uniform radio_opt  jacket_style" id="jacket_style_crossed" type="radio" name="jacket_style" value="crossed" <?php if($jacket_style[1]!='' && trim($jacket_style[1])=='crossed') { ?> checked <?php } ?>>
                              Double breasted
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if($jacket_style[1]!='' && trim($jacket_style[1])=='mao') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if($jacket_style[1]!='' && trim($jacket_style[1])=='mao') { ?> checked <?php } ?>"> 
                             <input layer="jacket_corpus" class="uniform radio_opt  jacket_style" id="jacket_style_mao" type="radio" name="jacket_style" value="mao" <?php if($jacket_style[1]!='' && trim($jacket_style[1])=='mao') { ?> checked <?php } ?>>
                             Asian
                            </span>
                           </div>
                          </label>
                        </div>
                      </div>
                    </div>

                     <div class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                            Fit:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="radio_opt">
                            <label class="option <?php if($jacket_fit[1]!='' && trim($jacket_fit[1])=='0') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($jacket_fit[1]!='' && trim($jacket_fit[1])=='0') { ?> checked <?php } ?>">  
                                <input layer="jacket_corpus" class="uniform radio_opt " type="radio" name="jacket_fit" value="0" <?php if($jacket_fit[1]!='' && trim($jacket_fit[1])=='0') { ?> checked <?php } ?> >
                                Classic Fit
                              </span>
                             </div>
                            </label>
                            <label class="option <?php if($jacket_fit[1]!='' && trim($jacket_fit[1])=='1') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($jacket_fit[1]!='' && trim($jacket_fit[1])=='1') { ?> checked <?php } ?>"> 
                               <input layer="jacket_corpus" class="uniform radio_opt " type="radio" name="jacket_fit" value="1" <?php if($jacket_fit[1]!='' && trim($jacket_fit[1])=='1') { ?> checked <?php } ?>>
                                Slim Fit
                               </span>
                             </div>
                            </label>
                          </div>
                        </div>
                    </div>

                    <div id="lapel_options" style="<?php if($jacket_style[1]!='' && trim($jacket_style[1])=='mao') { ?> display:none <?php } else { ?> display:block <?php } ?>">
                        <!-- Jacket: Lapel Type -->
                        <div class="conf_opt config_3d">
                          <div class="box_title">
                            <p>
                              Jacket Lapels:
                            </p>
                          </div>
                          <div class="box_opt">
                            <div class="radio_opt">
                              <label class="option <?php if($jacket_lapel_type[1]!='' && trim($jacket_lapel_type[1])=='standard') { ?> checked <?php } ?>">
                               <div class="radio">
                                <span class="<?php if($jacket_lapel_type[1]!='' && trim($jacket_lapel_type[1])=='standard') { ?> checked <?php } ?>"> 
                                 <input layer="jacket_lapels" class="uniform radio_opt " type="radio" name="jacket_lapel_type" value="standard" <?php if($jacket_lapel_type[1]!='' && trim($jacket_lapel_type[1])=='standard') { ?> checked <?php } ?>>
                                 Notch
                                </span>
                               </div>
                              </label>
                              <label class="option <?php if($jacket_lapel_type[1]!='' && trim($jacket_lapel_type[1])=='peak') { ?> checked <?php } ?>">
                               <div class="radio">
                                <span class="<?php if($jacket_lapel_type[1]!='' && trim($jacket_lapel_type[1])=='peak') { ?> checked <?php } ?>">
                                 <input layer="jacket_lapels" class="uniform radio_opt " type="radio" name="jacket_lapel_type" value="peak" <?php if($jacket_lapel_type[1]!='' && trim($jacket_lapel_type[1])=='peak') { ?> checked <?php } ?>>
                                 Peak
                                </span>
                               </div>
                              </label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div id="global_jacket_buttons" class="conf_opt config_3d" style="<?php if($jacket_style[1]!='' && trim($jacket_style[1])=='mao') { ?> display:none <?php } else { ?> display:block <?php } ?>">
                        <div class="box_title">
                          <p>
                            Number of Buttons:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="radio_opt">
                            <label class="option">
                            	<?php echo $jacket_buttons[1];?>
                            </label>
                          </div>
                        </div>
                    </div>
                      <!-- Jacket: Chest Pocket -->
                    <div class="conf_opt config_3d">
                      <div class="box_title">
                        <p>
                          Breast Pocket:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="radio_opt">
                          <label class="option <?php if($jacket_chest_pocket[1]!='' && trim($jacket_chest_pocket[1])=='1') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if($jacket_chest_pocket[1]!='' && trim($jacket_chest_pocket[1])=='1') { ?> checked <?php } ?>"> 
                             <input layer="jacket_chest_pocket" class="uniform radio_opt " type="radio" name="jacket_chest_pocket" value="1" <?php if($jacket_chest_pocket[1]!='' && trim($jacket_chest_pocket[1])=='1') { ?> checked <?php } else if($_SESSION['suit']['style']['jacket_chest_pocket']=='') { ?> checked <?php } ?>>
                             Yes
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if($jacket_chest_pocket[1]!='' && trim($jacket_chest_pocket[1])=='0') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if($jacket_chest_pocket[1]!='' && trim($jacket_chest_pocket[1])=='0') { ?> checked <?php } ?>"> 
                             <input layer="jacket_chest_pocket" class="uniform radio_opt " type="radio" name="jacket_chest_pocket" value="0" <?php if($jacket_chest_pocket[1]!='' && trim($jacket_chest_pocket[1])=='0') { ?> checked <?php } ?>>
                             No
                            </span>
                           </div>
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="conf_opt config_3d">
                      <div class="box_title">
                        <p>
                          Hip Pockets:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="radio_opt labels_jacket_pockets_num">
                          <label class="option <?php if($jacket_pockets[1]!='' && trim($jacket_pockets[1])=='0') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if($jacket_pockets[1]!='' && trim($jacket_pockets[1])=='0') { ?> checked <?php } ?>">
                             <input layer="jacket_pockets" class="uniform num_b jacket radio_opt" type="radio" name="jacket_pockets" value="0" <?php if($jacket_pockets[1]!='' && trim($jacket_pockets[1])=='0') { ?> checked <?php } ?>>
                             No pockets
                            </span>
                          </div>
                          </label>
                          <label class="option  <?php if($jacket_pockets[1]!='' && trim($jacket_pockets[1])=='2') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if($jacket_pockets[1]!='' && trim($jacket_pockets[1])=='2') { ?> checked <?php } ?>">
                             <input layer="jacket_pockets" class="uniform num_b jacket radio_opt" type="radio" name="jacket_pockets" value="2" <?php if($jacket_pockets[1]!='' && trim($jacket_pockets[1])=='2') { ?> checked <?php } ?>>
                             2 pockets
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if($jacket_pockets[1]!='' && trim($jacket_pockets[1])=='3') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if($jacket_pockets[1]!='' && trim($jacket_pockets[1])=='3') { ?> checked <?php } ?>">
                             <input layer="jacket_pockets" class="uniform num_b jacket radio_opt" type="radio" name="jacket_pockets" value="3" <?php if($jacket_pockets[1]!='' && trim($jacket_pockets[1])=='3') { ?> checked <?php } ?>>
                             3 pockets
                            </span>
                           </div>
                          </label>
                        </div>
                        <div class="list_common_th interactive_options all_jacket_pockets open" style="<?php if($jacket_pockets[1]!='' && trim($jacket_pockets[1])=='0') { ?> display:none <?php } else { ?> display:block <?php } ?>">
                          <input id="hidden_jacket_pockets" class="option_input" type="hidden" name="jacket_pockets_type" value="<?php if($jacket_pockets_type[1]!='') { echo trim($jacket_pockets_type[1]); } ?>">
                          <!-- 2 Bolsillo -->
                          <div class="1pocket" style="<?php if(trim($jacket_pockets_type[1])=='2' || trim($jacket_pockets_type[1])=='2a' || trim($jacket_pockets_type[1])=='2b') { ?> display:block; <?php } else { ?> display:none <?php } ?>">
                            <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if($jacket_pockets_type[1]!='' && trim($jacket_pockets_type[1])=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Hip Pockets: with flap" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_with_flap.JPG">
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  with flap
                                </p>
                              </div>
                            </div>
                            <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if($jacket_pockets_type[1]!='' && trim($jacket_pockets_type[1])=='2a') { ?> active <?php } ?>" href="javascript:;" rel="2a">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Hip Pockets: double welt" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_double_welt.JPG">
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  double welt
                                </p>
                              </div>
                            </div>
                            <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if($jacket_pockets_type[1]!='' && trim($jacket_pockets_type[1])=='2b') { ?> active <?php } ?>" href="javascript:;" rel="2b">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Hip Pockets: Patched" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_patched.JPG">
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  Patched
                                </p>
                              </div>
                            </div>
                          </div>
                          <!-- 3 Bolsillos -->
                          <div class="2pocket" style="<?php if($jacket_pockets_type[1]!='' && trim($jacket_pockets_type[1])=='3' || trim($jacket_pockets_type[1])=='3a') { ?> display:block <?php } else { ?> display:none <?php } ?>">
                            <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if($jacket_pockets_type[1]!='' && trim($jacket_pockets_type[1])=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Hip Pockets: with flap" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_with_flap.JPG">
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  with flap
                                </p>
                              </div>
                            </div>
                            <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if($jacket_pockets_type[1]!='' && trim($jacket_pockets_type[1])=='3a') { ?> active <?php } ?>" href="javascript:;" rel="3a">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Hip Pockets: double welt" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_double_welt.JPG">
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  double welt
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="conf_opt config_3d">
                      <div class="box_title">
                        <p>
                          Back style:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="radio_opt">
                          <label class="option <?php if($jacket_vent[1]!='' && trim($jacket_vent[1])=='0') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if($jacket_vent[1]!='' && trim($jacket_vent[1])=='0') { ?> checked <?php } ?>">
                             <input layer="jacket_vent" class="uniform radio_opt " type="radio" name="jacket_vent" value="0" <?php if($jacket_vent[1]!='' && trim($jacket_vent[1])=='0') { ?> checked <?php } ?>>
                             Ventless
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if($jacket_vent[1]!='' && trim($jacket_vent[1])=='1') { ?> checked <?php } ?>">
                           <div class="radio"> 
                            <span class="<?php if($jacket_vent[1]!='' && trim($jacket_vent[1])=='1') { ?> checked <?php } ?>">
                             <input layer="jacket_vent" class="uniform radio_opt " type="radio" name="jacket_vent" value="1" <?php if($jacket_vent[1]!='' && trim($jacket_vent[1])=='1') { ?> checked <?php } ?>>
                             Center vent
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if($jacket_vent[1]!='' && trim($jacket_vent[1])=='2') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if($jacket_vent[1]!='' && trim($jacket_vent[1])=='2') { ?> checked <?php } ?>"> 
                             <input layer="jacket_vent" class="uniform radio_opt " type="radio" name="jacket_vent" value="2" <?php if($jacket_vent[1]!='' && trim($jacket_vent[1])=='2') { ?> checked <?php } ?>>
                             Side vents
                            </span>
                           </div>
                          </label>
                        </div>
                      </div>
                    </div>

                    <div id="jacket_sleeve_buttons" class="conf_opt config_3d">
                      <div class="box_title">
                        <p>
                          Sleeve buttons:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="radio_opt">
                          <label class="option">
                            <?php echo $jacket_sleeve_buttons[1];?>                            
                          </label>
                        </div>
                      </div>
                    </div>
                    <?php if($jacket_sleeve_buttons[1]!=0): ?>

                    <div id="sleeve_buttonholes" class="conf_opt config_3d">
                      <div class="box_title">
                        <p>
                          Buttonholes:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="radio_opt">
                          <!--<label class="option <?php if($jacket_sleeve_buttonholes[1]!='' && trim($jacket_sleeve_buttonholes[1])=='1') { ?> checked <?php } ?>">
                           <div class="radio"> 
                            <span class="<?php if($jacket_sleeve_buttonholes[1]!='' && trim($jacket_sleeve_buttonholes[1])=='1') { ?> checked <?php } ?>">
                             <input layer="jacket_sleeve_buttonholes" class="uniform radio_opt " type="radio" name="jacket_sleeve_buttonholes" value="1" <?php if($jacket_sleeve_buttonholes[1]!='' && trim($jacket_sleeve_buttonholes[1])=='1') { ?> checked <?php } ?>>
                             Real (Functional Buttons)
                            </span>
                            </div>
                          </label>-->
                          <label class="option <?php if($jacket_sleeve_buttonholes[1]!='' && trim($jacket_sleeve_buttonholes[1])=='0') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if($jacket_sleeve_buttonholes[1]!='' && trim($jacket_sleeve_buttonholes[1])=='0') { ?> checked <?php } ?>"> 
                             <input layer="jacket_sleeve_buttonholes" class="uniform radio_opt " type="radio" name="jacket_sleeve_buttonholes" value="0" <?php if($jacket_sleeve_buttonholes[1]!='' && trim($jacket_sleeve_buttonholes[1])=='0') { ?> checked <?php } ?>>
                             Real (Functional Buttons)
                            </span>
                           </div>
                          </label>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                  </div>
	              </div>
	            </div>
          	</form>
        	</div>
        </div>
      </div>
    </div>
</div>
<div class="tab-pane" id="fab_<?php echo $a;?>">
	<?php
    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master where fab_rand = '".trim($fabric_id[1])."'");
    if(mysqli_num_rows($fab_dtl_qry) > 0)
     {
        while($fr=mysqli_fetch_array($fab_dtl_qry))
         {
            $fab_dtl = array('fab_id' =>$fr['fab_rand'],
             'fab_unique_id' => $r['fab_id'],
             'fab_name' => $fr['fab_name'],
             'fab_desc' => $fr['fab_desc'],
             'fab_img' => $fr['fab_img'],
             'fab_price' => $fr['fab_price']);
        }
     } 
  ?>
  	<div id="body" class="man_suit2_configure garment_container">
      <div class="body_box" id="features">
        <div class="body_product_box_3d">                                
          <div id="man_suit">
            <form method="post" action="#" id="fabric_form" class="configure_form test_C test_B">
	            <div class="box_right_3d suit">
	              <div id="box_mini_next_3d"></div>
	              <div id="move">
	                <div id="control_suit"></div>
	                <!-- MODEL 3D -->
	                <div id="loading"></div>                                        
	                <div id="model_3d_preview1" class="man_suit" style="position: relative;">
	                  <?php
                    /*if($r['om_style']!='')
                     {
                        $get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");
                        if(mysqli_num_rows($get_fab_def_img) > 0)
                         { 
                            $fab_def_img = mysqli_fetch_array($get_fab_def_img);
                            ?>*/
                               echo "<img src=".$homeurl.$p_imgs['p_img']." alt='Customizer item'>";
                            /*<?php 
                          } 
                      }*/ ?>
	                </div>
	                <!-- CONTROLS -->
	                <br style="clear: both;">
	              </div>
	            </div> 
	            <div class="opt_box">
	              <div class="content suit" id="max_height_move">
              <div class="instore_fab" style="<?php if(trim($fabric_name[1])!='') { ?> display:block <?php } else { ?> display:none <?php } ?>">
                <div class="col-md-6 pull-left">
                  <input type="text" class="form-control" name="instore_fabric" disabled value="<?php echo trim($fabric_name[1]); ?>">
                  <span><strong>In Store Fabric Selection</strong> </span>
                </div><br><br><br>
                </div>

	                <div id="box_fabric_waistcoat">
	                  <label>                                            
	                    <input type="checkbox" value="1" name="waistcoat_fabric"/>
	                    <span>
	                      Choose a different fabric for the waistcoat
	                    </span>
	                  </label>
	                </div>                                        
	                <div class="box_opts">
	                  <ul id="box_tab_suit_view" class="jacket">
	                    <li class="jacket">
	                      <a id="tab_default_fabric" rel="default_fabric" href="javascript:;" class="jacket">
	                        <span>
	                          Jackets & pants fabric
	                        </span>
	                      </a>
	                    </li>
	                    <li class="waistcoat">
	                      <a class="waistcoat" rel="waistcoat" href="javascript:;">
	                        <span>
	                          Waistcoat fabric
	                        </span>
	                      </a>
	                    </li>
	                  </ul>
	                  <div id="fabric_3d" class="test_C test_B">
                      <div id="preview_fabric_3d_common">
                        <div class="info_fabric">
                          <div class="right">
                            <p id="fabric_simple_composition">
                             <?php //echo $fab_dtl['fab_desc']; ?>
                            </p>
                            <p id="fabric_brightness">
                              <img style="display: none;" id="is_fabric_brightness" src="<?php echo $homeurl; ?>images/man/suit/ico_brillante.png" />
                            </p>
                          </div>
                          <div class="left">
                            <p id="fabric_name" class="big fab_name">
                              <b>
                                <?php echo $fab_dtl['fab_name']; ?>
                              </b>
                            </p>
                            <p id="second_row_info" class="fab_composition">
                              <?php echo strip_tags($fab_dtl['fab_desc']); ?> 
                            </p>
                          </div>
                        </div>                                                  
                        <div class="preview fab_img fabric_preview">
                          <img src="<?php echo $homeurl; ?>assets/dimg/fabric/<?php echo $fab_dtl['fab_id']; ?>_normal.jpg" style="width:100%;">
                          <div id="rank_label" class="urban">
                           </div>
                            <a class="view_fabric" href="#" data-toggle="modal" data-target="#<?php echo $fab_dtl['fab_id']; ?>">
                            </a>
                        </div>
                      </div>
                      <div id="slider_fabrics">
	                      <!-- 1st fabric -->
	                      <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">
	                      <input type="hidden" name="fabric_price" value="<?php if(!empty($_SESSION['suit']['fabric']['fabric_price'])) { echo $_SESSION['suit']['fabric']['fabric_price']; } else { echo $_SESSION['fab_dtl']['fab_price']; } ?>">
	                      <ul class="default_list1">
	                        <?php
	                           $fab=$site->get_fabrics1('',$r4['fabid']);
	                            foreach ($fab as $key => $value)
	                             {
	                                ?>
	                                  <div class="fabric_box suit_fabric_box fabric_box_3d">
	                                    <div class="image suit_fabric fabric_thumb suit_fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab_dtl['fab_id']==$fab[$key]['f_rand']){?> selected <?php }?>" id="suit_fabric_141" rel="141" button_code="2" shoe_color="black">
	                                      <a href="#" rel="<?php echo $fab[$key]['f_rand'];?>" rev="" extra="0" category="" thread_count="100 threads" shoe_color="black" button_code="2" brightness="normal" id_t4l_lining="57" id_t4l_lining_jacket="57" id_tie="3" slug="" class="select" ref="A04020X0" title="<?php echo $fab[$key]['fab_name'];?>" name="<?php echo $fab[$key]['fab_name'];?>" simplecomposition="WOOL" simple_composition="WOOL" composition="100% wool" rank="urban" btn_color="" fabric_weight="285" season="Year round">
	                                        <?php if($fab[$key]['fab_name']=='In-Store Fabric Selection') { ?>
                                         <img alt="<?php echo $fab[$key]['fab_name'];?>" src="<?php echo $homeurl; ?>assets/dimg/fabric/instore_fab.jpg" class="b-lazy b-loaded"> </a>
                                      <?php } else { ?>
                                          <img alt="<?php echo $fab[$key]['fab_name'];?>" src="<?php echo $homeurl; ?>/assets/dimg/fabric/<?php echo $fab[$key]['f_rand'];?>_normal.jpg" class="b-lazy b-loaded"> </a>
                                       <?php } ?>
	                                      </a> 
                                                                                         
	                                      <span class="info fabric-customclothies">
                                              
                                              <div class="box_price fabrics_price">

                                                  <div class="price price_total">
                                                    <?php echo $fab[$key]['fab_price'];?>$
                                                  </div>
                                                </div>

                                                <div class="box_title title fabrics_title">
                                                    <?php echo $fab[$key]['fab_name'];?>
                                                </div>
                                                
                                                
                                                  <div class="composition fabrics_composition">
                                                    <?php echo strip_tags($fab[$key]['fab_desc']);?>
                                                  </div>

                                              </span>
                                          
	                                    </div>
	                                   </div>
	                                <?php 
	                              } 
	                            ?>
	                      </ul>
	                    </div> 
                    </div>
                  </div>
	              </div>
	            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="tab-pane" id="ext_<?php echo $a;?>">
	<?php 
    $accents=explode(",",$r['om_accents']);
    if($accents[0] == '')
     { 
        ?>
          <p><strong>Accents Details Not Available !</strong>
        <?php 
      }
    else
     {                           
         $accents=explode("{",$r['om_accents']);
         $accents=explode(",",$accents[1]);
         $jacket_lining_type = explode(":",$accents[0]);
         $lining_price = explode(":",$accents[1]);
         $lining_id = explode(":",$accents[2]);
         $font_price = explode(":",$accents[3]);
         $font_family = explode(":",$accents[4]);
         $initials_jacket = explode(":",$accents[5]);
         $monogram_color = explode(":",$accents[6]);
         $type_of_button = explode(":",$accents[7]);
         $metal_button_price = explode(":",$accents[8]);
         $metal_btn_type = explode(":",$accents[9]);
         $type_of_neck = explode(":",$accents[10]);
         $neck_lining_price = explode(":",$accents[11]);
         $neck_lining_type = explode(":",$accents[12]);
         $type_of_elbow = explode(":",$accents[13]);
         $elbow_price = explode(":",$accents[14]);
         $elbow_type = explode(":",$accents[15]);
         $type_pocket_square = explode(":",$accents[16]);
         $handkerchief_price = explode(":",$accents[17]);
         $pocket_square_type = explode(":",$accents[18]);
         $type_of_colored_button_holes = explode(":",$accents[19]);
         $lapel_color = explode(":",$accents[20]);
         $button_holes_price = explode(":",$accents[21]);
         $colored_thread_type = explode(":",$accents[22]);
         $colored_holes_type = explode(":",trim($accents[23],"}"));
     		?>
     		<div id="body" class="man_suit2_configure garment_container">
	        <div class="body_box" id="features">
	          <div class="body_product_box_3d">                              
	            <div id="man_suit">	             
	              <form id="extra_form" class="configure_form man_waistcoat man_jacket man_suit">          	
		             	<div class="box_right_3d suit">
		                <div id="move">
		                  <div id="control_suit">                                      
		                    <!-- Rotate model -->                                      
		                  </div>
		                  <!-- MODEL 3D -->
		                <div id="loading"></div>                                    
		                  <div id="model_3d_preview1" class="man_suit">
		                    <?php
                    /*if($r['om_style']!='')
                     {
                        $get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");
                        if(mysqli_num_rows($get_fab_def_img) > 0)
                         { 
                            $fab_def_img = mysqli_fetch_array($get_fab_def_img);
                            ?>*/
                               echo "<img src=".$homeurl.$p_imgs['p_img']." alt='Customizer item'>";
                            /*<?php 
                          } 
                      }*/ ?>
		                  </div>
		                  <div id="controls_3d" class="box_btns">                                        
		                  </div>
		                </div>
		              </div>
		              <div class="opt_box">
                    <div class="content extras_suit suit" id="max_height_move">
                      <!-- TITLE -->
                      <br style="clear: both;"/>
                      <!-- BOX LEFT: OPTIONS EXTRAS -->
                      <div class="box_opts">
                        <ul id="box_tab_suit_view" class="jacket">
                          <li class="jacket">
                            <a id="tab_default_fabric" rel="default" href="javascript:;" class="jacket">
                              <span>
                                Customize jacket & pants
                              </span>
                            </a>
                          </li>
                          <li class="waistcoat">
                            <a class="waistcoat" rel="waistcoat" href="javascript:;">
                              <span>
                                Customize Vest
                              </span>
                            </a>
                          </li>
                        </ul>
                        <div id="extras_jacket">
		                      <!-- FORRO INTERIOR -->
		                      <div class="extra_opt extra_3d lining_opt extra_title">
		                        <div class="box_title box_title_new open lining_jacket main" onclick="javascript:return false();">
		                          <a href="javascript:;" class="btn_slider"></a>
		                          <p class="name">Select Jacket Lining <span>(COMPLIMENTARY ADD-ON)</span></p>
		                        </div>
		                        <div id="options_lining_jacket" class="window lining top" style="display: block;">
		                          <input id="input_hidden_lining_jacket" class="getVal" layer="jacket_lining" type="hidden" name="lining_jacket" value="<?php if(!empty($_SESSION['suit']['accents']['jacket_lining_id'])) { echo $_SESSION['suit']['accents']['jacket_lining_id']; } else { echo '57';  } ?>" box="lining"/>
		                          <div class="op_lining">
		                            <div class="box_opt_lining">
		                              <label class="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='default_jacket' ) { ?> checked <?php } ?>">
		                                <input type="hidden" name="default_jacket_val" value="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])!='main_custom_color' || trim($jacket_lining_type[1])=='')  { ?>yes<?php } ?>">
		                                <div class="radio">
		                                  <span class="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='default_jacket' ) { ?> checked <?php } ?>">
		                                   <input id="lining_default_jacket" class="uniform default" type="radio" name="lining_jacket_radio" value="default_jacket" <?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='default_jacket' ) { ?> checked="checked" <?php } ?> price=""/>
		                                  </span>
		                                </div> 
		                                By default
		                              </label>
		                              <label class="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='main_custom_color' ) { ?> checked <?php } ?>">
		                                <div class="radio">
		                                  <span class="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='main_custom_color' ) { ?> checked <?php } ?>">
		                                   <input id="inp_lining_personalized_jacket" class="uniform change_lining" rel="1" type="radio" name="lining_jacket_radio" value="main_custom_color" <?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='main_custom_color' ) { ?> checked="checked" <?php } ?> price="14.5" rel="inp_lining_personalized" box="lining"/>
		                                  </span>
		                                </div> 
		                                 Custom color
		                              </label>
		                            </div>
		                            <br style="overflow:hidden;"/>                                                  
		                            <div id="lining_box_jacket" class="personalized_box" extra_name="lining_jacket" style="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='main_custom_color' ) { ?> display:block <?php } ?>">
		                              <div class="lining_3d">
		                                <div class="filters">
		                                  <div class="preview_fabric_3d_common">
		                                    <div class="preview" style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/<?php echo trim($lining_id[1]); ?>_big.jpg) top right no-repeat">
		                                    </div>
		                                  </div>
		                                  <br style="clear: both;"/>
		                                </div>                                                      
		                                <!-- LOAD SLIDER FABRICS -->
		                                  <span class="prev" rel="back" href="javascript:;">
		                                    <img src="<?php echo $homeurl; ?>assets/images/man/left_arrow_lining.png" />
		                                  </span>
		                                <div class="slider_fabrics">
		                                  <div class="slider_box" style="width: 2964px; top: 0px; left: 0px;">
		                                    <table width="100%">
		                                      <tbody>
		                                        <tr>
		                                          <td class="page d3" rel="0">
		                                            <div class="fabric_box_3d shirt_fabric_box">
		                                              <div style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/57_thumb.jpg) top center no-repeat" class="image suit_lining <?php if(!empty($lining_id[1]) && trim($lining_id[1])=='57') { ?> selected <?php } else if($lining_id[1]=='') { ?> selected <?php } ?>" id="suit_lining_57" rel="57">
		                                                
		                                                <img style="z-index: 3; <?php if(!empty($lining_id[1]) && trim($lining_id[1])=='57') { ?> display:block <?php } else { ?> display:none <?php } ?>" class="selected" src="<?php echo $homeurl; ?>assets/images/man/selected_fabric_3d.png" title="Selected fabric" tooltip_class="selected" >
		                                                <a is_title="Hordley" style="position: relative; z-index: 5;" material="poliester" category="basic" href="javascript:;" rel="57" class="select" extra="14.5" btn_color="">
		                                                </a>
		                                              </div>
		                                              <table class="info">
		                                                <tbody>
		                                                  <tr>
		                                                    <td class="title">
		                                                      <a is_title="Hordley" category="basic" href="javascript:;" btn_color="" rel="57" class="select" extra="14.5">
		                                                        Hordley
		                                                      </a>
		                                                    </td>
		                                                    <td class="season">
		                                                     
		                                                    </td>
		                                                  </tr>
		                                                </tbody>
		                                              </table>
		                                            </div>
		                                            <div class="fabric_box_3d shirt_fabric_box">
		                                              <div style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/123_thumb.jpg) top center no-repeat" class="image suit_lining <?php if(!empty($lining_id[1]) && trim($lining_id[1])=='123') { ?> selected <?php } ?>" id="suit_lining_123" rel="123">
		                                                <img style="z-index: 3; <?php if(!empty($lining_id[1]) && trim($lining_id[1])=='123') { ?> display:block <?php } else { ?> display:none <?php } ?>" class="selected" src="<?php echo $homeurl; ?>assets/images/man/selected_fabric_3d.png" title="Selected fabric" tooltip_class="selected" >
		                                                <a is_title="Albury" style="position: relative; z-index: 5;" material="poliester" category="special" href="javascript:;" rel="123" class="select" extra="19.5" btn_color="">
		                                                </a>
		                                              </div>
		                                              <table class="info">
		                                                <tbody>
		                                                  <tr>
		                                                    <td class="title">
		                                                      <a is_title="Albury" category="special" href="javascript:;" btn_color="" rel="123" class="select" extra="19.5">
		                                                        Albury
		                                                      </a>
		                                                    </td>
		                                                    <td class="season">
		                                                     
		                                                    </td>
		                                                  </tr>
		                                                </tbody>
		                                              </table>
		                                            </div>
		                                          </td>
		                                        </tr>
		                                      </tbody>
		                                    </table>
		                                  </div>
		                                </div>
		                                <span class="next" rel="next" href="javascript:;">
		                                  <img src="<?php echo $homeurl; ?>assets/images/man/right_arrow_lining.png" />
		                                </span>
		                              </div>
		                            </div>                                                  
		                          </div>
		                        </div>
		                      </div>
		                      <div class="extra_opt extra_3d initial_opt extra_title">
		                        <!-- title extra initials -->
		                        <div class="box_title box_title_new open initials main" onclick="javascript:return false();">
		                          <a href="javascript:;" class="btn_slider"></a>
		                          <p class="name">Add Embroidery<span>(COMPLIMENTARY ADD-ON)</span></p>
		                        </div>                                                
		                        <div class="window initials" style="display: block;">
		                          <!-- OPCIONES INICIALES -->
		                          <div class="opts_initials">
		                            <!-- Position -->
		                            <div class="op_initials">
		                              <div class="img_position_initials2 top is_jacket">
		                                <div id="rotate_jacket">
		                                </div>
		                              </div>                                                      
		                              <div class="right">
		                                <!-- POSITION DEFAULT: INTERIOR -->
		                                <input id="position_default" checked="1" class="uniform posini" type="hidden" name="initials_jacket[pos]" value="interior"/>
		                                <!-- FUENTE DE LAS INICIALES -->
		                                <div class="op_initials all_family">
		                                  <div class="box_title">
		                                    <p>Font</p>
		                                  </div>
		                                  <div class="box_font_initial">                                                            
		                                    <label class="positions <?php if(!empty($font_family[1]) && trim($font_family[1])=='Arial') { ?> checked <?php } ?> ">
		                                      <div class="radio">
		                                        <span class="<?php if(!empty($font_family[1]) && trim($font_family[1])=='Arial') { ?> checked <?php } ?> ">
		                                          <input rel="Arial" class="uniform" type="radio" <?php if(!empty($font_family[1]) && trim($font_family[1])=='Arial') { ?> checked="checked" <?php } ?> value="24" name="initials_jacket" rev="initials_type"/>
		                                        </span>
		                                      </div>
		                                        <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/24.png" />
		                                    </label>
		                                    <label class="positions <?php if(!empty($font_family[1]) && trim($font_family[1])=='Monotype Corsiva') { ?> checked <?php } ?>">
		                                      <div class="radio">
		                                        <span class="<?php if(!empty($font_family[1]) && trim($font_family[1])=='Monotype Corsiva') { ?> checked <?php } ?>">
		                                          <input rel="Monotype Corsiva" class="uniform" type="radio" <?php if(!empty($font_family[1]) && trim($font_family[1])=='Monotype Corsiva') { ?> checked="checked" <?php } ?> value="19" name="initials_jacket" rev="initials_type"/>
		                                        </span>
		                                      </div>
		                                        <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/19.png" />
		                                    </label>
		                                    <label class="positions <?php if(!empty($font_family[1]) && trim($font_family[1])=='Times New Roman') { ?> checked <?php } ?>">
		                                      <div class="radio">
		                                        <span class="<?php if(!empty($font_family[1]) && trim($font_family[1])=='Times New Roman') { ?> checked <?php } ?>">
		                                          <input rel="Times New Roman" class="uniform" type="radio" <?php if(!empty($font_family[1]) && trim($font_family[1])=='Times New Roman') { ?> checked="checked" <?php } ?> value="74" name="initials_jacket" rev="initials_type">
		                                          </span>
		                                      </div>
		                                      <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/74.png" />
		                                    </label>
		                                    <label class="positions <?php if(!empty($font_family[1]) && trim($font_family[1])=='Rockwell') { ?> checked <?php } ?>">
		                                      <div class="radio">
		                                        <span class="<?php if(!empty($font_family[1]) && trim($font_family[1])=='Rockwell') { ?> checked <?php } ?>">
		                                          <input rel="Rockwell" class="uniform" type="radio" <?php if(!empty($font_family[1]) && trim($font_family[1])=='Rockwell') { ?> checked="checked" <?php } ?> value="77" name="initials_jacket" rev="initials_type">
		                                        </span>
		                                      </div>
		                                        <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/77.png" />
		                                    </label>
		                                  </div>
		                                </div>
		                              </div>
		                            </div>
		                            <!-- TEXTO DE LAS INICIALES -->
		                            <div class="op_initials all_text_initial">
		                              <span class="info_text_initial">
		                                Type Your Initials
		                              </span>
		                              <input id="txt_initial_jacket" size="20" class="my_uniform txt_initial" type="text" readonly name="initials_jacket" maxlength="25" value="<?php if(!empty($initials_jacket[1])) { echo trim($initials_jacket[1]); } ?>"/>
		                            </div>
		                            
		                            <!-- COLOR DE LAS INICIALES -->
		                            <div class="box_opt op_initials">
		                              <div class="box_title">
		                                <p>Monogram Thread Color</p>
		                              </div>
		                              <div class="list_common_color interactive_options all_colors " rel="initials">
		                                <?php 
		                                   $get_mono_dtl = $site->get_accent_color('1','1');
		                                   $color_img = explode(",", $get_mono_dtl[0]['color_img']);
		                                   $color_name = explode(",", $get_mono_dtl[0]['color_name']);
		                                   $color_value = explode(",", $get_mono_dtl[0]['color_value']);

		                                   if(count($color_img) > 0)
		                                    { 
		                                      $i=0;
		                                      foreach($color_img as $key=>$value)
		                                       { 
		                                          ?>
		                                            <div class="option_trigger common_color <?php if(!empty($monogram_color[1]) && trim($monogram_color[1])==$color_name[$i]) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$i]; ?>">
		                                              <a class="box_color" href="javascript:;" layer="monogram_color">
		                                                <div class="active">
		                                                </div>
		                                                <img class="color" src="<?php echo $homeurl.$value; ?>" />
		                                              </a>
		                                            </div>
		                                            <?php ++$i; 
		                                        } 
		                                    } ?>                                                       
		                              </div>                                                      
		                            </div>
		                          </div>
		                        </div>
		                      </div>
		                      <div class="extra_opt extra_3d extra_title">
                            <div class="box_title box_title_new  open main" onclick="javascript:return false();">
                              <a href="javascript:;" class="btn_slider"></a>
                              <p class="name">Type of Buttons<span>(+20$)</span></p>
                            </div>
                            <div id="options_metal_buttons" class="window metal_buttons top"  style="display: block;">
                              <div class="op_metal_buttons">
                                <div class="lateral_right" style="float:none;">
                                  <div class="box_opt_lining">
                                    <div style="float:left;">
                                      <label class="<?php if(!empty($type_of_button[1]) && trim($type_of_button[1])=='standard_button' ) { ?> checked <?php } ?>">
                                        <div class="radio">
                                          <span class="<?php if(!empty($type_of_button[1]) && trim($type_of_button[1])=='standard_button' ) { ?> checked <?php } ?>">
                                            <input layer="jacket_metal_buttons" id="metal_buttons_default" class="uniform default_item" type="radio" name="metal_buttons_radio" value="standard_button" <?php if(!empty($type_of_button[1]) && trim($type_of_button[1])=='standard_button' ) { ?> checked="checked" <?php } ?> price="10.9"/>
                                          </span>
                                        </div>
                                        Standard Buttons
                                      </label>
                                      <label class="<?php if(!empty($type_of_button[1]) && trim($type_of_button[1])=='brass_button' ) { ?> checked <?php } ?>">
                                        <div class="radio">
                                          <span class="<?php if(!empty($type_of_button[1]) && trim($type_of_button[1])=='brass_button' ) { ?> checked <?php } ?>">
                                            <input layer="jacket_metal_buttons" id="inp_metal_buttons_personalized" class="uniform personalized_item" rel="1" type="radio" name="metal_buttons_radio" value="brass_button" <?php if(!empty($type_of_button[1]) && trim($type_of_button[1])=='brass_button' ) { ?> checked="checked" <?php } ?> price="10.9" rel="inp_metal_buttons_personalized" box="metal_buttons" extra_name="metal_buttons"/>
                                          </span>
                                        </div> 
                                         Brass Buttons (+20$)
                                      </label>
                                    </div>
                                  </div>                                                      
                                  <div id="metal_buttons_box" class="personalized_box lateral" extra_name="metal_buttons" style="display:block; width: 462px;">                                                        
                                    <div class="option_trigger common_color <?php if(!empty($metal_btn_type[1]) && trim($metal_btn_type[1])=='gold' ) { ?> active <?php } ?>" href="javascript:;" rel="gold">
                                      <a layer="jacket_metal_buttons" class="box_color big color_item" href="javascript:;">
                                        <div class="active">
                                        </div>
                                        <!--<img class="color big_color" src="<?php echo $homeurl; ?>assets/images/man/jacket/metal_buttons/50.jpg" pagespeed_url_hash="4155628769" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>-->
                                        GOLD
                                      </a>
                                    </div>                                                        
                                    <div class="option_trigger common_color <?php if(!empty($metal_btn_type[1]) && trim($metal_btn_type[1])=='brass' ) { ?> active <?php } ?>" href="javascript:;" rel="brass">
                                      <a layer="jacket_metal_buttons" class="box_color big color_item" href="javascript:;">
                                        <div class="active">
                                        </div>
                                        <!--<img class="color big_color" src="<?php echo $homeurl; ?>assets/images/man/jacket/metal_buttons/51.jpg" pagespeed_url_hash="155161394" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>-->
                                        BRASS
                                      </a>
                                    </div>
                                    <div class="option_trigger common_color <?php if(!empty($metal_btn_type[1]) && trim($metal_btn_type[1])=='bronze' ) { ?> active <?php } ?>" href="javascript:;" rel="bronze">
                                      <a layer="jacket_metal_buttons" class="box_color big color_item" href="javascript:;">
                                        <div class="active">
                                        </div>
                                        <!--<img class="color big_color" src="<?php echo $homeurl; ?>assets/images/man/jacket/metal_buttons/52.jpg" pagespeed_url_hash="449661315" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>-->
                                        BRONZE
                                      </a>
                                    </div>                                                        
                                    <div class="option_trigger common_color <?php if(!empty($metal_btn_type[1]) && trim($metal_btn_type[1])=='silver' ) { ?> active <?php } ?>" href="javascript:;" rel="silver">
                                      <a layer="jacket_metal_buttons" class="box_color big color_item" href="javascript:;">
                                        <div class="active">
                                        </div>
                                        <!--<img class="color big_color" src="<?php echo $homeurl; ?>assets/images/man/jacket/metal_buttons/53.jpg" pagespeed_url_hash="744161236" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>-->
                                        SILVER
                                      </a>
                                    </div>                                                        
                                  </div>                                                      
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="extra_opt extra_3d extra_title">
                            <div class="box_title box_title_new <?php if(!empty($type_of_neck[1]) && trim($type_of_neck[1])!='color_by_default') { ?> open <?php } else { ?> close <?php } ?> main" onclick="javascript:return false();">
                              <a href="javascript:;" class="btn_slider"></a>
                              <p class="name">Neck Lining<span>(COMPLIMENTARY ADD-ON)</span></p>
                            </div>
                            <div id="options_neck_lining" class="window top" style=<?php if(!empty($type_of_neck[1]) && trim($type_of_neck[1])!='color_by_default') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>
                              <div class="op_lining">
                                <div class="lateral_img lateral_img2 img_neck"></div>
                                <div class="lateral_right">
                                  <div class="box_opt_neck_lining">
                                    <div>
                                      <label layer="jacket_neck_lining" class="<?php if(!empty($type_of_neck[1]) && trim($type_of_neck[1])=='color_by_default' ) { ?> checked <?php } ?>">
                                        <div class="radio">
                                          <span class="<?php if(!empty($type_of_neck[1]) && trim($type_of_neck[1])=='color_by_default' ) { ?> checked <?php } ?>">
                                            <input id="neck_lining_default" class="uniform default_item" type="radio" name="neck_lining_radio" value="color_by_default" <?php if(!empty($type_of_neck[1]) && trim($type_of_neck[1])=='color_by_default' ) { ?> checked="checked" <?php } ?>  price="3.95"/>
                                          </span>
                                        </div>
                                        Color by default
                                      </label>
                                      <label layer="jacket_neck_lining" class="<?php if(!empty($type_of_neck[1]) && trim($type_of_neck[1])=='custom_color' ) { ?> checked <?php } ?>">
                                        <div class="radio">
                                          <span class="<?php if(!empty($type_of_neck[1]) && trim($type_of_neck[1])=='custom_color' ) { ?> checked <?php } ?>">  
                                            <input id="inp_neck_lining_personalized" class="uniform personalized_item" type="radio" name="neck_lining_radio" value="custom_color" <?php if(!empty($type_of_neck[1]) && trim($type_of_neck[1])=='custom_color' ) { ?> checked="checked" <?php } ?> price="3.95" rel="inp_neck_lining_personalized" extra_name="neck_lining"/>
                                          </span>
                                        </div>
                                        Custom color 
                                        <span class="price">
                                          
                                        </span>
                                      </label>
                                    </div>
                                  </div>
                                  <div id="neck_lining_box" class="personalized_box lateral" extra_name="neck_lining" style="display:block;">
                                    <?php 
                                       $get_neck_lining_dtl = $site->get_accent_color('1','2');
                                       $color_img = explode(",", $get_neck_lining_dtl[0]['color_img']);
                                       $color_name = explode(",", $get_neck_lining_dtl[0]['color_name']);
                                       $color_value = explode(",", $get_neck_lining_dtl[0]['color_value']);
                                       if(count($color_img) > 0)
                                       {
                                          $m=0; 
                                          foreach($color_img as $key=>$value)
                                           {
                                              ?>
                                                <div class="option_trigger common_color  <?php if(!empty($neck_lining_type[1]) && trim($neck_lining_type[1])==$color_name[$m]) { ?> active <?php } ?>" href="javascript:;" rel="1" color="<?php echo $color_name[$m]; ?>">
                                                  <a layer="jacket_neck_lining" class="box_color color_item" href="javascript:;" img_index="0">
                                                    <div class="active">
                                                    </div>
                                                    <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                                  </a>
                                                </div>
                                                <?php ++$m; 
                                            } 
                                        }
                                    ?>                                                        
                                  </div>                                                      
                                </div>
                              </div>
                            </div>
                          </div>
                         

                          <!-- PAÑUELO -->
                          <div class="extra_opt extra_3d extra_title">
                            <div class="box_title box_title_new <?php if(!empty($type_pocket_square[1]) && trim($type_pocket_square[1])!='no_pocket') { ?> open <?php } else { ?> close <?php } ?> main" onclick="javascript:return false();">
                              <a href="javascript:;" class="btn_slider">
                              </a>
                              <p class="name">
                                Add pocket square
                                <span>
                                  (+10$)
                                </span>
                               
                              </p>
                            </div>
                            <div id="options_handkerchief" class="window handkerchief top" style=<?php if(!empty($type_pocket_square[1]) && trim($type_pocket_square[1])!='no_pocket') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>
                              <div class="op_handkerchief">
                                <div class="lateral_right" style="float:none;">
                                  <div class="box_opt_lining">
                                    <div style="float:left;">
                                      <label class="<?php if(!empty($type_pocket_square[1]) && trim($type_pocket_square[1])=='no_pocket' ) { ?> checked <?php } ?>">
                                       <div class="radio">
                                        <span class="<?php if(!empty($type_pocket_square[1]) && trim($type_pocket_square[1])=='no_pocket' ) { ?> checked <?php } ?>">
                                         <input id="handkerchief_default" class="uniform default_item" type="radio" name="handkerchief_radio" value="no_pocket" <?php if(!empty($type_pocket_square[1]) && trim($type_pocket_square[1])=='no_pocket' ) { ?> checked="checked" <?php } ?> price="10.95"/>
                                        </span>
                                       </div> 
                                         No Pocket Square
                                      </label>
                                      <label class="<?php if(!empty($type_pocket_square[1]) && trim($type_pocket_square[1])=='custom_color1' ) { ?> checked <?php } ?>">
                                       <div class="radio">
                                        <span class="<?php if(!empty($type_pocket_square[1]) && trim($type_pocket_square[1])=='custom_color1' ) { ?> checked <?php } ?>">
                                         <input id="inp_handkerchief_personalized" class="uniform personalized_item" rel="1" type="radio" name="handkerchief_radio" value="custom_color1" price="10.95" rel="inp_handkerchief_personalized" <?php if(!empty($type_pocket_square[1]) && trim($type_pocket_square[1])=='custom_color1' ) { ?> checked="checked" <?php } ?> box="handkerchief" extra_name="handkerchief"/>
                                        </span>
                                       </div> 
                                         Custom Color  
                                        <span class="price">
                                          (+10$)
                                        </span>
                                      </label>
                                    </div>
                                  </div>
                                  
                                  <div id="handkerchief_box" class="personalized_box lateral" extra_name="handkerchief" style="display:block; width: 462px;">
                                    <?php 
                                       $get_pocket_sqr_dtl = $site->get_accent_color('1','4');
                                       $color_img = explode(",", $get_pocket_sqr_dtl[0]['color_img']);
                                       $color_name = explode(",", $get_pocket_sqr_dtl[0]['color_name']);
                                       $color_value = explode(",", $get_pocket_sqr_dtl[0]['color_value']);

                                       if(count($color_img) > 0) {
                                       $n=0; 
                                       foreach($color_img as $key=>$value) { 

                                    ?>
                                    <div class="option_trigger common_color <?php if(!empty($pocket_square_type[1]) && trim($pocket_square_type[1])==$color_name[$n] ) { ?> active <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$n]; ?>">
                                      <a class="box_color color_item" href="javascript:;">
                                        <div class="active">
                                        </div>
                                        <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                      </a>
                                    </div>
                                     <?php ++$n; } } ?>
                                    
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- END PAÑUELO -->
                          <!-- HILOS/OJALES DE LOS BOTONES (man_jacket_button_holes_threads) -->
                         <!-- HILOS/OJALES DE LOS BOTONES (man_jacket_button_holes_threads) -->
                              <div class="extra_opt extra_3d hilo_ojal_opt extra_title">
                                <div class="box_title box_title_new <?php if(trim($colored_thread_type[1])!='' || trim($colored_holes_type[1])!='' || trim($lapel_color[1])!='' || trim($type_of_colored_button_holes[1])=='by_default' ) { ?> open <?php } else { ?> close <?php } ?> hilo_ojal main" onclick="javascript:return false();">
                                  <a href="javascript:;" class="btn_slider">
                                  </a>
                                  <p class="name">
                                    Add colored button holes / threads 
                                    <span>
                                      (+5$)
                                    </span>
                                   
                                  </p>
                                </div>
                                <div class="window hilo_ojal" style=<?php if(trim($colored_thread_type[1])!='' || trim($colored_holes_type[1])!='' || trim($lapel_color[1])!='' || trim($type_of_colored_button_holes[1])=='by_default' ) { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>
                                  <div class="apply_at">
                                    <label layer="jacket_button_holes" class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='by_default' ) { ?> checked <?php } ?>">
                                     <div class="radio">
                                      <span class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='by_default' ) { ?> checked <?php } ?>">
                                       <input layer="jacket_button_holes" id="pos_bht_all" class="uniform thread_holes_selector" type="radio" name="button_holes_threads_jacket" <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='by_default' ) { ?> checked="checked" <?php } ?> value="by_default"/>
                                      </span>
                                     </div>
                                      By Default
                                    </label>
                                    <label layer="jacket_button_holes" class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='both_placket_and_cuffs' ) { ?> checked <?php } ?>">
                                     <div class="radio">
                                      <span class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='both_placket_and_cuffs' ) { ?> checked <?php } ?>">
                                       <input layer="jacket_button_holes" id="pos_bht_all" class="uniform thread_holes_selector" type="radio" name="button_holes_threads_jacket" <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='all' ) { ?> checked="checked" <?php } ?> value="both_placket_and_cuffs"/>
                                      </span>
                                     </div>
                                      Both Placket and Cuffs
                                    </label>
                                    <label layer="jacket_button_holes" class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='lapel' ) { ?> checked <?php } ?>">
                                     <div class="radio">
                                      <span class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='lapel' ) { ?> checked <?php } ?>">
                                       <input layer="jacket_button_holes" id="pos_bht_solapa" class="uniform thread_holes_selector" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='lapel' ) { ?> checked="checked" <?php } ?> value="lapel"/>
                                      </span>
                                     </div> 
                                       Placket only

                                    </label>
                                    <label layer="jacket_button_holes" class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='cuff' ) { ?> checked <?php } ?>">
                                     <div class="radio">
                                      <span class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='cuff' ) { ?> checked <?php } ?>">
                                       <input layer="jacket_button_holes" id="pos_bht_cuff" class="uniform thread_holes_selector" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='cuff' ) { ?> checked="checked" <?php } ?> value="cuff"/>
                                       </span>
                                     </div>
                                       Cuffs only
                                      
                                    </label>
                                  </div>
                                  <br style="clear: both;">
                                  <!--<div id="img_ojal_hilo">
                                    <div class="fabric" style="background:url(<?php echo $homeurl; ?>assets/dimg/fabric/141_big.jpg) top left no-repeat">
                                    </div>
                                    <div class="ojal ">
                                    </div>
                                    <div class="boton" style="background:url(<?php echo $homeurl; ?>assets/images/man/suit/extras/hilo_ojal/xbtn_2.png.pagespeed.ic.Pu0CtWc5cE.png) top left no-repeat">
                                    </div>
                                    <div class="hilo ">
                                    </div>
                                  </div>-->

                                  <!-- Plackets Only -->
                                  <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])!='by_default' ) { ?>

                                  <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='lapel' || trim($type_of_colored_button_holes[1])=='both_placket_and_cuffs') { ?>
                                    <div class="shirtsection">
                                    <div class="button-threads">
                                    <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/placket_only.JPG" />
                                    </div>
                                    <div id="box_button_threads_extra" class="list_common_color interactive_options all_colors placket_only" rel="button_holes_threads">
                                      <input id="hidden_button_threads1" class="option_input1" type="hidden" name="placket_color" value="<?php if(!empty($lapel_color[1])) { echo $lapel_color[1]; } ?>"/>
                                     <?php 
                                       $get_btn_lapel_dtl = $site->get_accent_color('1','7');
                                       $color_img = explode(",", $get_btn_lapel_dtl[0]['color_img']);
                                       $color_name = explode(",", $get_btn_lapel_dtl[0]['color_name']);
                                       $color_value = explode(",", $get_btn_lapel_dtl[0]['color_value']);

                                       if(count($color_img) > 0) { 
                                        $j=0;
                                        foreach($color_img as $key=>$value) { 

                                      ?>
                                      <div layer="jacket_button_thread" class="option_trigger common_color <?php if(!empty($lapel_color[1]) && trim($lapel_color[1])==$color_name[$j] ) { ?> active1 <?php } ?>" href="javascript:;" rel="9" color="<?php echo trim($color_name[$j]); ?>" type="hilo">
                                        <a layer="lapel_only" class="box_color" href="javascript:;">
                                          <div class="active">
                                          </div>
                                          <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                        </a>
                                      </div>
                                      <?php ++$j;} } ?>
                                    </div>
                                    </div>
                                  <?php } if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='cuff' || trim($type_of_colored_button_holes[1])=='both_placket_and_cuffs') { ?>

<!-- Cuffs Only -->
                                  <div class="shirtsection">
                                  <div class="button-threads">
                                    <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/button-threads.JPG" />
                                  </div>
                                  <div id="box_button_threads_extra" class="list_common_color interactive_options all_colors" rel="button_holes_threads" style=<?php if(!empty($type_of_button[1]) && trim($type_of_button[1])=='brass_button' ) { ?> "display:none" <?php } else { ?> "display:block" <?php } ?>>
                                    <p>
                                      Button threads
                                    </p>
                                    <?php 
                                          $get_btn_threads_dtl = $site->get_accent_color('1','6');
                                          $color_img = explode(",", $get_btn_threads_dtl[0]['color_img']);
                                          $color_name = explode(",", $get_btn_threads_dtl[0]['color_name']);
                                          $color_value = explode(",", $get_btn_threads_dtl[0]['color_value']);

                                          if(count($color_img) > 0) { 
                                          $k=0;
                                          foreach($color_img as $key=>$value) { 

                                    ?>
                                    <div layer="jacket_button_thread" class="option_trigger common_color <?php if(!empty($colored_thread_type[1]) && trim($colored_thread_type[1])==$color_name[$k] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$k]; ?>" type="hilo">
                                      <a layer="jacket_button_holes" class="box_color" href="javascript:;">
                                        <div class="active">
                                        </div>
                                        <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                      </a>
                                    </div>
                                    <?php ++$k; } } ?>
                                    
                                  </div>
                                 </div>

                                 <div class="shirtsection">
                                  <div class="button-holes">
                                   <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/button-holes.JPG" />
                                  </div>
                                  <div class="list_common_color interactive_options all_colors" rel="button_holes_threads">
                                    <p>
                                      Button holes
                                    </p>
                                     <?php 
                                           $get_btn_holes_dtl = $site->get_accent_color('1','5');
                                           $color_img = explode(",", $get_btn_holes_dtl[0]['color_img']);
                                           $color_name = explode(",", $get_btn_holes_dtl[0]['color_name']);
                                           $color_value = explode(",", $get_btn_holes_dtl[0]['color_value']);
                                          
                                           if(count($color_img) > 0) { 
                                            $l=0;
                                            foreach($color_img as $key=>$value) {
                                    ?>
                                    <div class="option_trigger common_color  <?php if(!empty($colored_holes_type[1]) && trim($colored_holes_type[1])==$color_name[$l] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$l]; ?>" type="ojal">
                                      <a layer="jacket_button_holes1" class="box_color" href="javascript:;">
                                        <div class="active">
                                        </div>
                                        <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                      </a>
                                    </div>
                                    <?php ++$l; } } ?>
                                    
                                  </div>
                                </div>
                                <?php } ?>
                              </div>
                             </div>
                             <?php } ?>
                          <!-- END HILOS/OJALES -->

                           <div class="extra_opt extra_3d extra_title">
                            <div class="box_title box_title_new <?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])!='elbow_no') { ?> open <?php } else { ?> close <?php } ?> main" onclick="javascript:return false();">
                              <a href="javascript:;" class="btn_slider"></a>
                              <p class="name">Add elbow patches<span>(+10$)</span></p>
                            </div>
                            <div id="options_patches" class="window top" style=<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])!='elbow_no') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>
                              <div class="op_patches">
                                <div class="lateral_img img_patches2 img_patches"></div>
                                <div class="lateral_right">
                                  <div class="box_opt_patches">
                                    <div>
                                      <label layer="jacket_patches" class="<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_no' ) { ?> checked <?php }  ?>">
                                        <div class="radio">
                                          <span class="<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_no' ) { ?> checked <?php }  ?>">
                                            <input id="patches_default" class="uniform default_item" type="radio" name="patches_radio" value="elbow_no" <?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_no' ) { ?> checked="checked" <?php }  ?> price="13.95"/>
                                          </span>
                                        </div>
                                        No elbow patches
                                      </label>
                                      <label layer="jacket_patches" class="<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_yes' ) { ?> checked <?php } ?>">
                                        <div class="radio">
                                          <span class="<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_yes' ) { ?> checked <?php } ?>"> 
                                            <input id="inp_patches_personalized" class="uniform personalized_item" rel="1" type="radio" name="patches_radio" value="elbow_yes" price="13.95" rel="inp_patches_personalized" <?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_yes' ) { ?> checked="checked" <?php } ?> box="patches" extra_name="patches"/>
                                          </span>
                                        </div>
                                         Add elbow patches
                                        <span class="price">
                                          (+10$)
                                        </span>
                                      </label>
                                    </div>
                                  </div>
                                  <div id="patches_box" class="personalized_box lateral" extra_name="patches" style="display:block;">
                                    <?php 
                                       $get_elbow_patch_dtl = $site->get_accent_color('1','3');
                                       $color_img = explode(",", $get_elbow_patch_dtl[0]['color_img']);
                                       $color_name = explode(",", $get_elbow_patch_dtl[0]['color_name']);
                                       $color_value = explode(",", $get_elbow_patch_dtl[0]['color_value']);
                                       if(count($color_img) > 0)
                                        {
                                          $o=0; 
                                          foreach($color_img as $key=>$value)
                                           { 
                                              ?>
                                                <div class="option_trigger common_color <?php if(!empty($elbow_type[1]) && trim($elbow_type[1])== $color_name[$o] ) { ?> active <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$o]; ?>">
                                                  <a layer="jacket_patches" class="box_color color_item" href="javascript:;" img_index="0">
                                                    <div class="active"></div>
                                                    <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                                  </a>
                                                </div>
                                                <?php
                                                 ++$o; 
                                           } 
                                        } 
                                    ?>
                                  </div>                                                      
                                </div>
                              </div>
                            </div>
                          </div>

		                    </div>
                      </div>
                    </div>
                  </div>
	             	</form>
	            </div>
	          </div>
	        </div>
	      </div>
     		<?php
     }
     ?>
</div></div>