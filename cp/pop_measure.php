<div class="example-modal" id="measure<?php echo $r['om_id'];?>">

  <div class="modal">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close close-btn"  aria-label="Close">

            <span aria-hidden="true">×</span>

          </button>

          <h4 class="modal-title">Measurement Details</h4>

        </div>

        <div class="modal-body">

          <div class="row col-md-12">

            <h4>User Photo</h4>

              <div class="col-md-5">

                <?php

                  $userid=$r['userid'];

                  $img=mysqli_query($con,"select img,img2,img3 from user_master where user_id=$userid ");

                  $i1=mysqli_fetch_array($img);

                  if($i1['img']!='')

                  {

                  echo "<img src='".$homeurl.$i1['img']."' style='float:left;margin-right:10px;' height=70 width=70 >";

                  }

                  if($i1['img2']!='')

                  {

                  echo "<img src='".$homeurl.$i1['img2']."' style='float:left;margin-right:10px;' height=70 width=70 >";

                  }

                  if($i1['img3']!='')

                  {

                  echo "<img src='".$homeurl.$i1['img3']."' style='float:left;margin-right:10px;' height=70 width=70 >";

                  }

                ?>

              </div>

          </div>

          <div class="row">

            <div class="col-md-12 custom-value">

              <p><strong>Name:</strong> <?php echo $m_dtl['mp_name'].$m_dtl['mp_id']; ?> </p>

              <p><strong>Height:</strong> <?php echo $m_dtl['mp_height']; ?> </p>

              <p><strong>Weight:</strong> <?php echo $m_dtl['mp_weight']; ?> </p>

              <p><strong>Chest:</strong> <?php echo $m_dtl['mp_chest']; ?> </p>

              <p><strong>Abdomen:</strong> <?php echo $m_dtl['mp_abdomen']; ?> </p>

              <p><strong>Buttocks:</strong> <?php echo $m_dtl['mp_buttocks']; ?></p>

              <p><strong>Hips:</strong> <?php echo $m_dtl['mp_hips']; ?></p>

              <?php

                  $fld=mysqli_query($con,"select a.*,b.labelname from measurement_profile_value a,
                  measurement_profile_fields b where a.mpid='".$m_dtl['mp_id']."' and a.mpfid=b.mpf_id");

                if(mysqli_num_rows($fld))

                 {

                  while ($v=mysqli_fetch_array($fld))

                   {

                    if($v['mpf_value']!='0')

                    {

                      ?>
                      <?php if($v['labelname']=='Neck') { 
                        $m_type='cm';
                          }
                          else
                          {
                            $m_type="inches";
                          }
                       ?>

                        <p>

                          <strong><?php echo $v['labelname']; ?>:</strong> 

                            <?php echo $v['mpf_value']; ?> <span><?php echo $m_type; ?></span>

                        </p>

                      <?php

                    }

                  }

                 } 

              ?>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>