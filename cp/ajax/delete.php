<?php
include('../../includes/action/config.php');
global $con;$table=mysqli_real_escape_string($con,trim($_POST['table']));
$id=mysqli_real_escape_string($con,trim($_POST['id']));
$field=mysqli_real_escape_string($con,trim($_POST['field']));
$sql=mysqli_query($con,"delete from $table where $field=$id");
?>