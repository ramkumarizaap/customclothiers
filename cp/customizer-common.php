<?php

if(isset($_GET['pid']))

 {

    $pid=$_GET['pid'];



    $_SESSION['post'] = $pid;

    /*unset($_SESSION['suit']['style']);

    unset($_SESSION['suit']['fabric']);

    unset($_SESSION['suit']['accents']);

    unset($_SESSION['pant']['style']);

    unset($_SESSION['pant']['fabric']);

    unset($_SESSION['pant']['accents']);

    unset($_SESSION['jacket']['style']);

    unset($_SESSION['jacket']['fabric']);

    unset($_SESSION['jacket']['accents']);

    unset($_SESSION['shirt']['style']);

    unset($_SESSION['shirt']['fabric']);

    unset($_SESSION['shirt']['accents']);

    unset($_SESSION['p_dtl1']);*/



}

else

 {

    $pid = $_GET['pid'];

 }





    $pid=isset($con,$pid) ? $pid : "0";

    $sql=mysqli_query($con,"select * from product_master where p_id=$pid");

    $r=mysqli_fetch_array($sql);

    $id = $r['subcatid'];

    $price = $r['p_price'];

    $p_id = $r['p_id'];

    $waistcoat_price = $r['waist_price'];

    $extra_price = $r['extra_pant'];

     $action="save";

    $get_sub_cat = $site->get_all_sub_category($id);



    $product_img=mysqli_query($con,"select * from product_images where pid='".$pid."'");

    $p_img_dtl=mysqli_fetch_array($product_img);

    $p_img_dtl = $p_img_dtl['p_img'];



    

    $_SESSION['p_dtl'] = array('sub_cat_id' => $get_sub_cat[0]['id'],'sub_category' => $get_sub_cat[0]['subcat_name'],'base_price'=>$price,'p_id'=>$p_id,'p_img_dtl' =>$p_img_dtl,'waistcoat_price' =>$waistcoat_price,'extra_pant_price' => $extra_price);

    

    if($_SESSION['p_dtl1']['orderid']!='') {

      $action="update";

    //  $_SESSION['action']="update";

      $orderid=$_SESSION['p_dtl1']['orderid'];

    }

    else {

      $action="save";

      //$_SESSION['action']="save";

      $orderid='';

    }

        $_SESSION['p_dtl1'] = array('orderid' => $orderid,'action'=>$action);



    $where='';

    

    if($id=='1') {

      $type='suit';

    }

    else if($id=='2') {

      $type='shirt';

    }

    else if($id=='3') {

      $type='jacket';

    }

    else if($id=='4') {

      $type='pant';

    }    



    

    if(!empty($_SESSION[$type]['fabric']['fabric_id'])) {



      $fabric_list = $_SESSION[$type]['fabric']['fabric_id'];

      $where = "where fab_rand='".$fabric_list."'";

     

    }

    else {

      $fabric_list= $r['fabid'];

      $where = "where fab_id='".$fabric_list."'";

    }



     $fabric_list= $r['fabid'];

     $_SESSION['def_fab_id'] = $fabric_list;



    //echo $fabric_list;die;



    



    $fab_dtl_qry=mysqli_query($con,"select * from fabric_master $where");



    if(mysqli_num_rows($fab_dtl_qry) > 0) {

        while($fr=mysqli_fetch_array($fab_dtl_qry)) {

          $_SESSION['fab_dtl'] = array('fab_id' =>$fr['fab_rand'],

               'fab_unique_id' => $fr['fab_id'],

               'fab_name' => $fr['fab_name'],

               'fab_desc' => $fr['fab_desc'],

               'fab_img' => $fr['fab_img'],

               'fab_price' => $fr['fab_price'],

               'fab_default_img' => $fr['default_img']

          );



        }

    }



    $fab_def_dtl_qry=mysqli_query($con,"select * from fabric_master where fab_id='".$fabric_list."'");

    if(mysqli_num_rows($fab_def_dtl_qry) > 0) {

        while($fr=mysqli_fetch_array($fab_def_dtl_qry)) {

          $_SESSION['fab_dtl3'] = array('fab_default_id' =>$fr['fab_rand']

          );

        }

    }

?>