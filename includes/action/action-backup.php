<?php

require('config.php');

session_start();


require('functions.php');
require('imageManipulator.php');
$site=new site();

if(isset($_POST['register_user']))

{

	$firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));

	$lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));

	$email=mysqli_real_escape_string($con,trim($_POST['email']));

	$password=mysqli_real_escape_string($con,trim($_POST['password']));
	$mobile=mysqli_real_escape_string($con,trim($_POST['mobile']));

	$cpassword=mysqli_real_escape_string($con,trim($_POST['cpassword']));

	$date=date('Y-m-d H:i:s');

	$hash=md5(uniqid(rand(), true));

	$sql=$site->select_query("select email from user_master where email='".$email."'");

	if($sql!=0)

	{

		$_SESSION['user_exists']="<span style='color:red'>This Email-ID Already Exists</span>";		

	}

	else

	{
		$j_date=date("Y-m-d");
		$sql=mysqli_query($con,"insert into member (first_name,last_name,email,join_date)
			values('".$firstname."','".$lastname."','".$email."','".$j_date."')");
		$m_id=mysqli_insert_id($con);
		$sql2=mysqli_query($con,"insert into member_group(member_id,group_id)values('".$m_id."','4')");

		$query=$site->insert_query("insert into user_master(firstname,lastname,email,mobile,password,user_type,hash_token,
                  block,created_date)values('$firstname','$lastname','$email','$mobile','$password',2,'".$hash."',1,'".$date."')");

		$_SESSION['user_exists']="<span style='color:green'>Registration Success!!! Confirmation has been sent to your mail.</span>";

		$message="Thanks for registering.<br>Please <a href='".$homeurl."includes/action/action.php?activate=".$hash."'>click here</a> to activate your account.";



		$subject="Registration Success";

		$headers = "From: Ot KooToor <info@otkootoor.com> \r\n";

		$headers .= "MIME-Version: 1.0\r\n";

		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		mail($email,$subject,$message,$headers);

	}

	

	header("Location:{$homeurl}signup/");

}



if(isset($_POST['forgot_password']))
{
	$email=$_POST['email'];
	$sql=mysqli_query($con,"select password from user_master where email='".$email."'");
	$r=mysqli_fetch_array($sql);
	if(mysqli_num_rows($sql) <= 0)
	{
		$_SESSION['pass_fail']="Email Id Doesn't Exists!!!";
		header("Location:{$homeurl}forgot-password/");
	}
	else
	{
	 $message="Your Account Password is ".$r['password'];
	

		$subject="Forgot Password";

		$headers = "From: Ot KooToor <info@otkootoor.com> \r\n";

		$headers .= "MIME-Version: 1.0\r\n";

		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		mail($email,$subject,$message,$headers);
		$_SESSION['pass_succ']="Password has been sent your registered Email.";
		header("Location:{$homeurl}forgot-password/");
	}
}


if(isset($_POST['newsletter']))
{
	$name=mysqli_real_escape_string($con,trim($_POST['name']));
	$email=mysqli_real_escape_string($con,trim($_POST['email']));

	 $message="Hi $name, thanks for subscribing a newsletter with us.";

	 $subject="Newsletter Subscription";

		$headers = "From: Ot KooToor <info@otkootoor.com> \r\n";

		$headers .= "MIME-Version: 1.0\r\n";

		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		
	if(mail($email,$subject,$message,$headers))
	{
		echo "success";
	}
	else
	{
		echo "fail";
	}
}



if(isset($_GET['activate']))

{

	$tok=$_GET['activate'];

	$sql=mysqli_query($con,"update user_master set block=0 where hash_token='".$tok."'");

	$_SESSION['activate_succ']="Activation Success!!! Please Login below using your registered credentials.";

	header("Location:{$homeurl}login/");



}



if(isset($_POST['user_login']))

{
	

	$email=mysqli_real_escape_string($con,trim($_POST['email']));

	$password=mysqli_real_escape_string($con,trim($_POST['password']));

	$sql=$site->select_query("select * from user_master where email='".$email."' and password='".$password."'");

	if(isset($_POST['type'])=="checkout_login")

	{

		if($sql!=0)

		{

			$url=mysqli_real_escape_string($con,trim($_POST['return_url']));

				$_SESSION['user_id']=$sql['user_id'];

			if($sql['block']=="0")

			{

				$sql1=mysqli_query($con,"update order_master set userid='".$_SESSION['user_id']."',sess_id='' where 

					sess_id='".$_SESSION['guest_id']."'");

				//unset(session_id());

				unset($_SESSION['guest_id']);

				$_SESSION['login_succ']="login success";

				header("Location:{$url}");

			}

			else

			{

				$_SESSION['login_fail']="This account is not activated yet!!!";

					header("Location:{$url}");	

			}

		}

		else

		{

			$_SESSION['login_fail']="Invlaid username or Password";

			$url=mysqli_real_escape_string($con,trim($_POST['return_url']));

			header("Location:{$url}");

		}

	}

	else

	{

		if($sql!=0)

		{
		if($sql['block']=="0")

			{
			$_SESSION['user_id']=$sql['user_id'];

			$sql1=mysqli_query($con,"update order_master set userid='".$_SESSION['user_id']."',sess_id='' where 

					sess_id='".$_SESSION['guest_id']."'");

				//unset(session_id());

				unset($_SESSION['guest_id']);

			$_SESSION['login_succ']="login success";

			header("Location:{$homeurl}");
		}
		else
		{
			$_SESSION['login_fail']="<span style='color:red'>This account is not activated yet.!!!</span>";		

			header("Location:{$homeurl}login/");
		}

		}

		else

		{

			$_SESSION['login_fail']="<span style='color:red'>Invalid Username or Password</span>";		

			header("Location:{$homeurl}login/");

		}

	}

}


if(isset($_POST['review']))

{

        if(isset($_POST['score']))
	{
		$score=$_POST['score'];
	}
	else
	{
		$score=$_POST['score_rate'];
	}

	$name=mysqli_real_escape_string($con,trim($_POST['firstname']));

	$email=mysqli_real_escape_string($con,trim($_POST['email']));

	$product=mysqli_real_escape_string($con,trim($_POST['product']));

	$desc=mysqli_real_escape_string($con,trim($_POST['comments']));
	$title=mysqli_real_escape_string($con,trim($_POST['title']));
	$city=mysqli_real_escape_string($con,trim($_POST['city']));
	$state=mysqli_real_escape_string($con,trim($_POST['state']));

	$date=date('Y-m-d H:i:s');

	$sql=$site->insert_query("insert into reviews(pid,score,name,email,city,state,title,description,created_date)values($product,'$score','$name','$email','$city','$state','$title','$desc','".$date."')");

}




if(isset($_POST['account_info']))

{

	$name=mysqli_real_escape_string($con,trim($_POST['firstname']));

	$lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));

	$email=mysqli_real_escape_string($con,trim($_POST['email']));

	$password=mysqli_real_escape_string($con,trim($_POST['password']));
	$old_image1=mysqli_real_escape_string($con,trim($_POST['old_image1']));
	$old_image2=mysqli_real_escape_string($con,trim($_POST['old_image2']));
	$old_image3=mysqli_real_escape_string($con,trim($_POST['old_image3']));
	if($password!=''){$password=mysqli_real_escape_string($con,trim($_POST['password']));}

		else{$password=mysqli_real_escape_string($con,trim($_POST['old_password']));}



	$date=date('Y-m-d H:i:s');

$img_name=array();
 $img=count($_FILES['profile_img']['name']);
for ($i=0; $i < $img ; $i++)
 { 
if($_FILES['profile_img']['size'][$i]!=0)
{
	$tmp=$_FILES['profile_img']['tmp_name'][$i];
	if(!file_exists("../../uploads/user_photo/".$_SESSION['user_id']."/"))
	{
		mkdir("../../uploads/user_photo/".$_SESSION['user_id']."/",0777,true);
	}
	$img_name[$i]="uploads/user_photo/".$_SESSION['user_id']."/".$_FILES['profile_img']['name'][$i];
	$dir="../../uploads/user_photo/".$_SESSION['user_id']."/".$_FILES['profile_img']['name'][$i];
	move_uploaded_file($tmp, $dir);
}
}

if($img_name[0]!=''){$img1=$img_name[0];}else{$img1=$old_image1;}
if($img_name[1]!=''){$img2=$img_name[1];}else{$img2=$old_image2;}
if($img_name[2]!=''){$img3=$img_name[2];}else{$img3=$old_image3;}


	$sql=$site->update_query("update user_master set last_updated='".$date."',firstname='$name',
		lastname='$lastname',password='$password',img='".$img1."',img2='".$img2."',img3='".$img3."'
		where user_id='".$_SESSION['user_id']."'");
        $_SESSION['profile_succ']="Profile has been updated successfully";
	header("Location:{$homeurl}account-information/");



}



if (isset($_POST['update_billing_addr']))

{

	$country=mysqli_real_escape_string($con,trim($_POST['country']));

	$address1=mysqli_real_escape_string($con,trim($_POST['address1']));

	$address2=mysqli_real_escape_string($con,trim($_POST['address2']));

	$city=mysqli_real_escape_string($con,trim($_POST['city']));

	$state=mysqli_real_escape_string($con,trim($_POST['state']));

	$zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));

	$userid=$_SESSION['user_id'];

	$date=date('Y-m-d H:i:s');

	$sql=mysqli_query($con,"update user_master set address1='".$address1."',address2='".$address2."',

		city='".$city."',province='".$state."',country='".$country."',zipcode='".$zipcode."',

		last_updated='".$date."' where user_id='".$_SESSION['user_id']."'");

	$_SESSION['address_succ']="Billing Address Updated Successfully";

	header("Location:{$homeurl}address-book/");

}


