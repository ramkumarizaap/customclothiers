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
    if(isset($_GET['type']))
    {
      $id=$_GET['type'];
      $banner=$site->get_all_banners($id);
      $name=$banner[0]['title'];
      $desc=$banner[0]['desc'];
      $img=$banner[0]['img'];
      $button="Update";
      $action="update";
   }
   else
    {
      $name="";$button="Save";$action="save";$id="1";$desc="";$img="";
    }
?>
<body class="skin-black sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
                  <section class="content-header">
                      <h1>
                      Add Gift Card</h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Gift Card</li>
                      </ol>
                </section>
                <section class="content">
                  <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form class="gift_card" id="gift-card-form" method="post" action="" autocomplete="off">
                        <input type="hidden" name="type" value="add_gift_card">
                        <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_user_id']; ?>"> 
                          <div class="box-body">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Amount<small class="explanation">(in USD)</small></label>
                              <input type="text" class="form-control" id="amount" name="amount" required placeholder="Enter Amount">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Quantity</label>
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
                            
                           </div><!-- /.box-body -->
                          <div class="box-footer">
                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>
                            <input type="submit" name="add_gift_card" class="btn btn-primary" value="Add">
                          </div>
                        </form>
                      </div><!-- /.box -->
                    </div><!--/.col (left) -->
                    <div class="example-modal" id="modal1">
                      <div class="modal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>gift-card/";' aria-label="Close"><span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Gift Card</h4>
                            </div>
                            <div class="modal-body popup-body">
                              <p>Gift Card has been saved successfully!!!</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>gift-card/";'>Close</button>
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