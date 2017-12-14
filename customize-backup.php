<body>
    <script type="text/javascript">
        var region_url = '/en/';
        var currency = {
            "iso": "EUR",
            "symbol": "\u20ac"
        };
        var cdn_host = '<?php echo $homeurl; ?>assets/';
        //var cdn_host = 'https://162.144.41.156/~izaapinn/customizer/woman/';
        var ready_callbacks = [];
        var ga_callbacks = [];
        var mobile_enabled = false;
        var dataLayer = [{
            "region": "en",
            "lang": "en",
            "currency": {
                "iso": "EUR",
                "symbol": "\u20ac"
            },
            "length_units": "cm",
            "weigth_units": "kg",
            "gender": "woman",
            "menu_item": "personalize",
            "cart_n_products": 1,
            "cart_price": 159,
            "isAdmin": false,
            "mobile_device": false,
            "mobile_ready": true,
            "mobile_enabled": false,
            "customer_logged": 0,
            "device_type": "desktop"
        }];
    </script>
<?php 
/*$id=$_GET['id'];
if($id==3)
{
    header("Location:{$homeurl}coat-customize/$id/");
}*/
?>
<?php

$f_id1=$f_title1=$f_desc1=$f_img1=array();
$f_id=$f_title=$f_desc=$f_img=array();

  if(isset($_POST['p_id'])) {

    $pid=$_POST['p_id'];
    $pid=isset($con,$pid) ? $pid : "0";
    $sql=mysqli_query($con,"select * from product_master where p_id=$pid");
    $r=mysqli_fetch_array($sql);
    $id = $r['subcatid']; $fabric_list= $r['fabid'];
    $price = $r['p_price'];
    $p_id = $r['p_id'];
        

    $f_rand=mysqli_query($con,"select * from fabric_master where fab_id IN($fabric_list)");

    if(mysqli_num_rows($f_rand) > 0) {
        while($fr=mysqli_fetch_array($f_rand)) {
            $f_id1[]=$fr['fab_rand'];
            $f_title1[]=$fr['fab_name'];
            $f_desc1[]=$fr['fab_desc'];
            $f_img1[]=$fr['fab_img'];
    }
  }
   $fabid=$f_id1[0];
   $fabid1=$f_id1[1];
   $fabid2=$f_id1[0];

   $fab_title=$f_title1[0];
   $fab_title1=$f_title1[1];
   $fab_desc=$f_desc1[0];
   $fab_desc1=$f_desc1[1];
   $fab_img = $f_img1[0];
   $fab_img1 = $f_img1[1];
   $get_sub_cat = $site->get_all_sub_category($id);

}
?>
<!--Start Coat Customizer-->
<?php
  if($id==14)
  {
if(isset($_POST['orderid']))
{
    $oid=mysqli_real_escape_string($con,$_POST['orderid']);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);
    //$style=explode(":",$r['om_style']);
    $coatfit=explode(":",$style[0]);$coatstyle=explode(":",$style[1]);$coatcollar=explode(":",$style[2]);
    $coatlapel=explode(":",$style[3]);$coatbuttons=explode(":",$style[4]);$coatlength=explode(":",$style[5]);
    $pockettype=explode(":",$style[7]);$coatsleeves=explode(":",$style[8]);$coatbelt=explode(":",$style[9]);
    $backcut=explode(":",trim($style[10],"}"));$coatfastening=explode(":",$style[6]);
    $fabid=$r['fabid'];$o_id=$r['om_id'];$order_id=$r['order_id'];$price=$r['om_price'];
    $accents=explode("{",$r['om_accents']);
    $accents=explode(",",$accents[1]);$coatlining=explode(":",$accents[0]);$coattext=explode(":",$accents[1]);
    $coatfont=explode(":",$accents[2]);$coatcolor=explode(":",trim($accents[3],"}"));
    $action="update";

    $f_rand=mysqli_query($con,"select * from fabric_master where fab_rand IN($fabid)");

    if(mysqli_num_rows($f_rand) > 0) {
        while($fr=mysqli_fetch_array($f_rand)) {
            $f_id[]=$fr['fab_rand'];
            $f_title[]=$fr['fab_name'];
            $f_desc[]=$fr['fab_desc'];
            $f_img[]=$fr['fab_img'];
    }
  }

  $fab_title=$f_title[0];
   $fab_title1=$f_title[1];
   $fab_desc=$f_desc[0];
   $fab_desc1=$f_desc[1];
   $fab_img = $f_img[0];
   $fab_img1 = $f_img[1];

}
else
{
    $coatfit[1]="";$coatlapel[1]="";$coatstyle[1]="";$coatcollar[1]="";$coatbuttons[1]="";$coatlength[1]="";$pockettype[1]="";
    $coatsleeves[1]="";$coatbelt[1]="";$backcut[1]="";$fabid=$f_id1[0];$coatlining[1]="";$coattext[1]="";$coatfont[1]="";$coatcolor[1]="";
    $action="save";$o_id="";$coatfastening[1]="";$order_id="";$price=$price;
}
  $_SESSION[ 'fabID']=$fabid; 

?>


<!DOCTYPE html>



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
                            <?php echo $get_sub_cat[0]['subcat_name']; ?>
                        </h1>
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumbs list-inline pull-right">
                                <li><a href="<?php echo $homeurl;?>">Home</a>
                                </li>
                                <li><a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['category_name'])); ?>/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/"><?php echo $get_sub_cat[0]['subcat_name']; ?></a></li>
                                <!--
                            -->
                                <li>Customize
                                </li>
                                <!--
                            -->
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
                                <form action="<?php echo $homeurl;?>includes/action/action.php" method="post" class="garment_form" id="garment_form_5427">
                                <input type="hidden" name="action" value="<?php echo $action;?>">
                                <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                                <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
                                <input type="hidden" name="type" value="coat">
                                <input type="hidden" name="lining_id" value="<?php echo $coatlining[1];?>">
                                <input type="hidden" name="fab_id" value="<?php echo $fabid;?>">
                                <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
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
                                                    <input type="hidden" name="price" value="<?php echo $price;?>">
                                                    <a href="javascript:;" class="step_next btn btn-default pull-right">NEXT STEP</a>
                                                    <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
                                                    <span  class="garment_price btn btn-default pull-right">$<?php echo $price;?></span>
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
                                                        <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img src="<?php echo $homeurl.$fab_img;?>" class="fabric_main_image" style="width:80%;"></a>
                                                    </div>
                                                    <input type="hidden" value="<?php echo $_SESSION['fabID']; ?>" data-block-name="woman_coat" name="woman_coat" class="fabric_input required">
                                                    <div class="fabric_filters ">
                                                        <input type="hidden" value="woman_coat" name="fabric_block">
                                                        <div class="fabric_filter fabric_filter_nav"></div>
                                                        <div id="current_filters" style="display: none;"></div>
                                                    </div>


                                                    <div class="fabric_list loaded">
                                                    <?php $fab=$site->get_fabrics('',$fabric_list);
                                                    //print_r($fab);
                                                    foreach ($fab as $key => $value) {
                                                    ?>
                                                        <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?>  <?php if($fabid==$fab[$key]['f_rand']){?> current <?php }?> ">
                                                            <a rel="<?php echo $fab[$key]['f_rand'];?>" class="select" href="#"> 
                                                                <img alt="<?php echo $fab[$key]['fab_name'];?>" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" class="b-lazy b-loaded"> </a>
                                                                  <div class="price price_part">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                                            <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                                            <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
                                                        </div>
                                                        <?php }?>

                                                        <!--<div class="fabric_thumb fabric_964  <?php if($fabid=="964"){?> current <?php }?> ">
                                                            <a rel="964" class="select " href="#"> <img alt="Newark" src="<?php echo $homeurl;?>assets/dimg/fabric/coat/964_normal.jpg" class="b-lazy b-loaded"> </a>
                                                            <div class="price price_part">+12$</div>
                                                            <div class="title fabric_title">Newark</div>
                                                            <div class="composition"></div>
                                                        </div>-->


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="garment_block garment_block_extra" style="display:none;">
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
                                                    <div class="extra_container coat_neck extra_container_colors" style="visibility:hidden;" data-extra-name="coat_neck" data-extra-type="colors" info-icon="T"><a href="javascript:void(0);" class="discard">Delete</a>
                                                        <div class="extra_title">Neck lining</div>
                                                        <div class="extra_content">
                                                            <div class="extra_field required extra_field_image contrast" data-field-name="contrast">
                                                                <div class="box_opt box_opt_no_title">
                                                                    <div class="box_opt_fix">
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABBAEEDASIAAhEBAxEB/8QAGwABAAMBAQEBAAAAAAAAAAAAAAQFBgMCBwj/xAA4EAACAQQBAgQCBwUJAAAAAAABAgMABAURBhIhBxMxURVBFBYiMmFxgRdCQ5GhI0RygpKVorHT/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AP2XSlKBSlKBSlQM7lbXDY/6delhF50MH2db6pZVjX1IH3nFBPpSlApSlBBz+PTLYLIYuRyiXltJbswOiA6ld/1qm8KMxJn/AA045mJzue5x0LTHWtyBAGI/DqBrT18i49yTIeHnA8bxnIcYyc2TsWFjEylTDfPskNCwJZy42QgXa9+rpUFgG98P85Ln+NpdXSCO+t55rK9QDQWeGRo5NDv2JUsO57EV05Ny7jPGiiZzN2VlNINxQPJuaX/BGNu/+UGsTxThnMJ1ypyeZfjWLyeSmyJx2McNeAylSyyXXog2CSIlB+12kNbTjPDuMcblluMNhrW2upiTNdkGS4lJ9euV9u36k0FGvidi5iTZ8a5rdxD0lj45dKjDetgui7rP+K/JrzPeH2Tx+K4dy9rqQRvD1YlgC8ciSa1vq79Ot6/WvrVKDJL4gYCLXxaLLYNT/EyeNmt4R+cxXyx+rVqbeaK4gjnglSWGRQ8ciMGV1I2CCOxBHzqByy4Wz4rlrtm6VgsZpCfYKhO/6VA8MUEfhtxhAAAuHtBoDX8FKDRUpSgVl4bOO68ULu+uIVl+H4m3jtHY78p5ZZ/O6R8iVjh2fmAK4+LWSydhxNIMJdNa5TJ39rjraZVDNGZplV3AbttY/MYb+a168PLHJ2c+d+MZM5S7W+WBbpoFiaSJIYyvUq9urbNsjQPqAN6oNPc3EFtF5txMkSb11O2hv2/OoEt3k7k9ONsliQ/3i92oA91jH2m/Jin4E1Q8o53xfHZP4XDf/T86qnpssbate3arsA/YTfl+o7voe9U7S87zDMw4DZC36x0/WLODqdfcwW8csan0133/AFoNBc3tmsjJec+it5gdPHA9rGoPsFdWYf6ia4ibjbt1tm8zeFv3obu5I/lFoVzgbxKjjEUGG4ZZxIQI40yFw4C+3aBdfy/77e5P2nsf7McOi7fvG5fv/wAaD3cQcdu7Sa0kPJZYZ0ZHHVkGBUgg+uxr1rj4KXjTeHWNxtw0n07Cr8KvFkUq4kgAQFg3cdShHG/k4qXB+0MO/n/VZ1P3QnnqR2+e97769qhwxcnxWdmztzhrCaG5hEeQjxtyzyyFCPLmVHRdlVLhgGLMOnQJUAhtaVQfW/C+2U/2m6/86UGO5Tym25JyHj6cSxl9yqPGXkl7JNYdK2gkELxIrXLkRkblZiELMOgdqshwrOcgkkuOZchmjhnPVJicJI9rbka10ySgiWU6ABIKA6+7qt4iKiBEUKqjQAGgK9UFXxvj2C43YCwwGIssZbfOO2hCBj7nXqfxOzVpSlApSlApSlApSlApSlApSlApSlApSlApSlB//9k=" alt="By default" pagespeed_url_hash="545097666" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="coat_neck[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                                            <span class="name">By default</span>
                                                                        </label>
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABBAEEDASIAAhEBAxEB/8QAHAABAAICAwEAAAAAAAAAAAAAAAQGBQcBAgMI/8QAOBAAAQMDAgQEAQgLAAAAAAAAAQIDEQAEBQYhBxIxQRMiUWGBFBUWMlJxgpEjM0JTVnKSlKGx0f/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APsulKUClKUClKguZW0Rn2cIVKN29auXSQIgNoWhJneeqxG3Y/EJ1KUoFKUoKXxQuFY650llkLKSxqG3YUnstNyldsQfuLwV+GspxBzjumtLvZ1CApmzeZcuhEkW/ioDyhuN0oKlfCofFTF5DJ6at1Yy1N5cY/J2eR+SpcCFXCWH0OlCVHYKITtJAkAEiZqm8R9XXOp8LlNFY/S18XspjnGHVXribc2viIIStwDm5QOsHzGNk8srAbeqpZjiNo7G3Tln87DIXragldrjWV3jqFEwApLQVyH+aKpz2HyGcYDesc5cZNooCDYWnNbWcQAQpAJW7Jj9YpQ6QkExWZx1vj8baC1x9oxaW43DbDaUI6dYG3SfhPaSuUSm+J2McTzo05q0pIkFWHcTtE9FQelV7J6qdd4p4HOt6Y1Kiztsde2VyVWAJSXXGFIUOVRkSyue4jpNWLxgPMSuZ2336/n1HtuOxBKOvjA/a/x7e33dvTb6qSozWG1rpzKXiLFq/VbXrhhFresOWrqzEwlLqUle2/lmrFWrcw6HNQ6VaHMSrMoJBBI2aeM7bde5J3mJMlW0qoUpSgVq3S1vONVfcpDuQfcvHFE8yl+IsqSSR18vIB1iB1hIEjiDk9Tva2dx+nsy5jmcLgXMtcITaoeTcvKcKWWnArcoKWntklJmDOwqXice1itO2bFxcNJbtbVttbq1AJhKAJk7R19t/QnmDzedbaV4Zc5llMhtKeZREHePTrudveJKo7xyBbU846xj2Ykqd87gM7zuEpI+9W/oQeTFHUttk3nW9HWmQ1E6kq51YtlKWC5MQq5dIaHrsoq2HeIlsYHXTyxc/RbTTKoHJ8tzTrjyI2A5hbqA27AxPtFSDq4/YKV+k1OpY+wh1odz9hIPQAfhG2wB6j5qIMXmTcPcpcuDP1vQx3V3+PUnKN4biGoguW2lkDuE3twuOvctCev++smeUYHiCTK3dLp9gXzB23mB3Ht29BCCsanXa2LFhnGRk3DiMgzeKDjdwoeGlQS9uoQD4ZXvt6HrA3Qy428yh5lxLja0hSFpMhQIkEHuKoowWs/CAcGnnDEEBx1KTtv1QY7+v5SKmaaub3S9izh89ZtW1g2SizvLZwu27Lf7LThKUlvlGwURywEgq5utFxpXTxmf3qP6hSg1bhshqXM6m1DldL6dft28obdhjK5ppTNum3abMKTbkh5xRWt0gEISQUnm7VmbHhhh3i09qu9u9UPN7oavSE2bZiPJbJhERt5+c+9XylB527LNuwhi3abZaQIQhtISlI9AB0r0pSgUpSgVwpKVJKVAKSRBBGxFc0oK59BNF/wphf7NH/KVY6UClKUClKUClKUClKUClKUH/9k=" alt="Custom color" pagespeed_url_hash="2461528834" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="coat_neck[contrast]" value="custom" data-field-name="contrast" data-price="3.95">
                                                                            <span class="name">Custom color</span><span class="price">+3,95€</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field required extra_field_neck_lining color" data-field-name="color">
                                                                <input type="hidden" name="coat_neck[color]" value="">
                                                                <div class="fabric_thumb thread_thumb " data-id="2"><a href="javascript:;"><span class="image" style="background: #d89f6b"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="3"><a href="javascript:;"><span class="image" style="background: #ea1c1e"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="5"><a href="javascript:;"><span class="image" style="background: #b2a995"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="4"><a href="javascript:;"><span class="image" style="background: #212534"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="6"><a href="javascript:;"><span class="image" style="background: #34322c"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="1"><a href="javascript:;"><span class="image" style="background: #e7e7e7"></span></a>
                                                                </div>
                                                                <div class="fabric_thumb thread_thumb " data-id="7"><a href="javascript:;"><span class="image" style="background: #1f1f1f"></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="extra_container coat_patches extra_container_colors" style="visibility:hidden;" data-extra-name="coat_patches" data-extra-type="colors" info-icon="L"><a href="javascript:void(0);" class="discard">Delete</a>
                                                        <div class="extra_title">Add elbow patches </div>
                                                        <div class="extra_content">
                                                            <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
                                                                <div class="box_opt box_opt_no_title">
                                                                    <div class="box_opt_fix">
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="coat_patches[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                                            <span class="name">By default</span>
                                                                        </label>
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="coat_patches[contrast]" value="custom" data-field-name="contrast" data-price="12.95">
                                                                            <span class="name">Custom color</span><span class="price">+12.95$</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field required extra_field_patches color" data-field-name="color">
                                                                <input type="hidden" name="coat_patches[color]" value="">
                                                                <div class="fabric_thumb patch_thumb " data-id="55"><a href="javascript:;"><span class="image" style="background:url(dimg/patches/default/x55_thumb.jpg.pagespeed.ic.b_t9mMJkHE)"></span></a>
                                                                    <div class="title">Black</div>
                                                                </div>
                                                                <div class="fabric_thumb patch_thumb " data-id="56"><a href="javascript:;"><span class="image" style="background:url(dimg/patches/default/x56_thumb.jpg.pagespeed.ic.wqJfpJ01vZ)"></span></a>
                                                                    <div class="title">Brown</div>
                                                                </div>
                                                                <div class="fabric_thumb patch_thumb " data-id="57"><a href="javascript:;"><span class="image" style="background:url(dimg/patches/default/x57_thumb.jpg.pagespeed.ic.Kgy_HNRBZQ)"></span></a>
                                                                    <div class="title">Beige</div>
                                                                </div>
                                                                <div class="fabric_thumb patch_thumb " data-id="58"><a href="javascript:;"><span class="image" style="background:url(dimg/patches/default/x58_thumb.jpg.pagespeed.ic.vRTOnEEYcZ)"></span></a>
                                                                    <div class="title">Brown-Grey</div>
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
                                                            <div class="extra_field color required extra_field_threads threads" data-field-name="threads">
                                                                <div class="box_title">BUTTON THREADS:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffcf10" name="coat_threads[threads][color]" data-field-name="threads-color" value="9">
                                                                            <span class="thread_color" style="background: #ffcf10"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="4477cf" name="coat_threads[threads][color]" data-field-name="threads-color" value="11">
                                                                            <span class="thread_color" style="background: #4477cf"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffffff" name="coat_threads[threads][color]" data-field-name="threads-color" value="12">
                                                                            <span class="thread_color" style="background: #ffffff"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="a48239" name="coat_threads[threads][color]" data-field-name="threads-color" value="13">
                                                                            <span class="thread_color" style="background: #a48239"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="4d020d" name="coat_threads[threads][color]" data-field-name="threads-color" value="14">
                                                                            <span class="thread_color" style="background: #4d020d"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b3b3b3" name="coat_threads[threads][color]" data-field-name="threads-color" value="15">
                                                                            <span class="thread_color" style="background: #b3b3b3"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="331b00" name="coat_threads[threads][color]" data-field-name="threads-color" value="16">
                                                                            <span class="thread_color" style="background: #331b00"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="000000" name="coat_threads[threads][color]" data-field-name="threads-color" value="17">
                                                                            <span class="thread_color" style="background: #000000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b80e58" name="coat_threads[threads][color]" data-field-name="threads-color" value="18">
                                                                            <span class="thread_color" style="background: #b80e58"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="0ba133" name="coat_threads[threads][color]" data-field-name="threads-color" value="19">
                                                                            <span class="thread_color" style="background: #0ba133"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="c20000" name="coat_threads[threads][color]" data-field-name="threads-color" value="25">
                                                                            <span class="thread_color" style="background: #c20000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ff7912" name="coat_threads[threads][color]" data-field-name="threads-color" value="31">
                                                                            <span class="thread_color" style="background: #ff7912"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="5f1970" name="coat_threads[threads][color]" data-field-name="threads-color" value="32">
                                                                            <span class="thread_color" style="background: #5f1970"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b8f2f2" name="coat_threads[threads][color]" data-field-name="threads-color" value="33">
                                                                            <span class="thread_color" style="background: #b8f2f2"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field color required extra_field_holes holes" data-field-name="holes">
                                                                <div class="box_title">BUTTON HOLES:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffcf10" name="coat_threads[holes][color]" data-field-name="holes-color" value="9">
                                                                            <span class="thread_color" style="background: #ffcf10"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="4477cf" name="coat_threads[holes][color]" data-field-name="holes-color" value="11">
                                                                            <span class="thread_color" style="background: #4477cf"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffffff" name="coat_threads[holes][color]" data-field-name="holes-color" value="12">
                                                                            <span class="thread_color" style="background: #ffffff"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="a48239" name="coat_threads[holes][color]" data-field-name="holes-color" value="13">
                                                                            <span class="thread_color" style="background: #a48239"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="4d020d" name="coat_threads[holes][color]" data-field-name="holes-color" value="14">
                                                                            <span class="thread_color" style="background: #4d020d"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b3b3b3" name="coat_threads[holes][color]" data-field-name="holes-color" value="15">
                                                                            <span class="thread_color" style="background: #b3b3b3"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="331b00" name="coat_threads[holes][color]" data-field-name="holes-color" value="16">
                                                                            <span class="thread_color" style="background: #331b00"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="000000" name="coat_threads[holes][color]" data-field-name="holes-color" value="17">
                                                                            <span class="thread_color" style="background: #000000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b80e58" name="coat_threads[holes][color]" data-field-name="holes-color" value="18">
                                                                            <span class="thread_color" style="background: #b80e58"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="0ba133" name="coat_threads[holes][color]" data-field-name="holes-color" value="19">
                                                                            <span class="thread_color" style="background: #0ba133"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="c20000" name="coat_threads[holes][color]" data-field-name="holes-color" value="25">
                                                                            <span class="thread_color" style="background: #c20000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ff7912" name="coat_threads[holes][color]" data-field-name="holes-color" value="31">
                                                                            <span class="thread_color" style="background: #ff7912"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="5f1970" name="coat_threads[holes][color]" data-field-name="holes-color" value="32">
                                                                            <span class="thread_color" style="background: #5f1970"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b8f2f2" name="coat_threads[holes][color]" data-field-name="holes-color" value="33">
                                                                            <span class="thread_color" style="background: #b8f2f2"></span>
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
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </section>

        <div class="clearfix visible-xs visible-sm"></div>
        <!-- fixes floating problems when mobile menu is visible -->

    </div>

    <!-- SCRIPTS -->
    <!-- core -->




<!--End Coat Customizer-->


<!--Start Shirt Customizer-->
   <?php }
