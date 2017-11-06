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
                      <h1>
                        Add Gift Card
                      </h1>
                     
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Gift Card</li>
                      </ol>
                </section>
                <section class="content">
                <form  method="post" id="product-add" class="products" action="">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="box box-primary">
                               
                        <!-- form start -->
                       
                        <input type="hidden" name="type" value="add_gift_card">
                        <input type="hidden" name="userid" value="<?php echo $_SESSION['user_id']; ?>">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Amount <small class="explanation">(in USD)</small></label>
                              <input type="text" class="form-control" id="amount" name="amount" required placeholder="Enter Amount">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Quantity</label>
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
                          </div>
                        </div>
                      
                    </div><!--/.col (left) -->
                    <div class="col-md-12">
                     <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-info" onClick="window.location.href='<?php echo $adminurl;?>gift-card/';">Cancel</button>
                      </div>
                    </div>
                   
                  </div>
                   
                 
                 </form>
        </section>
        </div>
    </div>
</body>
<?php } ?>