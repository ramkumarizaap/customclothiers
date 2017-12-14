 <?php 

      $contact=$site->get_contact();

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

          <h1 class="strong-header pull-left">

            Contact Us

          </h1>

          <!-- BREADCRUMBS -->

          <ul class="breadcrumbs list-inline pull-right">

            <li><a href="<?php echo $homeurl;?>">Home</a></li>

            <!--

            <!--

                                        -->

            <li>Contact us</li>

          </ul>

          <!-- !BREADCRUMBS -->

        </div>

      </header>

    </div>

  </div>

  <!-- !full-width -->

  <div class="container">

    <!-- !FULL WIDTH -->

    <!-- !SECTION EMPHASIS 1 -->





    <!-- FULL WIDTH -->

  </div>

  <!-- !container -->

  <!--<div class="full-width google-map">

    <div id="google-map-1" style="height:350px;"></div>

  </div>-->

  <!-- !full-width -->

  <div class="container">

    <!-- !FULL WIDTH -->



    <section class="row contact-form">

      <div class="col-md-4 col-xs-12 pull-right">

        <div class="space-54"></div>

        <div class="section-emphasis-3 page-info">

          <h3 class="strong-header">

            For Assistance

          </h3>



          <div class="text-widget">
            <address>
 <h4><small>Call Us</small> <?php echo $contact[0]['phone'];?></h4><br/>
             <i> <?php echo $contact[0]['street1'];?><br>
              <?php echo $contact[0]['street2'];?><br>
              <?php echo $contact[0]['city'];?>, <?php echo $contact[0]['state'];?> <?php echo $contact[0]['zipcode'];?></i>

            </address>

     

          </div>

          <br>

          <h3 class="strong-header">

            Media contact

          </h3>



          <div class="text-widget">

                 <address>

             <p> <a href="mailto:<?php echo $contact[0]['email'];?>"><?php echo $contact[0]['email'];?></a></p>

             

            </address>

          </div>

        </div>

      </div>
      
     


      <div class="col-md-8 col-xs-12 pull-right">

        <div class="section-header col-xs-12">

       <h2 class="strong-header">

            

          </h2>

        </div>

        <div class="col-xs-12">
          <?php 

          if(isset($_SESSION['contact_succ'])){

          ?>

         <div class="alert alert-info alert-success">

          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

          <strong>Thanks for contacting with us. We will get back to you soon.</strong>

        </div>

        <?php } unset($_SESSION['contact_succ']);?>

          <div class="simpleForm">

            <div class="successMessage alert alert-success alert-dismissable" style="display: none">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                Thank You! We will contact you shortly.

            </div>

            <div class="errorMessage alert alert-danger alert-dismissable" style="display: none">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                Ups! An error occured. Please try again later.

            </div>

            <form role="form" action="<?php echo $homeurl;?>includes/action/action.php" method="post" id="contact-us-form" data-email-subject="Contact Form" data-show-errors="true" data-hide-form="false">

              <fieldset>

              <div class="row">

                <div class="col-md-12">
				  
                  <h3>send us a message <span>All Fields Required</span></h3>
                  <div class="form-group">

                    <label for="field1">Name</label>

                    <input type="text" required name="name" class="form-control" id="field1" >

                  </div>

                </div>

                <div class="col-md-12">

                  <div class="form-group">

                    <label for="field2">Email Address</label>

                    <input type="email" required name="email" class="form-control" id="field2" >

                  </div>

                </div>

              </div>

               <div class="form-group">

                <label for="field3">Subject</label>

                <input type="text" name="subject" required class="form-control" id="field3"  >

              </div>

              <div class="form-group">

                <label for="field3">Message</label>

                <textarea name="message" class="form-control" id="field4" required rows="10" ></textarea>

              </div>

              <input type="submit" class="btn btn-primary" name="send_contact" value="Send">

              </fieldset>

            </form>

          </div>

          <!-- / simpleForm -->



        </div>

      </div>
      
    </section>

  </div>

</section>



<div class="clearfix visible-xs visible-sm"></div>

<!-- fixes floating problems when mobile menu is visible -->