elseif($id==8)
{
if(isset($_POST['orderid']))
{

    $oid=mysqli_real_escape_string($con,$_POST['orderid']);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);
    //echo "<pre>";print_r($style);
    //$style=explode(":",$r['om_style']);
    $shirtfit=explode(":",$style[0]);$shirtstyle=explode(":",$style[1]);$shirtfast=explode(":",$style[2]);
    $shirthem=explode(":",$style[3]);$shirt_sleeve=explode(":",$style[4]);$shirt_sleeve_detail=explode(":",$style[5]);
    $breast_pocket=explode(":",$style[6]);$pocketstyle=explode(":",$style[7]);$cuffs=explode(":",trim($style[8],"}"));
    $fabid=$r['fabid'];$o_id=$r['om_id'];$order_id=$r['order_id'];$price=$r['om_price'];
    $accents=explode("{",$r['om_accents']);
    $accents=explode(",",$accents[1]);$text=explode(":",$accents[0]);
    $font=explode(":",$accents[1]);$color=explode(":",$accents[2]);
    $position=explode(":",trim($accents[3],"}"));
    $action="update";

    $f_rand=mysqli_query($con,"select * from fabric_master where fab_rand IN($fabid)");
    if(mysqli_num_rows($f_rand) > 0) {
        while($fr=mysqli_fetch_array($f_rand)) {
            $f_id[]=$fr['fab_rand'];
            $f_title[]=$fr['fab_name'];
            $f_desc[]=$fr['fab_desc'];
            $f_img[]=$fr['fab_img'];
    }
  }

  $fab_title=$f_title[0];
   $fab_title1=$f_title[1];
   $fab_desc=$f_desc[0];
   $fab_desc1=$f_desc[1];
   $fab_img = $f_img[0];
   $fab_img1 = $f_img[1];
}
else
{
    $shirtfit[1]="";$shirtstyle[1]="";$coatstyle[1]="";$shirtfast[1]="";$shirthem[1]="";$shirt_sleeve[1]="";
    $shirt_sleeve_detail[1]="";$breast_pocket[1]="";$pocketstyle[1]="";$cuffs[1]="";$fabid=$f_id1[0];$lining[1]="";
    $text[1]="";$font[1]="";$color[1]="";$action="save";$o_id="";$order_id="";$price=$price;
}
$_SESSION['fabID']=$fabid;
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
                            <?php echo $get_sub_cat[0]['subcat_name']; ?>
                        </h1>
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumbs list-inline pull-right">
                                <li><a href="<?php echo $homeurl;?>">Home</a>
                                </li>
                                <!--
                            -->
                                <li><a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['category_name'])); ?>/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/"><?php echo $get_sub_cat[0]['subcat_name']; ?></a></li>

                                <!--
                            -->
                                <li>Customize</li>
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
                                <form method="post" class="garment_form" action="<?php echo $homeurl;?>includes/action/action.php" id="garment_form_9283">
                                <input type="hidden" name="type" value="shirt">
                                <input type="hidden" name="action" value="<?php echo $action;?>">
                                 <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                                <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
                                <input type="hidden" name="p_id" value="<?php echo $p_id;?>">

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
                                                    <a href="javascript:;" class="step_next btn btn-default pull-right">NEXT STEP</a>
                                                    <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
                                                    <span  class="garment_price btn btn-default pull-right">$<?php echo $price;?></span>
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
                                                                
                                                                <!--<label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_necklines_long.jpg" alt="Long" pagespeed_url_hash="2098427807" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="shirt_necklines" value="long" />Long</label>
                                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_necklines_open.jpg" alt="Cutaway collar" pagespeed_url_hash="993044677" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="shirt_necklines" value="open" />Cutaway collar</label>
                                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_necklines_classic_2_but_high.jpg" alt="Classic 2 buttons" pagespeed_url_hash="1489414673" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="shirt_necklines" value="classic_2_but_high" />Classic 2 buttons</label>-->                 
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
                                                                <!--<label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_cuffs_straight_2_button.jpg" alt="2 Buttons" pagespeed_url_hash="1055547296" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="shirt_cuffs" value="straight_2_button" />2 Buttons</label>
                                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_cuffs_straight_3_button.jpg" alt="3 Buttons" pagespeed_url_hash="3719492891" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="shirt_cuffs" value="straight_3_button" />3 Buttons</label>-->
                                                                <!--<label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_cuffs_cut_2_buttons.jpg" alt="Angled 2 buttons" pagespeed_url_hash="49139415" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="shirt_cuffs" value="cut_2_buttons" />Angled 2 buttons</label>-->
                                                                <!--<label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_cuffs_rounded_2_button.jpg" alt="Rounded 2 buttons" pagespeed_url_hash="10513475" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="shirt_cuffs" value="rounded_2_button" />Rounded 2 buttons</label>
                                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_cuffs_twin_single.jpg" alt="French simple" pagespeed_url_hash="3358844447" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="shirt_cuffs" value="twin_single" />French simple</label>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--<div class="config_field shirt_shoulder_piece">
                                                        <div class="box_title">SHOULDER STRAPS:</div>
                                                        <div class="box_opt box_opt_image mobile_layer" icon-fixed="2">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_shoulder_piece_without.jpg" alt="Without" pagespeed_url_hash="3550337368" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="shirt_shoulder_piece" value="without" checked="checked" />Without</label>
                                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_shirt/shirt_shoulder_piece_with.jpg" alt="With" pagespeed_url_hash="1804796948" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="shirt_shoulder_piece" value="with" />With</label>
                                                            </div>
                                                        </div>
                                                    </div>-->
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
                                                    $fab=$site->get_fabrics('',$fabric_list);
                                                    foreach ($fab as $key => $value) {
                            
                                                    ?>
                                                        <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid) {?> current <?php }?>">
                                                            <div class="icon icon-winter"></div>        
                                                            <a href="javascript:void(0);" class="select " rel="<?php echo $fab[$key]['f_rand'];?>">
                                                                <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="Boston">
                                                            </a>
                                                            <div class="price price_part">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                                            <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                                           <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
                                                        </div>
                                                        <?php }?>
                                                       <!-- <div class="fabric_thumb fabric_699 <?php if($fabid=="699") {?> current <?php }?>">
                                                            <div class="icon icon-heart"></div>             
                                                            <a href="javascript:void(0);" class="select " rel="699">
                                                                <img class="b-lazy b-loaded" src="<?php echo $homeurl;?>assets/dimg/fabric/shirt/699_normal.jpg" alt="Mayfield">
                                                            </a>
                                                            <div class="title fabric_title">Mayfield</div>
                                                            <div class="composition">Cotton</div>
                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="garment_block garment_block_extra">
                                                <div class="extra_block extra_block_woman_shirt" data-block-name="woman_shirt">
                                                    <div class="extra_container shirt_initials extra_container_initials active" data-extra-name="shirt_initials" data-extra-type="initials" info-icon="6"><a href="javascript:void(0);" class="discard">Delete</a>
                                                        <div class="extra_title">Monograms</div>
                                                        <div class="extra_content">
                                                            <input type="hidden" class="initials_price" name="initials_price" value="4.95">
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
                                                        <div class="extra_content" style="display: block;">
                                                            <div class="extra_field extra_field_image contrast" data-field-name="contrast">
                                                                <div class="box_opt box_opt_no_title">
                                                                    <div class="box_opt_fix">
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,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" alt="By default" pagespeed_url_hash="4058622919" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="shirt_neck[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                                        </label>
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,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" alt="Inner fabric" pagespeed_url_hash="1304023960" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="shirt_neck[contrast]" value="inner" data-field-name="contrast" data-price="3.5"><span class="name">Inner fabric</span><span class="price">+3,5€</span>
                                                                        </label>
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,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" alt="Outer fabric" pagespeed_url_hash="1679383745" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="shirt_neck[contrast]" value="outer" data-field-name="contrast" data-price="3.5"><span class="name">Outer fabric</span><span class="price">+3,5€</span>
                                                                        </label>
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,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" alt="All" pagespeed_url_hash="2429741907" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="shirt_neck[contrast]" value="full" data-field-name="contrast" data-price="3.5"><span class="name">All</span><span class="price">+3,5€</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field extra_field_fabrics fabrics" data-field-name="fabrics">
                                                                <div class="fabric_filters">
                                                                    <input type="hidden" name="fabric_type" value="shirt" /><span class='filter_box'><select name="tone"><option value="all">All colors</option><option value="gray">Grey</option><option value="blue">Blue</option><option value="black">Black</option><option value="brown">Brown</option><option value="white">tone_white</option><option value="purple">Purple</option><option value="orange">Orange</option><option value="beige">Beige</option><option value="yellow">Yellow</option></select></span><span class='filter_box'><select name="texture"><option value="all">All patterns</option><option value="chequered">Squared</option><option value="flat">Plain</option><option value="shredded">Striped</option><option value="floral">Floral</option><option value="houndstooth">texture_houndstooth</option><option value="paisley">Paisley</option><option value="micropattern">Micropattern</option><option value="dotted">Dottted</option><option value="animal_print">Animal Print</option></select></span>
                                                                </div>
                                                                <div class="extra_field required">
                                                                    <input type="hidden" name="shirt_neck[fabric_id]" class="idExtra" value="" />
                                                                    <div class="fabric_slider">
                                                                        <div class="fabric_slider_contents mobile_layer"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="extra_container shirt_cuff extra_container_fabrics active" data-extra-name="shirt_cuff" data-extra-type="fabrics" info-icon="g" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                                        <div class="extra_title">Cuffs Style</div>
                                                        <div class="extra_content" style="display: block;">
                                                            <div class="extra_field extra_field_image contrast" data-field-name="contrast">
                                                                <div class="box_opt box_opt_no_title">
                                                                    <div class="box_opt_fix">
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,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" alt="By default" pagespeed_url_hash="363424792" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="shirt_cuff[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                                        </label>
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,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" alt="Inner fabric" pagespeed_url_hash="1865175201" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="shirt_cuff[contrast]" value="inner" data-field-name="contrast" data-price="3.5"><span class="name">Inner fabric</span><span class="price">+3,5€</span>
                                                                        </label>
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABBAEEDASIAAhEBAxEB/8QAHAABAAIDAQEBAAAAAAAAAAAAAAUGAwQHAgEI/8QANRAAAgEDBAAFAwICCwEAAAAAAQIDBAURAAYSIQcTIjFBFDJRI3EVlRYlM0JDUlZXgbHS0//EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8A/ZemmmgarG9dyVNunpLDYYYK3cdyDGkp5WIjhjX76ibHYjTI692JCjs5GxvrdNv2nY3uFa6GZz5dJTmQIaiU+ygnoD5LHpVBJ6GtHw4ttEKOo3AbpQ3q73RuVdcKSQSRHGeMMRBOIoweKj92PqYnQSu07DDt+2tTrPJWVc8hnraybHmVUzfc7Y9vYAKOlUKo6A1MajRdY5b41ppYzPJCoerkDYSnBGVUn5duiF+F7JGV5SWgaaaqm8N2y2+sgsVgolu24KpgkcBfjFTjotLM4+1VBB4j1HIAHYOgtemqx/Dt8/6qs38lf/76aCz6r+890Uu26WFfp5a65VZZKKhhxznYDJJJ6RFHbOegPySAfe8dy0m26GN5ENTW1LGOio0YB6h/3PSqM5Zj0o/4BptsoJXmlv12kgrrrVhVkqVIMEa9lYYWk9CoucccFiSTnJ0Ecm3Iqwtd9zU1vvd1nzzrZoEkihB+2KBpfSiD24oORIJJYknUdWbF2zDX/X2SGo23dfUI6mzSNSvkkHBT/GPY9MiLn8nVrmkZJC7MxnccCGLAvkD0ZfLnPWFwuc+ltfO+bQkeXI/JSiKeZOfxku3XukrAfjoaghtn7xrtlVq2HfUVMtJV1TeTuGEcFlmkb7ayPswSMT0xIQjAAUDGuwA5GRrllXSRXC3zUssEU9DJEyuJUDx+Wc8hw6QKMjkh5Mucj21A7C3Hc7Zep/CiiuEdzeBDJb6uStDPBTj7qeR+mZkBRlZQSY3XpSOSh0fdd/mRv4damkE8jmLzIlDSO/zHArelnHy59Efu2cEay7H2xHY4ZKupCNcqkfqsrs6xLkny1ZvU3ZLM7ep2JY/AXNt632y13F6RZFqbp9MrTShAPLizhEUDqNMhuKfPFiSxyTqbj3RUC7vtjbFMlwv3BWlZwfpreje0k7D5x2sYPJuvtUlhRatNUf8Aorvj/c6s/lFN/wCdNBzvbWy9veIvizv6r3zSy3GtttXHS0dK9RIiU1NmQRlQrD7wobB6zk/Opq4+DVRYC9w8M7/U2mqAP9X1zmejlBBynYLLnPbHkfgcffWt4qJUeHXirbvFWkhZ7JcI1tu40jjyUBwI5zjs44oPb+4FHcmuzUtRBV0sVVTTRzQTIJIpI2DK6kZBBHuCPnQcT2tvCapvE219y0D2HccY4fSEEipU+xhbJaUEBsxsxGAeJbicUg2HxIt3jq1dbZpG2RO3OelFQs0KB1wxaJm/TPmksSPs5E9/Pf8AxG2PZ972gUlxUw1cJL0dbEMS00nwyn5GQDj8gHogEcZvu4N10Ew2JXxx0W4/NWEXiaMfSeU+FjqFBAVpW/s8BSCfUxUqVEG/vLc90uF5O19mzwPeI8PcLnMfNitcYIAdmOFefAwqIDyHZyNYrzt+DZ20KCt22GhuNiqVuCzyKXmqAX41PmnIaQlWkB+1cEfgYtG1dt0G17ZBb7UsxYt5pmkYiepkfJ8x2x5jOx5oxAQH0+wA17SztvJ6rb0Cyx2IOBcapP01kXHqp4+JyWK8Vclm48SD6j0EvA9XWPU7c2XWTA+cTedySqshEuMOkefTJP0F6HlxAAYyoTVt2rt617ZtC2y1QukXNpZZJHMks8rHLySOe3dj2Sf+sa36GkpaCjhoqGmhpqaFAkUMSBERR7AAdAaz6oaaaaDWudDR3O31FuuFNHU0lTG0U0Mi5V0YYII/GNceopb54J1Bo64Vt58PWk/Rq8+bUWvkelce7Jkn8+4xhvS/ateJ4o54XhmiSWKRSro6gqykYIIPuNBr2e52+8W6K42usgrKSUExzQuGU4OCMj5BBBHuCMHVX8aqeGfw1uskp4vTKk8LA4YOrDAUjsFu06/zHUVV+FcNur5blsO/Vu06uUgyQwqJqR/3hY49uh3xX4X31uLtzed5iht+7LvapbbHNznWkicPVqPtU/aEwcHIz+wOGAadrttZfpZaCCWanoopWStrI8xmUgglIz9zPyX1MxwnIgDkPT0KipaahpIqSjgjp6eFAkcUa8VRR7AAa+0lPBSUsVLTRJDBEgSONBhVUDAAGsugaaaaBpppoGmmmgaaaaBpppoGmmmgaaaaD//Z" alt="Outer fabric" pagespeed_url_hash="2240534986" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="shirt_cuff[contrast]" value="outer" data-field-name="contrast" data-price="3.5"><span class="name">Outer fabric</span><span class="price">+3,5€</span>
                                                                        </label>
                                                                        <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABBAEEDASIAAhEBAxEB/8QAGwABAAMBAQEBAAAAAAAAAAAAAAUGBwQDAQj/xAAyEAACAQMEAgADBgUFAAAAAAABAgMEBREABhIhBzETIkEUFiMyQlFSYXGV0xUXM1NV/8QAFQEBAQAAAAAAAAAAAAAAAAAAAAH/xAAVEQEBAAAAAAAAAAAAAAAAAAAAEf/aAAwDAQACEQMRAD8A/Zemmmgao+5rrX7j3BJsvbdXLSrAA17ukI7pUIyKeJvQncEHP6F+b2V1yeVPItFYEksNpnnqNwTLjhSUclU1EhGTK6ID2B+VTjkSucLyYe3izdHj+poYtv7XvcD1kZZ5aaqJirZZD80kro4VmYklmYDGc6C52i30VptlNbLbTpTUdNGI4YkHSqPQ/n/X2ddWoa13Se7XWc0KILXSu0LVDDJqJgSGVP2VCMFu8tkDHEkzOgaaaod63Fddx3ePbmzKhaeMgSV944h/gwciPwQemdirBXYFcgkB+JwF801XPufb/wD1Nx/3yq/yaaCx6pe991VMNw+7G3HgN4kj5T1MuTFQIwPFiAD8SU/oiHZ9nC+4jyt5Usu16tdu0t3oor3NgSPIS60ClSQ7qoJLkflTHeQThfcXtCu29JRPDYLrTV5lkf7VU08vKSpmPElpOOZGds9h+K/QAY6CXs1rpLNRrbaUyspcs/LJlqJCxJkkVTzd2JOS7Kc+v21x7gsdm3DSfZrtbKWqiTKqWVTJEcHPEjisbj3+YSDHs6kASC0MSKih+LxFARnJ+UxghB/SRif4SdcsdTTVKiRHSYAcFYyLIRgYwCwCHDZBjClgQcfTUEJZNyXXxxHBBcZam8bJVhClUy86i1LgYDMFX7REPqePxEAOeQGtjgqqaejSthqIpKWSMSpMjgoyEZDBvRGO86zuoKsnKq+HwkU5klLEOno+/wASRRj0ArJn3jVI8U3VKy+S7IsV2dNqzPJNbppIs8ZIyPtFNCWJDxgsHQsCP+TpghGg0rcFfVbiqTZragkhZQzxtng6N6eoI/LFj1FkPL6+VORNk25ZaWx0Bp6ctLLI/wASoqHA5zyYALNjAHQAAAAVQqgAADXPt2W3Rz1dttEGaajcrU1PMtzqD2yljku49uxPRIHZzxgJ75ct51c1s2jUGls0bGKtv6YPNgcPFSD0zDBBl7VT65MDxovWmqP/ALVbP/6rx/e6v/LpoMh8WUVA+7vINLf4KaW9LuCoeeSRFaQ05JCMBgvxBDSBRgYU/vqWvvjOzVdYa2wB9tXePl+Nb0ARcntXhBC8Ofvkykqyk5GRro842St2Zvel8rWaCae3yqKXcVNGpcCPoLPwGOWMDOTjpR0Cx1ZaCrp7pbKeuoZoqikeMPEyASqRxzgJ0hIUfqJLIQR2uNQUnbO77lQ3aLbPkCmWGtLGKhr4lV6eoAz0M4j6JUFePZYY45jBhqbxldrP5vfyJSXtZaOqmLS0jO0fJZF4khyMuoIDBguQV/fBOi7mslr3FZ5bfeYUnppAAJGkDSDGQrCYj5ThcB0UgjKt9dZ3XJuwVUGydyNPBa6ioEE9wjLJPcY5Afhwn9YV2BRzy9FffcjBIXCurvJFZLb7LWS0G04ywudyQETXQgcWSLGX4LyYSSggOAQuMdzO9aKmt21qSqoCLZFZKqnmiaGT4C08QkEcqKydLhZJUyWJ4yjrVnt1FRW+2xUtDDDHR0aARxqq/DVUXK5UYjXMeVJcscrrosG3H3LVQ1d1gb/QaSZZaOOZuTVzJ+SRgQAsQAjIGAXZAx+XHIOiltku7qKK3U1NLZdkRKFSBA0NRc176PpooD7+jyfXCn571Q0lNQ0cNFRU8NNTQII4oYkCJGoGAqgdAD9te+mqGmmmg86qCCqppaaphjmglQpJHIoZXUjBBB6II+msFv2zr94qrZrttimnvmzncvPbFPKot+TkvFnpkBJPWCM5JHcg37TQZRtrcVn3DRi42SviqeWGd0ciWPl3846kBwfZ4ch/GNQ/ligT7mys2EnSeIRqoA4uXHpQOjhc5JU4B+X66uu6PFe0r5XNc4qepst0Y5Nfapvs8vfv0CpJ+pxk/vr5YfHEdFVUUt23Dc73FQszQU9WEMWTnBYEEkjORgj+edSDw2vYZ9wRwVt5gdLZGQ0NNJ7qsHkrsvQWMEtxXALA/N10dC001Q0000DTTTQNNNNA0000DTTTQNNNNA0000H/2Q==" alt="All" pagespeed_url_hash="1286515158" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                            <input type="radio" name="shirt_cuff[contrast]" value="full" data-field-name="contrast" data-price="3.5"><span class="name">All</span><span class="price">+3,5€</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field extra_field_fabrics fabrics" data-field-name="fabrics">
                                                                <div class="fabric_filters">
                                                                    <input type="hidden" name="fabric_type" value="shirt" /><span class='filter_box'><select name="tone"><option value="all">All colors</option><option value="gray">Grey</option><option value="blue">Blue</option><option value="black">Black</option><option value="brown">Brown</option><option value="white">tone_white</option><option value="purple">Purple</option><option value="orange">Orange</option><option value="beige">Beige</option><option value="yellow">Yellow</option></select></span><span class='filter_box'><select name="texture"><option value="all">All patterns</option><option value="chequered">Squared</option><option value="flat">Plain</option><option value="shredded">Striped</option><option value="floral">Floral</option><option value="houndstooth">texture_houndstooth</option><option value="paisley">Paisley</option><option value="micropattern">Micropattern</option><option value="dotted">Dottted</option><option value="animal_print">Animal Print</option></select></span>
                                                                </div>
                                                                <div class="extra_field required">
                                                                    <input type="hidden" name="shirt_cuff[fabric_id]" class="idExtra" value="" />
                                                                    <div class="fabric_slider">
                                                                        <div class="fabric_slider_contents mobile_layer"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="extra_container shirt_patches extra_container_fabrics" data-extra-name="shirt_patches" data-extra-type="fabrics" info-icon="k" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                                        <div class="extra_title">Add elbow patches </div>
                                                        <div class="extra_content">
                                                            <div class="extra_field extra_field_radio contrast" data-field-name="contrast">
                                                                <div class="box_opt box_opt_no_title">
                                                                    <div class="box_opt_fix">
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="shirt_patches[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                                        </label>
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="shirt_patches[contrast]" value="custom" data-field-name="contrast" data-price="3.95"><span class="name">Custom color</span><span class="price">+3,95€</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field extra_field_fabrics fabrics" data-field-name="fabrics">
                                                                <div class="fabric_filters">
                                                                    <input type="hidden" name="fabric_type" value="shirt" /><span class='filter_box'><select name="tone"><option value="all">All colors</option><option value="gray">Grey</option><option value="blue">Blue</option><option value="black">Black</option><option value="brown">Brown</option><option value="light">Light</option><option value="other">Others</option></select></span><span class='filter_box'><select name="texture"><option value="all">All patterns</option><option value="flat">Plain</option><option value="shredded">Striped</option><option value="chequered">Squared</option><option value="other">Others</option></select></span>
                                                                </div>
                                                                <div class="extra_field required">
                                                                    <input type="hidden" name="shirt_patches[fabric_id]" class="idExtra" value="" />
                                                                    <div class="fabric_slider">
                                                                        <div class="fabric_slider_contents mobile_layer"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="extra_container shirt_threads extra_container_threads" data-extra-name="shirt_threads" data-extra-type="threads" info-icon="9" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                                        <div class="extra_title">Add colored button holes / threads</div>
                                                        <div class="extra_content">
                                                            <div class="extra_field extra_field_radio contrast" data-field-name="contrast">
                                                                <div class="box_opt box_opt_no_title">
                                                                    <div class="box_opt_fix">
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="shirt_threads[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                                        </label>
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="shirt_threads[contrast]" value="all" data-field-name="contrast" data-price="3.95"><span class="name">All</span><span class="price"> (+3,95€)</span>
                                                                        </label>
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="shirt_threads[contrast]" value="cuff" data-field-name="contrast" data-price="3.95"><span class="name">Only cuffs</span><span class="price"> (+3,95€)</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field color required extra_field_threads threads" data-field-name="threads">
                                                                <div class="box_title">BUTTON THREADS:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="2361ad" name="shirt_threads[threads][color]" data-field-name="threads-color" value="20"> <span class="thread_color" style="background: #2361ad"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffcf10" name="shirt_threads[threads][color]" data-field-name="threads-color" value="21"> <span class="thread_color" style="background: #ffcf10"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="a48239" name="shirt_threads[threads][color]" data-field-name="threads-color" value="22"> <span class="thread_color" style="background: #a48239"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="e63b85" name="shirt_threads[threads][color]" data-field-name="threads-color" value="23"> <span class="thread_color" style="background: #e63b85"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b3b3b3" name="shirt_threads[threads][color]" data-field-name="threads-color" value="24"> <span class="thread_color" style="background: #b3b3b3"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="dd2535" name="shirt_threads[threads][color]" data-field-name="threads-color" value="26"> <span class="thread_color" style="background: #dd2535"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffffff" name="shirt_threads[threads][color]" data-field-name="threads-color" value="27"> <span class="thread_color" style="background: #ffffff"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="34a547" name="shirt_threads[threads][color]" data-field-name="threads-color" value="28"> <span class="thread_color" style="background: #34a547"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="000000" name="shirt_threads[threads][color]" data-field-name="threads-color" value="29"> <span class="thread_color" style="background: #000000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ff7912" name="shirt_threads[threads][color]" data-field-name="threads-color" value="35"> <span class="thread_color" style="background: #ff7912"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="731422" name="shirt_threads[threads][color]" data-field-name="threads-color" value="36"> <span class="thread_color" style="background: #731422"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="5f1970" name="shirt_threads[threads][color]" data-field-name="threads-color" value="37"> <span class="thread_color" style="background: #5f1970"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b8f2f2" name="shirt_threads[threads][color]" data-field-name="threads-color" value="38"> <span class="thread_color" style="background: #b8f2f2"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="3d2a26" name="shirt_threads[threads][color]" data-field-name="threads-color" value="39"> <span class="thread_color" style="background: #3d2a26"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field color required extra_field_holes holes" data-field-name="holes">
                                                                <div class="box_title">BUTTON HOLES:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="2361ad" name="shirt_threads[holes][color]" data-field-name="holes-color" value="20"> <span class="thread_color" style="background: #2361ad"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffcf10" name="shirt_threads[holes][color]" data-field-name="holes-color" value="21"> <span class="thread_color" style="background: #ffcf10"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="a48239" name="shirt_threads[holes][color]" data-field-name="holes-color" value="22"> <span class="thread_color" style="background: #a48239"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="e63b85" name="shirt_threads[holes][color]" data-field-name="holes-color" value="23"> <span class="thread_color" style="background: #e63b85"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b3b3b3" name="shirt_threads[holes][color]" data-field-name="holes-color" value="24"> <span class="thread_color" style="background: #b3b3b3"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="dd2535" name="shirt_threads[holes][color]" data-field-name="holes-color" value="26"> <span class="thread_color" style="background: #dd2535"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffffff" name="shirt_threads[holes][color]" data-field-name="holes-color" value="27"> <span class="thread_color" style="background: #ffffff"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="34a547" name="shirt_threads[holes][color]" data-field-name="holes-color" value="28"> <span class="thread_color" style="background: #34a547"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="000000" name="shirt_threads[holes][color]" data-field-name="holes-color" value="29"> <span class="thread_color" style="background: #000000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ff7912" name="shirt_threads[holes][color]" data-field-name="holes-color" value="35"> <span class="thread_color" style="background: #ff7912"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="731422" name="shirt_threads[holes][color]" data-field-name="holes-color" value="36"> <span class="thread_color" style="background: #731422"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="5f1970" name="shirt_threads[holes][color]" data-field-name="holes-color" value="37"> <span class="thread_color" style="background: #5f1970"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b8f2f2" name="shirt_threads[holes][color]" data-field-name="holes-color" value="38"> <span class="thread_color" style="background: #b8f2f2"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="3d2a26" name="shirt_threads[holes][color]" data-field-name="holes-color" value="39"> <span class="thread_color" style="background: #3d2a26"></span>
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
                                                <div class="controls"><a href="javascript:;" class="icon zoom in" data-icon="O"><span class="h">ZOOM</span></a><a href="javascript:;" class="icon zoom out" data-icon="P"><span class="h">ZOOM</span></a> </div>
                                                <div class="render3d resize_fix" style="width: 390px; margin-top: -40px; margin-left: 0px;" resize_fix="margin-top: -40px; height: "><img class="" style="z-index: 10000;" src="3d/woman/models/1/front/model_front.png" alt="" width="343"><img class="" style="z-index: 10001;" src="3d/woman/shirt/pants/front/pants_front.png" alt="" width="343"><img class="" style="z-index: 16000;" src="3d/woman/shirt/buttons/1_fit_fit+button_close_standard+bottom_cut_modern+outside.png" alt="" width="343"><img class="" style="z-index: 16000;" src="3d/woman/shirt/buttons/1_necklines_classic+button_close_standard.png" alt="" width="343"><img class="" style="z-index: 16000;" src="3d/woman/shirt/buttons/1_pockets_2+pockets_type_peak.png" alt="" width="343"><img class="" style="z-index: 12950;" src="3d/woman/models/1/front/mano_left.png" alt="" width="343"><img class="" style="z-index: 11000;" src="3d/woman/shirt/<?php echo $_SESSION['fabID']; ?>_fabric/front/fit_fit+button_close_standard+bottom_cut_modern+outside.png" alt="" width="343"><img class="" style="z-index: 12000;" src="3d/woman/shirt/<?php echo $_SESSION['fabID']; ?>_fabric/front/necklines_classic+button_close_standard.png" alt="" width="343"><img class="" style="z-index: 13000;" src="3d/woman/shirt/<?php echo $_SESSION['fabID']; ?>_fabric/front/sleeves_long+cuffs_classic+sleeve_detail_normal.png" alt="" width="343"><img class="" style="z-index: 14000;" src="3d/woman/shirt/<?php echo $_SESSION['fabID']; ?>_fabric/front/pockets_2+pockets_type_peak.png" alt="" width="343"></div>                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </section>

        <div class="clearfix visible-xs visible-sm"></div>
        <!-- fixes floating problems when mobile menu is visible -->

    </div>

    <!-- SCRIPTS -->
    <!-- core -->

<!--End Shirt Customizer-->
<?php

}
else if($id==7){
    if(isset($_POST['orderid']))
{

    $oid=mysqli_real_escape_string($con,$_POST['orderid']);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);
    //$style=explode(":",$r['om_style']);
    $fit=explode(":",$style[0]);$blousestyle=explode(":",$style[1]);$fastening=explode(":",$style[2]);
    $hemline=explode(":",$style[3]);$sleeves=explode(":",$style[4]);$sleevedetail=explode(":",$style[5]);
    $breastpocket=explode(":",$style[6]);
    $pocketstyle=explode(":",$style[7]);$cuffs=explode(":",trim($style[8],"}"));
    $fabid=$r['fabid'];$o_id=$r['om_id'];$order_id=$r['order_id'];$price=$r['om_price'];
    $accents=explode("{",$r['om_accents']);
    $accents=explode(",",$accents[1]);$text=explode(":",$accents[0]);$font=explode(":",$accents[1]);
    $color=explode(":",trim($accents[2],"}"));
    $action="update";

    $f_rand=mysqli_query($con,"select * from fabric_master where fab_rand IN($fabid)");
    if(mysqli_num_rows($f_rand) > 0) {
        while($fr=mysqli_fetch_array($f_rand)) {
            $f_id[]=$fr['fab_rand'];
            $f_title[]=$fr['fab_name'];
            $f_desc[]=$fr['fab_desc'];
            $f_img[]=$fr['fab_img'];
    }
  }

  $fab_title=$f_title[0];
   $fab_title1=$f_title[1];
   $fab_desc=$f_desc[0];
   $fab_desc1=$f_desc[1];
   $fab_img = $f_img[0];
   $fab_img1 = $f_img[1];
}
else
{
    $fit[1]="";$blousestyle[1]="";$coatstyle[1]="";$fastening[1]="";$hemline[1]="";$sleeves[1]="";$sleevedetail[1]="";
    $breastpocket[1]="";$pocketstyle[1]="";$cuffs[1]="";$fabid=$f_id1[0];$text[1]="";$font[1]="";$color[1]="";
    $action="save";$o_id="";$order_id="";$price=$price;
}
    $_SESSION['fabID']=$fabid;
?>
<!--Start Blouse Customizer-->



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
                            <?php echo $get_sub_cat[0]['subcat_name']; ?>
                        </h1>
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumbs list-inline pull-right">
                                <li><a href="<?php echo $homeurl;?>">Home</a>
                                </li>
                                <!--
                            -->
                                <li><a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['category_name'])); ?>/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/"><?php echo $get_sub_cat[0]['subcat_name']; ?></a></li>

                                <!--
                            -->
                                <li>Customize</li>
                            </ul>
                            <!-- !BREADCRUMBS -->
                        </div>
                    </header>
                </div>
            </div>

