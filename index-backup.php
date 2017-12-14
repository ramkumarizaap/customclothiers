<?php
session_start();
ob_start();
?>

<?php
//require_once("common.php");
require("includes/action/config.php");
require_once("includes/action/functions.php");

$site=new Site();
if(isset($_SESSION['login_succ'])=="login success")
{
	$sql=$site->select_query("select * from user_master where user_id=".$_SESSION['user_id']);
	$firstname=$sql['firstname'];$lastname=$sql['lastname'];$email=$sql['email'];$user_type=$sql['user_type'];
	$password=$sql['password'];
	$address1=$sql['address1'];
	$address2=$sql['address2'];
	$city=$sql['city'];
	$state=$sql['province'];$zipcode=$sql['zipcode'];$country=$sql['country'];
}
else
{
	$_SESSION['guest_id']=session_id();
}
require_once("pagetitle.php");
?>

<?php //include("top-header.php");?>
			<!-- HEADER -->
<?php
	//include("main-header.php");
	if($page=="" || $page=="index" || $page=="home" || $page=="shops" || $page=="login" || 
		$page=="signup" || $page=="logout" || $page=="admin" || $page=="Shop" || $page=="shop" || $page=="Shops" || $page=="shopping-cart" 
		|| $page=="checkout" || $page=="order-received" || $page=="account-information" || $page=="my-orders"
		 || $page=="view-orders" || $page=="address-book" || $page=="wishlist" || $page=="edit-billing-address" || 
		 $page=="edit-shipping-address" || $page=="my-measurements" || $page=="add-profile" || 
		 $page=="measurement-print-view" || $page=="customize" || $page=="faqs" 
		 || $page=="track-my-order" || $page=="privacy-policy" || $page=="terms-and-conditions" || 
		 $page=="press" || $page=="coat-customize" || $page=="add-shipping-address"
		 || $page=="add-billing-address" || $page=="forgot-password" || $page=="about-us" || $page=="how-it-works"
		 || $page=="track-order" || $page=="appointments" || $page=="showrooms" || $page=="contact-us" || $page=="careers" || 
                 $page=="our-story" || $page=="meet-us" || $page=="reviews" || $page=="reviews-add")
	{
		
		require_once("includes/template/header.php");
		require_once("includes/template/navbar.php");
		require_once("content.php");
	}
	else
	{
		$title="404 - Page Not Found";
		require_once("includes/template/header.php");
		require_once("includes/template/navbar.php");
		require_once("error.php");
	}
?>
	<?php include("includes/template/footer.php");
	include("includes/template/scripts.php"); ?>
