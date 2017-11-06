<?php
$date=date("d-m-Y h:i:s a");
$sql=mysqli_query($con,"select count(a_id) as a_id from appointment_master where a_timings>='$date'");
$r=mysqli_fetch_array($sql);

$url = explode("/",$_SERVER['REQUEST_URI']);
$uri1 = $url[3];
$uri2 = $url[4];

?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">         
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
   <!--     <li class="header">MENU NAVIGATION</li>-->
        <li class="dashboard <?=($uri1=='dashboard')?'active':'';?>">
          <a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <?php if(isset($_SESSION['admin_user_id']) || isset($_SESSION['manu_user_id']) || isset($_SESSION['emp_user_id'])){?>

        <li class="orders <?=($uri1=='orders')?'active':'';?>"><a href="<?php echo $adminurl;?>orders/"><i class="fa fa-cart-plus"></i> <span>Orders</span></a></li>

      <?php }?>
        <?php 
        if(isset($_SESSION['admin_user_id'])){
        ?>
         <li class="seo <?=($uri1=='seo')?'active':'';?>"><a href="<?php echo $adminurl;?>seo/"><i class="fa fa-globe"></i> <span>SEO Settings</span></a>
        <li class="pages <?=($uri1=='pages-add' || $uri1=='gallery' || $uri1=='why-us' || $uri1=='faqs' || $uri1=='works' || $uri1=='contact-us' || $uri1=='wedding' || $uri1=='wedding-banner' || $uri1=='order-received-add')?'active':'';?>"><a href="Javascript:void(0);"><i class="fa fa-clipboard"></i> <span>CMS Pages</span><i class="fa fa-angle-left pull-right"></i></a>


            <ul class="treeview-menu">               

			           <li class="about <?=($uri2=='5')?'active':'';?>"><a href="<?php echo $adminurl;?>pages-add/5/"><i class="fa fa-minus"></i> About Us</a></li> 

                 <li class="privacy <?=($uri2=='1' && $uri1=='pages-add')?'active':'';?>"><a href="<?php echo $adminurl;?>pages-add/1/"><i class="fa fa-minus"></i> Privacy Policy</a></li>



                 <li class="our-story <?=($uri2=='3')?'active':'';?>"><a href="<?php echo $adminurl;?>pages-add/3/"><i class="fa fa-minus"></i> Our Story</a></li>
                 <li class="why-us <?=($uri1=='why-us')?'active':'';?>"><a href="<?php echo $adminurl;?>why-us/"><i class="fa fa-minus"></i> Why Us</a></li>
                 <li class="terms <?=($uri2=='4')?'active':'';?>"><a href="<?php echo $adminurl;?>pages-add/4/"><i class="fa fa-minus"></i> Terms & Conditions</a></li>
                  <li class="faqs <?=($uri1=='faqs')?'active':'';?>"><a href="<?php echo $adminurl;?>faqs/"><i class="fa fa-minus"></i> FAQs</a></li>
                  <li class="works <?=($uri1=='works')?'active':'';?>"><a href="<?php echo $adminurl;?>works/"><i class="fa fa-minus"></i> How It Works</a></li>
                
                   <li class="promo <?=($uri2=='6')?'active':'';?>"><a href="<?php echo $adminurl;?>pages-add/6/"><i class="fa fa-minus"></i> Promo</a></li>
                   <li class="careers <?=($uri2=='7')?'active':'';?>"><a href="<?php echo $adminurl;?>pages-add/7/"><i class="fa fa-minus"></i> Careers</a></li>
                   <li class="contact <?=($uri1=='contact-us')?'active':'';?>"><a href="<?php echo $adminurl;?>contact-us/"><i class="fa fa-minus"></i> Contact Us</a></li>
                  <li class="gallery <?=($uri1=='gallery')?'active':'';?>">
                    <a href="<?php echo $adminurl;?>gallery/"><i class="fa fa-minus"></i> Gallery</a>
                  </li>
                  <li class="wedding <?=($uri1=='wedding')?'active':'';?>"><a href="<?php echo $adminurl;?>wedding/">
                      <i class="fa fa-minus"></i> Wedding</a></li>
                  <li class="wedding-banner <?=($uri1=='wedding-banner')?'active':'';?>"><a href="<?php echo $adminurl;?>wedding-banner/"><i class="fa fa-minus"></i> <span>Wedding Banner</span></a></li>

                      <li class="press <?=($uri2=='12')?'active':'';?>"><a href="<?php echo $adminurl;?>pages-add/12/">

                      <i class="fa fa-minus"></i> Press</a></li>

                   <li class="order-received <?=($uri1=='order-received-add')?'active':'';?>"><a href="<?php echo $adminurl;?>order-received-add/1/"><i class="fa fa-minus"></i> <span>Order Received</span></a></li>


                      </li>     

             </ul>

        </li>

 <li class="products <?=($uri1=='products')?'active':'';?>"><a href="<?php echo $adminurl;?>products/"><i class="fa fa-tags"></i> <span>Products</span></a></li>
<li class="property <?=($uri1=='labels' || $uri1=='styles')?'active':'';?>">



            <a href="javascript:void(0);">



                    <i class="fa fa-bolt"></i><span>Product Properties</span><i class="fa fa-angle-left pull-right"></i>



            </a>



            <ul class="treeview-menu">               



                 <li class="labels <?=($uri1=='labels')?'active':'';?>"><a href="<?php echo $adminurl;?>labels/"><i class="fa fa-minus"></i> Labels</a></li>



                 <li class="styles <?=($uri1=='styles')?'active':'';?>"><a href="<?php echo $adminurl;?>styles/"><i class="fa fa-minus"></i> Styles</a></li>



             </ul>



        </li>
        <li class="carousel <?=($uri1=='carousel')?'active':'';?>"><a href="<?php echo $adminurl;?>carousel/"><i class="fa fa-tasks"></i> <span>Carousel Content</span></a></li>
        <li class="quotes <?=($uri1=='quotes')?'active':'';?>"><a href="<?php echo $adminurl;?>quotes/"><i class="fa fa-quote-left"></i> <span>Quotes</span></a></li>
        <li class="payment <?=($uri1=='payment-information')?'active':'';?>"><a href="<?php echo $adminurl;?>payment-information/"><i class="fa fa-paypal"></i> <span>Payment Details</span></a></li>
        <li class="gift <?=($uri1=='gift-card')?'active':'';?>"><a href="<?php echo $adminurl;?>gift-card/"><i class="fa fa-gift"></i> <span>Gift Card</span></a></li>
        <li class="banner <?=($uri1=='banner')?'active':'';?>"><a href="<?php echo $adminurl;?>banner/"><i class="fa fa-bookmark"></i> <span>Banners</span></a></li>
        <li class="colors <?=($uri1=='colors')?'active':'';?>"><a href="<?php echo $adminurl;?>colors/"><i class="fa fa-adjust"></i> <span>Custom Colors</span></a></li>
        <li class="fields <?=($uri1=='pro-fields')?'active':'';?>"><a href="<?php echo $adminurl;?>pro-fields/"><i class="fa fa-scissors"></i> <span>Measurement Fields</span></a></li>



        <li class="users <?=($uri1=='users')?'active':'';?>"><a href="<?php echo $adminurl;?>users/"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li class="reviews <?=($uri1=='reviews')?'active':'';?>"><a href="<?php echo $adminurl;?>reviews/"><i class="fa fa-edit"></i> <span>Reviews</span></a></li>

         <li class="vendors <?=($uri1=='vendors')?'active':'';?>"><a href="<?php echo $adminurl;?>vendors/"><i class="fa fa-users"></i> <span>Vendors</span></a></li>
          <li class="employee <?=($uri1=='employees')?'active':'';?>"><a href="<?php echo $adminurl;?>employees/"><i class="fa fa-user"></i> <span>Employees</span></a></li>
           <li class="showroom <?=($uri1=='showrooms')?'active':'';?>"><a href="<?php echo $adminurl;?>showrooms/"><i class="fa fa-building"></i> <span>Showrooms</span></a></li>
<li class="category <?=($uri1=='category')?'active':'';?>"><a href="<?php echo $adminurl;?>category/"><i class="fa fa-cog"></i> <span>Category</span></a></li>
<li class="sub_category <?=($uri1=='sub-category')?'active':'';?>"><a href="<?php echo $adminurl;?>sub-category/"><i class="fa fa-sitemap"></i> <span>SubCategory</span></a></li>

 <li class="fabrics <?=($uri1=='fabrics')?'active':'';?>"><a href="<?php echo $adminurl;?>fabrics/"><i class="fa fa-leaf"></i> <span>Fabrics</span></a></li>



   <li class="discounts <?=($uri1=='discounts')?'active':'';?>"><a href="<?php echo $adminurl;?>discounts/"><i class="fa fa-fire"></i> <span>Discounts</span></a></li>


       


<!--
        <li class="extras">



            <a href="javascript:void(0);">



                    <i class="fa fa-plus"></i><span>Extras</span><i class="fa fa-angle-left pull-right"></i>



            </a>



            <ul class="treeview-menu">               



                 



                 



                 <!-- <li class="variants"><a href="<?php echo $adminurl;?>variants/"><i class="fa fa-circle-o"></i> Variants</a></li>-



                


                 <!--<li class="vendors"><a href="<?php echo $adminurl;?>vendors/"><i class="fa fa-circle-o"></i> Manufacturers</a></li>



                 <li class="employee"><a href="<?php echo $adminurl;?>employees/"><i class="fa fa-circle-o"></i> Employees</a></li>

             </ul>



        </li>-->



         

    <?php }?>

    
      <?php 
        if(!isset($_SESSION['manu_user_id'])){
        ?>

      <li class="appointment <?=($uri1=='appointment-list' || $uri1=='appointments')?'active':'';?>"><a href="javascript:void(0);">
          <i class="fa fa-calendar"></i> <span>Appointments</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>

            <ul class="treeview-menu">               
                 <li class="list <?=($uri1=='appointment-list')?'active':'';?>">
                   <a href="<?php echo $adminurl;?>appointment-list/"><i class="fa fa-minus"></i> List</a>
                 </li>
                 <li class="calendar <?=($uri1=='appointments')?'active':'';?>">
                  <a href="<?php echo $adminurl;?>appointments/"><i class="fa fa-minus"></i> Calendar</a>
                 </li>
           </ul>
      </li>
<?php }?>
        <li class=""><a href="<?php echo $adminurl;?>logout/"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>



        </ul>



        </ul>



    </section>



        <!-- /.sidebar -->



</aside>


