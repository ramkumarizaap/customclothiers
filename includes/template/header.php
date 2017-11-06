<?php 
if($page==""){$page="home";}
$seo=$site->get_seo($page);
$page_title=$seo[0]['page_title'];
$keyword=$seo[0]['keyword'];
$desc=$seo[0]['desc'];
?>


<!DOCTYPE html>

<html lang="en-US">



  <head>


<?php if($page!="customize"){?>
    <meta charset="utf-8">


    <meta name="<?php echo $keyword;?>" content="<?php echo $desc;?>">


    <meta name="author" content=" ">



    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php }?>


    <link rel="shortcut icon" href="<?php echo $homeurl;?>assets/images/favicon.png" type="image/x-icon">



    



    <title>

<?php if($page=="reviews-add"){ echo "Add Review - Ot Koo Toor - Custom Clothing For Woman";}else{ echo $page_title;}?>


    </title>



    



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/flexslider.css">



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/chosen.css">

    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/custom.css">



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/jquery-ui-1.10.3.custom.min.css">



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/testimonial.css">



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/font-awesome-4.4.0/css/font-awesome.css">



    



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/bootstrap.css">



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/styles.css">



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/fonts.css">



    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/decima.css">



    <!--<link rel="stylesheet" type="text/css" href="<?php echo $homeurl;?>assets/css/style1.css">-->



        <link rel="stylesheet" href="<?php echo $homeurl;?>assets/css/datepicker3.css">

<script src="<?php echo $homeurl;?>assets/js/jQuery-2.1.4.min.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->



    <!--[if lt IE 9]>



<script src="bootstrap/js/html5shiv.js">



</script>



<script src="bootstrap/js/respond.min.js">



</script>



<![endif]-->



  



  </head>