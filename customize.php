<?php

$url = $_SERVER['REQUEST_URI'];

?>


<body>
  <script type="text/javascript">
    var region_url = '/en-us/';
      var cdn_host ='https://customclothiers.com/assets/';
      var backoffice_store = 0;
      var currency = 'USD';
      var ready_callbacks = [];
      var ga_callbacks = [];
      var mobile_enabled = false;
      var dataLayer = [{
        "contentGroup1": "Configurador",
      "contentGroup2": "Configurador_man_suit2",
      "region": "en-us",
      "lang": "en",
      "currency": {
        "iso": "USD",
        "symbol": "$"
      }
      ,
      "length_units": "in",
      "weigth_units": "lb",
      "gender": "man",
      "menu_item": "man_suit2_configure",
      "cart_n_products": 0,
      "cart_price": 0,
      "isAdmin": false,
      "mobile_device": false,
      "mobile_ready": true,
      "mobile_enabled": false,
      "customer_logged": 0,
      "device_type": "desktop"
    }];
  </script>
  
<!--Custom Suit Section Starts -->

<?php 

if (strpos($url, "style")!==false) {


include('customizer-common.php');


if($id=='1') {

unset($_SESSION['pant']['style']);
unset($_SESSION['pant']['fabric']);
unset($_SESSION['pant']['accents']);
unset($_SESSION['jacket']['style']);
unset($_SESSION['jacket']['fabric']);
unset($_SESSION['jacket']['accents']);
unset($_SESSION['shirt']['style']);
unset($_SESSION['shirt']['fabric']);
unset($_SESSION['shirt']['accents']);
unset($_SESSION['coat']['style']);
unset($_SESSION['coat']['fabric']);
unset($_SESSION['coat']['accents']);


if(isset($_POST['orderid']))
{
    unset($_SESSION['fab_dtl']);

    
    $oid=mysqli_real_escape_string($con,$_POST['orderid']);
    $action="update";
    $_SESSION['p_dtl1'] = array('orderid' => $oid,'action'=>$action);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);
    $suit_type=explode(":",$style[0]);

    

    if(trim($suit_type[1])=='man_suit2') {
      $jacket_style = explode(":",$style[1]);
      $jacket_fit = explode(":",$style[2]);
      $jacket_lapel_type = explode(":",$style[3]);
      $jacket_buttons = explode(":",$style[4]);
      $jacket_chest_pocket = explode(":",$style[5]);
      $jacket_pockets = explode(":",$style[6]);
      $jacket_pockets_type = explode(":",$style[7]);
      $jacket_vent = explode(":",$style[8]);
      $jacket_sleeve_buttons = explode(":",$style[9]);
      $jacket_sleeve_buttonholes = explode(":",$style[10]);
      $pants_fit = explode(":",$style[11]);
      $pants_peg = explode(":",$style[12]);
      $pants_belt = explode(":",$style[13]);
      $pants_front_pocket = explode(":",$style[14]);
      $pants_back_pocket = explode(":",$style[15]);
      $pants_back_pocket_type = explode(":",$style[16]);
      $pants_cuff = explode(":",$style[17]);
      $extra_pant = explode(":",trim($style[18],"}"));


      $_SESSION['suit']['style'] = array('base_price' => isset($_POST['org_price']) ? $_POST['org_price']:'0',
            'suit_type'=>trim($suit_type[1]),
            'jacket_style'=>trim($jacket_style[1]),
            'jacket_fit'=>trim($jacket_fit[1]),
            'jacket_lapel_type'=>trim($jacket_lapel_type[1]),
            'jacket_buttons'=>trim($jacket_buttons[1]),
            'jacket_chest_pocket'=>trim($jacket_chest_pocket[1]),
            'jacket_pockets'=>trim($jacket_pockets[1]),
            'jacket_pockets_type'=>trim($jacket_pockets_type[1]),
            'jacket_vent'=>trim($jacket_vent[1]),
            'jacket_sleeve_buttons'=>trim($jacket_sleeve_buttons[1]),
            'jacket_sleeve_buttonholes'=>trim($jacket_sleeve_buttonholes[1]),
            'pants_fit'=>trim($pants_fit[1]),
            'pants_peg'=>trim($pants_peg[1]),
            'pants_belt'=>trim($pants_belt[1]),
            'pants_front_pocket'=>trim($pants_front_pocket[1]),
            'pants_back_pocket'=>trim($pants_back_pocket[1]),
            'pants_back_pocket_type'=>trim($pants_back_pocket_type[1]),
            'pants_cuff'=>trim($pants_cuff[1]),
            'extra_pants'=>trim($extra_pant[1])
    );



  }
    else if(trim($suit_type[1])=='man_suit3') {
      $jacket_style = explode(":",$style[2]);
      $jacket_fit = explode(":",$style[3]);
      $jacket_lapel_type = explode(":",$style[4]);
      $jacket_buttons = explode(":",$style[5]);
      $jacket_chest_pocket = explode(":",$style[6]);
      $jacket_pockets = explode(":",$style[7]);
      $jacket_pockets_type = explode(":",$style[8]);
      $jacket_vent = explode(":",$style[9]);
      $jacket_sleeve_buttons = explode(":",$style[10]);
      $jacket_sleeve_buttonholes = explode(":",$style[11]);
      $waistcoat_style = explode(":",$style[12]);
      $waistcoat_buttons = explode(":",$style[13]);
      $waistcoat_chest_pocket = explode(":",$style[14]);
      $waistcoat_pockets = explode(":",$style[15]);
      $waistcoat_pockets_num = explode(":",$style[16]);
      $waistcoat_bottom = explode(":",$style[17]);
      $pants_fit = explode(":",$style[18]);
      $pants_peg = explode(":",$style[19]);
      $pants_belt = explode(":",$style[20]);
      $pants_front_pocket = explode(":",$style[21]);
      $pants_back_pocket = explode(":",$style[22]);
      $pants_back_pocket_type = explode(":",$style[23]);
      $pants_cuff = explode(":",$style[24]);
      $extra_pant = explode(":",trim($style[25],"}"));


      $_SESSION['suit']['style'] = array('base_price' => isset($con,$_POST['org_price']) ? $_POST['org_price']:'0',
            'suit_type'=>trim($suit_type[1]),
            'jacket_style'=>trim($jacket_style[1]),
            'jacket_fit'=>trim($jacket_fit[1]),
            'jacket_lapel_type'=>trim($jacket_lapel_type[1]),
            'jacket_buttons'=>trim($jacket_buttons[1]),
            'jacket_chest_pocket'=>trim($jacket_chest_pocket[1]),
            'jacket_pockets'=> trim($jacket_pockets[1]),
            'jacket_pockets_type'=>trim($jacket_pockets_type[1]),
            'jacket_vent'=>trim($jacket_vent[1]),
            'jacket_sleeve_buttons'=>trim($jacket_sleeve_buttons[1]),
            'jacket_sleeve_buttonholes'=>trim($jacket_sleeve_buttonholes[1]),
            'waistcoat_style'=>trim($waistcoat_style[1]),
            'waistcoat_buttons'=>trim($waistcoat_buttons[1]),
            'waistcoat_chest_pocket'=>trim($waistcoat_chest_pocket[1]),
            'waistcoat_pockets'=>trim($waistcoat_pockets[1]),
            'waistcoat_pockets_num'=>trim($waistcoat_pockets_num[1]),
            'waistcoat_bottom'=>trim($waistcoat_bottom[1]),
            'pants_fit'=>trim($pants_fit[1]),
            'pants_peg'=>trim($pants_peg[1]),
            'pants_belt'=>trim($pants_belt[1]),
            'pants_front_pocket'=>trim($pants_front_pocket[1]),
            'pants_back_pocket'=>trim($pants_back_pocket[1]),
            'pants_back_pocket_type'=>trim($pants_back_pocket_type[1]),
            'pants_cuff'=>trim($pants_cuff[1]),
            'extra_pants'=>trim($extra_pant[1])
    );
  }

  

    $fabric=explode("{",$r['om_fab']);
    $fabric=explode(",",$fabric[1]);

    $fabric_price=explode(":",$fabric[0]);
    $fabric_id = explode(":",trim($fabric[1],"}"));
    $fabric_name = explode(":",trim($fabric[2],"}"));

    $_SESSION['suit']['fabric'] = array('fabric_name'=>$fabric_name[1]);

    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master where fab_rand = '".trim($fabric_id[1])."'");

    if(mysqli_num_rows($fab_dtl_qry) > 0) {
        while($fr=mysqli_fetch_array($fab_dtl_qry)) {
          $_SESSION['fab_dtl'] = array('fab_id' =>$fr['fab_rand'],
               'fab_unique_id' => $r['fab_id'],
               'fab_name' => $fr['fab_name'],
               'fab_desc' => $fr['fab_desc'],
               'fab_img' => $fr['fab_img'],
               'fab_price' => $fr['fab_price'],
               'fab_default_img' => $fr['default_img']
          );
        }
    }

    $accents=explode("{",$r['om_accents']);

    $accents=explode(",",$accents[1]);

     $jacket_lining_type = explode(":",$accents[0]);
     $lining_price = explode(":",$accents[1]);
     $lining_id = explode(":",$accents[2]);
     $font_price = explode(":",$accents[3]);
     $font_family = explode(":",$accents[4]);
     $initials_jacket = explode(":",$accents[5]);
     $monogram_color = explode(":",$accents[6]);
     $type_of_button = explode(":",$accents[7]);
     $metal_button_price = explode(":",$accents[8]);
     $metal_btn_type = explode(":",$accents[9]);
     $type_of_neck = explode(":",$accents[10]);
     $neck_lining_price = explode(":",$accents[11]);
     $neck_lining_type = explode(":",$accents[12]);
     $type_of_elbow = explode(":",$accents[13]);
     $elbow_price = explode(":",$accents[14]);
     $elbow_type = explode(":",$accents[15]);
     $type_pocket_square = explode(":",$accents[16]);
     $handkerchief_price = explode(":",$accents[17]);
     $pocket_square_type = explode(":",$accents[18]);
     $type_of_colored_button_holes = explode(":",$accents[19]);
     $lapel_color = explode(":",$accents[20]);
     $button_holes_price = explode(":",$accents[21]);
     $colored_thread_type = explode(":",$accents[22]);
     $colored_holes_type = explode(":",trim($accents[23],"}"));

     $_SESSION['suit']['accents'] = array('jacket_lining_type' => trim($jacket_lining_type[1]),
              'lining_price' => trim($lining_price[1]),
              'tot_price'=>trim($tot_price[1]),
              'jacket_lining_id' => trim($lining_id[1]),
              'font_price' => trim($font_price[1]),
              'font_family' => trim($font_family[1]),
              'initials_jacket' => trim($initials_jacket[1]),
              'monogram_color' => trim($monogram_color[1]),
              'type_of_button' => trim($type_of_button[1]),
              'metal_button_price' => trim($metal_button_price[1]),
              'metal_btn_type' => trim($metal_btn_type[1]),
              'type_of_neck' => trim($type_of_neck[1]),
              'neck_lining_price' => trim($neck_lining_price[1]),
              'neck_lining_type' => trim($neck_lining_type[1]),
              'type_of_elbow' => trim($type_of_elbow[1]),
              'elbow_price' => trim($elbow_price[1]),
              'elbow_type' => trim($elbow_type[1]),
              'type_pocket_square' => trim($type_pocket_square[1]), 
              'handkerchief_price' => trim($handkerchief_price[1]),
              'pocket_square_type' => trim($pocket_square_type[1]),
              'type_of_colored_button_holes' => trim($type_of_colored_button_holes[1]),
              'lapel_color' => trim($lapel_color[1]),
              'button_holes_price' => trim($button_holes_price[1]),
              'colored_thread_type' => trim($colored_thread_type[1]),
              'colored_holes_type' => trim($colored_holes_type[1])
       );
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
                            <li class="active">
                              <a href="" id="link_configure" class="tab">
                                Style
                              </a>
                            </li>
                            <li>
                              <a href="" class="tab" id="link_fabric">
                                Fabric
                              </a>
                            </li>
                            <li>
                              <a href="" class="tab" id="link_extras">
                                Accents
                              </a>
                            </li>
                          </ul>
                          <div class="c-nav cf" id="configure-form1">
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
                    
                    
                    <!-- Style Tab Start-->
                      <div id="body" class="man_suit2_configure garment_container">
                        <div class="body_box" id="features">
                          <div class="body_product_box_3d">
                            
                            <div id="man_suit">
                              <form method="post" action="<?php echo $homeurl; ?>includes/action/action.php" id="configure_form" class="configure_form">
                                <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">
                                <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">
                                <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">
                                <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">
                                <input type="hidden" name="section" value="style">
                                <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">
                                <input type="hidden" name="action" value="<?php echo $_SESSION['p_dtl1']['action']; ?>">  
                                <input id="go_to" name="go_to" type="hidden" value="">
                                <input name="next" type="hidden" value="1">
                                <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">
                                <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['suit']['style']['def_fab'])) { echo $_SESSION['suit']['style']['def_fab']; } ?>">
                                <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['suit']['style']['def_waistcoat'])) { echo $_SESSION['suit']['style']['def_waistcoat']; } ?>">
                                <input type="hidden" name="fabric_name1" value="<?php echo $_SESSION['suit']['fabric']['fabric_name']; ?>">  


                                <!-- MODEL 3D dels suits -->
                                <!-- BOX RIGHT: MODEL + CONTROLS -->
                                <div class="box_right_3d suit">
                                  <div style="margin:0 auto;font-weight:bold;text-align:center;width:200px;">
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
                                    <div class="controls col-md-1">
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
                                  <div class="content suit garment_block" id="max_height_move">
                                    <!-- JACKET CONFIG -->
                                    <div class="box_title">
                                      <!--<h1 class="title">
                                        Custom <?php echo $_SESSION['p_dtl']['sub_category']; ?> &nbsp;/
                                      </h1>
                                      <span class="subtitle">
                                        &nbsp;
                                        <span>
                                          Choose your style
                                        </span>
                                      </span>-->
                                    </div>
                                    <div class="box_title" style="margin-top: 20px;">
                                      <h1 class="title suit">
                                        Jacket
                                      </h1>
                                    </div>
                                    <!--<div class="separator">
                                    </div>-->
                                    
                                    <!-- JACKET CONFIG -->
                                    <div class="box_opts" product_type="jacket">
                                      <!-- Select: 2 pieces / 3 pieces -->
                                      <div class="conf_opt config_3d select_suit_type">
                                        <div class="box_title">
                                          <p>
                                            Type:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              <input rel="waistcoat" <?php if(!empty($_SESSION['suit']['style']['suit_type']) && $_SESSION['suit']['style']['suit_type']=='man_suit2') { ?> checked <?php } else if($_SESSION['suit']['style']['suit_type']=='') { ?> checked <?php } ?> type="radio" class="uniform radio_opt suit_type" name="suit_type" value="man_suit2">
                                              2 piece suit
                                            </label>
                                            <label class="option">
                                              <input rel="none" type="radio" class="uniform radio_opt suit_type" name="suit_type" value="man_suit3" <?php if(!empty($_SESSION['suit']['style']['suit_type']) && $_SESSION['suit']['style']['suit_type']=='man_suit3') { ?> checked <?php } ?>>
                                              3 piece suit
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: Style -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Style:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div id="options_jacket_style" class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="jacket_corpus" class="uniform radio_opt  jacket_style" id="jacket_style_simple" type="radio" name="jacket_style" value="simple" <?php if(!empty($_SESSION['suit']['style']['jacket_style']) && $_SESSION['suit']['style']['jacket_style']=='simple') { ?> checked <?php } else if($_SESSION['suit']['style']['jacket_style']=='') { ?> checked <?php } ?> >
                                              Single breasted
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_corpus" class="uniform radio_opt  jacket_style" id="jacket_style_crossed" type="radio" name="jacket_style" value="crossed" <?php if(!empty($_SESSION['suit']['style']['jacket_style']) && $_SESSION['suit']['style']['jacket_style']=='crossed') { ?> checked <?php } ?>>
                                              Double breasted
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_corpus" class="uniform radio_opt  jacket_style" id="jacket_style_mao" type="radio" name="jacket_style" value="mao" <?php if(!empty($_SESSION['suit']['style']['jacket_style']) && $_SESSION['suit']['style']['jacket_style']=='mao') { ?> checked <?php } ?>>
                                              Asian
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: Entallado -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Fit:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="jacket_corpus" class="uniform radio_opt " type="radio" name="jacket_fit" value="0" <?php if($_SESSION['suit']['style']['jacket_fit']=='0') { ?> checked <?php } ?> >
                                              Classic Fit
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_corpus" class="uniform radio_opt " type="radio" name="jacket_fit" value="1" <?php if(!empty($_SESSION['suit']['style']['jacket_fit']) && $_SESSION['suit']['style']['jacket_fit']=='1') { ?> checked <?php } else if($_SESSION['suit']['style']['jacket_fit']=='') { ?> checked <?php } ?>>
                                              Slim Fit
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <div id="lapel_options">
                                        <!-- Jacket: Lapel Type -->
                                        <div class="conf_opt config_3d">
                                          <div class="box_title">
                                            <p>
                                              Jacket Lapels:
                                            </p>
                                          </div>
                                          <div class="box_opt">
                                            <div class="radio_opt">
                                              <label class="option">
                                                
                                                <input layer="jacket_lapels" class="uniform radio_opt " type="radio" name="jacket_lapel_type" value="standard" <?php if(!empty($_SESSION['suit']['style']['jacket_lapel_type']) && $_SESSION['suit']['style']['jacket_lapel_type']=='standard') { ?> checked <?php } else if($_SESSION['suit']['style']['jacket_lapel_type']=='') { ?> checked <?php } ?>>
                                                Notch
                                              </label>
                                              <label class="option">
                                                
                                                <input layer="jacket_lapels" class="uniform radio_opt " type="radio" name="jacket_lapel_type" value="peak" <?php if(!empty($_SESSION['suit']['style']['jacket_lapel_type']) && $_SESSION['suit']['style']['jacket_lapel_type']=='peak') { ?> checked <?php } ?>>
                                                Peak
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: buttons -->
                                      <div id="global_jacket_buttons" class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Number of Buttons:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              
                                              <select layer="jacket_buttons" class="option uniform" name="jacket_buttons" id="jacket_buttons" rel="2">
                                                <option layer="jacket_buttons" value="1" <?php if(!empty($_SESSION['suit']['style']['jacket_buttons']) && $_SESSION['suit']['style']['jacket_buttons']=='1') { ?> selected <?php } ?>>
                                                  1
                                                </option>
                                                <option layer="jacket_buttons" value="2" <?php if(!empty($_SESSION['suit']['style']['jacket_lapel_type']) && $_SESSION['suit']['style']['jacket_buttons']=='2') { ?> selected <?php } else if($_SESSION['suit']['style']['jacket_buttons']=='') { ?> selected <?php } ?>>
                                                  2
                                                </option>
                                                <option layer="jacket_buttons" value="3" <?php if(!empty($_SESSION['suit']['style']['jacket_buttons']) && $_SESSION['suit']['style']['jacket_buttons']=='3') { ?> selected <?php } ?>>
                                                  3
                                                </option>
                                                <option layer="jacket_buttons" value="4" <?php if(!empty($_SESSION['suit']['style']['jacket_buttons']) && $_SESSION['suit']['style']['jacket_buttons']=='4') { ?> selected <?php } ?>>
                                                  4
                                                </option>
                                              </select>
                                              
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: Chest Pocket -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Breast Pocket:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="jacket_chest_pocket" class="uniform radio_opt " type="radio" name="jacket_chest_pocket" value="1" <?php if(!empty($_SESSION['suit']['style']['jacket_chest_pocket']) && $_SESSION['suit']['style']['jacket_chest_pocket']=='1') { ?> checked <?php } else if($_SESSION['suit']['style']['jacket_chest_pocket']=='') { ?> checked <?php } ?>>
                                              Yes
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_chest_pocket" class="uniform radio_opt " type="radio" name="jacket_chest_pocket" value="0" <?php if($_SESSION['suit']['style']['jacket_chest_pocket']=='0') { ?> checked <?php } ?>>
                                              No
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: front "jacket_pockets" -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Hip Pockets:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt labels_jacket_pockets_num">
                                            <label class="option">
                                              
                                              <input layer="jacket_pockets" class="uniform num_b jacket radio_opt" type="radio" name="jacket_pockets" value="0" <?php if($_SESSION['suit']['style']['jacket_pockets']=='0') { ?> checked <?php } ?>>
                                              No pockets
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_pockets" class="uniform num_b jacket radio_opt" type="radio" name="jacket_pockets" value="2" <?php if(!empty($_SESSION['suit']['style']['jacket_pockets']) && $_SESSION['suit']['style']['jacket_pockets']=='2') { ?> checked <?php } else if($_SESSION['suit']['style']['jacket_pockets']=='') { ?> checked <?php } ?>>
                                              2 pockets
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_pockets" class="uniform num_b jacket radio_opt" type="radio" name="jacket_pockets" value="3" <?php if(!empty($_SESSION['suit']['style']['jacket_pockets']) && $_SESSION['suit']['style']['jacket_pockets']=='3') { ?> checked <?php } ?>>
                                              3 pockets
                                            </label>
                                          </div>
                                          <div class="list_common_th interactive_options all_jacket_pockets open" style="">
                                            <input id="hidden_jacket_pockets" class="option_input" type="hidden" name="jacket_pockets_type" value="<?php if(!empty($_SESSION['suit']['style']['jacket_pockets_type'])) { echo $_SESSION['suit']['style']['jacket_pockets_type']; } else { ?>2<?php } ?>">
                                            <!-- 2 Bolsillo -->
                                            <div class="1pocket">
                                              <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['jacket_pockets_type']) && $_SESSION['suit']['style']['jacket_pockets_type']=='2') { ?> active <?php } else if($_SESSION['suit']['style']['jacket_pockets_type']=='') { ?> active <?php } ?>" href="javascript:;" rel="2">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Hip Pockets: with flap" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_with_flap.JPG">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    with flap
                                                  </p>
                                                </div>
                                              </div>
                                              <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['jacket_pockets_type']) && $_SESSION['suit']['style']['jacket_pockets_type']=='2a') { ?> active <?php } ?>" href="javascript:;" rel="2a">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Hip Pockets: double welt" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_double_welt.JPG">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    double welt
                                                  </p>
                                                </div>
                                              </div>
                                              <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['jacket_pockets_type']) && $_SESSION['suit']['style']['jacket_pockets_type']=='2b') { ?> active <?php } ?>" href="javascript:;" rel="2b">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Hip Pockets: Patched" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_patched.JPG">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    Patched
                                                  </p>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- 3 Bolsillos -->
                                            <div class="2pocket" style="display: none;">
                                              <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['jacket_pockets_type']) && $_SESSION['suit']['style']['jacket_pockets_type']=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Hip Pockets: with flap" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_with_flap.JPG">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    with flap
                                                  </p>
                                                </div>
                                              </div>
                                              <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['jacket_pockets_type']) && $_SESSION['suit']['style']['jacket_pockets_type']=='3a') { ?> active <?php } ?>" href="javascript:;" rel="3a">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Hip Pockets: double welt" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_double_welt.JPG">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    double welt
                                                  </p>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: Lapel Vent -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Back style:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="jacket_vent" class="uniform radio_opt " type="radio" name="jacket_vent" value="0" <?php if($_SESSION['suit']['style']['jacket_vent']=='0') { ?> checked <?php } ?>>
                                              Ventless
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_vent" class="uniform radio_opt " type="radio" name="jacket_vent" value="1" <?php if(!empty($_SESSION['suit']['style']['jacket_vent']) && $_SESSION['suit']['style']['jacket_vent']=='1') { ?> checked <?php } else if($_SESSION['suit']['style']['jacket_vent']==''){ ?> checked <?php } ?>>
                                              Center vent
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_vent" class="uniform radio_opt " type="radio" name="jacket_vent" value="2" <?php if(!empty($_SESSION['suit']['style']['jacket_vent']) && $_SESSION['suit']['style']['jacket_vent']=='2') { ?> checked <?php } ?>>
                                              Side vents
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: sleeve_buttons -->
                                      <div id="jacket_sleeve_buttons" class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Sleeve buttons:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              
                                              <select layer="jacket_buttons" class="option uniform" name="jacket_sleeve_buttons" id="jacket_sleeve_buttons" rel="3">
                                                <option layer="jacket_sleeve_buttons" value="0" <?php if($_SESSION['suit']['style']['jacket_sleeve_buttons']=='0') { ?> selected <?php } ?>>
                                                  No Buttons
                                                </option>
                                                <option layer="jacket_sleeve_buttons" value="2" <?php if(!empty($_SESSION['suit']['style']['jacket_sleeve_buttons']) && $_SESSION['suit']['style']['jacket_sleeve_buttons']=='2') { ?> selected <?php } ?>>
                                                  2
                                                </option>
                                                <option layer="jacket_sleeve_buttons" value="3" <?php if(!empty($_SESSION['suit']['style']['jacket_sleeve_buttons']) && $_SESSION['suit']['style']['jacket_sleeve_buttons']=='3') { ?> selected <?php } else if($_SESSION['suit']['style']['jacket_sleeve_buttons']=='') { ?> selected <?php } ?>>
                                                  3
                                                </option>
                                                <option layer="jacket_sleeve_buttons" value="4" <?php if(!empty($_SESSION['suit']['style']['jacket_sleeve_buttons']) && $_SESSION['suit']['style']['jacket_sleeve_buttons']=='4') { ?> selected <?php } ?>>
                                                  4
                                                </option>
                                              </select>
                                              
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- Jacket: sleeve buttonholes -->
                                      <div id="sleeve_buttonholes" class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Buttonholes:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <!--<label class="option">
                                              
                                              <input layer="jacket_sleeve_buttonholes" class="uniform radio_opt " type="radio" name="jacket_sleeve_buttonholes" value="1" <?php if(!empty($_SESSION['suit']['style']['jacket_sleeve_buttonholes']) && $_SESSION['suit']['style']['jacket_sleeve_buttonholes']=='1') { ?> checked <?php } ?>>
                                              Real (Functional Buttons)
                                            </label>-->
                                            <label class="option">
                                              
                                              <input layer="jacket_sleeve_buttonholes" class="uniform radio_opt " type="radio" name="jacket_sleeve_buttonholes" value="0" <?php if($_SESSION['suit']['style']['jacket_sleeve_buttonholes']=='0') { ?> checked <?php } else if($_SESSION['suit']['style']['jacket_sleeve_buttonholes']=='') { ?> checked <?php } ?>>
                                              Real (Functional Buttons)
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- WAISTCOAT CONFIG -->
                                    <div class="common_waistcoat_config" style="display: none;">
                                      <div class="box_title">
                                        <h1 class="title suit">
                                          Vest
                                        </h1>
                                      </div>
                                      <!--<div class="separator">
                                      </div>-->
                                      
                                      <!-- BOX RIGHT: MODEL + CONTROLS -->
                                      
                                      <div class="box_opts" product_type="waistcoat">
                                        <!-- Waistcoat: Style -->
                                        <div class="conf_opt config_3d">
                                          <div class="box_title">
                                            <p>
                                              Style:
                                            </p>
                                          </div>
                                          <div class="box_opt">
                                            <div class="radio_opt">
                                              <label class="option">
                                                
                                                <input layer="waistcoat_style" class="uniform option_input waistcoat_style" type="radio" name="waistcoat_style" value="simple" <?php if(!empty($_SESSION['suit']['style']['waistcoat_style']) && $_SESSION['suit']['style']['waistcoat_style']=='simple') { ?> checked <?php } else if($_SESSION['suit']['style']['waistcoat_style']=='') { ?> checked <?php } ?>>
                                                Single Breasted
                                              </label>
                                              <label class="option">
                                                
                                                <input layer="waistcoat_style" class="uniform option_input waistcoat_style" type="radio" name="waistcoat_style" value="crossed" <?php if(!empty($_SESSION['suit']['style']['waistcoat_style']) && $_SESSION['suit']['style']['waistcoat_style']=='crossed') { ?> checked <?php } ?>>
                                                Double Breasted
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <!-- Waistcoat: buttons -->
                                        <div id="global_waistcoat_buttons" class="conf_opt config_3d">
                                          <div class="box_title">
                                            <p>
                                              Number of Buttons:
                                            </p>
                                          </div>
                                          <div class="box_opt">
                                            <div class="radio_opt">
                                              <label class="option">
                                                
                                                <select layer="waistcoat_body" class="option uniform" name="waistcoat_buttons" id="waistcoat_buttons">
                                                  <option layer="waistcoat_body" value="3" <?php if(!empty($_SESSION['suit']['style']['waistcoat_buttons']) && $_SESSION['suit']['style']['waistcoat_buttons']=='3') { ?> selected <?php } ?>>
                                                    3
                                                  </option>
                                                  <option layer="waistcoat_body" value="4" <?php if(!empty($_SESSION['suit']['style']['waistcoat_buttons']) && $_SESSION['suit']['style']['waistcoat_buttons']=='4') { ?> selected <?php } ?>>
                                                    4
                                                  </option>
                                                  <option layer="waistcoat_body" value="5" <?php if(!empty($_SESSION['suit']['style']['waistcoat_buttons']) && $_SESSION['suit']['style']['waistcoat_buttons']=='5') { ?> selected <?php } else if($_SESSION['suit']['style']['waistcoat_buttons']=='') { ?> selected <?php } ?>>
                                                    5
                                                  </option>
                                                  <option layer="waistcoat_body" value="6" <?php if(!empty($_SESSION['suit']['style']['waistcoat_buttons']) && $_SESSION['suit']['style']['waistcoat_buttons']=='6') { ?> selected <?php } ?>>
                                                    6
                                                  </option>
                                                </select>
                                                
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <!-- Waistcoat: Lapel -->
                                        
                                        <!-- Waistcoat: Finishing -->
                                        <div class="conf_opt config_3d">
                                          <div class="box_title">
                                            <p>
                                              Edge:
                                            </p>
                                          </div>
                                          <div class="box_opt">
                                            <div class="radio_opt">
                                              <label class="option">
                                                
                                                <input layer="waistcoat_bottom" class="uniform option_input waistcoat_bottom" type="radio" name="waistcoat_bottom" value="straight" <?php if(!empty($_SESSION['suit']['style']['waistcoat_bottom']) && $_SESSION['suit']['style']['waistcoat_bottom']=='straight') { ?> checked <?php } ?>>
                                                Straight
                                              </label>
                                              <label class="option">
                                                
                                                <input layer="waistcoat_bottom" class="uniform option_input waistcoat_bottom" type="radio" name="waistcoat_bottom" value="cut" <?php if(!empty($_SESSION['suit']['style']['waistcoat_bottom']) && $_SESSION['suit']['style']['waistcoat_bottom']=='cut') { ?> checked <?php } else if($_SESSION['suit']['style']['waistcoat_bottom']=='') { ?> checked <?php } ?>>
                                                Diagonal
                                              </label>
                                              <label class="option">
                                                
                                                <input layer="waistcoat_bottom" class="uniform option_input waistcoat_bottom" type="radio" name="waistcoat_bottom" value="rounded" <?php if(!empty($_SESSION['suit']['style']['waistcoat_bottom']) && $_SESSION['suit']['style']['waistcoat_bottom']=='rounded') { ?> checked <?php } ?>>
                                                Rounded
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <!-- Waistcoat: Chest pocket -->
                                        <div class="conf_opt config_3d">
                                          <div class="box_title">
                                            <p>
                                              Breast Pocket:
                                            </p>
                                          </div>
                                          <div class="box_opt">
                                            <div class="radio_opt">
                                              <label class="option">
                                                
                                                <input layer="waistcoat_chest_pocket" class="uniform option_input" type="radio" name="waistcoat_chest_pocket" value="1" <?php if(!empty($_SESSION['suit']['style']['waistcoat_chest_pocket']) && $_SESSION['suit']['style']['waistcoat_chest_pocket']=='1') { ?> checked <?php } else if($_SESSION['suit']['style']['waistcoat_chest_pocket']=='') { ?> checked <?php } ?>>
                                                Yes
                                              </label>
                                              <label class="option">
                                                
                                                <input layer="waistcoat_chest_pocket" class="uniform option_input" type="radio" name="waistcoat_chest_pocket" value="0" <?php if($_SESSION['suit']['style']['waistcoat_chest_pocket']=='0') { ?> checked <?php } ?>>
                                                No
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <!-- Waistcoat: front waistcoat_pockets "waistcoat_pockets" -->
                                        <div class="conf_opt config_3d">
                                          <div class="box_title">
                                            <p>
                                              Front Pockets:
                                            </p>
                                          </div>
                                          <div class="box_opt">
                                            <div class="radio_opt labels_waistcoat_pockets_num">
                                              <label class="option">
                                                
                                                <input layer="waistcoat_pockets" class="uniform num_b waistcoat num_w" type="radio" name="waistcoat_pockets_num" value="0" <?php if($_SESSION['suit']['style']['waistcoat_pockets_num']=='0') { ?> checked <?php } ?>>
                                                No pockets
                                              </label>
                                              <label class="option">
                                                
                                                <input layer="waistcoat_pockets" class="uniform num_b waistcoat num_w" type="radio" name="waistcoat_pockets_num" value="2" <?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets_num']) && $_SESSION['suit']['style']['waistcoat_pockets_num']=='2') { ?> checked <?php } else if($_SESSION['suit']['style']['waistcoat_pockets_num']=='') { ?> checked <?php } ?>>
                                                2 pockets
                                              </label>
                                              <label class="option">
                                                
                                                <input layer="waistcoat_pockets" class="uniform num_b waistcoat num_w" type="radio" name="waistcoat_pockets_num" value="3" <?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets_num']) && $_SESSION['suit']['style']['waistcoat_pockets_num']=='3') { ?> checked <?php } ?>>
                                                3 pockets
                                              </label>
                                            </div>
                                            <div class="list_common_th interactive_options all_waistcoat_pockets open" style="">
                                              <input id="hidden_waistcoat_pockets" class="option_input" type="hidden" name="waistcoat_pockets" value="<?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets'])) { echo $_SESSION['suit']['style']['waistcoat_pockets']; } else { ?>2<?php } ?>">
                                              <!-- 1 Bolsillo -->
                                              <div class="1pocket">
                                                <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets']) && $_SESSION['suit']['style']['waistcoat_pockets']=='2') { ?> active <?php } else if($_SESSION['suit']['style']['waistcoat_pockets']=='') { ?> active <?php } ?>" href="javascript:;" rel="2">
                                                  <div class="box_model">
                                                    <div class="active">
                                                    </div>
                                                    <img alt="Front Pockets: Welt Pockets" src="<?php echo $homeurl;?>assets/images/suit_img/waistcoat/waistcoat_pockets_2.png">
                                                    <br>
                                                  </div>
                                                  <div class="box_title_common">
                                                    <p>
                                                      Welt Pockets
                                                    </p>
                                                  </div>
                                                </div>
                                                <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets']) && $_SESSION['suit']['style']['waistcoat_pockets']=='2a') { ?> active <?php } ?>" href="javascript:;" rel="2a">
                                                  <div class="box_model">
                                                    <div class="active">
                                                    </div>
                                                    <img alt="Front Pockets: Double Welt" src="<?php echo $homeurl;?>assets/images/suit_img/waistcoat/waistcoat_pockets_2a.png">
                                                    <br>
                                                  </div>
                                                  <div class="box_title_common">
                                                    <p>
                                                      Double Welt
                                                    </p>
                                                  </div>
                                                </div>
                                                <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets']) && $_SESSION['suit']['style']['waistcoat_pockets']=='2b') { ?> active <?php } ?>" href="javascript:;" rel="2b">
                                                  <div class="box_model">
                                                    <div class="active">
                                                    </div>
                                                    <img alt="Front Pockets: with flap" src="<?php echo $homeurl;?>assets/images/suit_img/waistcoat/waistcoat_pockets_2b.png">
                                                    <br>
                                                  </div>
                                                  <div class="box_title_common">
                                                    <p>
                                                      with flap
                                                    </p>
                                                  </div>
                                                </div>
                                              </div>
                                              <!-- 2 Bolsillo -->
                                              <div class="2pocket" style="display: none;">
                                                <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets']) && $_SESSION['suit']['style']['waistcoat_pockets']=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                                                  <div class="box_model">
                                                    <div class="active">
                                                    </div>
                                                    <img alt="Front Pockets: Welt Pockets" src="<?php echo $homeurl;?>assets/images/suit_img/waistcoat/waistcoat_pockets_2.png">
                                                    <br>
                                                  </div>
                                                  <div class="box_title_common">
                                                    <p>
                                                      Welt Pockets
                                                    </p>
                                                  </div>
                                                </div>
                                                <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets']) && $_SESSION['suit']['style']['waistcoat_pockets']=='3a') { ?> active <?php } ?>" href="javascript:;" rel="3a">
                                                  <div class="box_model">
                                                    <div class="active">
                                                    </div>
                                                    <img alt="Front Pockets: Double Welt" src="<?php echo $homeurl;?>assets/images/suit_img/waistcoat/waistcoat_pockets_2a.png">
                                                    <br>
                                                  </div>
                                                  <div class="box_title_common">
                                                    <p>
                                                      Double Welt
                                                    </p>
                                                  </div>
                                                </div>
                                                <div layer="waistcoat_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['waistcoat_pockets']) && $_SESSION['suit']['style']['waistcoat_pockets']=='3b') { ?> active <?php } ?>" href="javascript:;" rel="3b">
                                                  <div class="box_model">
                                                    <div class="active">
                                                    </div>
                                                    <img alt="Front Pockets: with flaps" src="<?php echo $homeurl;?>assets/images/suit_img/waistcoat/waistcoat_pockets_2b.png">
                                                    <br>
                                                  </div>
                                                  <div class="box_title_common">
                                                    <p>
                                                      with flaps
                                                    </p>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <br style="clear: both;">
                                    <!-- PANTS CONFIG -->
                                    <div class="box_title">
                                      <h1 class="title suit">
                                        Pants 
                                      </h1>
                                    </div>
                                    <!--<div class="separator">
                                    </div>-->
                                    <div class="box_opts" product_type="pants">
                                      <!-- Pants: FIT -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Fit:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="pants_fit" class="uniform option_input" type="radio" name="pants_fit" value="normal" <?php if(!empty($_SESSION['suit']['style']['pants_fit']) && $_SESSION['suit']['style']['pants_fit']=='normal') { ?> checked <?php } ?>>
                                              Regular fit
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_fit" class="uniform option_input" type="radio" name="pants_fit" value="fit" <?php if(!empty($_SESSION['suit']['style']['pants_fit']) && $_SESSION['suit']['style']['pants_fit']=='fit') { ?> checked <?php } else if($_SESSION['suit']['style']['pants_fit']=='') { ?> checked <?php } ?>>
                                              Slim Fit
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
                                            <label class="option">
                                              
                                              <input layer="pants_peg" class="uniform option_input" type="radio" name="pants_peg" value="0" <?php if($_SESSION['suit']['style']['pants_peg']=='0') { ?> checked <?php } else if($_SESSION['suit']['style']['pants_peg']=='') { ?> checked <?php } ?>>
                                              No Pleats
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_peg" class="uniform option_input" type="radio" name="pants_peg" value="1" <?php if(!empty($_SESSION['suit']['style']['pants_peg']) && $_SESSION['suit']['style']['pants_peg']=='1') { ?> checked <?php } ?>>
                                              Pleated
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_peg" class="uniform option_input" type="radio" name="pants_peg" value="2" <?php if(!empty($_SESSION['suit']['style']['pants_peg']) && $_SESSION['suit']['style']['pants_peg']=='2') { ?> checked <?php } ?>>
                                              Double pleats
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
                                            <input class="option_input" type="hidden" name="pants_belt" value="<?php if($_SESSION['suit']['style']['pants_belt']!='') { echo $_SESSION['suit']['style']['pants_belt']; } else { ?>1<?php } ?>">
                                            <!-- Cuadrado -->
                                            <div layer="pants_belt" class="option_trigger common_th  <?php if($_SESSION['suit']['style']['pants_belt']=='0') { ?> active <?php } ?> big_images" href="javascript:;" rel="0">
                                              <div class="box_model big suit_belt">
                                                <div class="active">
                                                </div>
                                                <img alt="Pants Fastening Centered" src="<?php echo $homeurl;?>assets/images/suit_img/pant_fastening/fastening_centered.JPG">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Centered
                                                </p>
                                              </div>
                                            </div>
                                            <!-- Flecha -->
                                            <div layer="pants_belt" class="option_trigger common_th <?php if(!empty($_SESSION['suit']['style']['pants_belt']) && $_SESSION['suit']['style']['pants_belt']=='1') { ?> active <?php } else if($_SESSION['suit']['style']['pants_belt']=='') { ?> active <?php } ?> big_images" href="javascript:;" rel="1">
                                              <div class="box_model big suit_belt">
                                                <div class="active">
                                                </div>
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
                                            <label class="option">
                                              
                                              <input layer="pants_front_pocket" class="uniform option_input" type="radio" name="pants_front_pocket" value="diagonal" <?php if(!empty($_SESSION['suit']['style']['pants_front_pocket']) && $_SESSION['suit']['style']['pants_front_pocket']=='diagonal') { ?> checked <?php } else if($_SESSION['suit']['style']['pants_front_pocket']=='') { ?> checked <?php } ?>>
                                              Diagonal
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_front_pocket" class="uniform option_input" type="radio" name="pants_front_pocket" value="vertical" <?php if(!empty($_SESSION['suit']['style']['pants_front_pocket']) && $_SESSION['suit']['style']['pants_front_pocket']=='vertical') { ?> checked <?php } ?>>
                                              Vertical
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_front_pocket" class="uniform option_input" type="radio" name="pants_front_pocket" value="rounded" <?php if(!empty($_SESSION['suit']['style']['pants_front_pocket']) && $_SESSION['suit']['style']['pants_front_pocket']=='rounded') { ?> checked <?php } ?>>
                                              Rounded
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
                                            <label class="option">
                                              
                                              <input layer="pants_back_pocket" class="uniform num_b" type="radio" name="pants_back_pocket" value="0" <?php if($_SESSION['suit']['style']['pants_back_pocket']=='0') { ?> checked <?php } ?>>
                                              No pockets
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_back_pocket" class="uniform num_b" type="radio" name="pants_back_pocket" value="1" <?php if(!empty($_SESSION['suit']['style']['pants_back_pocket']) && $_SESSION['suit']['style']['pants_back_pocket']=='1') { ?> checked <?php } else if($_SESSION['suit']['style']['pants_back_pocket']==''){ ?> checked <?php } ?>>
                                              1 back pocket
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_back_pocket" class="uniform num_b" type="radio" name="pants_back_pocket" value="2" <?php if(!empty($_SESSION['suit']['style']['pants_back_pocket']) && $_SESSION['suit']['style']['pants_back_pocket']=='2') { ?> checked <?php } ?>>
                                              2 back pockets
                                            </label>
                                          </div>
                                          <div id="box_back_pocket_img" class="list_common_th interactive_options all_pants_back_pocket open">
                                            <input id="hidden_chest_pocket" class="option_input" type="hidden" name="pants_back_pocket_type" value="<?php if(!empty($_SESSION['suit']['style']['pants_back_pocket_type'])) { echo $_SESSION['suit']['style']['pants_back_pocket_type']; } else { ?>A<?php } ?>">
                                            <!-- 1 Bolsillo -->
                                            <div class="box_pocket">
                                              <div layer="pants_back_pocket" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['pants_back_pocket_type']) && $_SESSION['suit']['style']['pants_back_pocket_type']=='A') { ?> active <?php } else if($_SESSION['suit']['style']['pants_back_pocket_type']=='') { ?> active <?php } ?>" href="javascript:;" rel="A">
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
                                              <div layer="pants_back_pocket" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['pants_back_pocket_type']) && $_SESSION['suit']['style']['pants_back_pocket_type']=='B') { ?> active <?php } ?>" href="javascript:;" rel="B">
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
                                              <div layer="pants_back_pocket" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['suit']['style']['pants_back_pocket_type']) && $_SESSION['suit']['style']['pants_back_pocket_type']=='C') { ?> active <?php } ?>" href="javascript:;" rel="C">
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
                                            <label class="option">
                                              
                                              <input layer="pants_cuff" class="uniform option_input" type="radio" name="pants_cuff" value="0" <?php if($_SESSION['suit']['style']['pants_cuff']=='0') { ?> checked <?php } else if($_SESSION['suit']['style']['pants_cuff']=='') { ?> checked <?php } ?>>
                                              No pant cuffs
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_cuff" class="uniform option_input" type="radio" name="pants_cuff" value="1" <?php if(!empty($_SESSION['suit']['style']['pants_cuff']) && $_SESSION['suit']['style']['pants_cuff']=='1') { ?> checked <?php } ?>>
                                              With pant cuffs
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Extra Pants -->
                                    <!-- Pants: Cuff -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Extra Pants:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="extra_pants" class="uniform option_input" type="radio" name="extra_pants" value="Yes" <?php if($_SESSION['suit']['style']['extra_pants']=='Yes') { ?> checked <?php } ?>>
                                              Yes
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="extra_pants" class="uniform option_input" type="radio" name="extra_pants" value="No" <?php if($_SESSION['suit']['style']['extra_pants']=='No') { ?> checked <?php } else if($_SESSION['suit']['style']['extra_pants']=='') { ?> checked <?php } ?>>
                                              No
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          
                                        </div>
                                        <div class="box_opt">
                                          Prolong the life of your custom suit by adding an extra pair of pants.Pants will wear down before the suit jacket.
                                        </div>
                                      </div>
                                      
                                    </div>
                                    <br>
                                    <br>
                                    
                                    <!-- WAISTCOAT CONFIG -->
                                    
                                    <!-- PANTS CONFIG -->
                                  </div>
                                </div>
                              </form>
                              
                              <script type="text/javascript">
                                price_fabric_extra = {
                                  "man_suit2": 0,
                                  "man_suit3": 0
                                }
                                  ;
                                var product_type = 'man_suit2';
                                var price_extra_waistcoat = '<?php echo $_SESSION["p_dtl"]["waistcoat_price"]; ?>';
                                var price_extra_pant = '<?php echo $_SESSION["p_dtl"]["extra_pant_price"]; ?>';
                                var config = {
                                  "jacket_style": $("input[name=jacket_style]:checked").val(),
                                  "jacket_lapel_type": $("input[name=jacket_lapel_type]:checked").val(),
                                  "jacket_buttons": $("input[name=jacket_buttons]:checked").val(),
                                  "jacket_chest_pocket": $("input[name=jacket_chest_pocket]:checked").val(),
                                  "jacket_pockets": $("input[name=jacket_pockets]:checked").val(),
                                  "jacket_pockets_type": $("input[name=jacket_pockets_type]:checked").val(),
                                  "jacket_vent": $("input[name=jacket_vent]:checked").val(),
                                  "jacket_sleeve_buttons": $("input[name=jacket_sleeve_buttons]:checked").val(),
                                  "jacket_sleeve_buttonholes": $("input[name=jacket_sleeve_buttonholes]:checked").val(),
                                  "jacket_fit": $("input[name=jacket_fit]:checked").val(),
                                  "pants_fit": $("input[name=pants_fit]:checked").val(),
                                  "pants_peg": $("input[name=pants_peg]:checked").val(),
                                  "pants_back_pocket": $("input[name=pants_back_pocket]:checked").val(),
                                  "pants_back_pocket_type": $("input[name=pants_back_pocket_type]:checked").val(),
                                  "pants_cuff": $("input[name=pants_cuff]:checked").val(),
                                  "pants_front_pocket": $("input[name=pants_front_pocket]:checked").val(),
                                  "pants_ribbon": '0',
                                  "pants_belt": $("input[name=pants_belt]:checked").val(),
                                  "waistcoat_style": $("input[name=waistcoat_style]:checked").val(),
                                  "waistcoat_bottom": $("input[name=waistcoat_bottom]:checked").val(),
                                  "waistcoat_buttons": $("input[name=waistcoat_buttons]:checked").val(),
                                  "waistcoat_chest_pocket": $("input[name=waistcoat_chest_pocket]:checked").val(),
                                  "waistcoat_pockets_num": $("input[name=waistcoat_pockets_num]:checked").val(),
                                  "waistcoat_pockets": $("input[name=waistcoat_pockets]:checked").val(),
                                  "suit_type": $("input[name=suit_type]:checked").val()
                                }
                                    ;
                                var extras = [];
                                var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";

                                ready_callbacks.push(function() {
                                  var cloth_type = 'suit';
                                  var id_tie = '3';
                                  var id_t4l_fabric = {
                                    "default_fabric": "<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>",
                                    "waistcoat": "<?php if(!empty($_SESSION['suit']['fabric']['fabric_id'])) { echo $_SESSION['suit']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>",
                                  }
                                      ;
                                  price_fabric_extra = {
                                    "man_suit2": 0,
                                    "man_suit3": 0
                                  }
                                    ;
                                  var button_code = '2';
                                  var shoe_color = 'black';
                                  var id_t4l_lining = {
                                    "default": "57",
                                    "waistcoat": "57"
                                  };
                                  var waistcoat_button_code = 2;
                                  Man_Suit.initCommon('#configure_form', '#model_3d_preview', id_t4l_fabric, button_code, shoe_color, id_t4l_lining, waistcoat_button_code, id_tie,default_fabric_id);
                                  Man_Suit.initConfigure(id_t4l_fabric);
                                });
                              </script>
                               
                            </div>
                          </div>
                           <script type="text/javascript">
                            var suit_price = {
                              "base": "<?php echo $_SESSION['p_dtl']['base_price']; ?>",
                              "fabric": <?php if($_SESSION['suit']['fabric']['fabric_price']!='') { echo $_SESSION['suit']['fabric']['fabric_price']; } else { echo $_SESSION['fab_dtl']['fab_price'];} ?>,
                              "waistcoat" : <?php if(!empty($_SESSION['suit']['style']['suit_type']) && $_SESSION['suit']['style']['suit_type']=="man_suit3") { echo $_SESSION['p_dtl']['waistcoat_price']; } else { echo 0;} ?>,
                              "extra_pant" : <?php if(!empty($_SESSION['suit']['style']['extra_pants']) && $_SESSION['suit']['style']['extra_pants']=='Yes') {  echo $_SESSION["p_dtl"]["extra_pant_price"]; } else { echo 0; } ?>,
                              "patches" : <?php if(!empty($_SESSION['suit']['accents']['elbow_price'])) { echo $_SESSION['suit']['accents']['elbow_price']; } else { echo 0; } ?>,
                              "button_holes_threads_jacket" : <?php if(!empty($_SESSION['suit']['accents']['button_holes_price'])) { echo $_SESSION['suit']['accents']['button_holes_price']; } else { echo 0; } ?>,
                              "metal_buttons" : <?php if(!empty($_SESSION['suit']['accents']['metal_button_price'])) { echo $_SESSION['suit']['accents']['metal_button_price']; } else { echo 0; } ?>,
                              "handkerchief" : <?php if(!empty($_SESSION['suit']['accents']['handkerchief_price'])) { echo $_SESSION['suit']['accents']['handkerchief_price']; } else { echo 0; } ?>
                            }
                                ;
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
      
