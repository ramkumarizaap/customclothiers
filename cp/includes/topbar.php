<?php



  $site=new Site();

if(isset($_SESSION['admin_user_id'])){

  $user_id=$_SESSION['admin_user_id'];

}

else if(isset($_SESSION['manu_user_id'])){

  $user_id=$_SESSION['manu_user_id'];

}

else if(isset($_SESSION['emp_user_id'])){

  $user_id=$_SESSION['emp_user_id'];

}

    $user=$site->get_user($user_id); 



?>



<header class="main-header">







        <!-- Logo -->



        <a href="<?php echo $adminurl;?>dashboard/" class="logo">



          <!-- mini logo for sidebar mini 50x50 pixels -->



          <span class="logo-mini"><img src="<?php echo $homeurl."assets/images/"."logo4.png"; ?>" ></span>



          <!-- logo for regular state and mobile devices -->



          <span class="logo-lg"><img src="<?php echo $homeurl."assets/images/"."logo1.jpg"; ?>" ></span>



        </a>







        <!-- Header Navbar: style can be found in header.less -->



        <nav class="navbar navbar-static-top" role="navigation">



          <!-- Sidebar toggle button-->



          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">



            <span class="sr-only">Toggle navigation</span>



          </a>



          <!-- Navbar Right Menu -->



          <div class="navbar-custom-menu">



            <ul class="nav navbar-nav">



              <!-- User Account: style can be found in dropdown.less -->



              <li class="dropdown user user-menu">



                <a href="#" class="dropdown-toggle pull-left" data-toggle="dropdown">



                  <img src="<?php echo $homeurl.$user[0]['photo'];?>" class="user-image" alt="User Image">



                  <span class="hidden-xs"><?php echo $user[0]['firstname'];?></span>

                  <span class="caret"></span>

                </a>

                <a class="pull-right" href="<?php echo $adminurl;?>logout/">

                  <i class="fa fa-power-off"></i>

                </a>

                <ul class="dropdown-menu">



                  <!-- User image-->



                  <li class="user-header">



                    <img src="<?php echo $homeurl.$user[0]['photo'];?>" class="img-circle" alt="User Image">



                    <p>

                    <?php 

                    if($user[0]['usertype']=="1")

                      $utype = "Admin";

                    if($user[0]['usertype']=="3")

                      $utype = "Vendor";

                    if($user[0]['usertype']=="4")

                      $utype = "Employee";

                    ?>

                      <?php echo $user[0]['firstname']." - ".$utype;?><br>

                      <small>Last Login : <?php echo date('M d, Y H:i:s',strtotime($user[0]['last_login_time']));?></small>



                    </p>



                  </li>



                  <!-- Menu Body -->



                  <!-- Menu Footer-->



                  <li class="user-footer">



                    <div class="pull-left">



                      <a href="<?php echo $adminurl;?>profile/" class="btn btn-default btn-flat">Profile</a>



                    </div>



                    <div class="pull-right">



                      <a href="<?php echo $adminurl;?>logout/" class="btn btn-default btn-flat">Sign out</a>



                    </div>



                  </li>



                </ul>



              </li>



              <!-- Control Sidebar Toggle Button -->



            </ul>



          </div>







        </nav>



      </header>