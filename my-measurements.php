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

                          --><!--<li><a href="<?php echo $homeurl;?>product-listing/">Shop</a></li><!--

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

                          <!--<li><a href="<?php echo $homeurl;?>wishlist/">My wishlist</a></li>-->

                          <li><a href="index.html">Logout</a></li>

                      </ul>

                  </nav>

              </div>

              <div class="clearfix visible-xs space-30"></div>



              <div class="col-sm-9 space-left-30">

                  <div class="col-sm-7 col-md-8">

                    <h2 class="strong-header large-header">My profiles</h2>

                  </div>

                  <?php 

                  if(mysqli_real_escape_string($con,$_GET['id']) && !empty($_GET['id'])) {



                    $order_dtl_qry = mysqli_query($con,'select * from order_master where om_id = "'.$_GET["id"].'"');

                        if(mysqli_num_rows($order_dtl_qry) > 0) {

                        $order_dtl=mysqli_fetch_array($order_dtl_qry);

                        $order_id = $order_dtl['order_id'];

                  }

                }



                  $measurement_dtl_qry = mysqli_query($con,'select * from measurement_profile_master where mp_userid='.$_SESSION['user_id'].' and status=0 ');

				          $tot=@mysqli_num_rows($measurement_dtl_qry);

                  if(!empty($_GET['id'])) { ?>

                     <div class="col-sm-5 col-md-3">

                       <a href="<?php echo $homeurl;?>add-profile/cart/<?php echo $_GET['orderid']."mid-".$_GET['id'];?>/?step=start" class="btn btn-default btn-small add_profile">Add New Profile</a> 

                     </div>

                     <div class="table table-responsive measurement">

                     <!--<div class="col-md-12 text-left" style="display: table;margin-bottom:15px;color:#d00;">

                     Note: If you modify your measurement values it will affect your previous orders measurement values. To avoid this please create new profile. 

                     </div>-->

                     

                      <table width="569" class="table">

                          <thead>

                              <tr>

                                  <td width="44" class="width20"> <strong>Name</strong> </td>

                                  <td width="52"><strong> Weight</strong> </td>

                                  <td width="49"><strong> Height</strong> </td>

                                  <td width="43"><strong> Chest</strong> </td>

                                  <td width="67"><strong> Abdomen</strong> </td>

                                  <td width="64"><strong> Buttocks</strong> </td>

                                  <td width="35"><strong> Hips </strong></td>

                                  <td colspan="3" align="center"><strong>Options</strong></td>

                              </tr>

                          </thead>

                          <tbody>

                          <?php 

                          if($tot > 0) {

                              if(mysqli_num_rows($measurement_dtl_qry) > 0) {

                                while($measurement_dtl=mysqli_fetch_array($measurement_dtl_qry)) {

                              ?>

                             

                              <tr>

                                  <td><?php echo $measurement_dtl['mp_name']; ?></strong></td>

                                  <td><?php echo $measurement_dtl['mp_weight']; ?></td>

                                  <td><?php echo $measurement_dtl['mp_height']; ?></td>

                                  <td><?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_chest'])); ?></td>

                                  <td><?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_abdomen'])); ?></td>

                                  <td><?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_buttocks'])); ?></td>

                                  <td><?php echo ucwords(str_replace("_"," ",$measurement_dtl['mp_hips'])); ?></td>

                                  <td width="83"  align="center">

                                  <button class="btn btn-primary btn-mini select_measurement table-btn" data-id="<?php echo $_GET['id']; ?>" order-id="<?php echo $_GET['orderid']; ?>" profile-id="<?php echo $measurement_dtl['mp_id']; ?> " >SELECT</button></td>

                                 <td width="58" align="center">

                                  <a class="btn btn-primary btn-mini table-btn" href="<?php echo $homeurl;?>add-profile/<?php echo $measurement_dtl['mp_id']; ?>/<?php echo $_GET['id']; ?>/?step=start" >Modify</a>

                                  

                                 </td>

                                  <td width="83"  align="center"><button class="btn btn-primary btn-mini table-btn" data-toggle="modal" data-target="#confirmDelete<?php echo $measurement_dtl['mp_id']; ?>" data-title="Delete Profile" data-id="<?php echo $measurement_dtl['mp_id']; ?>">Delete</button> </td>

                                  <!-- Modal Dialog -->

                                  <div class="modal fade" id="confirmDelete<?php echo $measurement_dtl['mp_id']; ?>" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">

                                    <div class="modal-dialog">

                                      <div class="modal-content">

                                        <div class="modal-header">

                                          <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>

                                          <h4 class="modal-title">Delete Parmanently</h4>

                                        </div>

                                        <div class="modal-body">

                                          <p>Are you sure want to delete this profile ?</p>

                                        </div>

                                        <div class="modal-footer">

                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                          <button type="button" class="btn btn-danger confirm" data-id="<?php echo $measurement_dtl['mp_id']; ?>">Delete</button>

                                        </div>

                                      </div>

                                    </div>

                                  </div>



                                  <!-- Modal Dialog -->

                                  <div class="modal fade" id="myModal" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">

                                    <div class="modal-dialog">

                                      <div class="modal-content">

                                        <div class="modal-header">

                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                          <h4 class="modal-title">Select Measurement</h4>

                                        </div>

                                        <div class="modal-body">

                                          <p>Failed to Select Measurement Profile</p>

                                        </div>

                                        <div class="modal-footer">

                                          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>

                                        </div>

                                      </div>

                                    </div>

                                  </div>



                                  <div class="modal fade" id="myModal1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">

                                    <div class="modal-dialog">

                                      <div class="modal-content">

                                        <div class="modal-header">

                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                          <h4 class="modal-title">Delete Measurement</h4>

                                        </div>

                                        <div class="modal-body">

                                          <p>Failed to Delete Measurement Profile</p>

                                        </div>

                                        <div class="modal-footer">

                                          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                              </tr>

                              <?php } } }else{ ?>

                               <tr>

                                <td colspan="10"><p> Profile Details Not Available ! </p></td>

                              </tr>

                              <?php } ?>

                            </tbody>

                          </table>

                        </div>

                      

                  <?php } else { ?>

                  <div class="col-sm-5 col-md-4 pull-right">

                    <a href="<?php echo $homeurl;?>add-profile/" class="btn btn-default btn-small">Add New Profile</a>

                  </div>

                  <div class="table table-responsive">

                      <table class="table myprofile">

                          <thead>

                              <tr>

                                  <td class="width20"><strong> Name </strong></td>

                                  <td> <strong>Gender</strong> </td>

                                  <td><strong> Weight</strong> </td>

                                  <td> <strong>Height</strong> </td>

                                  <td class="text-left width13" colspan="4" align="center"><strong>Options</strong></td>

                              </tr>

                          </thead>

                          <tbody>

                          <?php 



                            if($tot >0) {

                              if(mysqli_num_rows($measurement_dtl_qry) > 0) {

                                while($measurement_dtl=mysqli_fetch_array($measurement_dtl_qry)) {

                              ?>

                             

                              <tr>

                                  <td class="my-pro-name"><?php echo $measurement_dtl['mp_name']; ?></strong></td>

                                  <td><?php echo ucfirst($measurement_dtl['gender']); ?></td>

                                  <td><?php echo $measurement_dtl['mp_weight']; ?></td>

                                  <td><?php echo $measurement_dtl['mp_height']; ?></td>

                                  <td class="text-right"> <a href="#" data-toggle="modal" data-target="#myModal<?php echo $measurement_dtl['mp_id']; ?>" class="table-btn ">View</a></td>

                                  <td class="text-right"> <a href="<?php echo $homeurl;?>add-profile/<?php echo $measurement_dtl['mp_id']; ?>/?step=start" class="table-btn">Modify</a></td>

                                  <td class="text-right"><a class="del_measurement table-btn" data-toggle="modal" data-target="#confirmDelete<?php echo $measurement_dtl['mp_id']; ?>" data-title="Delete Profile"  href="#" data-id="<?php echo $measurement_dtl['mp_id']; ?>">Delete</a></td>

                                  <!--<td class="text-right"> <a target="_blank" href="#" class="table-btn">Print</a></td>-->

                                   <!-- Modal Dialog -->

                                  <div class="modal fade" id="confirmDelete<?php echo $measurement_dtl['mp_id']; ?>" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">

                                    <div class="modal-dialog">

                                      <div class="modal-content">

                                        <div class="modal-header">

                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                          <h4 class="modal-title">Delete Parmanently</h4>

                                        </div>

                                        <div class="modal-body">

                                          <p>Are you sure want to delete it ?</p>

                                        </div>

                                        <div class="modal-footer">

                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                          <button type="button" class="btn btn-danger confirm" data-id="<?php echo $measurement_dtl['mp_id']; ?>">Delete</button>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                              </tr>

                              <!-- Modal -->

                              <div class="modal fade measure" id="myModal<?php echo $measurement_dtl['mp_id']; ?>" role="dialog">

                                <div class="modal-dialog">

                                

                                  <!-- Modal content-->

                                  <div class="modal-content">

                                    <div class="modal-header">

                                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                                      <h4 class="modal-title">Measurement Profile</h4>

                                    </div>

                                    <div class="modal-body">

                                    



                                    <div class="custom-value">                                    

                                      <p><strong>Name:</strong> <?php echo $measurement_dtl['mp_name']; ?> </p>

                                      <p><strong>Height:</strong> <?php echo $measurement_dtl['mp_height']; ?> </p>

                                      <p><strong>Weight:</strong> <?php echo $measurement_dtl['mp_weight']; ?> </p>

                                 

                                      <p><strong>Chest:</strong> <?php echo $measurement_dtl['mp_chest']; ?> </p>

                                      <p><strong>Abdomen:</strong> <?php echo $measurement_dtl['mp_abdomen']; ?> </p>

                                      <p><strong>Buttocks:</strong> <?php echo $measurement_dtl['mp_buttocks']; ?></p>

                                    



                                      <p><strong>Hips:</strong> <?php echo $measurement_dtl['mp_hips']; ?></p>

                                                                        <?php 

                                      $sql2=mysqli_query($con,"select a.mpf_value,b.labelname from measurement_profile_value a,

                                       measurement_profile_fields b where a.mpid='".$measurement_dtl['mp_id']."' and a.mpfid=b.mpf_id");

                                      while($r2=mysqli_fetch_array($sql2)){?>

                                      <?php if($r2['labelname']=='Neck') {
                                        $m_type="cm";
                                      }
                                      else
                                      {
                                        $m_type="inches";
                                      }
                                      ?>
                                      <p><strong><?php echo $r2['labelname']; ?>:</strong> <?php echo $r2['mpf_value']; ?>

                                       <span><?php echo $m_type; ?></span></p>

                                      <?php } ?>

                                    

                                    </div>



                                    </div>

                                    <div class="modal-footer">

                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                    </div>

                                  </div>

                                  

                                </div>

                              </div>

                              <?php } } } else { ?>

                              

                               <tr>

                                <td colspan="8"><p> Profile Details Not Available ! </p></td>

                              </tr>

                              <?php  }?> 

                          </tbody>

                      </table>

                  </div>

                  <?php } ?>

              </div>

          </section>

      </div>

  </section>



  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->







<?php }?>

<style>

@media (max-width: 767px) {

.modal-backdrop  { display:none;}	

	

}



</style>