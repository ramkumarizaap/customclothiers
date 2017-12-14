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
                          Gift Card
                      </h1>
                      <!-- BREADCRUMBS -->
                      <ul class="breadcrumbs list-inline pull-right">
                          <li><a href="<?php echo $homeurl;?>">Home</a></li><!--
                          --><!--<li><a href="<?php echo $homeurl;?>product-listing/">Shop</a></li><!--
                          --><li>Gift Card</li>
                      </ul>
                      <!-- !BREADCRUMBS -->
                  </div>
              </header>
          </div>
      </div><!-- !full-width -->
      <div class="container">
          <!-- !FULL WIDTH -->
          <!-- !SECTION EMPHASIS 1 -->
          <section class="row" id="giftcard-design">
              
              <div class="col-md-12 col-sm-8 gift-card">
                  <h2 class="strong-header large-header">Get gift card for your friend</h2>
                  <div class="col-md-12">
                    <img src="<?php echo $homeurl;?>assets/images/content/gift-card.jpg" width="500" 
                    height="1500">
                  </div>
                  <form role="form" id="gift-card-form" method="post"  action="<?php echo $homeurl;?>includes/action/action.php">
                      <div class="form-group">
                          <label for="email">Amount <small class="explanation">(in USD)</small></label>
                          <input type="text" class="form-control" id="amount" name="amount" required  >
                      </div>
                      <div class="form-group">
                          <label for="first-name">Quantity</label>
                          <select class="form-control" id="quantity" name="quantity" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                      </div>
                      <div class="form-group ">
                          <label for="email">Email a Digital Gift Card:<br>
                          <input type="radio" name="mail_type" data-type="email" value="email_my" checked><span>To myself</span><br>
                          <input type="radio" name="mail_type" data-type="email" value="email_some"><span>Directly to someone else</span>
                          </label>
                      </div>
                       <div class="form-group ">
                          <label for="email">Mail a Physical Gift Card:<br>
                          <input type="radio" name="mail_type" data-type="mail" value="mail_my" checked><span>To myself</span><br>
                          <input type="radio" name="mail_type" data-type="mail" value="mail_some"><span>Directly to someone else</span>
                          </label>                      
                      </div>
                      <div class="email_div hide">
                         <div class="form-group">
                            <label for="email">Recipient Name</label>
                            <input type="text" class="form-control" id="recp_name" name="recp_name" >
                        </div>
                        <div class="form-group">
                            <label for="email">Recipient Mail</label>
                            <input type="text" class="form-control" id="recp_mail" name="recp_mail" >
                        </div>
                      </div>
                       <div class="mail_div hide">
                         <div class="form-group">
                            <label for="email">Recipient Name</label>
                            <input type="text" class="form-control" id="recp_name" name="recp_name" >
                        </div>
                        <div class="form-group">
                          <label for="email">Postal Address</label>
                          <textarea class="form-control" id="post_address" rows="10" name="post_address"></textarea>
                        </div>
                      </div>
                      <button type="submit" name="gift_card" class="btn btn-primary">Add to Cart</button>
                  </form>
              </div>
          </section>
      </div>
  </section>
  <div class="clearfix visible-xs visible-sm"></div> <!-- fixes floating problems when mobile menu is visible -->
</div>