if (isset($_POST['update_shipping_addr']))

{

	$firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));

	$lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));

	$country=mysqli_real_escape_string($con,trim($_POST['country']));

	$address1=mysqli_real_escape_string($con,trim($_POST['address1']));

	$address2=mysqli_real_escape_string($con,trim($_POST['address2']));

	$city=mysqli_real_escape_string($con,trim($_POST['city']));

	$state=mysqli_real_escape_string($con,trim($_POST['state']));

	$zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));

	$userid=$_SESSION['user_id'];

	$date=date('Y-m-d H:i:s');

	$sql=mysqli_query($con,"update shipping_address set sa_firstname='".$firstname."',sa_lastname='".$lastname."',

		sa_address1='".$address1."',sa_address2='".$address2."',sa_city='".$city."',sa_province='".$state."',

		sa_country='".$country."',sa_zipcode='".$zipcode."',last_updated='".$date."'

		 where userid='".$_SESSION['user_id']."'");

	$_SESSION['address_succ']="Shipping Address Updated Successfully";

	header("Location:{$homeurl}address-book/");

}

if (isset($_POST['add_shipping_addr']))

{

	$firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));

	$lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));

	$country=mysqli_real_escape_string($con,trim($_POST['country']));

	$address1=mysqli_real_escape_string($con,trim($_POST['address1']));

	$address2=mysqli_real_escape_string($con,trim($_POST['address2']));

	$city=mysqli_real_escape_string($con,trim($_POST['city']));

	$state=mysqli_real_escape_string($con,trim($_POST['state']));

	$zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));

	$userid=$_SESSION['user_id'];

	$date=date('Y-m-d H:i:s');

	$sql=mysqli_query($con,"insert into shipping_address(userid,sa_firstname,sa_lastname,sa_address1,sa_address2,sa_city,sa_province,sa_country,sa_zipcode,created_date)
		values
	  ('".$_SESSION['user_id']."','".$firstname."','".$lastname."','".$address1."','".$address2."','".$city."',
	  	'".$state."','".$country."','".$zipcode."','".$date."')");
	$_SESSION['address_succ']="Shipping Address Added Successfully";

	header("Location:{$homeurl}address-book/");

}


if(isset($_POST['ajax_login']))

