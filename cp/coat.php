<div class="box-header">
  <h3>Coat Customizer</h3>
</div>
<div class="box-body">
<div class="row">
<div class="col-md-12">
    <form action="<?php echo $adminurl;?>includes/action.php" method="post" class="garment_form" id="garment_form_5427">
            <input type="hidden" name="action" value="<?php echo $action;?>">
            <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
            <input type="hidden" name="userid" value="<?php echo $_GET['id'];?>">
            <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
            <input type="hidden" name="type" value="coat">
            <input type="hidden" name="lining_id" value="<?php echo $coatlining[1];?>">
            <input type="hidden" name="fab_id" value="<?php echo $fabid;?>">
            <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
            <input type="hidden" name="p_img" value="<?php echo $homeurl.$p_img_dtl['p_img']; ?>">
                <div id="garment_loading_5427" class="garment_loading">
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
                                <input type="hidden" name="f_woman_coat" value="<?php echo $fab_price; ?>" class="f_woman_coat">
                                <input type="hidden" name="l_coat_lining" class="l_coat_lining" value="<?php echo $lining_price; ?>">
                                <input type="hidden" name="price" value="<?php echo $price;?>">
                                <a href="javascript:;" class="step_next btn btn-primary pull-right">NEXT STEP</a>
                                <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
                                <span  class="garment_price btn btn-danger pull-right">$<?php echo $price;?></span>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="garment_container" style="min-height: 1150px">

                    <div class="garment_blocks">
                        <div class="garment_block garment_block_config" style="display:none;">
                            <div class="config_block config_block_woman_coat" data-block="woman_coat">
                                <div class="config_block_title"></div>

                                <div class="config_field coat_fit">
                                    <div class="box_title">FIT(WAISTED):</div>
                                    <div class="box_opt box_opt_radio mobile_layer">
                                        <div class="box_opt_fix">
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_fit" value="straight" 
                                                <?php if($coatfit[1]=="straight"){?> checked="checked" <?php }
                                                 elseif ($coatfit[1]=="") {?> checked="checked" <?php }?> /> Straight
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_fit" value="waisted" <?php if($coatfit[1]=="waisted"){?> checked="checked" <?php }?> /> Waisted
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="config_field coat_style">
                                    <div class="box_title">LOOK:</div>
                                    <div class="box_opt box_opt_radio mobile_layer">
                                        <div class="box_opt_fix">
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_style" value="simple" 
                                                <?php if($coatstyle[1]=="simple"){?> checked="checked" <?php }
                                                 elseif ($coatstyle[1]=="") {?> checked="checked" <?php }?> /> Single breasted</label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_style" <?php if($coatstyle[1]=="crossed"){?> checked="checked" <?php }?> value="crossed"  /> Double breasted</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="config_field coat_collar">
                                    <div class="box_title">COLLAR:</div>
                                    <div class="box_opt box_opt_image mobile_layer">
                                       <div class="box_opt_fix">
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_collar_classic.jpg" alt="Classic" pagespeed_url_hash="2923604366" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_collar" <?php if($coatcollar[1]=="classic"){?> checked="checked" <?php }?>  value="classic" /> Classic
                                            </label>
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_collar_standup.jpg" alt="Standup" pagespeed_url_hash="2100492489" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_collar" <?php if($coatcollar[1]=="standup"){?> checked="checked" <?php }?> value="standup" /> Standup
                                            </label>
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_collar_void.jpg" alt="Collarless" pagespeed_url_hash="1398090494" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_collar" <?php if($coatcollar[1]=="void"){?> checked="checked" <?php }?> value="void" /> Collarless
                                            </label>
                                            
                                        </div>
                                        <div style="display: block; float: left;">
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_collar_lady.jpg" alt="Round" pagespeed_url_hash="1319215128" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_collar" value="lady" <?php if($coatcollar[1]=="lady"){?> checked="checked" <?php }?> /> Round
                                            </label>
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_collar_lapel_short.jpg" alt="Short lapel" pagespeed_url_hash="1866117535" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_collar" value="lapel_short" <?php if($coatcollar[1]=="lapel_short"){?> checked="checked" <?php }elseif($coatcollar[1]==""){?> checked <?php }?>  /> Short lapel</label>
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_collar_lapel_long.jpg" alt="Long lapel" pagespeed_url_hash="1204303583" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_collar" value="lapel_long" <?php if($coatcollar[1]=="lapel_long"){?> checked="checked" <?php }?>/> Long lapel</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="config_field coat_lapel">
                                    <div class="box_title">LAPEL WIDTH:</div>
                                    <div class="box_opt box_opt_radio mobile_layer">
                                         <div class="box_opt_fix">
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_lapel" <?php if($coatlapel[1]=="narrow"){?> checked="checked" <?php }?> value="narrow" /> Standard
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_lapel" value="wide" 
                                                <?php if($coatlapel[1]=="wide"){?> checked="checked" <?php }
                                                 elseif ($coatlapel[1]=="") {?> checked="checked" <?php }?> /> Wide
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="config_field coat_buttons">
                                    <div class="box_title">NUMBER OF BUTTONS:</div>
                                    <div class="box_opt box_opt_radio mobile_layer">
                                         <div class="box_opt_fix">
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_buttons" <?php if($coatbuttons[1]=="2"){?> checked="checked" <?php }?> value="2" /> 2
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_buttons" value="4"
                                                <?php if($coatbuttons[1]=="4"){?> checked="checked" <?php }
                                                 elseif ($coatbuttons[1]=="") {?> checked="checked" <?php }?> /> 4
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_buttons" <?php if($coatbuttons[1]=="8"){?> checked="checked" <?php }?> value="8" /> 8
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_buttons" <?php if($coatbuttons[1]=="12"){?> checked="checked" <?php }?> value="12" /> 12
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="config_field coat_length">
                                    <div class="box_title">LENGTH:</div>
                                    <div class="box_opt box_opt_radio mobile_layer">
                                         <div class="box_opt_fix">
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_length" value="short" 
                                                 <?php if($coatlength[1]=="short"){?> checked="checked" <?php }
                                                 elseif ($coatlength[1]=="") {?> checked="checked" <?php }?> /> Short
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_length" <?php if($coatlength[1]=="long"){?> checked="checked" <?php }?> value="long" /> Long
                                            </label>
                                            <!--<label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_length" value="medium" checked="checked" /> Three-quarter
                                            </label>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="config_field coat_fastening">
                                    <div class="box_title">FASTENING:</div>
                                    <div class="box_opt box_opt_radio mobile_layer">
                                        <div class="box_opt_fix">
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_fastening" value="standard" 
                                                 <?php if($coatfastening[1]=="standard"){?> checked="checked" <?php }
                                                 elseif ($coatfastening[1]=="") {?> checked="checked" <?php }?>/> Standard
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_fastening" value="hide" <?php if($coatfastening[1]=="hide"){?> checked="checked" <?php }?>/> Hidden
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_fastening" value="horn" <?php if($coatfastening[1]=="horn"){?> checked="checked" <?php }?>/> Horn toggle</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="config_field coat_pockets_type">
                                    <div class="box_title">POCKET STYLE:</div>
                                    <div class="box_opt box_opt_image mobile_layer">
                                        <div class="box_opt_fix">
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_pockets_type_0.jpg" alt="No pockets" pagespeed_url_hash="1127119087" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_pockets_type" <?php if($pockettype[1]=="0"){?> checked="checked" <?php }?> value="0" /> No pockets</label>
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_pockets_type_flap.jpg" alt="With flap" pagespeed_url_hash="3402328440" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_pockets_type"
                                                <?php if($pockettype[1]=="flap"){?> checked="checked" <?php }
                                                 elseif ($pockettype[1]=="") {?> checked="checked" <?php }?>
                                                 value="flap" /> With flap</label>
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_pockets_type_diagonal.jpg" alt="Slanted flap" pagespeed_url_hash="1202688944" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_pockets_type" <?php if($pockettype[1]=="diagonal"){?> checked="checked" <?php }?> value="diagonal" /> Slanted flap</label>
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_pockets_type_double_welt.jpg" alt="Double welt" pagespeed_url_hash="2422135911" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_pockets_type" <?php if($pockettype[1]=="double_welt"){?> checked="checked" <?php }?> value="double_welt" /> Double welt</label>
                                        </div>
                                        <div style="display: block; float: left;">
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_pockets_type_diagonal_button.jpg" alt="Diagonal with button" pagespeed_url_hash="4122061007" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_pockets_type" <?php if($pockettype[1]=="diagonal_button"){?> checked="checked" <?php }?> value="diagonal_button" /> Diagonal with button</label>
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_pockets_type_patched.jpg" alt="Patched" pagespeed_url_hash="3703194994" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_pockets_type" <?php if($pockettype[1]=="patched"){?> checked="checked" <?php }?> value="patched" /> Patched
                                            </label>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="config_field coat_sleeves">
                                    <div class="box_title">SLEEVES:</div>
                                    <div class="box_opt box_opt_radio mobile_layer">
                                         <div class="box_opt_fix">
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_sleeves" <?php if($coatsleeves[1]=="standard"){?> checked="checked" <?php }
                                                 elseif ($coatsleeves[1]=="") {?> checked="checked" <?php }?> value="standard"> Standard
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_sleeves"  <?php if($coatsleeves[1]=="buttons"){?> checked="checked" <?php }?> value="buttons" /> Buttons
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_sleeves"  <?php if($coatsleeves[1]=="tape"){?> checked="checked" <?php }?> value="tape" /> Tape
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_sleeves"  <?php if($coatsleeves[1]=="wide"){?> checked="checked" <?php }?> value="wide" /> Wide
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="config_field coat_belt">
                                    <div class="box_title">BELT:</div>
                                    <div class="box_opt box_opt_image mobile_layer" icon-fixed="B">
                                        <div class="box_opt_fix">
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_belt_0.jpg" alt="Without belt" pagespeed_url_hash="368220850" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_belt" value="0" 
                                                <?php if($coatbelt[1]=="0"){?> checked="checked" <?php }
                                                 elseif ($coatbelt[1]=="") {?> checked="checked" <?php }?>  /> None</label>
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_belt_sewed.jpg" alt="Sewed" pagespeed_url_hash="3626528830" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" name="coat_belt" <?php if($coatbelt[1]=="sewed"){?> checked="checked" <?php }?> value="sewed" /> Sewed
                                            </label>
                                            <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_coat/coat_belt_loose.jpg" alt="Loose" pagespeed_url_hash="4292739352" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                <input type="radio" <?php if($coatbelt[1]=="loose"){?> checked="checked" <?php }?> name="coat_belt" value="loose" /> Loose
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="config_field coat_backcut">
                                    <div class="box_title">BACK STYLE:</div>
                                    <div class="box_opt box_opt_radio mobile_layer">
                                       <div class="box_opt_fix">
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" name="coat_backcut" value="0" 
                                                 <?php if($backcut[1]=="0"){?> checked="checked" <?php }
                                                 elseif ($backcut[1]=="") {?> checked="checked" <?php }?>  /> Ventless
                                            </label>
                                            <label class="option option_radio t4l_radio">
                                                <input type="radio" <?php if($backcut[1]=="1"){?> checked="checked" <?php }?> name="coat_backcut" value="1" /> Center vent</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="garment_block garment_block_fabric" style="display: none;">
                            <div data-block-name="woman_coat" class="fabric_block fabric_block_woman_coat" style="display: block;">
                                <div class="fabric_block_title">woman_coat</div>
                                <div class="fabric_preview fabric_preview_woman_coat" style="display: block;">
                                    <div class="infobar"><span class="title fabric_main_title" name="<?php echo $fabid; ?>"><?php echo $fab_title;?></span><span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc); ?></span>
                                    </div>
                                    <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>">
                                    <img src="<?php echo $homeurl."assets/dimg/fabric/".$_SESSION['fabID']."_normal.jpeg";?>" class="fabric_main_image" style="width:80%;"></a>
                                </div>
                                <input type="hidden" value="<?php echo $_SESSION['fabID']; ?>" data-block-name="woman_coat" name="woman_coat" class="fabric_input required">
                                <div class="fabric_filters ">
                                    <input type="hidden" value="woman_coat" name="fabric_block">
                                    <div class="fabric_filter fabric_filter_nav"></div>
                                    <div id="current_filters" style="display: none;"></div>
                                </div>
                                <div class="fabric_list loaded">
                                <?php $fab=$site->get_fabrics1('',$fabric_list);
                                foreach ($fab as $key => $value) {
                                ?>
                                    <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?>  <?php if($fabid==$fab[$key]['f_rand']){?> current <?php }?> ">
                                        <a rel="<?php echo $fab[$key]['f_rand'];?>" class="select" href="javascript:void(0);"> 
                                            <img alt="<?php echo $fab[$key]['fab_name'];?>" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" class="b-lazy b-loaded"> </a>
                                              <div class="price price_total">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                        <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                        <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
                                        <input type="hidden" name="f_prod_img" class="f_prod_img" value="<?php echo $homeurl.$fab[$key]['default_img']; ?>">
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10 garment_block garment_block_extra" style="display:none;">
                            <div class="extra_block extra_block_woman_coat" data-block-name="woman_coat">
                                <div class="extra_container coat_lining extra_container_lining active" data-extra-name="coat_lining" data-extra-type="lining" info-icon="I"><a href="javascript:void(0);" class="discard">Delete</a>
                                    <div class="extra_title">Customize Lining</div>
                                    <div class="extra_content" style="display: block;">
                                        <div class="extra_field">
                                            <input type="hidden" name="coat_lining" class="id coat_lining"  value="<?php echo $coatlining[1];?>" />
                                            <div class="lining_slider_contents" data-name="coat_lining">
                                                <div class="fabric_thumb lining_thumb lining_121 <?php if($coatlining[1]=="121"){?> current <?php }?>" value="121">
                                                    <a href="javascript:void(0);" data-id="121" class="extra_select">
                                                        <img class="b-lazy image b-loaded" src="<?php echo $homeurl;?>assets/dimg/lining/default/121_normal.jpg" alt="">
                                                    </a>
                                                    <div class="price">$9.95</div>
                                                    <div class="title">Paris</div>
                                                </div>

                                                <div class="fabric_thumb lining_thumb lining_96 <?php if($coatlining[1]=="96"){?> current <?php }?>" value="96">
                                                    <a href="javascript:void(0);" data-id="96" class="extra_select">
                                                        <img class="b-lazy image b-loaded" src="<?php echo $homeurl;?>assets/dimg/lining/default/96_normal.jpg" alt="">
                                                    </a>
                                                    <div class="price">$14.95</div>
                                                    <div class="title">Cergy</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="extra_container coat_initials extra_container_initials" data-extra-name="coat_initials" data-extra-type="initials" info-icon="R"><a href="javascript:void(0);" class="discard">Delete</a>
                                    <div class="extra_title">Add monogram</div>
                                    <div class="extra_content">
                                        <input type="hidden" class="initials_price" name="initials_price" value="9.95">
                                        <input type="hidden" class="title_price1" name="title_price1" value="<?php echo $lining_price1; ?>">
                                        <div class="extra_field extra_field_initials_text required">
                                            <div class="box_title">WRITE HERE:</div>
                                            <div class="box_opt">
                                                <div class="box_opt_fix">
                                                    <input type="text" name="coat_initials_text" value="<?php echo $coattext[1];?>" class="text initials_text" placeholder="Type your initials" maxlength="10">
                                                    <span class="extra_price">(+ 9.95$ )</span> </div>
                                            </div>
                                        </div>
                                        <div class="extra_field extra_field_initials_fonts required">
                                            <div class="box_title">FONT:</div>
                                            <div class="box_opt">
                                                <div class="box_opt_fix">
                                                    <label class="t4l_radio garamond">
                                                        <input type="radio" class="font" name="coat_initials_font" value="garamond" <?php if($coatfont[1]=="garamond"){?> checked <?php }?> >
                                                        <img src="<?php echo $homeurl;?>assets/images/personalize/initials/garamond.png" alt="Garamond" pagespeed_url_hash="2694130881" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                    </label>
                                                    <label class="t4l_radio harrington">
                                                        <input type="radio" class="font" name="coat_initials_font" value="harrington" <?php if($coatfont[1]=="harrington"){?> checked <?php }?>>
                                                        <img src="<?php echo $homeurl;?>assets/images/personalize/initials/harrington.png" alt="Harrington" pagespeed_url_hash="3894416190" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                    </label>
                                                    <label class="t4l_radio times">
                                                        <input type="radio" class="font" name="coat_initials_font" value="times" <?php if($coatfont[1]=="times"){?> checked <?php }?>>
                                                        <img src="<?php echo $homeurl;?>assets/images/personalize/initials/times.png" alt="Times new Roman" pagespeed_url_hash="500874088" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                    </label>
                                                    <label class="t4l_radio arial">
                                                        <input type="radio" class="font" name="coat_initials_font" value="arial" <?php if($coatfont[1]=="arial"){?> checked <?php }?>>
                                                        <img src="<?php echo $homeurl;?>assets/images/personalize/initials/arial.png" alt="Arial" pagespeed_url_hash="946517873" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_field extra_field_initials_color required">
                                            <div class="box_title">INITIALS COLOR:</div>
                                            <div class="box_opt">
                                                <div class="box_opt_fix">
                                                    <label class="t4l_radio t4l_radio_color  <?php if($coatcolor[1]=="ffcf10"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="ffcf10" name="coat_initials_color" value="ffcf10" <?php if($coatcolor[1]=="ffcf10"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #ffcf10"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($coatcolor[1]=="4477cf"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="4477cf" name="coat_initials_color" value="4477cf" <?php if($coatcolor[1]=="4477cf"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #4477cf"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($coatcolor[1]=="ffffff"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="ffffff" name="coat_initials_color" value="ffffff" <?php if($coatcolor[1]=="ffffff"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #ffffff"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($coatcolor[1]=="a48239"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="a48239" name="coat_initials_color" value="a48239" <?php if($coatcolor[1]=="a48239"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #a48239"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color  <?php if($coatcolor[1]=="4d020d"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="4d020d" name="coat_initials_color" value="4d020d" <?php if($coatcolor[1]=="4d020d"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #4d020d"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($coatcolor[1]=="b3b3b3"){?> checked1 <?php }?> ">
                                                        <input type="radio" class="color" data-color="b3b3b3" name="coat_initials_color" value="b3b3b3" <?php if($coatcolor[1]=="b3b3b3"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #b3b3b3"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($coatcolor[1]=="331b00"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="331b00" name="coat_initials_color" value="331b00" <?php if($coatcolor[1]=="331b00"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #331b00"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($coatcolor[1]=="000000"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="000000" name="coat_initials_color" value="000000" <?php if($coatcolor[1]=="000000"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #000000"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color  <?php if($coatcolor[1]=="b80e58"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="b80e58" name="coat_initials_color" value="b80e58" <?php if($coatcolor[1]=="b80e58"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #b80e58"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color <?php if($coatcolor[1]=="0ba133"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="0ba133" name="coat_initials_color" value="0ba133" <?php if($coatcolor[1]=="0ba133"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #0ba133"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color  <?php if($coatcolor[1]=="c20000"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="c20000" name="coat_initials_color" value="c20000" <?php if($coatcolor[1]=="c20000"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #c20000"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color  <?php if($coatcolor[1]=="ff7912"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="ff7912" name="coat_initials_color" value="ff7912" <?php if($coatcolor[1]=="ff7912"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #ff7912"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color  <?php if($coatcolor[1]=="5f1970"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="5f1970" name="coat_initials_color" value="5f1970" <?php if($coatcolor[1]=="5f1970"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #5f1970"></span>
                                                    </label>
                                                    <label class="t4l_radio t4l_radio_color  <?php if($coatcolor[1]=="b8f2f2"){?> checked1 <?php }?>">
                                                        <input type="radio" class="color" data-color="b8f2f2" name="coat_initials_color" value="b8f2f2" <?php if($coatcolor[1]=="b8f2f2"){?> checked <?php }?>>
                                                        <span class="thread_color" style="background: #b8f2f2"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                               
                                <div class="extra_container coat_threads extra_container_threads" style="visibility:hidden;" data-extra-name="coat_threads" data-extra-type="threads" info-icon="O"><a href="javascript:void(0);" class="discard">Delete</a>
                                    <div class="extra_title">Add colored button holes / threads</div>
                                    <div class="extra_content">
                                        <div class="extra_field extra_field_radio contrast" data-field-name="contrast">
                                            <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="coat_threads[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                        <span class="name">By default</span>
                                                    </label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="coat_threads[contrast]" value="all" data-field-name="contrast" data-price="3.5">
                                                        <span class="name">All</span><span class="price"> (+3,5€)</span>
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

                            <div class="controls"><a data-icon="O" class="icon zoom in" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a> </div>
                            <div resize_fix="margin-top: -40px; height: " style="width: 390px; margin-top: -40px; margin-left: 0px;" class="render3d resize_fix">
                            </div>
                        </div>
                        <div class="render1"></div>
                    </div>
                </div>
            </form>
            </div>
    </div>
</div><!-- /.box-body -->