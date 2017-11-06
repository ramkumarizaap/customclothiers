<?php
require("../../includes/action/config.php");

$val=$_POST['val'];

$sql=mysqli_query($con,"select email from user_master where email='".$val."'");
if(mysqli_num_rows($sql) > 0)
{
	echo "Fail";
}
else
{
	echo "Success";
}

?>