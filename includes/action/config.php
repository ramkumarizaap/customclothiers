<?php 

error_reporting(E_ERROR);
//ini_set("display_errors","on");
$con=mysqli_connect("localhost","root","") or die("Can't Connect Server");
mysqli_select_db($con,"customclothiers") or die("Can't Connect DB");

$homeurl="http://localhost/custom/";
$adminurl="http://localhost/custom/cp/";

//$_SESSION['con']=$con;
?>