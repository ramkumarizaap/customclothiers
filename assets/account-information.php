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

                          --><li>Account</li>

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

                         <!-- <li><a href="09-a-shop-account-dashboard.html">Account dashboard</a></li>-->

                          <li class="active"><span>Account information</span></li>

                          <li><a href="<?php echo $homeurl;?>my-orders/">My orders</a></li>

                          <li><a href="<?php echo $homeurl;?>my-measurements/">My Measurements</a></li>

                          <li><a href="<?php echo $homeurl;?>address-book/">Address book</a></li>

                          <!--<li><a href="<?php echo $homeurl;?>wishlist/">My wishlist</a></li>-->

                          <li><a href="<?php echo $homeurl;?>logout/">Logout</a></li>

                      </ul>

                  </nav>

              </div>

              <div class="clearfix visible-xs space-30"></div>

              <div class="col-md-6 col-sm-9 space-left-30">

                  <h2 class="strong-header large-header">Edit account information</h2>
                     <?php if(isset($_SESSION['profile_succ'])){?>
                     <div class="alert alert-success alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <?php echo $_SESSION['profile_succ'];?>
                     </div>
                     <?php unset($_SESSION['profile_succ']);}?>
                  <form role="form" id="account-information" action="<?php echo $homeurl;?>includes/action/action.php" method="post" novalidate enctype="multipart/form-data">

                      <div class="form-group">

                          <label for="first-name">First name</label>

                          <input type="text" class="form-control" name="firstname" required 

                          value="<?php echo $firstname;?>" maxlength="50">

                      </div>

                      <div class="form-group">

                          <label for="last-name">Last name</label>

                          <input type="text" class="form-control" name="lastname" required 

                          value="<?php echo $lastname;?>" maxlength="50">

                      </div>

                      <div class="form-group">

                          <label for="email">Email address</label>

                          <input type="email" class="form-control" name="email" disabled   

                          value="<?php echo $email;?>">

                      </div>

 <div class="row">
                        <?php
                        $sql4 = $site->select_query("select img,img2,img3 from user_master where user_id='".$_SESSION['user_id']."'");
                       if($sql4)
                       {
                           $profile_img1=$sql4[0];
                          $profile_img2=$sql4[1];
                          $profile_img3=$sql4[2];
                       }
                       ?>
                        <?php if(!empty($profile_img1))
                        { ?>
                       <div class="col-md-4">
                       <img src="<?php echo $homeurl.$profile_img1; ?>">
                       <p style='text-align:center'>Front</p>
                       </div>
                       <?php } 
                       if(!empty($profile_img2)){
                       ?>
                       <div class="col-md-4">
                       <img src="<?php echo $homeurl.$profile_img2; ?>">
                       <p style='text-align:center'>Back</p>
                       </div>
                       <?php }
                       if(!empty($profile_img3)){
                       ?>
                       <div class="col-md-4">
                       <img src="<?php echo $homeurl.$profile_img3; ?>">
                         <p style='text-align:center'>Side</p>
                       </div>
                       <?php }
                       ?>
                       </div><br><br>
                        <div class="form-group">
                          <label for="email">Photo (Front)</label>
                         
                          <input type="file" class="form-control profile_image" name="profile_img_1">
                          <input type="hidden" name="old_image_1" value="<?php echo $profile_img1; ?>">
                        
                        </div> 
                       <div class="form-group">

                          <label for="password">Photo (Back)</label>

                          <input type="file" class="form-control" name="profile_img_2" >
                          <input type="hidden" name="old_image_2" value="<?php echo $profile_img2; ?>">

                      </div>
                       <div class="form-group">

                          <label for="password">Photo (Side)</label>

                          <input type="file" class="form-control" name="profile_img_3" >
                          <input type="hidden" name="old_image_3" value="<?php echo $profile_img3; ?>">

                      </div>

                      <div class="form-group">

                          <label for="password">New password</label>

                          <input type="password" class="form-control" id="password" name="password" required>

                      </div>

                          <input type="hidden" class="form-control" name="old_password" required 

                          value="<?php echo $password;?>">

                      <div class="form-group">

                          <label for="password-repeat">Confirm new password</label>

                          <input type="password" class="form-control" name="password_repeat" required>

                      </div>

                      <button type="submit" name="account_info" class="btn btn-primary">Update</button>

                  </form>

              </div>

          </section>

      </div>

  </section>



  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->

<?php }?>