<div class="container customizer-container" style="min-height:900px;">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 article-wrapper">
                                <form method="post" class="garment_form" action="<?php echo $homeurl;?>includes/action/action.php" id="garment_form_8194">
                                    <input type="hidden" name="type" value="blouse">
                                    <input type="hidden" name="action" value="<?php echo $action; ?>">
                                    <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
                                    <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                                    <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
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
                                                    <a href="javascript:;" class="step_next btn btn-default pull-right">NEXT STEP</a>
                                                    <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
                                                    <span  class="garment_price btn btn-default pull-right">$<?php echo $price;?></span>
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
                                                                <!--<label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_cuffs_straight_2_button.jpg" alt="2 Buttons" pagespeed_url_hash="3250521662" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="blouse_cuffs" value="straight_2_button" />2 Buttons</label>
                                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_cuffs_cut_2_buttons.jpg" alt="Angled 2 buttons" pagespeed_url_hash="1557503509" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="blouse_cuffs" value="cut_2_buttons" />Angled 2 buttons</label>
                                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_cuffs_rounded_2_button.jpg" alt="Rounded 2 buttons" pagespeed_url_hash="2945223885" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="blouse_cuffs" value="rounded_2_button" />Rounded 2 buttons</label>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--<div class="config_field blouse_shoulder_piece">
                                                        <div class="box_title">SHOULDER STRAPS:</div>
                                                        <div class="box_opt box_opt_image mobile_layer">
                                                            <div class="box_opt_fix">
                                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_shoulder_piece_with.jpg" alt="With" pagespeed_url_hash="3313161042" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="blouse_shoulder_piece" value="with" />With</label>
                                                                <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_blouse/blouse_shoulder_piece_without.jpg" alt="Without" pagespeed_url_hash="2190080482" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                    <input type="radio" name="blouse_shoulder_piece" value="without" checked="checked" />Without</label>
                                                            </div>
                                                        </div>
                                                    </div>-->
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
                                                     <?php $fab=$site->get_fabrics('',$fabric_list);
                                                    //print_r($fab);
                                                    foreach ($fab as $key => $value) {
                                                    ?>
                                                        <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid){?> current <?php }?>">
                                                            <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
                                                                <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="<?php echo $fab[$key]['fab_name']?>">
                                                            </a>
                                                            <div class="price price_part">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                                            <div class="title fabric_title"><?php echo $fab[$key]['fab_name']?></div>
                                                            <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
                                                        </div>
                                                    <?php }?>
                                                       <!-- <div class="fabric_thumb fabric_1276 <?php if($fabid=="1276"){?> current <?php }?>">
                                                            <a href="javascript:void(0);" class="select " rel="1276">
                                                                <img class="b-lazy b-loaded" src="<?php echo $homeurl;?>assets/dimg/fabric/blouse/1276_normal.jpg" alt="Tornio">
                                                            </a>
                                                            <div class="title fabric_title">Tornio</div>
                                                            <div class="composition"></div>
                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="garment_block garment_block_extra">
                                                <div class="extra_block extra_block_woman_blouse" data-block-name="woman_blouse">
                                                     <div class="extra_container blouse_initials extra_container_initials active" data-extra-name="blouse_initials" data-extra-type="initials" info-icon="R"><a href="javascript:void(0);" class="discard">Delete</a>
                                                            <div class="extra_title">Add monogram</div>
                                                            <div class="extra_content">
                                                                <input type="hidden" class="initials_price" name="initials_price" value="9.95">
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
                                                    <div class="extra_container blouse_threads extra_container_threads" data-extra-name="blouse_threads" data-extra-type="threads" info-icon="5" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                                        <div class="extra_title">Add colored button holes / threads</div>
                                                        <div class="extra_content">
                                                            <div class="extra_field extra_field_radio contrast" data-field-name="contrast">
                                                                <div class="box_opt box_opt_no_title">
                                                                    <div class="box_opt_fix">
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="blouse_threads[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                                        </label>
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="blouse_threads[contrast]" value="all" data-field-name="contrast" data-price="2.95"><span class="name">All</span><span class="price"> (+2,95€)</span>
                                                                        </label>
                                                                        <label class="option option_radio t4l_radio">
                                                                            <input type="radio" name="blouse_threads[contrast]" value="cuff" data-field-name="contrast" data-price="2.95"><span class="name">Only cuffs</span><span class="price"> (+2,95€)</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field color required extra_field_threads threads" data-field-name="threads">
                                                                <div class="box_title">BUTTON THREADS:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="2361ad" name="blouse_threads[threads][color]" data-field-name="threads-color" value="20"> <span class="thread_color" style="background: #2361ad"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffcf10" name="blouse_threads[threads][color]" data-field-name="threads-color" value="21"> <span class="thread_color" style="background: #ffcf10"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="a48239" name="blouse_threads[threads][color]" data-field-name="threads-color" value="22"> <span class="thread_color" style="background: #a48239"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="e63b85" name="blouse_threads[threads][color]" data-field-name="threads-color" value="23"> <span class="thread_color" style="background: #e63b85"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b3b3b3" name="blouse_threads[threads][color]" data-field-name="threads-color" value="24"> <span class="thread_color" style="background: #b3b3b3"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="dd2535" name="blouse_threads[threads][color]" data-field-name="threads-color" value="26"> <span class="thread_color" style="background: #dd2535"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffffff" name="blouse_threads[threads][color]" data-field-name="threads-color" value="27"> <span class="thread_color" style="background: #ffffff"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="34a547" name="blouse_threads[threads][color]" data-field-name="threads-color" value="28"> <span class="thread_color" style="background: #34a547"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="000000" name="blouse_threads[threads][color]" data-field-name="threads-color" value="29"> <span class="thread_color" style="background: #000000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ff7912" name="blouse_threads[threads][color]" data-field-name="threads-color" value="35"> <span class="thread_color" style="background: #ff7912"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="731422" name="blouse_threads[threads][color]" data-field-name="threads-color" value="36"> <span class="thread_color" style="background: #731422"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="5f1970" name="blouse_threads[threads][color]" data-field-name="threads-color" value="37"> <span class="thread_color" style="background: #5f1970"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b8f2f2" name="blouse_threads[threads][color]" data-field-name="threads-color" value="38"> <span class="thread_color" style="background: #b8f2f2"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="3d2a26" name="blouse_threads[threads][color]" data-field-name="threads-color" value="39"> <span class="thread_color" style="background: #3d2a26"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="extra_field color required extra_field_holes holes" data-field-name="holes">
                                                                <div class="box_title">BUTTON HOLES:</div>
                                                                <div class="box_opt">
                                                                    <div class="box_opt_fix">
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="2361ad" name="blouse_threads[holes][color]" data-field-name="holes-color" value="20"> <span class="thread_color" style="background: #2361ad"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffcf10" name="blouse_threads[holes][color]" data-field-name="holes-color" value="21"> <span class="thread_color" style="background: #ffcf10"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="a48239" name="blouse_threads[holes][color]" data-field-name="holes-color" value="22"> <span class="thread_color" style="background: #a48239"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="e63b85" name="blouse_threads[holes][color]" data-field-name="holes-color" value="23"> <span class="thread_color" style="background: #e63b85"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b3b3b3" name="blouse_threads[holes][color]" data-field-name="holes-color" value="24"> <span class="thread_color" style="background: #b3b3b3"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="dd2535" name="blouse_threads[holes][color]" data-field-name="holes-color" value="26"> <span class="thread_color" style="background: #dd2535"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ffffff" name="blouse_threads[holes][color]" data-field-name="holes-color" value="27"> <span class="thread_color" style="background: #ffffff"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="34a547" name="blouse_threads[holes][color]" data-field-name="holes-color" value="28"> <span class="thread_color" style="background: #34a547"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="000000" name="blouse_threads[holes][color]" data-field-name="holes-color" value="29"> <span class="thread_color" style="background: #000000"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="ff7912" name="blouse_threads[holes][color]" data-field-name="holes-color" value="35"> <span class="thread_color" style="background: #ff7912"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="731422" name="blouse_threads[holes][color]" data-field-name="holes-color" value="36"> <span class="thread_color" style="background: #731422"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="5f1970" name="blouse_threads[holes][color]" data-field-name="holes-color" value="37"> <span class="thread_color" style="background: #5f1970"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="b8f2f2" name="blouse_threads[holes][color]" data-field-name="holes-color" value="38"> <span class="thread_color" style="background: #b8f2f2"></span>
                                                                        </label>
                                                                        <label class="t4l_radio t4l_radio_color">
                                                                            <input type="radio" class="color" data-color="3d2a26" name="blouse_threads[holes][color]" data-field-name="holes-color" value="39"> <span class="thread_color" style="background: #3d2a26"></span>
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
                                                <div class="controls"><a href="javascript:;" class="icon zoom in" data-icon="O"><span class="h">ZOOM</span></a><a href="javascript:;" class="icon zoom out" data-icon="P"><span class="h">ZOOM</span></a> </div>
                                                <div class="render3d resize_fix" style="width: 390px; margin-top: -40px; margin-left: 0px;" resize_fix="margin-top: -40px; height: "></div>                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </section>

        <div class="clearfix visible-xs visible-sm"></div>
        <!-- fixes floating problems when mobile menu is visible -->

    </div>
