<div class="box-header">
  <h3>Blouse Customizer</h3>
</div>
<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			<form method="post" class="garment_form" action="<?php echo $adminurl;?>includes/action.php" id="garment_form_8194">
	            <input type="hidden" name="type" value="blouse">
	            <input type="hidden" name="action" value="<?php echo $action; ?>">
	            <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
	            <input type="hidden" name="userid" value="<?php echo $_GET['id'];?>">
	            <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
	            <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
	              <input type="hidden" name="p_img" value="<?php echo $homeurl.$p_img_dtl['p_img']; ?>">
	            <div id="garment_loading_8194" class="garment_loading">
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
	                    
	                        <div class="c-nav cf">
	                            <input type="hidden" name="garment_price">
	                            <input type="hidden" name="f_woman_blouse" class="f_woman_blouse" value="<?php echo $fab_price; ?>">
	                            <a href="javascript:;" class="step_next btn btn-primary pull-right">NEXT STEP</a>
	                            <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
	                            <span  class="garment_price btn btn-danger pull-right">$<?php echo $price;?></span>
	                        </div>
	                    </div>
	                </div>
	            </nav>

	            <div class="garment_container" style="min-height: 1150px">
	                <div class="garment_blocks">
	                    <div class="garment_block garment_block_config">
	                        <div class="config_block config_block_woman_blouse" data-block="woman_blouse">
	                            <div class="config_block_title"></div>
	                            <div class="config_field blouse_fit">
	                                <div class="box_title">FIT:</div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_fit" value="slim"
	                                            <?php if($fit[1]=="slim"){?> checked="checked" <?php }
	                                             elseif ($fit[1]=="") {?> checked="checked" <?php }?> /> Slim fit</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_fit" value="loose" 
	                                            <?php if($fit[1]=="loose"){?> checked="checked" <?php }?> /> Classic fit</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field blouse_necklines">
	                                <div class="box_title">COLLAR STYLE:</div>
	                                <div class="box_opt box_opt_image mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_classic.jpg" alt="Classic" pagespeed_url_hash="2591303467" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_necklines" value="classic" 
	                                            <?php if($blousestyle[1]=="classic"){?> checked="checked" <?php }
	                                             elseif ($blousestyle[1]=="") {?> checked="checked" <?php }?> />Classic</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_classic_low.jpg" alt="Classic narrow" pagespeed_url_hash="1204025168" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input <?php if($blousestyle[1]=="classic_low"){?> checked="checked" <?php }?> type="radio" name="blouse_necklines" value="classic_low" />Classic narrow</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_jewel_neck.jpg" alt="Boat" pagespeed_url_hash="1685040216" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input <?php if($blousestyle[1]=="jewel_neck"){?> checked="checked" <?php }?> type="radio" name="blouse_necklines" value="jewel_neck" />Boat</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_boat_neck.jpg" alt="Wide boat" pagespeed_url_hash="671376055" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input <?php if($blousestyle[1]=="boat_neck"){?> checked="checked" <?php }?> type="radio" name="blouse_necklines" value="boat_neck" />Wide boat</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_buttons.jpg" alt="Button-down" pagespeed_url_hash="696227814" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input <?php if($blousestyle[1]=="buttons"){?> checked="checked" <?php }?> type="radio" name="blouse_necklines" value="buttons" />Button-down</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_lady.jpg" alt="Rounded" pagespeed_url_hash="3511210303" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input <?php if($blousestyle[1]=="lady"){?> checked="checked" <?php }?> type="radio" name="blouse_necklines" value="lady" />Rounded</label>
	                                        <!--<label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_open.jpg" alt="Cutaway collar" pagespeed_url_hash="140421391" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_necklines" value="open" />Cutaway collar</label>-->
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_mao_round.jpg" alt="Stand-up" pagespeed_url_hash="1909029823" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input <?php if($blousestyle[1]=="mao_round"){?> checked="checked" <?php }?> type="radio" name="blouse_necklines" value="mao_round" />Stand-up</label>
	                                        <!--<label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_jewel.jpg" alt="Button-down boat" pagespeed_url_hash="3202981468" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_necklines" value="jewel" />Button-down boat</label>-->
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_u_neck.jpg" alt="U Neck" pagespeed_url_hash="1373348582" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input <?php if($blousestyle[1]=="u_neck"){?> checked="checked" <?php }?> type="radio" name="blouse_necklines" value="u_neck" />U Neck</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_v_neck.jpg" alt="V Neckline" pagespeed_url_hash="632439881" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input <?php if($blousestyle[1]=="v_neck"){?> checked="checked" <?php }?> type="radio" name="blouse_necklines" value="v_neck" />V Neckline</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field blouse_button_close">
	                                <div class="box_title">FASTENING:</div>
	                                <div class="box_opt box_opt_image mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_button_close_standard.jpg" alt="Standard" pagespeed_url_hash="3600894365" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input  <?php if($fastening[1]=="standard"){?> checked="checked" <?php }
	                                             elseif ($fastening[1]=="") {?> checked="checked" <?php }?>  type="radio" name="blouse_button_close" value="standard"  />Standard</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_button_close_up_to_half.jpg" alt="Halfway buttons" pagespeed_url_hash="3458363103" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" <?php if($fastening[1]=="up_to_half"){?> checked="checked" <?php }?>  name="blouse_button_close" value="up_to_half" />Halfway buttons</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_button_close_hidden.jpg" alt="Hidden Buttons" pagespeed_url_hash="2331405582" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" <?php if($fastening[1]=="hidden"){?> checked="checked" <?php }?>  name="blouse_button_close" value="hidden" />Hidden Buttons</label>
	                                    </div>
	                                </div>
	                            </div>
	                             <div class="config_field blouse_bottom_cut">
	                                <div class="box_title">HEMLINE:</div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_bottom_cut" 
	                                            <?php if($hemline[1]=="straight"){?> checked="checked" <?php }?>   value="straight" /> Straight</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_bottom_cut" 
	                                            <?php if($hemline[1]=="modern"){?> checked="standard" <?php }
	                                             elseif ($hemline[1]=="") {?> checked="checked" <?php }?>  value="modern"  /> Rounded</label>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                            <div class="config_field blouse_sleeves">
	                                <div class="box_title">SLEEVES:</div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_sleeves" value="long" 
	                                             <?php if($sleeves[1]=="long"){?> checked="standard" <?php }
	                                             elseif ($sleeves[1]=="") {?> checked="checked" <?php }?> /> Long</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_sleeves" value="without"  <?php if($sleeves[1]=="without"){?> checked="checked" <?php }?>/> No Sleeves</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_sleeves" value="short"  <?php if($sleeves[1]=="short"){?> checked="checked" <?php }?> /> Short</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_sleeves" value="3_4"  <?php if($sleeves[1]=="3_4"){?> checked="checked" <?php }?> /> Bracelet</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field blouse_sleeve_detail">
	                                <div class="box_title">SLEEVE DETAILS:</div>
	                                <div class="box_opt box_opt_radio mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_sleeve_detail" value="normal" 
	                                             <?php if($sleevedetail[1]=="normal"){?> checked="checked" <?php }
	                                             elseif ($sleevedetail[1]=="") {?> checked="checked" <?php }?> /> Standard</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_sleeve_detail" value="inner_strip" <?php if($sleevedetail[1]=="inner_strip"){?> checked="checked" <?php }?>  /> Convertible</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field blouse_pockets">
	                                <div class="box_title">BREAST POCKET:</div>
	                                <div class="box_opt box_opt_radio mobile_layer" icon-fixed="&">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_pockets" value="0" 
	                                            <?php if($breastpocket[1]=="0"){?> checked="checked" <?php }
	                                             elseif ($breastpocket[1]=="") {?> checked="checked" <?php }?> /> No pockets</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_pockets" value="1l"  <?php if($breastpocket[1]=="1l"){?> checked="checked" <?php }?>/> 1 pocket(Left)</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_pockets" value="1"  <?php if($breastpocket[1]=="1"){?> checked="checked" <?php }?>/> 1 pocket(Right)</label>
	                                        <label class="option option_radio t4l_radio">
	                                            <input type="radio" name="blouse_pockets" value="2"  <?php if($breastpocket[1]=="2"){?> checked="checked" <?php }?>/> 2 Pockets</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="config_field blouse_pockets_type">
	                                <div class="box_title">STYLE:</div>
	                                <div class="box_opt box_opt_image mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_pockets_type_peak.jpg" alt="Peaked flap" pagespeed_url_hash="2368973974" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_pockets_type" value="peak" 
	                                            <?php if($pocketstyle[1]=="peak"){?> checked="checked" <?php }?>/>Peaked flap</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_pockets_type_straight.jpg" alt="Squared" pagespeed_url_hash="3703441125" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_pockets_type" value="straight" 
	                                            <?php if($pocketstyle[1]=="straight"){?> checked="checked" <?php }?>/>Squared</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_pockets_type_round.jpg" alt="Rounded with flap" pagespeed_url_hash="3655803725" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_pockets_type" value="round" 
	                                            <?php if($pocketstyle[1]=="round"){?> checked="checked" <?php }?>/>Rounded with flap</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_pockets_type_peak_no_flap.jpg" alt="Without flaps" pagespeed_url_hash="161130582" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_pockets_type" value="peak_no_flap" 
	                                             <?php if($pocketstyle[1]=="peak_no_flap"){?> checked="checked" <?php }
	                                             elseif ($pocketstyle[1]=="") {?> checked="checked" <?php }?>  />Without flaps</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_pockets_type_straight_no_flap.jpg" alt="Squared without flap" pagespeed_url_hash="271826693" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_pockets_type" value="straight_no_flap" 
	                                            <?php if($pocketstyle[1]=="straight_no_flap"){?> checked="checked" <?php }?> />Squared without flap</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_pockets_type_round_no_flap.jpg" alt="Rounded without flap" pagespeed_url_hash="1721672813" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_pockets_type" value="round_no_flap"  
	                                            <?php if($pocketstyle[1]=="round_no_flap"){?> checked="checked" <?php }?>/>Rounded without flap</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_pockets_type_peak_only_flap.jpg" alt="Peaked flap" pagespeed_url_hash="473694139" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_pockets_type" value="peak_only_flap" 
	                                            <?php if($pocketstyle[1]=="peak_only_flap"){?> checked="checked" <?php }?>/>Peaked flap</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_pockets_type_straight_only_flap.jpg" alt="Straight flap" pagespeed_url_hash="1754110178" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_pockets_type" value="straight_only_flap" 
	                                            <?php if($pocketstyle[1]=="straight_only_flap"){?> checked="checked" <?php }?>/>Straight flap</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_pockets_type_round_only_flap.jpg" alt="Rounded flap" pagespeed_url_hash="1817829770" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_pockets_type" value="round_only_flap"
	                                            <?php if($pocketstyle[1]=="round_only_flap"){?> checked="checked" <?php }?> />Rounded flap</label>
	                                    </div>
	                                </div>
	                            </div>
	                             <div class="config_field blouse_cuffs">
	                                <div class="box_title">CUFFS STYLE:</div>
	                                <div class="box_opt box_opt_image mobile_layer">
	                                    <div class="box_opt_fix">
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_cuffs_classic.jpg" alt="Classic" pagespeed_url_hash="2043254704" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_cuffs" value="classic" 
	                                             <?php if($cuffs[1]=="classic"){?> checked="checked" <?php }
	                                             elseif ($cuffs[1]=="") {?> checked="checked" <?php }?> />Classic</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_cuffs_cut.jpg" alt="Angled 1 button" pagespeed_url_hash="4191295076" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_cuffs" value="cut" 
	                                             <?php if($cuffs[1]=="round_only_flap"){?> checked="checked" <?php }?> />Angled 1 button</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_cuffs_thin.jpg" alt="Narrow" pagespeed_url_hash="602137769" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_cuffs" value="thin" 
	                                             <?php if($cuffs[1]=="thin"){?> checked="checked" <?php }?>/>Narrow</label>
	                                        <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_cuffs_rounded.jpg" alt="Rounded 1 button" pagespeed_url_hash="690247659" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                            <input type="radio" name="blouse_cuffs" value="rounded" 
	                                             <?php if($cuffs[1]=="rounded"){?> checked="checked" <?php }?>/>Rounded 1 button</label>                                                            
	                                    </div>
	                                </div>
	                            </div>
	                          
	                        </div>
	                    </div>
	                    <div class="garment_block garment_block_fabric">
	                    <div class="fabric_block fabric_block_woman_blouse" data-block-name="woman_blouse">
	                        <div class="fabric_block_title">woman_blouse</div>
	                            <div class="fabric_preview fabric_preview_woman_blouse" style="display:block;">
	                               <div class="infobar" style="width:650px;">
	                                    <span class="title fabric_main_title"><?php echo $fab_title;?></span>
	                                    <span class="composition fabric_main_composition"><?php echo strip_tags($fab_desc); ?></span>
	                                </div>
	                                <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>" style="width:670px;"><img src="<?php echo $homeurl.$fab_img;?>" class="fabric_main_image" style="width:650px;"></a>
	                            </div>
	                            <input type="hidden" class="fabric_input required" name="woman_blouse" data-block-name="woman_blouse" value="<?php echo $_SESSION['fabID']; ?>" />
	                            <div class="fabric_filters">
	                                <input type="hidden" name="fabric_block" value="woman_blouse" />
	                            </div>
	                            <div class="fabric_list loaded">
	                             <?php $fab=$site->get_fabrics1('',$fabric_list);
	                            foreach ($fab as $key => $value) {
	                            ?>
	                                <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid){?> current <?php }?>">
	                                    <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
	                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="<?php echo $fab[$key]['fab_name']?>">
	                                    </a>
	                                    <div class="price price_total">+<?php echo $fab[$key]['fab_price'];?>$</div>
	                                    <div class="title fabric_title"><?php echo $fab[$key]['fab_name']?></div>
	                                    <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
	                                    <input type="hidden" name="f_prod_img" class="f_prod_img" value="<?php echo $homeurl.$fab[$key]['default_img']; ?>">
	                                </div>
	                            <?php }?>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-10  garment_block garment_block_extra">
	                        <div class="extra_block extra_block_woman_blouse" data-block-name="woman_blouse">
	                             <div class="extra_container blouse_initials extra_container_initials active" data-extra-name="blouse_initials" data-extra-type="initials" info-icon="R"><a href="javascript:void(0);" class="discard">Delete</a>
	                                    <div class="extra_title">Add monogram</div>
	                                    <div class="extra_content">
	                                        <input type="hidden" class="initials_price" name="initials_price" value="9.95">
	                                        <input type="hidden" name="title_price1" class="title_price1 title_price3" value="<?php echo $lining_price1; ?>">
	                                        <div class="extra_field extra_field_initials_text required">
	                                            <div class="box_title">WRITE HERE:</div>
	                                            <div class="box_opt">
	                                                <div class="box_opt_fix">
	                                                    <input value="<?php echo $text[1];?>" type="text" name="initials_text" class="text initials_text" placeholder="Type your initials" maxlength="10">
	                                                    <span class="extra_price">(+ 9.95$ )</span> </div>
	                                            </div>
	                                        </div>
	                                        <div class="extra_field extra_field_initials_fonts required">
	                                            <div class="box_title">FONT:</div>
	                                            <div class="box_opt">
	                                                <div class="box_opt_fix">
	                                                    <label class="t4l_radio garamond">
	                                                        <input <?php if($font[1]=="garamond"){ ?> checked <?php }?> type="radio" class="font" name="initials_font" value="garamond">
	                                                        <img src="<?php echo $homeurl;?>assets/images/personalize/initials/garamond.png" alt="Garamond" pagespeed_url_hash="2694130881" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" /></label>
	                                                    <label class="t4l_radio harrington">
	                                                        <input type="radio" <?php if($font[1]=="harrington"){ ?> checked <?php }?> class="font" name="initials_font" value="harrington">
	                                                        <img src="<?php echo $homeurl;?>assets/images/personalize/initials/harrington.png" alt="Harrington" pagespeed_url_hash="3894416190" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" /></label>
	                                                    <label class="t4l_radio times">
	                                                        <input type="radio" <?php if($font[1]=="times"){ ?> checked <?php }?> class="font" name="initials_font" value="times">
	                                                        <img src="<?php echo $homeurl;?>assets/images/personalize/initials/times.png" alt="Times new Roman" pagespeed_url_hash="500874088" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" /></label>
	                                                    <label class="t4l_radio arial">
	                                                        <input type="radio" <?php if($font[1]=="arial"){ ?> checked <?php }?> class="font" name="initials_font" value="arial">
	                                                        <img src="<?php echo $homeurl;?>assets/images/personalize/initials/arial.png" alt="Arial" pagespeed_url_hash="946517873" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" /></label>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="extra_field extra_field_initials_color required">
	                                            <div class="box_title">INITIALS COLOR:</div>
	                                            <div class="box_opt">
	                                                <div class="box_opt_fix">
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="ffcf10"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="ffcf10"){ ?> checked <?php }?> type="radio" class="color" data-color="ffcf10" name="initials_color" value="ffcf10">
	                                                        <span class="thread_color" style="background: #ffcf10"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="4477cf"){ ?> checked1 <?php }?> ">
	                                                        <input  <?php if($color[1]=="4477cf"){ ?> checked <?php }?> type="radio" class="color" data-color="4477cf" name="initials_color" value="4477cf">
	                                                        <span class="thread_color" style="background: #4477cf"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="ffffff"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="ffffff"){ ?> checked <?php }?> type="radio" class="color" data-color="ffffff" name="initials_color" value="ffffff">
	                                                        <span class="thread_color" style="background: #ffffff"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="a48239"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="a48239"){ ?> checked <?php }?> type="radio" class="color" data-color="a48239" name="initials_color" value="a48239">
	                                                        <span class="thread_color" style="background: #a48239"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="4d020d"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="4d020d"){ ?> checked <?php }?> type="radio" class="color" data-color="4d020d" name="initials_color" value="4d020d">
	                                                        <span class="thread_color" style="background: #4d020d"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b3b3b3"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="b3b3b3"){ ?> checked <?php }?> type="radio" class="color" data-color="b3b3b3" name="initials_color" value="b3b3b3">
	                                                        <span class="thread_color" style="background: #b3b3b3"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="331b00"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="331b00"){ ?> checked <?php }?> type="radio" class="color" data-color="331b00" name="initials_color" value="331b00">
	                                                        <span class="thread_color" style="background: #331b00"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="000000"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="000000"){ ?> checked <?php }?> type="radio" class="color" data-color="000000" name="initials_color" value="000000">
	                                                        <span class="thread_color" style="background: #000000"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="b80e58"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="b80e58"){ ?> checked <?php }?> type="radio" class="color" data-color="b80e58" name="initials_color" value="b80e58">
	                                                        <span class="thread_color" style="background: #b80e58"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="0ba133"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="0ba133"){ ?> checked <?php }?> type="radio" class="color" data-color="0ba133" name="initials_color" value="0ba133">
	                                                        <span class="thread_color" style="background: #0ba133"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="c20000"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="c20000"){ ?> checked <?php }?> type="radio" class="color" data-color="c20000" name="initials_color" value="c20000">
	                                                        <span class="thread_color" style="background: #c20000"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ff7912"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="ff7912"){ ?> checked <?php }?> type="radio" class="color" data-color="ff7912" name="initials_color" value="ff7912">
	                                                        <span class="thread_color" style="background: #ff7912"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="5f1970"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="5f1970"){ ?> checked <?php }?> type="radio" class="color" data-color="5f1970" name="initials_color" value="5f1970">
	                                                        <span class="thread_color" style="background: #5f1970"></span></label>
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="b8f2f2"){ ?> checked1 <?php }?>">
	                                                        <input  <?php if($color[1]=="b8f2f2"){ ?> checked <?php }?> type="radio" class="color" data-color="b8f2f2" name="initials_color" value="b8f2f2">
	                                                        <span class="thread_color" style="background: #b8f2f2"></span></label>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                             </div>
	                            <div class="extra_container blouse_neck extra_container_fabrics" data-extra-name="blouse_neck" data-extra-type="fabrics" info-icon="c" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
	                                <div class="extra_title">Customize neck</div>
	                                <div class="extra_content">
	                                    <div class="extra_field extra_field_image contrast" data-field-name="contrast">
	                                        <div class="box_opt box_opt_no_title">
	                                            <div class="box_opt_fix">
	                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/blouse_neck/contrast/xdefault.jpg.pagespeed.ic.bcJi76S7bm.jpg" alt="By default" pagespeed_url_hash="3488175589" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    <input type="radio" name="blouse_neck[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
	                                                </label>
	                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/blouse_neck/contrast/xinner.jpg.pagespeed.ic.nVVBJY4pEL.jpg" alt="Inner fabric" pagespeed_url_hash="2306842182" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    <input type="radio" name="blouse_neck[contrast]" value="inner" data-field-name="contrast" data-price="3.5"><span class="name">Inner fabric</span><span class="price">+3,5€</span>
	                                                </label>
	                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/blouse_neck/contrast/xouter.jpg.pagespeed.ic.8IzVSVxkm0.jpg" alt="Outer fabric" pagespeed_url_hash="2682201967" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    <input type="radio" name="blouse_neck[contrast]" value="outer" data-field-name="contrast" data-price="3.5"><span class="name">Outer fabric</span><span class="price">+3,5€</span>
	                                                </label>
	                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/blouse_neck/contrast/xfull.jpg.pagespeed.ic.FGVF1ywIRi.jpg" alt="All" pagespeed_url_hash="2109536909" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    <input type="radio" name="blouse_neck[contrast]" value="full" data-field-name="contrast" data-price="3.5"><span class="name">All</span><span class="price">+3,5€</span>
	                                                </label>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="extra_field extra_field_fabrics fabrics" data-field-name="fabrics">
	                                        <div class="fabric_filters">
	                                            <input type="hidden" name="fabric_type" value="blouse" /><span class='filter_box'><select name="tone"><option value="all">All colors</option><option value="gray">Grey</option><option value="blue">Blue</option><option value="black">Black</option><option value="brown">Brown</option><option value="light">Light</option><option value="other">Others</option></select></span><span class='filter_box'><select name="texture"><option value="all">All patterns</option><option value="flat">Plain</option><option value="shredded">Striped</option><option value="chequered">Squared</option><option value="other">Others</option></select></span>
	                                        </div>
	                                        <div class="extra_field required">
	                                            <input type="hidden" name="blouse_neck[fabric_id]" class="idExtra" value="" />
	                                            <div class="fabric_slider">
	                                                <div class="fabric_slider_contents mobile_layer"></div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="extra_container blouse_cuff extra_container_fabrics active" data-extra-name="blouse_cuff" data-extra-type="fabrics" info-icon="g" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
	                                <div class="extra_title">Cuffs Style</div>
	                                <div class="extra_content" style="display: block;">
	                                    <div class="extra_field extra_field_image contrast" data-field-name="contrast">
	                                        <div class="box_opt box_opt_no_title">
	                                            <div class="box_opt_fix">
	                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/blouse_cuff/contrast/xdefault.jpg.pagespeed.ic.AUe9dTF-J0.jpg" alt="By default" pagespeed_url_hash="4087944758" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    <input type="radio" name="blouse_cuff[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
	                                                </label>
	                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/blouse_cuff/contrast/xinner.jpg.pagespeed.ic.p77cbzMoj0.jpg" alt="Inner fabric" pagespeed_url_hash="2867993423" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    <input type="radio" name="blouse_cuff[contrast]" value="inner" data-field-name="contrast" data-price="3.5"><span class="name">Inner fabric</span><span class="price">+3,5€</span>
	                                                </label>
	                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/blouse_cuff/contrast/xouter.jpg.pagespeed.ic.NCoXraBLmX.jpg" alt="Outer fabric" pagespeed_url_hash="3243353208" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    <input type="radio" name="blouse_cuff[contrast]" value="outer" data-field-name="contrast" data-price="3.5"><span class="name">Outer fabric</span><span class="price">+3,5€</span>
	                                                </label>
	                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/blouse_cuff/contrast/xfull.jpg.pagespeed.ic.kBDoFMyA0D.jpg" alt="All" pagespeed_url_hash="966310160" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    <input type="radio" name="blouse_cuff[contrast]" value="full" data-field-name="contrast" data-price="3.5"><span class="name">All</span><span class="price">+3,5€</span>
	                                                </label>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="extra_field extra_field_fabrics fabrics" data-field-name="fabrics">
	                                        <div class="fabric_filters">
	                                            <input type="hidden" name="fabric_type" value="blouse" /><span class='filter_box'><select name="tone"><option value="all">All colors</option><option value="gray">Grey</option><option value="blue">Blue</option><option value="black">Black</option><option value="brown">Brown</option><option value="light">Light</option><option value="other">Others</option></select></span><span class='filter_box'><select name="texture"><option value="all">All patterns</option><option value="flat">Plain</option><option value="shredded">Striped</option><option value="chequered">Squared</option><option value="other">Others</option></select></span>
	                                        </div>
	                                        <div class="extra_field required">
	                                            <input type="hidden" name="blouse_cuff[fabric_id]" class="idExtra" value="" />
	                                            <div class="fabric_slider">
	                                                <div class="fabric_slider_contents mobile_layer"></div>
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
	                        <div class="controls"><a href="javascript:;" class="icon zoom in" data-icon="O"><span class="h">ZOOM</span></a><a href="javascript:;" class="icon zoom out" data-icon="P"><span class="h">ZOOM</span></a> </div>
	                        <div class="render3d resize_fix" style="width: 390px; margin-top: -40px; margin-left: 0px;" resize_fix="margin-top: -40px; height: "></div>                        </div>
	                    <div class="render1"></div>  
	                </div>
	            </div>
	        </form>
		</div>
	</div>
</div>