{

	$email=mysqli_real_escape_string($con,trim($_POST['email']));

	$password=mysqli_real_escape_string($con,trim($_POST['password']));

	$sql=$site->select_query("select * from user_master where email='".$email."' and password='".$password."'");

	if($sql!=0)

	{

		if($sql['block']=="1")

		{

			echo "not_activated";

		}

		else

		{

			$_SESSION['user_id']=$sql['user_id'];


			$sql1=mysqli_query($con,"update order_master set userid='".$_SESSION['user_id']."',sess_id='' where 

					sess_id='".$_SESSION['guest_id']."'");

				//unset(session_id());

				unset($_SESSION['guest_id']);



			$_SESSION['login_succ']="login success";

			echo "log_success";

		}

	}

	else

	{

		echo "log_fail";

	}

	

}

if(isset($_POST['apt_form']))
{
	$name=mysqli_real_escape_string($con,trim($_POST['name']));
	$email=mysqli_real_escape_string($con,trim($_POST['email']));
	$phone=mysqli_real_escape_string($con,trim($_POST['phone']));
	$timings=mysqli_real_escape_string($con,trim($_POST['timings']));
	$address=mysqli_real_escape_string($con,trim($_POST['address']));
	$comments=mysqli_real_escape_string($con,trim($_POST['comments']));
	$sr_id=mysqli_real_escape_string($con,trim($_POST['sr_id']));
	$date=date("Y-m-d H:i:s");
	$sql=mysqli_query($con,"insert into appointment_master(a_name,a_email,a_phone,a_timings,a_address,a_comments,srid,created_date)
		values('".$name."','".$email."','".$phone."','".$timings."','".$address."','".$comments."','".$sr_id."','".$date."')");
	if($sql)
	{
		echo "Success";
	}
	else
	{
		echo "Fail";
	}
}



if(isset($_POST['place_order']) && $_POST['payment-methods'] == 'Cash on Delivery')
{
	 $a_id=mysqli_real_escape_string($con,trim($_POST['a_id']));
     $oid=mysqli_real_escape_string($con,trim($_POST['o_id']));
     $message="";$tot="";$i=0;

     $update_order_id = mysqli_query($con,"update order_master set order_id=$oid where userid='".$_SESSION['user_id']."' and om_status=1");
         $sql1=mysqli_query($con,"update order_master set om_status=0,ship_id=$a_id where order_id=$oid");
       $sql=mysqli_query($con,"select a.*,a.created_date as c_date,b.p_description from order_master a,product_master b where 
            a.order_id=$oid and a.pid=b.p_id and a.om_status=0");

        $user_dtl_qry = mysqli_query($con,"select * from user_master where user_id='".$_SESSION['user_id']."'");
       if(mysqli_num_rows($user_dtl_qry) > 0) {
            $user_dtl = mysqli_fetch_array($user_dtl_qry);
        }
         if($sql)
        {
            if(mysqli_num_rows($sql) > 0)
            {
                while($r=mysqli_fetch_array($sql))
                {
                    $tot=$tot + ($r['om_price'] * $r['om_quantity']);
                    $res[0]['created_date']=$r['c_date'];
                    $res[0]['order_id']=$r['order_id'];
                    $i++;
                }
                $tot5=$tot+5;
               
                
                $res[0]['price']=$tot;

                /* Order History Mail Template */
                $name = $user_dtl['username'];
                $email = $user_dtl['email'];
                $mobile = $user_dtl['mobile'];
                $date=date('Y-m-d H:i:s');
                $ship_dtl_qry = mysqli_query($con,"select * from shipping_address where userid=".$_SESSION['user_id']."");

                if($ship_dtl_qry)
                {
                	$ship_dtl = mysqli_fetch_array($ship_dtl_qry);
                }
               $insert_order_info =mysqli_query($con,"insert into payment_master(orderid,trans_id,amount,payment_type,status,userid,date,created_date) values('".$res[0]['order_id']."','','".$tot5."','".$_POST['payment-methods']."','Completed','".$_SESSION['user_id']."','".$res[0]['created_date']."','".$date."')");
               if($insert_order_info) 
               {
                    

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
								           <strong>OTKOOTOOR ORDER INFORMATION</strong></p></td>
								      </tr>
								      <tr>
								        <td>&nbsp;</td>
								      </tr>
								      <tr>
								        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
								          <tr>
								            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Shipping Address</strong></td>
								            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-bottom:0;"><strong>Payment Method</strong></td>
								            </tr>
								          <tr>
								            <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; border-right:0; font-size:13px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								              <tr>
								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">&nbsp;</td>
								                </tr>
								              <tr>
								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">'.$ship_dtl['sa_firstname'].' '.$ship_dtl['sa_lastname'].'</strong></td>
								              </tr>
								              <tr>
								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;"><p>'.$ship_dtl["sa_address1"].'</p></td>
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
								                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">'.$_POST['payment-methods'].'</td>
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
								        <td>&nbsp;</td>
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
                       $r = mysqli_fetch_array($sql);$tot1='';
                       foreach( $sql as $key=>$value ) {  $tot1=$tot1 + ($value['om_quantity'] * $value['om_price']);
$product_name_qry = mysqli_query($con,'select p_name from product_master where p_id = '.$value['pid'].'');
                       	if($product_name_qry) {
                       	  $product_dtl = mysqli_fetch_array($product_name_qry);
                       	  $p_name = $product_dtl['p_name'];
}
					   $message .=  '<tr>
							   <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">'.$p_name.'</td>
						           <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">$'.$value['om_price'].'</td>
							  <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">'.$value['om_quantity'].'</td>
							  <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd;  border-top:0;">$'.$tot1.'</td>
						</tr>';

						}				
			           	$message .=	'<tr>
										  <td colspan="5" bgcolor="#FFFFFF" style="background-color:#ffffff; border:1px solid #dddddd; border-top:0;">
										    <table width="100%" border="0" cellspacing="0" cellpadding="0">
										      <tr>
										        <td align="right" style="padding:5px 10px; background-color:#efefef;">Sub Total</td>
										        <td align="right" style="padding:5px 10px; background-color:#efefef;">$'.number_format($tot,2).'</td>
										        </tr>
										      <tr>
										        <td align="right" style="padding:5px 10px; background-color:#efefef;">Shipping</td>
										        <td align="right" style="padding:5px 10px; background-color:#efefef;">$ 5.00</td>
										        </tr>
										      <tr>
										        <td width="78%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>Grand Total</strong></td>
										        <td width="22%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>$'.number_format($tot + 5,2).'</strong></td>
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
								          <td colspan="6" align="center"><p style="font-size:13px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d; font-weight:bold; margin-top:0; margin-bottom:0; padding-left:5px;"> <strong>IF YOU NEED FURTHER ASSISTANCE, PLEASE CONTACT US AT OTKOOTOOR</strong> <br /><br />
								            <strong style="color:#000000; font-size:20px">THANK YOU FOR YOUR BUSINESS!</strong></p>
								            <p style="font-size:14px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d;"> Order Status: You can check your order status and and also review your order history here <a href="www.otkootoor.com" style="color:#000000;">Otkotoor.com</a></p>
								            <p style="font-size:12px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d; font-weight:bold; margin-top:0; margin-bottom:0; padding-left:5px;">&nbsp;</p></td>
								        </tr>
								      </table></td>      
								      </tr>     </table></td>
								  </tr>
								</table>
								     </center>   </div>';

                    $subject="Ot KooToor Order History Information";
                    $headers = "From: Ot KooToor <info@otkootoor.com> \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                    mail($email,$subject,$message,$headers);
                } 
               // return $res;


                /* Sales Track Update*/

                $date=date('Y-m-d');
                $date1=date('Y-m-d H:i:s');
		         $sql11=mysqli_query($con,"select b.catid from order_master a ,sub_category_master b where a.order_id=$oid and a.subcatid=b.sub_cat_id");
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
                /*End Sales Track Update*/
                $_SESSION['order_id']=$oid;
                header("Location:{$homeurl}order-received/");
            }
            else
            {
                header("Location:{$homeurl}404/");
            }
        }
        else
        {
           header("Location:{$homeurl}404/");
        }

}


/*Customizer Insertion*/

/*Coat Insertion*/
$type= isset($_POST['type']) ? mysqli_real_escape_string($con,trim($_POST['type'])) : "0";


if($type=="coat")
{
	$gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
	$user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
	$p_id=mysqli_real_escape_string($con,trim($_POST['p_id']));
	$type=mysqli_real_escape_string($con,trim($_POST['type']));
	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
	$o_id=mysqli_real_escape_string($con,trim($_POST['o_id']));
	$om_price=mysqli_real_escape_string($con,trim($_POST['garment_price']));
	//$om_price=$_SESSION['garment_price'];
        $date=date('Y-m-d H:i:s');
	if(isset($_SESSION['user_id'])){
	 $where=" userid=".$_SESSION['user_id']."";}
	 else{
	 $where=" sess_id='".$_SESSION['guest_id']."'";}
//$om_price=str_replace(",",".",$om_price);
if($type=="coat")
{
	$render=$_POST['img_render'];
	$img_render="";
	for ($i=0; $i < count($render) ; $i++) { 
		$img_render.=$render[$i]."@@";
	}
	$coat_fit=mysqli_real_escape_string($con,trim($_POST['coat_fit']));
	$coat_style=mysqli_real_escape_string($con,trim($_POST['coat_style']));
	$coat_collar=mysqli_real_escape_string($con,trim($_POST['coat_collar']));
	$coat_lapel=mysqli_real_escape_string($con,trim($_POST['coat_lapel']));
	$coat_buttons=mysqli_real_escape_string($con,trim($_POST['coat_buttons']));
	$coat_length=mysqli_real_escape_string($con,trim($_POST['coat_length']));
	$coat_fastening=mysqli_real_escape_string($con,trim($_POST['coat_fastening']));
	$coat_pockets_type=mysqli_real_escape_string($con,trim($_POST['coat_pockets_type']));
	$coat_sleeves=mysqli_real_escape_string($con,trim($_POST['coat_sleeves']));
	$coat_belt=mysqli_real_escape_string($con,trim($_POST['coat_belt']));
	$coat_backcut=mysqli_real_escape_string($con,trim($_POST['coat_backcut']));
	$woman_coat=mysqli_real_escape_string($con,trim($_POST['woman_coat']));
	$coat_lining=mysqli_real_escape_string($con,trim($_POST['coat_lining']));
	$lining_price = mysqli_real_escape_string($con,trim($_POST['l_coat_lining']));
	$initial_price = mysqli_real_escape_string($con,rtrim($_POST['title_price1'],'€'));
	$p_type="coat";
	$coat_initials_text=isset($_POST['coat_initials_text'])!="" ? mysqli_real_escape_string($con,trim($_POST['coat_initials_text'])) : "";
	$coat_initials_font=isset($_POST['coat_initials_font']) ? mysqli_real_escape_string($con,trim($_POST['coat_initials_font'])) : "";
	$coat_initials_color=isset($_POST['coat_initials_color']) ? mysqli_real_escape_string($con,trim($_POST['coat_initials_color'])) : "";
	
	$fab_price = mysqli_real_escape_string($con,trim($_POST['f_woman_coat']));

	$lining_price = "{lining_price:".$lining_price.",initial_price:".$initial_price."}";

	$style="{fit:".$coat_fit.",coat_style:".$coat_style.",coat_collar:".$coat_collar.",coat_lapel:".$coat_lapel.",coat_buttons:".$coat_buttons.",coat_length:".$coat_length.",coat_fastening:".$coat_fastening.",coat_pocket_type:".$coat_pockets_type.",coat_sleeves:".$coat_sleeves.",coat_belt:".$coat_belt.",coat_back_cut:".$coat_backcut."}";

	if($coat_lining!="" || $coat_initials_text!="" || $coat_initials_font!="" || $coat_initials_color!="") {


		$accents="{coatlining:".$coat_lining.",coat_text:".$coat_initials_text.",coat_font:".$coat_initials_font.",coat_color:".$coat_initials_color."}";
	}
	else {
		$accents='';
	}
	
	if($action=="save")
	{
		$sql1=mysqli_query($con,"select * from order_master where $where and om_status=1");
		if(mysqli_num_rows($sql1))
		{
			$r1=mysqli_fetch_array($sql1);
			$order_id=$r1['order_id'];
		}
		else
		{
			$order_id=rand(0,999999);
		}

			$sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_img,fabid,fab_price,lining_price,om_accents,order_status,created_date)
	 	values('".$order_id."','".$p_id."','".$user_id."','".$gid."',14,'".$p_type."',1,'".$om_price."','".$style."','".$img_render."','".$woman_coat."','".$fab_price."','".$lining_price."','".$accents."','Processing','".$date."')");			 
		
		header("Location:{$homeurl}shopping-cart/$order_id/");
	} 
	else
	{
	  $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_img='".$img_render."',fabid=$woman_coat,fab_price='".$fab_price."',lining_price='".$lining_price."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
	  header("Location:{$homeurl}shopping-cart/$order_id/");

	}
}
}

/*End Coat insertion*/

/*Start Shirt Insertion*/

if($type=="shirt")
{
	$type=mysqli_real_escape_string($con,trim($_POST['type']));
	$gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
	$user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
	$p_id=mysqli_real_escape_string($con,trim($_POST['p_id']));
	$type=mysqli_real_escape_string($con,trim($_POST['type']));
	$order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
	$o_id=mysqli_real_escape_string($con,trim($_POST['o_id']));
	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$date=date('Y-m-d H:i:s');
	
	//echo "<pre>";
	//print_r($_POST);
	
	$om_price=mysqli_real_escape_string($con,trim($_POST['garment_price']));
        //$om_price=$_SESSION['garment_price'];
	$shirt_fit=mysqli_real_escape_string($con,trim($_POST['shirt_fit']));
	$shirt_necklines=mysqli_real_escape_string($con,trim($_POST['shirt_necklines']));
 	$shirt_button_close=mysqli_real_escape_string($con,trim($_POST['shirt_button_close']));
	$shirt_bottom_cut=mysqli_real_escape_string($con,trim($_POST['shirt_bottom_cut']));
	$shirt_sleeves=mysqli_real_escape_string($con,trim($_POST['shirt_sleeves']));
	$shirt_sleeve_detail=mysqli_real_escape_string($con,trim($_POST['shirt_sleeve_detail']));
	$shirt_pockets=mysqli_real_escape_string($con,trim($_POST['shirt_pockets']));
	$shirt_pockets_type=mysqli_real_escape_string($con,trim($_POST['shirt_pockets_type']));
	$shirt_cuffs=mysqli_real_escape_string($con,trim($_POST['shirt_cuffs']));
	$woman_shirt=mysqli_real_escape_string($con,trim($_POST['woman_shirt']));
	$fab_price = mysqli_real_escape_string($con,trim($_POST['f_woman_shirt']));
	$fabric_block=mysqli_real_escape_string($con,trim($_POST['fabric_block']));
	$initials_price=mysqli_real_escape_string($con,trim($_POST['initials_price']));
	$initials_text=mysqli_real_escape_string($con,trim($_POST['initials_text']));
	$initials_font=mysqli_real_escape_string($con,trim($_POST['initials_font']));
	$initials_color=mysqli_real_escape_string($con,trim($_POST['initials_color']));
	$initials_position=mysqli_real_escape_string($con,trim($_POST['initials_position']));
	//$lining_price = mysqli_real_escape_string($con,trim($_POST['l_shirt_lining']));
	$lining_price = mysqli_real_escape_string($con,rtrim($_POST['title_price1'],'€'));
		//$lining_price = "{lining_price:".$lining_price.",initial_price:".$initial_price1."}";

	$render=$_POST['img_render'];
	$p_type="shirt";
	$img_render="";
	for ($i=0; $i < count($render) ; $i++) { 
		$img_render.=$render[$i]."@@";
	}
	 $img_render;

	 $style="{fit:$shirt_fit,collar_style:$shirt_necklines,fastening:$shirt_button_close,hemline:$shirt_bottom_cut,sleeves:$shirt_sleeves,sleeves_details:$shirt_sleeve_detail,breast_pocket:$shirt_pockets,style:$shirt_pockets_type,cuff:$shirt_cuffs}";
	 
	 if($initials_text!="" || $initials_font!= "" || $initials_color!="" || $initials_position!="") {
	 	$accents="{text:$initials_text,font:$initials_font,color:$initials_color,position:$initials_position}";
	 }
	 else {
	 	$accents='';
	 }

	 if(isset($_SESSION['user_id'])){
	 $where=" userid=".$_SESSION['user_id']."";}
	 else{
	 $where=" sess_id='".$_SESSION['guest_id']."'";}
	 
	 if($action=="save")
	{

		$sql1=mysqli_query($con,"select * from order_master where $where and om_status=1");
		if(mysqli_num_rows($sql1))
		{
			$r1=mysqli_fetch_array($sql1);
			$order_id=$r1['order_id'];
		}
		else
		{
			$order_id=rand(0,999999);
		}
		$sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_img,fabid,fab_price,lining_price,om_accents,order_status,created_date)
	 	values('".$order_id."','".$p_id."','".$user_id."','".$gid."',8,'".$p_type."',1,'".$om_price."','".$style."','".$img_render."','".$woman_shirt."','".$fab_price."','".$lining_price."','".$accents."','Processing','".$date."')");			 
		header("Location:{$homeurl}shopping-cart/$order_id/");
	}
	else
	{
	  $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_img='".$img_render."',fabid=$woman_shirt,fab_price='".$fab_price."',lining_price='".$lining_price."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
	  header("Location:{$homeurl}shopping-cart/$order_id/");

	}	
}

/*End Shirt Insertion*/



/* Start Blouse Insertion*/

if($type=="blouse")
{
	$gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
	$user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
	$type=mysqli_real_escape_string($con,trim($_POST['type']));
	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$p_id=mysqli_real_escape_string($con,trim($_POST['p_id']));
	$order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
	$o_id=mysqli_real_escape_string($con,trim($_POST['o_id']));

	
	
	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$date=date('Y-m-d H:i:s');
	//echo "<pre>";
	//print_r($_POST);
	$date=date('Y-m-d H:i:s');
	$om_price=mysqli_real_escape_string($con,trim($_POST['garment_price']));
        //$om_price=$_SESSION['garment_price'];
	$blouse_fit=mysqli_real_escape_string($con,trim($_POST['blouse_fit']));
	$blouse_necklines=mysqli_real_escape_string($con,trim($_POST['blouse_necklines']));
	$blouse_button_close=mysqli_real_escape_string($con,trim($_POST['blouse_button_close']));
	$blouse_bottom_cut=mysqli_real_escape_string($con,trim($_POST['blouse_bottom_cut']));
	$blouse_sleeves=mysqli_real_escape_string($con,trim($_POST['blouse_sleeves']));
	$blouse_sleeve_detail=mysqli_real_escape_string($con,trim($_POST['blouse_sleeve_detail']));
	$blouse_pockets=mysqli_real_escape_string($con,trim($_POST['blouse_pockets']));
	$blouse_pockets_type=mysqli_real_escape_string($con,trim($_POST['blouse_pockets_type']));
	$blouse_cuffs=mysqli_real_escape_string($con,trim($_POST['blouse_cuffs']));
	$woman_blouse=mysqli_real_escape_string($con,trim($_POST['woman_blouse']));
	$fab_price = mysqli_real_escape_string($con,trim($_POST['f_woman_blouse']));
	$lining_price = mysqli_real_escape_string($con,trim($_POST['l_blouse_lining']));
	$initial_price = mysqli_real_escape_string($con,rtrim($_POST['title_price1'],'€'));

	$initials_price=mysqli_real_escape_string($con,trim($_POST['initials_price']));
	$initials_text=mysqli_real_escape_string($con,trim($_POST['initials_text']));
	$initials_font=mysqli_real_escape_string($con,trim($_POST['initials_font']));
	$initials_color=mysqli_real_escape_string($con,trim($_POST['initials_color']));

	$lining_price = "{lining_price:".$lining_price.",initial_price:".$initial_price."}";

	$render=$_POST['img_render'];
	$p_type="blouse";
	$img_render="";
	for ($i=0; $i < count($render) ; $i++) { 
		$img_render.=$render[$i]."@@";
	}
	 $img_render;

	 $style="{fit:$blouse_fit,collar_style:$blouse_necklines,fastening:$blouse_button_close,hemline:$blouse_bottom_cut,sleeves:$blouse_sleeves,sleeves_details:$blouse_sleeve_detail,breast_pocket:$blouse_pockets,style:$blouse_pockets_type,cuff:$blouse_cuffs}";
	 
	 if($initials_text!="" || $initials_font!= "" || $initials_color!="") {
	 	$accents="{text:$initials_text,font:$initials_font,color:$initials_color}";
	 }
	 else {
	 	$accents='';
	 }

	 if(isset($_SESSION['user_id'])){
	 $where=" userid=".$_SESSION['user_id']."";}
	 else{
	 $where=" sess_id='".$_SESSION['guest_id']."'";}
	 
	 if($action=="save")
	{

		$sql1=mysqli_query($con,"select * from order_master where $where and om_status=1");
		if(mysqli_num_rows($sql1))
		{
			$r1=mysqli_fetch_array($sql1);
			$order_id=$r1['order_id'];
		}
		else
		{
			$order_id=rand(0,999999);
		}
		$sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_img,fabid,fab_price,lining_price,om_accents,order_status,created_date)
	 	values('".$order_id."','".$p_id."','".$user_id."','".$gid."',7,'".$p_type."',1,'".$om_price."','".$style."','".$img_render."','".$woman_blouse."','".$fab_price."','".$lining_price."','".$accents."','Processing','".$date."')");			 
		header("Location:{$homeurl}shopping-cart/$order_id/");
	} 
	else
	{
	  $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_img='".$img_render."',fabid=$woman_blouse,fab_price='".$fab_price."',lining_price='".$lining_price."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
	  header("Location:{$homeurl}shopping-cart/$order_id/");

	}
	
}

