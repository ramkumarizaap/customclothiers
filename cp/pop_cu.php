<div class="example-modal customizer_modal " id="customize<?php echo $r['om_id'];?>">

  <div class="modal">

    <div class="modal-dialog modal-lg light_width">

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close close-btn"  aria-label="Close">

            <span aria-hidden="true">×</span>

          </button>

          <h4 class="modal-title">Customize Details</h4>

        </div>

        <div class="modal-body">

          <div class="row">

            <div class="col-md-12">

              <!-- Custom Tabs -->

              <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">

                  <li class="active"><a href="#style_<?php echo $a;?>" data-toggle="tab" 

                      aria-expanded="true">Style</a></li>

                  <li class=""><a href="#fab_<?php echo $a;?>" data-toggle="tab"

                       aria-expanded="false">Fabric</a></li>

                  <li class=""><a href="#ext_<?php echo $a;?>" data-toggle="tab"

                       aria-expanded="false">Accent</a></li>

                </ul>

                <div class="tab-content" attr="<?php echo $r['p_type']; ?>">

                  <?php       
                   if($r['p_type']=="trousers") 

                    { 

                      require('popup/pop_trousers.php');

                    }
                    else if($r['p_type']=="blazers") 

                    { 

                      require('popup/pop_blazers.php');

                    }
                    else if($r['p_type']=="shirts") 

                    { 

                      require('popup/pop_shirts.php');

                    }
                    else if($r['p_type']=="suits") 

                    { 


                      require('popup/pop_suits.php');

                    }

                    ?>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>