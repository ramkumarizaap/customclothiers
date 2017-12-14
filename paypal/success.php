<?php 

session_start();

require('../includes/action/config.php');

require('../includes/action/functions.php');

$site=new Site();

$amt=$_REQUEST['amt'];

$oid=$_REQUEST['oid'];

$tx=$_REQUEST['tx'];

$st=$_REQUEST['st'];

$sid=$_REQUEST['sid'];

$id=$_SESSION['user_id'];

$_SESSION['order_id']=$oid;

$date=date("Y-m-d");$date1=date("Y-m-d H:i:s");




if($st=="Completed")

{



$uid=$_SESSION['user_id'];

$tax=$site->get_tax($uid);

  $a1=array();$a2=array();$b1=0;$b2=0;

  

$gift=mysqli_query($con,"select * from gift_card_master where userid=$uid and status=0 order by created_date desc");





$insert_order_info =mysqli_query($con,"insert into payment_master(orderid,trans_id,amount,payment_type,status,userid,date,created_date)

	values('".$oid."','".$tx."','".$amt."','Paypal','".$st."','".$id."','".$date."','".$date1."')");

   $py_id=mysqli_insert_id($con);



$update_order_id =mysqli_query($con,"update order_master set order_id='$oid' where userid=$uid and om_status=1");



$sql2=mysqli_query($con,"update order_master set om_status=0,ship_id=$sid where order_id='$oid'");



         $sql=mysqli_query($con,"select a.*,a.created_date as c_date,b.p_description from order_master a,product_master b where 

            a.order_id='$oid' and a.pid=b.p_id and a.om_status=0 order by a.created_date desc");





        $user_dtl_qry = mysqli_query($con,"select * from user_master where user_id='".$_SESSION['user_id']."'");

        $shipping_dtl_qry = mysqli_query($con,"select shipping_cost from payment_information");

        if(mysqli_num_rows($shipping_dtl_qry) > 0) {

        	$s_dtl = mysqli_fetch_array($shipping_dtl_qry);

        	if($_dtl!='' || $_dtl!='0') {

                $sp_cost = $s_dtl['shipping_cost'];

        	} 

        	else {

        		$sp_cost='Free';

        	}

        }



        



       if(mysqli_num_rows($user_dtl_qry) > 0) {

            $user_dtl = mysqli_fetch_array($user_dtl_qry);

        }

         if($sql || $gift) 

        {

            if(mysqli_num_rows($sql) > 0 || mysqli_num_rows($gift))

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $tot=$tot + ($r['om_price'] * $r['om_quantity']);

                    $res[0]['created_date']=$r['c_date'];

                    $res[0]['order_id']=$r['order_id'];

                    $i++;

                }

               

                

                $res[0]['price']=$tot;



                /* Order History Mail Template */

                $name = $user_dtl['username'];

                $email = $user_dtl['email'];

                $mobile = $user_dtl['mobile'];

                $date=date('Y-m-d H:i:s');



                $ship_dtl_qry = mysqli_query($con,"select * from shipping_address where userid=".$_SESSION['user_id']." and sa_id=".$sid."");



                if($ship_dtl_qry)

                {

                	$ship_dtl = mysqli_fetch_array($ship_dtl_qry);

                }

                $billing_dtl_qry = mysqli_query($con,"select * from user_master where 
        			user_id=".$_SESSION['user_id']."");

		        if($billing_dtl_qry)
		        {
		        	$billing_dtl = mysqli_fetch_array($billing_dtl_qry);
		        }

                $message .= '<div style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0; font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#000">    

                               <center>

                               <table width="100%" border="0" cellspacing="0" cellpadding="0">

  							     <tr>

								    <td align="center" style="background-color:#ffffff;"><table width="580" cellspacing="0" cellpadding="0" border="0" align="center" style="padding:24px;background-color:#ffffff; font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#000">      

								      <tr>

								        <td width="580">&nbsp;</td>

								      </tr>

								      <tr>

								        <td align="center"><p style="color:#000; font-size:16px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-weight:bold;">

								           <strong>CUSTOM CLOTHIERS ORDER INFORMATION</strong></p></td>

								      </tr>

								      <tr>

								        <td>&nbsp;</td>

								      </tr>

								      <tr>

									     <td align="left" style="background-color:#737373;">

									     <table width="100%" border="0" cellspacing="0" cellpadding="0">

									  <tr>

									    <td width="100%">

									    <p style="color:#fff; margin-top:5px; margin-bottom:0px; padding-left:15px; font-size:13px; line-height:25px">Order Number: #'.$oid.'</p>

									    <p style="color:#fff; margin-top:5px; margin-bottom:0px; padding-left:15px; font-size:13px; line-height:25px">Ordered Date: '.date('M d, Y').'</p>

									    </td>

									  </tr>

									  </table>

									 </td>

									 </tr>

								      <tr>

								        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

								          <tr>

								            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Sold To</strong></td>

								            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-bottom:0;"><strong>Ship To</strong></td>

								            </tr>

								          <tr>

								            <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; border-right:0; font-size:13px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">&nbsp;</td>

								                </tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">'.$billing_dtl['firstname'].' '.$billing_dtl['lastname'].'</strong></td>

								              </tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$billing_dtl["address1"].'</td>

								              </tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$billing_dtl["city"].', '.$billing_dtl["province"].'</td>

								              </tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$billing_dtl["country"].', '.$billing_dtl["zipcode"].'</td>

								              </tr>

								              <tr></tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>

								                </tr>

								              </table></td>

								            <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; font-size:13px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">&nbsp;</td>

								                </tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">'.$ship_dtl['sa_firstname'].' '.$ship_dtl['sa_lastname'].'</strong></td>

								              </tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$ship_dtl["sa_address1"].'</td>

								              </tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$ship_dtl["sa_city"].', '.$ship_dtl["sa_province"].'</td>

								              </tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$ship_dtl["sa_country"].', '.$ship_dtl["sa_zipcode"].'</td>

								              </tr>

								              <tr></tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>

								                </tr>

								              </table></td>

								          </tr>

								          </table></td>

								      </tr>

								      <tr>

								        <td>&nbsp;</td>

								      </tr>

								      <tr>

								        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

								          <tr>

								            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Shipping Method</strong></td>

								            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-bottom:0;"><strong>Payment Method</strong></td>

								            </tr>

								          <tr>

								            <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; border-right:0; font-size:13px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">

								              <tr>

								               

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">Shipping Fee - '.$sp_cost.'</td>

								                </tr>

								              

								              </table></td>

								            <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; font-size:13px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">

								              

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">Paypal</td>

								              </tr>

								              <tr></tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>

								              </tr>

								              <tr>

								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>

								                </tr>

								              </table></td>

								          </tr>

								          </table></td>

								      </tr>

								      

								      <tr>

								        <td valign="top">

								        	

								        </td>

								      </tr>

								      <tr>

								      <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="margin-left:auto; margin-right:auto;">

								        <tr>

								          <td height="10" colspan="6">&nbsp;</td>

								        </tr>

								        <tr>

								         <td colspan="6" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-bottom:0;"><strong>Items Ordered</strong></td>

								        </tr>

								        <tr>

								          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Product Name</strong></td>			          		



								          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Price</strong></td>

								          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Qty</strong></td>

								          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Total</strong></td>

								        </tr>';

                       $r = mysqli_fetch_array($sql);

                       foreach( $sql as $key=>$value ) { $tot1=''; $tot1= ($value['om_quantity'] * $value['om_price']);

$product_name_qry = mysqli_query($con,'select p_name from product_master where p_id = '.$value['pid'].'');

                       	if($product_name_qry) {

                       	  $product_dtl = mysqli_fetch_array($product_name_qry);

                       	  

                       	  //$p_name = $product_dtl['p_name'];

}                           if($value['om_style']!='') {

	                       	    $p_name = "Custom ". $product_dtl['p_name'];

	                       	  }

	                       	  else {

                                $p_name = $product_dtl['p_name'];

	                       	  }

	                       	  $created_date = $value['created_date'];

					   $message .=  '<tr>

							   <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">'.$p_name.'</td>

						           						       



						           <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">$'.$value['om_price'].'</td>

							  <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">'.$value['om_quantity'].'</td>

							  <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd;  border-top:0;">$'.$tot1.'</td>

						</tr>';



						}





						 while($gr=mysqli_fetch_array($gift)){

						        	$a1[$b1]=$gr['amount'] * $gr['quantity'];

						       $message.=' <tr>

						        	 <td style="padding:5px 10px; border:1px solid #dddddd;border-right:0;">Gift Card</td>

						        	<td style="padding:5px 10px; border:1px solid #dddddd;

						        	border-right:0;">$'.$gr['amount'].'</td>

						        	<td style="padding:5px 10px; border:1px solid #dddddd;

						        	border-right:0;">'.$gr['quantity'].'</td>

						        	<td style="padding:5px 10px; border:1px solid #dddddd;">

						        	$'.$gr['amount'] * $gr['quantity'].'</td>

						        </tr>';$b1++;

						   }

			       





			             	$message .=	'<tr>

										  <td colspan="5" bgcolor="#FFFFFF" style="background-color:#ffffff; border:1px solid #dddddd; border-top:0;">

										    <table width="100%" border="0" cellspacing="0" cellpadding="0">

										      <tr>

										        <td align="right" style="padding:5px 10px; background-color:#efefef;">Sub Total</td>

										        <td align="right" style="padding:5px 10px; background-color:#efefef;">$'.number_format($tot + array_sum($a1),2).'</td>

										        </tr>

										        <tr>

													<td align="right" style="padding:5px 10px; background-color:#efefef;">Tax</td>

													<td align="right" style="padding:5px 10px; background-color:#efefef;">(+) '.$tax.'%</td>

												</tr>

										      <tr>

										        <td align="right" style="padding:5px 10px; background-color:#efefef;">Shipping</td>

										        <td align="right" style="padding:5px 10px; background-color:#efefef;">$ '.number_format($sp_cost,2).'</td>

										        </tr>

										      <tr>';



										     $app=mysqli_query($con,"select * from gift_card_applied

										     	where userid=$uid and status=0");

										     if(mysqli_num_rows($app))

										     {

										     	$message.='<tr>

										     	 <td align="right" style="padding:5px 10px; background-color:#efefef;"><strong>Gift Voucher</strong></td>

										     	 <td style="padding:5px 10px; background-color:#efefef;"></td>

										     	</tr>';

										     	$ar=mysqli_fetch_array($app);
										     	/*while($ar=mysqli_fetch_array($app))

										     	{*/

										     		$a2[$b2]=$ar['amount'];

										       		$message.=

										       		'<tr>

										        		<td align="right" style="padding:5px 10px; background-color:#efefef;font-size:12px;">'.$ar['code'].'</td>

									        			<td align="right" style="padding:5px 10px; background-color:#efefef;font-size:12px;">$'.number_format($ar['amount'],2).'</td>

										        	</tr>';$b2++;

										  		//}

											 }

											 $dis = "0";

											  $coupon=mysqli_query($con,"select * from coupon_applied where userid=$uid and status=0");

											  if(mysqli_num_rows($coupon))

											  {

											  	$cr=mysqli_fetch_array($coupon);

											  	 if($cr['coupon_type']=="$")

										        {

										            $dis=$cr['value'];

										        }

										        if($cr['coupon_type']=="Discount")

										        {

										          $dis= ((($tot + array_sum($a1))- array_sum($a2)) / 100) * $cr['value'];

										        }

										        if($cr['coupon_type']=="Free Shipping")

										        {

										          $dis="0";

										          $sp_cost=0;

										        }

											  	$message.=

											  	'<tr>

											  		<td align="right" style="padding:5px 10px; background-color:#efefef;">

											  			<strong>Coupon

											  				<small>( '.$cr['code'].' )</small>

											  			</strong>

											  		</td>

										     		<td align="right" style="padding:5px 10px; background-color:#efefef;">';

										     			if($cr['coupon_type']=="$")

								     	 					$message .= "$".number_format($cr['value'],2);

								     	 				else if($cr['coupon_type']=="Discount")

								     	 					$message .= number_format($cr['value'],2)."%";

								     	 				else if($cr['coupon_type']=="Free Shipping")

								     	 					$message .= "Free Shipping";

										     			$message .='

										     		</td>

											  	 </tr>';

											  }



												$tp=(((($tot + array_sum($a1)) - array_sum($a2)) - $dis) / 100) * $tax;

												$full_t=number_format((($tot + $tp + $sp_cost + array_sum($a1)) - array_sum($a2)) - $dis,2);

												$t_amt=number_format((($tot + $tp + $sp_cost + array_sum($a1)) - array_sum($a2)) - $dis,2);

										        $message.='<td width="78%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>Grand Total</strong></td>

										        <td width="22%" align="right" style="padding:5px 10px; background-color:#efefef;">

										        	<strong>$'.number_format((($tot + $tp + $sp_cost + array_sum($a1)) - array_sum($a2)) - $dis,2).'

										        	</strong>

										       </td>

										        </tr>

										      </table>

										    </td>

										  </tr>

										<tr>

										  <td height="10" colspan="6">&nbsp;</td>

										  </tr>

								        <tr>

								          <td colspan="6" style="border-bottom:1px solid #ddd;">&nbsp;</td>

								        </tr>

								        <tr>

								          <td colspan="6" align="center">&nbsp;</td>

								        </tr>

								        <tr>

								          <td colspan="6" align="center"><p style="font-size:13px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d; font-weight:bold; margin-top:0; margin-bottom:0; padding-left:5px;"> <strong>IF YOU NEED FURTHER ASSISTANCE, PLEASE CONTACT US AT CUSTOM CLOTHIERS</strong> <br /><br />

								            <strong style="color:#000000; font-size:20px">THANK YOU FOR YOUR BUSINESS!</strong></p>

								            <p style="font-size:14px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d;"> Order Status: You can check your order status and and also review your order history here <a href="www.dccustomclothiers.com" style="color:#000000;">dccustomclothiers.com</a></p>

								            <p style="font-size:12px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d; font-weight:bold; margin-top:0; margin-bottom:0; padding-left:5px;">&nbsp;</p></td>

								        </tr>

								      </table></td>      

								      </tr>     </table></td>

								  </tr>

								</table>

								     </center>   </div>';



					$up_py=mysqli_query($con,"update payment_master set amount='".filter_var($full_t,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where 

						pm_id=$py_id");

					

$his=mysqli_query($con,"insert into order_history_master(userid,orderid,pay_type,tot_amount,shipping_cost,oh_date,created_date,tax)values('$uid','$oid','Paypal','".filter_var($full_t,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."','$sp_cost',NOW(),NOW(),$tax)");



                    $subject="Custom Clothiers Order History Information";

                    $headers = "From: Custom Clothiers <support@dccustomclothiers.com> \r\n";

                    $headers .= "MIME-Version: 1.0\r\n";

                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                    mail($email,$subject,$message,$headers);

                

               // return $res;



               /*Start Gift Card*/

                 $gift_update=mysqli_query($con,"update gift_card_master set status=1,orderid='$oid' where userid=$uid and status=0");

                 $gift_app_update=mysqli_query($con,"update gift_card_applied set status=1,orderid='$oid' where userid=$uid and status=0");

                 $coupon_app_update=mysqli_query($con,"update coupon_applied set status=1,orderid='$oid' where userid=$uid and status=0");



                $g_message="";

                $get_gift=mysqli_query($con,"select * from gift_card_master where orderid='$oid' and status=1 order by created_date desc");          

                $gcount=mysqli_num_rows($get_gift);

                if(mysqli_num_rows($get_gift))

                {

                	$u11=mysqli_query($con,"select email,firstname,lastname,province,country,city from user_master where user_id=$uid");

					$u1=mysqli_fetch_array($u11);

					$province=$u1['province'];$country=$u1['country'];$city=$u1['city'];

					$fname=$u1['firstname'];

					$lname=$u1['lastname'];					

					$amount=$g11['amount'];$i=1;

		          	while($g11=mysqli_fetch_array($get_gift))

		            	{

		                		$g_message.= '

		                		<div style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0; font-

		                			size:12px;font-family:Arial,Helvetica,sans-serif;color:#000">    

					              	<center>

					               		<table width="100%" border="0" cellspacing="0" cellpadding="0">

									     				<tr>

									    					<td align="center" style="background-color:#ffffff;">

							    								<table width="580" cellspacing="0" cellpadding="0" border="0" align="center" style="padding:24px;background-color:#ffffff; font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#000">      

															      <tr>

															        <td width="580">&nbsp;</td>

															      </tr>

															      <tr>

															        <td align="center"><p style="color:#000; font-size:16px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-weight:bold;">

															           <strong>CUSTOM CLOTHIERS  GIFT CARD INFORMATION</strong></p></td>

															      </tr>

															      <tr>

															        <td>&nbsp;</td>

															      </tr>

															      <tr>

															        <td>

															        	<table width="100%" border="0" cellspacing="0" cellpadding="0">

															          	<tr>

															            	<td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Gift From</strong></td>

															            	<td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-bottom:0;"><strong>Gift Card Information</strong></td>

															            </tr>

															          	<tr>

															            	<td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; border-right:0; font-size:13px;">

															            		<table width="100%" border="0" cellspacing="0" cellpadding="0">

															              		<tr>

															                		<td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">&nbsp;

															                		</td>

															                	</tr>

																	              <tr>

																	                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">'.$fname.' '.$lname.'</strong></td>

																	              </tr>

																	              <tr>

																	                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;"><p>'.$province.'</p></td>

																	              </tr>

																								<tr>

																					        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;"><p>'.$country.'</p></td>

																					      </tr>

								              									<tr></tr>

																	              <tr>

																	                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>

																	                </tr>

								              								</table>

								              							</td>

									            							<td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; font-size:13px;">

									            								<table width="100%" border="0" cellspacing="0" cellpadding="0">

																	              <tr>

																	                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">&nbsp;</td>

																	                </tr>

																	              <tr>

																	                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">Code : '.$g11['gift_code'].'</td>

																	              </tr>

																	              <tr></tr>

																	              <tr>

																	                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>

																	              </tr>

																	              <tr>

																	                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">Amount : $'.number_format($g11['amount'],2).'</td>

																	              </tr>

									              							</table>

									              						</td>

									          							</tr>

									         	 						</table>

									         	 					</td>

									      						</tr>

															      <tr>

															        <td>&nbsp;</td>

															      </tr>

															      <tr>							        

									        						<td valign="top"></td>

									      						</tr>

															      <tr>

																      <td valign="top">

																      	<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="margin-left:auto; margin-right:auto;">

																        	<tr>

																          	<td height="10" colspan="6">&nbsp;</td>

																        	</tr>

																        	<tr>

																         		<td colspan="6" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-bottom:0;"><strong>Items Ordered</strong></td>

																        	</tr>

																	        <tr>

											        						  <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Product Name</strong></td>							          

																	          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Price</strong></td>

																	          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Qty</strong></td>

																	          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Total</strong></td>

																	        </tr>

																	        <tr>

																	          <td style="padding:5px 10px; border:1px solid #dddddd;font-size:12px;border-right:0;">Gift Card</td>

																	        	<td style="padding:5px 10px; border:1px solid #dddddd;font-size:12px;

																	        	border-right:0;">$'.number_format($g11['amount'],2).'</td>

																	        	<td style="padding:5px 10px; border:1px solid #dddddd;font-size:12px;

																	        	border-right:0;">'.$quantity.'</td>

																	        	<td style="padding:5px 10px; border:1px solid #dddddd;font-size:12px;">$'.number_format($g11['amount'] * $g11['quantity'],2).'</td>

																	        </tr>

										        							<tr>

												  									<td colspan="5" bgcolor="#FFFFFF" style="background-color:#ffffff; border:1px solid #dddddd; border-top:0;">

																					    <table width="100%" border="0" cellspacing="0" cellpadding="0">

																					      <tr>

																					        <td align="right" style="padding:5px 10px; background-color:#efefef;">Sub Total</td>

																					        <td align="right" style="padding:5px 10px; background-color:#efefef;">$'.number_format($g11['amount'],2).'</td>

																					        </tr>

																					      <tr>

																					        <td width="78%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>Grand Total</strong></td>

																					        <td width="22%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>$'.number_format($g11['amount'] * $g11['quantity'],2).'</strong></td>

																					        </tr>

																					      </table>

																				    </td>

																				  </tr>

																				</table>

																			<td>

																	  </tr>

																	</table>

																</td>

															</tr>

														</table>

													</center>

												<div>';

											if($gcount == $i)

											{

								        if($g11['gift_type']=="someone")

								        {

								        	$g_email=$g11['recipient_mail'];

								        	if($g_email!='')

								        	{

									        	$subject="Custom Clothiers Gift Card";

							                	$headers = "From: Custom Clothiers <support@dccustomclothiers .com> \r\n";

							                	$headers .= "MIME-Version: 1.0\r\n";

							                	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

							                 	mail($email,$subject,$g_message,$headers);

							            }

								        }

								        else if($g11['gift_type']=="myself")

								        {

								        	$g_email=$u1['email'];

								        	if($g_email!='')

								        	{

									        	$subject="Custom Clothiers Gift Card";

							                	$headers = "From: Custom Clothiers <support@ccustomclothiers.com> \r\n";

							                	$headers .= "MIME-Version: 1.0\r\n";

							                	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

							                 	mail($email,$subject,$g_message,$headers);

							            }

								        }

								      }

							        $i++;

		                }

          		}             



               /*End Gift Card*/





                /* Sales Track Update*/



                $date=date('Y-m-d');

                $date1=date('Y-m-d H:i:s');

		         $sql11=mysqli_query($con,"select b.catid from order_master a ,sub_category_master b where a.order_id='$oid' and a.subcatid=b.sub_cat_id");

		        while($r11=mysqli_fetch_array($sql11))

		        {

		            if($r11['catid']==1){$col="t_dress";}elseif($r11['catid']==2){$col="t_tops";}

		            elseif($r11['catid']==3){$col="t_bottoms";}elseif($r11['catid']==4){$col="t_suits";}

		            elseif($r11['catid']==5){$col="t_outerwear";}

		            $sql12=mysqli_query($con,"select $col as count_id from track_master where t_date='".$date."'");

		            if(mysqli_num_rows($sql12) > 0)

		            {

		                $r12=mysqli_fetch_array($sql12);

		                $val=$r12['count_id'] + 1;

		                $sql22=mysqli_query($con,"update track_master set $col='".$val."',last_updated='".$date1."' where t_date='".$date."'");

		            }

		            else

		            {

		                $sql22=mysqli_query($con,"insert into track_master ($col,t_date,created_date)values(1,'".$date."','".$date1."')");

		            }

		        }

}

}

	 

	 header("Location:{$homeurl}order-received/success/");

                    

}

elseif($st!="Completed")

{

	// $sql=mysqli_query($con,"update order_master set om_status=0,ship_id=$sid where $order_id=$oid");
         $_SESSION['payment_status'] = "failed";
	 header("Location:{$homeurl}/checkout/".$oid."/");

}



?>