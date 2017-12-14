<style>

.text-break

{

  margin-bottom: 7px !important;

 display: block; /* Fallback for non-webkit */

  display: -webkit-box;

  max-width: 400px;

  height: 95px; /* Fallback for non-webkit */

  margin: 10px auto;

  line-height: 1.4;

  -webkit-line-clamp: 3;

  -webkit-box-orient: vertical;

  overflow: hidden;

  text-overflow: ellipsis;

}

.text-break p

{

  margin:0;

}

</style>

<section id="Content" role="main">

<div class="container">

</div>

<!-- !container -->

<div class="full-width no-space flexslider-full-width">

  <!-- FLEXSLIDER -->

  <!-- SPECIAL VERSION 1 -->

  <div class="flexslider home-banner">

    <ul class="slides">

      <!-- FLEXSLIDER SLIDE -->

      <?php $ban=$site->get_all_banners('','1');$a=0;

     foreach ($ban as $key => $value) {?>       

      

      <li style="background-image: url(<?php echo $homeurl.$ban[$key]['img'];?>); min-height: 560px">

        <div class="container">

          <div class="row">

          <?php 

          if($a=="0"){$v="4";}else{$v="5";}

          ?>

            <div class="col-sm-4 col-sm-offset-6">

              

              <!-- CALL TO ACTION BOX -->

              <div class="calltoaction-box text-center">

                <h4 class="strong-header"><?php echo $ban[$key]['title'];?></h4>

                <p>

                 <?php echo $ban[$key]['desc'];?>

                  <br><br>

                </p>

                <a href="<?php echo $homeurl;?>Shop/" class="btn btn-primary">Shop now</a>

              </div>

              <!-- !CALL TO ACTION BOX -->

            </div>

          </div>

        </div>

      </li>

      <?php  $a++;} 

      ?>

      <!-- !FLEXSLIDER SLIDE -->

      <!-- FLEXSLIDER SLIDE -->

     

      <!-- !FLEXSLIDER SLIDE -->

    </ul>

    <div class="flexslider-full-width-controls"></div>

  </div>

  <!-- !FLEXSLIDER -->

</div>



<div class="gutter-space">&nbsp;</div>

<!--/ Static banner -->

<!--<section class="row">

  <div class="col-xs-12 how-its-works">

    <div class="container">

    <h1 class="text-center">Who Are We?</h1>

    <div class="clear"></div>

    </div>

  </div>

<div class="full-width static-banner">

  <div class="container">

    <a href="#">

      <img src="<?php echo $homeurl;?>assets/images/fit-cloth.jpg" alt="" class="img-responsive" />

    </a>

  </div>

</div>

</section>-->

<!-- !container -->



<!-- !full-width -->

<!--<div class="full-width how-its-works">

  <div class="container">

    <h1 class="text-center">How does it work? <i>Our clothes are made to order specifically for you</i></h1>

    <div class="clear"></div>

    <!--/ 3 boxes -

      <div class="col-md-4">

        <i class="i-count">1</i>

        <p>Select from one of our designs or customize & create your own. </p>

      </div>

      <div class="col-md-4">

        <i class="i-count">2</i>

        <p>Setup an account and profile. Follow our measurement guide and provide us with the information.</p>

      </div>

      <div class="col-md-4">

        <i class="i-count">3</i>

        <p>Our master tailors will have your custom bespoke suit ready in 3 to 4 weeks.</p>

      </div>

      <div class="clear"></div>

         <p class="text-center">

        <a class="btn btn-default" href="<?php echo $homeurl; ?>how-it-works/">LEARN MORE</a>

      </p>

      <!--<p class="text-center">

        <a class="btn btn-default btn-small">Small button</a>

      </p>-

    <!-- 3 boxes /

  </div>

</div>-->



<?php /*



<div class="full-width how-its-works">

  <div class="container">

    <h1 class="text-center quotes-newsection"><img src="<?php echo $homeurl; ?>assets/images/quote.png"></h1>

    <div class="clear"></div>

    <!--/ 3 boxes -->

      <div class=" cd-testimonials-wrapper1  cd-container">



        <ul class="cd-testimonials">

        <?php

        $qt=$site->get_quotes('','1');

        foreach ($qt as $key => $value)

        {

          ?>

            <li>

              <p><?php echo $value['text'];?></p>

              <div class="cd-author">

                <ul class="cd-author-info">

                  <li><?php echo $value['name'];?></li>

                  <li><?php echo $value['mail'];?></li>

                </ul>

              </div>

            </li>

          <?php 

        }

        ?>

   </ul> 

       

        

      </div>

      <div class="clear"></div>

      

      </p>

      <!-- 3 boxes /-->

  </div>

</div>

*/ ?>



  <section class="row">

     

      <div class="col-md-12">

        <div class="row home-inst">

          <div class="container content">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> <!-- Indicators -->

              <ol class="carousel-indicators">

               <?php

					$qt=$site->get_quotes('','1');

					$i=0;

					foreach ($qt as $key => $value)

					{

					  ?>

               			 <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>"  <?php if($i=="0") { ?> class="active" <?php } ?> ></li>

                	<?php   $i++; }?>

                

              </ol>

              <!-- Wrapper for slides -->

              <div class="carousel-inner">

              

              <?php

				$qt=$site->get_quotes('','1');

				$i=1;

				foreach ($qt as $key => $value)

				{

				  ?>

              

                <div class="item  <?php if($i=="1") { echo "active"; } ?>">

                  <div class="row">

                    <div class="col-xs-12">

                      <div class="thumbnail adjust1">

                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">

 							<h1 class="text-center quotes-newsection"><img src="<?php echo $homeurl; ?>assets/images/quote.png"></h1>              

                              <p><?php echo $value['text'];?></p>

                              <div class="cd-author">

                                <ul class="cd-author-info">

                                  <li><?php echo $value['name'];?></li>

                                  <li><?php  echo $value['mail']; ?></li>

                                </ul>

                              </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

                

                <?php 

      $i++;  } 

        ?>

                

              </div>

              <!-- Controls --> </div>

          </div>

        </div>

      </div>

    </section>