<!--End Blouse Customizer-->
<?php }
else if($id==15){
    if(isset($_POST['orderid']))
        {
            $oid=mysqli_real_escape_string($con,$_POST['orderid']);
            $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
            $r=mysqli_fetch_array($sql);
            $style=explode("{",$r['om_style']);
            $style=explode(",",$style[1]);
            //$style=explode(":",$r['om_style']);
            $jacketfit=explode(":",$style[0]);$look=explode(":",$style[1]);$lapelstyle=explode(":",$style[2]);
            $lapelwidth=explode(":",$style[3]);$buttons=explode(":",$style[4]);$length=explode(":",$style[5]);
            $chestpocket=explode(":",$style[6]);$pocketstyle=explode(":",$style[7]);
            $sleeves=explode(":",$style[8]);$hemline=explode(":",$style[9]);$backstyle=explode(":",trim($style[10],"}"));
            $fabid=$r['fabid'];$o_id=$r['om_id'];$order_id=$r['order_id'];$price=$r['om_price'];
            $accents=explode("{",$r['om_accents']);
            $accents=explode(",",$accents[1]);$lining=explode(":",$accents[0]);$text=explode(":",$accents[1]);
            $font=explode(":",$accents[2]);$color=explode(":",trim($accents[3],"}"));
            $action="update";

            $f_rand=mysqli_query($con,"select * from fabric_master where fab_rand IN($fabid)");
   if(mysqli_num_rows($f_rand) > 0) {
        while($fr=mysqli_fetch_array($f_rand)) {
            $f_id[]=$fr['fab_rand'];
            $f_title[]=$fr['fab_name'];
            $f_desc[]=$fr['fab_desc'];
            $f_img[]=$fr['fab_img'];
    }
  }

  $fab_title=$f_title[0];
   $fab_title1=$f_title[1];
   $fab_desc=$f_desc[0];
   $fab_desc1=$f_desc[1];
   $fab_img = $f_img[0];
   $fab_img1 = $f_img[1];
        }
        else
        {
            $jacketfit[1]="";$look[1]="";$coatstyle[1]="";$lapelstyle[1]="";$lapelwidth[1]="";$buttons[1]="";
            $length[1]="";$backstyle[1]="";$chestpocket[1]="";$pocketstyle[1]="";$sleeves[1]="";$hemline[1]="";
            $fabid=$f_id1[0];
            $lining[1]="";$text[1]="";
            $font[1]="";$color[1]="";$action="save";$o_id="";$order_id="";$price=$price;
        }
    $_SESSION['fabID']=$fabid;
?>



<!--Start Jacket Customizer-->
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
                            <?php echo $get_sub_cat[0]['subcat_name']; ?>
                        </h1>
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumbs list-inline pull-right">
                                <li><a href="<?php echo $homeurl;?>">Home</a>
                                </li>
                                <!--
                            -->
                                <li><a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['category_name'])); ?>/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/"><?php echo $get_sub_cat[0]['subcat_name']; ?></a></li>
                                <!--
                            -->
                                <li>Customize</li>
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
                              <form method="post" class="garment_form" action="<?php echo $homeurl;?>includes/action/action.php" id="garment_form_6976">
                                <input type="hidden" name="type" value="jacket">
                                <input type="hidden" name="action" value="<?php echo $action;?>">
                                <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                                <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
                                <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
                                <div id="garment_loading_6976" class="garment_loading">
                                  <div class="icon-loading">
                                  </div>
                                </div>
                                
                                <nav class="garment_nav">
                                  <div class="row">
                                    <div class="col-xs-7">
                                      <ul class="nav nav-tabs">
                                        <li>
                                          <a href="#config" class="tab">
                                            Style
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#fabric" class="tab">
                                            Fabric
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#extra" class="tab">
                                            Accents
                                          </a>
                                        </li>
                                      </ul>

                                    
                                        <input type="hidden" name="garment_price">
                                        <div class="c-nav cf">
                                          <a href="javascript:;" class="step_next btn btn-default pull-right">NEXT STEP</a>
                                          <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
                                          <span  class="garment_price btn btn-default pull-right">$<?php echo $price;?></span>
                                        </div>
                                  </div>
                                  </div>
                                </nav>
                                
                                <div class="garment_container" style="min-height: 1150px">
                                  <div class="garment_blocks">
                                    <div class="garment_block garment_block_config">
                                      <div class="config_block config_block_woman_jacket" data-block="woman_jacket">
                                        <div class="config_block_title">
                                        </div>
                                        <div class="config_field jacket_fit">
                                          <div class="box_title">
                                            FIT(WAISTED):
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_fit" <?php if($jacketfit[1]=="baggy"){?> checked <?php }?> value="baggy"/>
                                                Classic
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_fit" value="slim" <?php if($jacketfit[1]=="slim"){?> checked <?php } else if($jacketfit[1]==""){?> checked <?php }?>/>
                                                Slim fit
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_style">
                                          <div class="box_title">
                                            LOOK:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_style" value="simple" <?php if($look[1]=="simple"){?> checked <?php } else if($look[1]==""){?> checked <?php }?>/>
                                                Single breasted
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_style" value="crossed" <?php if($look[1]=="crossed"){?> checked <?php }?> />
                                                Double breasted
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_style" value="no_flaps" <?php if($look[1]=="no_flaps"){?> checked <?php }?> />
                                                Without lapels
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_style_lapel">
                                          <div class="box_title">
                                            LAPEL STYLE:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_style_lapel_standard.jpg" alt="Notch"/>
                                                <input type="radio" name="jacket_style_lapel" value="standard" <?php if($lapelstyle[1]=="standard"){?> checked <?php }?> />
                                                Notch
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_style_lapel_peak.jpg" alt="Peak"/>
                                                <input type="radio" name="jacket_style_lapel" value="peak" <?php if($lapelstyle[1]=="peak"){?> checked <?php } else if($lapelstyle[1]==""){?> checked <?php }?> />
                                                Peak
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_style_lapel_round.jpg" alt="Rounded"/>
                                                <input type="radio" name="jacket_style_lapel" value="round" <?php if($lapelstyle[1]=="round"){?> checked <?php }?> />
                                                Rounded
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_wide_lapel">
                                          <div class="box_title">
                                            LAPEL WIDTH:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_wide_lapel" value="standard" <?php if($lapelwidth[1]=="standard"){?> checked <?php } else if($lapelwidth[1]==""){?> checked <?php }?> />
                                                Standard
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_wide_lapel" value="width" <?php if($lapelwidth[1]=="width"){?> checked <?php }?> />
                                                Wide
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_buttons">
                                          <div class="box_title">
                                            NUMBER OF BUTTONS:
                                          </div>
                                          <div class="clearfix"></div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_buttons" value="1" <?php if($buttons[1]=="1"){?> checked <?php }?> />
                                                1
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_buttons" value="2" <?php if($buttons[1]=="2"){?> checked <?php } else if($buttons[1]==""){?> checked <?php }?> />
                                                2
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_buttons" value="3" <?php if($buttons[1]=="3"){?> checked <?php }?> />
                                                3
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_buttons" value="4" <?php if($buttons[1]=="4"){?> checked <?php }?> />
                                                4
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_buttons" value="6" <?php if($buttons[1]=="6"){?> checked <?php }?> />
                                                6
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_length">
                                          <div class="box_title">
                                            LENGTH:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_length" value="short" <?php  if($length[1]=="short"){?> checked <?php }?> />
                                                Short
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_length" value="long" <?php if($length[1]=="long"){?> checked <?php } else if($length[1]==""){?> checked <?php }?> />
                                                Long
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_breast_pocket">
                                          <div class="box_title">
                                            CHEST POCKET:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer" icon-fixed="x">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_breast_pocket" value="yes" <?php if($chestpocket[1]=="yes"){?> checked <?php } else if($chestpocket[1]==""){?> checked <?php }?>/>
                                                Yes
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_breast_pocket" value="no" <?php  if($chestpocket[1]=="no"){?> checked <?php }?> />
                                                No
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_hip_pockets">
                                          <div class="box_title">
                                            POCKET STYLE:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer" icon-fixed="d">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_no.jpg" alt="No pockets"/>
                                                <input type="radio" name="jacket_hip_pockets" value="no" <?php  if($pocketstyle[1]=="no"){?> checked <?php }?> />
                                                No pockets
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_with_flap.jpg" alt="With flap"/>
                                                <input type="radio" name="jacket_hip_pockets" value="with_flap" <?php if($pocketstyle[1]=="with_flap"){?> checked <?php } else if($pocketstyle[1]==""){?> checked <?php }?> />
                                                With flap
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_diagonal_flap.jpg" alt="Slanted flap"/>
                                                <input type="radio" name="jacket_hip_pockets" value="diagonal_flap" <?php  if($pocketstyle[1]=="diagonal_flap"){?> checked <?php }?> />
                                                Slanted flap
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_double_live.jpg" alt="Double welt"/>
                                                <input type="radio" name="jacket_hip_pockets" value="double_live" <?php  if($pocketstyle[1]=="double_live"){?> checked <?php }?> />
                                                Double welt
                                              </label>
                                            </div>
                                            <div style="display: block; float: left;">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_diagonal_double_live.jpg" alt="Slanted double welt"/>
                                                <input type="radio" name="jacket_hip_pockets" value="diagonal_double_live" <?php  if($pocketstyle[1]=="diagonal_double_live"){?> checked <?php }?> />
                                                Slanted double welt
                                              </label>
                                              <!--<label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_patched.jpg" alt="Patched"/>
                                                <input type="radio" name="jacket_hip_pockets" value="patched"/>
                                                Patched
                                              </label>-->
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_sleeves">
                                          <div class="box_title">
                                            SLEEVES:
                                          </div>
                                          <div class="clearfix"></div>
                                          <div class="box_opt box_opt_image mobile_layer" icon-fixed="T">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_sleeves_no.jpg" alt="No buttons"/>
                                                <input type="radio" name="jacket_sleeves" value="no" <?php  if($pocketstyle[1]=="diagonal_double_live"){?> checked <?php }?> />
                                                No buttons
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_sleeves_2_buttons.jpg" alt="2 Buttons"/>
                                                <input type="radio" name="jacket_sleeves" value="2_buttons" <?php if($pocketstyle[1]=="with_flap"){?> checked <?php } else if($pocketstyle[1]==""){?> checked <?php }?> />
                                                2 Buttons
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_sleeves_3_buttons.jpg" alt="3 Buttons"/>
                                                <input type="radio" name="jacket_sleeves" value="3_buttons" <?php  if($pocketstyle[1]=="diagonal_double_live"){?> checked <?php }?> />
                                                3 Buttons
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_finishing">
                                          <div class="box_title">
                                            HEMLINE:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_finishing_open.jpg" alt="Cutaway"/>
                                                <input type="radio" name="jacket_finishing" value="open" <?php  if($hemline[1]=="open"){?> checked <?php }?> />
                                                Cutaway
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_finishing_straight.jpg" alt="Straight"/>
                                                <input type="radio" name="jacket_finishing" value="straight" <?php  if($hemline[1]=="straight"){?> checked <?php }?> />
                                                Straight
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_finishing_rounded.jpg" alt="Rounded"/>
                                                <input type="radio" name="jacket_finishing" value="rounded" <?php if($hemline[1]=="rounded"){?> checked <?php } else if($hemline[1]==""){?> checked <?php }?> />
                                                Rounded
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_back_style">
                                          <div class="box_title">
                                            BACK STYLE:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_back_style_uncut.jpg" alt="Ventless"/>
                                                <input type="radio" name="jacket_back_style" value="uncut" <?php if($backstyle[1]=="uncut"){?> checked <?php } else if($backstyle[1]==""){?> checked <?php }?>/>
                                                Ventless
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_back_style_1_cut.jpg" alt="Center vent"/>
                                                <input type="radio" name="jacket_back_style" value="1_cut" <?php  if($backstyle[1]=="1_cut"){?> checked <?php }?> />
                                                Center vent
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_back_style_2_cut.jpg" alt="Side vents"/>
                                                <input type="radio" name="jacket_back_style" value="2_cut" <?php  if($backstyle[1]=="2_cut"){?> checked <?php }?> />
                                                Side vents
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="garment_block garment_block_fabric">
                                    <div class="fabric_block fabric_block_woman_jacket" data-block-name="woman_jacket">
                                        <div class="fabric_block_title">woman_jacket</div>
                                            <div class="fabric_preview fabric_preview_woman_jacket" style="display:block;">
                                               <div class="infobar" style="width:650px">
                                                    <span class="title fabric_main_title"><?php echo $fab_title;?></span>
                                                    <span class="composition fabric_main_composition"><?php echo strip_tags($fab_desc); ?></span>
                                                </div>
                                                <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img src="<?php echo $homeurl.$fab_img;?>" style="width:650px" class="fabric_main_image"></a>
                                            </div>
                                            <input type="hidden" class="fabric_input required" name="woman_jacket" data-block-name="woman_jacket" value="<?php echo $_SESSION['fabID']; ?>" />
                                            <div class="fabric_filters">
                                                <input type="hidden" name="fabric_block" value="woman_jacket" />
                                            </div>
                                            <div class="fabric_list loaded">
                                            <?php $fab=$site->get_fabrics('',$fabric_list);
                                                    //print_r($fab);
                                                    foreach ($fab as $key => $value) {
                                                    ?>
                                                <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fabid==$fab[$key]['f_rand']){?> current <?php }?>">
                                                    <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
                                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="<?php echo $fab[$key]['fab_name'];?>">
                                                    </a>
                                                    <div class="price price_part">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                                    <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                                    
                                                    <div class="composition"><?php echo strip_tags($fab[$key]['fab_name']); ?></div>
                                                </div>
                                                <?php }?>
                                               <!-- <div class="fabric_thumb fabric_954 <?php if($fabid=="954"){?> current <?php }?>">
                                                    <a href="javascript:void(0);" class="select " rel="954">
                                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl;?>assets/dimg/fabric/suit/954_normal.jpg" alt="Royalty">
                                                    </a>
                                                    <div class="title fabric_title">Royalty</div>
                                                    <div class="price price_part">+18$</div>
                                                    <div class="composition"></div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="garment_block garment_block_extra">
                                      <div class="extra_block extra_block_woman_jacket" data-block-name="woman_jacket">
                                        <div class="extra_container jacket_lining extra_container_lining active" data-extra-name="jacket_lining" data-extra-type="lining" info-icon="R">
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Customize Lining
                                          </div>
                                          <div class="extra_content" style="display: block;">
                                            <div class="extra_field">
                                              <input type="hidden" name="jacket_lining" class="id jacket_lining" value="<?php echo $lining[1];?>"/>
                                                <div class="lining_slider_contents" data-name="jacket_lining">
                                                  <div class="fabric_thumb lining_thumb lining_121 <?php if($lining[1]=="121"){?> current <?php }?>" value="121">
                                                    <a href="javascript:void(0);" data-id="121" class="extra_select">
                                                     <img class="b-lazy image b-loaded" src="<?php echo $homeurl;?>assets/dimg/lining/default/121_normal.jpg" alt="">
                                                    </a>
                                                    <div class="price">9.95$</div>
                                                    <div class="title">Paris</div>
                                                 </div>
                                                 <div class="fabric_thumb lining_thumb lining_96 <?php if($lining[1]=="96"){?> current <?php }?>" value="96">
                                                   <a href="javascript:void(0);" data-id="96" class="extra_select">
                                                     <img class="b-lazy image b-loaded" src="<?php echo $homeurl;?>assets/dimg/lining/default/96_normal.jpg" alt="">
                                                   </a>
                                                   <div class="price">14.95$</div>
                                                   <div class="title">Cergy</div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_initials extra_container_initials" data-extra-name="jacket_initials" data-extra-type="initials" info-icon="J">
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Add monogram
                                          </div>
                                          <div class="extra_content">
                                            <input type="hidden" class="initials_price" name="initials_price" value="9.95">
                                            <div class="extra_field extra_field_initials_text required">
                                              <div class="box_title">
                                                WRITE HERE:
                                              </div>
                                              <div class="box_opt">
                                                <div class="box_opt_fix">
                                                  <input value="<?php echo $text[1];?>" type="text" name="initials_text" class="text initials_text" placeholder="Type your initials" maxlength="10">
                                                  <span class="extra_price">
                                                    (+ 9.95$ )
                                                  </span>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field extra_field_initials_fonts required">
                                              <div class="box_title">
                                                FONT:
                                              </div>
                                              <div class="box_opt">
                                                <div class="box_opt_fix">
                                                  <label class="t4l_radio garamond">
                                                    <input <?php if($font[1]=="garamond"){?> checked <?php }?> type="radio" class="font" name="initials_font" value="garamond">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/initials/garamond.png" alt="Garamond"/>
                                                  </label>
                                                  <label class="t4l_radio harrington">
                                                    <input <?php if($font[1]=="harrington"){?> checked <?php }?> type="radio" class="font" name="initials_font" value="harrington">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/initials/harrington.png" alt="Harrington"/>
                                                  </label>
                                                  <label class="t4l_radio times">
                                                    <input <?php if($font[1]=="garamond"){?> checked <?php }?> type="radio" class="font" name="initials_font" value="times">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/initials/times.png" alt="Times new Roman"/>
                                                  </label>
                                                  <label class="t4l_radio arial">
                                                    <input <?php if($font[1]=="arial"){?> checked <?php }?> type="radio" class="font" name="initials_font" value="arial">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/initials/arial.png" alt="Arial"/>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field extra_field_initials_color required">
                                              <div class="box_title">
                                                INITIALS COLOR:
                                              </div>
                                              <div class="box_opt">
                                                <div class="box_opt_fix">
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ffcf10"){?> checked1 <?php }?>">
                                                    <input  <?php if($color[1]=="ffcf10"){?> checked <?php }?> type="radio" class="color" data-color="ffcf10" name="initials_color" value="ffcf10">
                                                    
                                                    <span class="thread_color" style="background: #ffcf10">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="4477cf"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="4477cf"){?> checked <?php }?> type="radio" class="color" data-color="4477cf" name="initials_color" value="4477cf">
                                                    
                                                    <span class="thread_color" style="background: #4477cf">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ffffff"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="ffffff"){?> checked <?php }?> type="radio" class="color" data-color="ffffff" name="initials_color" value="ffffff">
                                                    
                                                    <span class="thread_color" style="background: #ffffff">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="a48239"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="a48239"){?> checked <?php }?> type="radio" class="color" data-color="a48239" name="initials_color" value="a48239">
                                                    
                                                    <span class="thread_color" style="background: #a48239">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="4d020d"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="4d020d"){?> checked <?php }?> type="radio" class="color" data-color="4d020d" name="initials_color" value="4d020d">
                                                    
                                                    <span class="thread_color" style="background: #4d020d">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="b3b3b3"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="b3b3b3"){?> checked <?php }?> type="radio" class="color"
                                                     data-color="b3b3b3" name="initials_color" value="b3b3b3">
                                                    
                                                    <span class="thread_color" style="background: #b3b3b3">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="331b00"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="331b00"){?> checked <?php }?> type="radio" 
                                                    class="color" data-color="331b00" name="initials_color" value="331b00">
                                                    
                                                    <span class="thread_color" style="background: #331b00">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="000000"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="000000"){?> checked <?php }?> type="radio" 
                                                    class="color" data-color="000000" name="initials_color" value="000000">
                                                    
                                                    <span class="thread_color" style="background: #000000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="b80e58"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="b80e58"){?> checked <?php }?> type="radio" 
                                                    class="color" data-color="b80e58" name="initials_color" value="b80e58">
                                                    
                                                    <span class="thread_color" style="background: #b80e58">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="0ba133"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="0ba133"){?> checked <?php }?> type="radio" 
                                                    class="color" data-color="0ba133" name="initials_color" value="0ba133">
                                                    
                                                    <span class="thread_color" style="background: #0ba133">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="c20000"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="c20000"){?> checked <?php }?> type="radio" 
                                                    class="color" data-color="c20000" name="initials_color" value="c20000">
                                                    
                                                    <span class="thread_color" style="background: #c20000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color <?php if($color[1]=="ff7912"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="ff7912"){?> checked <?php }?> type="radio" 
                                                    class="color" data-color="ff7912" name="initials_color" value="ff7912">
                                                    
                                                    <span class="thread_color" style="background: #ff7912">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color <?php if($color[1]=="5f1970"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="5f1970"){?> checked <?php }?> type="radio" 
                                                    class="color" data-color="5f1970" name="initials_color" value="5f1970">
                                                    
                                                    <span class="thread_color" style="background: #5f1970">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b8f2f2"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="b8f2f2"){?> checked <?php }?> type="radio" 
                                                    class="color" data-color="b8f2f2" name="initials_color" value="b8f2f2">
                                                    
                                                    <span class="thread_color" style="background: #b8f2f2">
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_neck extra_container_colors" data-extra-name="jacket_neck" data-extra-type="colors" info-icon="o" style="visibility:hidden;">
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Neck lining
                                          </div>
                                          <div class="extra_content">
                                            <div class="extra_field required extra_field_image contrast" data-field-name="contrast">
                                              <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                  <label class="option option_image t4l_radio">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/jacket_neck/contrast/xdefault.jpg.pagespeed.ic.Y3fCT6FJnV.webp" alt="By default"/>
                                                    <input type="radio" name="jacket_neck[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                    <span class="name">
                                                      By default
                                                    </span>
                                                  </label>
                                                  <label class="option option_image t4l_radio">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/jacket_neck/contrast/xcustom.jpg.pagespeed.ic.2t8bILqRoq.webp" alt="Custom color"/>
                                                    <input type="radio" name="jacket_neck[contrast]" value="custom" data-field-name="contrast" data-price="3.95">
                                                    <span class="name">
                                                      Custom color
                                                    </span>
                                                    <span class="price">
                                                      +3,95€
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field required extra_field_neck_lining color" data-field-name="color">
                                              <input type="hidden" name="jacket_neck[color]" value="">
                                              <div class="fabric_thumb thread_thumb " data-id="2">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #d89f6b">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="3">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #ea1c1e">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="5">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #b2a995">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="4">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #212534">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="6">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #34322c">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="1">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #e7e7e7">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="7">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #1f1f1f">
                                                  </span>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_patches extra_container_colors" data-extra-name="jacket_patches" data-extra-type="colors" info-icon="q" style="visibility:hidden;">
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Add elbow patches 
                                          </div>
                                          <div class="extra_content">
                                            <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
                                              <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                  <label class="option option_radio t4l_radio">
                                                    <input type="radio" name="jacket_patches[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                    <span class="name">
                                                      By default
                                                    </span>
                                                  </label>
                                                  <label class="option option_radio t4l_radio">
                                                    <input type="radio" name="jacket_patches[contrast]" value="custom" data-field-name="contrast" data-price="12.95">
                                                    <span class="name">
                                                      Custom color
                                                    </span>
                                                    <span class="price">
                                                      +12,95€
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field required extra_field_patches color" data-field-name="color">
                                              <input type="hidden" name="jacket_patches[color]" value="">
                                              <div class="fabric_thumb patch_thumb " data-id="55">
                                                <a href="javascript:;">
                                                  <span class="image" style="background:url(/dimg/patches/default/x55_thumb.jpg.pagespeed.ic.WlGofGkARu.webp)">
                                                  </span>
                                                </a>
                                                <div class="title">
                                                  Black
                                                </div>
                                              </div>
                                              <div class="fabric_thumb patch_thumb " data-id="56">
                                                <a href="javascript:;">
                                                  <span class="image" style="background:url(/dimg/patches/default/x56_thumb.jpg.pagespeed.ic.Bx0VBdyqJ2.webp)">
                                                  </span>
                                                </a>
                                                <div class="title">
                                                  Brown
                                                </div>
                                              </div>
                                              <div class="fabric_thumb patch_thumb " data-id="57">
                                                <a href="javascript:;">
                                                  <span class="image" style="background:url(/dimg/patches/default/x57_thumb.jpg.pagespeed.ic.fJalN9Ak9s.webp)">
                                                  </span>
                                                </a>
                                                <div class="title">
                                                  Beige
                                                </div>
                                              </div>
                                              <div class="fabric_thumb patch_thumb " data-id="58">
                                                <a href="javascript:;">
                                                  <span class="image" style="background:url(/dimg/patches/default/x58_thumb.jpg.pagespeed.ic.A1Zi5CpLrP.webp)">
                                                  </span>
                                                </a>
                                                <div class="title">
                                                  Brown-Grey
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_metal_button extra_container_colors" data-extra-name="jacket_metal_button" data-extra-type="colors" info-icon="N" style="visibility:hidden;">
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Type of Buttons
                                          </div>
                                          <div class="extra_content">
                                            <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
                                              <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                  <label class="option option_radio t4l_radio">
                                                    <input type="radio" name="jacket_metal_button[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                    <span class="name">
                                                      By default
                                                    </span>
                                                  </label>
                                                  <label class="option option_radio t4l_radio">
                                                    <input type="radio" name="jacket_metal_button[contrast]" value="custom" data-field-name="contrast" data-price="10.9">
                                                    <span class="name">
                                                      Custom color
                                                    </span>
                                                    <span class="price">
                                                      +10,9€
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field required extra_field_metal_button type" data-field-name="type">
                                              <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                  <label class="option option_image t4l_radio metal_b">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/jacket_metal_button/type/x50.jpg.pagespeed.ic.39MQArwCLo.webp" alt="Custom color"/>
                                                    <input type="radio" name="jacket_metal_button[type]" value="50" data-field-name="type" data-price="10.9">
                                                  </label>
                                                  <label class="option option_image t4l_radio metal_b">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/jacket_metal_button/type/x51.jpg.pagespeed.ic.1pYg9RA8zS.webp" alt="Custom color"/>
                                                    <input type="radio" name="jacket_metal_button[type]" value="51" data-field-name="type" data-price="10.9">
                                                  </label>
                                                  <label class="option option_image t4l_radio metal_b">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/jacket_metal_button/type/x52.jpg.pagespeed.ic.zu8Aw71J0r.webp" alt="Custom color"/>
                                                    <input type="radio" name="jacket_metal_button[type]" value="52" data-field-name="type" data-price="10.9">
                                                  </label>
                                                  <label class="option option_image t4l_radio metal_b">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/jacket_metal_button/type/x53.jpg.pagespeed.ic.tn4dyPq3A3.webp" alt="Custom color"/>
                                                    <input type="radio" name="jacket_metal_button[type]" value="53" data-field-name="type" data-price="10.9">
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_threads extra_container_threads" data-extra-name="jacket_threads" data-extra-type="threads" info-icon="V" style="visibility:hidden;">
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Add colored button threads
                                          </div>
                                          <div class="extra_content">
                                            <div class="extra_field extra_field_radio contrast" data-field-name="contrast">
                                              <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                  <label class="option option_radio t4l_radio">
                                                    
                                                    <input type="radio" name="jacket_threads[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                    <span class="name">
                                                      By default
                                                    </span>
                                                  </label>
                                                  <label class="option option_radio t4l_radio">
                                                    
                                                    <input type="radio" name="jacket_threads[contrast]" value="all" data-field-name="contrast" data-price="4.5">
                                                    <span class="name">
                                                      All
                                                    </span>
                                                    <span class="price">
                                                      (+4,5€)
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field color required extra_field_threads threads" data-field-name="threads">
                                              <div class="box_title">
                                                BUTTON THREADS:
                                              </div>
                                              <div class="box_opt">
                                                <div class="box_opt_fix">
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ffcf10" name="jacket_threads[threads][color]" data-field-name="threads-color" value="9">
                                                    
                                                    <span class="thread_color" style="background: #ffcf10">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="4477cf" name="jacket_threads[threads][color]" data-field-name="threads-color" value="11">
                                                    
                                                    <span class="thread_color" style="background: #4477cf">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ffffff" name="jacket_threads[threads][color]" data-field-name="threads-color" value="12">
                                                    
                                                    <span class="thread_color" style="background: #ffffff">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="a48239" name="jacket_threads[threads][color]" data-field-name="threads-color" value="13">
                                                    
                                                    <span class="thread_color" style="background: #a48239">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="4d020d" name="jacket_threads[threads][color]" data-field-name="threads-color" value="14">
                                                    
                                                    <span class="thread_color" style="background: #4d020d">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b3b3b3" name="jacket_threads[threads][color]" data-field-name="threads-color" value="15">
                                                    
                                                    <span class="thread_color" style="background: #b3b3b3">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="331b00" name="jacket_threads[threads][color]" data-field-name="threads-color" value="16">
                                                    
                                                    <span class="thread_color" style="background: #331b00">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="000000" name="jacket_threads[threads][color]" data-field-name="threads-color" value="17">
                                                    
                                                    <span class="thread_color" style="background: #000000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b80e58" name="jacket_threads[threads][color]" data-field-name="threads-color" value="18">
                                                    
                                                    <span class="thread_color" style="background: #b80e58">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="0ba133" name="jacket_threads[threads][color]" data-field-name="threads-color" value="19">
                                                    
                                                    <span class="thread_color" style="background: #0ba133">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="c20000" name="jacket_threads[threads][color]" data-field-name="threads-color" value="25">
                                                    
                                                    <span class="thread_color" style="background: #c20000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ff7912" name="jacket_threads[threads][color]" data-field-name="threads-color" value="31">
                                                    
                                                    <span class="thread_color" style="background: #ff7912">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="5f1970" name="jacket_threads[threads][color]" data-field-name="threads-color" value="32">
                                                    
                                                    <span class="thread_color" style="background: #5f1970">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b8f2f2" name="jacket_threads[threads][color]" data-field-name="threads-color" value="33">
                                                    
                                                    <span class="thread_color" style="background: #b8f2f2">
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field color required extra_field_holes holes" data-field-name="holes">
                                              <div class="box_title">
                                                BUTTON HOLES:
                                              </div>
                                              <div class="box_opt">
                                                <div class="box_opt_fix">
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ffcf10" name="jacket_threads[holes][color]" data-field-name="holes-color" value="9">
                                                    
                                                    <span class="thread_color" style="background: #ffcf10">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="4477cf" name="jacket_threads[holes][color]" data-field-name="holes-color" value="11">
                                                    
                                                    <span class="thread_color" style="background: #4477cf">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ffffff" name="jacket_threads[holes][color]" data-field-name="holes-color" value="12">
                                                    
                                                    <span class="thread_color" style="background: #ffffff">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="a48239" name="jacket_threads[holes][color]" data-field-name="holes-color" value="13">
                                                    
                                                    <span class="thread_color" style="background: #a48239">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="4d020d" name="jacket_threads[holes][color]" data-field-name="holes-color" value="14">
                                                    
                                                    <span class="thread_color" style="background: #4d020d">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b3b3b3" name="jacket_threads[holes][color]" data-field-name="holes-color" value="15">
                                                    
                                                    <span class="thread_color" style="background: #b3b3b3">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="331b00" name="jacket_threads[holes][color]" data-field-name="holes-color" value="16">
                                                    
                                                    <span class="thread_color" style="background: #331b00">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="000000" name="jacket_threads[holes][color]" data-field-name="holes-color" value="17">
                                                    
                                                    <span class="thread_color" style="background: #000000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b80e58" name="jacket_threads[holes][color]" data-field-name="holes-color" value="18">
                                                    
                                                    <span class="thread_color" style="background: #b80e58">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="0ba133" name="jacket_threads[holes][color]" data-field-name="holes-color" value="19">
                                                    
                                                    <span class="thread_color" style="background: #0ba133">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="c20000" name="jacket_threads[holes][color]" data-field-name="holes-color" value="25">
                                                    
                                                    <span class="thread_color" style="background: #c20000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ff7912" name="jacket_threads[holes][color]" data-field-name="holes-color" value="31">
                                                    
                                                    <span class="thread_color" style="background: #ff7912">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="5f1970" name="jacket_threads[holes][color]" data-field-name="holes-color" value="32">
                                                    
                                                    <span class="thread_color" style="background: #5f1970">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b8f2f2" name="jacket_threads[holes][color]" data-field-name="holes-color" value="33">
                                                    
                                                    <span class="thread_color" style="background: #b8f2f2">
                                                    </span>
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
                                      <div class="controls">
                                        <a href="javascript:;" class="icon zoom in" data-icon="O">
                                          <span class="h">
                                            ZOOM
                                          </span>
                                        </a>
                                        <a href="javascript:;" class="icon zoom out" data-icon="P">
                                          <span class="h">
                                            ZOOM
                                          </span>
                                        </a>
                                        
                                      </div>
                                      <div class="render3d resize_fix" style="margin-top: -40px;" resize_fix="margin-top: -40px; height: ">
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
        </section>

        <div class="clearfix visible-xs visible-sm"></div>




<!--End Jacket Customizer-->
<?php }
else if($id==12)
{
    if(isset($_POST['orderid']))
{
    $oid=mysqli_real_escape_string($con,$_POST['orderid']);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);
    //$style=explode(":",$r['om_style']);
    $jacketfit=explode(":",$style[0]);$jacketlook=explode(":",$style[1]);$lapelstyle=explode(":",$style[2]);
    $lapelwidth=explode(":",$style[3]);$jacketbuttons=explode(":",$style[4]);$jacketlength=explode(":",$style[5]);
    $chestpocket=explode(":",$style[6]);$pocketstyle=explode(":",$style[7]);$sleeves=explode(":",$style[8]);
    $hemline=explode(":",$style[9]);$backstyle=explode(":",$style[10]);
    $pantfit=explode(":",$style[11]);$pantlength=explode(":",$style[12]);$pantfast=explode(":",$style[13]);
    $pantpleat=explode(":",$style[14]);$beltloops=explode(":",$style[15]);$crotch=explode(":",$style[16]);
    $waistband=explode(":",$style[17]);$pantpocket=explode(":",$style[18]);$pantbackpocket=explode(":",$style[19]);
    $pantcuffs=explode(":",$style[20]);$showjacket=explode(":",trim($style[21],"}"));
    
    $fabid = explode("{",$r['fabid']);
    $fabid = explode(",",$fabid[1]);
    $fabid1 = explode(":",$fabid[0]);
    $fabid2 = explode(":",$fabid[1]);

    $fabid=$fabid1[1];
    $fabid1=trim($fabid2[1],"}");

    $o_id=$r['om_id'];$order_id=$r['order_id'];$price=$r['om_price'];
    $accents=explode("{",$r['om_accents']);
    $accents=explode(",",$accents[1]);$lining=explode(":",$accents[0]);$text=explode(":",$accents[1]);
    $font=explode(":",$accents[2]);$color=explode(":",trim($accents[3],"}"));
    $action="update";


    $f_rand=mysqli_query($con,"select * from fabric_master where fab_rand IN($fabid)");
    if(mysqli_num_rows($f_rand) > 0) {
        while($fr=mysqli_fetch_array($f_rand)) {
            $f_id[]=$fr['fab_rand'];
            $f_title[]=$fr['fab_name'];
            $f_desc[]=$fr['fab_desc'];
            $f_img[]=$fr['fab_img'];
    }
  }

  $fab_title=$f_title[0];
   $fab_title1=$f_title[1];
   $fab_desc=$f_desc[0];
   $fab_desc1=$f_desc[1];
   $fab_img = $f_img[0];
   $fab_img1 = $f_img[1];
}
else
{
    $jacketfit[1]="";$jacketlook[1]="";$coatstyle[1]="";$lapelstyle[1]="";$lapelwidth[1]="";$jacketbuttons[1]="";
    $jacketlength[1]="";$chestpocket[1]="";$pocketstyle[1]="";$sleeves[1]="";
    $hemline[1]="";$backstyle[1]="";$pantfit[1]="";$pantlength[1]="";
    $pantfast[1]="";$pantpleat[1]="";$beltloops[1]="";$crotch[1]="";
    $waistband[1]="";$pantpocket[1]="";$pantbackpocket[1]="";$pantcuffs[1]="";
    $showjacket[1]="";
    $fabid=$f_id1[0];$fabid1=$f_id1[1];$coatlining[1]="";$coattext[1]="";$coatfont[1]="";$coatcolor[1]="";
    $action="save";$o_id="";$coatfastening[1]="";$order_id="";$price=$price;
}
    $_SESSION['fabID']=$fabid;
    $_SESSION['fabID1']=$fabid1;
