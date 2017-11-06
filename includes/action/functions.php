<?php 

require_once('config.php');

$GLOBALS['con'] = $con;



class Site

{

	function insert_query($query)

	{

		$sql=mysqli_query($GLOBALS['con'],$query);

	}

	function select_query($query)

	{

		$sql=mysqli_query($GLOBALS['con'],$query);

		if(mysqli_num_rows($sql) > 0)

			return mysqli_fetch_array($sql);

		else

			return 0;

	}

	function update_query($query)

	{

		$sql=mysqli_query($GLOBALS['con'],$query);

		return 0;

	}

	function delete_query($query)

	{

		$sql=mysqli_query($GLOBALS['con'],$query);

		return 0;

	}

	 function get_user($id)

    {

        $res=array();global $con;

        $sql=mysqli_query($con,"select * from user_master where user_id='".$id."'");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                $r=mysqli_fetch_array($sql);

                 $res[0]['id']=$r['user_id'];

                 $res[0]['firstname']=$r['firstname'];

                 $res[0]['lastname']=$r['lastname'];

                 $res[0]['username']=$r['username'];

                 $res[0]['password']=$r['password'];

                 $res[0]['mobile']=$r['mobile'];

                 $res[0]['email']=$r['email'];

                 $res[0]['img']=$r['img'];

                 $res[0]['img2']=$r['img2'];

                 $res[0]['img3']=$r['img3'];

                 $res[0]['country']=$r['country'];

                 $res[0]['province']=$r['province'];

                 $res[0]['zipcode']=$r['zipcode'];

                 $res[0]['city']=$r['city'];

                 $res[0]['address1']=$r['address1'];

                 $res[0]['address2']=$r['address2'];

                 $res[0]['usertype']=$r['user_type'];

                 $res[0]['last_login_time']=$r['last_login_time'];

                 $res[0]['current_login_time']=$r['current_login_time'];

                 $res[0]['photo']=$r['img'];

                 return $res;  

            }

            else

