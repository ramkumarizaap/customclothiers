<?php

//include_once("../common.php");

if(!isset($page))

	(isset($_REQUEST['page'])) ? $page=$_REQUEST['page'] : $page="";

switch($page)

{

  case "":

		require_once("login.php");

		break;

   case "dashboard":

		require_once("dashboard.php");

		break;

   case "logout":

		require_once("includes/logout.php");

		break;

   case "profile":

		require_once("profile.php");

		break;

   case "users":

		require_once("users.php");

		break;

   case "products":

		require_once("products/products.php");

		break;

   case "product-add":

		require_once("products/product-add.php");

		break;

  case "variants":

		require_once("extras/variants.php");

		break;

  case "variants-add":

		require_once("extras/variants-add.php");

		break;

 case "category":

		require_once("extras/category.php");

		break;

 case "gift-card-add":

		require_once("gift-card-add.php");

		break;

  case "category-add":

		require_once("extras/category-add.php");

		break;

 case "sub-category":

		require_once("extras/sub-category.php");

		break;

  case "sub-category-add":

		require_once("extras/sub-category-add.php");

		break;

case "vendors":

		require_once("vendors/vendors.php");

		break;

case "vendor-add":

		require_once("vendors/vendor-add.php");

		break;

case "pages":

		require_once("pages/pages.php");

		break;

case "pages-add":

		require_once("pages/pages-add.php");

		break;

case "discounts":

		require_once("extras/discounts.php");

		break;

case "discounts-add":

		require_once("extras/discounts-add.php");

		break;

case "fabrics":

		require_once("extras/fabrics.php");

		break;

case "fabrics-add":

		require_once("extras/fabrics-add.php");

		break;

case "labels":

		require_once("property/labels.php");

		break;

case "labels-add":

		require_once("property/labels-add.php");

		break;

case "styles":

		require_once("property/styles.php");

		break;

case "styles-add":

		require_once("property/styles-add.php");

		break;

case "banner":

		require_once("banners.php");

		break;

case "banner-add":

		require_once("banners-add.php");

		break;

case "wedding-banner":

		require_once("wedding-banners.php");

		break;

case "wedding-banner-add":

		require_once("wedding-banners-add.php");

		break;

case "orders":

		require_once("orders.php");

		break;

case "view-order":

		require_once("view-order.php");

		break;		

case "print":

		require_once("print.php");

		break;		

case "employees":

		require_once("employee/employee.php");

		break;		

case "employee-add":

		require_once("employee/employee-add.php");

		break;		

case "showrooms":

		require_once("extras/showrooms.php");

		break;		

case "showroom-add":

		require_once("extras/showroom-add.php");

		break;		

case "appointments":

	require_once("appointments.php");

	break;

case "appointment-list":

	require_once("appointment-list.php");

	break;

case "create-order":

	require_once("check-user.php");

	break;

case "product":

	require_once("product.php");

	break;

case "faqs":

	require_once("faqs/faqs.php");

	break;

case "faq-add":

	require_once("faqs/faq-add.php");

	break;

case "works":

	require_once("works/works.php");

	break;

case "work-add":

	require_once("works/work-add.php");

	break;

case "add-user":

	require_once("add-user.php");

	break;

case "new-customer":

	require_once("new-customer.php");

	break;

case "old-customer":

	require_once("old-customer.php");

	break;

case "new-order":

	require_once("create-order.php");

	break;

case "customize":

	require_once("customize.php");

	break;

case "view-cart":

	require_once("view-cart.php");

	break;

case "checkout":

	require_once("checkout.php");

	break;

case "seo":

	require_once("seo.php");

	break;

case "contact-us":

	require_once("contact-us.php");

	break;

case "reviews":

	require_once("reviews/reviews.php");

	break;

case "reviews-add":

	require_once("reviews/reviews-add.php");

	break;

case "pro-fields":

	require_once("fields/pro-fields.php");

	break;

case "pro-fields-add":

	require_once("fields/pro-fields-add.php");

	break;

case "payment-information":

	require_once("payment-information.php");

	break;

case "gift-card":

	require_once("gift-card.php");

	break;

case "colors":

	require_once("colors.php");

	break;

case "colors-add":

	require_once("colors-add.php");

	break;

case "quotes":

	require_once("quotes.php");

	break;

case "quotes-add":

	require_once("quotes-add.php");

	break;

case "carousel":

	require_once("carousel.php");

	break;

case "carousel-add":

	require_once("carousel-add.php");

	break;

case "wedding":

	require_once("wedding.php");

	break;

case "wedding-add":

	require_once("wedding-add.php");

	break;

	case "order-received-add":
		require_once("order-received-add.php");
	break;
	case "why-us":
		require_once("why-us.php");
	break;
	case "why-us-add":
		require_once("why-us-add.php");
	break;
	case "gallery":
		require_once("gallery.php");
	break;
	case "gallery-add":
		require_once("gallery-add.php");
	break;
}

?>