?>
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
                            <?php echo $get_sub_cat[0]['subcat_name']; ?>
                        </h1>
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumbs list-inline pull-right">
                                <li><a href="<?php echo $homeurl;?>">Home</a>
                                </li>
                                <!--
                            -->
                        <li><a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['category_name'])); ?>/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/"><?php echo $get_sub_cat[0]['subcat_name']; ?></a></li>

                                <!--
                            -->
                                <li>Customize</li>
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
                                <form method="post" class="garment_form business_suit_cust cust" action="<?php echo $homeurl;?>includes/action/action.php" id="garment_form_7348">
                                    <input type="hidden" name="type" value="buisness_suits">
                                     <input type="hidden" name="action" value="<?php echo $action;?>">
                                    <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                                    <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
                                    <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
                                <div id="garment_loading_7348" class="garment_loading">
                                  <div class="icon-loading">
                                  </div>
                                </div>
                                
                              
                                
                                
                            <nav class="garment_nav">
                                  <div class="row">
                              <div class="col-xs-7">
                                      <ul class="nav nav-tabs">
                                        <li>
                                          <a href="#config" class="tab">
                                            Style
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#fabric" class="tab">
                                            Fabric
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#extra" class="tab">
                                            Accents
                                          </a>
                                        </li>
                                      </ul>
                              
                               
                                        <input type="hidden" name="garment_price">
                                        <div class="c-nav cf">
                                                <a href="javascript:;" class="step_next btn btn-default pull-right">NEXT STEP</a>
                                                <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
                                                <span  class="garment_price btn btn-default pull-right">$<?php echo $price;?></span>
                                        </div>
                                        </div>
                                  </div>
                                </nav>
                            
                                <div class="garment_container" style="min-height: 1300px">
                                  <div class="garment_blocks">
                                    <div class="garment_block garment_block_config">
                                      <div class="config_block config_block_woman_jacket" data-block="woman_jacket">
                                        <div class="config_block_title" style="display:none;">
                                          Jacket
                                        </div>
                                        <div class="config_field jacket_fit">
                                          <div class="box_title">
                                            FIT(WAISTED):
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_fit" value="baggy"
                                                <?php if($jacketfit[1]=="baggy"){?> checked="checked" <?php }?> />
                                                Classic
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_fit" value="slim"
                                                 <?php if($jacketfit[1]=="slim"){?> checked="checked" <?php }
                                                elseif ($jacketfit[1]=="") {?> checked="checked" <?php }?> />
                                                Slim fit
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_style">
                                          <div class="box_title">
                                            LOOK:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_style" value="simple" 
                                                <?php if($jacketlook[1]=="simple"){?> checked="checked" <?php }
                                                elseif ($jacketlook[1]=="") {?> checked="checked" <?php }?>/>
                                                Single breasted
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_style" value="crossed" 
                                                <?php if($jacketlook[1]=="crossed"){?> checked="checked" <?php }?>/>
                                                Double breasted
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_style" value="no_flaps" 
                                                <?php if($jacketlook[1]=="no_flaps"){?> checked="checked" <?php }?> />
                                                Without lapels
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_style_lapel">
                                          <div class="box_title">
                                            LAPEL STYLE:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_style_lapel_standard.jpg" alt="Notch"/>
                                                <input type="radio" name="jacket_style_lapel" value="standard" 
                                                <?php if($lapelstyle[1]=="standard"){?> checked="checked" <?php }?> />
                                                Notch
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_style_lapel_peak.jpg" alt="Peak"/>
                                                <input type="radio" name="jacket_style_lapel" value="peak"
                                                <?php if($lapelstyle[1]=="peak"){?> checked="checked" <?php }
                                                elseif ($lapelstyle[1]=="") {?> checked="checked" <?php }?>/>
                                                Peak
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_style_lapel_round.jpg" alt="Rounded"/>
                                                <input type="radio" name="jacket_style_lapel" value="round" 
                                                <?php if($lapelstyle[1]=="round"){?> checked="checked" <?php }?> />
                                                Rounded
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_wide_lapel">
                                          <div class="box_title">
                                            LAPEL WIDTH:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_wide_lapel" value="standard" 
                                                <?php if($lapelwidth[1]=="standard"){?> checked="checked" <?php }
                                                elseif ($lapelwidth[1]=="") {?> checked="checked" <?php }?>/>
                                                Standard
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_wide_lapel" value="width" 
                                                <?php if($lapelwidth[1]=="width"){?> checked="checked" <?php }?>/>
                                                Wide
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                         <div class="config_field jacket_buttons">
                                          <div class="box_title">
                                            NUMBER OF BUTTONS:
                                          </div>
                                          <div class="clearfix"></div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_buttons" value="1" 
                                                <?php if($jacketbuttons[1]=="1"){?> checked="checked" <?php }?>/>
                                                1
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_buttons" value="2" 
                                                 <?php if($jacketbuttons[1]=="2"){?> checked="checked" <?php }
                                                elseif ($jacketbuttons[1]=="") {?> checked="checked" <?php }?>/>
                                                2
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_buttons" value="3"
                                                <?php if($jacketbuttons[1]=="3"){?> checked="checked" <?php }?>/>
                                                3
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_buttons" value="4"
                                                <?php if($jacketbuttons[1]=="4"){?> checked="checked" <?php }?>/>
                                                4
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_buttons" value="6"
                                                <?php if($jacketbuttons[1]=="6"){?> checked="checked" <?php }?>/>
                                                6
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                         <div class="config_field jacket_length">
                                          <div class="box_title">
                                            LENGTH:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_length" value="short" 
                                                <?php if($jacketlength[1]=="short"){?> checked="checked" <?php }?> />
                                                Short
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_length" value="long"
                                                <?php if($jacketlength[1]=="long"){?> checked="checked" <?php }
                                                elseif ($jacketlength[1]=="") {?> checked="checked" <?php }?> />
                                                Long
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_breast_pocket">
                                          <div class="box_title">
                                            CHEST POCKET:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer" icon-fixed="x">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_breast_pocket" value="yes"
                                                <?php if($chestpocket[1]=="yes"){?> checked="checked" <?php }
                                                elseif ($chestpocket[1]=="") {?> checked="checked" <?php }?> />
                                                Yes
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="jacket_breast_pocket" value="no" 
                                                 <?php if($chestpocket[1]=="no"){?> checked="checked" <?php }?> />
                                                No
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_hip_pockets">
                                          <div class="box_title">
                                            POCKET STYLE:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer" icon-fixed="d">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_no.jpg" alt="No pockets"/>
                                                <input type="radio" name="jacket_hip_pockets" value="no" 
                                        <?php if($pocketstyle[1]=="no"){?> checked="checked" <?php }?> />
                                                No pockets
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_with_flap.jpg" alt="With flap"/>
                                                <input type="radio" name="jacket_hip_pockets" value="with_flap" 
                                                <?php if($pocketstyle[1]=="with_flap"){?> checked="checked" <?php }
                                                elseif ($pocketstyle[1]=="") {?> checked="checked" <?php }?>/>
                                                With flap
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_diagonal_flap.jpg" alt="Slanted flap"/>
                                                <input type="radio" name="jacket_hip_pockets" value="diagonal_flap" 
                                                <?php if($pocketstyle[1]=="diagonal_flap"){?> checked="checked" <?php }?> />
                                                Slanted flap
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_double_live.jpg" alt="Double welt"/>
                                                <input type="radio" name="jacket_hip_pockets" value="double_live" 
                                                <?php if($pocketstyle[1]=="double_live"){?> checked="checked" <?php }?> />
                                                Double welt
                                              </label>
                                            </div>
                                            <div style="display: block; float: left;">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_diagonal_double_live.jpg" alt="Slanted double welt"/>
                                                <input type="radio" name="jacket_hip_pockets" 
                                                value="diagonal_double_live" 
                                                <?php if($pocketstyle[1]=="jacket_hip_pockets"){?> checked="checked" <?php }?> />
                                                Slanted double welt
                                              </label>
                                              <!--<label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_hip_pockets_patched.jpg" alt="Patched"/>
                                                <input type="radio" name="jacket_hip_pockets" value="patched"/>
                                                Patched
                                              </label>-->
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_sleeves">
                                          <div class="box_title">
                                            SLEEVES:
                                          </div>
                                          <div class="clearfix"></div>
                                          <div class="box_opt box_opt_image mobile_layer" icon-fixed="T">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_sleeves_no.jpg" alt="No buttons"/>
                                                <input type="radio" name="jacket_sleeves" value="no" 
                                                <?php if($sleeves[1]=="no"){?> checked="checked" <?php }?>/>
                                                No buttons
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_sleeves_2_buttons.jpg" alt="2 Buttons"/>
                                                <input type="radio" name="jacket_sleeves" value="2_buttons" 
                                                <?php if($sleeves[1]=="2_buttons"){?> checked="checked" <?php }
                                                elseif ($sleeves[1]=="") {?> checked="checked" <?php }?> />
                                                2 Buttons
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_sleeves_3_buttons.jpg" alt="3 Buttons"/>
                                                <input type="radio" name="jacket_sleeves" value="3_buttons" 
                                                <?php if($sleeves[1]=="3_buttons"){?> checked="checked" <?php }?> />
                                                3 Buttons
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_finishing">
                                          <div class="box_title">
                                            HEMLINE:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_finishing_open.jpg" alt="Cutaway"/>
                                                <input type="radio" name="jacket_finishing" value="open" 
                                                 <?php if($hemline[1]=="open"){?> checked <?php }?>/>
                                                Cutaway
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_finishing_straight.jpg" alt="Straight"/>
                                                <input type="radio" name="jacket_finishing" value="straight" 
                                                <?php if($hemline[1]=="straight"){?> checked <?php }?>/>
                                                Straight
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_finishing_rounded.jpg" alt="Rounded"/>
                                                <input type="radio" name="jacket_finishing" value="rounded" 
                                                 <?php if($hemline[1]=="rounded"){?> checked="checked" <?php }
                                                elseif ($hemline[1]=="") {?> checked="checked" <?php }?>/>
                                                Rounded
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field jacket_back_style">
                                          <div class="box_title">
                                            BACK STYLE:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_back_style_uncut.jpg" alt="Ventless"/>
                                                <input type="radio" name="jacket_back_style" value="uncut" 
                                                <?php if($backstyle[1]=="uncut"){?> checked="checked" <?php }
                                                elseif ($backstyle[1]=="") {?> checked="checked" <?php }?>/>
                                                Ventless
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_back_style_1_cut.jpg" alt="Center vent"/>
                                                <input type="radio" name="jacket_back_style" value="1_cut"
                                                 <?php if($backstyle[1]=="1_cut"){?> checked <?php }?> />
                                                Center vent
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_jacket/jacket_back_style_2_cut.jpg" alt="Side vents"/>
                                                <input type="radio" name="jacket_back_style" value="2_cut" 
                                                 <?php if($backstyle[1]=="2_cut"){?> checked <?php }?> />
                                                Side vents
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="config_block config_block_woman_pants" data-block="woman_pants">
                                        <div class="config_block_title">
                                          Pants
                                        </div>
                                        <div class="config_field pants_cut">
                                          <div class="box_title">
                                            FIT:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_cut" value="skinny" 
                                               <?php if($pantfit[1]=="skinny"){?> checked="checked" <?php }
                                                elseif ($pantfit[1]=="") {?> checked="checked" <?php }?> />
                                                Slim Fit
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_cut" value="standard" 
                                                <?php if($pantfit[1]=="standard"){?> checked <?php }?>/>
                                                Classic Fit
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_cut" value="loose" 
                                                <?php if($pantfit[1]=="loose"){?> checked <?php }?>/>
                                                Loose Fit
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field pants_length">
                                          <div class="box_title">
                                            LENGTH:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_length" value="long"
                                                 <?php if($pantlength[1]=="long"){?> checked="checked" <?php }
                                                elseif ($pantlength[1]=="") {?> checked="checked" <?php }?> />
                                                Long
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_length" value="ankle"
                                                <?php if($pantlength[1]=="ankle"){?> checked <?php }?>/>
                                                Ankle
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_length" value="bermuda"
                                                <?php if($pantlength[1]=="bermuda"){?> checked <?php }?>/>
                                                Bermuda
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                         <div class="config_field pants_front_closure">
                                          <div class="box_title">
                                            FASTENING:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_closure_center_button.jpg" alt="Standard"/>
                                                <input type="radio" name="pants_front_closure" value="center_button"
                                                <?php if($pantfast[1]=="center_button"){?> checked="checked" <?php }
                                                elseif ($pantfast[1]=="") {?> checked="checked" <?php }?>/>
                                                Standard
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_closure_center_no_button.jpg" alt="No button"/>
                                                <input type="radio" name="pants_front_closure" value="center_no_button" 
                                                <?php if($pantfast[1]=="center_no_button"){?> checked <?php }?>/>
                                                No button
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_closure_moved_no_button.jpg" alt="Displaced: No button"/>
                                                <input type="radio" name="pants_front_closure" value="moved_no_button" 
                                                <?php if($pantfast[1]=="moved_no_button"){?> checked <?php }?>/>
                                                Displaced: No button
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_closure_moved_button.jpg" alt="Displaced"/>
                                                <input type="radio" name="pants_front_closure" value="moved_button" 
                                                <?php if($pantfast[1]=="moved_button"){?> checked <?php }?>/>
                                                Displaced
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_closure_side_zipper.jpg" alt="Zipper"/>
                                                <input type="radio" name="pants_front_closure" value="side_zipper" 
                                                <?php if($pantfast[1]=="side_zipper"){?> checked <?php }?>/>
                                                Side Zipper
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field pants_pleat">
                                          <div class="box_title">
                                            PLEATS:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_pleat" value="no_pleats"
                                                <?php if($pantpleat[1]=="no_pleats"){?> checked="checked" <?php }
                                                elseif ($pantpleat[1]=="") {?> checked="checked" <?php }?>  />
                                                No pleats
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_pleat" value="pleated" 
                                                <?php if($pantpleat[1]=="pleated"){?> checked <?php }?>/>
                                                Pleated
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_pleat" value="double_pleats" 
                                                <?php if($pantpleat[1]=="double_pleats"){?> checked <?php }?>/>
                                                Double pleats
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field pants_belt_loops">
                                          <div class="box_title">
                                            BELT LOOPS:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_belt_loops" value="with"
                                                 <?php if($beltloops[1]=="with"){?> checked="checked" <?php }
                                                elseif ($beltloops[1]=="") {?> checked="checked" <?php }?>/>
                                                With
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_belt_loops" value="without" 
                                                <?php if($beltloops[1]=="without"){?> checked <?php }?>/>
                                                Without
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field pants_crotch">
                                          <div class="box_title">
                                            CROTCH:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_crotch" value="low" 
                                                <?php if($crotch[1]=="low"){?> checked <?php }?>/>
                                                Low
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_crotch" value="high" 
                                                <?php if($crotch[1]=="high"){?> checked <?php }?>/>
                                                High
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_crotch" value="medium"
                                                 <?php if($crotch[1]=="medium"){?> checked="checked" <?php }
                                                elseif ($crotch[1]=="") {?> checked="checked" <?php }?>/>
                                                Medium
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field pants_belt_loops_property">
                                          <div class="box_title">
                                            WAISTBAND:
                                          </div>
                                          <div class="clearfix"></div>
                                          <div class="box_opt box_opt_checkbox mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_checkbox t4l_checkbox">
                                                <input type='checkbox' name='pants_belt_loops_property' value='high' 
                                                <?php if($waistband[1]=="high"){?> checked <?php }?>>
                                                High
                                              </label>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="config_field pants_front_pocket">
                                          <div class="box_title">
                                            POCKET STYLE:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_pocket_no.jpg" alt="Without"/>
                                                <input type="radio" name="pants_front_pocket" value="no" 
                                                <?php if($pantpocket[1]=="no"){?> checked <?php }?>/>
                                                Without
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_pocket_inclined.jpg" alt="Diagonal"/>
                                                <input type="radio" name="pants_front_pocket" value="inclined" 
                                                <?php if($pantpocket[1]=="inclined"){?> checked <?php }?>/>
                                                Diagonal
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_pocket_rounded.jpg" alt="Rounded"/>
                                                <input type="radio" name="pants_front_pocket" value="rounded" 
                                                <?php if($pantpocket[1]=="rounded"){?> checked <?php }?>/>
                                                Rounded
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_pocket_straight.jpg" alt="Vertical"/>
                                                <input type="radio" name="pants_front_pocket" value="straight"
                                                <?php if($pantpocket[1]=="straight"){?> checked="checked" <?php }
                                                elseif ($pantpocket[1]=="") {?> checked="checked" <?php }?>/>
                                                Vertical
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_front_pocket_one_living.jpg" alt="Welted"/>
                                                <input type="radio" name="pants_front_pocket" value="one_living" 
                                                <?php if($pantpocket[1]=="one_living"){?> checked <?php }?>/>
                                                Welted
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="config_field pants_back_pocket_num">
                                          <div class="box_title">
                                            BACK POCKETS:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_back_pocket_num" value="0"
                                                <?php if($pantbackpocket[1]=="0"){?> checked="checked" <?php }
                                                elseif ($pantbackpocket[1]=="") {?> checked="checked" <?php }?>/>
                                                No Pockets
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_back_pocket_num" value="1" 
                                                <?php if($pantbackpocket[1]=="1"){?> checked <?php }?>/>
                                                1 Pocket
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_back_pocket_num" value="2" 
                                                <?php if($pantbackpocket[1]=="2"){?> checked <?php }?>/>
                                                2 Pockets
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div class="config_field pants_back_pocket_type">
                                          <div class="box_title">
                                            POCKET STYLE:
                                          </div>
                                          <div class="box_opt box_opt_image mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_back_pocket_type_button.jpg" alt="Double welted with button"/>
                                                <input type="radio" name="pants_back_pocket_type" value="button"/>
                                                Double welted with button
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_back_pocket_type_one_living.jpg" alt="Welted"/>
                                                <input type="radio" name="pants_back_pocket_type" value="one_living"/>
                                                Welted
                                              </label>
                                              <label class="option option_image t4l_radio">
                                                <img src="<?php echo $homeurl;?>assets/images/personalize/woman_pants/pants_back_pocket_type_two_living.jpg" alt="Double welt"/>
                                                <input type="radio" name="pants_back_pocket_type" value="two_living"/>
                                                Double welt
                                              </label>
                                            </div>
                                          </div>
                                        </div>-->
                                        <div class="config_field pants_cuff">
                                          <div class="box_title">
                                            CUFFS STYLE:
                                          </div>
                                          <div class="box_opt box_opt_radio mobile_layer">
                                            <div class="box_opt_fix">
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_cuff" value="without"
                                                <?php if($pantcuffs[1]=="without"){?> checked="checked" <?php }
                                                elseif ($pantcuffs[1]=="") {?> checked="checked" <?php }?>/>
                                                No Cuff
                                              </label>
                                              <label class="option option_radio t4l_radio">
                                                <input type="radio" name="pants_cuff" value="standard" 
                                                <?php if($pantcuffs[1]=="standard"){?> checked <?php }?>/>
                                                With Cuffs
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="garment_block garment_block_fabric">
                                     
                                      <div class="step_block_selector_enable fabric_block_selector_enable">
                                          <label class="t4l_checkbox">
                                            <input type="checkbox" class="multiple_fabric" name="multiple_fabric"> Select a different fabric for each garment
                                          </label>
                                    </div>
                                     <div class="row step_block_selector fabric_block_selector" style="display: none;">
                                      <div class="col-md-3">
                                        <a href="#fabric_block_woman_jacket" class="selector woman_jacket current">
                                          <span>Jacket</span>
                                        </a>
                                      </div>
                                      <div class="col-md-3">
                                        <a href="#fabric_block_woman_pants" class="selector woman_pants">
                                          <span>Skirt</span>
                                        </a>
                                      </div>
                                    </div>

                                   

                                      <!-- Jacket Section -->
                                      <div class="fabric_block fabric_block_woman_jacket" data-block-name="woman_jacket">
                                          <div class="fabric_block_title">Jacket</div>
                                              <div class="fabric_preview fabric_preview_woman_jacket" style="display:block;">
                                                 <div class="infobar" style="width:650px;">
                                                      <span class="title fabric_main_title"><?php echo $fab_title;?></span>
                                                      <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc); ?></span>
                                                  </div>
                                                  <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img src="<?php echo $homeurl.$fab_img;?>" style="width:650px;" class="fabric_main_image"></a>
                                              </div>
                                              <input type="hidden" class="fabric_input required" name="woman_jacket" data-block-name="woman_jacket" value="<?php echo $_SESSION['fabID']; ?>" />
                                              <div class="fabric_filters">
                                                  <input type="hidden" name="fabric_block" value="woman_jacket" />
                                              </div>
                                              <div class="fabric_list loaded">
                                               <?php $fab=$site->get_fabrics('',$fabric_list);
                                                    //print_r($fab);
                                                    foreach ($fab as $key => $value) {
                                                    ?>
                                                  <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fabid==$fab[$key]['f_rand']) {?> current <?php }?>">
                                                      <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
                                                          <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="<?php echo $fab[$key]['fab_name'];?>">
                                                      </a>
                                                      <div class="price price_part">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                                      <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                                      <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
                                                  </div>
                                                  <?php }?>
                                                  <!--<div class="fabric_thumb fabric_1233 <?php if($fabid=="1233") {?> current <?php }?>">
                                                      <a href="javascript:void(0);" class="select " rel="1233">
                                                          <img class="b-lazy b-loaded" src="<?php echo $homeurl;?>assets/dimg/fabric/suit/1233_normal.jpg" alt="Trivento">
                                                      </a>
                                                      <div class="price price_part">+28$</div>
                                                      <div class="price price_total">+40$</div>
                                                      <div class="title fabric_title">Trivento</div>
                                                      <div class="composition">Wool</div>
                                                  </div>-->
                                              </div>
                                      </div>

                                      <!-- Skirt Section -->

                                       <div class="fabric_block fabric_block_woman_pants" data-block-name="woman_pants">
                                          <div class="fabric_block_title">Skirt</div>
                                              <div class="fabric_preview fabric_preview_woman_pants" style="display:block;">
                                                 <div class="infobar" style="width:650px;">
                                                      <span class="title fabric_main_title"><?php echo $fab_title1;?></span>
                                                      <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc1); ?></span>
                                                  </div>
                                                  <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title1); ?>"><img src="<?php echo $homeurl.$fab_img1;?>" style="width:650px;" class="fabric_main_image"></a>
                                              </div>
                                              <input type="hidden" class="fabric_input required" name="woman_pants" data-block-name="woman_pants" value="<?php echo $_SESSION['fabID1']; ?>" />
                                              <div class="fabric_filters">
                                                  <input type="hidden" name="fabric_block" value="woman_pants" />
                                              </div>
                                              <div class="fabric_list loaded">
                                               <?php $fab=$site->get_fabrics('',$fabric_list);
                                                    foreach ($fab as $key => $value) {
                                                    ?>
                                                  <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fabid1==$fab[$key]['f_rand']) {?> current <?php }?>">
                                                      <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
                                                          <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="<?php echo $fab[$key]['fab_name'];?>">
                                                      </a>
                                                      <div class="price price_part">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                                      <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                                      <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
                                                  </div>
                                                  <?php }?>
                                              </div>
                                          </div>
                                   
                                   </div>
                                    <div class="garment_block garment_block_extra">
                                      <div class="extra_block extra_block_woman_jacket" data-block-name="woman_jacket">
                                        <div class="extra_container jacket_lining extra_container_lining active" data-extra-name="jacket_lining" data-extra-type="lining" info-icon="R">
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Customize Lining
                                          </div>
                                          <div class="extra_content" style="display: block;">
                                            <div class="extra_field">
                                              <input type="hidden" name="jacket_lining" class="id jacket_lining" value="<?php echo $lining[1];?>"/>
                                                <div class="lining_slider_contents" data-name="jacket_lining">
                                                  <div class="fabric_thumb lining_thumb lining_121 <?php if($lining[1]=="121"){?> current <?php }?>" value="121">
                                                    <a href="javascript:void(0);" data-id="121" class="extra_select">
                                                     <img class="b-lazy image b-loaded" src="<?php echo $homeurl;?>assets/dimg/lining/default/121_normal.jpg" alt="">
                                                    </a>
                                                    <div class="price">9.95$</div>
                                                    <div class="title">Paris</div>
                                                 </div>
                                                 <div class="fabric_thumb lining_thumb lining_96 <?php if($lining[1]=="96"){?> current <?php }?>" value="96">
                                                   <a href="javascript:void(0);" data-id="96" class="extra_select">
                                                     <img class="b-lazy image b-loaded" src="<?php echo $homeurl;?>assets/dimg/lining/default/96_normal.jpg" alt="">
                                                   </a>
                                                   <div class="price">14.95$</div>
                                                   <div class="title">Cergy</div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_initials extra_container_initials" data-extra-name="jacket_initials" data-extra-type="initials" info-icon="J">
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Add monogram
                                          </div>
                                          <div class="extra_content">
                                            <input type="hidden" class="initials_price" name="initials_price" value="9.95">
                                            <div class="extra_field extra_field_initials_text required">
                                              <div class="box_title">
                                                WRITE HERE:
                                              </div>
                                              <div class="box_opt">
                                                <div class="box_opt_fix">
                                                  <input value="<?php echo $text[1];?>" type="text" name="initials_text" class="text initials_text" placeholder="Type your initials" maxlength="10">
                                                  <span class="extra_price">
                                                    (+ 9.95$ )
                                                  </span>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field extra_field_initials_fonts required">
                                              <div class="box_title">
                                                FONT:
                                              </div>
                                              <div class="box_opt">
                                                <div class="box_opt_fix">
                                                  <label class="t4l_radio garamond">
                                                    <input type="radio" class="font" name="initials_font" value="garamond"
                                                     <?php if($font[1]=="garamond"){?> checked <?php }?> />
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/initials/garamond.png" alt="Garamond"
                                                     />
                                                  </label>
                                                  <label class="t4l_radio harrington">
                                                    <input <?php if($font[1]=="harrington"){?> checked <?php }?>  type="radio" class="font" name="initials_font" value="harrington">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/initials/harrington.png" alt="Harrington"
                                                     />
                                                  </label>
                                                  <label class="t4l_radio times">
                                                    <input <?php if($font[1]=="times"){?> checked <?php }?> type="radio" class="font" name="initials_font" value="times">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/initials/times.png" alt="Times new Roman"
                                                      />
                                                  </label>
                                                  <label class="t4l_radio arial">
                                                    <input <?php if($font[1]=="arial"){?> checked <?php }?> type="radio" class="font" name="initials_font" value="arial">
                                                    <img src="<?php echo $homeurl;?>assets/images/personalize/initials/arial.png" alt="Arial"
                                                      />
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field extra_field_initials_color required">
                                              <div class="box_title">
                                                INITIALS COLOR:
                                              </div>
                                              <div class="box_opt">
                                                <div class="box_opt_fix">
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ffcf10"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="ffcf10"){?> checked <?php }?> type="radio" class="color" data-color="ffcf10" name="initials_color" value="ffcf10">
                                                    
                                                    <span class="thread_color" style="background: #ffcf10">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="4477cf"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="4477cf"){?> checked <?php }?> type="radio" class="color" data-color="4477cf" name="initials_color" value="4477cf">
                                                    
                                                    <span class="thread_color" style="background: #4477cf">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ffffff"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="ffffff"){?> checked <?php }?> type="radio" class="color" data-color="ffffff" name="initials_color" value="ffffff">
                                                    
                                                    <span class="thread_color" style="background: #ffffff">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="a48239"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="a48239"){?> checked <?php }?> type="radio" class="color" data-color="a48239" name="initials_color" value="a48239">
                                                    
                                                    <span class="thread_color" style="background: #a48239">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="4d020d"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="4d020d"){?> checked <?php }?> type="radio" class="color" data-color="4d020d" name="initials_color" value="4d020d">
                                                    
                                                    <span class="thread_color" style="background: #4d020d">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b3b3b3"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="b3b3b3"){?> checked <?php }?> type="radio" class="color" data-color="b3b3b3" name="initials_color" value="b3b3b3">
                                                    
                                                    <span class="thread_color" style="background: #b3b3b3">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color <?php if($color[1]=="331b00"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="331b00"){?> checked <?php }?> type="radio" class="color" data-color="331b00" name="initials_color" value="331b00">
                                                    
                                                    <span class="thread_color" style="background: #331b00">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="000000"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="000000"){?> checked <?php }?> type="radio" class="color" data-color="000000" name="initials_color" value="000000">
                                                    
                                                    <span class="thread_color" style="background: #000000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="b80e58"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="b80e58"){?> checked <?php }?> type="radio" class="color" data-color="b80e58" name="initials_color" value="b80e58">
                                                    
                                                    <span class="thread_color" style="background: #b80e58">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="0ba133"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="0ba133"){?> checked <?php }?> type="radio" class="color" data-color="0ba133" name="initials_color" value="0ba133">
                                                    
                                                    <span class="thread_color" style="background: #0ba133">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="c20000"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="c20000"){?> checked <?php }?> type="radio" class="color" data-color="c20000" name="initials_color" value="c20000">
                                                    
                                                    <span class="thread_color" style="background: #c20000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ff7912"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="ff7912"){?> checked <?php }?> type="radio" class="color" data-color="ff7912" name="initials_color" value="ff7912">
                                                    
                                                    <span class="thread_color" style="background: #ff7912">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color <?php if($color[1]=="5f1970"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="5f1970"){?> checked <?php }?> type="radio" class="color" data-color="5f1970" name="initials_color" value="5f1970">
                                                    
                                                    <span class="thread_color" style="background: #5f1970">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="b8f2f2"){?> checked1 <?php }?>">
                                                    <input <?php if($color[1]=="b8f2f2"){?> checked <?php }?> type="radio" class="color" data-color="b8f2f2" name="initials_color" value="b8f2f2">
                                                    
                                                    <span class="thread_color" style="background: #b8f2f2">
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_neck extra_container_colors" data-extra-name="jacket_neck" data-extra-type="colors" info-icon="o" style="visibility:hidden;" >
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Neck lining
                                          </div>
                                          <div class="extra_content">
                                            <div class="extra_field required extra_field_image contrast" data-field-name="contrast">
                                              <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                  <label class="option option_image t4l_radio">
                                                    <img src="/images/personalize/jacket_neck/contrast/xdefault.jpg.pagespeed.ic.Y3fCT6FJnV.webp" alt="By default"/>
                                                    <input type="radio" name="jacket_neck[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                    <span class="name">
                                                      By default
                                                    </span>
                                                  </label>
                                                  <label class="option option_image t4l_radio">
                                                    <img src="/images/personalize/jacket_neck/contrast/xcustom.jpg.pagespeed.ic.2t8bILqRoq.webp" alt="Custom color"/>
                                                    <input type="radio" name="jacket_neck[contrast]" value="custom" data-field-name="contrast" data-price="3.95">
                                                    <span class="name">
                                                      Custom color
                                                    </span>
                                                    <span class="price">
                                                      +3,95€
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field required extra_field_neck_lining color" data-field-name="color">
                                              <input type="hidden" name="jacket_neck[color]" value="">
                                              <div class="fabric_thumb thread_thumb " data-id="2">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #d89f6b">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="3">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #ea1c1e">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="5">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #b2a995">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="4">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #212534">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="6">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #34322c">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="1">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #e7e7e7">
                                                  </span>
                                                </a>
                                              </div>
                                              <div class="fabric_thumb thread_thumb " data-id="7">
                                                <a href="javascript:;">
                                                  <span class="image" style="background: #1f1f1f">
                                                  </span>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_patches extra_container_colors" data-extra-name="jacket_patches" data-extra-type="colors" info-icon="q" style="visibility:hidden;" >
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Add elbow patches 
                                          </div>
                                          <div class="extra_content">
                                            <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
                                              <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                  <label class="option option_radio t4l_radio">
                                                    <input type="radio" name="jacket_patches[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                    <span class="name">
                                                      By default
                                                    </span>
                                                  </label>
                                                  <label class="option option_radio t4l_radio">
                                                    <input type="radio" name="jacket_patches[contrast]" value="custom" data-field-name="contrast" data-price="12.95">
                                                    <span class="name">
                                                      Custom color
                                                    </span>
                                                    <span class="price">
                                                      +12,95€
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field required extra_field_patches color" data-field-name="color">
                                              <input type="hidden" name="jacket_patches[color]" value="">
                                              <div class="fabric_thumb patch_thumb " data-id="55">
                                                <a href="javascript:;">
                                                  <span class="image" style="background:url(/dimg/patches/default/x55_thumb.jpg.pagespeed.ic.WlGofGkARu.webp)">
                                                  </span>
                                                </a>
                                                <div class="title">
                                                  Black
                                                </div>
                                              </div>
                                              <div class="fabric_thumb patch_thumb " data-id="56">
                                                <a href="javascript:;">
                                                  <span class="image" style="background:url(/dimg/patches/default/x56_thumb.jpg.pagespeed.ic.Bx0VBdyqJ2.webp)">
                                                  </span>
                                                </a>
                                                <div class="title">
                                                  Brown
                                                </div>
                                              </div>
                                              <div class="fabric_thumb patch_thumb " data-id="57">
                                                <a href="javascript:;">
                                                  <span class="image" style="background:url(/dimg/patches/default/x57_thumb.jpg.pagespeed.ic.fJalN9Ak9s.webp)">
                                                  </span>
                                                </a>
                                                <div class="title">
                                                  Beige
                                                </div>
                                              </div>
                                              <div class="fabric_thumb patch_thumb " data-id="58">
                                                <a href="javascript:;">
                                                  <span class="image" style="background:url(/dimg/patches/default/x58_thumb.jpg.pagespeed.ic.A1Zi5CpLrP.webp)">
                                                  </span>
                                                </a>
                                                <div class="title">
                                                  Brown-Grey
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_metal_button extra_container_colors" data-extra-name="jacket_metal_button" data-extra-type="colors" info-icon="N" style="visibility:hidden;" >
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Type of Buttons
                                          </div>
                                          <div class="extra_content">
                                            <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
                                              <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                  <label class="option option_radio t4l_radio">
                                                    <input type="radio" name="jacket_metal_button[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                    <span class="name">
                                                      By default
                                                    </span>
                                                  </label>
                                                  <label class="option option_radio t4l_radio">
                                                    <input type="radio" name="jacket_metal_button[contrast]" value="custom" data-field-name="contrast" data-price="10.9">
                                                    <span class="name">
                                                      Custom color
                                                    </span>
                                                    <span class="price">
                                                      +10,9€
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field required extra_field_metal_button type" data-field-name="type">
                                              <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                  <label class="option option_image t4l_radio metal_b">
                                                    <img src="/images/personalize/jacket_metal_button/type/x50.jpg.pagespeed.ic.39MQArwCLo.webp" alt="Custom color"/>
                                                    <input type="radio" name="jacket_metal_button[type]" value="50" data-field-name="type" data-price="10.9">
                                                  </label>
                                                  <label class="option option_image t4l_radio metal_b">
                                                    <img src="/images/personalize/jacket_metal_button/type/x51.jpg.pagespeed.ic.1pYg9RA8zS.webp" alt="Custom color"/>
                                                    <input type="radio" name="jacket_metal_button[type]" value="51" data-field-name="type" data-price="10.9">
                                                  </label>
                                                  <label class="option option_image t4l_radio metal_b">
                                                    <img src="/images/personalize/jacket_metal_button/type/x52.jpg.pagespeed.ic.zu8Aw71J0r.webp" alt="Custom color"/>
                                                    <input type="radio" name="jacket_metal_button[type]" value="52" data-field-name="type" data-price="10.9">
                                                  </label>
                                                  <label class="option option_image t4l_radio metal_b">
                                                    <img src="/images/personalize/jacket_metal_button/type/x53.jpg.pagespeed.ic.tn4dyPq3A3.webp" alt="Custom color"/>
                                                    <input type="radio" name="jacket_metal_button[type]" value="53" data-field-name="type" data-price="10.9">
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_threads extra_container_threads" data-extra-name="jacket_threads" data-extra-type="threads" info-icon="V" style="visibility:hidden;" >
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Add colored button threads
                                          </div>
                                          <div class="extra_content">
                                            <div class="extra_field extra_field_radio contrast" data-field-name="contrast">
                                              <div class="box_opt box_opt_no_title">
                                                <div class="box_opt_fix">
                                                  <label class="option option_radio t4l_radio">
                                                    
                                                    <input type="radio" name="jacket_threads[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1">
                                                    <span class="name">
                                                      By default
                                                    </span>
                                                  </label>
                                                  <label class="option option_radio t4l_radio">
                                                    
                                                    <input type="radio" name="jacket_threads[contrast]" value="all" data-field-name="contrast" data-price="4.5">
                                                    <span class="name">
                                                      All
                                                    </span>
                                                    <span class="price">
                                                      (+4,5€)
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field color required extra_field_threads threads" data-field-name="threads" style="visibility:hidden;">
                                              <div class="box_title">
                                                BUTTON THREADS:
                                              </div>
                                              <div class="box_opt">
                                                <div class="box_opt_fix">
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ffcf10" name="jacket_threads[threads][color]" data-field-name="threads-color" value="9">
                                                    
                                                    <span class="thread_color" style="background: #ffcf10">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="4477cf" name="jacket_threads[threads][color]" data-field-name="threads-color" value="11">
                                                    
                                                    <span class="thread_color" style="background: #4477cf">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ffffff" name="jacket_threads[threads][color]" data-field-name="threads-color" value="12">
                                                    
                                                    <span class="thread_color" style="background: #ffffff">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="a48239" name="jacket_threads[threads][color]" data-field-name="threads-color" value="13">
                                                    
                                                    <span class="thread_color" style="background: #a48239">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="4d020d" name="jacket_threads[threads][color]" data-field-name="threads-color" value="14">
                                                    
                                                    <span class="thread_color" style="background: #4d020d">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b3b3b3" name="jacket_threads[threads][color]" data-field-name="threads-color" value="15">
                                                    
                                                    <span class="thread_color" style="background: #b3b3b3">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="331b00" name="jacket_threads[threads][color]" data-field-name="threads-color" value="16">
                                                    
                                                    <span class="thread_color" style="background: #331b00">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="000000" name="jacket_threads[threads][color]" data-field-name="threads-color" value="17">
                                                    
                                                    <span class="thread_color" style="background: #000000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b80e58" name="jacket_threads[threads][color]" data-field-name="threads-color" value="18">
                                                    
                                                    <span class="thread_color" style="background: #b80e58">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="0ba133" name="jacket_threads[threads][color]" data-field-name="threads-color" value="19">
                                                    
                                                    <span class="thread_color" style="background: #0ba133">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="c20000" name="jacket_threads[threads][color]" data-field-name="threads-color" value="25">
                                                    
                                                    <span class="thread_color" style="background: #c20000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ff7912" name="jacket_threads[threads][color]" data-field-name="threads-color" value="31">
                                                    
                                                    <span class="thread_color" style="background: #ff7912">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="5f1970" name="jacket_threads[threads][color]" data-field-name="threads-color" value="32">
                                                    
                                                    <span class="thread_color" style="background: #5f1970">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b8f2f2" name="jacket_threads[threads][color]" data-field-name="threads-color" value="33">
                                                    
                                                    <span class="thread_color" style="background: #b8f2f2">
                                                    </span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="extra_field color required extra_field_holes holes" data-field-name="holes" style="visibility:hidden;" >
                                              <div class="box_title">
                                                BUTTON HOLES:
                                              </div>
                                              <div class="box_opt">
                                                <div class="box_opt_fix">
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ffcf10" name="jacket_threads[holes][color]" data-field-name="holes-color" value="9">
                                                    
                                                    <span class="thread_color" style="background: #ffcf10">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="4477cf" name="jacket_threads[holes][color]" data-field-name="holes-color" value="11">
                                                    
                                                    <span class="thread_color" style="background: #4477cf">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ffffff" name="jacket_threads[holes][color]" data-field-name="holes-color" value="12">
                                                    
                                                    <span class="thread_color" style="background: #ffffff">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="a48239" name="jacket_threads[holes][color]" data-field-name="holes-color" value="13">
                                                    
                                                    <span class="thread_color" style="background: #a48239">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="4d020d" name="jacket_threads[holes][color]" data-field-name="holes-color" value="14">
                                                    
                                                    <span class="thread_color" style="background: #4d020d">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b3b3b3" name="jacket_threads[holes][color]" data-field-name="holes-color" value="15">
                                                    
                                                    <span class="thread_color" style="background: #b3b3b3">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="331b00" name="jacket_threads[holes][color]" data-field-name="holes-color" value="16">
                                                    
                                                    <span class="thread_color" style="background: #331b00">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="000000" name="jacket_threads[holes][color]" data-field-name="holes-color" value="17">
                                                    
                                                    <span class="thread_color" style="background: #000000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b80e58" name="jacket_threads[holes][color]" data-field-name="holes-color" value="18">
                                                    
                                                    <span class="thread_color" style="background: #b80e58">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="0ba133" name="jacket_threads[holes][color]" data-field-name="holes-color" value="19">
                                                    
                                                    <span class="thread_color" style="background: #0ba133">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="c20000" name="jacket_threads[holes][color]" data-field-name="holes-color" value="25">
                                                    
                                                    <span class="thread_color" style="background: #c20000">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="ff7912" name="jacket_threads[holes][color]" data-field-name="holes-color" value="31">
                                                    
                                                    <span class="thread_color" style="background: #ff7912">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="5f1970" name="jacket_threads[holes][color]" data-field-name="holes-color" value="32">
                                                    
                                                    <span class="thread_color" style="background: #5f1970">
                                                    </span>
                                                  </label>
                                                  <label class="t4l_radio t4l_radio_color">
                                                    <input type="radio" class="color" data-color="b8f2f2" name="jacket_threads[holes][color]" data-field-name="holes-color" value="33">
                                                    
                                                    <span class="thread_color" style="background: #b8f2f2">
                                                    </span>
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
                                      <div class="controls">
                                        <a href="javascript:;" class="icon toggle" data-icon="F" data-block="woman_jacket">
                                          <span class="h">
                                            HIDE JACKET
                                          </span>
                                          <span class="s">
                                            SHOW JACKET
                                          </span>
                                        </a>
                                        <a href="javascript:;" class="icon zoom in" data-icon="O">
                                          <span class="h">
                                            ZOOM
                                          </span>
                                        </a>
                                        <a href="javascript:;" class="icon zoom out" data-icon="P">
                                          <span class="h">
                                            ZOOM
                                          </span>
                                        </a>
                                        <a href="javascript:;" class="icon arrow_up disabled" data-icon="j">
                                        </a>
                                        <a href="javascript:;" class="icon arrow_down" data-icon="i">
                                        </a>
                                        
                                      </div>
                                      <div class="render3d resize_fix" style="margin-top: -40px;" resize_fix="margin-top: -40px; height: ">
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
        </section>
