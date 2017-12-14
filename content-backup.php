<?php
//include_once("common.php");
if(!isset($page))
	(isset($_REQUEST['page'])) ? $page=$_REQUEST['page'] : $page="";

switch($page)
{
	
	case "":
	case "index":
	case "home":
	require_once("home.php");
		break;
	case "error":
		require_once("error.php");
		break;
  	case "login":
		require_once("login.php");
		break;
   	case "signup":
		require_once("signup.php");
		break;
	case "logout":
		require_once("includes/action/logout.php");
		break;
	/*case "logout":
		require_once("admin/index.php");
		break;*/
	case "Shop":
	case "shop":
		require_once("products-listing.php");
		break;
	
	case "shopping-cart":
		require_once("cart-list.php");
		break;
	case "checkout":
		require_once("checkout.php");
		break;
	case "order-received":
		require_once("order-received.php");
		break;
	case "account-information":
		require_once("account-information.php");
		break;
	case "my-orders":
		require_once("my-orders.php");
		break;
	case "view-orders":
		require_once("view-orders.php");
		break;
	case "address-book":
		require_once("address-book.php");
		break;
	case "wishlist":
		require_once("wishlist.php");
		break;
	case "edit-billing-address":
		require_once("edit-billing-address.php");
		break;
	case "edit-shipping-address":
		require_once("edit-shipping-address.php");
		break;
	case "my-measurements":
		require_once("my-measurements.php");
		break;
	case "add-profile":
		require_once("add-profile.php");
		break;
	case "measurement-print-view":
		require_once("measurement-print-view.php");
		break;
	case "customize":
		require_once("customize.php");
		break;
	case "faqs":
		require_once("faqs.php");
		break;
	case "track-my-order":
		require_once("track-my-order.php");
		break;
	case "privacy-policy":
		require_once("privacy-policy.php");
		break;
	case "terms-and-conditions":
		require_once("terms-and-conditions.php");
		break;
	case "press":
		require_once("press.php");
		break;
	case "coat-customize":
		require_once("coat-customize.php");
		break;
	case "add-shipping-address":
		require_once("add-shipping-address.php");
		break;
	case "add-billing-address":
		require_once("edit-billing-address.php");
		break;
	case "forgot-password":
		require_once("forgot-password.php");
		break;
	case "about-us":
		require_once("about-us.php");
		break;
	case "how-it-works":
		require_once("how-it-works.php");
		break;
	case "track-order":
		require_once("track-order.php");
		break;
	case "showrooms":
	case "appointments":
		require_once("appointments.php");
		break;
        case "contact-us":
		require_once("contact-us.php");
		break;
        case "careers":
		require_once("careers.php");
		break;

        case "our-story":
		require_once("our-story.php");
		break;
        case "meet-us":
		require_once("meet-us.php");
		break;
case "reviews":
		require_once("reviews.php");
		break;
	case "reviews-add":
		require_once("review-add.php");
		break;



}
?>