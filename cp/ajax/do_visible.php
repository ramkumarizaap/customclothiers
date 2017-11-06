<?php
require('../../includes/action/config.php');
$table=mysqli_real_escape_string($con,trim($_POST['table']));
$value=mysqli_real_escape_string($con,trim($_POST['value']));
$field=mysqli_real_escape_string($con,trim($_POST['field']));
$id=mysqli_real_escape_string($con,trim($_POST['id']));
$where=mysqli_real_escape_string($con,trim($_POST['where']));

$sql=mysqli_query($con,"update $table set $field=$value where $where=$id");
?>