/* End Blouse Insertion*/

/*Start Jacket Insertion*/

if($type=="jacket")
{
//echo "<pre>";
//print_r($_POST);
	$date=date('Y-m-d H:i:s');
	$gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
	$user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
	$p_id=mysqli_real_escape_string($con,trim($_POST['p_id']));
	$type=mysqli_real_escape_string($con,trim($_POST['type']));
	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$om_price=mysqli_real_escape_string($con,trim($_POST['garment_price']));
        //$om_price=$_SESSION['garment_price'];
	$jacket_fit=mysqli_real_escape_string($con,trim($_POST['jacket_fit']));
	$order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
	$o_id=mysqli_real_escape_string($con,trim($_POST['o_id']));
	$jacket_style=mysqli_real_escape_string($con,trim($_POST['jacket_style']));
	$jacket_style_lapel=mysqli_real_escape_string($con,trim($_POST['jacket_style_lapel']));
	$jacket_wide_lapel=mysqli_real_escape_string($con,trim($_POST['jacket_wide_lapel']));
	$jacket_buttons=mysqli_real_escape_string($con,trim($_POST['jacket_buttons']));
	$jacket_length=mysqli_real_escape_string($con,trim($_POST['jacket_length']));
	$jacket_breast_pocket=mysqli_real_escape_string($con,trim($_POST['jacket_breast_pocket']));
	$jacket_hip_pockets=mysqli_real_escape_string($con,trim($_POST['jacket_hip_pockets']));
	$jacket_sleeves=mysqli_real_escape_string($con,trim($_POST['jacket_sleeves']));
	$jacket_finishing=mysqli_real_escape_string($con,trim($_POST['jacket_finishing']));
	$jacket_back_style=mysqli_real_escape_string($con,trim($_POST['jacket_back_style']));
	$woman_jacket=mysqli_real_escape_string($con,trim($_POST['woman_jacket']));
	$initials_price=mysqli_real_escape_string($con,trim($_POST['initials_price']));
    $lining_price =  mysqli_real_escape_string($con,trim($_POST['l_jacket_lining']));
	$initial_price = mysqli_real_escape_string($con,rtrim($_POST['title_price1'],'€'));
	$jacket_lining=mysqli_real_escape_string($con,trim($_POST['jacket_lining']));
	$initials_text=mysqli_real_escape_string($con,trim($_POST['initials_text']));
	$initials_font=mysqli_real_escape_string($con,trim($_POST['initials_font']));
	$initials_color=mysqli_real_escape_string($con,trim($_POST['initials_color']));
	$fab_price = mysqli_real_escape_string($con,trim($_POST['f_woman_jacket']));

	$lining_price = "{lining_price:".$lining_price.",initial_price:".$initial_price."}";

	$render=$_POST['img_render'];
	$p_type="jacket";
	$img_render="";
	for ($i=0; $i < count($render) ; $i++) { 
		$img_render.=$render[$i]."@@";
	}

	  $style="{fit:$jacket_fit,look:$jacket_style,lapel_style:$jacket_style_lapel,
	 	lapel_width:$jacket_wide_lapel,buttons:$jacket_buttons,length:$jacket_length,
	 	chest_pocket:$jacket_breast_pocket,pocket_style:$jacket_hip_pockets,sleeves:$jacket_sleeves,
	 	hemline:$jacket_finishing,back_style:$jacket_back_style}";

	 if($jacket_lining!="" || $initials_text!= "" || $initials_font!="" || $initials_color!="") {
	 	$accents="{lining:$jacket_lining,text:$initials_text,font:$initials_font,color:$initials_color}";
	 }
	 else {
	 	$accents='';
	 }
	 	 
	 if(isset($_SESSION['user_id'])){
	 $where=" userid=".$_SESSION['user_id']."";}
	 else{
	 $where=" sess_id='".$_SESSION['guest_id']."'";}
	 
	 if($action=="save")
	{

		$sql1=mysqli_query($con,"select * from order_master where $where and om_status=1");
		if(mysqli_num_rows($sql1))
		{
			$r1=mysqli_fetch_array($sql1);
			$order_id=$r1['order_id'];
		}
		else
		{
			$order_id=rand(0,999999);
		}
		$sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_img,fabid,fab_price,lining_price,om_accents,order_status,created_date)
	 	values('".$order_id."','".$p_id."','".$user_id."','".$gid."',15,'".$p_type."',1,'".$om_price."','".$style."','".$img_render."','".$woman_jacket."','".$fab_price."','".$lining_price."','".$accents."','Processing','".$date."')");			 
		header("Location:{$homeurl}shopping-cart/$order_id/");
	} 
	else
	{
	  $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_img='".$img_render."',fabid=$woman_jacket,fab_price='".$fab_price."',lining_price='".$lining_price."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
	  header("Location:{$homeurl}shopping-cart/$order_id/");

	}	
}


