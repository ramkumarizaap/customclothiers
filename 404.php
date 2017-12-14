
<head>
   <title> Page Not Found - Ot Koo Toor - Custom Clothing For Woman  </title>
  </head>
<?php
require('includes/action/config.php');
require('includes/template/header.php');
require('includes/template/navbar.php');
?>

<div class="container page-not-found">
	<center>
		<img src="<?php echo $homeurl;?>/assets/images/page-not-found.png" alt="Page Not Found" class="img-responsive" data-error="404" />
		<div class="clear"></div>
		<div class="error-anchors">
			<a href="<?php echo $homeurl;?>" class="btn btn-primary btn-mini">Go To Home</a>
		</div>
	</center>
</div>

<?php
require('includes/template/footer.php');
require('includes/template/scripts.php');

?>