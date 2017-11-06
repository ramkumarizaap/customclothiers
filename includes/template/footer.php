<div class="custom-footer">
<hr/>
  <div class="container">
      <section class="row">
        <div class="col-md-3 col-sm-3">
          <h3 class="strong-header">
            Company
          </h3>
          <div class="link-widget">
            <ul class="list-unstyled">
             <li><a href="<?php echo $homeurl;?>">Home</a></li>
              <li><a href="<?php echo $homeurl;?>about-us/">About Custom Clothiers</a></li>
              <li><a href="<?php echo $homeurl;?>privacy-policy/">Privacy Policy</a></li>
              <li><a href="<?php echo $homeurl;?>terms-and-conditions/">Terms & Conditions</a></li>
              <li><a href="<?php echo $homeurl;?>press/">Press</a></li>
              <li><a href="<?php echo $homeurl;?>careers/">Careers</a></li>
                 
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-2">
          <h3 class="strong-header">
            Help
          </h3>
          <div class="link-widget">
            <ul class="list-unstyled">
              
              <li><a href="<?php echo $homeurl;?>appointments/">Appointments</a></li>
              <li><a href="<?php echo $homeurl;?>track-my-order/">Track order</a></li>
              <li><a href="<?php echo $homeurl;?>faqs/">FAQs</a></li>
              <li><a href="<?php echo $homeurl;?>contact-us/">Contact Us</a></li>
              <!--<li><a href="#">Shipping info</a></li>
              <li><a href="#">Payment</a></li>
              <li><a href="#">Returns</a></li>-->
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-3">
          <h3 class="strong-header">
            Quick links
          </h3>
          <div class="link-widget">
            <ul class="list-unstyled">
              <!--<li><a href="#">Size guide</a></li>-->
               <?php if(isset($_SESSION['user_id'])){?>
              <li><a href="<?php echo $homeurl;?>my-orders/">My Orders</a></li>
              <li><a href="<?php echo $homeurl;?>my-measurements/">My Measurements</a></li>
              <li><a href="<?php echo $homeurl;?>address-book/">Address Book</a></li>
              <li><a href="<?php echo $homeurl;?>how-it-works/">How it works?</a></li>
              <li><a href="<?php echo $homeurl;?>reviews/">Reviews</a></li>
              <?php }else{?>
              <li><a href="<?php echo $homeurl;?>account-information/">My account</a></li>
              <li><a href="<?php echo $homeurl;?>how-it-works/">How it works?</a></li>
              <li><a href="<?php echo $homeurl;?>reviews/">Reviews</a></li>
               <?php }?>
              <!--<li><a href="<?php echo $homeurl;?>wishlist/">Wishlist</a></li>-->
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-4">
          <h3 class="strong-header">
            Follow us
          </h3>
          <div class="social-widget">
            <ul class="list-inline">
              <li><a href="https://www.facebook.com/DCCustomClothiers/" target="_blank" class="fb"><span class="sr-only">Facebook</span></a></li>
              <li><a href="https://twitter.com/dccclothiers" target="_blank" class="tw"><span class="sr-only">Twitter</span></a></li>
              <li><a href="https://plus.google.com/103877269075911408684" target="_blank" class="gp"><span class="sr-only" >Google+</span></a></li>
              <li><a href="https://www.pinterest.com/dccustomclothie/" target="_blank" class="pt"><span class="sr-only">Pinterest</span></a></li>
              <li><a href="https://www.instagram.com/dccustomclothiers/" target="_blank" class="in"><span class="sr-only">Instagram</span></a></li>
            </ul>
          </div>
          <!--<div class="play-store-icons">
            <a target="_blank" href="#"><img src="<?php echo $homeurl;?>assets/images/mac-app.jpg"></a>
            <a target="_blank" href="#"><img src="<?php echo $homeurl;?>assets/images/googleapp.jpg"></a
          ></div>-->
        </div>
      </section>
    </div>
</div>
<!-- Custom footer /-->
<footer>
  <div class="container">
  
    <section class="row">
      <div class="col-md-12">
        <p class="text-center">
          <span class="copyright">&copy; Copyright <?php echo date('Y');?> Custom Clothiers. All Rights Reserved.</span>
        </p>
      </div>
    </section>
  </div>
</footer>