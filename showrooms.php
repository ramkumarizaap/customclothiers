<?php
if(isset($_SESSION['login_succ'])=="login success")
{
  $sql=$site->select_query("select * from user_master where user_id=".$_SESSION['user_id']);
  $firstname=$sql['firstname'];$lastname=$sql['lastname'];$email=$sql['email'];$user_type=$sql['user_type'];
  $username=$sql['username'];
  $mobile = $sql['mobile'];
  $password=$sql['password'];
  $address1=$sql['address1'];
  $address2=$sql['address2'];
  $city=$sql['city'];
  $state=$sql['province'];$zipcode=$sql['zipcode'];$country=$sql['country'];
}
?>
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

                          Showrooms

                      </h1>

                      <!-- BREADCRUMBS -->

                      <ul class="breadcrumbs list-inline pull-right">

                          <li><a href="<?php echo $homeurl;?>">Home</a></li><!--

                          --><!--<li><a href="<?php echo $homeurl;?>product-listing/">Shop</a></li>--><!--

                          --><li>Showrooms</li>

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

              
              <!-- showroom -->

                   <div style="text-align:justify;">
            <div class="showroom cf">
            <?php
              $rooms=$site->get_showrooms('','0');
              if($rooms)
              {?>
              <center>
                <p class="decoration">Our showrooms are designed with one thing mind - you.<br>So come in. Get comfortable. And discover what you've been missing</p>
              </center>
              
              <div class="clear"></div>
              <?php 
            
              foreach ($rooms as $key => $value) {
                $id=$rooms[$key]['id']; $name=$rooms[$key]['name'];
              ?>
              
              <!--// Loop box -->
              <div class="col-sm-4 single-box">
                  <div class="image-center">
                    <img src="<?php echo $homeurl.$rooms[$key]['image'];?>" style="width:400px;height:400px;" class="img-responsive" alt="" />
                  </div>
                <h4><?php echo $rooms[$key]['name'];?> </h4>
                <address>
                  <?php echo $rooms[$key]['address'];?>
                </address>
                <div class="showroom-timings">
                  <ul class="cf">
                    <li><b>Monday:</b> <?php echo $rooms[$key]['monday'];?></li>
                    <li><b>Tuesday:</b> <?php echo $rooms[$key]['tuesday'];?></li>
                    <li><b>Wednesday:</b> <?php echo $rooms[$key]['wednesday'];?></li>
                    <li><b>Thursday:</b> <?php echo $rooms[$key]['thursday'];?></li>
                    <li><b>Friday:</b><?php echo $rooms[$key]['friday'];?></li>
                    <li><b>Saturday:</b> <?php echo $rooms[$key]['saturday'];?></li>
                    <li><b>Sunday:</b><?php echo $rooms[$key]['sunday'];?></li>
                  </ul>
                </div>
                  <a href="javascript:void(0);" data-id="<?php echo $id;?>"
                  data-name="<?php echo $name;?>"  class="appointment btn btn-default">Book Appointment</a>
              </div>
              <?php }
              }
              else
              {
                echo "No Showrooms Available";
              }
              ?>
              <!-- Loop box //-->

              <!--// Loop box -->
              
              <!-- Loop box //-->

              <!--// Loop box -->
            
              <!-- Loop box //-->

              <!--// Loop box -->
             
              <!-- Loop box //-->
              
            </div>
                   </div>

                  <!-- !showroom -->
 

              

          </section>

      </div>

  </section>
<div id="appointment" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="" method="post" id="ajax-apt-form">
        <input type="hidden" name="return_url" value="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
      <input type="hidden" name="apt_form" value="apt_form">        
      <input type="hidden" class="sr_id" name="sr_id">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Book Appointment</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-dismissable apt_alert hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <div class="apt_msg">
                      </div>
           </div>
         <div class="row">
         <div class="col-md-6">
         <div class="form-group">
              <label for="email">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $firstname. $lastname; ?>">
        </div>
        </div>
        <div class="col-md-6">
         <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        </div>
        </div>
        <div class="row">
         <div class="col-md-6">
         <div class="form-group">
              <label for="email">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $mobile; ?>">
        </div>
        </div>
         <div class="col-md-6">
        <div class="form-group">
              <label for="password">Time</label>
              <input type="text" class="form-control date-example past_date" id="timings" name="timings">
          </div>
          </div>
          </div>
          <div class="form-group">
              <label for="password">Address</label>
              <textarea class="form-control" id="address" name="address" rows="3"><?php echo $address1; ?></textarea>
          </div>
          <div class="form-group">
              <label for="password">Comments</label>
              <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
          </div>
      </div>
      <div class="modal-footer">
         <button type="submit" name="book_apt" class="btn book_apt btn-primary pull-right">Book</button>
         <label for="password" class="pull-right">&nbsp;</label>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
      </div>
    </div>
</form>
  </div>
</div>


  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->





</div>

