<?php
require('config.php');
session_start();
/*$con=mysqli_connect("localhost","root","") or die("Can't Connect Server");
mysqli_select_db($con,"shopping") or die("Can't Connect DB");*/



$type=$_POST['type'];
if($type=="get_cart")
{
	$res=array();$i=0;$tot="";$msg="";$a=1;$msg1="";$msg2="";
	if(isset($_SESSION['guest_id'])){
		$sql=mysqli_query($con,"select a.*,b.p_name,b.p_price from order_master a,product_master b where 
			 a.sess_id='".$_SESSION['guest_id']."' and a.pid=b.p_id and a.om_status=1");
	}
	else if(isset($_SESSION['user_id']))
	{
		$sql=mysqli_query($con,"select a.*,b.p_name,b.p_price  from order_master a,product_master b where 
			a.userid='".$_SESSION['user_id']."' and a.pid=b.p_id and a.om_status=1");
	}
		if($sql)
		{
			if(mysqli_num_rows($sql) > 0)
			{
				while ($r=mysqli_fetch_array($sql))
				 {
				 	$order_id=$r['order_id'];
				 		$sql1=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");
				 		$r1=mysqli_fetch_array($sql1);
				 	$msg.="<article class='shop-summary-item cart_".$r['om_id']."'>
			                <img src=".$homeurl.$r1['p_img']." style='height:89px;width:60px;'  alt='Shop item in cart'>
			                    <div class='item-info-name-features-price'>
			                        <h4><a href='#'>".$r['p_name']."</a></h4>
			                        <span class='quantity'>".$r['om_quantity']."</span><b>&times;</b><span class='price'>$".number_format($r['p_price'],2)."</span>
			                    </div>
			                <button type='button' class='close' data-id='".$r['om_id']."' aria-hidden='true'><span aria-hidden='true' data-icon='&#xe005;'></span></button>
			              </article>";
			              $tot=$tot + ($r['om_quantity'] * $r['om_price']);
			 		$msg1= $a."@@@@@".number_format($tot,2);
			              $i++;$a++;
			  	 }
			  	 $msg2.="<span class='total-price-tag pull-left'>Cart subtotal</span><span class='pull-right'>$<span class='item-price'>".number_format($tot,2)."</span></span>
                  <div class='clearfix'></div>".
                  //<a href='<?php echo $homeurl; class='btn btn-primary btn-block'>
                    //View shopping cart                 </a>
                  "<a href='".$homeurl."shopping-cart/".$order_id."/' class='btn btn-default btn-block'>
                    Proceed to cart
                  </a>";
			  	 echo $msg."@@@@@".$msg1."@@@@@".$msg2;
			}
			else
			{
				$msg1= "0"."@@@@@".number_format("000",2);
				 echo $msg."@@@@@".$msg1;
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
	$date=date('Y-m-d h:i:s');
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
		$o_id=rand(0,99999);
	}
	$sql=mysqli_query($con,"insert into order_master(order_id,userid,sess_id,pid,subcatid,om_price,om_quantity,order_status,created_date)values('".$o_id."','".$userid."','".$gid."','".$pid."','".$subid."','".$price."',1,'Processing','".$date."')");
}
elseif ($type=="del_cart")
{
	$id=$_POST['id'];
	$sql=mysqli_query($con,"delete from order_master where om_id=$id");
}
elseif ($type=="update_cart")
{
	$id=$_POST['id'];
	$qty=$_POST['qty'];
	$date=date('Y-m-d H:i:s');
	$sql=mysqli_query($con,"update order_master set om_quantity='".$qty."',last_updated='".$date."' where om_id=$id");
}
if ($type=="update_address")
{
	$country=mysqli_real_escape_string($con,trim($_POST['country']));
	$firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));
	$lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));
	$address1=mysqli_real_escape_string($con,trim($_POST['address1']));
	$address2=mysqli_real_escape_string($con,trim($_POST['address2']));
	$city=mysqli_real_escape_string($con,trim($_POST['city']));
	$state=mysqli_real_escape_string($con,trim($_POST['state']));
	$zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));
	$userid=$_SESSION['user_id'];
	$date=date('Y-m-d H:i:s');
	$sql=mysqli_query($con,"select userid from  shipping_address  where userid='".$userid."'");
	if(mysqli_num_rows($sql) > 0)
	{
		$sql=mysqli_query($con,"update shipping_address set sa_firstname='".$firstname."',sa_lastname='".$lastname."',sa_address1='".$address1."',
			sa_address2='".$address2."',sa_city='".$city."',sa_province='".$state."',last_updated='".$date."',
			sa_country='".$country."',sa_zipcode='".$zipcode."' where userid='".$_SESSION['user_id']."'");
	}
	else
	{
		$sql=mysqli_query($con,"insert into shipping_address(userid,sa_firstname,sa_lastname,sa_address1,sa_address2,
			sa_city,sa_province,sa_country,sa_zipcode,created_date) values('".$_SESSION['user_id']."','".$firstname."','".$lastname."','".$address1."',
			'".$address2."','".$city."','".$state."','".$country."','".$zipcode."','".$date."')");
	}
	//$sql=mysqli_query($con,"update order_master set ship_id='".$)
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
	$title = isset($_POST['title'])!="" ? mysqli_real_escape_string($con,trim($_POST['title'])) : "";
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


if(isset($_POST['height']) && !empty($_POST["height"]) && isset($_POST['weight']) && !empty($_POST["weight"])) {

  $height = $_POST['height'] .'cm';
  $weight = $_POST['weight'] .' kg';
}

else if(isset($_POST['feet']) && !empty($_POST["feet"]) && isset($_POST['height_in']) && !empty($_POST["height_in"]) && isset($_POST['weight']) && !empty($_POST["weight"])) {
  $height = $_POST['feet'] .' feet '.  $_POST['height_in']  .' inches';
  $weight = $_POST['weight'] .' lb';
}
else {
  $height='';
}

if(!empty($_POST['action'] && $_POST['action'] == 'update')) {
  $mp_id = $_POST['measurement_id'];
  $sql=mysqli_query($con,"update measurement_profile_master set last_updated='".$date."', mp_name='".$title."',mp_height='".$height."',mp_weight='".$weight."',mp_chest='".$param_chest."',mp_abdomen='".$param_abdomen."',mp_buttocks='".$param_buttocks."',mp_hips='".$param_hip."',coat_length='".$coat_length."',torso_length='".$body_length."',dress_length='".$dress_length."',sleeve_length='".$sleeves_length."',shoulder_width='".$shoulders."',neck='".$neck."',chest_around='".$chest."',stomach='".$stomach."',breast_point='".$breast_point."',waist_point='".$waist_point."',pant_length='".$pants_length."',skirt_length='".$skirt_length."',hips='".$hips."',waist='".$waist."',rise='".$crotch."',thigh='".$thigh."',bicep_around='".$biceps."',pant_waist='".$pants_position."',skirt_position='".$skirt_position."',last_updated=NOW() where mp_id = '".$mp_id."' and mp_userid='".$_SESSION['user_id']."'");
  if(isset($_POST['order_id']) && !empty($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $sql = mysqli_query($con,'update order_master set mpid="'.$_POST["measurement_id"].'" where om_id="'.$order_id.'"');
  }
}
else {
  $sql=mysqli_query($con,"insert into measurement_profile_master(mp_userid,mp_name,mp_height,mp_weight,mp_chest,mp_abdomen,mp_buttocks,mp_hips,coat_length,torso_length,dress_length,sleeve_length,shoulder_width,neck,chest_around,stomach,breast_point,waist_point,pant_length,skirt_length,hips,waist,rise,thigh,bicep_around,pant_waist,skirt_position,created_date) values('".$_SESSION['user_id']."','".$title."','".$height."','".$weight."','".$param_chest."','".$param_abdomen."','".$param_buttocks."','".$param_hip."','".$coat_length."','".$body_length."','".$dress_length."','".$sleeves_length."','".$shoulders."','".$neck."','".$chest."','".$stomach."','".$breast_point."','".$waist_point."','".$pants_length."','".$skirt_length."','".$hips."','".$waist."','".$crotch."','".$thigh."','".$biceps."','".$pants_position."','".$skirt_position."','".$date."')");
  
}


if($sql) 
	echo "Success@@@@@";
 else
  echo 'Error';

}


elseif ($type=="del_measurement")
{
	$id=$_POST['id'];
	$sql=mysqli_query($con,"delete from measurement_profile_master where mp_id=$id");

	$sql1 = mysqli_query($con,"update order_master set mpid='0' where userid='".$_SESSION['user_id']."'");
	
	if($sql)
		echo "Success@@@@@";
	else
		echo "Error in Deletion";
}

elseif ($type=="select_measurement")
{
	
	$id=$_POST['id'];
	$profile_id = $_POST['profile_id'];

	$sql=mysqli_query($con,'update order_master set mpid = "'.$profile_id.'", last_updated=NOW() where om_id = "'.$id.'"');
	if($sql)
		echo "Success@@@@@";
	else
		echo "Error";
}
?>

<script type="text/javascript">
	$("button.close").click(function(){

		id=$(this).attr("data-id");
		$.ajax({
			type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",
			data:{id:id,type:"del_cart"},
			success:function(data)
			{
				//alert(data);
				$(this).closest(".cart_"+id).fadeOut(200);
			}
		});
	});
</script>
