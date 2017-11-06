 <?php 



    $sql=mysqli_query($con,"select * from page_content where id=9");



    $r=mysqli_fetch_array($sql);

    ?>

<body>



    <div class="wrapper">



      <div class="new-user">



        <?php if($r['page_title']!=''): ?>
        <div class="container text-center">



        <p><?php echo $r['page_title']; ?><a href="#" data-toggle="modal" data-target="#promoModal">Details</a> </p>





        </div>
      <?php endif; ?>



      </div>    



      <header id="MainNav">



        <div class="container">



          <div class="row">



            <section class="col-md-12" id="TopBar">



            <?php if(isset($_SESSION['login_succ']))



            {



              ?>

              

              

              



              <ul class="nav navbar-nav">



               <li class="dropdown">



                    <a href="<?php echo $homeurl;?>" class="dropdown-toggle" data-toggle="dropdown" 



                      style="padding:0;border:none;">



                      Hi, <?php echo $firstname;?>&nbsp;&nbsp;&nbsp;



                      <b class="caret">



                      </b>



                    </a>



                     <ul class="dropdown-menu user-menu" style="z-index:9999;">



                      <li>



                        <a href="<?php echo $homeurl;?>account-information/">



                          Account Information



                        </a>



                      </li>



                      <li>



                        <a href="<?php echo $homeurl;?>my-orders/">



                          My Orders



                        </a>



                      </li>



                      <li><a href="<?php echo $homeurl;?>my-measurements/">My Measurements</a></li>



                     <?php /*?> <li>



                        <a href="<?php echo $homeurl;?>wishlist/">



                          My Wishlist



                        </a>



                      </li><?php */?>



                      <li>



                        <a href="<?php echo $homeurl;?>address-book/">



                          Address Book



                        </a>



                      </li>



                      <li>



                        <a href="<?php echo $homeurl;?>logout/">



                          Logout



                        </a>



                      </li>



                    </ul>



                </li>



              </ul>



            <?php



            }



            else 



            {

?>



              <a href="<?php echo $homeurl;?>login/" class="btn btn-link pull-left btn-login">



                Sign In



              </a>



              <span class="btn-login pull-left"> | </span>



              <a href="<?php echo $homeurl;?>signup/" class="btn btn-link pull-left btn-login">Sign Up</a>

              

             

             



             



              <!-- SHOPPING CART -->

              <div class="top-showroom">

               <span class="btn-login pull-left"> | </span>

               <a href="<?php echo $homeurl;?>appointments/" class="btn btn-link pull-left btn-login">

                Appointments

               </a>

               </div>

 <?php }?>

 <?php $url = $_SERVER['REQUEST_URI'];
       if (strpos($url, "shopping-cart")===false) { ?>

              <div class="shopping-cart-widget pull-right">

               



                <button type="button" class="btn btn-link pull-right">



                  <span aria-hidden="true" data-bag="bag"><img src="<?php echo $homeurl;?>assets/images/shop-bag-new1.png" /></span>



                  <span class="item-count">0</span> item(s): $<span class="item-price">0.00</span></span> <b class="caret"></b>



                </button>



                <div role="complementary">



                <div class="cart-div">



              <!-- SHOP SUMMARY ITEM -->



             <!-- <article class="shop-summary-item">



                <img src="images/content/prod-001.png" style="height:89px;width:60px;"  alt="Shop item in cart">



                    <div class="item-info-name-features-price">



                        <h4><a href="#">Custom Coat</a></h4>



                        <span class="quantity">1</span><b>&times;</b><span class="price">$159.00</span>



                    </div>



                <button type="button" class="close" aria-hidden="true"><span aria-hidden="true" data-icon="&#xe005;"></span></button>



              </article>-->



              <!-- !SHOP SUMMARY ITEM -->



              <!-- SHOP SUMMARY ITEM -->



            



              <!-- !SHOP SUMMARY ITEM -->



              </div>



              <hr>



              <div class="checkout_buttons">



                  <span class="total-price-tag pull-left">Cart subtotal</span><span class="total-price-tag pull-right">$<span class="item-price">0.00</span></span>



                  <div class="clearfix"></div>



                 <!-- <a href="<?php echo $homeurl;?>" class="btn btn-primary btn-block">



                    View shopping cart



                  </a>-->



                  <a href="<?php echo $homeurl;?>shopping-cart/" class="btn btn-default btn-block">



                    Proceed to cart



                  </a>



              </div>



            </div>



          </div>

<?php } ?>

              <!-- !SHOPPING CART -->



            </section>







            <div class="desk-version text-center" >

            <a class="hidden-xs" href="<?php echo $homeurl;?>"><img src="<?php echo $homeurl;?>assets/images/logo-new.png" alt=" "></a>

                </a>



            </div>











               <div class="clear"></div>



            <nav class="navbar navbar-default">



              <div class="navbar-header">



                <button type="button" class="navbar-toggle btn btn-primary">



                  <span class="sr-only">



                    Toggle navigation



                  </span>



                  <span class="icon-bar">



                  </span>



                  <span class="icon-bar">



                  </span>



                  <span class="icon-bar">



                  </span>



                </button>



                <a class="navbar-brand visible-xs" href="<?php echo $homeurl;?>" title="Ot Koo Toor : Custom Clothing For Men">



                  <img src="<?php echo $homeurl;?>assets/images/logo-new.png" alt="Ot Koo Toor : Custom Clothing For Men">

                </a>



              </div>



              



              <div class="navbar-collapse navbar-main-collapse" role="navigation">

                <ul class="nav navbar-nav">

                 

                  <!-- Dynamic Menu -->

                 <?php

                    

                    $get_main_menu = mysqli_query($con,"select * from category_master");



                    if(mysqli_num_rows($get_main_menu) > 0) { 



                    while($menu_dtl = mysqli_fetch_array($get_main_menu)) { ?>



                  <?php if($menu_dtl['cat_name'] =='Reviews' || $menu_dtl['cat_name']=='Promo'

                    || $menu_dtl['cat_name']=='Wedding') { ?>



              	  <li>

                    <a href="<?php echo $homeurl.strtolower(str_replace(' ','-',$menu_dtl['cat_name']));?>/">

                      <?php echo $menu_dtl['cat_name']; ?>

                    </a>

                   </li>

                  <?php } else { ?>

              	  <li class="dropdown">

                    <?php if($menu_dtl['cat_name'] =='About') { ?>

                    <a href="<?php echo $homeurl.strtolower(str_replace(' ','-',$menu_dtl['cat_name'])); ?>-us/" class="dropdown-toggle" data-toggle="dropdown">

                    <?php }else{?>

                    <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$menu_dtl['cat_name'])); ?>/" class="dropdown-toggle" data-toggle="dropdown">

                    <?php }?>

                      <?php echo $menu_dtl['cat_name']; ?>

                      <b class="caret">

                      </b>

                    </a>

                    <ul class="dropdown-menu">

                    <?php

                      $get_sub_menu = mysqli_query($con,"select * from sub_category_master where catid='".$menu_dtl['cat_id']."'");

                      if(mysqli_num_rows($get_sub_menu) > 0) { 



                    	while($sub_menu_dtl = mysqli_fetch_array($get_sub_menu)) { ?>

                      <li>

                       <?php if($menu_dtl['cat_name'] =='About') { ?>

                        <a href="<?php echo $homeurl.strtolower(str_replace(' ','-',$sub_menu_dtl['sub_cat_name'])); ?>/">

                          <?php echo $sub_menu_dtl['sub_cat_name']; ?>

                        </a>

                        <?php } 

                        else {  

                          if($sub_menu_dtl['sub_cat_name']=="Gift Card"){

                            ?>

                               <a href="<?php echo $homeurl.strtolower(str_replace(' ','-',$sub_menu_dtl['sub_cat_name'])); ?>/">

                          <?php echo $sub_menu_dtl['sub_cat_name']; ?>

                        </a>

                          <?php

                          }

                            else{

                          ?>

                        <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$menu_dtl['cat_name'])); ?>/<?php echo strtolower(str_replace(' ','-',$sub_menu_dtl['sub_cat_name'])); ?>/">

                          <?php echo $sub_menu_dtl['sub_cat_name']; ?>

                        </a>



                        <?php } } ?>

                      </li>



                      <?php } } ?>

                     </ul>

                  </li>

                    <?php } ?>

                  <?php } } ?>

                </div>

            </nav>



          </div>



        </div>



      </header>







      <!-- Promo Modal -->

        <div id="promoModal" class="modal fade order-modal" role="dialog">

          <div class="modal-dialog order">



            <!-- Modal content-->



            <div class="modal-content">

            <div class="modal-close">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

</div>

             

            

              <div class="modal-header">

               

                <h4 class="modal-title"><strong><?php echo $r['page_title']; ?><?php //echo substr($r['page_desc'], 0, strpos($r['page_desc'], '.')); ?></strong></h4>

              </div>

              <?php if($r['page_desc']!=''): ?>
              <div class="modal-body">

                <p><?php echo $r['page_desc']; ?></p>

              </div>


              <div class="modal-footer">

              </div>
              <?php endif; ?>

            </div>



          </div>

        </div>



        <script>

        $("button.close2").one('click',function(){

          alert("hi");

        });



        </script>