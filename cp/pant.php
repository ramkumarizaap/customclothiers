<div class="box-header">
  <h3>Pant Customizer</h3>
</div>
<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			 <form method="post" class="garment_form pant_cust cust" action="<?php echo $adminurl;?>includes/action.php" id="garment_form_9369">
	            <input type="hidden" name="action" value="<?php echo $action;?>">
	            <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
	            <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
	            <input type="hidden" name="userid" value="<?php echo $_GET['id'];?>">
	            <input type="hidden" name="type" value="pant">
	            <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
	                                <input type="hidden" name="p_img" value="<?php echo $homeurl.$p_img_dtl['p_img']; ?>">

	            <div id="garment_loading_9369" class="garment_loading">
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
	                            <input type="hidden" name="f_woman_pants" class="f_woman_pants" value="<?php echo $fab_price; ?>">
	                            <a href="javascript:;" class="step_next btn btn-primary pull-right">NEXT STEP</a>
	                            <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
	                            <span  class="garment_price btn btn-danger pull-right">$<?php echo $price;?></span>
	                        </div>


	                    </div>
	                    
	                </div>
	            </nav>

	            <div class="garment_container" style="min-height: 775px">
	                <div class="garment_blocks">
	                    <div class="garment_block garment_block_config">
	                        <div class="config_block config_block_woman_pants" data-block="woman_pants">
	                            <div class="config_block_title"></div>
	                            <div class="config_field pants_cut">
	                                <div class="box_title">FIT:</div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_cut" value="skinny" <?php if($fit[1]=="skinny"){?> checked="checked" <?php }
	                                         elseif ($fit[1]=="") {?> checked="checked" <?php }?> /> Slim Fit</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_cut" value="standard" 
	                                             <?php if($fit[1]=="standard"){?> checked="checked" <?php }?>/> Classic Fit</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_cut" value="loose" 
	                                             <?php if($fit[1]=="loose"){?> checked="checked" <?php }?>/> Loose Fit</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field pants_length">
	                                <div class="box_title">LENGTH:</div>
	                                <div class="clearfix"></div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_length" value="long" <?php if($length[1]=="long"){?> checked="checked" <?php }
	                                         elseif ($length[1]=="") {?> checked="checked" <?php }?> /> Long</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_length" value="ankle" 
	                                            <?php if($length[1]=="ankle"){?> checked="checked" <?php }?> /> Ankle</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_length" value="bermuda" 
	                                            <?php if($length[1]=="bermuda"){?> checked="checked" <?php }?> /> Bermuda</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field pants_front_closure">
	                                <div class="box_title">FASTENING:</div>
	                                <div class="box_opt box_opt_image mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_front_closure_center_button.jpg" alt="Standard" />
	                                            <input type="radio" name="pants_front_closure" value="center_button" <?php if($fastening[1]=="center_button"){?> checked="checked" <?php }
	                                         elseif ($fastening[1]=="") {?> checked="checked" <?php }?> />Standard</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_front_closure_center_no_button.jpg" alt="No button" />
	                                            <input type="radio" name="pants_front_closure" <?php if($fastening[1]=="center_no_button"){?> checked="checked" <?php }?>  value="center_no_button" />No button</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_front_closure_moved_no_button.jpg" alt="Displaced: No button"/>
	                                            <input type="radio" name="pants_front_closure" <?php if($fastening[1]=="moved_no_button"){?> checked="checked" <?php }?>  value="moved_no_button" />Displaced: No button</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_front_closure_moved_button.jpg" alt="Displaced" />
	                                            <input type="radio" name="pants_front_closure" <?php if($fastening[1]=="moved_button"){?> checked="checked" <?php }?>  value="moved_button" />Displaced</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_front_closure_side_zipper.jpg" alt="Zipper"  />
	                                            <input type="radio" name="pants_front_closure" <?php if($fastening[1]=="side_zipper"){?> checked="checked" <?php }?>  value="side_zipper" />Side Zipper</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field pants_pleat">
	                                <div class="box_title">PLEATS:</div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_pleat" value="no_pleats" <?php if($pleats[1]=="no_pleats"){?> checked="checked" <?php }
	                                         elseif ($pleats[1]=="") {?> checked="checked" <?php }?> /> No pleats</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_pleat" value="pleated" 
	                                             <?php if($pleats[1]=="pleated"){?> checked="checked" <?php }?>/> Pleated</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_pleat" value="double_pleats" 
	                                             <?php if($pleats[1]=="double_pleats"){?> checked="checked" <?php }?>/> Double pleats</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field pants_belt_loops">
	                                <div class="box_title">BELT LOOPS:</div>
	                                <div class="clearfix"></div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_belt_loops" value="with" 
	                                            <?php if($beltloops[1]=="with"){?> checked="checked" <?php }
	                                         elseif ($beltloops[1]=="") {?> checked="checked" <?php }?> /> With</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_belt_loops" value="without" <?php if($beltloops[1]=="without"){?> checked="checked" <?php }?> /> Without</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field pants_crotch">
	                                <div class="box_title">CROTCH:</div>
	                                <div class="clearfix"></div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_crotch" value="low" 
	                                            <?php if($crotch[1]=="low"){?> checked="checked" <?php }?>/> Low</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_crotch" value="medium" 
	                                            <?php if($crotch[1]=="medium"){?> checked="checked" <?php }
	                                         elseif ($crotch[1]=="") {?> checked="checked" <?php }?> /> Medium</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_crotch" value="high" 
	                                            <?php if($crotch[1]=="high"){?> checked="checked" <?php }?> /> High</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field pants_front_pocket">
	                                <div class="box_title">POCKETS:</div>
	                                <div class="box_opt box_opt_image mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_front_pocket_no.jpg" alt="Without" pagespeed_url_hash="3302266066" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="pants_front_pocket" value="no" 
	                                             <?php if($pockets[1]=="no"){?> checked="checked" <?php }?>/>Without</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_front_pocket_inclined.jpg" alt="Diagonal" pagespeed_url_hash="118533027" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="pants_front_pocket" value="inclined" 
	                                             <?php if($pockets[1]=="inclined"){?> checked="checked" <?php }?>/>Diagonal</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_front_pocket_rounded.jpg" alt="Rounded" pagespeed_url_hash="877479594" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="pants_front_pocket" value="rounded" 
	                                             <?php if($pockets[1]=="rounded"){?> checked="checked" <?php }?>/>Rounded</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_front_pocket_straight.jpg" alt="Vertical" pagespeed_url_hash="339574723" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="pants_front_pocket" value="straight" 
	                                            <?php if($pockets[1]=="straight"){?> checked="checked" <?php }
	                                         elseif ($pockets[1]=="") {?> checked="checked" <?php }?>  />Vertical</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_front_pocket_one_living.jpg" alt="Welted" pagespeed_url_hash="827391923" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="pants_front_pocket" value="one_living"
	                                             <?php if($pockets[1]=="one_living"){?> checked="checked" <?php }?> />Welted</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field pants_back_pocket_num">
	                                <div class="box_title">BACK POCKETS:</div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_back_pocket_num" value="0" 
	                                             <?php if($backpocket[1]=="straight"){?> checked="checked" <?php }
	                                         elseif ($backpocket[1]=="") {?> checked="checked" <?php }?>  /> No Pockets</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_back_pocket_num" value="1"
	                                            <?php if($backpocket[1]=="1"){?> checked="checked" <?php }?> /> 1 Pocket</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_back_pocket_num" value="2" 
	                                            <?php if($backpocket[1]=="2"){?> checked="checked" <?php }?>/> 2 Pockets</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field pants_back_pocket_type">
	                                <div class="box_title">POCKET STYLE:</div>
	                                <div class="box_opt box_opt_image mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_back_pocket_type_button.jpg" alt="Double welted with button" pagespeed_url_hash="1609687600" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="pants_back_pocket_type" value="button" 
	                                             <?php if($pocketstyle[1]=="button"){?> checked="checked" <?php }?> />Double welted with button</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_back_pocket_type_one_living.jpg" alt="Welted" pagespeed_url_hash="2443608596" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="pants_back_pocket_type" value="one_living" 
	                                            <?php if($pocketstyle[1]=="one_living"){?> checked="checked" <?php }
	                                         elseif ($pocketstyle[1]=="") {?> checked="checked" <?php }?> />Welted</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_pants/pants_back_pocket_type_two_living.jpg" alt="Double welt" pagespeed_url_hash="1881342458" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="pants_back_pocket_type" value="two_living" 
	                                             <?php if($pocketstyle[1]=="two_living"){?> checked="checked" <?php }?>/>Double welt</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field pants_cuff">
	                                <div class="box_title">CUFFS:</div>
	                                <div class="clearfix"></div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_cuff" value="without" 
	                                            <?php if($cuffs[1]=="without"){?> checked="checked" <?php }
	                                         elseif ($cuffs[1]=="") {?> checked="checked" <?php }?> /> No cuff</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="pants_cuff" value="standard" 
	                                             <?php if($cuffs[1]=="standard"){?> checked="checked" <?php }?>/> With Cuff</label>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="garment_block garment_block_fabric">
	                       <div class="fabric_block fabric_block_woman_pants" data-block-name="woman_pants">
	                        <div class="fabric_block_title">Pants</div>
	                            <div class="fabric_preview fabric_preview_woman_pants" style="display: block;">
	                                <div class="infobar" style="width:650px;">
	                                    <span class="title fabric_main_title"><?php echo $fab_title;?></span>
	                                    <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc); ?></span>
	                                </div>
	                                <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img src="<?php echo $homeurl.$fab_img;?>" style="width:650px;" class="fabric_main_image"></a>
	                            </div>
	                            <input type="hidden" class="fabric_input woman_pants required" name="woman_pants" data-block-name="woman_pants" value="<?php echo $_SESSION['fabID']; ?>" />
	                            <div class="fabric_filters">
	                                <input type="hidden" name="fabric_block" value="woman_pants" />
	                            </div>
	                            <div class="fabric_list loaded">
	                                <?php
	                                        $fab=$site->get_fabrics1('',$fabric_list);
	                                        foreach ($fab as $key => $value) {
	                
	                                        ?>
	                                    <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid){?> current <?php }?>" >
	                                        <a href="javascript:void(0);" class="select" rel="<?php echo $fab[$key]['f_rand'];?>">
	                                            <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img']; ?>" alt="<?php echo $fab[$key]['fab_name'];?>">
	                                        </a>
	                                        <div class="price price_total">+<?php echo $fab[$key]['fab_price'];?>$</div>
	                                        <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
	                                       <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
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
	                        <div class="render3d resize_fix" style="width: 390px; margin-top: -380px; margin-left: 0px;" resize_fix="margin-top: -40px; height: "></div></div>
	                        <div class="render1"></div>
	                     </div>
	                </div>
	        </form>
		</div>
	</div>
</div>