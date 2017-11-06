<div class="tab-pane active" id="style_<?php echo $a;?>">
	<?php 
		$style=explode("{",$r['om_style']);
		$style=explode(",",$style[1]);
		$suit_type=explode(":",$style[0]);
		if(trim($suit_type[1])=='man_suit2') 
			{
					$jacket_style = explode(":",$style[1]);
					$jacket_fit = explode(":",$style[2]);
					$jacket_lapel_type = explode(":",$style[3]);
					$jacket_buttons = explode(":",$style[4]);
					$jacket_chest_pocket = explode(":",$style[5]);
					$jacket_pockets = explode(":",$style[6]);
					$jacket_pockets_type = explode(":",$style[7]);
					$jacket_vent = explode(":",$style[8]);
					$jacket_sleeve_buttons = explode(":",$style[9]);
					$jacket_sleeve_buttonholes = explode(":",$style[10]);
					$pants_fit = explode(":",$style[11]);
					
					$pants_peg = explode(":",$style[12]);
					$pants_belt = explode(":",$style[13]);
					$pants_front_pocket = explode(":",$style[14]);
					$pants_back_pocket = explode(":",$style[15]);
          $pants_back_pocket_type = explode(":",$style[16]);
					$pants_cuff = explode(":",$style[17]);
          $extra_pant = explode(":",trim($style[18],"}"));
			}
			else if(trim($suit_type[1])=='man_suit3')
			{
					$jacket_style = explode(":",$style[2]);
					$jacket_fit = explode(":",$style[3]);
					$jacket_lapel_type = explode(":",$style[4]);
					$jacket_buttons = explode(":",$style[5]);
					$jacket_chest_pocket = explode(":",$style[6]);
					$jacket_pockets = explode(":",$style[7]);
					$jacket_pockets_type = explode(":",$style[8]);
					$jacket_vent = explode(":",$style[9]);
					$jacket_sleeve_buttons = explode(":",$style[10]);
					$jacket_sleeve_buttonholes = explode(":",$style[11]);
					$waistcoat_style = explode(":",$style[12]);
					$waistcoat_buttons = explode(":",$style[13]);
					$waistcoat_chest_pocket = explode(":",$style[14]);
					$waistcoat_pockets = explode(":",$style[15]);
					$waistcoat_pockets_num = explode(":",$style[16]);
					$waistcoat_bottom = explode(":",$style[17]);
					$pants_fit = explode(":",$style[18]);
					$pants_peg = explode(":",$style[19]);
					$pants_belt = explode(":",$style[20]);
					$pants_front_pocket = explode(":",$style[21]);
					$pants_back_pocket = explode(":",$style[22]);
          $pants_back_pocket_type = explode(":",$style[23]);
					$pants_cuff = explode(":",$style[24]);
          $extra_pant = explode(":",trim($style[25],"}"));
			} 
      $p_img_qry=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");
      $p_imgs=mysqli_fetch_array($p_img_qry);
	?>
	<div id="body" class="man_suit2_configure garment_container">
		<div class="body_box" id="features">
			<div class="body_product_box_3d">
				<div id="man_suit">
        <form id="configure_form" class="configure_form">
				<div class="box_right_3d suit">
          <div id="box_mini_next_3d"></div>
          <div id="move">
            <div id="control_suit"><!-- Rotate model -->
            </div>
           <!-- MODEL 3D -->
            <div id="loading"></div>      
            <div id="model_3d_preview1" class="man_suit" style="position: relative;">
              <?php
                /*if(trim($r['om_style'])!='')
                {
                  $get_fab_def_img=mysqli_query($con,"select default_img from fabric_master where 
                    fab_rand='".trim($fabric_id[1])."'");
                  if(mysqli_num_rows($get_fab_def_img) > 0)
                  { */
                    //$$fab_def_img = mysqli_fetch_array($get_fab_def_img);
                    echo "<img src=".$homeurl.$p_imgs['p_img']." alt='Customizer item'>";             
                  //} 
                //} 
              ?>
            </div>
          </div>
        </div>
        <div class="opt_box">
          <div class="content suit garment_block" id="max_height_move" style="display:block;">
            	<!-- JACKET CONFIG -->
            <div class="box_title" style="margin-top: 20px;">
              <h1 class="title suit">Jacket</h1>
            </div>
            <!--<div class="separator">
            </div>-->
            <!-- JACKET CONFIG -->
            <div class="box_opts" product_type="jacket">
          		<div class="conf_opt config_3d select_suit_type">
                <div class="box_title">
                  <p>
                    Type:
                  </p>
                </div>
                <div class="box_opt">
                  <div class="radio_opt">
                    <label class="option <?php if($suit_type[1]!='' && trim($suit_type[1])=='man_suit2') { ?> checked <?php } ?>">
                      <div class="radio">
                        <span class="<?php if($suit_type[1]!='' && trim($suit_type[1])=='man_suit2') { ?> checked <?php } ?>">
                          <input rel="waistcoat" <?php if($suit_type[1]!='' && trim($suit_type[1])=='man_suit2') { ?> checked <?php } ?> type="radio" class="uniform radio_opt suit_type" name="suit_type" value="man_suit2">
                          2 piece suit
                        </span>
                      </div>
                    </label>
                    <label class="option <?php if($suit_type[1]!='' && trim($suit_type[1])=='man_suit3') { ?> checked <?php } ?>">
                      <div class="radio">
                       <span class="<?php if($suit_type[1]!='' && trim($suit_type[1])=='man_suit3') { ?> checked <?php } ?>">
                        <input rel="none" type="radio" class="uniform radio_opt suit_type" name="suit_type" value="man_suit3" <?php if($suit_type[1]!='' && trim($suit_type[1])=='man_suit3') { ?> checked <?php } ?>>
                         3 piece suit
                        </span>
                      </div>
                    </label>
                  </div>
                </div>
              </div>
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
              <!-- Jacket: Entallado -->
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
              <!-- Jacket: front "jacket_pockets" -->
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
                    <div class="2pocket" style="<?php if(trim($jacket_pockets_type[1])=='3' || trim($jacket_pockets_type[1])=='3a') { ?> display:block; <?php } else { ?> display:none <?php } ?>">
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
              <!-- Jacket: Lapel Vent -->
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
              <!-- Jacket: sleeve_buttons -->
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
              <!-- Jacket: sleeve buttonholes -->
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
              <!-- Jacket: buttons -->
            </div>
            <!-- WAISTCOAT CONFIG -->
            <?php 
             if(trim($suit_type[1])=='man_suit3') 
              { 
                ?>
                	<div class="common_waistcoat_config">
                    <div class="box_title">
                      <h1 class="title suit">
                        Vest
                      </h1>
                    </div>
                    <!--<div class="separator">
                    </div>-->
                    <!-- BOX RIGHT: MODEL + CONTROLS -->                                      
                    <div class="box_opts" product_type="waistcoat">
                      <!-- Waistcoat: Style -->
                      <div class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                            Style:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="radio_opt">
                            <label class="option <?php if($waistcoat_style[1]!='' && trim($waistcoat_style[1])=='simple') { ?> checked <?php } ?>">
                              <div class="radio">
                                <span class="<?php if($waistcoat_style[1]!='' && trim($waistcoat_style[1])=='simple') { ?> checked <?php } ?>">
                                 <input layer="waistcoat_style" class="uniform option_input waistcoat_style" type="radio" name="waistcoat_style" value="simple" <?php if($waistcoat_style[1]!='' && trim($waistcoat_style[1])=='simple') { ?> checked <?php } ?>>
                                 Single Breasted
                                </span>
                              </div>
                            </label>
                            <label class="option <?php if($waistcoat_style[1]!='' && trim($waistcoat_style[1])=='crossed') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($waistcoat_style[1]!='' && trim($waistcoat_style[1])=='crossed') { ?> checked <?php } ?>"> 
                               <input layer="waistcoat_style" class="uniform option_input waistcoat_style" type="radio" name="waistcoat_style" value="crossed" <?php if($waistcoat_style[1]!='' && trim($waistcoat_style[1])=='crossed') { ?> checked <?php } ?>>
                               Double Breasted
                              </span>
                             </div>
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- Waistcoat: buttons -->
                      <div id="global_waistcoat_buttons" class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                            Number of Buttons:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="radio_opt">
                            <label class="option">
                              
                              <select layer="waistcoat_body" class="option uniform" name="waistcoat_buttons" id="waistcoat_buttons" disabled>
                                <option layer="waistcoat_body" value="3" <?php if($waistcoat_buttons[1]!='' && trim($waistcoat_buttons[1])=='3') { ?> selected <?php } ?>>
                                  3
                                </option>
                                <option layer="waistcoat_body" value="4" <?php if($waistcoat_buttons[1]!='' && trim($waistcoat_buttons[1])=='4') { ?> selected <?php } ?>>
                                  4
                                </option>
                                <option layer="waistcoat_body" value="5" <?php if($waistcoat_buttons[1]!='' && trim($waistcoat_buttons[1])=='5') { ?> selected <?php } ?>>
                                  5
                                </option>
                                <option layer="waistcoat_body" value="6" <?php if($waistcoat_buttons[1]!='' && trim($waistcoat_buttons[1])=='6') { ?> selected <?php } ?>>
                                  6
                                </option>
                              </select>
                              
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- Waistcoat: Lapel -->                                         
                      <!-- Waistcoat: Finishing -->
                      <div class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                            Edge:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="radio_opt">
                            <label class="option <?php if($waistcoat_bottom[1]!='' && trim($waistcoat_bottom[1])=='straight') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($waistcoat_bottom[1]!='' && trim($waistcoat_bottom[1])=='straight') { ?> checked <?php } ?>">
                               <input layer="waistcoat_bottom" class="uniform option_input waistcoat_bottom" type="radio" name="waistcoat_bottom" value="straight" <?php if($waistcoat_bottom[1]!='' && trim($waistcoat_bottom[1])=='straight') { ?> checked <?php } ?>>
                               Straight
                              </span>
                             </div>
                            </label>
                            <label class="option <?php if($waistcoat_bottom[1]!='' && trim($waistcoat_bottom[1])=='cut') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($waistcoat_bottom[1]!='' && trim($waistcoat_bottom[1])=='cut') { ?> checked <?php } ?>"> 
                               <input layer="waistcoat_bottom" class="uniform option_input waistcoat_bottom" type="radio" name="waistcoat_bottom" value="cut" <?php if($waistcoat_bottom[1]!='' && trim($waistcoat_bottom[1])=='cut') { ?> checked <?php } ?>>
                               Diagonal
                              </span>
                             </div>
                            </label>
                            <label class="option <?php if($waistcoat_bottom[1]!='' && trim($waistcoat_bottom[1])=='rounded') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($waistcoat_bottom[1]!='' && trim($waistcoat_bottom[1])=='rounded') { ?> checked <?php } ?>">
                               <input layer="waistcoat_bottom" class="uniform option_input waistcoat_bottom" type="radio" name="waistcoat_bottom" value="rounded" <?php if($waistcoat_bottom[1]!='' && trim($waistcoat_bottom[1])=='rounded') { ?> checked <?php } ?>>
                               Rounded
                              </span>
                             </div>
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- Waistcoat: Chest pocket -->
                      <div class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                            Breast Pocket:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="radio_opt">
                            <label class="option <?php if($waistcoat_chest_pocket[1]!='' && trim($waistcoat_chest_pocket[1])=='1') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($waistcoat_chest_pocket[1]!='' && trim($waistcoat_chest_pocket[1])=='1') { ?> checked <?php } ?>">
                               <input layer="waistcoat_chest_pocket" class="uniform option_input" type="radio" name="waistcoat_chest_pocket" value="1" <?php if($waistcoat_chest_pocket[1]!='' && trim($waistcoat_chest_pocket[1])=='1') { ?> checked <?php } ?>>
                               Yes
                              </span>
                             </div>
                            </label>
                            <label class="option <?php if($waistcoat_chest_pocket[1]!='' && trim($waistcoat_chest_pocket[1])=='0') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($waistcoat_chest_pocket[1]!='' && trim($waistcoat_chest_pocket[1])=='0') { ?> checked <?php } ?>"> 
                               <input layer="waistcoat_chest_pocket" class="uniform option_input" type="radio" name="waistcoat_chest_pocket" value="0" <?php if($waistcoat_chest_pocket[1]!='' && trim($waistcoat_chest_pocket[1])=='0') { ?> checked <?php } ?>>
                               No
                              </span>
                             </div>
                            </label>
                          </div>
                        </div>
                      </div>                                        
                      <!-- Waistcoat: front waistcoat_pockets "waistcoat_pockets" -->
                      <div class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                            Front Pockets:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="radio_opt labels_waistcoat_pockets_num">
                            <label class="option <?php if($waistcoat_pockets_num[1]!='' && trim($waistcoat_pockets_num[1])=='0') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($waistcoat_pockets_num[1]!='' && trim($waistcoat_pockets_num[1])=='0') { ?> checked <?php } ?>">
                               <input layer="waistcoat_pockets" class="uniform num_b waistcoat num_w" type="radio" name="waistcoat_pockets_num" value="0" <?php if($waistcoat_pockets_num[1]!='' && trim($waistcoat_pockets_num[1])=='0') { ?> checked <?php } ?>>
                               No pockets
                              </span>
                             </div>
                            </label>
                            <label class="option <?php if($waistcoat_pockets_num[1]!='' && trim($waistcoat_pockets_num[1])=='2') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($waistcoat_pockets_num[1]!='' && trim($waistcoat_pockets_num[1])=='2') { ?> checked <?php } ?>">
                               <input layer="waistcoat_pockets" class="uniform num_b waistcoat num_w" type="radio" name="waistcoat_pockets_num" value="2" <?php if($waistcoat_pockets_num[1]!='' && trim($waistcoat_pockets_num[1])=='2') { ?> checked <?php } ?>>
                               2 pockets
                              </span>
                             </div>
                            </label>
                            <label class="option <?php if($waistcoat_pockets_num[1]!='' && trim($waistcoat_pockets_num[1])=='3') { ?> checked <?php } ?>">
                             <div class="radio">
                              <span class="<?php if($waistcoat_pockets_num[1]!='' && trim($waistcoat_pockets_num[1])=='3') { ?> checked <?php } ?>">
                               <input layer="waistcoat_pockets" class="uniform num_b waistcoat num_w" type="radio" name="waistcoat_pockets_num" value="3" <?php if($waistcoat_pockets_num[1]!='' && trim($waistcoat_pockets_num[1])=='3') { ?> checked <?php } ?>>
                               3 pockets
                              </span>
                             </div>
                            </label>
                          </div>
                          <div class="list_common_th interactive_options all_waistcoat_pockets open" style="<?php if($waistcoat_pockets_num[1]!='' && trim($waistcoat_pockets_num[1])=='0') { ?> display:none <?php } else { ?> display:block <?php } ?>">
                            <input id="hidden_waistcoat_pockets" class="option_input" type="hidden" name="waistcoat_pockets" value="<?php if($waistcoat_pockets[1]!='') { echo trim($waistcoat_pockets[1]); } ?>">
                            <!-- 1 Bolsillo -->
                            <div class="1pocket" style="<?php if($waistcoat_pockets[1]=='2' || trim($waistcoat_pockets[1])=='2a' || trim($waistcoat_pockets[1])=='2b') { ?> display:block; <?php } else { ?> display:none <?php } ?>">
                              <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if($waistcoat_pockets[1]!='' && trim($waistcoat_pockets[1])=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                                <div class="box_model">
                                  <div class="active">
                                  </div>
                                  <img alt="Front Pockets: Welt Pockets" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/waistcoat_pockets_2.png">
                                  <br>
                                </div>
                                <div class="box_title_common">
                                  <p>
                                    Welt Pockets
                                  </p>
                                </div>
                              </div>
                              <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if($waistcoat_pockets[1]!='' && trim($waistcoat_pockets[1])=='2a') { ?> active <?php } ?>" href="javascript:;" rel="2a">
                                <div class="box_model">
                                  <div class="active">
                                  </div>
                                  <img alt="Front Pockets: Double Welt" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/waistcoat_pockets_2a.png">
                                  <br>
                                </div>
                                <div class="box_title_common">
                                  <p>
                                    Double Welt
                                  </p>
                                </div>
                              </div>
                              <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if($waistcoat_pockets[1]!='' && trim($waistcoat_pockets[1])=='2b') { ?> active <?php } ?>" href="javascript:;" rel="2b">
                                <div class="box_model">
                                  <div class="active">
                                  </div>
                                  <img alt="Front Pockets: with flap" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/waistcoat_pockets_2b.png">
                                  <br>
                                </div>
                                <div class="box_title_common">
                                  <p>
                                    with flap
                                  </p>
                                </div>
                              </div>
                            </div>
                            <!-- 2 Bolsillo -->
                            <div class="2pocket" style="<?php if($waistcoat_pockets[1]!='' && trim($waistcoat_pockets[1])=='3' || trim($waistcoat_pockets[1])=='3a' || trim($waistcoat_pockets[1])=='3b') { ?> display:block; <?php } else { ?> display:none <?php } ?>">
                              <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if($waistcoat_pockets[1]!='' && trim($waistcoat_pockets[1])=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                                <div class="box_model">
                                  <div class="active">
                                  </div>
                                  <img alt="Front Pockets: Welt Pockets" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/waistcoat_pockets_2.png">
                                  <br>
                                </div>
                                <div class="box_title_common">
                                  <p>
                                    Welt Pockets
                                  </p>
                                </div>
                              </div>
                              <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if($waistcoat_pockets[1]!='' && trim($waistcoat_pockets[1])=='3a') { ?> active <?php } ?>" href="javascript:;" rel="3a">
                                <div class="box_model">
                                  <div class="active">
                                  </div>
                                  <img alt="Front Pockets: Double Welt" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/waistcoat_pockets_2a.png">
                                  <br>
                                </div>
                                <div class="box_title_common">
                                  <p>
                                    Double Welt
                                  </p>
                                </div>
                              </div>
                              <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if($waistcoat_pockets[1]!='' && trim($waistcoat_pockets[1])=='3b') { ?> active <?php } ?>" href="javascript:;" rel="3b">
                                <div class="box_model">
                                  <div class="active">
                                  </div>
                                  <img alt="Front Pockets: with flaps" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/waistcoat_pockets_2b.png">
                                  <br>
                                </div>
                                <div class="box_title_common">
                                  <p>
                                    with flaps
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php 
              }
            ?>
             <br style="clear: both;">
            <!-- PANTS CONFIG -->
            <div class="box_title">
              <h1 class="title suit">
                Pants 
              </h1>
            </div>
            <div class="box_opts" product_type="pants">
	            <!-- Pants: FIT -->
	            <div class="conf_opt config_3d">
	              <div class="box_title">
	                <p>Fit:</p>
	              </div>
	              <div class="box_opt">
	                <div class="radio_opt">
	                  <label class="option <?php if($pants_fit[1]!='' && trim($pants_fit[1])=='normal') { ?> checked <?php } ?>">
	                  	<div class="radio">
	                    	<span class="<?php if($pants_fit[1]!='' && trim($pants_fit[1])=='normal') { ?> checked <?php } ?>">
	                     		<input layer="pants_fit" class="uniform option_input" type="radio" name="pants_fit" value="normal" <?php if($pants_fit[1]!='' && trim($pants_fit[1])=='normal') { ?> checked <?php } ?>>
	                     		Regular fit
	                    	</span>
	                   	</div>
	                  </label>
	                  <label class="option <?php if($pants_fit[1]!='' && trim($pants_fit[1])=='fit') { ?> checked <?php } ?>">
	                  	<div class="radio">
	                    	<span class="<?php if($pants_fit[1]!='' && trim($pants_fit[1])=='fit') { ?> checked <?php } ?>">
	                     		<input layer="pants_fit" class="uniform option_input" type="radio" name="pants_fit" value="fit" <?php if($pants_fit[1]!='' && trim($pants_fit[1])=='fit') { ?> checked <?php } ?>>
	                     		Slim Fit
                    		</span>
	                   	</div>
	                  </label>
	                </div>
	              </div>
	            </div>
	            <!-- Pants: PLEATS -->
	            <div class="conf_opt config_3d">
	              <div class="box_title">
	                <p>
	                  Pleats:
	                </p>
	              </div>
	              <div class="box_opt">
	                <div class="radio_opt">
	                  <label class="option <?php if($pants_peg[1]!='' && trim($pants_peg[1])=='0') { ?> checked <?php } ?>">
	                   <div class="radio">
	                    <span class="<?php if($pants_peg[1]!='' && trim($pants_peg[1])=='0') { ?> checked <?php } ?>">
	                      <input layer="pants_peg" class="uniform option_input" type="radio" name="pants_peg" value="0" <?php if($pants_peg[1]!='' && trim($pants_peg[1])=='0') { ?> checked <?php } ?>>
	                      No Pleats
	                    </span>
	                   </div>
	                  </label>
	                  <label class="option <?php if($pants_peg[1]!='' && trim($pants_peg[1])=='1') { ?> checked <?php } ?>">
	                   <div class="radio">
	                    <span class="<?php if($pants_peg[1]!='' && trim($pants_peg[1])=='1') { ?> checked <?php } ?>">
	                     <input layer="pants_peg" class="uniform option_input" type="radio" name="pants_peg" value="1" <?php if($pants_peg[1]!='' && trim($pants_peg[1])=='1') { ?> checked <?php } ?>>
	                     Pleated
	                    </span>
	                   </div>
	                  </label>
	                  <label class="option <?php if($pants_peg[1]!='' && trim($pants_peg[1])=='2') { ?> checked <?php } ?>">
	                   <div class="radio">
	                    <span class="<?php if($pants_peg[1]!='' && trim($pants_peg[1])=='2') { ?> checked <?php } ?>">
	                     <input layer="pants_peg" class="uniform option_input" type="radio" name="pants_peg" value="2" <?php if($pants_peg[1]!='' && trim($pants_peg[1])=='2') { ?> checked <?php } ?>>
	                     Double pleats
	                    </span>
	                   </div>
	                  </label>
	                </div>
	              </div>
	            </div>                                      
	            <!-- Pants: CINTURÓN =>cuadrado/flecha cuadrado default -->
	            <div class="conf_opt config_3d">
	              <div class="box_title">
	                <p>
	                  Pants Fastening:
	                </p>
	              </div>
	              <div class="box_opt">
	                <div class="list_common_th interactive_options all_belts open">
	                  <input class="option_input" type="hidden" name="pants_belt" value="<?php if($pants_belt[1]!='') { echo trim($pants_belt[1]); } ?>">
	                  <!-- Cuadrado -->
	                  <div layer="pants_belt" class="option_trigger common_th  <?php if($pants_belt[1]!='' && trim($pants_belt[1])=='0') { ?> active <?php } ?> big_images" href="javascript:;" rel="0">
	                    <div class="box_model big suit_belt">
	                      <div class="active">
	                      </div>
	                      <img alt="Pants Fastening Centered" src="<?php echo $homeurl;?>assets/images/suit_img/pant_fastening/fastening_centered.JPG">
	                      <br>
	                    </div>
	                    <div class="box_title_common">
	                      <p>
	                        Centered
	                      </p>
	                    </div>
	                  </div>
	                  <!-- Flecha -->
	                  <div layer="pants_belt" class="option_trigger common_th <?php if($pants_belt[1]!='' && trim($pants_belt[1])=='1') { ?> active <?php } ?> big_images" href="javascript:;" rel="1">
	                    <div class="box_model big suit_belt">
	                      <div class="active">
	                      </div>
	                      <img alt="Pants Fastening Displaced" src="<?php echo $homeurl;?>assets/images/suit_img/pant_fastening/fastening_displaced.JPG">
	                      <br>
	                    </div>
	                    <div class="box_title_common">
	                      <p>
	                        Displaced
	                      </p>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>                                      
	            <!-- Pants: BOLSILLOS LATERALES -->
	            <div class="conf_opt config_3d">
	              <div class="box_title">
	                <p>
	                  Side Pockets:
	                </p>
	              </div>
	              <div class="box_opt">
	                <div class="radio_opt">
	                  <label class="option <?php if($pants_front_pocket[1]!='' && trim($pants_front_pocket[1])=='diagonal') { ?> checked <?php } ?>">
	                   <div class="radio">
	                    <span class="<?php if($pants_front_pocket[1]!='' && trim($pants_front_pocket[1])=='diagonal') { ?> checked <?php } ?>">
	                     <input layer="pants_front_pocket" class="uniform option_input" type="radio" name="pants_front_pocket" value="diagonal" <?php if($pants_front_pocket[1]!='' && trim($pants_front_pocket[1])=='diagonal') { ?> checked <?php } ?>>
	                     Diagonal
	                    </span>
	                   </div>
	                  </label>
	                  <label class="option <?php if($pants_front_pocket[1]!='' && trim($pants_front_pocket[1])=='vertical') { ?> checked <?php } ?>">
	                   <div class="radio">
	                    <span class="<?php if($pants_front_pocket[1]!='' && trim($pants_front_pocket[1])=='vertical') { ?> checked <?php } ?>">
	                     <input layer="pants_front_pocket" class="uniform option_input" type="radio" name="pants_front_pocket" value="vertical" <?php if($pants_front_pocket[1]!='' && trim($pants_front_pocket[1])=='vertical') { ?> checked <?php } ?>>
	                     Vertical
	                    </span>
	                   </div>
	                  </label>
	                  <label class="option <?php if($pants_front_pocket[1]!='' && trim($pants_front_pocket[1])=='rounded') { ?> checked <?php } ?>">
	                   <div class="radio">
	                    <span class="<?php if($pants_front_pocket[1]!='' && trim($pants_front_pocket[1])=='rounded') { ?> checked <?php } ?>">
	                     <input layer="pants_front_pocket" class="uniform option_input" type="radio" name="pants_front_pocket" value="rounded" <?php if($pants_front_pocket[1]!='' && trim($pants_front_pocket[1])=='rounded') { ?> checked <?php } ?>>
	                     Rounded
	                    </span>
	                   </div>
	                  </label>
	                </div>
	              </div>
	            </div>                                      
	            <!-- Pants: Back pockets -->
	            <div class="conf_opt config_3d">
	              <div class="box_title">
	                <p>
	                  Back Pockets:
	                </p>
	              </div>
	              <div class="box_opt">
	                <div id="box_back_pocket" class="radio_opt">
	                  <label class="option <?php if($pants_back_pocket[1]!='' && trim($pants_back_pocket[1])=='0') { ?> checked <?php } ?>">
	                   <div class="radio">
	                    <span class="<?php if($pants_back_pocket[1]!='' && trim($pants_back_pocket[1])=='0') { ?> checked <?php } ?>">
	                    
	                    <input layer="pants_back_pocket" class="uniform num_b" type="radio" name="pants_back_pocket" value="0" <?php if($pants_back_pocket[1]!='' && trim($pants_back_pocket[1])=='0') { ?> checked <?php } ?>>
	                    No pockets
	                    </span>
	                   </div>
	                  </label>
	                  <label class="option <?php if($pants_back_pocket[1]!='' && trim($pants_back_pocket[1])=='1') { ?> checked <?php } ?>">
	                   <div class="radio">
	                    <span class="<?php if($pants_back_pocket[1]!='' && trim($pants_back_pocket[1])=='1') { ?> checked <?php } ?>">  
	                     <input layer="pants_back_pocket" class="uniform num_b" type="radio" name="pants_back_pocket" value="1" <?php if($pants_back_pocket[1]!='' && trim($pants_back_pocket[1])=='1') { ?> checked <?php } ?>>
	                     1 back pocket
	                    </span>
	                   </div>
	                  </label>
	                  <label class="option <?php if($pants_back_pocket[1]!='' && trim($pants_back_pocket[1])=='2') { ?> checked <?php } ?>">
	                   <div class="radio">
	                    <span class="<?php if($pants_back_pocket[1]!='' && trim($pants_back_pocket[1])=='2') { ?> checked <?php } ?>">  
	                     <input layer="pants_back_pocket" class="uniform num_b" type="radio" name="pants_back_pocket" value="2" <?php if($pants_back_pocket[1]!='' && trim($pants_back_pocket[1])=='2') { ?> checked <?php } ?>>
	                     2 back pockets
	                    </span>
	                   </div> 
	                  </label>
	                </div>
	                <div id="box_back_pocket_img" class="list_common_th interactive_options all_pants_back_pocket open" style="<?php if($pants_back_pocket[1]!='' && trim($pants_back_pocket[1])=='0') { ?> display:none <?php } else { ?> display:block <?php } ?>">
	                  <input id="hidden_chest_pocket" class="option_input" type="hidden" name="pants_back_pocket_type" value="<?php if($pants_back_pocket_type[1]!='') { echo trim($pants_back_pocket_type[1]); }  ?>">
	                  <!-- 1 Bolsillo -->
	                  <div class="box_pocket">
	                    <div layer="pants_back_pocket" class="option_trigger common_th mini_pocket <?php if($pants_back_pocket_type[1]!='' && trim($pants_back_pocket_type[1])=='A') { ?> active <?php } ?>" href="javascript:;" rel="A">
	                      <div class="box_model">
	                        <div class="active">
	                        </div>
	                        <img alt="Back Pockets: piped pocket with button" src="<?php echo $homeurl;?>assets/images/suit_img/pant_back_pocket/piped_pocket_with_button.JPG">
	                        <br>
	                      </div>
	                      <div class="box_title_common">
	                        <p>
	                          piped pocket with button
	                        </p>
	                      </div>
	                    </div>
	                    <div layer="pants_back_pocket" class="option_trigger common_th mini_pocket <?php if($pants_back_pocket_type[1]!='' && trim($pants_back_pocket_type[1])=='B') { ?> active <?php } ?>" href="javascript:;" rel="B">
	                      <div class="box_model">
	                        <div class="active">
	                        </div>
	                        <img alt="Back Pockets: Patched" src="<?php echo $homeurl;?>assets/images/suit_img/pant_back_pocket/patched.JPG">
	                        <br>
	                      </div>
	                      <div class="box_title_common">
	                        <p>
	                          Patched
	                        </p>
	                      </div>
	                    </div>
	                    <div layer="pants_back_pocket" class="option_trigger common_th mini_pocket <?php if($pants_back_pocket_type[1]!='' && trim($pants_back_pocket_type[1])=='C') { ?> active <?php } ?>" href="javascript:;" rel="C">
	                      <div class="box_model">
	                        <div class="active">
	                        </div>
	                        <img alt="Back Pockets: Flap Pockets" src="<?php echo $homeurl;?>assets/images/suit_img/pant_back_pocket/flap_pocket.JPG">
	                        <br>
	                      </div>
	                      <div class="box_title_common">
	                        <p>
	                          Flap Pockets
	                        </p>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	             <!-- Pants: Cuff -->
	            <div class="conf_opt config_3d">
	              <div class="box_title">
	                <p>
	                  Pant Cuffs:
	                </p>
	              </div>
	              <div class="box_opt">
	                <div class="radio_opt">
	                  <label class="option <?php if($pants_cuff[1]!='' && trim($pants_cuff[1])=='0') { ?> checked <?php } ?>">
	                    <div class="radio">
	                     <span class="<?php if($pants_cuff[1]!='' && trim($pants_cuff[1])=='0') { ?> checked <?php } ?>">
	                      <input layer="pants_cuff" class="uniform option_input" type="radio" name="pants_cuff" value="0" <?php if($pants_cuff[1]!='' && trim($pants_cuff[1])=='0') { ?> checked <?php } ?>>
	                      No pant cuffs
	                     </span>
	                    </div>
	                  </label>
	                  <label class="option <?php if($pants_cuff[1]!='' && trim($pants_cuff[1]) =='1') { ?> checked <?php } ?>">
	                    <div class="radio">
	                     <span class="<?php if($pants_cuff[1]!='' && trim($pants_cuff[1]) =='1') { ?> checked <?php } ?>">
	                      <input layer="pants_cuff" class="uniform option_input" type="radio" name="pants_cuff" value="1" <?php if($pants_cuff[1]!='' && trim($pants_cuff[1]) =='1') { ?> checked <?php } ?>>
	                      With pant cuffs
	                     </span>
	                    </div>
	                  </label>
                    </div>
	                </div>

                  <!-- Extra Pants -->
                  <!-- Pants: Cuff -->
                    <div class="conf_opt config_3d">
                      <div class="box_title">
                        <p>
                          Extra Pants:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="radio_opt">
                          <label class="option <?php if($extra_pant[1]!='' && trim($extra_pant[1]) =='Yes') { ?> checked <?php } ?>">
                            
                            <input layer="extra_pants" class="uniform option_input" type="radio" name="extra_pants" value="Yes" <?php if(trim($extra_pant[1])=='Yes') { ?> checked <?php } ?>>
                            Yes
                          </label>
                          <label class="option <?php if($extra_pant[1]!='' && trim($extra_pant[1]) =='No') { ?> checked <?php } ?>">
                            
                            <input layer="extra_pants" class="uniform option_input" type="radio" name="extra_pants" value="No" <?php if(trim($extra_pant[1])=='No') { ?> checked <?php } else if($extra_pant[1]=='') { ?> checked <?php } ?>>
                            No
                          </label>
                        </div>
                      </div>
                    </div>
                     <div class="conf_opt config_3d">
                        <div class="box_title">
                                          
                        </div>
                       <div class="box_opt">
                        Prolong the life of your custom suit by adding an extra pair of pants.Pants will wear down before the suit jacket.
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
              <!-- MODEL 3D dels suits -->
              <!-- BOX RIGHT: MODEL + CONTROLS -->
              <div class="box_right_3d suit">
                <div id="box_mini_next_3d">
                </div>
                <div id="move">
                  <div id="control_suit">

                  </div>
                  <!-- MODEL 3D -->
                  <div id="loading">
                  </div>
                  
                  <div id="model_3d_preview1" class="man_suit" style="position: relative;">
                    <?php
                      /*if($r['om_style']!='')
                       {
                          $get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");
                            if(mysqli_num_rows($get_fab_def_img) > 0)
                             { 
                                $fab_def_img = mysqli_fetch_array($get_fab_def_img);*/
                                echo "<img src=".$homeurl.$p_imgs['p_img']." alt='Customizer item'>"; 
                              /*} 
                       } */
                    ?>
                  </div>
                  <!-- CONTROLS -->
                  <br style="clear: both;">                                        
                </div>
              </div>                                  
              <div class="opt_box">
                <div class="content suit" id="max_height_move">
                <div class="instore_fab" style="<?php if(trim($fabric_name[1])!='') { ?> display:block <?php } else { ?> display:none <?php } ?>">
                <div class="col-md-6 pull-left">
                  <input type="text" class="form-control" name="instore_fabric" disabled="disabled" value="<?php echo trim($fabric_name[1]); ?>">
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
                      <!-- LOAD SLIDER FABRICS -->
                      <div id="slider_fabrics">
                        <!-- 1st fabric -->
                        <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">
                        <input type="hidden" name="fabric_price" value="<?php if(!empty($_SESSION['suit']['fabric']['fabric_price'])) { echo $_SESSION['suit']['fabric']['fabric_price']; } else { echo $_SESSION['fab_dtl']['fab_price']; } ?>">
                        <ul class="default_list1">
                          <?php $fab=$site->get_fabrics1('',$r4['fabid']);
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
            <p><strong>Accents Details Not Available !</strong></p>
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
	                  <form id="extra_form" class="man_waistcoat man_jacket man_suit">
	                    <div id="image_z_index">
	                    </div>                                   
	                      <!-- BOX RIGHT: MODEL + CONTROLS -->
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
	                                      $fab_def_img = mysqli_fetch_array($get_fab_def_img);*/
	                                      echo "<img src=".$homeurl.$p_imgs['p_img']." alt='Customizer item'>";
	                                   /* } 
	                                } */
	                            ?>
	                          </div>
	                          <!-- CONTROLS -->
	                          <div id="controls_3d" class="box_btns"></div>
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
	                                <a href="javascript:;" class="btn_slider">
	                                </a>
	                                <p class="name">
	                                  Jacket Lining 
	                                  <span>
	                                    (Complimentary Add-on)
	                                  </span>
	                                 
	                                </p>
	                              </div>
	                              
	                              <div id="options_lining_jacket" class="window lining top" style="display: block;">
	                                <input id="input_hidden_lining_jacket" class="getVal" layer="jacket_lining" type="hidden" name="lining_jacket" value="57" box="lining">
	                                <div class="op_lining">
	                                  <div class="box_opt_lining">
	                                    <label class="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='default_jacket' ) { ?> checked <?php } ?>">
	                                      <input type="hidden" name="default_jacket_val" value="yes">
	                                      <div class="radio" id="uniform-lining_default_jacket">
	                                       <span class="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='default_jacket' ) { ?> checked <?php } ?>">
	                                        <input id="lining_default_jacket" class="uniform default" type="radio" name="lining_jacket_radio" value="default_jacket" <?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='default_jacket' ) { ?> checked="checked" <?php } ?> price="">
	                                        </span>
	                                      </div>
	                                        By default
	                                       
	                                    </label>
	                                    <!--<label class="">
	                                     <div class="radio">
	                                      <span class="">
	                                      <input id="inp_lining_unlined_jacket" class="uniform change_lining" rel="1" type="radio" name="lining_jacket_radio" value="unlined"  price="39" rel="inp_lining_unlined" box="lining"/>
	                                      </span>
	                                     </div>
	                                      Unstructured (+39$)
	                                      <a id="show_more_unlined" href="javascript:;" onclick="show_unlined_info();" style="font-size: 12px; margin-left: 10px; color: #2A2A2A; vertical-align: text-top;">
	                                        <img src="https://izaapinnovations.com/dccustom/assets/images/man/shirt/ico_more_info.png" pagespeed_url_hash="4158586052" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>
	                                        Learn more
	                                      </a>
	                                    </label>
	                                    <label id="unlined_info" style="display: none; height: auto; background: #F5F5F5; padding: 6px 24px 8px 24px; margin: 6px 0px 20px 0; position: relative; ">
	                                      Unstructured blazers are perfect for warm days. A lightweight unlined, without shoulder pads to make your style more casual. It requires extra handicraft work but it is worth the result.
	                                      <br/>
	                                      On the other hand, suit pants keep their lining to assure their best shape.
	                                      <a href="javascript:;" onclick="hide_unlined_info(this);" style="color: #999999; text-decoration: none!important; font-size: 18px; font-weight: bold; position: absolute; right: 7px; top: 0;">
	                                        x
	                                      </a>
	                                    </label>-->
	                                    <label class="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='main_custom_color' ) { ?> checked <?php } ?>">
	                                     <div class="radio">
	                                      <span class="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='main_custom_color' ) { ?> checked <?php } ?>">   
	                                       <input id="inp_lining_personalized_jacket" class="uniform change_lining" rel="1" type="radio" name="lining_jacket_radio" value="main_custom_color" <?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='main_custom_color' ) { ?> checked="checked" <?php } ?> price="14.5" box="lining">
	                                      </span>
	                                      </div> 
	                                       Custom color
	                                    </label>
	                                  </div>
	                                  <br style="overflow:hidden;">
	                                  
	                                  <div id="lining_box_jacket" class="personalized_box" extra_name="lining_jacket" style="<?php if(!empty($jacket_lining_type[1]) && trim($jacket_lining_type[1])=='main_custom_color' ) { ?> display:block <?php } ?>">
	                                    <div class="lining_3d">
	                                      <div class="filters">
	                                        <div class="preview_fabric_3d_common">
	                                          <div class="preview" style="background:url(https://customclothiers.com/assets/dimg/lining/default/<?php echo trim($lining_id[1]); ?>_big.jpg) top right no-repeat">
	                                          </div>
	                                        </div>
	                                        <br style="clear: both;">
	                                      </div>
	                                      
	                                      <!-- LOAD SLIDER FABRICS -->
	                                      <span class="prev" rel="back" href="javascript:;">
	                                        <img src="https://customclothiers.com/assets/images/man/left_arrow_lining.png" >
	                                      </span>
	                                      <div class="slider_fabrics">
	                                        <div class="slider_box" style="width: 2964px; top: 0px; left: 0px;">
	                                          <table width="100%">
	                                            <tbody>
	                                              <tr>
	                                                <td class="page d3" rel="0">
	                                                  <div class="fabric_box_3d shirt_fabric_box">
	                                                    <div style="background:url(https://customclothiers.com/assets/dimg/lining/default/57_thumb.jpg) top center no-repeat" class="image suit_lining <?php if(!empty($lining_id[1]) && trim($lining_id[1])=='57') { ?> selected <?php } else if($lining_id[1]=='') { ?> selected <?php } ?>" id="suit_lining_57" rel="57">
	                                                      
	                                                      <img style="z-index: 3; <?php if(!empty($lining_id[1]) && trim($lining_id[1])=='57') { ?> display:block <?php } else { ?> display:none <?php } ?>" class="selected" src="https://customclothiers.com/assets/images/man/selected_fabric_3d.png" title="Selected fabric" tooltip_class="selected" >
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
	                                                    <div style="background:url(https://customclothiers.com/assets/dimg/lining/default/123_thumb.jpg) top center no-repeat" class="image suit_lining <?php if(!empty($lining_id[1]) && trim($lining_id[1])=='123') { ?> selected <?php } ?>" id="suit_lining_123" rel="123">
	                                                      <img style="z-index: 3; <?php if(!empty($lining_id[1]) && trim($lining_id[1])=='123') { ?> display:block <?php } else { ?> display:none <?php } ?>" class="selected" src="https://customclothiers.com/assets/images/man/selected_fabric_3d.png" title="Selected fabric" tooltip_class="selected" >
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
	                                        <img src="https://customclothiers.com/assets/images/man/right_arrow_lining.png" >
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
                                	<p class="name">Add Embroidery<span>(Complimentary Add-on)</span></p>
                                </div>
                                <div class="window initials" style="display: block;">
                                  <!-- OPCIONES INICIALES -->
                                  <div class="opts_initials">
                                  	<!-- Position -->
                                		<div class="op_initials">
                                  		<div class="img_position_initials2 top is_jacket">
                                  			<div id="rotate_jacket"></div>
                                  		</div>
                                  	
	                                  	<div class="right">
	                                      <!-- POSITION DEFAULT: INTERIOR -->
	                                      <input id="position_default" checked="1" class="uniform posini" type="hidden" name="initials_jacket[pos]" value="interior"/>
	                                      <!-- FUENTE DE LAS INICIALES -->
	                                      <div class="op_initials all_family">
	                                      	<div class="box_title"><p>Font</p></div>
	                                      	<div class="box_font_initial">
	                                          <label class="positions <?php if(!empty($font_family[1]) && trim($font_family[1])=='Arial') { ?> checked <?php } ?>">
	                                          	<div class="radio">
	                                          		<span class="<?php if(!empty($font_family[1]) && trim($font_family[1])=='Arial') { ?> checked <?php } ?>">
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
	                                          <label class="positions <?php if(!empty($font_family[1]) && trim($font_family[1])=='Times New Roman') { ?> checked<?php } ?>">
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
                                </div>
                                <div class="op_initials all_text_initial">
                                	<span class="info_text_initial">Type Your Initials</span>
                              		<input id="txt_initial_jacket" size="20" class="my_uniform txt_initial" type="text" readonly name="initials_jacket" maxlength="25" value="<?php if(!empty($initials_jacket[1])) { echo trim($initials_jacket[1]); } ?>"/>
                                </div>
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
	                                  					<?php
	                                  					++$i;
	                                  				}
	                                  	 }
                                  	?>

																</div>
                              </div>
                             	<div class="extra_opt extra_3d extra_title">
                                <div class="box_title box_title_new  open main" onclick="javascript:return false();">
                                	<a href="javascript:;" class="btn_slider"></a>
                                	<p class="name">Type of Buttons<span>(+20$)</span>                                
                                  </p>
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
                                  <p class="name">Neck Lining<span>(Complimentary Add-on)</span></p>
                                </div>
                                <div id="options_neck_lining" class="window top" style=<?php if(!empty($type_of_neck[1]) && trim($type_of_neck[1])!='color_by_default') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>
                                  <div class="op_lining">
                                    <div class="lateral_img img_neck"></div>
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
                                          <label class=" checked ">
                                           <div class="radio">
                                            <span class=" checked ">
                                             <input id="handkerchief_default" class="uniform default_item" type="radio" name="handkerchief_radio" value="no_pocket" checked="checked" price="10.95">
                                             </span>
                                           </div>
                                             No Pocket Square

                                          </label>
                                          <label class="">
                                           <div class="radio">
                                            <span class="">
                                             <input id="inp_handkerchief_personalized" class="uniform personalized_item" rel="1" type="radio" name="handkerchief_radio" value="custom_color1" price="10.95" box="handkerchief" extra_name="handkerchief">
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
                                  <!-- Plackets Only -->
                                  <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])!='by_default' ) { ?>

                                  <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='lapel' || trim($type_of_colored_button_holes[1])=='both_placket_and_cuffs') { ?>
                                    <div id="cuffs_only" class="shirtsection">
                                      <div class="button-threads">
                                        <img class="color" src="<?php echo $homeurl;?>assets/images/man/suit/placket_only.JPG" />
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
                                  <div id="cuffs_only" class="shirtsection">
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

                                 <div id="cuffs_only" class="shirtsection">
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
                              		<!-- CODERAS -->
                            <div class="extra_opt extra_3d extra_title">
                              <div class="box_title box_title_new <?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])!='elbow_no') { ?> open <?php } else { ?> close <?php } ?> main" onclick="javascript:return false();">
                                <a href="javascript:;" class="btn_slider">
                                </a>
                                <p class="name">
                                  Add elbow patches 
                                  <span>
                                    (+10$)
                                  </span>
                                 
                                </p>
                              </div>
                              <div id="options_patches" class="window top" style=<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])!='elbow_no') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>
                                <div class="op_patches">
                                  <div class="lateral_img img_patches2">
                                  </div>
                                  <div class="lateral_right">
                                    <div class="box_opt_patches">
                                      <div>
                                        <label layer="jacket_patches" class="<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_no' ) { ?> checked <?php } ?>">
                                         <div class="radio">
                                          <span class="<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_no' ) { ?> checked <?php } ?>">
                                           <input id="patches_default" class="uniform default_item" type="radio" name="patches_radio" value="elbow_no" <?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_no' ) { ?> checked="checked" <?php } ?> price="13.95"/>
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

                                         if(count($color_img) > 0) {
                                         $o=0; 
                                         foreach($color_img as $key=>$value) {

                                      ?>
                                      <div class="option_trigger common_color <?php if(!empty($elbow_type[1]) && trim($elbow_type[1])==$color_name[$o] ) { ?> active <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$o]; ?>">
                                        <a layer="jacket_patches" class="box_color color_item" href="javascript:;" img_index="0">
                                          <div class="active">
                                          </div>
                                          <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                        </a>
                                      </div>
                                      <?php ++$o; } } ?>
                                      
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                              		<!-- END CODERAS -->                            
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
     ?></form></div></div></div></div></div></div>
