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

      $qt=$site->get_carousel($id);

      $heading=$qt[0]['heading'];
      
      $heading2=$qt[0]['heading2'];

      $desc=$qt[0]['desc'];$img=$qt[0]['img'];

      $link=$qt[0]['link'];

      $button="Update";

      $action="update";

   }

   else

    {

      $heading="";$heading2="";$button="Save";$action="save";$id="1";$desc="";$link="";$img="";

    }

?>

<body class="skin-black sidebar-mini">

    <div class="wrapper">

        <div class="content-wrapper">

                  <section class="content-header">

                      <h1>

                      Add Carousel</h1>

                      <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">Add Carousel</li>

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

                        <form class="banner" id="carousel-form" method="post" action="" autocomplete="off" enctype="multipart/form-data">

                        <input type="hidden" name="type" value="carousel">

                        <input type="hidden" value="<?php echo $action;?>" name="action">

                        <input type="hidden" value="<?php echo $id;?>" name="id">

                        <input type="hidden" value="<?php echo $img;?>" name="old_image">

                          <div class="box-body">

                           <div class="form-group">

                              <label for="exampleInputEmail1">Heading</label>

                                <input type="text" class="form-control" name="heading" 

                                placeholder="Enter Heading" value="<?php echo $heading;?>">

                            </div>

                            <div class="form-group">

                              <label for="exampleInputEmail1">Heading2</label>

                                <input type="text" class="form-control" name="heading2" 

                                placeholder="Enter Heading2" value="<?php echo $heading2;?>">

                            </div>

                            <div class="form-group">

                              <label for="exampleInputEmail1">Image</label>

                               <!--<input type="file" class="form-control" name="userfile">-->

                               <div id="droparea">

                                <div class="dropareainner">

                                  <p class="dropfiletext">Drop files here</p>

                                  <p>or</p>

                                  <p><input id="uploadbtn" class="uploadbtn" type="button" value="Select File"/></p>

                                </div>

                                <input id="upload" type="file" name="userfile" />

                               </div><br><br>

                               <div id="result"></div>

                            </div>

                            <?php if(isset($_GET['type'])){?>

                            <div class="form-group">

                                <img src="<?php echo $homeurl.$img;?>" style="height: 100px;width: 120px;">

                            </div>

                            <?php }?>

                            <div class="form-group">

                              <label for="exampleInputEmail1">Description</label>

                                <textarea class="description form-control" name="desc"><?php echo $desc;?></textarea>

                            </div>

                            <div class="form-group">

                              <label for="exampleInputEmail1">Learn More Link</label>

                                <input type="text" class="form-control" name="link" 

                                value="<?php echo $link;?>">

                            </div>

                          

                          </div><!-- /.box-body -->

                          <div class="box-footer">

                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>

                            <input type="submit" name="carousel_add" class="btn btn-primary" value="<?php echo $button;?>">

                          </div>

                        </form>

                      </div><!-- /.box -->

                    </div><!--/.col (left) -->

                    <div class="example-modal" id="modal1">

                      <div class="modal">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>carousel/";' aria-label="Close"><span aria-hidden="true">×</span></button>

                              <h4 class="modal-title">Carousel</h4>

                            </div>

                            <div class="modal-body popup-body">

                              <p>Content has been save successfully!!!</p>

                            </div>

                            <div class="modal-footer">

                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>carousel/";'>Close</button>

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