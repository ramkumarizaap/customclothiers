<?php 
require_once("../../includes/action/config.php");

$a=array();
$val=$_GET['term'];
$sid=$_GET['sid'];
$sid1=$_GET['sid1'];

if(is_numeric($val))
  $where = 'fab_rand IN('.$val.')';
else
  $where = "fab_name like '%".$val."%'";

$sql=mysqli_query($con,"select * from fabric_master where fab_id IN(".$sid.") and $where");

if(mysqli_num_rows($sql) > 0)
{
   while($r=mysqli_fetch_array($sql))
   {
	  $a[]=$r['fab_name']. '(' . $r['fab_rand']. ','.$r['fab_price'].')';
   }
  echo json_encode($a);
}
else {
    $a[] ="No Records Found"; 
	echo json_encode($a);
}
?>