<!--End Buisness Suit Customizer-->

<!--End Buisness Suit Customizer-->
<?php } elseif($id==10) {
    if(isset($_POST['orderid']))
{
    $oid=mysqli_real_escape_string($con,$_POST['orderid']);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);
    //$style=explode(":",$r['om_style']);
    $fit=explode(":",$style[0]);$length=explode(":",$style[1]);$fastening=explode(":",$style[2]);
    $pleats=explode(":",$style[3]);$beltloops=explode(":",$style[4]);$crotch=explode(":",$style[5]);
    $pockets=explode(":",$style[6]);
    $backpocket=explode(":",$style[7]);$pocketstyle=explode(":",$style[8]);$cuffs=explode(":",trim($style[9],"}"));
     $fabid=$r['fabid'];$o_id=$r['om_id'];$order_id=$r['order_id'];$price=$r['om_price'];
    $action="update";
    $f_rand=mysqli_query($con,"select * from fabric_master where fab_rand IN($fabid)");
    if(mysqli_num_rows($f_rand) > 0) {
        while($fr=mysqli_fetch_array($f_rand)) {
            $f_id[]=$fr['fab_rand'];
            $f_title[]=$fr['fab_name'];
            $f_desc[]=$fr['fab_desc'];
            $f_img[]=$fr['fab_img'];
    }
  }

  $fab_title=$f_title[0];
   $fab_title1=$f_title[1];
   $fab_desc=$f_desc[0];
   $fab_desc1=$f_desc[1];
   $fab_img = $f_img[0];
   $fab_img1 = $f_img[1];
}
else
{
    $fit[1]="";$coatlapel[1]="";$length[1]="";$fastening[1]="";$pleats[1]="";$beltloops[1]="";$crotch[1]="";
    $pockets[1]="";$pocketstyle[1]="";$crotch[1]="";$fabid=$f_id1[0];$coatlining[1]="";
    $action="save";$o_id="";$cuffs[1]="";$order_id="";$price=$price;
}
$_SESSION['fabID']=$fabid;
?>



<!-- Pant Customizer -->
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
                    <?php echo $get_sub_cat[0]['subcat_name']; ?>
                </h1>
                    <!-- BREADCRUMBS -->
                    <ul class="breadcrumbs list-inline pull-right">
                        <li><a href="<?php echo $homeurl;?>">Home</a>
                        </li>
                        <!--
                    -->
                        <li><a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['category_name'])); ?>/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/"><?php echo $get_sub_cat[0]['subcat_name']; ?></a></li>

                        <!--
                    -->
                        <li>Customize</li>
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
                        <form method="post" class="garment_form pant_cust cust" action="<?php echo $homeurl;?>includes/action/action.php" id="garment_form_9369">
                        <input type="hidden" name="action" value="<?php echo $action;?>">
                        <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                        <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
                        <input type="hidden" name="type" value="pant">
                        <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
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
                                        <a href="javascript:;" class="step_next btn btn-default pull-right">NEXT STEP</a>
                                        <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
                                        <span  class="garment_price btn btn-default pull-right">$<?php echo $price;?></span>
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
                                        <!--<div class="config_field pants_belt_loops_property">
                                            <div class="box_title">WAISTBAND:</div>
                                            <div class="box_opt box_opt_checkbox mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_checkbox t4l_checkbox">
                                                        <input type='checkbox' name='pants_belt_loops_property' value='high'>High</label>
                                                </div>
                                            </div>
                                        </div>-->
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
                                            <!--<div class="fabric_thumb fabric_141 current">
                                                    <a href="javascript:void(0);" class="select " rel="141">
                                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl; ?>assets/dimg/fabric/suit/141_normal.jpg" alt="Groove">
                                                    </a>
                                                    <!--<div class="price price_part">+6€</div>
                                                    <div class="price price_total">+6€</div>
                                                    <div class="title fabric_title">Sicilian Grey</div>
                                                    <div class="composition">Wool</div>
                                                </div>-->
                                            <?php
                                                    $fab=$site->get_fabrics('',$fabric_list);
                                                    foreach ($fab as $key => $value) {
                            
                                                    ?>
                                                <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid){?> current <?php }?>" >
                                                    <a href="javascript:void(0);" class="select" rel="<?php echo $fab[$key]['f_rand'];?>">
                                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img']; ?>" alt="<?php echo $fab[$key]['fab_name'];?>">
                                                    </a>
                                                    <div class="price price_part">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                                    <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                                   <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
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
                                 </div>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clearfix visible-xs visible-sm"></div>
<!-- fixes floating problems when mobile menu is visible -->

</div>

<!-- End Pant Customizer -->

<!-- Start Skirt Customizer -->