/*End Jacket Insertion*/

/*Start Buisness Suit Insertion*/
if($type=="buisness_suits")
{
	//echo "<pre>";
	//print_r($_POST);
	$date=date('Y-m-d H:i:s');
	$gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
	$user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
	$p_id=mysqli_real_escape_string($con,trim($_POST['p_id']));
	$type=mysqli_real_escape_string($con,trim($_POST['type']));
	$order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
	$o_id=mysqli_real_escape_string($con,trim($_POST['o_id']));

	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$om_price=mysqli_real_escape_string($con,trim($_POST['garment_price']));
        //$om_price=$_SESSION['garment_price'];
	$jacket_fit=mysqli_real_escape_string($con,trim($_POST['jacket_fit']));
	$jacket_style=mysqli_real_escape_string($con,trim($_POST['jacket_style']));
	$jacket_style_lapel=mysqli_real_escape_string($con,trim($_POST['jacket_style_lapel']));
	$jacket_wide_lapel=mysqli_real_escape_string($con,trim($_POST['jacket_wide_lapel']));
	$jacket_buttons=mysqli_real_escape_string($con,trim($_POST['jacket_buttons']));
	$jacket_length=mysqli_real_escape_string($con,trim($_POST['jacket_length']));
	$jacket_breast_pocket=mysqli_real_escape_string($con,trim($_POST['jacket_breast_pocket']));
	$jacket_hip_pockets=mysqli_real_escape_string($con,trim($_POST['jacket_hip_pockets']));
	$jacket_sleeves=mysqli_real_escape_string($con,trim($_POST['jacket_sleeves']));
	$jacket_finishing=mysqli_real_escape_string($con,trim($_POST['jacket_finishing']));
	$jacket_back_style=mysqli_real_escape_string($con,trim($_POST['jacket_back_style']));

	$pants_cut=mysqli_real_escape_string($con,trim($_POST['pants_cut']));
	$pants_length=mysqli_real_escape_string($con,trim($_POST['pants_length']));
	$pants_front_closure=mysqli_real_escape_string($con,trim($_POST['pants_front_closure']));
	$pants_pleat=mysqli_real_escape_string($con,trim($_POST['pants_pleat']));
	$pants_belt_loops=mysqli_real_escape_string($con,trim($_POST['pants_belt_loops']));
	$pants_crotch=mysqli_real_escape_string($con,trim($_POST['pants_crotch']));
	$pants_front_pocket=mysqli_real_escape_string($con,trim($_POST['pants_front_pocket']));
	$pants_back_pocket_num=mysqli_real_escape_string($con,trim($_POST['pants_back_pocket_num']));
	$pants_belt_loops_property=mysqli_real_escape_string($con,trim($_POST['pants_belt_loops_property']));
	$pants_cuff=mysqli_real_escape_string($con,trim($_POST['pants_cuff']));
	$lining_price =  mysqli_real_escape_string($con,trim($_POST['l_jacket_lining']));
	$initial_price = mysqli_real_escape_string($con,rtrim($_POST['title_price1'],'€'));

	$woman_jacket1=mysqli_real_escape_string($con,trim($_POST['woman_jacket']));

	$woman_pants = mysqli_real_escape_string($con,trim($_POST['woman_pants']));

	$woman_jacket = "{woman_jacket:$woman_jacket1,woman_pants:$woman_pants}";

	$fab_price1=mysqli_real_escape_string($con,trim($_POST['f_woman_jacket']));

	$fab_price2 = mysqli_real_escape_string($con,trim($_POST['f_woman_pants']));

	$fab_price = "{woman_jacket:$fab_price1,woman_pants:$fab_price2}";

	$lining_price = "{lining_price:".$lining_price.",initial_price:".$initial_price."}";



	$initials_price=mysqli_real_escape_string($con,trim($_POST['initials_price']));
	$jacket_lining=mysqli_real_escape_string($con,trim($_POST['jacket_lining']));
	$initials_text=mysqli_real_escape_string($con,trim($_POST['initials_text']));
	$initials_font=mysqli_real_escape_string($con,trim($_POST['initials_font']));
	$initials_color=mysqli_real_escape_string($con,trim($_POST['initials_color']));
	$render=$_POST['img_render'];
	$p_type="buisness_suits";
	$img_render="";
	for ($i=0; $i < count($render) ; $i++) { 
		$img_render.=$render[$i]."@@";
	}

	 $style="{fit:$jacket_fit,look:$jacket_style,lapel_style:$jacket_style_lapel,lapel_width:$jacket_wide_lapel,buttons:$jacket_buttons,length:$jacket_length,chest_pocket:$jacket_breast_pocket,pocket_style:$jacket_hip_pockets,sleeves:$jacket_sleeves,hemline:$jacket_finishing,back_style:$jacket_back_style,pant_fit:$pants_cut,pant_length:$pants_length,pant_fastening:$pants_front_closure,pant_pleats:$pants_pleat,pant_belt_loops:$pants_belt_loops,pant_crotch:$pants_crotch,pant_waist_band:$pants_belt_loops_property,pant_pocket_style:$pants_front_pocket,pant_back_pockets:$pants_back_pocket_num,pant_cuffs:$pants_cuff}";
	 
	 if($jacket_lining!="" || $initials_text!= "" || $initials_font!="" || $initials_color!="") {
	 	$accents="{lining:$jacket_lining,text:$initials_text,font:$initials_font,color:$initials_color}";
	 }
	 else {
	 	$accents='';
	 }

	 if(isset($_SESSION['user_id'])){
	 $where=" userid=".$_SESSION['user_id']."";}
	 else{
	 $where=" sess_id='".$_SESSION['guest_id']."'";}
	 
	 if($action=="save")
	{

		$sql1=mysqli_query($con,"select * from order_master where $where and om_status=1");
		if(mysqli_num_rows($sql1))
		{
			$r1=mysqli_fetch_array($sql1);
			$order_id=$r1['order_id'];
		}
		else
		{
			$order_id=rand(0,999999);
		}
		$sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_img,fabid,fab_price,lining_price,om_accents,order_status,created_date)
	 	values('".$order_id."','".$p_id."','".$user_id."','".$gid."',12,'".$p_type."',1,'".$om_price."','".trim($style)."','".$img_render."','".$woman_jacket."','".$fab_price."','".$lining_price."','".$accents."','Processing','".$date."')");			 
		header("Location:{$homeurl}shopping-cart/$order_id/");
	}
	else
	{
	  $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_img='".$img_render."',fabid='".$woman_jacket."',fab_price='".$fab_price."',lining_price='".$lining_price."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
	  header("Location:{$homeurl}shopping-cart/$order_id/");

	} 


}
/*End Buisness Suit Insertion*/



