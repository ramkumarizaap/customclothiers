

<!-- HEADER -->

<!-- Promo Modal -->
<div id="promoModal" class="modal fade order-modal" role="dialog">
  <div class="modal-dialog order"> 
    
    <!-- Modal content-->
    
    <div class="modal-content">
      <div class="modal-close">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-header">
        <h4 class="modal-title"><strong>
          <p>&nbsp;Welcome&nbsp;to Ot Koo Toor!&nbsp;Receive $25 off your first purchase 
          </strong></h4>
      </div>
      <div class="modal-body">
        <p>
        <p>&nbsp;Welcome&nbsp;to Ot Koo Toor!&nbsp;Receive $25 off your first purchase.</p>
        <p><strong>Promo code:</strong> measwurementcredit</p>
        </p>
      </div>
      <div class="modal-footer"> </div>
    </div>
  </div>
</div>
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
            <li> <a href="<?php echo $homeurl; ?>"> Home </a> </li>
            <li> Add Review</li>
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
    
      <div class="reviews-form col-md-12">
        <div class="form-title">
        <h1>Add a Review</h1>
        </div>
               
        <div class="review-form-design">
         
        <form id="review-form" method="post" action="">
        <input type="hidden" name="review" value="review">
        <div class="form-group">
          <label for="name">First Name<span>*</span></label>
          <input type="text" maxlength="200" placeholder="" required="" name="firstname">
        </div>
        
      <!--  <div class="form-group">
          <label for="email">Email<span>*</span></label>
          <input type="email" maxlength="200" placeholder="" required="" name="email">
        </div>-->
        <div class="form-group">
          <label for="city">City<span>*</span></label>
          <input type="text" maxlength="200" placeholder="" required="" name="city">
        </div>
        
        <div class="form-group">
          <label for="state">State<span>*</span></label>
            <select name="state" size="1">
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
          <label for="product">Category<span>*</span></label>
          <select size="1" class="category" name="category" required>
          <option value="">--Select Category--</option>
          <?php $sub_cat=$site->get_all_sub_category1();
          foreach ($sub_cat as $key => $value) {
          ?>
            <option value="<?php echo $value['id'];?>"><?php echo $value['subcat_name'];?></option>
          <?php }?>
          </select>
        </div>
        <div class="form-group sub_cat">
          <label for="product">Product You've Purchased</label>
          <select size="1" name="product">
          <option value="">--Select Product--</option>
          
          </select>
        </div>
        <div class="form-group-new1 form-group">
          <label for="rating">Rating<span></span></label>
          <select size="1" name="score_rate">
            <option value="5">*****</option>
            <option value="4">****</option>
            <option value="3">***</option>
            <option value="2">**</option>
            <option value="1">*</option>          
          </select>
        </div>
     
         <div class="clearfix"></div>
        <div class="form-group-new3 form-group">
          <label for="title">Title<span>*</span></label>
          <input type="text" maxlength="200" placeholder="" required="" name="title">
        </div>
        <div class="form-group-new3 form-group">
          <label for="comments">Comments<span>*</span></label>
          <textarea maxlength="2000" placeholder="" required name="comments"></textarea>
          
        </div>
        
        <div class="form-new form-group">  
          <input type="submit" name="review1" value="submit" class="btn">
        </div>
         </form>
         <div class="clearfix"></div>
         <div class="col-md-12 post-msg">
        </div>
        </div>
        
      </div>
    
    </div>
    
    <!-- / row --> 
    
  </div>
</section>
<div class="clearfix visible-xs visible-sm"> </div>