<div class="full-width">

  <div class="container">

   <section class="row">

     <div class="owl-wrapper-outer">

       <div class="owl-wrapper">

          <div class="owl-item">       

            <?php 

            $car=$site->get_carousel('','1');

            foreach ($car as $key => $value)

            {

              ?>

              <div class="col-md-3 col-sm-6 col-xs-12">

                <div class="team-member modern">

                    <!-- Item Photo, Some Text & Sale -->

                  <div class="member-photo">

                      <a target="_self" href="<?php echo $value['link'];?>">

                        <img src="<?php echo $homeurl.$value['img'];?>" alt="">

                      </a>

                  </div>

                        <!-- Long Words -->

                  <div class="member-info text-center" style="padding:10px;">

                    <a target="_self" href="<?php echo $value['link'];?>">

                      <h2 style="border-bottom:none;"><?php echo $value['heading'];?></h2>

                      <h2><?php echo $value['heading2'];?></h2>

                      <div class="text-break">  

                        <?php echo $value['desc'];?></p>

                      </div>

                    </a>

                    <p class="text-center"><a href="<?php echo $value['link'];?>" class="btn btn-default">LEARN MORE</a></p>

                  </div>

                </div>

              </div>  

              <?php 

            }

            ?>



          </div>        

        </div>        

      </div>

    </section>

  </div>

</div>







<!-- !full-width -->

<div class="container">

<!-- !FULL WIDTH -->

<!-- !SECTION EMPHASIS 1 -->

<!-- FLEXSLIDER -->

<!-- STANDARD -->

<section class="row">

<div class="section-header col-xs-12">

  <hr>

  <h2 class="strong-header">

    Featured items

  </h2>

</div>

<div class="col-md-12">

<div class="flexslider flexslider-nopager row">

<ul class="slides">

<?php  $pro=$site->get_all_products('1','frontend');

$i=1;

foreach ($pro as $key => $value) {

   $a=$i%4;

  if($a==1)

  {

    echo "<li class='row'>";

  }

?>

  <div class="col-md-3 col-sm-6 col-xs-12">

    <!-- SHOP FEATURED ITEM -->

    <div class="shop-item shop-item-featured">

      <div class="overlay-wrapper">

        <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$pro[$key]['cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['sub_cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['product_name']));?>/">

          <img src="<?php echo $homeurl.$pro[$key]['image'];?>" alt="Shop item">

        </a>

        <div class="overlay-contents">

          <div class="shop-item-actions">

            <!--<button class="btn add-cart btn-primary btn-block" data-pid="<?php echo $pro[$key]['id'];?>">

              Add to cart

            </button>-->

            <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$pro[$key]['cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['sub_cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['product_name']));?>/" class="btn btn-default btn-block">

              View details

            </a>

          </div>

        </div>

      </div>

      <div class="item-info-name-price">

        <h4><a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$pro[$key]['cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['sub_cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['product_name']));?>/"><?php echo $pro[$key]['product_name'];?></a></h4>

        <span class="price">$<?php echo number_format($pro[$key]['price'],2);?></span>

      </div>

    </div>

    <!-- !SHOP FEATURED ITEM -->

  </div>

  

  <div class="clearfix visible-xs space-30"></div>

  <!-- VIRTUAL ROW !IMPORTANT -->

 

  <!-- VIRTUAL ROW !IMPORTANT -->

 

  <!-- VIRTUAL ROW !IMPORTANT -->

  

  <div class="clearfix visible-xs visible-sm space-30"></div>

  <!-- VIRTUAL ROW !IMPORTANT -->

<?php 

if($a==0)

  {

    echo "</li>";

  }

$i++;}?>

</li>

</ul>

</div>

</div>

</section>

<!-- !FLEXSLIDER -->

