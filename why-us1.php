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
                          Why Us
                      </h1>
                      <!-- BREADCRUMBS -->
                      <ul class="breadcrumbs list-inline pull-right">
                          <li><a href="<?php echo $homeurl;?>">Home</a></li><!--
                          --><!--<li><a href="<?php echo $homeurl;?>product-listing/">Shop</a></li>--><!--
                          --><li>Why Us</li>
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
              <div class="clearfix visible-xs space-30"></div>
                  <?php 
                  $sql=mysqli_query($con,"select * from page_content where id=8");
                  $r=mysqli_fetch_array($sql);
                  ?>
                  <!-- ACCORDION -->
                   <div style="text-align:justify;">
                      <?php echo $r['page_desc'];?>
                   </div>
                  <!-- !ACCORDION -->
             
          </section>
      </div>
  </section>
  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->
</div>