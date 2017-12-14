<?php



if(isset($_REQUEST['p']) && $_REQUEST['p']=="logout"){

	unset($_SESSION['_newsletter_loggedin']);

	$newsletter->logout();
	$login_status = 0;
	header("Location: index.php");

	exit;

}



$login_status = (isset($_SESSION['_newsletter_loggedin']) && $_SESSION['_newsletter_loggedin']);



if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){

	$login_status = $newsletter->login($db,$_REQUEST['username'],$_REQUEST['password']);

}



if($login_status){

	// support for multiple logins at one time.

	$_SESSION['_newsletter_loggedin'] = $login_status;

}





if(!$login_status){

	?>

	<html>

	<head>

		<title>Newsletter Dashboard - Customclothiers - Custom Clothing For Woman</title>

		<link rel="stylesheet" href="layout/css/styles.css" type="text/css" />

            <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">

	</head>



	<body id="mainb">

    <br/>

    <br/>  <br/>  <br/>

<div style="width:100%; text-align:center;"> <img src="../assets/images/logo-new.png"></div>

	<div id="wrapper" style="margin:40px auto;">

    

	



	<!-- -->

	<center>



    <div class="login" role="login">

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 well">
        <br/>
    
       <p> Sign in to newletter dashboard</p>
<br/>

            <form role="form" action="" method="post">

              <div class="form-group">

                <input type="text" class="form-control input-lg" name="username" placeholder="Username" value="<?php echo (_DEMO_MODE)?$newsletter->settings['username']:'';?>">
         

              </div>

              <div class="form-group">

                <input type="password" class="form-control input-lg" name="password" placeholder="Password" value="<?php echo (_DEMO_MODE)?$newsletter->settings['password']:'';?>">
              

              </div>

              <div class="form-group col-xs-4 pull-right">
<br/>
                <input type="submit" name="login_button" value="Sign In" class="btn btn-default btn-lg btn-block btn-success">

              </div>

              <div class="form-group last-row">
<br/>
                <label class="checklabel">

                    * Firefox recommended.

                </label>

              </div>

            </form>

        </div>

    </div>

</center>

	<!-- -->

	

		





	</div>

	<div class="clear"></div>

    <div style=" width:100%; text-align:center;"> <p style="text-align: center;">&copy; Copyright <?php echo date('Y');?> CustomClothiers. All Rights Reserved.</p></div>

	</body>

	</html>

	<?php 

	exit;

}



