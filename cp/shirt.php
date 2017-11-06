<div class="box-header">
  <h3>Shirt Customizer</h3>
</div>
<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			<form method="post" class="garment_form" action="<?php echo $adminurl;?>includes/action.php" id="garment_form_9283">
	            <input type="hidden" name="type" value="shirt">
	            <input type="hidden" name="action" value="<?php echo $action;?>">
	             <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
	             <input type="hidden" name="userid" value="<?php echo $_GET['id'];?>">
	            <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
	            <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
	             <input type="hidden" name="p_img" value="<?php echo $homeurl.$p_img_dtl['p_img']; ?>">


	                <div id="garment_loading_9283" class="garment_loading">
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
	                                <input type="hidden" name="f_woman_shirt" class="f_woman_shirt" value="<?php echo $fab_price; ?>">
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
	                            <div class="config_block config_block_woman_shirt" data-block="woman_shirt">
	                                <div class="config_block_title"></div>
	                                <div class="config_field shirt_fit">
	                                    <div class="box_title">FIT:</div>
	                                    <div class="box_opt box_opt_radio mobile_layer">
	                                        <div class="box_opt_fix">
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_fit" value="fit" <?php if($shirtfit[1]=="fit"){?> checked <?php } else if($shirtfit[1]==""){ ?> checked <?php }?> /> Slim Fit</label>
	                                            <label class="option option_radio t4l_radio ">
	                                                <input type="radio" name="shirt_fit" value="loose" <?php if($shirtfit[1]=="loose"){?> checked <?php } ?>/> Classic Fit</label>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="config_field shirt_necklines">
	                                    <div class="box_title">COLLAR STYLE:</div>
	                                    <div class="box_opt box_opt_image mobile_layer">
	                                        <div class="box_opt_fix">
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_necklines_classic.jpg" alt="Classic" pagespeed_url_hash="2142222429" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_necklines" value="classic" <?php if($shirtstyle[1]=="classic"){?> checked="checked" <?php } else if($shirtstyle[1]==""){ ?> checked <?php }?> />Classic</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_necklines_classic_low.jpg" alt="Classic narrow" pagespeed_url_hash="1935701026" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_necklines" value="classic_low" <?php if($shirtstyle[1]=="classic_low"){?> checked="checked" <?php }?> />Classic narrow</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_jewel_neck.jpg" alt="Boat" pagespeed_url_hash="1685040216" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_necklines" value="jewel_neck" <?php if($shirtstyle[1]=="jewel_neck"){?> checked="checked" <?php }?> />Boat</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_boat_neck.jpg" alt="Wide boat" pagespeed_url_hash="671376055" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_necklines" value="boat_neck" <?php if($shirtstyle[1]=="boat_neck"){?> checked="checked" <?php }?>/>Wide boat</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_necklines_buttons.jpg" alt="Button-down" pagespeed_url_hash="247146776" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_necklines" value="buttons" <?php if($shirtstyle[1]=="buttons"){?> checked="checked" <?php }?>/>Button-down</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_necklines_lady.jpg" alt="Rounded" pagespeed_url_hash="68866293" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_necklines" value="lady" <?php if($shirtstyle[1]=="lady"){?> checked="checked" <?php }?>/>Rounded</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_necklines_mao_round.jpg" alt="Stand-up" pagespeed_url_hash="400665729" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_necklines" value="mao_round" <?php if($shirtstyle[1]=="mao_round"){?> checked="checked" <?php }?>/>Stand-up</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_u_neck.jpg" alt="U Neck" pagespeed_url_hash="1373348582" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_necklines" value="u_neck" <?php if($shirtstyle[1]=="u_neck"){?> checked="checked" <?php }?>/>U Neck</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_necklines_v_neck.jpg" alt="V Neckline" pagespeed_url_hash="632439881" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_necklines" value="v_neck" <?php if($shirtstyle[1]=="v_neck"){?> checked="checked" <?php }?>/>V Neckline</label>	                                           
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="config_field shirt_button_close">
	                                    <div class="box_title">FASTENING:</div>
	                                    <div class="box_opt box_opt_image mobile_layer">
	                                        <div class="box_opt_fix">
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_button_close_standard.jpg" alt="Standard" pagespeed_url_hash="37602927" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_button_close" value="standard" <?php if($shirtfast[1]=="standard"){?> checked="checked" <?php } else if($shirtfast[1]==""){ ?> checked <?php }?> />Standard</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_button_close_up_to_half_standard.jpg" alt="Half fastening" pagespeed_url_hash="1603401665" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_button_close" value="up_to_half_standard" <?php if($shirtfast[1]=="up_to_half_standard"){?> checked="checked" <?php }?>/>Half fastening</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_button_close_hidden.jpg" alt="Hidden Buttons" pagespeed_url_hash="823041488" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_button_close" value="hidden" <?php if($shirtfast[1]=="hidden"){?> checked="checked" <?php }?>/>Hidden Buttons</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_button_close_french.jpg" alt="French" pagespeed_url_hash="2432812908" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_button_close" value="french" <?php if($shirtfast[1]=="french"){?> checked="checked" <?php }?> />French</label>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="config_field shirt_bottom_cut">
	                                    <div class="box_title">HEMLINE:</div>
	                                    <div class="box_opt box_opt_radio mobile_layer">
	                                        <div class="box_opt_fix">
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_bottom_cut" value="straight" <?php if($shirthem[1]=="straight"){?> checked="checked" <?php }?> /> Straight</label>
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_bottom_cut" value="modern" <?php if($shirthem[1]=="modern"){?> checked="checked" <?php } else if($shirtfast[1]==""){ ?> checked <?php }?> /> Rounded</label>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="config_field shirt_sleeves">
	                                    <div class="box_title">SLEEVES:</div>
	                                    <div class="box_opt box_opt_radio mobile_layer">
	                                        <div class="box_opt_fix">
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_sleeves" value="long" <?php if($shirt_sleeve[1]=="long"){?> checked="checked" <?php } else if($shirt_sleeve[1]==""){ ?> checked <?php }?>/> Long</label>
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_sleeves" value="without"  <?php if($shirt_sleeve[1]=="without"){?> checked="checked" <?php }?> /> No Sleeves</label>
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_sleeves" value="short" <?php if($shirt_sleeve[1]=="short"){?> checked="checked" <?php }?>/> Short</label>
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_sleeves" value="3_4"  <?php if($shirt_sleeve[1]=="3_4"){?> checked="checked" <?php }?> /> Bracelet</label>
	                                            
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="config_field shirt_sleeve_detail">
	                                    <div class="box_title">SLEEVE DETAILS:</div>                                                        <div class="box_opt box_opt_radio mobile_layer">
	                                        <div class="box_opt_fix">
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_sleeve_detail" value="normal" <?php if($shirt_sleeve_detail[1]=="normal"){?> checked="checked" <?php } else if($shirt_sleeve_detail[1]==""){ ?> checked <?php }?> /> Standard</label>
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_sleeve_detail" value="inner_strip" <?php if($shirt_sleeve_detail[1]=="inner_strip"){?> checked="checked" <?php }?> /> Convertible Sleeve</label>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="config_field shirt_pockets">
	                                    <div class="box_title">BREAST POCKET:</div>
	                                    <div class="box_opt box_opt_radio mobile_layer" icon-fixed="#">
	                                        <div class="box_opt_fix">
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_pockets" value="0"  <?php if($breast_pocket[1]=="0"){?> checked="checked" <?php }?>/> No pocket</label>
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_pockets" value="1"  <?php if($breast_pocket[1]=="1"){?> checked="checked" <?php }?>/> 1 pocket</label>
	                                            <label class="option option_radio t4l_radio">
	                                                <input type="radio" name="shirt_pockets" value="2" <?php if($breast_pocket[1]=="2"){?> checked="checked" <?php } else if($breast_pocket[1]==""){ ?> checked <?php }?> /> 2 Pockets</label>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="config_field shirt_pockets_type">
	                                    <div class="box_title">STYLE:</div>
	                                    <div class="box_opt box_opt_image mobile_layer">
	                                        <div class="box_opt_fix">
	                                        <div style="display: block; float: left;">
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_pockets_type_peak_only_flap.jpg" alt="Peaked flap" pagespeed_url_hash="1165554621" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_pockets_type" value="peak_only_flap" <?php if($pocketstyle[1]=="peak_only_flap"){?> checked="checked" <?php }?> />Peaked flap</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_pockets_type_peak.jpg" alt="Peaked flap" pagespeed_url_hash="1919892936" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_pockets_type" value="peak" <?php if($pocketstyle[1]=="peak"){?> checked="checked" <?php } else if($pocketstyle[1]==""){ ?> checked <?php }?> />Peaked with button</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_pockets_type_straight_only_flap.jpg" alt="Straight flap" pagespeed_url_hash="1365916036" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_pockets_type" value="straight_only_flap"<?php if($pocketstyle[1]=="straight_only_flap"){?> checked="checked" <?php }?> />Straight flap</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_pockets_type_round_only_flap.jpg" alt="Rounded flap" pagespeed_url_hash="2257239696" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_pockets_type" value="round_only_flap" <?php if($pocketstyle[1]=="round_only_flap"){?> checked="checked" <?php }?>/>Rounded flap</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_pockets_type_peak_no_flap.jpg" alt="Without flaps" pagespeed_url_hash="3364188872" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_pockets_type" value="peak_no_flap" /<?php if($pocketstyle[1]=="peak_no_flap"){?> checked="checked" <?php }?>>No flaps</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_pockets_type_straight_no_flap.jpg" alt="Squared without flap" pagespeed_url_hash="1999952151" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_pockets_type" value="straight_no_flap" <?php if($pocketstyle[1]=="straight_no_flap"){?> checked="checked" <?php }?>/>Squared with no flap</label>    
	                                        </div>
	                                     </div>
	                                    </div>
	                                </div>
	                                <div class="config_field shirt_cuffs">
	                                    <div class="box_title">CUFFS STYLE:</div>
	                                    <div class="box_opt box_opt_image mobile_layer">
	                                        <div class="box_opt_fix">
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_cuffs_classic.jpg" alt="Classic" pagespeed_url_hash="3492347714" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_cuffs" value="classic" <?php if($cuffs[1]=="classic"){?> checked="checked" <?php } else if($cuffs[1]==""){ ?> checked <?php }?> />Classic</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_cuffs_thin.jpg" alt="Narrow" pagespeed_url_hash="602137769" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_cuffs" value="thin" <?php if($cuffs[1]=="thin"){?> checked="checked" <?php }?>/>Narrow</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_cuffs_cut.jpg" alt="Angled 1 button" pagespeed_url_hash="1212380758" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_cuffs" value="cut" <?php if($cuffs[1]=="cut"){?> checked="checked" <?php }?>/>Angled 1 button</label>
	                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_cuffs_rounded.jpg" alt="Rounded 1 button" pagespeed_url_hash="2139340669" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                <input type="radio" name="shirt_cuffs" value="rounded" <?php if($cuffs[1]=="rounded"){?> checked="checked" <?php }?>/>Rounded 1 button</label>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                       <div class="garment_block garment_block_fabric">
	                        <div class="fabric_block fabric_block_woman_shirt" data-block-name="woman_shirt">
	                            <div class="fabric_block_title">woman_shirt</div>
	                                <div class="fabric_preview fabric_preview_woman_shirt" style="display:block;">
	                                    <div class="infobar" style="width:650px;">
	                                        <span class="title fabric_main_title"><?php echo $fab_title;?></span>
	                                        <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc); ?></span>
	                                    </div>
	                                    <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img src="<?php echo $homeurl.$fab_img;?>" style="width:650px;" class="fabric_main_image"></a>
	                                </div>
	                                <input type="hidden" class="fabric_input required" name="woman_shirt" data-block-name="woman_shirt" value="<?php echo $_SESSION['fabID']; ?>" />
	                                <div class="fabric_filters">
	                                    <input type="hidden" name="fabric_block" value="woman_shirt" />
	                                </div>
	                                <div class="fabric_list loaded">
	                                <?php
	                                $fab=$site->get_fabrics1('',$fabric_list);
	                                foreach ($fab as $key => $value) {
	        
	                                ?>
	                                    <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid) {?> current <?php }?>">
	                                        <div class="icon icon-winter"></div>        
	                                        <a href="javascript:void(0);" class="select " rel="<?php echo $fab[$key]['f_rand'];?>">
	                                            <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="Boston">
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
	                        <div class="col-md-10 garment_block garment_block_extra">
	                            <div class="extra_block extra_block_woman_shirt" data-block-name="woman_shirt">
	                                <div class="extra_container shirt_initials extra_container_initials active" data-extra-name="shirt_initials" data-extra-type="initials" info-icon="6"><a href="javascript:void(0);" class="discard">Delete</a>
	                                    <div class="extra_title">Monograms</div>
	                                    <div class="extra_content">
	                                        <input type="hidden" class="initials_price" name="initials_price" value="4.95">
	                                        <input type="hidden" name="title_price1" class="title_price1 title_price4" value="<?php echo $lining_price; ?>">
	                                        <div class="extra_field extra_field_initials_text required">
	                                            <div class="box_title">WRITE HERE:</div>
	                                            <div class="box_opt">
	                                                <div class="box_opt_fix">
	                                                    <input value="<?php echo $text[1];?>" type="text" name="initials_text" class="text initials_text" placeholder="Type your initials" maxlength="10">
	                                                    <span class="extra_price">(+ 4.95$ )</span>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="extra_field extra_field_initials_fonts required">
	                                            <div class="box_title">FONT:</div>
	                                            <div class="box_opt">
	                                                <div class="box_opt_fix">
	                                                    <label class="t4l_radio garamond">
	                                                        <input <?php if($font[1]=="garamond"){?> checked <?php }?> type="radio" class="font" name="initials_font" value="garamond"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/garamond.png" alt="Garamond" pagespeed_url_hash="2694130881" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    </label>
	                                                    <label class="t4l_radio harrington">
	                                                        <input type="radio" <?php if($font[1]=="harrington"){?> checked <?php }?> class="font" name="initials_font" value="harrington"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/harrington.png" alt="Harrington" pagespeed_url_hash="3894416190" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    </label>
	                                                    <label class="t4l_radio times">
	                                                        <input type="radio" <?php if($font[1]=="times"){?> checked <?php }?> class="font" name="initials_font" value="times"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/times.png" alt="Times new Roman" pagespeed_url_hash="500874088" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    </label>
	                                                    <label class="t4l_radio arial">
	                                                        <input type="radio" <?php if($font[1]=="arial"){?> checked <?php }?> class="font" name="initials_font" value="arial"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/arial.png" alt="Arial" pagespeed_url_hash="946517873" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
	                                                    </label>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="extra_field extra_field_initials_color required">
	                                            <div class="box_title">INITIALS COLOR:</div>
	                                            <div class="box_opt">
	                                                <div class="box_opt_fix">
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="2361ad"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="20"){?> checked <?php }?> type="radio" class="color" 
	                                                            data-color="2361ad" name="initials_color" value="2361ad"> <span class="thread_color" style="background: #2361ad"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ffcf10"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="21"){?> checked <?php }?> type="radio" class="color" 
	                                                        data-color="ffcf10" name="initials_color" value="ffcf10"> <span class="thread_color" style="background: #ffcf10"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="a48239"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="22"){?> checked <?php }?> type="radio" class="color" 
	                                                        data-color="a48239" name="initials_color" value="a48239"> <span class="thread_color" style="background: #a48239"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="e63b85"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="23"){?> checked <?php }?> type="radio" class="color" 
	                                                            data-color="e63b85" name="initials_color" value="e63b85"> <span class="thread_color" style="background: #e63b85"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="b3b3b3"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="24"){?> checked <?php }?> type="radio" 
	                                                        class="color" data-color="b3b3b3" name="initials_color" value="b3b3b3"> <span class="thread_color" style="background: #b3b3b3"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="dd2535"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="26"){?> checked <?php }?> type="radio" class="color"
	                                                         data-color="dd2535" name="initials_color" value="dd2535"> <span class="thread_color" style="background: #dd2535"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="ffffff"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="27"){?> checked <?php }?> type="radio" class="color"
	                                                        data-color="ffffff" name="initials_color" value="ffffff"> <span class="thread_color" style="background: #ffffff"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="34a547"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="28"){?> checked <?php }?> type="radio" class="color" 
	                                                        data-color="34a547" name="initials_color" value="34a547"> <span class="thread_color" style="background: #34a547"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="000000"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="29"){?> checked <?php }?> type="radio" class="color" 
	                                                        data-color="000000" name="initials_color" value="000000"> <span class="thread_color" style="background: #000000"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="ff7912"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="35"){?> checked <?php }?> type="radio" class="color" 
	                                                        data-color="ff7912" name="initials_color" value="ff7912"> <span class="thread_color" style="background: #ff7912"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="731422"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="36"){?> checked <?php }?> type="radio" class="color" 
	                                                        data-color="731422" name="initials_color" value="731422"> <span class="thread_color" style="background: #731422"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="5f1970"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="37"){?> checked <?php }?> type="radio" class="color"
	                                                         data-color="5f1970" name="initials_color" value="5f1970"> <span class="thread_color" style="background: #5f1970"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b8f2f2"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="38"){?> checked <?php }?> type="radio" class="color" 
	                                                        data-color="b8f2f2" name="initials_color" value="b8f2f2"> <span class="thread_color" style="background: #b8f2f2"></span>
	                                                    </label>
	                                                    <label class="t4l_radio t4l_radio_color <?php if($color[1]=="3d2a26"){?> checked1 <?php }?>">
	                                                        <input <?php if($color[1]=="39"){?> checked <?php }?> type="radio" class="color" 
	                                                        data-color="3d2a26" name="initials_color" value="3d2a26"> <span class="thread_color" style="background: #3d2a26"></span>
	                                                    </label>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="extra_field extra_field_initials_position required">
	                                            <div class="box_title">INITIALS POSITION:</div>
	                                            <div class="box_opt">
	                                                <div class="box_opt_fix">
	                                                    <label class="t4l_radio">
	                                                        <input <?php if($position[1]=="high"){?> checked <?php }?> type="radio" class="position" name="initials_position" value="high"> High</label>
	                                                    <label class="t4l_radio">
	                                                        <input <?php if($position[1]=="medium"){?> checked <?php }?> type="radio" class="position" name="initials_position" value="medium"> Medium</label>
	                                                    <label class="t4l_radio">
	                                                        <input <?php if($position[1]=="low"){?> checked <?php }?> type="radio" class="position" name="initials_position" value="low"> Low</label>
	                                                    <label class="t4l_radio">
	                                                        <input <?php if($position[1]=="cuff"){?> checked <?php }?> type="radio" class="position" name="initials_position" value="cuff"> Cuff</label>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="extra_container shirt_neck extra_container_fabrics active" data-extra-name="shirt_neck" data-extra-type="fabrics" info-icon="c" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
	                                    <div class="extra_title">Customize neck</div>
	                                 </div>
	                                <div class="extra_container shirt_cuff extra_container_fabrics active" data-extra-name="shirt_cuff" data-extra-type="fabrics" info-icon="g" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
	                                    <div class="extra_title">Cuffs Style</div>
	                                </div>
	                              
	                                <div class="extra_container shirt_threads extra_container_threads" data-extra-name="shirt_threads" data-extra-type="threads" info-icon="9" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
	                                    <div class="extra_title">Add colored button holes / threads</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="garment_render">
	                        <div class="render">
	                            <div class="controls"><a href="javascript:;" class="icon zoom in" data-icon="O"><span class="h">ZOOM</span></a><a href="javascript:;" class="icon zoom out" data-icon="P"><span class="h">ZOOM</span></a> </div>
	                            <div class="render3d resize_fix" style="width: 390px; margin-top: -40px; margin-left: 0px;" resize_fix="margin-top: -40px; height: "><img class="" style="z-index: 10000;" src="3d/woman/models/1/front/model_front.png" alt="" width="343"><img class="" style="z-index: 10001;" src="3d/woman/shirt/pants/front/pants_front.png" alt="" width="343"><img class="" style="z-index: 16000;" src="3d/woman/shirt/buttons/1_fit_fit+button_close_standard+bottom_cut_modern+outside.png" alt="" width="343"><img class="" style="z-index: 16000;" src="3d/woman/shirt/buttons/1_necklines_classic+button_close_standard.png" alt="" width="343"><img class="" style="z-index: 16000;" src="3d/woman/shirt/buttons/1_pockets_2+pockets_type_peak.png" alt="" width="343"><img class="" style="z-index: 12950;" src="3d/woman/models/1/front/mano_left.png" alt="" width="343"><img class="" style="z-index: 11000;" src="3d/woman/shirt/<?php echo $_SESSION['fabID']; ?>_fabric/front/fit_fit+button_close_standard+bottom_cut_modern+outside.png" alt="" width="343"><img class="" style="z-index: 12000;" src="3d/woman/shirt/<?php echo $_SESSION['fabID']; ?>_fabric/front/necklines_classic+button_close_standard.png" alt="" width="343"><img class="" style="z-index: 13000;" src="3d/woman/shirt/<?php echo $_SESSION['fabID']; ?>_fabric/front/sleeves_long+cuffs_classic+sleeve_detail_normal.png" alt="" width="343"><img class="" style="z-index: 14000;" src="3d/woman/shirt/<?php echo $_SESSION['fabID']; ?>_fabric/front/pockets_2+pockets_type_peak.png" alt="" width="343"></div>                        </div>
	                        <div class="render1"></div>  
	                    </div>
	                </div>
	            </form>
		</div>
	</div>
</div>