<?php  } ?>

<!-- Custom Suit Section Ends -->


<!-- Custom Trouser Section Starts  -->

<?php

if($id=='4') {

unset($_SESSION['suit']['style']);
unset($_SESSION['suit']['fabric']);
unset($_SESSION['suit']['accents']);
unset($_SESSION['jacket']['style']);
unset($_SESSION['jacket']['fabric']);
unset($_SESSION['jacket']['accents']);
unset($_SESSION['shirt']['style']);
unset($_SESSION['shirt']['fabric']);
unset($_SESSION['shirt']['accents']);
unset($_SESSION['coat']['style']);
unset($_SESSION['coat']['fabric']);
unset($_SESSION['coat']['accents']);

if(isset($_POST['orderid']))
{
    unset($_SESSION['fab_dtl']);
    $oid=mysqli_real_escape_string($con,$_POST['orderid']);
    $action="update";
    $_SESSION['p_dtl1'] = array('orderid' => $oid,'action'=>$action);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);

    
      $pants_fit = explode(":",$style[0]);
      $pants_peg = explode(":",$style[1]);
      $pants_belt = explode(":",$style[2]);
      $pants_front_pocket = explode(":",$style[3]);
      $pants_back_pocket = explode(":",$style[4]);
      $pants_back_pocket_type = explode(":",$style[5]);
      $pants_cuff = explode(":",trim($style[6],"}"));

      $_SESSION['pant']['style'] = array('base_price' => isset($_POST['org_price']) ? $_POST['org_price']:'0',
            'pants_fit'=>trim($pants_fit[1]),
            'pants_back_pocket_type'=>trim($pants_back_pocket_type[1]),
            'pants_peg'=>trim($pants_peg[1]),
            'pants_belt'=>trim($pants_belt[1]),
            'pants_front_pocket'=>trim($pants_front_pocket[1]),
            'pants_back_pocket'=>trim($pants_back_pocket[1]),
            'pants_cuff'=>trim($pants_cuff[1])
    );


    $fabric=explode("{",$r['om_fab']);
    $fabric=explode(",",$fabric[1]);


    $fabric_price=explode(":",$fabric[0]);
    $fabric_id = explode(":",trim($fabric[1],"}"));
    $fabric_name = explode(":",trim($fabric[2],"}"));

    $_SESSION['pant']['fabric'] = array('fabric_name'=>$fabric_name[1]);



    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master where fab_rand = '".trim($fabric_id[1])."'");

    if(mysqli_num_rows($fab_dtl_qry) > 0) {
        while($fr=mysqli_fetch_array($fab_dtl_qry)) {
          $_SESSION['fab_dtl'] = array('fab_id' =>$fr['fab_rand'],
               'fab_unique_id' => $r['fab_id'],
               'fab_name' => $fr['fab_name'],
               'fab_desc' => $fr['fab_desc'],
               'fab_img' => $fr['fab_img'],
               'fab_price' => $fr['fab_price'],
               'fab_default_img' => $fr['default_img']
          );
        }
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
                            <li class="active">
                              <a href="" id="link_configure" class="tab">
                                Style
                              </a>
                            </li>
                            <li>
                              <a href="" class="tab" id="link_fabric">
                                Fabric
                              </a>
                            </li>
                           
                          </ul>
                          <div class="c-nav cf" id="configure-form1">
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
                    
                    
                    <!-- Style Tab Start-->
                      <div id="body" class="man_suit2_configure garment_container">
                        <div class="body_box" id="features">
                          <div class="body_product_box_3d">
                            
                            <div id="man_suit">
                              <form method="post" action="<?php echo $homeurl; ?>includes/action/action.php" id="configure_form" class="configure_form">
                                <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">
                                <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">
                                <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">
                                <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">
                                <input type="hidden" name="section" value="style">
                                <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">
                                
                                <input type="hidden" name="action" value="<?php echo $_SESSION['p_dtl1']['action']; ?>">
                                <input id="go_to" name="go_to" type="hidden" value="">
                                <input name="next" type="hidden" value="1">
                                <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['fabric']['fabric_id'])) { echo $_SESSION['pant']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">
                                <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['pant']['style']['def_fab'])) { echo $_SESSION['pant']['style']['def_fab']; } ?>">
                                <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['pant']['style']['def_waistcoat'])) { echo $_SESSION['pant']['style']['def_waistcoat']; } ?>">
                                
                                <input type="hidden" name="fabric_name1" value="<?php echo $_SESSION['pant']['fabric']['fabric_name']; ?>">  

                                <!-- MODEL 3D dels suits -->
                                <!-- BOX RIGHT: MODEL + CONTROLS -->
                                <div class="box_right_3d suit">
                                  <div style="margin:0 auto;font-weight:bold;text-align:center;width:200px;">
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
                                    <div class="controls col-md-1">
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
                                  <div class="content suit garment_block" id="max_height_move">
                                    <!-- JACKET CONFIG -->
                                    <div class="box_title">
                                      <!--<h1 class="title">
                                        Custom Blazers &nbsp;/
                                      </h1>
                                      <span class="subtitle">
                                        &nbsp;
                                        <span>
                                          Choose your style
                                        </span>
                                      </span>-->
                                    </div>
                                    
                                    <!-- PANTS CONFIG -->
                                    <div class="box_title">
                                      <h1 class="title suit">
                                        Pants 
                                      </h1>
                                    </div>
                                    <!--<div class="separator">
                                    </div>-->
                                    <div class="box_opts" product_type="pants">
                                      <!-- Pants: FIT -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Fit:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="pants_fit" class="uniform option_input" type="radio" name="pants_fit" value="normal" <?php if(!empty($_SESSION['pant']['style']['pants_fit']) && $_SESSION['pant']['style']['pants_fit']=='normal') { ?> checked <?php } ?>>
                                              Regular fit
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_fit" class="uniform option_input" type="radio" name="pants_fit" value="fit" <?php if(!empty($_SESSION['pant']['style']['pants_fit']) && $_SESSION['pant']['style']['pants_fit']=='fit') { ?> checked <?php } else if($_SESSION['pant']['style']['pants_fit']=='') { ?> checked <?php } ?>>
                                              Slim Fit
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
                                            <label class="option">
                                              
                                              <input layer="pants_peg" class="uniform option_input" type="radio" name="pants_peg" value="0" <?php if($_SESSION['pant']['style']['pants_peg']=='0') { ?> checked <?php } else if($_SESSION['pant']['style']['pants_peg']=='') { ?> checked <?php } ?>>
                                              No Pleats
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_peg" class="uniform option_input" type="radio" name="pants_peg" value="1" <?php if(!empty($_SESSION['pant']['style']['pants_peg']) && $_SESSION['pant']['style']['pants_peg']=='1') { ?> checked <?php } ?>>
                                              Pleated
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_peg" class="uniform option_input" type="radio" name="pants_peg" value="2" <?php if(!empty($_SESSION['pant']['style']['pants_peg']) && $_SESSION['pant']['style']['pants_peg']=='2') { ?> checked <?php } ?>>
                                              Double pleats
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="conf_opt config_3d">
                                        <div class="box_title" attr="<?php echo $_SESSION['pant']['style']['pants_belt']; ?>">
                                          <p>
                                            Pants Fastening:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="list_common_th interactive_options all_belts open">
                                            <input class="option_input" type="hidden" name="pants_belt" value="<?php if($_SESSION['pant']['style']['pants_belt']!='') { echo $_SESSION['pant']['style']['pants_belt']; } else { ?>1<?php } ?>">
                                            <!-- Cuadrado -->
                                            <div layer="pants_belt" class="option_trigger common_th  <?php if($_SESSION['pant']['style']['pants_belt']=='0') { ?> active <?php } ?> big_images" href="javascript:;" rel="0">
                                              <div class="box_model big suit_belt">
                                                <div class="active">
                                                </div>
                                                <img alt="Pants Fastening Centered" src="<?php echo $homeurl;?>assets/images/suit_img/pant_fastening/fastening_centered.JPG">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Centered
                                                </p>
                                              </div>
                                            </div>
                                            <!-- Flecha -->
                                            <div layer="pants_belt" class="option_trigger common_th <?php if(!empty($_SESSION['pant']['style']['pants_belt']) && $_SESSION['pant']['style']['pants_belt']=='1') { ?> active <?php } else if($_SESSION['pant']['style']['pants_belt']=='') { ?> active <?php } ?> big_images" href="javascript:;" rel="1">
                                              <div class="box_model big suit_belt">
                                                <div class="active">
                                                </div>
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
                                            <label class="option">
                                              
                                              <input layer="pants_front_pocket" class="uniform option_input" type="radio" name="pants_front_pocket" value="diagonal" <?php if(!empty($_SESSION['pant']['style']['pants_front_pocket']) && $_SESSION['pant']['style']['pants_front_pocket']=='diagonal') { ?> checked <?php } else if($_SESSION['pant']['style']['pants_front_pocket']=='') { ?> checked <?php } ?>>
                                              Diagonal
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_front_pocket" class="uniform option_input" type="radio" name="pants_front_pocket" value="vertical" <?php if(!empty($_SESSION['pant']['style']['pants_front_pocket']) && $_SESSION['pant']['style']['pants_front_pocket']=='vertical') { ?> checked <?php } ?>>
                                              Vertical
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_front_pocket" class="uniform option_input" type="radio" name="pants_front_pocket" value="rounded" <?php if(!empty($_SESSION['pant']['style']['pants_front_pocket']) && $_SESSION['pant']['style']['pants_front_pocket']=='rounded') { ?> checked <?php } ?>>
                                              Rounded
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
                                            <label class="option">
                                              
                                              <input layer="pants_back_pocket" class="uniform num_b" type="radio" name="pants_back_pocket" value="0" <?php if($_SESSION['pant']['style']['pants_back_pocket']=='0') { ?> checked <?php } ?>>
                                              No pockets
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_back_pocket" class="uniform num_b" type="radio" name="pants_back_pocket" value="1" <?php if(!empty($_SESSION['pant']['style']['pants_back_pocket']) && $_SESSION['pant']['style']['pants_back_pocket']=='1') { ?> checked <?php } else if($_SESSION['pant']['style']['pants_back_pocket']==''){ ?> checked <?php } ?>>
                                              1 back pocket
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_back_pocket" class="uniform num_b" type="radio" name="pants_back_pocket" value="2" <?php if(!empty($_SESSION['pant']['style']['pants_back_pocket']) && $_SESSION['pant']['style']['pants_back_pocket']=='2') { ?> checked <?php } ?>>
                                              2 back pockets
                                            </label>
                                          </div>
                                          <div id="box_back_pocket_img" class="list_common_th interactive_options all_pants_back_pocket open">
                                            <input id="hidden_chest_pocket" class="option_input" type="hidden" name="pants_back_pocket_type" value="<?php if($_SESSION['pant']['style']['pants_back_pocket_type']!='') { echo $_SESSION['pant']['style']['pants_back_pocket_type']; } else { ?>A<?php } ?>">
                                            <!-- 1 Bolsillo -->
                                            <div class="box_pocket">
                                              <div layer="pants_back_pocket" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['pant']['style']['pants_back_pocket_type']) && $_SESSION['pant']['style']['pants_back_pocket_type']=='A') { ?> active <?php } else if($_SESSION['pant']['style']['pants_back_pocket_type']=='') { ?> active <?php } ?>" href="javascript:;" rel="A">
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
                                              <div layer="pants_back_pocket" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['pant']['style']['pants_back_pocket_type']) && $_SESSION['pant']['style']['pants_back_pocket_type']=='B') { ?> active <?php } ?>" href="javascript:;" rel="B">
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
                                              <div layer="pants_back_pocket" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['pant']['style']['pants_back_pocket_type']) && $_SESSION['pant']['style']['pants_back_pocket_type']=='C') { ?> active <?php } ?>" href="javascript:;" rel="C">
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
                                            <label class="option">
                                              
                                              <input layer="pants_cuff" class="uniform option_input" type="radio" name="pants_cuff" value="0" <?php if($_SESSION['pant']['style']['pants_cuff']=='0') { ?> checked <?php } else if($_SESSION['pant']['style']['pants_cuff']=='') { ?> checked <?php } ?>>
                                              No pant cuffs
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="pants_cuff" class="uniform option_input" type="radio" name="pants_cuff" value="1" <?php if(!empty($_SESSION['pant']['style']['pants_cuff']) && $_SESSION['pant']['style']['pants_cuff']=='1') { ?> checked <?php } ?>>
                                              With pant cuffs
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <br>
                                    <br>
                                    
                                    <!-- WAISTCOAT CONFIG -->
                                    
                                    <!-- PANTS CONFIG -->
                                  </div>
                                </div>
                              </form>

                              <script type="text/javascript">
                                var product_type = 'man_pants';
                                var price_extra_waistcoat = '50';
                                var config = {
                                    "pants_fit": $("input[name=pants_fit]:checked").val(),
                                    "pants_peg": $("input[name=pants_peg]:checked").val(),
                                    "pants_back_pocket": $("input[name=pants_back_pocket]:checked").val(),
                                    "pants_back_pocket_type": $("input[name=pants_back_pocket_type]:checked").val(),
                                    "pants_cuff": $("input[name=pants_cuff]:checked").val(),
                                    "pants_front_pocket": $("input[name=pants_front_pocket]:checked").val(),
                                    "pants_ribbon": '0',
                                    "pants_belt": $("input[name=pants_belt]:checked").val(),
                                };
                                var extras = [];
                                ready_callbacks.push(function() {
                                    var cloth_type = 'single';
                                    var id_tie = 'false';
                                    var id_t4l_fabric = '<?php if(!empty($_SESSION["pant"]["fabric"]["fabric_id"])) { echo $_SESSION["pant"]["fabric"]["fabric_id"]; } else { echo $_SESSION["fab_dtl"]["fab_id"]; } ?>';
                                    var button_code = '2';
                                    var shoe_color = 'black';
                                    var id_t4l_lining = '57';
                                    var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";  
                                    Man_Pants.initCommon(id_t4l_fabric, '#configure_form', '#model_3d_preview', button_code, shoe_color,default_fabric_id);
                                    Man_Pants.initConfigure(id_t4l_fabric);
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
          
          <!-- fixes floating problems when mobile menu is visible -->
          
      </div>
      
<?php  } ?>

<!-- Custom Trouser Section Ends -->
 
<?php if($id=="3") { 

unset($_SESSION['suit']['style']);
unset($_SESSION['suit']['fabric']);
unset($_SESSION['suit']['accents']);
unset($_SESSION['pant']['style']);
unset($_SESSION['pant']['fabric']);
unset($_SESSION['pant']['accents']);
unset($_SESSION['shirt']['style']);
unset($_SESSION['shirt']['fabric']);
unset($_SESSION['shirt']['accents']);
unset($_SESSION['coat']['style']);
unset($_SESSION['coat']['fabric']);
unset($_SESSION['coat']['accents']);

if(isset($_POST['orderid']))
{
    unset($_SESSION['fab_dtl']);
    
    $oid=mysqli_real_escape_string($con,$_POST['orderid']);

    $action="update";
    $_SESSION['p_dtl1'] = array('orderid' => $oid,'action'=>$action);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);
    
    $jacket_style = explode(":",$style[0]);
    $jacket_fit = explode(":",$style[1]);
    $jacket_lapel_type = explode(":",$style[2]);
    $jacket_buttons = explode(":",$style[3]);
    $jacket_chest_pocket = explode(":",$style[4]);
    $jacket_pockets = explode(":",$style[5]);
    $jacket_pockets_type = explode(":",$style[6]);
    $jacket_vent = explode(":",$style[7]);
    $jacket_sleeve_buttons = explode(":",$style[8]);
    $jacket_sleeve_buttonholes = explode(":",trim($style[9],"}"));
    
    $_SESSION['jacket']['style'] = array('base_price' => isset($_POST['org_price']) ? $_POST['org_price']:'0',
            'jacket_style'=>trim($jacket_style[1]),
            'jacket_fit'=>trim($jacket_fit[1]),
            'jacket_lapel_type'=>trim($jacket_lapel_type[1]),
            'jacket_buttons'=>trim($jacket_buttons[1]),
            'jacket_chest_pocket'=>trim($jacket_chest_pocket[1]),
            'jacket_pockets'=>trim($jacket_pockets[1]),
            'jacket_pockets_type'=>trim($jacket_pockets_type[1]),
            'jacket_vent'=>trim($jacket_vent[1]),
            'jacket_sleeve_buttons'=>trim($jacket_sleeve_buttons[1]),
            'jacket_sleeve_buttonholes'=>trim($jacket_sleeve_buttonholes[1])
          );

    $fabric=explode("{",$r['om_fab']);
    $fabric=explode(",",$fabric[1]);

    $fabric_price=explode(":",$fabric[0]);
    $fabric_id = explode(":",trim($fabric[1],"}"));
    $fabric_name = explode(":",trim($fabric[2],"}"));

    $_SESSION['jacket']['fabric'] = array('fabric_name'=>$fabric_name[1]);


    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master where fab_rand = '".trim($fabric_id[1])."'");

    if(mysqli_num_rows($fab_dtl_qry) > 0) {
        while($fr=mysqli_fetch_array($fab_dtl_qry)) {
          $_SESSION['fab_dtl'] = array('fab_id' =>$fr['fab_rand'],
               'fab_unique_id' => $r['fab_id'],
               'fab_name' => $fr['fab_name'],
               'fab_desc' => $fr['fab_desc'],
               'fab_img' => $fr['fab_img'],
               'fab_price' => $fr['fab_price'],
               'fab_default_img' => $fr['default_img']
          );
        }
    }

    $accents=explode("{",$r['om_accents']);

    $accents=explode(",",$accents[1]);

     $jacket_lining_type = explode(":",$accents[0]);
     $lining_price = explode(":",$accents[1]);
     $lining_id = explode(":",$accents[2]);
     $font_price = explode(":",$accents[3]);
     $font_family = explode(":",$accents[4]);
     $initials_jacket = explode(":",$accents[5]);
     $monogram_color = explode(":",$accents[6]);
     $type_of_button = explode(":",$accents[7]);
     $metal_button_price = explode(":",$accents[8]);
     $metal_btn_type = explode(":",$accents[9]);
     $type_of_neck = explode(":",$accents[10]);
     $neck_lining_price = explode(":",$accents[11]);
     $neck_lining_type = explode(":",$accents[12]);
     $type_of_elbow = explode(":",$accents[13]);
     $elbow_price = explode(":",$accents[14]);
     $elbow_type = explode(":",$accents[15]);
     $type_pocket_square = explode(":",$accents[16]);
     $handkerchief_price = explode(":",$accents[17]);
     $pocket_square_type = explode(":",$accents[18]);
     $type_of_colored_button_holes = explode(":",$accents[19]);
     $lapel_color = explode(":",$accents[20]);
     $button_holes_price = explode(":",$accents[21]);
     $colored_thread_type = explode(":",$accents[22]);
     $colored_holes_type = explode(":",trim($accents[23],"}"));

     $_SESSION['jacket']['accents'] = array('jacket_lining_type' => trim($jacket_lining_type[1]),
              'lining_price' => trim($lining_price[1]),
              'tot_price'=>trim($tot_price[1]),
              'jacket_lining_id' => trim($lining_id[1]),
              'font_price' => trim($font_price[1]),
              'font_family' => trim($font_family[1]),
              'initials_jacket' => trim($initials_jacket[1]),
              'monogram_color' => trim($monogram_color[1]),
              'type_of_button' => trim($type_of_button[1]),
              'metal_button_price' => trim($metal_button_price[1]),
              'metal_btn_type' => trim($metal_btn_type[1]),
              'type_of_neck' => trim($type_of_neck[1]),
              'neck_lining_price' => trim($neck_lining_price[1]),
              'neck_lining_type' => trim($neck_lining_type[1]),
              'type_of_elbow' => trim($type_of_elbow[1]),
              'elbow_price' => trim($elbow_price[1]),
              'elbow_type' => trim($elbow_type[1]),
              'type_pocket_square' => trim($type_pocket_square[1]), 
              'handkerchief_price' => trim($handkerchief_price[1]),
              'pocket_square_type' => trim($pocket_square_type[1]),
              'type_of_colored_button_holes' => trim($type_of_colored_button_holes[1]),
              'lapel_color' => trim($lapel_color[1]),
              'button_holes_price' => trim($button_holes_price[1]),
              'colored_thread_type' => trim($colored_thread_type[1]),
              'colored_holes_type' => trim($colored_holes_type[1])
       );
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
                            <li class="active">
                              <a href="" id="link_configure" class="tab">
                                Style
                              </a>
                            </li>
                            <li>
                              <a href="" class="tab" id="link_fabric">
                                Fabric
                              </a>
                            </li>
                            <li>
                              <a href="" class="tab" id="link_extras">
                                Accents
                              </a>
                            </li>
                          </ul>
                          <div class="c-nav cf" id="configure-form1">
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
                    
                    
                    <!-- Style Tab Start-->
                      <div id="body" class="man_suit2_configure garment_container">
                        <div class="body_box" id="features">
                          <div class="body_product_box_3d">
                            
                            <div id="man_suit">
                              <form method="post" action="<?php echo $homeurl; ?>includes/action/action.php" id="configure_form" class="configure_form">
                                <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">
                                <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">
                                <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">
                                <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">
                                <input type="hidden" name="section" value="style">
                                <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">
                               
                                <input id="go_to" name="go_to" type="hidden" value="">
                                <input name="next" type="hidden" value="1">
                                <input type="hidden" name="action" value="<?php echo $_SESSION['p_dtl1']['action']; ?>">
                                <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['jacket']['fabric']['fabric_id'])) { echo $_SESSION['jacket']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">
                                <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['jacket']['style']['def_fab'])) { echo $_SESSION['jacket']['style']['def_fab']; } ?>">
                                <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['jacket']['style']['def_waistcoat'])) { echo $_SESSION['jacket']['style']['def_waistcoat']; } ?>">
                                <input type="hidden" name="fabric_name1" value="<?php echo $_SESSION['jacket']['fabric']['fabric_name']; ?>">  

                                <!-- MODEL 3D dels suits -->
                                <!-- BOX RIGHT: MODEL + CONTROLS -->
                                <div class="box_right_3d suit">
                                  <div style="margin:0 auto;font-weight:bold;text-align:center;width:200px;">
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
                                    <div class="controls col-md-1">
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
                                  <div class="content suit garment_block" id="max_height_move">
                                    <!-- JACKET CONFIG -->
                                    <!--<div class="box_title">
                                      <h1 class="title">
                                        Custom Blazers &nbsp;/
                                      </h1>
                                      <span class="subtitle">
                                        &nbsp;
                                        <span>
                                          Choose your style
                                        </span>
                                      </span>
                                    </div>-->
                                    <div class="box_title" style="margin-top: 20px;">
                                      <h1 class="title suit">
                                        Jacket
                                      </h1>
                                    </div>
                                    <!--<div class="separator">
                                    </div>-->
                                    
                                    <!-- JACKET CONFIG -->
                                    <div class="box_opts" product_type="jacket">
                                      <!-- Jacket: Style -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Style:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div id="options_jacket_style" class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="jacket_corpus" class="uniform radio_opt  jacket_style" id="jacket_style_simple" type="radio" name="jacket_style" value="simple" <?php if(!empty($_SESSION['jacket']['style']['jacket_style']) && $_SESSION['jacket']['style']['jacket_style']=='simple') { ?> checked <?php } else if($_SESSION['jacket']['style']['jacket_style']=='') { ?> checked <?php } ?> >
                                              Single breasted
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_corpus" class="uniform radio_opt  jacket_style" id="jacket_style_crossed" type="radio" name="jacket_style" value="crossed" <?php if(!empty($_SESSION['jacket']['style']['jacket_style']) && $_SESSION['jacket']['style']['jacket_style']=='crossed') { ?> checked <?php } ?>>
                                              Double breasted
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_corpus" class="uniform radio_opt  jacket_style" id="jacket_style_mao" type="radio" name="jacket_style" value="mao" <?php if(!empty($_SESSION['jacket']['style']['jacket_style']) && $_SESSION['jacket']['style']['jacket_style']=='mao') { ?> checked <?php } ?>>
                                              Asian
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: Entallado -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Fit:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="jacket_corpus" class="uniform radio_opt " type="radio" name="jacket_fit" value="0" <?php if($_SESSION['jacket']['style']['jacket_fit']=='0') { ?> checked <?php } ?> >
                                              Classic Fit
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_corpus" class="uniform radio_opt " type="radio" name="jacket_fit" value="1" <?php if(!empty($_SESSION['jacket']['style']['jacket_fit']) && $_SESSION['jacket']['style']['jacket_fit']=='1') { ?> checked <?php } else if($_SESSION['jacket']['style']['jacket_fit']=='') { ?> checked <?php } ?>>
                                              Slim Fit
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <div id="lapel_options">
                                        <!-- Jacket: Lapel Type -->
                                        <div class="conf_opt config_3d">
                                          <div class="box_title">
                                            <p>
                                              Jacket Lapels:
                                            </p>
                                          </div>
                                          <div class="box_opt">
                                            <div class="radio_opt">
                                              <label class="option">
                                                
                                                <input layer="jacket_lapels" class="uniform radio_opt " type="radio" name="jacket_lapel_type" value="standard" <?php if(!empty($_SESSION['jacket']['style']['jacket_lapel_type']) && $_SESSION['jacket']['style']['jacket_lapel_type']=='standard') { ?> checked <?php } else if($_SESSION['jacket']['style']['jacket_lapel_type']=='') { ?> checked <?php } ?>>
                                                Notch
                                              </label>
                                              <label class="option">
                                                
                                                <input layer="jacket_lapels" class="uniform radio_opt " type="radio" name="jacket_lapel_type" value="peak" <?php if(!empty($_SESSION['jacket']['style']['jacket_lapel_type']) && $_SESSION['jacket']['style']['jacket_lapel_type']=='peak') { ?> checked <?php } ?>>
                                                Peak
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: buttons -->
                                      <div id="global_jacket_buttons" class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Number of Buttons:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              
                                              <select layer="jacket_buttons" class="option uniform" name="jacket_buttons" id="jacket_buttons" rel="2">
                                                <option layer="jacket_buttons" value="1" <?php if(!empty($_SESSION['jacket']['style']['jacket_buttons']) && $_SESSION['jacket']['style']['jacket_buttons']=='1') { ?> selected <?php } ?>>
                                                  1
                                                </option>
                                                <option layer="jacket_buttons" value="2" <?php if(!empty($_SESSION['jacket']['style']['jacket_lapel_type']) && $_SESSION['jacket']['style']['jacket_buttons']=='2') { ?> selected <?php } else if($_SESSION['jacket']['style']['jacket_buttons']=='') { ?> selected <?php } ?>>
                                                  2
                                                </option>
                                                <option layer="jacket_buttons" value="3" <?php if(!empty($_SESSION['jacket']['style']['jacket_buttons']) && $_SESSION['jacket']['style']['jacket_buttons']=='3') { ?> selected <?php } ?>>
                                                  3
                                                </option>
                                                <option layer="jacket_buttons" value="4" <?php if(!empty($_SESSION['jacket']['style']['jacket_buttons']) && $_SESSION['jacket']['style']['jacket_buttons']=='4') { ?> selected <?php } ?>>
                                                  4
                                                </option>
                                              </select>
                                              
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: Chest Pocket -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Breast Pocket:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="jacket_chest_pocket" class="uniform radio_opt " type="radio" name="jacket_chest_pocket" value="1" <?php if(!empty($_SESSION['jacket']['style']['jacket_chest_pocket']) && $_SESSION['jacket']['style']['jacket_chest_pocket']=='1') { ?> checked <?php } else if($_SESSION['jacket']['style']['jacket_chest_pocket']=='') { ?> checked <?php } ?>>
                                              Yes
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_chest_pocket" class="uniform radio_opt " type="radio" name="jacket_chest_pocket" value="0" <?php if($_SESSION['jacket']['style']['jacket_chest_pocket']=='0') { ?> checked <?php } ?>>
                                              No
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: front "jacket_pockets" -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Hip Pockets:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt labels_jacket_pockets_num">
                                            <label class="option">
                                              
                                              <input layer="jacket_pockets" class="uniform num_b jacket radio_opt" type="radio" name="jacket_pockets" value="0" <?php if($_SESSION['jacket']['style']['jacket_pockets']=='0') { ?> checked <?php } ?>>
                                              No pockets
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_pockets" class="uniform num_b jacket radio_opt" type="radio" name="jacket_pockets" value="2" <?php if(!empty($_SESSION['jacket']['style']['jacket_pockets']) && $_SESSION['jacket']['style']['jacket_pockets']=='2') { ?> checked <?php } else if($_SESSION['jacket']['style']['jacket_pockets']=='') { ?> checked <?php } ?>>
                                              2 pockets
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_pockets" class="uniform num_b jacket radio_opt" type="radio" name="jacket_pockets" value="3" <?php if(!empty($_SESSION['jacket']['style']['jacket_pockets']) && $_SESSION['jacket']['style']['jacket_pockets']=='3') { ?> checked <?php } ?>>
                                              3 pockets
                                            </label>
                                          </div>
                                          <div class="list_common_th interactive_options all_jacket_pockets open" style="">
                                            <input id="hidden_jacket_pockets" class="option_input" type="hidden" name="jacket_pockets_type" value="<?php if(!empty($_SESSION['jacket']['style']['jacket_pockets_type'])) { echo $_SESSION['jacket']['style']['jacket_pockets_type']; } else { ?>2<?php } ?>">
                                            <!-- 2 Bolsillo -->
                                            <div class="1pocket">
                                              <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['jacket']['style']['jacket_pockets_type']) && $_SESSION['jacket']['style']['jacket_pockets_type']=='2') { ?> active <?php } else if($_SESSION['jacket']['style']['jacket_pockets_type']=='') { ?> active <?php } ?>" href="javascript:;" rel="2">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Hip Pockets: with flap" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_with_flap.JPG">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    with flap
                                                  </p>
                                                </div>
                                              </div>
                                              <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['jacket']['style']['jacket_pockets_type']) && $_SESSION['jacket']['style']['jacket_pockets_type']=='2a') { ?> active <?php } ?>" href="javascript:;" rel="2a">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Hip Pockets: double welt" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_double_welt.JPG">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    double welt
                                                  </p>
                                                </div>
                                              </div>
                                              <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['jacket']['style']['jacket_pockets_type']) && $_SESSION['jacket']['style']['jacket_pockets_type']=='2b') { ?> active <?php } ?>" href="javascript:;" rel="2b">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Hip Pockets: Patched" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_patched.JPG">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    Patched
                                                  </p>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- 3 Bolsillos -->
                                            <div class="2pocket" style="display: none;">
                                              <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['jacket']['style']['jacket_pockets_type']) && $_SESSION['jacket']['style']['jacket_pockets_type']=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Hip Pockets: with flap" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_with_flap.JPG">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    with flap
                                                  </p>
                                                </div>
                                              </div>
                                              <div layer="jacket_pockets" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['jacket']['style']['jacket_pockets_type']) && $_SESSION['jacket']['style']['jacket_pockets_type']=='3a') { ?> active <?php } ?>" href="javascript:;" rel="3a">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Hip Pockets: double welt" src="<?php echo $homeurl;?>assets/images/suit_img/hip_pockets/hip_pocket_double_welt.JPG">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    double welt
                                                  </p>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: Lapel Vent -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Back style:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              <input layer="jacket_vent" class="uniform radio_opt " type="radio" name="jacket_vent" value="0" <?php if($_SESSION['jacket']['style']['jacket_vent']=='0') { ?> checked <?php } ?>>
                                              Ventless
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_vent" class="uniform radio_opt " type="radio" name="jacket_vent" value="1" <?php if(!empty($_SESSION['jacket']['style']['jacket_vent']) && $_SESSION['jacket']['style']['jacket_vent']=='1') { ?> checked <?php } else if($_SESSION['jacket']['style']['jacket_vent']==''){ ?> checked <?php } ?>>
                                              Center vent
                                            </label>
                                            <label class="option">
                                              
                                              <input layer="jacket_vent" class="uniform radio_opt " type="radio" name="jacket_vent" value="2" <?php if(!empty($_SESSION['jacket']['style']['jacket_vent']) && $_SESSION['jacket']['style']['jacket_vent']=='2') { ?> checked <?php } ?>>
                                              Side vents
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Jacket: sleeve_buttons -->
                                      <div id="jacket_sleeve_buttons" class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Sleeve buttons:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <label class="option">
                                              
                                              
                                              <select layer="jacket_buttons" class="option uniform" name="jacket_sleeve_buttons" id="jacket_sleeve_buttons" rel="3">
                                                <option layer="jacket_sleeve_buttons" value="0" <?php if($_SESSION['jacket']['style']['jacket_sleeve_buttons']=='0') { ?> selected <?php } ?>>
                                                  No Buttons
                                                </option>
                                                <option layer="jacket_sleeve_buttons" value="2" <?php if(!empty($_SESSION['jacket']['style']['jacket_sleeve_buttons']) && $_SESSION['jacket']['style']['jacket_sleeve_buttons']=='2') { ?> selected <?php } ?>>
                                                  2
                                                </option>
                                                <option layer="jacket_sleeve_buttons" value="3" <?php if(!empty($_SESSION['jacket']['style']['jacket_sleeve_buttons']) && $_SESSION['jacket']['style']['jacket_sleeve_buttons']=='3') { ?> selected <?php } else if($_SESSION['jacket']['style']['jacket_sleeve_buttons']=='') { ?> selected <?php } ?>>
                                                  3
                                                </option>
                                                <option layer="jacket_sleeve_buttons" value="4" <?php if(!empty($_SESSION['jacket']['style']['jacket_sleeve_buttons']) && $_SESSION['jacket']['style']['jacket_sleeve_buttons']=='4') { ?> selected <?php } ?>>
                                                  4
                                                </option>
                                              </select>
                                              
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- Jacket: sleeve buttonholes -->
                                      <div id="sleeve_buttonholes" class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Buttonholes:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt">
                                            <!--<label class="option">
                                              
                                              <input layer="jacket_sleeve_buttonholes" class="uniform radio_opt " type="radio" name="jacket_sleeve_buttonholes" value="1" <?php if(!empty($_SESSION['jacket']['style']['jacket_sleeve_buttonholes']) && $_SESSION['jacket']['style']['jacket_sleeve_buttonholes']=='1') { ?> checked <?php } ?>>
                                              Real (Functional Buttons)
                                            </label>-->
                                            <label class="option">
                                              
                                              <input layer="jacket_sleeve_buttonholes" class="uniform radio_opt " type="radio" name="jacket_sleeve_buttonholes" value="0" <?php if($_SESSION['jacket']['style']['jacket_sleeve_buttonholes']=='0') { ?> checked <?php } else if($_SESSION['jacket']['style']['jacket_sleeve_buttonholes']=='') { ?> checked <?php } ?>>
                                              Real (Functional Buttons)
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <br>
                                  <br>
                                 </div>
                                </div>
                              </form>
                              
                              <script type="text/javascript">
                                price_fabric_extra = {
                                  "man_suit2": 0,
                                  "man_suit3": 0
                                }
                                  ;
                                var product_type = 'man_jacket';
                                var price_extra_waistcoat = '';
                                var config = {
                                  "jacket_style": $("input[name=jacket_style]:checked").val(),
                                  "jacket_lapel_type": $("input[name=jacket_lapel_type]:checked").val(),
                                  "jacket_buttons": $("input[name=jacket_buttons]:checked").val(),
                                  "jacket_chest_pocket": $("input[name=jacket_chest_pocket]:checked").val(),
                                  "jacket_pockets": $("input[name=jacket_pockets]:checked").val(),
                                  "jacket_pockets_type": $("input[name=jacket_pockets_type]:checked").val(),
                                  "jacket_vent": $("input[name=jacket_vent]:checked").val(),
                                  "jacket_sleeve_buttons": $("input[name=jacket_sleeve_buttons]:checked").val(),
                                  "jacket_sleeve_buttonholes": $("input[name=jacket_sleeve_buttonholes]:checked").val(),
                                  "jacket_fit": $("input[name=jacket_fit]:checked").val()
                                }
                                    ;
                                var extras = [];
                                var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";

                                ready_callbacks.push(function() {
                                  var cloth_type = 'suit';
                                  var id_tie = '3';
                                  var id_t4l_fabric = {
                                    "default_fabric": "<?php if(!empty($_SESSION['jacket']['fabric']['fabric_id'])) { echo $_SESSION['jacket']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>",
                                    "waistcoat": "<?php if(!empty($_SESSION['jacket']['fabric']['fabric_id'])) { echo $_SESSION['jacket']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>",
                                  }
                                      ;
                                  price_fabric_extra = {
                                    "man_suit2": 0,
                                    "man_suit3": 0
                                  }
                                    ;
                                  var button_code = '2';
                                  var shoe_color = '';
                                  var id_t4l_lining = {
                                    "default": "57",
                                    "waistcoat": "57"
                                  }
                                      ;
                                  var waistcoat_button_code = 2;
                                  Man_Suit.initCommon('#configure_form', '#model_3d_preview', id_t4l_fabric, button_code, shoe_color, id_t4l_lining, waistcoat_button_code, id_tie,default_fabric_id);
                                  Man_Suit.initConfigure(id_t4l_fabric);
                                });
                              </script>
                               
                            </div>
                          </div>
                          <script type="text/javascript">
                            var suit_price = {
                              "base": "<?php echo $_SESSION['p_dtl']['base_price']; ?>",
                              "fabric": <?php if($_SESSION['jacket']['fabric']['fabric_price']!='') { echo $_SESSION['jacket']['fabric']['fabric_price']; } else { echo $_SESSION['fab_dtl']['fab_price'];} ?>,
                              "waistcoat" : <?php if(!empty($_SESSION['jacket']['style']['suit_type']) && $_SESSION['jacket']['style']['suit_type']=="man_suit3") { echo $_SESSION['p_dtl']['waistcoat_price']; } else { echo 0;} ?>,
                              "extra_pant" : <?php if(!empty($_SESSION['jacket']['style']['extra_pants']) && $_SESSION['jacket']['style']['extra_pants']=='Yes') {  echo $_SESSION["p_dtl"]["extra_pant_price"]; } else { echo 0; } ?>,
                              "patches" : <?php if(!empty($_SESSION['jacket']['accents']['elbow_price'])) { echo $_SESSION['jacket']['accents']['elbow_price']; } else { echo 0; } ?>,
                              "button_holes_threads_jacket" : <?php if(!empty($_SESSION['jacket']['accents']['button_holes_price'])) { echo $_SESSION['jacket']['accents']['button_holes_price']; } else { echo 0; } ?>,
                              "metal_buttons" : <?php if(!empty($_SESSION['jacket']['accents']['metal_button_price'])) { echo $_SESSION['jacket']['accents']['metal_button_price']; } else { echo 0; } ?>,
                              "handkerchief" : <?php if(!empty($_SESSION['jacket']['accents']['handkerchief_price'])) { echo $_SESSION['jacket']['accents']['handkerchief_price']; } else { echo 0; } ?>
                            }
                                ;
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

