<?php
require_once('config.php');

session_start();
if(isset($_SESSION['user_id']))
{
    $where = " a.userid='".$_SESSION['user_id']."'";
}
else
{
    $where = " a.sess_id='".$_SESSION['guest_id']."'";
}
$sql=mysqli_query($con,"select a.*,b.p_name,b.p_description,b.p_id from order_master a,product_master b where 
    $where and a.pid=b.p_id and a.om_status=1 order by a.created_date desc LIMIT 1");
if($sql)
{
     $r=mysqli_fetch_array($sql);
     $count=mysqli_num_rows($sql);
      if($count=="")
    {?>
    <script type="text/javascript">$(".check-btn").hide();</script>
    <?php
    }
    else
    {
    ?>
         <script type="text/javascript">$(".check-btn").attr("href","https://baltimorecustomclothiers.com/shopping-cart/<?php echo $r['order_id'];?>/");</script>
    <?php

    }
if(mysqli_num_rows($sql) > 0)
{
?>
<div class="table table-responsive cart-summary" style="height:245px;">
                            <table>
                                <thead>
                                <tr>
                                    <td colspan="2">Product</td>
                                    <td class="width16">Quantity</td>
                                    <td class="text-right width16">Subtotal</td>
                                  </tr>
                                </thead>
                                <tbody>
                                   <?php
                                            $tot="";                                            
                                                $order_id=$r['order_id'];
                                                $tot=$tot + ($r['om_quantity'] * $r['om_price']);
                                                $sql1=mysqli_query($con,"select * from product_images where pid='".$r['pid']."'");
                                               $r1=mysqli_fetch_array($sql1);
                                               // $sql2=mysqli_query($con,"select w_id from wishlist_master where $where and  pid='".$r['pid']."'");
                                    ?>
                                            <tr class="cart_<?php echo $r['om_id'];?>">
                                                <td>
                                                    
                                                        <img src="<?php echo $homeurl.$r1['p_img'];?>" style="height:120px;width:70px;" alt="Shop item">
                                                    
                                                </td>
                                                <td>
                                                    <h4><a href="#"><?php echo $r['p_name'];?></a></h4>
                                                    <span class="price">$<?php echo number_format($r['om_price'],2);?></span>
                                                    <!--<br><br>
                                                    <span class="wish-span<?php echo $r['om_id'];?>">
                                                        <?php if(mysqli_num_rows($sql2)< 1){?>
                                                    <button type="button" class="btn add-wishlist btn-info btn-mini"
                                                    data-pid="<?php echo $r['p_id'];?>" data-id="<?php echo $r['om_id'];?>">
                                                        Add to Wishlist</button>
                                                        <button type="button" class="modal-btn hide btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
                                                        <?php }else{?>
                                                            <a href="<?php echo $homeurl;?>wishlist/" class="btn btn-info btn-mini">Added to Wishlist</a>
                                                        <?php
                                                        }?>
                                                    </span>&nbsp;&nbsp;&nbsp;-->
                                                </td>
                                                <!--<td>-->
                                                    <!--<a href="#">Edit</a>-->&nbsp;&nbsp;&nbsp;
                                                   <!-- <a href="javascript:void(0);" data-id="<?php echo $r['om_id'];?>" class="remove_cart btn btn-primary btn-mini">Remove</a>-->
                                                <!--</td>-->
                                                <td>
                                                    <input class="form-control spinner-quantity q_<?php echo $r['om_id'];?>"  value="<?php echo $r['om_quantity'];?>"
                                                    aria-valuenow="4"   id="quantity1" required><br><br>
                                                    <a href="javascript:void(0);" class="update_qty1 btn btn-primary btn-mini" data-id="<?php echo $r['om_id'];?>">Update</a>
                                                </td>
                                                <td class="text-right">
                                                    <strong>$<?php echo number_format($r['om_quantity'] * $r['om_price'],2);?></strong>
                                                </td>
                                               
                                            </tr>
                                        
                                </tbody>
                            </table>
                            <script type="text/javascript">$(".proceed-to-cart").attr("href","<?php echo $homeurl; ?>shopping-cart/<?php echo $r['order_id'];?>/");</script>
                        </div>

                        <?php }  ?>
<style type="text/css">
    .spinner-quantity {
     height: 32px; 
     margin: 0; 
     border: none; 
     padding: 0; 
     width: 68px; 
     text-align: center; 
     font-family: 'PT Sans', sans-serif; 
}
</style>
<script type="text/javascript">
  (function () {
    if (jQuery().spinner) {
      var config = {
        '.spinner': {min: 1,max:10},
        '.spinner-quantity': {min:1,max:10}
      };
      for (var selector in config) {
        jQuery(selector).spinner(config[selector]);
      }
    }
  })();

$(".remove_cart").click(function(){
    
    id=$(this).attr("data-id");
    $.ajax({
        type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",
        data:{id:id,type:"del_cart"},
        success:function(data)
        {
            $(".cart-summary table tbody tr.cart_"+id).remove();
            $.ajax({
                            type:"POST",url:"<?php echo $homeurl;?>includes/action/cart.php",
                                data:"",
                            success:function(data)
                            {
                               console.log(data);
                                if(data=="")
                                {
                                    data="<a href='<?php echo $homeurl;?>' class='btn btn-default'>Continue Shopping</a>";
                                    $(".cart_body").html(data);
                                    $(".check-btn").hide();
                                }
                                else
                                {
                                   // data=data.split("@@@@@");
                                    $(".cart_body").html(data);
                                }
                                //$(".modal#cart-poup").modal();
                            }
                        });
        }
    })
//    $(this).parent.parent().remove();
});



$(".update_qty1").click(function(){
     id=$(this).attr("data-id");
        qty=$(".q_"+id).val();

        $.ajax({
            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",
            data:{id:id,type:"update_cart",qty:qty},
            success:function(data)
            {
                 $.ajax({
                        type:"POST",url:"<?php echo $homeurl;?>includes/action/cart.php",
                            data:"",
                        success:function(data)
                        {                         
                                $(".cart_body").html(data);
                        }
                    });
            }
        });
});
  $(".add-wishlist").click(function(){
        s_id="<?php echo isset($_SESSION['user_id']);?>";

        if(s_id=="")
        {
             $(".modal#cart-popup").modal('hide');
            $("#myModal").modal('show');

        }
        else
        {
            pid=$(this).attr("data-pid");id=$(this).attr("data-id");
            $.ajax({
                type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",
                data:{type:"add_wishlist",id:id,pid:pid},
                success:function(data)
                {
                    $(".wish-span"+id).html("<a href='<?php echo $homeurl;?>wishlist/' class='btn btn-info btn-mini'>Added to Wishlist</a>");        
                }
            });
        }
    });

//    $(".checkout_btn").attr("href","<?php echo $homeurl.'shopping-cart/'.$order_id;?>/");
</script>
<?php } ?>