<?php } elseif($id==11) {
    if(isset($_POST['orderid']))
{
    $oid=mysqli_real_escape_string($con,$_POST['orderid']);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);
    //$style=explode(":",$r['om_style']);
    $look=explode(":",$style[0]);$length=explode(":",$style[1]);$fastening=explode(":",$style[2]);
    $vent=explode(":",$style[3]);$beltloops=explode(":",$style[4]);$crotch=explode(":",$style[5]);
    $pocketstyle=explode(":",$style[6]);$backpockets=explode(":",$style[7]);
    $backpocketstyle=explode(":",trim($style[8],"}"));
    $fabid=$r['fabid'];$o_id=$r['om_id'];$order_id=$r['order_id'];$price=$r['om_price'];
   
    $action="update";

    $f_rand=mysqli_query($con,"select * from fabric_master where fab_rand IN($fabid)");
   if(mysqli_num_rows($f_rand) > 0) {
        while($fr=mysqli_fetch_array($f_rand)) {
            $f_id[]=$fr['fab_rand'];
            $f_title[]=$fr['fab_name'];
            $f_desc[]=$fr['fab_desc'];
            $f_img[]=$fr['fab_img'];
    }
  }

  $fab_title=$f_title[0];
   $fab_title1=$f_title[1];
   $fab_desc=$f_desc[0];
   $fab_desc1=$f_desc[1];
   $fab_img = $f_img[0];
   $fab_img1 = $f_img[1];
}
else
{
    $look[1]="";$coatlapel[1]="";$length[1]="";$coatcollar[1]="";$fastening[1]="";$vent[1]="";$beltloops[1]="";
    $crotch[1]="";$pocketstyle[1]="";$backpockets[1]="";$fabid=$f_id1[0];
    $action="save";$o_id="";$coatfastening[1]="";$order_id="";$price=$price;
}
$_SESSION['fabID']=$fabid;
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
                    <?php echo $get_sub_cat[0]['subcat_name']; ?>
                </h1>
                    <!-- BREADCRUMBS -->
                    <ul class="breadcrumbs list-inline pull-right">
                        <li><a href="<?php echo $homeurl;?>">Home</a>
                        </li>
                        <!--
                    -->
                    <li><a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['category_name'])); ?>/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/"><?php echo $get_sub_cat[0]['subcat_name']; ?></a></li>

                        <!--
                    -->
                        <li>Customize</li>
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
                        <form method="post" class="garment_form skirt_cust cust" action="<?php echo $homeurl;?>includes/action/action.php" id="garment_form_454">
                        <input type="hidden" name="action" value="<?php echo $action;?>">
                        <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                        <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
                        <input type="hidden" name="type" value="skirt">
                        <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
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
                                        <a href="javascript:;" class="step_next btn btn-default pull-right">NEXT STEP</a>
                                        <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
                                        <span  class="garment_price btn btn-default pull-right">$<?php echo $price;?></span>
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
                                                        <!--<label class="option option_image t4l_radio"><img src="images/personalize/woman_skirt/skirt_cut_side.jpg" alt="On the side" pagespeed_url_hash="3513832406" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                            <input type="radio" name="skirt_cut" value="side" />On the side</label>-->
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
                                            
                                            <!--<div class="config_field skirt_belt_loops_property">
                                                <div class="box_title">WAISTBAND:</div>
                                                <div class="box_opt box_opt_checkbox mobile_layer">
                                                    <div class="box_opt_fix">
                                                        <label class="option option_checkbox t4l_checkbox">
                                                            <input type='checkbox' name='skirt_belt_loops_property' value='high' checked='checked'>High</label>
                                                    </div>
                                                </div>
                                            </div>-->
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
                                              <?php $fab=$site->get_fabrics('',$fabric_list);
                                                    //print_r($fab);
                                                    foreach ($fab as $key => $value) {
                                                    ?>
                                                <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid){?> current <?php }?>">
                                                    <a href="javascript:void(0);" class="select " rel="<?php echo $fab[$key]['f_rand'];?>">
                                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img'];?>" alt="<?php echo $fab[$key]['fab_name'];?>">
                                                    </a>
                                                    <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                                    <!--<div class="composition">Wool</div>-->
                                                </div>
                                                <?php }?>
                                               <!-- <div class="fabric_thumb fabric_1308">
                                                    <div class="icon icon-winter"></div>        
                                                    <a href="javascript:void(0);" class="select " rel="1308">
                                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl; ?>assets/dimg/fabric/suit/1308_normal.jpg" alt="Wavy Brown">
                                                    </a>
                                                    <div class="title fabric_title">Wavy Brown</div>
                                                    <div class="composition">Corduroy</div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="garment_render">
                                    <div class="render">
                                        <div class="controls"><a href="javascript:;" class="icon zoom in" data-icon="O"><span class="h">ZOOM</span></a><a href="javascript:;" class="icon zoom out" data-icon="P"><span class="h">ZOOM</span></a> </div>
                                        <div class="render3d resize_fix" style="width: 390px; margin-top: -380px; margin-left: 0px;" resize_fix="margin-top: -380px; height: "></div></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clearfix visible-xs visible-sm"></div>
<!-- fixes floating problems when mobile menu is visible -->

</div>
<!-- End Skirt Customizer -->



<!-- Start Skirt Suit Customizer -->