/*Start Pant Insertion*/



if($type=="pant")
{
	$gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
	$user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
	$p_id=mysqli_real_escape_string($con,trim($_POST['p_id']));
	$type=mysqli_real_escape_string($con,trim($_POST['type']));
	$order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
	$o_id=mysqli_real_escape_string($con,trim($_POST['o_id']));
	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	//echo "<pre>";
	//print_r($_POST);
	$date=date('Y-m-d H:i:s');
	$om_price=mysqli_real_escape_string($con,trim($_POST['garment_price']));
        //$om_price=$_SESSION['garment_price'];
	$pant_fit=mysqli_real_escape_string($con,trim($_POST['pants_cut']));
	$pant_length=mysqli_real_escape_string($con,trim($_POST['pants_length']));
	$pant_fastening=mysqli_real_escape_string($con,trim($_POST['pants_front_closure']));
	$pant_pleats=mysqli_real_escape_string($con,trim($_POST['pants_pleat']));
	$pant_belt_loop=mysqli_real_escape_string($con,trim($_POST['pants_belt_loops']));
	$pant_crotch=mysqli_real_escape_string($con,trim($_POST['pants_crotch']));
	$pant_front_pocket=mysqli_real_escape_string($con,trim($_POST['pants_front_pocket']));
	$pant_back_pocket=mysqli_real_escape_string($con,trim($_POST['pants_back_pocket_num']));
	$pant_pocket_style=mysqli_real_escape_string($con,trim($_POST['pants_back_pocket_type']));
	$pant_cuff=mysqli_real_escape_string($con,trim($_POST['pants_cuff']));
	$fabric_block=mysqli_real_escape_string($con,trim($_POST['fabric_block']));
	$woman_pant = mysqli_real_escape_string($con,trim($_POST['woman_pants']));
	$fab_price = mysqli_real_escape_string($con,trim($_POST['f_woman_pants']));
	
	$render=$_POST['img_render'];
	$p_type="pant";
	$img_render="";
	for ($i=0; $i < count($render) ; $i++) { 
		$img_render.=$render[$i]."@@";
	}


	 $style="{fit:$pant_fit,length:$pant_length,fastening:$pant_fastening,pleats:$pant_pleats,belt_loops:$pant_belt_loop,crotch:$pant_crotch,pockets:$pant_front_pocket,back_pockets:$pant_back_pocket,pocket_style:$pant_pocket_style,cuffs:$pant_cuff}";
	 
	 if(isset($_SESSION['user_id'])){
	 $where=" userid=".$_SESSION['user_id']."";}
	 else{
	 $where=" sess_id='".$_SESSION['guest_id']."'";}
	 
	 if($action=="save")
	{

		$sql1=mysqli_query($con,"select * from order_master where $where and om_status=1");
		if(mysqli_num_rows($sql1))
		{
			$r1=mysqli_fetch_array($sql1);
			$order_id=$r1['order_id'];
		}
		else
		{
			$order_id=rand(0,999999);
		}
		$sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_img,fabid,fab_price,om_accents,order_status,created_date)
	 	values('".$order_id."','".$p_id."','".$user_id."','".$gid."',10,'".$p_type."',1,'".$om_price."','".$style."','".$img_render."','".$woman_pant."','".$fab_price."','','Processing','".$date."')");			 
		header("Location:{$homeurl}shopping-cart/$order_id/");
	} 
	else
	{
	  $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_img='".$img_render."',fabid=$woman_pant,fab_price='".$fab_price."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
	  header("Location:{$homeurl}shopping-cart/$order_id/");

	}
	
}

