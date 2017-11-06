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



    //$pages=$site->get_pages();



?>



<body class="skin-black sidebar-mini">



    <div class="wrapper">



        <div class="content-wrapper">



                  <section class="content-header">



                      <h1>



                        Pages Tables



                      </h1>



                      <ol class="breadcrumb">



                        <li><a href="<?php echo $adminurl;?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>



                        <li class="active">Pages Tables</li>



                      </ol>



                </section><br />



                <a href="<?php echo $adminurl;?>pages-add/" class="btn btn-primary pull-left" style="margin-left: 5px;"><i class="fa fa-plus"></i> Add Pages</a>



                <br /><br />



                



                <div class="box">



                



                <div class="box-header">



                </div><!-- /.box-header -->



                <div class="box-body">



                  <table id="example1" class="table table-bordered table-striped">



                    <thead>



                      <tr>



                        <th width="20">SNO</th>



                        <th>Page Title</th>



                        <th width="400">Page Description</th>



                         <th>Created Date</th>



                        <th width="100">Actions</th>



                      </tr>



                    </thead>



                    <tbody>



                    <?php $i=0;



                    $pages=$site->get_pages();



                    if($pages)



                    {



                    foreach($pages as $key=>$val)



                    {



                      $id=$pages[$key]['id'];



                    ?>



                      <tr>



                        <td><?php echo ++$i;?></td>



                        <td>



                          <!--<span class="col-md-4"><img src="<?php echo $homeurl.$image[0];?>" height="60"></span>-->



                          <span class="col-md-8"><?php echo $pages[$key]['page_title'];?></span>



                          </td>



                        <td><div style="max-height:150px;overflow:hidden"><?php echo $pages[$key]['page_desc'];?></div></td>



                        <td><?php echo date('d-m-Y h:i:s a',strtotime($pages[$key]['date']));?></td>



                        <td>



                            <a href="<?php echo $adminurl;?>pages-add/<?php echo $id;?>/" class="btn btn-primary"><i class="fa fa-edit"></i></a>



                             <a href="javascript:void(0)" data-href="pages<?php echo $id;?>" data-table="prdocuts" data-id="<?php echo $id;?>" class="btn btn-danger popup"><i class="fa fa-trash"></i></a>



                        </td>



                         <div class="example-modal" id="pages<?php echo $id;?>">



                            <div class="modal">



                              <div class="modal-dialog">



                                <div class="modal-content">



                                  <div class="modal-header">



                                    <button type="button" class="close close-btn" onclick='window.location.href="";' aria-label="Close"><span aria-hidden="true">×</span></button>



                                    <h4 class="modal-title">Delete</h4>



                                  </div>



                                  <div class="modal-body">



                                    <p>Are You sure want to delete this page?</p>



                                  </div>



                                  <div class="modal-footer">



                                  <button type="button" data-table="page_content" data-field="id" data-id="<?php echo $id;?>"  style="margin-left:10px;" class="btn btn-danger pull-right delete-data">Delete</button>  



                                    <button type="button" class="btn btn-default pull-right" onclick='window.location.href=""';>Close</button>



                                  </div>



                                </div><!-- /.modal-content -->



                              </div><!-- /.modal-dialog -->



                            </div><!-- /.modal -->



                          </div>  



                      </tr>



                     <?php }



                   }



                   else



                   {



                    ?>



                      <tr><td colspan="6" style="text-align:center">No Records Found</td><td></td><td></td><td></td><td></td></td></tr>



                    <?php



                   }



                     ?>



                    



                    </tbody>                   



                  </table>



                </div><!-- /.box-body -->



              </div>



        </div>



        <?php require('includes/footer.php');?>



    </div>



</body>



<?php 



}?>