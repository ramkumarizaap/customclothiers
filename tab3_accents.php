





  

  <?php if($_SESSION['p_dtl']['sub_cat_id']=='1') { 



if(!empty($_SESSION['suit']['fabric']['fabric_id'])) {



      $fabric_list = $_SESSION['suit']['fabric']['fabric_id'];

      $where = "where fab_rand='".$fabric_list."'";

     

    }



    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master $where");



    if(mysqli_num_rows($fab_dtl_qry) > 0) {

        while($fr=mysqli_fetch_array($fab_dtl_qry)) {

          $_SESSION['fab_dtl'] = array('fab_id' =>$fr['fab_rand'],

               'fab_unique_id' => $fr['fab_id'],

               'fab_name' => $fr['fab_name'],

               'fab_desc' => $fr['fab_desc'],

               'fab_img' => $fr['fab_img'],

               'fab_price' => $fr['fab_price'],

               'fab_default_img' => $fr['default_img']

          );



        }

    }

    ?>  



  

  <div class="wrapper">

    

  

  <section id="Content" role="main">

    <div class="container">

      

      <!-- SECTION EMPHASIS 1 -->

      <!-- FULL WIDTH -->

    </div>

    <!-- !container -->

    <div class="full-width section-emphasis-1 page-header">

      <div class="container">

        <header class="row">

          <div class="col-md-12">

            <h1 class=" pull-left">

               <?php echo $_SESSION['p_dtl']['sub_category']; ?>

            </h1>

            <!-- BREADCRUMBS -->

              <ul class="breadcrumbs list-inline pull-right">

                <li>

                  <a href="<?php echo $homeurl;?>">Home</a>

                </li>

                <li>

                  <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$_SESSION['p_dtl']['category'])); ?>/<?php echo strtolower(str_replace(' ','-',$_SESSION['p_dtl']['sub_category'])); ?>/">

                       <?php echo $_SESSION['p_dtl']['sub_category']; ?>

                   </a>

                  </li>

                  <li>

                    Customize

                   </li>

                </ul>

                <!-- !BREADCRUMBS -->

            </div>

          </header>

        </div>

      </div>

      <!-- !full-width -->

      <!-- !FULL WIDTH -->

      <!-- !SECTION EMPHASIS 1 -->

      

      <div class="container customizer-container" style="min-height:900px;">

        <div class="row">

          <div class="col-md-12">

            <div class="row">

              <div class="col-md-12 article-wrapper">

                <nav class="garment_nav">

                  <div class="row">

                    <div class="col-xs-7">

                      <ul class="nav nav-tabs">

                        <li>

                          <a href="#" id="link_configure" class="tab">

                            Style

                          </a>

                        </li>

                        <li>

                          <a href="#" class="tab" id="link_fabric">

                            Fabric

                          </a>

                        </li>

                        <li class="active">

                          <a href="#" class="tab" id="link_extras">

                            Accents

                          </a>

                        </li>

                      </ul>

                      <div class="c-nav cf" id="extra_forms">

                        <a href="javascript:;" class="next step_next btn btn-default pull-right">

                          NEXT STEP

                        </a>

                        <a href="javascript:;" class="step_prev btn btn-default pull-right">

                          PREVIOUS

                        </a>

                        <span id="price_img" class="garment_price btn btn-default pull-right">

                          <small>

                          $

                          </small>

                             <?php echo floatval($_SESSION['p_dtl']['base_price']); ?>

                         



                        </span>

                      </div>

                    </div>

                  </div>

                </nav>                

                  <div id="body" class="man_suit2_configure garment_container">

                    <div class="body_box" id="features">

                      <div class="body_product_box_3d">

                        

                        <div id="man_suit">

                        <form method="post" id="extra_form" action="<?php echo $homeurl; ?>includes/action/action.php" class="configure_form man_waistcoat man_jacket man_suit">

                          <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">

                          <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">



                          <input type="hidden" name="section" value="accents">

                          <input type="hidden" name="order_id" value="<?php echo $_SESSION['p_dtl1']['orderid']; ?>">

                          <input type="hidden" name="action" value="<?php echo $_SESSION['p_dtl1']['action']; ?>">

                          <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">

                          <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">

                          <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">

                          <input id="go_to" name="go_to" type="hidden"/>

                          <input name="next" type="hidden" value="1"/>

                          <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">

                          <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['suit']['style']['def_fab'])) { echo $_SESSION['suit']['style']['def_fab']; } ?>">

                          <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['suit']['style']['def_waistcoat'])) { echo $_SESSION['suit']['style']['def_waistcoat']; } ?>">

                             

                          <input type="hidden" name="fabric_name1" value="<?php echo $_SESSION['suit']['fabric']['fabric_name']; ?>">  



                          <!-- CONFIG -->

                          <input type="hidden" name="jacket_style" value="<?php if(!empty($_SESSION['suit']['style']['jacket_style'])) { echo $_SESSION['suit']['style']['jacket_style']; } ?>"/>

                          <input type="hidden" name="jacket_lapel_type" value="<?php if(!empty($_SESSION['suit']['style']['jacket_lapel_type'])) { echo $_SESSION['suit']['style']['jacket_lapel_type']; } ?>"/>

                          <input type="hidden" name="jacket_buttons" value="<?php if(!empty($_SESSION['suit']['style']['jacket_buttons'])) { echo $_SESSION['suit']['style']['jacket_buttons']; } ?>"/>

                          <input type="hidden" name="jacket_chest_pocket" value="<?php if(!empty($_SESSION['suit']['style']['jacket_chest_pocket'])) { echo $_SESSION['suit']['style']['jacket_chest_pocket']; } ?>"/>

                          <input type="hidden" name="jacket_pockets" value="<?php if(!empty($_SESSION['suit']['style']['jacket_pockets'])) { echo $_SESSION['suit']['style']['jacket_pockets']; } ?>"/>

                          <input type="hidden" name="jacket_pockets_type" value="<?php if(!empty($_SESSION['suit']['style']['jacket_pockets_type'])) { echo $_SESSION['suit']['style']['jacket_pockets_type']; } ?>"/>

                          <input type="hidden" name="jacket_vent" value="<?php if(!empty($_SESSION['suit']['style']['jacket_vent'])) { echo $_SESSION['suit']['style']['jacket_vent']; } ?>"/>

                          <input type="hidden" name="jacket_sleeve_buttons" value="<?php if(!empty($_SESSION['suit']['style']['jacket_sleeve_buttons'])) { echo $_SESSION['suit']['style']['jacket_sleeve_buttons']; } ?>"/>

                          <input type="hidden" name="jacket_sleeve_buttonholes" value="<?php if(!empty($_SESSION['suit']['style']['jacket_sleeve_buttonholes'])) { echo $_SESSION['suit']['style']['jacket_sleeve_buttonholes']; } ?>"/>

                          <input type="hidden" name="jacket_fit" value="<?php if(!empty($_SESSION['suit']['style']['jacket_fit'])) { echo $_SESSION['suit']['style']['jacket_fit']; } ?>"/>

                          <input type="hidden" name="pants_fit" value="<?php if(!empty($_SESSION['suit']['style']['pants_fit'])) { echo $_SESSION['suit']['style']['pants_fit']; } ?>"/>

                          <input type="hidden" name="pants_peg" value="<?php if(!empty($_SESSION['suit']['style']['pants_peg'])) { echo $_SESSION['suit']['style']['pants_peg']; } ?>"/>

                          <input type="hidden" name="pants_back_pocket" value="<?php if(!empty($_SESSION['suit']['style']['pants_back_pocket'])) { echo $_SESSION['suit']['style']['pants_back_pocket']; } ?>"/>

                          <input type="hidden" name="pants_back_pocket_type" value="<?php if(!empty($_SESSION['suit']['style']['pants_back_pocket_type'])) { echo $_SESSION['suit']['style']['pants_back_pocket_type']; } ?>"/>

                          <input type="hidden" name="pants_cuff" value="<?php if(!empty($_SESSION['suit']['style']['pants_cuff'])) { echo $_SESSION['suit']['style']['pants_cuff']; } ?>"/>

                          <input type="hidden" name="pants_front_pocket" value="<?php if(!empty($_SESSION['suit']['style']['pants_front_pocket'])) { echo $_SESSION['suit']['style']['pants_front_pocket']; } ?>"/>

                          <input type="hidden" name="pants_ribbon" value="0"/>

                          <input type="hidden" name="pants_belt" value="<?php if(!empty($_SESSION['suit']['style']['pants_belt'])) { echo $_SESSION['suit']['style']['pants_belt']; } ?>"/>

                          <input type="hidden" name="waistcoat_style" value="<?php if(!empty($_SESSION['suit']['style']['waistcoat_style'])) { echo $_SESSION['suit']['style']['waistcoat_style']; } ?>"/>

                          <input type="hidden" name="waistcoat_bottom" value="<?php if(!empty($_SESSION['suit']['style']['waistcoat_bottom'])) { echo $_SESSION['suit']['style']['waistcoat_bottom']; } ?>"/>

                          <input type="hidden" name="waistcoat_buttons" value="<?php if(!empty($_SESSION['suit']['style']['waistcoat_buttons'])) { echo $_SESSION['suit']['style']['waistcoat_buttons']; } ?>"/>

                          <input type="hidden" name="waistcoat_chest_pocket" value="<?php if(!empty($_SESSION['suit']['style']['waistcoat_chest_pocket'])) { echo $_SESSION['suit']['style']['waistcoat_chest_pocket']; } ?>"/>

                          <input type="hidden" name="waistcoat_pockets_num" value="<?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets_num'])) { echo $_SESSION['suit']['style']['waistcoat_pockets_num']; } ?>"/>

                          <input type="hidden" name="waistcoat_pockets" value="<?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets'])) { echo $_SESSION['suit']['style']['waistcoat_pockets']; } ?>"/>

                          <input type="hidden" name="suit_type" value="<?php if(!empty($_SESSION['suit']['style']['suit_type'])) { echo $_SESSION['suit']['style']['suit_type']; } ?>"/>

                            

                          <div id="image_z_index">

                          </div>

                          

                          <!-- BOX RIGHT: MODEL + CONTROLS -->

                          <div class="box_right_3d suit">
                          <div style="margin:0 auto;font-weight:bold;text-align:center;width:200px;">
                              For Visual Purposes Only (Not the actual product fabric being ordered).
                            </div>

                            <div id="move">

                              <div id="control_suit">

                                

                                <!-- Rotate model -->

                                <div id="box_change_position">

                                  

                                  <a id="change_position" class="change_position" href="javascript:;" rel="front">

                                    Turn around model

                                  </a>

                                  

                                </div>

                                <!-- Show or hide jacket -->

                                <div id="show_hide_pieces" class="full">

                                  

                                  <a href="javascript:;" class="show_full_parcial" rel="parcial_suit2">

                                    

                                    <span class="full">

                                      Show jacket

                                    </span>

                                    

                                    <span class="parcial">

                                      Hide jacket

                                    </span>

                                    

                                  </a>

                                  

                                </div>

                              </div>

                              <!-- MODEL 3D -->

                              <div id="loading">

                              </div>

                              <div class="col-md-12">

                              <div class="controls col-md-1">

                              <a data-icon="O" class="icon zoom in" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a> </div>



                              <div id="model_3d_preview" class="man_suit col-md-11" style="position: relative;">

                              </div>  

                              </div>

                              <div id="model_3d_preview1" class="man_suit">

                              </div>

                              <!-- CONTROLS -->

                              <div id="controls_3d" class="box_btns">

                                

                              </div>

                            </div>

                          </div>

                          <div class="opt_box">

                          <div class="content extras_suit suit" id="max_height_move">

                            <!-- TITLE -->

                            <!--<div class="box_title">

                              <h1 class="title">

                                Custom suits &nbsp;/

                              </h1>

                              <span class="subtitle">

                                &nbsp;Step 3: 

                                <span>

                                  Add your personal touch

                                </span>

                              </span>

                            </div>-->

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

                                <!-- FORRO INTERIOR -->

                                <div class="extra_opt extra_3d lining_opt extra_title">

                                  <div class="box_title box_title_new open lining_jacket main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Select Jacket Lining 

                                      <span>

                                        (Complimentary Add-on)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="lining_jacket" price="14.5">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  

                                  <div id="options_lining_jacket" class="window lining top" style="display: block;">

                                    <input id="input_hidden_lining_jacket" class="getVal" layer="jacket_lining" type="hidden" name="lining_jacket" value="<?php if(!empty($_SESSION['suit']['accents']['jacket_lining_id'])) { echo $_SESSION['suit']['accents']['jacket_lining_id']; } else { echo '57';  } ?>" box="lining"/>

                                    <div class="op_lining">

                                      <div class="box_opt_lining">

                                        <label>

                                          <input type="hidden" name="default_jacket_val" value="<?php if(!empty($_SESSION['suit']['accents']['jacket_lining_type']) && $_SESSION['suit']['accents']['jacket_lining_type']!='main_custom_color' || $_SESSION['suit']['accents']['jacket_lining_type']=='')  { ?>yes<?php } ?>">

                                          <input id="lining_default_jacket" class="uniform default" type="radio" name="lining_jacket_radio" value="default_jacket" <?php if(!empty($_SESSION['suit']['accents']['jacket_lining_type']) && $_SESSION['suit']['accents']['jacket_lining_type']=='default_jacket' ) { ?> checked="checked" <?php } else if($_SESSION['suit']['accents']['jacket_lining_type']=='') { ?> checked="checked" <?php } ?> price=""/>

                                          By default

                                        </label>

                                        <!--<label>

                                          <input id="inp_lining_unlined_jacket" class="uniform change_lining" rel="1" type="radio" name="lining_jacket_radio" value="unlined" <?php if(!empty($_SESSION['suit']['accents']['jacket_lining_type']) && $_SESSION['suit']['accents']['jacket_lining_type']=='unlined' ) { ?> checked="checked" <?php } ?> price="39" rel="inp_lining_unlined" box="lining"/>

                                          Unstructured (+39$)

                                          <a id="show_more_unlined" href="javascript:;" onclick="show_unlined_info();" style="font-size: 12px; margin-left: 10px; color: #2A2A2A; vertical-align: text-top;">

                                            <img src="<?php echo $homeurl; ?>assets/images/man/shirt/ico_more_info.png" pagespeed_url_hash="4158586052" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

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

                                        <label>

                                          <input id="inp_lining_personalized_jacket" class="uniform change_lining" rel="1" type="radio" name="lining_jacket_radio" value="main_custom_color" <?php if(!empty($_SESSION['suit']['accents']['jacket_lining_type']) && $_SESSION['suit']['accents']['jacket_lining_type']=='main_custom_color' ) { ?> checked="checked" <?php } ?> price="" rel="inp_lining_personalized" box="lining"/>

                                          Custom color <!--(+14.50$)-->

                                        </label>

                                      </div>

                                      <br style="overflow:hidden;"/>

                                      

                                      <div id="lining_box_jacket" class="personalized_box" extra_name="lining_jacket">

                                        <div class="lining_3d">

                                          <div class="filters">

                                            <div class="preview_fabric_3d_common">

                                              <div class="preview" style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/_big.jpg) top right no-repeat">

                                              </div>

                                            </div>

                                            <br style="clear: both;"/>

                                          </div>

                                          

                                          <!-- LOAD SLIDER FABRICS -->

                                          <span class="prev" rel="back" href="javascript:;">

                                            <img src="<?php echo $homeurl; ?>assets/images/man/left_arrow_lining.png" pagespeed_url_hash="762659231" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                          </span>

                                          <div class="slider_fabrics">

                                          <input type="hidden" name="lining_jacket_price">

                                          <input type="hidden" name="jacket_lining_id" value="<?php if(!empty($_SESSION['suit']['accents']['jacket_lining_id'])) { echo $_SESSION['suit']['accents']['jacket_lining_id']; } ?>">

                                            <div class="slider_box" style="width: 2964px; top: 0px; left: 0px;">

                                              <table width="100%">

                                                <tbody>
                                                  <?php
                                                  $lining = $site->get_jacket_lining('5');
                                                  foreach($lining as $value)
                                                  {
                                                    //if($i%3==0){
                                                    ?>
                                                    <tr>
                                                      <td class="page d3" rel="0">
                                                    <?php //}?>

                                                    

                                                      <div class="fabric_box_3d shirt_fabric_box">

                                                        <div style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/57_thumb.jpg) top center no-repeat" class="image suit_lining <?php if(!empty($_SESSION['suit']['accents']['jacket_lining_id']) && $_SESSION['suit']['accents']['jacket_lining_id']=='57') { ?> selected <?php } else if($_SESSION['suit']['accents']['jacket_lining_id']=='') { ?> selected <?php } ?>" id="suit_lining_57" rel="57">

                                                          

                                                          <img style="<?php if(!empty($_SESSION['suit']['accents']['jacket_lining_id']) && $_SESSION['suit']['accents']['jacket_lining_id']=='57') { ?> display: block; <?php } else if($_SESSION['suit']['accents']['jacket_lining_id']=='') { ?> display:block; <?php } else { ?> display:none; <?php } ?>" class="selected" src="<?php echo $homeurl; ?>assets/images/man/selected_fabric_3d.png" title="Selected fabric" tooltip_class="selected" pagespeed_url_hash="359993417" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">

                                                          <a is_title="Hordley" style="position: relative; z-index: 5;" material="poliester" category="basic" href="javascript:;" rel="57" class="select" extra="" btn_color="">

                                                          </a>

                                                        </div>

                                                        <table class="info">

                                                          <tbody>

                                                            <tr>

                                                              <td class="title">

                                                                <a is_title="Hordley" category="basic" href="javascript:;" btn_color="" rel="57" class="select" extra="">

                                                                  Hordley

                                                                </a>

                                                              </td>

                                                              <td class="season">

                                                                <!--14,50$-->

                                                              </td>

                                                            </tr>

                                                          </tbody>

                                                        </table>

                                                      </div>

                                                      <!-- <div class="fabric_box_3d shirt_fabric_box">

                                                        <div style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/123_thumb.jpg) top center no-repeat" class="image suit_lining <?php if(!empty($_SESSION['suit']['accents']['jacket_lining_id']) && $_SESSION['suit']['accents']['jacket_lining_id']=='123') { ?> selected <?php } ?>" id="suit_lining_123" rel="123">

                                                          <img style="<?php if(!empty($_SESSION['suit']['accents']['jacket_lining_id']) && $_SESSION['suit']['accents']['jacket_lining_id']=='123') { ?> display: block; <?php } else { ?> display:none; <?php } ?>" class="selected" src="<?php echo $homeurl; ?>assets/images/man/selected_fabric_3d.png" title="Selected fabric" tooltip_class="selected" pagespeed_url_hash="359993417" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">

                                                          <a is_title="Albury" style="position: relative; z-index: 5;" material="poliester" category="special" href="javascript:;" rel="123" class="select" extra="" btn_color="">

                                                          </a>

                                                        </div>

                                                        <table class="info">

                                                          <tbody>

                                                            <tr>

                                                              <td class="title">

                                                                <a is_title="Albury" category="special" href="javascript:;" btn_color="" rel="123" class="select" extra="">

                                                                  Albury

                                                                </a>

                                                              </td>

                                                              <td class="season">
                                                              </td>

                                                            </tr>

                                                          </tbody>

                                                        </table>

                                                      </div> -->

                                                    <?php //if($i%3==2){?>
                                                    </td>
                                                  </tr>
                                                  <?php
                                                 // }
                                                }
                                                ?>


                                                </tbody>

                                              </table>

                                            </div>

                                          </div>

                                          <span class="next" rel="next" href="javascript:;">

                                            <img src="<?php echo $homeurl; ?>assets/images/man/right_arrow_lining.png" pagespeed_url_hash="2994667212" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                          </span>

                                        </div>

                                        

                                      </div>

                                      

                                    </div>

                                  </div>

                                </div>

                                <!-- END FORRO INTERIOR -->

                                

                                <!-- INITIALS -->

                                <div class="extra_opt extra_3d initial_opt extra_title">

                                  <!-- title extra initials -->

                                  <div class="box_title box_title_new open initials main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add Embroidery 

                                      <span>

                                        (Complimentary Add-on)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="initials" price="">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  

                                  <div class="window initials" style="display: block;">

                                    <!-- OPCIONES INICIALES -->

                                    <div class="opts_initials">

                                      <!-- Position -->

                                      <div class="op_initials">

                                        <div class="img_position_initials2 top is_jacket">

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

                                            <input type="hidden" name="font_family" value="<?php if(!empty($_SESSION['suit']['accents']['font_family'])) { echo $_SESSION['suit']['accents']['font_family']; } else if($_SESSION['suit']['accents']['font_family']=='') { ?> Arial <?php } ?>">

                                            <div class="box_font_initial">

                                              

                                              <label class="positions">

                                                <input rel="Arial" class="uniform" type="radio" <?php if(!empty($_SESSION['suit']['accents']['font_family']) && $_SESSION['suit']['accents']['font_family']=='Arial') { ?> checked="checked" <?php } else if($_SESSION['suit']['accents']['font_family']=='') { ?> checked="checked" <?php } ?> value="24" name="initials_jacket" rev="initials_type"/>

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/24.png" pagespeed_url_hash="2531959836" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </label>

                                              <label class="positions">

                                                <input rel="Monotype Corsiva" class="uniform" type="radio" <?php if(!empty($_SESSION['suit']['accents']['font_family']) && $_SESSION['suit']['accents']['font_family']=='Monotype Corsiva') { ?> checked="checked" <?php } ?> value="19" name="initials_jacket" rev="initials_type"/>

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/19.png" pagespeed_url_hash="4079675454" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </label>

                                              <label class="positions">

                                                <input rel="Times New Roman" class="uniform" type="radio" <?php if(!empty($_SESSION['suit']['accents']['font_family']) && $_SESSION['suit']['accents']['font_family']=='Times New Roman') { ?> checked="checked" <?php } ?> value="74" name="initials_jacket" rev="initials_type">

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/74.png" pagespeed_url_hash="2155879771" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </label>

                                              <label class="positions">

                                                <input rel="Rockwell" class="uniform" type="radio" <?php if(!empty($_SESSION['suit']['accents']['font_family']) && $_SESSION['suit']['accents']['font_family']=='Rockwell') { ?> checked="checked" <?php } ?> value="77" name="initials_jacket" rev="initials_type">

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/77.png" pagespeed_url_hash="3039379534" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

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

                                        <input type="hidden" name="initials_jacket_price" value="<?php if(!empty($_SESSION['suit']['accents']['font_price'])) { echo $_SESSION['suit']['accents']['font_price']; } ?>">

                                        <input id="txt_initial_jacket" size="20" class="my_uniform txt_initial" type="text" name="initials_jacket" maxlength="25" value="<?php if(!empty($_SESSION['suit']['accents']['initials_jacket'])) { echo $_SESSION["suit"]["accents"]["initials_jacket"]; } ?>"/>

                                      </div>

                                      

                                      <!-- COLOR DE LAS INICIALES -->

                                      <div class="box_opt op_initials">

                                        <div class="box_title">

                                          <p>

                                            Monogram Thread Color

                                          </p>

                                        </div>

                                        

                                        <?php 

                                           $get_mono_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'1');

                                           $color_img = explode(",", $get_mono_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_mono_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_mono_dtl[0]['color_value']);



                                        ?>



                                        <div class="list_common_color interactive_options all_colors " rel="initials">

                                          <input class="option_input" type="hidden" name="initials_jacket1" value="<?php if(!empty($_SESSION['suit']['accents']['monogram_color'])) { echo $_SESSION['suit']['accents']['monogram_color']; } else if($_SESSION['suit']['accents']['monogram_color']=='') { echo $color_name[0];   } ?>"/>

                                          

                                          <?php

                                          if(count($color_img) > 0) { 

                                            $i=0;

                                            foreach($color_img as $key=>$value) { 

                                          ?>

                                           <div class="option_trigger common_color <?php if(!empty($_SESSION['suit']['accents']['monogram_color']) && $_SESSION['suit']['accents']['monogram_color']== $color_name[$i]) { ?> active <?php } else if($_SESSION['suit']['accents']['monogram_color']=='' && $i==0) { ?> active <?php } ?>" href="javascript:;" color="<?php echo $color_name[$i]; ?>">

                                              <a class="box_color" href="javascript:;" layer="monogram_color">

                                                <div class="active">

                                                </div>

                                               <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3170554915" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </a>

                                            </div>

                                          <?php ++$i; } } ?>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <!-- END INITALS -->



                                



                                <!-- START METAL BUTTONS -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new  open main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Type of Buttons 

                                      <span>

                                        (+20$)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="metal_buttons" price="20">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <input type="hidden" name="metal_buttons_price" value="<?php if(!empty($_SESSION['suit']['accents']['metal_button_price'])) { echo $_SESSION['suit']['accents']['metal_button_price']; } ?>">

                                  <div id="options_metal_buttons" class="window metal_buttons top"  style="display: block;">

                                    <input id="input_hidden_metal_buttons" class="getVal" type="hidden" name="metal_buttons" value="<?php if(!empty($_SESSION['suit']['accents']['metal_btn_type'])) { echo $_SESSION['suit']['accents']['metal_btn_type']; } ?>" box="metal_buttons"/>

                                    <div class="op_metal_buttons">

                                      <div class="lateral_right" style="float:none;">

                                        <div class="box_opt_lining">

                                          <div style="float:left;">

                                            <label>

                                              <input layer="jacket_metal_buttons" id="metal_buttons_default" class="uniform default_item" type="radio" name="metal_buttons_radio" value="standard_button" <?php if(!empty($_SESSION['suit']['accents']['type_of_button']) && $_SESSION['suit']['accents']['type_of_button']=='standard_button' ) { ?> checked="checked" <?php } else if($_SESSION['suit']['accents']['type_of_button']=='') { ?> checked="checked" <?php } ?> price="20"/>

                                              Standard Buttons

                                            </label>

                                            <label>

                                              <input layer="jacket_metal_buttons" id="inp_metal_buttons_personalized" class="uniform personalized_item" rel="1" type="radio" name="metal_buttons_radio" value="brass_button" <?php if(!empty($_SESSION['suit']['accents']['type_of_button']) && $_SESSION['suit']['accents']['type_of_button']=='brass_button' ) { ?> checked="checked" <?php } ?> price="20" rel="inp_metal_buttons_personalized" box="metal_buttons" extra_name="metal_buttons"/>

                                              Brass Buttons (+20$)

                                            </label>

                                          </div>

                                        </div>

                                        

                                        <div id="metal_buttons_box" class="personalized_box lateral" extra_name="metal_buttons" style="display:block; width: 462px;">

                                          

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['suit']['accents']['metal_btn_type']) && $_SESSION['suit']['accents']['metal_btn_type']=='gold' ) { ?> active <?php } ?>" href="javascript:;" rel="gold">

                                            <a layer="jacket_metal_buttons" class="box_color big color_item" href="javascript:;">

                                              <div class="active">

                                              </div>

                                              <!--<img class="color big_color" src="<?php echo $homeurl; ?>assets/images/man/jacket/metal_buttons/50.jpg" pagespeed_url_hash="4155628769" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>-->

                                              GOLD

                                            </a>

                                          </div>

                                          

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['suit']['accents']['metal_btn_type']) && $_SESSION['suit']['accents']['metal_btn_type']=='brass' ) { ?> active <?php } ?>" href="javascript:;" rel="brass">

                                            <a layer="jacket_metal_buttons" class="box_color big color_item" href="javascript:;">

                                              <div class="active">

                                              </div>

                                              <!--<img class="color big_color" src="<?php echo $homeurl; ?>assets/images/man/jacket/metal_buttons/51.jpg" pagespeed_url_hash="155161394" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>-->

                                              BRASS

                                            </a>

                                          </div>

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['suit']['accents']['metal_btn_type']) && $_SESSION['suit']['accents']['metal_btn_type']=='bronze' ) { ?> active <?php } ?>" href="javascript:;" rel="bronze">

                                            <a layer="jacket_metal_buttons" class="box_color big color_item" href="javascript:;">

                                              <div class="active">

                                              </div>

                                              <!--<img class="color big_color" src="<?php echo $homeurl; ?>assets/images/man/jacket/metal_buttons/52.jpg" pagespeed_url_hash="449661315" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>-->

                                              BRONZE

                                            </a>

                                          </div>

                                          

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['suit']['accents']['metal_btn_type']) && $_SESSION['suit']['accents']['metal_btn_type']=='silver' ) { ?> active <?php } ?>" href="javascript:;" rel="silver">

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

                                <!-- END METAL BUTTONS -->

                                

                                <!-- FORRO CUELLO -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['suit']['accents']['type_of_neck']) && $_SESSION['suit']['accents']['type_of_neck']!='color_by_default') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Neck Lining

                                      <span>

                                        (Complimentary Add-on)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="neck_lining" price="">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <div id="options_neck_lining" class="window top" style=<?php if(!empty($_SESSION['suit']['accents']['type_of_neck']) && $_SESSION['suit']['accents']['type_of_neck']!='color_by_default') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <input id="input_hidden_neck_lining" class="getVal" type="hidden" name="neck_lining" value="<?php if(!empty($_SESSION['suit']['accents']['neck_lining_type'])) { echo $_SESSION['suit']['accents']['neck_lining_type']; } ?>" box="neck_lining"/>

                                    <div class="op_lining">

                                      <div class="lateral_img lateral_img2 img_neck">

                                      </div>

                                      <div class="lateral_right">

                                        <div class="box_opt_neck_lining">

                                          <div>

                                            <label layer="jacket_neck_lining">

                                              <input id="neck_lining_default" class="uniform default_item" type="radio" name="neck_lining_radio" value="color_by_default" <?php if(!empty($_SESSION['suit']['accents']['type_of_neck']) && $_SESSION['suit']['accents']['type_of_neck']=='color_by_default' ) { ?> checked="checked" <?php } else if($_SESSION['suit']['accents']['type_of_neck']=='') { ?> checked="checked" <?php } ?>  price="3.95"/>

                                              Color by default

                                            </label>

                                            <label layer="jacket_neck_lining">

                                              <input id="inp_neck_lining_personalized" class="uniform personalized_item" type="radio" name="neck_lining_radio" value="custom_color" <?php if(!empty($_SESSION['suit']['accents']['type_of_neck']) && $_SESSION['suit']['accents']['type_of_neck']=='custom_color' ) { ?> checked="checked" <?php } ?> price="" rel="inp_neck_lining_personalized" extra_name="neck_lining"/>

                                              Custom color 

                                              <span class="price">

                                                

                                              </span>

                                            </label>

                                          </div>

                                        </div>

                                        <input type="hidden" name="neck_lining_price" value="<?php if(!empty($_SESSION['suit']['accents']['neck_lining_price'])) { echo $_SESSION['suit']['accents']['neck_lining_price']; } ?>">

                                        

                                        <?php 

                                           $get_neck_lining_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'2');

                                           $color_img = explode(",", $get_neck_lining_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_neck_lining_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_neck_lining_dtl[0]['color_value']);



                                        ?>



                                        <div id="neck_lining_box" class="personalized_box lateral" extra_name="neck_lining" style="display:block;">

                                          

                                          <?php if(count($color_img) > 0) {

                                             $m=0; 

                                             foreach($color_img as $key=>$value) { 



                                          ?>

                                          <div class="option_trigger common_color  <?php if(!empty($_SESSION['suit']['accents']['neck_lining_type']) && $_SESSION['suit']['accents']['neck_lining_type']==$color_name[$m]) { ?> active <?php } ?>" href="javascript:;" rel="1" color="<?php echo $color_name[$m]; ?>">

                                            <a layer="jacket_neck_lining" class="box_color color_item" href="javascript:;" img_index="0">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="115422921" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                            </a>

                                          </div>

                                          <?php ++$m; } } ?>                                          

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <!-- END FORRO CUELLO -->



                                <!-- PAÑUELO -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['suit']['accents']['type_pocket_square']) && $_SESSION['suit']['accents']['type_pocket_square']!='no_pocket') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add pocket square

                                      <span>

                                        (+10$)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="handkerchief" price="10">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <input type="hidden" name="handkerchief_price" value="<?php if(!empty($_SESSION['suit']['accents']['handkerchief_price'])) { echo $_SESSION['suit']['accents']['handkerchief_price']; } ?>">

                                  <div id="options_handkerchief" class="window handkerchief top" style=<?php if(!empty($_SESSION['suit']['accents']['type_pocket_square']) && $_SESSION['suit']['accents']['type_pocket_square']!='no_pocket') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <input id="input_hidden_handkerchief" class="getVal" type="hidden" name="handkerchief" value="<?php if(!empty($_SESSION['suit']['accents']['pocket_square_type'])) { echo $_SESSION['suit']['accents']['pocket_square_type']; } ?>" box="handkerchief"/>

                                    <div class="op_handkerchief">

                                      <div class="lateral_right" style="float:none;">

                                        <div class="box_opt_lining">

                                          <div style="float:left;">

                                            <label>

                                              <input id="handkerchief_default" class="uniform default_item" type="radio" name="handkerchief_radio" value="no_pocket" <?php if(!empty($_SESSION['suit']['accents']['type_pocket_square']) && $_SESSION['suit']['accents']['type_pocket_square']=='no_pocket' ) { ?> checked="checked" <?php } else if($_SESSION['suit']['accents']['type_pocket_square']=='') { ?> checked="checked" <?php } ?> price="10.95"/>

                                              No Pocket Square

                                            </label>

                                            <label>

                                              <input id="inp_handkerchief_personalized" class="uniform personalized_item" rel="1" type="radio" name="handkerchief_radio" value="custom_color1" price="10" rel="inp_handkerchief_personalized" <?php if(!empty($_SESSION['suit']['accents']['type_pocket_square']) && $_SESSION['suit']['accents']['type_pocket_square']=='custom_color1' ) { ?> checked="checked" <?php } ?> box="handkerchief" extra_name="handkerchief"/>

                                              Custom Color  

                                              <span class="price">

                                                (+10$)

                                              </span>

                                            </label>

                                          </div>

                                        </div>

                                        

                                        <?php 

                                           $get_pocket_sqr_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'4');

                                           $color_img = explode(",", $get_pocket_sqr_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_pocket_sqr_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_pocket_sqr_dtl[0]['color_value']);



                                        ?>

                                        <div id="handkerchief_box" class="personalized_box lateral" extra_name="handkerchief" style="display:block; width: 462px;">

                                          <?php if(count($color_img) > 0) {

                                             $n=0; 

                                             foreach($color_img as $key=>$value) { 



                                          ?>

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['suit']['accents']['pocket_square_type']) && $_SESSION['suit']['accents']['pocket_square_type']== $color_name[$n] ) { ?> active <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$n]; ?>">

                                            <a class="box_color color_item" href="javascript:;">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="1606884419" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                            </a>

                                          </div>

                                          <?php ++$n; } } ?>

                                        </div>

                                        

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <!-- END PAÑUELO -->



                                <!-- HILOS/OJALES DE LOS BOTONES (man_jacket_button_holes_threads) -->

                                <div class="extra_opt extra_3d hilo_ojal_opt extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['suit']['accents']['colored_thread_type']) || !empty($_SESSION['suit']['accents']['colored_holes_type']) || !empty($_SESSION['suit']['accents']['lapel_color']) || !empty($_SESSION['suit']['accents']['type_of_colored_button_holes']) || $_SESSION['suit']['accents']['type_of_colored_button_holes']=='by_default') { ?> open <?php } else { ?> close <?php } ?> hilo_ojal main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add colored button holes / threads 

                                      <span>

                                        (+5$)

                                      </span>

                                      <a id="cancel_button_holes_threads" href="javascript:;" class="btn_cancel_add" rel="button_holes_threads" price="5">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <div class="window hilo_ojal" style=<?php if(!empty($_SESSION['suit']['accents']['colored_thread_type']) || !empty($_SESSION['suit']['accents']['colored_holes_type']) || !empty($_SESSION['suit']['accents']['lapel_color']) || !empty($_SESSION['suit']['accents']['type_of_colored_button_holes']) || $_SESSION['suit']['accents']['type_of_colored_button_holes']=='by_default') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <div class="apply_at">

                                      <label class="by_default" layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" layer1="by_default" id="pos_bht_all" class="uniform thread_holes_selector suit_hole_default" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['suit']['accents']['type_of_colored_button_holes']) && $_SESSION['suit']['accents']['type_of_colored_button_holes']=='by_default' ) { ?> checked="checked" <?php } else if($_SESSION['suit']['accents']['type_of_colored_button_holes']=='') { ?> checked="checked" <?php } ?> value="by_default"/>

                                        By Default

                                      </label>

                                      <label layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" layer1="both_opt" id="pos_bht_all" class="uniform thread_holes_selector suit_hole_not_default" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['suit']['accents']['type_of_colored_button_holes']) && $_SESSION['suit']['accents']['type_of_colored_button_holes']=='both_placket_and_cuffs' ) { ?> checked="checked" <?php }  ?> value="both_placket_and_cuffs"/>

                                        Both Placket and Cuffs

                                      </label>

                                      <label layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" layer1="placket_only" id="pos_bht_solapa" class="uniform thread_holes_selector suit_hole_not_default" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['suit']['accents']['type_of_colored_button_holes']) && $_SESSION['suit']['accents']['type_of_colored_button_holes']=='lapel' ) { ?> checked="checked" <?php } ?> value="lapel"/>

                                        Placket only

                                      </label>

                                      <label layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" layer1="cuffs_only" id="pos_bht_cuff" class="uniform thread_holes_selector suit_hole_not_default" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['suit']['accents']['type_of_colored_button_holes']) && $_SESSION['suit']['accents']['type_of_colored_button_holes']=='cuff' ) { ?> checked="checked" <?php } ?> value="cuff"/>

                                        Cuffs only

                                      </label>

                                    </div>

                                    <br style="clear: both;">

                                    <input type="hidden" name="button_holes_threads_price" value="<?php if(!empty($_SESSION['suit']['accents']['button_holes_price'])) { echo $_SESSION['suit']['accents']['button_holes_price']; } ?>">

                                    <!--<div id="img_ojal_hilo">

                                      <div class="fabric" style="background:url(<?php echo $homeurl; ?>assets/dimg/fabric/141_big.jpg) top left no-repeat">

                                      </div>

                                      <div class="ojal ">

                                      </div>

                                      <div class="boton" style="background:url(<?php echo $homeurl; ?>assets/images/man/suit/extras/hilo_ojal/xbtn_2.png.pagespeed.ic.Pu0CtWc5cE.png) top left no-repeat">

                                      </div>

                                      <div class="hilo ">

                                      </div>

                                    </div>-->

                                    

                                    <!-- Plackets Only -->



                                    <?php 

                                           $get_btn_lapel_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'7');

                                           $color_img = explode(",", $get_btn_lapel_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_lapel_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_lapel_dtl[0]['color_value']);



                                    ?>

                                    <div id="button_thread_type" style="display:none;">

                                    <div class="shirtsection" id="placket_only">

                                    <div class="button-threads">

                                    <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/placket_only.JPG" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                    </div>

                                    <div id="box_button_threads_extra" class="list_common_color interactive_options all_colors placket_only" rel="button_holes_threads">

                                      <input id="hidden_button_threads1" class="option_input1" type="hidden" name="placket_color" value="<?php if(!empty($_SESSION['suit']['accents']['lapel_color'])) { echo $_SESSION['suit']['accents']['lapel_color']; } ?>"/>

                                     <?php

                                          if(count($color_img) > 0) { 

                                            $j=0;

                                            foreach($color_img as $key=>$value) { 

                                      ?>

                                      <div layer="jacket_button_thread" class="option_trigger common_color <?php if(!empty($_SESSION['suit']['accents']['lapel_color']) && $_SESSION['suit']['accents']['lapel_color']== $color_name[$j]) { ?> active1 <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$j]; ?>" color="<?php echo $color_name[$j]; ?>">

                                        <a layer="lapel_only" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                        </a>

                                      </div>

                                    <?php ++$j;} } ?>

                                    </div>

                                    </div>



                                    <!-- Cuffs Only -->

                                    <div id="cuffs_only"> 

                                    <div class="shirtsection">

                                    <div class="button-threads">

                                    <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/button-threads.JPG" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                    </div>

                                    

                                    <?php 

                                           $get_btn_threads_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'6');

                                           $color_img = explode(",", $get_btn_threads_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_threads_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_threads_dtl[0]['color_value']);



                                    ?>



                                    <div id="box_button_threads_extra" class="list_common_color interactive_options all_colors" rel="button_holes_threads" style=<?php if(!empty($_SESSION['suit']['accents']['type_of_button']) && $_SESSION['suit']['accents']['type_of_button']=='brass_button' ) { ?> "display:none" <?php } else { ?> "display:block" <?php } ?>>

                                      <input id="hidden_button_threads1" class="option_input1" type="hidden" name="button_holes_threads_jacket2" value="<?php if(!empty($_SESSION['suit']['accents']['colored_thread_type'])) { echo $_SESSION['suit']['accents']['colored_thread_type']; } ?>"/>

                                      <p>

                                        Button threads

                                      </p>



                                      <?php

                                          if(count($color_img) > 0) { 

                                            $k=0;

                                            foreach($color_img as $key=>$value) { 

                                      ?>

                                      <div layer="jacket_button_thread" class="option_trigger common_color <?php if(!empty($_SESSION['suit']['accents']['colored_thread_type']) && $_SESSION['suit']['accents']['colored_thread_type']==$color_name[$k] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$k]; ?>">

                                        <a layer="jacket_button_holes" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                        </a>

                                      </div>

                                    <?php ++$k; } } ?>

                                    </div>

                                    </div>

                                    <div class="shirtsection">

                                    <div class="button-holes">

                                     <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/button-holes.JPG" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                    </div>



                                    <?php 

                                           $get_btn_holes_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'5');

                                           $color_img = explode(",", $get_btn_holes_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_holes_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_holes_dtl[0]['color_value']);



                                    ?>



                                    <div class="list_common_color interactive_options all_colors box_button_holes_extra" rel="button_holes_threads">

                                      <input id="hidden_button_holes1" class="option_input1" type="hidden" name="button_holes_threads_jacket1" value="<?php if(!empty($_SESSION['suit']['accents']['colored_holes_type'])) { echo $_SESSION['suit']['accents']['colored_holes_type']; } ?>"/>

                                      <p>

                                        Button holes

                                      </p>



                                      <?php

                                          if(count($color_img) > 0) { 

                                            $l=0;

                                            foreach($color_img as $key=>$value) { 

                                      ?>

                                      <div class="option_trigger common_color  <?php if(!empty($_SESSION['suit']['accents']['colored_holes_type']) && $_SESSION['suit']['accents']['colored_holes_type']== $color_name[$l] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$l]; ?>">

                                        <a layer="jacket_button_holes1" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                        </a>

                                      </div>

                                      <?php ++$l; } } ?>

                                    </div>

                                   </div>

                                   </div>

                                  </div>

                                </div>

                               </div>

                                <!-- END HILOS/OJALES -->



                                <!-- CODERAS -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['suit']['accents']['type_of_elbow']) && $_SESSION['suit']['accents']['type_of_elbow']!='elbow_no') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add elbow patches 

                                      <span>

                                        (+10$)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="patches" price="10">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                   <input type="hidden" name="patches_price" value="<?php if(!empty($_SESSION['suit']['accents']['elbow_price'])) { echo $_SESSION['suit']['accents']['elbow_price']; } ?>">

                                  <div id="options_patches" class="window top" style=<?php if(!empty($_SESSION['suit']['accents']['type_of_elbow']) && $_SESSION['suit']['accents']['type_of_elbow']!='elbow_no') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <input id="input_hidden_patches" class="getVal" type="hidden" name="patches" value="<?php if(!empty($_SESSION['suit']['accents']['elbow_type'])) { echo $_SESSION['suit']['accents']['elbow_type']; } ?>" box="patches"/>

                                    <div class="op_patches">

                                      <div class="lateral_img img_patches2">

                                      </div>

                                      <div class="lateral_right">

                                        <div class="box_opt_patches">

                                          <div>

                                            <label layer="jacket_patches">

                                              <input id="patches_default" class="uniform default_item" type="radio" name="patches_radio" value="elbow_no" <?php if(!empty($_SESSION['suit']['accents']['type_of_elbow']) && $_SESSION['suit']['accents']['type_of_elbow']=='elbow_no' ) { ?> checked="checked" <?php } else if($_SESSION['suit']['accents']['type_of_elbow']=='') { ?> checked="checked" <?php } ?> price="10"/>

                                              No elbow patches

                                            </label>

                                            <label layer="jacket_patches">

                                              <input id="inp_patches_personalized" class="uniform personalized_item" rel="1" type="radio" name="patches_radio" value="elbow_yes" price="10" rel="inp_patches_personalized" <?php if(!empty($_SESSION['suit']['accents']['type_of_elbow']) && $_SESSION['suit']['accents']['type_of_elbow']=='elbow_yes' ) { ?> checked="checked" <?php } ?> box="patches" extra_name="patches"/>

                                              Add elbow patches  

                                              <span class="price">

                                                (+10$)

                                              </span>

                                            </label>

                                          </div>

                                        </div>



                                        <?php 

                                           $get_elbow_patch_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'3');

                                           $color_img = explode(",", $get_elbow_patch_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_elbow_patch_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_elbow_patch_dtl[0]['color_value']);



                                        ?>



                                        <div id="patches_box" class="personalized_box lateral" extra_name="patches" style="display:block;">

                                          <?php if(count($color_img) > 0) {

                                             $o=0; 

                                             foreach($color_img as $key=>$value) { 



                                          ?>

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['suit']['accents']['elbow_type']) && $_SESSION['suit']['accents']['elbow_type']== $color_name[$o]) { ?> active <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$o]; ?>">

                                            <a layer="jacket_patches" class="box_color color_item" href="javascript:;" img_index="0">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="205523977" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

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

                            

                            <!-- END box_opts-->

                          </div>

                        </div>

                        

                      </form>

        

                          <script type="text/javascript">

                            var base_href='';

                            var id_t4l_fabric={"default_fabric":"<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>","waistcoat":"<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>"}

                                ;

                            var button_code='2';

                            var waistcoat_button_code='2';

                            var id_t4l_lining={"jacket":"57","waistcoat":"57"};

                            var t4l_linings={"jacket":{"124":{"price":0}

                                     ,"123":{"price":0}

                                     ,"117":{"price":0}

                                     ,"116":{"price":0}

                                     ,"112":{"price":14.5}

                                     ,"111":{"price":19.5}

                                     ,"110":{"price":19.5}

                                     ,"109":{"price":19.5}

                                     ,"104":{"price":19.5}

                                     ,"103":{"price":19.5}

                                     ,"102":{"price":19.5}

                                     ,"101":{"price":19.5}

                                     ,"100":{"price":19.5}

                                     ,"98":{"price":19.5}

                                     ,"96":{"price":19.5}

                                     ,"92":{"price":14.5}

                                     ,"91":{"price":14.5}

                                     ,"90":{"price":14.5}

                                     ,"89":{"price":14.5}

                                     ,"88":{"price":14.5}

                                     ,"87":{"price":14.5}

                                     ,"86":{"price":14.5}

                                     ,"85":{"price":14.5}

                                     ,"84":{"price":14.5}

                                     ,"81":{"price":19.5}

                                     ,"79":{"price":19.5}

                                     ,"69":{"price":14.5}

                                     ,"65":{"price":14.5}

                                     ,"64":{"price":14.5}

                                     ,"63":{"price":14.5}

                                     ,"61":{"price":14.5}

                                     ,"60":{"price":14.5}

                                     ,"59":{"price":14.5}

                                     ,"57":{"price":0}

                                     ,"56":{"price":14.5}

                                     ,"55":{"price":14.5}

                                     ,"54":{"price":14.5}

                                     ,"53":{"price":14.5}

                                     ,"52":{"price":14.5}

                                     ,"51":{"price":14.5}

                                     ,"50":{"price":14.5}

                                     ,"35":{"price":14.5}

                                     ,"33":{"price":14.5}

                                     ,"30":{"price":14.5}

                                     ,"29":{"price":14.5}

                                     ,"26":{"price":14.5}

                                     ,"21":{"price":14.5}

                                     ,"19":{"price":14.5}

                                     ,"18":{"price":14.5}

                                    }

                           ,"waistcoat":{"124":{"price":19.5}

                                         ,"123":{"price":19.5}

                                         ,"117":{"price":14.5}

                                         ,"116":{"price":14.5}

                                         ,"112":{"price":14.5}

                                         ,"111":{"price":19.5}

                                         ,"110":{"price":19.5}

                                         ,"109":{"price":19.5}

                                         ,"104":[],"103":[],"102":[],"101":[],"100":[],"98":{"price":19.5}

                                         ,"96":{"price":19.5}

                                         ,"92":{"price":14.5}

                                         ,"91":{"price":14.5}

                                         ,"90":{"price":14.5}

                                         ,"89":{"price":14.5}

                                         ,"88":{"price":14.5}

                                         ,"87":{"price":14.5}

                                         ,"86":{"price":14.5}

                                         ,"85":{"price":14.5}

                                         ,"84":{"price":14.5}

                                         ,"81":{"price":19.5}

                                         ,"79":{"price":19.5}

                                         ,"69":{"price":14.5}

                                         ,"65":{"price":14.5}

                                         ,"64":{"price":14.5}

                                         ,"63":{"price":14.5}

                                         ,"61":{"price":14.5}

                                         ,"60":{"price":14.5}

                                         ,"59":{"price":14.5}

                                         ,"57":{"price":14.5}

                                         ,"56":{"price":14.5}

                                         ,"55":{"price":14.5}

                                         ,"54":{"price":14.5}

                                         ,"53":{"price":14.5}

                                         ,"52":{"price":14.5}

                                         ,"51":{"price":14.5}

                                         ,"50":{"price":14.5}

                                         ,"35":{"price":14.5}

                                         ,"33":{"price":14.5}

                                         ,"30":{"price":14.5}

                                         ,"29":{"price":14.5}

                                         ,"26":{"price":14.5}

                                         ,"21":{"price":14.5}

                                         ,"19":{"price":14.5}

                                         ,"18":{"price":14.5}

                                        }};

                                        var unlined_linings=[];

                                        var shoe_color='black';

                                        var suit_type='man_suit2';

                                        var product_type='man_suit2';

                                        var user_fabric_price='6.95';

                                        var id_tie='3';

                                        function show_unlined_info(){

                                          $('#unlined_info').fadeIn('slow');

                                          $('#show_more_unlined').hide();

                                        }

                                        function hide_unlined_info(elem){

                                          $(elem).parent().hide();

                                          $('#show_more_unlined').show();

                                        }

                                        var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";



                                        ready_callbacks.push(function(){

                                          Man_Suit.initCommon('#extra_form','#model_3d_preview',id_t4l_fabric,button_code,shoe_color,id_t4l_lining,waistcoat_button_code,id_tie,default_fabric_id);

                                          Man_Suit.initExtras(suit_type,$('#extras_jacket'),$('#extras_waistcoat'),id_t4l_fabric);

                                        });

                                      </script>

                          </div>

                          </div>

                           <script type="text/javascript">

                            var suit_price = {

                              "base": "<?php echo $_SESSION['p_dtl']['base_price']; ?>",

                              "fabric": <?php if($_SESSION['suit']['fabric']['fabric_price']!='') { echo $_SESSION['suit']['fabric']['fabric_price']; } else { echo $_SESSION['fab_dtl']['fab_price']; } ?>,

                              "waistcoat" : <?php if(!empty($_SESSION['suit']['style']['suit_type']) && $_SESSION['suit']['style']['suit_type']=="man_suit3") { echo $_SESSION['p_dtl']['waistcoat_price']; } else { echo 0;} ?>,

                              "extra_pant" : <?php if(!empty($_SESSION['suit']['style']['extra_pants']) && $_SESSION['suit']['style']['extra_pants']=='Yes') {  echo $_SESSION["p_dtl"]["extra_pant_price"]; } else { echo 0; } ?>,
                              
                              "patches" : <?php if(!empty($_SESSION['suit']['accents']['elbow_price'])) { echo $_SESSION['suit']['accents']['elbow_price']; } else { echo 0; } ?>,

                              "button_holes_threads_jacket" : <?php if(!empty($_SESSION['suit']['accents']['button_holes_price'])) { echo $_SESSION['suit']['accents']['button_holes_price']; } else { echo 0; } ?>,

                              "metal_buttons" : <?php if(!empty($_SESSION['suit']['accents']['metal_button_price'])) { echo $_SESSION['suit']['accents']['metal_button_price']; } else { echo 0; } ?>,

                              "handkerchief" : <?php if(!empty($_SESSION['suit']['accents']['handkerchief_price'])) { echo $_SESSION['suit']['accents']['handkerchief_price']; } else { echo 0; } ?>

                            };



                            var extra_prices = {



                             "elbow_patches" : 10,

                              "btn_holes_threads" : 5,

                              "metal_btn" :20 ,

                              "neck_lining":0,

                              "pocket_square" :10 

                            };

                            var global_dsc = 0;

                          </script>

                        </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </section>

            <div class="clearfix visible-xs visible-sm">

            </div>

            <!-- fixes floating problems when mobile menu is visible -->

        </div>

  

  <?php } else if($_SESSION['p_dtl']['sub_cat_id']=='3') { 



if(!empty($_SESSION['jacket']['fabric']['fabric_id'])) {



      $fabric_list = $_SESSION['jacket']['fabric']['fabric_id'];

      $where = "where fab_rand='".$fabric_list."'";

     

    }



    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master $where");



    if(mysqli_num_rows($fab_dtl_qry) > 0) {

        while($fr=mysqli_fetch_array($fab_dtl_qry)) {

          $_SESSION['fab_dtl'] = array('fab_id' =>$fr['fab_rand'],

               'fab_unique_id' => $fr['fab_id'],

               'fab_name' => $fr['fab_name'],

               'fab_desc' => $fr['fab_desc'],

               'fab_img' => $fr['fab_img'],

               'fab_price' => $fr['fab_price'],

               'fab_default_img' => $fr['default_img']

          );



        }

    }

    ?>  



  

  <div class="wrapper">

    

  

  <section id="Content" role="main">

    <div class="container">

      

      <!-- SECTION EMPHASIS 1 -->

      <!-- FULL WIDTH -->

    </div>

    <!-- !container -->

    <div class="full-width section-emphasis-1 page-header">

      <div class="container">

        <header class="row">

          <div class="col-md-12">

            <h1 class=" pull-left">

               <?php echo $_SESSION['p_dtl']['sub_category']; ?>

            </h1>

            <!-- BREADCRUMBS -->

              <ul class="breadcrumbs list-inline pull-right">

                <li>

                  <a href="<?php echo $homeurl;?>">Home</a>

                </li>

                <li>

                  <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$_SESSION['p_dtl']['category'])); ?>/<?php echo strtolower(str_replace(' ','-',$_SESSION['p_dtl']['sub_category'])); ?>/">

                       <?php echo $_SESSION['p_dtl']['sub_category']; ?>

                   </a>

                  </li>

                  <li>

                    Customize

                   </li>

                </ul>

                <!-- !BREADCRUMBS -->

            </div>

          </header>

        </div>

      </div>

      <!-- !full-width -->

      <!-- !FULL WIDTH -->

      <!-- !SECTION EMPHASIS 1 -->

      

      <div class="container customizer-container" style="min-height:900px;">

        <div class="row">

          <div class="col-md-12">

            <div class="row">

              <div class="col-md-12 article-wrapper">

                <nav class="garment_nav">

                  <div class="row">

                    <div class="col-xs-7">

                      <ul class="nav nav-tabs">

                        <li>

                          <a href="#" id="link_configure" class="tab">

                            Style

                          </a>

                        </li>

                        <li>

                          <a href="#" class="tab" id="link_fabric">

                            Fabric

                          </a>

                        </li>

                        <li class="active">

                          <a href="#" class="tab" id="link_extras">

                            Accents

                          </a>

                        </li>

                      </ul>

                      <div class="c-nav cf" id="extra_forms">

                        <a href="javascript:;" class="next step_next btn btn-default pull-right">

                          NEXT STEP

                        </a>

                        <a href="javascript:;" class="step_prev btn btn-default pull-right">

                          PREVIOUS

                        </a>

                        <span id="price_img" class="garment_price btn btn-default pull-right">

                          <small>

                          $

                          </small>

                             <?php echo floatval($_SESSION['p_dtl']['base_price']); ?>

                          



                        </span>

                      </div>

                    </div>

                  </div>

                </nav>                

                  <div id="body" class="man_suit2_configure garment_container">

                    <div class="body_box" id="features">

                      <div class="body_product_box_3d">

                        

                        <div id="man_suit">

                        <form method="post" id="extra_form" action="<?php echo $homeurl; ?>includes/action/action.php" class="configure_form man_waistcoat man_jacket man_suit">

                          <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">

                                <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">

                          <input type="hidden" name="section" value="accents">

                          <input type="hidden" name="order_id" value="<?php echo $_SESSION['p_dtl1']['orderid']; ?>">

                          <input type="hidden" name="action" value="<?php echo $_SESSION['p_dtl1']['action']; ?>">

                          <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">

                          <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">

                          <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">

                          <input id="go_to" name="go_to" type="hidden"/>

                          <input name="next" type="hidden" value="1"/>

                          <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['jacket']['fabric']['fabric_id'])) { echo $_SESSION['jacket']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">

                          <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['jacket']['style']['def_fab'])) { echo $_SESSION['jacket']['style']['def_fab']; } ?>">

                          <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['jacket']['style']['def_waistcoat'])) { echo $_SESSION['jacket']['style']['def_waistcoat']; } ?>">

                          

                          <input type="hidden" name="fabric_name1" value="<?php echo $_SESSION['jacket']['fabric']['fabric_name']; ?>">  



                          

                          <!-- CONFIG -->

                          <input type="hidden" name="jacket_style" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_style'])) { echo $_SESSION['jacket']['style']['jacket_style']; } ?>"/>

                          <input type="hidden" name="jacket_lapel_type" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_lapel_type'])) { echo $_SESSION['jacket']['style']['jacket_lapel_type']; } ?>"/>

                          <input type="hidden" name="jacket_buttons" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_buttons'])) { echo $_SESSION['jacket']['style']['jacket_buttons']; } ?>"/>

                          <input type="hidden" name="jacket_chest_pocket" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_chest_pocket'])) { echo $_SESSION['jacket']['style']['jacket_chest_pocket']; } ?>"/>

                          <input type="hidden" name="jacket_pockets" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_pockets'])) { echo $_SESSION['jacket']['style']['jacket_pockets']; } ?>"/>

                          <input type="hidden" name="jacket_pockets_type" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_pockets_type'])) { echo $_SESSION['jacket']['style']['jacket_pockets_type']; } ?>"/>

                          <input type="hidden" name="jacket_vent" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_vent'])) { echo $_SESSION['jacket']['style']['jacket_vent']; } ?>"/>

                          <input type="hidden" name="jacket_sleeve_buttons" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_sleeve_buttons'])) { echo $_SESSION['jacket']['style']['jacket_sleeve_buttons']; } ?>"/>

                          <input type="hidden" name="jacket_sleeve_buttonholes" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_sleeve_buttonholes'])) { echo $_SESSION['jacket']['style']['jacket_sleeve_buttonholes']; } ?>"/>

                          <input type="hidden" name="jacket_fit" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_fit'])) { echo $_SESSION['jacket']['style']['jacket_fit']; } ?>"/>

                          <input type="hidden" name="pants_fit" value="<?php if(!empty($_SESSION['jacket']['style']['pants_fit'])) { echo $_SESSION['jacket']['style']['pants_fit']; } ?>"/>

                          <input type="hidden" name="pants_peg" value="<?php if(!empty($_SESSION['jacket']['style']['pants_peg'])) { echo $_SESSION['jacket']['style']['pants_peg']; } ?>"/>

                          <input type="hidden" name="pants_back_pocket" value="<?php if(!empty($_SESSION['jacket']['style']['pants_back_pocket'])) { echo $_SESSION['jacket']['style']['pants_back_pocket']; } ?>"/>

                          <input type="hidden" name="pants_back_pocket_type" value="<?php if(!empty($_SESSION['jacket']['style']['pants_back_pocket_type'])) { echo $_SESSION['jacket']['style']['pants_back_pocket_type']; } ?>"/>

                          <input type="hidden" name="pants_cuff" value="<?php if(!empty($_SESSION['jacket']['style']['pants_cuff'])) { echo $_SESSION['jacket']['style']['pants_cuff']; } ?>"/>

                          <input type="hidden" name="pants_front_pocket" value="<?php if(!empty($_SESSION['jacket']['style']['pants_front_pocket'])) { echo $_SESSION['jacket']['style']['pants_front_pocket']; } ?>"/>

                          <input type="hidden" name="pants_ribbon" value="0"/>

                          <input type="hidden" name="pants_belt" value="<?php if(!empty($_SESSION['jacket']['style']['pants_belt'])) { echo $_SESSION['jacket']['style']['pants_belt']; } ?>"/>

                          <input type="hidden" name="waistcoat_style" value="<?php if(!empty($_SESSION['jacket']['style']['waistcoat_style'])) { echo $_SESSION['jacket']['style']['waistcoat_style']; } ?>"/>

                          <input type="hidden" name="waistcoat_bottom" value="<?php if(!empty($_SESSION['jacket']['style']['waistcoat_bottom'])) { echo $_SESSION['jacket']['style']['waistcoat_bottom']; } ?>"/>

                          <input type="hidden" name="waistcoat_buttons" value="<?php if(!empty($_SESSION['jacket']['style']['waistcoat_buttons'])) { echo $_SESSION['jacket']['style']['waistcoat_buttons']; } ?>"/>

                          <input type="hidden" name="waistcoat_chest_pocket" value="<?php if(!empty($_SESSION['jacket']['style']['waistcoat_chest_pocket'])) { echo $_SESSION['jacket']['style']['waistcoat_chest_pocket']; } ?>"/>

                          <input type="hidden" name="waistcoat_pockets_num" value="<?php if(!empty($_SESSION['jacket']['style']['waistcoat_pockets_num'])) { echo $_SESSION['jacket']['style']['waistcoat_pockets_num']; } ?>"/>

                          <input type="hidden" name="waistcoat_pockets" value="<?php if(!empty($_SESSION['jacket']['style']['waistcoat_pockets'])) { echo $_SESSION['jacket']['style']['waistcoat_pockets']; } ?>"/>

                          <input type="hidden" name="suit_type" value="<?php if(!empty($_SESSION['jacket']['style']['suit_type'])) { echo $_SESSION['jacket']['style']['suit_type']; } ?>"/>

                            

                          <div id="image_z_index">

                          </div>

                          

                          <!-- BOX RIGHT: MODEL + CONTROLS -->

                          <div class="box_right_3d suit">
                          <div style="margin:0 auto;font-weight:bold;text-align:center;width:200px;">
                              For Visual Purposes Only (Not the actual product fabric being ordered).
                            </div>

                            <div id="move">

                              <div id="control_suit">

                                

                                <!-- Rotate model -->

                                <div id="box_change_position">

                                  

                                  <a id="change_position" class="change_position" href="javascript:;" rel="front">

                                    Turn around model

                                  </a>

                                  

                                </div>

                                <!-- Show or hide jacket -->

                                <!--<div id="show_hide_pieces" class="full">

                                  

                                  <a href="javascript:;" class="show_full_parcial" rel="parcial_suit2">

                                    

                                    <span class="full">

                                      Show jacket

                                    </span>

                                    

                                    <span class="parcial">

                                      Hide jacket

                                    </span>

                                    

                                  </a>

                                  

                                </div>-->

                              </div>

                              <!-- MODEL 3D -->

                              <div id="loading">

                              </div>

                             <div class="col-md-12">

                              <div class="controls col-md-1">

                              <a data-icon="O" class="icon zoom in" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a> </div>



                              <div id="model_3d_preview" class="man_suit col-md-11" style="position: relative;">

                              </div>  

                              </div>

                              <div id="model_3d_preview1" class="man_suit">

                              </div>

                              <!-- CONTROLS -->

                              <div id="controls_3d" class="box_btns">

                                

                              </div>

                            </div>

                          </div>

                          <div class="opt_box">

                          <div class="content extras_suit suit" id="max_height_move">

                            <!-- TITLE -->

                            <!--<div class="box_title">

                              <h1 class="title">

                                Custom suits &nbsp;/

                              </h1>

                              <span class="subtitle">

                                &nbsp;Step 3: 

                                <span>

                                  Add your personal touch

                                </span>

                              </span>

                            </div>-->

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

                                <!-- FORRO INTERIOR -->

                                <div class="extra_opt extra_3d lining_opt extra_title">

                                  <div class="box_title box_title_new open lining_jacket main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Select Jacket Lining 

                                      <span>

                                        (Complimentary Add-on)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="lining_jacket" price="0">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  

                                  <div id="options_lining_jacket" class="window lining top" style="display: block;">

                                    <input id="input_hidden_lining_jacket" class="getVal" layer="jacket_lining" type="hidden" name="lining_jacket" value="<?php if(!empty($_SESSION['jacket']['accents']['jacket_lining_id'])) { echo $_SESSION['jacket']['accents']['jacket_lining_id']; } else { echo '57';  } ?>" box="lining"/>

                                    <div class="op_lining">

                                      <div class="box_opt_lining">

                                        <label>

                                          <input type="hidden" name="default_jacket_val" value="<?php if(!empty($_SESSION['jacket']['accents']['jacket_lining_type']) && $_SESSION['jacket']['accents']['jacket_lining_type']!='main_custom_color' || $_SESSION['jacket']['accents']['jacket_lining_type']=='')  { ?>yes<?php } ?>">

                                          <input id="lining_default_jacket" class="uniform default" type="radio" name="lining_jacket_radio" value="default_jacket" <?php if(!empty($_SESSION['jacket']['accents']['jacket_lining_type']) && $_SESSION['jacket']['accents']['jacket_lining_type']=='default_jacket' ) { ?> checked="checked" <?php } else if($_SESSION['jacket']['accents']['jacket_lining_type']=='') { ?> checked="checked" <?php } ?> price=""/>

                                          By default

                                        </label>

                                        <!--<label>

                                          <input id="inp_lining_unlined_jacket" class="uniform change_lining" rel="1" type="radio" name="lining_jacket_radio" value="unlined" <?php if(!empty($_SESSION['jacket']['accents']['jacket_lining_type']) && $_SESSION['jacket']['accents']['jacket_lining_type']=='unlined' ) { ?> checked="checked" <?php } ?> price="39" rel="inp_lining_unlined" box="lining"/>

                                          Unstructured (+39$)

                                          <a id="show_more_unlined" href="javascript:;" onclick="show_unlined_info();" style="font-size: 12px; margin-left: 10px; color: #2A2A2A; vertical-align: text-top;">

                                            <img src="<?php echo $homeurl; ?>assets/images/man/shirt/ico_more_info.png" pagespeed_url_hash="4158586052" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

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

                                        <label>

                                          <input id="inp_lining_personalized_jacket" class="uniform change_lining" rel="1" type="radio" name="lining_jacket_radio" value="main_custom_color" <?php if(!empty($_SESSION['jacket']['accents']['jacket_lining_type']) && $_SESSION['jacket']['accents']['jacket_lining_type']=='main_custom_color' ) { ?> checked="checked" <?php } ?> price="0" rel="inp_lining_personalized" box="lining"/>

                                          Custom color

                                        </label>

                                      </div>

                                      <br style="overflow:hidden;"/>

                                     

                                      <div id="lining_box_jacket" class="personalized_box" extra_name="lining_jacket">

                                        <div class="lining_3d">

                                          <div class="filters">

                                            <div class="preview_fabric_3d_common">

                                              <div class="preview" style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/_big.jpg) top right no-repeat">

                                              </div>

                                            </div>

                                            <br style="clear: both;"/>

                                          </div>

                                          

                                          <!-- LOAD SLIDER FABRICS -->

                                          <span class="prev" rel="back" href="javascript:;">

                                            <img src="<?php echo $homeurl; ?>assets/images/man/left_arrow_lining.png" pagespeed_url_hash="762659231" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                          </span>

                                          <div class="slider_fabrics">

                                          <input type="hidden" name="lining_jacket_price">

                                          <input type="hidden" name="jacket_lining_id" value="<?php if(!empty($_SESSION['jacket']['accents']['jacket_lining_id'])) { echo $_SESSION['jacket']['accents']['jacket_lining_id']; } ?>">

                                            <div class="slider_box" style="width: 2964px; top: 0px; left: 0px;">

                                              <table width="100%">

                                                <tbody>

                                                  <tr>

                                                    <td class="page d3" rel="0">

                                                      <div class="fabric_box_3d shirt_fabric_box">

                                                        <div style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/57_thumb.jpg) top center no-repeat" class="image suit_lining <?php if(!empty($_SESSION['jacket']['accents']['jacket_lining_id']) && $_SESSION['jacket']['accents']['jacket_lining_id']=='57') { ?> selected <?php } else if($_SESSION['jacket']['accents']['jacket_lining_id']=='') { ?> selected <?php } ?>" id="suit_lining_57" rel="57">

                                                          

                                                          <img style="<?php if(!empty($_SESSION['jacket']['accents']['jacket_lining_id']) && $_SESSION['jacket']['accents']['jacket_lining_id']=='57') { ?> display: block; <?php } else if($_SESSION['jacket']['accents']['jacket_lining_id']=='') { ?> display:block; <?php } else { ?> display:none; <?php } ?>"  class="selected" src="<?php echo $homeurl; ?>assets/images/man/selected_fabric_3d.png" title="Selected fabric" tooltip_class="selected" pagespeed_url_hash="359993417" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">

                                                          <a is_title="Hordley" style="position: relative; z-index: 5;" material="poliester" category="basic" href="javascript:;" rel="57" class="select" extra="" btn_color="">

                                                          </a>

                                                        </div>

                                                        <table class="info">

                                                          <tbody>

                                                            <tr>

                                                              <td class="title">

                                                                <a is_title="Hordley" category="basic" href="javascript:;" btn_color="" rel="57" class="select" extra="">

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

                                                        <div style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/123_thumb.jpg) top center no-repeat" class="image suit_lining <?php if(!empty($_SESSION['jacket']['accents']['jacket_lining_id']) && $_SESSION['jacket']['accents']['jacket_lining_id']=='123') { ?> selected <?php } ?>" id="suit_lining_123" rel="123">

                                                          <img style="<?php if(!empty($_SESSION['jacket']['accents']['jacket_lining_id']) && $_SESSION['jacket']['accents']['jacket_lining_id']=='123') { ?> display: block; <?php } else { ?> display:none; <?php } ?>" class="selected" src="<?php echo $homeurl; ?>assets/images/man/selected_fabric_3d.png" title="Selected fabric" tooltip_class="selected" pagespeed_url_hash="359993417" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">

                                                          <a is_title="Albury" style="position: relative; z-index: 5;" material="poliester" category="special" href="javascript:;" rel="123" class="select" extra="" btn_color="">

                                                          </a>

                                                        </div>

                                                        <table class="info">

                                                          <tbody>

                                                            <tr>

                                                              <td class="title">

                                                                <a is_title="Albury" category="special" href="javascript:;" btn_color="" rel="123" class="select" extra="">

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

                                            <img src="<?php echo $homeurl; ?>assets/images/man/right_arrow_lining.png" pagespeed_url_hash="2994667212" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                          </span>

                                        </div>

                                        

                                      </div>

                                      

                                    </div>

                                  </div>

                                </div>

                                <!-- END FORRO INTERIOR -->

                                

                                <!-- INITIALS -->

                                <div class="extra_opt extra_3d initial_opt extra_title">

                                  <!-- title extra initials -->

                                  <div class="box_title box_title_new open initials main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add Embroidery 

                                      <span>

                                        (COMPLIMENTARY ADD-ON)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="initials" price="0">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  

                                  <div class="window initials" style="display: block;">

                                    <!-- OPCIONES INICIALES -->

                                    <div class="opts_initials">

                                      <!-- Position -->

                                      <div class="op_initials">

                                        <div class="img_position_initials2 top is_jacket">

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

                                            <input type="hidden" name="font_family" value="<?php if(!empty($_SESSION['jacket']['accents']['font_family'])) { echo $_SESSION['jacket']['accents']['font_family']; } else if($_SESSION['jacket']['accents']['font_family']=='') { ?> Arial <?php } ?>">

                                            <div class="box_font_initial">

                                              

                                              <label class="positions">

                                                <input rel="Arial" class="uniform" type="radio" <?php if(!empty($_SESSION['jacket']['accents']['font_family']) && $_SESSION['jacket']['accents']['font_family']=='Arial') { ?> checked="checked" <?php } else if($_SESSION['jacket']['accents']['font_family']=='') { ?> checked="checked" <?php } ?> value="24" name="initials_jacket" rev="initials_type"/>

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/24.png" pagespeed_url_hash="2531959836" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </label>

                                              <label class="positions">

                                                <input rel="Monotype Corsiva" class="uniform" type="radio" <?php if(!empty($_SESSION['jacket']['accents']['font_family']) && $_SESSION['jacket']['accents']['font_family']=='Monotype Corsiva') { ?> checked="checked" <?php } ?> value="19" name="initials_jacket" rev="initials_type"/>

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/19.png" pagespeed_url_hash="4079675454" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </label>

                                              <label class="positions">

                                                <input rel="Times New Roman" class="uniform" type="radio" <?php if(!empty($_SESSION['jacket']['accents']['font_family']) && $_SESSION['jacket']['accents']['font_family']=='Times New Roman') { ?> checked="checked" <?php } ?> value="74" name="initials_jacket" rev="initials_type">

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/74.png" pagespeed_url_hash="2155879771" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </label>

                                              <label class="positions">

                                                <input rel="Rockwell" class="uniform" type="radio" <?php if(!empty($_SESSION['jacket']['accents']['font_family']) && $_SESSION['jacket']['accents']['font_family']=='Rockwell') { ?> checked="checked" <?php } ?> value="77" name="initials_jacket" rev="initials_type">

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/77.png" pagespeed_url_hash="3039379534" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

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

                                        <input type="hidden" name="initials_jacket_price" value="<?php if(!empty($_SESSION['jacket']['accents']['font_price'])) { echo $_SESSION['jacket']['accents']['font_price']; } ?>">

                                        <input id="txt_initial_jacket" size="20" class="my_uniform txt_initial" type="text" name="initials_jacket" maxlength="25" value="<?php if(!empty($_SESSION['jacket']['accents']['initials_jacket'])) { echo $_SESSION["jacket"]["accents"]["initials_jacket"]; } ?>"/>

                                      </div>

                                      

                                      <!-- COLOR DE LAS INICIALES -->

                                      <div class="box_opt op_initials">

                                        <div class="box_title">

                                          <p>

                                            Monogram Thread Color

                                          </p>

                                        </div>

                                         <?php 

                                           $get_mono_dtl = $site->get_accent_color('1','1');

                                           $color_img = explode(",", $get_mono_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_mono_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_mono_dtl[0]['color_value']);



                                        ?>

                                        <div class="list_common_color interactive_options all_colors " rel="initials">

                                          <input class="option_input" type="hidden" name="initials_jacket1" value="<?php if(!empty($_SESSION['jacket']['accents']['monogram_color'])) { echo $_SESSION['jacket']['accents']['monogram_color']; } else if($_SESSION['jacket']['accents']['monogram_color']=='') { echo $color_name[0]; } ?>"/>

                                           <?php

                                          if(count($color_img) > 0) { 

                                            $i=0;

                                            foreach($color_img as $key=>$value) { 

                                          ?>

                                           <div class="option_trigger common_color <?php if(!empty($_SESSION['jacket']['accents']['monogram_color']) && $_SESSION['jacket']['accents']['monogram_color']== $color_name[$i]) { ?> active <?php } else if($_SESSION['jacket']['accents']['monogram_color']=='' && $i==0) { ?> active <?php } ?>" href="javascript:;" color="<?php echo $color_name[$i]; ?>">

                                              <a class="box_color" href="javascript:;" layer="monogram_color">

                                                <div class="active">

                                                </div>

                                               <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3170554915" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </a>

                                            </div>

                                          <?php ++$i; } } ?>

                                        </div>

                                        

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <!-- END INITALS -->

                                <!-- START METAL BUTTONS -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new  open main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Type of Buttons 

                                      <span>

                                        (20$)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="metal_buttons" price="20">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <input type="hidden" name="metal_buttons_price" value="<?php if(!empty($_SESSION['jacket']['accents']['metal_button_price'])) { echo $_SESSION['jacket']['accents']['metal_button_price']; } ?>">

                                  <div id="options_metal_buttons" class="window metal_buttons top"  style="display: block;">

                                    <input id="input_hidden_metal_buttons" class="getVal" type="hidden" name="metal_buttons" value="<?php if(!empty($_SESSION['jacket']['accents']['metal_btn_type'])) { echo $_SESSION['jacket']['accents']['metal_btn_type']; } ?>" box="metal_buttons"/>

                                    <div class="op_metal_buttons">

                                      <div class="lateral_right" style="float:none;">

                                        <div class="box_opt_lining">

                                          <div style="float:left;">

                                            <label>

                                              <input layer="jacket_metal_buttons" id="metal_buttons_default" class="uniform default_item" type="radio" name="metal_buttons_radio" value="standard_button" <?php if(!empty($_SESSION['jacket']['accents']['type_of_button']) && $_SESSION['jacket']['accents']['type_of_button']=='standard_button' ) { ?> checked="checked" <?php } else if($_SESSION['jacket']['accents']['type_of_button']=='') { ?> checked="checked" <?php } ?> price="20"/>

                                              Standard Buttons

                                            </label>

                                            <label>

                                              <input layer="jacket_metal_buttons" id="inp_metal_buttons_personalized" class="uniform personalized_item" rel="1" type="radio" name="metal_buttons_radio" value="brass_button" <?php if(!empty($_SESSION['jacket']['accents']['type_of_button']) && $_SESSION['jacket']['accents']['type_of_button']=='brass_button' ) { ?> checked="checked" <?php } ?> price="20" rel="inp_metal_buttons_personalized" box="metal_buttons" extra_name="metal_buttons"/>

                                              Brass Buttons (+20$)

                                            </label>

                                          </div>

                                        </div>

                                        

                                        <div id="metal_buttons_box" class="personalized_box lateral" extra_name="metal_buttons" style="display:block; width: 462px;">

                                          

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['jacket']['accents']['metal_btn_type']) && $_SESSION['jacket']['accents']['metal_btn_type']=='gold' ) { ?> active <?php } ?>" href="javascript:;" rel="gold">

                                            <a layer="jacket_metal_buttons" class="box_color big color_item" href="javascript:;">

                                              <div class="active">

                                              </div>

                                              <!--<img class="color big_color" src="<?php echo $homeurl; ?>assets/images/man/jacket/metal_buttons/50.jpg" pagespeed_url_hash="4155628769" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>-->

                                              GOLD

                                            </a>

                                          </div>

                                          

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['jacket']['accents']['metal_btn_type']) && $_SESSION['jacket']['accents']['metal_btn_type']=='brass' ) { ?> active <?php } ?>" href="javascript:;" rel="brass">

                                            <a layer="jacket_metal_buttons" class="box_color big color_item" href="javascript:;">

                                              <div class="active">

                                              </div>

                                              <!--<img class="color big_color" src="<?php echo $homeurl; ?>assets/images/man/jacket/metal_buttons/51.jpg" pagespeed_url_hash="155161394" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>-->

                                              BRASS

                                            </a>

                                          </div>

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['jacket']['accents']['metal_btn_type']) && $_SESSION['jacket']['accents']['metal_btn_type']=='bronze' ) { ?> active <?php } ?>" href="javascript:;" rel="bronze">

                                            <a layer="jacket_metal_buttons" class="box_color big color_item" href="javascript:;">

                                              <div class="active">

                                              </div>

                                              <!--<img class="color big_color" src="<?php echo $homeurl; ?>assets/images/man/jacket/metal_buttons/52.jpg" pagespeed_url_hash="449661315" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>-->

                                              BRONZE

                                            </a>

                                          </div>

                                          

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['jacket']['accents']['metal_btn_type']) && $_SESSION['jacket']['accents']['metal_btn_type']=='silver' ) { ?> active <?php } ?>" href="javascript:;" rel="silver">

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

                                <!-- END METAL BUTTONS -->

                                

                                <!-- FORRO CUELLO -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['jacket']['accents']['type_of_neck']) && $_SESSION['jacket']['accents']['type_of_neck']!='color_by_default') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Neck Lining

                                      <span>

                                        (COMPLIMENTARY ADD-ON)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="neck_lining" price="0">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                 

                            

                                  <div id="options_neck_lining" class="window top" style=<?php if(!empty($_SESSION['jacket']['accents']['type_of_neck']) && $_SESSION['jacket']['accents']['type_of_neck']!='color_by_default') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <input id="input_hidden_neck_lining" class="getVal" type="hidden" name="neck_lining" value="<?php if(!empty($_SESSION['jacket']['accents']['neck_lining_type'])) { echo $_SESSION['jacket']['accents']['neck_lining_type']; } ?>" box="neck_lining"/>

                                    <div class="op_lining">

                                      <div class="lateral_img lateral_img2 img_neck">

                                      </div>

                                      <div class="lateral_right">

                                        <div class="box_opt_neck_lining">

                                          <div>

                                            <label layer="jacket_neck_lining">

                                              <input id="neck_lining_default" class="uniform default_item" type="radio" name="neck_lining_radio" value="color_by_default" <?php if(!empty($_SESSION['jacket']['accents']['type_of_neck']) && $_SESSION['jacket']['accents']['type_of_neck']=='color_by_default' ) { ?> checked="checked" <?php } else if($_SESSION['jacket']['accents']['type_of_neck']=='') { ?> checked="checked" <?php } ?>  price=""/>

                                              Color by default

                                            </label>

                                            <label layer="jacket_neck_lining">

                                              <input id="inp_neck_lining_personalized" class="uniform personalized_item" type="radio" name="neck_lining_radio" value="custom_color" <?php if(!empty($_SESSION['jacket']['accents']['type_of_neck']) && $_SESSION['jacket']['accents']['type_of_neck']=='custom_color' ) { ?> checked="checked" <?php } ?> price="0" rel="inp_neck_lining_personalized" extra_name="neck_lining"/>

                                              Custom color 

                                              <span class="price">

                                                

                                              </span>

                                            </label>

                                          </div>

                                        </div>



                                         <?php 

                                           $get_neck_lining_dtl = $site->get_accent_color('1','2');

                                           $color_img = explode(",", $get_neck_lining_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_neck_lining_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_neck_lining_dtl[0]['color_value']);



                                        ?>

                                        <input type="hidden" name="neck_lining_price" value="<?php if(!empty($_SESSION['jacket']['accents']['neck_lining_price'])) { echo $_SESSION['jacket']['accents']['neck_lining_price']; } ?>">

                                        <div id="neck_lining_box" class="personalized_box lateral" extra_name="neck_lining" style="display:block;">

                                          <?php if(count($color_img) > 0) {

                                             $m=0; 

                                             foreach($color_img as $key=>$value) { 



                                          ?>

                                          <div class="option_trigger common_color  <?php if(!empty($_SESSION['jacket']['accents']['neck_lining_type']) && $_SESSION['jacket']['accents']['neck_lining_type']==$color_name[$m]) { ?> active <?php } ?>" href="javascript:;" rel="1" color="<?php echo $color_name[$m]; ?>">

                                            <a layer="jacket_neck_lining" class="box_color color_item" href="javascript:;" img_index="0">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="115422921" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                            </a>

                                          </div>

                                        <?php ++$m; } } ?>

    

                                          

                                        </div>

                                        

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <!-- END FORRO CUELLO -->

                                

                                <!-- PAÑUELO -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['jacket']['accents']['type_pocket_square']) && $_SESSION['jacket']['accents']['type_pocket_square']!='no_pocket') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add pocket square

                                      <span>

                                        (+10$)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="handkerchief" price="10">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <input type="hidden" name="handkerchief_price" value="<?php if(!empty($_SESSION['jacket']['accents']['handkerchief_price'])) { echo $_SESSION['jacket']['accents']['handkerchief_price']; } ?>">

                                  <div id="options_handkerchief" class="window handkerchief top" style=<?php if(!empty($_SESSION['jacket']['accents']['type_pocket_square']) && $_SESSION['jacket']['accents']['type_pocket_square']!='no_pocket') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <input id="input_hidden_handkerchief" class="getVal" type="hidden" name="handkerchief" value="<?php if(!empty($_SESSION['jacket']['accents']['pocket_square_type'])) { echo $_SESSION['jacket']['accents']['pocket_square_type']; } ?>" box="handkerchief"/>

                                    <div class="op_handkerchief">

                                      <div class="lateral_right" style="float:none;">

                                        <div class="box_opt_lining">

                                          <div style="float:left;">

                                            <label>

                                              <input id="handkerchief_default" class="uniform default_item" type="radio" name="handkerchief_radio" value="no_pocket" <?php if(!empty($_SESSION['jacket']['accents']['type_pocket_square']) && $_SESSION['jacket']['accents']['type_pocket_square']=='no_pocket' ) { ?> checked="checked" <?php } else if($_SESSION['jacket']['accents']['type_pocket_square']=='') { ?> checked="checked" <?php } ?> price="10"/>

                                              No Pocket Square

                                            </label>

                                            <label>

                                              <input id="inp_handkerchief_personalized" class="uniform personalized_item" rel="1" type="radio" name="handkerchief_radio" value="custom_color1" price="10" rel="inp_handkerchief_personalized" <?php if(!empty($_SESSION['jacket']['accents']['type_pocket_square']) && $_SESSION['jacket']['accents']['type_pocket_square']=='custom_color1' ) { ?> checked="checked" <?php } ?> box="handkerchief" extra_name="handkerchief"/>

                                              Custom Color  

                                              <span class="price">

                                                (+10$)

                                              </span>

                                            </label>

                                          </div>

                                        </div>

                                        <?php 

                                           $get_pocket_sqr_dtl = $site->get_accent_color('1','4');

                                           $color_img = explode(",", $get_pocket_sqr_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_pocket_sqr_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_pocket_sqr_dtl[0]['color_value']);



                                        ?>

                                        <div id="handkerchief_box" class="personalized_box lateral" extra_name="handkerchief" style="display:block; width: 462px;">

                                          <?php if(count($color_img) > 0) {

                                             $n=0; 

                                             foreach($color_img as $key=>$value) { 



                                          ?>

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['jacket']['accents']['pocket_square_type']) && $_SESSION['jacket']['accents']['pocket_square_type']==$color_name[$n] ) { ?> active <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$n]; ?>">

                                            <a class="box_color color_item" href="javascript:;">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="1606884419" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                            </a>

                                          </div>

                                          <?php ++$n; } } ?>



                                        </div>

                                        

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <!-- END PAÑUELO -->

                               <!-- HILOS/OJALES DE LOS BOTONES (man_jacket_button_holes_threads) -->

                                <div class="extra_opt extra_3d hilo_ojal_opt extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['jacket']['accents']['colored_thread_type']) || !empty($_SESSION['jacket']['accents']['colored_holes_type']) || !empty($_SESSION['jacket']['accents']['lapel_color']) || !empty($_SESSION['jacket']['accents']['type_of_colored_button_holes']) || $_SESSION['jacket']['accents']['type_of_colored_button_holes']=='by_default') { ?> open <?php } else { ?> close <?php } ?> hilo_ojal main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add colored button holes / threads 

                                      <span>

                                        (+5$)

                                      </span>

                                      <a id="cancel_button_holes_threads" href="javascript:;" class="btn_cancel_add" rel="button_holes_threads" price="5">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <div class="window hilo_ojal" style=<?php if(!empty($_SESSION['jacket']['accents']['colored_thread_type']) || !empty($_SESSION['jacket']['accents']['colored_holes_type']) || !empty($_SESSION['jacket']['accents']['lapel_color']) || !empty($_SESSION['jacket']['accents']['type_of_colored_button_holes']) || $_SESSION['jacket']['accents']['type_of_colored_button_holes']=='by_default') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <div class="apply_at">

                                      <label class="by_default" layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" layer1="by_default" id="pos_bht_all" class="uniform thread_holes_selector suit_hole_default" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['jacket']['accents']['type_of_colored_button_holes']) && $_SESSION['jacket']['accents']['type_of_colored_button_holes']=='by_default' ) { ?> checked="checked" <?php } else if($_SESSION['jacket']['accents']['type_of_colored_button_holes']=='') { ?> checked="checked" <?php } ?> value="by_default"/>

                                        By Default

                                      </label>

                                      <label layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" layer1="both_opt" id="pos_bht_all" class="uniform thread_holes_selector suit_hole_not_default" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['jacket']['accents']['type_of_colored_button_holes']) && $_SESSION['jacket']['accents']['type_of_colored_button_holes']=='both_placket_and_cuffs' ) { ?> checked="checked" <?php }  ?> value="both_placket_and_cuffs"/>

                                        Both Placket and Cuffs

                                      </label>

                                      <label layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" layer1="placket_only" id="pos_bht_solapa" class="uniform thread_holes_selector suit_hole_not_default" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['jacket']['accents']['type_of_colored_button_holes']) && $_SESSION['jacket']['accents']['type_of_colored_button_holes']=='lapel' ) { ?> checked="checked" <?php } ?> value="lapel"/>

                                        Placket only

                                      </label>

                                      <label layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" layer1="cuffs_only" id="pos_bht_cuff" class="uniform thread_holes_selector suit_hole_not_default" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['jacket']['accents']['type_of_colored_button_holes']) && $_SESSION['jacket']['accents']['type_of_colored_button_holes']=='cuff' ) { ?> checked="checked" <?php } ?> value="cuff"/>

                                        Cuffs only

                                      </label>

                                    </div>

                                    <br style="clear: both;">

                                    <input type="hidden" name="button_holes_threads_price" value="<?php if(!empty($_SESSION['jacket']['accents']['button_holes_price'])) { echo $_SESSION['jacket']['accents']['button_holes_price']; } ?>">

                                    <!--<div id="img_ojal_hilo">

                                      <div class="fabric" style="background:url(<?php echo $homeurl; ?>assets/dimg/fabric/141_big.jpg) top left no-repeat">

                                      </div>

                                      <div class="ojal ">

                                      </div>

                                      <div class="boton" style="background:url(<?php echo $homeurl; ?>assets/images/man/suit/extras/hilo_ojal/xbtn_2.png.pagespeed.ic.Pu0CtWc5cE.png) top left no-repeat">

                                      </div>

                                      <div class="hilo ">

                                      </div>

                                    </div>-->

                                    

                                    <!-- Plackets Only -->



                                    <?php 

                                           $get_btn_lapel_dtl = $site->get_accent_color('1','7');

                                           $color_img = explode(",", $get_btn_lapel_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_lapel_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_lapel_dtl[0]['color_value']);



                                    ?>

                                    <div id="button_thread_type" style="display:none;">

                                    <div class="shirtsection" id="placket_only">

                                    <div class="button-threads">

                                    <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/placket_only.JPG" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                    </div>

                                    <div id="box_button_threads_extra" class="list_common_color interactive_options all_colors placket_only" rel="button_holes_threads">

                                      <input id="hidden_button_threads1" class="option_input1" type="hidden" name="placket_color" value="<?php if(!empty($_SESSION['jacket']['accents']['lapel_color'])) { echo $_SESSION['jacket']['accents']['lapel_color']; } ?>"/>

                                     <?php

                                          if(count($color_img) > 0) { 

                                            $j=0;

                                            foreach($color_img as $key=>$value) { 

                                      ?>

                                      <div layer="jacket_button_thread" class="option_trigger common_color <?php if(!empty($_SESSION['jacket']['accents']['lapel_color']) && $_SESSION['jacket']['accents']['lapel_color']== $color_name[$j]) { ?> active1 <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$j]; ?>" color="<?php echo $color_name[$j]; ?>">

                                        <a layer="lapel_only" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                        </a>

                                      </div>

                                    <?php ++$j;} } ?>

                                    </div>

                                    </div>



                                    <!-- Cuffs Only -->

                                    <div id="cuffs_only"> 

                                    <div class="shirtsection">

                                    <div class="button-threads">

                                    <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/button-threads.JPG" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                    </div>

                                    

                                    <?php 

                                           $get_btn_threads_dtl = $site->get_accent_color('1','6');

                                           $color_img = explode(",", $get_btn_threads_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_threads_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_threads_dtl[0]['color_value']);



                                    ?>



                                    <div id="box_button_threads_extra" class="list_common_color interactive_options all_colors" rel="button_holes_threads" style=<?php if(!empty($_SESSION['jacket']['accents']['type_of_button']) && $_SESSION['jacket']['accents']['type_of_button']=='brass_button' ) { ?> "display:none" <?php } else { ?> "display:block" <?php } ?>>

                                      <input id="hidden_button_threads1" class="option_input1" type="hidden" name="button_holes_threads_jacket2" value="<?php if(!empty($_SESSION['jacket']['accents']['colored_thread_type'])) { echo $_SESSION['jacket']['accents']['colored_thread_type']; } ?>"/>

                                      <p>

                                        Button threads

                                      </p>



                                      <?php

                                          if(count($color_img) > 0) { 

                                            $k=0;

                                            foreach($color_img as $key=>$value) { 

                                      ?>

                                      <div layer="jacket_button_thread" class="option_trigger common_color <?php if(!empty($_SESSION['jacket']['accents']['colored_thread_type']) && $_SESSION['jacket']['accents']['colored_thread_type']==$color_name[$k] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$k]; ?>">

                                        <a layer="jacket_button_holes" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                        </a>

                                      </div>

                                    <?php ++$k; } } ?>

                                    </div>

                                    </div>

                                    <div class="shirtsection">

                                    <div class="button-holes">

                                     <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/button-holes.JPG" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                    </div>



                                    <?php 

                                           $get_btn_holes_dtl = $site->get_accent_color('1','5');

                                           $color_img = explode(",", $get_btn_holes_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_holes_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_holes_dtl[0]['color_value']);



                                    ?>



                                    <div class="list_common_color interactive_options all_colors" rel="button_holes_threads">

                                      <input id="hidden_button_holes1" class="option_input1" type="hidden" name="button_holes_threads_jacket1" value="<?php if(!empty($_SESSION['jacket']['accents']['colored_holes_type'])) { echo $_SESSION['jacket']['accents']['colored_holes_type']; } ?>"/>

                                      <p>

                                        Button holes

                                      </p>



                                      <?php

                                          if(count($color_img) > 0) { 

                                            $l=0;

                                            foreach($color_img as $key=>$value) { 

                                      ?>

                                      <div class="option_trigger common_color  <?php if(!empty($_SESSION['jacket']['accents']['colored_holes_type']) && $_SESSION['jacket']['accents']['colored_holes_type']== $color_name[$l] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$l]; ?>">

                                        <a layer="jacket_button_holes1" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                        </a>

                                      </div>

                                      <?php ++$l; } } ?>

                                    </div>

                                   </div>

                                   </div>

                                  </div>

                                </div>

                               </div>

                                <!-- END HILOS/OJALES -->



                                <!-- CODERAS -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['jacket']['accents']['type_of_elbow']) && $_SESSION['jacket']['accents']['type_of_elbow']!='elbow_no') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add elbow patches 

                                      <span>

                                        (+10$)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="patches" price="10">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                   <input type="hidden" name="patches_price" value="<?php if(!empty($_SESSION['jacket']['accents']['elbow_price'])) { echo $_SESSION['jacket']['accents']['elbow_price']; } ?>">

                                  <div id="options_patches" class="window top" style=<?php if(!empty($_SESSION['jacket']['accents']['type_of_elbow']) && $_SESSION['jacket']['accents']['type_of_elbow']!='elbow_no') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <input id="input_hidden_patches" class="getVal" type="hidden" name="patches" value="<?php if(!empty($_SESSION['jacket']['accents']['elbow_type'])) { echo $_SESSION['jacket']['accents']['elbow_type']; } ?>" box="patches"/>

                                    <div class="op_patches">

                                      <div class="lateral_img img_patches2 img_patches">

                                      </div>

                                      <div class="lateral_right">

                                        <div class="box_opt_patches">

                                          <div>

                                            <label layer="jacket_patches">

                                              <input id="patches_default" class="uniform default_item" type="radio" name="patches_radio" value="elbow_no" <?php if(!empty($_SESSION['jacket']['accents']['type_of_elbow']) && $_SESSION['jacket']['accents']['type_of_elbow']=='elbow_no' ) { ?> checked="checked" <?php } else if($_SESSION['jacket']['accents']['type_of_elbow']=='') { ?> checked="checked" <?php } ?> price="10"/>

                                              No elbow patches

                                            </label>

                                            <label layer="jacket_patches">

                                              <input id="inp_patches_personalized" class="uniform personalized_item" rel="1" type="radio" name="patches_radio" value="elbow_yes" price="10" rel="inp_patches_personalized" <?php if(!empty($_SESSION['jacket']['accents']['type_of_elbow']) && $_SESSION['jacket']['accents']['type_of_elbow']=='elbow_yes' ) { ?> checked="checked" <?php } ?> box="patches" extra_name="patches"/>

                                              Add elbow patches  

                                              <span class="price">

                                                (+10$)

                                              </span>

                                            </label>

                                          </div>

                                        </div>



                                         <?php 

                                           $get_elbow_patch_dtl = $site->get_accent_color('1','3');

                                           $color_img = explode(",", $get_elbow_patch_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_elbow_patch_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_elbow_patch_dtl[0]['color_value']);



                                        ?>

                                        <div id="patches_box" class="personalized_box lateral" extra_name="patches" style="display:block;">

                                          <?php if(count($color_img) > 0) {

                                             $o=0; 

                                             foreach($color_img as $key=>$value) { 



                                          ?>

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['jacket']['accents']['elbow_type']) && $_SESSION['jacket']['accents']['elbow_type']==$color_name[$o] ) { ?> active <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$o]; ?>">

                                            <a layer="jacket_patches" class="box_color color_item" href="javascript:;" img_index="0">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="205523977" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

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

                            

                            <!-- END box_opts-->

                          </div>

                        </div>

                        

                      </form>

        

                          <script type="text/javascript">

                            var base_href='';

                            var id_t4l_fabric={"default_fabric":"<?php if(!empty($_SESSION['jacket']['fabric']['fabric_id'])) { echo $_SESSION['jacket']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>","waistcoat":"<?php if(!empty($_SESSION['jacket']['fabric']['fabric_id'])) { echo $_SESSION['jacket']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>"}

                                ;

                            var button_code='2';

                            var waistcoat_button_code='2';

                            var id_t4l_lining={"jacket":"57","waistcoat":"57"};

                            var t4l_linings={"jacket":{"124":{"price":19.5}

                                     ,"123":{"price":0}

                                     ,"117":{"price":14.5}

                                     ,"116":{"price":14.5}

                                     ,"112":{"price":14.5}

                                     ,"111":{"price":19.5}

                                     ,"110":{"price":19.5}

                                     ,"109":{"price":19.5}

                                     ,"104":{"price":19.5}

                                     ,"103":{"price":19.5}

                                     ,"102":{"price":19.5}

                                     ,"101":{"price":19.5}

                                     ,"100":{"price":19.5}

                                     ,"98":{"price":19.5}

                                     ,"96":{"price":19.5}

                                     ,"92":{"price":14.5}

                                     ,"91":{"price":14.5}

                                     ,"90":{"price":14.5}

                                     ,"89":{"price":14.5}

                                     ,"88":{"price":14.5}

                                     ,"87":{"price":14.5}

                                     ,"86":{"price":14.5}

                                     ,"85":{"price":14.5}

                                     ,"84":{"price":14.5}

                                     ,"81":{"price":19.5}

                                     ,"79":{"price":19.5}

                                     ,"69":{"price":14.5}

                                     ,"65":{"price":14.5}

                                     ,"64":{"price":14.5}

                                     ,"63":{"price":14.5}

                                     ,"61":{"price":14.5}

                                     ,"60":{"price":14.5}

                                     ,"59":{"price":14.5}

                                     ,"57":{"price":0}

                                     ,"56":{"price":14.5}

                                     ,"55":{"price":14.5}

                                     ,"54":{"price":14.5}

                                     ,"53":{"price":14.5}

                                     ,"52":{"price":14.5}

                                     ,"51":{"price":14.5}

                                     ,"50":{"price":14.5}

                                     ,"35":{"price":14.5}

                                     ,"33":{"price":14.5}

                                     ,"30":{"price":14.5}

                                     ,"29":{"price":14.5}

                                     ,"26":{"price":14.5}

                                     ,"21":{"price":14.5}

                                     ,"19":{"price":14.5}

                                     ,"18":{"price":14.5}

                                    }

                           ,"waistcoat":{"124":{"price":19.5}

                                         ,"123":{"price":19.5}

                                         ,"117":{"price":14.5}

                                         ,"116":{"price":14.5}

                                         ,"112":{"price":14.5}

                                         ,"111":{"price":19.5}

                                         ,"110":{"price":19.5}

                                         ,"109":{"price":19.5}

                                         ,"104":[],"103":[],"102":[],"101":[],"100":[],"98":{"price":19.5}

                                         ,"96":{"price":19.5}

                                         ,"92":{"price":14.5}

                                         ,"91":{"price":14.5}

                                         ,"90":{"price":14.5}

                                         ,"89":{"price":14.5}

                                         ,"88":{"price":14.5}

                                         ,"87":{"price":14.5}

                                         ,"86":{"price":14.5}

                                         ,"85":{"price":14.5}

                                         ,"84":{"price":14.5}

                                         ,"81":{"price":19.5}

                                         ,"79":{"price":19.5}

                                         ,"69":{"price":14.5}

                                         ,"65":{"price":14.5}

                                         ,"64":{"price":14.5}

                                         ,"63":{"price":14.5}

                                         ,"61":{"price":14.5}

                                         ,"60":{"price":14.5}

                                         ,"59":{"price":14.5}

                                         ,"57":{"price":14.5}

                                         ,"56":{"price":14.5}

                                         ,"55":{"price":14.5}

                                         ,"54":{"price":14.5}

                                         ,"53":{"price":14.5}

                                         ,"52":{"price":14.5}

                                         ,"51":{"price":14.5}

                                         ,"50":{"price":14.5}

                                         ,"35":{"price":14.5}

                                         ,"33":{"price":14.5}

                                         ,"30":{"price":14.5}

                                         ,"29":{"price":14.5}

                                         ,"26":{"price":14.5}

                                         ,"21":{"price":14.5}

                                         ,"19":{"price":14.5}

                                         ,"18":{"price":14.5}

                                        }};

                                        var unlined_linings=[];

                                        var shoe_color='';

                                        var suit_type='man_suit2';

                                        var product_type='man_jacket';

                                        var user_fabric_price='6.95';

                                        var id_tie='3';

                                        function show_unlined_info(){

                                          $('#unlined_info').fadeIn('slow');

                                          $('#show_more_unlined').hide();

                                        }

                                        function hide_unlined_info(elem){

                                          $(elem).parent().hide();

                                          $('#show_more_unlined').show();

                                        }

                                        var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";



                                        ready_callbacks.push(function(){

                                          Man_Suit.initCommon('#extra_form','#model_3d_preview',id_t4l_fabric,button_code,shoe_color,id_t4l_lining,waistcoat_button_code,id_tie,default_fabric_id);

                                          Man_Suit.initExtras(suit_type,$('#extras_jacket'),$('#extras_waistcoat'),id_t4l_fabric);

                                        });

                                      </script>

                          </div>

                          </div>

                            <script type="text/javascript">

                            var suit_price = {

                              "base": "<?php echo $_SESSION['p_dtl']['base_price']; ?>",

                              "fabric": <?php if($_SESSION['jacket']['fabric']['fabric_price']!='') { echo $_SESSION['jacket']['fabric']['fabric_price']; } else { echo $_SESSION['fab_dtl']['fab_price']; } ?>,

                              "waistcoat" : <?php if(!empty($_SESSION['jacket']['style']['suit_type']) && $_SESSION['jacket']['style']['suit_type']=="man_suit3") { echo $_SESSION['p_dtl']['waistcoat_price']; } else { echo 0;} ?>,

                              "extra_pant" : <?php if(!empty($_SESSION['jacket']['style']['extra_pants']) && $_SESSION['jacket']['style']['extra_pants']=='Yes') {  echo $_SESSION["p_dtl"]["extra_pant_price"]; } else { echo 0; } ?>,
                              
                              "patches" : <?php if(!empty($_SESSION['jacket']['accents']['elbow_price'])) { echo $_SESSION['jacket']['accents']['elbow_price']; } else { echo 0; } ?>,

                              "button_holes_threads_jacket" : <?php if(!empty($_SESSION['jacket']['accents']['button_holes_price'])) { echo $_SESSION['jacket']['accents']['button_holes_price']; } else { echo 0; } ?>,

                              "metal_buttons" : <?php if(!empty($_SESSION['jacket']['accents']['metal_button_price'])) { echo $_SESSION['jacket']['accents']['metal_button_price']; } else { echo 0; } ?>,

                              "handkerchief" : <?php if(!empty($_SESSION['jacket']['accents']['handkerchief_price'])) { echo $_SESSION['jacket']['accents']['handkerchief_price']; } else { echo 0; } ?>

                            };



                            var extra_prices = {



                             "elbow_patches" : 10,

                              "btn_holes_threads" : 5,

                              "metal_btn" :20 ,

                               "neck_lining":0,

                              "pocket_square" :10 

                            };

                            var global_dsc = 0;

                          </script>

                        </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </section>

            <div class="clearfix visible-xs visible-sm">

            </div>

            <!-- fixes floating problems when mobile menu is visible -->

        </div>

  

  <?php } else if($_SESSION['p_dtl']['sub_cat_id']=='2') { 



if(!empty($_SESSION['shirt']['fabric']['fabric_id'])) {



      $fabric_list = $_SESSION['shirt']['fabric']['fabric_id'];

      $where = "where fab_rand='".$fabric_list."'";

     

    }



    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master $where");



    if(mysqli_num_rows($fab_dtl_qry) > 0) {

        while($fr=mysqli_fetch_array($fab_dtl_qry)) {

          $_SESSION['fab_dtl'] = array('fab_id' =>$fr['fab_rand'],

               'fab_unique_id' => $fr['fab_id'],

               'fab_name' => $fr['fab_name'],

               'fab_desc' => $fr['fab_desc'],

               'fab_img' => $fr['fab_img'],

               'fab_price' => $fr['fab_price'],

               'fab_default_img' => $fr['default_img']

          );



        }

    }

    ?>  



  

  <div class="wrapper">

    

  

  <section id="Content" role="main">

    <div class="container">

      

      <!-- SECTION EMPHASIS 1 -->

      <!-- FULL WIDTH -->

    </div>

    <!-- !container -->

    <div class="full-width section-emphasis-1 page-header">

      <div class="container">

        <header class="row">

          <div class="col-md-12">

            <h1 class=" pull-left">

               <?php echo $_SESSION['p_dtl']['sub_category']; ?>

            </h1>

            <!-- BREADCRUMBS -->

              <ul class="breadcrumbs list-inline pull-right">

                <li>

                  <a href="<?php echo $homeurl;?>">Home</a>

                </li>

                <li>

                  <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$_SESSION['p_dtl']['category'])); ?>/<?php echo strtolower(str_replace(' ','-',$_SESSION['p_dtl']['sub_category'])); ?>/">

                       <?php echo $_SESSION['p_dtl']['sub_category']; ?>

                   </a>

                  </li>

                  <li>

                    Customize

                   </li>

                </ul>

                <!-- !BREADCRUMBS -->

            </div>

          </header>

        </div>

      </div>

      <!-- !full-width -->

      <!-- !FULL WIDTH -->

      <!-- !SECTION EMPHASIS 1 -->

      

      <div class="container customizer-container" style="min-height:900px;">

        <div class="row">

          <div class="col-md-12">

            <div class="row">

              <div class="col-md-12 article-wrapper">

                <nav class="garment_nav">

                  <div class="row">

                    <div class="col-xs-7">

                      <ul class="nav nav-tabs">

                        <li>

                          <a href="#" id="link_configure" class="tab">

                            Style

                          </a>

                        </li>

                        <li>

                          <a href="#" class="tab" id="link_fabric">

                            Fabric

                          </a>

                        </li>

                        <li class="active">

                          <a href="#" class="tab" id="link_extras">

                            Accents

                          </a>

                        </li>

                      </ul>

                      <div class="c-nav cf" id="extra_forms1">

                        <a href="javascript:;" class="next step_next btn btn-default pull-right">

                          NEXT STEP

                        </a>

                        <a href="javascript:;" class="step_prev btn btn-default pull-right">

                          PREVIOUS

                        </a>

                        <span id="price_img" class="garment_price btn btn-default pull-right">

                           <small>

                          $

                          </small>

                             <?php echo floatval($_SESSION['p_dtl']['base_price']); ?>

                         



                        </span>

                      </div>

                    </div>

                  </div>

                </nav>                

                  <div id="body" class="man_suit2_configure garment_container">

                    <div class="body_box" id="features">

                      <div class="body_product_box_3d">

                        

                        <div id="man_suit">

                        <form method="post" id="extra_form" action="<?php echo $homeurl; ?>includes/action/action.php" class="configure_form man_waistcoat man_jacket man_suit">

                          <input type="hidden" name="section" value="accents">

                          <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">

                                                    <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">



                          <input type="hidden" name="order_id" value="<?php echo $_SESSION['p_dtl1']['orderid']; ?>">

                          <input type="hidden" name="action" value="<?php echo $_SESSION['p_dtl1']['action']; ?>">

                          <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">

                          <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">

                          <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">

                          <input id="go_to" name="go_to" type="hidden"/>

                          <input name="next" type="hidden" value="1"/>

                          <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['shirt']['fabric']['fabric_id'])) { echo $_SESSION['shirt']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">

                          <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['shirt']['style']['def_fab'])) { echo $_SESSION['shirt']['style']['def_fab']; } ?>">

                          <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['shirt']['style']['def_waistcoat'])) { echo $_SESSION['shirt']['style']['def_waistcoat']; } ?>">

                          <input type="hidden" name="fabric_name1" value="<?php echo $_SESSION['shirt']['fabric']['fabric_name']; ?>">  



                          

                          <!-- CONFIG -->

                          <input type="hidden" name="shirt_sleeve" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_sleeve'])) { echo $_SESSION['shirt']['style']['shirt_sleeve']; } ?>"/>

                          <input type="hidden" name="shirt_fit" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_fit'])) { echo $_SESSION['shirt']['style']['shirt_fit']; } ?>"/>

                          <input type="hidden" name="shirt_neck" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_neck'])) { echo $_SESSION['shirt']['style']['shirt_neck']; } ?>"/>

                          <input type="hidden" name="shirt_neck_no_interfacing" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_neck_no_interfacing'])) { echo $_SESSION['shirt']['style']['shirt_neck_no_interfacing']; } ?>"/>

                          <input type="hidden" name="shirt_neck_buttons" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_neck_buttons'])) { echo $_SESSION['shirt']['style']['shirt_neck_buttons']; } ?>"/>

                          <input type="hidden" name="shirt_cuffs" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs'])) { echo $_SESSION['shirt']['style']['shirt_cuffs']; } ?>"/>

                          <input type="hidden" name="shirt_chest_pocket" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket'])) { echo $_SESSION['shirt']['style']['shirt_chest_pocket']; } ?>"/>

                          <input type="hidden" name="shirt_chest_pocket_type" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket_type'])) { echo $_SESSION['shirt']['style']['shirt_chest_pocket_type']; } ?>"/>

                          <input type="hidden" name="shirt_button_close" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_button_close'])) { echo $_SESSION['shirt']['style']['shirt_button_close']; } ?>"/>

                          <input type="hidden" name="shirt_cut" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_cut'])) { echo $_SESSION['shirt']['style']['shirt_cut']; } ?>"/>

                          <input type="hidden" name="shirt_pleats" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_pleats'])) { echo $_SESSION['shirt']['style']['shirt_pleats']; } ?>"/>

                          

                          <div id="image_z_index">

                          </div>

                          

                          <!-- BOX RIGHT: MODEL + CONTROLS -->

                          <div class="box_right_3d suit">
                          <div style="margin:0 auto;font-weight:bold;text-align:center;width:200px;">
                              For Visual Purposes Only (Not the actual product fabric being ordered).
                            </div>

                            <div id="move">

                              <div id="control_suit">

                                

                                <!-- Rotate model -->

                                

                              </div>

                              <!-- MODEL 3D -->

                              <div id="loading">

                              </div>

                              <div class="col-md-12">

                              <div class="controls col-md-1">

                              <a data-icon="O" class="icon zoom in" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a> </div>



                              <div id="model_3d_preview" class="man_suit col-md-11" style="position: relative;">

                              </div>  

                              </div>

                              <div id="model_3d_preview1" class="man_suit">

                              </div>

                              <!-- CONTROLS -->

                              <div id="controls_3d" class="box_btns">

                                

                              </div>

                            </div>

                          </div>

                          <div class="opt_box">

                          <div class="content extras_suit suit" id="max_height_move">

                            <!-- TITLE -->

                            <!--<div class="box_title">

                              <h1 class="title">

                                Custom shirts &nbsp;/

                              </h1>

                              <span class="subtitle">

                                &nbsp;Step 3: 

                                <span>

                                  Add your personal touch

                                </span>

                              </span>

                            </div>-->

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

                                <!-- FORRO INTERIOR -->

                                

                                <!-- END FORRO INTERIOR -->

                                

                                <!-- INITIALS -->

                                <div class="extra_opt extra_3d initial_opt extra_title">

                                  <!-- title extra initials -->

                                  <div class="box_title box_title_new open initials main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add Monogram 

                                      <span>

                                        (Complimentary Add-on)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="initials" price="">

                                        Delete

                                      </a>

                                    </p>

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

                                            <input type="hidden" name="font_family" value="<?php if(!empty($_SESSION['shirt']['accents']['font_family'])) { echo $_SESSION['shirt']['accents']['font_family']; } else if($_SESSION['shirt']['accents']['font_family']=='') { ?> Arial <?php } ?>">

                                            <div class="box_font_initial">

                                              

                                              <label class="positions">

                                                <input rel="Arial" class="uniform" type="radio" <?php if(!empty($_SESSION['shirt']['accents']['font_family']) && $_SESSION['shirt']['accents']['font_family']=='Arial') { ?> checked="checked" <?php } else if($_SESSION['shirt']['accents']['font_family']=='') { ?> checked="checked" <?php } ?> value="24" name="initials_jacket" rev="initials_type"/>

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/24.png" pagespeed_url_hash="2531959836" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </label>

                                              <label class="positions">

                                                <input rel="Monotype Corsiva" class="uniform" type="radio" <?php if(!empty($_SESSION['shirt']['accents']['font_family']) && $_SESSION['shirt']['accents']['font_family']=='Monotype Corsiva') { ?> checked="checked" <?php } ?> value="19" name="initials_jacket" rev="initials_type"/>

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/19.png" pagespeed_url_hash="4079675454" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </label>

                                              <label class="positions">

                                                <input rel="Times New Roman" class="uniform" type="radio" <?php if(!empty($_SESSION['shirt']['accents']['font_family']) && $_SESSION['shirt']['accents']['font_family']=='Times New Roman') { ?> checked="checked" <?php } ?> value="74" name="initials_jacket" rev="initials_type">

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/74.png" pagespeed_url_hash="2155879771" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                              </label>

                                              <label class="positions">

                                                <input rel="Rockwell" class="uniform" type="radio" <?php if(!empty($_SESSION['shirt']['accents']['font_family']) && $_SESSION['shirt']['accents']['font_family']=='Rockwell') { ?> checked="checked" <?php } ?> value="77" name="initials_jacket" rev="initials_type">

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/77.png" pagespeed_url_hash="3039379534" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

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

                                        <input type="hidden" name="initials_jacket_price" value="<?php if(!empty($_SESSION['shirt']['accents']['font_price'])) { echo $_SESSION['shirt']['accents']['font_price']; } ?>">

                                        <input id="txt_initial_jacket" size="20" class="my_uniform txt_initial" type="text" name="initials_jacket" maxlength="25" value="<?php if(!empty($_SESSION['shirt']['accents']['initials_jacket'])) { echo $_SESSION["shirt"]["accents"]["initials_jacket"]; } ?>"/>

                                      </div>

                                      

                                      <!-- COLOR DE LAS INICIALES -->

                                      <div class="box_opt op_initials">

                                        <div class="box_title">

                                          <p>

                                            Monogram Position Cuff Pocket Collar

                                          </p>

                                        </div>

                                         <?php 

                                           $get_mono_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'8');

                                           $color_img = explode(",", $get_mono_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_mono_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_mono_dtl[0]['color_value']);



                                        ?>

                                        <div class="list_common_color interactive_options all_colors " rel="initials">

                                          <input class="" type="hidden" name="initials_jacket1" value="<?php if(!empty($_SESSION['shirt']['accents']['monogram_color'])) { echo $_SESSION['shirt']['accents']['monogram_color']; } else if($_SESSION['shirt']['accents']['monogram_color']=='') { echo $color_name[0]; } ?>"/>

                                          <?php

                                          if(count($color_img) > 0) { 

                                            $i=0;

                                            foreach($color_img as $key=>$value) { 

                                          ?>

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['shirt']['accents']['monogram_color']) && $_SESSION['shirt']['accents']['monogram_color']== $color_name[$i]) { ?> active <?php } else if($_SESSION['shirt']['accents']['monogram_color']=='' && $i==0) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$i]; ?>">

                                            <a class="box_color" href="javascript:;" layer="monogram_color">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3170554915" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                            </a>

                                          </div>

                                        <?php ++$i; } } ?>

                                        </div>

                                        

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <!-- END INITALS -->

                              

                                

                                <!-- FORRO CUELLO -->

                                <input type="hidden" name="neck_type" value="<?php echo $_SESSION['shirt']['accents']['neck_styling']; ?>">

                                <div class="extra_opt extra_3d extra_title collar-lining">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['shirt']['accents']['neck_styling']) && $_SESSION['shirt']['accents']['neck_styling']!='') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Customize Collar Lining

                                      <span>

                                        (+10$)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="neck_styling" price="10">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <div id="options_neck_lining" class="window top neck_styling" style=<?php if(!empty($_SESSION['shirt']['accents']['neck_styling']) && $_SESSION['shirt']['accents']['neck_styling']!='') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <div class="op_lining">

                                      <div class="lateral_right">

                                       <input type="hidden" name="neck_lining_price" value="<?php if(!empty($_SESSION['shirt']['accents']['neck_lining_price'])) { echo $_SESSION['shirt']['accents']['neck_lining_price']; } ?>">

                                        <!--<div id="neck_lining_box" class="personalized_box lateral" extra_name="neck_lining" style="display:block;">

                                          <div class="box_opt">

                                            <div class="radio_opt">

                                              <label class="option">

                                                <input layer="fabric_type" <?php if(!empty($_SESSION['shirt']['accents']['neck_styling']) && $_SESSION['shirt']['accents']['neck_styling']=='inner_fabric' ) { ?> checked="checked" <?php } ?> class="uniform radio_opt neck_styling" rel="neck_lining" type="radio" name="neck_styling" value="inner_fabric" price="4.95">

                                                  Inner Fabric

                                              </label>

                                             </div>

                                            </div>

                                          <div class="box_opt">

                                          <div class="radio_opt">

                                            <label class="option">

                                              <input layer="fabric_type" <?php if(!empty($_SESSION['shirt']['accents']['neck_styling']) && $_SESSION['shirt']['accents']['neck_styling']=='outer_fabric' ) { ?> checked="checked" <?php } ?> class="uniform radio_opt" rel="neck_lining" type="radio" name="neck_styling" value="outer_fabric" price="4.95">

                                                Outer Fabric

                                              </label>

                                            </div>

                                          </div>

                                        </div>-->

                                        <div class="body_product_box_3d">

                                        <div class="box_opt">

                                        <div layer="collar_neck_lining" class="option_trigger common_th mini_pocket collar_inner_fabric <?php if(!empty($_SESSION['shirt']['accents']['neck_styling']) && $_SESSION['shirt']['accents']['neck_styling']=='inner_fabric') { ?> active <?php }  ?>" href="javascript:;" rel="neck_lining" price="10">

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

                                          <div layer="collar_neck_lining" class="option_trigger common_th mini_pocket collar_outer_fabric <?php if(!empty($_SESSION['shirt']['accents']['neck_styling']) && $_SESSION['shirt']['accents']['neck_styling']=='outer_fabric') { ?> active <?php }  ?>" href="javascript:;" rel="neck_lining" price="10">

                                          <div class="box_model">

                                            <div class="active">

                                            </div>

                                            <img alt="Collar Neck Lining: Outer Fabric" src="<?php echo $homeurl; ?>/assets/images/man/shirt/collar_lining/collar_outer_fabric.JPG" class="">

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

                                    <?php 

                                           $get_clr_lining_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'9');

                                           $color_img = explode(",", $get_clr_lining_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_clr_lining_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_clr_lining_dtl[0]['color_value']);



                                        ?>

                                    <div class="list_common_color interactive_options all_colors collar_neck_col" rel="neck_lining" price="10">

                                          <input class="" type="hidden" name="collar_neck_color" value="<?php if(!empty($_SESSION['shirt']['accents']['collar_neck_color'])) { echo $_SESSION['shirt']['accents']['collar_neck_color']; } ?>"/>

                                          <?php

                                          if(count($color_img) > 0) { 

                                            $j=0;

                                            foreach($color_img as $key=>$value) { 

                                          ?>

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['shirt']['accents']['collar_neck_color']) && $_SESSION['shirt']['accents']['collar_neck_color']== $color_name[$j]) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$j]; ?>">

                                            <a class="box_color" href="javascript:;" layer="collar_color">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3170554915" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                            </a>

                                          </div>

                                          <?php ++$j; } } ?>

                                        </div>

                                  

                                  </div>



                                </div>

                                <!-- END FORRO CUELLO -->



                                 <!-- PAÑUELO -->

                                <input type="hidden" name="cuff_type" value="<?php echo $_SESSION['shirt']['accents']['cuff_styling']; ?>">

                                <div class="extra_opt extra_3d extra_title collar-lining">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['shirt']['accents']['cuff_styling']) && $_SESSION['shirt']['accents']['cuff_styling']!='') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Customize Cuff Styling

                                      <span>

                                        (+10$)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="cuff_styling" price="4.95">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <div id="options_handkerchief" class="window handkerchief top cuff_styling" style=<?php if(!empty($_SESSION['shirt']['accents']['cuff_styling']) && $_SESSION['shirt']['accents']['cuff_styling']!='') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <div class="op_handkerchief">

                                      <div class="lateral_right" style="float:none;">

                                        

                                       <input type="hidden" name="handkerchief_price" value="<?php if(!empty($_SESSION['shirt']['accents']['cuff_lining_price'])) { echo $_SESSION['shirt']['accents']['cuff_lining_price']; } ?>">

                                        <!--<div id="handkerchief_box" class="personalized_box lateral" extra_name="handkerchief" style="display:block; width: 462px;">

                                          <div class="box_opt">

                                            <div class="radio_opt">

                                              <label class="option">

                                                <input layer="fabric_type" <?php if(!empty($_SESSION['shirt']['accents']['cuff_styling']) && $_SESSION['shirt']['accents']['cuff_styling']=='outer_fabric' ) { ?> checked="checked" <?php } ?> class="uniform radio_opt" rel="handkerchief" type="radio" name="cuff_styling" value="inner_fabric" price="4.95">

                                                  Inner Fabric

                                              </label>

                                             </div>

                                            </div>

                                          <div class="box_opt">

                                          <div class="radio_opt">

                                            <label class="option">

                                              <input layer="fabric_type" <?php if(!empty($_SESSION['shirt']['accents']['cuff_styling']) && $_SESSION['shirt']['accents']['cuff_styling']=='outer_fabric' ) { ?> checked="checked" <?php } ?> class="uniform radio_opt " rel="handkerchief" type="radio" name="cuff_styling" value="outer_fabric" price="4.95">

                                                Outer Fabric

                                              </label>

                                            </div>

                                          </div>

                                          

                                        </div>-->



                                        <div class="body_product_box_3d">

                                        <div class="box_opt">

                                        <div layer="collar_neck_lining" class="option_trigger common_th mini_pocket cuff_inner_fabric <?php if(!empty($_SESSION['shirt']['accents']['cuff_styling']) && $_SESSION['shirt']['accents']['cuff_styling']=='inner_fabric') { ?> active <?php }  ?>" href="javascript:;" rel="handkerchief" price="10">

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

                                          <div layer="collar_neck_lining" class="option_trigger common_th mini_pocket cuff_outer_fabric <?php if(!empty($_SESSION['shirt']['accents']['cuff_styling']) && $_SESSION['shirt']['accents']['cuff_styling']=='outer_fabric') { ?> active <?php }  ?>" href="javascript:;" rel="handkerchief" price="10">

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



                                    <?php 

                                           $get_cuff_lining_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'10');

                                           $color_img = explode(",", $get_cuff_lining_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_cuff_lining_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_cuff_lining_dtl[0]['color_value']);



                                        ?>



                                    <div class="list_common_color interactive_options all_colors cuff_col" rel="handkerchief" price="10">

                                          <input class="" type="hidden" name="cuff_color" value="<?php if(!empty($_SESSION['shirt']['accents']['cuff_color'])) { echo $_SESSION['shirt']['accents']['cuff_color']; } ?>"/>

                                          <?php

                                          if(count($color_img) > 0) { 

                                            $k=0;

                                            foreach($color_img as $key=>$value) { 

                                          ?>

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['shirt']['accents']['cuff_color']) && $_SESSION['shirt']['accents']['cuff_color']==$color_name[$k]) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$k]; ?>">

                                            <a class="box_color" href="javascript:;" layer="cuff_color">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3170554915" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                            </a>

                                          </div>

                                          <?php ++$k; } } ?>

                                        </div>

                                  

                                  </div>

                                </div>

                                <!-- END PAÑUELO -->



                                <!-- HILOS/OJALES DE LOS BOTONES (man_jacket_button_holes_threads) -->

                                <div class="extra_opt extra_3d hilo_ojal_opt extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['shirt']['accents']['colored_thread_type']) || !empty($_SESSION['shirt']['accents']['colored_holes_type']) || $_SESSION['shirt']['accents']['type_of_colored_button_holes']=='by_default') { ?> open <?php } else { ?> close <?php } ?> hilo_ojal main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add colored button holes / threads 

                                      <span>

                                        (+5$)

                                      </span>

                                      <a id="cancel_button_holes_threads" href="javascript:;" class="btn_cancel_add" rel="button_holes_threads" price="5">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <div class="window hilo_ojal" style=<?php if(!empty($_SESSION['shirt']['accents']['colored_thread_type']) || !empty($_SESSION['shirt']['accents']['colored_holes_type']) || $_SESSION['shirt']['accents']['type_of_colored_button_holes']=='by_default') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <div class="apply_at">

                                      <label class="by_default" layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" layer1="by_default" id="pos_bht_all" class="uniform thread_holes_selector suit_hole_default" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['shirt']['accents']['type_of_colored_button_holes']) && $_SESSION['shirt']['accents']['type_of_colored_button_holes']=='by_default' ) { ?> checked="checked" <?php } else if($_SESSION['shirt']['accents']['type_of_colored_button_holes']=='') { ?> checked="checked" <?php } ?> value="by_default"/>

                                        By Default

                                      </label>

                                      <label layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" id="pos_bht_all" class="uniform thread_holes_selector suit_hole_not_default" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['shirt']['accents']['type_of_colored_button_holes']) && $_SESSION['shirt']['accents']['type_of_colored_button_holes']=='both_placket_and_cuffs' ) { ?> checked="checked" <?php } ?> value="both_placket_and_cuffs"/>

                                        Both Placket and Cuffs

                                      </label>

                                      <label layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" id="pos_bht_solapa" class="uniform thread_holes_selector suit_hole_not_default" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['shirt']['accents']['type_of_colored_button_holes']) && $_SESSION['shirt']['accents']['type_of_colored_button_holes']=='lapel' ) { ?> checked="checked" <?php } ?> value="lapel"/>

                                        Placket only

                                      </label>

                                      <label layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" id="pos_bht_cuff" class="uniform thread_holes_selector suit_hole_not_default" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['shirt']['accents']['type_of_colored_button_holes']) && $_SESSION['shirt']['accents']['type_of_colored_button_holes']=='cuff' ) { ?> checked="checked" <?php } ?> value="cuff"/>

                                        Cuffs only

                                      </label>

                                    </div>

                                    <br style="clear: both;">

                                    <input type="hidden" name="button_holes_threads_price" value="<?php if(!empty($_SESSION['shirt']['accents']['button_holes_price'])) { echo $_SESSION['shirt']['accents']['button_holes_price']; } ?>">

                                    <!--<div id="img_ojal_hilo">

                                      <div class="fabric" style="background:url(<?php echo $homeurl; ?>assets/dimg/fabric/delete-small.JPG) top left no-repeat">

                                      </div>

                                      <div class="ojal ">

                                      </div>

                                     <!-- <div class="boton" style="background:url(<?php echo $homeurl; ?>assets/images/man/suit/extras/hilo_ojal/xbtn_2.png.pagespeed.ic.Pu0CtWc5cE.png) top left no-repeat">

                                       <div class="boton" style="background:url(<?php echo $homeurl; ?>assets/images/man/suit/extras/hilo_ojal/accent-search.JPG) top left no-repeat">

                                      </div>

                                      <div class="hilo">

                                      </div>

                                    </div>-->

                                    <div id="button_thread_type" style="<?php if(!empty($_SESSION['shirt']['accents']['type_of_colored_button_holes']) && $_SESSION['shirt']['accents']['type_of_colored_button_holes']!='by_default' ) { ?> display:block <?php } else { ?> display:none <?php } ?>">

                                    <div class="shirtsection">

                                    <div class="button-threads">

                                    <img class="color" src="<?php echo $homeurl; ?>assets/images/man/shirt/button-threads.jpg" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                    </div>

                                    <div id="box_button_threads_extra" class="list_common_color interactive_options all_colors" rel="button_holes_threads" style=<?php if(!empty($_SESSION['shirt']['accents']['type_of_button']) && $_SESSION['shirt']['accents']['type_of_button']=='brass_button' ) { ?> "display:none" <?php } else { ?> "display:block" <?php } ?>>

                                      <input id="hidden_button_threads1" class="option_input1" type="hidden" name="button_holes_threads_jacket2" value="<?php if(!empty($_SESSION['shirt']['accents']['colored_thread_type'])) { echo $_SESSION['shirt']['accents']['colored_thread_type']; } ?>"/>

                                      <p>

                                        Button threads

                                      </p>

                                      

                                       <?php 

                                           $get_btn_thread_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'6');

                                           $color_img = explode(",", $get_btn_thread_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_thread_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_thread_dtl[0]['color_value']);



                                          if(count($color_img) > 0) { 

                                            $l=0;

                                            foreach($color_img as $key=>$value) { 

                                          ?>

                                      <div layer="jacket_button_thread" class="option_trigger common_color <?php if(!empty($_SESSION['shirt']['accents']['colored_thread_type']) && $_SESSION['shirt']['accents']['colored_thread_type']==$color_name[$l] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$l]; ?>">

                                        <a layer="jacket_button_holes" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                        </a>

                                      </div>

                                      <?php ++$l; } } ?>

                                    </div>

                                    </div>

                                     <div class="shirtsection">

                                      <div class="button-holes">

                                     <img class="color" src="<?php echo $homeurl; ?>assets/images/man/shirt/button-holes.jpg" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                       </div>

                                    <div class="list_common_color interactive_options all_colors" rel="button_holes_threads">

                                      <input id="hidden_button_holes1" class="option_input1" type="hidden" name="button_holes_threads_jacket1" value="<?php if(!empty($_SESSION['shirt']['accents']['colored_holes_type'])) { echo $_SESSION['shirt']['accents']['colored_holes_type']; } ?>"/>

                                      <p>

                                        Button holes

                                      </p>

                                      <?php 

                                           $get_btn_holes_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'5');

                                           $color_img = explode(",", $get_btn_holes_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_holes_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_holes_dtl[0]['color_value']);



                                          if(count($color_img) > 0) { 

                                            $m=0;

                                            foreach($color_img as $key=>$value) { 

                                          ?>

                                      <div class="option_trigger common_color  <?php if(!empty($_SESSION['shirt']['accents']['colored_holes_type']) && $_SESSION['shirt']['accents']['colored_holes_type']== $color_name[$m] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$m]; ?>" >

                                        <a layer="jacket_button_holes1" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="3252763963" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                        </a>

                                      </div>

                                      <?php ++$m; } } ?>

                                    </div>

                                    </div>

                                  </div>

                                </div>

                               </div>

                                <!-- END HILOS/OJALES -->



                                <!-- CODERAS -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['shirt']['accents']['type_of_elbow']) && $_SESSION['shirt']['accents']['type_of_elbow']!='elbow_no') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add elbow patches 

                                      <span>

                                        (+10$)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="patches" price="10">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <input type="hidden" name="patches_type">

                                   <input type="hidden" name="patches_price" value="<?php if(!empty($_SESSION['shirt']['accents']['elbow_price'])) { echo $_SESSION['shirt']['accents']['elbow_price']; } ?>">

                                  <div id="options_patches" class="window top" style=<?php if(!empty($_SESSION['shirt']['accents']['type_of_elbow']) && $_SESSION['shirt']['accents']['type_of_elbow']!='elbow_no') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <input id="input_hidden_patches" class="getVal" type="hidden" name="patches" value="<?php if(!empty($_SESSION['shirt']['accents']['elbow_type'])) { echo $_SESSION['shirt']['accents']['elbow_type']; } ?>" box="patches"/>

                                    <div class="op_patches">

                                      <div class="lateral_img img_patches1">

                                      </div>

                                      <div class="lateral_right">

                                        <div class="box_opt_patches">

                                          <div>

                                            <label layer="jacket_patches">

                                              <input id="patches_default" class="uniform default_item" type="radio" name="patches_radio" value="elbow_no" <?php if(!empty($_SESSION['shirt']['accents']['type_of_elbow']) && $_SESSION['shirt']['accents']['type_of_elbow']=='elbow_no' ) { ?> checked="checked" <?php } else if($_SESSION['shirt']['accents']['type_of_elbow']=='') { ?> checked="checked" <?php } ?> price="10"/>

                                              No elbow patches

                                            </label>

                                            <label layer="jacket_patches">

                                              <input id="inp_patches_personalized" class="uniform personalized_item" rel="1" type="radio" name="patches_radio" value="elbow_yes" price="10" rel="inp_patches_personalized" <?php if(!empty($_SESSION['shirt']['accents']['type_of_elbow']) && $_SESSION['shirt']['accents']['type_of_elbow']=='elbow_yes' ) { ?> checked="checked" <?php } ?> box="patches" extra_name="patches"/>

                                              Add elbow patches  

                                              <span class="price">

                                                (+10$)

                                              </span>

                                            </label>

                                          </div>

                                        </div>

                                        <?php 

                                           $get_elbow_patch_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'3');

                                           $color_img = explode(",", $get_elbow_patch_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_elbow_patch_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_elbow_patch_dtl[0]['color_value']);



                                          

                                          ?>

                                        <div id="patches_box" class="personalized_box lateral" extra_name="patches" style="display:block;">

                                          <?php 

                                           if(count($color_img) > 0) { 

                                            $n=0;

                                            foreach($color_img as $key=>$value) {

                                          ?> 

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['shirt']['accents']['elbow_type']) && $_SESSION['shirt']['accents']['elbow_type']== $color_name[$n] ) { ?> active <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$n]; ?>">

                                            <a layer="jacket_patches" class="box_color color_item" href="javascript:;" img_index="0">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" pagespeed_url_hash="205523977" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                            </a>

                                          </div>

                                          <?php ++$n; } } ?>

                                          

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

        

                          <script type="text/javascript">



                          var length_units = 'in';

                          var config = [];

                          var id_t4l_fabric = '<?php if(!empty($_SESSION["shirt"]["fabric"]["fabric_id"])) { echo $_SESSION["shirt"]["fabric"]["fabric_id"]; } else { echo $_SESSION["fab_dtl"]["fab_id"]; } ?>';

                          var config = {

                                      "shirt_sleeve": "<?php if(!empty($_SESSION['shirt']['style']['shirt_sleeve'])) { echo $_SESSION['shirt']['style']['shirt_sleeve']; } ?>",

                                      "shirt_fit": "<?php if(!empty($_SESSION['shirt']['style']['shirt_fit'])) { echo $_SESSION['shirt']['style']['shirt_fit']; } ?>",

                                      "shirt_neck": <?php if(!empty($_SESSION['shirt']['style']['shirt_neck'])) { echo $_SESSION['shirt']['style']['shirt_neck']; } else { echo '""'; }  ?>,

                                      "shirt_neck_no_interfacing": <?php if(!empty($_SESSION['shirt']['style']['shirt_neck_no_interfacing'])) { echo $_SESSION['shirt']['style']['shirt_neck_no_interfacing']; } else { echo '""'; } ?>,

                                      "shirt_neck_buttons": <?php if(!empty($_SESSION['shirt']['style']['shirt_neck_buttons'])) { echo $_SESSION['shirt']['style']['shirt_neck_buttons']; } else { echo '""'; } ?>,

                                      "shirt_cuffs": <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs'])) { echo $_SESSION['shirt']['style']['shirt_cuffs']; } else { echo '""'; } ?>,

                                      "shirt_chest_pocket": <?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket'])) { echo $_SESSION['shirt']['style']['shirt_chest_pocket']; } else { echo '""'; } ?>,

                                      "shirt_chest_pocket_type": <?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket_type'])) { echo $_SESSION['shirt']['style']['shirt_chest_pocket_type']; } else { echo '""'; } ?>,

                                      "shirt_button_close": <?php if(!empty($_SESSION['shirt']['style']['shirt_button_close'])) { echo $_SESSION['shirt']['style']['shirt_button_close']; } else { echo '""'; } ?>,

                                      "shirt_cut": "<?php if(!empty($_SESSION['shirt']['style']['shirt_cut'])) { echo $_SESSION['shirt']['style']['shirt_cut']; } else { echo ''; } ?>",

                                      "shirt_pleats": <?php if(!empty($_SESSION['shirt']['style']['shirt_pleats'])) { echo $_SESSION['shirt']['style']['shirt_pleats']; } else { echo '""'; } ?>

                                      };



                             var extras = [];

                             var button_color = 'white';

                             var container = '#extra_form';

                            var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";

                                ready_callbacks.push(function() {

                                  Man_Shirt.initExtras(id_t4l_fabric);

                                });

                            </script>

                          </div>

                          </div>

                           <script type="text/javascript">

                            

                            var shirt_price = {

                              "base": "<?php echo $_SESSION['p_dtl']['base_price']; ?>",

                              "fabric": <?php if($_SESSION['shirt']['fabric']['fabric_price']!='') { echo $_SESSION['shirt']['fabric']['fabric_price']; } else { echo $_SESSION['fab_dtl']['fab_price'];} ?>,

                              "patches_jacket" : <?php if(!empty($_SESSION['shirt']['accents']['elbow_price'])) { echo $_SESSION['shirt']['accents']['elbow_price']; } else { echo 0; } ?>,

                              "button_holes_threads_jacket" : <?php if(!empty($_SESSION['shirt']['accents']['button_holes_price'])) { echo $_SESSION['shirt']['accents']['button_holes_price']; } else { echo 0; } ?>,

                              "neck_lining" : <?php if(!empty($_SESSION['shirt']['accents']['neck_lining_price'])) { echo $_SESSION['shirt']['accents']['neck_lining_price']; } else { echo 0; } ?>,

                              "handkerchief" : <?php if(!empty($_SESSION['shirt']['accents']['cuff_lining_price'])) { echo $_SESSION['shirt']['accents']['cuff_lining_price']; } else { echo 0; } ?>

                            }



                            var extra_prices = {



                             "elbow_patches" : 10,

                              "btn_holes_threads" : 5,

                              "metal_btn" :20 ,

                               "neck_lining":10,

                              "pocket_square" :10 

                            };

                        </script>

                        </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </section>

            <div class="clearfix visible-xs visible-sm">

            </div>

            <!-- fixes floating problems when mobile menu is visible -->

        </div>

  

  <?php } if($_SESSION['p_dtl']['sub_cat_id']=='5') { 



if(!empty($_SESSION['coat']['fabric']['fabric_id'])) {



      $fabric_list = $_SESSION['coat']['fabric']['fabric_id'];

      $where = "where fab_rand='".$fabric_list."'";

     

    }



    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master $where");



    if(mysqli_num_rows($fab_dtl_qry) > 0) {

        while($fr=mysqli_fetch_array($fab_dtl_qry)) {

          $_SESSION['fab_dtl'] = array('fab_id' =>$fr['fab_rand'],

               'fab_unique_id' => $fr['fab_id'],

               'fab_name' => $fr['fab_name'],

               'fab_desc' => $fr['fab_desc'],

               'fab_img' => $fr['fab_img'],

               'fab_price' => $fr['fab_price'],

               'fab_default_img' => $fr['default_img']

          );



        }

    }

    ?>  



  

  <div class="wrapper">

    

  

  <section id="Content" role="main">

    <div class="container">

      

      <!-- SECTION EMPHASIS 1 -->

      <!-- FULL WIDTH -->

    </div>

    <!-- !container -->

    <div class="full-width section-emphasis-1 page-header">

      <div class="container">

        <header class="row">

          <div class="col-md-12">

            <h1 class=" pull-left">

               <?php echo $_SESSION['p_dtl']['sub_category']; ?>

            </h1>

            <!-- BREADCRUMBS -->

              <ul class="breadcrumbs list-inline pull-right">

                <li>

                  <a href="<?php echo $homeurl;?>">Home</a>

                </li>

                <li>

                  <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$_SESSION['p_dtl']['category'])); ?>/<?php echo strtolower(str_replace(' ','-',$_SESSION['p_dtl']['sub_category'])); ?>/">

                       <?php echo $_SESSION['p_dtl']['sub_category']; ?>

                   </a>

                  </li>

                  <li>

                    Customize

                   </li>

                </ul>

                <!-- !BREADCRUMBS -->

            </div>

          </header>

        </div>

      </div>

      <!-- !full-width -->

      <!-- !FULL WIDTH -->

      <!-- !SECTION EMPHASIS 1 -->

      

      <div class="container customizer-container" style="min-height:900px;">

        <div class="row">

          <div class="col-md-12">

            <div class="row">

              <div class="col-md-12 article-wrapper">

                <nav class="garment_nav">

                  <div class="row">

                    <div class="col-xs-7">

                      <ul class="nav nav-tabs">

                        <li>

                          <a href="#" id="link_configure" class="tab">

                            Style

                          </a>

                        </li>

                        <li>

                          <a href="#" class="tab" id="link_fabric">

                            Fabric

                          </a>

                        </li>

                        <li class="active">

                          <a href="#" class="tab" id="link_extras">

                            Accents

                          </a>

                        </li>

                      </ul>

                      <div class="c-nav cf" id="extra_forms">

                        <a href="javascript:;" class="next step_next btn btn-default pull-right">

                          NEXT STEP

                        </a>

                        <a href="javascript:;" class="step_prev btn btn-default pull-right">

                          PREVIOUS

                        </a>

                        <span id="price_img" class="garment_price btn btn-default pull-right">

                          <small>

                          $

                          </small>

                             <?php echo floatval($_SESSION['p_dtl']['base_price']); ?>

                         



                        </span>

                      </div>

                    </div>

                  </div>

                </nav>                

                  <div id="body" class="Man_Coat2_configure garment_container">

                    <div class="body_box" id="features">

                      <div class="body_product_box_3d">

                        

                        <div id="Man_Coat">

                        <form method="post" id="extra_form" action="<?php echo $homeurl; ?>includes/action/action.php" class="configure_form man_waistcoat man_jacket Man_Coat">

                          <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">

                          <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">



                          <input type="hidden" name="section" value="accents">

                          <input type="hidden" name="order_id" value="<?php echo $_SESSION['p_dtl1']['orderid']; ?>">

                          <input type="hidden" name="action" value="<?php echo $_SESSION['p_dtl1']['action']; ?>">

                          <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">

                          <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">

                          <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">

                          <input id="go_to" name="go_to" type="hidden"/>

                          <input name="next" type="hidden" value="1"/>

                          <input type="hidden" name="fabric_id" value="<?php echo $_SESSION['fab_dtl']['fab_id']; ?>">

                          <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['coat']['style']['def_fab'])) { echo $_SESSION['coat']['style']['def_fab']; } ?>">

                          <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['coat']['style']['def_waistcoat'])) { echo $_SESSION['coat']['style']['def_waistcoat']; } ?>">

                             

                          <input type="hidden" name="fabric_name1" value="<?php echo $_SESSION['coat']['fabric']['fabric_name']; ?>">  



                          <!-- CONFIG -->

                          
                            
                          <input type="hidden" name="coat_style" value="<?php if(!empty($_SESSION['coat']['style']['coat_style'])) { echo $_SESSION['coat']['style']['coat_style']; } ?>"/>
                            <input type="hidden" name="coat_neck" value="<?php if(!empty($_SESSION['coat']['style']['coat_neck'])) { echo $_SESSION['coat']['style']['coat_neck']; } ?>"/>
                            <input type="hidden" name="coat_neck_flap" value="<?php if(!empty($_SESSION['coat']['style']['coat_neck_flap'])) { echo $_SESSION['coat']['style']['coat_neck_flap']; } ?>"/>
                            <input type="hidden" name="coat_length" value="<?php if(!empty($_SESSION['coat']['style']['coat_length'])) { echo $_SESSION['coat']['style']['coat_length']; } ?>"/>
                            <input type="hidden" name="coat_fit" value="<?php if($_SESSION['coat']['style']['coat_fit']!='') { echo $_SESSION['coat']['style']['coat_fit']; } else { echo 0; } ?>"/>
                            <input type="hidden" name="coat_closure" value="<?php if(!empty($_SESSION['coat']['style']['coat_closure'])) { echo $_SESSION['coat']['style']['coat_closure']; } ?>"/>
                            <input type="hidden" name="coat_closure_type_zipper" value="<?php if(!empty($_SESSION['coat']['style']['coat_closure_type_zipper'])) { echo $_SESSION['coat']['style']['coat_closure_type_zipper']; } ?>"/>
                            <input type="hidden" name="coat_closure_type_boton" value="<?php if(!empty($_SESSION['coat']['style']['coat_closure_type_boton'])) { echo $_SESSION['coat']['style']['coat_closure_type_boton']; } ?>"/>
                            <input type="hidden" name="coat_pockets" value="<?php if($_SESSION['coat']['style']['coat_pockets']!='') { echo $_SESSION['coat']['style']['coat_pockets']; } else {echo 0; }?>"/>
                            <input type="hidden" name="coat_pockets_type" value="<?php if($_SESSION['coat']['style']['coat_pockets_type']!='') { echo $_SESSION['coat']['style']['coat_pockets_type']; } else {echo 0;} ?>"/>
                            <input type="hidden" name="coat_chest_pocket" value="<?php if($_SESSION['coat']['style']['coat_chest_pocket']!='') { echo $_SESSION['coat']['style']['coat_chest_pocket']; } else { echo 0; } ?>"/>
                            <input type="hidden" name="coat_belt" value="<?php if($_SESSION['coat']['style']['coat_belt']!='') { echo $_SESSION['coat']['style']['coat_belt']; } else {echo 0;}?>"/>
                            <input type="hidden" name="coat_backcut" value="<?php if($_SESSION['coat']['style']['coat_backcut']!='') { echo $_SESSION['coat']['style']['coat_backcut']; } else { echo 0; } ?>"/>
                            <input type="hidden" name="coat_sleeve" value="<?php if($_SESSION['coat']['style']['coat_sleeve']!='') { echo $_SESSION['coat']['style']['coat_sleeve']; } else { echo 0; } ?>"/>
                            <input type="hidden" name="coat_shoulder" value="<?php if($_SESSION['coat']['style']['coat_shoulder']!='') { echo $_SESSION['coat']['style']['coat_shoulder']; } else { echo 0; } ?>"/>


                          <div id="image_z_index">

                          </div>

                          

                          <!-- BOX RIGHT: MODEL + CONTROLS -->

                          <div class="box_right_3d suit">
                          <div style="margin:0 auto;font-weight:bold;text-align:center;width:200px;">
                              For Visual Purposes Only (Not the actual product fabric being ordered).
                            </div>

                            <div id="move">

                              <div id="control_suit">

                                

                                <!-- Rotate model -->

                                <div id="box_change_position">

                                  

                                  <a id="change_position" class="change_position" href="javascript:;" rel="front">

                                    Turn around model

                                  </a>

                                  

                                </div>

                               

                              </div>

                              <!-- MODEL 3D -->

                              <div id="loading">

                              </div>

                              <div class="col-md-12">

                              <div class="controls col-md-1">

                              <a data-icon="O" class="icon zoom in" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a> </div>



                              <div id="model_3d_preview" class="Man_Coat col-md-11" style="position: relative;width:280px;">

                              </div>  

                              </div>

                              <div id="model_3d_preview1" class="Man_Coat">

                              </div>

                              <!-- CONTROLS -->

                              <div id="controls_3d" class="box_btns">

                                

                              </div>

                            </div>

                          </div>

                          <div class="opt_box">

                          <div class="content extras_suit suit" id="max_height_move">

                          

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

                                <!-- FORRO INTERIOR -->

                                <div class="extra_opt extra_3d lining_opt extra_title">

                                  <div class="box_title box_title_new open lining_jacket main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Select Jacket Lining 

                                      <span>

                                        (Complimentary Add-on)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="lining_jacket" price="14.5">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  

                                  <div id="options_lining_jacket" class="window lining top" style="display: block;">

                                    <input id="input_hidden_lining_jacket" class="getVal" layer="jacket_lining" type="hidden" name="lining_jacket" value="<?php if(!empty($_SESSION['coat']['accents']['jacket_lining_id'])) { echo $_SESSION['coat']['accents']['jacket_lining_id']; } else { echo '57';  } ?>" box="lining"/>

                                    <div class="op_lining">

                                      <div class="box_opt_lining">

                                        <label>

                                          <input type="hidden" name="default_jacket_val" value="<?php if(!empty($_SESSION['coat']['accents']['jacket_lining_type']) && $_SESSION['coat']['accents']['jacket_lining_type']!='main_custom_color' || $_SESSION['coat']['accents']['jacket_lining_type']=='')  { ?>yes<?php } ?>">

                                          <input id="lining_default_jacket" class="uniform default" type="radio" name="lining_jacket_radio" value="default_jacket" <?php if(!empty($_SESSION['coat']['accents']['jacket_lining_type']) && $_SESSION['coat']['accents']['jacket_lining_type']=='default_jacket' ) { ?> checked="checked" <?php } else if($_SESSION['coat']['accents']['jacket_lining_type']=='') { ?> checked="checked" <?php } ?> price=""/>

                                          By default

                                        </label>

                                        

                                        <label>

                                          <input id="inp_lining_personalized_jacket" class="uniform change_lining" rel="1" type="radio" name="lining_jacket_radio" value="main_custom_color" <?php if(!empty($_SESSION['coat']['accents']['jacket_lining_type']) && $_SESSION['coat']['accents']['jacket_lining_type']=='main_custom_color' ) { ?> checked="checked" <?php } ?> price="" rel="inp_lining_personalized" box="lining"/>

                                          Custom color <!--(+14.50$)-->

                                        </label>

                                      </div>

                                      <br style="overflow:hidden;"/>

                                      

                                      <div id="lining_box_jacket" class="personalized_box" extra_name="lining_jacket" style="<?php if(!empty($_SESSION['coat']['accents']['jacket_lining_type']) && $_SESSION['coat']['accents']['jacket_lining_type']=="main_custom_color") { echo "display:block"; } else {echo "display:none"; } ?>">

                                        <div class="lining_3d">

                                          <div class="filters">

                                            <div class="preview_fabric_3d_common">

                                              <div class="preview" style="<?php if(!empty($_SESSION['coat']['accents']['jacket_lining_id'])) {echo "background:url(".$homeurl."assets/dimg/lining/default/".$_SESSION['coat']['accents']['jacket_lining_id']."_big.jpg) top right no-repeat"; } else { echo "background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/_big.jpg) top right no-repeat"; } ?>">

                                              </div>

                                            </div>

                                            <br style="clear: both;"/>

                                          </div>

                                          

                                          <!-- LOAD SLIDER FABRICS -->

                                          <span class="prev" rel="back" href="javascript:;">

                                            <img src="<?php echo $homeurl; ?>assets/images/man/left_arrow_lining.png" />

                                          </span>

                                          <div class="slider_fabrics">

                                          <input type="hidden" name="lining_jacket_price">

                                          <input type="hidden" name="jacket_lining_id" value="<?php if(!empty($_SESSION['coat']['accents']['jacket_lining_id'])) { echo $_SESSION['coat']['accents']['jacket_lining_id']; } ?>">

                                            <div class="slider_box" style="width: 2964px; top: 0px; left: 0px;">

                                              <table width="100%">

                                                <tbody>

                                                  <tr>

                                                    <td class="page d3" rel="0">

                                                      <div class="fabric_box_3d shirt_fabric_box">

                                                        <div style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/57_thumb.jpg) top center no-repeat" class="image suit_lining <?php if(!empty($_SESSION['coat']['accents']['jacket_lining_id']) && $_SESSION['coat']['accents']['jacket_lining_id']=='57') { ?> selected <?php } else if($_SESSION['coat']['accents']['jacket_lining_id']=='') { ?> selected <?php } ?>" id="suit_lining_57" rel="57">

                                                          

                                                          <img style="<?php if(!empty($_SESSION['coat']['accents']['jacket_lining_id']) && $_SESSION['coat']['accents']['jacket_lining_id']=='57') { ?> display: block; <?php } else if($_SESSION['coat']['accents']['jacket_lining_id']=='') { ?> display:block; <?php } else { ?> display:none; <?php } ?>" class="selected" src="<?php echo $homeurl; ?>assets/images/man/selected_fabric_3d.png" title="Selected fabric" tooltip_class="selected" >

                                                          <a is_title="Hordley" style="position: relative; z-index: 5;" material="poliester" category="basic" href="javascript:;" rel="57" class="select" extra="" btn_color="">

                                                          </a>

                                                        </div>

                                                        <table class="info">

                                                          <tbody>

                                                            <tr>

                                                              <td class="title">

                                                                <a is_title="Hordley" category="basic" href="javascript:;" btn_color="" rel="57" class="select" extra="">

                                                                  Hordley

                                                                </a>

                                                              </td>

                                                              <td class="season">

                                                                <!--14,50$-->

                                                              </td>

                                                            </tr>

                                                          </tbody>

                                                        </table>

                                                      </div>

                                                      <div class="fabric_box_3d shirt_fabric_box">

                                                        <div style="background:url(<?php echo $homeurl; ?>assets/dimg/lining/default/123_thumb.jpg) top center no-repeat" class="image suit_lining <?php if(!empty($_SESSION['coat']['accents']['jacket_lining_id']) && $_SESSION['coat']['accents']['jacket_lining_id']=='123') { ?> selected <?php } ?>" id="suit_lining_123" rel="123">

                                                          <img style="<?php if(!empty($_SESSION['coat']['accents']['jacket_lining_id']) && $_SESSION['coat']['accents']['jacket_lining_id']=='123') { ?> display: block; <?php } else { ?> display:none; <?php } ?>" class="selected" src="<?php echo $homeurl; ?>assets/images/man/selected_fabric_3d.png" title="Selected fabric" tooltip_class="selected" >

                                                          <a is_title="Albury" style="position: relative; z-index: 5;" material="poliester" category="special" href="javascript:;" rel="123" class="select" extra="" btn_color="">

                                                          </a>

                                                        </div>

                                                        <table class="info">

                                                          <tbody>

                                                            <tr>

                                                              <td class="title">

                                                                <a is_title="Albury" category="special" href="javascript:;" btn_color="" rel="123" class="select" extra="">

                                                                  Albury

                                                                </a>

                                                              </td>

                                                              <td class="season">

                                                                <!--19.50$-->

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

                                            <img src="<?php echo $homeurl; ?>assets/images/man/right_arrow_lining.png" />

                                          </span>

                                        </div>

                                        

                                      </div>

                                      

                                    </div>

                                  </div>

                                </div>

                                <!-- END FORRO INTERIOR -->

                                

                                <!-- INITIALS -->

                                <div class="extra_opt extra_3d initial_opt extra_title">

                                  <!-- title extra initials -->

                                  <div class="box_title box_title_new open initials main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add Embroidery 

                                      <span>

                                        (Complimentary Add-on)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="initials" price="">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  

                                  <div class="window initials" style="display: block;">

                                    <!-- OPCIONES INICIALES -->

                                    <div class="opts_initials">

                                      <!-- Position -->

                                      <div class="op_initials">

                                        <div class="img_position_initials2 top is_jacket">

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

                                            <input type="hidden" name="font_family" value="<?php if(!empty($_SESSION['coat']['accents']['font_family'])) { echo $_SESSION['coat']['accents']['font_family']; } else if($_SESSION['coat']['accents']['font_family']=='') { ?> Arial <?php } ?>">

                                            <div class="box_font_initial">

                                              

                                              <label class="positions">

                                                <input rel="Arial" class="uniform" type="radio" <?php if(!empty($_SESSION['coat']['accents']['font_family']) && $_SESSION['coat']['accents']['font_family']=='Arial') { ?> checked="checked" <?php } else if($_SESSION['coat']['accents']['font_family']=='') { ?> checked="checked" <?php } ?> value="24" name="initials_jacket" rev="initials_type"/>

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/24.png" />

                                              </label>

                                              <label class="positions">

                                                <input rel="Monotype Corsiva" class="uniform" type="radio" <?php if(!empty($_SESSION['coat']['accents']['font_family']) && $_SESSION['coat']['accents']['font_family']=='Monotype Corsiva') { ?> checked="checked" <?php } ?> value="19" name="initials_jacket" rev="initials_type"/>

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/19.png" />

                                              </label>

                                              <label class="positions">

                                                <input rel="Times New Roman" class="uniform" type="radio" <?php if(!empty($_SESSION['coat']['accents']['font_family']) && $_SESSION['coat']['accents']['font_family']=='Times New Roman') { ?> checked="checked" <?php } ?> value="74" name="initials_jacket" rev="initials_type">

                                                

                                                <img src="<?php echo $homeurl; ?>assets/images/man/shirt/initials/74.png" />

                                              </label>

                                              <label class="positions">

                                                <input rel="Rockwell" class="uniform" type="radio" <?php if(!empty($_SESSION['coat']['accents']['font_family']) && $_SESSION['coat']['accents']['font_family']=='Rockwell') { ?> checked="checked" <?php } ?> value="77" name="initials_jacket" rev="initials_type">

                                                

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

                                        <input type="hidden" name="initials_jacket_price" value="<?php if(!empty($_SESSION['coat']['accents']['font_price'])) { echo $_SESSION['coat']['accents']['font_price']; } ?>">

                                        <input id="txt_initial_jacket" size="20" class="my_uniform txt_initial" type="text" name="initials_jacket" maxlength="25" value="<?php if(!empty($_SESSION['coat']['accents']['initials_jacket'])) { echo $_SESSION["coat"]["accents"]["initials_jacket"]; } ?>"/>

                                      </div>

                                      

                                      <!-- COLOR DE LAS INICIALES -->

                                      <div class="box_opt op_initials">

                                        <div class="box_title">

                                          <p>

                                            Monogram Thread Color

                                          </p>

                                        </div>

                                        

                                        <?php 

                                           $get_mono_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'1');

                                           $color_img = explode(",", $get_mono_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_mono_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_mono_dtl[0]['color_value']);



                                        ?>



                                        <div class="list_common_color interactive_options all_colors " rel="initials">

                                          <input class="option_input" type="hidden" name="initials_jacket1" value="<?php if(!empty($_SESSION['coat']['accents']['monogram_color'])) { echo $_SESSION['coat']['accents']['monogram_color']; } else if($_SESSION['coat']['accents']['monogram_color']=='') { echo $color_name[0];   } ?>"/>

                                          

                                          <?php

                                          if(count($color_img) > 0) { 

                                            $i=0;

                                            foreach($color_img as $key=>$value) { 

                                          ?>

                                           <div class="option_trigger common_color <?php if(!empty($_SESSION['coat']['accents']['monogram_color']) && $_SESSION['coat']['accents']['monogram_color']== $color_name[$i]) { ?> active <?php } else if($_SESSION['coat']['accents']['monogram_color']=='' && $i==0) { ?> active <?php } ?>" href="javascript:;" color="<?php echo $color_name[$i]; ?>">

                                              <a class="box_color" href="javascript:;" layer="monogram_color">

                                                <div class="active">

                                                </div>

                                               <img class="color" src="<?php echo $homeurl.$value; ?>" />

                                              </a>

                                            </div>

                                          <?php ++$i; } } ?>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <!-- END INITALS -->

                                <!-- FORRO CUELLO -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['coat']['accents']['type_of_neck']) && $_SESSION['coat']['accents']['type_of_neck']!='color_by_default') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Neck Lining

                                      <span>

                                        (Complimentary Add-on)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="neck_lining" price="">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <div id="options_neck_lining" class="window top" style=<?php if(!empty($_SESSION['coat']['accents']['type_of_neck']) && $_SESSION['coat']['accents']['type_of_neck']!='color_by_default') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <input id="input_hidden_neck_lining" class="getVal" type="hidden" name="neck_lining" value="<?php if(!empty($_SESSION['coat']['accents']['neck_lining_type'])) { echo $_SESSION['coat']['accents']['neck_lining_type']; } ?>" box="neck_lining"/>

                                    <div class="op_lining">

                                      <div class="lateral_img lateral_img2 img_neck">

                                      </div>

                                      <div class="lateral_right">

                                        <div class="box_opt_neck_lining">

                                          <div>

                                            <label layer="jacket_neck_lining">

                                              <input id="neck_lining_default" class="uniform default_item" type="radio" name="neck_lining_radio" value="color_by_default" <?php if(!empty($_SESSION['coat']['accents']['type_of_neck']) && $_SESSION['coat']['accents']['type_of_neck']=='color_by_default' ) { ?> checked="checked" <?php } else if($_SESSION['coat']['accents']['type_of_neck']=='') { ?> checked="checked" <?php } ?>  price="3.95"/>

                                              Color by default

                                            </label>

                                            <label layer="jacket_neck_lining">

                                              <input id="inp_neck_lining_personalized" class="uniform personalized_item" type="radio" name="neck_lining_radio" value="custom_color" <?php if(!empty($_SESSION['coat']['accents']['type_of_neck']) && $_SESSION['coat']['accents']['type_of_neck']=='custom_color' ) { ?> checked="checked" <?php } ?> price="" rel="inp_neck_lining_personalized" extra_name="neck_lining"/>

                                              Custom color 

                                              <span class="price">

                                                

                                              </span>

                                            </label>

                                          </div>

                                        </div>

                                        <input type="hidden" name="neck_lining_price" value="<?php if(!empty($_SESSION['coat']['accents']['neck_lining_price'])) { echo $_SESSION['coat']['accents']['neck_lining_price']; } ?>">

                                        

                                        <?php 

                                           $get_neck_lining_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'2');

                                           $color_img = explode(",", $get_neck_lining_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_neck_lining_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_neck_lining_dtl[0]['color_value']);



                                        ?>



                                        <div id="neck_lining_box" class="personalized_box lateral" extra_name="neck_lining" style="display:block;">

                                          

                                          <?php if(count($color_img) > 0) {

                                             $m=0; 

                                             foreach($color_img as $key=>$value) { 



                                          ?>

                                          <div class="option_trigger common_color  <?php if(!empty($_SESSION['coat']['accents']['neck_lining_type']) && $_SESSION['coat']['accents']['neck_lining_type']==$color_name[$m]) { ?> active <?php } ?>" href="javascript:;" rel="1" color="<?php echo $color_name[$m]; ?>">

                                            <a layer="jacket_neck_lining" class="box_color color_item" href="javascript:;" img_index="0">

                                              <div class="active">

                                              </div>

                                              <img class="color" src="<?php echo $homeurl.$value; ?>" />

                                            </a>

                                          </div>

                                          <?php ++$m; } } ?>                                          

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <!-- END FORRO CUELLO -->


                                <!-- HILOS/OJALES DE LOS BOTONES (man_jacket_button_holes_threads) -->

                                <div class="extra_opt extra_3d hilo_ojal_opt extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['coat']['accents']['colored_thread_type']) || !empty($_SESSION['coat']['accents']['colored_holes_type']) || !empty($_SESSION['coat']['accents']['lapel_color']) || !empty($_SESSION['coat']['accents']['type_of_colored_button_holes']) || $_SESSION['coat']['accents']['type_of_colored_button_holes']=='by_default') { ?> open <?php } else { ?> close <?php } ?> hilo_ojal main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add colored button holes / threads 

                                      <span>

                                        (+5$)

                                      </span>

                                      <a id="cancel_button_holes_threads" href="javascript:;" class="btn_cancel_add" rel="button_holes_threads" price="5">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                  <div class="window hilo_ojal" style=<?php if(!empty($_SESSION['coat']['accents']['colored_thread_type']) || !empty($_SESSION['coat']['accents']['colored_holes_type']) || !empty($_SESSION['coat']['accents']['lapel_color']) || !empty($_SESSION['coat']['accents']['type_of_colored_button_holes']) || $_SESSION['coat']['accents']['type_of_colored_button_holes']=='by_default') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <div class="apply_at">

                                      <label class="by_default" layer="jacket_button_holes">

                                        <input layer="jacket_button_holes" layer1="by_default" id="pos_bht_all" class="uniform thread_holes_selector suit_hole_default" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['coat']['accents']['type_of_colored_button_holes']) && $_SESSION['coat']['accents']['type_of_colored_button_holes']=='by_default' ) { ?> checked="checked" <?php } else if($_SESSION['coat']['accents']['type_of_colored_button_holes']=='') { ?> checked="checked" <?php } ?> value="by_default"/>

                                        By Default

                                      </label>

                                      <label layer="jacket_button_holes" class="not_default">

                                        <input layer="jacket_button_holes" layer1="both_opt" id="pos_bht_all" class="uniform thread_holes_selector suit_hole_not_default" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['coat']['accents']['type_of_colored_button_holes']) && $_SESSION['coat']['accents']['type_of_colored_button_holes']=='both_placket_and_cuffs' ) { ?> checked="checked" <?php }  ?> value="both_placket_and_cuffs"/>

                                        Both Placket and Cuffs

                                      </label>

                                      <label layer="jacket_button_holes" class="not_default">

                                        <input layer="jacket_button_holes" layer1="placket_only" id="pos_bht_solapa" class="uniform thread_holes_selector suit_hole_not_default" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['coat']['accents']['type_of_colored_button_holes']) && $_SESSION['coat']['accents']['type_of_colored_button_holes']=='lapel' ) { ?> checked="checked" <?php } ?> value="lapel"/>

                                        Placket only

                                      </label>

                                      <label layer="jacket_button_holes" class="not_default">

                                        <input layer="jacket_button_holes" layer1="cuffs_only" id="pos_bht_cuff" class="uniform thread_holes_selector suit_hole_not_default" rel="1" type="radio" name="button_holes_threads_jacket" <?php if(!empty($_SESSION['coat']['accents']['type_of_colored_button_holes']) && $_SESSION['coat']['accents']['type_of_colored_button_holes']=='cuff' ) { ?> checked="checked" <?php } ?> value="cuff"/>

                                        Cuffs only

                                      </label>

                                    </div>

                                    <br style="clear: both;">

                                    <input type="hidden" name="button_holes_threads_price" value="<?php if(!empty($_SESSION['coat']['accents']['button_holes_price'])) { echo $_SESSION['coat']['accents']['button_holes_price']; } ?>">

                                    <!--<div id="img_ojal_hilo">

                                      <div class="fabric" style="background:url(<?php echo $homeurl; ?>assets/dimg/fabric/141_big.jpg) top left no-repeat">

                                      </div>

                                      <div class="ojal ">

                                      </div>

                                      <div class="boton" style="background:url(<?php echo $homeurl; ?>assets/images/man/suit/extras/hilo_ojal/xbtn_2.png.pagespeed.ic.Pu0CtWc5cE.png) top left no-repeat">

                                      </div>

                                      <div class="hilo ">

                                      </div>

                                    </div>-->

                                    

                                    <!-- Plackets Only -->



                                    <?php 

                                           $get_btn_lapel_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'7');

                                           $color_img = explode(",", $get_btn_lapel_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_lapel_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_lapel_dtl[0]['color_value']);



                                    ?>

                                    <div id="button_thread_type" style="<?php if(!empty($_SESSION['coat']['accents']['type_of_colored_button_holes']) && $_SESSION['coat']['accents']['type_of_colored_button_holes']=="by_default") {echo "display:none"; } else { echo "display:block;"; } ?>">

                                    <div class="shirtsection" id="placket_only" style="<?php if(!empty($_SESSION['coat']['accents']['type_of_colored_button_holes']) && ($_SESSION['coat']['accents']['type_of_colored_button_holes']=="both_placket_and_cuffs" || $_SESSION['coat']['accents']['type_of_colored_button_holes']=="lapel")) {echo "display:block"; } else { echo "display:none"; } ?>">

                                    <div class="button-threads">

                                    <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/placket_only.JPG" />

                                    </div>

                                    <div id="box_button_threads_extra" class="list_common_color interactive_options all_colors placket_only" rel="button_holes_threads">

                                      <input id="hidden_button_threads1" class="option_input1" type="hidden" name="placket_color" value="<?php if(!empty($_SESSION['coat']['accents']['lapel_color'])) { echo $_SESSION['coat']['accents']['lapel_color']; } ?>"/>

                                     <?php

                                          if(count($color_img) > 0) { 

                                            $j=0;

                                            foreach($color_img as $key=>$value) { 

                                      ?>

                                      <div layer="jacket_button_thread" class="option_trigger common_color <?php if(!empty($_SESSION['coat']['accents']['lapel_color']) && $_SESSION['coat']['accents']['lapel_color']== $color_name[$j]) { ?> active1 <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$j]; ?>" color="<?php echo $color_name[$j]; ?>">

                                        <a layer="lapel_only" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" />

                                        </a>

                                      </div>

                                    <?php ++$j;} } ?>

                                    </div>

                                    </div>



                                    <!-- Cuffs Only -->

                                    <div id="cuffs_only" style="<?php if(!empty($_SESSION['coat']['accents']['type_of_colored_button_holes']) && ($_SESSION['coat']['accents']['type_of_colored_button_holes']=="both_placket_and_cuffs" || $_SESSION['coat']['accents']['type_of_colored_button_holes']=="cuff")) {echo "display:block"; } else { echo "display:none"; } ?>"> 

                                    <div class="shirtsection">

                                    <div class="button-threads">

                                    <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/button-threads.JPG" />

                                    </div>

                                    

                                    <?php 

                                           $get_btn_threads_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'6');

                                           $color_img = explode(",", $get_btn_threads_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_threads_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_threads_dtl[0]['color_value']);



                                    ?>



                                    <div id="box_button_threads_extra" class="list_common_color interactive_options all_colors" rel="button_holes_threads" style=<?php if(!empty($_SESSION['coat']['accents']['type_of_button']) && $_SESSION['coat']['accents']['type_of_button']=='brass_button' ) { ?> "display:none" <?php } else { ?> "display:block" <?php } ?>>

                                      <input id="hidden_button_threads1" class="option_input1" type="hidden" name="button_holes_threads_jacket2" value="<?php if(!empty($_SESSION['coat']['accents']['colored_thread_type'])) { echo $_SESSION['coat']['accents']['colored_thread_type']; } ?>"/>

                                      <p>

                                        Button threads

                                      </p>



                                      <?php

                                          if(count($color_img) > 0) { 

                                            $k=0;

                                            foreach($color_img as $key=>$value) { 

                                      ?>

                                      <div layer="jacket_button_thread" class="option_trigger common_color <?php if(!empty($_SESSION['coat']['accents']['colored_thread_type']) && $_SESSION['coat']['accents']['colored_thread_type']==$color_name[$k] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$k]; ?>">

                                        <a layer="jacket_button_holes" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" />

                                        </a>

                                      </div>

                                    <?php ++$k; } } ?>

                                    </div>

                                    </div>

                                    <div class="shirtsection">

                                    <div class="button-holes">

                                     <img class="color" src="<?php echo $homeurl; ?>assets/images/man/suit/button-holes.JPG" />

                                    </div>



                                    <?php 

                                           $get_btn_holes_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'5');

                                           $color_img = explode(",", $get_btn_holes_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_btn_holes_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_btn_holes_dtl[0]['color_value']);



                                    ?>



                                    <div class="list_common_color interactive_options all_colors box_button_holes_extra" rel="button_holes_threads">

                                      <input id="hidden_button_holes1" class="option_input1" type="hidden" name="button_holes_threads_jacket1" value="<?php if(!empty($_SESSION['coat']['accents']['colored_holes_type'])) { echo $_SESSION['coat']['accents']['colored_holes_type']; } ?>"/>

                                      <p>

                                        Button holes

                                      </p>



                                      <?php

                                          if(count($color_img) > 0) { 

                                            $l=0;

                                            foreach($color_img as $key=>$value) { 

                                      ?>

                                      <div class="option_trigger common_color  <?php if(!empty($_SESSION['coat']['accents']['colored_holes_type']) && $_SESSION['coat']['accents']['colored_holes_type']== $color_name[$l] ) { ?> active <?php } ?>" href="javascript:;" rel="9" color="<?php echo $color_name[$l]; ?>">

                                        <a layer="jacket_button_holes1" class="box_color" href="javascript:;">

                                          <div class="active">

                                          </div>

                                          <img class="color" src="<?php echo $homeurl.$value; ?>" />

                                        </a>

                                      </div>

                                      <?php ++$l; } } ?>

                                    </div>

                                   </div>

                                   </div>

                                  </div>

                                </div>

                               </div>

                                <!-- END HILOS/OJALES -->



                                <!-- CODERAS -->

                                <div class="extra_opt extra_3d extra_title">

                                  <div class="box_title box_title_new <?php if(!empty($_SESSION['coat']['accents']['type_of_elbow']) && $_SESSION['coat']['accents']['type_of_elbow']!='elbow_no') { ?> open <?php } else { ?> close <?php } ?> main">

                                    <a href="javascript:;" class="btn_slider">

                                    </a>

                                    <p class="name">

                                      Add elbow patches 

                                      <span>

                                        (+10$)

                                      </span>

                                      <a href="javascript:;" class="btn_cancel_add" rel="patches" price="10">

                                        Delete

                                      </a>

                                    </p>

                                  </div>

                                   <input type="hidden" name="patches_price" value="<?php if(!empty($_SESSION['coat']['accents']['elbow_price'])) { echo $_SESSION['coat']['accents']['elbow_price']; } ?>">

                                  <div id="options_patches" class="window top" style=<?php if(!empty($_SESSION['coat']['accents']['type_of_elbow']) && $_SESSION['coat']['accents']['type_of_elbow']!='elbow_no') { ?> "display: block" <?php } else { ?> "display:none;" <?php } ?>>

                                    <input id="input_hidden_patches" class="getVal" type="hidden" name="patches" value="<?php if(!empty($_SESSION['coat']['accents']['elbow_type'])) { echo $_SESSION['coat']['accents']['elbow_type']; } ?>" box="patches"/>

                                    <div class="op_patches">

                                      <div class="lateral_img img_patches2">

                                      </div>

                                      <div class="lateral_right">

                                        <div class="box_opt_patches">

                                          <div>

                                            <label layer="jacket_patches">

                                              <input id="patches_default" class="uniform default_item" type="radio" name="patches_radio" value="elbow_no" <?php if(!empty($_SESSION['coat']['accents']['type_of_elbow']) && $_SESSION['coat']['accents']['type_of_elbow']=='elbow_no' ) { ?> checked="checked" <?php } else if($_SESSION['coat']['accents']['type_of_elbow']=='') { ?> checked="checked" <?php } ?> price="10"/>

                                              No elbow patches

                                            </label>

                                            <label layer="jacket_patches">

                                              <input id="inp_patches_personalized" class="uniform personalized_item" rel="1" type="radio" name="patches_radio" value="elbow_yes" price="10" rel="inp_patches_personalized" <?php if(!empty($_SESSION['coat']['accents']['type_of_elbow']) && $_SESSION['coat']['accents']['type_of_elbow']=='elbow_yes' ) { ?> checked="checked" <?php } ?> box="patches" extra_name="patches"/>

                                              Add elbow patches  

                                              <span class="price">

                                                (+10$)

                                              </span>

                                            </label>

                                          </div>

                                        </div>



                                        <?php 

                                           $get_elbow_patch_dtl = $site->get_accent_color($_SESSION['p_dtl']['sub_cat_id'],'3');

                                           $color_img = explode(",", $get_elbow_patch_dtl[0]['color_img']);

                                           $color_name = explode(",", $get_elbow_patch_dtl[0]['color_name']);

                                           $color_value = explode(",", $get_elbow_patch_dtl[0]['color_value']);



                                        ?>



                                        <div id="patches_box" class="personalized_box lateral" extra_name="patches" style="display:block;">

                                          <?php if(count($color_img) > 0) {

                                             $o=0; 

                                             foreach($color_img as $key=>$value) { 



                                          ?>

                                          <div class="option_trigger common_color <?php if(!empty($_SESSION['coat']['accents']['elbow_type']) && $_SESSION['coat']['accents']['elbow_type']== $color_name[$o]) { ?> active <?php } ?>" href="javascript:;" rel="<?php echo $color_name[$o]; ?>">

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

                            

                            <!-- END box_opts-->

                          </div>

                        </div>

                        

                      </form>

        

                          <script type="text/javascript">

                            var base_href='';

                            var id_t4l_fabric={"default_fabric":"<?php if(!empty($_SESSION['coat']['fabric']['fabric_id'])) { echo $_SESSION['coat']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>","waistcoat":"<?php if(!empty($_SESSION['coat']['fabric']['fabric_id'])) { echo $_SESSION['coat']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>"}

                                ;

                            var button_code='2';

                            var waistcoat_button_code='2';

                            var id_t4l_lining={"jacket":"57","waistcoat":"57"};

                            var t4l_linings={"jacket":{"124":{"price":0}

                                     ,"123":{"price":0}

                                     ,"117":{"price":0}

                                     ,"116":{"price":0}

                                     ,"112":{"price":14.5}

                                     ,"111":{"price":19.5}

                                     ,"110":{"price":19.5}

                                     ,"109":{"price":19.5}

                                     ,"104":{"price":19.5}

                                     ,"103":{"price":19.5}

                                     ,"102":{"price":19.5}

                                     ,"101":{"price":19.5}

                                     ,"100":{"price":19.5}

                                     ,"98":{"price":19.5}

                                     ,"96":{"price":19.5}

                                     ,"92":{"price":14.5}

                                     ,"91":{"price":14.5}

                                     ,"90":{"price":14.5}

                                     ,"89":{"price":14.5}

                                     ,"88":{"price":14.5}

                                     ,"87":{"price":14.5}

                                     ,"86":{"price":14.5}

                                     ,"85":{"price":14.5}

                                     ,"84":{"price":14.5}

                                     ,"81":{"price":19.5}

                                     ,"79":{"price":19.5}

                                     ,"69":{"price":14.5}

                                     ,"65":{"price":14.5}

                                     ,"64":{"price":14.5}

                                     ,"63":{"price":14.5}

                                     ,"61":{"price":14.5}

                                     ,"60":{"price":14.5}

                                     ,"59":{"price":14.5}

                                     ,"57":{"price":0}

                                     ,"56":{"price":14.5}

                                     ,"55":{"price":14.5}

                                     ,"54":{"price":14.5}

                                     ,"53":{"price":14.5}

                                     ,"52":{"price":14.5}

                                     ,"51":{"price":14.5}

                                     ,"50":{"price":14.5}

                                     ,"35":{"price":14.5}

                                     ,"33":{"price":14.5}

                                     ,"30":{"price":14.5}

                                     ,"29":{"price":14.5}

                                     ,"26":{"price":14.5}

                                     ,"21":{"price":14.5}

                                     ,"19":{"price":14.5}

                                     ,"18":{"price":14.5}

                                        }};

                                        var zipper_color='hei';
                                        
                                        var ribbon_color='hei';

                                        var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";



                                        ready_callbacks.push(function(){

                                          Man_Coat.initCommon(default_fabric_id,'#extra_form','#model_3d_preview',button_code,zipper_color,ribbon_color);

                                          Man_Coat.initExtras();

                                        });

                                      </script>

                          </div>

                          </div>

                           <script type="text/javascript">

                            var coat_price = {

                              "base": "<?php echo $_SESSION['p_dtl']['base_price']; ?>",

                              "fabric": <?php if($_SESSION['coat']['fabric']['fabric_price']!='') { echo $_SESSION['coat']['fabric']['fabric_price']; } else { echo $_SESSION['fab_dtl']['fab_price']; } ?>,
                              "patches" : <?php if(!empty($_SESSION['coat']['accents']['elbow_price'])) { echo $_SESSION['coat']['accents']['elbow_price']; } else { echo 0; } ?>,
                              "button_holes_threads_jacket" : <?php if(!empty($_SESSION['coat']['accents']['button_holes_price'])) { echo $_SESSION['coat']['accents']['button_holes_price']; } else { echo 0; } ?>,
                               "neck_lining":0

                            };

                            var extra_prices = {



                             "elbow_patches" : 10,

                              "btn_holes_threads" : 5,

                              "neck_lining":0


                            };

                            var global_dsc = 0;

                          </script>

                        </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </section>

            <div class="clearfix visible-xs visible-sm">

            </div>

            <!-- fixes floating problems when mobile menu is visible -->

        </div>

  

  <?php } ?>