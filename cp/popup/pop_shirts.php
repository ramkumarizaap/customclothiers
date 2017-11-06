<div class="tab-pane active" id="style_<?php echo $a;?>">
  <?php 
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);
    $shirt_sleeve = explode(":",$style[0]);
    $shirt_fit = explode(":",$style[1]);
    $shirt_neck = explode(":",$style[2]);
    $shirt_neck_no_interfacing = explode(":",$style[3]);
    $shirt_neck_buttons = explode(":",$style[4]);
    $shirt_cuffs = explode(":",$style[5]);
    $shirt_chest_pocket = explode(":",$style[6]);
    $shirt_chest_pocket_type = explode(":",$style[7]);
    $shirt_button_close = explode(":",$style[8]);
    $shirt_cut = explode(":",$style[9]);
    $shirt_pleats = explode(":",trim($style[10],"}"));
    $p_img_qry=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");
      $p_imgs=mysqli_fetch_array($p_img_qry);

  ?>
  <div id="body" class="man_suit2_configure garment_container">
    <div class="body_box" id="features">
      <div class="body_product_box_3d">                                
        <div id="man_shirt">
          <form id="configure_form" class="configure_form">

            <div class="box_right_3d">
              <div id="move">
                <!-- MODEL 3D -->
                <div id="loading">
                </div>
                <div style="position: relative;" id="model_3d_preview" class="man_suit">
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
              </div>
            </div>
             <div class="opt_box">
              <div class="content garment_block" id="max_height_move">

                <div class="box_title">
                  <h1 class="title">
                    Custom shirt &nbsp;/
                  </h1>
                  <span class="subtitle">
                    <span>
                      Choose your style
                    </span>
                  </span>
                </div>
                <div class="box_opts">
                  <div id="p-s-1">
                      <div class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                            Sleeves:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="radio_opt labels_shirt_sleeve">
                            <label class="option <?php if(!empty($shirt_sleeve[1]) && trim($shirt_sleeve[1])=='long') { ?> checked <?php } ?>">
                              <div class="radio">
                                <span class="<?php if(!empty($shirt_sleeve[1]) && trim($shirt_sleeve[1])=='long') { ?> checked <?php } ?>">
                                  <input id="shirt_sleeve_long" <?php if(!empty($shirt_sleeve[1]) && trim($shirt_sleeve[1])=='long') { ?> checked <?php } ?> class="uniform option_input" name="shirt_sleeve" rev="sleeve" value="long" rel="long" type="radio">
                                  Long
                                </span>
                              </div>
                            </label>
                            <label class="option <?php if(!empty($shirt_sleeve[1]) && trim($shirt_sleeve[1])=='short') { ?> checked <?php } ?>">
                              <div class="radio">
                                <span class="<?php if(!empty($shirt_sleeve[1]) && trim($shirt_sleeve[1])=='short') { ?> checked <?php } ?>">  
                                  <input <?php if(!empty($shirt_sleeve[1]) && trim($shirt_sleeve[1])=='short') { ?> checked <?php } ?> id="shirt_sleeve_short" class="uniform option_input" name="shirt_sleeve" rev="sleeve" value="short" rel="short" type="radio">
                                  Short
                                </span>
                              </div>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div id="box_shirt_fit" class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                            Fit:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="radio_opt labels_shirt_fit">
                            <label class="option <?php if(!empty($shirt_fit[1]) && trim($shirt_fit[1])=='fit') { ?> checked <?php } ?>">
                              <div class="radio">
                                <span class="<?php if(!empty($shirt_fit[1]) && trim($shirt_fit[1])=='fit') { ?> checked <?php } ?>">  
                                  <input class="uniform option_input" <?php if(!empty($shirt_fit[1]) && trim($shirt_fit[1])=='fit') { ?> checked <?php } ?> name="shirt_fit" value="fit" rel="fit" type="radio">
                                  Slim
                                </span>
                              </div>
                            </label>
                            <label class="option <?php if(!empty($shirt_fit[1]) && trim($shirt_fit[1])=='normal') { ?> checked <?php } ?>">
                              <div class="radio">
                                <span class="<?php if(!empty($shirt_fit[1]) && trim($shirt_fit[1])=='normal') { ?> checked <?php } ?>">
                                  <input class="uniform option_input" <?php if(!empty($shirt_fit[1]) && trim($shirt_fit[1])=='normal') { ?> checked <?php } ?> name="shirt_fit" value="normal" rel="normal" type="radio">
                                  Normal
                                </span>
                              </div>
                            </label>
                            <label class="option <?php if(!empty($shirt_fit[1]) && trim($shirt_fit[1])=='loose') { ?> checked <?php } ?>">
                              <div class="radio">
                                <span class="<?php if(!empty($shirt_fit[1]) && trim($shirt_fit[1])=='loose') { ?> checked <?php } ?>"> 
                                  <input <?php if(!empty($shirt_fit[1]) && trim($shirt_fit[1])=='loose') { ?> checked <?php } ?> class="uniform option_input" name="shirt_fit" value="loose" rel="loose" type="radio">
                                  Loose
                                </span>
                              </div>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                            Collar Style:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="list_common_th interactive_options all_necks open">
                            <input class="option_input" name="shirt_neck" value="1" type="hidden">
                            <div id="neck_default_interfacing" class="option_trigger common_th <?php if(!empty($shirt_neck[1]) && trim($shirt_neck[1])=='1') { ?> active <?php } ?>" href="javascript:;" rel="1">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Collar Style Kent collar" src="<?php echo $homeurl;?>assets/images/shirt_img/collar/kent_collar.JPG" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  Kent collar
                                </p>
                              </div>
                            </div>
                            <div class="option_trigger common_th <?php if(!empty($shirt_neck[1]) && trim($shirt_neck[1])=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Collar Style Cutaway collar" src="<?php echo $homeurl;?>assets/images/shirt_img/collar/cutway_collar.JPG" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  Cutaway collar
                                </p>
                              </div>
                            </div>
                            <div class="option_trigger common_th <?php if(!empty($shirt_neck[1]) && trim($shirt_neck[1])=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Collar Style Long collar" src="<?php echo $homeurl;?>assets/images/shirt_img/collar/long_collar.JPG" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  Long collar
                                </p>
                              </div>
                            </div>
                            <div class="option_trigger common_th <?php if(!empty($shirt_neck[1]) && trim($shirt_neck[1])=='4') { ?> active <?php } ?>" href="javascript:;" rel="4">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Collar Style Button-down" src="<?php echo $homeurl;?>assets/images/shirt_img/collar/button_down_collar.JPG" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  Button-down
                                </p>
                              </div>
                            </div>
                            <div class="always_hard option_trigger common_th <?php if(!empty($shirt_neck[1]) && trim($shirt_neck[1])=='5') { ?> active <?php } ?>" href="javascript:;" rel="5">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Collar Style Stand-up collar" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/mao.jpg" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  Stand-up collar
                                </p>
                              </div>
                            </div>
                            <div  id="opt_smoking" class="always_hard option_trigger common_th <?php if(!empty($shirt_neck[1]) && trim($shirt_neck[1])=='6') { ?> active <?php } ?>" href="javascript:;" rel="6">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Collar Style Wing collar" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/esmoquin.jpg" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  Wing collar
                                </p>
                              </div>
                            </div>
                            <div class="option_trigger common_th <?php if(!empty($shirt_neck[1]) && trim($shirt_neck[1])=='7') { ?> active <?php } ?>" href="javascript:;" rel="7">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Collar Style Rounded collar" src="<?php echo $homeurl;?>assets/images/shirt_img/collar/rounded_collar.JPG" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  Rounded collar
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="box_shirt_neck_type" class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                            Collar Lining:
                          </p>
                        </div>
                          <div class="box_opt">
                            <div class="radio_opt hard_soft_neck">
                              <label class="option <?php if(!empty($shirt_neck_no_interfacing[1]) && trim($shirt_neck_no_interfacing[1])=='1') { ?> checked <?php } ?>">
                               <div class="radio">
                                <span class="<?php if(!empty($shirt_neck_no_interfacing[1]) && trim($shirt_neck_no_interfacing[1])=='1') { ?> checked <?php } ?>"> 
                                 <input <?php if(!empty($shirt_neck_no_interfacing[1]) && trim($shirt_neck_no_interfacing[1])=='1') { ?> checked <?php } ?> id="shirt_neck_no_interfacing" class="uniform option_input" name="shirt_neck_no_interfacing" value="1" type="checkbox">Soft 
                                 <a title="" class="ico tooltip tooltip_option" href="javascript:;"></a>
                                </span>
                               </div>
                                </label>
                              </div>
                            </div>
                      </div>                                            
                      <div id="global_neck_buttons" class="conf_opt config_3d" style="<?php if(!empty($shirt_neck[1]) && trim($shirt_neck[1])=='6') { ?> display:none <?php } else { ?> display:block <?php } ?>">
                        <div class="box_title">
                          <p>
                            Collar buttons:
                          </p>
                        </div>
                        <div class="box_opt">
                          <div class="radio_opt labels_shirt_fit">
                            <label class="option">
                              <?php echo $shirt_neck_buttons[1];?>
                            </label>                                                 
                          </div>
                        </div>
                      </div>
                  </div>
                  <div id="p-s-2">
                    <div id="box_shirt_cuffs" class="conf_opt config_3d" style="<?php if(!empty($shirt_sleeve[1]) && trim($shirt_sleeve[1])=='long') { ?> display: block <?php } else { ?> display: none <?php } ?>;">
                      <div class="box_title">
                        <p>
                          Cuffs Style:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="list_common_th interactive_options all_cuffs open" style="height: 230px;">
                          <input class="option_input" name="shirt_cuffs" value="1" type="hidden">
                          <div id="cuff_default_interfacing" class="option_trigger common_th <?php if(!empty($shirt_cuffs[1]) && trim($shirt_cuffs[1])=='1') { ?> active <?php } ?>" href="javascript:;" rel="1">
                            <div class="box_model">
                              <div class="active">
                              </div>
                              <img alt="Cuffs Style Single cuff 1 button" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/clasico1bot.jpg" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Single cuff 1 button
                              </p>
                            </div>
                          </div>
                          <div class="option_trigger common_th <?php if(!empty($shirt_cuffs[1]) && trim($shirt_cuffs[1])=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                            <div class="box_model">
                              <div class="active">
                              </div>
                              <img alt="Cuffs Style Single cuff 2 buttons" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/clasico2bot.jpg" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Single cuff 2 buttons
                              </p>
                            </div>
                          </div>
                          <div class="option_trigger common_th <?php if(!empty($shirt_cuffs[1]) && trim($shirt_cuffs[1])=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                            <div class="box_model">
                              <div class="active">
                              </div>
                              <img alt="Cuffs Style One-button-cut" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/cortado1bot.jpg" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                One-button-cut
                              </p>
                            </div>
                          </div>
                          <div class="option_trigger common_th <?php if(!empty($shirt_cuffs[1]) && trim($shirt_cuffs[1])=='4') { ?> active <?php } ?>" href="javascript:;" rel="4">
                            <div class="box_model">
                              <div class="active">
                              </div>
                              <img alt="Cuffs Style Two-button-cut" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/cortado2bot.jpg" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Two-button-cut
                              </p>
                            </div>
                          </div>
                          <div class="option_trigger common_th <?php if(!empty($shirt_cuffs[1]) && trim($shirt_cuffs[1])=='7') { ?> active <?php } ?>" href="javascript:;" rel="7">
                            <div class="box_model">
                              <div class="active">
                              </div>
                              <img alt="Cuffs Style Rounded 1 button" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/redondeado1bot.jpg" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Rounded 1 button
                              </p>
                            </div>
                          </div>
                          <div class="option_trigger common_th <?php if(!empty($shirt_cuffs[1]) && trim($shirt_cuffs[1])=='8') { ?> active <?php } ?>" href="javascript:;" rel="8">
                            <div class="box_model">
                              <div class="active">
                              </div>
                              <img alt="Cuffs Style Rounded 2 buttons" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/redondeado2bot.jpg" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Rounded 2 buttons
                              </p>
                            </div>
                          </div>
                          <div class="option_trigger common_th <?php if(!empty($shirt_cuffs[1]) && trim($shirt_cuffs[1])=='5') { ?> active <?php } ?>" href="javascript:;" rel="5">
                            <div class="box_model">
                              <div class="active">
                              </div>
                              <img alt="Cuffs Style Single french cuff" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/gemelossencillo.jpg" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Single french cuff
                              </p>
                            </div>
                          </div>
                          <div class=" option_trigger common_th <?php if(!empty($shirt_cuffs[1]) && trim($shirt_cuffs[1])=='6') { ?> active <?php } ?>" href="javascript:;" rel="6">
                            <div class="box_model">
                              <div class="active">
                              </div>
                              <img alt="Cuffs Style Double french cuff" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/gemelosdoble.jpg" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Double french cuff
                              </p>
                            </div>
                          </div>
                          <div class=" option_trigger common_th <?php if(!empty($shirt_cuffs[1]) && trim($shirt_cuffs[1])=='9') { ?> active <?php } ?>" href="javascript:;" rel="9" style="display:block;">
                            <div class="box_model">
                              <div class="active">
                              </div>
                              <img alt="Cuffs Style Rounded french cuff" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/gemelosredsencillos.jpg" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Rounded french cuff
                              </p>
                            </div>
                          </div>
                          <div class=" option_trigger common_th <?php if(!empty($shirt_cuffs[1]) && trim($shirt_cuffs[1])=='10') { ?> active <?php } ?>" href="javascript:;" rel="10" style="display:block;">
                            <div class="box_model">
                              <div class="active">
                              </div>
                              <img alt="Cuffs Style Double rounded french cuff" src="https://www.dccustomclothiers.com/wp-content/themes/perth/images/gemelosreddobles.jpg" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Double rounded french cuff
                              </p>
                            </div>
                          </div>
                        </div>
                        <!--<a href="javascript:;" class="view_all" rel="all_cuffs">
                          <span>
                            View all
                          </span>
                        </a>-->
                      </div>
                    </div>
                    <div id="box_chest_pocket" class="conf_opt config_3d">
                      <div class="box_title">
                        <p>
                          Chestpocket:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="radio_opt labels_shirt_fit">
                          <label class="option <?php if(trim($shirt_chest_pocket[1])=='0') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if(trim($shirt_chest_pocket[1])=='0') { ?> checked <?php } ?>">
                             <input id="shirt_chest_pocket_0" <?php if(trim($shirt_chest_pocket[1])=='0') { ?> checked <?php } ?> class="uniform num_b" name="shirt_chest_pocket" value="0" type="radio">
                             No pocket
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if(!empty($shirt_chest_pocket[1]) && trim($shirt_chest_pocket[1])=='1') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if(!empty($shirt_chest_pocket[1]) && trim($shirt_chest_pocket[1])=='1') { ?> checked <?php } ?>"> 
                             <input <?php if(!empty($shirt_chest_pocket[1]) && trim($shirt_chest_pocket[1])=='1') { ?> checked <?php } ?> class="uniform num_b" name="shirt_chest_pocket" value="1" id="shirt_chest_pocket1" type="radio">
                             1 Breast pocket
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if(!empty($shirt_chest_pocket[1]) && trim($shirt_chest_pocket[1])=='2') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if(!empty($shirt_chest_pocket[1]) && trim($shirt_chest_pocket[1])=='2') { ?> checked <?php } ?>"> 
                             <input  class="uniform num_b" <?php if(!empty($shirt_chest_pocket[1]) && trim($shirt_chest_pocket[1])=='2') { ?> checked <?php } ?> name="shirt_chest_pocket" value="2" id="shirt_chest_pocket2" type="radio">
                             2 Breast pockets
                            </span>
                          </div>
                          </label>
                        </div>
                        <div id="box_chest_pocket_imgs" class="list_common_th interactive_options all_cuffs open">
                          <input id="hidden_chest_pocket" class="option_input" name="shirt_chest_pocket_type" value="1" type="hidden">
                          <!-- 1 Bolsillo -->
                          <div style="<?php if(!empty($shirt_chest_pocket[1]) && trim($shirt_chest_pocket[1])=='1') { ?> display: block <?php } else { ?> display:none <?php } ?>" class="1pocket">
                            <div class="option_trigger common_th <?php if(!empty($shirt_chest_pocket_type[1]) && trim($shirt_chest_pocket_type[1])=='1') { ?> active <?php } ?>" href="javascript:;" rel="1">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Chestpocket Flap Pockets" src="<?php echo $homeurl; ?>assets/images/shirt_img/chest_pocket/flap_pockets.JPG" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  Flap Pockets
                                </p>
                              </div>
                            </div>
                            <div class="option_trigger common_th <?php if(!empty($shirt_chest_pocket_type[1]) && trim($shirt_chest_pocket_type[1])=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Chestpocket No Flap Pockets" src="<?php echo $homeurl; ?>assets/images/shirt_img/chest_pocket/no_flap_pockets.JPG" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  No Flap Pockets
                                </p>
                              </div>
                            </div>
                          </div>
                          <!-- 2 Bolsillo -->
                          <div class="2pocket" style="<?php if(!empty($shirt_chest_pocket[1]) && trim($shirt_chest_pocket[1])=='2') { ?> display: block <?php } else { ?> display:none <?php } ?>">
                            <div class="option_trigger common_th <?php if(!empty($shirt_chest_pocket_type[1]) && trim($shirt_chest_pocket_type[1])=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Chestpocket Flap Pockets" src="<?php echo $homeurl; ?>assets/images/shirt_img/chest_pocket/flap_pockets.JPG" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  Flap Pockets
                                </p>
                              </div>
                            </div>
                            <div class="option_trigger common_th <?php if(!empty($shirt_chest_pocket_type[1]) && trim($shirt_chest_pocket_type[1])=='4') { ?> active <?php } ?>" href="javascript:;" rel="4">
                              <div class="box_model">
                                <div class="active">
                                </div>
                                <img alt="Chestpocket No Flap Pockets" src="<?php echo $homeurl; ?>assets/images/shirt_img/chest_pocket/no_flap_pockets.JPG" >
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>
                                  No Flap Pockets
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
                          Placket:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="radio_opt labels_shirt_fit">
                          <label class="option <?php if(!empty($shirt_button_close[1]) && trim($shirt_button_close[1])=='1') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if(!empty($shirt_button_close[1]) && trim($shirt_button_close[1])=='1') { ?> checked <?php } ?>">
                             <input id="shirt_button_close_french" rel="1" <?php if(!empty($shirt_button_close[1]) && trim($shirt_button_close[1])=='1') { ?> checked <?php } ?> class="uniform option_input" name="shirt_button_close" value="1" type="radio">
                             French
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if(!empty($shirt_button_close[1]) && trim($shirt_button_close[1])=='2') { ?> checked <?php }  ?>">
                           <div class="radio">
                            <span class="<?php if(!empty($shirt_button_close[1]) && trim($shirt_button_close[1])=='2') { ?> checked <?php }  ?>">
                              <input id="shirt_button_close_hidden" rel="2" <?php if(!empty($shirt_button_close[1]) && trim($shirt_button_close[1])=='2') { ?> checked <?php }  ?> class="uniform option_input" name="shirt_button_close" value="2" type="radio">
                              Hidden Buttons
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if(!empty($shirt_button_close[1]) && trim($shirt_button_close[1])=='3') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if(!empty($shirt_button_close[1]) && trim($shirt_button_close[1])=='3') { ?> checked <?php } ?>"> 
                             <input id="shirt_button_close_standard" rel="3" class="uniform option_input" name="shirt_button_close" value="3" <?php if(!empty($shirt_button_close[1]) && trim($shirt_button_close[1])=='3') { ?> checked <?php } ?> type="radio">
                             Standard
                            </span>
                           </div>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div id="box_shirt_cut" class="conf_opt config_3d">
                      <div class="box_title">
                        <p>
                          Bottom:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="radio_opt labels_shirt_fit">
                          <label class="option <?php if(!empty($shirt_cut[1]) && trim($shirt_cut[1])=='classic') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if(!empty($shirt_cut[1]) && trim($shirt_cut[1])=='classic') { ?> checked <?php } ?>">  
                             <input rel="classic" class="uniform option_input" name="shirt_cut" value="classic" <?php if(!empty($shirt_cut[1]) && trim($shirt_cut[1])=='classic') { ?> checked <?php } ?> type="radio">
                             Tail
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if(!empty($shirt_cut[1]) && trim($shirt_cut[1])=='straight') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if(!empty($shirt_cut[1]) && trim($shirt_cut[1])=='straight') { ?> checked <?php } ?>">
                             <input rel="straight" <?php if(!empty($shirt_cut[1]) && trim($shirt_cut[1])=='straight') { ?> checked <?php } ?> class="uniform option_input" name="shirt_cut" value="straight" type="radio">
                             Square
                            </span>
                           </div>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="conf_opt config_3d">
                      <div class="box_title">
                        <p>
                          Pleats:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="list_common_th interactive_options all_pleats open">
                          <input class="option_input" name="shirt_pleats" value="0" type="hidden">
                          <!-- No pleats -->
                          <div class="option_trigger common_th <?php if(trim($shirt_pleats[1])=='0') { ?> active <?php } ?>" href="javascript:;" rel="0">
                            <div class="box_model big">
                              <div class="active">
                              </div>
                              <img alt="Pleats No Pleats" src="<?php echo $homeurl; ?>assets/images/shirt_img/shirt_pleats/no_pleats.JPG" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                No Pleats
                              </p>
                            </div>
                          </div>
                          <!-- 1 pleats -->
                          <div class="option_trigger common_th <?php if(!empty($shirt_pleats[1]) && trim($shirt_pleats[1])=='1') { ?> active <?php } ?>" href="javascript:;" rel="1">
                            <div class="box_model big">
                              <div class="active">
                              </div>
                              <img alt="Pleats Box pleat" src="<?php echo $homeurl; ?>assets/images/shirt_img/shirt_pleats/box_pleats.JPG" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Box pleat
                              </p>
                            </div>
                          </div>
                          <!-- 2 pleats -->
                          <div class="option_trigger common_th <?php if(!empty($shirt_pleats[1]) && trim($shirt_pleats[1])=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                            <div class="box_model big">
                              <div class="active">
                              </div>
                              <img alt="Pleats Side folds" src="<?php echo $homeurl; ?>assets/images/shirt_img/shirt_pleats/side_folds.JPG" >
                              <br>
                            </div>
                            <div class="box_title_common">
                              <p>
                                Side folds
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="box_shirt_tuxedo" class="conf_opt config_3d" style="display: none;">
                      <div class="box_title">
                        <p>
                          Chest pleats:
                        </p>
                      </div>
                      <div class="box_opt">
                        <div class="radio_opt labels_shirt_fit">
                          <label class="option <?php if(trim($shirt_tuxedo[1])=='0') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if(trim($shirt_tuxedo[1])=='0') { ?> checked <?php } ?>">
                             <input id="inp_shirt_tuxedo_0" rel="0" class="uniform option_input" name="shirt_tuxedo" value="0" <?php if(trim($shirt_tuxedo[1])=='0') { ?> checked <?php } ?> type="radio">
                             No
                            </span>
                           </div>
                          </label>
                          <label class="option <?php if(!empty($shirt_tuxedo[1]) && trim($shirt_tuxedo[1])=='1') { ?> checked <?php } ?>">
                           <div class="radio">
                            <span class="<?php if(!empty($shirt_tuxedo[1]) && trim($shirt_tuxedo[1])=='1') { ?> checked <?php } ?>">
                             <input id="inp_shirt_tuxedo_1" rel="1" class="uniform option_input" name="shirt_tuxedo" value="1" <?php if(!empty($shirt_tuxedo[1]) && trim($shirt_tuxedo[1])=='1') { ?> checked <?php } ?> type="radio">
                             Yes
                            </span>
                           </div>
                          </label>
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
                            <!-- LOAD SLIDER FABRICS -->
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
            <p><strong>Accents Details Not Available !</strong></p>
          <?php 
        }
      else
      { 
        $accents=explode("{",$r['om_accents']);
        $accents=explode(",",$accents[1]);

        
         $font_price = explode(":",$accents[0]);
         $font_family = explode(":",$accents[1]);
         $initials_jacket = explode(":",$accents[2]);
         $monogram_color = explode(":",$accents[3]);
         $neck_styling = explode(":",$accents[4]);
         $neck_lining_price = explode(":",$accents[5]);
         $collar_neck_color = explode(":",$accents[6]);
         $cuff_styling = explode(":",$accents[7]);
         $cuff_lining_price = explode(":",$accents[8]);
         $cuff_color = explode(":",$accents[9]);
         $type_of_elbow = explode(":",$accents[10]);
         $elbow_price = explode(":",$accents[11]);
         $elbow_type = explode(":",$accents[12]);
         $type_of_colored_button_holes = explode(":",$accents[13]);
         $button_holes_price = explode(":",$accents[14]);
         $colored_thread_type = explode(":",$accents[15]);
         $colored_holes_type = explode(":",trim($accents[16],"}"));
        ?> 
          <div id="body" class="man_suit2_configure garment_container">
            <div class="body_box" id="features">
              <div class="body_product_box_3d">                                  
                <div id="man_suit">
                  <form method="post" id="extra_form" action="#" class="configure_form man_waistcoat man_jacket man_suit">                                    
                    <div id="image_z_index"></div>                                    
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
                            $fab_def_img = mysqli_fetch_array($get_fab_def_img);
                            ?>*/
                               echo "<img src=".$homeurl.$p_imgs['p_img']." alt='Customizer item'>";
                            /*<?php 
                          } 
                      }*/ ?>
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
                          <!-- EXTRAS JACKET -->
                          <div id="extras_jacket">                                               
                            <!-- INITIALS -->
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
                                    <div class="img_position_initials1 top is_jacket">
                                      <div id="rotate_jacket">
                                      </div>
                                    </div>                                                        
                                    <div class="right">
                                      <!-- POSITION DEFAULT: INTERIOR -->
                                      <input id="position_default" checked="1" class="uniform posini" type="hidden" name="initials_jacket[pos]" value="interior"/>
                                      <!-- FUENTE DE LAS INICIALES -->
                                      <div class="op_initials all_family">
                                        <div class="box_title">
                                          <p>
                                            Font
                                          </p>
                                        </div>
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
                                    <input id="txt_initial_jacket" size="20" class="my_uniform txt_initial" type="text" name="initials_jacket" maxlength="25" readonly value="<?php if(!empty($initials_jacket[1])) { echo trim($initials_jacket[1]); } ?>"/>
                                  </div>                                                      
                                  <!-- COLOR DE LAS INICIALES -->
                                  <div class="box_opt op_initials">
                                    <div class="box_title">
                                      <p>
                                        Monogram Position Cuff Pocket Collar
                                      </p>
                                    </div>
                                    <div class="list_common_color interactive_options all_colors " rel="initials">
                                      <?php 
                                         $get_mono_dtl = $site->get_accent_color('2','7');
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
                            <div class="extra_opt extra_3d collar-lining">
                              <div class="box_title box_title_new <?php if(!empty($neck_styling[1]) && trim($neck_styling[1])=='inner_fabric' || trim($neck_styling[1])=='outer_fabric') { ?> open <?php } else { ?> close <?php } ?> main" onclick="javascript:return false();">
                                <a href="javascript:;" class="btn_slider">
                                </a>
                                <p class="name">
                                  Customize Collar Lining
                                  <span>
                                    (+10$)
                                  </span>
                                  
                                </p>
                              </div>
                              <div id="options_neck_lining" class="window top neck_styling" style=<?php if(!empty($neck_styling[1]) && trim($neck_styling[1])=='inner_fabric' || trim($neck_styling[1])=='outer_fabric') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>
                                <div class="op_lining">
                                  <div class="lateral_right"> 
                                    <div class="body_product_box_3d">
                                      <div class="box_opt">
                                        <div layer="collar_neck_lining" class="option_trigger common_th mini_pocket collar_inner_fabric <?php if(!empty($neck_styling[1]) && trim($neck_styling[1])=='inner_fabric') { ?> active <?php }  ?>" href="javascript:;" rel="neck_lining" price="4.95">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Collar Neck Lining: Inner Fabric" src="<?php echo $homeurl; ?>/assets/images/man/shirt/collar_lining/collar_inner_fabric.JPG">
                                            <br>
                                          </div>
                                          <div class="box_title_common">
                                            <p>
                                              Inner Fabric
                                            </p>
                                          </div>
                                        </div>
                                        <div layer="collar_neck_lining" class="option_trigger common_th mini_pocket collar_outer_fabric <?php if(!empty($neck_styling[1]) && trim($neck_styling[1])=='outer_fabric') { ?> active <?php }  ?>" href="javascript:;" rel="neck_lining" price="4.95">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Collar Neck Lining: Outer Fabric" src="<?php echo $homeurl; ?>/assets/images/man/shirt/collar_lining/collar_outer_fabric.JPG" class="" price="4.95">
                                            <br>
                                          </div>
                                          <div class="box_title_common">
                                            <p>
                                              Outer Fabric
                                            </p>
                                          </div>
                                       </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="list_common_color interactive_options all_colors collar_neck_col" rel="neck_lining" price="4.95">
                                  <?php 
                                     $get_clr_lining_dtl = $site->get_accent_color('2','8');
                                     $color_img = explode(",", $get_clr_lining_dtl[0]['color_img']);
                                     $color_name = explode(",", $get_clr_lining_dtl[0]['color_name']);
                                     $color_value = explode(",", $get_clr_lining_dtl[0]['color_value']);
                                     if(count($color_img) > 0)
                                     { 
                                        $j=0;
                                        foreach($color_img as $key=>$value)
                                         {
                                            ?>
                                            <div class="option_trigger common_color <?php if(!empty($collar_neck_color[1]) && trim($collar_neck_color[1])== $color_name[$j]) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$j]; ?>">
                                              <a class="box_color" href="javascript:;" layer="collar_color">
                                                <div class="active">
                                                </div>
                                                <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                              </a>
                                            </div>
                                            <?php ++$j; 
                                          } 
                                      } 
                                    ?>                                                      
                                </div>
                              </div>
                            </div>
                            <!-- END FORRO CUELLO -->

                             <!-- PAÑUELO -->
                            <div class="extra_opt extra_3d collar-lining">
                              <div class="box_title box_title_new <?php if(!empty($cuff_styling[1]) && trim($cuff_styling[1])!='') { ?> open <?php } else { ?> close <?php } ?> main" onclick="javascript:return false();">
                                <a href="javascript:;" class="btn_slider">
                                </a>
                                <p class="name">
                                  Customize Cuff Styling
                                  <span>
                                    (+10$)
                                  </span>
                                 
                                </p>
                              </div>
                              <div id="options_handkerchief" class="window handkerchief top cuff_styling" style=<?php if(!empty($cuff_styling[1]) && trim($cuff_styling[1])!='') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>
                                <div class="op_handkerchief">
                                  <div class="lateral_right" style="float:none;">                                                        
                                    <div class="body_product_box_3d">
                                      <div class="box_opt">
                                        <div layer="collar_neck_lining" class="option_trigger common_th mini_pocket cuff_inner_fabric <?php if(!empty($cuff_styling[1]) && trim($cuff_styling[1])=='inner_fabric') { ?> active <?php }  ?>" href="javascript:;" rel="handkerchief" price="4.95">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Cuff Styling: Inner Fabric" src="<?php echo $homeurl; ?>/assets/images/man/shirt/cuff_styling/cuff_inner_fabric.jpg">
                                            <br>
                                          </div>
                                          <div class="box_title_common">
                                            <p>
                                              Inner Fabric
                                            </p>
                                          </div>
                                        </div>
                                        <div layer="collar_neck_lining" class="option_trigger common_th mini_pocket cuff_outer_fabric <?php if(!empty($cuff_styling[1]) && trim($cuff_styling[1])=='outer_fabric') { ?> active <?php }  ?>" href="javascript:;" rel="handkerchief" price="4.95">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Cuff Styling: Outer Fabric" src="<?php echo $homeurl; ?>/assets/images/man/shirt/cuff_styling/cuff_outer_fabric.JPG" class="" price="4.95">
                                            <br>
                                          </div>
                                          <div class="box_title_common">
                                            <p>
                                              Outer Fabric
                                            </p>
                                          </div>
                                       </div>
                                      </div>
                                    </div>                                                      
                                  </div>
                                </div>
                                <div class="list_common_color interactive_options all_colors cuff_col" rel="handkerchief" price="4.95">
                                  <?php 
                                   $get_cuff_lining_dtl = $site->get_accent_color('2','9');
                                   $color_img = explode(",", $get_cuff_lining_dtl[0]['color_img']);
                                   $color_name = explode(",", $get_cuff_lining_dtl[0]['color_name']);
                                   $color_value = explode(",", $get_cuff_lining_dtl[0]['color_value']);
                                   if(count($color_img) > 0)
                                    { 
                                      $k=0;
                                      foreach($color_img as $key=>$value)
                                       {
                                          ?>
                                            <div class="option_trigger common_color <?php if(!empty($cuff_color[1]) && trim($cuff_color[1])==$color_name[$k]) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$k]; ?>">
                                              <a class="box_color" href="javascript:;" layer="cuff_color">
                                                <div class="active">
                                                </div>
                                                <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                              </a>
                                            </div>
                                            <?php ++$k; 
                                        } 
                                    } ?>                                                      
                                </div>
                              </div>
                            </div>
                            <!-- END PAÑUELO -->
                            <!-- HILOS/OJALES DE LOS BOTONES (man_jacket_button_holes_threads) -->
                            <div class="extra_opt extra_3d hilo_ojal_opt">
                              <div class="box_title box_title_new <?php if(trim($colored_thread_type[1])!='' || trim($colored_holes_type[1])!='' || trim($type_of_colored_button_holes[1])=='by_default') { ?> open <?php } else { ?> close <?php } ?> hilo_ojal main" onclick="javascript:return false();">
                                <a href="javascript:;" class="btn_slider">
                                </a>
                                <p class="name">
                                  Add colored button holes / threads 
                                  <span>
                                    (+5$)
                                  </span>
                                 
                                </p>
                              </div>
                              <div class="window hilo_ojal" style=<?php if(trim($colored_thread_type[1])!='' || trim($colored_holes_type[1])!='' || trim($type_of_colored_button_holes[1])=='by_default') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>
                                <div class="apply_at">
                                  <label layer="jacket_button_holes" class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='by_default' ) { ?>checked<?php } ?>">
                                    <div class="radio">
                                      <span class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='by_default' ) { ?>checked<?php } ?>"> 
                                        <input layer="jacket_button_holes" id="pos_bht_all" class="uniform thread_holes_selector" type="radio" name="button_holes_threads_jacket" <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='by_default' ) { ?> checked="checked" <?php } ?> value="by_default"/>
                                      </span>
                                    </div>
                                     By Default                                                        
                                  </label>
                                  <label layer="jacket_button_holes" class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='both_placket_and_cuffs' ) { ?>checked<?php } ?>">
                                    <div class="radio">
                                      <span class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='both_placket_and_cuffs' ) { ?>checked<?php } ?>"> 
                                        <input layer="jacket_button_holes" id="pos_bht_all" class="uniform thread_holes_selector" type="radio" name="button_holes_threads_jacket" <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='both_placket_and_cuffs' ) { ?> checked="checked" <?php } ?> value="both_placket_and_cuffs"/>
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
                                  <label layer="jacket_button_holes" class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='cuff' ) { ?>checked<?php } ?>">
                                    <div class="radio">
                                      <span class="<?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='cuff' ) { ?>checked<?php } ?>"> 
                                        <input layer="jacket_button_holes" id="pos_bht_cuff" class="uniform thread_holes_selector" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])=='cuff' ) { ?> checked="checked" <?php } ?> value="cuff"/>
                                      </span>
                                   </div>
                                     Cuffs only                                                       
                                  </label>
                                </div>
                                <br style="clear: both;">                                                  
                                <?php if(!empty($type_of_colored_button_holes[1]) && trim($type_of_colored_button_holes[1])!='by_default' ) { ?>
                                <div class="shirtsection">
                                 <div class="button-threads">
                                  <img class="color" src="<?php echo $homeurl; ?>assets/images/man/shirt/button-threads.jpg" />
                                  </div>
                                <div id="box_button_threads_extra" class="list_common_color interactive_options all_colors" rel="button_holes_threads" style=<?php if(!empty($_SESSION['shirt']['accents']['type_of_button']) && $_SESSION['shirt']['accents']['type_of_button']=='brass_button' ) { ?> "display:none" <?php } else { ?> "display:block" <?php } ?>>
                                  <input id="hidden_button_threads1" class="option_input1" type="hidden" name="button_holes_threads_jacket2" value="<?php if(!empty($_SESSION['shirt']['accents']['colored_thread_type'])) { echo $_SESSION['shirt']['accents']['colored_thread_type']; } ?>"/>
                                  <p>
                                    Button threads
                                  </p>
                                  <?php 
                                   $get_btn_thread_dtl = $site->get_accent_color('2','6');
                                   $color_img = explode(",", $get_btn_thread_dtl[0]['color_img']);
                                   $color_name = explode(",", $get_btn_thread_dtl[0]['color_name']);
                                   $color_value = explode(",", $get_btn_thread_dtl[0]['color_value']);

                                  if(count($color_img) > 0) { 
                                    $l=0;
                                    foreach($color_img as $key=>$value) { 
                                  ?>
                                  <div layer="jacket_button_thread" class="option_trigger common_color <?php if(!empty($colored_thread_type[1]) && trim($colored_thread_type[1])==$color_name[$l] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$l]; ?>" type="hilo">
                                    <a layer="jacket_button_holes" class="box_color" href="javascript:;">
                                      <div class="active">
                                      </div>
                                      <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                    </a>
                                  </div>
                                   <?php ++$l; } } ?>
                                  
                                </div>
                               </div>

                                <div class="shirtsection">
                                 <div class="button-holes">
                                   <img class="color" src="<?php echo $homeurl; ?>assets/images/man/shirt/button-holes.jpg" />
                                  </div>
                                
                                <div class="list_common_color interactive_options all_colors" rel="button_holes_threads">
                                  <p>
                                    Button holes
                                  </p>
                                  <?php 
                                   $get_btn_holes_dtl = $site->get_accent_color('2','5');
                                   $color_img = explode(",", $get_btn_holes_dtl[0]['color_img']);
                                   $color_name = explode(",", $get_btn_holes_dtl[0]['color_name']);
                                   $color_value = explode(",", $get_btn_holes_dtl[0]['color_value']);

                                  if(count($color_img) > 0) { 
                                    $m=0;
                                    foreach($color_img as $key=>$value) { 
                                  ?>
                                  <div class="option_trigger common_color  <?php if(!empty($colored_holes_type[1]) && trim($colored_holes_type[1])==$color_name[$m] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$m]; ?>" type="ojal">
                                    <a layer="jacket_button_holes1" class="box_color" href="javascript:;">
                                      <div class="active">
                                      </div>
                                      <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                    </a>
                                  </div>
                                   <?php ++$m; } } ?>
                                  
                                </div>
                              </div>
                              <?php } ?>
                            </div>
                           </div>
                         <!-- END Colored Button Holes and Threads -->
                            <!-- CODERAS -->
                            <div class="extra_opt extra_3d">
                            <div class="box_title box_title_new <?php if(trim($type_of_elbow[1])!='') { ?> open <?php } else { ?> close <?php } ?> main" onclick="javascript:return false();">
                            <a href="javascript:;" class="btn_slider">
                            </a>
                            <p class="name">
                            Add elbow patches 
                            <span>
                            (+10$)
                            </span>
                           
                            </p>
                            </div>
                            <div id="options_patches" class="window top" style=<?php if(trim($type_of_elbow[1])!='') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>
                              <div class="op_patches">
                                  <div class="lateral_img img_patches1">
                                  </div>
                                  <div class="lateral_right">
                                    <div class="box_opt_patches">
                                      <div>
                                        <label layer="jacket_patches" class="<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_no' ) { ?>checked<?php } ?>">
                                          <div class="radio">
                                            <span class="<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_no' ) { ?>checked<?php } ?>">
                                              <input id="patches_default" class="uniform default_item" type="radio" name="patches_radio" value="elbow_no" <?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_no' ) { ?> checked="checked" <?php } ?> price="13.95"/>
                                            </span>
                                          </div>
                                           No elbow patches                                                              
                                        </label>
                                        <label layer="jacket_patches" class="<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_yes' ) { ?>checked<?php } ?>">
                                          <div class="radio">
                                            <span class="<?php if(!empty($type_of_elbow[1]) && trim($type_of_elbow[1])=='elbow_yes' ) { ?>checked<?php } ?>">  
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
                                         $get_elbow_patch_dtl = $site->get_accent_color('2','3');
                                         $color_img = explode(",", $get_elbow_patch_dtl[0]['color_img']);
                                         $color_name = explode(",", $get_elbow_patch_dtl[0]['color_name']);
                                         $color_value = explode(",", $get_elbow_patch_dtl[0]['color_value']);
                                         if(count($color_img) > 0)
                                          { 
                                            $n=0;
                                            foreach($color_img as $key=>$value)
                                             {                                                            
                                                ?>
                                                  <div class="option_trigger common_color <?php if(!empty($elbow_type[1]) && trim($elbow_type[1])== $color_name[$n] ) { ?> active <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$n]; ?>">
                                                    <a layer="jacket_patches" class="box_color color_item" href="javascript:;" img_index="0">
                                                      <div class="active">
                                                      </div>
                                                      <img class="color" src="<?php echo $homeurl.$value; ?>" />
                                                    </a>
                                                  </div>
                                                  <?php ++$n; 
                                              } 
                                          } 
                                        ?>                                                          
                                    </div>                                                        
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END CODERAS -->                                                
                          </div>                                              
                        </div>                                            
                        <!-- END box_opts-->
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
</div>