<div class="box-header">
  <h3>Jacket and Skirt Customizer</h3>
</div>
<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			<form method="post" action="<?php echo $adminurl;?>includes/action.php" class="garment_form skirt_suit_cust cust" id="garment_form_653">
                <input type="hidden" name="action" value="<?php echo $action;?>">
                <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
                <input type="hidden" name="type" value="skirt_suit">
                <input type="hidden" name="userid" value="<?php echo $_GET['id'];?>">
                <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
                <input type="hidden" name="p_img" value="<?php echo $homeurl.$p_img_dtl['p_img']; ?>">
                <input type="hidden" name="lining_id" value="<?php echo $lining[1];?>">
                <div id="garment_loading_653" class="garment_loading">
                    <div class="icon-loading"></div>
                </div>

                <nav class="garment_nav">
                    <div class="row">
                        <div class="col-xs-7">
                            <ul class="nav nav-tabs">
                                <li><a href="#config" class="tab">Style</a>
                                </li>
                                <li><a href="#fabric" class="tab">Fabric</a>
                                </li>
                                <li><a href="#extra" class="tab">Accents</a>
                                </li>
                            </ul>
                        
                         
                        <input type="hidden" name="garment_price">
                        <input type="hidden" name="l_jacket_lining" class="l_jacket_lining" value="<?php echo $lining_price; ?>">
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
                                <div class="config_block_title" style="display:none;">Jacket</div>
                                <div class="config_field jacket_fit">
                                    <div class="box_title">FIT(WAISTED):</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_fit" value="baggy" <?php if($jacketfit[1]=="baggy"){?> checked="checked" <?php }?>/> Classic</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_fit" value="slim" <?php if($jacketfit[1]=="slim"){?> checked="checked" <?php }
                                                elseif ($jacketfit[1]=="") {?> checked="checked" <?php }?> /> Slim fit</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_style">
                                            <div class="box_title">LOOK:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_style" value="simple" <?php if($jacketlook[1]=="simple"){?> checked="checked" <?php }
                                                elseif ($jacketlook[1]=="") {?> checked="checked" <?php }?> /> Single breasted</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_style" value="crossed" <?php if($jacketlook[1]=="crossed"){?> checked="checked" <?php }?>/> Double breasted</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_style" value="no_flaps" <?php if($jacketlook[1]=="no_flaps"){?> checked="checked" <?php }?>/> Without lapels</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_style_lapel">
                                            <div class="box_title">LAPEL STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_style_lapel_standard.jpg" alt="Notch" pagespeed_url_hash="2056271834" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_style_lapel" value="standard" <?php if($lapelstyle[1]=="standard"){?> checked="checked" <?php }?>/>Notch</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_style_lapel_peak.jpg" alt="Peak" pagespeed_url_hash="4080325040" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_style_lapel" value="peak" <?php if($lapelstyle[1]=="peak"){?> checked="checked" <?php }
                                                elseif ($lapelstyle[1]=="") {?> checked="checked" <?php }?> />Peak</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_style_lapel_round.jpg" alt="Rounded" pagespeed_url_hash="209526683" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_style_lapel" value="round" <?php if($lapelstyle[1]=="round"){?> checked="checked" <?php }?>/>Rounded</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_wide_lapel">
                                            <div class="box_title">LAPEL WIDTH:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_wide_lapel" value="standard" <?php if($lapelwidth[1]=="standard"){?> checked="checked" <?php }
                                                elseif ($lapelwidth[1]=="") {?> checked="checked" <?php }?> /> Standard</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_wide_lapel" value="width" <?php if($lapelwidth[1]=="width"){?> checked="checked" <?php }?>/> Wide</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_buttons">
                                            <div class="box_title">NUMBER OF BUTTONS:</div>
                                            <div class="clearfix"></div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_buttons" value="1" <?php if($jacketbuttons[1]=="1"){?> checked="checked" <?php }?>/> 1</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_buttons" value="2" <?php if($jacketbuttons[1]=="2"){?> checked="checked" <?php }
                                                elseif ($jacketbuttons[1]=="") {?> checked="checked" <?php }?> /> 2</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_buttons" value="3" <?php if($jacketbuttons[1]=="3"){?> checked="checked" <?php }?>/> 3</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_buttons" value="4" <?php if($jacketbuttons[1]=="4"){?> checked="checked" <?php }?>/> 4</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_buttons" value="6" <?php if($jacketbuttons[1]=="6"){?> checked="checked" <?php }?>/> 6</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_length">
                                            <div class="box_title">LENGTH:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_length" value="short" <?php if($jacketlength[1]=="short"){?> checked="checked" <?php }?>/> Short</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_length" value="long" <?php if($jacketlength[1]=="long"){?> checked="checked" <?php }
                                                elseif ($jacketlength[1]=="") {?> checked="checked" <?php }?> /> Long</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_breast_pocket">
                                            <div class="box_title">CHEST POCKET:</div>
                                            <div class="box_opt box_opt_radio mobile_layer" icon-fixed="x">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_breast_pocket" value="yes" <?php if($chestpocket[1]=="yes"){?> checked="checked" <?php }
                                                elseif ($chestpocket[1]=="") {?> checked="checked" <?php }?>/> Yes</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_breast_pocket" value="no" <?php if($chestpocket[1]=="no"){?> checked="checked" <?php }?>/> No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_hip_pockets">
                                            <div class="box_title">POCKET STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer" icon-fixed="d">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_hip_pockets_no.jpg" alt="No pockets" pagespeed_url_hash="1558099933" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="no" <?php if($pocketstyle[1]=="no"){?> checked="checked" <?php }?>/>No pockets</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_hip_pockets_with_flap.jpg" alt="With flap" pagespeed_url_hash="1801839524" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="with_flap" <?php if($pocketstyle[1]=="with_flap"){?> checked="checked" <?php }
                                                elseif ($pocketstyle[1]=="") {?> checked="checked" <?php }?> />With flap</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_hip_pockets_diagonal_flap.jpg" alt="Slanted flap" pagespeed_url_hash="1520677497" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="diagonal_flap" <?php if($pocketstyle[1]=="diagonal_flap"){?> checked="checked" <?php }?>/>Slanted flap</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_hip_pockets_double_live.jpg" alt="Double welt" pagespeed_url_hash="4197197048" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="double_live" <?php if($pocketstyle[1]=="double_live"){?> checked="checked" <?php }?>/>Double welt</label>
                                                </div>
                                                <div style="display: block; float: left;">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_hip_pockets_diagonal_double_live.jpg" alt="Slanted double welt" pagespeed_url_hash="3071816220" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="diagonal_double_live" <?php if($pocketstyle[1]=="diagonal_double_live"){?> checked="checked" <?php }?> />Slanted double welt</label>
                                                    <!--<label class="option option_image t4l_radio"><img src="images/personalize/woman_jacket/jacket_hip_pockets_patched.jpg" alt="Patched" pagespeed_url_hash="2294229033" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="patched" />Patched</label>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_sleeves">
                                            <div class="box_title">SLEEVES:</div>
                                            <div class="clearfix"></div>
                                            <div class="box_opt box_opt_image mobile_layer" icon-fixed="T">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_sleeves_no.jpg" alt="No buttons" pagespeed_url_hash="3959823775" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_sleeves" value="no" <?php if($sleeves[1]=="no"){?> checked="checked" <?php }?>/>No buttons</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_sleeves_2_buttons.jpg" alt="2 Buttons" pagespeed_url_hash="120498304" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_sleeves" value="2_buttons" <?php if($sleeves[1]=="2_buttons"){?> checked="checked" <?php }
                                                elseif ($sleeves[1]=="") {?> checked="checked" <?php }?> />2 Buttons</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_sleeves_3_buttons.jpg" alt="3 Buttons" pagespeed_url_hash="1205020273" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_sleeves" value="3_buttons" <?php if($sleeves[1]=="3_buttons"){?> checked="checked" <?php }?>/>3 Buttons</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_finishing">
                                            <div class="box_title">HEMLINE:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_finishing_open.jpg" alt="Cutaway" pagespeed_url_hash="885429228" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_finishing" value="open" <?php if($hemline[1]=="open"){?> checked <?php }?>/>Cutaway</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_finishing_straight.jpg" alt="Straight" pagespeed_url_hash="203828708" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_finishing" value="straight" <?php if($hemline[1]=="straight"){?> checked <?php }?>/>Straight</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_finishing_rounded.jpg" alt="Rounded" pagespeed_url_hash="2679673909" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_finishing" value="rounded" <?php if($hemline[1]=="rounded"){?> checked="checked" <?php }
                                                elseif ($hemline[1]=="") {?> checked="checked" <?php }?> />Rounded</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_back_style">
                                            <div class="box_title">BACK STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_back_style_uncut.jpg" alt="Ventless" pagespeed_url_hash="2229018953" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_back_style" value="uncut" <?php if($backstyle[1]=="uncut"){?> checked="checked" <?php }
                                                elseif ($backstyle[1]=="") {?> checked="checked" <?php }?> />Ventless</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_back_style_1_cut.jpg" alt="Center vent" pagespeed_url_hash="3712967136" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_back_style" value="1_cut" <?php if($backstyle[1]=="1_cut"){?> checked <?php }?>/>Center vent</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_back_style_2_cut.jpg" alt="Side vents" pagespeed_url_hash="4133529473" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_back_style" value="2_cut" <?php if($backstyle[1]=="2_cut"){?> checked <?php }?>/>Side vents</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="config_block config_block_woman_skirt" data-block="woman_skirt">
                                        <div class="config_block_title">Skirt</div>
                                        <div class="config_field skirt_style">
                                            <div class="box_title">LOOK:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_style_tube.jpg" alt="Straight" pagespeed_url_hash="547461104" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_style" value="tube" <?php if($skirtlook[1]=="tube"){?> checked="checked" <?php }
                                                                     elseif ($skirtlook[1]=="") {?> checked="checked" <?php }?>/>Straight</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_skirt/skirt_style_flight.jpg" alt="Flared" pagespeed_url_hash="1223856496" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_style" value="flight" <?php if($skirtlook[1]=="flight"){?> checked="checked" <?php }?>/>Flared</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_length">
                                            <div class="box_title">LENGTH:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_length" value="short" <?php if($skirtlength[1]=="short"){?> checked="checked" <?php }?>/> Short</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_length" value="medium" <?php if($skirtlength[1]=="medium"){?> checked="checked" <?php }
                                                                     elseif ($skirtlength[1]=="") {?> checked="checked" <?php }?> /> Medium</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_length" value="long" <?php if($skirtlength[1]=="long"){?> checked="checked" <?php }?>/> Long</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_front_closure">
                                            <div class="box_title">FASTENING:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_center_button.jpg" alt="Standard" pagespeed_url_hash="391970574" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="center_button" <?php if($skirtfast[1]=="center_button"){?> checked="checked" <?php }?>/>Standard</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_center_no_button.jpg" alt="No button" pagespeed_url_hash="2196761082" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="center_no_button" <?php if($skirtfast[1]=="center_no_button"){?> checked="checked" <?php }
                                                                     elseif ($skirtfast[1]=="") {?> checked="checked" <?php }?> />No button</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_moved_no_button.jpg" alt="Displaced: No button" pagespeed_url_hash="4111858106" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="moved_no_button" <?php if($skirtfast[1]=="moved_no_button"){?> checked="checked" <?php }?>/>Displaced: No button</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_moved_button.jpg" alt="Displaced" pagespeed_url_hash="442763854" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="moved_button" <?php if($skirtfast[1]=="moved_button"){?> checked="checked" <?php }?>/>Displaced</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_side_zipper.jpg" alt="Zipper" pagespeed_url_hash="1245208650" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="side_zipper" <?php if($skirtfast[1]=="side_zipper"){?> checked="checked" <?php }?>/>Side Zipper</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_cut">
                                            <div class="box_title">VENT:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_cut_front.jpg" alt="On the front" pagespeed_url_hash="2037846964" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="front" <?php if($skirtvent[1]=="front"){?> checked="checked" <?php }?>/>Front</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_cut_back.jpg" alt="On the back" pagespeed_url_hash="2884120262" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="back" <?php if($skirtvent[1]=="back"){?> checked="checked" <?php }?>/>Back</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_cut_uncut.jpg" alt="Ventless" pagespeed_url_hash="2082597360" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="uncut" <?php if($skirtvent[1]=="uncut"){?> checked="checked" <?php }
                                                                     elseif ($skirtvent[1]=="") {?> checked="checked" <?php }?> />Ventless</label>
                                                    <!--<label class="option option_image t4l_radio"><img src="images/personalize/woman_skirt/skirt_cut_side.jpg" alt="On the side" pagespeed_url_hash="3513832406" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="side" />On the side</label>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_belt_loops">
                                            <div class="box_title">BELT LOOPS:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_belt_loops" value="with" <?php if($beltloops[1]=="with"){?> checked="checked" <?php }?>/> With</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_belt_loops" value="without" <?php if($beltloops[1]=="without"){?> checked="checked" <?php }
                                                                     elseif ($beltloops[1]=="") {?> checked="checked" <?php }?> /> Without</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_crotch">
                                            <div class="box_title">CROTCH:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_crotch" value="low" <?php if($crotch[1]=="low"){?> checked="checked" <?php }?>/> Low</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_crotch" value="medium" <?php if($crotch[1]=="medium"){?> checked="checked" <?php }?>/> Medium</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_crotch" value="high" <?php if($crotch[1]=="high"){?> checked="checked" <?php }
                                                                     elseif ($crotch[1]=="") {?> checked="checked" <?php }?> /> High</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_belt_loops_property">
                                            <div class="box_title">WAISTBAND:</div>
                                            <div class="clearfix"></div>
                                            <div class="box_opt box_opt_checkbox mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_checkbox t4l_checkbox">
                                                        <input type='checkbox' name='skirt_belt_loops_property' value='high'  <?php if($waistband[1]=="high"){?> checked="checked" <?php }
                                                                     elseif ($waistband[1]=="") {?> checked="checked" <?php }?>>High</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_front_pocket">
                                            <div class="box_title">FRONT POCKET STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer" icon-fixed="m">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_no.jpg" alt="Without" pagespeed_url_hash="1930668920" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="no"  <?php if($skirtpocket[1]=="no"){?> checked="checked" <?php } elseif ($skirtpocket[1]=="") {?> checked="checked" <?php }?>/>Without</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_rounded.jpg" alt="Rounded" pagespeed_url_hash="1709118780" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="rounded" <?php if($skirtpocket[1]=="rounded"){?> checked="checked" <?php }?>/>Rounded</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_straight.jpg" alt="Vertical" pagespeed_url_hash="1910125689" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="straight" <?php if($skirtpocket[1]=="straight"){?> checked="checked" <?php }?>/>Vertical</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_inclined.jpg" alt="Diagonal" pagespeed_url_hash="1689083993" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="inclined" <?php if($skirtpocket[1]=="inclined"){?> checked="checked" <?php }?>/>Diagonal</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_one_living.jpg" alt="Welted" pagespeed_url_hash="2132737049" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="one_living" <?php if($skirtpocket[1]=="one_living"){?> checked="checked" <?php }?>/>Welted</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_back_pocket_type">
                                            <div class="box_title">BACK POCKET STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_back_pocket_type_one_living.jpg" alt="Welted" pagespeed_url_hash="1802625626" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_back_pocket_type" value="one_living" <?php if($skirtbackpocketnum[1]=="one_living}"){?> checked="checked" <?php }?>/>Welted</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_back_pocket_type_two_living.jpg" alt="Double welt" pagespeed_url_hash="1240359488" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_back_pocket_type" value="two_living" <?php if($skirtbackpocket[1]=="two_living}"){?> checked="checked" <?php }?>/>Double welt</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_back_pocket_type_button.jpg" alt="Double welted with button" pagespeed_url_hash="2915032726" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_back_pocket_type" value="button" <?php if($skirtbackpocketnum[1]=="button}"){?> checked="checked" <?php } elseif ($skirtbackpocketnum[1]=="") {?> checked="checked" <?php }?> />Welted with button</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_back_pocket_num">
                                            <div class="box_title">BACK POCKETS:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_back_pocket_num" value="0" <?php if($skirtbackpocket[1]=="0"){?> checked="checked" <?php }?>/> No Pockets</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_back_pocket_num" value="1" <?php if($skirtbackpocket[1]=="1"){?> checked="checked" <?php } elseif ($skirtbackpocket[1]=="") {?> checked="checked" <?php }?> /> 1 Pocket</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_back_pocket_num" value="2" <?php if($skirtbackpocket[1]=="2"){?> checked="checked" <?php }?>/> 2 Pockets</label>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                         <div class="garment_block garment_block_fabric <?php if($fab_name1!='' || $fab_name1!='') { ?> multi_enabled <?php } ?>">
                         
                         <div class="step_block_selector_enable fabric_block_selector_enable">
                              <label class="">
                                <input type="checkbox" class="multiple_fabric" name="multiple_fabric" <?php if($fab_name1!='' || $fab_name1!='') { ?> checked <?php } ?>> Select a different fabric for each garment
                              </label>
                        </div>

                         <div class="row step_block_selector fabric_block_selector" style="<?php if($fab_name1!='' || $fab_name2!='') { ?> display:block <?php } else { ?> display: none <?php } ?>">
                              <div class="col-md-3">
                                <a href="#fabric_block_woman_jacket" class="selector woman_jacket current">
                                  <span>Jacket</span>
                                </a>
                              </div>
                              <div class="col-md-3">
                                <a href="#fabric_block_woman_skirt"  class="selector woman_skirt">
                                  <span>Skirt</span>
                                </a>
                              </div>
                         </div>

                            
                            
                            <div class="fabric_block fabric_block_woman_jacket" data-block-name="woman_jacket" data-block-name1="woman_jacket1">
                                <div class="fabric_block_title">Jacket</div>
                                    <div class="fabric_preview fabric_preview_woman_jacket" style="display:block;">
                                       <div class="infobar" style="width:650px;">
                                            <span class="title fabric_main_title"><?php echo $fab_title;?></span>
                                            <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc); ?></span>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img style="width:650px;" src="<?php echo $homeurl.$fab_img;?>" class="fabric_main_image"></a>
                                    </div>
                                    <input type="hidden" name="f_woman_jacket" class="f_woman_jacket" value="<?php echo $fab_price; ?>">
                                    <input type="hidden" class="fabric_input required" name="woman_jacket" data-block-name="woman_jacket" value="<?php echo $_SESSION['fabID']; ?>" />
                                    <div class="fabric_filters">
                                        <input type="hidden" name="fabric_block" value="woman_jacket" />
                                    </div>
                                    <div class="fabric_list loaded">
                                     <?php $fab=$site->get_fabrics1('',$fabric_list);
                                            //print_r($fab);
                                            foreach ($fab as $key => $value) {
                                            ?>
                                        <div class="fabric_thumb woman_jacket fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid){?> current <?php }?>">
                                            <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
                                                <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img']; ?>" alt="<?php echo $fab[$key]['fab_name'];?>">
                                            </a>
                                            <div class="price price_total">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                            <div class="price price_part woman_jacket" style="display:none;">+<?php echo number_format($fab[$key]['fab_price']/1.5,2);?>$</div>
                                            <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                            <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
                                            <input type="hidden" name="f_prod_img" class="f_prod_img" value="<?php echo $homeurl.$fab[$key]['default_img']; ?>">
                                        </div>
                                        <?php }?>
                                       <!-- <div class="fabric_thumb fabric_862">
                                            <a href="javascript:void(0);" class="select " rel="862">
                                                <img class="b-lazy b-loaded" src="<?php echo $homeurl; ?>assets/dimg/fabric/suit/862_normal.jpg" alt="Tasmania">
                                            </a>
                                            <div class="price price_part">+9$</div>
                                            <div class="price price_total">+15$</div>
                                            <div class="title fabric_title">Tasmania</div>
                                            <div class="composition">Velvet</div>
                                        </div>-->
                                    </div>
                                </div>

                            <div class="fabric_block fabric_block_woman_skirt" data-block-name="woman_skirt">
                                <div class="fabric_block_title">Skirt</div>
                                    <div class="fabric_preview fabric_preview_woman_skirt" style="display:block;">
                                       <div class="infobar" style="width:650px;">
                                            <span class="title fabric_main_title"><?php echo $fab_title;?></span>
                                            <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc); ?></span>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img style="width:650px;" src="<?php echo $homeurl.$fab_img;?>" class="fabric_main_image"></a>
                                    </div>
                                    <input type="hidden" name="f_woman_skirt" class="f_woman_skirt" value="<?php echo $fab_price1; ?>">
                                    <input type="hidden" class="fabric_input required" name="woman_skirt" data-block-name="woman_skirt" value="<?php echo $_SESSION['fabID']; ?>" />
                                    <div class="fabric_filters">
                                        <input type="hidden" name="fabric_block" value="woman_skirt" />
                                    </div>
                                    <div class="fabric_list loaded">
                                     <?php $fab=$site->get_fabrics('',$fabric_list);
                                            //print_r($fab);
                                            foreach ($fab as $key => $value) {
                                            ?>
                                        <div class="fabric_thumb woman_skirt fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid1){?> current <?php }?>">
                                            <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
                                                <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img']; ?>" alt="<?php echo $fab[$key]['fab_name'];?>">
                                            </a>
                                            <div class="price price_total">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                            <div class="price price_part woman_skirt" style="display:none;">+<?php echo number_format($fab[$key]['fab_price']/3,2);?>$</div>
                                            <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                            <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
                                            <input type="hidden" name="f_prod_img" class="f_prod_img" value="<?php echo $homeurl.$fab[$key]['default_img']; ?>">
                                        </div>
                                        <?php }?>
                                       <!-- <div class="fabric_thumb fabric_862">
                                            <a href="javascript:void(0);" class="select " rel="862">
                                                <img class="b-lazy b-loaded" src="<?php echo $homeurl; ?>assets/dimg/fabric/suit/862_normal.jpg" alt="Tasmania">
                                            </a>
                                            <div class="price price_total">+9$</div>
                                            <div class="price price_total">+15$</div>
                                            <div class="title fabric_title">Tasmania</div>
                                            <div class="composition">Velvet</div>
                                        </div>-->
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
                                          <div class="fabric_thumb lining_thumb lining_121 <?php if($lining[1]=="121"){?> current <?php }?>"" value="121">
                                            <a href="javascript:void(0);" data-id="121" class="extra_select">
                                             <img class="b-lazy image b-loaded" src="<?php echo $homeurl; ?>assets/dimg/lining/default/121_normal.jpg" alt="">
                                            </a>
                                            <div class="price">9.95$</div>
                                            <div class="title">Paris</div>
                                         </div>
                                         <div class="fabric_thumb lining_thumb lining_96 <?php if($lining[1]=="96"){?> current <?php }?>"" value="96">
                                           <a href="javascript:void(0);" data-id="96" class="extra_select">
                                             <img class="b-lazy image b-loaded" src="<?php echo $homeurl; ?>assets/dimg/lining/default/96_normal.jpg" alt="">
                                           </a>
                                           <div class="price">14.95$</div>
                                           <div class="title">Cergy</div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="extra_container jacket_initials extra_container_initials" data-extra-name="jacket_initials" data-extra-type="initials" info-icon="J"><a href="javascript:void(0);" class="discard">Delete</a>
                                    <div class="extra_title">Add monogram</div>
                                    <div class="extra_content">
                                        <input type="hidden" class="initials_price" name="initials_price" value="9.95">
                                        <input type="hidden" name="title_price1" class="title_price1 title_price2" value="<?php echo $lining_price1; ?>">
                                        <div class="extra_field extra_field_initials_text required">
                                            <div class="box_title">WRITE HERE:</div>
                                            <div class="box_opt">
                                                <div class="box_opt_fix">
                                                    <input type="text" value="<?php echo $text[1]; ?>" name="initials_text" class="text initials_text" placeholder="Type your initials" maxlength="10">
                                                    <span class="extra_price">(+ 9.95$ )</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_field extra_field_initials_fonts required">
                                            <div class="box_title">FONT:</div>
                                            <div class="box_opt">
                                                <div class="box_opt_fix">
                                                    <label class="t4l_radio garamond">
                                                        <input type="radio" class="font" name="initials_font" <?php if($font[1]=="garamond"){?> checked <?php }?> value="garamond"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/garamond.png" alt="Garamond" pagespeed_url_hash="2694130881" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                    </label>
                                                    <label class="t4l_radio harrington">
                                                        <input type="radio" class="font" name="initials_font" <?php if($font[1]=="harrington"){?> checked <?php }?> value="harrington"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/harrington.png" alt="Harrington" pagespeed_url_hash="3894416190" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                    </label>
                                                    <label class="t4l_radio times">
                                                        <input type="radio" class="font" name="initials_font" <?php if($font[1]=="times"){?> checked <?php }?> value="times"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/times.png" alt="Times new Roman" pagespeed_url_hash="500874088" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                    </label>
                                                    <label class="t4l_radio arial"> 
                                                        <input type="radio" class="font" name="initials_font" <?php if($font[1]=="arial"){?> checked <?php }?> value="arial"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/arial.png" alt="Arial" pagespeed_url_hash="946517873" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_field extra_field_initials_color required">
                                            <div class="box_title">INITIALS COLOR:</div>
                                            <div class="box_opt">
                                                <div class="box_opt_fix">
                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ffcf10"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="ffcf10"){?> checked <?php }?> type="radio" class="color" data-color="ffcf10" name="initials_color" value="ffcf10"> <span class="thread_color" style="background: #ffcf10"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="4477cf"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="4477cf"){?> checked <?php }?> type="radio" class="color" data-color="4477cf" name="initials_color" value="4477cf"> <span class="thread_color" style="background: #4477cf"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="ffffff"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="ffffff"){?> checked <?php }?> type="radio" class="color" data-color="ffffff" name="initials_color" value="ffffff"> <span class="thread_color" style="background: #ffffff"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="a48239"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="a48239"){?> checked <?php }?> type="radio" class="color" data-color="a48239" name="initials_color" value="a48239"> <span class="thread_color" style="background: #a48239"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="4d020d"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="4d020d"){?> checked <?php }?> type="radio" class="color" data-color="4d020d" name="initials_color" value="4d020d"> <span class="thread_color" style="background: #4d020d"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b3b3b3"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="b3b3b3"){?> checked <?php }?> type="radio" class="color" data-color="b3b3b3" name="initials_color" value="b3b3b3"> <span class="thread_color" style="background: #b3b3b3"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="331b00"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="331b00"){?> checked <?php }?> type="radio" class="color" data-color="331b00" name="initials_color" value="331b00"> <span class="thread_color" style="background: #331b00"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="000000"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="000000"){?> checked <?php }?> type="radio" class="color" data-color="000000" name="initials_color" value="000000"> <span class="thread_color" style="background: #000000"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b80e58"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="b80e58"){?> checked <?php }?> type="radio" class="color" data-color="b80e58" name="initials_color" value="b80e58"> <span class="thread_color" style="background: #b80e58"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="0ba133"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="0ba133"){?> checked <?php }?> type="radio" class="color" data-color="0ba133" name="initials_color" value="0ba133"> <span class="thread_color" style="background: #0ba133"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="c20000"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="c20000"){?> checked <?php }?> type="radio" class="color" data-color="c20000" name="initials_color" value="c20000"> <span class="thread_color" style="background: #c20000"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="ff7912"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="ff7912"){?> checked <?php }?> type="radio" class="color" data-color="ff7912" name="initials_color" value="ff7912"> <span class="thread_color" style="background: #ff7912"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="5f1970"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="5f1970"){?> checked <?php }?> type="radio" class="color" data-color="5f1970" name="initials_color" value="5f1970"> <span class="thread_color" style="background: #5f1970"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b8f2f2"){?> checked1 <?php }?>">
                                                        <input <?php if($color[1]=="b8f2f2"){?> checked <?php }?> type="radio" class="color" data-color="b8f2f2" name="initials_color" value="b8f2f2"> <span class="thread_color" style="background: #b8f2f2"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="extra_container jacket_neck extra_container_colors" data-extra-name="jacket_neck" data-extra-type="colors" info-icon="o" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                    <div class="extra_title">Neck lining</div>
                                    <div class="extra_content">
                                        <div class="extra_field required extra_field_image contrast" data-field-name="contrast">
                                            <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABBAEEDASIAAhEBAxEB/8QAGwABAAMBAQEBAAAAAAAAAAAAAAQFBgMCBwj/xAA4EAACAQQBAgQCBwUJAAAAAAABAgMABAURBhIhBxMxURVBFBYiMmFxgRdCQ5GhI0RygpKVorHT/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AP2XSlKBSlKBSlQM7lbXDY/6delhF50MH2db6pZVjX1IH3nFBPpSlApSlBBz+PTLYLIYuRyiXltJbswOiA6ld/1qm8KMxJn/AA045mJzue5x0LTHWtyBAGI/DqBrT18i49yTIeHnA8bxnIcYyc2TsWFjEylTDfPskNCwJZy42QgXa9+rpUFgG98P85Ln+NpdXSCO+t55rK9QDQWeGRo5NDv2JUsO57EV05Ny7jPGiiZzN2VlNINxQPJuaX/BGNu/+UGsTxThnMJ1ypyeZfjWLyeSmyJx2McNeAylSyyXXog2CSIlB+12kNbTjPDuMcblluMNhrW2upiTNdkGS4lJ9euV9u36k0FGvidi5iTZ8a5rdxD0lj45dKjDetgui7rP+K/JrzPeH2Tx+K4dy9rqQRvD1YlgC8ciSa1vq79Ot6/WvrVKDJL4gYCLXxaLLYNT/EyeNmt4R+cxXyx+rVqbeaK4gjnglSWGRQ8ciMGV1I2CCOxBHzqByy4Wz4rlrtm6VgsZpCfYKhO/6VA8MUEfhtxhAAAuHtBoDX8FKDRUpSgVl4bOO68ULu+uIVl+H4m3jtHY78p5ZZ/O6R8iVjh2fmAK4+LWSydhxNIMJdNa5TJ39rjraZVDNGZplV3AbttY/MYb+a168PLHJ2c+d+MZM5S7W+WBbpoFiaSJIYyvUq9urbNsjQPqAN6oNPc3EFtF5txMkSb11O2hv2/OoEt3k7k9ONsliQ/3i92oA91jH2m/Jin4E1Q8o53xfHZP4XDf/T86qnpssbate3arsA/YTfl+o7voe9U7S87zDMw4DZC36x0/WLODqdfcwW8csan0133/AFoNBc3tmsjJec+it5gdPHA9rGoPsFdWYf6ia4ibjbt1tm8zeFv3obu5I/lFoVzgbxKjjEUGG4ZZxIQI40yFw4C+3aBdfy/77e5P2nsf7McOi7fvG5fv/wAaD3cQcdu7Sa0kPJZYZ0ZHHVkGBUgg+uxr1rj4KXjTeHWNxtw0n07Cr8KvFkUq4kgAQFg3cdShHG/k4qXB+0MO/n/VZ1P3QnnqR2+e97769qhwxcnxWdmztzhrCaG5hEeQjxtyzyyFCPLmVHRdlVLhgGLMOnQJUAhtaVQfW/C+2U/2m6/86UGO5Tym25JyHj6cSxl9yqPGXkl7JNYdK2gkELxIrXLkRkblZiELMOgdqshwrOcgkkuOZchmjhnPVJicJI9rbka10ySgiWU6ABIKA6+7qt4iKiBEUKqjQAGgK9UFXxvj2C43YCwwGIssZbfOO2hCBj7nXqfxOzVpSlApSlApSlApSlApSlApSlApSlApSlApSlB//9k=" alt="By default" pagespeed_url_hash="4166946281" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_neck[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                    </label>
                                                    <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABBAEEDASIAAhEBAxEB/8QAHAABAAICAwEAAAAAAAAAAAAAAAQGBQcBAgMI/8QAOBAAAQMDAgQEAQgLAAAAAAAAAQIDEQAEBQYhBxIxQRMiUWGBFBUWMlJxgpEjM0JTVnKSlKGx0f/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APsulKUClKUClKguZW0Rn2cIVKN29auXSQIgNoWhJneeqxG3Y/EJ1KUoFKUoKXxQuFY650llkLKSxqG3YUnstNyldsQfuLwV+GspxBzjumtLvZ1CApmzeZcuhEkW/ioDyhuN0oKlfCofFTF5DJ6at1Yy1N5cY/J2eR+SpcCFXCWH0OlCVHYKITtJAkAEiZqm8R9XXOp8LlNFY/S18XspjnGHVXribc2viIIStwDm5QOsHzGNk8srAbeqpZjiNo7G3Tln87DIXragldrjWV3jqFEwApLQVyH+aKpz2HyGcYDesc5cZNooCDYWnNbWcQAQpAJW7Jj9YpQ6QkExWZx1vj8baC1x9oxaW43DbDaUI6dYG3SfhPaSuUSm+J2McTzo05q0pIkFWHcTtE9FQelV7J6qdd4p4HOt6Y1Kiztsde2VyVWAJSXXGFIUOVRkSyue4jpNWLxgPMSuZ2336/n1HtuOxBKOvjA/a/x7e33dvTb6qSozWG1rpzKXiLFq/VbXrhhFresOWrqzEwlLqUle2/lmrFWrcw6HNQ6VaHMSrMoJBBI2aeM7bde5J3mJMlW0qoUpSgVq3S1vONVfcpDuQfcvHFE8yl+IsqSSR18vIB1iB1hIEjiDk9Tva2dx+nsy5jmcLgXMtcITaoeTcvKcKWWnArcoKWntklJmDOwqXice1itO2bFxcNJbtbVttbq1AJhKAJk7R19t/QnmDzedbaV4Zc5llMhtKeZREHePTrudveJKo7xyBbU846xj2Ykqd87gM7zuEpI+9W/oQeTFHUttk3nW9HWmQ1E6kq51YtlKWC5MQq5dIaHrsoq2HeIlsYHXTyxc/RbTTKoHJ8tzTrjyI2A5hbqA27AxPtFSDq4/YKV+k1OpY+wh1odz9hIPQAfhG2wB6j5qIMXmTcPcpcuDP1vQx3V3+PUnKN4biGoguW2lkDuE3twuOvctCev++smeUYHiCTK3dLp9gXzB23mB3Ht29BCCsanXa2LFhnGRk3DiMgzeKDjdwoeGlQS9uoQD4ZXvt6HrA3Qy428yh5lxLja0hSFpMhQIkEHuKoowWs/CAcGnnDEEBx1KTtv1QY7+v5SKmaaub3S9izh89ZtW1g2SizvLZwu27Lf7LThKUlvlGwURywEgq5utFxpXTxmf3qP6hSg1bhshqXM6m1DldL6dft28obdhjK5ppTNum3abMKTbkh5xRWt0gEISQUnm7VmbHhhh3i09qu9u9UPN7oavSE2bZiPJbJhERt5+c+9XylB527LNuwhi3abZaQIQhtISlI9AB0r0pSgUpSgVwpKVJKVAKSRBBGxFc0oK59BNF/wphf7NH/KVY6UClKUClKUClKUClKUClKUH/9k=" alt="Custom color" pagespeed_url_hash="3210468751" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_neck[contrast]" value="custom" data-field-name="contrast" data-price="3.95"><span class="name">Custom color</span><span class="price">+3,95€</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_field required extra_field_neck_lining color" data-field-name="color">
                                            <input type="hidden" name="jacket_neck[color]" value="">
                                            <div class="fabric_thumb thread_thumb " data-id="2"><a href="javascript:;"><span class="image" style="background: #d89f6b"></span></a>
                                            </div>
                                            <div class="fabric_thumb thread_thumb " data-id="3"><a href="javascript:;"><span class="image" style="background: #ea1c1e"></span></a>
                                            </div>
                                            <div class="fabric_thumb thread_thumb " data-id="5"><a href="javascript:;"><span class="image" style="background: #b2a995"></span></a>
                                            </div>
                                            <div class="fabric_thumb thread_thumb " data-id="4"><a href="javascript:;"><span class="image" style="background: #212534"></span></a>
                                            </div>
                                            <div class="fabric_thumb thread_thumb " data-id="6"><a href="javascript:;"><span class="image" style="background: #34322c"></span></a>
                                            </div>
                                            <div class="fabric_thumb thread_thumb " data-id="1"><a href="javascript:;"><span class="image" style="background: #e7e7e7"></span></a>
                                            </div>
                                            <div class="fabric_thumb thread_thumb " data-id="7"><a href="javascript:;"><span class="image" style="background: #1f1f1f"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="extra_container jacket_patches extra_container_colors" data-extra-name="jacket_patches" data-extra-type="colors" info-icon="q" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                    <div class="extra_title">Add elbow patches </div>
                                    <div class="extra_content">
                                        <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
                                            <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_patches[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                    </label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_patches[contrast]" value="custom" data-field-name="contrast" data-price="12.95"><span class="name">Custom color</span><span class="price">+12,95€</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_field required extra_field_patches color" data-field-name="color">
                                            <input type="hidden" name="jacket_patches[color]" value="">
                                            <div class="fabric_thumb patch_thumb " data-id="55"><a href="javascript:;"><span class="image" style="background:url(<?php echo $homeurl; ?>assets//dimg/patches/default/x55_thumb.jpg.pagespeed.ic.b_t9mMJkHE.jpg)"></span></a>
                                                <div class="title">Black</div>
                                            </div>
                                            <div class="fabric_thumb patch_thumb " data-id="56"><a href="javascript:;"><span class="image" style="background:url(<?php echo $homeurl; ?>assets//dimg/patches/default/x56_thumb.jpg.pagespeed.ic.wqJfpJ01vZ.jpg)"></span></a>
                                                <div class="title">Brown</div>
                                            </div>
                                            <div class="fabric_thumb patch_thumb " data-id="57"><a href="javascript:;"><span class="image" style="background:url(<?php echo $homeurl; ?>assets//dimg/patches/default/x57_thumb.jpg.pagespeed.ic.Kgy_HNRBZQ.jpg)"></span></a>
                                                <div class="title">Beige</div>
                                            </div>
                                            <div class="fabric_thumb patch_thumb " data-id="58"><a href="javascript:;"><span class="image" style="background:url(<?php echo $homeurl; ?>assets//dimg/patches/default/x58_thumb.jpg.pagespeed.ic.vRTOnEEYcZ.jpg)"></span></a>
                                                <div class="title">Brown-Grey</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="extra_container jacket_metal_button extra_container_colors" data-extra-name="jacket_metal_button" data-extra-type="colors" info-icon="N" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                    <div class="extra_title">Type of Buttons</div>
                                    <div class="extra_content">
                                        <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
                                            <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_metal_button[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                    </label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_metal_button[contrast]" value="custom" data-field-name="contrast" data-price="10.9"><span class="name">Custom color</span><span class="price">+10,9€</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_field required extra_field_metal_button type" data-field-name="type">
                                            <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio metal_b"><img src="/images/personalize/jacket_metal_button/type/x50.jpg.pagespeed.ic.1l33fuohZ_.jpg" alt="Custom color" pagespeed_url_hash="613382272" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_metal_button[type]" value="50" data-field-name="type" data-price="10.9">
                                                    </label>
                                                    <label class="option option_image t4l_radio metal_b"><img src="data:image/jpeg;base64,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" alt="Custom color" pagespeed_url_hash="907882193" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_metal_button[type]" value="51" data-field-name="type" data-price="10.9">
                                                    </label>
                                                    <label class="option option_image t4l_radio metal_b"><img src="data:image/jpeg;base64,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" alt="Custom color" pagespeed_url_hash="1202382114" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_metal_button[type]" value="52" data-field-name="type" data-price="10.9">
                                                    </label>
                                                    <label class="option option_image t4l_radio metal_b"><img src="data:image/jpeg;base64,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" alt="Custom color" pagespeed_url_hash="1496882035" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_metal_button[type]" value="53" data-field-name="type" data-price="10.9">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="extra_container jacket_threads extra_container_threads" data-extra-name="jacket_threads" data-extra-type="threads" info-icon="V" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                    <div class="extra_title">Add colored button threads</div>
                                    <div class="extra_content">
                                        <div class="extra_field extra_field_radio contrast" data-field-name="contrast">
                                            <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_threads[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                    </label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_threads[contrast]" value="all" data-field-name="contrast" data-price="4.5"><span class="name">All</span><span class="price"> (+4,5€)</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_field color required extra_field_threads threads" data-field-name="threads">
                                            <div class="box_title">BUTTON THREADS:</div>
                                            <div class="box_opt">
                                                <div class="box_opt_fix">
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="ffcf10" name="jacket_threads[threads][color]" data-field-name="threads-color" value="9"> <span class="thread_color" style="background: #ffcf10"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="4477cf" name="jacket_threads[threads][color]" data-field-name="threads-color" value="11"> <span class="thread_color" style="background: #4477cf"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="ffffff" name="jacket_threads[threads][color]" data-field-name="threads-color" value="12"> <span class="thread_color" style="background: #ffffff"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="a48239" name="jacket_threads[threads][color]" data-field-name="threads-color" value="13"> <span class="thread_color" style="background: #a48239"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="4d020d" name="jacket_threads[threads][color]" data-field-name="threads-color" value="14"> <span class="thread_color" style="background: #4d020d"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="b3b3b3" name="jacket_threads[threads][color]" data-field-name="threads-color" value="15"> <span class="thread_color" style="background: #b3b3b3"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="331b00" name="jacket_threads[threads][color]" data-field-name="threads-color" value="16"> <span class="thread_color" style="background: #331b00"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="000000" name="jacket_threads[threads][color]" data-field-name="threads-color" value="17"> <span class="thread_color" style="background: #000000"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="b80e58" name="jacket_threads[threads][color]" data-field-name="threads-color" value="18"> <span class="thread_color" style="background: #b80e58"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="0ba133" name="jacket_threads[threads][color]" data-field-name="threads-color" value="19"> <span class="thread_color" style="background: #0ba133"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="c20000" name="jacket_threads[threads][color]" data-field-name="threads-color" value="25"> <span class="thread_color" style="background: #c20000"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="ff7912" name="jacket_threads[threads][color]" data-field-name="threads-color" value="31"> <span class="thread_color" style="background: #ff7912"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="5f1970" name="jacket_threads[threads][color]" data-field-name="threads-color" value="32"> <span class="thread_color" style="background: #5f1970"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="b8f2f2" name="jacket_threads[threads][color]" data-field-name="threads-color" value="33"> <span class="thread_color" style="background: #b8f2f2"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_field color required extra_field_holes holes" data-field-name="holes">
                                            <div class="box_title">BUTTON HOLES:</div>
                                            <div class="box_opt">
                                                <div class="box_opt_fix">
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="ffcf10" name="jacket_threads[holes][color]" data-field-name="holes-color" value="9"> <span class="thread_color" style="background: #ffcf10"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="4477cf" name="jacket_threads[holes][color]" data-field-name="holes-color" value="11"> <span class="thread_color" style="background: #4477cf"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="ffffff" name="jacket_threads[holes][color]" data-field-name="holes-color" value="12"> <span class="thread_color" style="background: #ffffff"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="a48239" name="jacket_threads[holes][color]" data-field-name="holes-color" value="13"> <span class="thread_color" style="background: #a48239"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="4d020d" name="jacket_threads[holes][color]" data-field-name="holes-color" value="14"> <span class="thread_color" style="background: #4d020d"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="b3b3b3" name="jacket_threads[holes][color]" data-field-name="holes-color" value="15"> <span class="thread_color" style="background: #b3b3b3"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="331b00" name="jacket_threads[holes][color]" data-field-name="holes-color" value="16"> <span class="thread_color" style="background: #331b00"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="000000" name="jacket_threads[holes][color]" data-field-name="holes-color" value="17"> <span class="thread_color" style="background: #000000"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="b80e58" name="jacket_threads[holes][color]" data-field-name="holes-color" value="18"> <span class="thread_color" style="background: #b80e58"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="0ba133" name="jacket_threads[holes][color]" data-field-name="holes-color" value="19"> <span class="thread_color" style="background: #0ba133"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="c20000" name="jacket_threads[holes][color]" data-field-name="holes-color" value="25"> <span class="thread_color" style="background: #c20000"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="ff7912" name="jacket_threads[holes][color]" data-field-name="holes-color" value="31"> <span class="thread_color" style="background: #ff7912"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="5f1970" name="jacket_threads[holes][color]" data-field-name="holes-color" value="32"> <span class="thread_color" style="background: #5f1970"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color">
                                                        <input type="radio" class="color" data-color="b8f2f2" name="jacket_threads[holes][color]" data-field-name="holes-color" value="33"> <span class="thread_color" style="background: #b8f2f2"></span>
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
                            <div class="controls"><a href="javascript:;" class="icon toggle" data-icon="G" data-block="woman_jacket"><span class="h">HIDE JACKET</span><span class="s">SHOW JACKET</span></a><a href="javascript:;" class="icon zoom in" data-icon="O"><span class="h">ZOOM</span></a><a href="javascript:;" class="icon zoom out" data-icon="P"><span class="h">ZOOM</span></a>
                                <a href="javascript:;" class="icon arrow_up disabled" data-icon="j"></a>
                                <a href="javascript:;" class="icon arrow_down" data-icon="i"></a>
                            </div>
                            <div class="render3d resize_fix" style="margin-top: -40px;" resize_fix="margin-top: -40px; height: "></div>
                        </div>
                        <div class="render1"></div>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>