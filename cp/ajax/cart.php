<?php

session_start();

require("../../includes/action/config.php");



$pid=$_POST['pid'];

$userid=$_POST['userid'];

$subid=$_POST['subid'];

if(isset($_SESSION['emp_user_id']))

$placeid=$_SESSION['emp_user_id'];

else if(isset($_SESSION['admin_user_id']))

$placeid=$_SESSION['admin_user_id'];



$sql1=mysqli_query($con,"select p_price from product_master where p_id='".$pid."'");

$r1=mysqli_fetch_array($sql1);

$price=$r1['p_price'];

$date=date('Y-m-d H:i:s');



$sql2=mysqli_query($con,"select order_id from order_master where userid=$userid and om_status=1");

if(mysqli_num_rows($sql2) > 0)

{

	$r1=mysqli_fetch_array($sql2);

	$o_id=$r1['order_id'];

}

else

{

	$gift=mysqli_query($con,"select orderid from gift_card_master where userid=$userid and status=0");

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
			$order_id="CC00000001";
		}
		$sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$o_id."',NOW(),NOW())");
	}

}

if(isset($_SESSION['admin_user_id']))

{

    $placed_by=$_SESSION['admin_user_id'];

}

else if(isset($_SESSION['emp_user_id']))

{

    $placed_by=$_SESSION['emp_user_id'];   

}

$sql=mysqli_query($con,"insert into order_master(order_id,userid,pid,subcatid,om_price,om_quantity,order_status,placed_by,created_date,last_updated)

	values('".$o_id."','".$userid."','".$pid."','".$subid."','".$price."',1,'Processing','".$placed_by."','".$date."','".$date."')");



?>