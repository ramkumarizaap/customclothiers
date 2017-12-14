
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
                          --><li><a href="<?php echo $homeurl;?>product-listings/">Shop</a></li><!--
                          --><li>My account</li>
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
                <?php if(isset($_SESSION['pass_succ'])){?>
                <div class="alert alert-info alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $_SESSION['pass_succ'];?>
                </div>
                <?php unset($_SESSION['pass_succ']);}?>
                  <section class="login element-emphasis-strong">
                      <h2 class="strong-header large-header">
                          Forgot Password
                      </h2>
                      <?php 
                      if(isset($_SESSION['pass_fail']))
                      {
                      ?>
                    <div class="alert alert-info alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $_SESSION['pass_fail'];?>
                    </div>
                      <?php
                        unset($_SESSION['pass_fail']);
                      }
                      ?>
                      <form role="form" id="login-form" action="<?php echo $homeurl;?>includes/action/action.php"  method="post" novalidate>
                          <div class="form-group">
                              <label for="email">Email address</label>
                              <input type="email" class="form-control" id="email" name="email">
                          </div>
                          <button type="submit" name="forgot_password" class="btn btn-primary pull-left">Send Email</button>
                          <a href="<?php echo $homeurl;?>login/" class="btn btn-link pull-right">Back to Login</a>
                          <div class="clearfix"></div>
                      </form>
                  </section>
              </div>
              <div class="col-md-6 space-left-20">
                  <section class="element-emphasis-weak">
                      <h2 class="strong-header">
                          New customers
                      </h2>
                      <p>
                          By creating an account with our store, you will be able to move through the checkout process
                          faster, store multiple shipping addresses, view and track your orders in your account and more
                      </p>
                      <a href="<?php echo $homeurl;?>signup/" class="btn btn-default">
                          Register
                      </a>
                  </section>
              </div>
          </div>

      </div>
  </section>

  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->

  