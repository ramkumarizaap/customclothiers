<?php
ob_start();
session_start();
include('../../includes/action/config.php');
include('../../includes/action/functions.php');
$site=new Site();
//include('../../common.php');
global $con;
if(isset($_POST['admin_login']))
{
    $username=mysqli_real_escape_string($con,trim($_POST['username']));
    $password=mysqli_real_escape_string($con,trim($_POST['password']));
    $sql=mysqli_query($con,"select * from user_master where username='".$username."' and password='".$password."' and block=0");
    if($sql)
    {
        if(mysqli_num_rows($sql) > 0)
        {
            $r=mysqli_fetch_array($sql);
            $last_login=$r['last_login_time'];
            $current_login=$r['current_login_time'];
            $sql1 = mysqli_query($con,"update user_master set last_login_time='$current_login',current_login_time=NOW()
                where user_id='".$r['user_id']."'");
            if($r['user_type']=="1")
            {
                $_SESSION['admin_user_id']=$r['user_id'];
            }
            elseif($r['user_type']=="3")
            {
                $_SESSION['manu_user_id']=$r['user_id'];
            }
            elseif($r['user_type']=="4")
            {
                $_SESSION['emp_user_id']=$r['user_id'];
            }
            $_SESSION['firstname']=$r['firstname'];
            $_SESSION['username']=$r['username'];
            $_SESSION['password']=$r['password'];
            $_SESSION['usertype']=$r['user_type'];
            $_SESSION['email']=$r['email'];
            $_SESSION['photo']=$r['img'];
            header("Location:{$adminurl}dashboard/");
        }
        else
        {
            $_SESSION['log_fail']="Username or Password is Invalid!!!";
            header("Location:{$adminurl}");
        }
    }
    else
    {
        $_SESSION['log_fail']="Something went wrong!!!";
        header("Location:{$adminurl}");
    }
}
if(isset($_POST['admin_profile']))
{
         $firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));
         $id=mysqli_real_escape_string($con,trim($_POST['user_id']));
         $email=mysqli_real_escape_string($con,trim($_POST['email']));
         $mobile=mysqli_real_escape_string($con,trim($_POST['mobile']));
         $date=date("Y-m-d H:i:s");
         $sql=mysqli_query($con,"update user_master set email='".$email."',last_updated='".$date."',firstname='".$firstname."',mobile='".$mobile."' where user_id='".$id."'");
         $_SESSION['settings_save']="Profile Settings has been saved successfully!!!";
         header("Location:{$adminurl}profile/");
}
if(isset($_POST['admin_photo']))
{
    $id=mysqli_real_escape_string($con,trim($_POST['user_id']));
    if($_FILES['userfile']['size']!=0)
        {
          if(!file_exists('../../assets/uploads/users/'.$id.'/profile/'))
            {
                mkdir('../../assets/uploads/users/'.$id.'/profile/', 0777, true);
            }
            $img="";
            $type=$_FILES['userfile']['type'];
            $ext=get_image_type($type);
            $rand=time();
            $temp=$_FILES['userfile']['tmp_name'];
            $target="../../assets/uploads/users/".$id."/profile/".$rand.$ext;
            $target1="assets/uploads/users/".$id."/profile/".$rand.$ext;
            $img.=$target1;
            move_uploaded_file($temp,$target);
            $temp='';
            $target='';
            $rand='';
            $ext='';
        }
        else
        {
            $img=mysqli_real_escape_string($con,trim($_POST['old_img']));
        }
$date=date("Y-m-d H:i:s");
    $sql=mysqli_query($con,"update user_master set last_updated='".$date."',img='".$img."'
         where user_id=$id");
     $_SESSION['settings_save']="Photo has been saved successfully!!!";
     header("Location:{$adminurl}profile/");
}
if(isset($_POST['admin_password']))
{
    $id=mysqli_real_escape_string($con,trim($_POST['user_id']));
    $o_pass=mysqli_real_escape_string($con,trim($_POST['o_password']));
    $n_pass=mysqli_real_escape_string($con,trim($_POST['n_password']));
    $c_pass=mysqli_real_escape_string($con,trim($_POST['c_password']));
    if($o_pass=="" || $n_pass=="" || $c_pass=="")
    {
        if($o_pass=="")
        {
             $_SESSION['pass_wrong']="Please Enter Old Password.";
             header("Location:{$adminurl}profile/");
        }
        else if($n_pass=="")
        {
             $_SESSION['pass_wrong']="Please Enter New Password.";
             header("Location:{$adminurl}profile/");
        }
       else if($c_pass=="")
        {
             $_SESSION['pass_wrong']="Please Enter Confirm Password.";
             header("Location:{$adminurl}profile/");
        }
    }
    else
    {
        $sql=mysqli_query($con,"select * from user_master where password='".$o_pass."' and user_id=$id");
        if(mysqli_num_rows($sql) > 0)
        {
            if($n_pass!=$c_pass)
            {
                $_SESSION['pass_wrong']="Password Mismatch";
                header("Location:{$adminurl}profile/");
            }   
            else
            {
                $date=date("Y-m-d H:i:s");
                $query=mysqli_query($con,"update user_master set password='".$n_pass."' where user_id=$id");
                $_SESSION['settings_save']="Password has been changed successfully.";
                header("Location:{$adminurl}profile/");
            }
        }   
        else
        {
             $_SESSION['pass_wrong']="Sorry!!!Your Old Password is Wrong.";
             header("Location:{$adminurl}profile/");
        }
    } 
}
if(isset($_POST['create_order']))
{
    $product=mysqli_real_escape_string($con,trim($_POST['product']));
    $price=mysqli_real_escape_string($con,trim($_POST['price']));
    $subcatid=mysqli_real_escape_string($con,trim($_POST['subcatid']));
    $catid=mysqli_real_escape_string($con,trim($_POST['catid']));
    $firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));
    $lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));
    $email=mysqli_real_escape_string($con,trim($_POST['email']));
    $phone=mysqli_real_escape_string($con,trim($_POST['phone']));
    $address1=mysqli_real_escape_string($con,trim($_POST['address1']));
    $address2=mysqli_real_escape_string($con,trim($_POST['address2']));
    $city=mysqli_real_escape_string($con,trim($_POST['city']));
    $province=mysqli_real_escape_string($con,trim($_POST['province']));
    $country=mysqli_real_escape_string($con,trim($_POST['country']));
    $zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));
    $height=mysqli_real_escape_string($con,trim($_POST['height']));
    $weight=mysqli_real_escape_string($con,trim($_POST['weight']));
    $param_chest=mysqli_real_escape_string($con,trim($_POST['param_chest']));
    $param_abdomen=mysqli_real_escape_string($con,trim($_POST['param_abdomen']));
    $param_buttocks=mysqli_real_escape_string($con,trim($_POST['param_buttocks']));
    $param_hip=mysqli_real_escape_string($con,trim($_POST['param_hip']));
    $coat_length=mysqli_real_escape_string($con,trim($_POST['coat_length']));
    $body_length=mysqli_real_escape_string($con,trim($_POST['body_length']));
    $dress_length=mysqli_real_escape_string($con,trim($_POST['dress_length']));
    $sleeves_length=mysqli_real_escape_string($con,trim($_POST['sleeves_length']));
    $shoulders=mysqli_real_escape_string($con,trim($_POST['shoulders']));
    $neck=mysqli_real_escape_string($con,trim($_POST['neck']));
    $chest=mysqli_real_escape_string($con,trim($_POST['chest']));
    $stomach=mysqli_real_escape_string($con,trim($_POST['stomach']));
    $breast_point=mysqli_real_escape_string($con,trim($_POST['breast_point']));
    $waist_point=mysqli_real_escape_string($con,trim($_POST['waist_point']));
    $pants_length=mysqli_real_escape_string($con,trim($_POST['pants_length']));
    $skirt_length=mysqli_real_escape_string($con,trim($_POST['skirt_length']));
    $hips=mysqli_real_escape_string($con,trim($_POST['hips']));
    $waist=mysqli_real_escape_string($con,trim($_POST['waist']));
    $crotch=mysqli_real_escape_string($con,trim($_POST['crotch']));
    $thigh=mysqli_real_escape_string($con,trim($_POST['thigh']));
    $biceps=mysqli_real_escape_string($con,trim($_POST['biceps']));
    $pants_position=mysqli_real_escape_string($con,trim($_POST['pants_position']));
    $skirt_position=mysqli_real_escape_string($con,trim($_POST['skirt_position']));
    
    $date=date("Y-m-d H:i:s");
    $sql1=mysqli_query($con,"insert into user_master(firstname,lastname,mobile,email,password,address1,
        address2,city,province,country,zipcode,block,user_type,created_date)
    values('".$firstname."','".$lastname."','".$phone."','".$email."','123456','".$address1."',
        '".$address2."','".$city."','".$province."','".$country."','".$zipcode."',0,2,'".$date."')");
    $user_id=mysqli_insert_id($con);
  $j_date=date("Y-m-d");
        $sql5=mysqli_query($con,"insert into member (first_name,last_name,email,join_date)
            values('".$firstname."','".$lastname."','".$email."','".$j_date."')");
        $m_id=mysqli_insert_id($con);
        $sql6=mysqli_query($con,"insert into member_group(member_id,group_id)values('".$m_id."','4')");
    //$user_id="25";
    $sql2=mysqli_query($con,"INSERT INTO `measurement_profile_master`(`mp_userid`, `mp_name`, `mp_height`,
     `mp_weight`, `mp_chest`, `mp_abdomen`, `mp_buttocks`, `mp_hips`, `coat_length`, `torso_length`,
      `dress_length`, `sleeve_length`, `shoulder_width`, `neck`, `chest_around`, `stomach`, 
      `breast_point`, `waist_point`, `pant_length`, `skirt_length`, `hips`, `waist`, `rise`, `thigh`, 
      `bicep_around`, `pant_waist`, `skirt_position`, `created_date`)
       VALUES ('".$user_id."','".$firstname."','".$height."','".$weight."','".$param_chest."',
        '".$param_abdomen."','".$param_buttocks."','".$param_hip."','".$coat_length."','".$body_length."',
        '".$dress_length."','".$sleeves_length."','".$shoulders."','".$neck."','".$chest."','".$stomach."',
        '".$breast_point."','".$waist_point."','".$pants_length."','".$skirt_length."','".$hips."',
        '".$waist."','".$crotch."','".$thigh."','".$biceps."','".$pants_position."','".$skirt_position."',
        '".$date."')");
    $mp_id=mysqli_insert_id($con);
    $sql3=mysqli_query($con,"insert into shipping_address(userid,sa_firstname,sa_lastname,sa_address1,
        sa_address2,sa_city,sa_province,sa_country,sa_zipcode,created_date)
    values('".$user_id."','".$firstname."','".$lastname."','".$address1."','".$address2."',
        '".$city."','".$province."','".$country."','".$zipcode."','".$date."')");
    $ship_id=mysqli_insert_id($con);
    $get_oid = mysqli_query($con,"select max(order_id) as oid from order_master");
    if(mysqli_num_rows($get_oid))
    {
        $r=mysqli_fetch_array($get_oid);
        $a = str_replace("CC","",$r['oid']);
        $order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
    }
    else
    {
        $order_id="CC00000001";
    }
    $sql4=mysqli_query($con,"select cat_name from category_master where cat_id=$catid");
    $r4=mysqli_fetch_array($sql4);
    $p_type=str_replace(" ","-",strtolower($r4['cat_name']));
     $sql4=mysqli_query($con,"insert into order_master(order_id,pid,userid,mpid,subcatid,p_type,om_quantity,om_price,order_status,om_status,ship_id,placed_by,created_date,last_updated)
        values('".$order_id."','".$product."','".$user_id."','".$mp_id."','".$subcatid."','".$p_type."',1,'".$price."','Processing',0,'".$ship_id."','".$placed_by."','".$date."','".$date."')");             
    $_SESSION['ord_success']="Your Order ID is ".$order_id;
    header("Location:{$adminurl}orders/");
        
}
if(isset($_POST['create_order2']))
{
    $user_id=mysqli_real_escape_string($con,trim($_POST['user_id']));
    $mp_id=mysqli_real_escape_string($con,trim($_POST['mp_id']));
    $date=date("Y-m-d H:i:s");
      $address1=mysqli_real_escape_string($con,trim($_POST['address1']));
    $address2=mysqli_real_escape_string($con,trim($_POST['address2']));
    $city=mysqli_real_escape_string($con,trim($_POST['city']));
    $province=mysqli_real_escape_string($con,trim($_POST['province']));
    $country=mysqli_real_escape_string($con,trim($_POST['country']));
    $zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));
    $product=mysqli_real_escape_string($con,trim($_POST['product']));
    $price=mysqli_real_escape_string($con,trim($_POST['price']));
    $subcatid=mysqli_real_escape_string($con,trim($_POST['subcatid']));
    $catid=mysqli_real_escape_string($con,trim($_POST['catid']));
    $ship_id=mysqli_real_escape_string($con,trim($_POST['ship_id']));
    $sql4=mysqli_query($con,"select cat_name from category_master where cat_id=$catid");
    $r4=mysqli_fetch_array($sql4);
    $p_type=str_replace(" ","-",strtolower($r4['cat_name']));
   $get_oid = mysqli_query($con,"select max(order_id) as oid from order_master");
    if(mysqli_num_rows($get_oid))
    {
        $r=mysqli_fetch_array($get_oid);
        $a = str_replace("CC","",$r['oid']);
        $order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
    }
    else
    {
        $order_id="CC00000001";
    }
     $sql1=mysqli_query($con,"insert into order_master(order_id,pid,userid,mpid,subcatid,p_type,om_quantity,om_price,order_status,om_status,ship_id,placed_by,created_date,last_updated)
        values('".$order_id."','".$product."','".$user_id."','".$mp_id."','".$subcatid."','".$p_type."',1,'".$price."','Processing',0,'".$ship_id."','".$placed_by."','".$date."','".$date."')");             
    
    $sql2=mysqli_query($con,"update shipping_address set sa_address1='".$address1."',
        sa_address2='".$address2."',sa_city='".$city."',sa_zipcode='".$zipcode."',sa_province='".$province."',
        sa_country='".$country."',last_updated='".$date."' where userid=$user_id");
        $_SESSION['ord_success']="Your Order ID is ".$order_id;
    header("Location:{$adminurl}orders/");
}
if(isset($_POST['save_customer']))
{
    $catid=mysqli_real_escape_string($con,trim($_POST['catid']));
    $firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));
    $lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));
    $email=mysqli_real_escape_string($con,trim($_POST['email']));
    $phone=mysqli_real_escape_string($con,trim($_POST['mobile']));
    $address1=mysqli_real_escape_string($con,trim($_POST['address1']));
    $address2=mysqli_real_escape_string($con,trim($_POST['address2']));
    $city=mysqli_real_escape_string($con,trim($_POST['city']));
    $province=mysqli_real_escape_string($con,trim($_POST['province']));
    $country=mysqli_real_escape_string($con,trim($_POST['country']));
    $zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));
    $date=date("Y-m-d H:i:s");

    $sql1=mysqli_query($con,"insert into user_master(firstname,lastname,mobile,email,password,address1,
        address2,city,province,country,zipcode,block,user_type,created_date)
    values('".$firstname."','".$lastname."','".$phone."','".$email."','123456','".$address1."',
        '".$address2."','".$city."','".$province."','".$country."','".$zipcode."',0,2,'".$date."')");
   $user_id=mysqli_insert_id($con);
   if ($_FILES['photo1']['size']!=0) 
    { 
        $tmp=$_FILES['photo1']['tmp_name'];
        if(!file_exists("../../uploads/user_photo/".$user_id."/"))
        {
            mkdir("../../uploads/user_photo/".$user_id."/",0777,true);
        }
        $img1="uploads/user_photo/".$user_id."/".$_FILES['photo1']['name'];
        $dir="../../uploads/user_photo/".$user_id."/".$_FILES['photo1']['name'];
        move_uploaded_file($tmp, $dir);
    }
    if ($_FILES['photo2']['size']!=0) 
    { 
        $tmp2=$_FILES['photo2']['tmp_name'];
        if(!file_exists("../../uploads/user_photo/".$user_id."/"))
        {
            mkdir("../../uploads/user_photo/".$user_id."/",0777,true);
        }
        $img2="uploads/user_photo/".$user_id."/".$_FILES['photo2']['name'];
        $dir2="../../uploads/user_photo/".$user_id."/".$_FILES['photo2']['name'];
        move_uploaded_file($tmp2, $dir2);
    }
    if ($_FILES['photo3']['size']!=0) 
    { 
        $tmp3=$_FILES['photo3']['tmp_name'];
        if(!file_exists("../../uploads/user_photo/".$user_id."/"))
        {
            mkdir("../../uploads/user_photo/".$user_id."/",0777,true);
        }
        $img3="uploads/user_photo/".$user_id."/".$_FILES['photo3']['name'];
        $dir3="../../uploads/user_photo/".$user_id."/".$_FILES['photo3']['name'];
        move_uploaded_file($tmp3, $dir3);
    }
    $img_up=mysqli_query($con,"update user_master set last_updated='".$date."',img='".$img1."',img2='".$img2."',img3='".$img3."' where user_id='".$user_id."'");

    $_SESSION['user_succ'] = "user_success";
    header("Location:{$adminurl}new-order/{$user_id}/");
}



