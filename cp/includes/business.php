<div class="box-header">
  <h3>Business Suits Customizer</h3>
</div>
<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			<form method="post" class="garment_form business_suit_cust cust" action="<?php echo $adminurl;?>includes/action.php" id="garment_form_7348">
	            <input type="hidden" name="type" value="buisness_suits">
	             <input type="hidden" name="action" value="<?php echo $action;?>">
	            <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
	            <input type="hidden" name="userid" value="<?php echo $_GET['id'];?>">
	            <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
	            <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
                <input type="hidden" name="lining_id" value="<?php echo $lining[1];?>">
                <input type="hidden" name="p_img" value="<?php echo $homeurl.$f_prod_img[0];; ?>">
	            <input type="hidden" name="go_to" id="go_to">

	        <div id="garment_loading_7348" class="garment_loading">
	          <div class="icon-loading">
	          </div>
	        </div>
	    <nav class="garment_nav">
	          <div class="row">
	      <div class="col-xs-7">
	              <ul class="nav nav-tabs">
	                <li>
	                  <a href="#config" class="tab">
	                    Style
	                  </a>
	                </li>
	                <li>
	                  <a href="#fabric" class="tab">
	                    Fabric
	                  </a>
	                </li>
	                <li>
	                  <a href="#extra" class="tab">
	                    Accents
	                  </a>
	                </li>
	              </ul>
	      
	       	                
	                <div class="c-nav cf">
	                        <a href="javascript:;" class="step_next btn btn-primary pull-right">NEXT STEP</a>
	                        <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
	                        <span  class="garment_price btn btn-danger pull-right">$<?php echo $price;?></span>
	                </div>
	                </div>
	          </div>
	        </nav>
	    
	        <div class="garment_container" style="min-height: 1300px">
	          <div class="garment_blocks">
	            <div class="garment_block garment_block_config">
	              <div class="config_block config_block_woman_jacket" data-block="woman_jacket">
	                <div class="config_block_title" style="display:none;">
	                  Jacket
	                </div>
	                <div class="config_field jacket_fit">
	                  <div class="box_title">
	                    FIT(WAISTED):
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_fit" value="baggy"
	                        <?php if($jacketfit[1]=="baggy"){?> checked="checked" <?php }?> />
	                        Classic
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_fit" value="slim"
	                         <?php if($jacketfit[1]=="slim"){?> checked="checked" <?php }
	                        elseif ($jacketfit[1]=="") {?> checked="checked" <?php }?> />
	                        Slim fit
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field jacket_style">
	                  <div class="box_title">
	                    LOOK:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_style" value="simple" 
	                        <?php if($jacketlook[1]=="simple"){?> checked="checked" <?php }
	                        elseif ($jacketlook[1]=="") {?> checked="checked" <?php }?>/>
	                        Single breasted
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_style" value="crossed" 
	                        <?php if($jacketlook[1]=="crossed"){?> checked="checked" <?php }?>/>
	                        Double breasted
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_style" value="no_flaps" 
	                        <?php if($jacketlook[1]=="no_flaps"){?> checked="checked" <?php }?> />
	                        Without lapels
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field jacket_style_lapel">
	                  <div class="box_title">
	                    LAPEL STYLE:
	                  </div>
	                  <div class="box_opt box_opt_image mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_style_lapel_standard.jpg" alt="Notch"/>
	                        <input type="radio" name="jacket_style_lapel" value="standard" 
	                        <?php if($lapelstyle[1]=="standard"){?> checked="checked" <?php }?> />
	                        Notch
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_style_lapel_peak.jpg" alt="Peak"/>
	                        <input type="radio" name="jacket_style_lapel" value="peak"
	                        <?php if($lapelstyle[1]=="peak"){?> checked="checked" <?php }
	                        elseif ($lapelstyle[1]=="") {?> checked="checked" <?php }?>/>
	                        Peak
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_style_lapel_round.jpg" alt="Rounded"/>
	                        <input type="radio" name="jacket_style_lapel" value="round" 
	                        <?php if($lapelstyle[1]=="round"){?> checked="checked" <?php }?> />
	                        Rounded
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field jacket_wide_lapel">
	                  <div class="box_title">
	                    LAPEL WIDTH:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_wide_lapel" value="standard" 
	                        <?php if($lapelwidth[1]=="standard"){?> checked="checked" <?php }
	                        elseif ($lapelwidth[1]=="") {?> checked="checked" <?php }?>/>
	                        Standard
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_wide_lapel" value="width" 
	                        <?php if($lapelwidth[1]=="width"){?> checked="checked" <?php }?>/>
	                        Wide
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                 <div class="config_field jacket_buttons">
	                  <div class="box_title">
	                    NUMBER OF BUTTONS:
	                  </div>
	                  <div class="clearfix"></div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_buttons" value="1" 
	                        <?php if($jacketbuttons[1]=="1"){?> checked="checked" <?php }?>/>
	                        1
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_buttons" value="2" 
	                         <?php if($jacketbuttons[1]=="2"){?> checked="checked" <?php }
	                        elseif ($jacketbuttons[1]=="") {?> checked="checked" <?php }?>/>
	                        2
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_buttons" value="3"
	                        <?php if($jacketbuttons[1]=="3"){?> checked="checked" <?php }?>/>
	                        3
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_buttons" value="4"
	                        <?php if($jacketbuttons[1]=="4"){?> checked="checked" <?php }?>/>
	                        4
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_buttons" value="6"
	                        <?php if($jacketbuttons[1]=="6"){?> checked="checked" <?php }?>/>
	                        6
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                 <div class="config_field jacket_length">
	                  <div class="box_title">
	                    LENGTH:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_length" value="short" 
	                        <?php if($jacketlength[1]=="short"){?> checked="checked" <?php }?> />
	                        Short
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_length" value="long"
	                        <?php if($jacketlength[1]=="long"){?> checked="checked" <?php }
	                        elseif ($jacketlength[1]=="") {?> checked="checked" <?php }?> />
	                        Long
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field jacket_breast_pocket">
	                  <div class="box_title">
	                    CHEST POCKET:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer" icon-fixed="x">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_breast_pocket" value="yes"
	                        <?php if($chestpocket[1]=="yes"){?> checked="checked" <?php }
	                        elseif ($chestpocket[1]=="") {?> checked="checked" <?php }?> />
	                        Yes
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="jacket_breast_pocket" value="no" 
	                         <?php if($chestpocket[1]=="no"){?> checked="checked" <?php }?> />
	                        No
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field jacket_hip_pockets">
	                  <div class="box_title">
	                    POCKET STYLE:
	                  </div>
	                  <div class="box_opt box_opt_image mobile_layer" icon-fixed="d">
	                    <div class="box_opt_fix">
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_no.jpg" alt="No pockets"/>
	                        <input type="radio" name="jacket_hip_pockets" value="no" 
	                <?php if($pocketstyle[1]=="no"){?> checked="checked" <?php }?> />
	                        No pockets
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_with_flap.jpg" alt="With flap"/>
	                        <input type="radio" name="jacket_hip_pockets" value="with_flap" 
	                        <?php if($pocketstyle[1]=="with_flap"){?> checked="checked" <?php }
	                        elseif ($pocketstyle[1]=="") {?> checked="checked" <?php }?>/>
	                        With flap
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_diagonal_flap.jpg" alt="Slanted flap"/>
	                        <input type="radio" name="jacket_hip_pockets" value="diagonal_flap" 
	                        <?php if($pocketstyle[1]=="diagonal_flap"){?> checked="checked" <?php }?> />
	                        Slanted flap
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_double_live.jpg" alt="Double welt"/>
	                        <input type="radio" name="jacket_hip_pockets" value="double_live" 
	                        <?php if($pocketstyle[1]=="double_live"){?> checked="checked" <?php }?> />
	                        Double welt
	                      </label>
	                    </div>
	                    <div style="display: block; float: left;">
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_diagonal_double_live.jpg" alt="Slanted double welt"/>
	                        <input type="radio" name="jacket_hip_pockets" 
	                        value="diagonal_double_live" 
	                        <?php if($pocketstyle[1]=="diagonal_double_live"){?> checked="checked" <?php }?> />
	                        Slanted double welt
	                      </label>
	                      <!--<label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_patched.jpg" alt="Patched"/>
	                        <input type="radio" name="jacket_hip_pockets" value="patched"/>
	                        Patched
	                      </label>-->
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field jacket_sleeves">
	                  <div class="box_title">
	                    SLEEVES:
	                  </div>
	                  <div class="clearfix"></div>
	                  <div class="box_opt box_opt_image mobile_layer" icon-fixed="T">
	                    <div class="box_opt_fix">
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_sleeves_no.jpg" alt="No buttons"/>
	                        <input type="radio" name="jacket_sleeves" value="no" 
	                        <?php if($sleeves[1]=="no"){?> checked="checked" <?php }?>/>
	                        No buttons
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_sleeves_2_buttons.jpg" alt="2 Buttons"/>
	                        <input type="radio" name="jacket_sleeves" value="2_buttons" 
	                        <?php if($sleeves[1]=="2_buttons"){?> checked="checked" <?php }
	                        elseif ($sleeves[1]=="") {?> checked="checked" <?php }?> />
	                        2 Buttons
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_sleeves_3_buttons.jpg" alt="3 Buttons"/>
	                        <input type="radio" name="jacket_sleeves" value="3_buttons" 
	                        <?php if($sleeves[1]=="3_buttons"){?> checked="checked" <?php }?> />
	                        3 Buttons
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field jacket_finishing">
	                  <div class="box_title">
	                    HEMLINE:
	                  </div>
	                  <div class="box_opt box_opt_image mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_finishing_open.jpg" alt="Cutaway"/>
	                        <input type="radio" name="jacket_finishing" value="open" 
	                         <?php if($hemline[1]=="open"){?> checked <?php }?>/>
	                        Cutaway
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_finishing_straight.jpg" alt="Straight"/>
	                        <input type="radio" name="jacket_finishing" value="straight" 
	                        <?php if($hemline[1]=="straight"){?> checked <?php }?>/>
	                        Straight
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_finishing_rounded.jpg" alt="Rounded"/>
	                        <input type="radio" name="jacket_finishing" value="rounded" 
	                         <?php if($hemline[1]=="rounded"){?> checked="checked" <?php }
	                        elseif ($hemline[1]=="") {?> checked="checked" <?php }?>/>
	                        Rounded
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field jacket_back_style">
	                  <div class="box_title">
	                    BACK STYLE:
	                  </div>
	                  <div class="box_opt box_opt_image mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_back_style_uncut.jpg" alt="Ventless"/>
	                        <input type="radio" name="jacket_back_style" value="uncut" 
	                        <?php if($backstyle[1]=="uncut"){?> checked="checked" <?php }
	                        elseif ($backstyle[1]=="") {?> checked="checked" <?php }?>/>
	                        Ventless
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_back_style_1_cut.jpg" alt="Center vent"/>
	                        <input type="radio" name="jacket_back_style" value="1_cut"
	                         <?php if($backstyle[1]=="1_cut"){?> checked <?php }?> />
	                        Center vent
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_back_style_2_cut.jpg" alt="Side vents"/>
	                        <input type="radio" name="jacket_back_style" value="2_cut" 
	                         <?php if($backstyle[1]=="2_cut"){?> checked <?php }?> />
	                        Side vents
	                      </label>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <div class="config_block config_block_woman_pants" data-block="woman_pants">
	                <div class="config_block_title">
	                  Pants
	                </div>
	                <div class="config_field pants_cut">
	                  <div class="box_title">
	                    FIT:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_cut" value="skinny" 
	                       <?php if($pantfit[1]=="skinny"){?> checked="checked" <?php }
	                        elseif ($pantfit[1]=="") {?> checked="checked" <?php }?> />
	                        Slim Fit
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_cut" value="standard" 
	                        <?php if($pantfit[1]=="standard"){?> checked <?php }?>/>
	                        Classic Fit
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_cut" value="loose" 
	                        <?php if($pantfit[1]=="loose"){?> checked <?php }?>/>
	                        Loose Fit
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field pants_length">
	                  <div class="box_title">
	                    LENGTH:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_length" value="long"
	                         <?php if($pantlength[1]=="long"){?> checked="checked" <?php }
	                        elseif ($pantlength[1]=="") {?> checked="checked" <?php }?> />
	                        Long
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_length" value="ankle"
	                        <?php if($pantlength[1]=="ankle"){?> checked <?php }?>/>
	                        Ankle
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_length" value="bermuda"
	                        <?php if($pantlength[1]=="bermuda"){?> checked <?php }?>/>
	                        Bermuda
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                 <div class="config_field pants_front_closure">
	                  <div class="box_title">
	                    FASTENING:
	                  </div>
	                  <div class="box_opt box_opt_image mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_closure_center_button.jpg" alt="Standard"/>
	                        <input type="radio" name="pants_front_closure" value="center_button"
	                        <?php if($pantfast[1]=="center_button"){?> checked="checked" <?php }
	                        elseif ($pantfast[1]=="") {?> checked="checked" <?php }?>/>
	                        Standard
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_closure_center_no_button.jpg" alt="No button"/>
	                        <input type="radio" name="pants_front_closure" value="center_no_button" 
	                        <?php if($pantfast[1]=="center_no_button"){?> checked <?php }?>/>
	                        No button
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_closure_moved_no_button.jpg" alt="Displaced: No button"/>
	                        <input type="radio" name="pants_front_closure" value="moved_no_button" 
	                        <?php if($pantfast[1]=="moved_no_button"){?> checked <?php }?>/>
	                        Displaced: No button
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_closure_moved_button.jpg" alt="Displaced"/>
	                        <input type="radio" name="pants_front_closure" value="moved_button" 
	                        <?php if($pantfast[1]=="moved_button"){?> checked <?php }?>/>
	                        Displaced
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_closure_side_zipper.jpg" alt="Zipper"/>
	                        <input type="radio" name="pants_front_closure" value="side_zipper" 
	                        <?php if($pantfast[1]=="side_zipper"){?> checked <?php }?>/>
	                        Side Zipper
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field pants_pleat">
	                  <div class="box_title">
	                    PLEATS:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_pleat" value="no_pleats"
	                        <?php if($pantpleat[1]=="no_pleats"){?> checked="checked" <?php }
	                        elseif ($pantpleat[1]=="") {?> checked="checked" <?php }?>  />
	                        No pleats
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_pleat" value="pleated" 
	                        <?php if($pantpleat[1]=="pleated"){?> checked <?php }?>/>
	                        Pleated
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_pleat" value="double_pleats" 
	                        <?php if($pantpleat[1]=="double_pleats"){?> checked <?php }?>/>
	                        Double pleats
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field pants_belt_loops">
	                  <div class="box_title">
	                    BELT LOOPS:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_belt_loops" value="with"
	                         <?php if($beltloops[1]=="with"){?> checked="checked" <?php }
	                        elseif ($beltloops[1]=="") {?> checked="checked" <?php }?>/>
	                        With
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_belt_loops" value="without" 
	                        <?php if($beltloops[1]=="without"){?> checked <?php }?>/>
	                        Without
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field pants_crotch">
	                  <div class="box_title">
	                    CROTCH:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_crotch" value="low" 
	                        <?php if($crotch[1]=="low"){?> checked <?php }?>/>
	                        Low
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_crotch" value="high" 
	                        <?php if($crotch[1]=="high"){?> checked <?php }?>/>
	                        High
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_crotch" value="medium"
	                         <?php if($crotch[1]=="medium"){?> checked="checked" <?php }
	                        elseif ($crotch[1]=="") {?> checked="checked" <?php }?>/>
	                        Medium
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field pants_belt_loops_property">
	                  <div class="box_title">
	                    WAISTBAND:
	                  </div>
	                  <div class="clearfix"></div>
	                  <div class="box_opt box_opt_checkbox mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_checkbox t4l_checkbox">
	                        <input type='checkbox' name='pants_belt_loops_property' value='high' 
	                        <?php if($waistband[1]=="high"){?> checked <?php }?>>
	                        High
	                      </label>
	                    </div>
	                  </div>
	                </div>

	                <div class="config_field pants_front_pocket">
	                  <div class="box_title">
	                    POCKET STYLE:
	                  </div>
	                  <div class="box_opt box_opt_image mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_pocket_no.jpg" alt="Without"/>
	                        <input type="radio" name="pants_front_pocket" value="no" 
	                        <?php if($pantpocket[1]=="no"){?> checked <?php }?>/>
	                        Without
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_pocket_inclined.jpg" alt="Diagonal"/>
	                        <input type="radio" name="pants_front_pocket" value="inclined" 
	                        <?php if($pantpocket[1]=="inclined"){?> checked <?php }?>/>
	                        Diagonal
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_pocket_rounded.jpg" alt="Rounded"/>
	                        <input type="radio" name="pants_front_pocket" value="rounded" 
	                        <?php if($pantpocket[1]=="rounded"){?> checked <?php }?>/>
	                        Rounded
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_pocket_straight.jpg" alt="Vertical"/>
	                        <input type="radio" name="pants_front_pocket" value="straight"
	                        <?php if($pantpocket[1]=="straight"){?> checked="checked" <?php }
	                        elseif ($pantpocket[1]=="") {?> checked="checked" <?php }?>/>
	                        Vertical
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_pocket_one_living.jpg" alt="Welted"/>
	                        <input type="radio" name="pants_front_pocket" value="one_living" 
	                        <?php if($pantpocket[1]=="one_living"){?> checked <?php }?>/>
	                        Welted
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <div class="config_field pants_back_pocket_num">
	                  <div class="box_title">
	                    BACK POCKETS:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_back_pocket_num" value="0"
	                        <?php if($pantbackpocket[1]=="0"){?> checked="checked" <?php }
	                        elseif ($pantbackpocket[1]=="") {?> checked="checked" <?php }?>/>
	                        No Pockets
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_back_pocket_num" value="1" 
	                        <?php if($pantbackpocket[1]=="1"){?> checked <?php }?>/>
	                        1 Pocket
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_back_pocket_num" value="2" 
	                        <?php if($pantbackpocket[1]=="2"){?> checked <?php }?>/>
	                        2 Pockets
	                      </label>
	                    </div>
	                  </div>
	                </div>
	                <!--<div class="config_field pants_back_pocket_type">
	                  <div class="box_title">
	                    POCKET STYLE:
	                  </div>
	                  <div class="box_opt box_opt_image mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_back_pocket_type_button.jpg" alt="Double welted with button"/>
	                        <input type="radio" name="pants_back_pocket_type" value="button"/>
	                        Double welted with button
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_back_pocket_type_one_living.jpg" alt="Welted"/>
	                        <input type="radio" name="pants_back_pocket_type" value="one_living"/>
	                        Welted
	                      </label>
	                      <label class="option option_image t4l_radio">
	                        <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_back_pocket_type_two_living.jpg" alt="Double welt"/>
	                        <input type="radio" name="pants_back_pocket_type" value="two_living"/>
	                        Double welt
	                      </label>
	                    </div>
	                  </div>
	                </div>-->
	                <div class="config_field pants_cuff">
	                  <div class="box_title">
	                    CUFFS STYLE:
	                  </div>
	                  <div class="box_opt box_opt_radio mobile_layer">
	                    <div class="box_opt_fix">
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_cuff" value="without"
	                        <?php if($pantcuffs[1]=="without}"){?> checked="checked" <?php }
	                        elseif ($pantcuffs[1]=="") {?> checked="checked" <?php }?>/>
	                        No Cuff
	                      </label>
	                      <label class="option option_radio t4l_radio">
	                        <input type="radio" name="pants_cuff" value="standard" 
	                        <?php if($pantcuffs[1]=="standard}"){?> checked <?php }?>/>
	                        With Cuffs
	                      </label>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="garment_block garment_block_fabric">
	             
	             
	              <div class="step_block_selector_enable fabric_block_selector_enable">
	                <label class="">
	                  <input type="checkbox" class="multiple_fabric" name="multiple_fabric"> Select a different fabric for each garment
	                </label>
	               </div>

	             <div class="row step_block_selector fabric_block_selector" style="display: none;">
	              <div class="col-md-3">
	                <a href="#fabric_block_woman_jacket" class="selector woman_jacket current">
	                  <span>Jacket</span>
	                </a>
	              </div>
	              <div class="col-md-3">
	                <a href="#fabric_block_woman_pants" class="selector woman_pants">
	                  <span>Pant</span>
	                </a>
	              </div>
	            </div>

	           

	              <!-- Jacket Section -->
	              <div class="fabric_block fabric_block_woman_jacket" data-block-name="woman_jacket" data-block-name1="woman_jacket2">
	                  <div class="fabric_block_title">Jacket</div>
	                  <div class="clearfix"></div>
	                      <div class="fabric_preview fabric_preview_woman_jacket" style="display:block;">
	                         <div class="infobar" style="width:650px;">
	                              <span class="title fabric_main_title"><?php echo $fab_title;?></span>
	                              <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc); ?></span>
	                          </div>
	                          <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img src="<?php echo $homeurl.$fab_img;?>" style="width:650px;" class="fabric_main_image"></a>
	                      </div>
	                      <input type="hidden" class="fabric_input required" name="woman_jacket" data-block-name="woman_jacket" value="<?php echo $_SESSION['fabID']; ?>" />
	                      <div class="fabric_filters">
	                          <input type="hidden" name="fabric_block" value="woman_jacket" />
	                      </div>
	                      <div class="fabric_list loaded">
                          
                          <div id="not_multiple_fab">
	                      <?php 

	                          $fab_name4 = ($fab_name!='')?$fab_name.'('.$fabid.','.$fab_price.')':''; ?>
                                 <input type="hidden" name="custom_fabric_name1" value="<?php echo $fab_name4; ?>">

                                  <div class="col-md-12" style="margin-left: 5px;">
                                    <label class="control-label">Type Custom Fabric Name</label>
                                      <input type="text" name="custom_fabric_name" value="<?php echo $fab_name4; ?>" class="form-control custom_fabric7"
                                      data-sid="<?php echo $_GET['sid'];?>" 
                                        data-sid1="<?php echo $fabric_list; ?>" placeholder="Custom Fabric Name">
                                      <h4>(OR)</h4>
                                    </div>
	                      </div>

	                       <div id="multiple_fab" style="display:none;">
	                      <?php $fab_name2 = ($fab_name!='')?$fab_name.'('.$fabid.','.$fab_price.')':''; ?>
                                 <input type="hidden" name="custom_fabric_name2" value="<?php echo $fab_name2; ?>">

                                  <div class="col-md-12" style="margin-left: 5px;">
                                    <label class="control-label">Type Custom Fabric Name</label>
                                      <input type="text" name="custom_fabric_name1" value="<?php echo $fab_name2; ?>" class="form-control custom_fabric8"
                                      data-sid="<?php echo $_GET['sid'];?>" 
                                        data-sid1="<?php echo $fabric_list; ?>" placeholder="Custom Fabric Name">
                                      <h4>(OR)</h4>
                                    </div>
	                      </div>
                                

	                       <?php $fab=$site->get_fabrics1('',$fabric_list);
	                            //print_r($fab);
	                            foreach ($fab as $key => $value) {
	                            ?>
	                          <div class="fabric_thumb woman_jacket fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fabid==$fab[$key]['f_rand']) {?> current <?php }?>">
	                              <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
	                                  <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="<?php echo $fab[$key]['fab_name'];?>">
	                              </a>
	                              <div class="price price_total">+<?php echo $fab[$key]['fab_price'];?>$</div>
	                              <div class="price price_part woman_jacket" data-id="<?php echo $fab[$key]['f_rand'];?>" style="display:none;">+<?php echo number_format($fab[$key]['fab_price']/1.5,2);?>$</div>
	                              <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
	                              <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
	                              <input type="hidden" name="f_prod_img" class="f_prod_img" value="<?php echo $homeurl.$fab[$key]['default_img']; ?>">
	                          </div>
	                          <?php }?>
	                          <!--<div class="fabric_thumb fabric_1233 <?php if($fabid=="1233") {?> current <?php }?>">
	                              <a href="javascript:void(0);" class="select " rel="1233">
	                                  <img class="b-lazy b-loaded" src="<?php echo $homeurl;?>assets/dimg/fabric/suit/1233_normal.jpg" alt="Trivento">
	                              </a>
	                              <div class="price price_part">+28$</div>
	                              <div class="price price_total">+40$</div>
	                              <div class="title fabric_title">Trivento</div>
	                              <div class="composition">Wool</div>
	                          </div>-->
	                      </div>
	              </div>

	              <!-- Skirt Section -->

	               <div class="fabric_block fabric_block_woman_pants" data-block-name="woman_pants">
	                  <div class="fabric_block_title">Skirt</div>
	                      <div class="fabric_preview fabric_preview_woman_pants" style="display:block;">
	                         <div class="infobar" style="width:650px;">
	                              <span class="title fabric_main_title"><?php echo $fab_title1;?></span>
	                              <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc1); ?></span>
	                          </div>
	                          <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title1); ?>"><img src="<?php echo $homeurl.$fab_img1;?>" style="width:650px;" class="fabric_main_image"></a>
	                      </div>
	                      <input type="hidden" class="fabric_input required" name="woman_pants" data-block-name="woman_pants" value="<?php echo $_SESSION['fabID']; ?>" />
	                      <div class="fabric_filters">
	                          <input type="hidden" name="fabric_block" value="woman_pants" />
	                      </div>
	                      <div class="fabric_list loaded">

	                     

	                      <div id="multiple_fab1" >
	                      <?php $fab_name3 = ($fab_name1!='')?$fab_name1.'('.$fabid1.','.$fab_price1.')':''; ?>
                                 <input type="hidden" name="custom_fabric_name3" value="<?php echo $fab_name3; ?>">

                                  <div class="col-md-12" style="margin-left: 5px;">
                                    <label class="control-label">Type Custom Fabric Name</label>
                                      <input type="text" name="custom_fabric_name2" value="<?php echo $fab_name3; ?>" class="form-control custom_fabric9"
                                      data-sid="<?php echo $_GET['sid'];?>" 
                                        data-sid1="<?php echo $fabric_list; ?>" placeholder="Custom Fabric Name">
                                      <h4>(OR)</h4>
                                    </div>
	                      </div>

	                      

	                       <?php $fab=$site->get_fabrics('',$fabric_list);
	                            foreach ($fab as $key => $value) {
	                            ?>
	                          <div class="fabric_thumb woman_pants fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fabid1==$fab[$key]['f_rand']) {?> current <?php }?>">
	                              <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
	                                  <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="<?php echo $fab[$key]['fab_name'];?>">
	                              </a>
	                              <div class="price price_total">+<?php echo $fab[$key]['fab_price'];?>$</div>
	                              <div class="price price_part woman_pants" data-id="<?php echo $fab[$key]['f_rand'];?>">+<?php echo number_format($fab[$key]['fab_price']/3,2);?>$</div>
	                              <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
	                              <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
	                              <input type="hidden" name="f_prod_img" class="f_prod_img" value="<?php echo $homeurl.$fab[$key]['default_img']; ?>">
	                          </div>
	                          <?php }?>
	                      </div>
	                  </div>
	           
	           </div>
	            <div class="col-md-10 garment_block garment_block_extra">
	              <div class="extra_block extra_block_woman_jacket" data-block-name="woman_jacket">
	                <div class="extra_container jacket_lining extra_container_lining active" data-extra-name="jacket_lining" data-extra-type="lining" info-icon="R">
	                  <a href="javascript:void(0);" class="discard">
	                    Delete
	                  </a>
	                  <div class="extra_title">
	                    Customize Lining
	                  </div>
	                  <div class="extra_content" style="display: block;">
	                    <div class="extra_field">
	                      <input type="hidden" name="jacket_lining" class="id jacket_lining" value="<?php echo $lining[1];?>"/>
	                        <div class="lining_slider_contents" data-name="jacket_lining">
	                          <div class="fabric_thumb lining_thumb lining_121 <?php if($lining[1]=="121"){?> current <?php }?>" value="121">
	                            <a href="javascript:void(0);" data-id="121" class="extra_select">
	                             <img class="b-lazy image b-loaded" src="<?php echo $homeurl;?>assets/dimg/lining/default/121_normal.jpg" alt="">
	                            </a>
	                            <div class="price">9.95$</div>
	                            <div class="title">Paris</div>
	                         </div>
	                         <div class="fabric_thumb lining_thumb lining_96 <?php if($lining[1]=="96"){?> current <?php }?>" value="96">
	                           <a href="javascript:void(0);" data-id="96" class="extra_select">
	                             <img class="b-lazy image b-loaded" src="<?php echo $homeurl;?>assets/dimg/lining/default/96_normal.jpg" alt="">
	                           </a>
	                           <div class="price">14.95$</div>
	                           <div class="title">Cergy</div>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	                <div class="extra_container jacket_initials extra_container_initials" data-extra-name="jacket_initials" data-extra-type="initials" info-icon="J">
	                  <a href="javascript:void(0);" class="discard">
	                    Delete
	                  </a>
	                  <div class="extra_title">
	                    Add monogram
	                  </div>
	                  <div class="extra_content">
	                    <input type="hidden" class="initials_price" name="initials_price" value="9.95">
	                    <input type="hidden" name="title_price1" class="title_price1 title_price2" value="<?php echo $lining_price1; ?>">
	                    <div class="extra_field extra_field_initials_text required">
	                      <div class="box_title">
	                        WRITE HERE:
	                      </div>
	                      <div class="box_opt">
	                        <div class="box_opt_fix">
	                          <input value="<?php echo $text[1];?>" type="text" name="initials_text" class="text initials_text" placeholder="Type your initials" maxlength="10">
	                          <span class="extra_price">
	                            (+ 9.95$ )
	                          </span>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="extra_field extra_field_initials_fonts required">
	                      <div class="box_title">
	                        FONT:
	                      </div>
	                      <div class="box_opt">
	                        <div class="box_opt_fix">
	                          <label class="t4l_radio garamond">
	                            <input type="radio" class="font" name="initials_font" value="garamond"
	                             <?php if($font[1]=="garamond"){?> checked <?php }?> />
	                            <img src="<?php echo $homeurl;?>assets/images/personalize/initials/garamond.png" alt="Garamond"
	                             />
	                          </label>
	                          <label class="t4l_radio harrington">
	                            <input <?php if($font[1]=="harrington"){?> checked <?php }?>  type="radio" class="font" name="initials_font" value="harrington">
	                            <img src="<?php echo $homeurl;?>assets/images/personalize/initials/harrington.png" alt="Harrington"
	                             />
	                          </label>
	                          <label class="t4l_radio times">
	                            <input <?php if($font[1]=="times"){?> checked <?php }?> type="radio" class="font" name="initials_font" value="times">
	                            <img src="<?php echo $homeurl;?>assets/images/personalize/initials/times.png" alt="Times new Roman"
	                              />
	                          </label>
	                          <label class="t4l_radio arial">
	                            <input <?php if($font[1]=="arial"){?> checked <?php }?> type="radio" class="font" name="initials_font" value="arial">
	                            <img src="<?php echo $homeurl;?>assets/images/personalize/initials/arial.png" alt="Arial"
	                              />
	                          </label>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="extra_field extra_field_initials_color required">
	                      <div class="box_title">
	                        INITIALS COLOR:
	                      </div>
	                      <div class="box_opt">
	                        <div class="box_opt_fix">
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ffcf10"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="ffcf10"){?> checked <?php }?> type="radio" class="color" data-color="ffcf10" name="initials_color" value="ffcf10">
	                            
	                            <span class="thread_color" style="background: #ffcf10">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="4477cf"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="4477cf"){?> checked <?php }?> type="radio" class="color" data-color="4477cf" name="initials_color" value="4477cf">
	                            
	                            <span class="thread_color" style="background: #4477cf">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ffffff"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="ffffff"){?> checked <?php }?> type="radio" class="color" data-color="ffffff" name="initials_color" value="ffffff">
	                            
	                            <span class="thread_color" style="background: #ffffff">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="a48239"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="a48239"){?> checked <?php }?> type="radio" class="color" data-color="a48239" name="initials_color" value="a48239">
	                            
	                            <span class="thread_color" style="background: #a48239">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="4d020d"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="4d020d"){?> checked <?php }?> type="radio" class="color" data-color="4d020d" name="initials_color" value="4d020d">
	                            
	                            <span class="thread_color" style="background: #4d020d">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b3b3b3"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="b3b3b3"){?> checked <?php }?> type="radio" class="color" data-color="b3b3b3" name="initials_color" value="b3b3b3">
	                            
	                            <span class="thread_color" style="background: #b3b3b3">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color <?php if($color[1]=="331b00"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="331b00"){?> checked <?php }?> type="radio" class="color" data-color="331b00" name="initials_color" value="331b00">
	                            
	                            <span class="thread_color" style="background: #331b00">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="000000"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="000000"){?> checked <?php }?> type="radio" class="color" data-color="000000" name="initials_color" value="000000">
	                            
	                            <span class="thread_color" style="background: #000000">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="b80e58"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="b80e58"){?> checked <?php }?> type="radio" class="color" data-color="b80e58" name="initials_color" value="b80e58">
	                            
	                            <span class="thread_color" style="background: #b80e58">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="0ba133"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="0ba133"){?> checked <?php }?> type="radio" class="color" data-color="0ba133" name="initials_color" value="0ba133">
	                            
	                            <span class="thread_color" style="background: #0ba133">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="c20000"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="c20000"){?> checked <?php }?> type="radio" class="color" data-color="c20000" name="initials_color" value="c20000">
	                            
	                            <span class="thread_color" style="background: #c20000">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ff7912"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="ff7912"){?> checked <?php }?> type="radio" class="color" data-color="ff7912" name="initials_color" value="ff7912">
	                            
	                            <span class="thread_color" style="background: #ff7912">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color <?php if($color[1]=="5f1970"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="5f1970"){?> checked <?php }?> type="radio" class="color" data-color="5f1970" name="initials_color" value="5f1970">
	                            
	                            <span class="thread_color" style="background: #5f1970">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="b8f2f2"){?> checked1 <?php }?>">
	                            <input <?php if($color[1]=="b8f2f2"){?> checked <?php }?> type="radio" class="color" data-color="b8f2f2" name="initials_color" value="b8f2f2">
	                            
	                            <span class="thread_color" style="background: #b8f2f2">
	                            </span>
	                          </label>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	                <div class="extra_container jacket_neck extra_container_colors" data-extra-name="jacket_neck" data-extra-type="colors" info-icon="o" style="visibility:hidden;" >
	                  <a href="javascript:void(0);" class="discard">
	                    Delete
	                  </a>
	                  <div class="extra_title">
	                    Neck lining
	                  </div>
	                  <div class="extra_content">
	                    <div class="extra_field required extra_field_image contrast" data-field-name="contrast">
	                      <div class="box_opt box_opt_no_title">
	                        <div class="box_opt_fix">
	                          <label class="option option_image t4l_radio">
	                            <!--<img src="/images/personalize/jacket_neck/contrast/xdefault.jpg.pagespeed.ic.Y3fCT6FJnV.webp" alt="By default"/>-->
	                            <input type="radio" name="jacket_neck[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
	                            <span class="name">
	                              By default
	                            </span>
	                          </label>
	                          <label class="option option_image t4l_radio">
	                            <!--<img src="/images/personalize/jacket_neck/contrast/xcustom.jpg.pagespeed.ic.2t8bILqRoq.webp" alt="Custom color"/>-->
	                            <input type="radio" name="jacket_neck[contrast]" value="custom" data-field-name="contrast" data-price="3.95">
	                            <span class="name">
	                              Custom color
	                            </span>
	                            <span class="price">
	                              +3,95€
	                            </span>
	                          </label>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="extra_field required extra_field_neck_lining color" data-field-name="color">
	                      <input type="hidden" name="jacket_neck[color]" value="">
	                      <div class="fabric_thumb thread_thumb " data-id="2">
	                        <a href="javascript:;">
	                          <span class="image" style="background: #d89f6b">
	                          </span>
	                        </a>
	                      </div>
	                      <div class="fabric_thumb thread_thumb " data-id="3">
	                        <a href="javascript:;">
	                          <span class="image" style="background: #ea1c1e">
	                          </span>
	                        </a>
	                      </div>
	                      <div class="fabric_thumb thread_thumb " data-id="5">
	                        <a href="javascript:;">
	                          <span class="image" style="background: #b2a995">
	                          </span>
	                        </a>
	                      </div>
	                      <div class="fabric_thumb thread_thumb " data-id="4">
	                        <a href="javascript:;">
	                          <span class="image" style="background: #212534">
	                          </span>
	                        </a>
	                      </div>
	                      <div class="fabric_thumb thread_thumb " data-id="6">
	                        <a href="javascript:;">
	                          <span class="image" style="background: #34322c">
	                          </span>
	                        </a>
	                      </div>
	                      <div class="fabric_thumb thread_thumb " data-id="1">
	                        <a href="javascript:;">
	                          <span class="image" style="background: #e7e7e7">
	                          </span>
	                        </a>
	                      </div>
	                      <div class="fabric_thumb thread_thumb " data-id="7">
	                        <a href="javascript:;">
	                          <span class="image" style="background: #1f1f1f">
	                          </span>
	                        </a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	                <div class="extra_container jacket_patches extra_container_colors" data-extra-name="jacket_patches" data-extra-type="colors" info-icon="q" style="visibility:hidden;" >
	                  <a href="javascript:void(0);" class="discard">
	                    Delete
	                  </a>
	                  <div class="extra_title">
	                    Add elbow patches 
	                  </div>
	                  <div class="extra_content">
	                    <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
	                      <div class="box_opt box_opt_no_title">
	                        <div class="box_opt_fix">
	                          <label class="option option_radio t4l_radio">
	                            <input type="radio" name="jacket_patches[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
	                            <span class="name">
	                              By default
	                            </span>
	                          </label>
	                          <label class="option option_radio t4l_radio">
	                            <input type="radio" name="jacket_patches[contrast]" value="custom" data-field-name="contrast" data-price="12.95">
	                            <span class="name">
	                              Custom color
	                            </span>
	                            <span class="price">
	                              +12,95€
	                            </span>
	                          </label>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="extra_field required extra_field_patches color" data-field-name="color">
	                      <input type="hidden" name="jacket_patches[color]" value="">
	                      <div class="fabric_thumb patch_thumb " data-id="55">
	                        <a href="javascript:;">
	                          <span class="image" style="background:url(/dimg/patches/default/x55_thumb.jpg.pagespeed.ic.WlGofGkARu.webp)">
	                          </span>
	                        </a>
	                        <div class="title">
	                          Black
	                        </div>
	                      </div>
	                      <div class="fabric_thumb patch_thumb " data-id="56">
	                        <a href="javascript:;">
	                          <span class="image" style="background:url(/dimg/patches/default/x56_thumb.jpg.pagespeed.ic.Bx0VBdyqJ2.webp)">
	                          </span>
	                        </a>
	                        <div class="title">
	                          Brown
	                        </div>
	                      </div>
	                      <div class="fabric_thumb patch_thumb " data-id="57">
	                        <a href="javascript:;">
	                          <span class="image" style="background:url(/dimg/patches/default/x57_thumb.jpg.pagespeed.ic.fJalN9Ak9s.webp)">
	                          </span>
	                        </a>
	                        <div class="title">
	                          Beige
	                        </div>
	                      </div>
	                      <div class="fabric_thumb patch_thumb " data-id="58">
	                        <a href="javascript:;">
	                          <span class="image" style="background:url(/dimg/patches/default/x58_thumb.jpg.pagespeed.ic.A1Zi5CpLrP.webp)">
	                          </span>
	                        </a>
	                        <div class="title">
	                          Brown-Grey
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	                <div class="extra_container jacket_metal_button extra_container_colors" data-extra-name="jacket_metal_button" data-extra-type="colors" info-icon="N" style="visibility:hidden;" >
	                  <a href="javascript:void(0);" class="discard">
	                    Delete
	                  </a>
	                  <div class="extra_title">
	                    Type of Buttons
	                  </div>
	                  <div class="extra_content">
	                    <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
	                      <div class="box_opt box_opt_no_title">
	                        <div class="box_opt_fix">
	                          <label class="option option_radio t4l_radio">
	                            <input type="radio" name="jacket_metal_button[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
	                            <span class="name">
	                              By default
	                            </span>
	                          </label>
	                          <label class="option option_radio t4l_radio">
	                            <input type="radio" name="jacket_metal_button[contrast]" value="custom" data-field-name="contrast" data-price="10.9">
	                            <span class="name">
	                              Custom color
	                            </span>
	                            <span class="price">
	                              +10,9€
	                            </span>
	                          </label>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="extra_field required extra_field_metal_button type" data-field-name="type">
	                      <div class="box_opt box_opt_no_title">
	                        <div class="box_opt_fix">
	                          <label class="option option_image t4l_radio metal_b">
	                            <!--<img src="/images/personalize/jacket_metal_button/type/x50.jpg.pagespeed.ic.39MQArwCLo.webp" alt="Custom color"/>-->
	                            <input type="radio" name="jacket_metal_button[type]" value="50" data-field-name="type" data-price="10.9">
	                          </label>
	                          <label class="option option_image t4l_radio metal_b">
	                            <!--<img src="/images/personalize/jacket_metal_button/type/x51.jpg.pagespeed.ic.1pYg9RA8zS.webp" alt="Custom color"/>-->
	                            <input type="radio" name="jacket_metal_button[type]" value="51" data-field-name="type" data-price="10.9">
	                          </label>
	                          <label class="option option_image t4l_radio metal_b">
	                            <!--<img src="/images/personalize/jacket_metal_button/type/x52.jpg.pagespeed.ic.zu8Aw71J0r.webp" alt="Custom color"/>-->
	                            <input type="radio" name="jacket_metal_button[type]" value="52" data-field-name="type" data-price="10.9">
	                          </label>
	                          <label class="option option_image t4l_radio metal_b">
	                            <!--<img src="/images/personalize/jacket_metal_button/type/x53.jpg.pagespeed.ic.tn4dyPq3A3.webp" alt="Custom color"/>-->
	                            <input type="radio" name="jacket_metal_button[type]" value="53" data-field-name="type" data-price="10.9">
	                          </label>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	                <div class="extra_container jacket_threads extra_container_threads" data-extra-name="jacket_threads" data-extra-type="threads" info-icon="V" style="visibility:hidden;" >
	                  <a href="javascript:void(0);" class="discard">
	                    Delete
	                  </a>
	                  <div class="extra_title">
	                    Add colored button threads
	                  </div>
	                  <div class="extra_content">
	                    <div class="extra_field extra_field_radio contrast" data-field-name="contrast">
	                      <div class="box_opt box_opt_no_title">
	                        <div class="box_opt_fix">
	                          <label class="option option_radio t4l_radio">
	                            
	                            <input type="radio" name="jacket_threads[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
	                            <span class="name">
	                              By default
	                            </span>
	                          </label>
	                          <label class="option option_radio t4l_radio">
	                            
	                            <input type="radio" name="jacket_threads[contrast]" value="all" data-field-name="contrast" data-price="4.5">
	                            <span class="name">
	                              All
	                            </span>
	                            <span class="price">
	                              (+4,5€)
	                            </span>
	                          </label>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="extra_field color required extra_field_threads threads" data-field-name="threads" style="visibility:hidden;">
	                      <div class="box_title">
	                        BUTTON THREADS:
	                      </div>
	                      <div class="box_opt">
	                        <div class="box_opt_fix">
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="ffcf10" name="jacket_threads[threads][color]" data-field-name="threads-color" value="9">
	                            
	                            <span class="thread_color" style="background: #ffcf10">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="4477cf" name="jacket_threads[threads][color]" data-field-name="threads-color" value="11">
	                            
	                            <span class="thread_color" style="background: #4477cf">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="ffffff" name="jacket_threads[threads][color]" data-field-name="threads-color" value="12">
	                            
	                            <span class="thread_color" style="background: #ffffff">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="a48239" name="jacket_threads[threads][color]" data-field-name="threads-color" value="13">
	                            
	                            <span class="thread_color" style="background: #a48239">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="4d020d" name="jacket_threads[threads][color]" data-field-name="threads-color" value="14">
	                            
	                            <span class="thread_color" style="background: #4d020d">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="b3b3b3" name="jacket_threads[threads][color]" data-field-name="threads-color" value="15">
	                            
	                            <span class="thread_color" style="background: #b3b3b3">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="331b00" name="jacket_threads[threads][color]" data-field-name="threads-color" value="16">
	                            
	                            <span class="thread_color" style="background: #331b00">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="000000" name="jacket_threads[threads][color]" data-field-name="threads-color" value="17">
	                            
	                            <span class="thread_color" style="background: #000000">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="b80e58" name="jacket_threads[threads][color]" data-field-name="threads-color" value="18">
	                            
	                            <span class="thread_color" style="background: #b80e58">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="0ba133" name="jacket_threads[threads][color]" data-field-name="threads-color" value="19">
	                            
	                            <span class="thread_color" style="background: #0ba133">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="c20000" name="jacket_threads[threads][color]" data-field-name="threads-color" value="25">
	                            
	                            <span class="thread_color" style="background: #c20000">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="ff7912" name="jacket_threads[threads][color]" data-field-name="threads-color" value="31">
	                            
	                            <span class="thread_color" style="background: #ff7912">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="5f1970" name="jacket_threads[threads][color]" data-field-name="threads-color" value="32">
	                            
	                            <span class="thread_color" style="background: #5f1970">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="b8f2f2" name="jacket_threads[threads][color]" data-field-name="threads-color" value="33">
	                            
	                            <span class="thread_color" style="background: #b8f2f2">
	                            </span>
	                          </label>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="extra_field color required extra_field_holes holes" data-field-name="holes" style="visibility:hidden;" >
	                      <div class="box_title">
	                        BUTTON HOLES:
	                      </div>
	                      <div class="box_opt">
	                        <div class="box_opt_fix">
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="ffcf10" name="jacket_threads[holes][color]" data-field-name="holes-color" value="9">
	                            
	                            <span class="thread_color" style="background: #ffcf10">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="4477cf" name="jacket_threads[holes][color]" data-field-name="holes-color" value="11">
	                            
	                            <span class="thread_color" style="background: #4477cf">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="ffffff" name="jacket_threads[holes][color]" data-field-name="holes-color" value="12">
	                            
	                            <span class="thread_color" style="background: #ffffff">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="a48239" name="jacket_threads[holes][color]" data-field-name="holes-color" value="13">
	                            
	                            <span class="thread_color" style="background: #a48239">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="4d020d" name="jacket_threads[holes][color]" data-field-name="holes-color" value="14">
	                            
	                            <span class="thread_color" style="background: #4d020d">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="b3b3b3" name="jacket_threads[holes][color]" data-field-name="holes-color" value="15">
	                            
	                            <span class="thread_color" style="background: #b3b3b3">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="331b00" name="jacket_threads[holes][color]" data-field-name="holes-color" value="16">
	                            
	                            <span class="thread_color" style="background: #331b00">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="000000" name="jacket_threads[holes][color]" data-field-name="holes-color" value="17">
	                            
	                            <span class="thread_color" style="background: #000000">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="b80e58" name="jacket_threads[holes][color]" data-field-name="holes-color" value="18">
	                            
	                            <span class="thread_color" style="background: #b80e58">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="0ba133" name="jacket_threads[holes][color]" data-field-name="holes-color" value="19">
	                            
	                            <span class="thread_color" style="background: #0ba133">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="c20000" name="jacket_threads[holes][color]" data-field-name="holes-color" value="25">
	                            
	                            <span class="thread_color" style="background: #c20000">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="ff7912" name="jacket_threads[holes][color]" data-field-name="holes-color" value="31">
	                            
	                            <span class="thread_color" style="background: #ff7912">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="5f1970" name="jacket_threads[holes][color]" data-field-name="holes-color" value="32">
	                            
	                            <span class="thread_color" style="background: #5f1970">
	                            </span>
	                          </label>
	                          <label class="t4l_radio t4l_radio_color">
	                            <input type="radio" class="color" data-color="b8f2f2" name="jacket_threads[holes][color]" data-field-name="holes-color" value="33">
	                            
	                            <span class="thread_color" style="background: #b8f2f2">
	                            </span>
	                          </label>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
	          <div class="garment_render">
	            <div class="render">
	              <div class="controls">
	                <a href="javascript:;" class="icon toggle" data-icon="F" data-block="woman_jacket">
	                  <span class="h">
	                    HIDE JACKET
	                  </span>
	                  <span class="s">
	                    SHOW JACKET
	                  </span>
	                </a>
	                <a href="javascript:;" class="icon zoom in" data-icon="O">
	                  <span class="h">
	                    ZOOM
	                  </span>
	                </a>
	                <a href="javascript:;" class="icon zoom out" data-icon="P">
	                  <span class="h">
	                    ZOOM
	                  </span>
	                </a>
	                <a href="javascript:;" class="icon arrow_up disabled" data-icon="j">
	                </a>
	                <a href="javascript:;" class="icon arrow_down" data-icon="i">
	                </a>
	                
	              </div>
	              <div class="render3d resize_fix" style="margin-top: -40px;" resize_fix="margin-top: -40px; height: ">
	              </div>
	            </div>
	            <div class="render1"></div>
	          </div>
	        </div>
	        </form>
		</div>
	</div>
</div>