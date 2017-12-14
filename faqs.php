

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

            

              <div class="col-sm-12">

                  <h2 class="strong-header large-header">Frequently asked questions</h2>

                  <!-- ACCORDION -->

                  <div class="accordion faq">

                      <div class="panel-group" id="accordion-001">

                          <?php 
                        $faqs=$site->get_faqs('','1');$i=0;
                        if($faqs!=0)
                        {
                        foreach ($faqs as $key => $value) {
                          $i++;
                        ?>

                          <div class="panel panel-default">

                              <div class="panel-heading">

                                  <h4 class="panel-title">

                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-001" href="#collapse-00<?php echo $i;?>">

                                        <?php echo $faqs[$key]['title'];?>
                                      </a>

                                  </h4>

                              </div>

                              <div id="collapse-00<?php echo $i;?>" class="panel-collapse collapse">

                                  <div class="panel-body">

                                      <?php echo $faqs[$key]['desc'];?>
                                  </div>

                              </div>

                          </div>
                          <?php }
                          }
                          else
                          {
                            echo "No FAQs Found.";
                          }
                          ?>


                      </div>

                  </div>

                  <!-- !ACCORDION -->

              </div>

          </section>

      </div>

  </section>



  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->



</div>



