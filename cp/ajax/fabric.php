<?php

require('../../includes/action/config.php');



$val=$_POST['val'];

if(!empty($val))

{

for ($i=0; $i <count($val) ; $i++) { 

	$sql=mysqli_query($con,"select fab_img,fab_name from fabric_master where fab_id=$val[$i] ");

	$r=mysqli_fetch_array($sql);

	if(mysqli_num_rows($sql))

	{
       if($r['fab_name']!='In-Store Fabric Selection')
		echo  "<img src='".$homeurl.$r['fab_img']."' style='width:100px;height:100px;margin-left:10px;margin-top:10px;'>";
	   else
		echo  "<img src='".$homeurl."assets/dimg/fabric/instore_fab.jpg' style='width:100px;height:100px;margin-left:10px;margin-top:10px;'>";


	}

}

}

?>