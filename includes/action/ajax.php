<?php

require('config.php');

require('imageManipulator.php');



session_start();



$type=$_POST['type'];

if($type=="get_cart")

{

	$res=array();$i=0;$tot=0;$msg="";$a=0;$msg1="";$msg2="";$tot1="";



	if(isset($_SESSION['guest_id'])){

		$sql=mysqli_query($con,"select a.*,b.p_name,b.p_price from order_master a,product_master b where 

			 a.sess_id='".$_SESSION['guest_id']."' and a.pid=b.p_id and a.om_status=1 order by a.last_updated desc");

		$gift=mysqli_query($con,"select * from gift_card_master where sess_id='".$_SESSION['guest_id']."'

				and status=0 order by created_date desc");

	}

	else if(isset($_SESSION['user_id']))

	{

		$sql=mysqli_query($con,"select a.*,b.p_name,b.p_price  from order_master a,product_master b where 

			a.userid='".$_SESSION['user_id']."' and a.pid=b.p_id and a.om_status=1 order by a.last_updated desc");

		$gift=mysqli_query($con,"select * from gift_card_master where userid='".$_SESSION['user_id']."'

				and status=0 order by created_date desc");

	}

		if($sql)

		{

			if(mysqli_num_rows($sql) > 0)

			{

				while ($r=mysqli_fetch_array($sql))

				 {

				 	$fabric=explode("{",$r['om_fab']);

                    $fabric=explode(",",$fabric[1]);

                    $fabric_price=explode(":",$fabric[0]);

                    $fabric_id = explode(":",trim($fabric[1],"}"));

				 	

				 	$order_id=$r['order_id'];

				 		$sql1=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");

				 		$r1=mysqli_fetch_array($sql1);

				 	

				 	if($r['om_style']=='') { 

				 	   $msg.="<article class='shop-summary-item cart_".$r['om_id']."'>

			                <img src=".$homeurl.$r1['p_img']." style='height:89px;'  alt='Shop item in cart'>

			                    <div class='item-info-name-features-price'>

			                        <h4><a href='#'>".$r['p_name']."</a></h4>

			                        <span class='quantity_".$r['om_id']."'>".$r['om_quantity']."</span><b>&times;</b>$<span class='price_".$r['om_id']."'  data-table='order_master'>".number_format($r['om_price'],2)."</span>

			                    </div>

			                <button type='button' class='close close2' data-table='order_master' data-id='".$r['om_id']."' data-field='om_id' data-order='".$order_id."' aria-hidden='true'><span aria-hidden='true' data-icon='&#xe005;'></span></button>

			              </article>";

                                      

                        }

                        else if($r['om_style']!='') { 

                             $get_fab_def_img = mysqli_query($con,"select default_img from fabric_master where fab_rand='".trim($fabric_id[1])."'");

                             if(mysqli_num_rows($get_fab_def_img) > 0) { 

                             	  $fab_def_img = mysqli_fetch_array($get_fab_def_img);

                             	}

				 	       $msg.="<article class='shop-summary-item cart_".$r['om_id']."'>

			                <img src=".$homeurl.$r1['p_img']." style='height:89px;'  alt='Shop item in cart'>

			                    <div class='item-info-name-features-price'>

			                        <h4><a href='#'>Custom ".$r['p_name']."</a></h4>

			                        <span class='quantity_".$r['om_id']."'>".$r['om_quantity']."</span><b>&times;</b>$<span class='price_".$r['om_id']."'  data-table='order_master'>".number_format($r['om_price'],2)."</span>

			                    </div>

			                <button type='button' class='close close2'  data-table='order_master' data-id='".$r['om_id']."'  data-field='om_id' data-order='".$order_id."' aria-hidden='true'><span aria-hidden='true' data-icon='&#xe005;'></span></button>

			              </article>";

                        } 



			              $tot=$tot + ($r['om_quantity'] * $r['om_price']);

			 		$msg1= $a."@@@@@".number_format($tot,2);

			              $i++;$a++;

			  	 }

			  	

			}

			if(mysqli_num_rows($gift) > 0)

			{

				

				while($gf=mysqli_fetch_array($gift))

				{

					$tot1=$tot1 + $gf['amount'];$order_id=$gf['orderid'];

					$msg.="<article class='shop-summary-item gift_cart_".$gf['gc_id']."'>

			                

			                    <div class='item-info-name-features-price'>

			                        <h4><a href='#'>

			                        <span><i class='fa fa-gift'></i></span>

			                        Gift Card</a></h4>

			                        <small>(".$gf['gift_code'].")</small><br>

			                        <span class='gift_quantity_".$gf['gc_id']."'>".$gf['quantity']."</span><b>&times;</b>$<span class='gift_price_".$gf['gc_id']."' data-table='gift_card_master'>".number_format($gf['amount'],2)."</span>

			                    </div>

			                <button type='button' class='close close2' data-table='gift_card_master' data-id='".$gf['gc_id']."' aria-hidden='true' data-order='".$order_id."'  data-field='gc_id'><span aria-hidden='true' data-icon='&#xe005;'></span></button>

			              </article>";

			              $s++;

				}



				

			}

			if(mysqli_num_rows($sql) <=0 && mysqli_num_rows($gift) <=0)

			{

				$msg1= "0"."@@@@@".number_format("000",2);

				 echo $msg."@@@@@".$msg1;

			}

			else

			{

				$amt=$tot + $tot1;

				$msg1= $a+mysqli_num_rows($gift)."@@@@@".number_format($amt,2);

				$msg2.="<span class='total-price-tag pull-left'>Cart subtotal</span><span class='pull-right'>$<span class='item-price item-price1'>".number_format($amt,2)."</span></span>

                  <div class='clearfix'></div>".

                  //<a href='<?php echo $homeurl; class='btn btn-primary btn-block'>

                    //View shopping cart                 </a>

                  "<a href='".$homeurl."shopping-cart/".$order_id."/' class='btn btn-default btn-block proceed-cart'>

                    Proceed to Cart

                  </a>";

				echo $msg."@@@@@".$msg1."@@@@@".$msg2;

			}

		}

		else 

		{

			return 0;

		}

}

elseif ($type=="cart_insert")

{

	$pid=$_POST['pid'];

	$subid=$_POST['subid'];

	$sql1=mysqli_query($con,"select p_price from product_master where p_id='".$pid."'");

	$r1=mysqli_fetch_array($sql1);

	$price=$r1['p_price'];

	$date=date('Y-m-d H:i:s');

	$userid=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "0";

	$gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] : "0";

	

	if(isset($_SESSION['guest_id'])){

    	$where = " sess_id= '".$_SESSION['guest_id']."'";

  	}

  	else if(isset($_SESSION['user_id']))

  	{

    	$where = " userid= '".$_SESSION['user_id']."'";

  	}

	$sql2=mysqli_query($con,"select order_id from order_master where $where and om_status=1");
	if(mysqli_num_rows($sql2) > 0)
	{
		$r1=mysqli_fetch_array($sql2);
		$o_id=$r1['order_id'];
	}
	else
	{
		$gift=mysqli_query($con,"select orderid from gift_card_master where 
		$where and status=0");
		if(mysqli_num_rows($gift) > 0)
		{
			$g1=mysqli_fetch_array($gift);
			$o_id=$g1['orderid'];
		}
		else
		{

		$get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
		$r=mysqli_fetch_array($get_oid);
		if($r['oid']!='0')
		{
			$a = str_replace("CC","",$r['oid']);
			$o_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
		}
		else
		{
			$o_id="CC00000001";
		}
		$sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$o_id."',NOW(),NOW())");
	  }
	}
	
	$sql=mysqli_query($con,"insert into order_master(order_id,userid,sess_id,pid,subcatid,om_price,om_quantity,order_status,created_date,last_updated)values('".$o_id."','".$userid."','".$gid."','".$pid."','".$subid."','".$price."',1,'Processing','".$date."','".$date."')");

}

elseif ($type=="del_cart")

{

	$id=$_POST['id'];$table=$_POST['table'];$field=$_POST['field'];
	$r_count=$_POST['r_count'];$order_id=$_POST['order_id'];
	//$userid = $_SESSION['user_id'];
	
    if(isset($_SESSION['user_id']))
    {
    	$userid=$_SESSION['user_id'];
    	$where = "userid='".$userid."' and status=0";
	}
	else
	{
		$guest=$_SESSION['guest_id'];
		$where = "sess_id='".$guest."' and status=0";
	}

	$sql=mysqli_query($con,"delete from $table where $field=$id");
	
	if($r_count=="1")
	{
		$ord_del = mysqli_query($con,"delete from order_id_generate where order_id='".$order_id."'");
		$sql1=mysqli_query($con,"delete from coupon_applied where $where");
		$query = mysqli_query($con,"select * from gift_card_applied where $where");
		
        $r=mysqli_fetch_array($query);
		/*while ($r=mysqli_fetch_array($query))
		{*/
			$amount = $r['amount'];$gid=$r['gcid'];
			$bal = mysqli_query($con,"select * from gift_card_master where gc_id=$gid");
			$balance = mysqli_fetch_array($bal);
			$net_amt = $balance['balance'];
			$org_amt = $net_amt + $amount;
			$up_gift = mysqli_query($con,"update gift_card_master set balance='$org_amt' where gc_id=$gid");
			$sql2=mysqli_query($con,"delete from gift_card_applied where gcid=$gid");
			
		//}
		
	}

	echo $id."@@@@@".$table;

}

elseif ($type=="update_cart")

{

	$id=$_POST['id'];

	$qty=$_POST['qty'];

	$date=date('Y-m-d H:i:s');

	$sql=mysqli_query($con,"update order_master set om_quantity='".$qty."',last_updated='".$date."' where om_id=$id");

}





elseif ($type=="del_gift")

{

	$id=$_POST['id'];
	$order_id = $_POST['order_id'];
	$r_count=$_POST['r_count'];

	$userid=$_POST['userid'];

	if($userid!='')
	{
		$userid=$userid;
		$guest=0;
		$where = "userid='".$userid."' and status=0";
	}
	else if(isset($_SESSION['user_id']))
	{
		$userid=$_SESSION['user_id'];
		$guest=0;
		$where = "userid='".$userid."' and status=0";
	}
	else
	{
		$guest=$_SESSION['guest_id'];
		$userid=0;
		$where = "sess_id='".$guest."' and status=0";
	}
    
    if($r_count==1)
    {
	 $ord_del = mysqli_query($con,"delete from order_id_generate where order_id='".$order_id."'");

	 $sql1=mysqli_query($con,"delete from coupon_applied where $where");
		$query = mysqli_query($con,"select * from gift_card_applied where $where");
		$r=mysqli_fetch_array($query);
		/*while ($r=mysqli_fetch_array($query))
		{*/
			$amount = $r['amount'];$gid=$r['gcid'];
			$bal = mysqli_query($con,"select * from gift_card_master where gc_id=$gid");
			$balance = mysqli_fetch_array($bal);
			$net_amt = $balance['balance'];
			$org_amt = $net_amt + $amount;
			$up_gift = mysqli_query($con,"update gift_card_master set balance='$org_amt' where gc_id=$gid");
			$sql2=mysqli_query($con,"delete from gift_card_applied where gcid=$gid");
    }

	$sql=mysqli_query($con,"delete from gift_card_master where gc_id=$id");

}

elseif ($type=="delete_order")

{

	$omid=$_POST['omid'];
	$order_id = $_POST['order_id'];
	$user_id = $_POST['userid'];

	$get_order_dtl = mysqli_query($con,"select order_id from order_master where order_id='".$order_id."'");

	if(mysqli_num_rows($get_order_dtl) > 1)
	{
	  $ord_del = mysqli_query($con,"delete from order_master where om_id=".$omid."");

	  $tot='';$a1=$a2=array();
      $order_sql=mysqli_query($con,"select a.*,b.p_name from order_master a,product_master b where a.order_id='".$order_id."' and a.pid=b.p_id order by a.created_date desc");
      while($r=mysqli_fetch_array($order_sql))
      {
        $tot=$tot + ($r['om_quantity'] * $r['om_price']);
      }

      $gift=mysqli_query($con,"select * from gift_card_master where orderid='".$order_id."' order by created_date desc");
      if(mysqli_num_rows($gift))
      {
        while($g=mysqli_fetch_array($gift))
        {
          $a1[]=$g['amount'];
        }
      }

      $app=mysqli_query($con,"select * from gift_card_applied where orderid='".$order_id."'");
      if(mysqli_num_rows($app))
      {
        $ap=mysqli_fetch_array($app);
        $a2[]=$ap['amount'];
      }

      $query=mysqli_query($con,"select * from payment_information where pi_id=1");

        $r=mysqli_fetch_array($query);

        $res[0]['id']=$r['id'];

        $res[0]['paypal_id']=$r['paypal_id'];

        $res[0]['cash_delivery']=$r['cash_on_delivery'];

        $res[0]['payment_mode']=$r['payment_mode'];

        $res[0]['in_store']=$r['in_store_credit'];

        $res[0]['shipping_cost']=$r['shipping_cost'];

        $shipping_cost=$res[0]['shipping_cost'];


        $coupon=mysqli_query($con,"select * from coupon_applied where orderid='".$order_id."'");
          if(mysqli_num_rows($coupon))
            {
              $cr=mysqli_fetch_array($coupon);
              if($cr['coupon_type']=="Discount")
                {
                  $dis=((($tot + array_sum($a1)) - array_sum($a2)) / 100) * $cr['value'];
                }
                else  if($cr['coupon_type']=="$")
                {
                  if( (($tot + array_sum($a1)) - array_sum($a2)) >=  $cr['value'])
                    $dis= $cr['value']; 
                  else
                    $dis = (($tot + array_sum($a1)) - array_sum($a2));
                }
                else if($cr['coupon_type']=="Free Shipping")
                {
                  $shipping_cost= 0; 
                  $dis= 0; 
                }
            }

         $discount=mysqli_query($con,"select discount from order_history_master where orderid='".$order_id."'");
          if(mysqli_num_rows($discount))
          {
            $discount_dtl=mysqli_fetch_array($discount);
            $dis_amt=$discount_dtl['discount'];
          }

          $b_add=mysqli_query($con,"select * from user_master where user_id=$user_id");

          $add=mysqli_fetch_array($b_add);

          $uaddress1=$add['address1'];$ucity=$add['city'];$uprovince=$add['province'];

          $uzipcode=$add['zipcode'];$ucountry=$add['country'];

         if($uaddress1!="" && $ucity!="" && $uprovince!="" && $uzipcode!="" && $ucountry!="")

         {



            $sql=mysqli_query($con,"select t_percent from tax_master where t_state='$uprovince'

                    and status=0");

            if(mysqli_num_rows($sql))

            {

                $r=mysqli_fetch_array($sql);

                $tax = $r['t_percent'];

            }

            else

            {

                $tax = 0;

            }

        }

        else

        {

            $tax = 0;

        }


    if(count($a2) > 0)
      $tp=(((($tot + array_sum($a1) - array_sum($a2)) - $dis_amt) - $dis) / 100) * $tax;
    else
     $tp=(((($tot + array_sum($a1)) - $dis_amt) - $dis) / 100) * $tax;

    $tot_amount = number_format(((($tot + $tp + array_sum($a1) + $shipping_cost) - array_sum($a2))-$dis_amt) - $dis,2);
                        
     $order_history_update_sql = mysqli_query($con,"update order_history_master set tot_amount = '".filter_var($tot_amount,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where orderid='$order_id'");

	}

	else if(mysqli_num_rows($get_order_dtl)==1)
	{
		$get_gift_card_dtl = mysqli_query($con,"select orderid from gift_card_master where orderid='".$order_id."'");

		if(mysqli_num_rows($get_gift_card_dtl) > 0)
		{
			$ord_del = mysqli_query($con,"delete from order_master where om_id=".$omid."");

			$tot='';$a1=$a2=array();
      $order_sql=mysqli_query($con,"select a.*,b.p_name from order_master a,product_master b where a.order_id='".$order_id."' and a.pid=b.p_id order by a.created_date desc");
      while($r=mysqli_fetch_array($order_sql))
      {
        $tot=$tot + ($r['om_quantity'] * $r['om_price']);
      }

      $gift=mysqli_query($con,"select * from gift_card_master where orderid='".$order_id."' order by created_date desc");
      if(mysqli_num_rows($gift))
      {
        while($g=mysqli_fetch_array($gift))
        {
          $a1[]=$g['amount'];
        }
      }

      $app=mysqli_query($con,"select * from gift_card_applied where orderid='".$order_id."'");
      if(mysqli_num_rows($app))
      {
        $ap=mysqli_fetch_array($app);
        $a2[]=$ap['amount'];
      }

      $query=mysqli_query($con,"select * from payment_information where pi_id=1");

        $r=mysqli_fetch_array($query);

        $res[0]['id']=$r['id'];

        $res[0]['paypal_id']=$r['paypal_id'];

        $res[0]['cash_delivery']=$r['cash_on_delivery'];

        $res[0]['payment_mode']=$r['payment_mode'];

        $res[0]['in_store']=$r['in_store_credit'];

        $res[0]['shipping_cost']=$r['shipping_cost'];

        $shipping_cost=$res[0]['shipping_cost'];


        $coupon=mysqli_query($con,"select * from coupon_applied where orderid='".$order_id."'");
          if(mysqli_num_rows($coupon))
            {
              $cr=mysqli_fetch_array($coupon);
              if($cr['coupon_type']=="Discount")
                {
                  $dis=((($tot + array_sum($a1)) - array_sum($a2)) / 100) * $cr['value'];
                }
                else  if($cr['coupon_type']=="$")
                {
                  if( (($tot + array_sum($a1)) - array_sum($a2)) >=  $cr['value'])
                    $dis= $cr['value']; 
                  else
                    $dis = (($tot + array_sum($a1)) - array_sum($a2));
                }
                else if($cr['coupon_type']=="Free Shipping")
                {
                  $shipping_cost= 0; 
                  $dis= 0; 
                }
            }

         $discount=mysqli_query($con,"select discount from order_history_master where orderid='".$order_id."'");
          if(mysqli_num_rows($discount))
          {
            $discount_dtl=mysqli_fetch_array($discount);
            $dis_amt=$discount_dtl['discount'];
          }

          $b_add=mysqli_query($con,"select * from user_master where user_id=$user_id");

          $add=mysqli_fetch_array($b_add);

          $uaddress1=$add['address1'];$ucity=$add['city'];$uprovince=$add['province'];

          $uzipcode=$add['zipcode'];$ucountry=$add['country'];

         if($uaddress1!="" && $ucity!="" && $uprovince!="" && $uzipcode!="" && $ucountry!="")

         {



            $sql=mysqli_query($con,"select t_percent from tax_master where t_state='$uprovince'

                    and status=0");

            if(mysqli_num_rows($sql))

            {

                $r=mysqli_fetch_array($sql);

                $tax = $r['t_percent'];

            }

            else

            {

                $tax = 0;

            }

        }

        else

        {

            $tax = 0;

        }


    if(count($a2) > 0)
      $tp=(((($tot + array_sum($a1) - array_sum($a2)) - $dis_amt) - $dis) / 100) * $tax;
    else
     $tp=(((($tot + array_sum($a1)) - $dis_amt) - $dis) / 100) * $tax;

    $tot_amount = number_format(((($tot + $tp + array_sum($a1) + $shipping_cost) - array_sum($a2))-$dis_amt) - $dis,2);
                        
     $order_history_update_sql = mysqli_query($con,"update order_history_master set tot_amount = '".filter_var($tot_amount,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where orderid='$order_id'");
		}
		else
		{
			$ord_del = mysqli_query($con,"delete from order_master where order_id='".$order_id."'");
			$gift_applied_del = mysqli_query($con,"delete from gift_card_applied where orderid='".$order_id."'");
			$coupon_applied_del = mysqli_query($con,"delete from coupon_applied where orderid='".$order_id."'");
			$order_history_del = mysqli_query($con,"delete from order_history_master where orderid='".$order_id."'");
		}


	}


     

	 

}

elseif ($type=="delete_gift_order")

{

	$gcode=$_POST['gcode'];
	$order_id = $_POST['order_id'];
	$user_id = $_POST['userid'];

	$get_gift_card_dtl = mysqli_query($con,"select orderid from gift_card_master where orderid='".$order_id."'");

	if(mysqli_num_rows($get_gift_card_dtl) > 1)
	{
	  $gift_card_del = mysqli_query($con,"delete from gift_card_master where orderid='".$order_id."' and gift_code='".$gcode."'");
	  
	  $tot='';$a1=$a2=array();
      $order_sql=mysqli_query($con,"select a.*,b.p_name from order_master a,product_master b where a.order_id='".$order_id."' and a.pid=b.p_id order by a.created_date desc");
      while($r=mysqli_fetch_array($order_sql))
      {
        $tot=$tot + ($r['om_quantity'] * $r['om_price']);
      }

      $gift=mysqli_query($con,"select * from gift_card_master where orderid='".$order_id."' order by created_date desc");
      if(mysqli_num_rows($gift))
      {
        while($g=mysqli_fetch_array($gift))
        {
          $a1[]=$g['amount'];
        }
      }

      $app=mysqli_query($con,"select * from gift_card_applied where orderid='".$order_id."'");
      if(mysqli_num_rows($app))
      {
        $ap=mysqli_fetch_array($app);
        $a2[]=$ap['amount'];
      }

      $query=mysqli_query($con,"select * from payment_information where pi_id=1");

        $r=mysqli_fetch_array($query);

        $res[0]['id']=$r['id'];

        $res[0]['paypal_id']=$r['paypal_id'];

        $res[0]['cash_delivery']=$r['cash_on_delivery'];

        $res[0]['payment_mode']=$r['payment_mode'];

        $res[0]['in_store']=$r['in_store_credit'];

        $res[0]['shipping_cost']=$r['shipping_cost'];

        $shipping_cost=$res[0]['shipping_cost'];


        $coupon=mysqli_query($con,"select * from coupon_applied where orderid='".$order_id."'");
          if(mysqli_num_rows($coupon))
            {
              $cr=mysqli_fetch_array($coupon);
              if($cr['coupon_type']=="Discount")
                {
                  $dis=((($tot + array_sum($a1)) - array_sum($a2)) / 100) * $cr['value'];
                }
                else  if($cr['coupon_type']=="$")
                {
                  if( (($tot + array_sum($a1)) - array_sum($a2)) >=  $cr['value'])
                    $dis= $cr['value']; 
                  else
                    $dis = (($tot + array_sum($a1)) - array_sum($a2));
                }
                else if($cr['coupon_type']=="Free Shipping")
                {
                  $shipping_cost= 0; 
                  $dis= 0; 
                }
            }

         $discount=mysqli_query($con,"select discount from order_history_master where orderid='".$order_id."'");
          if(mysqli_num_rows($discount))
          {
            $discount_dtl=mysqli_fetch_array($discount);
            $dis_amt=$discount_dtl['discount'];
          }

          $b_add=mysqli_query($con,"select * from user_master where user_id=$user_id");

          $add=mysqli_fetch_array($b_add);

          $uaddress1=$add['address1'];$ucity=$add['city'];$uprovince=$add['province'];

          $uzipcode=$add['zipcode'];$ucountry=$add['country'];

         if($uaddress1!="" && $ucity!="" && $uprovince!="" && $uzipcode!="" && $ucountry!="")

         {



            $sql=mysqli_query($con,"select t_percent from tax_master where t_state='$uprovince'

                    and status=0");

            if(mysqli_num_rows($sql))

            {

                $r=mysqli_fetch_array($sql);

                $tax = $r['t_percent'];

            }

            else

            {

                $tax = 0;

            }

        }

        else

        {

            $tax = 0;

        }

    
    if(count($a2) > 0)
      $tp=(((($tot + array_sum($a1) - array_sum($a2)) - $dis_amt) - $dis) / 100) * $tax;
    else
     $tp=(((($tot + array_sum($a1)) - $dis_amt) - $dis) / 100) * $tax;

    $tot_amount = number_format(((($tot + $tp + array_sum($a1) + $shipping_cost) - array_sum($a2))-$dis_amt) - $dis,2);
                        
     $order_history_update_sql = mysqli_query($con,"update order_history_master set tot_amount = '".filter_var($tot_amount,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where orderid='$order_id'");
	}

	else if(mysqli_num_rows($get_gift_card_dtl)==1)
	{
		$get_order_dtl = mysqli_query($con,"select order_id from order_master where order_id='".$order_id."'");

		if(mysqli_num_rows($get_order_dtl) > 0)
		{
			$gift_card_del = mysqli_query($con,"delete from gift_card_master where orderid='".$order_id."' and gift_code='".$gcode."'");
		    
		    $tot='';$a1=$a2=array();
      $order_sql=mysqli_query($con,"select a.*,b.p_name from order_master a,product_master b where a.order_id='".$order_id."' and a.pid=b.p_id order by a.created_date desc");
      while($r=mysqli_fetch_array($order_sql))
      {
        $tot=$tot + ($r['om_quantity'] * $r['om_price']);
      }

      $gift=mysqli_query($con,"select * from gift_card_master where orderid='".$order_id."' order by created_date desc");
      if(mysqli_num_rows($gift))
      {
        while($g=mysqli_fetch_array($gift))
        {
          $a1[]=$g['amount'];
        }
      }

      $app=mysqli_query($con,"select * from gift_card_applied where orderid='".$order_id."'");
      if(mysqli_num_rows($app))
      {
        $ap=mysqli_fetch_array($app);
        $a2[]=$ap['amount'];
      }

      $query=mysqli_query($con,"select * from payment_information where pi_id=1");

        $r=mysqli_fetch_array($query);

        $res[0]['id']=$r['id'];

        $res[0]['paypal_id']=$r['paypal_id'];

        $res[0]['cash_delivery']=$r['cash_on_delivery'];

        $res[0]['payment_mode']=$r['payment_mode'];

        $res[0]['in_store']=$r['in_store_credit'];

        $res[0]['shipping_cost']=$r['shipping_cost'];

        $shipping_cost=$res[0]['shipping_cost'];


        $coupon=mysqli_query($con,"select * from coupon_applied where orderid='".$order_id."'");
          if(mysqli_num_rows($coupon))
            {
              $cr=mysqli_fetch_array($coupon);
              if($cr['coupon_type']=="Discount")
                {
                  $dis=((($tot + array_sum($a1)) - array_sum($a2)) / 100) * $cr['value'];
                }
                else  if($cr['coupon_type']=="$")
                {
                  if( (($tot + array_sum($a1)) - array_sum($a2)) >=  $cr['value'])
                    $dis= $cr['value']; 
                  else
                    $dis = (($tot + array_sum($a1)) - array_sum($a2));
                }
                else if($cr['coupon_type']=="Free Shipping")
                {
                  $shipping_cost= 0; 
                  $dis= 0; 
                }
            }

         $discount=mysqli_query($con,"select discount from order_history_master where orderid='".$order_id."'");
          if(mysqli_num_rows($discount))
          {
            $discount_dtl=mysqli_fetch_array($discount);
            $dis_amt=$discount_dtl['discount'];
          }

          $b_add=mysqli_query($con,"select * from user_master where user_id=$user_id");

          $add=mysqli_fetch_array($b_add);

          $uaddress1=$add['address1'];$ucity=$add['city'];$uprovince=$add['province'];

          $uzipcode=$add['zipcode'];$ucountry=$add['country'];

         if($uaddress1!="" && $ucity!="" && $uprovince!="" && $uzipcode!="" && $ucountry!="")

         {



            $sql=mysqli_query($con,"select t_percent from tax_master where t_state='$uprovince'

                    and status=0");

            if(mysqli_num_rows($sql))

            {

                $r=mysqli_fetch_array($sql);

                $tax = $r['t_percent'];

            }

            else

            {

                $tax = 0;

            }

        }

        else

        {

            $tax = 0;

        }


    if(count($a2) > 0)
      $tp=(((($tot + array_sum($a1) - array_sum($a2)) - $dis_amt) - $dis) / 100) * $tax;
    else
     $tp=(((($tot + array_sum($a1)) - $dis_amt) - $dis) / 100) * $tax;

    $tot_amount = number_format(((($tot + $tp + array_sum($a1) + $shipping_cost) - array_sum($a2))-$dis_amt) - $dis,2);
                        
     $order_history_update_sql = mysqli_query($con,"update order_history_master set tot_amount = '".filter_var($tot_amount,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where orderid='$order_id'");
		}
		else
		{
			$gift_card_del = mysqli_query($con,"delete from gift_card_master where orderid='".$order_id."'");
			$gift_applied_del = mysqli_query($con,"delete from gift_card_applied where orderid='".$order_id."'");
			$coupon_applied_del = mysqli_query($con,"delete from coupon_applied where orderid='".$order_id."'");
			$order_history_del = mysqli_query($con,"delete from order_history_master where orderid='".$order_id."'");
		}


	}


     

	 

}

elseif ($type=="update_gift")

{

	$id=$_POST['id'];

	$qty=$_POST['qty'];

	$date=date('Y-m-d H:i:s');

	$sql=mysqli_query($con,"update gift_card_master set quantity='".$qty."',last_updated='".$date."'

		 where gc_id=$id");

}



elseif ($type=="gift_code")

{

	$val=$_POST['val'];

	$amount=$_POST['amt'];

	$oid=$_POST['oid'];

	$userid=$_POST['userid'];


    if($userid!='')

		{

			$userid=$userid;

			$guest=0;
			$where = "userid='".$userid."' and status=0";

		}



		else if(isset($_SESSION['user_id']))

		{

			$userid=$_SESSION['user_id'];

			$guest=0;
			$where = "userid='".$userid."' and status=0";

		}

		else

		{

			$guest=$_SESSION['guest_id'];

			$userid=0;
			$where = "sess_id='".$guest."' and status=0";


		}

    $gft_sql=mysqli_query($con,"select * from gift_card_applied where $where");



	if(mysqli_num_rows($gft_sql) > 0)
	{
		  echo "<span style='color:red;'>Sorry!!! Only one gift card allowed to apply.</span>@@@@@";
	}
	else
	{		

	if($amount!=0)

	{

		

		$sql=mysqli_query($con,"select * from gift_card_master where status=1 and gift_code='".$val."'");

		if(mysqli_num_rows($sql) > 0)

		{

			$r=mysqli_fetch_array($sql);

			$used=$r['used'];$qty=$r['quantity'];

			$amt=$r['amount'];$gid=$r['gc_id'];$code=$r['gift_code'];

			if($used==$qty)

			{

			  echo "<span style='color:red;'>Sorry!!! This voucher is valid for only $qty times.</span>@@@@@";

			}

			else

			{

				if($r['balance']!="0")

				{

					if($amount >= $r['balance'])

					{

						echo $c="Success@@@@@";

						$paid=$r['balance'];

						$tot=0;

					}

					else

					{

						echo $c="Success@@@@@";

						$tot=$r['balance'] - $amount;

						$paid=$r['balance'] - $tot;

						

					}	

					

					$used=$used+1;

					$sql=mysqli_query($con,"update gift_card_master set balance='".$tot."' where gc_id=$gid");

					$sql2=mysqli_query($con,"insert into gift_card_applied(userid,sess_id,orderid,gcid,code,amount)

						values($userid,'$guest','".$oid."',$gid,'$code','$paid')");

				}

				else

				{

					echo "<span style='color:red;'>Sorry!!! This voucher is Expired.</span>@@@@@@";

				}

			}



		}

		else

		{

			echo "<span style='color:red;'>Sorry!!! This voucher is Invalid.</span>@@@@@@";

		}

	}

	else

	{

		echo "<span style='color:red;'>Sorry!!! Your subtotal is zero.</span>@@@@@@";

	}
  }

}







elseif ($type=="remove_gift")

{

	$id=$_POST['val'];$gid=$_POST['gid'];



	$sql1=mysqli_query($con,"select amount from gift_card_applied where gca_id=$id");

	$r1=mysqli_fetch_array($sql1);

	$amount=$r1['amount'];



	$sql2=mysqli_query($con,"select balance from gift_card_master where gc_id=$gid");

	$r2=mysqli_fetch_array($sql2);

	$balance=$r2['balance'];

	

		$tot=$balance + $amount;



	$sql=mysqli_query($con,"delete from gift_card_applied where gca_id=$id");

	

	$sql=mysqli_query($con,"update gift_card_master set balance=$tot,last_updated='".$date."'

		 where gc_id=$gid");

}

elseif ($type=="remove_coupon")

{

	$id=$_POST['val'];

	$sql=mysqli_query($con,"delete from coupon_applied where ca_id=$id");

}









else if ($type=="update_address")

{

	$country=mysqli_real_escape_string($con,trim($_POST['country']));

	$firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));

	$lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));

	$address1=mysqli_real_escape_string($con,trim($_POST['address1']));

	$address2=mysqli_real_escape_string($con,trim($_POST['address2']));

	$city=mysqli_real_escape_string($con,trim($_POST['city']));

	$a_id=mysqli_real_escape_string($con,trim($_POST['a_id']));

	$state=mysqli_real_escape_string($con,trim($_POST['state']));

	$zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));

	$userid=$_SESSION['user_id'];

	$date=date('Y-m-d H:i:s');

	/*$sql=mysqli_query($con,"select userid from  shipping_address  where userid='".$userid."'");

	if(mysqli_num_rows($sql) > 0)

	{

		$sql=mysqli_query($con,"update shipping_address set sa_firstname='".$firstname."',sa_lastname='".$lastname."',sa_address1='".$address1."',

			sa_address2='".$address2."',sa_city='".$city."',sa_province='".$state."',last_updated='".$date."',

			sa_country='".$country."',sa_zipcode='".$zipcode."' where userid='".$_SESSION['user_id']."'");

		echo $a_id."@@@";

	}

	else

	{

		$sql=mysqli_query($con,"insert into shipping_address(userid,sa_firstname,sa_lastname,sa_address1,sa_address2,

			sa_city,sa_province,sa_country,sa_zipcode,created_date) values('".$_SESSION['user_id']."','".$firstname."','".$lastname."','".$address1."',

			'".$address2."','".$city."','".$state."','".$country."','".$zipcode."','".$date."')");

		echo mysqli_insert_id($con)."@@@";

	}*/

	$sql=mysqli_query($con,"select userid from  shipping_address  where userid='".$userid."' and sa_firstname='".$firstname."' and sa_lastname='".$lastname."' and sa_address1='".$address1."' and sa_address2='".$address2."' and sa_city='".$city."' and sa_province='".$state."' and sa_country='".$country."' and sa_zipcode='".$zipcode."' ");



	if(mysqli_num_rows($sql) == 0)


	{


		$sql=mysqli_query($con,"insert into shipping_address (userid,sa_firstname,sa_lastname,sa_address1,sa_address2,sa_city,sa_province,sa_country,sa_zipcode,last_updated) values(".$userid.",'".$firstname."','".$lastname."','".$address1."','".$address2."','".$city."','".$state."','".$country."','".$zipcode."','".$date."')");
        echo mysqli_insert_id($con)."@@@";

	}

	else
	{
		$sql = mysqli_query($con,"select * from  shipping_address  where userid='".$userid."' and sa_firstname='".$firstname."' and sa_lastname='".$lastname."' and sa_address1='".$address1."' and sa_address2='".$address2."' and sa_city='".$city."' and sa_province='".$state."' and sa_country='".$country."' and sa_zipcode='".$zipcode."'");
		$sql1 = mysqli_fetch_array($sql);
		echo $sql1[0]."@@@";
	}

	//$sql=mysqli_query($con,"update order_master set ship_id='".$)

}



else if ($type=="profile_upload")

{



  	$errors = array();

	if ($_FILES['profile_img']['error'] > 0) {

    	$errors[] = "Error: " . $_FILES['profile_img']['error'] . "<br />";

	} else {

    // array of valid extensions

    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');

    // get extension of the uploaded file

    $fileExtension = strrchr($_FILES['profile_img']['name'], ".");

    // check if file Extension is on the list of allowed ones

    if (in_array($fileExtension, $validExtensions)) {

        $newNamePrefix = time() . '_';

        $manipulator = new ImageManipulator($_FILES['profile_img']['tmp_name']);

        $width  = $manipulator->getWidth();

        $height = $manipulator->getHeight();

        $centreX = round($width / 2);

        $centreY = round($height / 2);



         $file_size =$_FILES['profile_img']['size'];



         if($file_size > 2097152){

         	$errors[]='File size does not exceeds 2 MB';

      	}

        

        if (file_exists('../../uploads/user_photo/'.$_SESSION['user_id'] .'_'. $_FILES['profile_img']['name'])) {



        	unlink('../../uploads/user_photo/'.$_SESSION['user_id'] .'_'. $_FILES['profile_img']['name']);

        	$manipulator->save('../../uploads/user_photo/' . $_SESSION['user_id'] .'_'. $_FILES['profile_img']['name']);

        }



        else {

        	

        	$manipulator->save('../../uploads/user_photo/' . $_SESSION['user_id'] .'_'. $_FILES['profile_img']['name']);

        }



        $sql=mysqli_query($con,"update user_master set img = '".$_SESSION['user_id'] .'_'. $_FILES['profile_img']['name']."' where user_id='".$_SESSION['user_id']."'"); 

        echo 'Done';

      }

        else {

        $errors[]='You must upload an image...';

        print_r($errors);

    }

}

}





elseif($type=="add_wishlist")

{

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$pid=mysqli_real_escape_string($con,trim($_POST['pid']));

	$sql1=mysqli_query($con,"select om_style from order_master where om_id='".$id."'");

	$r1=mysqli_fetch_array($sql1);

	$date=date('Y-m-d H:i:s');

	$sql=mysqli_query($con,"insert into wishlist_master(userid,pid,p_style,created_date)

			values('".$_SESSION['user_id']."','".$pid."','".$r1['om_style']."','".$date."')");

}



elseif($type=="del_wish")

{

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$sql1=mysqli_query($con,"delete from wishlist_master where w_id='".$id."'");

}

elseif($type=="measurement")

{

	$date=date('Y-m-d H:i:s');

	$title = isset($_POST['title']) && !empty($_POST['title']) ? mysqli_real_escape_string($con,trim($_POST['title'])) : "";

$param_chest = isset($_POST['param_chest']) && !empty($_POST['param_chest'])  ? mysqli_real_escape_string($con,trim($_POST['param_chest'])) : "";

$param_abdomen = isset($_POST['param_abdomen']) && !empty($_POST['param_abdomen']) ? mysqli_real_escape_string($con,trim($_POST['param_abdomen'])) : "";

$param_buttocks = isset($_POST['param_buttocks']) && !empty($_POST['param_buttocks']) ? mysqli_real_escape_string($con,trim($_POST['param_buttocks'])) : "";

$param_hip = isset($_POST['param_hip']) && !empty($_POST['param_hip']) ? mysqli_real_escape_string($con,trim($_POST['param_hip'])) : "";

$coat_length = isset($_POST['coat_length']) && !empty($_POST['coat_length']) ? mysqli_real_escape_string($con,trim($_POST['coat_length'])) : "";

$body_length = isset($_POST['body_length']) && !empty($_POST['body_length']) ? mysqli_real_escape_string($con,trim($_POST['body_length'])) : "";

$dress_length =isset($_POST['dress_length']) && !empty($_POST['dress_length']) ? mysqli_real_escape_string($con,trim($_POST['dress_length'])) : "";

$sleeves_length = isset($_POST['sleeves_length']) && !empty($_POST['sleeves_length']) ? mysqli_real_escape_string($con,trim($_POST['sleeves_length'])) : "";

$shoulders = isset($_POST['shoulders']) &&  !empty($_POST['shoulders']) ? mysqli_real_escape_string($con,trim($_POST['shoulders'])) : "";

$neck =isset($_POST['neck']) && !empty($_POST['neck']) ? mysqli_real_escape_string($con,trim($_POST['neck'])) : "";

$chest = isset($_POST['chest']) && !empty($_POST['chest']) ? mysqli_real_escape_string($con,trim($_POST['chest'])) : "";

$stomach = isset($_POST['stomach']) && !empty($_POST['stomach']) ? mysqli_real_escape_string($con,trim($_POST['stomach'])) : "";

$breast_point = isset($_POST['breast_point']) && !empty($_POST['breast_point']) ? mysqli_real_escape_string($con,trim($_POST['breast_point'])) : "";

$waist_point = isset($_POST['waist_point']) && !empty($_POST['waist_point']) ? mysqli_real_escape_string($con,trim($_POST['waist_point'])) : "";

$pants_length = isset($_POST['pants_length']) && !empty($_POST['pants_length']) ? mysqli_real_escape_string($con,trim($_POST['pants_length'])) : "";

$skirt_length = isset($_POST['skirt_length']) && !empty($_POST['skirt_length']) ? mysqli_real_escape_string($con,trim($_POST['skirt_length'])) : "";

$hips = isset($_POST['hips']) && !empty($_POST['hips']) ? mysqli_real_escape_string($con,trim($_POST['hips'])) : "";

$waist = isset($_POST['waist']) && !empty($_POST['waist']) ? mysqli_real_escape_string($con,trim($_POST['waist'])) : "";

$crotch = isset($_POST['crotch']) && !empty($_POST['crotch']) ? mysqli_real_escape_string($con,trim($_POST['crotch'])) : "";

$thigh = isset($_POST['thigh']) && !empty($_POST['thigh']) ? mysqli_real_escape_string($con,trim($_POST['thigh'])) : "";

$biceps = isset($_POST['thigh']) && !empty($_POST['thigh']) ? mysqli_real_escape_string($con,trim($_POST['thigh'])) : "";

$pants_position = isset($_POST['pants_position']) && !empty($_POST['pants_position']) ? mysqli_real_escape_string($con,trim($_POST['pants_position'])) : "";

$skirt_position = isset($_POST['skirt_position']) && !empty($_POST['skirt_position']) ? mysqli_real_escape_string($con,trim($_POST['skirt_position'])) : "";

$gender = isset($_POST['gender']) && !empty($_POST['gender']) ? mysqli_real_escape_string($con,trim($_POST['gender'])) : "";





if(isset($_POST['height']) && !empty($_POST["height"]) && isset($_POST['weight']) && !empty($_POST["weight"]) && isset($_POST['switch_opt']) && $_POST['switch_opt'] =='meteric') {



  $height = $_POST['height'] .'cm';

  $weight = $_POST['weight'] .' kg';

}



else if(isset($_POST['feet']) && !empty($_POST["feet"]) && isset($_POST['height_in']) && !empty($_POST["height_in"]) && isset($_POST['weight'] ) && !empty($_POST["weight"]) && isset($_POST['switch_opt']) && $_POST['switch_opt'] =='imperial') {

  $height = $_POST['feet'] .' feet '.  $_POST['height_in']  .' inches';

  $weight = $_POST['weight'] .' lb';

}

else {

  $height='';

}



if(!empty($_POST['action']) && $_POST['action'] == 'update') {

  $mp_id = $_POST['measurement_id'];

  $sql=mysqli_query($con,"update measurement_profile_master set last_updated='".$date."', mp_name='".$title."',mp_height='".$height."',mp_weight='".$weight."',mp_chest='".$param_chest."',mp_abdomen='".$param_abdomen."',mp_buttocks='".$param_buttocks."',mp_hips='".$param_hip."',coat_length='".$coat_length."',torso_length='".$body_length."',dress_length='".$dress_length."',sleeve_length='".$sleeves_length."',shoulder_width='".$shoulders."',neck='".$neck."',chest_around='".$chest."',stomach='".$stomach."',breast_point='".$breast_point."',waist_point='".$waist_point."',pant_length='".$pants_length."',skirt_length='".$skirt_length."',hips='".$hips."',waist='".$waist."',rise='".$crotch."',thigh='".$thigh."',bicep_around='".$biceps."',pant_waist='".$pants_position."',skirt_position='".$skirt_position."',gender='".$gender."',last_updated=NOW() where mp_id = '".$mp_id."' and mp_userid='".$_SESSION['user_id']."'");

  if(isset($_POST['order_id']) && !empty($_POST['order_id'])) {

    $order_id = $_POST['order_id'];

    $sql = mysqli_query($con,'update order_master set mpid="'.$_POST["measurement_id"].'" where om_id="'.$order_id.'"');

  }

}

else {

  $sql=mysqli_query($con,"insert into measurement_profile_master(mp_userid,mp_name,mp_height,mp_weight,mp_chest,mp_abdomen,mp_buttocks,mp_hips,coat_length,torso_length,dress_length,sleeve_length,shoulder_width,neck,chest_around,stomach,breast_point,waist_point,pant_length,skirt_length,hips,waist,rise,thigh,bicep_around,pant_waist,skirt_position,gender,created_date) values('".$_SESSION['user_id']."','".$title."','".$height."','".$weight."','".$param_chest."','".$param_abdomen."','".$param_buttocks."','".$param_hip."','".$coat_length."','".$body_length."','".$dress_length."','".$sleeves_length."','".$shoulders."','".$neck."','".$chest."','".$stomach."','".$breast_point."','".$waist_point."','".$pants_length."','".$skirt_length."','".$hips."','".$waist."','".$crotch."','".$thigh."','".$biceps."','".$pants_position."','".$skirt_position."','".$gender."','".$date."')");

  

}





if($sql) 

	echo "Success@@@@@";

 else

  echo 'Error';



}











elseif($type=="measurements")

{

	$id=$_POST['measurement_id'];

	$action=$_POST['action'];

	$field_value=$_POST['field']['value'];

	$field_name=$_POST['field']['name'];

	$gender=$_POST['gender'];

	$title = isset($_POST['title']) && !empty($_POST['title']) ? mysqli_real_escape_string($con,trim($_POST['title'])) : "";

	$param_chest = isset($_POST['param_chest']) && !empty($_POST['param_chest'])  ? mysqli_real_escape_string($con,trim($_POST['param_chest'])) : "";

	$param_abdomen = isset($_POST['param_abdomen']) && !empty($_POST['param_abdomen']) ? mysqli_real_escape_string($con,trim($_POST['param_abdomen'])) : "";

	$param_buttocks = isset($_POST['param_buttocks']) && !empty($_POST['param_buttocks']) ? mysqli_real_escape_string($con,trim($_POST['param_buttocks'])) : "";

	$param_hip = isset($_POST['param_hip']) && !empty($_POST['param_hip']) ? mysqli_real_escape_string($con,trim($_POST['param_hip'])) : "";



	if(isset($_POST['height']) && !empty($_POST["height"]) && isset($_POST['weight']) && !empty($_POST["weight"]) && isset($_POST['switch_opt']) && $_POST['switch_opt'] =='meteric') {



  $height = $_POST['height'] .'cm';

  $weight = $_POST['weight'] .' kg';

}



else if(isset($_POST['feet']) && !empty($_POST["feet"]) && isset($_POST['height_in']) && !empty($_POST["height_in"]) && isset($_POST['weight'] ) && !empty($_POST["weight"]) && isset($_POST['switch_opt']) && $_POST['switch_opt'] =='imperial') {

  $height = $_POST['feet'] .' feet '.  $_POST['height_in']  .' inches';

  $weight = $_POST['weight'] .' lb';

}

else {

  $height='';

}



	if($action=="save")

	{

	

		$sql=mysqli_query($con,"insert into measurement_profile_master(mp_userid,mp_name,mp_height,mp_weight,

			mp_chest,mp_abdomen,mp_buttocks,mp_hips,gender,created_date)

		 values('".$_SESSION['user_id']."','".$title."','".$height."','".$weight."','".$param_chest."',

		 	'".$param_abdomen."','".$param_buttocks."','".$param_hip."','".$gender."','".$date."')");

		 $mpid=mysqli_insert_id($con);

			

			for($i=0;$i<count($field_value);$i++)

			{

				if($field_value[$i]!='')

				{

					$a=$field_name[$i];

					$b=$field_value[$i];

				}

				else

				{

					$a=$field_name[$i];

					$b='0';

					

				}

				$sql1=mysqli_query($con,"insert into measurement_profile_value(userid,mpid,mpfid,mpf_value)

						values('".$_SESSION['user_id']."','".$mpid."','".$a."','".$b."')");

			}

			echo "Success@@@@@";

	}

	else

	{



		$sql=mysqli_query($con,"update measurement_profile_master set gender='".$gender."',mp_name='".$title."',mp_height='".$height."',

			mp_weight='".$weight."',mp_chest='".$param_chest."',mp_abdomen='".$param_abdomen."',

			mp_buttocks='".$param_buttocks."',mp_hips='".$param_hip."',last_updated=NOW()	

			 where mp_id=$id");



			for($i=0;$i<count($field_value);$i++)

			{

				//if($field_value[$i]!='')

				//

					$a=$field_name[$i];

					$b=$field_value[$i];

					$sql1=mysqli_query($con,"update measurement_profile_value set mpf_value='".$b."' where mpfid=$a");

				//}

			}

			echo "Success@@@@@";

	}

}





elseif ($type=="del_measurement")

{

	$id=$_POST['id'];

	$sql=mysqli_query($con,"update measurement_profile_master set status=1 where mp_id=$id");



	//$sql1 = mysqli_query($con,"update order_master set mpid='0' where userid='".$_SESSION['user_id']."'");

	

	if($sql)

		echo "Success@@@@@";

	else

		echo "Error in Deletion";

}



elseif ($type=="select_measurement")

{

	

	$id=$_POST['id'];

	$profile_id = $_POST['profile_id'];



	$sql=mysqli_query($con,'update order_master set mpid = "'.$profile_id.'" where om_id = "'.$id.'"');

	if($sql)

		echo "Success@@@@@";

	else

		echo "Error";

}





elseif ($type=="apply_promo") 

{

	$oid=$_POST['oid'];

	$oamt=$_POST['amt'];

	$sdate=date("Y-m-d H:i:s");

	$user=isset($_POST['user']) ? $_POST['user'] : 0;

	if($oamt!="0")

	{

		if($user=="" || !isset($_POST['user']))

		{

			if(isset($_SESSION['user_id']))

				$where=" userid='".$_SESSION['user_id']."'";

			else

				$where=" sess_id='".$_SESSION['guest_id']."'";

		}

		else	

			$where=" userid='".$user."'";	



		$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $user;



		$val=mysqli_real_escape_string($con,trim($_POST['val']));

		$oid=$_POST['oid'];$oamt=$_POST['amt'];

		$exists=mysqli_query($con,"select * from coupon_applied where $where and code='".$val."'");

		if(!mysqli_num_rows($exists))

		{

			$query=mysqli_query($con,"select * from coupon_applied where $where and orderid='$oid'");

			if(!mysqli_num_rows($query))

			{

				$sql=mysqli_query($con,"select * from coupon_applied where $where and code='".$val."' and orderid='$oid'");

				if(!mysqli_num_rows($sql))

				{

					$sql1=mysqli_query($con,"select * from discounts where code_name='".$val."'");

					if(mysqli_num_rows($sql1))

					{

						$r1=mysqli_fetch_array($sql1);

						$sdate=date("Y-m-d H:i:s");

						if(strtotime($sdate) >= date('Y-m-d H:i:s',strtotime($r1['start_date'])) &&

							strtotime($sdate) <= strtotime($r1['end_date']) )

						{

							$over=$r1['over_amount'];

							$cid=$r1['id'];

							$dis_type=$r1['discount_type'];

							$orders_on=$r1['orders_on'];

							if($dis_type=="$")

							{

								$amt=$r1['discount_amount'];

								if($orders_on=="All")

								{

									$app=mysqli_query($con,"insert into coupon_applied(userid,sess_id,orderid,

										couponid,code,coupon_type,value)values('".$user_id."',

										'".$_SESSION['guest_id']."','$oid',$cid,'$val','$','$amt')");

									echo "<span style='color:green;'>Success!!! Coupon has been Applied.</span>@@@@@";

								}

								else if($orders_on=="Over")

								{

									if($oamt >= $over)

									{

										$app=mysqli_query($con,"insert into coupon_applied(userid,sess_id,orderid,

										couponid,code,coupon_type,value)values('".$user_id."',

										'".$_SESSION['guest_id']."','$oid',$cid,'$val','$','$amt')");

										echo "<span style='color:green;'>Success!!! Coupon has been Applied.</span>@@@@@";

									}

									else

									{

									  echo "<span style='color:red;'>Sorry!!! Order must be greater than $".$over.".</span>@@@@@";

									}

								}

								else if($orders_on=="Specific")

								{

									$product=explode(",",$r1['product_name']);

									$pid=[];

									$pro=mysqli_query($con,"select pid from order_master where order_id='$oid'");

									while ($r=mysqli_fetch_array($pro))

									{

										$pid[]=$r['pid'];

									}

									$a=array_intersect($pid, $product);

									if(count($a))

									{

										$app=mysqli_query($con,"insert into coupon_applied(userid,sess_id,orderid,

										couponid,code,coupon_type,value)values('".$user_id."',

										'".$_SESSION['guest_id']."','$oid',$cid,'$val','$','$amt')");

										echo "<span style='color:green;'>Success!!! Coupon has been Applied.</span>@@@@@";

									}

									else

									{

										echo "<span style='color:red;'>Sorry!!! This coupon is no applicable for the above 

											products.</span>@@@@@";

									}

								}

							}

							else if($dis_type=="Discount")

							{

								$amt=$r1['discount_percentage'];

								if($orders_on=="All")

								{

									$app=mysqli_query($con,"insert into coupon_applied(userid,sess_id,orderid,

										couponid,code,coupon_type,value)values('".$user_id."',

										'".$_SESSION['guest_id']."','$oid',$cid,'$val','Discount','$amt')");

									echo "<span style='color:green;'>Success!!! Coupon has been Applied.</span>@@@@@";

								}

								else if($orders_on=="Over")

								{

									if($oamt >= $over)

									{

										$app=mysqli_query($con,"insert into coupon_applied(userid,sess_id,orderid,

										couponid,code,coupon_type,value)values('".$user_id."',

										'".$_SESSION['guest_id']."','$oid',$cid,'$val','Discount','$amt')");

										echo "<span style='color:green;'>Success!!! Coupon has been Applied.</span>@@@@@";

									}

									else

									{

									  echo "<span style='color:red;'>Sorry!!! Order must be greater than $".$over.".</span>@@@@@";

									}

								}

								else if($orders_on=="Specific")

								{

									$product=explode(",",$r1['product_name']);

									$pid=[];

									$pro=mysqli_query($con,"select pid from order_master where order_id='$oid'");

									while ($r=mysqli_fetch_array($pro))

									{

										$pid[]=$r['pid'];

									}

									$a=array_intersect($pid, $product);

									if(count($a))

									{

										$app=mysqli_query($con,"insert into coupon_applied(userid,sess_id,orderid,

										couponid,code,coupon_type,value)values('".$user_id."',

										'".$_SESSION['guest_id']."','$oid',$cid,'$val','Discount','$amt')");

										echo "<span style='color:green;'>Success!!! Coupon has been Applied.</span>@@@@@";

									}

									else

									{

										echo "<span style='color:red;'>Sorry!!! This coupon is no applicable for the above 

										products.</span>@@@@@";

									}



								}

							}

							else if($dis_type=="Free Shipping")

							{



								$app=mysqli_query($con,"insert into coupon_applied(userid,sess_id,orderid,

								couponid,code,coupon_type,value)values('".$user_id."',

								'".$_SESSION['guest_id']."','$oid',$cid,'$val','Free Shipping','0')");

								echo "<span style='color:green;'>Success!!! Coupon has been Applied.</span>@@@@@";

							}

						}

						else

						{

							echo "<span style='color:red;'>Sorry!!! This coupon has been Expired.</span>@@@@@";		

						}

					}

					else

					{

						echo "<span style='color:red;'>Sorry!!! Invalid Coupon Code.</span>@@@@@";

					}

				}

				else

				{

					echo "<span style='color:red;'>Sorry!!! You already activated this coupon.</span>@@@@@";

				}

			}

			else

			{

				echo "<span style='color:red;'>Sorry!!! Only one coupon allowed to apply.</span>@@@@@";

			}

		}

		else

		{

			echo "<span style='color:red;'>Sorry!!! You already availed this coupon.</span>@@@@@";

		}

	}

	else

	{

		echo "<span style='color:red;'>Sorry!!! Your subtotal is zero.</span>@@@@@";

	}

}









?>



<script type="text/javascript">

	$("button.close2").one('click',function(){

		r_tbl=$(this).attr("data-table");

		r_field=$(this).attr("data-field");

		id=$(this).attr("data-id");
		orderid=$(this).attr("data-order");

  		rw_count = $(".cart-div .shop-summary-item").length;

		$.ajax({

			type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

			data:{id:id,type:"del_cart",table:r_tbl,field:r_field,r_count:rw_count,order_id:orderid},

			success:function(data)

			{

			   if(r_tbl=='order_master')

				{

					var item_ind_tot = $(".price_"+id).text().replace ( /[^\d.]/g, '' );

					var item_qty = $(".quantity_"+id).text().replace ( /[^\d.]/g, '' );

				}

				else

				{

					var item_ind_tot = $(".gift_price_"+id).text().replace ( /[^\d.]/g, '' );

					var item_qty = $(".gift_quantity_"+id).text().replace ( /[^\d.]/g, '' );

				}



				var item_sub_tot = $(".item-price1").text().replace ( /[^\d.]/g, '' );

				var item_ind_tot = (item_qty * item_ind_tot);

				var item_cnt = $(".item-count").text();

				if(item_cnt > 0)

                	var item_tot = parseFloat(item_sub_tot)-parseFloat(item_ind_tot);

                else

                	var item_tot = 0;



				$(".item-price").text(item_tot.toFixed(2));





				if(r_tbl=='order_master')

					$(".shop-summary-item.cart_"+id).remove();

				else

					$(".shop-summary-item.gift_cart_"+id).remove();



				$(".item-count").text(item_cnt-1);

				if(item_cnt == '1')

				  $(".checkout_buttons").html("No Items Found.");



                if(r_tbl=='order_master')

                  var price = $(".price1_"+id).text().replace ( /[^\d.]/g, '' );

				else

				  var price = $(".gift_price1_"+id).text().replace ( /[^\d.]/g, '' );

				

				var sub_tot = $("table.price-calc tbody tr td.subtotal").text().replace ( /[^\d.]/g, '' );

				var len = $("table.price-calc tbody tr.gift_sec").length;

				var dis_amt = $("table.price-calc tbody tr td.coupon_sec").attr("coup_sec");

				var dis_type = $("table.price-calc tbody tr td.coupon_sec").attr("coup_type");

				var ord_tot = $("table.price-calc tbody tr td.ordertotal").text().replace ( /[^\d.]/g, '' );

				var tax = $("table.price-calc tbody tr td.tax").attr("tax");

				var ship_cost = $("table.price-calc tbody tr td.ship_cost").attr("ship_cost"); 				

				var org_tot = parseFloat(sub_tot) - parseFloat(price);

				var ord_tot = parseFloat(ord_tot) - parseFloat(price);

				if(tax!=undefined)

					var tax=tax;

				else

					var tax=0;



				if(len!=0)

				{

				    var gift_amt=0;

			         var table = $("table.price-calc");

			         table.find("tr.gift_sec").each(function (i) {

			            gift_amt += parseFloat($(this).find("td").attr("gift_sec"));

			          });



			         if(dis_amt!='' && dis_type!='Free Shipping') 

			         {

                         if(dis_type=="$")

                         {

                         	var dis_amt = parseFloat(dis_amt);

                         	var ord_fin_tot=parseFloat(org_tot)-parseFloat(gift_amt)-dis_amt;

                         } 

                         else if(dis_type=="Discount")

                         {

                         	var ord_fin_tot=parseFloat(org_tot)-parseFloat(gift_amt);

                         	var ord_fin_tot=parseFloat(ord_fin_tot) - parseFloat((ord_fin_tot/100)*dis_amt);

                         }

                         else

                         {

                         	var ord_fin_tot=parseFloat(org_tot)-parseFloat(gift_amt);

                         }



			         }

			         else

			         {

			         	var ord_fin_tot=parseFloat(org_tot)-parseFloat(gift_amt);

			         }



			         var org_tot1 = ord_fin_tot;

			         

			         $("table.price-calc tbody tr td.subtotal1").html("<strong>"+'$'+ord_fin_tot.toFixed(2)+"</strong>");



			         var ord_fin_tot= parseFloat(((ord_fin_tot/100)*tax))+parseFloat(ord_fin_tot)+ parseInt(ship_cost);



				}

				else if(dis_amt!='')

				{

					if(dis_type=="$")

					{

                        var dis_amt = parseFloat(dis_amt);

                        var ord_fin_tot=parseFloat(org_tot)-dis_amt;

                    } 

                    else if(dis_type=="Discount")

                    {

                        var ord_fin_tot=parseFloat(org_tot) - parseFloat((org_tot/100)*dis_amt);

                    }

                    else

                     {

                        var ord_fin_tot=parseFloat(org_tot);

                     }

                     var org_tot1 = ord_fin_tot;

			         

			         $("table.price-calc tbody tr td.subtotal1").html("<strong>"+'$'+ord_fin_tot.toFixed(2)+"</strong>");



			         var ord_fin_tot= parseFloat(((ord_fin_tot/100)*tax))+parseFloat(ord_fin_tot)+ parseInt(ship_cost);

				}



				else

				{

					var ord_fin_tot = parseFloat(((org_tot/100)*tax))+parseFloat(org_tot)+ parseInt(ship_cost);

					var org_tot1 = org_tot;

				}





				$("table.price-calc tbody tr td.subtotal").html("<strong>"+'$'+org_tot.toFixed(2)+"</strong>");

				$("table.price-calc tbody tr td.ordertotal").html("<strong>"+'$'+ord_fin_tot.toFixed(2)+"</strong>");

				$(".gift_apply").attr("data-amt",org_tot1.toFixed(2));

				$(".apply_promo").attr("data-amt",org_tot1.toFixed(2));



				$("table.price-calc tbody tr td.ordertotal").html("<strong>"+'$'+ord_fin_tot.toFixed(2)+"</strong>");

				if(r_tbl=='order_master')

				   $(".cart-summary table tbody tr.cart_"+id).remove();

			    else

			    	$(".cart-summary table tbody tr.gift_cart_"+id).remove();



				var sub_tot = $("table.price-calc tbody tr td.subtotal").text();

				if(sub_tot == '$0.00') 

				{

                    $(".emptycart").css('display','block');

                    $(".offer").fadeOut(100);

				    $(".subdiv").fadeOut(100);

				    $(".empty_cart").text("Empty Cart !!!");

				    $(".proceed_to_checkout").fadeOut(100);

				    $(".offer_dtl").fadeOut(100);

                }

			}

		});

	});

</script>



