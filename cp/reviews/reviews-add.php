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

      $rw=$site->get_all_reviews('',$id);

      $name=$rw[0]['name'];

      $email=$rw[0]['email'];

      $title=$rw[0]['title'];

      $state=$rw[0]['state'];

      $desc=$rw[0]['description'];

	    $pid=$rw[0]['pid'];$id=$rw[0]['id'];

      $subcatid=$rw[0]['subcatid'];

      $score=$rw[0]['score'];

      $city=$rw[0]['city'];

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

                      Edit Review</h1>

                      <ol class="breadcrumb">

                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>

                        <li class="active">Review Form</li>

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

                        <form class="review" method="post" action="" autocomplete="off" enctype="multipart/form-data">

                        <input type="hidden" name="type" value="review">

                        <input type="hidden" value="<?php echo $action;?>" name="action">

                        <input type="hidden" value="<?php echo $id;?>" name="id">

                        <input type="hidden" value="<?php echo $pid;?>" name="pid">

                        <input type="hidden" value="<?php echo $subcatid;?>" name="subcatid">



                          <div class="box-body">

                           <div class="form-group">

                              <label for="exampleInputEmail1">Name</label>

                              <input type="text" class="form-control" name="name" value="<?php echo $name;?>" placeholder="Enter Name">

                            </div>

                             <div class="form-group">

                              <label for="exampleInputEmail1">Email</label>

                              <input type="text" class="form-control" name="email" value="<?php echo $email;?>" placeholder="Enter Email-ID">

                            </div>

                            <div class="form-group">

                              <label for="exampleInputEmail1">City</label>

                              <input type="text" class="form-control" name="city" value="<?php echo $city;?>" placeholder="Enter City">

                            </div>

                             <div class="form-group">

                              <label for="exampleInputEmail1">State</label>

                               <select name="state" size="1" aria-required="true" aria-invalid="false" class="form-control valid">

                                <option value="">--Select State--</option>

                                 <?php

                                 $s_list=$site->get_state();

                                 foreach ($s_list as $key => $value) {?>

                                      <option value="<?php echo $s_list[$key]['name'];?>" <?php if($s_list[$key]['name']==$state) { ?> selected <?php } ?>>

                                      <?php echo $s_list[$key]['name'];?></option>

                                      <?php

                                      }

                                 ?>

                              </select>

                            </div>

                            <div class="form-group">

                              <label for="exampleInputEmail1">Category *</label>

                              <select name="category" class="category12 form-control" required>

                              <option value="">--Select Category--</option>

                              <?php $cat=$site->get_all_sub_category1();

                              foreach ($cat as $key => $value) {?>

                                <option value="<?php echo $value['id'];?>" 

                                <?php if($subcatid==$value['id']){?> selected <?php }?> >

                                    <?php echo $value['subcat_name'];?></option>

                                <?php }?>

                              </select>

                            </div>

                            <div class="form-group sub_cat">

                              <label for="exampleInputEmail1">Product You've Purchased</label>

                              <select name="product" class="form-control">

                              <option value="">--Select Product--</option>

                              

                              </select>

                            </div>

                            <div class="form-group">

                              <label for="exampleInputEmail1">Rating</label>

                              <select name="rating" class="form-control">

                                <option <?php if($score==$value['score']){?> selected <?php }?> value="5">*****</option>

                                <option <?php if($score==$value['score']){?> selected <?php }?> value="4">****</option>

                                <option <?php if($score==$value['score']){?> selected <?php }?> value="3">***</option>

                                <option <?php if($score==$value['score']){?> selected <?php }?> value="2">**</option>

                                <option <?php if($score==$value['score']){?> selected <?php }?> value="1">*</option>

                              </select>

                            </div>

                           <div class="form-group">

                              <label for="exampleInputEmail1">Title</label>

                              <input type="text" class="form-control" name="title" value="<?php echo $title;?>" placeholder="Enter Title">

                            </div>

                            <div class="form-group">

                              <label for="exampleInputEmail1">Description</label>

                                <textarea class="description form-control" name="desc"><?php echo $desc;?></textarea>

                            </div>

                           

                           </div><!-- /.box-body -->

                          <div class="box-footer">

                          <a href="javascript:void(0);" data-href="modal1" class="popup save" style="display:none;">asd</a>

                            <input type="submit" name="review_add" class="btn btn-primary" value="<?php echo $button;?>">

                          </div>

                        </form>

                      </div><!-- /.box -->

                    </div><!--/.col (left) -->

                    <div class="example-modal" id="modal1">

                      <div class="modal">

                        <div class="modal-dialog">

                          <div class="modal-content">

                            <div class="modal-header">

                              <button type="button" class="close close-btn" onclick='window.location.href="<?php echo $adminurl;?>reviews/";' aria-label="Close"><span aria-hidden="true">×</span></button>

                              <h4 class="modal-title">Review</h4>

                            </div>

                            <div class="modal-body popup-body">

                              <p>Review has been save successfully!!!</p>

                            </div>

                            <div class="modal-footer">

                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="<?php echo $adminurl;?>reviews/";'>Close</button>

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