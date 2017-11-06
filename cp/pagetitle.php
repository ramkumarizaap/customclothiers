<?php
//include_once("../common.php");
if(!isset($page))
	(isset($_REQUEST['page'])) ? $page=$_REQUEST['page'] : $page="";
	switch($page)
	{
		case "":
		case "admin":
			$title='Admin Panel - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
   	case "dashboard":
			$title='Dashboard - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
   case "profile":
			$title='Profile - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
   case "users":
			$title='Users - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
   case "product-add":
   case "products":
			$title='Products - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
   case "variants":
    case "variants-add":
			$title='Variants - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "category":
    case "category-add":
			$title='Category - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "sub-category":
    case "sub-category-add":
			$title='Sub Category - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "vendors":
    case "vendor-add":
			$title='Vendors - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "pages":
    case "pages-add":
			$title='Pages - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "discounts":
    case "discounts-add":
			$title='Discounts - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "fabrics":
    case "fabrics-add":
			$title='Fabrics - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "labels":
    case "labels-add":
			$title='Labels - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "styles":
    case "styles-add":
			$title='Styles - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "banner":
    case "banner-add":
			$title='Banner - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	 case "orders":
			$title='Orders - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "view-order":
			$title='View Order - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "print":
			$title='Print - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "employee-add":
			$title='Add Employee - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "employees":
			$title='Employees - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "showroom-add":
			$title='Add Showroom - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "showrooms":
			$title='Showrooms - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "appointments":
			$title='Appointments - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
	case "appointment-list":
			$title='Appointments List - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
		case "create-order":
					$title='Create Order - Custom Clothiers - Custom Clothing For Woman';
					$styles='';
					$scripts='';
		break;
		case "product":
			$title='Products - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
		case "faqs":
		case "faq-add":
			$title='FAQs  - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
		case "works":
		case "work-add":
			$title='How It Works  - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
		case "add-user":
			$title='Users  - Custom Clothiers - Custom Clothing For Woman';
			$styles='';
			$scripts='';
			break;
		case "new-order":
			$title='Custom Clothiers | New Order';
			$styles='';
			$scripts='';
			break;
		case "new-customer":
			$title='Custom Clothiers | New Customer';
			$styles='';
			$scripts='';
			break;
		case "old-customer":
			$title='Custom Clothiers | Existing Customer';
			$styles='';
			$scripts='';
			break;
		case "customize":
			$title='Custom Clothiers | Customize';
			$styles='';
			$scripts='';
			break;
		case "view-cart":
			$title='Custom Clothiers | Cart';
			$styles='';
			$scripts='';
			break;
		case "checkout":
			$title='Custom Clothiers | Checkout';
			$styles='';
			$scripts='';
			break;
	        case "seo":
			$title='Custom Clothiers | SEO';
			$styles='';
			$scripts='';
			break;
	        case "contact-us":
			$title='Custom Clothiers | Contact Us';
			$styles='';
			$scripts='';
			break;
	        case "reviews-add":
	        case "reviews":
			$title='Custom Clothiers | Reviews';
			$styles='';
			$scripts='';
			break;
	        case "pro-fields-add":
	        case "pro-fields":
			$title='Custom Clothiers | Custom Fields';
			$styles='';
			$scripts='';
			break;
			case "payment-information":
			$title='Custom Clothiers | Payment Information';
			$styles='';
			$scripts='';
			break;
			case "gift-card":
			$title='Custom Clothiers | Gift Card';
			$styles='';
			$scripts='';
			break;
			case "colors-add":
			case "colors":
			$title='Custom Clothiers | Colors ';
			$styles='';
			$scripts='';
			break;
			case "quotes-add":
			case "quotes":
			$title='Custom Clothiers | Quotes ';
			$styles='';
			$scripts='';
			break;
			case "carousel-add":
			case "carousel":
			$title='Custom Clothiers | Carousel ';
			$styles='';
			$scripts='';
			break;
			case "wedding-add":
			case "wedding":
			$title='Custom Clothiers | Wedding ';
			$styles='';
			$scripts='';
			break;
			case "wedding-banner-add":
			case "wedding-banner":
			$title='Custom Clothiers | Wedding Banner ';
			$styles='';
			$scripts='';
			break;
			case "why-us-add":
			case "why-us":
			$title='Why Us - Custom Clothiers - Custom Clothing For Woman ';
			$styles='';
			$scripts='';
			break;
	}
?>