<?php } elseif($id==13) {
if(isset($_POST['orderid']))
{
    $oid=mysqli_real_escape_string($con,$_POST['orderid']);
    $sql=mysqli_query($con,"select * from order_master where om_id=$oid");
    $r=mysqli_fetch_array($sql);
    $style=explode("{",$r['om_style']);
    $style=explode(",",$style[1]);
    //$style=explode(":",$r['om_style']);
    $jacketfit=explode(":",$style[0]);$jacketlook=explode(":",$style[1]);$lapelstyle=explode(":",$style[2]);
    $lapelwidth=explode(":",$style[3]);$jacketbuttons=explode(":",$style[4]);$jacketlength=explode(":",$style[5]);
    $chestpocket=explode(":",$style[6]);$pocketstyle=explode(":",$style[7]);$sleeves=explode(":",$style[8]);
    $hemline=explode(":",$style[9]);$backstyle=explode(":",$style[10]);
    $skirtlook=explode(":",$style[11]);$skirtlength=explode(":",$style[12]);$skirtfast=explode(":",$style[13]);
    $skirtvent=explode(":",$style[14]);$beltloops=explode(":",$style[15]);$crotch=explode(":",$style[16]);
    $waistband=explode(":",$style[17]);$skirtpocket=explode(":",$style[18]);$skirtbackpocket=explode(":",$style[19]);
    $skirtbackpocketnum=explode(":",$style[20]);$showjacket=explode(":",trim($style[21],"}"));
    $o_id=$r['om_id'];$order_id=$r['order_id'];$price=$r['om_price'];
    $accents=explode("{",$r['om_accents']);
    $accents=explode(",",$accents[1]);$lining=explode(":",$accents[0]);$text=explode(":",$accents[1]);
    $font=explode(":",$accents[2]);$color=explode(":",trim($accents[3],"}"));
    $action="update";

     $fabid = explode("{",$r['fabid']);
    $fabid = explode(",",$fabid[1]);
    $fabid1 = explode(":",$fabid[0]);
    $fabid2 = explode(":",$fabid[1]);

    $fabid=$fabid1[1];
    $fabid1=$fabid2=trim($fabid2[1],"}");



    $f_rand=mysqli_query($con,"select * from fabric_master where fab_rand IN($fabid)");
   if(mysqli_num_rows($f_rand) > 0) {
        while($fr=mysqli_fetch_array($f_rand)) {
            $f_id[]=$fr['fab_rand'];
            $f_title[]=$fr['fab_name'];
            $f_desc[]=$fr['fab_desc'];
            $f_img[]=$fr['fab_img'];
    }
  }

  $fab_title=$f_title[0];
   $fab_title1=$f_title[1];
   $fab_desc=$f_desc[0];
   $fab_desc1=$f_desc[1];
   $fab_img = $f_img[0];
   $fab_img1 = $f_img[1];
}
else
{
    $jacketfit[1]="";$jacketlook[1]="";$coatstyle[1]="";$lapelstyle[1]="";$lapelwidth[1]="";$jacketbuttons[1]="";
    $jacketlength[1]="";$chestpocket[1]="";$pocketstyle[1]="";$sleeves[1]="";$hemline[1]="";$backstyle[1]="";
    $skirtlook[1]="";$skirtlength[1]="";$skirtfast[1]="";$skirtvent[1]="";$beltloops[1]="";$crotch[1]="";
    $waistband[1]="";$skirtpocket[1]="";$skirtbackpocket[1]="";$skirtbackpocketnum[1]="";$showjacket[1]="";
    $fabid=$f_id1[0];$fabid1=$f_id1[1];$coatlining[1]="";$coattext[1]="";$coatfont[1]="";$coatcolor[1]="";
    $action="save";$o_id="";$coatfastening[1]="";$order_id="";$price=$price;
}

$_SESSION['fabID']=$fabid;
$_SESSION['fabID1']=$fabid1;
$_SESSION['fabID2']=$fabid2;
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
                    <?php echo $get_sub_cat[0]['subcat_name']; ?>
                </h1>
                    <!-- BREADCRUMBS -->
                    <ul class="breadcrumbs list-inline pull-right">
                        <li><a href="<?php echo $homeurl;?>">Home</a>
                        </li>
                        <!--
                    -->
                    <li><a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['category_name'])); ?>/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/"><?php echo $get_sub_cat[0]['subcat_name']; ?></a></li>

                        <!--
                    -->
                        <li>Customize</li>
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
                        <form method="post" action="<?php echo $homeurl;?>includes/action/action.php" class="garment_form skirt_suit_cust cust" id="garment_form_653">
                        <input type="hidden" name="action" value="<?php echo $action;?>">
                        <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                        <input type="hidden" name="o_id" value="<?php echo $o_id;?>">
                        <input type="hidden" name="type" value="skirt_suit">
                        <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
                        <div id="garment_loading_653" class="garment_loading">
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
                                
                                 
                                <input type="hidden" name="garment_price">
                                <div class="c-nav cf">
                                    <a href="javascript:;" class="step_next btn btn-default pull-right">NEXT STEP</a>
                                    <a href="javascript:;" class="step_prev btn btn-default pull-right">PREVIOUS</a>
                                    <span  class="garment_price btn btn-default pull-right">$<?php echo $price;?></span>
                                </div>

                                </div>
                            </div>
                        </nav>

                        <div class="garment_container" style="min-height: 1300px">
                            <div class="garment_blocks">
                                <div class="garment_block garment_block_config">
                                    <div class="config_block config_block_woman_jacket" data-block="woman_jacket">
                                        <div class="config_block_title" style="display:none;">Jacket</div>
                                        <div class="config_field jacket_fit">
                                            <div class="box_title">FIT(WAISTED):</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_fit" value="baggy" /> Classic</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_fit" value="slim" checked="checked" /> Slim fit</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_style">
                                            <div class="box_title">LOOK:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_style" value="simple" checked="checked" /> Single breasted</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_style" value="crossed" /> Double breasted</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_style" value="no_flaps" /> Without lapels</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_style_lapel">
                                            <div class="box_title">LAPEL STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_style_lapel_standard.jpg" alt="Notch" pagespeed_url_hash="2056271834" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_style_lapel" value="standard" />Notch</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_style_lapel_peak.jpg" alt="Peak" pagespeed_url_hash="4080325040" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_style_lapel" value="peak" checked="checked" />Peak</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_style_lapel_round.jpg" alt="Rounded" pagespeed_url_hash="209526683" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_style_lapel" value="round" />Rounded</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_wide_lapel">
                                            <div class="box_title">LAPEL WIDTH:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_wide_lapel" value="standard" checked="checked" /> Standard</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_wide_lapel" value="width" /> Wide</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_buttons">
                                            <div class="box_title">NUMBER OF BUTTONS:</div>
                                            <div class="clearfix"></div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_buttons" value="1" /> 1</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_buttons" value="2" checked="checked" /> 2</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_buttons" value="3" /> 3</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_buttons" value="4" /> 4</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_buttons" value="6" /> 6</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_length">
                                            <div class="box_title">LENGTH:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_length" value="short" /> Short</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_length" value="long" checked="checked" /> Long</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_breast_pocket">
                                            <div class="box_title">CHEST POCKET:</div>
                                            <div class="box_opt box_opt_radio mobile_layer" icon-fixed="x">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_breast_pocket" value="yes" checked="checked" /> Yes</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="jacket_breast_pocket" value="no" /> No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_hip_pockets">
                                            <div class="box_title">POCKET STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer" icon-fixed="d">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_hip_pockets_no.jpg" alt="No pockets" pagespeed_url_hash="1558099933" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="no" />No pockets</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_hip_pockets_with_flap.jpg" alt="With flap" pagespeed_url_hash="1801839524" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="with_flap" checked="checked" />With flap</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_hip_pockets_diagonal_flap.jpg" alt="Slanted flap" pagespeed_url_hash="1520677497" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="diagonal_flap" />Slanted flap</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_hip_pockets_double_live.jpg" alt="Double welt" pagespeed_url_hash="4197197048" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="double_live" />Double welt</label>
                                                </div>
                                                <div style="display: block; float: left;">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_hip_pockets_diagonal_double_live.jpg" alt="Slanted double welt" pagespeed_url_hash="3071816220" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="diagonal_double_live" />Slanted double welt</label>
                                                    <!--<label class="option option_image t4l_radio"><img src="images/personalize/woman_jacket/jacket_hip_pockets_patched.jpg" alt="Patched" pagespeed_url_hash="2294229033" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_hip_pockets" value="patched" />Patched</label>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_sleeves">
                                            <div class="box_title">SLEEVES:</div>
                                            <div class="clearfix"></div>
                                            <div class="box_opt box_opt_image mobile_layer" icon-fixed="T">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_sleeves_no.jpg" alt="No buttons" pagespeed_url_hash="3959823775" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_sleeves" value="no" />No buttons</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_sleeves_2_buttons.jpg" alt="2 Buttons" pagespeed_url_hash="120498304" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_sleeves" value="2_buttons" checked="checked" />2 Buttons</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_sleeves_3_buttons.jpg" alt="3 Buttons" pagespeed_url_hash="1205020273" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_sleeves" value="3_buttons" />3 Buttons</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_finishing">
                                            <div class="box_title">HEMLINE:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_finishing_open.jpg" alt="Cutaway" pagespeed_url_hash="885429228" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_finishing" value="open" />Cutaway</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_finishing_straight.jpg" alt="Straight" pagespeed_url_hash="203828708" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_finishing" value="straight" />Straight</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_finishing_rounded.jpg" alt="Rounded" pagespeed_url_hash="2679673909" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_finishing" value="rounded" checked="checked" />Rounded</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field jacket_back_style">
                                            <div class="box_title">BACK STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_back_style_uncut.jpg" alt="Ventless" pagespeed_url_hash="2229018953" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_back_style" value="uncut" checked="checked" />Ventless</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_back_style_1_cut.jpg" alt="Center vent" pagespeed_url_hash="3712967136" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_back_style" value="1_cut" />Center vent</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_jacket/jacket_back_style_2_cut.jpg" alt="Side vents" pagespeed_url_hash="4133529473" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="jacket_back_style" value="2_cut" />Side vents</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="config_block config_block_woman_skirt" data-block="woman_skirt">
                                        <div class="config_block_title">Skirt</div>
                                        <div class="config_field skirt_style">
                                            <div class="box_title">LOOK:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_style_tube.jpg" alt="Straight" pagespeed_url_hash="547461104" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_style" value="tube" checked="checked" />Straight</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl;?>assets/images/personalize/woman_skirt/skirt_style_flight.jpg" alt="Flared" pagespeed_url_hash="1223856496" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_style" value="flight" />Flared</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_length">
                                            <div class="box_title">LENGTH:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_length" value="short" /> Short</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_length" value="medium" checked="checked" /> Medium</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_length" value="long" /> Long</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_front_closure">
                                            <div class="box_title">FASTENING:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_center_button.jpg" alt="Standard" pagespeed_url_hash="391970574" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="center_button" />Standard</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_center_no_button.jpg" alt="No button" pagespeed_url_hash="2196761082" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="center_no_button" checked="checked" />No button</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_moved_no_button.jpg" alt="Displaced: No button" pagespeed_url_hash="4111858106" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="moved_no_button" />Displaced: No button</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_moved_button.jpg" alt="Displaced" pagespeed_url_hash="442763854" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="moved_button" />Displaced</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_closure_side_zipper.jpg" alt="Zipper" pagespeed_url_hash="1245208650" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_closure" value="side_zipper" />Side Zipper</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_cut">
                                            <div class="box_title">VENT:</div>
                                            <div class="box_opt box_opt_image mobile_layer">
                                                <div class="box_opt_fix">
                                                    
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_cut_front.jpg" alt="On the front" pagespeed_url_hash="2037846964" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="front" />Front</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_cut_back.jpg" alt="On the back" pagespeed_url_hash="2884120262" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="back" />Back</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_cut_uncut.jpg" alt="Ventless" pagespeed_url_hash="2082597360" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="uncut" checked="checked" />Ventless</label>
                                                    <!--<label class="option option_image t4l_radio"><img src="images/personalize/woman_skirt/skirt_cut_side.jpg" alt="On the side" pagespeed_url_hash="3513832406" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_cut" value="side" />On the side</label>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_belt_loops">
                                            <div class="box_title">BELT LOOPS:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_belt_loops" value="with" /> With</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_belt_loops" value="without" checked="checked" /> Without</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_crotch">
                                            <div class="box_title">CROTCH:</div>
                                            <div class="box_opt box_opt_radio mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_crotch" value="low" /> Low</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_crotch" value="medium" /> Medium</label>
                                                    <label class="option option_radio t4l_radio">
                                                        <input type="radio" name="skirt_crotch" value="high" checked="checked" /> High</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_belt_loops_property">
                                            <div class="box_title">WAISTBAND:</div>
                                            <div class="clearfix"></div>
                                            <div class="box_opt box_opt_checkbox mobile_layer">
                                                <div class="box_opt_fix">
                                                    <label class="option option_checkbox t4l_checkbox">
                                                        <input type='checkbox' name='skirt_belt_loops_property' value='high' checked='checked'>High</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="config_field skirt_front_pocket">
                                            <div class="box_title">FRONT POCKET STYLE:</div>
                                            <div class="box_opt box_opt_image mobile_layer" icon-fixed="m">
                                                <div class="box_opt_fix">
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_no.jpg" alt="Without" pagespeed_url_hash="1930668920" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="no" checked="checked" />Without</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_rounded.jpg" alt="Rounded" pagespeed_url_hash="1709118780" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="rounded" />Rounded</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_straight.jpg" alt="Vertical" pagespeed_url_hash="1910125689" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="straight" />Vertical</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_inclined.jpg" alt="Diagonal" pagespeed_url_hash="1689083993" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="inclined" />Diagonal</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_front_pocket_one_living.jpg" alt="Welted" pagespeed_url_hash="2132737049" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_front_pocket" value="one_living" />Welted</label>
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
                                                        <input type="radio" name="skirt_back_pocket_type" value="two_living" />Double welt</label>
                                                    <label class="option option_image t4l_radio"><img src="<?php echo $homeurl; ?>assets/images/personalize/woman_skirt/skirt_back_pocket_type_button.jpg" alt="Double welted with button" pagespeed_url_hash="2915032726" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                        <input type="radio" name="skirt_back_pocket_type" value="button" checked="checked" />Welted with button</label>
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
                                    </div>
                                </div>
                                 <div class="garment_block garment_block_fabric">

                                 <div class="row step_block_selector fabric_block_selector" style="display: none;">

                                  <div class="step_block_selector_enable fabric_block_selector_enable">
                                      <label class="t4l_checkbox">
                                        <input type="checkbox" class="multiple_fabric" name="multiple_fabric"> Select a different fabric for each garment
                                      </label>
                                    </div>
                                      <div class="col-md-3">
                                        <a href="#fabric_block_woman_jacket" class="selector woman_jacket current">
                                          <span>Jacket</span>
                                        </a>
                                      </div>
                                      <div class="col-md-3">
                                        <a href="#fabric_block_woman_skirt"  class="selector woman_skirt">
                                          <span>Skirt</span>
                                        </a>
                                      </div>
                                    </div>

                                   
                                    
                                    <div class="fabric_block fabric_block_woman_jacket" data-block-name="woman_jacket">
                                        <div class="fabric_block_title">Jacket</div>
                                            <div class="fabric_preview fabric_preview_woman_jacket" style="display:block;">
                                               <div class="infobar" style="width:650px;">
                                                    <span class="title fabric_main_title"><?php echo $fab_title;?></span>
                                                    <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc); ?></span>
                                                </div>
                                                <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img style="width:650px;" src="<?php echo $homeurl.$fab_img;?>" class="fabric_main_image"></a>
                                            </div>
                                            <input type="hidden" class="fabric_input required" name="woman_jacket" data-block-name="woman_jacket" value="<?php echo $_SESSION['fabID']; ?>" />
                                            <div class="fabric_filters">
                                                <input type="hidden" name="fabric_block" value="woman_jacket" />
                                            </div>
                                            <div class="fabric_list loaded">
                                             <?php $fab=$site->get_fabrics('',$fabric_list);
                                                    //print_r($fab);
                                                    foreach ($fab as $key => $value) {
                                                    ?>
                                                <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid){?> current <?php }?>">
                                                    <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
                                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img']; ?>" alt="<?php echo $fab[$key]['fab_name'];?>">
                                                    </a>
                                                    <div class="price price_part">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                                    <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                                    <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
                                                </div>
                                                <?php }?>
                                               <!-- <div class="fabric_thumb fabric_862">
                                                    <a href="javascript:void(0);" class="select " rel="862">
                                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl; ?>assets/dimg/fabric/suit/862_normal.jpg" alt="Tasmania">
                                                    </a>
                                                    <div class="price price_part">+9$</div>
                                                    <div class="price price_total">+15$</div>
                                                    <div class="title fabric_title">Tasmania</div>
                                                    <div class="composition">Velvet</div>
                                                </div>-->
                                            </div>
                                        </div>

                                    <div class="fabric_block fabric_block_woman_skirt" data-block-name="woman_skirt">
                                        <div class="fabric_block_title">Skirt</div>
                                            <div class="fabric_preview fabric_preview_woman_skirt" style="display:block;">
                                               <div class="infobar" style="width:650px;">
                                                    <span class="title fabric_main_title"><?php echo $fab_title;?></span>
                                                    <span class="composition fabric_main_composition" style="clear:both;float:left;"><?php echo strip_tags($fab_desc); ?></span>
                                                </div>
                                                <a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ','-',$fab_title); ?>"><img style="width:650px;" src="<?php echo $homeurl.$fab_img;?>" class="fabric_main_image"></a>
                                            </div>
                                            <input type="hidden" class="fabric_input required" name="woman_skirt" data-block-name="woman_skirt" value="<?php echo $_SESSION['fabID']; ?>" />
                                            <div class="fabric_filters">
                                                <input type="hidden" name="fabric_block" value="woman_skirt" />
                                            </div>
                                            <div class="fabric_list loaded">
                                             <?php $fab=$site->get_fabrics('',$fabric_list);
                                                    //print_r($fab);
                                                    foreach ($fab as $key => $value) {
                                                    ?>
                                                <div class="fabric_thumb fabric_<?php echo $fab[$key]['f_rand'];?> <?php if($fab[$key]['f_rand']==$fabid){?> current <?php }?>">
                                                    <a href="javascript:void(0);" class="select loading" rel="<?php echo $fab[$key]['f_rand'];?>">
                                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl.$fab[$key]['fab_img']; ?>" alt="<?php echo $fab[$key]['fab_name'];?>">
                                                    </a>
                                                    <div class="price price_part">+<?php echo $fab[$key]['fab_price'];?>$</div>
                                                    <div class="title fabric_title"><?php echo $fab[$key]['fab_name'];?></div>
                                                    <div class="composition"><?php echo strip_tags($fab[$key]['fab_desc']);?></div>
                                                </div>
                                                <?php }?>
                                               <!-- <div class="fabric_thumb fabric_862">
                                                    <a href="javascript:void(0);" class="select " rel="862">
                                                        <img class="b-lazy b-loaded" src="<?php echo $homeurl; ?>assets/dimg/fabric/suit/862_normal.jpg" alt="Tasmania">
                                                    </a>
                                                    <div class="price price_part">+9$</div>
                                                    <div class="price price_total">+15$</div>
                                                    <div class="title fabric_title">Tasmania</div>
                                                    <div class="composition">Velvet</div>
                                                </div>-->
                                            </div>
                                        </div>
    
                                 </div>
                                <div class="garment_block garment_block_extra">
                                    <div class="extra_block extra_block_woman_jacket" data-block-name="woman_jacket">
                                        <div class="extra_container jacket_lining extra_container_lining active" data-extra-name="jacket_lining" data-extra-type="lining" info-icon="R">
                                          <a href="javascript:void(0);" class="discard">
                                            Delete
                                          </a>
                                          <div class="extra_title">
                                            Customize Lining
                                          </div>
                                          <div class="extra_content" style="display: block;">
                                            <div class="extra_field">
                                              <input type="hidden" name="jacket_lining" class="id jacket_lining" value="<?php echo $lining[1];?>"/>
                                                <div class="lining_slider_contents" data-name="jacket_lining">
                                                  <div class="fabric_thumb lining_thumb lining_121" value="121">
                                                    <a href="javascript:void(0);" data-id="121" class="extra_select">
                                                     <img class="b-lazy image b-loaded" src="<?php echo $homeurl; ?>assets/dimg/lining/default/121_normal.jpg" alt="">
                                                    </a>
                                                    <div class="price">9.95$</div>
                                                    <div class="title">Paris</div>
                                                 </div>
                                                 <div class="fabric_thumb lining_thumb lining_96" value="96">
                                                   <a href="javascript:void(0);" data-id="96" class="extra_select">
                                                     <img class="b-lazy image b-loaded" src="<?php echo $homeurl; ?>assets/dimg/lining/default/96_normal.jpg" alt="">
                                                   </a>
                                                   <div class="price">14.95$</div>
                                                   <div class="title">Cergy</div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="extra_container jacket_initials extra_container_initials" data-extra-name="jacket_initials" data-extra-type="initials" info-icon="J"><a href="javascript:void(0);" class="discard">Delete</a>
                                            <div class="extra_title">Add monogram</div>
                                            <div class="extra_content">
                                                <input type="hidden" class="initials_price" name="initials_price" value="9.95">
                                                <div class="extra_field extra_field_initials_text required">
                                                    <div class="box_title">WRITE HERE:</div>
                                                    <div class="box_opt">
                                                        <div class="box_opt_fix">
                                                            <input value="" type="text" name="initials_text" class="text initials_text" placeholder="Type your initials" maxlength="10">
                                                            <span class="extra_price">(+ 9.95$ )</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="extra_field extra_field_initials_fonts required">
                                                    <div class="box_title">FONT:</div>
                                                    <div class="box_opt">
                                                        <div class="box_opt_fix">
                                                            <label class="t4l_radio garamond">
                                                                <input type="radio" class="font" name="initials_font" value="garamond"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/garamond.png" alt="Garamond" pagespeed_url_hash="2694130881" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                            </label>
                                                            <label class="t4l_radio harrington">
                                                                <input type="radio" class="font" name="initials_font" value="harrington"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/harrington.png" alt="Harrington" pagespeed_url_hash="3894416190" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                            </label>
                                                            <label class="t4l_radio times">
                                                                <input type="radio" class="font" name="initials_font" value="times"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/times.png" alt="Times new Roman" pagespeed_url_hash="500874088" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                            </label>
                                                            <label class="t4l_radio arial">
                                                                <input type="radio" class="font" name="initials_font" value="arial"><img src="<?php echo $homeurl;?>assets/images/personalize/initials/arial.png" alt="Arial" pagespeed_url_hash="946517873" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="extra_field extra_field_initials_color required">
                                                    <div class="box_title">INITIALS COLOR:</div>
                                                    <div class="box_opt">
                                                        <div class="box_opt_fix">
                                                            <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="ffcf10"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="ffcf10"){?> checked <?php }?> type="radio" class="color" data-color="ffcf10" name="initials_color" value="ffcf10"> <span class="thread_color" style="background: #ffcf10"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color  <?php if($color[1]=="4477cf"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="4477cf"){?> checked <?php }?> type="radio" class="color" data-color="4477cf" name="initials_color" value="4477cf"> <span class="thread_color" style="background: #4477cf"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="ffffff"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="ffffff"){?> checked <?php }?> type="radio" class="color" data-color="ffffff" name="initials_color" value="ffffff"> <span class="thread_color" style="background: #ffffff"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="a48239"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="a48239"){?> checked <?php }?> type="radio" class="color" data-color="a48239" name="initials_color" value="a48239"> <span class="thread_color" style="background: #a48239"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="4d020d"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="4d020d"){?> checked <?php }?> type="radio" class="color" data-color="4d020d" name="initials_color" value="4d020d"> <span class="thread_color" style="background: #4d020d"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b3b3b3"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="b3b3b3"){?> checked <?php }?> type="radio" class="color" data-color="b3b3b3" name="initials_color" value="b3b3b3"> <span class="thread_color" style="background: #b3b3b3"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="331b00"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="331b00"){?> checked <?php }?> type="radio" class="color" data-color="331b00" name="initials_color" value="331b00"> <span class="thread_color" style="background: #331b00"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="000000"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="000000"){?> checked <?php }?> type="radio" class="color" data-color="000000" name="initials_color" value="000000"> <span class="thread_color" style="background: #000000"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b80e58"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="b80e58"){?> checked <?php }?> type="radio" class="color" data-color="b80e58" name="initials_color" value="b80e58"> <span class="thread_color" style="background: #b80e58"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="0ba133"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="0ba133"){?> checked <?php }?> type="radio" class="color" data-color="0ba133" name="initials_color" value="0ba133"> <span class="thread_color" style="background: #0ba133"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="c20000"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="c20000"){?> checked <?php }?> type="radio" class="color" data-color="c20000" name="initials_color" value="c20000"> <span class="thread_color" style="background: #c20000"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="ff7912"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="ff7912"){?> checked <?php }?> type="radio" class="color" data-color="ff7912" name="initials_color" value="ff7912"> <span class="thread_color" style="background: #ff7912"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="5f1970"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="5f1970"){?> checked <?php }?> type="radio" class="color" data-color="5f1970" name="initials_color" value="5f1970"> <span class="thread_color" style="background: #5f1970"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color <?php if($color[1]=="b8f2f2"){?> checked1 <?php }?>">
                                                                <input <?php if($color[1]=="b8f2f2"){?> checked <?php }?> type="radio" class="color" data-color="b8f2f2" name="initials_color" value="b8f2f2"> <span class="thread_color" style="background: #b8f2f2"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_container jacket_neck extra_container_colors" data-extra-name="jacket_neck" data-extra-type="colors" info-icon="o" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                            <div class="extra_title">Neck lining</div>
                                            <div class="extra_content">
                                                <div class="extra_field required extra_field_image contrast" data-field-name="contrast">
                                                    <div class="box_opt box_opt_no_title">
                                                        <div class="box_opt_fix">
                                                            <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABBAEEDASIAAhEBAxEB/8QAGwABAAMBAQEBAAAAAAAAAAAAAAQFBgMCBwj/xAA4EAACAQQBAgQCBwUJAAAAAAABAgMABAURBhIhBxMxURVBFBYiMmFxgRdCQ5GhI0RygpKVorHT/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AP2XSlKBSlKBSlQM7lbXDY/6delhF50MH2db6pZVjX1IH3nFBPpSlApSlBBz+PTLYLIYuRyiXltJbswOiA6ld/1qm8KMxJn/AA045mJzue5x0LTHWtyBAGI/DqBrT18i49yTIeHnA8bxnIcYyc2TsWFjEylTDfPskNCwJZy42QgXa9+rpUFgG98P85Ln+NpdXSCO+t55rK9QDQWeGRo5NDv2JUsO57EV05Ny7jPGiiZzN2VlNINxQPJuaX/BGNu/+UGsTxThnMJ1ypyeZfjWLyeSmyJx2McNeAylSyyXXog2CSIlB+12kNbTjPDuMcblluMNhrW2upiTNdkGS4lJ9euV9u36k0FGvidi5iTZ8a5rdxD0lj45dKjDetgui7rP+K/JrzPeH2Tx+K4dy9rqQRvD1YlgC8ciSa1vq79Ot6/WvrVKDJL4gYCLXxaLLYNT/EyeNmt4R+cxXyx+rVqbeaK4gjnglSWGRQ8ciMGV1I2CCOxBHzqByy4Wz4rlrtm6VgsZpCfYKhO/6VA8MUEfhtxhAAAuHtBoDX8FKDRUpSgVl4bOO68ULu+uIVl+H4m3jtHY78p5ZZ/O6R8iVjh2fmAK4+LWSydhxNIMJdNa5TJ39rjraZVDNGZplV3AbttY/MYb+a168PLHJ2c+d+MZM5S7W+WBbpoFiaSJIYyvUq9urbNsjQPqAN6oNPc3EFtF5txMkSb11O2hv2/OoEt3k7k9ONsliQ/3i92oA91jH2m/Jin4E1Q8o53xfHZP4XDf/T86qnpssbate3arsA/YTfl+o7voe9U7S87zDMw4DZC36x0/WLODqdfcwW8csan0133/AFoNBc3tmsjJec+it5gdPHA9rGoPsFdWYf6ia4ibjbt1tm8zeFv3obu5I/lFoVzgbxKjjEUGG4ZZxIQI40yFw4C+3aBdfy/77e5P2nsf7McOi7fvG5fv/wAaD3cQcdu7Sa0kPJZYZ0ZHHVkGBUgg+uxr1rj4KXjTeHWNxtw0n07Cr8KvFkUq4kgAQFg3cdShHG/k4qXB+0MO/n/VZ1P3QnnqR2+e97769qhwxcnxWdmztzhrCaG5hEeQjxtyzyyFCPLmVHRdlVLhgGLMOnQJUAhtaVQfW/C+2U/2m6/86UGO5Tym25JyHj6cSxl9yqPGXkl7JNYdK2gkELxIrXLkRkblZiELMOgdqshwrOcgkkuOZchmjhnPVJicJI9rbka10ySgiWU6ABIKA6+7qt4iKiBEUKqjQAGgK9UFXxvj2C43YCwwGIssZbfOO2hCBj7nXqfxOzVpSlApSlApSlApSlApSlApSlApSlApSlApSlB//9k=" alt="By default" pagespeed_url_hash="4166946281" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                <input type="radio" name="jacket_neck[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                            </label>
                                                            <label class="option option_image t4l_radio"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABBAEEDASIAAhEBAxEB/8QAHAABAAICAwEAAAAAAAAAAAAAAAQGBQcBAgMI/8QAOBAAAQMDAgQEAQgLAAAAAAAAAQIDEQAEBQYhBxIxQRMiUWGBFBUWMlJxgpEjM0JTVnKSlKGx0f/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APsulKUClKUClKguZW0Rn2cIVKN29auXSQIgNoWhJneeqxG3Y/EJ1KUoFKUoKXxQuFY650llkLKSxqG3YUnstNyldsQfuLwV+GspxBzjumtLvZ1CApmzeZcuhEkW/ioDyhuN0oKlfCofFTF5DJ6at1Yy1N5cY/J2eR+SpcCFXCWH0OlCVHYKITtJAkAEiZqm8R9XXOp8LlNFY/S18XspjnGHVXribc2viIIStwDm5QOsHzGNk8srAbeqpZjiNo7G3Tln87DIXragldrjWV3jqFEwApLQVyH+aKpz2HyGcYDesc5cZNooCDYWnNbWcQAQpAJW7Jj9YpQ6QkExWZx1vj8baC1x9oxaW43DbDaUI6dYG3SfhPaSuUSm+J2McTzo05q0pIkFWHcTtE9FQelV7J6qdd4p4HOt6Y1Kiztsde2VyVWAJSXXGFIUOVRkSyue4jpNWLxgPMSuZ2336/n1HtuOxBKOvjA/a/x7e33dvTb6qSozWG1rpzKXiLFq/VbXrhhFresOWrqzEwlLqUle2/lmrFWrcw6HNQ6VaHMSrMoJBBI2aeM7bde5J3mJMlW0qoUpSgVq3S1vONVfcpDuQfcvHFE8yl+IsqSSR18vIB1iB1hIEjiDk9Tva2dx+nsy5jmcLgXMtcITaoeTcvKcKWWnArcoKWntklJmDOwqXice1itO2bFxcNJbtbVttbq1AJhKAJk7R19t/QnmDzedbaV4Zc5llMhtKeZREHePTrudveJKo7xyBbU846xj2Ykqd87gM7zuEpI+9W/oQeTFHUttk3nW9HWmQ1E6kq51YtlKWC5MQq5dIaHrsoq2HeIlsYHXTyxc/RbTTKoHJ8tzTrjyI2A5hbqA27AxPtFSDq4/YKV+k1OpY+wh1odz9hIPQAfhG2wB6j5qIMXmTcPcpcuDP1vQx3V3+PUnKN4biGoguW2lkDuE3twuOvctCev++smeUYHiCTK3dLp9gXzB23mB3Ht29BCCsanXa2LFhnGRk3DiMgzeKDjdwoeGlQS9uoQD4ZXvt6HrA3Qy428yh5lxLja0hSFpMhQIkEHuKoowWs/CAcGnnDEEBx1KTtv1QY7+v5SKmaaub3S9izh89ZtW1g2SizvLZwu27Lf7LThKUlvlGwURywEgq5utFxpXTxmf3qP6hSg1bhshqXM6m1DldL6dft28obdhjK5ppTNum3abMKTbkh5xRWt0gEISQUnm7VmbHhhh3i09qu9u9UPN7oavSE2bZiPJbJhERt5+c+9XylB527LNuwhi3abZaQIQhtISlI9AB0r0pSgUpSgVwpKVJKVAKSRBBGxFc0oK59BNF/wphf7NH/KVY6UClKUClKUClKUClKUClKUH/9k=" alt="Custom color" pagespeed_url_hash="3210468751" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                <input type="radio" name="jacket_neck[contrast]" value="custom" data-field-name="contrast" data-price="3.95"><span class="name">Custom color</span><span class="price">+3,95€</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="extra_field required extra_field_neck_lining color" data-field-name="color">
                                                    <input type="hidden" name="jacket_neck[color]" value="">
                                                    <div class="fabric_thumb thread_thumb " data-id="2"><a href="javascript:;"><span class="image" style="background: #d89f6b"></span></a>
                                                    </div>
                                                    <div class="fabric_thumb thread_thumb " data-id="3"><a href="javascript:;"><span class="image" style="background: #ea1c1e"></span></a>
                                                    </div>
                                                    <div class="fabric_thumb thread_thumb " data-id="5"><a href="javascript:;"><span class="image" style="background: #b2a995"></span></a>
                                                    </div>
                                                    <div class="fabric_thumb thread_thumb " data-id="4"><a href="javascript:;"><span class="image" style="background: #212534"></span></a>
                                                    </div>
                                                    <div class="fabric_thumb thread_thumb " data-id="6"><a href="javascript:;"><span class="image" style="background: #34322c"></span></a>
                                                    </div>
                                                    <div class="fabric_thumb thread_thumb " data-id="1"><a href="javascript:;"><span class="image" style="background: #e7e7e7"></span></a>
                                                    </div>
                                                    <div class="fabric_thumb thread_thumb " data-id="7"><a href="javascript:;"><span class="image" style="background: #1f1f1f"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_container jacket_patches extra_container_colors" data-extra-name="jacket_patches" data-extra-type="colors" info-icon="q" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                            <div class="extra_title">Add elbow patches </div>
                                            <div class="extra_content">
                                                <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
                                                    <div class="box_opt box_opt_no_title">
                                                        <div class="box_opt_fix">
                                                            <label class="option option_radio t4l_radio">
                                                                <input type="radio" name="jacket_patches[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                            </label>
                                                            <label class="option option_radio t4l_radio">
                                                                <input type="radio" name="jacket_patches[contrast]" value="custom" data-field-name="contrast" data-price="12.95"><span class="name">Custom color</span><span class="price">+12,95€</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="extra_field required extra_field_patches color" data-field-name="color">
                                                    <input type="hidden" name="jacket_patches[color]" value="">
                                                    <div class="fabric_thumb patch_thumb " data-id="55"><a href="javascript:;"><span class="image" style="background:url(<?php echo $homeurl; ?>assets//dimg/patches/default/x55_thumb.jpg.pagespeed.ic.b_t9mMJkHE.jpg)"></span></a>
                                                        <div class="title">Black</div>
                                                    </div>
                                                    <div class="fabric_thumb patch_thumb " data-id="56"><a href="javascript:;"><span class="image" style="background:url(<?php echo $homeurl; ?>assets//dimg/patches/default/x56_thumb.jpg.pagespeed.ic.wqJfpJ01vZ.jpg)"></span></a>
                                                        <div class="title">Brown</div>
                                                    </div>
                                                    <div class="fabric_thumb patch_thumb " data-id="57"><a href="javascript:;"><span class="image" style="background:url(<?php echo $homeurl; ?>assets//dimg/patches/default/x57_thumb.jpg.pagespeed.ic.Kgy_HNRBZQ.jpg)"></span></a>
                                                        <div class="title">Beige</div>
                                                    </div>
                                                    <div class="fabric_thumb patch_thumb " data-id="58"><a href="javascript:;"><span class="image" style="background:url(<?php echo $homeurl; ?>assets//dimg/patches/default/x58_thumb.jpg.pagespeed.ic.vRTOnEEYcZ.jpg)"></span></a>
                                                        <div class="title">Brown-Grey</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_container jacket_metal_button extra_container_colors" data-extra-name="jacket_metal_button" data-extra-type="colors" info-icon="N" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                            <div class="extra_title">Type of Buttons</div>
                                            <div class="extra_content">
                                                <div class="extra_field required extra_field_radio contrast" data-field-name="contrast">
                                                    <div class="box_opt box_opt_no_title">
                                                        <div class="box_opt_fix">
                                                            <label class="option option_radio t4l_radio">
                                                                <input type="radio" name="jacket_metal_button[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                            </label>
                                                            <label class="option option_radio t4l_radio">
                                                                <input type="radio" name="jacket_metal_button[contrast]" value="custom" data-field-name="contrast" data-price="10.9"><span class="name">Custom color</span><span class="price">+10,9€</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="extra_field required extra_field_metal_button type" data-field-name="type">
                                                    <div class="box_opt box_opt_no_title">
                                                        <div class="box_opt_fix">
                                                            <label class="option option_image t4l_radio metal_b"><img src="/images/personalize/jacket_metal_button/type/x50.jpg.pagespeed.ic.1l33fuohZ_.jpg" alt="Custom color" pagespeed_url_hash="613382272" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                <input type="radio" name="jacket_metal_button[type]" value="50" data-field-name="type" data-price="10.9">
                                                            </label>
                                                            <label class="option option_image t4l_radio metal_b"><img src="data:image/jpeg;base64,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" alt="Custom color" pagespeed_url_hash="907882193" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                <input type="radio" name="jacket_metal_button[type]" value="51" data-field-name="type" data-price="10.9">
                                                            </label>
                                                            <label class="option option_image t4l_radio metal_b"><img src="data:image/jpeg;base64,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" alt="Custom color" pagespeed_url_hash="1202382114" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                <input type="radio" name="jacket_metal_button[type]" value="52" data-field-name="type" data-price="10.9">
                                                            </label>
                                                            <label class="option option_image t4l_radio metal_b"><img src="data:image/jpeg;base64,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" alt="Custom color" pagespeed_url_hash="1496882035" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                                <input type="radio" name="jacket_metal_button[type]" value="53" data-field-name="type" data-price="10.9">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra_container jacket_threads extra_container_threads" data-extra-name="jacket_threads" data-extra-type="threads" info-icon="V" style="visibility:hidden;"><a href="javascript:void(0);" class="discard">Delete</a>
                                            <div class="extra_title">Add colored button threads</div>
                                            <div class="extra_content">
                                                <div class="extra_field extra_field_radio contrast" data-field-name="contrast">
                                                    <div class="box_opt box_opt_no_title">
                                                        <div class="box_opt_fix">
                                                            <label class="option option_radio t4l_radio">
                                                                <input type="radio" name="jacket_threads[contrast]" value="default" data-field-name="contrast" data-price="0" checked="1"><span class="name">By default</span>
                                                            </label>
                                                            <label class="option option_radio t4l_radio">
                                                                <input type="radio" name="jacket_threads[contrast]" value="all" data-field-name="contrast" data-price="4.5"><span class="name">All</span><span class="price"> (+4,5€)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="extra_field color required extra_field_threads threads" data-field-name="threads">
                                                    <div class="box_title">BUTTON THREADS:</div>
                                                    <div class="box_opt">
                                                        <div class="box_opt_fix">
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="ffcf10" name="jacket_threads[threads][color]" data-field-name="threads-color" value="9"> <span class="thread_color" style="background: #ffcf10"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="4477cf" name="jacket_threads[threads][color]" data-field-name="threads-color" value="11"> <span class="thread_color" style="background: #4477cf"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="ffffff" name="jacket_threads[threads][color]" data-field-name="threads-color" value="12"> <span class="thread_color" style="background: #ffffff"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="a48239" name="jacket_threads[threads][color]" data-field-name="threads-color" value="13"> <span class="thread_color" style="background: #a48239"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="4d020d" name="jacket_threads[threads][color]" data-field-name="threads-color" value="14"> <span class="thread_color" style="background: #4d020d"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="b3b3b3" name="jacket_threads[threads][color]" data-field-name="threads-color" value="15"> <span class="thread_color" style="background: #b3b3b3"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="331b00" name="jacket_threads[threads][color]" data-field-name="threads-color" value="16"> <span class="thread_color" style="background: #331b00"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="000000" name="jacket_threads[threads][color]" data-field-name="threads-color" value="17"> <span class="thread_color" style="background: #000000"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="b80e58" name="jacket_threads[threads][color]" data-field-name="threads-color" value="18"> <span class="thread_color" style="background: #b80e58"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="0ba133" name="jacket_threads[threads][color]" data-field-name="threads-color" value="19"> <span class="thread_color" style="background: #0ba133"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="c20000" name="jacket_threads[threads][color]" data-field-name="threads-color" value="25"> <span class="thread_color" style="background: #c20000"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="ff7912" name="jacket_threads[threads][color]" data-field-name="threads-color" value="31"> <span class="thread_color" style="background: #ff7912"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="5f1970" name="jacket_threads[threads][color]" data-field-name="threads-color" value="32"> <span class="thread_color" style="background: #5f1970"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="b8f2f2" name="jacket_threads[threads][color]" data-field-name="threads-color" value="33"> <span class="thread_color" style="background: #b8f2f2"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="extra_field color required extra_field_holes holes" data-field-name="holes">
                                                    <div class="box_title">BUTTON HOLES:</div>
                                                    <div class="box_opt">
                                                        <div class="box_opt_fix">
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="ffcf10" name="jacket_threads[holes][color]" data-field-name="holes-color" value="9"> <span class="thread_color" style="background: #ffcf10"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="4477cf" name="jacket_threads[holes][color]" data-field-name="holes-color" value="11"> <span class="thread_color" style="background: #4477cf"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="ffffff" name="jacket_threads[holes][color]" data-field-name="holes-color" value="12"> <span class="thread_color" style="background: #ffffff"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="a48239" name="jacket_threads[holes][color]" data-field-name="holes-color" value="13"> <span class="thread_color" style="background: #a48239"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="4d020d" name="jacket_threads[holes][color]" data-field-name="holes-color" value="14"> <span class="thread_color" style="background: #4d020d"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="b3b3b3" name="jacket_threads[holes][color]" data-field-name="holes-color" value="15"> <span class="thread_color" style="background: #b3b3b3"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="331b00" name="jacket_threads[holes][color]" data-field-name="holes-color" value="16"> <span class="thread_color" style="background: #331b00"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="000000" name="jacket_threads[holes][color]" data-field-name="holes-color" value="17"> <span class="thread_color" style="background: #000000"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="b80e58" name="jacket_threads[holes][color]" data-field-name="holes-color" value="18"> <span class="thread_color" style="background: #b80e58"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="0ba133" name="jacket_threads[holes][color]" data-field-name="holes-color" value="19"> <span class="thread_color" style="background: #0ba133"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="c20000" name="jacket_threads[holes][color]" data-field-name="holes-color" value="25"> <span class="thread_color" style="background: #c20000"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="ff7912" name="jacket_threads[holes][color]" data-field-name="holes-color" value="31"> <span class="thread_color" style="background: #ff7912"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="5f1970" name="jacket_threads[holes][color]" data-field-name="holes-color" value="32"> <span class="thread_color" style="background: #5f1970"></span>
                                                            </label>
                                                            <label class="t4l_radio t4l_radio_color">
                                                                <input type="radio" class="color" data-color="b8f2f2" name="jacket_threads[holes][color]" data-field-name="holes-color" value="33"> <span class="thread_color" style="background: #b8f2f2"></span>
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
                                    <div class="controls"><a href="javascript:;" class="icon toggle" data-icon="G" data-block="woman_jacket"><span class="h">HIDE JACKET</span><span class="s">SHOW JACKET</span></a><a href="javascript:;" class="icon zoom in" data-icon="O"><span class="h">ZOOM</span></a><a href="javascript:;" class="icon zoom out" data-icon="P"><span class="h">ZOOM</span></a>
                                        <a href="javascript:;" class="icon arrow_up disabled" data-icon="j"></a>
                                        <a href="javascript:;" class="icon arrow_down" data-icon="i"></a>
                                    </div>
                                    <div class="render3d resize_fix" style="margin-top: -40px;" resize_fix="margin-top: -40px; height: "></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clearfix visible-xs visible-sm"></div>
<!-- fixes floating problems when mobile menu is visible -->

</div>
<!-- End Skirt Suit Customizer -->

<?php } ?>


<!-- Fabric Information Modal -->

 <div id="<?php echo str_replace(' ','-',$fab_title); ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title fabric_main_title"><strong><?php echo $fab_title; ?></strong></h4>
      </div>
      <div class="modal-body">
        <img src="<?php echo $homeurl.$fab_img; ?>" class="fabric_main_image" style="height:150px;width:400px;"><br>                                                                              </p>
        <div class="infobar">
            <h4 class="modal-title title fabric_main_title"><strong><?php echo $fab_title;?></strong></h4>
            <h4 class="modal-title composition fabric_main_composition"><strong><?php echo strip_tags($fab_desc); ?></strong></h4>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
    </div>
  </div>

  <div id="<?php echo str_replace(' ','-',$fab_title1); ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title fabric_main_title"><strong><?php echo $fab_title1; ?></strong></h4>
      </div>
      <div class="modal-body">
        <img src="<?php echo $homeurl.$fab_img1; ?>" class="fabric_main_image" style="height:150px;width:400px;"><br>                                                                              </p>
        <div class="infobar">
            <h4 class="modal-title title fabric_main_title"><strong><?php echo $fab_title1;?></strong></h4>
            <h4 class="modal-title composition fabric_main_composition"><strong><?php echo strip_tags($fab_desc1); ?></strong></h4>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
    </div>
  </div>


