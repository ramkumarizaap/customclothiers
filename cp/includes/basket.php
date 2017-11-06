<?php

//require("../../includes/action/config.php");

if(isset($_GET['type']))

{

$userid=$_GET['type'];  

}

else{

  $userid=$_GET['id'];

}



$sql=mysqli_query($con,"select a.*,b.p_name,b.p_price from order_master a,product_master b 

		where a.userid=$userid and a.pid=b.p_id and a.om_status=1 order by a.last_updated desc");

$count=mysqli_num_rows($sql);

$sql2=mysqli_query($con,"select * from gift_card_master where userid=$userid and status=0 order by created_date desc");

$count2=mysqli_num_rows($sql2);

if($count || $count2)

{

?>

<ul class="nav navbar-nav navbar-right">

        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span><?php echo $count+$count2;?> - Item(s)<span class="caret"></span></a>

          <ul class="dropdown-menu dropdown-cart" role="menu">

          <?php 

          while ($r=mysqli_fetch_array($sql)) {

            $oid=$r['order_id'];

          	$sql1=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");

          	$r1=mysqli_fetch_array($sql1);

            $fabric=explode("{",$r['om_fab']);

             $fabric=explode(",",$fabric[1]);

             $fabric_price=explode(":",$fabric[0]);

             $fabric_id = explode(":",trim($fabric[1],"}"));

          	?>

              <li>

                  <span class="item">

                    <span class="item-left">

                         <?php //if($r['om_style']==""){?>

                        <img src="<?php echo $homeurl.$r1['p_img'];?>" style="height:50px;width:30px;" />

                        <?php /*}

                         else if($r['om_style']!='')

                          {                       

                           $get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");



                                 if(mysqli_num_rows($get_fab_def_img) > 0) { 

                                   $fab_def_img = mysqli_fetch_array($get_fab_def_img);

                                ?> 

                           <img src="<?php echo $homeurl.$fab_def_img['default_img'];?>" alt="Customizer item" style="width:30px;height:50px;">

                           <?php   

                              }

                          }*/

                        ?>

                        <span class="item-info">

                        <?php if($r['om_style']!='') { ?>

                            <span>Custom <?php echo $r['p_name'];?></span>

                          <?php } else { ?>
                           <span><?php echo $r['p_name'];?></span>
                          <?php } ?>


                            <span>$<?php echo number_format($r['om_quantity']*$r['om_price'],2);?></span>

                        </span>

                    </span>

                    <div class="clearfix"></div>
                    <span class="item-right">

                        <a href="javascript:void(0);" data-id="<?php echo $r['om_id'];?>" data-user-id="<?php echo $userid; ?>" data-order-id="<?php echo $r['order_id'];?>"

                        	 class="del_cart btn btn-xs btn-danger pull-right">x</a>

                    </span>

                </span>

              </li>

           <?php }

            while($r2=mysqli_fetch_array($sql2))

           {

            $oid=$r2['orderid'];

           ?>

            <li>

                  <span class="item">

                    <span class="item-left">

                       <i class="fa fa-gift pull-left"></i>

                        <span class="item-info">

                            <span>Gift Card</span>

                            <span>$<?php echo number_format($r2['amount'],2);?></span>

                        </span>

                    </span>
                    <div class="clearfix"></div>   
                    <span class="item-right">

                        <a href="javascript:void(0);" data-id="<?php echo $r2['gc_id'];?>"

                           data-order-id="<?php echo $r2['orderid'];?>" data-user-id="<?php echo $userid; ?>" class="del-gift btn btn-xs btn-danger pull-right">x</a>

                    </span>

                </span>

              </li>

              <?php 

              

            }

           ?>

           <?php 

             if($_GET['page']=='new-order')

                  $user_id = $_GET['type'];

              else

                  $user_id=$_GET['id'];            

            ?>  



              <li class="divider"></li>

              <li><a class="text-center" href="<?php echo $adminurl;?>view-cart/<?php echo $user_id;?>/<?php echo $oid;?>/">View Cart</a></li>

          </ul>

        </li>

      </ul>

      <?php

}

else{

  ?>

  <ul class="nav navbar-nav navbar-right">

  <li class="dropdown">

    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span>

  0 - Item(s)<span class="caret"></span></a>

    </li>

    </ul>

  <?php

}

?>