

  

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

                        <li class="active">

                          <a href="#" class="tab" id="link_fabric">

                            Fabric

                          </a>

                        </li>

                        <li>

                          <a href="#" class="tab" id="link_extras">

                            Accents

                          </a>

                        </li>

                      </ul>

                      <div class="c-nav cf" id="fabric_form1">

                        <a href="javascript:;" class="next step_next btn btn-primary pull-right">

                          NEXT STEP

                        </a>

                        <a href="javascript:;" class="step_prev btn btn-default pull-right">

                          PREVIOUS

                        </a>

                        <span id="price_img" class="garment_price btn btn-danger pull-right">

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

                          <form method="post" action="<?php echo $adminurl; ?>includes/action.php" id="fabric_form" class="configure_form test_C test_B">

                            <input type="hidden" name="custom_suit_fabric">

                            <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">

                            <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">

                            <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">

                            <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">

                               <input type="hidden" name="catid" value="<?php echo $_GET['cid']; ?>">

                            <input type="hidden" name="subcatid" value="<?php echo $_GET['sid']; ?>">

                            <input type="hidden" name="orderid" value="<?php echo $_GET['oid']; ?>">

                            <input type="hidden" name="order_id" value="<?php echo $_SESSION['oid']; ?>">

                            <input type="hidden" name="orderidnew" value="<?php echo $_GET['orderidnew']; ?>">

                            <input type="hidden" name="userid" value="<?php echo $_GET['uid']; ?>">

                            <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">

                            <input type="hidden" name="catid" value="<?php echo $_GET['cid']; ?>">

                            <input type="hidden" name="subcatid" value="<?php echo $_GET['sid']; ?>">

                            <input type="hidden" name="userid" value="<?php echo $_GET['uid']; ?>">

                            <input type="hidden" name="section" value="fabric" >

                            <input type="hidden" name="action" value="<?php echo $_SESSION['action']; ?>">

                            <input name="next" type="hidden" value="1"/>

                           <input type="hidden" name="order_id" value="<?php echo $_SESSION['oid'];?>" >



                           

                            <input id="go_to" name="go_to" type="hidden"/>

                            <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['suit']['style']['def_fab'])) { echo $_SESSION['suit']['style']['def_fab']; } ?>">

                            <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['suit']['style']['def_waistcoat'])) { echo $_SESSION['suit']['style']['def_waistcoat']; } ?>">

                            

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

                            

                            <!-- MODEL 3D dels suits -->

                            <!-- BOX RIGHT: MODEL + CONTROLS -->

                            <div class="box_right_3d suit">
                            <div style="margin:0 auto;font-weight:bold;text-align:center;width:320px;padding: 0px 110px 20px 0px;">
                                  For Visual Purposes Only (Not the actual product fabric being ordered).
                                </div>

                              <div id="box_mini_next_3d">

                                

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

                                  <div id="show_hide_pieces" class="parcial">

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

                                <div class="controls col-md-1" style="left:279px;">

                                <a data-icon="O" class="icon zoom in" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a> </div>



                                <div id="model_3d_preview" class="man_suit col-md-11" style="position: relative;left:20px;">

                                </div>  

                                </div>

                                <div id="model_3d_preview1" class="man_suit" style="position: relative;">

                                  

                                </div>

                                <!-- CONTROLS -->

                                <br style="clear: both;">

                                

                              </div>

                            </div>

                            

                            <div class="opt_box">

                              <div class="content suit" id="max_height_move">

                              <div class="col-md-6 pull-left">

                                <input type="text" data-list=".default_list1" class="search_fabric form-control" placeholder="Search fabric by name, cost or description">

                              </div><br><br><br>

                              <div class="instore_fab" style="<?php if(isset($_SESSION['suit']['fabric']['fabric_name']) && $_SESSION['suit']['fabric']['fabric_name']!='') { ?> display:block <?php } else { ?> display:none <?php } ?>">

                              <div class="col-md-6 pull-left">

                                <input type="text" class="form-control" name="instore_fabric" required value="<?php echo $_SESSION['suit']['fabric']['fabric_name']; ?>">

                                <span><strong>In Store Fabric Selection</strong> </span>

                              </div><br><br><br>

                              </div>

                                <!-- TITLE -->

                                

                                

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

                                          

                                          <p id="fabric_brightness">

                                            <img style="display: none;" id="is_fabric_brightness" src="<?php echo $homeurl; ?>images/man/suit/ico_brillante.png" pagespeed_url_hash="2545878826" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                          </p>

                                          </div>

                                          <div class="left">

                                            <p id="fabric_name" class="big fab_name">

                                              <b>

                                                <?php echo $_SESSION['fab_dtl']['fab_name']; ?>

                                              </b>

                                            </p>

                                            <p id="second_row_info" class="fab_composition">

                                              <?php echo strip_tags($_SESSION['fab_dtl']['fab_desc']); ?> 

                                            </p>

                                          </div>

                                          </div>

                                          

                                          <div class="preview fab_img fabric_preview">
                                          <img src="<?php echo $homeurl; ?>assets/dimg/fabric/<?php echo $_SESSION['fab_dtl']['fab_id']; ?>_normal.jpg" style="width:100%;" class="fabimgs">


                                            <div id="rank_label" class="urban">

                                             </div>

                                              <a class="view_fabric" href="#" data-toggle="modal" data-target="#<?php echo $_SESSION['fab_dtl']['fab_id']; ?>">

                                              </a>

                                              </div>

                                            </div>

                                            

                                          <!-- LOAD SLIDER FABRICS -->

                                          <div id="slider_fabrics" class="default_list1">

                                          <?php if(isset($_SESSION['suit']['fabric']['fabric_name']) && $_SESSION['suit']['fabric']['fabric_name']!='') {

                                            $cust_fab = $_SESSION['suit']['fabric']['fabric_name'].'('.$_SESSION['suit']['fabric']['fabric_id'].','.$_SESSION['suit']['fabric']['fabric_price'].')';

                                          }

                                          ?>

                                          <input type="hidden" name="custom_fabric_name1" value="<?php echo $cust_fab; ?>">



                                          

                                            <!-- 1st fabric -->

                                            <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">

                                            <?php $fab=$site->get_fabrics1('',$_SESSION['def_fab_id']);

                                              foreach ($fab as $key => $value) {

                                            ?>

                                            <div class="fabric_box suit_fabric_box fabric_box_3d">

                                              <div class="image suit_fabric fabric_thumb suit_fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($_SESSION['fab_dtl']['fab_id']==$fab[$key]['f_rand']){?> selected <?php }?>" id="suit_fabric_141" rel="141" button_code="2" shoe_color="black">

                                                <a href="#" rel="<?php echo $fab[$key]['f_rand'];?>" rev="" extra="0" category="" thread_count="100 threads" shoe_color="black" button_code="2" brightness="normal" id_t4l_lining="57" id_t4l_lining_jacket="57" id_tie="3" slug="" class="select" ref="A04020X0" title="<?php echo $fab[$key]['fab_name'];?>" name="<?php echo $fab[$key]['fab_name'];?>" simplecomposition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" simple_composition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" composition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" rank="urban" btn_color="" fabric_weight="285" season="Year round">

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

                                          <?php } ?>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                              </form>

                              

                              <script type="text/javascript">

                                

                                var product_type = 'man_suit2';

                                    if (product_type == 'man_suit2') {

                                      var id_t4l_fabric = {

                                        "default_fabric": {

                                          "id_t4l_fabric": "<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>",

                                          "fabric_type": "suit",

                                          "title": "Sicilian Grey",

                                          "description": null,

                                          "code": "A04020X0",

                                          "code_chinese": "\u6d45\u7070\u8272",

                                          "photo_file": "141_thumb.jpg",

                                          "samples": "5",

                                          "min_samples": "40",

                                          "stock_control": "1",

                                          "stock_type": "unique",

                                          "stock": "332.8",

                                          "stock_reseller": null,

                                          "stock_flag": "425.0",

                                          "stock_flag_reseller": "0.0",

                                          "man": "1",

                                          "woman": "1",

                                          "online": "1",

                                          "reseller": "1",

                                          "enabled": "1",

                                          "material": "wool",

                                          "composition": "100wool",

                                          "thickness": null,

                                          "thread_count": "100",

                                          "thread_style": null,

                                          "opacity": null,

                                          "texture": "flat",

                                          "brightness": "normal",

                                          "tone": "gray",

                                          "disable_dark_linings": "0",

                                          "season": "autum",

                                          "category": "",

                                          "usefor": "",

                                          "compiled": "1",

                                          "new": "0",

                                          "best_seller": "0",

                                          "n_selled": "3676",

                                          "weight": "40",

                                          "fabric_weight": "285",

                                          "shirt_yarn": "0",

                                          "ceremonial": "0",

                                          "wedding": "0",

                                          "linen": "0",

                                          "button_code": "2",

                                          "covered_button_white": "0",

                                          "button_color": "",

                                          "shoe_color": "black",

                                          "id_t4l_lining": "57",

                                          "zipper_color": null,

                                          "ribbon_color": null,

                                          "hole_code": null,

                                          "thread_code": null,

                                          "cuff_code": null,

                                          "pant_code": "1",

                                          "rank": "urban",

                                          "simple_composition": "wool",

                                          "id_t4l_satin": "0",

                                          "id_t4l_tie": "3",

                                          "rebuy": "auto",

                                          "comments": "",

                                          "rating": "1",

                                          "min_stock_buy": "0.0",

                                          "cost": "40.0",

                                          "dsc": "0",

                                          "dsc_currency": null,

                                          "provider": "jackson",

                                          "business": "0",

                                          "casual": "0",

                                          "unlined_lining": null,

                                          "white_label": "0",

                                          "entretela": "black"

                                        },

                                        "waistcoat": {

                                          "id_t4l_fabric": "<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>",

                                          "fabric_type": "suit",

                                          "title": "Sicilian Grey",

                                          "description": null,

                                          "code": "A04020X0",

                                          "code_chinese": "\u6d45\u7070\u8272",

                                          "photo_file": "141_thumb.jpg",

                                          "samples": "5",

                                          "min_samples": "40",

                                          "stock_control": "1",

                                          "stock_type": "unique",

                                          "stock": "332.8",

                                          "stock_reseller": null,

                                          "stock_flag": "425.0",

                                          "stock_flag_reseller": "0.0",

                                          "man": "1",

                                          "woman": "1",

                                          "online": "1",

                                          "reseller": "1",

                                          "enabled": "1",

                                          "material": "wool",

                                          "composition": "100wool",

                                          "thickness": null,

                                          "thread_count": "100",

                                          "thread_style": null,

                                          "opacity": null,

                                          "texture": "flat",

                                          "brightness": "normal",

                                          "tone": "gray",

                                          "disable_dark_linings": "0",

                                          "season": "autum",

                                          "category": "",

                                          "usefor": "",

                                          "compiled": "1",

                                          "new": "0",

                                          "best_seller": "0",

                                          "n_selled": "3676",

                                          "weight": "40",

                                          "fabric_weight": "285",

                                          "shirt_yarn": "0",

                                          "ceremonial": "0",

                                          "wedding": "0",

                                          "linen": "0",

                                          "button_code": "2",

                                          "covered_button_white": "0",

                                          "button_color": "",

                                          "shoe_color": "black",

                                          "id_t4l_lining": "57",

                                          "zipper_color": null,

                                          "ribbon_color": null,

                                          "hole_code": null,

                                          "thread_code": null,

                                          "cuff_code": null,

                                          "pant_code": "1",

                                          "rank": "urban",

                                          "simple_composition": "wool",

                                          "id_t4l_satin": "0",

                                          "id_t4l_tie": "3",

                                          "rebuy": "auto",

                                          "comments": "",

                                          "rating": "1",

                                          "min_stock_buy": "0.0",

                                          "cost": "40.0",

                                          "dsc": "0",

                                          "dsc_currency": null,

                                          "provider": "jackson",

                                          "business": "0",

                                          "casual": "0",

                                          "unlined_lining": null,

                                          "white_label": "0",

                                          "entretela": "black"

                                        }

                                      };

                                    }

                                    else {

                                      var id_t4l_fabric = 'Array';

                                    }

                                    var button_code = '2';

                                    var waistcoat_button_code = '2';

                                    var shoe_color = 'black';

                                    var id_t4l_lining = 'Array';

                                    var fabric_prices = {

                                      <?php $fab=$site->get_fabrics1('',$_SESSION['def_fab_id']);

                                              foreach ($fab as $key => $value) {

                                            ?>

                                      "<?php echo $value['f_rand']; ?>": <?php echo $value['fab_price']; ?>,

                                      



                                      <?php } ?>

                                      

                                    }

                                        ;

                                    var config = {

                                      "jacket_style": "<?php if(!empty($_SESSION['suit']['style']['jacket_style'])) { echo $_SESSION['suit']['style']['jacket_style']; } ?>",

                                      "jacket_lapel_type": "<?php if(!empty($_SESSION['suit']['style']['jacket_lapel_type'])) { echo $_SESSION['suit']['style']['jacket_lapel_type']; } ?>",

                                      "jacket_buttons": <?php if(!empty($_SESSION['suit']['style']['jacket_buttons'])) { echo $_SESSION['suit']['style']['jacket_buttons']; } else { echo '0'; }  ?>,

                                      "jacket_chest_pocket": <?php if(!empty($_SESSION['suit']['style']['jacket_chest_pocket'])) { echo $_SESSION['suit']['style']['jacket_chest_pocket']; } else { echo '0'; } ?>,

                                      "jacket_pockets": <?php if(!empty($_SESSION['suit']['style']['jacket_pockets'])) { echo $_SESSION['suit']['style']['jacket_pockets']; } else { echo '0'; } ?>,

                                      "jacket_pockets_type": "<?php if(!empty($_SESSION['suit']['style']['jacket_pockets_type'])) { echo $_SESSION['suit']['style']['jacket_pockets_type']; } else { echo '0'; } ?>",

                                      "jacket_vent": <?php if(!empty($_SESSION['suit']['style']['jacket_vent'])) { echo $_SESSION['suit']['style']['jacket_vent']; } else { echo '0'; } ?>,

                                      "jacket_sleeve_buttons": <?php if(!empty($_SESSION['suit']['style']['jacket_sleeve_buttons'])) { echo $_SESSION['suit']['style']['jacket_sleeve_buttons']; } else { echo '0'; } ?>,

                                      "jacket_sleeve_buttonholes": <?php if(!empty($_SESSION['suit']['style']['jacket_sleeve_buttonholes'])) { echo $_SESSION['suit']['style']['jacket_sleeve_buttonholes']; } else { echo '0'; } ?>,

                                      "jacket_fit": <?php if(!empty($_SESSION['suit']['style']['jacket_fit'])) { echo $_SESSION['suit']['style']['jacket_fit']; } else { echo '0'; } ?>,

                                      "pants_fit": "<?php if(!empty($_SESSION['suit']['style']['pants_fit'])) { echo $_SESSION['suit']['style']['pants_fit']; } ?>",

                                      "pants_peg": <?php if(!empty($_SESSION['suit']['style']['pants_peg'])) { echo $_SESSION['suit']['style']['pants_peg']; } else { echo '0'; } ?>,

                                      "pants_back_pocket": <?php if(!empty($_SESSION['suit']['style']['pants_back_pocket'])) { echo $_SESSION['suit']['style']['pants_back_pocket']; } else { echo '0'; } ?>,

                                      "pants_back_pocket_type": "<?php if(!empty($_SESSION['suit']['style']['pants_back_pocket_type'])) { echo $_SESSION['suit']['style']['pants_back_pocket_type']; } ?>",

                                      "pants_cuff": <?php if(!empty($_SESSION['suit']['style']['pants_cuff'])) { echo $_SESSION['suit']['style']['pants_cuff']; } else { echo '0'; } ?>,

                                      "pants_front_pocket": "<?php if(!empty($_SESSION['suit']['style']['pants_front_pocket'])) { echo $_SESSION['suit']['style']['pants_front_pocket']; } ?>",

                                      "pants_ribbon": '0',

                                      "pants_belt": <?php if(!empty($_SESSION['suit']['style']['pants_belt'])) { echo $_SESSION['suit']['style']['pants_belt']; } else { echo '0'; } ?>,

                                      "waistcoat_style": "<?php if(!empty($_SESSION['suit']['style']['waistcoat_style'])) { echo $_SESSION['suit']['style']['waistcoat_style']; } ?>",

                                      "waistcoat_bottom": "<?php if(!empty($_SESSION['suit']['style']['waistcoat_bottom'])) { echo $_SESSION['suit']['style']['waistcoat_bottom']; } ?>",

                                      "waistcoat_buttons": <?php if(!empty($_SESSION['suit']['style']['waistcoat_buttons'])) { echo $_SESSION['suit']['style']['waistcoat_buttons']; } else { echo '0'; } ?>,

                                      "waistcoat_chest_pocket": <?php if(!empty($_SESSION['suit']['style']['waistcoat_chest_pocket'])) { echo $_SESSION['suit']['style']['waistcoat_chest_pocket']; } else { echo '0'; } ?>,

                                      "waistcoat_pockets_num": <?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets_num'])) { echo $_SESSION['suit']['style']['waistcoat_pockets_num']; } else { echo '0'; } ?>,

                                      "waistcoat_pockets": "<?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets'])) { echo $_SESSION['suit']['style']['waistcoat_pockets']; } else { echo '0'; } ?>",

                                      "suit_type": "<?php if(!empty($_SESSION['suit']['style']['suit_type'])) { echo $_SESSION['suit']['style']['suit_type']; } ?>"

                                    }

                                        ;

                                    var extras = {

                                      "man_jacket": [],

                                      "man_waistcoat": []

                                    }

                                        ;

                                    var suit_type = 'man_suit2';

                                    var id_tie = '3';

                                    

                                    ready_callbacks.push(function() {

                                      

                                      var tmp_id_t4l_fabric = window.id_t4l_fabric;

                                      var id_t4l_lining = {

                                        "default": "57",

                                        "waistcoat": "57"

                                      }

                                          ;

                                      var suit_type = 'man_suit2';

                                      var id_t4l_fabric = {

                                        'default_fabric': tmp_id_t4l_fabric.default_fabric.id_t4l_fabric,

                                        'waistcoat': tmp_id_t4l_fabric.waistcoat.id_t4l_fabric

                                      }

                                          ;

                                     var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";

                                      Man_Suit.initCommon('#fabric_form', '#model_3d_preview', id_t4l_fabric, button_code, shoe_color, id_t4l_lining, waistcoat_button_code, id_tie,default_fabric_id);

                                      Man_Suit.initFabrics(suit_type, id_t4l_fabric.default_fabric, id_t4l_fabric.waistcoat,id_t4l_fabric);

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

          </div>

  

  <?php } else if($_SESSION['p_dtl']['sub_cat_id']=='4') { 



if(!empty($_SESSION['pant']['fabric']['fabric_id'])) {



      $fabric_list = $_SESSION['pant']['fabric']['fabric_id'];

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

              <!--<ul class="breadcrumbs list-inline pull-right">

                <li>

                  <a href="<?php echo $homeurl;?>">Home</a>

                </li>

                <li>

                  <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$_SESSION['p_dtl']['sub_category'])); ?>/<?php echo strtolower(str_replace(' ','-',$_SESSION['p_dtl']['sub_category'])); ?>/">

                       <?php echo $_SESSION['p_dtl']['sub_category']; ?>

                   </a>

                  </li>

                  <li>

                    Customize

                   </li>

                </ul>-->

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

                        <li class="active">

                          <a href="#" class="tab" id="link_fabric">

                            Fabric

                          </a>

                        </li>

                        

                      </ul>

                      <div class="c-nav cf" id="fabric_form1">

                        <a href="javascript:;" class="next step_next btn btn-primary pull-right">

                          NEXT STEP

                        </a>

                        <a href="javascript:;" class="step_prev btn btn-default pull-right">

                          PREVIOUS

                        </a>

                        <span id="price_img" class="garment_price btn btn-danger pull-right">

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

                          <form method="post" action="<?php echo $adminurl; ?>includes/action.php" id="fabric_form" class="configure_form test_C test_B">

                            <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">

                                <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">

                            <input type="hidden" name="custom_suit_fabric">

                            <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">

                            <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">

                            <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">

                               <input type="hidden" name="catid" value="<?php echo $_GET['cid']; ?>">

                            <input type="hidden" name="subcatid" value="<?php echo $_GET['sid']; ?>">

                            <input type="hidden" name="orderid" value="<?php echo $_GET['oid']; ?>">

                            <input type="hidden" name="order_id" value="<?php echo $_SESSION['oid']; ?>">

                            <input type="hidden" name="orderidnew" value="<?php echo $_GET['orderidnew']; ?>">

                            <input type="hidden" name="userid" value="<?php echo $_GET['uid']; ?>">

                            <input type="hidden" name="section" value="fabric" >

                            <input type="hidden" name="order_id" value="<?php echo $_SESSION['oid']; ?>"> 

                            <input type="hidden" name="action" value="<?php echo $_SESSION['action']; ?>">

                            <input name="next" type="hidden" value="1"/>

                            <input id="go_to" name="go_to" type="hidden" />

                            <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['pant']['style']['def_fab'])) { echo $_SESSION['pant']['style']['def_fab']; } ?>">

                            <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['pant']['style']['def_waistcoat'])) { echo $_SESSION['pant']['style']['def_waistcoat']; } ?>">                            

                           

                            <input type="hidden" name="pants_fit" value="<?php if(!empty($_SESSION['pant']['style']['pants_fit'])) { echo $_SESSION['pant']['style']['pants_fit']; } ?>"/>

                            <input type="hidden" name="pants_peg" value="<?php if(!empty($_SESSION['pant']['style']['pants_peg'])) { echo $_SESSION['pant']['style']['pants_peg']; } ?>"/>

                            <input type="hidden" name="pants_back_pocket" value="<?php if(!empty($_SESSION['pant']['style']['pants_back_pocket'])) { echo $_SESSION['pant']['style']['pants_back_pocket']; } ?>"/>

                            <input type="hidden" name="pants_back_pocket_type" value="<?php if(!empty($_SESSION['pant']['style']['pants_back_pocket_type'])) { echo $_SESSION['pant']['style']['pants_back_pocket_type']; } ?>"/>

                            <input type="hidden" name="pants_cuff" value="<?php if(!empty($_SESSION['pant']['style']['pants_cuff'])) { echo $_SESSION['pant']['style']['pants_cuff']; } ?>"/>

                            <input type="hidden" name="pants_front_pocket" value="<?php if(!empty($_SESSION['pant']['style']['pants_front_pocket'])) { echo $_SESSION['pant']['style']['pants_front_pocket']; } ?>"/>

                            <input type="hidden" name="pants_ribbon" value="0"/>

                            <input type="hidden" name="pants_belt" value="<?php if(!empty($_SESSION['pant']['style']['pants_belt'])) { echo $_SESSION['pant']['style']['pants_belt']; } ?>"/>

                            

                            

                            <div class="box_right_3d suit">
                            <div style="margin:0 auto;font-weight:bold;text-align:center;width:320px;padding: 0px 110px 20px 0px;">
                                  For Visual Purposes Only (Not the actual product fabric being ordered).
                                </div>

                              <div id="box_mini_next_3d">

                                

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

                                 

                                </div>

                                <!-- MODEL 3D -->

                                <div id="loading">

                                </div>

                                <div class="col-md-12">

                                <div class="controls col-md-1" style="left: 242px;top: 200px">

                                <a data-icon="O" class="icon zoom in" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a> </div>



                                <div id="model_3d_preview" class="man_suit col-md-11" style="position: relative;">

                                </div>  

                                </div>

                                <div id="model_3d_preview1" class="man_suit" style="position: relative;">

                                  

                                </div>

                                <!-- CONTROLS -->

                                <br style="clear: both;">

                                

                              </div>

                            </div>

                            

                            <div class="opt_box">

                              <div class="content suit" id="max_height_move">

                              <div class="col-md-6 pull-left">

                                <input type="text" data-list=".default_list2" class="search_fabric form-control" placeholder="Search fabric by name, cost or description">

                              </div><br><br><br>

                              <div class="instore_fab" style="<?php if(isset($_SESSION['pant']['fabric']['fabric_name']) && $_SESSION['pant']['fabric']['fabric_name']!='') { ?> display:block <?php } else { ?> display:none <?php } ?>">

                              <div class="col-md-6 pull-left">

                                <input type="text" class="form-control" name="instore_fabric" required value="<?php echo $_SESSION['pant']['fabric']['fabric_name']; ?>">

                                <span><strong>In Store Fabric Selection</strong> </span>

                              </div><br><br><br>

                              </div>

                                <!-- TITLE -->

                                

                                

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

                                          

                                          <p id="fabric_brightness">

                                            <img style="display: none;" id="is_fabric_brightness" src="<?php echo $homeurl; ?>images/man/suit/ico_brillante.png" pagespeed_url_hash="2545878826" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                          </p>

                                          </div>

                                          <div class="left">

                                            <p id="fabric_name" class="big fab_name">

                                              <b>

                                                <?php echo $_SESSION['fab_dtl']['fab_name']; ?>

                                              </b>

                                            </p>

                                            <p id="second_row_info" class="fab_composition">

                                              <?php echo strip_tags($_SESSION['fab_dtl']['fab_desc']); ?> 

                                            </p>

                                          </div>

                                          </div>

                                          

                                          <div class="preview fab_img fabric_preview">
                                          <img src="<?php echo $homeurl; ?>assets/dimg/fabric/<?php echo $_SESSION['fab_dtl']['fab_id']; ?>_normal.jpg" style="width:100%;" class="fabimgs"> 

                                            <div id="rank_label" class="urban">

                                             </div>

                                              <a class="view_fabric" href="#" data-toggle="modal" data-target="#<?php echo $_SESSION['fab_dtl']['fab_id']; ?>">

                                              </a>

                                              </div>

                                            </div>

                                            

                                          <!-- LOAD SLIDER FABRICS -->

                                          <div id="slider_fabrics" >

                                          <div id="slider_fabrics" class="default_list2">

                                            <?php if(isset($_SESSION['pant']['fabric']['fabric_name']) && $_SESSION['pant']['fabric']['fabric_name']!='') {

                                            $cust_fab = $_SESSION['pant']['fabric']['fabric_name'].'('.$_SESSION['pant']['fabric']['fabric_id'].','.$_SESSION['pant']['fabric']['fabric_price'].')';

                                          }

                                          ?>

                                          <input type="hidden" name="custom_fabric_name1" value="<?php echo $cust_fab; ?>">

                                          

                                            <!-- 1st fabric -->

                                            <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['pant']['fabric']['fabric_id'])) { echo $_SESSION['pant']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">

                                            <?php $fab=$site->get_fabrics1('',$_SESSION['def_fab_id']);

                                              foreach ($fab as $key => $value) {

                                            ?>

                                            <div class="fabric_box suit_fabric_box fabric_box_3d">

                                              <div class="image suit_fabric fabric_thumb suit_fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($_SESSION['fab_dtl']['fab_id']==$fab[$key]['f_rand']){?> selected <?php }?>" id="suit_fabric_141" rel="141" button_code="2" shoe_color="black">

                                                <a href="#" rel="<?php echo $fab[$key]['f_rand'];?>" rev="" extra="0" category="" thread_count="100 threads" shoe_color="black" button_code="2" brightness="normal" id_t4l_lining="57" id_t4l_lining_jacket="57" id_tie="3" slug="" class="select" ref="A04020X0" title="<?php echo $fab[$key]['fab_name'];?>" name="<?php echo $fab[$key]['fab_name'];?>" simplecomposition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" simple_composition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" composition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" rank="urban" btn_color="" fabric_weight="285" season="Year round">

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

                                          <?php } ?>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                              </form>



                              <script type="text/javascript">

                                  var base_href = '/en/man/pants/';

                                  var product_type = 'man_pants';

                                  if (product_type == 'man_suit2') {

                                      var id_t4l_fabric = "<?php if(!empty($_SESSION['pant']['fabric']['fabric_id'])) { echo $_SESSION['pant']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>";

                                  } else {

                                      var id_t4l_fabric = "<?php if(!empty($_SESSION['pant']['fabric']['fabric_id'])) { echo $_SESSION['pant']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>";

                                  }

                                  var button_code = '2';

                                  var waistcoat_button_code = '';

                                  var shoe_color = 'black';

                                  var id_t4l_lining = '57';

                                  var fabric_prices = {

                                      <?php $fab=$site->get_fabrics1('',$_SESSION['def_fab_id']);

                                              foreach ($fab as $key => $value) {

                                            ?>

                                      "<?php echo $value['f_rand']; ?>": <?php echo $value['fab_price']; ?>,

                                      



                                      <?php } ?>

                                      

                                    };

                                  var config = {

                                      "pants_fit": "<?php if(!empty($_SESSION['pant']['style']['pants_fit'])) { echo $_SESSION['pant']['style']['pants_fit']; } ?>",

                                      "pants_peg": <?php if(!empty($_SESSION['pant']['style']['pants_peg'])) { echo $_SESSION['pant']['style']['pants_peg']; } else { echo '0'; } ?>,

                                      "pants_back_pocket": <?php if(!empty($_SESSION['pant']['style']['pants_back_pocket'])) { echo $_SESSION['pant']['style']['pants_back_pocket']; } else { echo '0'; } ?>,

                                      "pants_back_pocket_type": "<?php if(!empty($_SESSION['pant']['style']['pants_back_pocket_type'])) { echo $_SESSION['pant']['style']['pants_back_pocket_type']; } ?>",

                                      "pants_cuff": <?php if(!empty($_SESSION['pant']['style']['pants_cuff'])) { echo $_SESSION['pant']['style']['pants_cuff']; } else { echo '0'; } ?>,

                                      "pants_front_pocket": "<?php if(!empty($_SESSION['pant']['style']['pants_front_pocket'])) { echo $_SESSION['pant']['style']['pants_front_pocket']; } ?>",

                                      "pants_ribbon": '0',

                                      "pants_belt": <?php if(!empty($_SESSION['pant']['style']['pants_belt'])) { echo $_SESSION['pant']['style']['pants_belt']; } else { echo '0'; } ?>,

                                     

                                      "suit_type": null

                                  };

                                  var extras = [];

                                  var suit_type = '';

                                  var id_tie = 'false';

                                  var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";



                                  ready_callbacks.push(function() {

                                      Man_Pants.initCommon(id_t4l_fabric, '#fabric_form', '#model_3d_preview', button_code, shoe_color,default_fabric_id);

                                      Man_Pants.initFabrics(id_t4l_fabric);

                                  });

                              </script>

                              

                            </div>

                          </div>

                           <script type="text/javascript">

                            var suit_price = {

                              "base": "<?php echo $_SESSION['p_dtl']['base_price']; ?>",

                              "fabric": <?php if($_SESSION['pant']['fabric']['fabric_price']!='') { echo $_SESSION['pant']['fabric']['fabric_price']; } else { echo $_SESSION['fab_dtl']['fab_price']; } ?>



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

                        <li class="active">

                          <a href="#" class="tab" id="link_fabric">

                            Fabric

                          </a>

                        </li>

                        <li>

                          <a href="#" class="tab" id="link_extras">

                            Accents

                          </a>

                        </li>

                      </ul>

                      <div class="c-nav cf" id="fabric_form1">

                        <a href="javascript:;" class="next step_next btn btn-primary pull-right">

                          NEXT STEP

                        </a>

                        <a href="javascript:;" class="step_prev btn btn-default pull-right">

                          PREVIOUS

                        </a>

                        <span id="price_img" class="garment_price btn btn-danger pull-right">

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

                          <form method="post" action="<?php echo $adminurl; ?>includes/action.php" id="fabric_form" class="configure_form test_C test_B">

                            <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">

                                <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">

                            <input type="hidden" name="custom_suit_fabric">

                            <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">

                            <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">

                            <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">

                            <input type="hidden" name="section" value="fabric" >

                            <input type="hidden" name="action" value="<?php echo $_SESSION['action']; ?>">

                               <input type="hidden" name="catid" value="<?php echo $_GET['cid']; ?>">

                            <input type="hidden" name="subcatid" value="<?php echo $_GET['sid']; ?>">

                            <input type="hidden" name="userid" value="<?php echo $_GET['uid']; ?>">

                            <input name="next" type="hidden" value="1"/>

                            <input id="go_to" name="go_to" type="hidden" />

                            <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['jacket']['style']['def_fab'])) { echo $_SESSION['jacket']['style']['def_fab']; } ?>">

                            <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['jacket']['style']['def_waistcoat'])) { echo $_SESSION['jacket']['style']['def_waistcoat']; } ?>">
                            
                            <input type="hidden" name="order_id" value="<?php echo $_SESSION['oid']; ?>">
                            
                             <input type="hidden" name="orderidnew" value="<?php echo $_GET['orderidnew']; ?>">
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

                           

                            <!-- MODEL 3D dels suits -->

                            <!-- BOX RIGHT: MODEL + CONTROLS -->

                            <div class="box_right_3d suit">
                            <div style="margin:0 auto;font-weight:bold;text-align:center;width:320px;padding: 0px 110px 20px 0px;">
                                  For Visual Purposes Only (Not the actual product fabric being ordered).
                                </div>

                              <div id="box_mini_next_3d">

                                

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

                                  <!--<div id="show_hide_pieces" class="parcial">

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

                                  <div class="controls col-md-1" style="left:275px;">

                                  <a data-icon="O" class="icon zoom in" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a> </div>



                                  <div id="model_3d_preview" class="man_suit col-md-11" style="position: relative;left:20px;">

                                  </div>  

                                  </div>

                                <div id="model_3d_preview1" class="man_suit" style="position: relative;left:13px;">

                                  

                                </div>

                                <!-- CONTROLS -->

                                <br style="clear: both;">

                                

                              </div>

                            </div>

                            

                            <div class="opt_box">

                              <div class="content suit" id="max_height_move">

                              <div class="col-md-6 pull-left">

                                <input type="text" data-list=".default_list2" class="search_fabric form-control" placeholder="Search fabric by name, cost or description">

                              </div><br><br><br>

                              <div class="instore_fab" style="<?php if(isset($_SESSION['jacket']['fabric']['fabric_name']) && $_SESSION['jacket']['fabric']['fabric_name']!='') { ?> display:block <?php } else { ?> display:none <?php } ?>">

                              <div class="col-md-6 pull-left">

                                <input type="text" class="form-control" name="instore_fabric" required value="<?php echo $_SESSION['jacket']['fabric']['fabric_name']; ?>">

                                <span><strong>In Store Fabric Selection</strong> </span>

                              </div><br><br><br>

                              </div>

                                <!-- TITLE -->

                               

                                

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

                                          

                                          <p id="fabric_brightness">

                                            <img style="display: none;" id="is_fabric_brightness" src="<?php echo $homeurl; ?>images/man/suit/ico_brillante.png" pagespeed_url_hash="2545878826" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                          </p>

                                          </div>

                                          <div class="left">

                                            <p id="fabric_name" class="big fab_name">

                                              <b>

                                                <?php echo $_SESSION['fab_dtl']['fab_name']; ?>

                                              </b>

                                            </p>

                                            <p id="second_row_info" class="fab_composition">

                                              <?php echo strip_tags($_SESSION['fab_dtl']['fab_desc']); ?> 

                                            </p>

                                          </div>

                                          </div>

                                          

                                          <div class="preview fab_img fabric_preview">
                                          <img src="<?php echo $homeurl; ?>assets/dimg/fabric/<?php echo $_SESSION['fab_dtl']['fab_id']; ?>_normal.jpg" style="width:100%;" class="fabimgs">

                                            <div id="rank_label" class="urban">

                                             </div>

                                              <a class="view_fabric" href="#" data-toggle="modal" data-target="#<?php echo $_SESSION['fab_dtl']['fab_id']; ?>">

                                              </a>

                                              </div>

                                            </div>

                                            

                                          <!-- LOAD SLIDER FABRICS -->

                                          <div id="slider_fabrics" class="default_list2">

                                            <?php if(isset($_SESSION['jacket']['fabric']['fabric_name']) && $_SESSION['jacket']['fabric']['fabric_name']!='') {

                                            $cust_fab = $_SESSION['jacket']['fabric']['fabric_name'].'('.$_SESSION['jacket']['fabric']['fabric_id'].','.$_SESSION['jacket']['fabric']['fabric_price'].')';

                                          }

                                          ?>

                                            <input type="hidden" name="custom_fabric_name1" value="<?php echo $cust_fab; ?>">



                                          

                                            <!-- 1st fabric -->

                                            <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['jacket']['fabric']['fabric_id'])) { echo $_SESSION['jacket']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">

                                            <?php $fab=$site->get_fabrics1('',$_SESSION['def_fab_id']);

                                              foreach ($fab as $key => $value) {

                                            ?>

                                            <div class="fabric_box suit_fabric_box fabric_box_3d">

                                              <div class="image suit_fabric fabric_thumb suit_fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($_SESSION['fab_dtl']['fab_id']==$fab[$key]['f_rand']){?> selected <?php }?>" id="suit_fabric_141" rel="141" button_code="2" shoe_color="black">

                                                <a href="#" rel="<?php echo $fab[$key]['f_rand'];?>" rev="" extra="0" category="" thread_count="100 threads" shoe_color="black" button_code="2" brightness="normal" id_t4l_lining="57" id_t4l_lining_jacket="57" id_tie="3" slug="" class="select" ref="A04020X0" title="<?php echo $fab[$key]['fab_name'];?>" name="<?php echo $fab[$key]['fab_name'];?>" simplecomposition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" simple_composition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" composition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" rank="urban" btn_color="" fabric_weight="285" season="Year round">

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

                                          <?php } ?>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                              </form>

                              

                              <script type="text/javascript">

                                

                                var product_type = 'man_jacket';

                                   

                                      var id_t4l_fabric = {

                                        "default_fabric": {

                                          "id_t4l_fabric": "<?php if(!empty($_SESSION['jacket']['fabric']['fabric_id'])) { echo $_SESSION['jacket']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>",

                                          "fabric_type": "suit",

                                          "title": "Sicilian Grey",

                                          "description": null,

                                          "code": "A04020X0",

                                          "code_chinese": "\u6d45\u7070\u8272",

                                          "photo_file": "141_thumb.jpg",

                                          "samples": "5",

                                          "min_samples": "40",

                                          "stock_control": "1",

                                          "stock_type": "unique",

                                          "stock": "332.8",

                                          "stock_reseller": null,

                                          "stock_flag": "425.0",

                                          "stock_flag_reseller": "0.0",

                                          "man": "1",

                                          "woman": "1",

                                          "online": "1",

                                          "reseller": "1",

                                          "enabled": "1",

                                          "material": "wool",

                                          "composition": "100wool",

                                          "thickness": null,

                                          "thread_count": "100",

                                          "thread_style": null,

                                          "opacity": null,

                                          "texture": "flat",

                                          "brightness": "normal",

                                          "tone": "gray",

                                          "disable_dark_linings": "0",

                                          "season": "autum",

                                          "category": "",

                                          "usefor": "",

                                          "compiled": "1",

                                          "new": "0",

                                          "best_seller": "0",

                                          "n_selled": "3676",

                                          "weight": "40",

                                          "fabric_weight": "285",

                                          "shirt_yarn": "0",

                                          "ceremonial": "0",

                                          "wedding": "0",

                                          "linen": "0",

                                          "button_code": "2",

                                          "covered_button_white": "0",

                                          "button_color": "",

                                          "shoe_color": "black",

                                          "id_t4l_lining": "57",

                                          "zipper_color": null,

                                          "ribbon_color": null,

                                          "hole_code": null,

                                          "thread_code": null,

                                          "cuff_code": null,

                                          "pant_code": "1",

                                          "rank": "urban",

                                          "simple_composition": "wool",

                                          "id_t4l_satin": "0",

                                          "id_t4l_tie": "3",

                                          "rebuy": "auto",

                                          "comments": "",

                                          "rating": "1",

                                          "min_stock_buy": "0.0",

                                          "cost": "40.0",

                                          "dsc": "0",

                                          "dsc_currency": null,

                                          "provider": "jackson",

                                          "business": "0",

                                          "casual": "0",

                                          "unlined_lining": null,

                                          "white_label": "0",

                                          "entretela": "black"

                                        },

                                        "waistcoat": {

                                         "id_t4l_fabric": "<?php if(!empty($_SESSION['jacket']['fabric']['fabric_id'])) { echo $_SESSION['jacket']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>",

                                         "fabric_type": "suit",

                                          "title": "Sicilian Grey",

                                          "description": null,

                                          "code": "A04020X0",

                                          "code_chinese": "\u6d45\u7070\u8272",

                                          "photo_file": "141_thumb.jpg",

                                          "samples": "5",

                                          "min_samples": "40",

                                          "stock_control": "1",

                                          "stock_type": "unique",

                                          "stock": "332.8",

                                          "stock_reseller": null,

                                          "stock_flag": "425.0",

                                          "stock_flag_reseller": "0.0",

                                          "man": "1",

                                          "woman": "1",

                                          "online": "1",

                                          "reseller": "1",

                                          "enabled": "1",

                                          "material": "wool",

                                          "composition": "100wool",

                                          "thickness": null,

                                          "thread_count": "100",

                                          "thread_style": null,

                                          "opacity": null,

                                          "texture": "flat",

                                          "brightness": "normal",

                                          "tone": "gray",

                                          "disable_dark_linings": "0",

                                          "season": "autum",

                                          "category": "",

                                          "usefor": "",

                                          "compiled": "1",

                                          "new": "0",

                                          "best_seller": "0",

                                          "n_selled": "3676",

                                          "weight": "40",

                                          "fabric_weight": "285",

                                          "shirt_yarn": "0",

                                          "ceremonial": "0",

                                          "wedding": "0",

                                          "linen": "0",

                                          "button_code": "2",

                                          "covered_button_white": "0",

                                          "button_color": "",

                                          "shoe_color": "black",

                                          "id_t4l_lining": "57",

                                          "zipper_color": null,

                                          "ribbon_color": null,

                                          "hole_code": null,

                                          "thread_code": null,

                                          "cuff_code": null,

                                          "pant_code": "1",

                                          "rank": "urban",

                                          "simple_composition": "wool",

                                          "id_t4l_satin": "0",

                                          "id_t4l_tie": "3",

                                          "rebuy": "auto",

                                          "comments": "",

                                          "rating": "1",

                                          "min_stock_buy": "0.0",

                                          "cost": "40.0",

                                          "dsc": "0",

                                          "dsc_currency": null,

                                          "provider": "jackson",

                                          "business": "0",

                                          "casual": "0",

                                          "unlined_lining": null,

                                          "white_label": "0",

                                          "entretela": "black"

                                        }

                                      };

                                    

                                   

                                    var button_code = '2';

                                    var shoe_color = '';

                                    var id_t4l_lining = 'Array';

                                    var fabric_prices = {

                                      <?php $fab=$site->get_fabrics1('',$_SESSION['def_fab_id']);

                                              foreach ($fab as $key => $value) {

                                            ?>

                                      "<?php echo $value['f_rand']; ?>": <?php echo $value['fab_price']; ?>,

                                      



                                      <?php } ?>

                                      

                                    };

                                    var config = {

                                      "jacket_style": "<?php if(!empty($_SESSION['jacket']['style']['jacket_style'])) { echo $_SESSION['jacket']['style']['jacket_style']; } ?>",

                                      "jacket_lapel_type": "<?php if(!empty($_SESSION['jacket']['style']['jacket_lapel_type'])) { echo $_SESSION['jacket']['style']['jacket_lapel_type']; } ?>",

                                      "jacket_buttons": <?php if(!empty($_SESSION['jacket']['style']['jacket_buttons'])) { echo $_SESSION['jacket']['style']['jacket_buttons']; } else { echo '0'; }  ?>,

                                      "jacket_chest_pocket": <?php if(!empty($_SESSION['jacket']['style']['jacket_chest_pocket'])) { echo $_SESSION['jacket']['style']['jacket_chest_pocket']; } else { echo '0'; } ?>,

                                      "jacket_pockets": <?php if(!empty($_SESSION['jacket']['style']['jacket_pockets'])) { echo $_SESSION['jacket']['style']['jacket_pockets']; } else { echo '0'; } ?>,

                                      "jacket_pockets_type": "<?php if(!empty($_SESSION['jacket']['style']['jacket_pockets_type'])) { echo $_SESSION['jacket']['style']['jacket_pockets_type']; } else { echo '0'; } ?>",

                                      "jacket_vent": <?php if(!empty($_SESSION['jacket']['style']['jacket_vent'])) { echo $_SESSION['jacket']['style']['jacket_vent']; } else { echo '0'; } ?>,

                                      "jacket_sleeve_buttons": <?php if(!empty($_SESSION['jacket']['style']['jacket_sleeve_buttons'])) { echo $_SESSION['jacket']['style']['jacket_sleeve_buttons']; } else { echo '0'; } ?>,

                                      "jacket_sleeve_buttonholes": <?php if(!empty($_SESSION['jacket']['style']['jacket_sleeve_buttonholes'])) { echo $_SESSION['jacket']['style']['jacket_sleeve_buttonholes']; } else { echo '0'; } ?>,

                                      "jacket_fit": <?php if(!empty($_SESSION['jacket']['style']['jacket_fit'])) { echo $_SESSION['jacket']['style']['jacket_fit']; } else { echo '0'; } ?>,

                                      };



                                    var extras = {

                                      "man_jacket": [],

                                      "man_waistcoat": []

                                    }

                                        ;

                                    var suit_type = 'man_suit2';

                                    var waistcoat_button_code = '2';

                                    var id_tie = '3';

                                    

                                    ready_callbacks.push(function() {

                                      

                                      var tmp_id_t4l_fabric = window.id_t4l_fabric;

                                      var id_t4l_lining = {

                                        "default": "57",

                                        "waistcoat": "57"

                                      }

                                          ;

                                      var suit_type = 'man_suit2';

                                      var id_t4l_fabric = {

                                        'default_fabric': tmp_id_t4l_fabric.default_fabric.id_t4l_fabric,

                                        'waistcoat': tmp_id_t4l_fabric.waistcoat.id_t4l_fabric

                                      }

                                          ;

                                                                        var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";

    

                                      Man_Suit.initCommon('#fabric_form', '#model_3d_preview', id_t4l_fabric, button_code, shoe_color, id_t4l_lining, waistcoat_button_code, id_tie,default_fabric_id);

                                      Man_Suit.initFabrics(suit_type, id_t4l_fabric.default_fabric, id_t4l_fabric.waistcoat,id_t4l_fabric);

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

          </div>

  

  <?php }  else if($_SESSION['p_dtl']['sub_cat_id']=='2') { 



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

                        <li class="active">

                          <a href="#" class="tab" id="link_fabric">

                            Fabric

                          </a>

                        </li>

                        <li>

                          <a href="#" class="tab" id="link_extras">

                            Accents

                          </a>

                        </li>

                      </ul>

                      <div class="c-nav cf" id="fabric_form1">

                        <a href="javascript:;" class="next step_next btn btn-primary pull-right">

                          NEXT STEP

                        </a>

                        <a href="javascript:;" class="step_prev btn btn-default pull-right">

                          PREVIOUS

                        </a>

                        <span id="price_img" class="garment_price btn btn-danger pull-right">

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

                          <form method="post" action="<?php echo $adminurl; ?>includes/action.php" id="fabric_form" class="configure_form test_C test_B">

                            <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">

                                <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">

                               <input type="hidden" name="catid" value="<?php echo $_GET['cid']; ?>">

                            <input type="hidden" name="subcatid" value="<?php echo $_GET['sid']; ?>">

                            <input type="hidden" name="userid" value="<?php echo $_GET['uid']; ?>">

                            <input type="hidden" name="custom_suit_fabric">

                            <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">

                            <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">

                            <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">

                            <input type="hidden" name="section" value="fabric" >

                            <input type="hidden" name="action" value="<?php echo $_SESSION['action']; ?>">

                            <input name="next" type="hidden" value="1"/>

                            <input id="go_to" name="go_to" type="hidden" />

                            <input type="hidden" name="order_id" value="<?php echo $_SESSION['oid']; ?>">

                            <input type="hidden" name="orderidnew" value="<?php echo $_GET['orderidnew']; ?>">

                           

                            <!-- CONFIG -->

                            

                            <!-- MODEL 3D dels suits -->

                            <!-- BOX RIGHT: MODEL + CONTROLS -->

                            <div class="box_right_3d suit">
                            <div style="margin:0 auto;font-weight:bold;text-align:center;width:320px;padding: 0px 110px 20px 0px;">
                                  For Visual Purposes Only (Not the actual product fabric being ordered).
                                </div>

                              <div id="box_mini_next_3d">

                                

                              </div>

                              <div id="move">

                                <div id="control_suit">

                                  <!-- Rotate model -->

                                  <!--<div id="box_change_position">

                                    

                                    <a id="change_position" class="change_position" href="javascript:;" rel="front">

                                      Turn around model

                                    </a>

                                    

                                  </div>-->

                                  <!-- Show or hide jacket -->

                                  <!--<div id="show_hide_pieces" class="parcial">

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

                                  <div class="controls col-md-1" style="left:263px;">

                                  <a data-icon="O" class="icon zoom in" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a> </div>



                                  <div id="model_3d_preview" class="man_suit col-md-11" style="position: relative;left:10px;">

                                  </div>  

                                  </div>

                                 <div id="model_3d_preview1" class="man_suit" style="position: relative;">

                                  

                                </div>

                                <!-- CONTROLS -->

                                <br style="clear: both;">

                                

                              </div>

                            </div>

                            

                            <div class="opt_box">

                              <div class="content suit" id="max_height_move">

                              <div class="col-md-6 pull-left">

                                <input type="text" data-list=".default_list2" class="search_fabric form-control" placeholder="Search fabric by name, cost or description">

                              </div><br><br><br>

                              <div class="instore_fab" style="<?php if(isset($_SESSION['shirt']['fabric']['fabric_name']) && $_SESSION['shirt']['fabric']['fabric_name']!='') { ?> display:block <?php } else { ?> display:none <?php } ?>">

                              <div class="col-md-6 pull-left">

                                <input type="text" class="form-control" name="instore_fabric" required value="<?php echo $_SESSION['shirt']['fabric']['fabric_name']; ?>">

                                <span><strong>In Store Fabric Selection</strong> </span>

                              </div><br><br><br>

                              </div>

                                <!-- TITLE -->

                                

                                

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

                                          

                                          <p id="fabric_brightness">

                                            <img style="display: none;" id="is_fabric_brightness" src="<?php echo $homeurl; ?>images/man/suit/ico_brillante.png" pagespeed_url_hash="2545878826" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>

                                          </p>

                                          </div>

                                          <div class="left">

                                            <p id="fabric_name" class="big fab_name">

                                              <b>

                                                <?php echo $_SESSION['fab_dtl']['fab_name']; ?>

                                              </b>

                                            </p>

                                            <p id="second_row_info" class="fab_composition">

                                              <?php echo strip_tags($_SESSION['fab_dtl']['fab_desc']); ?> 

                                            </p>

                                          </div>

                                          </div>

                                          

                                          <div class="preview fab_img fabric_preview">
                                          <img src="<?php echo $homeurl; ?>assets/dimg/fabric/<?php echo $_SESSION['fab_dtl']['fab_id']; ?>_normal.jpg" style="width:100%;" class="fabimgs">

                                            <div id="rank_label" class="urban">

                                             </div>

                                              <a class="view_fabric" href="#" data-toggle="modal" data-target="#<?php echo $_SESSION['fab_dtl']['fab_id']; ?>">

                                              </a>

                                              </div>

                                            </div>

                                            

                                          <!-- LOAD SLIDER FABRICS -->

                                          <div id="slider_fabrics" class="default_list2">

                                          <?php if(isset($_SESSION['shirt']['fabric']['fabric_name']) && $_SESSION['shirt']['fabric']['fabric_name']!='') {

                                            $cust_fab = $_SESSION['shirt']['fabric']['fabric_name'].'('.$_SESSION['shirt']['fabric']['fabric_id'].','.$_SESSION['shirt']['fabric']['fabric_price'].')';

                                          }

                                          ?>

                                          <input type="hidden" name="custom_fabric_name1" value="<?php echo $cust_fab; ?>">



                                          

                                            <!-- 1st fabric -->

                                            <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['shirt']['fabric']['fabric_id'])) { echo $_SESSION['shirt']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">

                                            <?php $fab=$site->get_fabrics1('',$_SESSION['def_fab_id']);

                                              foreach ($fab as $key => $value) {

                                            ?>

                                            <div class="fabric_box suit_fabric_box fabric_box_3d">

                                              <div class="image suit_fabric fabric_thumb suit_fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($_SESSION['fab_dtl']['fab_id']==$fab[$key]['f_rand']){?> selected <?php }?>" id="suit_fabric_141" rel="141" button_code="2" shoe_color="black">

                                                <a href="#" rel="<?php echo $fab[$key]['f_rand'];?>" rev="" extra="0" category="" thread_count="100 threads" shoe_color="black" button_code="2" brightness="normal" id_t4l_lining="57" id_t4l_lining_jacket="57" id_tie="3" slug="" class="select" ref="A04020X0" title="<?php echo $fab[$key]['fab_name'];?>" name="<?php echo $fab[$key]['fab_name'];?>" simplecomposition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" simple_composition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" composition="<?php echo strip_tags($fab[$key]['fab_desc']);?>" rank="urban" btn_color="" fabric_weight="285" season="Year round">

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

                                          <?php } ?>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                              </form>

                              

                              <script type="text/javascript">

                                

                                var product_type = 'man_shirt';

                                   

                                    var length_units = 'in';

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





                                    var fabric_prices = {

                                      <?php $fab=$site->get_fabrics1('',$_SESSION['def_fab_id']);

                                              foreach ($fab as $key => $value) {

                                            ?>

                                      "<?php echo $value['f_rand']; ?>": <?php echo $value['fab_price']; ?>,

                                      



                                      <?php } ?>

                                      

                                    };





                                    var extras = [];

                                    var button_color = 'white';

                                    var container = '#fabric_form';

                                    var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";

                                    ready_callbacks.push(function() {

                                       Man_Shirt.initFabric(id_t4l_fabric);

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

                                ;

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

          </div>

  

  <?php }  ?>





  <!-- Fabric Information Modal -->



 <div id="<?php echo $_SESSION['fab_dtl']['fab_id']; ?>" class="modal fade fabs" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title fab_name"><strong><?php echo $_SESSION['fab_dtl']['fab_name']; ?></strong></h4>

      </div>

      <div class="modal-body">

        <div class="preview fab_img fabric_preview">
          
          <img src="<?php echo $homeurl; ?>assets/dimg/fabric/<?php echo $_SESSION['fab_dtl']['fab_id']; ?>_normal.jpg" style="width:100%;" class="fabimgs">
        </div>

        <div class="infobar">

            <h4 class="modal-title title fab_name"><strong><?php echo $_SESSION['fab_dtl']['fab_name']; ?></strong></h4>

            <h4 class="modal-title composition fab_composition"><strong><?php echo strip_tags($_SESSION['fab_dtl']['fab_desc']); ?></strong></h4>

        </div>

      </div>

      <div class="modal-footer">

      </div>

    </div>

    </div>

  </div>



 

 

 

 

 