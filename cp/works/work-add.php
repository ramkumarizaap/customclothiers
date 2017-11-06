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
   //$user_count=$site->get_user_count();
   if(isset($_GET['type']))
    {

      $id=$_GET['type'];
      $room=$site->get_works($id);
      $id=$room[0]['id'];
      $name=$room[0]['title'];$image=$room[0]['img'];
      $desc=$room[0]['desc'];
      $button="Update";
      $tit="Edit";
      $action="update";
    }
    else
    {
    	$id="";
    	$title="";$desc="";
      $name="";$button="Save";$action="save";$id="";$tit="Add";
    }
?>
<body class="skin-black sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
             <section class="content-header">
                 <h1>How It Works <?php echo $tit;?> Form</h1>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">How It Works Form</li>
                     </ol>
                </section>
                <section class="content">
                  <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                      <!-- general form elements -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                       </div><!-- /.box-header -->
                        <!-- form start -->
                        <form class="work" id="work-form" method="post" action="" autocomplete="off">
                        <input type="hidden" name="type" value="works">
                        <input type="hidden" name="old_image" value="<?php echo $image;?>">
                        <input type="hidden" value="<?php echo $action;?>" name="action">
                        <input type="hidden" value="<?php echo $id;?>" name="id">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Title</label>
                              <input type="text" class="form-control" name="title" value="<?php echo $name;?>" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Image</label>
                              <input type="file" class="form-control" name="userfile">
                              <span class="help-block">The Image size must be 550px Width and 370px Height.
                            </div>
                            <?php if(isset($_GET['type'])){?>
                            <div class="form-group">
                              <img src="<?php echo $homeurl.$image;?>" style="height:120px;width:160px;">
                            </div>
                            <?php }?>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Description</label>
                              <textarea class="form-control description" rows="10" name="desc"><?php echo $desc;?></textarea>
                            </div>
                       </div><!-- /.box-body -->
                       <div class="box-footer">
                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>
                          <input type="submit" name="work_add" class="btn btn-primary" value="<?php echo $button;?>">
                        </div>
                      </form>
                    </div><!-- /.box -->
                    </div><!--/.col (left) -->
                    <div class="example-modal" id="modal1">
                      <div class="modal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>works/";' aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">How It Works</h4>
                            </div>
                            <div class="modal-body popup-body">
                              <p>Work has been save successfully!!!</p>
                            </div>
                            <div class="modal-footer">
                              <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>
                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>works/";'>Close</button>
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



