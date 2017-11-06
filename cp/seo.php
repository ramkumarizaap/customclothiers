<?php

if(!isset($_SESSION['admin_user_id']))

{

    header("Location:{$adminurl}");

}

else

{

    require_once('includes/topbar.php');

    require_once('includes/sidebar.php');

    $site=new Site();

?>

<body class="skin-black sidebar-mini">

 <div class="wrapper">

  <div class="content-wrapper">

   <section class="content-header">

    <h1>SEO Form</h1>

      <ol class="breadcrumb">

        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">SEO Form</li>

      </ol>

   </section>

   <section class="content">

      <div class="box box-primary">

       <div class="box-header with-border">          

          <h3 class="box-title"></h3>   

       </div>        

       <form action="" method="post" class="seo-form" id="seo-form">

       <input type="hidden" name="type" value="seo_add">

        <div class="box-body">

          <div class="row">

            <div class="col-md-12">

               <div class="form-group">

                  <label for="exampleInputEmail1">Page</label>

                    <select name="page_name" class="form-control seo_page">

                      <option value="">--Select Page--</option>

                      <option value="home">Home Page</option>

                      <option value="Shop">Product Listing Page</option>

                      <option value="Shop">Single Product Page</option>

                      <option value="login">Login Page</option>

                      <option value="signup">Signup Page</option>

                      <option value="faqs">FAQS Page</option>

                      <option value="track-my-order">Track My Order Page</option>

                      <option value="privacy-policy">Privacy Policy Page</option>

                      <option value="terms-and-conditions">Terms & Conditions Page</option>

                      <option value="our-story">Our Story</option>

                      <option value="why-us">Why Us</option>

                      <option value="add-profile">Add Profile Page</option>

                      <option value="press">Press Page</option>

                      <option value="forgot-password">Forgot Password Page</option>

                      <option value="how-it-works">How It Works Page</option>

                      <option value="about-us">About Us</option>

                      <option value="contact-us">Contact Us</option>

                      <option value="appointments">Appointments Page</option>

                      <option value="careers">Careers Page</option>

                      <option value="customize">Customizer Page</option>

                      <option value="shopping-cart">Shopping Cart Page</option>

                      <option value="checkout">Checkout Page</option>

                      <option value="order-received">Order Received Page</option>

                      <option value="account-information">Account Information Page</option>

                      <option value="my-orders">My Orders Page</option>

                      <option value="view-orders">View Order Page</option>

                      <option value="my-measurements">My Measurement Page</option>

                      <option value="address-book">Address Book Page</option>

                      <option value="reviews">Reviews Page</option>

                      <option value="promo">Promo Page</option>

                      <option value="gift-card">Gift Card Page</option>

                      <option value="gallery">Gallery Page</option>

                      <option value="wedding">Wedding Page</option>

                    </select>

                </div>

                 <div class="form-group">

                  <label for="exampleInputEmail1">Page Title</label>

                   <input type="text" class="form-control p_title" name="page_title" placeholder="Enter Page Title">

                </div>

                <div class="form-group">

                  <label for="exampleInputEmail1">Meta Keyword</label>

                   <input type="text" class="form-control p_keyword" name="keyword" placeholder="Enter Page Meta Keyword By Separating Commas">

                </div>

                <div class="form-group">

                  <label for="exampleInputEmail1">Meta Description</label>

                   <input type="text" class="form-control p_desc" name="desc" placeholder="Enter Page Meta Description By Separating Commas">

                </div>

            </div>

          </div>

        </div>

          <div class="box-footer">

          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>

          <input type="submit" name="seo_add" class="btn btn-primary" value="Save">

         </div>

      </form>

     </div>

        <div class="example-modal" id="modal1">

         <div class="modal">

          <div class="modal-dialog">

            <div class="modal-content">

             <div class="modal-header">

                <button type="button" class="close close-btn" onclick='window.location.href="";' 

                aria-label="Close"><span aria-hidden="true">×</span></button>

                  <h4 class="modal-title">SEO</h4>

             </div>

             <div class="modal-body popup-body">

              <p>SEO Details has been successfully saved!!!</p>

             </div>

             <div class="modal-footer">

               <button type="button" class="btn btn-default pull-right" onclick='window.location.href="";'>Close</button>

             </div>

            </div><!-- /.modal-content -->

         </div><!-- /.modal-dialog -->

        </div><!-- /.modal -->

      </div>  

   </section>

 </div>

</div>

</body>

<?php

}

?>