<?php 
if(!isset($_SESSION['user_id']))
{
  $mail="";
  header("Location:{$homeurl}login/");

}
else
{
  $email=$site->get_user($_SESSION['user_id']);
$mail=$email[0]['email'];

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

                          Customer service

                      </h1>

                      <!-- BREADCRUMBS -->

                      <ul class="breadcrumbs list-inline pull-right">

                          <li><a href="<?php echo $homeurl;?>">Home</a></li><!--

                          --><!--<li><a href="<?php echo $homeurl;?>product-listing/">Shop</a></li><!--

                          --><li>Customer service</li>

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

              
              <div class="col-md-6 col-sm-8">

                  <h2 class="strong-header large-header">Track order</h2>

                  <form role="form" id="track-order-form" method="post" novalidate action="<?php echo $homeurl;?>track-order/">

                      <div class="form-group">

                          <label for="first-name">Order ID <small class="explanation">(can be found in your order confirmation email)</small></label>

                          <input type="text" class="form-control" id="first-name" name="order_id" required >

                      </div>

                      <div class="form-group">

                          <label for="email">Email address <small class="explanation">(which you used during checkout)</small></label>

                          <input type="email" class="form-control" id="email" name="email" required  value="<?php echo $mail;?>" >

                      </div>

                      <button type="submit" name="track_order" class="btn btn-primary">Track my order</button>

                  </form>

              </div>

          </section>

      </div>

  </section>



  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->





</div>
<?php } ?>

