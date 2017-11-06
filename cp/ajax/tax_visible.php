<?php 
require("../../includes/action/config.php");
$val=$_POST['val'];
$state=$_POST['state'];
$sql=mysqli_query($con,"update tax_master set status=$val where t_state='$state'");

?>