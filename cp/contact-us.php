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
     $id=$_GET['type'];
      $contact=$site->get_contact();
      $email=$contact[0]['email'];$phone=$contact[0]['phone'];$fax=$contact[0]['fax'];
      $street1=$contact[0]['street1'];$street2=$contact[0]['street2'];$city=$contact[0]['city'];
      $state=$contact[0]['state']; $zipcode=$contact[0]['zipcode'];$country=$contact[0]['country'];
      $button="Save";
      $action="save";

?>
<body class="skin-black sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>Contact Us</h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Contact Us</li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
        <!-- left column -->
          <div class="col-md-12">
        <!-- general form elements -->
           <div class="box box-primary">
            <div class="box-header with-border">
              Contact Information
            </div><!-- /.box-header -->
        <!-- form start -->
        <form class="contact" id="contact-form" method="post" action="" autocomplete="off" enctype="multipart/form-data">
         <input type="hidden" name="type" value="contact">
         <input type="hidden" value="<?php echo $action;?>" name="action">
         <div class="box-body">
           <div class="form-group">
             <label for="exampleInputEmail1">Contact Email</label>
              <input type="text" class="form-control" name="email" value="<?php echo $email;?>" placeholder="Enter Contact Email">
           </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Contact Number</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>" placeholder="Enter Contact Number">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Contact Fax</label>
            <input type="text" class="form-control" name="fax" value="<?php echo $fax;?>" placeholder="Enter Fax Number">
          </div>
          <div class="box-header with-border">
              Contact Address
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Street Address 1</label>
            <input type="text" class="form-control" name="street1" value="<?php echo $street1;?>" placeholder="Enter Street Address 1">
          </div>
         <div class="form-group">
            <label for="exampleInputEmail1">Street Address 2</label>
            <input type="text" class="form-control" name="street2" value="<?php echo $street2;?>" placeholder="Enter Street Address 2">
          </div>
         <div class="form-group">
            <label for="exampleInputEmail1">City</label>
            <input type="text" class="form-control" name="city" value="<?php echo $city;?>" placeholder="Enter City">
          </div>
         <div class="form-group">
            <label for="exampleInputEmail1">Zipcode</label>
            <input type="text" class="form-control" name="zipcode" value="<?php echo $zipcode;?>" placeholder="Enter Zipcode">
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">State/Region/Province</label>
            <input type="text" class="form-control" name="state" value="<?php echo $state;?>" placeholder="Enter State/Region/Province">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Country</label>
            <input type="text" class="form-control" name="country" value="<?php echo $country;?>" placeholder="Enter Country">
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>
          <input type="submit" name="banner_add" class="btn btn-primary" value="<?php echo $button;?>">
        </div>
     </form>
 </div><!-- /.box -->
</div><!--/.col (left) -->

                    <div class="example-modal" id="modal1">
                      <div class="modal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Contact Us</h4>
                            </div>
                            <div class="modal-body popup-body">
                              <p>Banner has been save successfully!!!</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="";'>Close</button>
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                    </div>  
                   <!-- right column -->
                  </div>   <!-- /.row -->
       </section>
     </div>
    </div>
</body>

<?php }
?>



