<div class="tab-pane active" id="style_<?php echo $a;?>">
	<?php 
		$style=explode("{",$r['om_style']);
		$style=explode(",",$style[1]);
		$pants_fit = explode(":",$style[0]);
		
		$pants_peg = explode(":",$style[1]);
		$pants_belt = explode(":",$style[2]);
		$pants_front_pocket = explode(":",$style[3]);
		$pants_back_pocket = explode(":",$style[4]);
    $pants_back_pocket_type = explode(":",$style[5]);
		$pants_cuff = explode(":",trim($style[6],"}"));
    $p_img_qry=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");
      $p_imgs=mysqli_fetch_array($p_img_qry);
	?>
	<div id="body" class="man_suit2_configure garment_container">
      <div class="body_box" id="features">
        <div class="body_product_box_3d">
          <div id="man_suit">
              <!-- MODEL 3D dels suits -->
              <!-- BOX RIGHT: MODEL + CONTROLS -->
              <div class="box_right_3d suit">
                <div id="box_mini_next_3d">
                </div>
                <div id="move">
                  <div id="control_suit">
                    <!-- Rotate model -->
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
                <div class="content suit garment_block" id="max_height_move" 
                      style="display:block;">
                  <!--<div class="separator">
                  </div>--><!-- JACKET CONFIG -->
                  <div class="box_opts" product_type="jacket">
                                    <!-- PANTS CONFIG -->
                    <div class="box_title">
                     <h1 class="title suit">
                        Pants 
                      </h1>
                    </div>
                    <!--<div class="separator">
                    </div>-->
                    <div class="box_opts" product_type="pants">
                      <div class="conf_opt config_3d">
                        <div class="box_title">
                          <p>
                          Fit:
                          </p>
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
                          <label class="option <?php if
                           ($pants_fit[1]!='' && 
                           trim($pants_fit[1])=='fit') 
                            { ?> checked <?php } ?>">
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
                            <div layer="pants_belt" class="option_trigger common_th 
                               <?php if($pants_belt[1]!='' && trim($pants_belt[1])=='0') { ?> active 
                                <?php } ?> big_images" href="javascript:;" rel="0">
                              <div class="box_model big suit_belt">
                                <div class="active"></div>
                                <img alt="Pants Fastening Centered" 
                                src="<?php echo $homeurl;?>assets/images/suit_img/pant_fastening/fastening_centered.JPG">
                                <br>
                              </div>
                              <div class="box_title_common">
                                <p>Centered</p>
                              </div>
                            </div>
                              <!-- Flecha -->
                            <div layer="pants_belt" class="option_trigger common_th <?php if($pants_belt[1]!='' && trim($pants_belt[1])=='1') { ?> active <?php } ?> big_images" 
                              href=" javascript:;" rel="1">
                              <div class="box_model big suit_belt">
                                <div class="active"></div>
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
                      </div>
                      <br>
                      <br>
                      <!-- WAISTCOAT CONFIG -->                                        
                      <!-- PANTS CONFIG -->
                    </div>
                  </div>
                </div>
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
               'fab_unique_id' => $fr['fab_id'],
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
           <div class="box_right_3d suit">
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
                        <div id="rank_label" class="urban"></div>
                        <a class="view_fabric" href="#" data-toggle="modal" data-target="#<?php echo $fab_dtl['fab_id']; ?>">
                        </a>
                      </div>
                    </div>
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
        </div>
      </div>
    </div>
    </div>
</div>
<div class="tab-pane" id="ext_<?php echo $a;?>">
  <p><strong>Accents Details Not Available !</strong></p>
</div>