            {

                return 0;

            }

        }

        else

        {

            return 0;

        }

        

    }

   function get_counts($table,$param='',$pid='')



    {

        



        if($table=="user_master"){$where=" where user_type=2";$col="user_id";}else{$where="";$col="";}



        if($table=="product_master"){$col=" p_id";}



        if($table=="fabric_master"){$col=" fab_id";}

        if($table=="reviews"){$col=" r_id";}



        if($table=="order_master"){$where=" where om_status=0 group by order_id";$col=" order_id";}



        if($param!="" && $table!="reviews"){$where1=" where pid=$param";}

        else if($param!='' && $table=="reviews" && $pid!='') {$where1=" where subcatid=$param and status=1 and pid=$pid";} 

        else {$where1="";}



        global $con;



         $sql=mysqli_query($con,"select count(distinct $col) as count from $table $where $where1");



        if($sql)



        {



            if(mysqli_num_rows($sql) > 0)



            {



               $r=mysqli_fetch_array($sql);

                if($table=="order_master")

                    return mysqli_num_rows($sql);

                else

                return $r['count'];



            }



            else



            {



                return 0;



            }



        }



        else



        {



            return 0;



        }



    }

    function get_all_users()

    {

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select * from user_master where user_type=2");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                   $res[$i]['id']=$r['user_id'];

                    $res[$i]['firstname']=$r['firstname'];

                    $res[$i]['lastname']=$r['lastname'];

                    $res[$i]['mobile']=$r['mobile'];

                    $res[$i]['photo']=$r['img'];

                    $res[$i]['img2']=$r['img2'];

                    $res[$i]['img3']=$r['img3'];

                    $res[$i]['email']=$r['email'];

                    $res[$i]['address1']=$r['address1'];

                    $res[$i]['address2']=$r['address2'];

                    $res[$i]['city']=$r['city'];

                    $res[$i]['province']=$r['province'];

                    $res[$i]['country']=$r['country'];

                    $res[$i]['zipcode']=$r['zipcode'];

                    $res[$i]['block']=$r['block'];

                    $res[$i]['username']=$r['username'];

                    $res[$i]['password']=$r['password'];

                    $res[$i]['created_date']=$r['created_date'];

                    $res[$i]['last_date']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }



    }

    function get_all_variants()

    {

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select * from variants");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['id'];

                    $res[$i]['name']=$r['name'];

                    $res[$i]['options']=$r['options'];

                    $res[$i]['date']=$r['date'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }







    

    function get_all_products($featured='',$disp='',$order='',$st='',$cat='',$subcat='')



    {



        if($featured!=''){$where=" and a.featured=1";}else{$where="";}

        if($disp!=''){$where6=" and a.$disp=1";}else{$where6="";}

        if($cat!=''){$where4=" and b.cat_name='$cat'";}else{$where4="";}



        if($subcat!=''){$where5=" and c.sub_cat_name='$subcat'";}else{$where5="";}



        if($st!=''){$where3="";}else{$where3=" and a.p_status=1";}



        if($highlighted!=''){$where1=" and a.highlighted=1 ORDER BY RAND() limit 3";}else{$where1="";}



        if($order!=''){$where2="  ORDER BY a.created_date desc";}else{$where2="";}



        global $con;$res=array();$i=0;



        $sql=mysqli_query($con,"select a.*,b.cat_name,c.sub_cat_name from product_master a,category_master b,sub_category_master c where  a.catid=b.cat_id and a.subcatid=c.sub_cat_id $where3  $where $where1 $where2 $where4 $where5 $where6 ");



        if($sql)



        {



            if(mysqli_num_rows($sql) > 0)



            {



                while($r=mysqli_fetch_array($sql))



                {



                    $sql1=mysqli_query($con,"select p_img from product_images where pid='".$r['p_id']."'");



                    $r1=mysqli_fetch_array($sql1);



                    $res[$i]['id']=$r['p_id'];



                    $res[$i]['product_name']=$r['p_name'];



                    $res[$i]['description']=$r['p_description'];

                    $res[$i]['p_info']=$r['p_info'];



                    $res[$i]['image']=$r1['p_img'];



                    $res[$i]['price']=$r['p_price'];



                    $res[$i]['status']=$r['p_status'];



                    $res[$i]['highlighted_img']=$r['highlighted_img'];





                    $res[$i]['cat_name']=$r['cat_name'];



                    $res[$i]['sub_cat_name']=$r['sub_cat_name'];



                    $res[$i]['fabid']=$r['fabid'];



                    $res[$i]['category']=$r['catid'];



                    $res[$i]['sub_category']=$r['subcatid'];



                    $res[$i]['featured']=$r['featured'];



                    $res[$i]['highlighted']=$r['highlighted'];

                    $res[$i]['frontend']=$r['frontend'];

                    $res[$i]['backend']=$r['backend'];



                  //  $res[$i]['variant_id']=$r['variant_id'];



                   // $res[$i]['variant_values']=$r['variant_values'];



                    $res[$i]['date']=$r['created_date'];



                    $res[$i]['last_date']=$r['last_updated'];



                    $i++;



                }



                return $res;



            }



            else



            {



                return 0;



            }   



        }



        else



        {



            return 0;



        }



    }



    function get_all_products1($cat)



    {



        

        if($cat!=''){$where4=" and c.sub_cat_id='$cat'";}else{$where4="";}



        



        global $con;$res=array();$i=0;



        $sql=mysqli_query($con,"select a.*,b.cat_name,c.sub_cat_name from product_master a,category_master b,

            sub_category_master c where  a.catid=b.cat_id and a.subcatid=c.sub_cat_id

         $where3  $where $where1 $where2 $where4 $where5 $where6 ");





        if($sql)



        {



            if(mysqli_num_rows($sql) > 0)



            {



                while($r=mysqli_fetch_array($sql))



                {



                    $sql1=mysqli_query($con,"select p_img from product_images where pid='".$r['p_id']."'");



                    $r1=mysqli_fetch_array($sql1);



                    $res[$i]['id']=$r['p_id'];



                    $res[$i]['product_name']=$r['p_name'];



                    $res[$i]['description']=$r['p_description'];

                    $res[$i]['p_info']=$r['p_info'];



                    $res[$i]['image']=$r1['p_img'];



                    $res[$i]['price']=$r['p_price'];



                    $res[$i]['status']=$r['p_status'];



                    $res[$i]['highlighted_img']=$r['highlighted_img'];





                    $res[$i]['cat_name']=$r['cat_name'];



                    $res[$i]['sub_cat_name']=$r['sub_cat_name'];



                    $res[$i]['fabid']=$r['fabid'];



                    $res[$i]['category']=$r['catid'];



                    $res[$i]['sub_category']=$r['subcatid'];



                    $res[$i]['featured']=$r['featured'];



                    $res[$i]['highlighted']=$r['highlighted'];

                    $res[$i]['frontend']=$r['frontend'];

                    $res[$i]['backend']=$r['backend'];



                  //  $res[$i]['variant_id']=$r['variant_id'];



                   // $res[$i]['variant_values']=$r['variant_values'];



                    $res[$i]['date']=$r['created_date'];



                    $res[$i]['last_date']=$r['last_updated'];



                    $i++;



                }



                return $res;



            }



            else



            {



                return 0;



            }   



        }



        else



        {



            return 0;



        }



    }



      function get_top_rated_products()

    {

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select a.*,b.score from product_master a,reviews b where a.p_status=1 and 

        b.pid=a.p_id order by b.score desc ");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $sql1=mysqli_query($con,"select p_img from product_images where pid='".$r['p_id']."'");

                    $r1=mysqli_fetch_array($sql1);

                    $res[$i]['id']=$r['p_id'];

                    $res[$i]['product_name']=$r['p_name'];

                    $res[$i]['score']=$r['score'];

                    $res[$i]['description']=$r['p_description'];

                    $res[$i]['image']=$r1['p_img'];

                    $res[$i]['price']=$r['p_price'];

                    $res[$i]['status']=$r['p_status'];

                    $res[$i]['category']=$r['catid'];

                    $res[$i]['sub_category']=$r['subcatid'];

                    $res[$i]['featured']=$r['featured'];

                    $res[$i]['highlighted']=$r['highlighted'];

                  //  $res[$i]['variant_id']=$r['variant_id'];

                   // $res[$i]['variant_values']=$r['variant_values'];

                    $res[$i]['date']=$r['created_date'];

                    $res[$i]['date']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }



    function get_all_category()

    {

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select * from category_master");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['cat_id'];

                    $res[$i]['name']=$r['cat_name'];

                    $res[$i]['date']=$r['created_date'];

                    $res[$i]['last_date']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }

     function get_all_sub_category($id='',$cat_id='')

    {

        if($id!=''){$where=" and a.sub_cat_id=$id and a.sub_cat_id IN(1,2,3,4,5,6)";}else{$where="";}

        if($cat_id!=''){$where1=" and a.catid=$cat_id and a.sub_cat_id IN(1,2,3,4,5,6)";}else{$where1="";}

        if($cat_id=='' && $id==''){$where1="and a.sub_cat_id IN(1,2,3,4,5,6)";}

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select a.*,b.cat_name from sub_category_master a,category_master b where a.catid=b.cat_id $where $where1");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['sub_cat_id'];

                    $res[$i]['category_id']=$r['catid'];

                    $res[$i]['category_name']=$r['cat_name'];

                    $res[$i]['subcat_name']=$r['sub_cat_name'];

                    $res[$i]['date']=$r['created_date'];

                    $res[$i]['last_date']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }



    function get_all_sub_category1()

    {

        

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select a.*,b.cat_name from sub_category_master a,category_master b where a.catid=b.cat_id

                 and a.sub_cat_id IN(1,2,3,4,5,6)");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['sub_cat_id'];

                    $res[$i]['category_id']=$r['catid'];

                    $res[$i]['category_name']=$r['cat_name'];

                    $res[$i]['subcat_name']=$r['sub_cat_name'];

                    $res[$i]['date']=$r['created_date'];

                    $res[$i]['last_date']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }



    function get_all_vendors($id='')

    {

        if($id!=''){$where=" where id=$id";}else{$where="";}

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select * from vendors $where");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['id'];

                    $res[$i]['vendor_name']=$r['vendor_name'];

                    $res[$i]['abbrevation']=$r['abbrevation'];

                    $res[$i]['address1']=$r['address1'];

                    $res[$i]['address2']=$r['address2'];

                    $res[$i]['city']=$r['city'];

                    $res[$i]['state']=$r['state'];

                    $res[$i]['country']=$r['country'];

                    $res[$i]['zipcode']=$r['zipcode'];

                    $res[$i]['agreement']=$r['agreement_status'];

                    $res[$i]['vendor_type']=$r['vendor_type'];

                    $res[$i]['ship_type']=$r['ship_type'];

                    $res[$i]['track_inventory']=$r['track_inventory'];

                    $res[$i]['vendor_status']=$r['vendor_status'];

                    $res[$i]['order_submit_type']=$r['order_submit_type'];

                    $res[$i]['order_email']=$r['order_email'];

                    $res[$i]['order_phone']=$r['order_phone'];

                    $res[$i]['order_fax']=$r['order_fax'];

                    $res[$i]['order_web']=$r['order_web'];

                    $res[$i]['primary_name']=$r['primary_name'];

                    $res[$i]['primary_email']=$r['primary_email'];

                    $res[$i]['primary_phone']=$r['primary_phone'];

                    $res[$i]['return_policy']=$r['return_policy'];

                    $res[$i]['warrant_policy']=$r['warrant_policy'];

                    $res[$i]['date']=$r['date'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }



    



     function get_product_by_id($id)

    {

        global $con;$res=array();$i=0;$images=array();$j=0;$variants=array();$k=0;

        $sql=mysqli_query($con,"select * from product_master where p_id=$id");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $sql1=mysqli_query($con,"select p_img_id,p_img from product_images where pid='".$id."'");

                    //$r1=mysqli_fetch_array($sql1);

                    while($r1=mysqli_fetch_array($sql1))

                    {

                        $images[$j]['i_id']=$r1['p_img_id'];

                        $images[$j]['image']=$r1['p_img'];

                        $j++;

                    }

                    /*$sql2=mysqli_query($con,"select id,variant_options,variant_id from product_variants where pid='".$id."'");

                    while($r2=mysqli_fetch_array($sql2))

                    {

                        $variants[$k]['v_id']=$r2['id'];

                        $variants[$k]['variant_options']=$r2['variant_options'];

                        $variants[$k]['variant_id']=$r2['variant_id'];

                        $k++;

                    }*/

                    $res[$i]['id']=$r['p_id'];

                    $res[$i]['rand']=$r['p_rand'];

                    $res[$i]['product_name']=$r['p_name'];

                    $res[$i]['waist_price']=$r['waist_price'];
                    $res[$i]['extra_pant']=$r['extra_pant'];

                    $res[$i]['description']=$r['p_description'];

                    $res[$i]['p_info']=$r['p_info'];

                    $res[$i]['image']=$images;

                    $res[$i]['price']=$r['p_price'];

                    $res[$i]['fabid']=$r['fabid'];

                    $res[$i]['h_img']=$r['highlighted_img'];

                    $res[$i]['style']=$r['p_default_style'];

                    $res[$i]['featured']=$r['featured'];

                    $res[$i]['highlighted']=$r['highlighted'];

                    $res[$i]['category']=$r['catid'];

                    $res[$i]['sub_category']=$r['subcatid'];

                    $res[$i]['frontend']=$r['frontend'];

                    $res[$i]['backend']=$r['backend'];



                    //$res[$i]['vendor']=$r['vendor'];

                    //$res[$i]['variants']=$variants;

                   // $res[$i]['variant_values']=$r['variant_values'];

                    $res[$i]['date']=$r['created_date'];

                    $res[$i]['last_date']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }



    function get_product_by_name($id,$disp='')

    {

        if($disp!=''){$where =" and a.$disp=1";}else{$where="";}

        global $con;$res=array();$i=0;$images=array();$j=0;$variants=array();$k=0;

        $sql=mysqli_query($con,"select * from product_master where p_name='".$id."' $where");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $sql1=mysqli_query($con,"select p_img_id,p_img from product_images where pid='".$r['p_id']."'");

                    //$r1=mysqli_fetch_array($sql1);

                    while($r1=mysqli_fetch_array($sql1))

                    {

                        $images[$j]['i_id']=$r1['p_img_id'];

                        $images[$j]['image']=$r1['p_img'];

                        $j++;

                    }

                    /*$sql2=mysqli_query($con,"select id,variant_options,variant_id from product_variants where pid='".$id."'");

                    while($r2=mysqli_fetch_array($sql2))

                    {

                        $variants[$k]['v_id']=$r2['id'];

                        $variants[$k]['variant_options']=$r2['variant_options'];

                        $variants[$k]['variant_id']=$r2['variant_id'];

                        $k++;

                    }*/

                    $res[$i]['id']=$r['p_id'];

                    $res[$i]['rand']=$r['p_rand'];

                    $res[$i]['product_name']=$r['p_name'];

                    $res[$i]['description']=$r['p_description'];

                    $res[$i]['p_info']=$r['p_info'];

                    $res[$i]['image']=$images;

                    $res[$i]['price']=$r['p_price'];

                    $res[$i]['fabid']=$r['fabid'];

                    $res[$i]['h_img']=$r['highlighted_img'];

                    $res[$i]['style']=$r['p_default_style'];

                    $res[$i]['featured']=$r['featured'];

                    $res[$i]['highlighted']=$r['highlighted'];

                    $res[$i]['category']=$r['catid'];

                    $res[$i]['sub_category']=$r['subcatid'];

                    //$res[$i]['vendor']=$r['vendor'];

                    //$res[$i]['variants']=$variants;

                   // $res[$i]['variant_values']=$r['variant_values'];

                    $res[$i]['date']=$r['created_date'];

                    $res[$i]['last_date']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }

    function get_product_by_name1($id,$subcatid)

    {

        if($disp!=''){$where =" and a.$disp=1";}else{$where="";}

        global $con;$res=array();$i=0;$images=array();$j=0;$variants=array();$k=0;

        $sql=mysqli_query($con,"select * from product_master where p_name='".$id."' and subcatid='".$subcatid."'");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $sql1=mysqli_query($con,"select p_img_id,p_img from product_images where pid='".$r['p_id']."'");

                    //$r1=mysqli_fetch_array($sql1);

                    while($r1=mysqli_fetch_array($sql1))

                    {

                        $images[$j]['i_id']=$r1['p_img_id'];

                        $images[$j]['image']=$r1['p_img'];

                        $j++;

                    }

                    /*$sql2=mysqli_query($con,"select id,variant_options,variant_id from product_variants where pid='".$id."'");

                    while($r2=mysqli_fetch_array($sql2))

                    {

                        $variants[$k]['v_id']=$r2['id'];

                        $variants[$k]['variant_options']=$r2['variant_options'];

                        $variants[$k]['variant_id']=$r2['variant_id'];

                        $k++;

                    }*/

                    $res[$i]['id']=$r['p_id'];

                    $res[$i]['rand']=$r['p_rand'];

                    $res[$i]['product_name']=$r['p_name'];

                    $res[$i]['description']=$r['p_description'];

                    $res[$i]['p_info']=$r['p_info'];

                    $res[$i]['image']=$images;

                    $res[$i]['price']=$r['p_price'];

                    $res[$i]['fabid']=$r['fabid'];

                    $res[$i]['h_img']=$r['highlighted_img'];

                    $res[$i]['style']=$r['p_default_style'];

                    $res[$i]['featured']=$r['featured'];

                    $res[$i]['highlighted']=$r['highlighted'];

                    $res[$i]['category']=$r['catid'];

                    $res[$i]['sub_category']=$r['subcatid'];

                    //$res[$i]['vendor']=$r['vendor'];

                    //$res[$i]['variants']=$variants;

                   // $res[$i]['variant_values']=$r['variant_values'];

                    $res[$i]['date']=$r['created_date'];

                    $res[$i]['last_date']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }

    



    function get_variant_by_id($id)

    {

        global $con;$res=array();$i=0;

         $sql=mysqli_query($con,"select * from variants where id=$id");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['id'];

                    $res[$i]['name']=$r['name'];

                    $res[$i]['options']=$r['options'];

                    $res[$i]['date']=$r['date'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }

     function get_category_by_id($id)

    {

        global $con;$res=array();$i=0;

         $sql=mysqli_query($con,"select * from category_master where cat_id=$id");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['cat_id'];

                    $res[$i]['name']=$r['cat_name'];

                    $res[$i]['date']=$r['created_date'];

                    $res[$i]['last_date']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }

    function get_pages($id='')

    {

        if($id!=''){$where=" where id=$id";}else{$where="";}

         global $con;$res=array();$i=0;

         $sql=mysqli_query($con,"select * from page_content $where");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['id'];

                    $res[$i]['page_title']=$r['page_title'];

                    $res[$i]['page_desc']=$r['page_desc'];

                    $res[$i]['date']=$r['date'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }

    function get_discounts($id='')

    {

        if($id!=''){$where=" where id=$id";}else{$where="";}

         global $con;$res=array();$i=0;

         $sql=mysqli_query($con,"select * from discounts $where order by date desc");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['id'];

                    $res[$i]['code_name']=$r['code_name'];

                    $res[$i]['discount_type']=$r['discount_type'];

                    $res[$i]['discount_amount']=$r['discount_amount'];

                    $res[$i]['discount_percentage']=$r['discount_percentage'];

                    $res[$i]['orders_on']=$r['orders_on'];

                    $res[$i]['over_amount']=$r['over_amount'];

                    $res[$i]['product_name']=$r['product_name'];

                    $res[$i]['start_date']=$r['start_date'];

                    $res[$i]['end_date']=$r['end_date'];

                    $res[$i]['date']=$r['date'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }

    function get_fabrics($id='',$fid='',$catid='')

    {

        if($id!=''){$where=" and fab_id=$id";}else{$where="";}

        if($fid!=''){$where1=" and fab_id IN(".$fid.")";}else{$where1="";}
        if($catid!=''){$where2=" and a.catid=".$catid."";}else{$where2="";}
         global $con;$res=array();$i=0;

         $sql=mysqli_query($con,"select a.*,b.sub_cat_name from fabric_master a,sub_category_master b where a.catid=b.sub_cat_id $where   $where1 $where2 order by  a.created_date desc");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['fab_id'];

                    $res[$i]['f_rand']=$r['fab_rand'];

                    $res[$i]['fab_name']=$r['fab_name'];

                    $res[$i]['fab_img']=$r['fab_img'];

                    $res[$i]['fab_desc']=$r['fab_desc'];                    

                    $res[$i]['fab_price']=$r['fab_price'];  

                    $res[$i]['sub_cat_name']=$r['sub_cat_name'];  

                    $res[$i]['category']=$r['catid'];  

                    $res[$i]['default_img']=$r['default_img'];  

                    $res[$i]['date']=$r['created_date'];

                    $res[$i]['last_updated']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }



    function get_fabrics1($id='',$fid='')

    {

        if($id!=''){$where=" where fab_id=$id";}else{$where="";}

        if($fid!=''){$where=" where fab_id IN(".$fid.")";}else{$where="";}

         global $con;$res=array();$i=0;

         $sql=mysqli_query($con,"select * from fabric_master $where");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['fab_id'];

                    $res[$i]['f_rand']=$r['fab_rand'];

                    $res[$i]['fab_name']=$r['fab_name'];

                    $res[$i]['fab_img']=$r['fab_img'];

                    $res[$i]['fab_desc']=$r['fab_desc'];                    

                    $res[$i]['fab_price']=$r['fab_price'];

                    $res[$i]['default_img']=$r['default_img'];  

                    $res[$i]['date']=$r['created_date'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }

    function get_fabrics2($id='',$fid='',$catid='')

    {

        if($id!=''){$where=" and fab_id=$id";}else{$where="";}

        if($fid!=''){$where1=" and fab_id IN(".$fid.")";}else{$where1="";}
        if($catid!=''){$where2=" and a.catid=".$catid."";}else{$where2="";}
         global $con;$res=array();$i=0;

         $sql=mysqli_query($con,"select a.*,b.sub_cat_name from fabric_master a,sub_category_master b where a.catid=b.sub_cat_id $where   $where1 $where2 ");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['fab_id'];

                    $res[$i]['f_rand']=$r['fab_rand'];

                    $res[$i]['fab_name']=$r['fab_name'];

                    $res[$i]['fab_img']=$r['fab_img'];

                    $res[$i]['fab_desc']=$r['fab_desc'];                    

                    $res[$i]['fab_price']=$r['fab_price'];  

                    $res[$i]['sub_cat_name']=$r['sub_cat_name'];  

                    $res[$i]['category']=$r['catid'];  

                    $res[$i]['default_img']=$r['default_img'];  

                    $res[$i]['date']=$r['created_date'];

                    $res[$i]['last_updated']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }


    function get_fabrics3($id='',$fid='')

    {

        if($id!=''){$where=" where fab_id=$id";}else{$where="";}

        if($fid!=''){$where=" where catid IN(".$fid.") and fab_name!='In-Store Fabric Selection'";}else{$where="";}

         global $con;$res=array();$i=0;

         $sql=mysqli_query($con,"select * from fabric_master $where");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['fab_id'];

                    $res[$i]['f_rand']=$r['fab_rand'];

                    $res[$i]['fab_name']=$r['fab_name'];

                    $res[$i]['fab_img']=$r['fab_img'];

                    $res[$i]['fab_desc']=$r['fab_desc'];                    

                    $res[$i]['fab_price']=$r['fab_price'];

                    $res[$i]['default_img']=$r['default_img'];  

                    $res[$i]['date']=$r['created_date'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }


    function get_properties($id='')

    {

        if($id!=''){$where=" where ps_id=$id";}else{$where="";}

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select * from property_style_master $where");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                     $sub="";$subid="";

                    $res[$i]['id']=$r['ps_id'];

                    $subcatid=explode(",",$r['subcatid']);

                    for ($j=0; $j <count($subcatid) ; $j++) { 

                     $sql1=mysqli_query($con,"select sub_cat_name,sub_cat_id from sub_category_master where sub_cat_id='".$subcatid[$j]."'");

                     $r1=mysqli_fetch_array($sql1);

                     $sub.=$r1['sub_cat_name'].",";

                     $subid.=$r1['sub_cat_id'].",";

                    }                        

                    $res[$i]['subcatid']=trim($sub,",");

                    $res[$i]['subid']=trim($subid,",");

                    $res[$i]['label']=$r['ps_label'];

                    $res[$i]['created_date']=$r['created_date'];

                    $res[$i]['last_date']=$r['last_updated'];

                    $i++;

                    unset($sub);unset($subid);

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }



    }

    function get_properties_styles($id='')

    {

         if($id!=''){$where="  and a.psd_id=$id";}else{$where="";}

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select a.*,b.ps_label from property_style_details a,property_style_master b where 

            a.psid=b.ps_id $where");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                     $sub="";$subid="";

                    $res[$i]['id']=$r['psd_id'];

                    $subcatid=explode(",",$r['subcatid']);

                    for ($j=0; $j <count($subcatid) ; $j++) { 

                     $sql1=mysqli_query($con,"select sub_cat_name,sub_cat_id from sub_category_master where sub_cat_id='".$subcatid[$j]."'");

                     $r1=mysqli_fetch_array($sql1);

                     $sub.=$r1['sub_cat_name'].",";

                     $subid.=$r1['sub_cat_id'].",";

                    }                        

                    $res[$i]['subcatid']=trim($sub,",");

                    $res[$i]['subid']=trim($subid,",");

                    $res[$i]['psid']=$r['psid'];

                    $res[$i]['label']=$r['ps_label'];

                    $res[$i]['value']=$r['psd_value'];

                    $res[$i]['created_date']=$r['created_date'];

                    $res[$i]['last_date']=$r['last_updated'];

                    $i++;

                    unset($sub);unset($subid);

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }

     function get_reviews($pid)

    {

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select * from reviews where status=1 and pid=$pid order by created_date desc");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['r_id'];

                    $res[$i]['score']=$r['score'];

                    $res[$i]['name']=$r['name'];

                    $res[$i]['email']=$r['email'];

                    $res[$i]['desc']=$r['description'];

                    $res[$i]['date']=$r['created_date'];

                    $i++;

                }



                return $res;

            }

            else

            {

                return 0;

            }

        }

        else

        {

            return 0;

        }

    }



    function get_countries()

    {

        global $con;$res=array();$i=0;

         $sql=mysqli_query($con,"select * from country_master order by country_name asc");

          if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['co_id']=$r['co_id'];

                    $res[$i]['country_name']=$r['country_name'];

                    $res[$i]['date_inserted']=$r['date_inserted'];

                    $i++;

                }



                return $res;

            }

            else

            {

                return 0;

            }

        }

        else

        {

            return 0;

        }

                  

    }



     function get_state()

    {

        global $con;$res=array();$i=0;

         $sql=mysqli_query($con,"select * from state_master order by state_name asc");

          if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['id']=$r['s_id'];

                    $res[$i]['name']=$r['state_name'];

                    $res[$i]['countryid']=$r['countryid'];

                    $res[$i]['created_date']=$r['created_date'];

                    $i++;

                }



                return $res;

            }

            else

            {

                return 0;

            }

        }

        else

        {

            return 0;

        }

                  

    }



     function get_received_order($oid,$a_id='')

    {

         global $con;$res=array();$i=0; $tot="";$message="";

       $sql=mysqli_query($con,"select a.*,a.created_date as c_date,b.p_description from order_master a,product_master b where 

            a.order_id='$oid' and a.pid=b.p_id and a.om_status=0");

         if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $tot=$tot + ($r['om_price'] * $r['om_quantity']);

                    $res[0]['created_date']=$r['c_date'];

                    $res[0]['order_id']=$r['order_id'];

                    $i++;

                }

                

                $res[0]['price']=$tot;



                /* Order History Mail Template */

                return $res;

            }

            else

            {

                return 0;

            }

        }

        else

        {

            return 0;

        }

    }

    function get_all_banners($id='',$st='')

    {

        if($id!=''){$where=" where b_id=$id";}else{$where="";}

        if($st!=''){$where2=" where banner_status=1";}else{$where2="";}

         global $con;$res=array();$i=0; $tot="";

         $sql=mysqli_query($con,"select * from banner_master  $where $where2 order by created_date desc");

         if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    

                    $res[$i]['id']=$r['b_id'];

                    $res[$i]['title']=$r['banner_title'];               

                    $res[$i]['desc']=$r['banner_desc'];               

                    $res[$i]['img']=$r['banner_img'];               

                    $res[$i]['status']=$r['banner_status'];      

                    $res[$i]['created_date']=$r['created_date'];               

                    $res[$i]['last_updated']=$r['last_updated'];               

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }

        }

        else

        {

            return 0;

        }

    }

    function get_orders()



    {



        global $con;$res=array();$i=0;



        $sql=mysqli_query($con,"select sum(a.om_quantity * a.om_price) as tot_price,a.*,b.p_name,
            b.p_price from order_master a,product_master b,order_history_master c 
            where a.pid=b.p_id and a.om_status=0 and a.order_id=c.orderid group by a.order_id order by c.created_date desc");
        while($r=mysqli_fetch_array($sql))
        {
            $sql1=mysqli_query($con,"select p_img from product_images where pid='".$r['pid']."'");
            $r1=mysqli_fetch_array($sql1);
            $res[$i]['tot_price']=$r['tot_price'];
            $res[$i]['om_id']=$r['om_id'];
            $res[$i]['pid']=$r['pid'];
            $res[$i]['userid']=$r['userid'];
            $res[$i]['order_id']=$r['order_id'];
            $res[$i]['placed_by']=$r['placed_by'];
            $res[$i]['order_status']=$r['order_status'];
            $res[$i]['product_name']=$r['p_name'];
            $res[$i]['price']=$r['p_price'];
            $res[$i]['p_img']=$r1['p_img']; 
            $res[$i]['notes']=$r['notes']; 
            $res[$i]['created_date']=$r['created_date'];
            $res[$i]['last_updated']=$r['last_updated'];
            $res[$i]['om_quantity']=$r['om_quantity'];
            $i++;
        }
        return $res;
    }



    function get_user_role($id='',$role='')

    {

        $res=array();$i=0;global $con;

        if($id!=''){$where =" and user_id=$id";}else{$where="";}

        $sql=mysqli_query($con,"select * from user_master where user_type=$role $where order by created_date desc");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while ($r=mysqli_fetch_array($sql)) 

                {

                    $res[$i]['id']=$r['user_id'];

                    $res[$i]['name']=$r['firstname'];

                    $res[$i]['username']=$r['username'];

                    $res[$i]['password']=$r['password'];

                    $res[$i]['mobile']=$r['mobile'];

                    $res[$i]['email']=$r['email'];

                    $res[$i]['img']=$r['img'];

                    $res[$i]['address1']=$r['address1'];

                    $res[$i]['address2']=$r['address2'];

                    $res[$i]['state']=$r['province'];

                    $res[$i]['country']=$r['country'];

                    $res[$i]['city']=$r['city'];

                    $res[$i]['zipcode']=$r['zipcode'];

                    $res[$i]['usertype']=$r['user_type'];

                    $res[$i]['block']=$r['block'];

                    $res[$i]['created_date']=$r['created_date'];

                    $res[$i]['last_updated']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }

        }

        else

        {

            return 0;

        }



    }



     function get_showrooms($id='',$st='')

    {

        $res=array();$i=0;global $con;

        if($id!=''){$where =" where sr_id=$id";}else{$where="";}

        if($st!=''){$where1 =" where block=$st";}else{$where1="";}

        $sql=mysqli_query($con,"select * from showroom_master  $where $where1 order by created_date desc");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while ($r=mysqli_fetch_array($sql)) 

                {

                    $res[$i]['id']=$r['sr_id'];

                    $res[$i]['name']=$r['sr_title'];

                    $res[$i]['email']=$r['sr_email'];

                    $res[$i]['address']=$r['sr_address'];

                    $res[$i]['image']=$r['sr_image'];

                    $res[$i]['monday']=$r['sr_monday'];

                    $res[$i]['tuesday']=$r['sr_tuesday'];

                    $res[$i]['wednesday']=$r['sr_wednesday'];

                    $res[$i]['thursday']=$r['sr_thursday'];

                    $res[$i]['friday']=$r['sr_friday'];

                    $res[$i]['saturday']=$r['sr_saturday'];

                    $res[$i]['sunday']=$r['sr_sunday'];

                    $res[$i]['block']=$r['block'];

                    $res[$i]['created_date']=$r['created_date'];

                    $res[$i]['last_updated']=$r['last_updated'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }

        }

        else

        {

            return 0;

        }



    }

    

    function get_mesurement_by_user($id='')

    {

        $res=array();global $con;$i=0;

        $sql=mysqli_query($con,"select * from measurement_profile_master where mp_userid=$id");

        if(mysqli_num_rows($sql) > 0)

        {

            while($r=mysqli_fetch_array($sql))

            {

                $res[$i]['id']=$r['mp_id'];

                $res[$i]['name']=$r['mp_name'];

                $res[$i]['height']=$r['mp_height'];

                $res[$i]['weight']=$r['mp_weight'];

                $i++;

            }

            return $res;

        }

        else

        {

            return 0;    

        }

    }

    function get_orders_by_user($id='')

    {

        $res=array();global $con;$i=0;

        //$sql=mysqli_query($con,"select a.*,b.p_name from order_master a,product_master b where

         //a.om_status=0 and a.pid=b.p_id and a.userid=$id");

        $sql = mysqli_query($con,"select * from order_history_master where userid=$id");

        if(mysqli_num_rows($sql))

        {

            while ($r=mysqli_fetch_array($sql)) 

            {

                $res[$i]['order_id']=$r['orderid'];

                //$res[$i]['p_name']=$r['p_name'];

                //$res[$i]['quantity']=$r['om_quantity'];

                $res[$i]['price']=$r['tot_amount'];

                $res[$i]['status']=$r['order_status'];

                $res[$i]['created_date']=$r['created_date'];

                $i++;

            }

            return $res;

        }

        else

        {

            return 0;

        }

    }

     function get_faqs($id='',$st='')

    {

        global $con;$res=array();$i=0;

        if($id!=''){$where =" where f_id=$id";}else{$where="";}

        if($st!=''){$where1 =" where f_status=0";}else{$where1="";}

        $sql=mysqli_query($con,"select * from faqs_master $where $where1 order by created_date desc");

        if(mysqli_num_rows($sql))

        {

            while ($r=mysqli_fetch_array($sql))

             {

                $res[$i]['id']=$r['f_id'];

                $res[$i]['title']=$r['f_title'];

                $res[$i]['desc']=$r['f_desc'];

                $res[$i]['status']=$r['f_status'];

                $res[$i]['created_date']=$r['created_date'];

                $res[$i]['last_updated']=$r['last_updated'];

                $i++;

             }

             return $res;

        }

        else

        {

            return 0;

        }

    }

    function get_works($id='',$st='')

    {

        global $con;$res=array();$i=0;

        if($id!=''){$where =" where w_id=$id";}else{$where="";}

        if($st!=''){$where1 =" where block=0";}else{$where1="";}

        $sql=mysqli_query($con,"select * from works_master $where $where1");

        if(mysqli_num_rows($sql))

        {

            while ($r=mysqli_fetch_array($sql))

             {

                $res[$i]['id']=$r['w_id'];

                $res[$i]['title']=$r['w_title'];

                $res[$i]['desc']=$r['w_desc'];

                $res[$i]['img']=$r['w_image'];

                $res[$i]['block']=$r['block'];

                $res[$i]['created_date']=$r['created_date'];

                $res[$i]['last_updated']=$r['last_updated'];

                $i++;

             }

             return $res;

        }

        else

        {

            return 0;

        }

    }
    function get_whyus($id='',$st='')

    {

        global $con;$res=array();$i=0;

        if($id!=''){$where =" where w_id=$id";}else{$where="";}

        if($st!=''){$where1 =" where block=0";}else{$where1="";}

        $sql=mysqli_query($con,"select * from whyus_master $where $where1");

        if(mysqli_num_rows($sql))

        {

            while ($r=mysqli_fetch_array($sql))

             {

                $res[$i]['id']=$r['w_id'];

                $res[$i]['title']=$r['w_title'];

                $res[$i]['desc']=$r['w_desc'];

                $res[$i]['img']=$r['w_image'];

                $res[$i]['block']=$r['block'];

                $res[$i]['created_date']=$r['created_date'];

                $res[$i]['last_updated']=$r['last_updated'];

                $i++;

             }

             return $res;

        }

        else

        {

            return 0;

        }

    }
    function get_gallery($id='',$st='')

    {

        global $con;$res=array();$i=0;

        if($id!=''){$where =" where w_id=$id";}else{$where="";}

        if($st!=''){$where1 =" where block=0";}else{$where1="";}

        $sql=mysqli_query($con,"select * from gallery_master $where $where1");

        if(mysqli_num_rows($sql))

        {

            while ($r=mysqli_fetch_array($sql))

             {

                $res[$i]['id']=$r['w_id'];

                $res[$i]['title']=$r['w_title'];

                $res[$i]['desc']=$r['w_desc'];

                $res[$i]['img']=$r['w_image'];

                $res[$i]['block']=$r['block'];

                $res[$i]['created_date']=$r['created_date'];

                $res[$i]['last_updated']=$r['last_updated'];

                $i++;

             }

             return $res;

        }

        else

        {

            return 0;

        }

    }

    function get_wedding($id='',$st='')

    {

        global $con;$res=array();$i=0;

        if($id!=''){$where =" where w_id=$id";}else{$where="";}

        if($st!=''){$where1 =" where block=0";}else{$where1="";}

        $sql=mysqli_query($con,"select * from wedding_master $where $where1");

        if(mysqli_num_rows($sql))

        {

            while ($r=mysqli_fetch_array($sql))

             {

                $res[$i]['id']=$r['w_id'];

                $res[$i]['title']=$r['w_title'];

                $res[$i]['desc']=$r['w_desc'];

                $res[$i]['img']=$r['w_image'];

                $res[$i]['block']=$r['block'];

                $res[$i]['created_date']=$r['created_date'];

                $res[$i]['last_updated']=$r['last_updated'];

                $i++;

             }

             return $res;

        }

        else

        {

            return 0;

        }

    }

    function get_ord_received($id='',$st='')

    {

        global $con;$res=array();$i=0;

        if($id!=''){$where =" where id=$id";}else{$where="";}

        if($st!=''){$where1 =" where block=0";}else{$where1="";}

        $sql=mysqli_query($con,"select * from order_received_master $where $where1");

        if(mysqli_num_rows($sql))

        {

            while ($r=mysqli_fetch_array($sql))

             {

                $res[$i]['id']=$r['id'];

                $res[$i]['title']=$r['ord_title'];

                $res[$i]['desc']=$r['ord_desc'];

                $res[$i]['img']=$r['ord_image'];

                $res[$i]['created_date']=$r['created_date'];

                $res[$i]['last_updated']=$r['last_updated'];

                $i++;

             }

             return $res;

        }

        else

        {

            return 0;

        }

    }



     function get_wedding_banner($id='',$st='')

    {

        global $con;$res=array();$i=0;

        if($id!=''){$where =" where w_id=$id";}else{$where="";}

        if($st!=''){$where1 =" where block=0";}else{$where1="";}

        $sql=mysqli_query($con,"select * from wedding_banner_master $where $where1");

        if(mysqli_num_rows($sql))

        {

            while ($r=mysqli_fetch_array($sql))

             {

                $res[$i]['id']=$r['w_id'];

                $res[$i]['title']=$r['w_title'];

                $res[$i]['desc']=$r['w_desc'];

                $res[$i]['img']=$r['w_image'];

                $res[$i]['block']=$r['block'];

                $res[$i]['created_date']=$r['created_date'];

                $res[$i]['last_updated']=$r['last_updated'];

                $i++;

             }

             return $res;

        }

        else

        {

            return 0;

        }

    }

    

    function get_seo($page)

    {

        $res=array();global $con;

        $sql=mysqli_query($con,"select * from seo_master where sm_page='".$page."'");

        if(mysqli_num_rows($sql))

        {

            $r=mysqli_fetch_array($sql);

            $res[0]['id']=$r['sm_id'];

            $res[0]['sm_page']=$r['sm_page'];

            $res[0]['page_title']=$r['sm_page_title'];

            $res[0]['keyword']=$r['sm_keyword'];

            $res[0]['desc']=$r['sm_description'];

            $res[0]['created_date']=$r['created_date'];

            $res[0]['last_updated']=$r['last_updated'];

            return $res;

        }

        else

        {

            return 0;

        }

    }

    

    function get_contact()

    {

        $res=array();global $con;

        $sql=mysqli_query($con,"select * from contact_master where cm_id=1");

        $r=mysqli_fetch_array($sql);

        $res[0]['id']=$r['cm_id'];

        $res[0]['email']=$r['cm_email'];

        $res[0]['phone']=$r['cm_phone'];

        $res[0]['fax']=$r['cm_fax'];

        $res[0]['street1']=$r['cm_street1'];

        $res[0]['street2']=$r['cm_street2'];

        $res[0]['city']=$r['cm_city'];

        $res[0]['state']=$r['cm_state'];

        $res[0]['zipcode']=$r['cm_zipcode'];

        $res[0]['country']=$r['cm_country'];

        $res[0]['created_date']=$r['created_date'];

        $res[0]['last_updated']=$r['last_updated'];

        return $res;

    }

