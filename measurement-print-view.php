<?php

  require_once('includes/action/config.php');

?>



<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="description" content=" ">

    <meta name="author" content=" ">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" >



    <title>Measurement Profile - Ot Koo Toor - Custom Clothing For Woman</title>



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/cssflexslider.css">

    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/cssfont-awesome.css">



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/cssbootstrap.css">

    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/cssstyle.css">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="bootstrap/<?php echo $homeurl;?>assets/jshtml5shiv.js"></script>

      <script src="bootstrap/<?php echo $homeurl;?>assets/jsrespond.min.js"></script>

    <![endif]-->



</head>

<body onload="javascript: window.print();">

<div class="wrapper">



  

  <ssction id="Content" role="main">

      <div class="container">



          <!-- SECTION EMPHASIS 1 -->

          <!-- FULL WIDTH -->

      </div><!-- !container -->

      <div class="full-width section-emphasis-1 page-header">

          <div class="container">

              

          </div>

      </div><!-- !full-width -->

      <div class="container">

          <!-- !FULL WIDTH -->

          <!-- !SECTION EMPHASIS 1 -->



          <section class="row">

              <div class="clearfix visible-xs space-30"></div>

              <div class="col-sm-9 space-left-30">

                 

                <!-- Measurement Print View -->

                <div class="" id="">

                  <div class="">

                  

                    <!-- Modal content-->

                    <div class="modal-content">

                      <div class="modal-header">

                        <h4 class="modal-title">Measurement Profile</h4>

                      </div>

                      <div class="modal-body">

                       <?php 

                          $measurement_dtl_qry = mysqli_query($con,'select * from measurement_profile_master where mp_id="'.$_GET['id'].'"');

                            if($measurement_dtl_qry) {

                              if(mysqli_num_rows($measurement_dtl_qry) > 0) {

                                $measurement_dtl=mysqli_fetch_array($measurement_dtl_qry)

                          ?>

                        <p><strong>Name:</strong> <?php echo $measurement_dtl['mp_name']; ?> </p>

                        <p><strong>Height:</strong> <?php echo $measurement_dtl['mp_height']; ?> </p>

                        <p><strong>Weight:</strong> <?php echo $measurement_dtl['mp_weight']; ?> </p>

                        <p><strong>Chest:</strong> <?php echo $measurement_dtl['mp_chest']; ?> </p>

                        <p><strong>Abdomen:</strong> <?php echo $measurement_dtl['mp_abdomen']; ?> </p>

                        <p><strong>Buttocks:</strong> <?php echo $measurement_dtl['mp_buttocks']; ?></p>

                        <p><strong>Hips:</strong> <?php echo $measurement_dtl['mp_hips']; ?></p>

                        <?php if(!empty($measurement_dtl['coat_length'])) { ?>

                        <p><strong>Coat Length:</strong> <?php echo $measurement_dtl['coat_length']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['torso_length'])) { ?>

                        <p><strong>Torso Length:</strong> <?php echo $measurement_dtl['torso_length']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['dress_length'])) { ?>

                        <p><strong>Dress Length:</strong> <?php echo $measurement_dtl['dress_length']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['sleeve_length'])) { ?>

                        <p><strong>Sleeve Length:</strong> <?php echo $measurement_dtl['sleeve_length']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['shoulder_width'])) { ?>

                        <p><strong>Shoulder Width:</strong> <?php echo $measurement_dtl['shoulder_width']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['neck'])) { ?>

                        <p><strong>Neck:</strong> <?php echo $measurement_dtl['neck']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['chest_around'])) { ?>

                        <p><strong>Chest Around:</strong> <?php echo $measurement_dtl['chest_around']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['stomach'])) { ?>

                        <p><strong>Stomach:</strong> <?php echo $measurement_dtl['stomach']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['breast_point'])) { ?>

                        <p><strong>Breast Point:</strong> <?php echo $measurement_dtl['breast_point']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['waist_point'])) { ?>

                        <p><strong>Waist Point:</strong> <?php echo $measurement_dtl['waist_point']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['pant_length'])) { ?>

                        <p><strong>Pants Length:</strong> <?php echo $measurement_dtl['pant_length']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['skirt_length'])) { ?>

                        <p><strong>Skirt Length:</strong> <?php echo $measurement_dtl['skirt_length']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['hips'])) { ?>

                        <p><strong>Hips:</strong> <?php echo $measurement_dtl['hips']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['waist'])) { ?>

                        <p><strong>Waist:</strong> <?php echo $measurement_dtl['waist']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['rise'])) { ?>

                        <p><strong>Rise:</strong> <?php echo $measurement_dtl['rise']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['thigh'])) { ?>

                        <p><strong>Thigh:</strong> <?php echo $measurement_dtl['thigh']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['bicep_around'])) { ?>

                        <p><strong>Bicep Around:</strong> <?php echo $measurement_dtl['bicep_around']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['pant_waist'])) { ?>

                        <p><strong>Pants Waist:</strong> <?php echo $measurement_dtl['pant_waist']; ?> <span>cm</span></p>

                        <?php } ?>

                        <?php if(!empty($measurement_dtl['skirt_position'])) { ?>

                        <p><strong>Skirt Position:</strong> <?php echo $measurement_dtl['skirt_position']; ?> <span>cm</span></p>

                        <?php } ?>

                      </div>

                    </div>

                    <?php } } ?>

                  </div>

                </div>

              </div>

          </section>

      </div>

  </section>



  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->



 

</div>



<!-- SCRIPTS -->

<!-- core -->

<script src="<?php echo $homeurl;?>assets/jsjquery.min.js"></script>

<script src="bootstrap/<?php echo $homeurl;?>assets/jsbootstrap.min.js"></script>



<!-- !core -->



<!-- plugins -->

<script src="<?php echo $homeurl;?>assets/jsjquery.flexslider-min.js"></script>



<script src="<?php echo $homeurl;?>assets/jsjquery.isotope.min.js"></script>

<script src="<?php echo $homeurl;?>assets/jsjquery.ba-bbq.min.js"></script>

<!-- !plugins -->



<script src="<?php echo $homeurl;?>assets/jsmain.js"></script>



</body>

</html>