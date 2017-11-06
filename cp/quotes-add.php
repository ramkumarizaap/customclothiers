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
      $qt=$site->get_quotes($id);
      $text=$qt[0]['text'];
      $name=$qt[0]['name'];
      $mail=$qt[0]['mail'];
      $button="Update";
      $action="update";
   }
   else
    {
      $text="";$button="Save";$action="save";$id="1";$name="";$mail="";
    }
?>
<body class="skin-black sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
                  <section class="content-header">
                      <h1>
                      Add Quotes</h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Quotes</li>
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
                        <form class="banner" id="quote-form" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="type" value="quotes">
                        <input type="hidden" value="<?php echo $action;?>" name="action">
                        <input type="hidden" value="<?php echo $id;?>" name="id">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Quote Text</label>
                                <textarea class="description form-control" name="desc"><?php echo $text;?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Quoter Name</label>
                                <input type="text" class="form-control" name="q_name" 
                                value="<?php echo $name;?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Quoter Email</label>
                                <input type="text" class="form-control" name="q_email" 
                                value="<?php echo $mail;?>">
                            </div>

                          
                          </div><!-- /.box-body -->
                          <div class="box-footer">
                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>
                            <input type="submit" name="quote_add" class="btn btn-primary" value="<?php echo $button;?>">
                          </div>
                        </form>
                      </div><!-- /.box -->
                    </div><!--/.col (left) -->
                    <div class="example-modal" id="modal1">
                      <div class="modal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>quotes/";' aria-label="Close"><span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Quotes</h4>
                            </div>
                            <div class="modal-body popup-body">
                              <p>Quotes has been save successfully!!!</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>quotes/";'>Close</button>
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