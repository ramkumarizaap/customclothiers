<!-- Single Product Template -->

<?php

if(isset($_GET['orderid1'])) {

$id=str_replace('-',' ',$_GET['orderid1']);

$subcatid1=str_replace('-',' ',$_GET['subcatid']);

$get_sub_cat_id = mysqli_query($con,"select sub_cat_id from sub_category_master where sub_cat_name='".$subcatid1."'");
if(mysqli_num_rows($get_sub_cat_id) > 0)
{
  $sub_cat_id12 = mysqli_fetch_array($get_sub_cat_id);
}
$pro_id=$site->get_product_by_name1($id,$sub_cat_id12['sub_cat_id']);

$get_sub_cat = $site->get_all_sub_category($pro_id[0]['sub_category']);

?>

<section id="Content" role="main">

<div class="container">

  <!-- SECTION EMPHASIS 1 -->

  <!-- FULL WIDTH -->

</div>

<!-- !container -->

<div class="full-width section-emphasis-1 page-header page-header">

  <div class="container">

    <header class="row">

      <div class="col-md-12">

      <h1 class="strong-header pull-left">

                  <?php echo $_GET['id'];?>

                </h1>

        <!-- BREADCRUMBS -->

        <ul class="breadcrumbs list-inline pull-right">

          <li><a href="<?php echo $homeurl;?>">Home</a></li>

          <li><a href="<?php echo $homeurl;?>Shop/">Shop</a></li>

          <li>

            <a href="<?php echo $homeurl;?>Shop/<?php echo $_GET['id'];?>/">

                <?php $cat_id=$site->get_category_by_id($pro_id[0]['category']);

                echo $cat_id[0]['name'];

                ?>

              </a>

          </li>

          <li>

            <a href="<?php echo $homeurl;?>Shop/<?php echo $cat_id[0]['name']."/".$_GET['subcatid'];?>/">

               <?php echo $_GET['subcatid']; ?>

            </a>

          </li>

          

          <!--

                                        -->

          <li><?php echo $pro_id[0]['product_name'];?></li>

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

<article class="row shop-product-single">

<div class="col-md-5 space-right-20">

  <!-- thumbnailSlider -->

  <div class="thumbnailSlider">

    <div class="flexslider flexslider-thumbnails">

      <ul class="slides">

      <?php 

      foreach($pro_id[0]['image'] as $key =>$value){

      ?>

        <li>

          <a href="<?php echo $homeurl.$pro_id[0]['image'][$key]['image'];?>" data-rel="prettyPhotoGallery[product]">

            <img src="<?php echo $homeurl.$pro_id[0]['image'][$key]['image'];?>" alt=" ">

          </a>

        </li>

        <?php }?>

        <!--<li>

          <a href="images/content/product-single-large-2.jpg" data-rel="prettyPhotoGallery[product]">

            <img src="images/content/product-single-2.jpg" alt=" ">

          </a>

        </li>

        <li>

          <a href="images/content/product-single-large-3.jpg" data-rel="prettyPhotoGallery[product]">

            <img src="images/content/product-single-3.jpg" alt=" ">

          </a>

        </li>

        <li>

          <a href="images/content/product-single-large-4.jpg" data-rel="prettyPhotoGallery[product]">

            <img src="images/content/product-single-4.jpg" alt=" ">

          </a>

        </li>-->

      </ul>

    </div>

<?php

$imc=count($pro_id[0]['image']);

if($imc>1)

{

?>

    <ul class="smallThumbnails clearfix">

    <?php $i=0;

      foreach($pro_id[0]['image'] as $key =>$value){

      ?>

      <li data-target="<?php echo $i;?>">

        <img src="<?php echo $homeurl.$pro_id[0]['image'][$key]['image'];?>" alt=" ">

      </li>

      <?php $i++;}?>

      <!--<li data-target="1">

        <img src="images/content/product-single-thumbnail-2.jpg" alt=" ">

      </li>

      <li data-target="2">

        <img src="images/content/product-single-thumbnail-3.jpg" alt=" ">

      </li>

      <li data-target="3">

        <img src="images/content/product-single-thumbnail-4.jpg" alt=" ">

      </li>-->

    </ul>

    <?php } ?>

  </div>

  <!-- / thumbnailSlider -->

</div>

<?php

$sc="";

 $rev=$site->get_reviews($pro_id[0]['id']);

 if($rev){

 foreach ($rev as $key => $value) {

    $sc  =$sc + $rev[$key]['score'];

 }

 $score=$sc / count($rev);

}

else

{

  $score="0";

}

 

?>

<div class="clearfix visible-sm visible-xs space-30"></div>

<div class="col-md-7 space-left-20">

<header>

  <span class="rating" data-score="<?php echo $score;?>"></span>

  <a href="#reviews">

  <?php echo $r_count=$site->get_counts("reviews",$pro_id[0]['sub_category'],$pro_id[0]['id']);?> <?php if($r_count==1 || $r_count==0) { ?>review <?php } else { ?> reviews <?php } ?></a>

  <a href="#reviews1">Write a review</a>

  <h1>

    <?php echo $pro_id[0]['product_name'];?>

  </h1>

  <span class="product-code">Product Code: <?php echo $pro_id[0]['rand'];?></span><br><br>

  <!--<span class="price-old">$209.00</span>-->&nbsp;&nbsp;<span class="price">$<?php echo number_format($pro_id[0]['price']);?></span>

</header>

<form role="form" class="shop-form form-horizontal" id="customize-form" action="<?php echo $homeurl; ?>customize/<?php echo strtolower(str_replace(' ','-',$get_sub_cat[0]['subcat_name'])); ?>/style/" method="post" novalidate>

  <button type="button" data-toggle="modal" data-target="#cart-popup" class="add-cart btn btn-primary" data-pid="<?php echo $pro_id[0]['id'];?>" data-subid="<?php echo $pro_id[0]['sub_category'];?>">Add to cart</button>
  <?php
    if($pro_id[0]['sub_category'] == '6')

    {

      $customizer_url='#';

    }

    else
    {

      $customizer_url=$homeurl."customize/".$pro_id[0]['id']."/style/";

    }

  ?>

  <input type="hidden" name="p_id" value="<?php echo $pro_id[0]['id']; ?>">

  <?php if(isset($_SESSION['p_id'])) {

        unset($_SESSION['p_id']);

       }

    $_SESSION['p_id'] = $pro_id[0]['id']; ?>

    
<?php 
  if($pro_id[0]['sub_category']!="6")
  {
    ?>
    <a class="btn btn-default customize-product">Customize</a>
    <?php 
  }
  ?>
  <div class="clearfix"></div>

</form>

<!--<div class="shop-product-single-social">

  <span class="social-label pull-left">Share this product</span>

  <div class="social-widget social-widget-mini social-widget-dark pull-left">

    <ul class="list-inline">

      <li>

        <a href="#"

           onclick="window.open(this.href, 'facebook-share','width=580,height=296'); return false;"

           rel="nofollow"

           title="Facebook"

           class="fb">

          <span class="sr-only">Facebook</span>

        </a>

      </li>

      <li>

        <a href="#"

           onclick="window.open(this.href, 'twitter-share', 'width=550,height=235'); return false;"

           rel="nofollow"

           title=" Share on Twitter"

           class="tw">

          <span class="sr-only">Twitter</span>

        </a>

      </li>

      <li>

        <a href="#"

           onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530'); return false;"

           rel="nofollow"

           title="Google+"

           class="gp">

          <span class="sr-only">Google+</span>

        </a>

      </li>

      <li>

        <a href="#"

           onclick="window.open(this.href, 'pinterest-share', 'width=770,height=320'); return false;"

           rel="nofollow"

           title="Pinterest"

           class="pt">

          <span class="sr-only">Pinterest</span>

        </a>

      </li>

      <li>

        <a href="#"

           onclick="window.open(this.href, 'linkedin-share', 'width=600,height=439'); return false;"

           rel="nofollow"

           title="LinkedIn" class="in">

          <span class="sr-only">LinkedIn</span>

        </a>

      </li>

    </ul>

  </div>

</div>-->

<div class="tabs">

  <ul class="nav nav-tabs">

    <li class="active"><a href="#description" data-toggle="tab">Description</a></li>

   <li><a href="#info" data-toggle="tab">Additional info</a></li>

    <li><a href="#reviews" data-toggle="tab">Reviews (<?php echo $r_count;?>)</a></li>

    <li><a href="#reviews1" data-toggle="tab">Write a review</a></li>

  </ul>

  <div class="tab-content">

    <div class="tab-pane fade in active" id="description">

        <div class="table table-condensed">
        <?php echo $pro_id[0]['description'];?>
        </div>

    </div>

    <div class="tab-pane fade" id="info">

      <div class="table table-condensed">

        <?php if($pro_id[0]['p_info']!=''){

            echo $pro_id[0]['p_info'];

          }

          else{

            echo "No Info Found!!!";

            }?>

      </div>

    </div>

    <section class="tab-pane fade" id="reviews">

    <?php 

    if($rev)

    {

  foreach ($rev as $key => $value) {

   ?>

      <article class="review">

        <header>

          <span class="rating" data-score="<?php echo $rev[$key]['score'];?>"></span><br>

          <h4 class="author"><?php echo $rev[$key]['name'];?></h4>

          <span class="date"><?php echo date('M d, Y',strtotime($rev[$key]['date']));?></span>

        </header>

        <p>

          <?php echo $rev[$key]['desc'];?>

        </p>

      </article>

      <?php } }?>

    </section>

    <section class="tab-pane fade" id="reviews1">

     

      <form id="review-form" action="" method="post">

      <input type="hidden" name="review" value="review">

      <input type="hidden" name="product" value="<?php echo $pro_id[0]['id'];?>">

        <label class="raty-label">

          Your rating for this item<br>

          <span class="rate"></span><br>

          <input type="hidden" class="score_rate" name="score_rate">

        </label>

        <div class="form-group">

            <label for="email">First Name</label>

            <input type="text" class="form-control" id="firstname" name="firstname">

        </div>

       <!-- <div class="form-group">

            <label for="email">Email</label>

            <input type="email" class="form-control" id="email" name="email">

        </div>-->

         <div class="form-group">

            <label for="email">City</label>

            <input type="text" class="form-control" id="city" name="city">

        </div>

         <div class="form-group">

            <label for="email">State</label>

            <select name="state" size="1" class="form-control"> 

            <option value="">--Select State--</option>

             <?php

             $s_list=$site->get_state();

             foreach ($s_list as $key => $value) {?>

                  <option value="<?php echo $s_list[$key]['name'];?>">

                  <?php echo $s_list[$key]['name'];?></option>

                  <?php

                  }

             ?>

          </select>

        </div>

         <div class="form-group">

            <label for="email">Title</label>

            <input type="text" class="form-control" id="title" name="title">

        </div>

        <div class="form-group">

          <label for="review">Comments</label>

          <textarea class="form-control" id="review" name="comments" rows="6"></textarea>

        </div>

        <input type="submit" name="review1" class="btn review-btn btn-primary" value="Submit review" />

      </form>

      <div class="clearfix"></div> 

      <div class="col-md-12 post-msg"></div>

    </section>

  </div>

</div>

</div>

</article>

</div>

</section>

<div class="clearfix visible-xs visible-sm"></div>

<!-- fixes floating problems when mobile menu is visible -->

<!--Cart Modal Starts Here-->

  <div id="cart-popup" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

  <!--  Cart Modal content-->

    <form action="<?php echo $homeurl;?>includes/action/action.php" method="post" id="ajax-login-form">

        <input type="hidden" name="return_url" value="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">

    <div class="modal-content">

       <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Shopping Cart</h4>

      </div>

      <div class="modal-body cart_body col-md-12" style="display:table;margin-bottom:-35px;">

      </div>

         <div class="modal-footer">

             <a class="btn check-btn btn-primary pull-right proceed-to-cart" href="">Proceed to Cart</a>

             

            <a class="btn btn-default pull-left" href="<?php echo $homeurl; ?>Shop/">Continue Shopping</a>

          </div>

      

    </div>

</form>

  </div>

  </div>

<!-- Cart Modal Ends Here-->







<!-- Product Listing Page -->

<?php } else { ?>

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

                  <?php 

                $id=isset($_GET['id']) ? $_GET['id'] : "";

                if($id!='')

                {

                  echo str_replace("-"," ",$id);

                }

                else

                {

                ?>

                  SHOP

                  <?php }?>

                </h1>

                <?php if(isset($_GET['orderid']) && $_GET['orderid']!="misc")
                {
                  ?>

                <div class="col-md-7 text-right">

                <form action="<?php echo $homeurl;?>customize/<?php echo str_replace("-","",$_GET['orderid']);?>/style/" method="post">

                <p style="font-size:20px;"><strong>Pick Your Favourite Design or </strong>

                <?php 

                $sub=str_replace("-","",$_GET['orderid']);

                $sid=mysqli_query($con,"select a.p_id FROM product_master a,sub_category_master b where a.subcatid=b.sub_cat_id and b.sub_cat_name='".$sub."' and a.frontend=1 ");

                $sr=mysqli_fetch_array($sid);

                ?>

                <input type="hidden" name="p_id" value="<?php echo $sr['p_id'];?>">

                <button type="submit" class="btn btn-primary">Customize</button>

                </p>

                </form>

                </div>

                <?php }?>

                

                <!-- BREADCRUMBS -->

                <ul class="breadcrumbs list-inline pull-right">

                  <li>

                    <a href="<?php echo $homeurl;?>">

                      Home

                    </a>

                  </li>

                  <!--

-->

                 <?php if(!empty($_GET['id'])) { ?>

                  <li>

                    <a href="<?php echo $homeurl; ?>Shop/">Shop</a>

                  </li>

                  <?php } else { ?>

                   <li>

                   Shop

                  </li>

                  <?php } ?>

                  <?php if(!empty($_GET['id']) && !empty($_GET['orderid'])) { ?>

                   <li>

                    <a href="<?php echo $homeurl; ?>Shop/<?php echo $_GET['id']; ?>/"><?php echo ucfirst($_GET['id']); ?></a>

                   </li>

                   <?php } else if(!empty($_GET['id'])) { ?>

                   <li>

                    <?php echo ucfirst($_GET['id']); ?>

                   </li>

                   <?php } ?>

                  <li>

                  <?php echo ucfirst($_GET['orderid']); ?>

                  </li>

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

          

          <div class="row">

            <form>

              <div class="shop-list-filters col-sm-4 col-md-3">

                

                <div class="filters-active element-emphasis-strong" style="display:none;">

                  <h3 class="strong-header element-header" style="display:none;">

                    You've selected

                  </h3>

                  <!-- dynamic added selected filters -->

                  <ul class="filters-list list-unstyled">

                    <li>

                    </li>

                  </ul>

                  <button type="button" class="filters-clear btn btn-primary btn-small btn-block">

                    Clear all

                  </button>

                </div>

                

                <button type="button" class="btn btn-default btn-small visible-xs" data-texthidden="Hide Filters" data-textvisible="Show Filters" id="toggleListFilters">

                </button>

                

                <div id="listFilters">

                  

                  <div class="filters-details element-emphasis-weak">

                    <!-- ACCORDION -->

                    <div class="accordion">

                      <div class="panel-group">

                        <div class="panel panel-default">

                          <div class="panel-heading">

                            <h4 class="strong-header panel-title">

                              <a class="accordion-toggle" data-toggle="collapse" href="#collapse-001">

                                Price range

                              </a>

                            </h4>

                          </div>

                          <div id="collapse-001" class="panel-collapse collapse in">

                            <div class="panel-body">

                              <div class="filters-range" data-min="0" data-max="3200" data-step="5">

                                <div class="filter-widget">

                                </div>

                                <div class="filter-value">

                                  <input type="text" class="min" disabled>

                                  <input type="text" class="max" disabled>

                                </div>

                              </div>

                            </div>

                          </div>

                        </div>

                        <?php

                        if(!isset($_GET['orderid'])){?>

                        <div class="panel panel-default">

                          <div class="panel-heading">

                            <h4 class="strong-header panel-title">

                              <a class="accordion-toggle" data-toggle="collapse" href="#collapse-002">

                                Categories

                              </a>

                            </h4>

                          </div>

                          <div id="collapse-002" class="panel-collapse collapse in">

                            <div class="panel-body">

                              <div class="filters-checkboxes myFilters" data-option-group="category" data-option-type="filter">

                                <div class="form-group">

                                  <input type="checkbox" class="sr-only" id="filters-categories-all">

                                  <label for="filters-categories-all" data-option-value="" class="selected isotopeFilter">

                                    All

                                  </label>

                                </div>

                                <?php

                                

                                $cat=$site->get_all_category();

                                ///print_r($cat);

                                foreach ($cat as $key => $value) {

                                  $name=str_replace(' ','',$cat[$key]['name']);

                                  $name1=str_replace(' ','',strtolower($cat[$key]['name']));

                                  ?>

                                 <ul id="menu-content" class="menu-content">

                                     <?php 

                                 $catid=isset($_GET['id']) ? str_replace("-","",$_GET['id']) : "";

                                 if(($catid==$name1 || $catid=="")&& $cat[$key]['name']=="Shop")

                                 {

                                 ?>

                                      <!--<li data-toggle="collapse" data-target="#<?php echo $name;?>" class="collapsed <?php if($catid==$cat[$key]['id']){?> active <?php }?>">

                                        <a href="javascript:void(0);"><i class="fa fa-bars  fa-sm"></i> 

                                          <span class="text"> <?php echo $cat[$key]['name'];?> </span><span class="arrow"></span></a>

                                      </li>

                                      <ul class="sub-menu <?php if($catid==$cat[$key]['id']){?> in <?php }else{?> collapse <?php }?>" id="<?php echo $name;?>">-->

                                      <?php

                                      $subcat=$site->get_all_sub_category('',$cat[$key]['id']);

                                      foreach ($subcat as $key => $value) {?>

                                          <li>

  

                                            <div class="form-group">

                                              <input type="checkbox" class="sr-only" id="filters-categories-bags_and_purses">

                                              <label for="filters-categories-bags_and_purses" data-option-value=".<?php echo str_replace(" ","-",strtolower($subcat[$key]['subcat_name']));?>" class="isotopeFilter margin-top">

                                                <?php echo $subcat[$key]['subcat_name'];?>

                                              </label>

                                            </div>

                                          </li>

                                       <?php }

                                     }

                                       ?>

                                     

                                  </ul>

                                  <?php }

                                  ?>    

                              </div>

                            </div>

                          </div>

                        </div>

                        <?php } 

                        else if(isset($_GET['orderid']) && $_GET['orderid']!='misc')

                        {

                        ?>

                            <div class="panel panel-default">

                              <div class="panel-heading">

                                <h4 class="strong-header panel-title">

                                  <a class="accordion-toggle" data-toggle="collapse" href="#collapse-002">

                                    Fabric

                                  </a>

                                </h4>

                              </div>

                              <div id="collapse-002" class="panel-collapse collapse in">

                                <div class="panel-body">

                                  <div class="filters-checkboxes myFilters" data-option-group="category" data-option-type="filter">

                                    <div class="form-group">

                                      <input type="checkbox" class="sr-only" id="filters-categories-all">

                                      <label for="filters-categories-all" data-option-value="" class="selected isotopeFilter">

                                        All

                                      </label>

                                    </div>

                                    <?php

                                    $sub=str_replace("-"," ",$_GET['orderid']);

                                    $sql=mysqli_query($con,"select a.fabid,a.subcatid from product_master a,sub_category_master b where a.subcatid=b.sub_cat_id and b.sub_cat_name='$sub' and a.frontend=1");

                                    $r=mysqli_fetch_array($sql);

                                    $fab=$site->get_fabrics3('',$r['subcatid']);

                                    ///print_r($cat);

                                    foreach ($fab as $key => $value) {

                                     // $name=str_replace(' ','',$cat[$key]['name']);

                                    //  $name1=str_replace(' ','',strtolower($cat[$key]['name']));

                                      ?>

                                     <?php 

                                    // $catid=isset($_GET['id']) ? str_replace("-","",$_GET['id']) : "";

                                     ?>

                                                <div class="form-group">

                                                  <input type="checkbox" class="sr-only" id="filters-categories-bags_and_purses">

                                                  <label for="filters-categories-bags_and_purses" data-option-value=".<?php echo str_replace(" ","-",strtolower($fab[$key]['fab_name']));?>" class="isotopeFilter margin-top">

                                                    <?php echo $fab[$key]['fab_name'];?>

                                                  </label>

                                                </div>

                                              

                                           <?php 

                                         }

                                           ?>

                                  </div>

                                </div>

                              </div>

                            </div>

                        <?php

                        }

                        ?>

        </div>

      </div>

      <!-- !ACCORDION -->

    </div>

  </div>

  <!-- / #listFilters -->

  </div>

  

  <div class="clearfix visible-xs">

  </div>

  <div class="col-sm-8 col-md-9">

    <div class="row">

      <div class="shop-list-filters col-sm-6 col-md-8">

        <span class="filters-result-count">

          <span>

            24

          </span>

          results

        </span>

      </div>

      <div class="shop-list-filters col-sm-6 col-md-4">

        <div class="filters-sort">

          <div class="btn-group myFilters" data-option-group="sortby" data-option-type="sortBy">

            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

              Original order 

              <span class="caret">

              </span>

            </button>

            <ul class="dropdown-menu" role="menu">

              <li>

                <a href="javascript:void(0);" class="selected isotopeFilter" data-option-value="original-order" data-option-asc="true">

                  Original order

                </a>

              </li>

              <li>

                <a href="javascript:void(0);" class="isotopeFilter" data-option-value="date" data-option-asc="false">

                  Sort by newest

                </a>

              </li>

              <li>

                <a href="javascript:void(0);" class="isotopeFilter" data-option-value="popular" data-option-asc="false">

                  Sort by popularity

                </a>

              </li>

              <li>

                <a href="javascript:void(0);" class="isotopeFilter" data-option-value="rating" data-option-asc="false">

                  Sort by rating

                </a>

              </li>

              <li>

                <a href="javascript:void(0);" class="isotopeFilter" data-option-value="random" data-option-asc="false">

                  Sort by random

                </a>

              </li>

               <li>

                <a href="javascript:void(0);" class="isotopeFilter" data-option-value="price" data-option-asc="true">

                  Sort by Price

                </a>

              </li>

            </ul>

          </div>

        </div>

      </div>

      <div class="clearfix">

      </div>

      <div class="col-xs-12">

        

        

        <!-- ISOTOPE GALLERY -->

        <div id="isotopeContainer" class="shop-product-list isotope">

            <?php

              $catid=isset($_GET['id']) ? $_GET['id'] : "";

              $subcatid=isset($_GET['orderid']) ? $_GET['orderid'] : "";

              $pro=$site->get_all_products('','frontend','','',str_replace("-"," ",$catid),str_replace("-"," ",$subcatid));

              //exit;

              //print_r($pro);

              foreach ($pro as $key => $value) {

                $f_name="";

                $fab=$site->get_fabrics('',$pro[$key]['fabid']);

                  foreach ($fab as $key1 => $value1) {

                    $f_name .=$fab[$key1]['fab_name'].",";

                  }

                  $name= strtolower(trim(str_replace(" ","-",$f_name),","));

                  $f_name=str_replace(","," ",$name);



                  $sc="";

                 $rev=$site->get_reviews($pro[$key]['id']);

                 if($rev){

                 foreach ($rev as $key3 => $value3) {

                    $sc  =$sc + $rev[$key3]['score'];

                 }

                 $score=$sc / count($rev);

                }

                else

                {

                  $score="0";

                }

 

                ?>

          <div class="isotope-item  <?php echo $f_name;?> size1 size2 <?php echo str_replace(" ","-",strtolower($pro[$key]['sub_cat_name']));?>" data-date="January 1, 2012" data-popular="40" data-rating="<?php echo $score; ?>" data-price="<?php echo number_format($pro[$key]['price'],2);?>">

            <!-- SHOP FEATURED ITEM -->

            <div class="shop-item shop-item-featured overlay-element">

              <div class="overlay-wrapper">

                <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$pro[$key]['cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['sub_cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['product_name']));?>/">

                  <img src="<?php echo $homeurl.$pro[$key]['image'];?>" alt="">

                </a>

                <div class="overlay-contents">

                   

                  <div class="shop-item-actions">

                    <!--<button type="button" class="add-cart btn btn-primary btn-block" data-pid="<?php echo $pro[$key]['id'];?>">

                      Add to cart

                    </button>-->

                    <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$pro[$key]['cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['sub_cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['product_name']));?>/" class="btn btn-default btn-block">

                        View details

                    </a>

                  </div>

                </div>

              </div>

              <div class="item-info-name-price">

                <h4>

                <a href="<?php echo $homeurl;?>Shop/<?php echo strtolower(str_replace(' ','-',$pro[$key]['cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['sub_cat_name']));?>/<?php echo strtolower(str_replace(' ','-',$pro[$key]['product_name']));?>/">

                    <?php echo $pro[$key]['product_name'];?>

                  </a>

                </h4>

                <span class="price">

                  $<?php echo number_format($pro[$key]['price'],2);?>

                </span>

              </div>

            </div>

            <!-- !SHOP FEATURED ITEM -->

          </div>

          <?php }?>

        </div>

        <!-- !ISOTOPE GALLERY -->

      </div>

    </div>

  </div>

  </form>

  </div>

  <!-- / row -->

  </div>

  </section>

  

  <div class="clearfix visible-xs visible-sm">

  </div>

  <!-- fixes floating problems when mobile menu is visible -->

  <?php } ?>