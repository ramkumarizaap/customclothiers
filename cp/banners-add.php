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
                      Add Banner</h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Banner</li>
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
                        <form class="banner" id="banner-form" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="type" value="banner">
                        <input type="hidden" value="<?php echo $action;?>" name="action">
                        <input type="hidden" value="<?php echo $img;?>" name="old_image">
                        <input type="hidden" value="<?php echo $id;?>" name="id">
                          <div class="box-body">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Title</label>
                              <input type="text" class="form-control" name="title" value="<?php echo $name;?>" placeholder="Enter Title of Banner">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Description</label>
                                <textarea class="description form-control" name="desc"><?php echo $desc;?></textarea>
                            </div>
                            <?php if(isset($_GET['type'])){?>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Banner Image</label>
                              <img src="<?php echo $homeurl.$img;?>" width="250" height="100">
                            </div><?php }?>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Banner Image</label>
                                <input type="file" name="userfile" class="form-control">
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
                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>banner/";' aria-label="Close"><span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Banner</h4>
                            </div>
                            <div class="modal-body popup-body">
                              <p>Banner has been save successfully!!!</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>banner/";'>Close</button>
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