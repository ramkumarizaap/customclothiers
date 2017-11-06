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
      $pg=$site->get_pages($id);
      $page_title=$pg[0]['page_title'];$pid=$pg[0]['id'];
      $page_desc=$pg[0]['page_desc'];
      $action="page_update";
      $button="Save";
   }
   else
   {
      $id="";$page_title="";$page_desc="";$action="page_add";$button="Save Page";
   }
?>
<body class="skin-black sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <h1><?php echo $page_title;?> Page</h1>
                      <?php //echo "<pre>";print_r($pro);?>
                      <ol class="breadcrumb">
                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo $page_title;?> Page</li>
                      </ol>
                </section>
                <section class="content">
		          <form action="" method="post" enctype="mulpipart/form-data" class="pages" >
		        	    <input type="hidden" name="page_id" value="<?php echo $pid;?>">
                        <input type="hidden" name="type" value="pages">
                        <input type="hidden" name="action" value="<?php echo $action;?>">
		          <div class="box-body ">
		                	<!--Form-->
		             <div class="nav-tabs-custom">
		                <div class="tab-content">
		                  <div class="tab-pane active" id="tab_1">
		                  	<div class="row">
			                  <div class="col-md-12">
			                  <?php /*?><div class="col-md-12">
	                            <div class="form-group">
		                              <label for="exampleInputEmail1" class="control-label col-md-2">Page Title</label>
		                              <div class="col-md-6">
		                              	<select disabled class="form-control" name="page_title">
		                              		<option value="">--Select Title--</option>
		                              		<option <?php if($page_title=="Privacy Policy"){?> selected <?php }?>
		                              				 value="Privacy Policy">Privacy Policy</option>
		                              		<option <?php if($page_title=="Terms of Use"){?> selected <?php }?>
		                              				value="Terms of Use">Terms of Use</option>
		                              		<option <?php if($page_title=="Disclaimer"){?> selected <?php }?>
		                              				value="Disclaimer">Disclaimer</option>
		                              		<option <?php if($page_title=="Terms & Conditions"){?> selected <?php }?>
		                              				value="Terms & Conditions">Terms & Conditions</option>
		                              		<option <?php if($page_title=="About Us"){?> selected <?php }?>
		                              				value="About Us">About Us</option>
		                              		<option <?php if($page_title=="Promo"){?> selected <?php }?>
		                              				value="Promo">Promo</option>
		                              	</select>
		                               </div>
	                            </div>
	                            </div><br><?php */?>
<br><br>
                               
	                            <div class="col-md-12">
	                             <div class="form-group">
		       
		                              <div class="col-md-12">
		                              <textarea class="description" name="page_desc" rows="20"><?php echo $page_desc;?></textarea>
	                            </div>
	                            </div>
			                   </div>
			                   <?php if($id=="6"){
			                   	$sql=mysqli_query($con,"select * from page_content where id=9");
			                   	$r=mysqli_fetch_array($sql);
			                   	?>
			                   <br><br><br><br>
			                     <div class="col-md-12">
	                             <div class="form-group">
		       
		                              <div class="col-md-12">
		                              <label class="control-label">Popup Title</label>
		                             	<input type="text" name="pop_title" value="<?php echo $r['page_title'];?>" class="form-control">
	                            </div>
	                            </div>
			                   </div>
			                     <div class="col-md-12">
	                             <div class="form-group">
		       
		                              <div class="col-md-12">
		                              <label class="control-label">Popup Description</label>
		                              <textarea class="description" name="pop_desc" rows="20"><?php echo $r['page_desc'];?></textarea>
	                            </div>
	                            </div>
			                   </div>
			                   <?php }?>
			                 </div>
			              </div><!-- /.tab-pane -->
                          <br/>
<div class="box-footer">
	                          <a href="javascript:void(0);" data-href="pages-add" class="popup save" style="display:none;">asd</a>
	                            <button type="submit" class="btn btn-primary"><?php echo $button;?></button>
	                               <button type="button" class="btn btn-info" onClick="window.location.href='';">Cancel</button>
	                    </div>
		                 </div><!-- /.tab-content -->
		              </div>
                	<!--End Form-->
                		 <div class="example-modal" id="pages-add">
	                      <div class="modal">
	                        <div class="modal-dialog">
	                          <div class="modal-content">
	                            <div class="modal-header">
	                              <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>
	                              <h4 class="modal-title">Page</h4>
	                            </div>
	                            <div class="modal-body popup-body">
	                              <p>Page has been save successfully!!!</p>
	                            </div>
	                            <div class="modal-footer">
	                              <button type="button" class="btn btn-default pull-right" onclick='window.location.href="";'>Close</button>
	                            </div>
	                          </div><!-- /.modal-content--> 
	                        </div><!-- /.modal-dialog -->
	                      </div><!-- /.modal -->
	                    </div>  
                <!--Save Button-->
            		 <div class="col-md-12">
	                    
	                </div>
	                <!--End Save and Cancel Buttons-->
	                </div>
	                </form>
                </section>
        </div>
    </div>
 </body>
<?php
}
?>