/*End Pant Insertion*/

/* Start Skirt Insertion */

if($type=="skirt")
{
	$gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
	$date=date('Y-m-d H:i:s');
	$user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
	$p_id=mysqli_real_escape_string($con,trim($_POST['p_id']));
	$type=mysqli_real_escape_string($con,trim($_POST['type']));
	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
	$o_id=mysqli_real_escape_string($con,trim($_POST['o_id']));
	//echo "<pre>";
	//print_r($_POST);
	
	$om_price=mysqli_real_escape_string($con,trim($_POST['garment_price']));
        //$om_price=$_SESSION['garment_price'];
	$skirt_look=mysqli_real_escape_string($con,trim($_POST['skirt_style']));
	$skirt_length=mysqli_real_escape_string($con,trim($_POST['skirt_length']));
	$skirt_fastening=mysqli_real_escape_string($con,trim($_POST['skirt_front_closure']));
	$skirt_vent=mysqli_real_escape_string($con,trim($_POST['skirt_cut']));
	$skirt_belt_loop=mysqli_real_escape_string($con,trim($_POST['skirt_belt_loops']));
	$skirt_crotch=mysqli_real_escape_string($con,trim($_POST['skirt_crotch']));
	$skirt_front_pocket=mysqli_real_escape_string($con,trim($_POST['skirt_front_pocket']));
	$skirt_back_pocket=mysqli_real_escape_string($con,trim($_POST['skirt_back_pocket_num']));
	$skirt_pocket_style=mysqli_real_escape_string($con,trim($_POST['skirt_back_pocket_type']));
	$fabric_block=mysqli_real_escape_string($con,trim($_POST['fabric_block']));
	$woman_skirt = mysqli_real_escape_string($con,trim($_POST['woman_skirt']));
	$fab_price = mysqli_real_escape_string($con,trim($_POST['f_woman_skirt']));
	
	$render=$_POST['img_render'];
	$p_type="skirt";
	$img_render="";
	for ($i=0; $i < count($render) ; $i++) { 
		$img_render.=$render[$i]."@@";
	}
	 $img_render;

	 $style="{look:$skirt_look,length:$skirt_length,fastening:$skirt_fastening,vent:$skirt_vent,belt_loops:$skirt_belt_loop,crotch:$skirt_crotch,front_pocket_style:$skirt_front_pocket,back_pockets:$skirt_back_pocket,back_pocket_style:$skirt_pocket_style}";
	 
	 if(isset($_SESSION['user_id'])){
	 $where=" userid=".$_SESSION['user_id']."";}
	 else{
	 $where=" sess_id='".$_SESSION['guest_id']."'";}
	 
	 if($action=="save")
	{

		$sql1=mysqli_query($con,"select * from order_master where $where and om_status=1");
		if(mysqli_num_rows($sql1))
		{
			$r1=mysqli_fetch_array($sql1);
			$order_id=$r1['order_id'];
		}
		else
		{
			$order_id=rand(0,999999);
		}
		$sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_img,fabid,fab_price,om_accents,order_status,created_date)
	 	values('".$order_id."','".$p_id."','".$user_id."','".$gid."',11,'".$p_type."',1,'".$om_price."','".$style."','".$img_render."','".$woman_skirt."','".$fab_price."','','Processing','".$date."')");			 
		header("Location:{$homeurl}shopping-cart/$order_id/");
	} 
	else
	{
	  $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_img='".$img_render."',fabid=$woman_skirt,fab_price='".$fab_price."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
	  header("Location:{$homeurl}shopping-cart/$order_id/");

	}	
	
}
 
