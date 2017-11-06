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
		$username=substr($firstname, 0,3).substr($lastname,0,3).rand(0,99999);
		$query=$site->insert_query("insert into user_master(firstname,lastname,username,email,mobile,
			password,user_type,hash_token,block,created_date)values('$firstname','$lastname','$username',
			'$email','$mobile','$password',2,'".$hash."',1,'".$date."')");
		$_SESSION['user_exists']="<span style='color:green'>Registration Success!!! Confirmation has been sent to your mail.</span>";
		$message="Thanks for registering.<br>Please <a href='".$homeurl."includes/action/action.php?activate=".$hash."'>click here</a> to activate your account.";
		$subject="Registration Success";
		$headers = "From: Custom Clothiers <support@dccustomclothiers.com> \r\n";
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

		$headers = "From: Custom Clothiers <support@dccustomclothiers.com> \r\n";

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
	$nm = explode(" ",$name);
	$fname = $nm[0];$lname=$nm[1];
	$sql=mysqli_query($con,"insert into member (first_name,last_name,email,join_date)
			values('".$fname."','".$lname."','".$email."',NOW())");
		$m_id=mysqli_insert_id($con);
		$sql2=mysqli_query($con,"insert into member_group(member_id,group_id)values('".$m_id."','4')");

	 $message="Hi $name, thanks for subscribing a newsletter with us.";

	 $subject="Newsletter Subscription";
	$headers = "From: Custom Clothiers <support@dccustomclothiers.com> \r\n";
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


                $order_id_asc1 = mysqli_query($con,"select order_id from order_master where userid = '".$_SESSION['user_id']."' and om_status=1 order by order_id limit 0,1");

                $gift_id_asc1 = mysqli_query($con,"select orderid from gift_card_master where userid = '".$_SESSION['user_id']."' and status=0 order by orderid limit 0,1");
				
				$sql1=mysqli_query($con,"update order_master set userid='".$_SESSION['user_id']."',sess_id='' where sess_id='".$_SESSION['guest_id']."'");
				$sql11=mysqli_query($con,"update gift_card_master set userid='".$_SESSION['user_id']."',sess_id='' where sess_id='".$_SESSION['guest_id']."'");
				$sql12=mysqli_query($con,"update gift_card_applied set userid='".$_SESSION['user_id']."',sess_id='' where sess_id='".$_SESSION['guest_id']."'");
				$sql13=mysqli_query($con,"update coupon_applied set userid='".$_SESSION['user_id']."',sess_id='' 
			    	where sess_id='".$_SESSION['guest_id']."'");

				$order_id_asc = mysqli_query($con,"select order_id from order_master where userid = '".$_SESSION['user_id']."' and om_status=1 order by order_id limit 0,1");

				$order_id_desc = mysqli_query($con,"select order_id from order_master where userid = '".$_SESSION['user_id']."' and om_status=1 order by order_id desc limit 0,1");

				
				$gift_id_asc = mysqli_query($con,"select orderid from gift_card_master where userid = '".$_SESSION['user_id']."' and status=0 order by orderid limit 0,1");

				$gift_id_desc = mysqli_query($con,"select orderid from gift_card_master where userid = '".$_SESSION['user_id']."' and status=0 order by orderid desc limit 0,1");


				if(mysqli_num_rows($order_id_asc) || mysqli_num_rows($order_id_desc))
				{
					$order_asc_dtl = mysqli_fetch_array($order_id_asc);
					$order_desc_dtl = mysqli_fetch_array($order_id_desc);
					$order_asc_id = $order_asc_dtl['order_id'];
					$order_desc_id = $order_desc_dtl['order_id'];

					if(mysqli_num_rows($order_id_asc1))
                      $del_order = mysqli_query($con,"delete from order_id_generate where order_id='".$order_desc_id."'");   
					
					$sql1234=mysqli_query($con,"update order_master set order_id='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and om_status=1");
				    $sql1123=mysqli_query($con,"update gift_card_master set orderid='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql12343=mysqli_query($con,"update gift_card_applied set orderid='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql1343=mysqli_query($con,"update coupon_applied set orderid='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
                    
				
				}
				else if(mysqli_num_rows($gift_id_asc) || mysqli_num_rows($gift_id_desc))
				{
					$gift_asc_dtl = mysqli_fetch_array($gift_id_asc);
					$gift_desc_dtl = mysqli_fetch_array($gift_id_desc);
					$gift_asc_id = $gift_asc_dtl['orderid'];
					$gift_desc_id = $gift_desc_dtl['orderid'];
                    
                    if(mysqli_num_rows($gift_id_asc1))
                      $del_order = mysqli_query($con,"delete from order_id_generate where order_id='".$gift_desc_id."'");
					
					$sql1234=mysqli_query($con,"update order_master set order_id='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and om_status=1");
				    $sql1123=mysqli_query($con,"update gift_card_master set orderid='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql12343=mysqli_query($con,"update gift_card_applied set orderid='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql1343=mysqli_query($con,"update coupon_applied set orderid='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");

				}
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

			$order_id_asc1 = mysqli_query($con,"select order_id from order_master where userid = '".$_SESSION['user_id']."' and om_status=1 order by order_id limit 0,1");

            $gift_id_asc1 = mysqli_query($con,"select orderid from gift_card_master where userid = '".$_SESSION['user_id']."' and status=0 order by orderid limit 0,1");
			
			$sql1=mysqli_query($con,"update order_master set userid='".$_SESSION['user_id']."',sess_id='' where sess_id='".$_SESSION['guest_id']."'");
			$sql11=mysqli_query($con,"update gift_card_master set userid='".$_SESSION['user_id']."',sess_id='' where sess_id='".$_SESSION['guest_id']."'");
			$sql12=mysqli_query($con,"update gift_card_applied set userid='".$_SESSION['user_id']."',sess_id='' where sess_id='".$_SESSION['guest_id']."'");
			$sql13=mysqli_query($con,"update coupon_applied set userid='".$_SESSION['user_id']."',sess_id='' 
			    	where sess_id='".$_SESSION['guest_id']."'");


			$order_id_asc = mysqli_query($con,"select order_id from order_master where userid = '".$_SESSION['user_id']."' and om_status=1 order by order_id limit 0,1");

				$order_id_desc = mysqli_query($con,"select order_id from order_master where userid = '".$_SESSION['user_id']."' and om_status=1 order by order_id desc limit 0,1");

				
				$gift_id_asc = mysqli_query($con,"select orderid from gift_card_master where userid = '".$_SESSION['user_id']."' and status=0 order by orderid limit 0,1");

				$gift_id_desc = mysqli_query($con,"select orderid from gift_card_master where userid = '".$_SESSION['user_id']."' and status=0 order by orderid desc limit 0,1");


				if(mysqli_num_rows($order_id_asc) || mysqli_num_rows($order_id_desc))
				{
					$order_asc_dtl = mysqli_fetch_array($order_id_asc);
					$order_desc_dtl = mysqli_fetch_array($order_id_desc);
					$order_asc_id = $order_asc_dtl['order_id'];
					$order_desc_id = $order_desc_dtl['order_id'];
                    
                    if(mysqli_num_rows($order_id_asc1))
                     $del_order = mysqli_query($con,"delete from order_id_generate where order_id='".$order_desc_id."'");   
					
					$sql1234=mysqli_query($con,"update order_master set order_id='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and om_status=1");
				    $sql1123=mysqli_query($con,"update gift_card_master set orderid='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql12343=mysqli_query($con,"update gift_card_applied set orderid='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql1343=mysqli_query($con,"update coupon_applied set orderid='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
                    
				
				}
				else if(mysqli_num_rows($gift_id_asc) || mysqli_num_rows($gift_id_desc))
				{
					$gift_asc_dtl = mysqli_fetch_array($gift_id_asc);
					$gift_desc_dtl = mysqli_fetch_array($gift_id_desc);
					$gift_asc_id = $gift_asc_dtl['orderid'];
					$gift_desc_id = $gift_desc_dtl['orderid'];
					
					if(mysqli_num_rows($gift_id_asc1))
                     $del_order = mysqli_query($con,"delete from order_id_generate where order_id='".$gift_desc_id."'");
					
					$sql1234=mysqli_query($con,"update order_master set order_id='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and om_status=1");
				    $sql1123=mysqli_query($con,"update gift_card_master set orderid='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql12343=mysqli_query($con,"update gift_card_applied set orderid='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql1343=mysqli_query($con,"update coupon_applied set orderid='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");

				}
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

	$title=mysqli_real_escape_string($con,trim($_POST['title']));

	$email=mysqli_real_escape_string($con,trim($_POST['email']));
	$state=mysqli_real_escape_string($con,trim($_POST['state']));
	$city=mysqli_real_escape_string($con,trim($_POST['city']));

	$product=mysqli_real_escape_string($con,trim($_POST['product']));
    
	$sub_category=mysqli_real_escape_string($con,trim($_POST['category']));

    if($product!='')
    {
	  $sql1=mysqli_query($con,"select catid,subcatid from product_master where p_id=$product");
	  $r1=mysqli_fetch_array($sql1);
	  $subcatid=$r1['subcatid'];$catid=$r1['catid'];
    }

    else 
    {
      $subcatid=$sub_category;
      $catid=1;
      $product=0;	
    }
	$desc=mysqli_real_escape_string($con,trim($_POST['comments']));

	$date=date('Y-m-d H:i:s');

	$sql=$site->insert_query("insert into reviews(pid,catid,subcatid,score,name,city,state,title,description,created_date)
		values($product,$catid,$subcatid,'$score','$name','$city','$state','$title','$desc','".$date."')");

}



if(isset($_POST['account_info']))

{

	$name=mysqli_real_escape_string($con,trim($_POST['firstname']));

	$lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));

	$email=mysqli_real_escape_string($con,trim($_POST['email']));

	$password=mysqli_real_escape_string($con,trim($_POST['password']));
	$old_image_1=mysqli_real_escape_string($con,trim($_POST['old_image_1']));
	$old_image_2=mysqli_real_escape_string($con,trim($_POST['old_image_2']));
	$old_image_3=mysqli_real_escape_string($con,trim($_POST['old_image_3']));

	if($password!=''){$password=mysqli_real_escape_string($con,trim($_POST['password']));}

		else{$password=mysqli_real_escape_string($con,trim($_POST['old_password']));}



	$date=date('Y-m-d H:i:s');

$img=count($_FILES['profile_img_1']['name']);
if ($_FILES['profile_img_1']['size']!=0) 
{ 
	$tmp=$_FILES['profile_img_1']['tmp_name'];
	if(!file_exists("../../uploads/user_photo/".$_SESSION['user_id']."/"))
	{
		mkdir("../../uploads/user_photo/".$_SESSION['user_id']."/",0777,true);
	}
	$img1="uploads/user_photo/".$_SESSION['user_id']."/".$_FILES['profile_img_1']['name'];
	$dir="../../uploads/user_photo/".$_SESSION['user_id']."/".$_FILES['profile_img_1']['name'];
	move_uploaded_file($tmp, $dir);
}
else{$img1=$old_image_1;}
if ($_FILES['profile_img_2']['size']!=0) 
{ 
	$tmp2=$_FILES['profile_img_2']['tmp_name'];
	if(!file_exists("../../uploads/user_photo/".$_SESSION['user_id']."/"))
	{
		mkdir("../../uploads/user_photo/".$_SESSION['user_id']."/",0777,true);
	}
	$img2="uploads/user_photo/".$_SESSION['user_id']."/".$_FILES['profile_img_2']['name'];
	$dir2="../../uploads/user_photo/".$_SESSION['user_id']."/".$_FILES['profile_img_2']['name'];
	move_uploaded_file($tmp2, $dir2);
}
else{$img2=$old_image_2;}
if ($_FILES['profile_img_3']['size']!=0) 
{ 
	$tmp3=$_FILES['profile_img_3']['tmp_name'];
	if(!file_exists("../../uploads/user_photo/".$_SESSION['user_id']."/"))
	{
		mkdir("../../uploads/user_photo/".$_SESSION['user_id']."/",0777,true);
	}
	$img3="uploads/user_photo/".$_SESSION['user_id']."/".$_FILES['profile_img_3']['name'];
	$dir3="../../uploads/user_photo/".$_SESSION['user_id']."/".$_FILES['profile_img_3']['name'];
	move_uploaded_file($tmp3, $dir3);
}
else{$img3=$old_image_3;}



	$sql=$site->update_query("update user_master set last_updated='".$date."',firstname='$name',
		lastname='$lastname',password='$password',img='".$img1."',img2='".$img2."',img3='".$img3."'
		where user_id='".$_SESSION['user_id']."'");

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

	$sql = mysqli_query($con,"select * from  shipping_address  where userid='".$userid."' and sa_firstname='".$firstname."' and sa_lastname='".$lastname."' and sa_address1='".$address1."' and sa_address2='".$address2."' and sa_city='".$city."' and sa_province='".$state."' and sa_country='".$country."' and sa_zipcode='".$zipcode."'");

	if(mysqli_num_rows($sql) == 0)


	{


		$sql=mysqli_query($con,"insert into shipping_address (userid,sa_firstname,sa_lastname,sa_address1,sa_address2,sa_city,sa_province,sa_country,sa_zipcode,last_updated) values(".$userid.",'".$firstname."','".$lastname."','".$address1."','".$address2."','".$city."','".$state."','".$country."','".$zipcode."','".$date."')");
        //$_SESSION['shipping_address_id'] = mysqli_insert_id($con); 

	}

	else
	{
		//$sql = mysqli_query($con,"select * from  shipping_address  where userid='".$userid."' and sa_firstname='".$firstname."' and sa_lastname='".$lastname."' and sa_address1='".$address1."' and sa_address2='".$address2."' and sa_city='".$city."' and sa_province='".$state."' and sa_country='".$country."' and sa_zipcode='".$zipcode."'");
		//$sql1 = mysqli_fetch_array($sql);
		//$_SESSION['shipping_address_id']=$sql1[0];
	}

	/*$sql=mysqli_query($con,"update shipping_address set sa_firstname='".$firstname."',sa_lastname='".$lastname."',

		sa_address1='".$address1."',sa_address2='".$address2."',sa_city='".$city."',sa_province='".$state."',

		sa_country='".$country."',sa_zipcode='".$zipcode."',last_updated='".$date."'

		 where userid='".$_SESSION['user_id']."'");*/

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

			$order_id_asc1 = mysqli_query($con,"select order_id from order_master where userid = '".$_SESSION['user_id']."' and om_status=1 order by order_id limit 0,1");

            $gift_id_asc1 = mysqli_query($con,"select orderid from gift_card_master where userid = '".$_SESSION['user_id']."' and status=0 order by orderid limit 0,1");


			$sql1=mysqli_query($con,"update order_master set userid='".$_SESSION['user_id']."',sess_id='' where 

					sess_id='".$_SESSION['guest_id']."'");
			$sql11=mysqli_query($con,"update gift_card_master set userid='".$_SESSION['user_id']."',sess_id='' where sess_id='".$_SESSION['guest_id']."'");
			$sql12=mysqli_query($con,"update gift_card_applied set userid='".$_SESSION['user_id']."',sess_id='' where sess_id='".$_SESSION['guest_id']."'");
            $sql13=mysqli_query($con,"update coupon_applied set userid='".$_SESSION['user_id']."',sess_id='' 
			    	where sess_id='".$_SESSION['guest_id']."'");

            $order_id_asc = mysqli_query($con,"select order_id from order_master where userid = '".$_SESSION['user_id']."' and om_status=1 order by order_id limit 0,1");

				$order_id_desc = mysqli_query($con,"select order_id from order_master where userid = '".$_SESSION['user_id']."' and om_status=1 order by order_id desc limit 0,1");

				
				$gift_id_asc = mysqli_query($con,"select orderid from gift_card_master where userid = '".$_SESSION['user_id']."' and status=0 order by orderid limit 0,1");

				$gift_id_desc = mysqli_query($con,"select orderid from gift_card_master where userid = '".$_SESSION['user_id']."' and status=0 order by orderid desc limit 0,1");


				if(mysqli_num_rows($order_id_asc) || mysqli_num_rows($order_id_desc))
				{
					$order_asc_dtl = mysqli_fetch_array($order_id_asc);
					$order_desc_dtl = mysqli_fetch_array($order_id_desc);
					$order_asc_id = $order_asc_dtl['order_id'];
					$order_desc_id = $order_desc_dtl['order_id'];

					if(mysqli_num_rows($order_id_asc1))
                      $del_order = mysqli_query($con,"delete from order_id_generate where order_id='".$order_desc_id."'");   
					
					$sql1234=mysqli_query($con,"update order_master set order_id='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and om_status=1");
				    $sql1123=mysqli_query($con,"update gift_card_master set orderid='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql12343=mysqli_query($con,"update gift_card_applied set orderid='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql1343=mysqli_query($con,"update coupon_applied set orderid='".$order_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
                    
				
				}
				else if(mysqli_num_rows($gift_id_asc) || mysqli_num_rows($gift_id_desc))
				{
					$gift_asc_dtl = mysqli_fetch_array($gift_id_asc);
					$gift_desc_dtl = mysqli_fetch_array($gift_id_desc);
					$gift_asc_id = $gift_asc_dtl['orderid'];
					$gift_desc_id = $gift_desc_dtl['orderid'];
                    
                    if(mysqli_num_rows($gift_id_asc1))
                      $del_order = mysqli_query($con,"delete from order_id_generate where order_id='".$gift_desc_id."'");
					
					$sql1234=mysqli_query($con,"update order_master set order_id='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and om_status=1");
				    $sql1123=mysqli_query($con,"update gift_card_master set orderid='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql12343=mysqli_query($con,"update gift_card_applied set orderid='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");
				    $sql1343=mysqli_query($con,"update coupon_applied set orderid='".$gift_asc_id."' where userid='".$_SESSION['user_id']."' and status=0");

				}
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
	$sdate=mysqli_real_escape_string($con,trim($_POST['date']));
	$timings=mysqli_real_escape_string($con,trim($_POST['timings']));
	$address=mysqli_real_escape_string($con,trim($_POST['address']));
	$comments=mysqli_real_escape_string($con,trim($_POST['comments']));
	$sr_id=mysqli_real_escape_string($con,trim($_POST['sr_id']));
	$date=date("Y-m-d H:i:s");

	$sql1=mysqli_query($con,"select sr_title from showroom_master where sr_id=$sr_id");
	$r1=mysqli_fetch_array($sql1);
	$stitle=$r1['sr_title'];

	$time=$sdate." ".$timings;
	$sql=mysqli_query($con,"select * from appointment_master where srid=$sr_id and 	a_timings='".$time."'");
	if(mysqli_num_rows($sql))
	{
		echo "Fail";
	}
	else
	{
		$sql1=mysqli_query($con,"insert into appointment_master(a_name,a_email,a_phone,a_timings,a_address,a_comments,srid,created_date)
			values('".$name."','".$email."','".$phone."','".$time."','".$address."','".$comments."','".$sr_id."','".$date."')");

			$message="<table>
					<tr>
						<td width=200> <strong>Booked For</strong></td>
						<td width=100>&nbsp;</td>
						<td>$stitle</td>
					</tr>
					<tr>
						<td width=200> <strong>Name</strong></td>
						<td width=100>&nbsp;</td>
						<td>$name</td>
					</tr>
					<tr>
						<td width=200> <strong>Email</strong></td>
						<td width=100>&nbsp;</td>
						<td>$email</td>
					</tr>
					<tr>
						<td width=200> <strong>Phone</strong></td>
						<td width=100>&nbsp;</td>
						<td>$phone</td>
					</tr>
					<tr>
						<td width=200> <strong>Timings</strong></td>
						<td width=100>&nbsp;</td>
						<td>$time</td>
					</tr>
					<tr>
						<td width=200> <strong>Address</strong></td>
						<td width=100>&nbsp;</td>
						<td>$address</td>
					</tr>
					<tr>
						<td width=200> <strong>Comments</strong></td>
						<td width=100>&nbsp;</td>
						<td>$comments</td>
					</tr>
				 </table>";

		$to="appointment@dccustomclothiers.com";
		$subject="New Appointment";
        $headers = "From: $name <$email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($to,$subject,$message,$headers);

		echo "Success";
	}
}



if(isset($_POST['place_order']) && $_POST['payment-methods'] == 'Cash on Delivery')
{
	$uid=$_SESSION['user_id'];
	$a_id=mysqli_real_escape_string($con,trim($_POST['a_id']));
    $oid=mysqli_real_escape_string($con,trim($_POST['o_id']));
    $message="";$tot="";$i=0;
    $tax=$site->get_tax($uid);    
    $a1=array();$a2=array();$b1=0;$b2=0;
    $gift=mysqli_query($con,"select * from gift_card_master where userid=$uid and status=0 order by created_date desc");
    $update_order_id =mysqli_query($con,"update order_master set order_id='$oid' where userid='".$_SESSION['user_id']."' 
    	and om_status=1");
    $sql1=mysqli_query($con,"update order_master set om_status=0,ship_id=$a_id where order_id='$oid'");
    $sql=mysqli_query($con,"select a.*,a.created_date as c_date,b.p_description from order_master a,
    		product_master b where a.order_id='$oid' and a.pid=b.p_id and a.om_status=0 order by a.created_date desc");
    $user_dtl_qry=mysqli_query($con,"select * from user_master where user_id='".$_SESSION['user_id']."'");
    $shipping_dtl_qry = mysqli_query($con,"select shipping_cost from payment_information");

    

    if(mysqli_num_rows($shipping_dtl_qry) > 0)
    {
        	$s_dtl = mysqli_fetch_array($shipping_dtl_qry);
        	if($_dtl!='' || $_dtl!='0')
        	{
                $sp_cost = $s_dtl['shipping_cost'];
        	} 
        	else
        	{
        		$sp_cost='Free';
        	}
    }
    if(mysqli_num_rows($user_dtl_qry) > 0)
    {
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
        $tot5=$tot+5;               
        $res[0]['price']=$tot;
        /* Order History Mail Template */
        $name = $user_dtl['username'];
        $email = $user_dtl['email'];
        $mobile = $user_dtl['mobile'];
        $date=date('Y-m-d H:i:s');
        $ship_dtl_qry = mysqli_query($con,"select * from shipping_address where 
        			userid=".$_SESSION['user_id']." and sa_id=".$a_id."");
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

        $insert_order_info =mysqli_query($con,"insert into payment_master(orderid,trans_id,amount,
        	payment_type,status,userid,date,created_date) values('".$res[0]['order_id']."','','".$tot5."',
        	'".$_POST['payment-methods']."','Completed','".$_SESSION['user_id']."',
      		'".$res[0]['created_date']."','".$date."')");
        
        $py_id=mysqli_insert_id($con);
       	if($insert_order_info)
       	{
       		$message .= '
		        <div style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0; font-size:12px;
		        		font-family:Arial,Helvetica,sans-serif;color:#000">    
							<center>
		            <table width="100%" border="0" cellspacing="0" cellpadding="0">
							    <tr>
							    	<td align="center" style="background-color:#ffffff;">
							    		<table width="580" cellspacing="0" cellpadding="0" border="0" align="center" style="padding:24px;background-color:#ffffff; font-size:12px;
							    			font-family:Arial,Helvetica,sans-serif;color:#000">      
					      				<tr>
					        				<td width="580">&nbsp;</td>
											  </tr>
											  <tr>
											  	<td align="center"><p style="color:#000; font-size:16px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-weight:bold;">
											           <strong>CUTOM CLOTHIERS ORDER INFORMATION</strong></p>
													</td>
											  </tr>
											  <tr>
											    <td>&nbsp;</td>
											  </tr>
											  <tr>
													<td align="left" style="background-color:#737373;">
												    <table width="100%" border="0" cellspacing="0" cellpadding="0">
												  		<tr>
														    <td width="100%">
														    	<p style="color:#fff; margin-top:5px; margin-bottom:0px; padding-left:15px; font-size:13px; line-height:25px">Order Number: '.$oid.'</p>
														   	 <p style="color:#fff; margin-top:5px; margin-bottom:0px; padding-left:15px; font-size:13px; line-height:25px">Ordered Date: '.date('M d, Y').'</p>
														    </td>
														  </tr>
												  	</table>
												 </td>
												</tr>
											  <tr>
											    <td>
											      <table width="100%" border="0" cellspacing="0" cellpadding="0">
											        <tr>
											          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Sold To</strong></td>
											          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-bottom:0;"><strong>Ship To</strong></td>
											        </tr>
											        <tr>
											      	  <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; border-right:0; font-size:13px;">
											      	  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
											            </table>
											          </td>
											          <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; font-size:13px;">
											          	<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
									        <td>
									        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
									          	<tr>
									            	<td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Shipping Method</strong>
									            	</td>
									            	<td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-bottom:0;"><strong>Payment Method</strong></td>
									            </tr>
									            <tr>
										            <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; border-right:0; font-size:13px;">
										            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
										              	<tr>
										                 <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">Shipping Fee - '.$sp_cost.'</td>
										                </tr>						              
										              </table>
										            </td>
												        <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; font-size:13px;">
												            <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
											    	<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" 
											    		style="margin-left:auto; margin-right:auto;">
											        <tr>
											        	<td height="10" colspan="6">&nbsp;</td>
											        </tr>
											        <tr>
											        	<td colspan="6" style="padding:5px 10px; background-color:#ffffff; 
											        	border:1px solid #dddddd; border-bottom:0;"><strong>Items Ordered</strong></td>
											        </tr>
											        <tr>
											          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Product Name</strong></td>
											          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Price</strong></td>
											          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Qty</strong></td>
											          <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Total</strong></td>
											        </tr>';
			                       $r = mysqli_fetch_array($sql);$tot1='';
			                       foreach( $sql as $key=>$value )
			                       	{
			                       	  $tot1= ($value['om_quantity'] * $value['om_price']);
									$product_name_qry = mysqli_query($con,'select p_name from product_master 
											where p_id = '.$value['pid'].'');
									    					if($product_name_qry) 
									    					{
				                       	  $product_dtl = mysqli_fetch_array($product_name_qry);                      	  
				                       	  if($value['om_style']!='') 
				                       	  {
				                       	    $p_name = "Custom ". $product_dtl['p_name'];
				                       	  }
				                       	  else
				                       	  {
			                                $p_name = $product_dtl['p_name'];
				                       	  }
															  }
																$created_date = $value['created_date'];
									   					  $message .=  '
								   							<tr>
											  					<td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">'.$p_name.'</td>
										      				<td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">$'.$value['om_price'].'</td>
											  					<td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">'.$value['om_quantity'].'</td>
											  					<td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd;  border-top:0;">$'.$tot1.'</td>
																</tr>';
															}
															 if(mysqli_num_rows($gift))
																{
																  while($gr=mysqli_fetch_array($gift))
																  {
															      	$a1[$b1]=$gr['amount'] * $gr['quantity'];
															       $message.=' 
															       <tr>
																		 	 <td style="padding:5px 10px; border:1px solid #dddddd;border-right:0;">Gift Card</td>
																		   <td style="padding:5px 10px; border:1px solid #dddddd;border-right:0;">$'.$gr['amount'].'
																		   </td>
																			 <td style="padding:5px 10px; border:1px solid #dddddd;border-right:0;">'.$gr['quantity'].'
																			 </td>
																			 <td style="padding:5px 10px; border:1px solid #dddddd;">
																				        	$'.$gr['amount'] * $gr['quantity'].'</td>
																			</tr>';$b1++;
																	}
																}
													     	$message .=	'
													     	  <tr>
																	  <td colspan="5" bgcolor="#FFFFFF" style="background-color:#ffffff; border:1px solid #dddddd; border-top:0;">
																	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
																	      <tr>
																	        <td align="right" style="padding:5px 10px; background-color:#efefef;">Sub Total</td>
																	        <td align="right" style="padding:5px 10px; background-color:#efefef;">$'.number_format($tot + array_sum($a1),2).'</td>
																	        </tr>
																	       <tr>
																	        <td align="right" style="padding:5px 10px; background-color:#efefef;">Tax</td>
																	        <td align="right" style="padding:5px 10px; background-color:#efefef;">'.number_format($tax,2).'%</td>
																	        </tr>
																	      <tr>
																	      <tr>
																	        <td align="right" style="padding:5px 10px; background-color:#efefef;">Shipping</td>
																	        <td align="right" style="padding:5px 10px; background-color:#efefef;">$'.number_format($sp_cost,2).'</td>
																	        </tr>
																				</tr>';
																	      $app=mysqli_query($con,"select * from gift_card_applied where userid=$uid and status=0");
																	     if(mysqli_num_rows($app))
																	     {
																	     		$message.='
																	     		<tr>
																	     	 		<td align="right" style="padding:5px 10px; background-color:#efefef;"><strong>Gift Voucher</strong></td>
																     	 			<td style="padding:5px 10px; background-color:#efefef;"></td>
																	     		</tr>';
																	     		$ar=mysqli_fetch_array($app);
																	     		/*while($ar=mysqli_fetch_array($app))
																	     		{*/
																	     			$a2[$b2]=$g_amt=$ar['amount'];
																	       			$message.='
																		       		<tr>
																		        		<td align="right" style="padding:5px 10px; background-color:#efefef;font-size:12px;">'.$ar['code'].'</td>
																		        		<td align="right" style="padding:5px 10px; background-color:#efefef;font-size:12px;">$'.number_format($ar['amount'],2).'</td>
																	        		</tr>';$b2++;
																	  			//}
																		}
																		 $coupon_applied=mysqli_query($con,"select * from coupon_applied where userid=$uid and status=0");
																	    if(mysqli_num_rows($coupon_applied))
																	    {
																	    	$cr=mysqli_fetch_array($coupon_applied);
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
																		        $message .=
																		        '<tr>
																		        	<td align="right" style="padding:5px 10px; background-color:#efefef;">
																		        		<strong>Coupon <small>( '.$cr['code'].' )</small></strong>
																		        	</td>
																     	 			<td align="right" style="padding:5px 10px; background-color:#efefef;">';
																     	 				if($cr['coupon_type']=="$")
																     	 					$message .= "$".number_format($cr['value'],2);
																     	 				else if($cr['coupon_type']=="Discount")
																     	 					$message .= number_format($cr['value'],2)."%";
																     	 				else if($cr['coupon_type']=="Free Shipping")
																     	 					$message .= "Free Shipping";
																     	 			'</td>
																		        </tr>';
																	    }
																	    
																				$tp=(((($tot + array_sum($a1)) -  array_sum($a2)) - $dis)  /100) * $tax;
																				$full_t=number_format((($tot+ $tp + $sp_cost + array_sum($a1)) - array_sum($a2)) - $dis,2);
																				$message.='  
																				<tr>
																					<td width="78%" align="right" style="padding:5px 10px; background-color:#efefef;">
																						<strong>Grand Total</strong>
																					</td>
																					<td width="22%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>$'.
																						number_format((($tot + $tp + $sp_cost + array_sum($a1)) - array_sum($a2)) - $dis,2).'</strong>
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
													          <td colspan="6" align="center"><p style="font-size:13px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d; font-weight:bold; margin-top:0; margin-bottom:0; padding-left:5px;"> <strong>IF YOU NEED FURTHER ASSISTANCE, PLEASE FEEL FREE To CONTACT US AT CUSTOM CLOTHIERS</strong> <br /><br />
													            <strong style="color:#000000; font-size:20px">THANK YOU FOR YOUR BUSINESS!</strong></p>
													            <p style="font-size:14px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d;"> Order Status: You can check your order status and and also review your order history here <a href="www.dccustomclothiers.com" style="color:#000000;">dccustomclothiers.com</a></p>
													            <p style="font-size:12px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d; font-weight:bold; margin-top:0; margin-bottom:0; padding-left:5px;">&nbsp;</p></td>
													        </tr>
												    </table>
												  </td>      
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</center>
						</div>';
       	}
       		$subject="Custom Clothiers Order History Information";
			$headers = "From: Custom Clothiers <support@dccustomclothiers.com> \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($email,$subject,$message,$headers);
			$up_py=mysqli_query($con,"update payment_master set orderid='$oid', amount='".filter_var($full_t,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where pm_id=$py_id");
      }
      /*Start Gift Card*/
       $gift_update=mysqli_query($con,"update gift_card_master set status=1,orderid='$oid' where userid=$uid and 
       	status=0");
       $gift_app_update=mysqli_query($con,"update gift_card_applied set status=1,orderid='$oid' where userid=$uid 
       	and status=0");
       $coupon_app_update=mysqli_query($con,"update coupon_applied set status=1,orderid='$oid' where userid=$uid 
       	and status=0");
        $g_message="";
        $get_gift=mysqli_query($con,"select * from gift_card_master where orderid='$oid' and status=1 order by created_date desc");
        if(mysqli_num_rows($get_gift))
        {
        	$u11=mysqli_query($con,"select email,firstname,lastname,province,country,city from user_master where user_id=$uid");
						$u1=mysqli_fetch_array($u11);
						$province=$u1['province'];$country=$u1['country'];$city=$u1['city'];
					    $fname=$u1['firstname'];$lname=$u1['lastname'];$amount=$g11['amount'];$i=0;
            while($g11=mysqli_fetch_array($get_gift))
            {
            	$g_message.= '
              	<div style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0; font-size:12px;
              			font-family:Arial,Helvetica,sans-serif;color:#000">    
	              	<center>
	               		<table width="100%" border="0" cellspacing="0" cellpadding="0">
					     				<tr>
					    					<td align="center" style="background-color:#ffffff;">
					    						<table width="580" cellspacing="0" cellpadding="0" border="0" align="center" 
					    							style="padding:24px;background-color:#ffffff; font-size:12px;
					    							font-family:Arial,Helvetica,sans-serif;color:#000">      
					      						<tr>
					        						<td width="580">&nbsp;</td>
					      						</tr>
											      <tr>
											        <td align="center"><p style="color:#000; font-size:16px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-weight:bold;">
											           <strong>CUSTOM CLOTHIERS GIFT CARD INFORMATION</strong></p></td>
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
													                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">&nbsp;</td>
													              </tr>
													              <tr>
													                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">'.$fname.' '.$lname.'</strong></td>
													              </tr>
													              <tr>
													                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;"><p>'.$province.'</p></td>
													              </tr>
																				<tr>
													                <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;"><p>'.$country.'</p>
													                </td>
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
											       	<td valign="top">
											       	</td>
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
														        	border-right:0;">'.$g11['quantity'].'</td>
														        	<td style="padding:5px 10px; border:1px solid #dddddd;font-size:12px;">$'.number_format($g11['amount'] * $g11['quantity'],2).'</td>
													        </tr>
													        <tr>
															  		<td colspan="5" bgcolor="#FFFFFF" style="background-color:#ffffff; border:1px solid #dddddd; border-top:0;">
																	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
																	      <tr>
																	        <td align="right" style="padding:5px 10px; background-color:#efefef;">Sub Total</td>
																	        <td align="right" style="padding:5px 10px; background-color:#efefef;">$'.number_format($g11['amount'] * $g11['quantity'],2).'</td>
																	      </tr>
																	      <tr>
																	        <td width="78%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>Grand Total</strong></td>
																	        <td width="22%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>$'.number_format($g11['amount'] * $g11['quantity'],2).'</strong></td>
																        </tr>
																      </table>
																    </td>
																  </tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</center>
								</div>';
								$i++;
								if($i==mysqli_num_rows($get_gift))
								{
									if($g11['gift_type']=="someone")
					        {
					        	 $g_email=$g11['recipient_mail'];
						         if($g_email!='')
					        		{
						        			$subject="Custom Clothiers Gift Card";
				                	$headers = "From: Custom Clothiers <support@dccustomclothiers.com> \r\n";
				                	$headers .= "MIME-Version: 1.0\r\n";
				                	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				                 	mail($g_email,$subject,$g_message,$headers);
				              }
					        }
					        else if($g11['gift_type']=="myself")
					        {
					        	$g_email=$u1['email'];
					        	if($g_email!='')
					        	{
						        	$subject="Custom Clothiers Gift Card";
				                	$headers = "From: Custom Clothiers <support@dccustomclothiers.com> \r\n";
				                	$headers .= "MIME-Version: 1.0\r\n";
				                	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				                 	mail($g_email,$subject,$g_message,$headers);
				            }
					        }
					      }
						}
				}

				/*End Gift Card*/
        /* Sales Track Update*/
        $date=date('Y-m-d');
        $date1=date('Y-m-d H:i:s');
     		$sql11=mysqli_query($con,"select b.sub_cat_id from order_master a ,sub_category_master b where 
     			a.order_id='$oid' and a.subcatid=b.sub_cat_id");
		    while($r11=mysqli_fetch_array($sql11))
		     {
		        if($r11['sub_cat_id']==1){$col="t_suits";}elseif($r11['sub_cat_id']==2){$col="t_shirts";}
		        elseif($r11['sub_cat_id']==3){$col="t_blazers";}
		        elseif($r11['sub_cat_id']==4){$col="t_trousers";}
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
		     $his=mysqli_query($con,"insert into order_history_master(userid,orderid,pay_type,tot_amount,shipping_cost,tax,oh_date,created_date)values($uid,'$oid','Cash on Delivery','".filter_var($full_t,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."','$sp_cost',$tax,NOW(),NOW())");
		      $_SESSION['order_id']=$oid;
	        header("Location:{$homeurl}order-received/");

    }
    else
    {
      header("Location:{$homeurl}404/");
    }
}


/*Customizer Section*/

/*Custom Suit Insertion Starts */

$type= isset($con, $_POST['type']) ? $_POST['type']:'';


if($type=="1") {


if(isset($_POST['section']) && $_POST['section']=='style') {

	$_SESSION['suit']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
     		  'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
     		       'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');



  $_SESSION['suit']['style'] = array('base_price' => !empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']: '0',
            'type' => isset($_POST['type']) ? $_POST['type']:'',
            'pid' => isset($_POST['p_id']) ? $_POST['p_id']:'',
            'fab_default_price'=>isset($_POST['fab_price']) ? $_POST['fab_price']:'0',
            'waistcoat_price'=>!empty($_SESSION['customizer_price']['waistcoat']) ? $_SESSION['customizer_price']['waistcoat']:'0',
            'def_fab'=>isset($_POST['id_t4l_fabric_default']) ? $_POST['id_t4l_fabric_default']:'141',
            'def_waistcoat'=>isset($_POST['id_t4l_fabric_waistcoat']) ? $_POST['id_t4l_fabric_waistcoat']:'0',
            'suit_type'=>isset($_POST['suit_type']) ? $_POST['suit_type']:'0',
            'jacket_style'=>isset($_POST['jacket_style']) ? $_POST['jacket_style']:'0',
            'jacket_fit'=>isset($_POST['jacket_fit']) ? $_POST['jacket_fit']:'0',
            'jacket_lapel_type'=>isset($_POST['jacket_lapel_type']) ? $_POST['jacket_lapel_type']:'0',
            'jacket_buttons'=>isset($_POST['jacket_buttons']) ? $_POST['jacket_buttons']:'0',
            'jacket_chest_pocket'=>isset($_POST['jacket_chest_pocket']) ? $_POST['jacket_chest_pocket']:'0',
            'jacket_pockets'=>isset($_POST['jacket_pockets']) ? $_POST['jacket_pockets']:'0',
            'jacket_pockets_type'=>isset($_POST['jacket_pockets_type']) ? $_POST['jacket_pockets_type']:'0',
            'jacket_vent'=>isset($_POST['jacket_vent']) ? $_POST['jacket_vent']:'0',
            'jacket_sleeve_buttons'=>isset($_POST['jacket_sleeve_buttons']) ? $_POST['jacket_sleeve_buttons']:'0',
            'jacket_sleeve_buttonholes'=>isset($_POST['jacket_sleeve_buttonholes']) ? $_POST['jacket_sleeve_buttonholes']:'0',
            'waistcoat_style'=>isset($_POST['waistcoat_style']) ? $_POST['waistcoat_style']:'0',
            'waistcoat_buttons'=>isset($_POST['waistcoat_buttons']) ? $_POST['waistcoat_buttons']:'0',
            'waistcoat_chest_pocket'=>isset($_POST['waistcoat_chest_pocket']) ? $_POST['waistcoat_chest_pocket']:'0',
            'waistcoat_pockets'=>isset($_POST['waistcoat_pockets']) ? $_POST['waistcoat_pockets']:'0',
            'waistcoat_pockets_num'=>isset($_POST['waistcoat_pockets_num']) ? $_POST['waistcoat_pockets_num']:'0',
            'waistcoat_bottom'=>isset($_POST['waistcoat_bottom']) ? $_POST['waistcoat_bottom']:'0',
            'pants_fit'=>isset($_POST['pants_fit']) ? $_POST['pants_fit']:'0',
            'pants_back_pocket_type'=>isset($_POST['pants_back_pocket_type']) ? $_POST['pants_back_pocket_type']:'0',
            'pants_peg'=>isset($_POST['pants_peg']) ? $_POST['pants_peg']:'0',
            'pants_belt'=>isset($_POST['pants_belt']) ? $_POST['pants_belt']:'0',
            'pants_front_pocket'=>isset($_POST['pants_front_pocket']) ? $_POST['pants_front_pocket']:'0',
            'pants_back_pocket'=>isset($_POST['pants_back_pocket']) ? $_POST['pants_back_pocket']:'0',
            'pants_cuff'=>isset($_POST['pants_cuff']) ? $_POST['pants_cuff']:'0',
            'extra_pants' =>isset($_POST['extra_pants']) ? $_POST['extra_pants']:'0');
    
    $go_to = $_POST['go_to'];
    
    if($go_to == "fabric")
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab2_fabric/');

    else if($go_to == "extras")
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab3_accents/');
}

else if(isset($_POST['section']) && $_POST['section']=='fabric') {

	if(isset($_POST['instore_fabric']) && $_POST['instore_fabric']!='') {
        $fabric_name = $_POST['instore_fabric'];
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
    }
    else {
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
        $fabric_name='';
    }


     $_SESSION['suit']['fabric'] = array('fabric_id' => $fabric_id, 
              'fabric_price' => $fabric_price,
              'fabric_name' => $fabric_name);


    /*$_SESSION['suit']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
     		  'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0');*/

    $go_to = $_POST['go_to'];
  
    if($go_to == "configure")
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/style/');

    else if($go_to == "extras")
     header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab3_accents/');
}

else if(isset($_POST['section']) && $_POST['section']=='accents') {
 

  $_SESSION['suit']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
            'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0',
                 'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');


  $_SESSION['suit']['accents'] = array('jacket_lining_type' => isset($_POST['lining_jacket_radio']) ? $_POST['lining_jacket_radio'] : '',
            'lining_price' => isset($_POST['lining_jacket_price']) ? $_POST['lining_jacket_price']:'',
            'tot_price'=> (!empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']:'0') + (!empty($_SESSION['customizer_price']['waistcoat']) ? $_SESSION['customizer_price']['waistcoat']:'0') + (!empty($_SESSION['customizer_price']['extra_pant']) ? $_SESSION['customizer_price']['extra_pant']:'0') + (!empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0') + (!empty($_SESSION['customizer_price']['metal_buttons']) ? $_SESSION['customizer_price']['metal_buttons']:'0') + (!empty($_SESSION['customizer_price']['patches']) ? $_SESSION['customizer_price']['patches']:'0') + (!empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0') + (!empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0'),
            'jacket_lining_id' => isset($_POST['jacket_lining_id']) ? $_POST['jacket_lining_id']:'',
            'font_price' => isset($_POST['initials_jacket_price']) ? $_POST['initials_jacket_price']:'',
            'font_family' => isset($_POST['font_family']) ? $_POST['font_family']:'',
            'initials_jacket' => isset($_POST['initials_jacket']) ? $_POST['initials_jacket']:'',
            'monogram_color' => isset($_POST['initials_jacket1']) ? $_POST['initials_jacket1']:'',
            'type_of_button' => isset($_POST['metal_buttons_radio']) ? $_POST['metal_buttons_radio']:'',
            'metal_button_price' => !empty($_SESSION['customizer_price']['metal_buttons']) ? $_SESSION['customizer_price']['metal_buttons']:'0',
            'metal_btn_type' => isset($_POST['metal_buttons']) ? $_POST['metal_buttons']:'',
            'type_of_neck' => isset($_POST['neck_lining_radio']) ? $_POST['neck_lining_radio']:'',
            'neck_lining_price' => isset($_POST['neck_lining_price']) ? $_POST['neck_lining_price']:'',
            'neck_lining_type' => isset($_POST['neck_lining']) ? $_POST['neck_lining']:'',
            'type_of_elbow' => isset($_POST['patches_radio']) ? $_POST['patches_radio']:'',
            'elbow_price' => !empty($_SESSION['customizer_price']['patches']) ? $_SESSION['customizer_price']['patches']:'0',
            'elbow_type' => isset($_POST['patches']) ? $_POST['patches']:'',
            'type_pocket_square' => isset($_POST['handkerchief_radio']) ? $_POST['handkerchief_radio']:'', 
            'handkerchief_price' => !empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0',
            'pocket_square_type' => isset($_POST['handkerchief']) ? $_POST['handkerchief']:'',
            'type_of_colored_button_holes' => isset($_POST['button_holes_threads_jacket']) ? $_POST['button_holes_threads_jacket']:'',
            'lapel_color' => isset($_POST['placket_color']) ? $_POST['placket_color']:'',
            'button_holes_price' => !empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0',
            'colored_thread_type' => isset($_POST['button_holes_threads_jacket2']) ? $_POST['button_holes_threads_jacket2']:'',
            'colored_holes_type' => isset($_POST['button_holes_threads_jacket1']) ? $_POST['button_holes_threads_jacket1']:'');

    $go_to = $_POST['go_to'];
    $action = $_POST['action'];

    if($go_to!='extras') {
      if($go_to == "configure")
         header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/style/');
      
      else if($go_to == "fabric")
         header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab2_fabric/');
   }
   
   else {

        $gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
        $p_id=!empty($_SESSION['suit']['style']['pid']) ? $_SESSION['suit']['style']['pid']:'';
        $type=mysqli_real_escape_string($con,trim($_POST['type']));
        $order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $o_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $om_price=$_SESSION['suit']['accents']['tot_price'];
        $date=date('Y-m-d H:i:s');

        $query=mysqli_query($con,"select tax_per,tot_per from  product_master where p_id=$p_id");
        $q1=mysqli_fetch_array($query);
        if($q1['tax_per']!='' || $q1['tax_per']!='0')
        {
        	$tp=explode("-",$q1['tax_per']);
        	if($tp[0]=="%")
        		$tot_per=(($om_price / 100) * $tp[1]) + $om_price;
        	else
        		$tot_per=$om_price + $tp[1];
        }
        else
        {
        	$tax_per="";$tot_per=$om_price;
        }

        if($_SESSION['suit']['style']['pants_back_pocket']=='0')
        {
        	$pant_back_pocket_type='';
        }
        else
        {
        	$pant_back_pocket_type=$_SESSION['suit']['style']['pants_back_pocket_type'];
        }

        if($_SESSION['suit']['style']['jacket_sleeve_buttons']=='0')
        {
			$jacket_sleeve_buttonholes='';
        }
        else
        {
        	$jacket_sleeve_buttonholes=$_SESSION['suit']['style']['jacket_sleeve_buttonholes'];
        }

        if($_SESSION['suit']['style']['jacket_style']=='mao')
        {
			$jacket_lapel_type='';
			$jacket_buttons='';

        }
        else
        {
        	$jacket_lapel_type=$_SESSION['suit']['style']['jacket_lapel_type'];
			$jacket_buttons=$_SESSION['suit']['style']['jacket_buttons'];
			
        }


        if($_SESSION['suit']['style']['suit_type']=='man_suit3') {
          $style = "{suit_type: ".$_SESSION['suit']['style']['suit_type'].",waistcoat_price: ".$_SESSION['suit']['style']['waistcoat_price'].",jacket_style: ".$_SESSION['suit']['style']['jacket_style'].",jacket_fit: ".$_SESSION['suit']['style']['jacket_fit'].",jacket_lapels: ".$jacket_lapel_type.",jacket_buttons: ".$jacket_buttons.",jacket_chest_pocket: ".$_SESSION['suit']['style']['jacket_chest_pocket'].",jacket_pockets: ".$_SESSION['suit']['style']['jacket_pockets'].",jacket_pockets_type: ".$_SESSION['suit']['style']['jacket_pockets_type'].",jacket_vent: ".$_SESSION['suit']['style']['jacket_vent'].",jacket_sleeve_buttons: ".$_SESSION['suit']['style']['jacket_sleeve_buttons'].",jacket_sleeve_buttonholes: ".$jacket_sleeve_buttonholes.",waistcoat_style: ".$_SESSION['suit']['style']['waistcoat_style'].",waistcoat_buttons: ".$_SESSION['suit']['style']['waistcoat_buttons'].",waistcoat_chest_pocket: ".$_SESSION['suit']['style']['waistcoat_chest_pocket'].",waistcoat_pockets: ".$_SESSION['suit']['style']['waistcoat_pockets'].",waistcoat_pockets_num: ".$_SESSION['suit']['style']['waistcoat_pockets_num'].",waistcoat_bottom: ".$_SESSION['suit']['style']['waistcoat_bottom'].",pants_fit: ".$_SESSION['suit']['style']['pants_fit'].",pants_peg: ".$_SESSION['suit']['style']['pants_peg'].",pants_belt: ".$_SESSION['suit']['style']['pants_belt'].",pants_front_pocket: ".$_SESSION['suit']['style']['pants_front_pocket'].",pants_back_pocket: ".$_SESSION['suit']['style']['pants_back_pocket'].",pants_back_pocket_type: ".$pant_back_pocket_type.",pants_cuff: ".$_SESSION['suit']['style']['pants_cuff'].",extra_pants:".$_SESSION['suit']['style']['extra_pants']."}"; 
        }
        else {
          $style = "{suit_type: ".$_SESSION['suit']['style']['suit_type'].",jacket_style: ".$_SESSION['suit']['style']['jacket_style'].",jacket_fit: ".$_SESSION['suit']['style']['jacket_fit'].",jacket_lapels: ".$jacket_lapel_type.",jacket_buttons: ".$jacket_buttons.",jacket_chest_pocket: ".$_SESSION['suit']['style']['jacket_chest_pocket'].",jacket_pockets: ".$_SESSION['suit']['style']['jacket_pockets'].",jacket_pockets_type: ".$_SESSION['suit']['style']['jacket_pockets_type'].",jacket_vent: ".$_SESSION['suit']['style']['jacket_vent'].",jacket_sleeve_buttons: ".$_SESSION['suit']['style']['jacket_sleeve_buttons'].",jacket_sleeve_buttonholes: ".$jacket_sleeve_buttonholes.",pants_fit: ".$_SESSION['suit']['style']['pants_fit'].",pants_peg: ".$_SESSION['suit']['style']['pants_peg'].",pants_belt: ".$_SESSION['suit']['style']['pants_belt'].",pants_front_pocket: ".$_SESSION['suit']['style']['pants_front_pocket'].",pants_back_pocket: ".$_SESSION['suit']['style']['pants_back_pocket'].",pants_back_pocket_type: ".$pant_back_pocket_type.",pants_cuff: ".$_SESSION['suit']['style']['pants_cuff'].",extra_pants:".$_SESSION['suit']['style']['extra_pants']."}"; 
        }

        $fabric = "{fabric_price: ".$_SESSION['suit']['fabric']['fabric_price'].",fabric_id: ".$_SESSION['suit']['fabric']['fabric_id'].",fabric_name:".$_SESSION['suit']['fabric']['fabric_name']."}";
        
        if($_SESSION['suit']['accents']['button_holes_price']!='') {
        $type_of_colored_button_holes = $_SESSION['suit']['accents']['type_of_colored_button_holes'];
        }

        if($_SESSION['suit']['accents']['initials_jacket']!='')
        {
        	$font_price=$_SESSION['suit']['accents']['font_price'];
        	$font_family=$_SESSION['suit']['accents']['font_family'];
        	$initials_jacket=$_SESSION['suit']['accents']['initials_jacket'];
        	$monogram_color=$_SESSION['suit']['accents']['monogram_color'];

        }
        
        $accents = "{jacket_lining_type: ".$_SESSION['suit']['accents']['jacket_lining_type'].",lining_price: ".$_SESSION['suit']['accents']['lining_price'].",jacket_lining_id: ".$_SESSION['suit']['accents']['jacket_lining_id'].",font_price: ".$font_price.",font_family: ".$font_family.",initials_jacket: ".$initials_jacket.",monogram_color: ".$monogram_color.",type_of_button: ".$_SESSION['suit']['accents']['type_of_button'].",metal_button_price: ".$_SESSION['suit']['accents']['metal_button_price'].",metal_btn_type: ".$_SESSION['suit']['accents']['metal_btn_type'].",type_of_neck: ".$_SESSION['suit']['accents']['type_of_neck'].",neck_lining_price: ".$_SESSION['suit']['accents']['neck_lining_price'].",neck_lining_type: ".$_SESSION['suit']['accents']['neck_lining_type'].",type_of_elbow: ".$_SESSION['suit']['accents']['type_of_elbow'].",elbow_price: ".$_SESSION['suit']['accents']['elbow_price'].",elbow_type: ".$_SESSION['suit']['accents']['elbow_type'].",type_pocket_square: ".$_SESSION['suit']['accents']['type_pocket_square'].",handkerchief_price: ".$_SESSION['suit']['accents']['handkerchief_price'].",pocket_square_type: ".$_SESSION['suit']['accents']['pocket_square_type'].",type_of_colored_button_holes: ".$type_of_colored_button_holes.",lapel_color: ".$_SESSION['suit']['accents']['lapel_color'].",button_holes_price: ".$_SESSION['suit']['accents']['button_holes_price'].",colored_thread_type: ".$_SESSION['suit']['accents']['colored_thread_type'].",colored_holes_type: ".$_SESSION['suit']['accents']['colored_holes_type']."}";
        $p_type="suits";

        if(isset($_SESSION['user_id'])) {
           $where=" userid=".$_SESSION['user_id']."";
        }
        else {
           $where=" sess_id='".$_SESSION['guest_id']."'";
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
                $gift=mysqli_query($con,"select orderid from gift_card_master where 
				$where and status=0");
				if(mysqli_num_rows($gift) > 0)
				{
					$g1=mysqli_fetch_array($gift);
					$order_id=$g1['orderid'];
				}
				else
				{
					$get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
					$r=mysqli_fetch_array($get_oid);
					if($r['oid']!='0')
					{
						$a = str_replace("CC","",$r['oid']);
						$order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
					}
					else
					{
						$order_id="CC00000001";
					}
					$sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$order_id."',NOW(),NOW())");
				}
            }
            $sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_fab,om_accents,order_status,created_date,last_updated)
             values('".$order_id."','".$p_id."','".$user_id."','".$gid."',1,'".$p_type."',1,'".$om_price."','".$style."','".$fabric."','".$accents."','Processing','".$date."','".$date."')");            
            unset($_SESSION['suit']['style']);
            unset($_SESSION['suit']['fabric']);
            unset($_SESSION['suit']['accents']);
            unset($_SESSION['p_dtl1']);
            unset($_SESSION['customizer_price']);
            header("Location:{$homeurl}shopping-cart/$order_id/");
        } 
        else
        {
              $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_fab='".$fabric."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
              unset($_SESSION['suit']['style']);
              unset($_SESSION['suit']['fabric']);
              unset($_SESSION['suit']['accents']);
              unset($_SESSION['p_dtl1']);
              unset($_SESSION['customizer_price']);
              header("Location:{$homeurl}shopping-cart/$order_id/");
         }
     }
  }
}

if($type=="4") {

if(isset($_POST['section']) && $_POST['section']=='style') {

	$_SESSION['pant']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
              'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
                   'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');


    $_SESSION['pant']['style'] = array('base_price' => !empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']: '0',
            'type' => isset($_POST['type']) ? $_POST['type']:'',
            'pid' => isset($_POST['p_id']) ? $_POST['p_id']:'',
            'fab_default_price'=>isset($_POST['fab_price']) ? $_POST['fab_price']:'0',
            'def_fab'=>isset($_POST['id_t4l_fabric_default']) ? $_POST['id_t4l_fabric_default']:'141',
            'def_waistcoat'=>isset($_POST['id_t4l_fabric_waistcoat']) ? $_POST['id_t4l_fabric_waistcoat']:'0',
            'pants_fit'=>isset($_POST['pants_fit']) ? $_POST['pants_fit']:'0',
            'pants_back_pocket_type'=>isset($_POST['pants_back_pocket_type']) ? $_POST['pants_back_pocket_type']:'0',
            'pants_peg'=>isset($_POST['pants_peg']) ? $_POST['pants_peg']:'0',
            'pants_belt'=>isset($_POST['pants_belt']) ? $_POST['pants_belt']:'0',
            'pants_front_pocket'=>isset($_POST['pants_front_pocket']) ? $_POST['pants_front_pocket']:'0',
            'pants_back_pocket'=>isset($_POST['pants_back_pocket']) ? $_POST['pants_back_pocket']:'0',
            'pants_cuff'=>isset($_POST['pants_cuff']) ? $_POST['pants_cuff']:'0');
   
    $go_to = $_POST['go_to'];
   
    if($go_to == "fabric")
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab2_fabric/');
   }

 else if(isset($_POST['section']) && $_POST['section']=='fabric') {

 	if(isset($_POST['instore_fabric']) && $_POST['instore_fabric']!='') {
        $fabric_name = $_POST['instore_fabric'];
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
    }
    else {
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
        $fabric_name='';
    }
    
     $_SESSION['pant']['fabric'] = array('fabric_id' => $fabric_id, 
              'fabric_price' => $fabric_price,
              'fabric_name' => $fabric_name);

	/*$_SESSION['pant']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
              'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0');*/

    $go_to = $_POST['go_to'];
    $action = $_POST['action'];
  
    if($go_to == "configure") {
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/style/');
    }

    else {
    	$gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
        $p_id=!empty($_SESSION['pant']['style']['pid']) ? $_SESSION['pant']['style']['pid']:'';
        $type=mysqli_real_escape_string($con,trim($_POST['type']));
        $order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $o_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $om_price=  (!empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']:'0') + (!empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0');
        $date=date('Y-m-d H:i:s');

        $query=mysqli_query($con,"select tax_per,tot_per from  product_master where p_id=$p_id");
        $q1=mysqli_fetch_array($query);
        if($q1['tax_per']!='' || $q1['tax_per']!='0')
        {
        	$tp=explode("-",$q1['tax_per']);
        	if($tp[0]=="%")
        		$tot_per=(($om_price / 100) * $tp[1]) + $om_price;
        	else
        		$tot_per=$om_price + $tp[1];
        }
        else
        {
        	$tax_per="";$tot_per=$om_price;
        }

        if($_SESSION['pant']['style']['pants_back_pocket']=='0')
        {
          $pants_back_pocket_type='';
        }
        else
        {
         $pants_back_pocket_type=$_SESSION['pant']['style']['pants_back_pocket_type'];
        }

        $style = "{pants_fit: ".$_SESSION['pant']['style']['pants_fit'].",pants_peg: ".$_SESSION['pant']['style']['pants_peg'].",pants_belt: ".$_SESSION['pant']['style']['pants_belt'].",pants_front_pocket: ".$_SESSION['pant']['style']['pants_front_pocket'].",pants_back_pocket: ".$_SESSION['pant']['style']['pants_back_pocket'].",pants_back_pocket_type: ".$pants_back_pocket_type.",pants_cuff: ".$_SESSION['pant']['style']['pants_cuff']."}"; 
        

        $fabric = "{fabric_price: ".$_SESSION['pant']['fabric']['fabric_price'].",fabric_id: ".$_SESSION['pant']['fabric']['fabric_id'].",fabric_name:".$_SESSION['pant']['fabric']['fabric_name']."}";
        
        $p_type="trousers";

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
                $gift=mysqli_query($con,"select orderid from gift_card_master where 
				$where and status=0");
				if(mysqli_num_rows($gift) > 0)
				{
					$g1=mysqli_fetch_array($gift);
					$order_id=$g1['orderid'];
				}
				else
				{
					$get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
					$r=mysqli_fetch_array($get_oid);
					if($r['oid']!='0')
					{
						$a = str_replace("CC","",$r['oid']);
						$order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
					}
					else
					{
						$order_id="CC00000001";
					}
					$sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$order_id."',NOW(),NOW())");
				}
            }

            $sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_fab,om_accents,order_status,created_date,last_updated)
             values('".$order_id."','".$p_id."','".$user_id."','".$gid."',4,'".$p_type."',1,'".$om_price."','".$style."','".$fabric."','','Processing','".$date."','".$date."')");            
            unset($_SESSION['pant']['style']);
            unset($_SESSION['pant']['fabric']);
            unset($_SESSION['p_dtl1']);
            unset($_SESSION['customizer_price']);
            header("Location:{$homeurl}shopping-cart/$order_id/");
        } 
        else
        {
              $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_fab='".$fabric."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
              unset($_SESSION['pant']['style']);
              unset($_SESSION['pant']['fabric']);
              unset($_SESSION['p_dtl1']);
              unset($_SESSION['customizer_price']);
              header("Location:{$homeurl}shopping-cart/$order_id/");
        }
    }
  }
}

else if($type=="3") {

if(isset($_POST['section']) && $_POST['section']=='style') {

	$_SESSION['jacket']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
     'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
          'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');


  $_SESSION['jacket']['style'] = array('base_price' => !empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']: '0',
            'type' => isset($_POST['type']) ? $_POST['type']:'',
            'pid' => isset($_POST['p_id']) ? $_POST['p_id']:'',
            'fab_default_price'=>isset($_POST['fab_price']) ? $_POST['fab_price']:'0',
            'def_fab'=>isset($_POST['id_t4l_fabric_default']) ? $_POST['id_t4l_fabric_default']:'141',
            'jacket_style'=>isset($_POST['jacket_style']) ? $_POST['jacket_style']:'0',
            'jacket_fit'=>isset($_POST['jacket_fit']) ? $_POST['jacket_fit']:'0',
            'jacket_lapel_type'=>isset($_POST['jacket_lapel_type']) ? $_POST['jacket_lapel_type']:'0',
            'jacket_buttons'=>isset($_POST['jacket_buttons']) ? $_POST['jacket_buttons']:'0',
            'jacket_chest_pocket'=>isset($_POST['jacket_chest_pocket']) ? $_POST['jacket_chest_pocket']:'0',
            'jacket_pockets'=>isset($_POST['jacket_pockets']) ? $_POST['jacket_pockets']:'0',
            'jacket_pockets_type'=>isset($_POST['jacket_pockets_type']) ? $_POST['jacket_pockets_type']:'0',
            'jacket_vent'=>isset($_POST['jacket_vent']) ? $_POST['jacket_vent']:'0',
            'jacket_sleeve_buttons'=>isset($_POST['jacket_sleeve_buttons']) ? $_POST['jacket_sleeve_buttons']:'0',
            'jacket_sleeve_buttonholes'=>isset($_POST['jacket_sleeve_buttonholes']) ? $_POST['jacket_sleeve_buttonholes']:'0'
       );
      
      $go_to = $_POST['go_to'];
    
      if($go_to == "fabric")
        header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab2_fabric/');

      else if($go_to == "extras")
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab3_accents/');
}

else if(isset($_POST['section']) && $_POST['section']=='fabric') {

	if(isset($_POST['instore_fabric']) && $_POST['instore_fabric']!='') {
        $fabric_name = $_POST['instore_fabric'];
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
    }
    else {
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
        $fabric_name='';
    }
    
     $_SESSION['jacket']['fabric'] = array('fabric_id' => $fabric_id, 
              'fabric_price' => $fabric_price,
              'fabric_name' => $fabric_name);
    
    /*$_SESSION['jacket']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
     'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0');*/

    $go_to = $_POST['go_to'];
  
    if($go_to == "configure")
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/style/');
    
    else if($go_to == "extras")
     header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab3_accents/');
}

else if(isset($_POST['section']) && $_POST['section']=='accents') {

  $_SESSION['jacket']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
            'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
                 'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');


  $_SESSION['jacket']['accents'] = array('jacket_lining_type' => isset($_POST['lining_jacket_radio']) ? $_POST['lining_jacket_radio'] : '',
              'lining_price' => isset($_POST['lining_jacket_price']) ? $_POST['lining_jacket_price']:'',
              'tot_price'=> (!empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']:'0') + (!empty($_SESSION['customizer_price']['waistcoat']) ? $_SESSION['customizer_price']['waistcoat']:'0') + (!empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0') + (!empty($_SESSION['customizer_price']['metal_buttons']) ? $_SESSION['customizer_price']['metal_buttons']:'0') + (!empty($_SESSION['customizer_price']['patches']) ? $_SESSION['customizer_price']['patches']:'0') + (!empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0') + (!empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0'),
              'jacket_lining_id' => isset($_POST['jacket_lining_id']) ? $_POST['jacket_lining_id']:'',
              'font_price' => isset($_POST['initials_jacket_price']) ? $_POST['initials_jacket_price']:'',
              'font_family' => isset($_POST['font_family']) ? $_POST['font_family']:'',
              'initials_jacket' => isset($_POST['initials_jacket']) ? $_POST['initials_jacket']:'',
              'monogram_color' => isset($_POST['initials_jacket1']) ? $_POST['initials_jacket1']:'',
              'type_of_button' => isset($_POST['metal_buttons_radio']) ? $_POST['metal_buttons_radio']:'',
              'metal_button_price' => !empty($_SESSION['customizer_price']['metal_buttons']) ? $_SESSION['customizer_price']['metal_buttons']:'0',
              'metal_btn_type' => isset($_POST['metal_buttons']) ? $_POST['metal_buttons']:'',
              'type_of_neck' => isset($_POST['neck_lining_radio']) ? $_POST['neck_lining_radio']:'',
              'neck_lining_price' => isset($_POST['neck_lining_price']) ? $_POST['neck_lining_price']:'',
              'neck_lining_type' => isset($_POST['neck_lining']) ? $_POST['neck_lining']:'',
              'type_of_elbow' => isset($_POST['patches_radio']) ? $_POST['patches_radio']:'',
              'elbow_price' => !empty($_SESSION['customizer_price']['patches']) ? $_SESSION['customizer_price']['patches']:'0',
              'elbow_type' => isset($_POST['patches']) ? $_POST['patches']:'',
              'type_pocket_square' => isset($_POST['handkerchief_radio']) ? $_POST['handkerchief_radio']:'', 
              'handkerchief_price' => !empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0',
              'pocket_square_type' => isset($_POST['handkerchief']) ? $_POST['handkerchief']:'',
              'type_of_colored_button_holes' => isset($_POST['button_holes_threads_jacket']) ? $_POST['button_holes_threads_jacket']:'',
              'lapel_color' => isset($_POST['placket_color']) ? $_POST['placket_color']:'',
              'button_holes_price' => !empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0',
              'colored_thread_type' => isset($_POST['button_holes_threads_jacket2']) ? $_POST['button_holes_threads_jacket2']:'',
              'colored_holes_type' => isset($_POST['button_holes_threads_jacket1']) ? $_POST['button_holes_threads_jacket1']:'');

  $go_to = $_POST['go_to'];
  $action = $_POST['action'];

  if($go_to!='extras') {
      if($go_to == "configure")
         header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/style/');
      
       else if($go_to == "fabric")
         header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab2_fabric/');
   }
   else {
        $gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
        $p_id=!empty($_SESSION['jacket']['style']['pid']) ? $_SESSION['jacket']['style']['pid']:'';
        $type=mysqli_real_escape_string($con,trim($_POST['type']));
        $order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $o_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $om_price=$_SESSION['jacket']['accents']['tot_price'];
        $date=date('Y-m-d H:i:s');

        $query=mysqli_query($con,"select tax_per,tot_per from  product_master where p_id=$p_id");
        $q1=mysqli_fetch_array($query);
        if($q1['tax_per']!='' || $q1['tax_per']!='0')
        {
        	$tp=explode("-",$q1['tax_per']);
        	if($tp[0]=="%")
        		$tot_per=(($om_price / 100) * $tp[1]) + $om_price;
        	else
        		$tot_per=$om_price + $tp[1];
        }
        else
        {
        	$tax_per="";$tot_per=$om_price;
        }
       
       if($_SESSION['jacket']['style']['jacket_sleeve_buttons']=='0')
        {
			$jacket_sleeve_buttonholes='';
        }
        else
        {
        	$jacket_sleeve_buttonholes=$_SESSION['jacket']['style']['jacket_sleeve_buttonholes'];
        }

         if($_SESSION['jacket']['accents']['initials_jacket']!='')
        {
        	$font_price=$_SESSION['jacket']['accents']['font_price'];
        	$font_family=$_SESSION['jacket']['accents']['font_family'];
        	$initials_jacket=$_SESSION['jacket']['accents']['initials_jacket'];
        	$monogram_color=$_SESSION['jacket']['accents']['monogram_color'];

        }

         if($_SESSION['jacket']['style']['jacket_style']=='mao')
        {
			$jacket_lapel_type='';
			$jacket_buttons='';

        }
        else
        {
        	$jacket_lapel_type=$_SESSION['jacket']['style']['jacket_lapel_type'];
			$jacket_buttons=$_SESSION['jacket']['style']['jacket_buttons'];
			
        }

       if($_SESSION['jacket']['accents']['button_holes_price']!='') {
          $type_of_colored_button_holes = $_SESSION['jacket']['accents']['type_of_colored_button_holes'];
       }

        $style = "{jacket_style: ".$_SESSION['jacket']['style']['jacket_style'].",jacket_fit: ".$_SESSION['jacket']['style']['jacket_fit'].",jacket_lapels: ".$jacket_lapel_type.",jacket_buttons: ".$jacket_buttons.",jacket_chest_pocket: ".$_SESSION['jacket']['style']['jacket_chest_pocket'].",jacket_pockets: ".$_SESSION['jacket']['style']['jacket_pockets'].",jacket_pockets_type: ".$_SESSION['jacket']['style']['jacket_pockets_type'].",jacket_vent: ".$_SESSION['jacket']['style']['jacket_vent'].",jacket_sleeve_buttons: ".$_SESSION['jacket']['style']['jacket_sleeve_buttons'].",jacket_sleeve_buttonholes: ".$jacket_sleeve_buttonholes."}"; 
        $fabric = "{fabric_price: ".$_SESSION['jacket']['fabric']['fabric_price'].",fabric_id: ".$_SESSION['jacket']['fabric']['fabric_id'].",fabric_name:".$_SESSION['jacket']['fabric']['fabric_name']."}";
        $accents = "{jacket_lining_type: ".$_SESSION['jacket']['accents']['jacket_lining_type'].",lining_price: ".$_SESSION['jacket']['accents']['lining_price'].",jacket_lining_id: ".$_SESSION['jacket']['accents']['jacket_lining_id'].",font_price: ".$font_price.",font_family: ".$font_family.",initials_jacket: ".$initials_jacket.",monogram_color: ".$monogram_color.",type_of_button: ".$_SESSION['jacket']['accents']['type_of_button'].",metal_button_price: ".$_SESSION['jacket']['accents']['metal_button_price'].",metal_btn_type: ".$_SESSION['jacket']['accents']['metal_btn_type'].",type_of_neck: ".$_SESSION['jacket']['accents']['type_of_neck'].",neck_lining_price: ".$_SESSION['jacket']['accents']['neck_lining_price'].",neck_lining_type: ".$_SESSION['jacket']['accents']['neck_lining_type'].",type_of_elbow: ".$_SESSION['jacket']['accents']['type_of_elbow'].",elbow_price: ".$_SESSION['jacket']['accents']['elbow_price'].",elbow_type: ".$_SESSION['jacket']['accents']['elbow_type'].",type_pocket_square: ".$_SESSION['jacket']['accents']['type_pocket_square'].",handkerchief_price: ".$_SESSION['jacket']['accents']['handkerchief_price'].",pocket_square_type: ".$_SESSION['jacket']['accents']['pocket_square_type'].",type_of_colored_button_holes: ".$type_of_colored_button_holes.",lapel_color: ".$_SESSION['jacket']['accents']['lapel_color'].",button_holes_price: ".$_SESSION['jacket']['accents']['button_holes_price'].",colored_thread_type: ".$_SESSION['jacket']['accents']['colored_thread_type'].",colored_holes_type: ".$_SESSION['jacket']['accents']['colored_holes_type']."}";
        $p_type="blazers";

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
                $gift=mysqli_query($con,"select orderid from gift_card_master where 
				$where and status=0");
				if(mysqli_num_rows($gift) > 0)
				{
					$g1=mysqli_fetch_array($gift);
					$order_id=$g1['orderid'];
				}
				else
				{
					$get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
					$r=mysqli_fetch_array($get_oid);
					if($r['oid']!='0')
					{
						$a = str_replace("CC","",$r['oid']);
						$order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
					}
					else
					{
						$order_id="CC00000001";
					}
					$sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$order_id."',NOW(),NOW())");
				}
            }

            $sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_fab,om_accents,order_status,created_date,last_updated)
             values('".$order_id."','".$p_id."','".$user_id."','".$gid."',3,'".$p_type."',1,'".$om_price."','".$style."','".$fabric."','".$accents."','Processing','".$date."','".$date."')");            
            unset($_SESSION['jacket']['style']);
            unset($_SESSION['jacket']['fabric']);
            unset($_SESSION['jacket']['accents']);
            unset($_SESSION['p_dtl1']);
            unset($_SESSION['customizer_price']);
            header("Location:{$homeurl}shopping-cart/$order_id/");
        } 
        else
        {
              $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_fab='".$fabric."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
              unset($_SESSION['jacket']['style']);
              unset($_SESSION['jacket']['fabric']);
              unset($_SESSION['jacket']['accents']);
              unset($_SESSION['p_dtl1']);
              unset($_SESSION['customizer_price']);
              header("Location:{$homeurl}shopping-cart/$order_id/");
         }
     }
  }
}


/* Coat Section */

else if($type=="5") {

if(isset($_POST['section']) && $_POST['section']=='style') {

	$_SESSION['coat']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
     'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
          'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');



  $_SESSION['coat']['style'] = array('base_price' => !empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']: '0',
            'type' => isset($_POST['type']) ? $_POST['type']:'',
            'pid' => isset($_POST['p_id']) ? $_POST['p_id']:'',
            'fab_default_price'=>isset($_POST['fab_price']) ? $_POST['fab_price']:'0',
            'def_fab'=>isset($_POST['id_t4l_fabric_default']) ? $_POST['id_t4l_fabric_default']:'141',
            'coat_style'=>isset($_POST['coat_style']) ? $_POST['coat_style']:'0',
            'coat_neck'=>isset($_POST['coat_neck']) ? $_POST['coat_neck']:'0',
            'coat_neck_flap'=>isset($_POST['coat_neck_flap']) ? $_POST['coat_neck_flap']:'0',
            'coat_length'=>isset($_POST['coat_length']) ? $_POST['coat_length']:'0',
            'coat_fit'=>isset($_POST['coat_fit']) ? $_POST['coat_fit']:'0',
            'coat_closure'=>isset($_POST['coat_closure']) ? $_POST['coat_closure']:'0',
            'coat_closure_type_zipper'=>isset($_POST['coat_closure_type_zipper']) ? $_POST['coat_closure_type_zipper']:'0',
            'coat_closure_type_boton'=>isset($_POST['coat_closure_type_boton']) ? $_POST['coat_closure_type_boton']:'0',
            'coat_pockets'=>isset($_POST['coat_pockets']) ? $_POST['coat_pockets']:'0',
            'coat_pockets_type'=>isset($_POST['coat_pockets_type']) ? $_POST['coat_pockets_type']:'0',
            'coat_chest_pocket'=>isset($_POST['coat_chest_pocket']) ? $_POST['coat_chest_pocket']:'0',
            'coat_belt'=>isset($_POST['coat_belt']) ? $_POST['coat_belt']:'0',
            'coat_backcut'=>isset($_POST['coat_backcut']) ? $_POST['coat_backcut']:'0',
            'coat_sleeve'=>isset($_POST['coat_sleeve']) ? $_POST['coat_sleeve']:'0',
            'coat_shoulder'=>isset($_POST['coat_shoulder']) ? $_POST['coat_shoulder']:'0'
       );

      
      $go_to = $_POST['go_to'];


      if($go_to == "fabric")
        header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab2_fabric/');

      else if($go_to == "extras")
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab3_accents/');
}

else if(isset($_POST['section']) && $_POST['section']=='fabric') {

	if(isset($_POST['instore_fabric']) && $_POST['instore_fabric']!='') {
        $fabric_name = $_POST['instore_fabric'];
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
    }
    else {
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
        $fabric_name='';
    }
    
     $_SESSION['coat']['fabric'] = array('fabric_id' => $fabric_id, 
              'fabric_price' => $fabric_price,
              'fabric_name' => $fabric_name);
    
    /*$_SESSION['jacket']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
     'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0');*/

    $go_to = $_POST['go_to'];
  
    if($go_to == "configure")
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/style/');
    
    else if($go_to == "extras")
     header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab3_accents/');
}

else if(isset($_POST['section']) && $_POST['section']=='accents') {


  $_SESSION['coat']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
            'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
                 'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');


  $_SESSION['coat']['accents'] = array('jacket_lining_type' => isset($_POST['lining_jacket_radio']) ? $_POST['lining_jacket_radio'] : '',
              'lining_price' => isset($_POST['lining_jacket_price']) ? $_POST['lining_jacket_price']:'',
              'tot_price'=> (!empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']:'0') + (!empty($_SESSION['customizer_price']['waistcoat']) ? $_SESSION['customizer_price']['waistcoat']:'0') + (!empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0') + (!empty($_SESSION['customizer_price']['metal_buttons']) ? $_SESSION['customizer_price']['metal_buttons']:'0') + (!empty($_SESSION['customizer_price']['patches']) ? $_SESSION['customizer_price']['patches']:'0') + (!empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0') + (!empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0'),
              'jacket_lining_id' => isset($_POST['jacket_lining_id']) ? $_POST['jacket_lining_id']:'',
              'font_price' => isset($_POST['initials_jacket_price']) ? $_POST['initials_jacket_price']:'',
              'font_family' => isset($_POST['font_family']) ? $_POST['font_family']:'',
              'initials_jacket' => isset($_POST['initials_jacket']) ? $_POST['initials_jacket']:'',
              'monogram_color' => isset($_POST['initials_jacket1']) ? $_POST['initials_jacket1']:'',
              'type_of_neck' => isset($_POST['neck_lining_radio']) ? $_POST['neck_lining_radio']:'',
              'neck_lining_price' => isset($_POST['neck_lining_price']) ? $_POST['neck_lining_price']:'',
              'neck_lining_type' => isset($_POST['neck_lining']) ? $_POST['neck_lining']:'',
              'type_of_elbow' => isset($_POST['patches_radio']) ? $_POST['patches_radio']:'',
              'elbow_price' => !empty($_SESSION['customizer_price']['patches']) ? $_SESSION['customizer_price']['patches']:'0',
              'elbow_type' => isset($_POST['patches']) ? $_POST['patches']:'',
              'type_of_colored_button_holes' => isset($_POST['button_holes_threads_jacket']) ? $_POST['button_holes_threads_jacket']:'',
              'lapel_color' => isset($_POST['placket_color']) ? $_POST['placket_color']:'',
              'button_holes_price' => !empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0',
              'colored_thread_type' => isset($_POST['button_holes_threads_jacket2']) ? $_POST['button_holes_threads_jacket2']:'',
              'colored_holes_type' => isset($_POST['button_holes_threads_jacket1']) ? $_POST['button_holes_threads_jacket1']:'');

  $go_to = $_POST['go_to'];
  $action = $_POST['action'];

  if($go_to!='extras') {
      if($go_to == "configure")
         header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/style/');
      
       else if($go_to == "fabric")
         header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab2_fabric/');
   }
   else {
        $gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
        $p_id=!empty($_SESSION['coat']['style']['pid']) ? $_SESSION['coat']['style']['pid']:'';
        $type=mysqli_real_escape_string($con,trim($_POST['type']));
        $order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $o_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $om_price=$_SESSION['coat']['accents']['tot_price'];
        $date=date('Y-m-d H:i:s');

        $query=mysqli_query($con,"select tax_per,tot_per from  product_master where p_id=$p_id");
        $q1=mysqli_fetch_array($query);
        if($q1['tax_per']!='' || $q1['tax_per']!='0')
        {
        	$tp=explode("-",$q1['tax_per']);
        	if($tp[0]=="%")
        		$tot_per=(($om_price / 100) * $tp[1]) + $om_price;
        	else
        		$tot_per=$om_price + $tp[1];
        }
        else
        {
        	$tax_per="";$tot_per=$om_price;
        }
       
       

        $style = "{coat_style: ".$_SESSION['coat']['style']['coat_style'].",coat_neck: ".$_SESSION['coat']['style']['coat_neck'].",coat_neck_flap: ".$_SESSION['coat']['style']['coat_neck_flap'].",coat_length: ".$_SESSION['coat']['style']['coat_length'].",coat_fit: ".$_SESSION['coat']['style']['coat_fit'].",coat_closure: ".$_SESSION['coat']['style']['coat_closure'].",coat_closure_type_zipper: ".$_SESSION['coat']['style']['coat_closure_type_zipper'].",coat_closure_type_boton: ".$_SESSION['coat']['style']['coat_closure_type_boton'].",coat_pockets: ".$_SESSION['coat']['style']['coat_pockets'].",coat_pockets_type: ".$_SESSION['coat']['style']['coat_pockets_type'].",coat_chest_pocket: ".$_SESSION['coat']['style']['coat_chest_pocket'].",coat_belt: ".$_SESSION['coat']['style']['coat_belt'].",coat_backcut: ".$_SESSION['coat']['style']['coat_backcut'].",coat_sleeve: ".$_SESSION['coat']['style']['coat_sleeve'].",coat_shoulder: ".$_SESSION['coat']['style']['coat_shoulder']."}"; 
        $fabric = "{fabric_price: ".$_SESSION['coat']['fabric']['fabric_price'].",fabric_id: ".$_SESSION['coat']['fabric']['fabric_id'].",fabric_name:".$_SESSION['coat']['fabric']['fabric_name']."}";
        $accents = "{jacket_lining_type: ".$_SESSION['coat']['accents']['jacket_lining_type'].",lining_price: ".$_SESSION['coat']['accents']['lining_price'].",jacket_lining_id: ".$_SESSION['coat']['accents']['jacket_lining_id'].",font_price: ".$_SESSION['coat']['accents']['font_price'].",font_family: ".$_SESSION['coat']['accents']['font_family'].",initials_jacket: ".$_SESSION['coat']['accents']['initials_jacket'].",monogram_color: ".$_SESSION['coat']['accents']['monogram_color'].",type_of_neck: ".$_SESSION['coat']['accents']['type_of_neck'].",neck_lining_price: ".$_SESSION['coat']['accents']['neck_lining_price'].",neck_lining_type: ".$_SESSION['coat']['accents']['neck_lining_type'].",type_of_elbow: ".$_SESSION['coat']['accents']['type_of_elbow'].",elbow_price: ".$_SESSION['coat']['accents']['elbow_price'].",elbow_type: ".$_SESSION['coat']['accents']['elbow_type'].",type_of_colored_button_holes: ".$_SESSION['coat']['accents']['type_of_colored_button_holes'].",lapel_color: ".$_SESSION['coat']['accents']['lapel_color'].",button_holes_price: ".$_SESSION['coat']['accents']['button_holes_price'].",colored_thread_type: ".$_SESSION['coat']['accents']['colored_thread_type'].",colored_holes_type: ".$_SESSION['coat']['accents']['colored_holes_type']."}";
        $p_type="coat";

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
                $gift=mysqli_query($con,"select orderid from gift_card_master where 
				$where and status=0");
				if(mysqli_num_rows($gift) > 0)
				{
					$g1=mysqli_fetch_array($gift);
					$order_id=$g1['orderid'];
				}
				else
				{
					$get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
					$r=mysqli_fetch_array($get_oid);
					if($r['oid']!='0')
					{
						$a = str_replace("CC","",$r['oid']);
						$order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
					}
					else
					{
						$order_id="CC00000001";
					}
					$sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$order_id."',NOW(),NOW())");
				}
            }

            $sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_fab,om_accents,order_status,created_date,last_updated)
             values('".$order_id."','".$p_id."','".$user_id."','".$gid."',6,'".$p_type."',1,'".$om_price."','".$style."','".$fabric."','".$accents."','Processing','".$date."','".$date."')");            
            unset($_SESSION['coat']['style']);
            unset($_SESSION['coat']['fabric']);
            unset($_SESSION['coat']['accents']);
            unset($_SESSION['p_dtl1']);
            unset($_SESSION['customizer_price']);
            header("Location:{$homeurl}shopping-cart/$order_id/");
        } 
        else
        {
              $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_fab='".$fabric."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
              unset($_SESSION['coat']['style']);
              unset($_SESSION['coat']['fabric']);
              unset($_SESSION['coat']['accents']);
              unset($_SESSION['p_dtl1']);
              unset($_SESSION['customizer_price']);
              header("Location:{$homeurl}shopping-cart/$order_id/");
         }
     }
  }
}

if($type=="2") {

if(isset($_POST['section']) && $_POST['section']=='style') {

	 $_SESSION['shirt']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
     'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
      'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');


  $_SESSION['shirt']['style'] = array('base_price' => !empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']: '0',
            'type' => isset($_POST['type']) ? $_POST['type']:'',
            'pid' => isset($_POST['p_id']) ? $_POST['p_id']:'',
            'fab_default_price'=>isset($_POST['fab_price']) ? $_POST['fab_price']:'0',
            'def_fab'=>isset($_POST['id_t4l_fabric_default']) ? $_POST['id_t4l_fabric_default']:'141',
            'shirt_sleeve'=>isset($_POST['shirt_sleeve']) ? $_POST['shirt_sleeve']:'0',
            'shirt_fit'=>isset($_POST['shirt_fit']) ? $_POST['shirt_fit']:'0',
            'shirt_neck'=>isset($_POST['shirt_neck']) ? $_POST['shirt_neck']:'0',
            'shirt_neck_no_interfacing'=>isset($_POST['shirt_neck_no_interfacing']) ? $_POST['shirt_neck_no_interfacing']:'0',
            'shirt_neck_buttons'=>isset($_POST['shirt_neck_buttons']) ? $_POST['shirt_neck_buttons']:'0',
            'shirt_cuffs'=>isset($_POST['shirt_cuffs']) ? $_POST['shirt_cuffs']:'0',
            'shirt_chest_pocket'=>isset($_POST['shirt_chest_pocket']) ? $_POST['shirt_chest_pocket']:'0',
            'shirt_chest_pocket_type'=>isset($_POST['shirt_chest_pocket_type']) ? $_POST['shirt_chest_pocket_type']:'0',
            'shirt_button_close'=>isset($_POST['shirt_button_close']) ? $_POST['shirt_button_close']:'0',
            'shirt_cut'=>isset($_POST['shirt_cut']) ? $_POST['shirt_cut']:'0',
            'shirt_pleats'=>isset($_POST['shirt_pleats']) ? $_POST['shirt_pleats']:'0'
       );
      
      $go_to = $_POST['go_to'];
    
      if($go_to == "fabric")
        header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab2_fabric/');

      else if($go_to == "extras")
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab3_accents/');
}

else if(isset($_POST['section']) && $_POST['section']=='fabric') {

	if(isset($_POST['instore_fabric']) && $_POST['instore_fabric']!='') {
        $fabric_name = $_POST['instore_fabric'];
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
    }
    else {
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
        $fabric_name='';
    }
    
     $_SESSION['shirt']['fabric'] = array('fabric_id' => $fabric_id, 
              'fabric_price' => $fabric_price,
              'fabric_name' => $fabric_name);

    /*$_SESSION['shirt']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
     'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0');*/

    $go_to = $_POST['go_to'];
  
    if($go_to == "configure")
      header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/style/');
    
    else if($go_to == "extras") 
     header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab3_accents/');
}

else if(isset($_POST['section']) && $_POST['section']=='accents') {

  $_SESSION['shirt']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
            'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
            'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');

  $_SESSION['shirt']['accents'] = array('tot_price'=> (!empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']:'0') + (!empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0') + (!empty($_SESSION['customizer_price']['neck_lining']) ? $_SESSION['customizer_price']['neck_lining']:'0') + (!empty($_SESSION['customizer_price']['patches_jacket']) ? $_SESSION['customizer_price']['patches_jacket']:'0') + (!empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0') + (!empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0'),
              'font_price' => isset($_POST['initials_jacket_price']) ? $_POST['initials_jacket_price']:'',
              'font_family' => isset($_POST['font_family']) ? $_POST['font_family']:'',
              'initials_jacket' => isset($_POST['initials_jacket']) ? $_POST['initials_jacket']:'',
              'monogram_color' => isset($_POST['initials_jacket1']) ? $_POST['initials_jacket1']:'',
              'neck_styling' => isset($_POST['neck_type']) ? $_POST['neck_type']:'',
              'neck_lining_price' => !empty($_SESSION['customizer_price']['neck_lining']) ? $_SESSION['customizer_price']['neck_lining']: '0',
              'collar_neck_color' => isset($_POST['collar_neck_color']) ? $_POST['collar_neck_color']:'',
              'cuff_styling' => isset($_POST['cuff_type']) ? $_POST['cuff_type']:'',
              'cuff_lining_price' => !empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']: '0',
              'cuff_color' => isset($_POST['cuff_color']) ? $_POST['cuff_color']:'',
              'type_of_elbow' => isset($_POST['patches_type']) ? $_POST['patches_type']:'',
              'elbow_price' => !empty($_SESSION['customizer_price']['patches_jacket']) ? $_SESSION['customizer_price']['patches_jacket']: '0',
              'elbow_type' => isset($_POST['patches']) ? $_POST['patches']:'',
              'type_of_colored_button_holes' => isset($_POST['button_holes_threads_jacket']) ? $_POST['button_holes_threads_jacket']:'',
              'button_holes_price' => !empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']: '0',
              'colored_thread_type' => isset($_POST['button_holes_threads_jacket2']) ? $_POST['button_holes_threads_jacket2']:'',
              'colored_holes_type' => isset($_POST['button_holes_threads_jacket1']) ? $_POST['button_holes_threads_jacket1']:'');

  $go_to = $_POST['go_to'];
  $action = $_POST['action'];

  if($go_to!='extras') {
      if($go_to == "configure")
         header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/style/');
      
       else if($go_to == "fabric")
         header('Location: '.$homeurl.'customize/'.strtolower($_POST['type1']).'/tab2_fabric/');
   }
   else {
        $gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
        $p_id=!empty($_SESSION['shirt']['style']['pid']) ? $_SESSION['shirt']['style']['pid']:'';
        $type=mysqli_real_escape_string($con,trim($_POST['type']));
        $order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $o_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $om_price=$_SESSION['shirt']['accents']['tot_price'];
        $date=date('Y-m-d H:i:s');

        $query=mysqli_query($con,"select tax_per,tot_per from  product_master where p_id=$p_id");
        $q1=mysqli_fetch_array($query);
        if($q1['tax_per']!='' || $q1['tax_per']!='0')
        {
        	$tp=explode("-",$q1['tax_per']);
        	if($tp[0]=="%")
        		$tot_per=(($om_price / 100) * $tp[1]) + $om_price;
        	else
        		$tot_per=$om_price + $tp[1];
        }
        else
        {
        	$tax_per="";$tot_per=$om_price;
        }

        if($_SESSION['shirt']['style']['shirt_chest_pocket']=='0')
        {
			$shirt_chest_pocket_type='';
        }
        else
        {
        	$shirt_chest_pocket_type=$_SESSION['shirt']['style']['shirt_chest_pocket_type'];
        }

        if($_SESSION['shirt']['style']['shirt_cuffs']=='5' || $_SESSION['shirt']['style']['shirt_cuffs']=='6' || $_SESSION['shirt']['style']['shirt_cuffs']=='9' || $_SESSION['shirt']['style']['shirt_cuffs']=='10')
        {
			$shirt_neck_no_interfacing='';
        }
        else
        {
        	$shirt_neck_no_interfacing=$_SESSION['shirt']['style']['shirt_neck_no_interfacing'];
        }

        if($_SESSION['shirt']['style']['shirt_neck']=='6')
        {
            $shirt_neck_buttons='';
        }
        else
        {
        	$shirt_neck_buttons = $_SESSION['shirt']['style']['shirt_neck_buttons'];
        }

        if($_SESSION['shirt']['accents']['initials_jacket']!='')
        {
        	$font_price=$_SESSION['shirt']['accents']['font_price'];
        	$font_family=$_SESSION['shirt']['accents']['font_family'];
        	$initials_jacket=$_SESSION['shirt']['accents']['initials_jacket'];
        	$monogram_color=$_SESSION['shirt']['accents']['monogram_color'];

        }

        if($_SESSION['shirt']['style']['shirt_sleeve']=='short')
        {
        	$shirt_cuffs='';
        }
        else
        {
        	$shirt_cuffs=$_SESSION['shirt']['style']['shirt_cuffs'];
        }
        

        $style = "{shirt_sleeve: ".$_SESSION['shirt']['style']['shirt_sleeve'].",shirt_fit: ".$_SESSION['shirt']['style']['shirt_fit'].",shirt_neck: ".$_SESSION['shirt']['style']['shirt_neck'].",shirt_neck_no_interfacing: ".$shirt_neck_no_interfacing.",shirt_neck_buttons: ".$shirt_neck_buttons.",shirt_cuffs: ".$shirt_cuffs.",shirt_chest_pocket: ".$_SESSION['shirt']['style']['shirt_chest_pocket'].",shirt_chest_pocket_type: ".$shirt_chest_pocket_type.",shirt_button_close: ".$_SESSION['shirt']['style']['shirt_button_close'].",shirt_cut: ".$_SESSION['shirt']['style']['shirt_cut'].",shirt_pleats: ".$_SESSION['shirt']['style']['shirt_pleats']."}"; 
        $fabric = "{fabric_price: ".$_SESSION['shirt']['fabric']['fabric_price'].",fabric_id: ".$_SESSION['shirt']['fabric']['fabric_id'].",fabric_name:".$_SESSION['shirt']['fabric']['fabric_name']."}";
        
        if($_SESSION['shirt']['accents']['button_holes_price']!='') {
        $type_of_colored_button_holes = $_SESSION['shirt']['accents']['type_of_colored_button_holes'];
        }
        
        $accents = "{font_price: ".$font_price.",font_family: ".$font_family.",initials_jacket: ".$initials_jacket.",monogram_color: ".$monogram_color.",neck_styling: ".$_SESSION['shirt']['accents']['neck_styling'].",neck_lining_price: ".$_SESSION['shirt']['accents']['neck_lining_price'].",collar_neck_color: ".$_SESSION['shirt']['accents']['collar_neck_color'].",cuff_styling: ".$_SESSION['shirt']['accents']['cuff_styling'].",cuff_lining_price: ".$_SESSION['shirt']['accents']['cuff_lining_price'].",cuff_color: ".$_SESSION['shirt']['accents']['cuff_color'].",type_of_elbow: ".$_SESSION['shirt']['accents']['type_of_elbow'].",elbow_price: ".$_SESSION['shirt']['accents']['elbow_price'].",elbow_type: ".$_SESSION['shirt']['accents']['elbow_type'].",type_of_colored_button_holes: ".$type_of_colored_button_holes.",button_holes_price: ".$_SESSION['shirt']['accents']['button_holes_price'].",colored_thread_type: ".$_SESSION['shirt']['accents']['colored_thread_type'].",colored_holes_type: ".$_SESSION['shirt']['accents']['colored_holes_type']."}";
        $p_type="shirts";

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
                $gift=mysqli_query($con,"select orderid from gift_card_master where 
				$where and status=0");
				if(mysqli_num_rows($gift) > 0)
				{
					$g1=mysqli_fetch_array($gift);
					$order_id=$g1['orderid'];
				}
				else
				{
					$get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
					$r=mysqli_fetch_array($get_oid);
					if($r['oid']!='0')
					{
						$a = str_replace("CC","",$r['oid']);
						$order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
					}
					else
					{
						$order_id="CC00000001";
					}
					$sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$order_id."',NOW(),NOW())");
				}
            }

            $sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,sess_id,subcatid,p_type,om_quantity,om_price,om_style,om_fab,om_accents,order_status,created_date,last_updated)
             values('".$order_id."','".$p_id."','".$user_id."','".$gid."',2,'".$p_type."',1,'".$om_price."','".$style."','".$fabric."','".$accents."','Processing','".$date."','".$date."')");            
            unset($_SESSION['shirt']['style']);
            unset($_SESSION['shirt']['fabric']);
            unset($_SESSION['shirt']['accents']);
            unset($_SESSION['p_dtl1']);
            unset($_SESSION['customizer_price']);
            header("Location:{$homeurl}shopping-cart/$order_id/");
        } 
        else
        {
              $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_fab='".$fabric."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id=$o_id");
              unset($_SESSION['shirt']['style']);
              unset($_SESSION['shirt']['fabric']);
              unset($_SESSION['shirt']['accents']);
              unset($_SESSION['p_dtl1']);
              unset($_SESSION['customizer_price']);
              header("Location:{$homeurl}shopping-cart/$order_id/");
         }
     }
  }
}



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
		$to="support@dccustomclothiers.com";
		mail($to,$subject,$message,$headers);
		$_SESSION['contact_succ']="success";
		header("Location:{$homeurl}contact-us/");
}




