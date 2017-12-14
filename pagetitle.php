<?php
//include_once("common.php");
if(!isset($page))
	(isset($_REQUEST['page'])) ? $page=$_REQUEST['page'] : $page="";
	switch($page)
	{
		case "":
		case "index":
		case "home":
			$title='Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
   	case "admin":
			$title='Admin Page - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "signup":
			$title='';
			$styles='';
			$scripts='';
			break;
	case "login":
			$title='';
			$styles='';
			$scripts='';
			break;
	case "my-orders":
			$title='';
			$styles='';
			$scripts='';
			break;
	case "view-orders":
			$title='View Order - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "account-information":
			$title='Account Information - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "shop":
	case "Shop":
			$title='Product View - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "shopping-cart":
			$title='Cart Items - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "checkout":
			$title='Checkout - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "order-received":
			$title='Order Received - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "shops":
			$title='Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "address-book":
			$title='Address Book - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "wishlist":
			$title='Wishlist - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "my-measurements":
			$title='My Measurements - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "add-profile":
			$title='Add New Profile - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "customize":
			$title='Customize - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "faqs":
			$title='FAQS - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "track-my-order":
			$title='Track My Order - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "terms-and-conditions":
			$title='Terms and Conditions - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "disclaimer":
			$title='Disclaimer - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "privacy-policy":
			$title='Privacy Policy - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "coat-customize":
			$title='Customize - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "add-shipping-address":
			$title='Shipping Address - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "forgot-password":
			$title='Forgot Password - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "about-us":
			$title='About Us - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "how-it-works":
			$title='How It Works - Ot Koo Toor - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "track-order":
			$title='Track Order - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
		case "showrooms":
			$title='Showrooms - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "edit-billing-address":
			$title='Billing Address- Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "edit-shipping-address":
			$title='Shipping Address- Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	}
?>