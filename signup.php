

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



                          --><li>My Account</li>



                      </ul>



                      <!-- !BREADCRUMBS -->



                  </div>



              </header>



          </div>



      </div><!-- !full-width -->



      <div class="container">



          <!-- !FULL WIDTH -->



          <!-- !SECTION EMPHASIS 1 -->







          <div class="row">



              <div class="col-md-6 space-right-20">



                  <section class="element-emphasis-weak">



                      <h2 class="strong-header">



                          Already have an account?



                      </h2>



                      <a href="<?php echo $homeurl;?>login/" class="btn btn-default">



                          Login



                      </a>



                  </section>



              </div>



              <div class="col-md-6 space-left-20">



                  <section class="register element-emphasis-strong">



                      <h2 class="strong-header large-header">



                          Create an account



                      </h2>



                      <?php 



                      if(isset($_SESSION['user_exists']))



                      {



                        echo $_SESSION['user_exists'];



                        unset($_SESSION['user_exists']);



                      }



                      ?>



                      <form role="form" id="register-form" action="<?php echo $homeurl;?>includes/action/action.php" method="post" novalidate>



                          <div class="form-group">



                              <label for="first-name">First name</label>



                              <input type="text" class="form-control" id="first-name" name="firstname" maxlength="50">



                          </div>



                          <div class="form-group">



                              <label for="last-name">Last name</label>



                              <input type="text" class="form-control" id="last-name" name="lastname" maxlength="50">



                          </div>



                          <div class="form-group">



                              <label for="email">Email address</label>



                              <input type="email" class="form-control check_mail" id="email" name="email">

                               <div class="check_mail_div">

                              </div>

                          </div>

                         <div class="form-group">



                              <label for="last-name">Mobile</label>



                              <input type="text" class="form-control" id="mobile" name="mobile" maxlength="15">



                          </div>



                          <div class="form-group">



                              <label for="password">Password</label>



                              <input type="password" class="form-control" id="password" name="password">



                          </div>



                          <div class="form-group">



                              <label for="password-repeat">Confirm password</label>



                              <input type="password" class="form-control" id="passwordrepeat" name="cpassword"  >



                          </div>



                          <button type="submit" name="register_user" class="save_btn btn btn-primary">Register</button>



                      </form>



                  </section>



              </div>



          </div>







      </div>



  </section>







  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->







 







<!-- SCRIPTS -->



<!-- core -->



