<?php

if(!isset($_SESSION['user_id'])) 

{

  header("Location:{$homeurl}login/");

}

else

{

?>

  <section id="Content" role="main">

      <div class="container">



          <!-- SECTION EMPHASIS 1 -->

          <!-- FULL WIDTH -->

      </div><!-- !container -->

      <div class="full-width section-emphasis-1 page-header">

          <div class="container">

              <header class="row">

                  <div class="col-md-12">

                      <h1 class="strong-header pull-left">

                          My account

                      </h1>

                      <!-- BREADCRUMBS -->

                      <ul class="breadcrumbs list-inline pull-right">

                          <li><a href="<?php echo $homeurl;?>">Home</a></li><!--

                          --><li><a href="<?php echo $homeurl;?>product-listing/">Shop</a></li><!--

                          --><li>Measurements</li>

                      </ul>

                      <!-- !BREADCRUMBS -->

                  </div>

              </header>

          </div>

      </div><!-- !full-width -->

      <div class="container">

          <!-- !FULL WIDTH -->

          <!-- !SECTION EMPHASIS 1 -->



          <section class="row">

              <div class="col-sm-3">

                  <nav class="shop-section-navigation element-emphasis-weak">

                      <ul class="list-unstyled">

                          <!--<li><a href="09-a-shop-account-dashboard.html">Account dashboard</a></li>-->

                         <li><a href="<?php echo $homeurl;?>account-information/">Account information</a></li>

                          <li><a href="<?php echo $homeurl;?>my-orders/">My orders</a></li>

                          <li><span><a href="<?php echo $homeurl;?>my-measurements/">My Measurements</span></a></li>

                          <li><a href="<?php echo $homeurl;?>address-book/">Address book</a></li>

                          <li><a href="<?php echo $homeurl;?>wishlist/">My wishlist</a></li>

                          <li><a href="<?php echo $homeurl;?>logout/">Logout</a></li>

                      </ul>

                  </nav>

              </div>

              <div class="clearfix visible-xs space-30"></div>

              <div class="col-sm-9 space-left-30">

                  <div class="col-sm-9">

                    <h2 class="strong-header large-header">My profiles</h2>

                  </div>

                  <div class="col-sm-3">

                    <a href="<?php echo $homeurl;?>add-profile/" class="btn btn-default btn-small">Add New Profile</a>

                  </div>

                  <div class="table table-responsive">

                      <table class="table">

                          <thead>

                              <tr>

                                  <td class="width20"> Name </td>

                                  <td> Gender </td>

                                  <td> Weight </td>

                                  <td> Height </td>

                                  <td class="text-left width13" colspan="4">Options</td>

                              </tr>

                          </thead>

                          <tbody>

                          <?php 



                            $measurement_dtl_qry = mysqli_query($con,'select * from measurement_profile_master');

                            if($measurement_dtl_qry) {

                              if(mysqli_num_rows($measurement_dtl_qry) > 0) {

                                while($measurement_dtl=mysqli_fetch_array($measurement_dtl_qry)) {

                              ?>

                              <tr>

                                  <td><?php echo $measurement_dtl['mp_name']; ?></strong></td>

                                  <td>Female</td>

                                  <td><?php echo $measurement_dtl['mp_weight']; ?></td>

                                  <td><?php echo $measurement_dtl['mp_height']; ?></td>

                                  <td class="text-right"> <a href="#" data-toggle="modal" data-target="#myModal<?php echo $measurement_dtl['mp_id']; ?>">View</a></td>

                                  <td class="text-right"> <a href="<?php echo $homeurl;?>add-profile/?step=start&id=<?php echo $measurement_dtl['mp_id']; ?>">Modify</a></td>

                                  <td class="text-right"> <a href="measurement-print-view.php?id=<?php echo $measurement_dtl['mp_id']; ?>">Print</a></td>

                              </tr>

                              <!-- Modal -->

                              <div class="modal fade" id="myModal<?php echo $measurement_dtl['mp_id']; ?>" role="dialog">

                                <div class="modal-dialog">

                                

                                  <!-- Modal content-->

                                  <div class="modal-content">

                                    <div class="modal-header">

                                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                                      <h4 class="modal-title">Measurement Profile</h4>

                                    </div>

                                    <div class="modal-body">

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

                                    <div class="modal-footer">

                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                    </div>

                                  </div>

                                  

                                </div>

                              </div>

                              <?php } } } ?>

                          </tbody>

                      </table>

                  </div>

              </div>

          </section>

      </div>

  </section>



  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->

<?php }?>