if(isset($_POST['gift_card']))
{
	$amount=mysqli_real_escape_string($con,trim($_POST['amount']));
	$quantity=mysqli_real_escape_string($con,trim($_POST['quantity']));
	$mail_type=mysqli_real_escape_string($con,trim($_POST['mail_type']));
	$recp_name=mysqli_real_escape_string($con,trim($_POST['recp_name']));
	$recp_mail=mysqli_real_escape_string($con,trim($_POST['recp_mail']));
	$post_address=mysqli_real_escape_string($con,trim($_POST['post_address']));

	$balance=$quantity * $amount;
	if(isset($_SESSION['user_id']))
	{
		$userid=$_SESSION['user_id'];
		$where =" userid=$userid";
		$guest=0;
	}
	else
	{
		$userid=0;
		$guest=$_SESSION['guest_id'];
		$where =" sess_id='$guest'";	
	}

	

	$sql1=mysqli_query($con,"select order_id from order_master where $where and om_status=1");
	if(mysqli_num_rows($sql1) > 0)
	{
		$r1=mysqli_fetch_array($sql1);
		$oid=$r1['order_id'];
	}
	else
	{
		$get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
		$r=mysqli_fetch_array($get_oid);
		if($r['oid']!='0')
		{
			$a = str_replace("CC","",$r['oid']);
			$oid = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
		}
		else
		{
			$oid="CC00000001";
		}
		$sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$oid."',NOW(),NOW())");
	}
	
	for ($i=0; $i <$quantity; $i++) 
	{ 
		$rand="GC".$amount.rand(0,999999999999);

		if($mail_type=="mail_my" || $mail_type=="email_my")
		{
			$sql=mysqli_query($con,"insert into gift_card_master(userid,sess_id,orderid,gift_code,amount,balance,quantity,gift_type,created_date)values($userid,'$guest','$oid','$rand','$amount','$amount',
				1,'myself',NOW())");
		}
		else
		{
			$sql=mysqli_query($con,"insert into gift_card_master(userid,sess_id,orderid,gift_code,amount,balance,quantity,gift_type,recipient_name,recipient_mail,recipient_address,created_date)
				values($userid,'$guest','$oid','$rand','$amount','$amount',1,'someone','$recp_name','$recp_mail',
				'$recp_address',NOW())");
		}
	}
	
		header("Location:{$homeurl}shopping-cart/$oid/");
}



if($_POST['type']=="update-apt")
{
	$aid=$_POST['aid'];
	$email=$_POST['email'];
	$srid=$_POST['srid'];
	$time=$_POST['time'];
	$time1=$_POST['time1'];
	$date=$_POST['date'];

	$t=$date. ' '.$time1;
	$sql=mysqli_query($con,"select * from appointment_master where a_email!='".$email."' and 
		a_timings='".$t."' and srid=$srid");
	if(mysqli_num_rows($sql))
	{
		echo "Fail";
	}
	else
	{
		$sql1=mysqli_query($con,"update appointment_master set a_timings='".$t."' where a_id=$aid");
		echo "Success";
	}


}

?>