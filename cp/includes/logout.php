<?php
include('../../includes/config.php');
unset($_SESSION['firstname']);
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['photo']);
unset($_SESSION['usertype']);
unset($_SESSION['firstname']);
session_destroy();
header("Location:{$adminurl}");
?>