/* End Skirt Insertion */


/* Start Skirt Suit Insertion */

if($type=="skirt_suit")
{
	$gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
	$user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
	$p_id=mysqli_real_escape_string($con,trim($_POST['p_id']));
	$type=mysqli_real_escape_string($con,trim($_POST['type']));
	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
	$o_id=mysqli_real_escape_string($con,trim($_POST['o_id']));
	//echo "<pre>";
	//print_r($_POST);
	
	$om_price=mysqli_real_escape_string($con,trim($_POST['garment_price']));
        //$om_price=$_SESSION['garment_price'];
	$jacket_fit=mysqli_real_escape_string($con,trim($_POST['jacket_fit']));
	$jacket_look=mysqli_real_escape_string($con,trim($_POST['jacket_style']));
	$lapel_style=mysqli_real_escape_string($con,trim($_POST['jacket_style_lapel']));
	$lapel_width=mysqli_real_escape_string($con,trim($_POST['jacket_wide_lapel']));
	$jacket_button=mysqli_real_escape_string($con,trim($_POST['jacket_buttons']));
	$jacket_length=mysqli_real_escape_string($con,trim($_POST['jacket_length']));
	$jacket_breast_pocket=mysqli_real_escape_string($con,trim($_POST['jacket_breast_pocket']));
	$pocket_style=mysqli_real_escape_string($con,trim($_POST['jacket_hip_pockets']));
	$jacket_sleeves=mysqli_real_escape_string($con,trim($_POST['jacket_sleeves']));
	$jacket_hemline=mysqli_real_escape_string($con,trim($_POST['jacket_finishing']));
	$jacket_back_style=mysqli_real_escape_string($con,trim($_POST['jacket_back_style']));
	$skirt_look=mysqli_real_escape_string($con,trim($_POST['skirt_style']));
	$skirt_length=mysqli_real_escape_string($con,trim($_POST['skirt_length']));
	$skirt_fastening=mysqli_real_escape_string($con,trim($_POST['skirt_front_closure']));
	$skirt_vent=mysqli_real_escape_string($con,trim($_POST['skirt_cut']));
	$skirt_belt_loop=mysqli_real_escape_string($con,trim($_POST['skirt_belt_loops']));
	$skirt_waistbond = mysqli_real_escape_string($con,trim($_POST['skirt_belt_loops_property']));
	$skirt_crotch=mysqli_real_escape_string($con,trim($_POST['skirt_crotch']));
	$skirt_front_pocket=mysqli_real_escape_string($con,trim($_POST['skirt_front_pocket']));
	$skirt_back_pocket=mysqli_real_escape_string($con,trim($_POST['skirt_back_pocket_num']));
	$skirt_pocket_style=mysqli_real_escape_string($con,trim($_POST['skirt_back_pocket_type']));
	$woman_jacket1 = mysqli_real_escape_string($con,trim($_POST['woman_jacket']));

	$lining_price =  mysqli_real_escape_string($con,trim($_POST['l_jacket_lining']));
	$initial_price = mysqli_real_escape_string($con,rtrim($_POST['title_price1'],'€'));

	$woman_skirt = mysqli_real_escape_string($con,trim($_POST['woman_skirt']));

	$woman_jacket = "{woman_jacket:$woman_jacket1,woman_skirt:$woman_skirt}";

	$fab_price1=mysqli_real_escape_string($con,trim($_POST['f_woman_jacket']));

	$fab_price2 = mysqli_real_escape_string($con,trim($_POST['f_woman_skirt']));

	$fab_price = "{woman_jacket:$fab_price1,woman_pants:$fab_price2}";

	$lining_price = "{lining_price:".$lining_price.",initial_price:".$initial_price."}";


	$jacket_lining=mysqli_real_escape_string($con,trim($_POST['jacket_lining']));
		$initials_text=mysqli_real_escape_string($con,trim($_POST['initials_text']));
	$initials_font=mysqli_real_escape_string($con,trim($_POST['initials_font']));
	$initials_color=mysqli_real_escape_string($con,trim($_POST['initials_color']));
	$date=date('Y-m-d H:i:s');
	$render=$_POST['img_render'];
	$p_type="skirt";
	$img_render="";

	for ($i=0; $i < count($render) ; $i++) { 
		$img_render.=$render[$i]."@@";
	}
	 $img_render;

	 $style="{fit:$jacket_fit,jacket_look:$jacket_look,lapel_style:$lapel_style,lapel_width:$lapel_width,number_of_button:$jacket_button,length:$jacket_length,chest_pocket:$jacket_breast_pocket,pocket_style:$pocket_style,sleeves:$jacket_sleeves,hemline:$jacket_hemline,back_style:$jacket_back_style,look:$skirt_look,length:$skirt_length,fastening:$skirt_fastening,vent:$skirt_vent,belt_loops:$skirt_belt_loop,crotch:$skirt_crotch,waistbond:$skirt_waistbond,front_pocket_style:$skirt_front_pocket,back_pockets:$skirt_back_pocket,back_pocket_style:$skirt_pocket_style}";
	 
	 if($jacket_lining!="" || $initials_text!= "" || $initials_font!="" || $initials_color!="") {

	 	$accents="{lining:".$jacket_lining.",text:".$initials_text.",font:".$initials_font.",color:".$initials_color."}";
	 }
	 else {
	 	$accents='';
	 }
	 
	 if(isset($_SESSION['user_id'])){
	 $where=" userid=".$_SESSION['user_id']."";}
	 else{
	 $where=" sess_id='".$_SESSION['guest_id']."'";}
	 
	 if($action=="save")
	{

		$sql1=mysqli_query($con,"select * from order_master where $where and om_status=1");
		if(mysqli_num_rows($sql1))
		{
			$r1=mysqli_fetch_array($sql1);
			$order_id=$r1['order_id'];
		}
		else
		{
			$order_id=rand(0,999999);
		}
		$sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_img,fabid,fab_price,lining_price,om_accents,order_status,created_date)
	 	values('".$order_id."','".$p_id."','".$user_id."','".$gid."',13,'".$p_type."',1,'".$om_price."','".$style."','".$img_render."','".$woman_jacket."','".$fab_price."','".$lining_price."','".$accents."','Processing','".$date."')");			 
		header("Location:{$homeurl}shopping-cart/$order_id/");
	} 
	else
	{
	  $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_img='".$img_render."',fabid='".$woman_jacket."',fab_price='".$fab_price."',lining_price='".$lining_price."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
	  header("Location:{$homeurl}shopping-cart/$order_id/");

	}
	
}
 
/* End Skirt Suit Insertion */
  





/*End Customizer Insertion*/

if(isset($_POST['send_contact']))
{

	$name=mysqli_real_escape_string($con,trim($_POST['name']));
	$email=mysqli_real_escape_string($con,trim($_POST['email']));
	$subject=mysqli_real_escape_string($con,trim($_POST['subject']));
	$message=mysqli_real_escape_string($con,trim($_POST['message']));

		$headers = "From: $from <$email> \r\n";

		$headers .= "MIME-Version: 1.0\r\n";

		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$to="ramkumar.izaap@gmail.com";
		mail($to,$subject,$message,$headers);
		$_SESSION['contact_succ']="success";
		header("Location:{$homeurl}contact-us/");
}

?>