<?php

session_start();

if(isset($_SESSION['customizer_price']['base'])) {
	 unset($_SESSION['customizer_price']['base']);
} 

else if(isset($_SESSION['customizer_price']['fabric'])) {
	 unset($_SESSION['customizer_price']['fabric']);
} 

else if(isset($_SESSION['customizer_price']['metal_buttons'])) {
	 unset($_SESSION['customizer_price']['metal_buttons']);
} 

else if(isset($_SESSION['customizer_price']['patches'])) {
	 unset($_SESSION['customizer_price']['patches']);
} 

else if(isset($_SESSION['customizer_price']['handkerchief'])) {
	 unset($_SESSION['customizer_price']['handkerchief']);
} 

else if(isset($_SESSION['customizer_price']['button_holes_threads_jacket'])) {
	 unset($_SESSION['customizer_price']['button_holes_threads_jacket']);
} 

else if(isset($_SESSION['customizer_price']['neck_lining'])) {
	 unset($_SESSION['customizer_price']['neck_lining']);
} 

else if(isset($_SESSION['customizer_price']['patches_jacket'])) {
	 unset($_SESSION['customizer_price']['patches_jacket']);
} 

else if(isset($_SESSION['customizer_price']['waistcoat'])) {
	 unset($_SESSION['customizer_price']['waistcoat']);
} 
 

 $_SESSION['customizer_price'] = $_POST['customizer_price'];
print_r($_SESSION['customizer_price']);

?>