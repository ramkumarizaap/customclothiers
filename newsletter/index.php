<?php

/**
 * Simple Newsletter System
 * 
 * Version 1.8
 * 
 * Author: David Baker
 * Ver 1.5 Date: 15/Aug/2009
 * Ver 1.6 Date: 8/Nov/2009
 * Ver 1.7 Date: 24/Nov/2009 
 * Ver 1.8 Date: 1/Apr/2010
 * 
 */


if(version_compare(PHP_VERSION, '5.0.0', '<')){
	echo "I'm sorry, PHP version 5 is needed to run this website. <br>";
	echo "The current PHP version is: ". phpversion() . "<br>";
	echo "Your web hosting provider can usually push a button to upgrade you, please contact them.";
	exit;
}


define("_NEWSLETTER_VERSION",1.8);

session_start();

header('Content-Type: text/html; charset=UTF-8');

ob_start();// so we can header:redirect later on

if(is_file("config.php")){
	require_once("config.php");
}
require_once("php/functions.php");
require_once("php/class.newsletter.php");
$newsletter = new newsletter();

if(defined("_DB_NAME"))
{

	require_once("php/database.php");	
	$db = db_connect();
	// if(isset($_REQUEST['p']) && $_REQUEST['p']!='setup')
	// {
		$newsletter->init();
		require_once("php/auth.php");
	// }
}

$show_menu = (isset($_REQUEST['hide_menu'])) ? false : true;

ob_start();
 /*?>if(defined("_DB_NAME") && $show_menu){ ?>
	<div id="loggedin">
		<?php echo _l('Welcome');?> |  <br>
		<iframe src="<?php echo $newsletter->version_url();?>" frameborder="0" style="overflow:none; width:150px; height:45px; background-color:transparent;" scrolling="No"></iframe>
	</div>
<?php } ?> <?php */

 ?>
	<div class="container">
	<?php if(defined("_DB_NAME")){ ?>
		<?php if($show_menu){ ?>

		<!--// navigation -->
		<div class="navi-gation">
    <div class="row">
    <br>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-admin">
                        <span class="sr-only">Toggle Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                                   </div><!--/.navbar-header -->
                <div class="collapse navbar-collapse" id="navbar-admin">
                 
                    <ul class="nav navbar-nav" id="menu">
	                    <li>
							<a href="?p=home"><?php echo _l('Dashboard');?></a>
						</li>
						<li>
							<a href="?p=create"><?php echo _l('Create Newsletter');?></a>
						</li>
						<li>
							<a href="?p=past"><?php echo _l('Past Newsletters');?></a>
						</li>
						<li>
							<a href="?p=campaign"><?php echo _l('Campaigns');?></a>
						</li>
						<li>
							<a href="?p=groups"><?php echo _l('Groups');?></a>
						</li>
						<li>
							<a href="?p=settings"><?php echo _l('Settings');?></a>
						</li>
						<li>
							<a href="?p=members"><?php echo _l('Member List');?></a>
						</li>
						<li>
							<a href="?p=members_add"><?php echo _l('Add Members');?></a>
						</li>
                    </ul>
                    
                
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-sm hidden-xs">
                                                           
                                <a href="?p=logout" class="link-button-color"><?php echo _l('logout');?></a>
                        </li>
                    </ul>
              
             </div><!--/.container-fluid -->
        </nav><!--/.navbar -->
    </div>
</div>
<div class="clear"></div>
		<!-- navigation //-->

			
			
		<?php
		}
		$page=false;
		if(isset($_REQUEST['p']))
		{
			$page = basename($_REQUEST['p']);
		}
		if(!$page || !is_file("php/pages/".$page.".php"))
		{
			$page = "home";
		}
		include("php/pages/".$page.".php");
	}
	else
	{		
		include("php/pages/setup.php");
	}
	?>
	</div>
<?php
$inner_content = ob_get_clean();


// basic header split out so peoplecan keep configuration between versions
require 'layout/system_header.php';
echo $inner_content;
require 'layout/system_footer.php';

?>
