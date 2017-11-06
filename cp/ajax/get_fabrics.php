<?php

require_once("../../includes/action/config.php");



$val=$_POST['val'];

$sql=mysqli_query($con,"select * from fabric_master where catid=$val");

while($r=mysqli_fetch_array($sql))

{

	$sql1=mysqli_query($con,"select sub_cat_name from sub_category_master where sub_cat_id='".$r['catid']."'");

	$r1=mysqli_fetch_array($sql1);

?>

	<option value="<?php echo $r['fab_id'];?>"><?php echo $r['fab_name']." - ".$r1['sub_cat_name'];?></option>

<?php

}

?>