<!-- Custom Trouser Section Ends -->

<?php } ?>


<!--Custom Shirt Section Starts -->

<?php if($id=="2") { 



unset($_SESSION['suit']['style']);
unset($_SESSION['suit']['fabric']);
unset($_SESSION['suit']['accents']);
unset($_SESSION['pant']['style']);
unset($_SESSION['pant']['fabric']);
unset($_SESSION['pant']['accents']);
unset($_SESSION['jacket']['style']);
unset($_SESSION['jacket']['fabric']);
unset($_SESSION['jacket']['accents']);
unset($_SESSION['coat']['style']);
unset($_SESSION['coat']['fabric']);
unset($_SESSION['coat']['accents']);

if(isset($_POST['orderid']))
{
    unset($_SESSION['fab_dtl']);
    
    $oid=mysqli_real_escape_string($con,$_POST['orderid']);

    $action="update";
    $_SESSION['p_dtl1'] = array('orderid' => $oid,'action'=>$action);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
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
    
    $_SESSION['shirt']['style'] = array('base_price' => isset($_POST['org_price']) ? $_POST['org_price']:'0',
            'shirt_sleeve'=>trim($shirt_sleeve[1]),
            'shirt_fit'=>trim($shirt_fit[1]),
            'shirt_neck'=>trim($shirt_neck[1]),
            'shirt_neck_no_interfacing'=>trim($shirt_neck_no_interfacing[1]),
            'shirt_neck_buttons'=>trim($shirt_neck_buttons[1]),
            'shirt_cuffs'=>trim($shirt_cuffs[1]),
            'shirt_chest_pocket'=>trim($shirt_chest_pocket[1]),
            'shirt_chest_pocket_type'=>trim($shirt_chest_pocket_type[1]),
            'shirt_button_close'=>trim($shirt_button_close[1]),
            'shirt_cut'=>trim($shirt_cut[1]),
            'shirt_pleats'=>trim($shirt_pleats[1])
          );

    $fabric=explode("{",$r['om_fab']);
    $fabric=explode(",",$fabric[1]);

    $fabric_price=explode(":",$fabric[0]);
    $fabric_id = explode(":",trim($fabric[1],"}"));
    $fabric_name = explode(":",trim($fabric[2],"}"));

    $_SESSION['shirt']['fabric'] = array('fabric_name'=>$fabric_name[1]);

    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master where fab_rand = '".trim($fabric_id[1])."'");

    if(mysqli_num_rows($fab_dtl_qry) > 0) {
        while($fr=mysqli_fetch_array($fab_dtl_qry)) {
          $_SESSION['fab_dtl'] = array('fab_id' =>$fr['fab_rand'],
               'fab_unique_id' => $r['fab_id'],
               'fab_name' => $fr['fab_name'],
               'fab_desc' => $fr['fab_desc'],
               'fab_img' => $fr['fab_img'],
               'fab_price' => $fr['fab_price'],
               'fab_default_img' => $fr['default_img']
          );
        }
    }

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

     $_SESSION['shirt']['accents'] = array('tot_price'=>trim($tot_price[1]),
              'font_price' => trim($font_price[1]),
              'font_family' => trim($font_family[1]),
              'initials_jacket' => trim($initials_jacket[1]),
              'monogram_color' => trim($monogram_color[1]),
              'neck_styling' => trim($neck_styling[1]),
              'neck_lining_price' => trim($neck_lining_price[1]),
              'collar_neck_color' => trim($collar_neck_color[1]),
              'cuff_styling' => trim($cuff_styling[1]),
              'cuff_lining_price' => trim($cuff_lining_price[1]),
              'cuff_color' => trim($cuff_color[1]),
              'type_of_elbow' => trim($type_of_elbow[1]),
              'elbow_price' => trim($elbow_price[1]),
              'elbow_type' => trim($elbow_type[1]),
              'type_of_colored_button_holes' => trim($type_of_colored_button_holes[1]),
              'button_holes_price' => trim($button_holes_price[1]),
              'colored_thread_type' => trim($colored_thread_type[1]),
              'colored_holes_type' => trim($colored_holes_type[1])
       );




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
                            <li class="active">
                              <a href="" id="link_configure" class="tab">
                                Style
                              </a>
                            </li>
                            <li>
                              <a href="" class="tab" id="link_fabric">
                                Fabric
                              </a>
                            </li>
                            <li>
                              <a href="" class="tab" id="link_extras">
                                Accents
                              </a>
                            </li>
                          </ul>
                          <div class="c-nav cf" id="configure-form1">
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
                    
                    
                    <!-- Style Tab Start-->
                      <div id="body" class="man_suit2_configure garment_container">
                        <div class="body_box" id="features">
                          <div class="body_product_box_3d">
                            
                            <div id="man_shirt">
                              <form method="post" action="<?php echo $homeurl; ?>includes/action/action.php" id="configure_form" class="configure_form">
                                <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">
                                <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">
                                <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">
                                <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">
                                <input type="hidden" name="section" value="style">
                                <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">
                                
                                <input id="go_to" name="go_to" type="hidden" value="">
                                <input name="next" type="hidden" value="1">
                                <input type="hidden" name="action" value="<?php echo $_SESSION['p_dtl1']['action']; ?>">
                                <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['shirt']['fabric']['fabric_id'])) { echo $_SESSION['shirt']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>">
                                <input type="hidden" name="fabric_name1" value="<?php echo $_SESSION['shirt']['fabric']['fabric_name']; ?>">  

                                <!-- MODEL 3D dels suits -->
                                <!-- BOX RIGHT: MODEL + CONTROLS -->
                                <div class="box_right_3d">
                                  <div style="margin:0 auto;font-weight:bold;text-align:center;width:320px;padding: 0px 110px 20px 0px;">
                                    For Visual Purposes Only (Not the actual product fabric being ordered).
                                  </div>
                            <div id="move">
                              <!-- MODEL 3D -->
                              <div id="loading">
                              </div>
                              <div class="col-md-12">
                              <div class="controls col-md-1">
                              <a data-icon="O" class="icon zoom in" href="javascript:;" style="display: block;"><span class="h">ZOOM</span></a><a data-icon="P" class="icon zoom out" href="javascript:;" style="display: none;"><span class="h">ZOOM</span></a> </div>

                              <div id="model_3d_preview" class="man_suit col-md-11" style="position: relative;">
                              </div>  
                              </div>
                              <div style="position: relative;" id="model_3d_preview1" class="man_suit">
                              </div>
                              <!-- CONTROLS -->
                            </div>
                          </div>
                          <div class="opt_box">
                            <div class="content garment_block" id="max_height_move">
                              <!--<div class="box_title">
                                <h1 class="title">
                                  Custom shirt &nbsp;/
                                </h1>
                                <span class="subtitle">
                                  <span>
                                    Choose your style
                                  </span>
                                </span>
                              </div>-->
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
                                        <label class="option">
                                          <input id="shirt_sleeve_long" <?php if(!empty($_SESSION['shirt']['style']['shirt_sleeve']) && $_SESSION['shirt']['style']['shirt_sleeve']=='long') { ?> checked <?php } ?> class="uniform option_input" name="shirt_sleeve" rev="sleeve" value="long" rel="long" type="radio">
                                          Long
                                        </label>
                                        <label class="option <?php if(!empty($_SESSION['shirt']['style']['shirt_sleeve']) && $_SESSION['shirt']['style']['shirt_sleeve']=='short') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_sleeve']=='') { ?> checked <?php } ?>">
                                          <input <?php if(!empty($_SESSION['shirt']['style']['shirt_sleeve']) && $_SESSION['shirt']['style']['shirt_sleeve']=='short') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_sleeve']=='') { ?> checked <?php } ?> id="shirt_sleeve_short" class="uniform option_input" name="shirt_sleeve" rev="sleeve" value="short" rel="short" type="radio">
                                          Short
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
                                        <label class="option">
                                          <input class="uniform option_input" <?php if(!empty($_SESSION['shirt']['style']['shirt_fit']) && $_SESSION['shirt']['style']['shirt_fit']=='fit') { ?> checked <?php } ?> name="shirt_fit" value="fit" rel="fit" type="radio">
                                          Slim
                                        </label>
                                        <label class="option">
                                          <input class="uniform option_input" <?php if(!empty($_SESSION['shirt']['style']['shirt_fit']) && $_SESSION['shirt']['style']['shirt_fit']=='normal') { ?> checked <?php } ?> name="shirt_fit" value="normal" rel="normal" type="radio">
                                          Normal
                                        </label>
                                        <label class="option <?php if(!empty($_SESSION['shirt']['style']['shirt_fit']) && $_SESSION['shirt']['style']['shirt_fit']=='loose') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_fit']=='') { ?> checked <?php } ?>">
                                          <input <?php if(!empty($_SESSION['shirt']['style']['shirt_fit']) && $_SESSION['shirt']['style']['shirt_fit']=='loose') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_fit']=='') { ?> checked <?php } ?> class="uniform option_input" name="shirt_fit" value="loose" rel="loose" type="radio">
                                          Loose
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
                                        <input class="option_input" name="shirt_neck" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_neck'])) { echo $_SESSION['shirt']['style']['shirt_neck']; } else { ?>1<?php } ?>" type="hidden">
                                        <div id="neck_default_interfacing" class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_neck']) && $_SESSION['shirt']['style']['shirt_neck']=='1') { ?> active <?php } else if($_SESSION['shirt']['style']['shirt_neck']=='') { ?> active <?php } ?>" href="javascript:;" rel="1">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Collar Style Kent collar" src="<?php echo $homeurl;?>assets/images/shirt_img/collar/kent_collar.JPG" pagespeed_url_hash="2076840578" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                            <br>
                                          </div>
                                          <div class="box_title_common">
                                            <p>
                                              Kent collar
                                            </p>
                                          </div>
                                        </div>
                                        <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_neck']) && $_SESSION['shirt']['style']['shirt_neck']=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Collar Style Cutaway collar" src="<?php echo $homeurl;?>assets/images/shirt_img/collar/cutway_collar.JPG" pagespeed_url_hash="3066610436" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                            <br>
                                          </div>
                                          <div class="box_title_common">
                                            <p>
                                              Cutaway collar
                                            </p>
                                          </div>
                                        </div>
                                        <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_neck']) && $_SESSION['shirt']['style']['shirt_neck']=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Collar Style Long collar" src="<?php echo $homeurl;?>assets/images/shirt_img/collar/long_collar.JPG" pagespeed_url_hash="975050701" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                            <br>
                                          </div>
                                          <div class="box_title_common">
                                            <p>
                                              Long collar
                                            </p>
                                          </div>
                                        </div>
                                        <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_neck']) && $_SESSION['shirt']['style']['shirt_neck']=='4') { ?> active <?php } ?>" href="javascript:;" rel="4">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Collar Style Button-down" src="<?php echo $homeurl;?>assets/images/shirt_img/collar/button_down_collar.JPG" pagespeed_url_hash="1407649584" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                            <br>
                                          </div>
                                          <div class="box_title_common">
                                            <p>
                                              Button-down
                                            </p>
                                          </div>
                                        </div>
                                        <div  class="always_hard option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_neck']) && $_SESSION['shirt']['style']['shirt_neck']=='5') { ?> active <?php } ?>" href="javascript:;" rel="5">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Collar Style Stand-up collar" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/mao.jpg" pagespeed_url_hash="1416530143" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                            <br>
                                          </div>
                                          <div class="box_title_common">
                                            <p>
                                              Stand-up collar
                                            </p>
                                          </div>
                                        </div>
                                        <div  id="opt_smoking" class="always_hard option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_neck']) && $_SESSION['shirt']['style']['shirt_neck']=='6') { ?> active <?php } ?>" href="javascript:;" rel="6">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Collar Style Wing collar" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/esmoquin.jpg" pagespeed_url_hash="3583524059" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                            <br>
                                          </div>
                                          <div class="box_title_common">
                                            <p>
                                              Wing collar
                                            </p>
                                          </div>
                                        </div>
                                        <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_neck']) && $_SESSION['shirt']['style']['shirt_neck']=='7') { ?> active <?php } ?>" href="javascript:;" rel="7">
                                          <div class="box_model">
                                            <div class="active">
                                            </div>
                                            <img alt="Collar Style Rounded collar" src="<?php echo $homeurl;?>assets/images/shirt_img/collar/rounded_collar.JPG" pagespeed_url_hash="1862282001" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
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
        
                                  <div id="box_shirt_neck_type" class="conf_opt config_3d" style="<?php if($_SESSION['shirt']['style']['shirt_cuffs']=='5' || $_SESSION['shirt']['style']['shirt_cuffs']=='6' || $_SESSION['shirt']['style']['shirt_cuffs']=='9' || $_SESSION['shirt']['style']['shirt_cuffs']=='10') { ?> display:none; <?php } else { ?> display:block; <?php } ?>
">
                                    <div class="box_title">
                                      <p>
                                        Collar Lining:
                                      </p>
                                    </div>
                                      <div class="box_opt"> 
                                        <div class="radio_opt hard_soft_neck">
                                          <label class="option <?php if(!empty($_SESSION['shirt']['style']['shirt_neck_no_interfacing']) && $_SESSION['shirt']['style']['shirt_neck_no_interfacing']=='1') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_neck_no_interfacing']=='') { ?> checked <?php } ?>">
                                            <input <?php if(!empty($_SESSION['shirt']['style']['shirt_neck_no_interfacing']) && $_SESSION['shirt']['style']['shirt_neck_no_interfacing']=='1') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_neck_no_interfacing']=='') { ?> checked <?php } ?> id="shirt_neck_no_interfacing" class="uniform option_input" name="shirt_neck_no_interfacing" value="1" type="checkbox">Soft 
                                            <a title="" class="ico tooltip tooltip_option" href="javascript:;"></a>
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div id="global_neck_buttons" class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>
                                            Collar buttons:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="radio_opt labels_shirt_fit">
                                            <label class="option">
                                              <select class="option uniform" name="shirt_neck_buttons" rel="1" id="neck_buttons">
                                                <option id="opt_1_btn" value="1" <?php if(!empty($_SESSION['shirt']['style']['shirt_neck_buttons']) && $_SESSION['shirt']['style']['shirt_neck_buttons']=='1') { ?> selected <?php } ?>>
                                                  1
                                                </option>
                                                <option <?php if(!empty($_SESSION['shirt']['style']['shirt_neck_buttons']) && $_SESSION['shirt']['style']['shirt_neck_buttons']=='2') { ?> selected <?php } else if($_SESSION['shirt']['style']['shirt_neck_buttons']=='') { ?> selected <?php } ?> id="opt_2_btn" value="2">
                                                  2
                                                </option>
                                              </select>
                                            </label>
                                            <!--<label class="option">
                                              <span id="collar_height_info">
                                                
                                              </span>
                                            </label>-->
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="p-s-2">
                                      <div id="box_shirt_cuffs" class="conf_opt config_3d" style="<?php if(!empty($_SESSION['shirt']['style']['shirt_sleeve']) && $_SESSION['shirt']['style']['shirt_sleeve']=='long') { ?> display: block <?php } else { ?> display: none <?php } ?>;">
                                        <div class="box_title">
                                          <p>
                                            Cuffs Style:
                                          </p>
                                        </div>
                                        <div class="box_opt">
                                          <div class="list_common_th interactive_options all_cuffs open" style="height: 230px;">
                                            <input class="option_input" name="shirt_cuffs" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs'])) { echo $_SESSION['shirt']['style']['shirt_cuffs']; } else { ?>1<?php } ?>" type="hidden">
                                            
                                            <div id="cuff_default_interfacing" class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs']) && $_SESSION['shirt']['style']['shirt_cuffs']=='1') { ?> active <?php } else if($_SESSION['shirt']['style']['shirt_cuffs']=='') { ?> active <?php } ?>" href="javascript:;" rel="1">
                                              <div class="box_model">
                                                <div class="active">
                                                </div>
                                                <img alt="Cuffs Style Single cuff 1 button" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/clasico1bot.jpg" pagespeed_url_hash="4248971419" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Single cuff 1 button
                                                </p>
                                              </div>
                                            </div>
                                            <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs']) && $_SESSION['shirt']['style']['shirt_cuffs']=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                                              <div class="box_model">
                                                <div class="active">
                                                </div>
                                                <img alt="Cuffs Style Single cuff 2 buttons" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/clasico2bot.jpg" pagespeed_url_hash="1957161126" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Single cuff 2 buttons
                                                </p>
                                              </div>
                                            </div>
                                            <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs']) && $_SESSION['shirt']['style']['shirt_cuffs']=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                                              <div class="box_model">
                                                <div class="active">
                                                </div>
                                                <img alt="Cuffs Style One-button-cut" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/cortado1bot.jpg" pagespeed_url_hash="3232654891" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  One-button-cut
                                                </p>
                                              </div>
                                            </div>
                                            <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs']) && $_SESSION['shirt']['style']['shirt_cuffs']=='4') { ?> active <?php } ?>" href="javascript:;" rel="4">
                                              <div class="box_model">
                                                <div class="active">
                                                </div>
                                                <img alt="Cuffs Style Two-button-cut" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/cortado2bot.jpg" pagespeed_url_hash="940844598" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Two-button-cut
                                                </p>
                                              </div>
                                            </div>
                                            <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs']) && $_SESSION['shirt']['style']['shirt_cuffs']=='7') { ?> active <?php } ?>" href="javascript:;" rel="7">
                                              <div class="box_model">
                                                <div class="active">
                                                </div>
                                                <img alt="Cuffs Style Rounded 1 button" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/redondeado1bot.jpg" pagespeed_url_hash="3893065912" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Rounded 1 button
                                                </p>
                                              </div>
                                            </div>
                                            <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs']) && $_SESSION['shirt']['style']['shirt_cuffs']=='8') { ?> active <?php } ?>" href="javascript:;" rel="8">
                                              <div class="box_model">
                                                <div class="active">
                                                </div>
                                                <img alt="Cuffs Style Rounded 2 buttons" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/redondeado2bot.jpg" pagespeed_url_hash="1601255619" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Rounded 2 buttons
                                                </p>
                                              </div>
                                            </div>
                                            <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs']) && $_SESSION['shirt']['style']['shirt_cuffs']=='5') { ?> active <?php } ?>" href="javascript:;" rel="5">
                                              <div class="box_model">
                                                <div class="active">
                                                </div>
                                                <img alt="Cuffs Style Single french cuff" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/gemelossencillo.jpg" pagespeed_url_hash="3464173438" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Single french cuff
                                                </p>
                                              </div>
                                            </div>
                                            <div class=" option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs']) && $_SESSION['shirt']['style']['shirt_cuffs']=='6') { ?> active <?php } ?>" href="javascript:;" rel="6">
                                              <div class="box_model">
                                                <div class="active">
                                                </div>
                                                <img alt="Cuffs Style Double french cuff" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/gemelosdoble.jpg" pagespeed_url_hash="3710109233" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Double french cuff
                                                </p>
                                              </div>
                                            </div>
                                            <div class=" option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs']) && $_SESSION['shirt']['style']['shirt_cuffs']=='9') { ?> active <?php } ?>" href="javascript:;" rel="9">
                                              <div class="box_model">
                                                <div class="active">
                                                </div>
                                                <img alt="Cuffs Style Rounded french cuff" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/gemelosredsencillos.jpg" pagespeed_url_hash="2317294570" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Rounded french cuff
                                                </p>
                                              </div>
                                            </div>
                                            <div class=" option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_cuffs']) && $_SESSION['shirt']['style']['shirt_cuffs']=='10') { ?> active <?php } ?>" href="javascript:;" rel="10">
                                              <div class="box_model">
                                                <div class="active">
                                                </div>
                                                <img alt="Cuffs Style Double rounded french cuff" src="<?php echo $homeurl;?>assets/images/shirt_img/accents/gemelosreddobles.jpg" pagespeed_url_hash="72017273" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Double rounded french cuff
                                                </p>
                                              </div>
                                            </div>
                                          </div>
                                          <a href="javascript:;" class="view_all" rel="all_cuffs">
                                            <span>
                                              View all
                                            </span>
                                          </a>
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
                                            <label class="option">
                                              <input id="shirt_chest_pocket_0" <?php if($_SESSION['shirt']['style']['shirt_chest_pocket']=='0') { ?> checked <?php } ?> class="uniform num_b" name="shirt_chest_pocket" value="0" type="radio">
                                              No pocket
                                            </label>
                                            <label class="option <?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket']) && $_SESSION['shirt']['style']['shirt_chest_pocket']=='1') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_chest_pocket']=='') { ?> checked <?php } ?>">
                                              <input <?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket']) && $_SESSION['shirt']['style']['shirt_chest_pocket']=='1') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_chest_pocket']=='') { ?> checked <?php } ?> class="uniform num_b" name="shirt_chest_pocket" value="1" id="shirt_chest_pocket1" type="radio">
                                              1 Breast pocket
                                            </label>
                                            <label class="option ">
                                              <input  class="uniform num_b" <?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket']) && $_SESSION['shirt']['style']['shirt_chest_pocket']=='2') { ?> checked <?php } ?> name="shirt_chest_pocket" value="2" id="shirt_chest_pocket2" type="radio">
                                              2 Breast pockets
                                            </label>
                                          </div>
                                          <div id="box_chest_pocket_imgs" class="list_common_th interactive_options all_cuffs open">
                                            <input id="hidden_chest_pocket" class="option_input" name="shirt_chest_pocket_type" value="<?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket_type'])) { echo $_SESSION['shirt']['style']['shirt_chest_pocket_type']; } else { ?>1<?php } ?>" type="hidden">
                                            <!-- 1 Bolsillo -->
                                            <div style="display: none;" class="1pocket">
                                              <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket_type']) && $_SESSION['shirt']['style']['shirt_chest_pocket_type']=='1') { ?> active <?php } else if($_SESSION['shirt']['style']['shirt_chest_pocket_type']=='') { ?> active <?php } ?>" href="javascript:;" rel="1">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Chestpocket Flap Pockets" src="<?php echo $homeurl; ?>assets/images/shirt_img/chest_pocket/flap_pockets.JPG" pagespeed_url_hash="908090266" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    Flap Pockets
                                                  </p>
                                                </div>
                                              </div>
                                              <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket_type']) && $_SESSION['shirt']['style']['shirt_chest_pocket_type']=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Chestpocket No Flap Pockets" src="<?php echo $homeurl; ?>assets/images/shirt_img/chest_pocket/no_flap_pockets.JPG" pagespeed_url_hash="2276768200" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
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
                                            <div class="2pocket" style="display: block;">
                                              <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket_type']) && $_SESSION['shirt']['style']['shirt_chest_pocket_type']=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Chestpocket Flap Pockets" src="<?php echo $homeurl; ?>assets/images/shirt_img/chest_pocket/flap_pockets.JPG" pagespeed_url_hash="4201810651" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                  <br>
                                                </div>
                                                <div class="box_title_common">
                                                  <p>
                                                    Flap Pockets
                                                  </p>
                                                </div>
                                              </div>
                                              <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_chest_pocket_type']) && $_SESSION['shirt']['style']['shirt_chest_pocket_type']=='4') { ?> active <?php } ?>" href="javascript:;" rel="4">
                                                <div class="box_model">
                                                  <div class="active">
                                                  </div>
                                                  <img alt="Chestpocket No Flap Pockets" src="<?php echo $homeurl; ?>assets/images/shirt_img/chest_pocket/no_flap_pockets.JPG" pagespeed_url_hash="1275521289" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
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
                                            <label class="option">
                                              <input id="shirt_button_close_french" rel="1" <?php if(!empty($_SESSION['shirt']['style']['shirt_button_close']) && $_SESSION['shirt']['style']['shirt_button_close']=='1') { ?> checked <?php } ?> class="uniform option_input" name="shirt_button_close" value="1" type="radio">
                                              French
                                            </label>
                                            <label class="option">
                                              <input id="shirt_button_close_hidden" rel="2" <?php if(!empty($_SESSION['shirt']['style']['shirt_button_close']) && $_SESSION['shirt']['style']['shirt_button_close']=='2') { ?> checked <?php }  ?>class="uniform option_input" name="shirt_button_close" value="2" type="radio">
                                              Hidden Buttons
                                            </label>
                                            <label class="option <?php if(!empty($_SESSION['shirt']['style']['shirt_button_close']) && $_SESSION['shirt']['style']['shirt_button_close']=='3') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_button_close']=='') { ?> checked <?php } ?>">
                                              <input id="shirt_button_close_standard" rel="3" class="uniform option_input" name="shirt_button_close" value="3" <?php if(!empty($_SESSION['shirt']['style']['shirt_button_close']) && $_SESSION['shirt']['style']['shirt_button_close']=='3') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_button_close']=='') { ?> checked <?php } ?> type="radio">
                                              Standard
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
                                            <label class="option <?php if(!empty($_SESSION['shirt']['style']['shirt_cut']) && $_SESSION['shirt']['style']['shirt_cut']=='classic') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_cut']=='') { ?> checked <?php } ?>">
                                              <input rel="classic" class="uniform option_input" name="shirt_cut" value="classic" <?php if(!empty($_SESSION['shirt']['style']['shirt_cut']) && $_SESSION['shirt']['style']['shirt_cut']=='classic') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_cut']=='') { ?> checked <?php } ?> type="radio">
                                              Tail
                                            </label>
                                            <label class="option">
                                              <input rel="straight" <?php if(!empty($_SESSION['shirt']['style']['shirt_cut']) && $_SESSION['shirt']['style']['shirt_cut']=='straight') { ?> checked <?php } ?> class="uniform option_input" name="shirt_cut" value="straight" type="radio">
                                              Square
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
                                            <input class="option_input" name="shirt_pleats" value="<?php if($_SESSION['shirt']['style']['shirt_pleats']!='') { echo $_SESSION['shirt']['style']['shirt_pleats']; } else { ?>0<?php } ?>" type="hidden">
                                            <!-- No pleats -->
                                            <div class="option_trigger common_th <?php if($_SESSION['shirt']['style']['shirt_pleats']=='0') { ?> active <?php } else if($_SESSION['shirt']['style']['shirt_pleats']=='') { ?> active <?php } ?>" href="javascript:;" rel="0">
                                              <div class="box_model big">
                                                <div class="active">
                                                </div>
                                                <img alt="Pleats No Pleats" src="<?php echo $homeurl; ?>assets/images/shirt_img/shirt_pleats/no_pleats.JPG" pagespeed_url_hash="3140433409" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  No Pleats
                                                </p>
                                              </div>
                                            </div>
                                            <!-- 1 pleats -->
                                            <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_pleats']) && $_SESSION['shirt']['style']['shirt_pleats']=='1') { ?> active <?php } ?>" href="javascript:;" rel="1">
                                              <div class="box_model big">
                                                <div class="active">
                                                </div>
                                                <img alt="Pleats Box pleat" src="<?php echo $homeurl; ?>assets/images/shirt_img/shirt_pleats/box_pleats.JPG" pagespeed_url_hash="1701346719" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                <br>
                                              </div>
                                              <div class="box_title_common">
                                                <p>
                                                  Box pleat
                                                </p>
                                              </div>
                                            </div>
                                            <!-- 2 pleats -->
                                            <div class="option_trigger common_th <?php if(!empty($_SESSION['shirt']['style']['shirt_pleats']) && $_SESSION['shirt']['style']['shirt_pleats']=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                                              <div class="box_model big">
                                                <div class="active">
                                                </div>
                                                <img alt="Pleats Side folds" src="<?php echo $homeurl; ?>assets/images/shirt_img/shirt_pleats/side_folds.JPG" pagespeed_url_hash="2073540699" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
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
                                            <label class="option">
                                              <input id="inp_shirt_tuxedo_0" rel="0" class="uniform option_input" name="shirt_tuxedo" value="0" <?php if($_SESSION['shirt']['style']['shirt_tuxedo']=='0') { ?> checked <?php } else if($_SESSION['shirt']['style']['shirt_tuxedo']=='') { ?> checked <?php } ?> type="radio">
                                              No
                                            </label>
                                            <label class="option">
                                              <input id="inp_shirt_tuxedo_1" rel="1" class="uniform option_input" name="shirt_tuxedo" value="1" <?php if(!empty($_SESSION['shirt']['style']['shirt_tuxedo']) && $_SESSION['shirt']['style']['shirt_tuxedo']=='1') { ?> checked <?php } ?> type="radio">
                                              Yes
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              
                              <script type="text/javascript">
                                    var length_units = 'in';
                                                                        
                                    var id_t4l_fabric = '<?php if(!empty($_SESSION["shirt"]["fabric"]["fabric_id"])) { echo $_SESSION["shirt"]["fabric"]["fabric_id"]; } else { echo $_SESSION["fab_dtl"]["fab_id"]; } ?>';
                                    
                                    var config = {
                                        "shirt_sleeve": $("input[name=shirt_sleeve]:checked").val(),
                                        "shirt_fit": $("input[name=shirt_fit]:checked").val(),
                                        "shirt_neck": $("input[name=shirt_neck]:checked").val(),
                                        "shirt_neck_no_interfacing": $("input[name=shirt_neck_no_interfacing]:checked").val(),
                                        "shirt_neck_buttons": $("input[name=shirt_neck_buttons]:checked").val(),
                                        "shirt_cuffs": $("input[name=shirt_cuffs]:checked").val(),
                                        "shirt_chest_pocket": $("input[name=shirt_chest_pocket]:checked").val(),
                                        "shirt_chest_pocket_type": $("input[name=shirt_chest_pocket_type]:checked").val(),
                                        "shirt_button_close": $("input[name=shirt_button_close]:checked").val(),
                                        "shirt_cut": $("input[name=shirt_cut]:checked").val(),
                                        "shirt_pleats": $("input[name=shirt_pleats]:checked").val()
                                    };
                                    var extras = [];
                                    var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";

                                    var button_color = 'white';
                                    var container = '#configure_form';
                                    ready_callbacks.push(function() {
                                        Man_Shirt.initConfigure(id_t4l_fabric);
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

<!-- Custom Shirt Section Ends -->

<?php } if($id=='5') 
  {
  unset($_SESSION['pant']['style']);
  unset($_SESSION['pant']['fabric']);
  unset($_SESSION['pant']['accents']);
  unset($_SESSION['jacket']['style']);
  unset($_SESSION['jacket']['fabric']);
  unset($_SESSION['jacket']['accents']);
  unset($_SESSION['shirt']['style']);
  unset($_SESSION['shirt']['fabric']);
  unset($_SESSION['shirt']['accents']);
  unset($_SESSION['suit']['style']);
  unset($_SESSION['suit']['fabric']);
  unset($_SESSION['suit']['accents']);


  if(isset($_POST['orderid']))
  {
    unset($_SESSION['fab_dtl']);

    
    $oid=mysqli_real_escape_string($con,$_POST['orderid']);
    $action="update";
    $_SESSION['p_dtl1'] = array('orderid' => $oid,'action'=>$action);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);

    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);



    $coat_style = explode(":",$style[0]);
    $coat_neck = explode(":",$style[1]);
    $coat_neck_flap = explode(":",$style[2]);
    $coat_length = explode(":",$style[3]);
    $coat_fit = explode(":",$style[4]);
    $coat_closure = explode(":",$style[5]);
    $coat_closure_type_zipper = explode(":",$style[6]);
    $coat_closure_type_boton = explode(":",$style[7]);
    $coat_pockets = explode(":",$style[8]);
    $coat_pockets_type = explode(":",$style[9]);
    $coat_chest_pocket = explode(":",$style[10]);
    $coat_belt = explode(":",$style[11]);
    $coat_backcut = explode(":",$style[12]);
    $coat_sleeve = explode(":",$style[13]);
    $coat_shoulder = explode(":",trim($style[14],"}"));
    


    $_SESSION['coat']['style'] = array('base_price' => isset($_POST['org_price']) ? $_POST['org_price']:'0',
          'coat_style'=>trim($coat_style[1]),
          'coat_neck'=>trim($coat_neck[1]),
          'coat_neck_flap'=>trim($coat_neck_flap[1]),
          'coat_length'=>trim($coat_length[1]),
          'coat_fit'=>trim($coat_fit[1]),
          'coat_closure'=>trim($coat_closure[1]),
          'coat_closure_type_zipper'=>trim($coat_closure_type_zipper[1]),
          'coat_closure_type_boton'=>trim($coat_closure_type_boton[1]),
          'coat_pockets'=>trim($coat_pockets[1]),
          'coat_pockets_type'=>trim($coat_pockets_type[1]),
          'coat_chest_pocket'=>trim($coat_chest_pocket[1]),
          'coat_belt'=>trim($coat_belt[1]),
          'coat_backcut'=>trim($coat_backcut[1]),
          'coat_sleeve'=>trim($coat_sleeve[1]),
          'coat_shoulder'=>trim($coat_shoulder[1])
  );

    $fabric=explode("{",$r['om_fab']);
    $fabric=explode(",",$fabric[1]);

    $fabric_price=explode(":",$fabric[0]);
    $fabric_id = explode(":",trim($fabric[1],"}"));
    $fabric_name = explode(":",trim($fabric[2],"}"));


    //$_SESSION['coat']['fabric'] = array('fabric_name'=>$fabric_name[1],"fabric_id"=>$fabric_id[1],"fabric_price"=>$fabric_price[1]);
    
    $_SESSION['coat']['fabric'] = array('fabric_name'=>$fabric_name[1]);
    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master where fab_rand = '".trim($fabric_id[1])."'");

    if(mysqli_num_rows($fab_dtl_qry) > 0) {
        while($fr=mysqli_fetch_array($fab_dtl_qry)) {
          $_SESSION['fab_dtl'] = array('fab_id' =>$fr['fab_rand'],
               'fab_unique_id' => $r['fab_id'],
               'fab_name' => $fr['fab_name'],
               'fab_desc' => $fr['fab_desc'],
               'fab_img' => $fr['fab_img'],
               'fab_price' => $fr['fab_price'],
               'fab_default_img' => $fr['default_img']
          );
        }
    }

    $accents=explode("{",$r['om_accents']);

    $accents=explode(",",$accents[1]);

     $jacket_lining_type = explode(":",$accents[0]);
     $lining_price = explode(":",$accents[1]);
     $lining_id = explode(":",$accents[2]);
     $font_price = explode(":",$accents[3]);
     $font_family = explode(":",$accents[4]);
     $initials_jacket = explode(":",$accents[5]);
     $monogram_color = explode(":",$accents[6]);
     $type_of_neck = explode(":",$accents[7]);
     $neck_lining_price = explode(":",$accents[8]);
     $neck_lining_type = explode(":",$accents[9]);
     $type_of_elbow = explode(":",$accents[10]);
     $elbow_price = explode(":",$accents[11]);
     $elbow_type = explode(":",$accents[12]);
     $type_of_colored_button_holes = explode(":",$accents[13]);
     $lapel_color = explode(":",$accents[14]);
     $button_holes_price = explode(":",$accents[15]);
     $colored_thread_type = explode(":",$accents[16]);
     $colored_holes_type = explode(":",trim($accents[17],"}"));

     $_SESSION['coat']['accents'] = array('jacket_lining_type' => trim($jacket_lining_type[1]),
              'lining_price' => trim($lining_price[1]),
              'tot_price'=>trim($tot_price[1]),
              'jacket_lining_id' => trim($lining_id[1]),
              'font_price' => trim($font_price[1]),
              'font_family' => trim($font_family[1]),
              'initials_jacket' => trim($initials_jacket[1]),
              'monogram_color' => trim($monogram_color[1]),
              'type_of_neck' => trim($type_of_neck[1]),
              'neck_lining_price' => trim($neck_lining_price[1]),
              'neck_lining_type' => trim($neck_lining_type[1]),
              'type_of_elbow' => trim($type_of_elbow[1]),
              'elbow_price' => trim($elbow_price[1]),
              'elbow_type' => trim($elbow_type[1]),
              'type_of_colored_button_holes' => trim($type_of_colored_button_holes[1]),
              'lapel_color' => trim($lapel_color[1]),
              'button_holes_price' => trim($button_holes_price[1]),
              'colored_thread_type' => trim($colored_thread_type[1]),
              'colored_holes_type' => trim($colored_holes_type[1])
       );



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
                            <li class="active">
                              <a href="" id="link_configure" class="tab">
                                Style
                              </a>
                            </li>
                            <li>
                              <a href="" class="tab" id="link_fabric">
                                Fabric
                              </a>
                            </li>
                            <li>
                              <a href="" class="tab" id="link_extras">
                                Accents
                              </a>
                            </li>
                          </ul>

                           <div class="c-nav cf" id="configure-form1">
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
                    
                    
                    <!-- Style Tab Start-->
                      <div id="body" class="man_suit2_configure garment_container">
                        <div class="body_box" id="features">
                          <div class="body_product_box_3d">
                            
                            <div id="man_suit">
                              <form method="post" action="<?php echo $homeurl; ?>includes/action/action.php" id="configure_form" class="configure_form" >
                                <input type="hidden" name="def_fab_id" value="<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>">
                                <input type="hidden" name="p_img_dtl" value="<?php echo $homeurl.$_SESSION['fab_dtl']['fab_default_img']; ?>">
                                <input type="hidden" name="type" value="<?php echo $_SESSION['p_dtl']['sub_cat_id']; ?>">
                                <input type="hidden" name="type1" value="<?php echo $_SESSION['p_dtl']['sub_category']; ?>">
                                <input type="hidden" name="section" value="style">
                                <input type="hidden" name="p_id" value="<?php echo $_SESSION['p_dtl']['p_id']; ?>">
                                <input type="hidden" name="action" value="<?php echo $_SESSION['p_dtl1']['action']; ?>">  
                                <input id="go_to" name="go_to" type="hidden">
                                <input name="next" type="hidden" value="1">
                                <input type="hidden" name="fabric_id" value="<?php if(!empty($_SESSION['coat']['fabric']['fabric_id'])) { echo $_SESSION['coat']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_price']; } ?>">
                                <input id="id_t4l_fabric_default" type="hidden" name="id_t4l_fabric_default" value="<?php if(!empty($_SESSION['coat']['style']['def_fab'])) { echo $_SESSION['coat']['style']['def_fab']; } ?>">
                                <input id="id_t4l_fabric_waistcoat" type="hidden" name="id_t4l_fabric_waistcoat" value="<?php if(!empty($_SESSION['coat']['style']['def_waistcoat'])) { echo $_SESSION['coat']['style']['def_waistcoat']; } ?>">
                                <input type="hidden" name="fabric_name1" value="<?php echo $_SESSION['coat']['fabric']['fabric_name']; ?>">  


                                <!-- MODEL 3D dels suits -->
                                <!-- BOX RIGHT: MODEL + CONTROLS -->
                                <div class="box_right_3d suit">
                                  <div style="margin:0 auto;font-weight:bold;text-align:center;width:200px;">
                                    For Visual Purposes Only (Not the actual product fabric being ordered).
                                  </div>
                                  <div id="box_mini_next_3d">
                                    
                                  </div>
                                  <div id="move">
                                    <div id="control_suit" style="left:124px;">
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
                                    <div class="controls col-md-1">
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
                                  <div class="content suit garment_block" id="max_height_move"> 
                                    <!-- COAT CONFIGURE --> 
                                          <div class="box_title" style="margin-top:20px;">
                                        <h1 class="title">Coat</h1>
                                    </div>
                                    <div class="box_opts" product_type="coat">
                                      
                                      <!-- 1. Estilo -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title"><p>Style:</p></div>
                                        <div class="box_opt">
                                          <div id="options_coat_style" class="radio_opt">
                                            <label class="option checked">
                                              <div class="radio" id="uniform-coat_style_simple">
                                                <span class="checked">
                                                  <input layer="coat_style" class="uniform radio_opt coat_style" id="coat_style_simple" type="radio" name="coat_style" value="simple" <?php if(!empty($_SESSION['coat']['style']['coat_style']) && $_SESSION['coat']['style']['coat_style']=='simple') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_style']=='') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Single-breasted
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_style_crossed">
                                                <span>
                                                  <input layer="coat_style" class="uniform radio_opt coat_style" id="coat_style_crossed" type="radio" name="coat_style" value="crossed" <?php if(!empty($_SESSION['coat']['style']['coat_style']) && $_SESSION['coat']['style']['coat_style']=='crossed') { ?> checked <?php }  ?>>
                                                </span>
                                              </div>
                                              Double-breasted
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- 2. Cuello -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title"><p>Collar:</p></div>
                                        <div class="box_opt">
                                          <div id="options_coat_neck" class="list_common_th interactive_options all_neck open" style="display:block;">
                                            <input layer="coat_neck" id="hidden_coat_neck" class="option_input" type="hidden" name="coat_neck" value="classic"> 
                                            <div id="coat_neck_standup" layer="coat_neck" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['coat']['style']['coat_neck']) && $_SESSION['coat']['style']['coat_neck']=='standup') { ?> active <?php }  ?>" href="javascript:;" rel="standup">
                                              <div class="box_model">
                                                <div class="active"></div>
                                                <img alt="Collar: Standup" src="<?php echo $homeurl;?>assets/images/coat_img/coat_neck_standup.png">
                                              </div>
                                              <div class="box_title_common"><p>Standup</p></div>
                                            </div>
                                            <div id="coat_neck_classic" layer="coat_neck" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['coat']['style']['coat_neck']) && $_SESSION['coat']['style']['coat_neck']=='classic') { ?> active <?php } else if($_SESSION['coat']['style']['coat_neck']=='') { ?> active <?php } ?>" href="javascript:;" rel="classic">
                                              <div class="box_model">
                                                <div class="active"></div>
                                                <img alt="Collar: Classic" src="<?php echo $homeurl;?>assets/images/coat_img/coat_neck_classic.png">
                                              </div>
                                              <div class="box_title_common"><p>Classic</p></div>
                                            </div>
                                            <div id="coat_neck_flap" layer="coat_neck" class="option_trigger common_th mini_pocket <?php if(!empty($_SESSION['coat']['style']['coat_neck']) && $_SESSION['coat']['style']['coat_neck']=='flap') { ?> active <?php }  ?>" href="javascript:;" rel="flap">
                                              <div class="box_model">
                                                <div class="active"></div>
                                                <img alt="Collar: Lapels" src="<?php echo $homeurl;?>assets/images/coat_img/coat_neck_flap.png">
                                              </div>
                                              <div class="box_title_common"><p>Lapels</p></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- 3 Anchura solapa -->
                                      <div id="options_coat_neck_flap" class="conf_opt config_3d" style="display: none;">
                                        <div class="box_title"><p>Lapel's width:</p></div>
                                        <div class="box_opt">
                                          <div id="options_coat_neck_flap_type" class="radio_opt">
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_neck_flap_wide">
                                                <span>
                                                  <input layer="coat_neck_flap" class="uniform radio_opt coat_neck_flap" id="coat_neck_flap_wide" type="radio" name="coat_neck_flap" value="wide" <?php if(!empty($_SESSION['coat']['style']['coat_neck_flap']) && $_SESSION['coat']['style']['coat_neck_flap']=='wide') { ?> checked <?php }  ?>>
                                                </span>
                                              </div>
                                              Wide
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_neck_flap_close">
                                                <span class="checked">
                                                  <input layer="coat_neck_flap" class="uniform radio_opt coat_neck_flap" id="coat_neck_flap_close" type="radio" name="coat_neck_flap" value="close" <?php if(!empty($_SESSION['coat']['style']['coat_neck_flap']) && $_SESSION['coat']['style']['coat_neck_flap']=='close') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_neck_flap']=='') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Narrow                                                
                                            </label>
                                          </div>
                                        </div>
                                      </div>        

                                      <!-- 4. Longitud -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title"><p>Length:</p></div>
                                        <div class="box_opt">
                                          <div id="options_coat_length" class="radio_opt">
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_length_long">
                                                <span class="checked">
                                                  <input layer="coat_length" class="uniform radio_opt coat_length" id="coat_length_long" type="radio" name="coat_length" value="long" <?php if(!empty($_SESSION['coat']['style']['coat_length']) && $_SESSION['coat']['style']['coat_length']=='long') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_length']=='') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Long
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_length_short"><span><input layer="coat_length" class="uniform radio_opt coat_length" id="coat_length_short" type="radio" name="coat_length" value="short" <?php if(!empty($_SESSION['coat']['style']['coat_length']) && $_SESSION['coat']['style']['coat_length']=='short') { ?> checked <?php } ?>>
                                            </span>
                                           </div>
                                            Short
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- 1. Entallado -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title"><p>Fit:</p></div>
                                        <div class="box_opt">
                                          <div id="options_coat_fit" class="radio_opt">
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_fit_1">
                                                <span class="checked">
                                                  <input layer="coat_fit" class="uniform radio_opt coat_fit" id="coat_fit_1" type="radio" name="coat_fit" value="1" <?php if($_SESSION['coat']['style']['coat_fit']!='' && $_SESSION['coat']['style']['coat_fit']=='1') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_fit']=='') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Slim Fit
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_fit_0">
                                                <span>
                                                  <input layer="coat_fit" class="uniform radio_opt coat_fit" id="coat_fit_0" type="radio" name="coat_fit" value="0" <?php if($_SESSION['coat']['style']['coat_fit']!='' && $_SESSION['coat']['style']['coat_fit']=='0') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Straight
                                            </label>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- 5. Cierre Frontal -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title"><p>Fastening:</p></div>
                                        <div class="box_opt">
                                          <div id="options_coat_closure" class="radio_opt">
                                            <table width="330">
                                              <tbody><tr>
                                                <td width="128">
                                                  <label class="option">
                                                    <div class="radio" id="uniform-coat_closure_zipper">
                                                      <span>
                                                        <input layer="coat_closure" class="uniform radio_opt coat_closure" id="coat_closure_zipper" type="radio" name="coat_closure" value="zipper" <?php if($_SESSION['coat']['style']['coat_closure']!='' && $_SESSION['coat']['style']['coat_closure']=='zipper') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    Zipper
                                                  </label>
                                                </td>
                                                <td width="115">
                                                  <label class="option">
                                                    <div class="radio" id="uniform-coat_closure_boton">
                                                      <span class="checked">
                                                        <input layer="coat_closure" class="uniform radio_opt coat_closure" id="coat_closure_boton" type="radio" name="coat_closure" value="boton" <?php if($_SESSION['coat']['style']['coat_closure']!='' && $_SESSION['coat']['style']['coat_closure']=='boton') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_closure']=='') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    Buttons *
                                                  </label>
                                                </td>
                                                <td width="110">
                                                  <label id="label_trench" class="option">
                                                    <div class="radio" id="uniform-coat_closure_trench">
                                                      <span>
                                                        <input layer="coat_closure" class="uniform radio_opt coat_closure" id="coat_closure_trench" type="radio" name="coat_closure" value="trench" <?php if($_SESSION['coat']['style']['coat_closure']!='' && $_SESSION['coat']['style']['coat_closure']=='trench') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    Horn toggle
                                                  </label>
                                                </td>
                                              </tr>
                                            </tbody></table>
                                          </div>
                                          <!-- ONLY IF: coat_closure = zipper/boton -->
                                          <div id="opt_closure_type_zipper" class="radio_opt" style="display: none;">
                                            <table>
                                              <tbody><tr>
                                                <td width="118">
                                                  <label id="zipper_hide" class="option">
                                                    <div class="radio" id="uniform-closure_type_hide_zipper">
                                                      <span>
                                                        <input layer="coat_closure_type" class="uniform radio_opt coat_closure_type" id="closure_type_hide_zipper" type="radio" name="coat_closure_type_zipper" value="hide" <?php if($_SESSION['coat']['style']['coat_closure_type_zipper']!='' && $_SESSION['coat']['style']['coat_closure_type_zipper']=='hide') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    Hidden
                                                  </label>
                                                </td>
                                                <td width="135">
                                                  <label id="lbl_coat_closure_type_standard" class="option">
                                                    <div class="radio" id="uniform-closure_type_standard_zipper">
                                                      <span class="checked">
                                                        <input layer="coat_closure_type" class="uniform radio_opt coat_closure_type" id="closure_type_standard_zipper" type="radio" name="coat_closure_type_zipper" value="standard" <?php if($_SESSION['coat']['style']['coat_closure_type_zipper']!='' && $_SESSION['coat']['style']['coat_closure_type_zipper']=='standard') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_closure_type_zipper']=='') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    Standard
                                                  </label>
                                                </td>
                                              </tr>
                                            </tbody></table>
                                          </div>
                                          <div id="opt_closure_type_boton" class="radio_opt" style="">
                                            <table>
                                              <tbody><tr>
                                                <td width="109">
                                                  <label id="boton_hide" class="option">
                                                    <div class="radio" id="uniform-closure_type_hide_boton">
                                                      <span>
                                                        <input layer="coat_closure_type" class="uniform radio_opt coat_closure_type" id="closure_type_hide_boton" type="radio" name="coat_closure_type_boton" value="hide" <?php if($_SESSION['coat']['style']['coat_closure_type_boton']!='' && $_SESSION['coat']['style']['coat_closure_type_boton']=='hide') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    Hidden
                                                  </label>
                                                </td>
                                                <td width="130">
                                                  <label id="boton_standard" class="option">
                                                    <div class="radio" id="uniform-closure_type_standard_boton"><span class="checked"><input layer="coat_closure_type" class="uniform radio_opt coat_closure_type" id="closure_type_standard_boton" type="radio" name="coat_closure_type_boton" value="standard" <?php if($_SESSION['coat']['style']['coat_closure_type_boton']!='' && $_SESSION['coat']['style']['coat_closure_type_boton']=='standard') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_closure_type_boton']=='') { ?> checked <?php } ?>>
                                                  </span>
                                                </div>
                                                  Standard
                                                  </label>
                                                </td>
                                              </tr>
                                            </tbody></table>
                                            
                                            
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- 6. Bolsillos frontales -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title">
                                          <p>Pockets</p>
                                        </div>
                                        <div class="box_opt">
                                          <div id="div_coat_pockets_num" class="radio_opt labels_coat_pockets_num">
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_pockets_0">
                                                <span>
                                                  <input id="coat_pockets_0" layer="coat_pockets" class="uniform num_b coat_pockets_num radio_opt" type="radio" name="coat_pockets" value="0" <?php if($_SESSION['coat']['style']['coat_pockets']!='' && $_SESSION['coat']['style']['coat_pockets']=='0') { ?> checked <?php } ?>>
                                                </span>
                                              </div> 
                                              No pockets
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_pockets_2">
                                                <span class="checked">
                                                  <input id="coat_pockets_2" layer="coat_pockets" class="uniform num_b coat_pockets_num radio_opt" type="radio" name="coat_pockets" value="2" <?php if($_SESSION['coat']['style']['coat_pockets']!='' && $_SESSION['coat']['style']['coat_pockets']=='2') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_pockets']=='') { ?> checked <?php } ?>>
                                                </span>
                                              </div> 
                                             2 pockets
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_pockets_3">
                                                <span>
                                                  <input id="coat_pockets_3" layer="coat_pockets" class="uniform num_b coat_pockets_num radio_opt" type="radio" name="coat_pockets" value="3" <?php if($_SESSION['coat']['style']['coat_pockets']!='' && $_SESSION['coat']['style']['coat_pockets']=='3') { ?> checked <?php } ?>>
                                                </span>
                                              </div> 
                                              3 pockets
                                            </label>
                                          </div>            
                                          <div class="list_common_th interactive_options all_coat_pockets open" style="display:block;">
                                            <input layer="coat_pockets_type" id="hidden_coat_pockets" class="option_input" type="hidden" name="coat_pockets_type" value="1"> 
                                            <!-- 2 Bolsillo -->
                                            <div id="pocket2" style="display: block;">
                                              <div id="pocket2_op1" layer="coat_pockets_type" class="option_trigger common_th mini_pocket <?php if($_SESSION['coat']['style']['coat_pockets_type']!='' && $_SESSION['coat']['style']['coat_pockets_type']=='1') { ?> active <?php } else if($_SESSION['coat']['style']['coat_pockets_type']=='') { ?> active <?php } ?>" href="javascript:;" rel="1">
                                                <div class="box_model">
                                                  <div class="active"></div>
                                                  <img alt="Pockets: Flap Pocket" src="<?php echo $homeurl;?>assets/images/coat_img/coat_pockets_1.png">
                                                </div>
                                                <div class="box_title_common"><p>Flap Pocket</p></div>
                                              </div>
                                              <div layer="coat_pockets_type" class="option_trigger common_th mini_pocket <?php if($_SESSION['coat']['style']['coat_pockets_type']!='' && $_SESSION['coat']['style']['coat_pockets_type']=='2') { ?> active <?php } ?>" href="javascript:;" rel="2">
                                                <div class="box_model">
                                                  <div class="active"></div>
                                                  <img alt="Pockets: Double-welted" src="<?php echo $homeurl;?>assets/images/coat_img/coat_pockets_2.png">
                                                </div>
                                                <div class="box_title_common"><p>Double-welted</p></div>
                                              </div>
                                              <div layer="coat_pockets_type" class="option_trigger common_th mini_pocket <?php if($_SESSION['coat']['style']['coat_pockets_type']!='' && $_SESSION['coat']['style']['coat_pockets_type']=='3') { ?> active <?php } ?>" href="javascript:;" rel="3">
                                                <div class="box_model">
                                                  <div class="active"></div>
                                                  <img alt="Pockets: Patched" src="<?php echo $homeurl;?>assets/images/coat_img/coat_pockets_3.png">
                                                </div>
                                                <div class="box_title_common"><p>Patched</p></div>
                                              </div>
                                              <div layer="coat_pockets_type" class="option_trigger common_th mini_pocket <?php if($_SESSION['coat']['style']['coat_pockets_type']!='' && $_SESSION['coat']['style']['coat_pockets_type']=='4') { ?> active <?php } ?>" href="javascript:;" rel="4">
                                                <div class="box_model">
                                                  <div class="active"></div>
                                                  <img alt="Pockets: Diagonal" src="<?php echo $homeurl;?>assets/images/coat_img/coat_pockets_4.png">
                                                </div>
                                                <div class="box_title_common"><p>Diagonal</p></div>
                                              </div>
                                              <div layer="coat_pockets_type" class="option_trigger common_th mini_pocket <?php if($_SESSION['coat']['style']['coat_pockets_type']!='' && $_SESSION['coat']['style']['coat_pockets_type']=='5') { ?> active <?php } ?>" href="javascript:;" rel="5">
                                                <div class="box_model">
                                                  <div class="active"></div>
                                                  <img alt="Pockets: Diag. zipper" src="<?php echo $homeurl;?>assets/images/coat_img/coat_pockets_5.png">
                                                </div>
                                                <div class="box_title_common"><p>Diag. zipper</p></div>
                                              </div>
                                                        
                                            </div>
                                            <!-- 3 Bolsillos -->
                                            <div id="pocket3" style="display: none;">
                                              <div id="pocket3_op1" layer="coat_pockets_type" class="option_trigger common_th mini_pocket <?php if($_SESSION['coat']['style']['coat_pockets_type']!='' && $_SESSION['coat']['style']['coat_pockets_type']=='6') { ?> active <?php } ?>" href="javascript:;" rel="6">
                                                <div class="box_model">
                                                  <div class="active"></div>
                                                  <img alt="Pockets: Flap Pocket" src="<?php echo $homeurl;?>assets/images/coat_img/coat_pockets_6.png">
                                                </div>
                                                <div class="box_title_common"><p>Flap Pocket</p></div>
                                              </div>
                                              <div layer="coat_pockets_type" class="option_trigger common_th mini_pocket <?php if($_SESSION['coat']['style']['coat_pockets_type']!='' && $_SESSION['coat']['style']['coat_pockets_type']=='7') { ?> active <?php } ?>" href="javascript:;" rel="7">
                                                <div class="box_model">
                                                  <div class="active"></div>
                                                  <img alt="Pockets: Double-welted" src="<?php echo $homeurl;?>assets/images/coat_img/coat_pockets_7.png">
                                                </div>
                                                <div class="box_title_common"><p>Double-welted</p></div>
                                              </div>          
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- 7. Bolsillo en el pecho -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title"><p>Chest pocket:</p></div>
                                        <div class="box_opt">
                                          <div id="options_chest_pocket" class="radio_opt">
                                            <table>
                                              <tbody><tr>
                                                <td>
                                                  <label class="option">
                                                    <div class="radio" id="uniform-coat_chest_pocket_0">
                                                      <span class="checked">
                                                        <input layer="coat_chest_pocket" class="uniform radio_opt coat_chest_pocket" id="coat_chest_pocket_0" type="radio" name="coat_chest_pocket" value="0" <?php if($_SESSION['coat']['style']['coat_chest_pocket']!='' && $_SESSION['coat']['style']['coat_chest_pocket']=='0') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_chest_pocket']=='') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    No
                                                  </label>
                                                </td>
                                                <td>
                                                  <label class="option">
                                                    <div class="radio" id="uniform-coat_chest_pocket_life">
                                                      <span>
                                                        <input layer="coat_chest_pocket" class="uniform radio_opt coat_chest_pocket" id="coat_chest_pocket_life" type="radio" name="coat_chest_pocket" value="life" <?php if($_SESSION['coat']['style']['coat_chest_pocket']!='' && $_SESSION['coat']['style']['coat_chest_pocket']=='life') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    Simple welt
                                                  </label>
                                                </td>
                                                <td>
                                                  <label class="option">
                                                    <div class="radio" id="uniform-coat_chest_pocket_vertical">
                                                      <span>
                                                        <input layer="coat_chest_pocket" class="uniform radio_opt coat_chest_pocket" id="coat_chest_pocket_vertical" type="radio" name="coat_chest_pocket" value="vertical" <?php if($_SESSION['coat']['style']['coat_chest_pocket']!='' && $_SESSION['coat']['style']['coat_chest_pocket']=='vertical') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    Vertical
                                                  </label>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  <label class="option">
                                                    <div class="radio" id="uniform-coat_chest_pocket_zipper">
                                                      <span>
                                                        <input layer="coat_chest_pocket" class="uniform radio_opt coat_chest_pocket" id="coat_chest_pocket_zipper" type="radio" name="coat_chest_pocket" value="zipper" <?php if($_SESSION['coat']['style']['coat_chest_pocket']!='' && $_SESSION['coat']['style']['coat_chest_pocket']=='zipper') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    Zipper
                                                  </label>
                                                </td>
                                                <td>
                                                  <label class="option">
                                                    <div class="radio" id="uniform-coat_chest_pocket_patched">
                                                      <span>
                                                        <input layer="coat_chest_pocket" class="uniform radio_opt coat_chest_pocket" id="coat_chest_pocket_patched" type="radio" name="coat_chest_pocket" value="patched" <?php if($_SESSION['coat']['style']['coat_chest_pocket']!='' && $_SESSION['coat']['style']['coat_chest_pocket']=='patched') { ?> checked <?php } ?>>
                                                      </span>
                                                    </div>
                                                    Patched
                                                  </label>
                                                </td>
                                                <td>&nbsp;</td>
                                              </tr>
                                            </tbody></table>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- 8. Cinturón -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title"><p>Belt:</p></div>
                                        <div class="box_opt">
                                          <div id="options_belt" class="radio_opt">
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_belt_0">
                                                <span>
                                                  <input layer="coat_belt" class="uniform radio_opt coat_belt" id="coat_belt_0" type="radio" name="coat_belt" value="0" <?php if($_SESSION['coat']['style']['coat_belt']!='' && $_SESSION['coat']['style']['coat_belt']=='0') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_belt']=='') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              No
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_belt_sewing">
                                                <span>
                                                  <input layer="coat_belt" class="uniform radio_opt coat_belt" id="coat_belt_sewing" type="radio" name="coat_belt" value="sewing" <?php if($_SESSION['coat']['style']['coat_belt']!='' && $_SESSION['coat']['style']['coat_belt']=='sewing') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Sewed 
                                            </label>
                                            <label id="lbl_coat_belt_loose" class="option">
                                              <div class="radio" id="uniform-coat_belt_loose">
                                                <span>
                                                  <input layer="coat_belt" class="uniform radio_opt coat_belt" id="coat_belt_loose" type="radio" name="coat_belt" value="loose" <?php if($_SESSION['coat']['style']['coat_belt']!='' && $_SESSION['coat']['style']['coat_belt']=='loose') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Loose 
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- 9. Corte trasero -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title"><p>Back side:</p></div>
                                        <div class="box_opt">
                                          <div id="options_backcut" class="radio_opt">
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_backcut_0">
                                                <span class="checked">
                                                  <input layer="coat_backcut" class="uniform radio_opt coat_backcut" id="coat_backcut_0" type="radio" name="coat_backcut" value="0" <?php if($_SESSION['coat']['style']['coat_backcut']!='' && $_SESSION['coat']['style']['coat_backcut']=='0') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_backcut']=='') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              No
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_backcut_1">
                                                <span>
                                                  <input layer="coat_backcut" class="uniform radio_opt coat_backcut" id="coat_backcut_1" type="radio" name="coat_backcut" value="1" <?php if($_SESSION['coat']['style']['coat_backcut']!='' && $_SESSION['coat']['style']['coat_backcut']=='1') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Center vent 
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_backcut_2">
                                                <span>
                                                  <input layer="coat_backcut" class="uniform radio_opt coat_backcut" id="coat_backcut_2" type="radio" name="coat_backcut" value="2" <?php if($_SESSION['coat']['style']['coat_backcut']!='' && $_SESSION['coat']['style']['coat_backcut']=='2') { ?> checked <?php } ?>>
                                                </span>
                                              </div>

                                              Side vents
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                        
                                      
                                      <!-- 10. Cierre mangas -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title"><p>Sleeves:</p></div>
                                        <div class="box_opt">
                                          <div id="options_sleeve" class="radio_opt">
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_sleeve_0">
                                                <span class="checked">
                                                  <input layer="coat_sleeve" class="uniform radio_opt coat_sleeve" id="coat_sleeve_0" type="radio" name="coat_sleeve" value="0" <?php if($_SESSION['coat']['style']['coat_sleeve']!='' && $_SESSION['coat']['style']['coat_sleeve']=='0') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_sleeve']=='') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              No
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_sleeve_tape">
                                                <span>
                                                  <input layer="coat_sleeve" class="uniform radio_opt coat_sleeve" id="coat_sleeve_tape" type="radio" name="coat_sleeve" value="tape" <?php if($_SESSION['coat']['style']['coat_sleeve']!='' && $_SESSION['coat']['style']['coat_sleeve']=='tape') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Tape
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_sleeve_button">
                                                <span>
                                                  <input layer="coat_sleeve" class="uniform radio_opt coat_sleeve" id="coat_sleeve_button" type="radio" name="coat_sleeve" value="button" <?php if($_SESSION['coat']['style']['coat_sleeve']!='' && $_SESSION['coat']['style']['coat_sleeve']=='button') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Buttons
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- 11. Hombros -->
                                      <div class="conf_opt config_3d">
                                        <div class="box_title"><p>Epaulettes:</p></div>
                                        <div class="box_opt">
                                          <div id="options_shoulder" class="radio_opt">
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_shoulder_0">
                                                <span class="checked">
                                                  <input layer="coat_shoulder" class="uniform radio_opt coat_shoulder" id="coat_shoulder_0" type="radio" name="coat_shoulder" value="0" <?php if($_SESSION['coat']['style']['coat_shoulder']!='' && $_SESSION['coat']['style']['coat_shoulder']=='0') { ?> checked <?php } else if($_SESSION['coat']['style']['coat_shoulder']=='') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              No
                                            </label>
                                            <label class="option">
                                              <div class="radio" id="uniform-coat_shoulder_1">
                                                <span>
                                                  <input layer="coat_shoulder" class="uniform radio_opt coat_shoulder" id="coat_shoulder_1" type="radio" name="coat_shoulder" value="1" <?php if($_SESSION['coat']['style']['coat_shoulder']!='' && $_SESSION['coat']['style']['coat_shoulder']=='1') { ?> checked <?php } ?>>
                                                </span>
                                              </div>
                                              Yes
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- Aviso sobre el numero variable de botones -->
                                      <div class="coat_button_advertise">
                                        * The number of buttons on the coat can vary according to the length of the garment and the customer measurements. 
                                         <br>The picture above is an example of configuration.
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              </form>
                              
                              <script type="text/javascript">
                                var product_type='man_coat';
                                var id_t4l_fabric=<?php if(!empty($_SESSION['coat']['fabric']['fabric_id'])) { echo $_SESSION['coat']['fabric']['fabric_id']; } else { echo $_SESSION['fab_dtl']['fab_id']; } ?>;
                                var button_code='2';
                                var id_t4l_lining='57';
                                var zipper_color='hei';
                                var ribbon_color='hei';
                                var default_fabric_id = "<?php echo $_SESSION['fab_dtl3']['fab_default_id']; ?>";
                                ready_callbacks.push(function()
                                  {
                                    Man_Coat.initCommon(default_fabric_id,'#configure_form','#model_3d_preview',button_code,zipper_color,ribbon_color);
                                    Man_Coat.initConfigure();
                                  });
                              </script>
                               
                            </div>
                          </div>

                          <script type="text/javascript">
                            var coat_price = {
                              "base": "<?php echo $_SESSION['p_dtl']['base_price']; ?>",
                              "fabric": <?php if($_SESSION['coat']['fabric']['fabric_price']!='') { echo $_SESSION['coat']['fabric']['fabric_price']; } else { echo $_SESSION['fab_dtl']['fab_price'];} ?>,
                              "patches" : <?php if(!empty($_SESSION['coat']['accents']['elbow_price'])) { echo $_SESSION['coat']['accents']['elbow_price']; } else { echo 0; } ?>,
                              "button_holes_threads_jacket" : <?php if(!empty($_SESSION['coat']['accents']['button_holes_price'])) { echo $_SESSION['coat']['accents']['button_holes_price']; } else { echo 0; } ?>
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
      

 
 <?php }


   } else if (strpos($url, "tab2_fabric")!==false) {

   include_once('tab2_fabric.php');
 
 } else if (strpos($url, "tab3_accents")!==false) {
   
   include_once('tab3_accents.php');
} 

?>


