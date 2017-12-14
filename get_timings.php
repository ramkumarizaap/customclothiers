<?php 
require_once 'includes/action/config.php';
global $con;
$srid=$_POST['srid'];
$srdate=strtolower(date("l",strtotime($_POST['srdate'])));
//echo date("l");
//$srid="1";
//$srdate="monday";
$sql=mysqli_query($con,"select sr_$srdate as timings from showroom_master where sr_id=$srid");
$r=mysqli_fetch_array($sql);
$a=$r['timings'];
if($a!="Closed")
{
	$a=str_replace(" ","",$a);
	$a=explode("-",$a);
	$s=date("H:i",strtotime($a[0]));
	$e=date("H:i",strtotime($a[1]));
	$start=strtotime("$s");
	$end=strtotime("$e");
	for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60)
	{
	     echo "<option value='".date('h:i a',$halfhour)."'>".date('h:i a',$halfhour)."</option>";
	}
}
else
{
	echo "Fail";
}

?>