if(isset($_POST['place_order']))
{

    $a1=array();$a2=array();$b1=0;$b2=0;
    $order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
    $ship_id=mysqli_real_escape_string($con,trim($_POST['ship_id']));
    $userid=mysqli_real_escape_string($con,trim($_POST['userid']));
    $firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));
    $lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));
    $address1=mysqli_real_escape_string($con,trim($_POST['address1']));
    $address2=mysqli_real_escape_string($con,trim($_POST['address2']));
    $city=mysqli_real_escape_string($con,trim($_POST['city']));
    $province=mysqli_real_escape_string($con,trim($_POST['province']));
    $country=mysqli_real_escape_string($con,trim($_POST['country']));
    $zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));
    $discount = (isset($_SESSION['order_discount']) && $_SESSION['order_discount']!='') ? $_SESSION['order_discount']:0;
    $date=date('Y-m-d H:i:s');
    /*$sql=mysqli_query($con,"select userid from shipping_address where userid=$userid");
    if(mysqli_num_rows($sql) > 0)
    {
      $sql1=mysqli_query($con,"update shipping_address set sa_address1='".$address1."',
      sa_address2='".$address2."',sa_city='".$city."',sa_zipcode='".$zipcode."',
      sa_province='".$province."',sa_country='".$country."' where sa_id=$ship_id");
    }
    else
    {
      $sql22=mysqli_query($con,"insert into shipping_address(sa_firstname,sa_lastname,sa_address1,
      sa_address2,sa_city,sa_province,sa_country,sa_zipcode,userid)
      values('".$firstname."','".$lastname."','".$address1."','".$address2."','".$city."',
      '".$province."','".$country."','".$zipcode."','".$userid."')");
        $ship_id=mysqli_insert_id($con);
    }*/

    $sql=mysqli_query($con,"select userid from  shipping_address  where userid='".$userid."' and sa_firstname='".$firstname."' and sa_lastname='".$lastname."' and sa_address1='".$address1."' and sa_address2='".$address2."' and sa_city='".$city."' and sa_province='".$province."' and sa_country='".$country."' and sa_zipcode='".$zipcode."' ");


    if(mysqli_num_rows($sql) == 0)


    {
        $sql=mysqli_query($con,"insert into shipping_address (userid,sa_firstname,sa_lastname,sa_address1,sa_address2,sa_city,sa_province,sa_country,sa_zipcode,last_updated) values(".$userid.",'".$firstname."','".$lastname."','".$address1."','".$address2."','".$city."','".$province."','".$country."','".$zipcode."','".$date."')");
        $ship_id = mysqli_insert_id($con);
    }

    else
    {
        $sql = mysqli_query($con,"select * from  shipping_address  where userid='".$userid."' and sa_firstname='".$firstname."' and sa_lastname='".$lastname."' and sa_address1='".$address1."' and sa_address2='".$address2."' and sa_city='".$city."' and sa_province='".$province."' and sa_country='".$country."' and sa_zipcode='".$zipcode."'");
        $sql1 = mysqli_fetch_array($sql);
        $ship_id = $sql1[0];
    }

    /* Sales Track Update

        $date=date('Y-m-d');
        $date1=date('Y-m-d H:i:s');
         $sql11=mysqli_query($con,"select b.catid from order_master a ,sub_category_master b where a.order_id=$order_id and a.subcatid=b.sub_cat_id");
        while($r11=mysqli_fetch_array($sql11))
        {
            if($r11['sub_cat_id']==1){$col="t_suits";}elseif($r11['sub_cat_id']==2){$col="t_shirts";}
            elseif($r11['sub_cat_id']==3){$col="t_blazers";}
            elseif($r11['sub_cat_id']==4){$col="t_trousers";}
            $sql12=mysqli_query($con,"select $col as count_id from track_master where t_date='".$date."'");
            if(mysqli_num_rows($sql12) > 0)
            {
                $r12=mysqli_fetch_array($sql12);
                $val=$r12['count_id'] + 1;
                
                $sql22=mysqli_query($con,"update track_master set $col='".$val."',last_updated='".$date1."' where t_date='".$date."'");
            }
            else
            {
                $sql22=mysqli_query($con,"insert into track_master ($col,t_date,created_date)values(1,'".$date."','".$date1."')");
            }
        }
        /*End Sales Track Update*/

    $update_order_id =mysqli_query($con,"update order_master set order_id='".$order_id."' where userid='".$userid."' 
        and om_status=1");
    $sql2=mysqli_query($con,"update order_master set om_status=0,ship_id=$ship_id,last_updated=NOW()
           where order_id='".$order_id."'");
    $ship=mysqli_query($con,"select shipping_cost from payment_information");
    $sp=mysqli_fetch_array($ship);
    $shipping_cost=$sp['shipping_cost'];
    $sql3=mysqli_query($con,"select sum(om_price) as price from order_master where order_id='".$order_id."'");
    $r3=mysqli_fetch_array($sql3);
    $sql13=mysqli_query($con,"select sum(amount) as amount from gift_card_master where userid=$userid and status=0");
    $r13=mysqli_fetch_array($sql13);
    $sql14=mysqli_query($con,"select amount as amount from gift_card_applied where userid=$userid and status=0");
    $r14=mysqli_fetch_array($sql14);
    $sql15=mysqli_query($con,"select amount as amount from coupon_applied where userid=$userid and status=0");
    $r15=mysqli_fetch_array($sql14);
    $price=($r3['price'] + $r13['amount'] +  $shipping_cost) - $r14['amount']-$r15['amount']-$discount;
    $trans_id=uniqid(rand(), true);
    $sql4=mysqli_query($con,"insert into payment_master(orderid,trans_id,amount,payment_type,status,
      userid,date,created_date)values('".$order_id."','".$trans_id."','".$price."',
      'In-Store Credit','Completed',$userid,NOW(),NOW())");
     $sql5=mysqli_query($con,"select email,firstname,mobile from user_master where user_id=$userid");
     $r5=mysqli_fetch_array($sql5);
     $email=$r5['email'];
     $name=$r5['firstname'];
     $mobile=$r5['mobile'];
    /* Order History Mail Template */
    $date=date('Y-m-d H:i:s');
    $sp=$site->get_payment_information();
    $sp_cost=$sp[0]['shipping_cost'];
    $ship_dtl_qry = mysqli_query($con,"select * from shipping_address where userid=".$userid." and sa_id=".$ship_id."");
    if($ship_dtl_qry)
    {
    $ship_dtl = mysqli_fetch_array($ship_dtl_qry);
    }

    $billing_dtl_qry = mysqli_query($con,"select * from user_master where 
                    user_id=".$userid."");

    if($billing_dtl_qry)
    {
        $billing_dtl = mysqli_fetch_array($billing_dtl_qry);
    }


    $insert_order_info =mysqli_query($con,"insert into payment_master(orderid,trans_id,amount,payment_type,status,userid,date,created_date) values('".$res[0]['order_id']."','','".$tot5."','".$_POST['payment-methods']."','Completed','".$userid."','".$res[0]['created_date']."','".$date."')");
    $py_id=mysqli_insert_id($con);
    if($insert_order_info) 
    {
      $message .= '
        <div style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0; font-size:12px;
          font-family:Arial,Helvetica,sans-serif;color:#000">    
          <center>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" style="background-color:#ffffff;">
                  <table width="580" cellspacing="0" cellpadding="0" border="0" align="center" 
                    style="padding:24px;background-color:#ffffff; font-size:12px;
                    font-family:Arial,Helvetica,sans-serif;color:#000">      
                    <tr>
                      <td width="580">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center"><p style="color:#000; font-size:16px;
                        font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-weight:bold;">
                         <strong>CUSTOM CLOTHIERS ORDER INFORMATION</strong></p></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color:#737373;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="100%">
                                        <p style="color:#fff; margin-top:5px; margin-bottom:0px; padding-left:15px; font-size:13px; line-height:25px">Order Number: '.$order_id.'</p>
                                     <p style="color:#fff; margin-top:5px; margin-bottom:0px; padding-left:15px; font-size:13px; line-height:25px">Ordered Date: '.date('M d, Y').'</p>
                                    </td>
                                  </tr>
                            </table>
                     </td>
                    </tr>
                    <tr>
                        <td>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Sold To</strong></td>
                              <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-bottom:0;"><strong>Ship To</strong></td>
                            </tr>
                            <tr>
                              <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; border-right:0; font-size:13px;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">'.$billing_dtl['firstname'].' '.$billing_dtl['lastname'].'</strong></td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$billing_dtl["address1"].'</td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$billing_dtl["city"].', '.$billing_dtl["province"].'</td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$billing_dtl["country"].', '.$billing_dtl["zipcode"].'</td>
                                  </tr>
                                  <tr></tr>
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>
                                    </tr>
                                </table>
                              </td>
                              <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; font-size:13px;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">'.$ship_dtl['sa_firstname'].' '.$ship_dtl['sa_lastname'].'</strong></td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$ship_dtl["sa_address1"].'</td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$ship_dtl["sa_city"].', '.$ship_dtl["sa_province"].'</td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;">'.$ship_dtl["sa_country"].', '.$ship_dtl["sa_zipcode"].'</td>
                                  </tr>
                                  <tr></tr>
                                  <tr>
                                    <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Shipping Method</strong>
                            </td>
                            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-bottom:0;"><strong>Payment Method</strong></td>
                        </tr>
                        <tr>
                            <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; border-right:0; font-size:13px;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                 <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">Shipping Fee - '.$sp_cost.'</td>
                                </tr>                                     
                              </table>
                            </td>
                                <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; font-size:13px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">In-Store-Credit</td>
                                      </tr>
                                      <tr></tr>
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                              </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>        
                    <tr>
                      <td valign="top">                          
                      </td>
                    </tr>
                    <tr>
                      <td valign="top">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="margin-left:auto; margin-right:auto;">
                          <tr>
                            <td height="10" colspan="6">&nbsp;</td>
                          </tr>
                          <tr>
                           <td colspan="6" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-bottom:0;"><strong>Items Ordered</strong></td>
                          </tr>
                          <tr>
                            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Product Name</strong></td>
                            
                            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Price</strong></td>
                            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Qty</strong></td>
                            <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Total</strong></td>
                          </tr>';
                          $sql11=mysqli_query($con,"select a.*,a.created_date as c_date,b.p_description from order_master a,product_master b where a.order_id='$order_id' and a.pid=b.p_id and 
                            a.om_status=0 order by a.created_date desc");
                          $tax=$site->get_tax($userid);
                        
                          $r11 = mysqli_fetch_array($sql11);
                          $total='';
                          foreach( $sql11 as $key=>$value )
                          { 
                              $tot1='';
                              $tot1=$tot1 + ($value['om_quantity'] * $value['om_price']);
                              $total=$total + ($value['om_quantity'] * $value['om_price']);
                              $product_name_qry = mysqli_query($con,'select p_name from product_master where p_id = '.$value['pid'].'');
                              if($product_name_qry) 
                              {
                                  $product_dtl = mysqli_fetch_array($product_name_qry);
                                  $p_name = $product_dtl['p_name'];
                                  if($value['om_style']!='') 
                                  {
                                    $p_name = "Custom ". $product_dtl['p_name'];
                                  }
                                  else
                                  {
                                    $p_name = $product_dtl['p_name'];
                                  }
                              }

                              

                             $message .=  '
                                <tr>
                                     <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">'.$p_name.'</td>
                                         <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">$'.$value['om_price'].'</td>
                                    <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-right:0; border-top:0;">'.$value['om_quantity'].'</td>
                                    <td bgcolor="#FFFFFF" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd;  border-top:0;">$'.$tot1.'</td>
                                </tr>';
                          }               
                          $gift=mysqli_query($con,"select * from gift_card_master where userid=$userid and status=0 order by created_date desc");
                          if(mysqli_num_rows($gift))
                           {
                              while($gr=mysqli_fetch_array($gift))
                              {
                                $a1[$b1]=$gr['amount'] * $gr['quantity'];
                                $message.='
                                    <tr>
                                      <td style="padding:5px 10px; border:1px solid #dddddd;border-right:0;">Gift Card</td>
                                      <td style="padding:5px 10px; border:1px solid #dddddd;
                                        border-right:0;">$'.$gr['amount'].'</td>
                                      <td style="padding:5px 10px; border:1px solid #dddddd;
                                        border-right:0;">'.$gr['quantity'].'</td>
                                      <td style="padding:5px 10px; border:1px solid #dddddd;">
                                        $'.$gr['amount'] * $gr['quantity'].'</td>
                                    </tr>';
                                    $b1++;
                               }
                           }
                            $message .= '
                            <tr>
                              <td colspan="5" bgcolor="#FFFFFF" style="background-color:#ffffff; border:1px solid #dddddd; border-top:0;">
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="right" style="padding:5px 10px; background-color:#efefef;">Sub Total</td>
                                      <td align="right" style="padding:5px 10px; background-color:#efefef;">$'.number_format($total + array_sum($a1),2).'</td>
                                    </tr>';
                                      $app=mysqli_query($con,"select * from gift_card_applied
                                      where userid=$userid and orderid='$order_id' and status=0");
                                    if(mysqli_num_rows($app))
                                    {
                                      $message.='
                                      <tr>
                                       <td align="right" style="padding:5px 10px; background-color:#efefef;"><strong>Gift Voucher</strong></td>
                                       <td style="padding:5px 10px; background-color:#efefef;"></td>
                                      </tr>';
                                      $ar=mysqli_fetch_array($app);
                                       /*while($ar=mysqli_fetch_array($app))
                                       {*/
                                          $a2[$b2]=$g_amt=$ar['amount'];
                                          $message.='
                                          <tr>
                                            <td align="right" style="padding:5px 10px; background-color:#efefef;font-size:12px;">'.$ar['code'].'</td>
                                            <td align="right" style="padding:5px 10px; background-color:#efefef;font-size:12px;">(-) $'.number_format($ar['amount'],2).'</td>
                                          </tr>';
                                          $b2++;
                                        //}
                                    }
                                    

                                    $coupon_applied=mysqli_query($con,"select * from coupon_applied where userid=$userid and status=0");
                                    if(mysqli_num_rows($coupon_applied))
                                    {
                                        $cr=mysqli_fetch_array($coupon_applied);
                                         if($cr['coupon_type']=="$")
                                            {
                                                $dis=$cr['value'];
                                            }
                                            if($cr['coupon_type']=="Discount")
                                            {
                                              $dis= ((($total + array_sum($a1))- array_sum($a2)) / 100) * $cr['value'];
                                            }
                                            if($cr['coupon_type']=="Free Shipping")
                                            {
                                              $dis="0";
                                              $sp_cost=0;
                                            }
                                        $message .=
                                        '<tr>
                                            <td align="right" style="padding:5px 10px; background-color:#efefef;">
                                                <strong>Coupon <small>( '.$cr['code'].' )</small></strong>
                                            </td>
                                            <td align="right" style="padding:5px 10px; background-color:#efefef;">';
                                                if($cr['coupon_type']=="$")
                                                    $message .= "(-) $".number_format($cr['value'],2);
                                                else if($cr['coupon_type']=="Discount")
                                                    $message .= "(-) ".number_format($cr['value'],2)."%";
                                                else if($cr['coupon_type']=="Free Shipping")
                                                    $message .= "Free Shipping";
                                            '</td>
                                        </tr>';
                                    }

                                    if(isset($_SESSION['order_discount']) && $_SESSION['order_discount']!='')
                                    {
                                      $message.='  <tr>
                                          <td align="right" style="padding:5px 10px; background-color:#efefef;">Discount</td>
                                          <td align="right" style="padding:5px 10px; background-color:#efefef;">(-) 
                                          '.number_format($_SESSION['order_discount'],2).'</td>
                                        </tr>';
                                    }

                                    
                                    if($tax!='' || $tax!=0 || $tax!="0")
                                    {
                                        $message.='  
                                        <tr>
                                            <td align="right" style="padding:5px 10px; background-color:#efefef;">Tax</td>
                                            <td align="right" style="padding:5px 10px; background-color:#efefef;">(+) 
                                            '.number_format($tax,2).'%</td>
                                        </tr>';
                                    }
                                    $message.='  <tr>
                                      <td align="right" style="padding:5px 10px; background-color:#efefef;">Shipping</td>
                                      <td align="right" style="padding:5px 10px; background-color:#efefef;">
                                      (+) $'.number_format($sp_cost,2).'</td>
                                    </tr>';
                                  

                                    $tp=((((($total + array_sum($a1)) - array_sum($a2)) - $_SESSION['order_discount'] ) - $dis) / 100 )  * $tax;

                                    $full_t=number_format(((($total + $tp + $sp_cost + array_sum($a1)) - 
                                          array_sum($a2)) - $_SESSION['order_discount']) - $dis,2);
                                    
                                    $message.='
                                    <tr>
                                      <td width="78%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>Grand Total</strong></td>
                                      <td width="22%" align="right" style="padding:5px 10px; background-color:#efefef;">
                                        <strong>$'.
                                        filter_var($full_t,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION).'</strong></td>
                                    
                                    </tr>
                                  </table>
                              </td>
                            </tr>
                            <tr>
                              <td height="10" colspan="6">&nbsp;</td>
                              </tr>
                            <tr>
                              <td colspan="6" style="border-bottom:1px solid #ddd;">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="6" align="center">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="6" align="center"><p style="font-size:13px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d; font-weight:bold; margin-top:0; margin-bottom:0; padding-left:5px;"> <strong>IF YOU NEED FURTHER ASSISTANCE, PLEASE CONTACT US AT CUSTOM CLOTHIERS</strong> <br /><br />
                                <strong style="color:#000000; font-size:20px">THANK YOU FOR YOUR BUSINESS!</strong></p>
                                <p style="font-size:14px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d;"> Order Status: You can check your order status and and also review your order history here <a href="https://customclothiers.com" style="color:#000000;">customclothiers.com</a></p>
                                <p style="font-size:12px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#797a7d; font-weight:bold; margin-top:0; margin-bottom:0; padding-left:5px;">&nbsp;</p></td>
                            </tr>
                        </table>
                      </td>      
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </center>  
        </div>';

      $up_py=mysqli_query($con,"update payment_master set orderid='$order_id',amount='".filter_var($full_t,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where pm_id=$py_id");
      $subject="Custom Clothiers Order History Information";
      $headers = "From: Custom Clothiers <support@dccustomclothiers.com> \r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      mail($email,$subject,$message,$headers);

      /*End Order Email Teemplate*/
      /*Start Gift Card*/
      $gift_update=mysqli_query($con,"update gift_card_master set status=1,orderid='$order_id' where userid=$userid and 
        status=0");
      $gift_app_update=mysqli_query($con,"update gift_card_applied set status=1,orderid='$order_id' where userid=$userid and 
        status=0");
      $coupon_app_update=mysqli_query($con,"update coupon_applied set status=1,orderid='$order_id' where userid=$userid and 
        status=0");
      $g_message="";
      $get_gift=mysqli_query($con,"select * from gift_card_master where orderid='$order_id' and status=1 order by created_date desc");
      if(mysqli_num_rows($get_gift))
      {
        $u11=mysqli_query($con,"select email,firstname,lastname,province,country,city from user_master where user_id=$userid");
        $u1=mysqli_fetch_array($u11);
        $province=$u1['province'];$country=$u1['country'];$city=$u1['city'];
        $fname=$u1['firstname'];$lname=$u1['lastname'];$amount=$g11['amount'];$i=0;
        while($g11=mysqli_fetch_array($get_gift))
        {
            $g_message.= '
            <div style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0; font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#000">    
              <center>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center" style="background-color:#ffffff;">
                      <table width="580" cellspacing="0" cellpadding="0" border="0" align="center" style="padding:24px;background-color:#ffffff; font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#000">      
                          <tr>
                            <td width="580">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center"><p style="color:#000; font-size:16px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-weight:bold;">
                               <strong>CUSTOM CLOTHIERS GIFT CARD INFORMATION</strong></p></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Gift From</strong></td>
                                  <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-bottom:0;"><strong>Gift Card Information</strong></td>
                                  </tr>
                                <tr>
                                  <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; border-right:0; font-size:13px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">&nbsp;</td>
                                        </tr>
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">'.$fname.' '.$lname.'</strong></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;"><p>'.$province.'</p></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding-bottom:5px;"><p>'.$country.'</p></td>
                                      </tr>
                                      <tr></tr>
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>
                                      </tr>
                                    </table>
                                  </td>
                                  <td width="50%" valign="top" style="padding:5px 10px; background-color:#fff; border:1px solid #dddddd; font-size:13px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;">&nbsp;</td>
                                        </tr>
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;  padding-bottom:5px;"><strong style="font-weight:bold;">Code : '.$g11['gift_code'].'</td>
                                      </tr>
                                      <tr></tr>
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td style="font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;">Amount : $'.number_format($g11['amount'],2).'</td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top"></td>
                          </tr>
                          <tr>
                            <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="margin-left:auto; margin-right:auto;">
                              <tr>
                                <td height="10" colspan="6">&nbsp;</td>
                              </tr>
                              <tr>
                               <td colspan="6" style="padding:5px 10px; background-color:#ffffff; border:1px solid #dddddd; border-bottom:0;"><strong>Items Ordered</strong></td>
                              </tr>
                              <tr>
                                <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Product Name</strong></td>
                                
                                <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Price</strong></td>
                                <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Qty</strong></td>
                                <td style="padding:5px 10px; background-color:#efefef; border:1px solid #dddddd; border-right:0; border-bottom:0;"><strong>Total</strong></td>
                              </tr>
                              <tr>
                                <td style="padding:5px 10px; border:1px solid #dddddd;font-size:12px;border-right:0;">Gift Card</td>
                                <td style="padding:5px 10px; border:1px solid #dddddd;font-size:12px;
                                  border-right:0;">$'.number_format($g11['amount'],2).'</td>
                                <td style="padding:5px 10px; border:1px solid #dddddd;font-size:12px;
                                  border-right:0;">'.$quantity.'</td>
                                <td style="padding:5px 10px; border:1px solid #dddddd;font-size:12px;">$'.number_format($g11['amount'] * $g11['quantity'],2).'</td>
                              </tr>
                              <tr>
                                <td colspan="5" bgcolor="#FFFFFF" style="background-color:#ffffff; border:1px solid #dddddd; border-top:0;">
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="right" style="padding:5px 10px; background-color:#efefef;">Sub Total</td>
                                      <td align="right" style="padding:5px 10px; background-color:#efefef;">$'.number_format($g11['amount'],2).'</td>
                                    </tr>
                                    <tr>
                                      <td width="78%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>Grand Total</strong></td>
                                      <td width="22%" align="right" style="padding:5px 10px; background-color:#efefef;"><strong>$'.number_format($g11['amount'] * $g11['quantity'],2).'</strong></td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </td>
                          </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </center>
            </div>';
            $i++;
            if($i==mysqli_num_rows($get_gift))
            {
              if($g11['gift_type']=="someone")
              {
                  $g_email=$g11['recipient_mail'];
                  if($g_email!='')
                  {
                      $subject="Custom Clothiers Gift Card";
                      $headers = "From: Custom Clothiers <support@dccustomclothiers.com> \r\n";
                      $headers .= "MIME-Version: 1.0\r\n";
                      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                      mail($email,$subject,$g_message,$headers);
                  }
              }
               else if($g11['gift_type']=="myself")
              {
                  $g_email=$u1['email'];
                  if($g_email!='')
                  {
                      $subject="Custom Clothiers Gift Card";
                      $headers = "From: Custom Clothiers <support@dccustomclothiers.com> \r\n";
                      $headers .= "MIME-Version: 1.0\r\n";
                      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                      mail($email,$subject,$g_message,$headers);
                  }
              }
            }
            
        }
      }
      /*End Gift Card*/
      $his=mysqli_query($con,"insert into order_history_master(userid,orderid,pay_type,tot_amount,
        shipping_cost,tax,discount,oh_date,created_date)
        values($userid,'$order_id','In-Store-Credit','".filter_var($full_t,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."','$sp_cost',$tax,'".$_SESSION['order_discount']."',NOW(),NOW())");
     $_SESSION['ord_success']="Your order has been successfully placed and your Order ID is ".$order_id;
     unset($_SESSION['order_discount']);
     
     header("Location:{$adminurl}orders/");
    }
    else
    {
       header("Location:{$adminurl}404/");
    }

}



if(isset($_POST['type'])){
    $type=$_POST['type'];
    if(isset($_SESSION['admin_user_id']))
        $placed_by=$_SESSION['admin_user_id'];
    else
        $placed_by=$_SESSION['emp_user_id'];
}
else
{
    $type="";
}
function get_image_type($type)
{
    switch($type)
    {
        case "image/jpg":
        return ".jpg";
        break;
        case "image/jpeg":
        return ".jpg";
        break;
        case "image/png":
        return ".png";
        break;
        case "image/gif":
        return ".gif";
        break;
    }
}





/*Customizer Section*/

/*Custom Suit Insertion Starts */

$type= isset($con, $_POST['type']) ? $_POST['type']:'';
$omidnew = $_POST['order_id'];

 $orderidnew = $_POST['orderidnew'];

if($type=="1")
 {

 $subcatid=$_POST['subcatid'];
 $orderid=$_POST['orderid'];
 $catid=$_POST['catid'];
 $pid=$_POST['p_id'];
 $uid=$_POST['userid'];

 

 

if(isset($_POST['section']) && $_POST['section']=='style')
 {
    $_SESSION['suit']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
              'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
               'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');

$_SESSION['suit']['style'] = array(
'base_price' => !empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']:'0',
'type' => isset($_POST['type']) ? $_POST['type']:'',
'pid' => isset($_POST['p_id']) ? $_POST['p_id']:'',
'fab_default_price'=>isset($_POST['fab_price']) ? $_POST['fab_price']:'0',
'waistcoat_price'=> !empty($_SESSION['customizer_price']['waistcoat']) ? $_SESSION['customizer_price']['waistcoat']:'0',
'def_fab'=>isset($_POST['id_t4l_fabric_default']) ? $_POST['id_t4l_fabric_default']:'141',
'def_waistcoat'=>isset($_POST['id_t4l_fabric_waistcoat'])? $_POST['id_t4l_fabric_waistcoat']:'0',
'suit_type'=>isset($_POST['suit_type']) ? $_POST['suit_type']:'0',
'jacket_style'=>isset($_POST['jacket_style']) ? $_POST['jacket_style']:'0',
'jacket_fit'=>isset($_POST['jacket_fit']) ? $_POST['jacket_fit']:'0',
'jacket_lapel_type'=>isset($_POST['jacket_lapel_type']) ? $_POST['jacket_lapel_type']:'0',
'jacket_buttons'=>isset($_POST['jacket_buttons']) ? $_POST['jacket_buttons']:'0',
'jacket_chest_pocket'=>isset($_POST['jacket_chest_pocket']) ? $_POST['jacket_chest_pocket']:'0',
'jacket_pockets'=>isset($_POST['jacket_pockets']) ? $_POST['jacket_pockets']:'0',
'jacket_pockets_type'=>isset($_POST['jacket_pockets_type']) ? $_POST['jacket_pockets_type']:'0',
'jacket_vent'=>isset($_POST['jacket_vent']) ? $_POST['jacket_vent']:'0',
'jacket_sleeve_buttons'=>isset($_POST['jacket_sleeve_buttons']) ? $_POST['jacket_sleeve_buttons']:'0',
'jacket_sleeve_buttonholes'=>isset($_POST['jacket_sleeve_buttonholes']) ? $_POST['jacket_sleeve_buttonholes']:'0',
'waistcoat_style'=>isset($_POST['waistcoat_style']) ? $_POST['waistcoat_style']:'0',
'waistcoat_buttons'=>isset($_POST['waistcoat_buttons']) ? $_POST['waistcoat_buttons']:'0',
'waistcoat_chest_pocket'=>isset($_POST['waistcoat_chest_pocket']) ? $_POST['waistcoat_chest_pocket']:'0',
'waistcoat_pockets'=>isset($_POST['waistcoat_pockets']) ? $_POST['waistcoat_pockets']:'0',
'waistcoat_pockets_num'=>isset($_POST['waistcoat_pockets_num']) ? $_POST['waistcoat_pockets_num']:'0',
'waistcoat_bottom'=>isset($_POST['waistcoat_bottom']) ? $_POST['waistcoat_bottom']:'0',
'pants_fit'=>isset($_POST['pants_fit']) ? $_POST['pants_fit']:'0',
'pants_back_pocket_type'=>isset($_POST['pants_back_pocket_type']) ? $_POST['pants_back_pocket_type']:'0',
'pants_peg'=>isset($_POST['pants_peg']) ? $_POST['pants_peg']:'0',
'pants_belt'=>isset($_POST['pants_belt']) ? $_POST['pants_belt']:'0',
'pants_front_pocket'=>isset($_POST['pants_front_pocket']) ? $_POST['pants_front_pocket']:'0',
'pants_back_pocket'=>isset($_POST['pants_back_pocket']) ? $_POST['pants_back_pocket']:'0',
'pants_cuff'=>isset($_POST['pants_cuff']) ? $_POST['pants_cuff']:'0',
'extra_pants' =>isset($_POST['extra_pants']) ? $_POST['extra_pants']:'0');

     $go_to = $_POST['go_to'];

    

    if($go_to == "fabric" && $orderidnew=='')

      header("Location:{$adminurl}customize/tab2_fabric/$uid/$pid/$catid/$subcatid/");

    else if($go_to == "fabric" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');

    else if($go_to == "extras" && $orderidnew=='')
    header("Location:{$adminurl}customize/tab3_accents/$uid/$pid/$catid/$subcatid/");
    
    else if($go_to == "extras" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
}

else if(isset($_POST['section']) && $_POST['section']=='fabric') {


    if(isset($_POST['instore_fabric']) && $_POST['instore_fabric']!='') {
        $fabric_name = $_POST['instore_fabric'];
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
    }
    else {
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
        $fabric_name='';
    }
    
    $_SESSION['suit']['fabric'] = array('fabric_id' => $fabric_id, 
              'fabric_price' => $fabric_price,
              'fabric_name' => $fabric_name);


    $go_to = $_POST['go_to'];
  
    if($go_to == "configure" && $orderidnew=='')
      header('Location: '.$adminurl.'customize/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

    else if($go_to == "configure" && $orderidnew!='')
      header('Location: '.$adminurl.'customize/edit/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');

    else if($go_to == "extras" && $orderidnew=='')
     header('Location: '.$adminurl.'customize/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

    else if($go_to == "extras" && $orderidnew!='')
      header('Location: '.$adminurl.'customize/edit/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
}

else if(isset($_POST['section']) && $_POST['section']=='accents') {
 

  $_SESSION['suit']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
            'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0',
            'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');
            
  $_SESSION['suit']['accents'] = array('jacket_lining_type' => isset($_POST['lining_jacket_radio']) ? $_POST['lining_jacket_radio'] : '',
            'lining_price' => isset($_POST['lining_jacket_price']) ? $_POST['lining_jacket_price']:'',
            'tot_price'=> (!empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']:'0') + (!empty($_SESSION['customizer_price']['waistcoat']) ? $_SESSION['customizer_price']['waistcoat']:'0') + (!empty($_SESSION['customizer_price']['extra_pant']) ? $_SESSION['customizer_price']['extra_pant']:'0') + (!empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0') + (!empty($_SESSION['customizer_price']['metal_buttons']) ? $_SESSION['customizer_price']['metal_buttons']:'0') + (!empty($_SESSION['customizer_price']['patches']) ? $_SESSION['customizer_price']['patches']:'0') + (!empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0') + (!empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0'),
            'jacket_lining_id' => isset($_POST['jacket_lining_id']) ? $_POST['jacket_lining_id']:'',
            'font_price' => isset($_POST['initials_jacket_price']) ? $_POST['initials_jacket_price']:'',
            'font_family' => isset($_POST['font_family']) ? $_POST['font_family']:'',
            'initials_jacket' => isset($_POST['initials_jacket']) ? $_POST['initials_jacket']:'',
            'monogram_color' => isset($_POST['initials_jacket1']) ? $_POST['initials_jacket1']:'',
            'type_of_button' => isset($_POST['metal_buttons_radio']) ? $_POST['metal_buttons_radio']:'',
            'metal_button_price' => !empty($_SESSION['customizer_price']['metal_buttons']) ? $_SESSION['customizer_price']['metal_buttons']:'0',
            'metal_btn_type' => isset($_POST['metal_buttons']) ? $_POST['metal_buttons']:'',
            'type_of_neck' => isset($_POST['neck_lining_radio']) ? $_POST['neck_lining_radio']:'',
            'neck_lining_price' => isset($_POST['neck_lining_price']) ? $_POST['neck_lining_price']:'',
            'neck_lining_type' => isset($_POST['neck_lining']) ? $_POST['neck_lining']:'',
            'type_of_elbow' => isset($_POST['patches_radio']) ? $_POST['patches_radio']:'',
            'elbow_price' => !empty($_SESSION['customizer_price']['patches']) ? $_SESSION['customizer_price']['patches']:'0',
            'elbow_type' => isset($_POST['patches']) ? $_POST['patches']:'',
            'type_pocket_square' => isset($_POST['handkerchief_radio']) ? $_POST['handkerchief_radio']:'', 
            'handkerchief_price' => !empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0',
            'pocket_square_type' => isset($_POST['handkerchief']) ? $_POST['handkerchief']:'',
            'type_of_colored_button_holes' => isset($_POST['button_holes_threads_jacket']) ? $_POST['button_holes_threads_jacket']:'',
            'lapel_color' => isset($_POST['placket_color']) ? $_POST['placket_color']:'',
            'button_holes_price' => !empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0',
            'colored_thread_type' => isset($_POST['button_holes_threads_jacket2']) ? $_POST['button_holes_threads_jacket2']:'',
            'colored_holes_type' => isset($_POST['button_holes_threads_jacket1']) ? $_POST['button_holes_threads_jacket1']:'');


    $go_to = $_POST['go_to'];
    $action = $_POST['action'];

    if($go_to!='extras') {
      if($go_to == "configure" && $orderidnew=='')
         header('Location: '.$adminurl.'customize/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

      else if($go_to == "configure" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
      
      else if($go_to == "fabric" && $orderidnew=='')
      header('Location: '.$adminurl.'customize/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

      else if($go_to == "fabric" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
   }
   
   else {
        $gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
        $p_id=!empty($_SESSION['suit']['style']['pid']) ? $_SESSION['suit']['style']['pid']:'';
        $type=mysqli_real_escape_string($con,trim($_POST['type']));
        $order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $o_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $om_price=$_SESSION['suit']['accents']['tot_price'];
        $date=date('Y-m-d H:i:s');
        
        if($_SESSION['suit']['fabric']['fabric_name']!='') {
            $fabric_name = $_SESSION['suit']['fabric']['fabric_name'];
        }

        if($_SESSION['suit']['style']['pants_back_pocket']=='0')
        {
            $pant_back_pocket_type='';
        }
        else
        {
            $pant_back_pocket_type=$_SESSION['suit']['style']['pants_back_pocket_type'];
        }

        if($_SESSION['suit']['style']['jacket_sleeve_buttons']=='0')
        {
            $jacket_sleeve_buttonholes='';
        }
        else
        {
            $jacket_sleeve_buttonholes=$_SESSION['suit']['style']['jacket_sleeve_buttonholes'];
        }

        if($_SESSION['suit']['style']['jacket_style']=='mao')
        {
            $jacket_lapel_type='';
            $jacket_buttons='';

        }
        else
        {
            $jacket_lapel_type=$_SESSION['suit']['style']['jacket_lapel_type'];
            $jacket_buttons=$_SESSION['suit']['style']['jacket_buttons'];
            
        }
        
        if($_SESSION['suit']['style']['suit_type']=='man_suit3') {
          $style = "{suit_type: ".$_SESSION['suit']['style']['suit_type'].",waistcoat_price: ".$_SESSION['suit']['style']['waistcoat_price'].",jacket_style: ".$_SESSION['suit']['style']['jacket_style'].",jacket_fit: ".$_SESSION['suit']['style']['jacket_fit'].",jacket_lapels: ".$jacket_lapel_type.",jacket_buttons: ".$jacket_buttons.",jacket_chest_pocket: ".$_SESSION['suit']['style']['jacket_chest_pocket'].",jacket_pockets: ".$_SESSION['suit']['style']['jacket_pockets'].",jacket_pockets_type: ".$_SESSION['suit']['style']['jacket_pockets_type'].",jacket_vent: ".$_SESSION['suit']['style']['jacket_vent'].",jacket_sleeve_buttons: ".$_SESSION['suit']['style']['jacket_sleeve_buttons'].",jacket_sleeve_buttonholes: ".$jacket_sleeve_buttonholes.",waistcoat_style: ".$_SESSION['suit']['style']['waistcoat_style'].",waistcoat_buttons: ".$_SESSION['suit']['style']['waistcoat_buttons'].",waistcoat_chest_pocket: ".$_SESSION['suit']['style']['waistcoat_chest_pocket'].",waistcoat_pockets: ".$_SESSION['suit']['style']['waistcoat_pockets'].",waistcoat_pockets_num: ".$_SESSION['suit']['style']['waistcoat_pockets_num'].",waistcoat_bottom: ".$_SESSION['suit']['style']['waistcoat_bottom'].",pants_fit: ".$_SESSION['suit']['style']['pants_fit'].",pants_peg: ".$_SESSION['suit']['style']['pants_peg'].",pants_belt: ".$_SESSION['suit']['style']['pants_belt'].",pants_front_pocket: ".$_SESSION['suit']['style']['pants_front_pocket'].",pants_back_pocket: ".$_SESSION['suit']['style']['pants_back_pocket'].",pants_back_pocket_type: ".$pant_back_pocket_type.",pants_cuff: ".$_SESSION['suit']['style']['pants_cuff'].",extra_pants:".$_SESSION['suit']['style']['extra_pants']."}"; 
        }
        else {
          $style = "{suit_type: ".$_SESSION['suit']['style']['suit_type'].",jacket_style: ".$_SESSION['suit']['style']['jacket_style'].",jacket_fit: ".$_SESSION['suit']['style']['jacket_fit'].",jacket_lapels: ".$jacket_lapel_type.",jacket_buttons: ".$jacket_buttons.",jacket_chest_pocket: ".$_SESSION['suit']['style']['jacket_chest_pocket'].",jacket_pockets: ".$_SESSION['suit']['style']['jacket_pockets'].",jacket_pockets_type: ".$_SESSION['suit']['style']['jacket_pockets_type'].",jacket_vent: ".$_SESSION['suit']['style']['jacket_vent'].",jacket_sleeve_buttons: ".$_SESSION['suit']['style']['jacket_sleeve_buttons'].",jacket_sleeve_buttonholes: ".$jacket_sleeve_buttonholes.",pants_fit: ".$_SESSION['suit']['style']['pants_fit'].",pants_peg: ".$_SESSION['suit']['style']['pants_peg'].",pants_belt: ".$_SESSION['suit']['style']['pants_belt'].",pants_front_pocket: ".$_SESSION['suit']['style']['pants_front_pocket'].",pants_back_pocket: ".$_SESSION['suit']['style']['pants_back_pocket'].",pants_back_pocket_type: ".$pant_back_pocket_type.",pants_cuff: ".$_SESSION['suit']['style']['pants_cuff'].",extra_pants:".$_SESSION['suit']['style']['extra_pants']."}"; 
        }

        $fabric = "{fabric_price: ".$_SESSION['suit']['fabric']['fabric_price'].",fabric_id: ".$_SESSION['suit']['fabric']['fabric_id'].",fabric_name:".$_SESSION['suit']['fabric']['fabric_name']."}";
        
        if($_SESSION['suit']['accents']['button_holes_price']!='') {
        $type_of_colored_button_holes = $_SESSION['suit']['accents']['type_of_colored_button_holes'];
        }

        if($_SESSION['suit']['accents']['initials_jacket']!='')
        {
            $font_price=$_SESSION['suit']['accents']['font_price'];
            $font_family=$_SESSION['suit']['accents']['font_family'];
            $initials_jacket=$_SESSION['suit']['accents']['initials_jacket'];
            $monogram_color=$_SESSION['suit']['accents']['monogram_color'];

        }

        $accents = "{jacket_lining_type: ".$_SESSION['suit']['accents']['jacket_lining_type'].",lining_price: ".$_SESSION['suit']['accents']['lining_price'].",jacket_lining_id: ".$_SESSION['suit']['accents']['jacket_lining_id'].",font_price: ".$font_price.",font_family: ".$font_family.",initials_jacket: ".$initials_jacket.",monogram_color: ".$monogram_color.",type_of_button: ".$_SESSION['suit']['accents']['type_of_button'].",metal_button_price: ".$_SESSION['suit']['accents']['metal_button_price'].",metal_btn_type: ".$_SESSION['suit']['accents']['metal_btn_type'].",type_of_neck: ".$_SESSION['suit']['accents']['type_of_neck'].",neck_lining_price: ".$_SESSION['suit']['accents']['neck_lining_price'].",neck_lining_type: ".$_SESSION['suit']['accents']['neck_lining_type'].",type_of_elbow: ".$_SESSION['suit']['accents']['type_of_elbow'].",elbow_price: ".$_SESSION['suit']['accents']['elbow_price'].",elbow_type: ".$_SESSION['suit']['accents']['elbow_type'].",type_pocket_square: ".$_SESSION['suit']['accents']['type_pocket_square'].",handkerchief_price: ".$_SESSION['suit']['accents']['handkerchief_price'].",pocket_square_type: ".$_SESSION['suit']['accents']['pocket_square_type'].",type_of_colored_button_holes: ".$type_of_colored_button_holes.",lapel_color: ".$_SESSION['suit']['accents']['lapel_color'].",button_holes_price: ".$_SESSION['suit']['accents']['button_holes_price'].",colored_thread_type: ".$_SESSION['suit']['accents']['colored_thread_type'].",colored_holes_type: ".$_SESSION['suit']['accents']['colored_holes_type']."}";
        $p_type="suits";
        
    
         if($action=="save")
         {
            $sql1=mysqli_query($con,"select * from order_master where userid=$uid and om_status=1");
            if(mysqli_num_rows($sql1))
            {
                $r1=mysqli_fetch_array($sql1);
                $order_id=$r1['order_id'];
            }
            else
            {
                $gift=mysqli_query($con,"select orderid from gift_card_master where userid=$uid and status=0");
                if(mysqli_num_rows($gift) > 0)
                {
                    $g1=mysqli_fetch_array($gift);
                    $order_id=$g1['orderid'];
                }
                else
                {
                    $get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
                    $r=mysqli_fetch_array($get_oid);
                    if($r['oid']!='0')
                    {
                        $a = str_replace("CC","",$r['oid']);
                        $order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
                    }
                    else
                    {
                        $order_id="CC00000001";
                    }
                    $sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$order_id."',NOW(),NOW())");
                }
            }
            if(isset($_SESSION['admin_user_id']))
            {
                $placed_by=$_SESSION['admin_user_id'];
            }
            else if(isset($_SESSION['emp_user_id']))
            {
                $placed_by=$_SESSION['emp_user_id'];   
            }
            $sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,subcatid,p_type,om_quantity,om_price,om_style,om_fab,om_accents,order_status,placed_by,created_date,last_updated)
             values('".$order_id."','".$pid."','".$uid."',1,'".$p_type."',1,'".$om_price."','".$style."','".$fabric."','".$accents."','Processing','".$placed_by."','".$date."','".$date."')");            

            unset($_SESSION['suit']['style']);
            unset($_SESSION['suit']['fabric']);
            unset($_SESSION['suit']['accents']);
            unset($_SESSION['p_dtl1']);
            unset($_SESSION['customizer_price']);
            unset($_SESSION['oid']);
             unset($_SESSION['action']);
            header("Location:{$adminurl}view-cart/$uid/$order_id/");
        } 
        else
        {
              $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_fab='".$fabric."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id='$o_id'");
              unset($_SESSION['suit']['style']);
              unset($_SESSION['suit']['fabric']);
              unset($_SESSION['suit']['accents']);
              unset($_SESSION['p_dtl1']);
              unset($_SESSION['customizer_price']);
               unset($_SESSION['oid']);
               unset($_SESSION['action']);
             if($orderidnew=='')
             {
              header("Location:{$adminurl}view-cart/$uid/$order_id/");
             }
             else
             {
              $tot='';$a1=$a2=array();
              $order_sql=mysqli_query($con,"select a.*,b.p_name from order_master a,product_master b where a.order_id='".$orderidnew."' and a.pid=b.p_id order by a.created_date desc");
              while($r=mysqli_fetch_array($order_sql))
              {
                $tot=$tot + ($r['om_quantity'] * $r['om_price']);
              }


              $gift=mysqli_query($con,"select * from gift_card_master where orderid='".$orderidnew."' order by created_date desc");
              if(mysqli_num_rows($gift))
              {
                while($g=mysqli_fetch_array($gift))
                {
                  $a1[]=$g['amount'];
                }
              }

              $app=mysqli_query($con,"select * from gift_card_applied where orderid='".$orderidnew."'");
              if(mysqli_num_rows($app))
              {
                $ap=mysqli_fetch_array($app);
                $a2[]=$ap['amount'];
              }

              $query=mysqli_query($con,"select * from payment_information where pi_id=1");

                $r=mysqli_fetch_array($query);

                $res[0]['id']=$r['id'];

                $res[0]['paypal_id']=$r['paypal_id'];

                $res[0]['cash_delivery']=$r['cash_on_delivery'];

                $res[0]['payment_mode']=$r['payment_mode'];

                $res[0]['in_store']=$r['in_store_credit'];

                $res[0]['shipping_cost']=$r['shipping_cost'];

                $shipping_cost=$res[0]['shipping_cost'];


                $coupon=mysqli_query($con,"select * from coupon_applied where orderid='".$orderidnew."'");
                  if(mysqli_num_rows($coupon))
                    {
                      $cr=mysqli_fetch_array($coupon);
                      if($cr['coupon_type']=="Discount")
                        {
                          $dis=((($tot + array_sum($a1)) - array_sum($a2)) / 100) * $cr['value'];
                        }
                        else  if($cr['coupon_type']=="$")
                        {
                          if( (($tot + array_sum($a1)) - array_sum($a2)) >=  $cr['value'])
                            $dis= $cr['value']; 
                          else
                            $dis = (($tot + array_sum($a1)) - array_sum($a2));
                        }
                        else if($cr['coupon_type']=="Free Shipping")
                        {
                          $shipping_cost= 0; 
                          $dis= 0; 
                        }
                    }

                 $discount=mysqli_query($con,"select discount from order_history_master where orderid='".$orderidnew."'");
                  if(mysqli_num_rows($discount))
                  {
                    $discount_dtl=mysqli_fetch_array($discount);
                    $dis_amt=$discount_dtl['discount'];
                  }

                  $b_add=mysqli_query($con,"select * from user_master where user_id=".$_POST['userid']."");

                  $add=mysqli_fetch_array($b_add);

                  $uaddress1=$add['address1'];$ucity=$add['city'];$uprovince=$add['province'];

                  $uzipcode=$add['zipcode'];$ucountry=$add['country'];

                 if($uaddress1!="" && $ucity!="" && $uprovince!="" && $uzipcode!="" && $ucountry!="")

                 {



                    $sql=mysqli_query($con,"select t_percent from tax_master where t_state='$uprovince'

                            and status=0");

                    if(mysqli_num_rows($sql))

                    {

                        $r=mysqli_fetch_array($sql);

                        $tax = $r['t_percent'];

                    }

                    else

                    {

                        $tax = 0;

                    }

                }

                else

                {

                    $tax = 0;

                }


            if(count($a2) > 0)
              $tp=(((($tot + array_sum($a1) - array_sum($a2)) - $dis_amt) - $dis) / 100) * $tax;
            else
             $tp=(((($tot + array_sum($a1)) - $dis_amt) - $dis) / 100) * $tax;

            $tot_amount = number_format(((($tot + $tp + array_sum($a1) + $shipping_cost) - array_sum($a2))-$dis_amt) - $dis,2);
             
             $order_history_update_sql = mysqli_query($con,"update order_history_master set tot_amount = '".filter_var($tot_amount,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where orderid='$orderidnew'");
                        
              header("Location:{$adminurl}view-order/$orderidnew/");
             }
         }
     }
  }
}

if($type=="4") {


 $subcatid=$_POST['subcatid'];
 $catid=$_POST['catid'];
 $pid=$_POST['p_id'];
 $uid=$_POST['userid'];

if(isset($_POST['section']) && $_POST['section']=='style') {

    $_SESSION['pant']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
              'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
               'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');

    $_SESSION['pant']['style'] = array('base_price' => !empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']: '0',
            'type' => isset($_POST['type']) ? $_POST['type']:'',
            'pid' => isset($_POST['p_id']) ? $_POST['p_id']:'',
            'fab_default_price'=>isset($_POST['fab_price']) ? $_POST['fab_price']:'0',
            'def_fab'=>isset($_POST['id_t4l_fabric_default']) ? $_POST['id_t4l_fabric_default']:'141',
            'def_waistcoat'=>isset($_POST['id_t4l_fabric_waistcoat']) ? $_POST['id_t4l_fabric_waistcoat']:'0',
            'pants_fit'=>isset($_POST['pants_fit']) ? $_POST['pants_fit']:'0',
            'pants_back_pocket_type'=>isset($_POST['pants_back_pocket_type']) ? $_POST['pants_back_pocket_type']:'0',
            'pants_peg'=>isset($_POST['pants_peg']) ? $_POST['pants_peg']:'0',
            'pants_belt'=>isset($_POST['pants_belt']) ? $_POST['pants_belt']:'0',
            'pants_front_pocket'=>isset($_POST['pants_front_pocket']) ? $_POST['pants_front_pocket']:'0',
            'pants_back_pocket'=>isset($_POST['pants_back_pocket']) ? $_POST['pants_back_pocket']:'0',
            'pants_cuff'=>isset($_POST['pants_cuff']) ? $_POST['pants_cuff']:'0');
   
    $go_to = $_POST['go_to'];
   
    if($go_to == "fabric" && $orderidnew=='')
      header('Location: '.$adminurl.'customize/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

    else if($go_to == "fabric" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
   }

 else if(isset($_POST['section']) && $_POST['section']=='fabric') {

    
    if(isset($_POST['instore_fabric']) && $_POST['instore_fabric']!='') {
        $fabric_name = $_POST['instore_fabric'];
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
    }
    else {
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
        $fabric_name='';
    }
    
    $_SESSION['pant']['fabric'] = array('fabric_id' => $fabric_id, 
              'fabric_price' => $fabric_price,
              'fabric_name' => $fabric_name);

    
    $go_to = $_POST['go_to'];
    $action = $_POST['action'];
  
    if($go_to == "configure" && $orderidnew=='') {
      header('Location: '.$adminurl.'customize/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');
    }

    else if($go_to == "configure" && $orderidnew!='') {
       header('Location: '.$adminurl.'customize/edit/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
    }

    else {
        $gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
        $p_id=!empty($_SESSION['pant']['style']['pid']) ? $_SESSION['pant']['style']['pid']:'';
        $type=mysqli_real_escape_string($con,trim($_POST['type']));
        $order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $o_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $om_price=  (!empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']:'0') + (!empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0');
        $date=date('Y-m-d H:i:s');

        if($_SESSION['pant']['fabric']['fabric_name']!='') {
            $fabric_name = $_SESSION['pant']['fabric']['fabric_name'];
        }

        if($_SESSION['pant']['style']['pants_back_pocket']=='0')
        {
          $pants_back_pocket_type='';
        }
        else
        {
         $pants_back_pocket_type=$_SESSION['pant']['style']['pants_back_pocket_type'];
        }

        $style = "{pants_fit: ".$_SESSION['pant']['style']['pants_fit'].",pants_peg: ".$_SESSION['pant']['style']['pants_peg'].",pants_belt: ".$_SESSION['pant']['style']['pants_belt'].",pants_front_pocket: ".$_SESSION['pant']['style']['pants_front_pocket'].",pants_back_pocket: ".$_SESSION['pant']['style']['pants_back_pocket'].",pants_back_pocket_type: ".$pants_back_pocket_type.",pants_cuff: ".$_SESSION['pant']['style']['pants_cuff']."}"; 
        

        $fabric = "{fabric_price: ".$_SESSION['pant']['fabric']['fabric_price'].",fabric_id: ".$_SESSION['pant']['fabric']['fabric_id'].",fabric_name:".$_SESSION['pant']['fabric']['fabric_name']."}";
        
        $p_type="trousers";


         if($action=="save")
         {
            $sql1=mysqli_query($con,"select * from order_master where userid=$uid and om_status=1");
            if(mysqli_num_rows($sql1))
            {
                $r1=mysqli_fetch_array($sql1);
                $order_id=$r1['order_id'];
            }
            else
            {
                $gift=mysqli_query($con,"select orderid from gift_card_master where userid=$uid and status=0");
                if(mysqli_num_rows($gift) > 0)
                {
                    $g1=mysqli_fetch_array($gift);
                    $order_id=$g1['orderid'];
                }
                else
                {
                   $get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
                    $r=mysqli_fetch_array($get_oid);
                    if($r['oid']!='0')
                    {
                        $a = str_replace("CC","",$r['oid']);
                        $order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
                    }
                    else
                    {
                        $order_id="CC00000001";
                    }
                    $sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$order_id."',NOW(),NOW())");
                }
            }
            if(isset($_SESSION['admin_user_id']))
            {
                $placed_by=$_SESSION['admin_user_id'];
            }
            else if(isset($_SESSION['emp_user_id']))
            {
                $placed_by=$_SESSION['emp_user_id'];   
            }
            $sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,subcatid,p_type,om_quantity,om_price,om_style,om_fab,om_accents,order_status,placed_by,created_date,last_updated)
             values('".$order_id."','".$pid."','".$uid."',4,'".$p_type."',1,'".$om_price."','".$style."','".$fabric."','','Processing','".$placed_by."','".$date."','".$date."')");            
            unset($_SESSION['pant']['style']);
            unset($_SESSION['pant']['fabric']);
            unset($_SESSION['p_dtl1']);
            unset($_SESSION['customizer_price']);
             unset($_SESSION['action']);
             unset($_SESSION['oid']);
            header("Location:{$adminurl}view-cart/$uid/$order_id/");
        } 
        else
        {
              $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_fab='".$fabric."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id='$o_id'");
              unset($_SESSION['pant']['style']);
              unset($_SESSION['pant']['fabric']);
              unset($_SESSION['p_dtl1']);
              unset($_SESSION['customizer_price']);
               unset($_SESSION['action']);
               unset($_SESSION['oid']);
             if($orderidnew=='') 
             {
              header("Location:{$adminurl}view-cart/$uid/$order_id/");
             }
             else
             {
              $tot='';$a1=$a2=array();
              $order_sql=mysqli_query($con,"select a.*,b.p_name from order_master a,product_master b where a.order_id='".$orderidnew."' and a.pid=b.p_id order by a.created_date desc");
              while($r=mysqli_fetch_array($order_sql))
              {
                $tot=$tot + ($r['om_quantity'] * $r['om_price']);
              }

              $gift=mysqli_query($con,"select * from gift_card_master where orderid='".$orderidnew."' order by created_date desc");
              if(mysqli_num_rows($gift))
              {
                while($g=mysqli_fetch_array($gift))
                {
                  $a1[]=$g['amount'];
                }
              }

              $app=mysqli_query($con,"select * from gift_card_applied where orderid='".$orderidnew."'");
              if(mysqli_num_rows($app))
              {
                $ap=mysqli_fetch_array($app);
                $a2[]=$ap['amount'];
              }

              $query=mysqli_query($con,"select * from payment_information where pi_id=1");

                $r=mysqli_fetch_array($query);

                $res[0]['id']=$r['id'];

                $res[0]['paypal_id']=$r['paypal_id'];

                $res[0]['cash_delivery']=$r['cash_on_delivery'];

                $res[0]['payment_mode']=$r['payment_mode'];

                $res[0]['in_store']=$r['in_store_credit'];

                $res[0]['shipping_cost']=$r['shipping_cost'];

                $shipping_cost=$res[0]['shipping_cost'];


                $coupon=mysqli_query($con,"select * from coupon_applied where orderid='".$orderidnew."'");
                  if(mysqli_num_rows($coupon))
                    {
                      $cr=mysqli_fetch_array($coupon);
                      if($cr['coupon_type']=="Discount")
                        {
                          $dis=((($tot + array_sum($a1)) - array_sum($a2)) / 100) * $cr['value'];
                        }
                        else  if($cr['coupon_type']=="$")
                        {
                          if( (($tot + array_sum($a1)) - array_sum($a2)) >=  $cr['value'])
                            $dis= $cr['value']; 
                          else
                            $dis = (($tot + array_sum($a1)) - array_sum($a2));
                        }
                        else if($cr['coupon_type']=="Free Shipping")
                        {
                          $shipping_cost= 0; 
                          $dis= 0; 
                        }
                    }

                 $discount=mysqli_query($con,"select discount from order_history_master where orderid='".$orderidnew."'");
                  if(mysqli_num_rows($discount))
                  {
                    $discount_dtl=mysqli_fetch_array($discount);
                    $dis_amt=$discount_dtl['discount'];
                  }

                  $b_add=mysqli_query($con,"select * from user_master where user_id=".$_POST['userid']."");

                  $add=mysqli_fetch_array($b_add);

                  $uaddress1=$add['address1'];$ucity=$add['city'];$uprovince=$add['province'];

                  $uzipcode=$add['zipcode'];$ucountry=$add['country'];

                 if($uaddress1!="" && $ucity!="" && $uprovince!="" && $uzipcode!="" && $ucountry!="")

                 {



                    $sql=mysqli_query($con,"select t_percent from tax_master where t_state='$uprovince'

                            and status=0");

                    if(mysqli_num_rows($sql))

                    {

                        $r=mysqli_fetch_array($sql);

                        $tax = $r['t_percent'];

                    }

                    else

                    {

                        $tax = 0;

                    }

                }

                else

                {

                    $tax = 0;

                }


            if(count($a2) > 0)
              $tp=(((($tot + array_sum($a1) - array_sum($a2)) - $dis_amt) - $dis) / 100) * $tax;
            else
             $tp=(((($tot + array_sum($a1)) - $dis_amt) - $dis) / 100) * $tax;

            $tot_amount = number_format(((($tot + $tp + array_sum($a1) + $shipping_cost) - array_sum($a2))-$dis_amt) - $dis,2);
                                
             $order_history_update_sql = mysqli_query($con,"update order_history_master set tot_amount = '".filter_var($tot_amount,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where orderid='$orderidnew'");
                        
              
             header("Location:{$adminurl}view-order/$orderidnew/");
             }
        }
    }
  }
}

else if($type=="3") {


 $subcatid=$_POST['subcatid'];
 $catid=$_POST['catid'];
 $pid=$_POST['p_id'];
 $uid=$_POST['userid'];

if(isset($_POST['section']) && $_POST['section']=='style') {

    $_SESSION['jacket']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
     'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
     'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');

  $_SESSION['jacket']['style'] = array('base_price' => !empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']: '0',
            'type' => isset($_POST['type']) ? $_POST['type']:'',
            'pid' => isset($_POST['p_id']) ? $_POST['p_id']:'',
            'fab_default_price'=>isset($_POST['fab_price']) ? $_POST['fab_price']:'0',
            'def_fab'=>isset($_POST['id_t4l_fabric_default']) ? $_POST['id_t4l_fabric_default']:'141',
            'jacket_style'=>isset($_POST['jacket_style']) ? $_POST['jacket_style']:'0',
            'jacket_fit'=>isset($_POST['jacket_fit']) ? $_POST['jacket_fit']:'0',
            'jacket_lapel_type'=>isset($_POST['jacket_lapel_type']) ? $_POST['jacket_lapel_type']:'0',
            'jacket_buttons'=>isset($_POST['jacket_buttons']) ? $_POST['jacket_buttons']:'0',
            'jacket_chest_pocket'=>isset($_POST['jacket_chest_pocket']) ? $_POST['jacket_chest_pocket']:'0',
            'jacket_pockets'=>isset($_POST['jacket_pockets']) ? $_POST['jacket_pockets']:'0',
            'jacket_pockets_type'=>isset($_POST['jacket_pockets_type']) ? $_POST['jacket_pockets_type']:'0',
            'jacket_vent'=>isset($_POST['jacket_vent']) ? $_POST['jacket_vent']:'0',
            'jacket_sleeve_buttons'=>isset($_POST['jacket_sleeve_buttons']) ? $_POST['jacket_sleeve_buttons']:'0',
            'jacket_sleeve_buttonholes'=>isset($_POST['jacket_sleeve_buttonholes']) ? $_POST['jacket_sleeve_buttonholes']:'0'
       );
      
      $go_to = $_POST['go_to'];
    
      if($go_to == "fabric" && $orderidnew=='')
    header('Location: '.$adminurl.'customize/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

     else if($go_to == "fabric" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
    

      else if($go_to == "extras" && $orderidnew=='')
    header('Location: '.$adminurl.'customize/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

      else if($go_to == "extras" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
      
}

else if(isset($_POST['section']) && $_POST['section']=='fabric') {

    if(isset($_POST['instore_fabric']) && $_POST['instore_fabric']!='') {
        $fabric_name = $_POST['instore_fabric'];
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
    }
    else {
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
        $fabric_name='';
    }
    
    $_SESSION['jacket']['fabric'] = array('fabric_id' => $fabric_id, 
              'fabric_price' => $fabric_price,
              'fabric_name' => $fabric_name);
    

    $go_to = $_POST['go_to'];
  
    if($go_to == "configure" && $orderidnew=='')
  header('Location: '.$adminurl.'customize/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

    else if($go_to == "configure" && $orderidnew!='')
      header('Location: '.$adminurl.'customize/edit/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
    
    else if($go_to == "extras" && $orderidnew=='')
     header('Location: '.$adminurl.'customize/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

    else if($go_to == "extras" && $orderidnew!='')
      header('Location: '.$adminurl.'customize/edit/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
}

else if(isset($_POST['section']) && $_POST['section']=='accents') {

  $_SESSION['jacket']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
            'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
            'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');

  $_SESSION['jacket']['accents'] = array('jacket_lining_type' => isset($_POST['lining_jacket_radio']) ? $_POST['lining_jacket_radio'] : '',
              'lining_price' => isset($_POST['lining_jacket_price']) ? $_POST['lining_jacket_price']:'',
              'tot_price'=> (!empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']:'0') + (!empty($_SESSION['customizer_price']['waistcoat']) ? $_SESSION['customizer_price']['waistcoat']:'0') + (!empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0') + (!empty($_SESSION['customizer_price']['metal_buttons']) ? $_SESSION['customizer_price']['metal_buttons']:'0') + (!empty($_SESSION['customizer_price']['patches']) ? $_SESSION['customizer_price']['patches']:'0') + (!empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0') + (!empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0'),
              'jacket_lining_id' => isset($_POST['jacket_lining_id']) ? $_POST['jacket_lining_id']:'',
              'font_price' => isset($_POST['initials_jacket_price']) ? $_POST['initials_jacket_price']:'',
              'font_family' => isset($_POST['font_family']) ? $_POST['font_family']:'',
              'initials_jacket' => isset($_POST['initials_jacket']) ? $_POST['initials_jacket']:'',
              'monogram_color' => isset($_POST['initials_jacket1']) ? $_POST['initials_jacket1']:'',
              'type_of_button' => isset($_POST['metal_buttons_radio']) ? $_POST['metal_buttons_radio']:'',
              'metal_button_price' => !empty($_SESSION['customizer_price']['metal_buttons']) ? $_SESSION['customizer_price']['metal_buttons']:'0',
              'metal_btn_type' => isset($_POST['metal_buttons']) ? $_POST['metal_buttons']:'',
              'type_of_neck' => isset($_POST['neck_lining_radio']) ? $_POST['neck_lining_radio']:'',
              'neck_lining_price' => isset($_POST['neck_lining_price']) ? $_POST['neck_lining_price']:'',
              'neck_lining_type' => isset($_POST['neck_lining']) ? $_POST['neck_lining']:'',
              'type_of_elbow' => isset($_POST['patches_radio']) ? $_POST['patches_radio']:'',
              'elbow_price' => !empty($_SESSION['customizer_price']['patches']) ? $_SESSION['customizer_price']['patches']:'0',
              'elbow_type' => isset($_POST['patches']) ? $_POST['patches']:'',
              'type_pocket_square' => isset($_POST['handkerchief_radio']) ? $_POST['handkerchief_radio']:'', 
              'handkerchief_price' => !empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0',
              'pocket_square_type' => isset($_POST['handkerchief']) ? $_POST['handkerchief']:'',
              'type_of_colored_button_holes' => isset($_POST['button_holes_threads_jacket']) ? $_POST['button_holes_threads_jacket']:'',
              'lapel_color' => isset($_POST['placket_color']) ? $_POST['placket_color']:'',
              'button_holes_price' => !empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0',
              'colored_thread_type' => isset($_POST['button_holes_threads_jacket2']) ? $_POST['button_holes_threads_jacket2']:'',
              'colored_holes_type' => isset($_POST['button_holes_threads_jacket1']) ? $_POST['button_holes_threads_jacket1']:'');

  $go_to = $_POST['go_to'];
  $action = $_POST['action'];

  if($go_to!='extras') {
      if($go_to == "configure" && $orderidnew=='')
         header('Location: '.$adminurl.'customize/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

     else if($go_to == "configure" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
      
       else if($go_to == "fabric" && $orderidnew=='')
    header('Location: '.$adminurl.'customize/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'); 

    else if($go_to == "fabric" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/'); 
   }
   else {
        $gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
        $p_id=!empty($_SESSION['jacket']['style']['pid']) ? $_SESSION['jacket']['style']['pid']:'';
        $type=mysqli_real_escape_string($con,trim($_POST['type']));
        $order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $o_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $om_price=$_SESSION['jacket']['accents']['tot_price'];
        $date=date('Y-m-d H:i:s');

        if($_SESSION['jacket']['fabric']['fabric_name']!='') {
            $fabric_name = $_SESSION['jacket']['fabric']['fabric_name'];
        }

        if($_SESSION['jacket']['style']['jacket_sleeve_buttons']=='0')
        {
            $jacket_sleeve_buttonholes='';
        }
        else
        {
            $jacket_sleeve_buttonholes=$_SESSION['jacket']['style']['jacket_sleeve_buttonholes'];
        }

         if($_SESSION['jacket']['accents']['initials_jacket']!='')
        {
            $font_price=$_SESSION['jacket']['accents']['font_price'];
            $font_family=$_SESSION['jacket']['accents']['font_family'];
            $initials_jacket=$_SESSION['jacket']['accents']['initials_jacket'];
            $monogram_color=$_SESSION['jacket']['accents']['monogram_color'];

        }

         if($_SESSION['jacket']['style']['jacket_style']=='mao')
        {
            $jacket_lapel_type='';
            $jacket_buttons='';

        }
        else
        {
            $jacket_lapel_type=$_SESSION['jacket']['style']['jacket_lapel_type'];
            $jacket_buttons=$_SESSION['jacket']['style']['jacket_buttons'];
            
        }

       
       if($_SESSION['jacket']['accents']['button_holes_price']!='') {
        $type_of_colored_button_holes = $_SESSION['jacket']['accents']['type_of_colored_button_holes'];
        }

        $style = "{jacket_style: ".$_SESSION['jacket']['style']['jacket_style'].",jacket_fit: ".$_SESSION['jacket']['style']['jacket_fit'].",jacket_lapels: ".$jacket_lapel_type.",jacket_buttons: ".$jacket_buttons.",jacket_chest_pocket: ".$_SESSION['jacket']['style']['jacket_chest_pocket'].",jacket_pockets: ".$_SESSION['jacket']['style']['jacket_pockets'].",jacket_pockets_type: ".$_SESSION['jacket']['style']['jacket_pockets_type'].",jacket_vent: ".$_SESSION['jacket']['style']['jacket_vent'].",jacket_sleeve_buttons: ".$_SESSION['jacket']['style']['jacket_sleeve_buttons'].",jacket_sleeve_buttonholes: ".$jacket_sleeve_buttonholes."}"; 
        $fabric = "{fabric_price: ".$_SESSION['jacket']['fabric']['fabric_price'].",fabric_id: ".$_SESSION['jacket']['fabric']['fabric_id'].",fabric_name:".$_SESSION['jacket']['fabric']['fabric_name']."}";
        $accents = "{jacket_lining_type: ".$_SESSION['jacket']['accents']['jacket_lining_type'].",lining_price: ".$_SESSION['jacket']['accents']['lining_price'].",jacket_lining_id: ".$_SESSION['jacket']['accents']['jacket_lining_id'].",font_price: ".$font_price.",font_family: ".$font_family.",initials_jacket: ".$initials_jacket.",monogram_color: ".$monogram_color.",type_of_button: ".$_SESSION['jacket']['accents']['type_of_button'].",metal_button_price: ".$_SESSION['jacket']['accents']['metal_button_price'].",metal_btn_type: ".$_SESSION['jacket']['accents']['metal_btn_type'].",type_of_neck: ".$_SESSION['jacket']['accents']['type_of_neck'].",neck_lining_price: ".$_SESSION['jacket']['accents']['neck_lining_price'].",neck_lining_type: ".$_SESSION['jacket']['accents']['neck_lining_type'].",type_of_elbow: ".$_SESSION['jacket']['accents']['type_of_elbow'].",elbow_price: ".$_SESSION['jacket']['accents']['elbow_price'].",elbow_type: ".$_SESSION['jacket']['accents']['elbow_type'].",type_pocket_square: ".$_SESSION['jacket']['accents']['type_pocket_square'].",handkerchief_price: ".$_SESSION['jacket']['accents']['handkerchief_price'].",pocket_square_type: ".$_SESSION['jacket']['accents']['pocket_square_type'].",type_of_colored_button_holes: ".$type_of_colored_button_holes.",lapel_color: ".$_SESSION['jacket']['accents']['lapel_color'].",button_holes_price: ".$_SESSION['jacket']['accents']['button_holes_price'].",colored_thread_type: ".$_SESSION['jacket']['accents']['colored_thread_type'].",colored_holes_type: ".$_SESSION['jacket']['accents']['colored_holes_type']."}";
        $p_type="blazers";

        

         if($action=="save")
         {
            $sql1=mysqli_query($con,"select * from order_master where userid=$uid and om_status=1");
            if(mysqli_num_rows($sql1))
            {
                $r1=mysqli_fetch_array($sql1);
                $order_id=$r1['order_id'];
            }
            else
            {
                 $gift=mysqli_query($con,"select orderid from gift_card_master where userid=$uid and status=0");
                if(mysqli_num_rows($gift) > 0)
                {
                    $g1=mysqli_fetch_array($gift);
                    $order_id=$g1['orderid'];
                }
                else
                {
                 $get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
                    $r=mysqli_fetch_array($get_oid);
                    if($r['oid']!='0')
                    {
                        $a = str_replace("CC","",$r['oid']);
                        $order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
                    }
                    else
                    {
                        $order_id="CC00000001";
                    }
                    $sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$order_id."',NOW(),NOW())");
                }
            }
            if(isset($_SESSION['admin_user_id']))
            {
                $placed_by=$_SESSION['admin_user_id'];
            }
            else if(isset($_SESSION['emp_user_id']))
            {
                $placed_by=$_SESSION['emp_user_id'];   
            }
            $sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,subcatid,p_type,om_quantity,om_price,om_style,om_fab,om_accents,order_status,placed_by,created_date,last_updated)
             values('".$order_id."','".$pid."','".$uid."',3,'".$p_type."',1,'".$om_price."','".$style."','".$fabric."','".$accents."','Processing','".$placed_by."','".$date."','".$date."')");            
            unset($_SESSION['jacket']['style']);
            unset($_SESSION['jacket']['fabric']);
            unset($_SESSION['jacket']['accents']);
            unset($_SESSION['p_dtl1']);
            unset($_SESSION['customizer_price']);
             unset($_SESSION['action']);
             unset($_SESSION['oid']);
            header("Location:{$adminurl}view-cart/$uid/$order_id/");
        } 
        else
        {
              $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_fab='".$fabric."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id='$o_id'");
              unset($_SESSION['jacket']['style']);
              unset($_SESSION['jacket']['fabric']);
              unset($_SESSION['jacket']['accents']);
              unset($_SESSION['p_dtl1']);
              unset($_SESSION['customizer_price']);
               unset($_SESSION['action']);
               unset($_SESSION['oid']);
             if($orderidnew=='')
             {
               header("Location:{$adminurl}view-cart/$uid/$order_id/");
             }
             else
             {
              $tot='';$a1=$a2=array();
              $order_sql=mysqli_query($con,"select a.*,b.p_name from order_master a,product_master b where a.order_id='".$orderidnew."' and a.pid=b.p_id order by a.created_date desc");
              while($r=mysqli_fetch_array($order_sql))
              {
                $tot=$tot + ($r['om_quantity'] * $r['om_price']);
              }

              $gift=mysqli_query($con,"select * from gift_card_master where orderid='".$orderidnew."' order by created_date desc");
              if(mysqli_num_rows($gift))
              {
                while($g=mysqli_fetch_array($gift))
                {
                  $a1[]=$g['amount'];
                }
              }

              $app=mysqli_query($con,"select * from gift_card_applied where orderid='".$orderidnew."'");
              if(mysqli_num_rows($app))
              {
                $ap=mysqli_fetch_array($app);
                $a2[]=$ap['amount'];
              }

              $query=mysqli_query($con,"select * from payment_information where pi_id=1");

                $r=mysqli_fetch_array($query);

                $res[0]['id']=$r['id'];

                $res[0]['paypal_id']=$r['paypal_id'];

                $res[0]['cash_delivery']=$r['cash_on_delivery'];

                $res[0]['payment_mode']=$r['payment_mode'];

                $res[0]['in_store']=$r['in_store_credit'];

                $res[0]['shipping_cost']=$r['shipping_cost'];

                $shipping_cost=$res[0]['shipping_cost'];


                $coupon=mysqli_query($con,"select * from coupon_applied where orderid='".$orderidnew."'");
                  if(mysqli_num_rows($coupon))
                    {
                      $cr=mysqli_fetch_array($coupon);
                      if($cr['coupon_type']=="Discount")
                        {
                          $dis=((($tot + array_sum($a1)) - array_sum($a2)) / 100) * $cr['value'];
                        }
                        else  if($cr['coupon_type']=="$")
                        {
                          if( (($tot + array_sum($a1)) - array_sum($a2)) >=  $cr['value'])
                            $dis= $cr['value']; 
                          else
                            $dis = (($tot + array_sum($a1)) - array_sum($a2));
                        }
                        else if($cr['coupon_type']=="Free Shipping")
                        {
                          $shipping_cost= 0; 
                          $dis= 0; 
                        }
                    }

                 $discount=mysqli_query($con,"select discount from order_history_master where orderid='".$orderidnew."'");
                  if(mysqli_num_rows($discount))
                  {
                    $discount_dtl=mysqli_fetch_array($discount);
                    $dis_amt=$discount_dtl['discount'];
                  }

                  $b_add=mysqli_query($con,"select * from user_master where user_id=".$_POST['userid']."");

                  $add=mysqli_fetch_array($b_add);

                  $uaddress1=$add['address1'];$ucity=$add['city'];$uprovince=$add['province'];

                  $uzipcode=$add['zipcode'];$ucountry=$add['country'];

                 if($uaddress1!="" && $ucity!="" && $uprovince!="" && $uzipcode!="" && $ucountry!="")

                 {



                    $sql=mysqli_query($con,"select t_percent from tax_master where t_state='$uprovince'

                            and status=0");

                    if(mysqli_num_rows($sql))

                    {

                        $r=mysqli_fetch_array($sql);

                        $tax = $r['t_percent'];

                    }

                    else

                    {

                        $tax = 0;

                    }

                }

                else

                {

                    $tax = 0;

                }


            if(count($a2) > 0)
              $tp=(((($tot + array_sum($a1) - array_sum($a2)) - $dis_amt) - $dis) / 100) * $tax;
            else
             $tp=(((($tot + array_sum($a1)) - $dis_amt) - $dis) / 100) * $tax;

            $tot_amount = number_format(((($tot + $tp + array_sum($a1) + $shipping_cost) - array_sum($a2))-$dis_amt) - $dis,2);
                                
             $order_history_update_sql = mysqli_query($con,"update order_history_master set tot_amount = '".filter_var($tot_amount,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where orderid='$orderidnew'");
                        
                
             header("Location:{$adminurl}view-order/$orderidnew/");
             }
         }
     }
  }
}


if($type=="2") {


 $subcatid=$_POST['subcatid'];
 $catid=$_POST['catid'];
 $pid=$_POST['p_id'];
 $uid=$_POST['userid'];



if(isset($_POST['section']) && $_POST['section']=='style') {

    $_SESSION['shirt']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
     'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
    'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');

  $_SESSION['shirt']['style'] = array('base_price' => isset($_POST['org_price']) ? $_POST['org_price']:'0',
            'type' => isset($_POST['type']) ? $_POST['type']:'',
            'pid' => isset($_POST['p_id']) ? $_POST['p_id']:'',
            'fab_default_price'=>isset($_POST['fab_price']) ? $_POST['fab_price']:'0',
            'def_fab'=>isset($_POST['id_t4l_fabric_default']) ? $_POST['id_t4l_fabric_default']:'141',
            'shirt_sleeve'=>isset($_POST['shirt_sleeve']) ? $_POST['shirt_sleeve']:'0',
            'shirt_fit'=>isset($_POST['shirt_fit']) ? $_POST['shirt_fit']:'0',
            'shirt_neck'=>isset($_POST['shirt_neck']) ? $_POST['shirt_neck']:'0',
            'shirt_neck_no_interfacing'=>isset($_POST['shirt_neck_no_interfacing']) ? $_POST['shirt_neck_no_interfacing']:'0',
            'shirt_neck_buttons'=>isset($_POST['shirt_neck_buttons']) ? $_POST['shirt_neck_buttons']:'0',
            'shirt_cuffs'=>isset($_POST['shirt_cuffs']) ? $_POST['shirt_cuffs']:'0',
            'shirt_chest_pocket'=>isset($_POST['shirt_chest_pocket']) ? $_POST['shirt_chest_pocket']:'0',
            'shirt_chest_pocket_type'=>isset($_POST['shirt_chest_pocket_type']) ? $_POST['shirt_chest_pocket_type']:'0',
            'shirt_button_close'=>isset($_POST['shirt_button_close']) ? $_POST['shirt_button_close']:'0',
            'shirt_cut'=>isset($_POST['shirt_cut']) ? $_POST['shirt_cut']:'0',
            'shirt_pleats'=>isset($_POST['shirt_pleats']) ? $_POST['shirt_pleats']:'0'
       );
      
      $go_to = $_POST['go_to'];
    
     if($go_to == "fabric" && $orderidnew=='')
     header('Location: '.$adminurl.'customize/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

     else if($go_to == "fabric" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');

     else if($go_to == "extras" && $orderidnew=='')
     header('Location: '.$adminurl.'customize/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

     else if($go_to == "extras" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');

}

else if(isset($_POST['section']) && $_POST['section']=='fabric') {

    if(isset($_POST['instore_fabric']) && $_POST['instore_fabric']!='') {
        $fabric_name = $_POST['instore_fabric'];
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
    }
    else {
        $fabric_id = isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0';
        $fabric_price = !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0';
        $fabric_name='';
    }

    
    $_SESSION['shirt']['fabric'] = array('fabric_id' => $fabric_id, 
              'fabric_price' => $fabric_price,
              'fabric_name' => $fabric_name);
    
    
    $go_to = $_POST['go_to'];
  
    if($go_to == "configure" && $orderidnew=='')
   header('Location: '.$adminurl.'customize/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

    else if($go_to == "configure" && $orderidnew!='')
      header('Location: '.$adminurl.'customize/edit/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
    
    else if($go_to == "extras" && $orderidnew=='')
    header('Location: '.$adminurl.'customize/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

     else if($go_to == "extras" && $orderidnew!='')
      header('Location: '.$adminurl.'customize/edit/tab3_accents/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
}

else if(isset($_POST['section']) && $_POST['section']=='accents') {

  $_SESSION['shirt']['fabric'] = array('fabric_id' => isset($_POST['fabric_id']) ? $_POST['fabric_id']: '0', 
            'fabric_price' => !empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']: '0',
            'fabric_name' => isset($_POST['fabric_name1']) ? $_POST['fabric_name1']:'');

  $_SESSION['shirt']['accents'] = array('tot_price'=> (!empty($_SESSION['customizer_price']['base']) ? $_SESSION['customizer_price']['base']:'0') + (!empty($_SESSION['customizer_price']['fabric']) ? $_SESSION['customizer_price']['fabric']:'0') + (!empty($_SESSION['customizer_price']['neck_lining']) ? $_SESSION['customizer_price']['neck_lining']:'0') + (!empty($_SESSION['customizer_price']['patches_jacket']) ? $_SESSION['customizer_price']['patches_jacket']:'0') + (!empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']:'0') + (!empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']:'0'),
              'font_price' => isset($_POST['initials_jacket_price']) ? $_POST['initials_jacket_price']:'',
              'font_family' => isset($_POST['font_family']) ? $_POST['font_family']:'',
              'initials_jacket' => isset($_POST['initials_jacket']) ? $_POST['initials_jacket']:'',
              'monogram_color' => isset($_POST['initials_jacket1']) ? $_POST['initials_jacket1']:'',
              'neck_styling' => isset($_POST['neck_type']) ? $_POST['neck_type']:'',
              'neck_lining_price' => !empty($_SESSION['customizer_price']['neck_lining']) ? $_SESSION['customizer_price']['neck_lining']: '0',
              'collar_neck_color' => isset($_POST['collar_neck_color']) ? $_POST['collar_neck_color']:'',
              'cuff_styling' => isset($_POST['cuff_type']) ? $_POST['cuff_type']:'',
              'cuff_lining_price' => !empty($_SESSION['customizer_price']['handkerchief']) ? $_SESSION['customizer_price']['handkerchief']: '0',
              'cuff_color' => isset($_POST['cuff_color']) ? $_POST['cuff_color']:'',
              'type_of_elbow' => isset($_POST['patches_type']) ? $_POST['patches_type']:'',
              'elbow_price' => !empty($_SESSION['customizer_price']['patches_jacket']) ? $_SESSION['customizer_price']['patches_jacket']: '0',
              'elbow_type' => isset($_POST['patches']) ? $_POST['patches']:'',
              'type_of_colored_button_holes' => isset($_POST['button_holes_threads_jacket']) ? $_POST['button_holes_threads_jacket']:'',
              'button_holes_price' => !empty($_SESSION['customizer_price']['button_holes_threads_jacket']) ? $_SESSION['customizer_price']['button_holes_threads_jacket']: '0',
              'colored_thread_type' => isset($_POST['button_holes_threads_jacket2']) ? $_POST['button_holes_threads_jacket2']:'',
              'colored_holes_type' => isset($_POST['button_holes_threads_jacket1']) ? $_POST['button_holes_threads_jacket1']:'');

  $go_to = $_POST['go_to'];
  $action = $_POST['action'];

  if($go_to!='extras') {
      if($go_to == "configure" && $orderidnew=='')
       header('Location: '.$adminurl.'customize/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

      else if($go_to == "configure" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/style/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
      
       else if($go_to == "fabric" && $orderidnew=='')
       header('Location: '.$adminurl.'customize/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/');

       else if($go_to == "fabric" && $orderidnew!='')
       header('Location: '.$adminurl.'customize/edit/tab2_fabric/'.$uid.'/'.$pid.'/'.$catid.'/'.$subcatid.'/'.$omidnew.'/'.$orderidnew.'/');
   }
   else {
    

        $gid=isset($_SESSION['guest_id']) ? $_SESSION['guest_id'] :"0";
        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] :"0";
        $p_id=!empty($_SESSION['shirt']['style']['pid']) ? $_SESSION['shirt']['style']['pid']:'';
        $type=mysqli_real_escape_string($con,trim($_POST['type']));
        $order_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $o_id=mysqli_real_escape_string($con,trim($_POST['order_id']));
        $om_price=$_SESSION['shirt']['accents']['tot_price'];
        $date=date('Y-m-d H:i:s');
       
       if($_SESSION['shirt']['fabric']['fabric_name']!='') {
            $fabric_name = $_SESSION['shirt']['fabric']['fabric_name'];
        }

        if($_SESSION['shirt']['style']['shirt_chest_pocket']=='0')
        {
            $shirt_chest_pocket_type='';
        }
        else
        {
            $shirt_chest_pocket_type=$_SESSION['shirt']['style']['shirt_chest_pocket_type'];
        }

        if($_SESSION['shirt']['style']['shirt_cuffs']=='5' || $_SESSION['shirt']['style']['shirt_cuffs']=='6' || $_SESSION['shirt']['style']['shirt_cuffs']=='9' || $_SESSION['shirt']['style']['shirt_cuffs']=='10')
        {
            $shirt_neck_no_interfacing='';
        }
        else
        {
            $shirt_neck_no_interfacing=$_SESSION['shirt']['style']['shirt_neck_no_interfacing'];
        }

        if($_SESSION['shirt']['style']['shirt_neck']=='6')
        {
            $shirt_neck_buttons='';

        }
        else
        {
            $shirt_neck_buttons=$_SESSION['shirt']['style']['shirt_neck_buttons'];

        }

        if($_SESSION['shirt']['accents']['initials_jacket']!='')
        {
            $font_price=$_SESSION['shirt']['accents']['font_price'];
            $font_family=$_SESSION['shirt']['accents']['font_family'];
            $initials_jacket=$_SESSION['shirt']['accents']['initials_jacket'];
            $monogram_color=$_SESSION['shirt']['accents']['monogram_color'];

        }

        if($_SESSION['shirt']['style']['shirt_sleeve']=='short')
        {
            $shirt_cuffs='';
        }
        else
        {
            $shirt_cuffs=$_SESSION['shirt']['style']['shirt_cuffs'];
        }
        
        $style = "{shirt_sleeve: ".$_SESSION['shirt']['style']['shirt_sleeve'].",shirt_fit: ".$_SESSION['shirt']['style']['shirt_fit'].",shirt_neck: ".$_SESSION['shirt']['style']['shirt_neck'].",shirt_neck_no_interfacing: ".$shirt_neck_no_interfacing.",shirt_neck_buttons: ".$shirt_neck_buttons.",shirt_cuffs: ".$shirt_cuffs.",shirt_chest_pocket: ".$_SESSION['shirt']['style']['shirt_chest_pocket'].",shirt_chest_pocket_type: ".$shirt_chest_pocket_type.",shirt_button_close: ".$_SESSION['shirt']['style']['shirt_button_close'].",shirt_cut: ".$_SESSION['shirt']['style']['shirt_cut'].",shirt_pleats: ".$_SESSION['shirt']['style']['shirt_pleats']."}"; 
        $fabric = "{fabric_price: ".$_SESSION['shirt']['fabric']['fabric_price'].",fabric_id: ".$_SESSION['shirt']['fabric']['fabric_id'].",fabric_name:".$_SESSION['shirt']['fabric']['fabric_name']."}";
        
        

        if($_SESSION['shirt']['accents']['button_holes_price']!='') {
        $type_of_colored_button_holes = $_SESSION['shirt']['accents']['type_of_colored_button_holes'];
        }

        $accents = "{font_price: ".$font_price.",font_family: ".$font_family.",initials_jacket: ".$initials_jacket.",monogram_color: ".$monogram_color.",neck_styling: ".$_SESSION['shirt']['accents']['neck_styling'].",neck_lining_price: ".$_SESSION['shirt']['accents']['neck_lining_price'].",collar_neck_color: ".$_SESSION['shirt']['accents']['collar_neck_color'].",cuff_styling: ".$_SESSION['shirt']['accents']['cuff_styling'].",cuff_lining_price: ".$_SESSION['shirt']['accents']['cuff_lining_price'].",cuff_color: ".$_SESSION['shirt']['accents']['cuff_color'].",type_of_elbow: ".$_SESSION['shirt']['accents']['type_of_elbow'].",elbow_price: ".$_SESSION['shirt']['accents']['elbow_price'].",elbow_type: ".$_SESSION['shirt']['accents']['elbow_type'].",type_of_colored_button_holes: ".$type_of_colored_button_holes.",button_holes_price: ".$_SESSION['shirt']['accents']['button_holes_price'].",colored_thread_type: ".$_SESSION['shirt']['accents']['colored_thread_type'].",colored_holes_type: ".$_SESSION['shirt']['accents']['colored_holes_type']."}";
        $p_type="shirts";

        
         if($action=="save")
         {
            $sql1=mysqli_query($con,"select * from order_master where userid=$uid and om_status=1");
            if(mysqli_num_rows($sql1))
            {
                $r1=mysqli_fetch_array($sql1);
                $order_id=$r1['order_id'];
            }
            else
            {
                 $gift=mysqli_query($con,"select orderid from gift_card_master where userid=$uid and status=0");
                if(mysqli_num_rows($gift) > 0)
                {
                    $g1=mysqli_fetch_array($gift);
                    $order_id=$g1['orderid'];
                }
                else
                {
                   $get_oid = mysqli_query($con,"select IFNULL(max(order_id),0) as oid from order_id_generate");
                    $r=mysqli_fetch_array($get_oid);
                    if($r['oid']!='0')
                    {
                        $a = str_replace("CC","",$r['oid']);
                        $order_id = "CC".str_pad($a+1, 8, "0", STR_PAD_LEFT);
                    }
                    else
                    {
                        $order_id="CC00000001";
                    }
                    $sql1=mysqli_query($con,"insert into order_id_generate(order_id,created_date,last_updated)values('".$order_id."',NOW(),NOW())");
                }
            }
            if(isset($_SESSION['admin_user_id']))
            {
                $placed_by=$_SESSION['admin_user_id'];
            }
            else if(isset($_SESSION['emp_user_id']))
            {
                $placed_by=$_SESSION['emp_user_id'];   
            }

            $sql=mysqli_query($con,"insert into order_master(order_id,pid,userid,subcatid,p_type,om_quantity,om_price,om_style,om_fab,om_accents,order_status,placed_by,created_date,last_updated)
             values('".$order_id."','".$pid."','".$uid."',2,'".$p_type."',1,'".$om_price."','".$style."','".$fabric."','".$accents."','Processing','".$placed_by."','".$date."','".$date."')");            
            
            unset($_SESSION['shirt']['style']);
            unset($_SESSION['shirt']['fabric']);
            unset($_SESSION['shirt']['accents']);
            unset($_SESSION['p_dtl1']);
            unset($_SESSION['action']);
            unset($_SESSION['customizer_price']);
            unset($_SESSION['oid']);
            header("Location:{$adminurl}view-cart/$uid/$order_id/");
        } 
        else
        {
              $sql=mysqli_query($con,"update order_master set om_style='".$style."',om_fab='".$fabric."',om_accents='".$accents."',om_price='".$om_price."',last_updated='".$date."' where om_id='$o_id'");
              unset($_SESSION['shirt']['style']);
              unset($_SESSION['shirt']['fabric']);
              unset($_SESSION['shirt']['accents']);
              unset($_SESSION['p_dtl1']);
              unset($_SESSION['customizer_price']);
               unset($_SESSION['action']);
               unset($_SESSION['oid']);
              if($orderidnew=='') 
              {
               header("Location:{$adminurl}view-cart/$uid/$order_id/");
              }
              else
              {
                $tot='';$a1=$a2=array();
              $order_sql=mysqli_query($con,"select a.*,b.p_name from order_master a,product_master b where a.order_id='".$orderidnew."' and a.pid=b.p_id order by a.created_date desc");
              while($r=mysqli_fetch_array($order_sql))
              {
                $tot=$tot + ($r['om_quantity'] * $r['om_price']);
              }

              $gift=mysqli_query($con,"select * from gift_card_master where orderid='".$orderidnew."' order by created_date desc");
              if(mysqli_num_rows($gift))
              {
                while($g=mysqli_fetch_array($gift))
                {
                  $a1[]=$g['amount'];
                }
              }

              $app=mysqli_query($con,"select * from gift_card_applied where orderid='".$orderidnew."'");
              if(mysqli_num_rows($app))
              {
                $ap=mysqli_fetch_array($app);
                $a2[]=$ap['amount'];
              }

              $query=mysqli_query($con,"select * from payment_information where pi_id=1");

                $r=mysqli_fetch_array($query);

                $res[0]['id']=$r['id'];

                $res[0]['paypal_id']=$r['paypal_id'];

                $res[0]['cash_delivery']=$r['cash_on_delivery'];

                $res[0]['payment_mode']=$r['payment_mode'];

                $res[0]['in_store']=$r['in_store_credit'];

                $res[0]['shipping_cost']=$r['shipping_cost'];

                $shipping_cost=$res[0]['shipping_cost'];


                $coupon=mysqli_query($con,"select * from coupon_applied where orderid='".$orderidnew."'");
                  if(mysqli_num_rows($coupon))
                    {
                      $cr=mysqli_fetch_array($coupon);
                      if($cr['coupon_type']=="Discount")
                        {
                          $dis=((($tot + array_sum($a1)) - array_sum($a2)) / 100) * $cr['value'];
                        }
                        else  if($cr['coupon_type']=="$")
                        {
                          if( (($tot + array_sum($a1)) - array_sum($a2)) >=  $cr['value'])
                            $dis= $cr['value']; 
                          else
                            $dis = (($tot + array_sum($a1)) - array_sum($a2));
                        }
                        else if($cr['coupon_type']=="Free Shipping")
                        {
                          $shipping_cost= 0; 
                          $dis= 0; 
                        }
                    }

                 $discount=mysqli_query($con,"select discount from order_history_master where orderid='".$orderidnew."'");
                  if(mysqli_num_rows($discount))
                  {
                    $discount_dtl=mysqli_fetch_array($discount);
                    $dis_amt=$discount_dtl['discount'];
                  }

                  $b_add=mysqli_query($con,"select * from user_master where user_id=".$_POST['userid']."");

                  $add=mysqli_fetch_array($b_add);

                  $uaddress1=$add['address1'];$ucity=$add['city'];$uprovince=$add['province'];

                  $uzipcode=$add['zipcode'];$ucountry=$add['country'];

                 if($uaddress1!="" && $ucity!="" && $uprovince!="" && $uzipcode!="" && $ucountry!="")

                 {



                    $sql=mysqli_query($con,"select t_percent from tax_master where t_state='$uprovince'

                            and status=0");

                    if(mysqli_num_rows($sql))

                    {

                        $r=mysqli_fetch_array($sql);

                        $tax = $r['t_percent'];

                    }

                    else

                    {

                        $tax = 0;

                    }

                }

                else

                {

                    $tax = 0;

                }


            if(count($a2) > 0)
              $tp=(((($tot + array_sum($a1) - array_sum($a2)) - $dis_amt) - $dis) / 100) * $tax;
            else
             $tp=(((($tot + array_sum($a1)) - $dis_amt) - $dis) / 100) * $tax;

            $tot_amount = number_format(((($tot + $tp + array_sum($a1) + $shipping_cost) - array_sum($a2))-$dis_amt) - $dis,2);
                                
             $order_history_update_sql = mysqli_query($con,"update order_history_master set tot_amount = '".filter_var($tot_amount,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)."' where orderid='$orderidnew'");
                        
              
             header("Location:{$adminurl}view-order/$orderidnew/");
              }
         }
     }
  }
}



/*End Customizer Insertion*/




?>