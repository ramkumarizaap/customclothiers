<section id="Content" role="main">
<div class="container">

  <!-- FULL WIDTH -->
</div>
<div class="full-width section-emphasis-1 page-header">
  <div class="container">
    <header class="row">
      <div class="col-md-12">
        <h1 class="strong-header pull-left">Gallery</h1>
          <!-- BREADCRUMBS -->
          <ul class="breadcrumbs list-inline pull-right">
            <li><a href="<?php echo $homeurl;?>">Home</a></li>
            <li>Gallery</li>
          </ul>
          <!-- !BREADCRUMBS -->
      </div>
    </header>
  </div>
</div>
<!-- !container -->


<!-- !container -->
<br><br>
<!-- How its works-->
<div class="full-width how-its-works">
  <div class="container">
    <div class="clear"></div>    
    <?php $get_wed_dtl=$site->get_gallery('');  
          $i=0;
    ?>

    <!--<div class="slider4">
    <?php
    $i=0; 
    foreach ($get_wed_dtl as $key => $value) 
    {
      if($i%2==0)
      {
        echo "<div class='slide'>";
        ?>
          <img src="<?php echo $homeurl.$get_wed_dtl[$i]['img']; ?>"> 
          <?php if(count($get_wed_dtl) == $i+1) { ?>
            <img src="<?php echo $homeurl.$get_wed_dtl[0]['img']; ?>">

          <?php } else { ?> 
          <img src="<?php echo $homeurl.$get_wed_dtl[$i+1]['img']; ?>">
        <?php } 
      }
      if($i%2==0)
      {
        echo "</div>";
      }
      $i++;
    } 
    ?>
    </div>-->

  <div class="clear"></div>

    <!--/ single section -->

    <?php $work=$site->get_gallery('','1');$i=0;
    foreach ($work as $key => $value) 
    {
      $i++;
      if($i%2==1){
    ?>
      <div class="col-md-6">
        <div class="hiw-explain">
          <h2><i class="i-count"><?php echo $i;?></i><?php echo $work[$key]['title'];?></h2>
            <?php echo $work[$key]['desc'];?>

          
        </div>
      </div>
      <div class="col-md-6">
        <img src="<?php echo $homeurl.$work[$key]['img']; ?>" alt="" class="img-responsive" data-pic="how-it-works" />
      </div>

      <div class="clear"></div>
    <?php }  
    else
    {
    ?>
     
    <div class="col-md-6 pull-right">
        <div class="hiw-explain">
          <h2><i class="i-count"><?php echo $i;?></i><?php echo $work[$key]['title'];?></h2>
            <?php echo $work[$key]['desc'];?>

          
        </div>
      </div>
     <div class="col-md-6 pull-right">
        <img src="<?php echo $homeurl.$work[$key]['img']; ?>" alt="" class="img-responsive" data-pic="how-it-works" />
      </div>

      <div class="clear"></div>
    <?php
    }
  }
    ?>
    <!--  single section /-->

    <!--/ single section -
      <div class="col-md-6">
        <img src="<?php echo $homeurl; ?>assets/images/how_it_works_07.jpg" alt="" class="img-responsive" />
      </div>

      <div class="col-md-6">
        <div class="hiw-explain">
          <h2><i class="i-count">2</i>TELL US YOUR MEASUREMENTS</h2>
          <p class="italic">Whether you choose to customize your item or not, we’ll always need to know at least your height to give you a 
          great fit.</p>
          
        </div>
      </div>
      <div class="clear"></div>
    <!--  single section /

    <!--/ single section -
      <div class="col-md-6">
        <div class="hiw-explain">
          <h2><i class="i-count">3</i>CUSTOMIZE YOUR DESIGN TO SUIT YOUR STYLE -- OR NOT!</h2>
          <p class="italic">Want a higher hemline? A lower neckline? Different sleeves? No problem. </p>
          <p class="italic">We customize designs for sizes 0-36W for just $7.50 per item, and customization is free for all first-time 
          customers. </p>
          
        </div>
      </div>

      <div class="col-md-6">
        <img src="<?php echo $homeurl; ?>assets/images/how_it_works_11.jpg" alt="" class="img-responsive" />
      </div>
      <div class="clear"></div>
    single section /

     single section 
    <div class="col-md-6">
        <img src="<?php echo $homeurl; ?>assets/images/how_it_works_25.jpg" alt="" class="img-responsive" />
      </div>

      <div class="col-md-6">
        <div class="hiw-explain">
          <h2><i class="i-count">4</i>GET READY FOR YOUR CUSTOM DESIGN</h2>
          <p class="italic">Your item will be hand-crafted to order and at your doorstep in 12-18 days.</p>
          
        </div>
      </div>      
      <div class="clear"></div>
     single section /

    <-/ single section -
      <div class="col-md-6">
        <div class="hiw-explain">
          <h2><i class="i-count">5</i>ENJOY THE FABULOUS FIT OF YOUR ONE-OF-A KIND PIECE</h2>
          <p class="italic">We hope you’ll enjoy your custom design. If you have any issues with your order at all, just let us know and we’ll work with you to fix it. </p>
          
        </div>
      </div>      

      <div class="col-md-6">
        <img src="<?php echo $homeurl; ?>assets/images/how_it_works_28.jpg" alt="" class="img-responsive" />
      </div>
      <div class="clear"></div>-->
    <!--  single section /-->

     <!--/ single section -->
      
      
            

    <!--  single section /-->


  </div>
</div>  
<!-- How its works-->

<div class="gutter-space">&nbsp;</div>


<div class="gutter-space">&nbsp;</div>



<div class="full-width section-emphasis-2">
  <div class="container">
    <section class="row">
      <div class="section-header col-xs-12">
        <hr>
        <h2 class="strong-header">
          Join our newsletter
        </h2>
      </div>
      <div class="col-md-8 col-md-offset-2 text-center">
        <!-- NEWSLETTER BOX -->
        <div class="newsletter-box">
          <div class="successMessage alert alert-success alert-dismissable" style="display: none">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Thank You! E-mail was sent.
          </div>
          <div class="errorMessage alert alert-danger alert-dismissable" style="display: none">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Ups! An error occured. Please try again later.
          </div>

          <form role="form" id="newsletter-form" action="#" method="post" class="form-inline validateIt" data-email-subject="Newsletter Form" data-show-errors="true" data-hide-form="true">
            <input type="hidden" name="newsletter" value="letter">
            <div class="form-group">
              <label class="sr-only" for="newsletter-widget-name-1">Your name</label>
              <input type="text" required name="name" class="form-control" id="newsletter-widget-name-1" placeholder="Your name">
            </div>
            <div class="form-group">
              <label class="sr-only" for="newsletter-widget-email-1">Your email</label>
              <input type="email" required name="email" class="form-control" id="newsletter-widget-email-1" placeholder="Your email">
            </div>
            <input type="submit" class="btn btn-primary btn-small" value="Sign up">
          </form>
        </div>
        <!-- !NEWSLETTER BOX -->

      </div>
    </section>

  </div>
</div>
<!-- !full-width -->

</section>

<div class="clearfix visible-xs visible-sm"></div>
<!-- fixes floating problems when mobile menu is visible -->
