<?php 
session_start();
require('../includes/action/config.php');
$sid=$_REQUEST['sid'];
$oid=$_REQUEST['oid'];
$_SESSION['order_id']=$oid;

$_SESSION['payment_status'] = "cancelled";
 header("Location:{$homeurl}checkout/".$oid."/");
?>