<!--<section class="row">

  <div class="section-header col-xs-12">

    <hr>

    <h2 class="strong-header">

      Highlights

    </h2>

  </div>

  <?php  $pro=$site->get_all_products('','1');

foreach ($pro as $key => $value) {

?>

  <div class="col-sm-4">

    <!-- SHOP HIGHLIGHT

    <!-- VERSION 1

    <div class="shop-item-highlight shop-item-highlight-version-1">

      <a href="<?php echo $homeurl;?>product-listing/">

        <img src="<?php echo $homeurl.$pro[$key]['highlighted_img'];?>" alt="Highlighted shop item">

      </a>

      <a href="<?php echo $homeurl;?>product-listing/" class="item-info-name-data">

        <div class="item-info-name-data-wrapper">

          <h4><?php echo $pro[$key]['product_name'];?></h4>

           <span class="price">$<?php echo number_format($pro[$key]['price'],2);?></span>

        </div>

      </a>

    </div>

    <!-- !SHOP HIGHLIGHT 

    <!-- !VERSION 1 

  </div>

  <div class="clearfix visible-xs space-30"></div>

  <!-- VIRTUAL ROW !IMPORTANT 

  <!-- VIRTUAL ROW !IMPORTANT

<?php }?>

  <!-- VIRTUAL ROW !IMPORTANT

</section>-->

<!-- FLEXSLIDER WITH FLIPPED IMAGES -->

<!-- STANDARD -->

<section class="row">

  <div class="section-header col-xs-12">

    <hr>

    <h2 class="strong-header">

      Custom Clothiers on Instagram

    </h2>

  </div>

  <div class="col-md-12">

    <div class="row home-inst">

<iframe src="//widgets-code.websta.me/w/2324e292c294?ck=MjAxNi0wNi0xM1QxNDozMzoyOS4zMTFa" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:auto;height:265px;width:1165px;margin-left:12px;"></iframe> <!-- WEBSTA WIDGETS - widgets.websta.me -->
</div>
</div>
</section>

<!-- !FLEXSLIDER -->

<?php /*?><section class="row">

  <div class="section-header col-xs-12">

    <hr>

    <h2 class="strong-header">

      Top Rated Products

    </h2>

  </div>

  <?php 

  $pro=$site->get_top_rated_products();

  foreach ($pro as $key => $value) {?>

  <div class="col-sm-6 col-md-4 space-30">

    <!-- TOP RATED PRODUCT -->

    <div class="shop-top-rated">

      <a href="<?php echo $homeurl;?>view-product/<?php echo $pro[$key]['id'];?>/">

        <img src="<?php echo $homeurl.$pro[$key]['image'];?>" style="width:70px;height:120px;" alt=" ">

      </a>

      <span class="rating" data-score="<?php echo $pro[$key]['score'];?>"></span>

      <div class="item-info-name-price">

        <h4><a href="<?php echo $homeurl;?>view-product/<?php echo $pro[$key]['id'];?>/"><?php echo $pro[$key]['product_name'];?></a></h4>

        <span class="price">$<?php echo number_format($pro[$key]['price'],2);?></span>

      </div>

    </div>

    <!-- !TOP RATED PRODUCT -->

  </div>

  

  <?php }?>

  <!-- VIRTUAL ROW !IMPORTANT -->

  <!-- VIRTUAL ROW !IMPORTANT -->

  

  

</section><?php */?>

<!-- !SHOP TOP RATED -->

<!-- FLEXSLIDER -->

<!-- STANDARD -->

<!-- !FLEXSLIDER -->

<!-- SECTION EMPHASIS 2 -->

<!-- FULL WIDTH -->

</div>

<!-- !container -->

<!-- !full-width -->

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

          <div class="successMessage alert alert-success alert-dismissable" style="display: none;">

              Thank You! E-mail was sent.

          </div>

          <div class="errorMessage alert alert-danger alert-dismissable " style="display: none;">

              Ups! An error occured. Please try again later.

          </div>

          <form role="form" id="newsletter-form" action="" method="post" class="form-inline validateIt" data-email-subject="Newsletter Form" data-show-errors="true" data-hide-form="true">

            <input type="hidden" name="newsletter" value="letter">

            <div class="form-group">

              <label class="sr-only" for="newsletter-widget-name-1">Your name</label>

              <input type="text" required name="name" class="form-control newsletter-input" id="newsletter-widget-name-1" placeholder="Your name">

            </div>

            <div class="form-group">

              <label class="sr-only" for="newsletter-widget-email-1">Your email</label>

              <input type="email" required name="email" class="form-control newsletter-input" id="newsletter-widget-email-1" placeholder="Your email">

            </div>

            <input type="submit" class="btn btn-primary btn-small" value="Sign up">

          </form>

        </div>

        <!-- !NEWSLETTER BOX -->

      </div>

    </section>

  </div>

</div>

</section>

<div class="clearfix visible-xs visible-sm"></div>

<!-- fixes floating problems when mobile menu is visible -->