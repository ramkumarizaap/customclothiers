<!-- HEADER -->



<!-- Single Product Template -->



<section id="Content" role="main" class="review-full-width">

  <div class="container"> 

    

    <!-- SECTION EMPHASIS 1 --> 

    

    <!-- FULL WIDTH --> 

    

  </div>

  

  <!-- !container -->

  

  <div class="full-width section-emphasis-1 page-header">

    <div class="container">

      <header class="row">

        <div class="col-md-12">

          <h1 class="strong-header pull-left"> reviews </h1>

          

          <!-- BREADCRUMBS -->

          

          <ul class="breadcrumbs list-inline pull-right">

            <li> <a href="#"> Home </a> </li>

            <li> reviews </li>

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

      <div class="reviews-page col-md-12" id="reviews">

        <div class=" col-sm-12 col-md-9">

        <div class="mainpage-review">

        

          <div class="review-meta col-sm-6 col-md-6">

          <?php 

         

          $sql2=mysqli_query($con,"select sum(score) as p_score,pid from reviews where status=1 group by pid order by p_score desc limit 1");

          $r=mysqli_fetch_array($sql2);

          $pid=$r['pid'];

           $sql1=mysqli_query($con,"select * from reviews where pid=$pid");

          $rows=mysqli_num_rows($sql1);

          $rate=round($r['p_score'] / $rows);

           $sql3=mysqli_query($con,"select * from reviews where status=1");

          $max=mysqli_num_rows($sql3) ? mysqli_num_rows($sql3) : 0;

           $sql4=mysqli_query($con,"select p_name from product_master where p_id=$pid");

          $r4=mysqli_fetch_array($sql4);

          ?>



            <div class="row">

              <h2><span class="product-name" property="name">

              Our Customer Satisfaction Rating</h2>

              <span>

              <?php for($i=0;$i<$rate;$i++){?>

                <i class="fa fa-star"></i>

              <?php 

              }?>

              </span> 

              <span class="rating-new">

                           

              <div class="average-text">

                 <span class="average-numeric"> 

                  <span property="ratingValue" class="average">Average rating&nbsp;:&nbsp; <?php echo $rate;?></span>&nbsp;/&nbsp;<span property="bestRating" class="max">5</span> &nbsp;stars </span>

                   based on <span property="ratingCount" class="count"><?php echo $max;?> reviews</span> </div>

              </span> </div>

          </div>

          

          <div class="grid__item text-right"> <a class="btn btn-primary" href="<?php echo $homeurl;?>reviews-add/"><span>Write a review</span></a> </div>

          

          <div class="clearfix"></div>

          

          <div class="grid__item review-filters">

          

            <select class="filter product p_name">

              <option value="all">All Category</option>

              <?php $cat=$site->get_all_sub_category1();

              foreach ($cat as $key => $value) {

                if($value['category_id']=="1"){

                ?>

                  <option value="<?php echo $value['id'];?>"><?php echo $value['subcat_name'];?></option>

              <?php

            }

              }?>

            </select>

            

            <select class="filter meta r_date">

              <option value="date-desc">Date: Newest</option>

              <option value="date-asc">Date: Oldest</option>

              <option value="rating-desc">Rating: High/Low</option>

              <option value="rating-asc">Rating: Low/High</option>

            </select>

            

          </div>



    <div class="review-loop">

    <?php 

    $rw=$site->get_all_reviews('1');

    foreach ($rw as $key => $value) {

     if(!empty($value['pid'])) 

     {

       $get_product = mysqli_query($con,"select p_name from product_master where p_id='".$value['pid']."'");

       if(mysqli_num_rows($get_product) > 0) 

       {

         $p_dtl = mysqli_fetch_array($get_product);

         $p_name = $p_dtl['p_name'];

       }

     }

     else

      {

        $get_cat = mysqli_query($con,"select sub_cat_name from sub_category_master where sub_cat_id='".$value['subcatid']."'");

       if(mysqli_num_rows($get_cat) > 0) 

       {

         $p_dtl = mysqli_fetch_array($get_cat);

         $p_name = $p_dtl['sub_cat_name'];

       }

      }

     ?>

      <div class="reviews-container">

       <div class="inner-reviews">

        <ul class="list-reviews">

          <li>

            <div class="grid grid-rev">              

              <div class="inner-page-review">

                <h5><strong>Purchased:</strong></h5>

             <ul>

               <li><a href="javascript:void(0);"><?php echo $p_name;?></a></li>

             </ul>

              </div>

              <div class="inner-page-review1">                

                <div class="stars">

                <?php for ($i=0; $i < $value['score']; $i++) { ?>

                  <span><i class="fa fa-star"></i>    </span>                      

                <?php

                }?>

                

                  <span content="2015-06-18" itemprop="datePublished" class="date">

                      <?php echo date('M d, Y',strtotime($value['created_date']));?>

                      </span>

               </div>

                <h3><?php echo $value['title'];?></h3>

                <h4>

                  <span itemprop="author"><?php echo $value['name'];?>,</span>

                  <span><?php echo $value['city']." - ".$value['state'];?></span>

                </h4>

                <div itemprop="description" class="content">

                  <p><?php echo $value['description'];?></p>

                </div>

              </div>

            </div>

          </li>

        </ul>

      </div>

    </div>  

    <?php }?>

  </div>

          

          <!-- / #listFilters -->

          <div class="clearfix"></div>

          </div>

        </div>

        <div class="col-sm-12 col-md-3 sidebar-review">

          <div class="side-header">

                <h2>Custom Clothiers on instagram</h2>

                <p>Tag us with <b><a href="https://www.instagram.com/dccustomclothiers/" target="_blank">#customclothiers</a></b> for the chance to make it into our customer gallery.</p>

          </div>

          <div class="review-image">

<iframe src="//widgets-code.websta.me/w/0d38b9772c6f?ck=MjAxNi0wNi0xNFQwNzowMjoyMi4xODha" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:auto;height:1595px;width:210px;"></iframe> <!-- WEBSTA WIDGETS - widgets.websta.me -->
          </div>

          

          

          

           

          

           

          

        </div>

      </div>

    

    </div>

    

    <!-- / row --> 

    

  </div>

</section>

<div class="clearfix visible-xs visible-sm"> </div>



<!-- fixes floating problems when mobile menu is visible --> 



<!--/ Custom footer -->