function get_all_reviews($st='',$id='')

    {

        if($st=='1'){$where="and status=1";}else{$where="";}

        if($id!=''){$where1="and r_id=$id";}else{$where1="";}

        $res=array();$i=0;global $con;

        $sql=mysqli_query($con,"select * from reviews where 1=1

        $where $where1 order by created_date desc");

        if(mysqli_num_rows($sql) > 0)

        {

            while ($r=mysqli_fetch_array($sql))

             {



                $res[$i]['id']=$r['r_id'];

               $res[$i]['pid']=$r['pid'];

               $res[$i]['subcatid']=$r['subcatid'];

               $res[$i]['catid']=$r['catid'];

                $res[$i]['p_name']=$r['p_name'];

                $res[$i]['score']=$r['score'];

                $res[$i]['name']=$r['name'];

                $res[$i]['email']=$r['email'];

                $res[$i]['title']=$r['title'];

                $res[$i]['city']=$r['city'];

                $res[$i]['state']=$r['state'];

                $res[$i]['description']=$r['description'];

                $res[$i]['created_date']=$r['created_date'];

                $res[$i]['status']=$r['status'];

                $i++;

             }

             return $res;

        }

        else

        {

            return 0;

        }

    }

     function get_mpf_feilds($id='',$st='')

    {

        if($id!=''){$where =" where mpf_id=$id";}else{$where="";}

        if($st!=''){$where1 =" where status=$st";}else{$where1="";}

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select * from measurement_profile_fields $where $where1 order by created_date desc");

        if(mysqli_num_rows($sql))

        {

            while ($r=mysqli_fetch_array($sql))

             {

                $res[$i]['id']=$r['mpf_id'];

                $res[$i]['name']=$r['labelname'];

                $res[$i]['status']=$r['status'];

                $res[$i]['created_date']=$r['created_date'];

                $i++;

            }

            return $res;

        }

        else

        {

            return 0;

        }

    }

     function get_payment_information()

    {

        $res=array();global $con;

        $query=mysqli_query($con,"select * from payment_information where pi_id=1");

        $r=mysqli_fetch_array($query);

        $res[0]['id']=$r['id'];

        $res[0]['paypal_id']=$r['paypal_id'];

        $res[0]['cash_delivery']=$r['cash_on_delivery'];

        $res[0]['payment_mode']=$r['payment_mode'];

        $res[0]['in_store']=$r['in_store_credit'];

        $res[0]['shipping_cost']=$r['shipping_cost'];

        return $res;

    }



     function get_gift_card()

    {

        $res=array();global $con;$i++;

        $sql=mysqli_query($con,"select a.*,b.firstname,b.email from gift_card_master a,user_master b

         where a.status=1 and a.userid=b.user_id order by a.created_date desc");

        if(mysqli_num_rows($sql) > 0)

        {



            while($r=mysqli_fetch_array($sql))

            {

                $res[$i]['id']=$r['gc_id'];

                $res[$i]['gift_code']=$r['gift_code'];

                $res[$i]['name']=$r['firstname'];

                $res[$i]['email']=$r['email'];

                $res[$i]['amount']=$r['amount'];

                $res[$i]['balance']=$r['balance'];

                $res[$i]['quantity']=$r['quantity'];

                $res[$i]['gift_type']=$r['gift_type'];

                $res[$i]['recipient_name']=$r['recipient_name'];

                $res[$i]['recipient_mail']=$r['recipient_mail'];

                $res[$i]['recipient_address']=$r['recipient_address'];

                $res[$i]['created_date']=$r['created_date'];

                $i++;    

            }

            

            return $res;

        }

        else

        {

            return 0;

        }

    }    



      function get_colors($id='')

    {

        $where="";

        if($id!=''){$where=" and a.cc_id=$id";}

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select a.*,b.sub_cat_name from custom_color_master a, sub_category_master

            b where a.subcatid=b.sub_cat_id $where order by created_date desc");

        if(mysqli_num_rows($sql) > 0)

        {

            while($r=mysqli_fetch_array($sql))

            {

                $res[$i]['id']=$r['cc_id'];

                $res[$i]['subcat']=$r['subcatid'];

                $res[$i]['subcat_name']=$r['sub_cat_name'];

                $res[$i]['style_id']=$r['style_id'];

                if($r['style_id']=="1"){$res[$i]['style']="Monogram Thread Color";}

                elseif($r['style_id']=="2"){$res[$i]['style']="Neck Lining";}

                elseif($r['style_id']=="3"){$res[$i]['style']="Elbow Patches";}

                elseif($r['style_id']=="4"){$res[$i]['style']="Pocket Square";}

                elseif($r['style_id']=="5"){$res[$i]['style']="Button Holes";}

                elseif($r['style_id']=="6"){$res[$i]['style']=" Button Threads";}

                elseif($r['style_id']=="7"){$res[$i]['style']=" Lapel Color";}

                elseif($r['style_id']=="8"){$res[$i]['style']="MONOGRAM POSITION CUFF POCKET COLLAR";}

                elseif($r['style_id']=="9"){$res[$i]['style']="CUSTOMIZE COLLAR LINING";}

                elseif($r['style_id']=="10"){$res[$i]['style']="CUSTOMIZE CUFF STYLING";}
                elseif($r['style_id']=="11"){$res[$i]['style']="Jacket Lining";}

                $res[$i]['name']=$r['color_name'];  

                $res[$i]['value']=$r['color_value'];

                $res[$i]['img']=$r['color_img'];

                $res[$i]['created_date']=$r['created_date'];

                $i++;

            }

            return $res;

        }

        else

        {

            return 0;

        }

    }





    function get_accent_color($subcat,$styleid)

    {

        global $con;$res=array();$i=0;

        $sql=mysqli_query($con,"select * from custom_color_master where subcatid=".$subcat." and style_id=".$styleid."");

        if($sql)

        {

            if(mysqli_num_rows($sql) > 0)

            {

                while($r=mysqli_fetch_array($sql))

                {

                    $res[$i]['color_value']=$r['color_value'];

                    $res[$i]['color_name']=$r['color_name'];

                    $res[$i]['color_img']=$r['color_img'];

                    $i++;

                }

                return $res;

            }

            else

            {

                return 0;

            }   

        }

        else

        {

            return 0;

        }

    }



    

    function get_quotes($id='',$st='')

    {

        $where="";$where1="";

        if($id!=''){$where=" where qid=$id";}

        if($st!=''){$where1=" where status=1";}

        $res=array();global $con;$i=0;

        $sql=mysqli_query($con,"select * from quote_master $where $where1 order by created_date desc");

        if(mysqli_num_rows($sql) > 0)

        {

            while ($r=mysqli_fetch_array($sql))

            {

                $res[$i]['id']=$r['qid'];

                $res[$i]['text']=$r['q_text'];

                $res[$i]['name']=$r['q_name'];

                $res[$i]['mail']=$r['q_mail'];

                $res[$i]['status']=$r['status'];

                $res[$i]['created_date']=$r['created_date'];

                $res[$i]['last_updated']=$r['last_updated'];

                $i++;

            }

            return $res;

        }

        else

        {

            return 0;

        }

    }





    function get_carousel($id='',$st='',$orderby='')

    {

        $where="";$where1="";

        if($id!=''){$where=" where cm_id=$id";}

        if($st!=''){$where1=" where status=1";}

        if($orderby=='admin'){$orderby=" created_date desc";}else{$orderby="created_date asc";}

        $res=array();global $con;$i=0;

        $sql=mysqli_query($con,"select * from carousel_master $where $where1 order by $orderby ");

        if(mysqli_num_rows($sql) > 0)

        {

            while ($r=mysqli_fetch_array($sql))

            {

                $res[$i]['id']=$r['cm_id'];

                $res[$i]['heading']=$r['c_heading'];

                $res[$i]['heading2']=$r['c_heading2'];

                $res[$i]['desc']=$r['c_desc'];

                $res[$i]['img']=$r['c_img'];

                $res[$i]['link']=$r['c_link'];

                $res[$i]['status']=$r['status'];

                $res[$i]['created_date']=$r['created_date'];

                $res[$i]['last_updated']=$r['last_updated'];

                $i++;

            }

            return $res;

        }

        else

        {

            return 0;

        }

    }

    

     function get_order_history($oid)

    {

        global $con;$res=array();

        $sql=mysqli_query($con,"select * from order_history_master where orderid='$oid'");

        $r=mysqli_fetch_array($sql);

        $res[0]['ship_cost']=$r['shipping_cost'];

        $res[0]['amount']=$r['tot_amount'];

        $res[0]['tax']=$r['tax'];

        $res[0]['date']=$r['oh_date'];

        return $res;

    }

    function get_tax($userid)

    {

        global $con;

          $b_add=mysqli_query($con,"select * from user_master where user_id=$userid");

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

                return $r['t_percent'];

            }

            else

            {

                return 0;

            }

        }

        else

        {

            return 0;
        }

    }

    function get_jacket_lining($cat='')
    {
      global $con;
      $q=mysqli_query($con,"select * from custom_color_master where style_id='11' and subcatid='".$cat."'");
      $r=mysqli_fetch_array($q);
      return $r;
    }

}

?>