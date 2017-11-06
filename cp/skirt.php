<div class="box-header">
  <h3>Skirt Customizer</h3>
</div>
<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			<form method="post" class="garment_form skirt_cust cust" action="<?php echo $adminurl;?>includes/action.php" id="garment_form_454">
                    <input type="hidden" name="action" value="<?php echo $action;?>">
                    <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                    <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
                    <input type="hidden" name="userid" value="<?php echo $_GET['id'];?>">
                    <input type="hidden" name="type" value="skirt">
                    <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
                     <input type="hidden" name="p_img" value="<?php echo $homeurl.$p_img_dtl['p_img']; ?>">
                        <div id="garment_loading_454" class="garment_loading">
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
                                    </ul>

                                <div class="c-nav cf">
                                    <input type="hidden" name="garment_price">
                                    <input type="hidden" name="f_woman_skirt" class="f_woman_skirt" value="<?php echo $fab_price; ?>">
                                    <a href="javascript:;" class="step_next btn btn-primary pull-right">NEXT STEP</a>
                                    <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
                                    <span  class="garment_price btn btn-danger pull-right">$<?php echo $price;?></span>
                                </div>

                                </div>
                                
                            </div>
                        </nav>

                        <div class="garment_container" style="min-height: 750px">
                            <div class="garment_blocks">
                                <div class="garment_block garment_block_config">
                                    <div class="config_block config_block_woman_skirt" data-block="woman_skirt">
                                        <div class="config_block_title"></div>
                                        <div class="config_field skirt_style">
                                            <div class="box_title">LOOK:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_style_tube.jpg" alt="Straight" pagespeed_url_hash="547461104" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_style" value="tube" 
                                                         <?php if($look[1]=="tube"){?> checked="checked" <?php }
                                                                 elseif ($look[1]=="") {?> checked="checked" <?php }?> />Straight</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_style_flight.jpg" alt="Flared" pagespeed_url_hash="1223856496" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_style" value="flight" 
                                                         <?php if($look[1]=="flight"){?> checked="checked" <?php }?>/>Flared</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_length">
                                            <div class="box_title">LENGTH:</div>
                                            <div class="clearfix"></div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_length" value="short" 
                                                         <?php if($length[1]=="short"){?> checked="checked" <?php }?>/> Short</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_length" value="medium"
                                                        <?php if($length[1]=="medium"){?> checked="checked" <?php }
                                                                 elseif ($length[1]=="") {?> checked="checked" <?php }?> /> Medium</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_length" value="long" 
                                                         <?php if($length[1]=="long"){?> checked="checked" <?php }?> /> Long</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_front_closure">
                                            <div class="box_title">FASTENING:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_center_button.jpg" alt="Standard" pagespeed_url_hash="391970574" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="center_button" <?php if($length[1]=="center_button"){?> checked="checked" <?php }?>  />Standard</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_center_no_button.jpg" alt="No button" pagespeed_url_hash="2196761082" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="center_no_button" 
                                                    <?php if($fastening[1]=="center_no_button"){?> checked="checked" <?php }
                                                                 elseif ($fastening[1]=="") {?> checked="checked" <?php }?>/>No button</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_moved_no_button.jpg" alt="Displaced: No button" pagespeed_url_hash="4111858106" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="moved_no_button" <?php if($fastening[1]=="moved_no_button"){?> checked="checked" <?php }?>  />Displaced: No button</label>
                                                    
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_moved_button.jpg" alt="Displaced" pagespeed_url_hash="442763854" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="moved_button" <?php if($fastening[1]=="moved_button"){?> checked="checked" <?php }?>  />Displaced</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_side_zipper.jpg" alt="Zipper" pagespeed_url_hash="1245208650" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="side_zipper" <?php if($fastening[1]=="side_zipper"){?> checked="checked" <?php }?>  />Side Zipper</label>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="config_field skirt_cut">
                                            <div class="box_title">VENT:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_cut_front.jpg" alt="On the front" pagespeed_url_hash="2037846964" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="front" <?php if($vent[1]=="front"){?> checked="checked" <?php }?> />Front</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_cut_back.jpg" alt="On the back" pagespeed_url_hash="2884120262" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="back" <?php if($vent[1]=="back"){?> checked="checked" <?php }?>/>Back</label>
                                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_cut_uncut.jpg" alt="Ventless" pagespeed_url_hash="2082597360" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="uncut" <?php if($vent[1]=="uncut"){?> checked="checked" <?php }
                                                                 elseif ($vent[1]=="") {?> checked="checked" <?php }?> />Ventless</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_belt_loops">
                                            <div class="box_title">BELT LOOPS:</div>
                                            <div class="clearfix"></div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_belt_loops" value="with" <?php if($beltloops[1]=="with"){?> checked="checked" <?php }?> /> With</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_belt_loops" value="without"  <?php if($beltloops[1]=="without"){?> checked="checked" <?php }
                                                                 elseif ($beltloops[1]=="") {?> checked="checked" <?php }?>/> Without</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_crotch">
                                            <div class="box_title">CROTCH:</div>
                                            <div class="clearfix"></div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_crotch" value="low" <?php if($crotch[1]=="low"){?> checked="checked" <?php }?> /> Low</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_crotch" value="medium" <?php if($crotch[1]=="medium"){?> checked="checked" <?php }?> /> Medium</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_crotch" value="high" <?php if($crotch[1]=="high"){?> checked="checked" <?php }
                                                                 elseif ($crotch[1]=="") {?> checked="checked" <?php }?> /> High</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_front_pocket">
                                            <div class="box_title">FRONT POCKET STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer" icon-fixed="m">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_no.jpg" alt="Without" pagespeed_url_hash="1930668920" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="no" checked="checked" />Without</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_inclined.jpg" alt="Diagonal" pagespeed_url_hash="1689083993" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="inclined" />Diagonal</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_rounded.jpg" alt="Rounded" pagespeed_url_hash="1709118780" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="rounded" />Rounded</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_straight.jpg" alt="Vertical" pagespeed_url_hash="1910125689" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="straight" />Vertical</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_one_living.jpg" alt="Welted" pagespeed_url_hash="2132737049" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="one_living" />Welted</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="config_field skirt_back_pocket_num">
                                            <div class="box_title">BACK POCKETS:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_back_pocket_num" value="0" /> No Pockets</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_back_pocket_num" value="1" checked="checked" /> 1 Pocket</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_back_pocket_num" value="2" /> 2 Pockets</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_back_pocket_type">
                                            <div class="box_title">BACK POCKET STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_back_pocket_type_one_living.jpg" alt="Welted" pagespeed_url_hash="1802625626" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_back_pocket_type" value="one_living" />Welted</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_back_pocket_type_two_living.jpg" alt="Double welt" pagespeed_url_hash="1240359488" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_back_pocket_type" value="two_living" />Double welted</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_back_pocket_type_button.jpg" alt="Double welted with button" pagespeed_url_hash="2915032726" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_back_pocket_type" value="button" checked="checked" />Welted with button</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="garment_block garment_block_fabric">
                                <div class="fabric_block fabric_block_woman_skirt" data-block-name="woman_skirt">
                                    <div class="fabric_block_title">woman_skirt</div>
                                        <div class="fabric_preview fabric_preview_woman_skirt" style="display:block;">
                                           <div class="infobar">
                                                <span class="title fabric_main_title"><?php echo $fab_title;?></span>
                                                <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo $fab_desc; ?></span>
                                            </div>
                                            <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img src="<?php echo $homeurl.$fab_img; ?>" class="fabric_main_image" style="width:650px;"></a>
                                        </div>
                                        <input type="hidden" class="fabric_input required" name="woman_skirt" data-block-name="woman_skirt" value="<?php echo $_SESSION['fabID']; ?>" />
                                        <div class="fabric_filters">
                                            <input type="hidden" name="fabric_block" value="woman_skirt" />
                                        </div>
                                        <div class="fabric_list loaded">
                                          <?php $fab=$site->get_fabrics1('',$fabric_list);
                                                foreach ($fab as $key => $value) {
                                                ?>
                                            <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid){?> current <?php }?>">
                                                <a href="javascript:void(0);" class="select " rel="<?php echo $fab[$key]['f_rand'];?>">
                                                    <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="<?php echo $fab[$key]['fab_name'];?>">
                                                </a>
                                                <div class="price price_total">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                                <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                                <input type="hidden" name="f_prod_img" class="f_prod_img" value="<?php echo $homeurl.$fab[$key]['default_img']; ?>">
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="garment_render">
                                <div class="render">
                                    <div class="controls"><a href="javascript:;" class="icon zoom in" data-icon="O"><span class="h">ZOOM</span></a><a href="javascript:;" class="icon zoom out" data-icon="P"><span class="h">ZOOM</span></a> </div>
                                    <div class="render3d resize_fix" style="width: 390px; margin-top: -380px; margin-left: 0px;" resize_fix="margin-top: -380px; height: "></div></div>
                                    <div class="render1"></div>
                            </div>
                        </div>
                    </form>
		</div>
	</div>
</div>