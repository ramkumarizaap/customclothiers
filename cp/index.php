<?php

session_start();

ob_start();

?>

<!DOCTYPE html>

<html lang="en-US">

<head>

<?php

//require_once("../common.php");

require_once("../includes/action/config.php");

require_once("../includes/action/functions.php");

require_once("pagetitle.php");

require_once("includes/header.php");

$site=new Site();

?>

</head>

<!-- HEADER -->

<?php

if($page=="" || $page=="dashboard" || $page=="logout" || $page=="profile" || $page=="users" || $page=="products" || $page=="product-add" || $page=="variants" || $page=="variants-add" || $page=="category" || $page=="category-add"|| $page=="sub-category" || $page=="sub-category-add" || $page=="vendors" || $page=="vendor-add" || $page=="pages" || $page=="pages-add" || $page=="discounts" || $page=="discounts-add" || $page=="fabrics" || $page=="fabrics-add"|| $page=="labels" || $page=="labels-add" || $page=="styles" || $page=="styles-add" || 

		$page=="banner" || $page=="banner-add" || $page=="wedding-banner" || $page=="wedding-banner-add" || $page=="orders" || $page=="view-order" || $page=="print" 

		|| $page=="employees" || $page=="employee-add" || $page=="showrooms" || $page=="showroom-add"

		|| $page=="appointments" || $page=="appointment-list"|| $page=="create-order" || $page=="product"

		|| $page=="faqs" || $page=="faq-add" || $page=="works" || $page=="work-add" || $page=="add-user" ||

		$page=="new-customer" || $page=="old-customer" || $page=="new-order" || $page=="customize"

		|| $page=="view-cart" || $page=="checkout" || $page=="seo" || $page=="contact-us" || $page=="reviews" || $page=="reviews-add"

                || $page=="pro-fields" || $page=="pro-fields-add" || $page=="tab2_fabric" || $page=="tab2_accents"

                || $page=="payment-information" || $page=="gift-card" || $page=="colors" 

                || $page=="colors-add" || $page=="carousel" || $page=="carousel-add" || 

                $page=="quotes" || $page=="quotes-add" || $page=="gift-card-add" || $page=="wedding" || $page=="wedding-add" || $page=="order-received-add" || $page=="why-us" || $page=="why-us-add" || $page=="gallery" || $page=="gallery-add" )

	{

		require_once("content.php");

	}

	else

	{

		include_once("../error.php");

	}

 include("includes/scripts.php"); ?>

</html>