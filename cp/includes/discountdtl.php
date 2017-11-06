<?php

session_start();

if(isset($_SESSION['order_discount']))
 unset($_SESSION['order_discount']);
 
 $_SESSION['order_discount'] = $_POST['discount'];
 print_r($_SESSION['order_discount']);

?>