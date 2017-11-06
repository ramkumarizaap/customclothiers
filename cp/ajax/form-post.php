<?php

require('../../includes/action/config.php');

date_default_timezone_set('Asia/Calcutta');

global $con;

$type=mysqli_real_escape_string($con,trim($_POST['type']));

if($type=="variants")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$title=mysqli_real_escape_string($con,trim($_POST['title']));

	$op="";

	$options=$_POST['options'];

	for ($i=0; $i <count($options) ; $i++) { 

		$op=$options[$i].",";

	}

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	if($action=="save")

	{

		$sql=mysqli_query($con,"insert into variants(name,options) values('".$title."','".trim($op,",")."')");

	}

	else if($action=="update")

	{

		$sql=mysqli_query($con,"update variants set name='".$title."',options='".trim($op,",")."' where id=$id");	

	}

	echo "success";

}

else if($type=="products")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$product_title=mysqli_real_escape_string($con,trim($_POST['product_title']));

	$product_desc=mysqli_real_escape_string($con,trim($_POST['product_desc']));

	$waist_price=mysqli_real_escape_string($con,trim($_POST['waist_price']));

	$product_info=mysqli_real_escape_string($con,trim($_POST['product_info']));

	$price=mysqli_real_escape_string($con,trim($_POST['price']));
	$extra_pant=mysqli_real_escape_string($con,trim($_POST['extra_pant']));

	$fab="";

	$fabric=$_POST['fabric'];

	for ($i=0; $i<count($_POST['fabric']) ; $i++) { 

		 $fab .=$fabric[$i].",";

	}

	 $fabric=trim($fab,",");

	$category=mysqli_real_escape_string($con,trim($_POST['category']));

	$ps_id=!empty($_POST['ps_id']) ? $_POST['ps_id'] :"0";

	$style=!empty($_POST['style']) ? $_POST['style'] : "0";$st="";

	$option1=isset($_POST['option1']) ?  $_POST['option1']: "0";

	$option2=isset($_POST['option2']) ?  $_POST['option2']: "0";

	$option3=isset($_POST['option3']) ?  $_POST['option3']: "0";

	

	for ($i=0; $i <count($ps_id) ; $i++) { 

		$st .= str_replace(' ','_',strtolower($ps_id[$i])).":".strtolower($style[$ps_id[$i]][0]).",";

	}

	$st="{".trim($st,",")."}";

	$sub_category=mysqli_real_escape_string($con,trim($_POST['sub_category']));

	//$vendor=$_POST['vendor'];$vendor_list="";

	/*for($i=0;$i<count($vendor);$i++)

	{

		$vendor_list .=$vendor[$i].",";

	}

	$variant_name=$_POST['variant_name'];

	$variant_options=$_POST['var_options'];*/

	//print_r($var_options);

	//print_r($variant_name);

	$img1="";

	if($option2=="1")

	{

	 if($_FILES['userfile1']['size']!=0)

		{

 		if(!file_exists('../../uploads/products/highlight/'))

    	{

    		mkdir('../../uploads/products/highlight/', 0777, true);

    	}

		$img1="";

		$type1=$_FILES['userfile1']['type'];

		$ext1=get_image_type($type1);

		$rand1=time();

		$temp1=$_FILES['userfile1']['tmp_name'];

		$target1="../../uploads/products/highlight/".$rand1.$ext1;

		$target11="uploads/products/highlight/".$rand1.$ext1;

		$img1.=$target11;

		move_uploaded_file($temp1,$target1);

		$temp1='';

		$target1='';

		$rand1='';

		$ext1='';

	    }

	    else{$img1=$_POST['old_img'];}

	   }

	  else

	  {

	  	$img1=$_POST['old_img'];

	  }

	$images="";

	if($action=="products_add")

	{

		$date=date("Y-m-d H:i:s");

		$p_rand=substr(strtoupper($product_title), 0,3).rand(0,9999);

		 $sql=mysqli_query($con,"insert into product_master(p_rand,p_name,p_description,p_info,p_price,waist_price,extra_pant,p_default_style,featured,highlighted,highlighted_img,catid,subcatid,fabid,frontend,backend,created_date) 

				VALUES 	('".$p_rand."','".$product_title."','".$product_desc."','".$product_info."','".$price."','".$waist_price."','".$extra_pant."','".$st."','".$option1."','".$option2."','".$img."','".$category."','".$sub_category."','".$fabric."','".$option2."','".$option3."','".$date."')");

		 $product_id=mysqli_insert_id($con);

		$count=count($_FILES['userfile']['name']);

		 if(!file_exists('../../uploads/products/'))

	    	{

	    		mkdir('../../uploads/products/', 0777, true);

	    	}

		 for($i=0;$i<$count;$i++)

		 {

		 	 if($_FILES['userfile']['size'][$i]!=0)

				{

					/*$img="";

					$type=$_FILES['userfile']['type'][$i];

					$ext=get_image_type($type);

					$rand=time().$i;

					$temp=$_FILES['userfile']['tmp_name'][$i];

					$target="../../uploads/products/".$rand.$ext;

					$target1="uploads/products/".$rand.$ext;

					$img.=$target1;

					move_uploaded_file($temp,$target);

					$temp='';

					$target='';

					$rand='';

					$ext='';*/

					list($w, $h) = getimagesize($_FILES['userfile']['tmp_name'][$i]);

					$type=$_FILES['userfile']['type'][$i];

					$ext=get_image_type($type);

					$rand=time().$i;
					$width=390;
					$height=674;
					$ratio = max($width/$w, $height/$h);
					$h = ceil($height / $ratio);
					$x = ($w - $width / $ratio) / 2;
					$w = ceil($width / $ratio);
					$path = "../../uploads/products/".$rand.$ext;

					$path1 = "uploads/products/".$rand.$ext;

					$imgString = file_get_contents($_FILES['userfile']['tmp_name'][$i]);
					$image = imagecreatefromstring($imgString);
					$tmp = imagecreatetruecolor($width, $height);
					imagecopyresampled($tmp, $image,
				  	0, 0,
				  	$x, 0,
				  	$width, $height,
				  	$w, $h);
					/* Save image */
					switch ($_FILES['userfile']['type'][$i]) {

						case 'image/jpeg':
						case 'image/jpg':
						case 'image/JPEG':
						case 'image/JPG':
							imagejpeg($tmp, $path, 100);
							break;
						case 'image/png':
						case 'image/PNG':
							imagepng($tmp, $path, 0);
							break;
						case 'image/gif':
						case 'image/GIF':
							imagegif($tmp, $path);
							break;
						default:
							exit;
							break;
					}

					$sql=mysqli_query($con,"insert into product_images(pid,p_img,created_date)values('".$product_id."','".$path1."','".$date."')");

		        }

		     //   $images.=$img.",";

		 }

		/*for($j=0;$j<count($variant_name);$j++)

		{

			if($variant_name[$j]!='')

			{

				$sql1= mysqli_query($con,"insert into product_variants(product_id,variant_id,variant_options)

				values('".$product_id."','".$variant_name[$j]."','".$variant_options[$j]."')");

			}

		}*/

	}

	else if($action=="products_update")

	{

		$product_id=mysqli_real_escape_string($con,trim($_POST['product_id']));

		$v_id=$_POST['v_id'];$date=date('Y-m-d H:i:s');

		$sql=mysqli_query($con,"update product_master set p_info='".$product_info."',p_default_style='".$st."',p_name='".$product_title."',p_description='".$product_desc."',
			extra_pant='".$extra_pant."',
		p_price='".$price."',catid='".$category."',subcatid='".$sub_category."',fabid='".$fabric."',last_updated=NOW(),waist_price='".$waist_price."',frontend='".$option2."',

		backend='".$option3."',featured='".$option1."' where p_id=$product_id");

		$count=count($_FILES['userfile']['name']);

		 for($i=0;$i<$count;$i++)

		 {

		 	 if($_FILES['userfile']['size'][$i]!=0)

				{

					/*$img="";

					$type=$_FILES['userfile']['type'][$i];

					$ext=get_image_type($type);

					$rand=time().$i;

					$temp=$_FILES['userfile']['tmp_name'][$i];

					$target="../../uploads/products/".$rand.$ext;

					$target1="uploads/products/".$rand.$ext;

					$img.=$target1;

					move_uploaded_file($temp,$target);

					$temp='';

					$target='';

					$rand='';

					$ext='';*/
					list($w, $h) = getimagesize($_FILES['userfile']['tmp_name'][$i]);

					$type=$_FILES['userfile']['type'][$i];

					$ext=get_image_type($type);

					$rand=time().$i;
					$width=390;
					$height=674;
					$ratio = max($width/$w, $height/$h);
					$h = ceil($height / $ratio);
					$x = ($w - $width / $ratio) / 2;
					$w = ceil($width / $ratio);
					$path = "../../uploads/products/".$rand.$ext;

					$path1 = "uploads/products/".$rand.$ext;

					$imgString = file_get_contents($_FILES['userfile']['tmp_name'][$i]);
					$image = imagecreatefromstring($imgString);
					$tmp = imagecreatetruecolor($width, $height);
					imagecopyresampled($tmp, $image,
				  	0, 0,
				  	$x, 0,
				  	$width, $height,
				  	$w, $h);
					/* Save image */
					switch ($_FILES['userfile']['type'][$i]) {

						case 'image/jpeg':
						case 'image/jpg':
						case 'image/JPEG':
						case 'image/JPG':
							imagejpeg($tmp, $path, 100);
							break;
						case 'image/png':
						case 'image/PNG':
							imagepng($tmp, $path, 0);
							break;
						case 'image/gif':
						case 'image/GIF':
							imagegif($tmp, $path);
							break;
						default:
							exit;
							break;
					}

					$sql=mysqli_query($con,"insert into product_images(pid,p_img)values('".$product_id."','".$path1."')");

		        }

		     //   $images.=$img.",";

		 }

		/* for($j=0;$j<count($variant_name);$j++)

		{

			 $sql11=mysqli_query($con,"select * from product_variants where product_id='".$product_id."' and variant_id='".$variant_name[$j]."'");

			if(mysqli_num_rows($sql11) > 0)

			{

				 $sql1=mysqli_query($con,"update product_variants set variant_id='".$variant_name[$j]."',

					variant_options='".$variant_options[$j]."' where id=$v_id[$j]");

			}

			else

			{

				$sql1= mysqli_query($con,"insert into product_variants(product_id,variant_id,variant_options)

				values('".$product_id."','".$variant_name[$j]."','".$variant_options[$j]."')");

			}

     	}*/

		}

}

if($type=="category")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$title=mysqli_real_escape_string($con,trim($_POST['title']));

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	if($action=="save")

	{

		$sql=mysqli_query($con,"insert into category_master(cat_name) values('".$title."')");

	}

	else if($action=="update")

	{

		$sql=mysqli_query($con,"update category_master set cat_name='".$title."' where cat_id=$id");	

	}

	echo "success";

}

if($type=="sub-category")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$category=mysqli_real_escape_string($con,trim($_POST['category']));

	$sub_category=mysqli_real_escape_string($con,trim($_POST['sub_category']));

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	if($action=="save")

	{

		$sql=mysqli_query($con,"insert into sub_category_master(catid,sub_cat_name) values('".$category."','".$sub_category."')");

	}

	else if($action=="update")

	{

		$date=date('Y-m-d H:i:s');

		$sql=mysqli_query($con,"update sub_category_master set catid='".$category."',sub_cat_name='".$sub_category."',last_updated='".$date."' 

			where sub_cat_id=$id");	

	}

	echo "success";

}

if($type=="property_style")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$label_name=mysqli_real_escape_string($con,trim($_POST['label_name']));

	$date=date("Y-m-d H:i:s");

	$sub="";

	$sub_category=$_POST['sub_category'];

	for ($i=0; $i <count($sub_category) ; $i++) { 

		$sub.=$sub_category[$i].",";

	}

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	if($action=="save")

	{

		$sql=mysqli_query($con,"insert into property_style_master(subcatid,ps_label,created_date) values('".trim($sub,",")."','".$label_name."','".$date."')");

	}

	else if($action=="update")

	{

		$date=date('Y-m-d H:i:s');

		$sql=mysqli_query($con,"update property_style_master set last_updated='".$date."',ps_label='".$label_name."',subcatid='".trim($sub,",")."',last_updated='".$date."' 

			where ps_id=$id");	

	}

	echo "success";

}

if($type=="property_style_details")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$style_name=mysqli_real_escape_string($con,trim($_POST['style_name']));

	$label=mysqli_real_escape_string($con,trim($_POST['label']));

		$date=date('Y-m-d H:i:s');

	$sub="";

	$sub_category=$_POST['sub_category'];

	for ($i=0; $i <count($sub_category) ; $i++) { 

		$sub.=$sub_category[$i].",";

	}

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	if($action=="save")

	{

		$sql=mysqli_query($con,"insert into property_style_details(psid,subcatid,psd_value,created_date)

				 values('".$label."','".trim($sub,",")."','".$style_name."','".$date."')");

	}

	else if($action=="update")

	{

		$date=date('Y-m-d H:i:s');

		$sql=mysqli_query($con,"update property_style_details set last_updated='".$date."',psid='".$label."',subcatid='".trim($sub,",")."',

			last_updated='".$date."',psd_value='".$style_name."' where psd_id=$id");	

	}

	echo "success";

}

if($type=="fabrics")

{

        $action=mysqli_real_escape_string($con,trim($_POST['action']));

	$fabric_name=mysqli_real_escape_string($con,trim($_POST['fabric_name']));

	$f_rand=mysqli_real_escape_string($con,trim($_POST['rand']));

	$old_image=mysqli_real_escape_string($con,trim($_POST['old_image']));

	$old_image1=mysqli_real_escape_string($con,trim($_POST['old_image1']));

	$fabric_desc=mysqli_real_escape_string($con,trim($_POST['fabric_desc']));

	$fabric_price=mysqli_real_escape_string($con,trim($_POST['fabric_price']));

	$category=$_POST['category'];

	$count=count($_FILES['default_img']['name']);

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$date=date("Y-m-d H:i:s");

		

	if($action=="save")

	{

		$ra=rand(100,999);

		if(!file_exists("../../assets/dimg/fabric/"))

		{

			mkdir('../../assets/dimg/fabric/', 0777, true);

		}

		if($_FILES['userfile']['size']!=0)

		{

			$img="";

			$type=$_FILES['userfile']['type'];

			$ext=get_image_type($type);

			$rand=$ra."_normal".$ext;

			$temp=$_FILES['userfile']['tmp_name'];

			$target="../../assets/dimg/fabric/".$rand;

			$target1="assets/dimg/fabric/".$rand;

			$img.=$target1;

			move_uploaded_file($temp,$target);

			$temp='';

			$target='';$target1='';

			$rand='';

			$ext='';						

        }

         for($a=0;$a<$count;$a++)

        {

        	

        	

        	if(!file_exists("../../assets/dimg/fabric/default/"))

					{

						mkdir('../../assets/dimg/fabric/default/', 0777, true);

					}

		       if($_FILES['default_img']['size'][$a]!=0)

				{

					$img1="";

					$type1=$_FILES['default_img']['type'][$a];

					$ext1=get_image_type($type1);

					$rand1=$ra."_normal_$a".$ext1;

					$temp1=$_FILES['default_img']['tmp_name'][$a];

					$target21="../../assets/dimg/fabric/default/".$rand1;

					$target11="assets/dimg/fabric/default/".$rand1;

					$img1.=$target11;

					move_uploaded_file($temp1,$target21);

					$temp1='';

					$target1='';

					$rand1='';

					$ext1='';

		        }		        

		       $sql=mysqli_query($con,"insert into fabric_master(fab_rand,fab_name,fab_img,fab_desc,fab_price,catid,default_img,created_date)

				 values('".$ra."','".$fabric_name."','".$img."','".$fabric_desc."','".$fabric_price."','".$category[$a]."','".$img1."','".$date."')");

				$i_id=mysqli_insert_id($con);	

				$ra=rand(100,999);      

		}

      

			

		

	}

	else if($action=="update")

	{

		if($_FILES['userfile']['size']!=0)

		{

			$img="";

			$type=$_FILES['userfile']['type'];

			$ext=get_image_type($type);

			$rand=$f_rand."_normal".$ext;

			$temp=$_FILES['userfile']['tmp_name'];

			$target="../../assets/dimg/fabric/".$rand;

			$target1="assets/dimg/fabric/".$rand;

			$img.=$target1;

			move_uploaded_file($temp,$target);

			$temp='';

			$target='';

			$rand='';

			$ext='';

		}

		else

		{

			$img=$old_image;

		}

		 if($_FILES['default_img']['size']!=0)

		{

			$img1="";

			$type1=$_FILES['default_img']['type'];

			$ext1=get_image_type($type1);

			$rand1=$f_rand."_normal".$ext1;

			$temp1=$_FILES['default_img']['tmp_name'];

			$target1="../../assets/dimg/fabric/default/".$rand1;

			$target11="assets/dimg/fabric/default/".$rand1;

			$img1.=$target11;

			move_uploaded_file($temp1,$target1);

			$temp1='';

			$target1='';

			$rand1='';

			$ext1='';

        }

        else{

        	$img1=$old_image1;

        }

		$date=date('Y-m-d H:i:s');

		$sql=mysqli_query($con,"update fabric_master set fab_name='".$fabric_name."',fab_img='".$img."',fab_desc='".$fabric_desc."',fab_price='".$fabric_price."',

			catid='".$category."',default_img='".$img1."',last_updated='".$date."' where fab_id=$id");	

	}

	echo "success";

}

if($type=="user_role")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$id=mysqli_real_escape_string($con,trim($_POST['vendor_id']));

	$vendor_name=mysqli_real_escape_string($con,trim($_POST['vendor_name']));

//	$vendor_abbr=mysqli_real_escape_string($con,trim($_POST['vendor_abbr']));

	$address1=mysqli_real_escape_string($con,trim($_POST['address1']));

	$address2=mysqli_real_escape_string($con,trim($_POST['address2']));

	$city=mysqli_real_escape_string($con,trim($_POST['city']));

	$state=mysqli_real_escape_string($con,trim($_POST['state']));

	$country=mysqli_real_escape_string($con,trim($_POST['country']));

	$zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));
	$primary_email=mysqli_real_escape_string($con,trim($_POST['primary_email']));

	$primary_phone=mysqli_real_escape_string($con,trim($_POST['primary_phone']));

	$password=mysqli_real_escape_string($con,trim($_POST['password']));

	$usertype=mysqli_real_escape_string($con,trim($_POST['usertype']));

	$username=mysqli_real_escape_string($con,trim($_POST['username']));
	$date=date("Y-m-d H:i:s");

if($action=="role_add")

{

	if($usertype=="3"){$group="3";}elseif($usertype=="4"){$group="2";}

$j_date=date("Y-m-d");

		$sql=mysqli_query($con,"insert into member (first_name,last_name,email,join_date)

			values('".$vendor_name."','".$lastname."','".$primary_email."','".$j_date."')");

		$m_id=mysqli_insert_id($con);

		$sql2=mysqli_query($con,"insert into member_group(member_id,group_id)values('".$m_id."','".$group."')");

	$sql=mysqli_query($con,"INSERT INTO `user_master`(`firstname`, `address1`, `address2`, `city`, 

		`province`, `country`, `zipcode`, `username`, `email`, `password`, `mobile`,`block`,`user_type` ,`created_date`)

	VALUES ('".$vendor_name."','".$address1."','".$address2."','".$city."','".$state."','".$country."','".$zipcode."',

		'".$username."','".$primary_email."','".$password."','".$primary_phone."',1,'".$usertype."','".$date."')");

}

elseif($action=="role_update")

{

	 $sql=mysqli_query($con,"update `user_master` SET `firstname`='".$vendor_name."',`address1`='".$address1."',

		`address2`='".$address2."',`city`='".$city."',`province`='".$state."',`country`='".$country."',

		`zipcode`='".$zipcode."',`username`='".$username."',`password`='".$password."',

		`mobile`='".$primary_phone."',last_updated='".$date."' WHERE user_id=$id");

}

}

else if($type=="pages")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$page_title=mysqli_real_escape_string($con,trim($_POST['page_title']));

	$page_desc=mysqli_real_escape_string($con,trim($_POST['page_desc']));

	$pop_title=mysqli_real_escape_string($con,trim($_POST['pop_title']));

	$pop_desc=mysqli_real_escape_string($con,trim($_POST['pop_desc']));

	$id=mysqli_real_escape_string($con,trim($_POST['page_id']));

	if($action=="page_add")

	{

		$sql=mysqli_query($con,"insert into page_content(page_title,page_desc) values('".$page_title."','".$page_desc."')");

	}

	else if($action=="page_update")

	{

		$sql=mysqli_query($con,"update page_content set page_desc='".$page_desc."' where id=$id");	

		$sql1=mysqli_query($con,"update page_content set page_title='".$pop_title."',page_desc='".$pop_desc."'

		 where id=9");	

	}

	echo "success";

}

else if($type=="discounts")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$code_name=mysqli_real_escape_string($con,trim($_POST['code_name']));

	$dis_type=mysqli_real_escape_string($con,trim($_POST['discount_type']));

	$op="";

	$discount_amount=isset($_POST['discount_amount']) ? 

				mysqli_real_escape_string($con,trim($_POST['discount_amount'])) : 0;

	$discount_percentage=mysqli_real_escape_string($con,trim($_POST['discount_percentage']));

	$order_type=mysqli_real_escape_string($con,trim($_POST['order_type']));

	$order_amount=isset($_POST['order_amount']) ? mysqli_real_escape_string($con,trim($_POST['order_amount'])) : 0;

	$order_products=isset($_POST['order_products']) ? $_POST['order_products'] : "";

	if(isset($_POST['order_products']))

	{

		for($i=0;$i<count($_POST['order_products']);$i++)

		{

			$op.=$_POST['order_products'][$i].",";

		}

	}

	else

	{

		$op="";

	}

	$start_date=date('Y-m-d H:i:s',strtotime($_POST['start_date']));

	$end_date=date('Y-m-d H:i:s',strtotime($_POST['end_date']));

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$date=date('Y-m-d H:i:s');

	if($action=="save")

	{

		 $sql=mysqli_query($con,"insert into discounts(code_name,discount_type,discount_amount,discount_percentage,orders_on,over_amount,product_name,start_date,end_date,date) 

		values('".$code_name."','".$dis_type."','".$discount_amount."','".$discount_percentage."','".$order_type."',

			'".$order_amount."','".trim($op,",")."','".$start_date."','".$end_date."','".$date."')");

	}

	else if($action=="update")

	{

		if($dis_type=="$"){$amt=$discount_amount;}else{$amt="";}

		if($dis_type=="Discount"){$per=$discount_percentage;}else{$per="";}

		if($order_type=="Over"){$o_amt=$order_amount;}else{$o_amt="";}

		if($order_type=="Specific"){$sp=trim($op,",");}else{$sp="";}

		$date=date('Y-m-d H:i:s');

		$sql=mysqli_query($con,"update discounts set code_name='".$code_name."',discount_type='".$dis_type."',

			discount_amount='".$amt."',discount_percentage='".$per."',orders_on='".$order_type."',

			over_amount='".$o_amt."',product_name='".$sp."',start_date='".$start_date."',end_date='".$end_date."',

			date='".$date."' where id=$id");	

	}

	echo "success"; 

}

if($type=="banner")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$title=mysqli_real_escape_string($con,trim($_POST['title']));

	$desc=mysqli_real_escape_string($con,trim($_POST['desc']));

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$old_image=mysqli_real_escape_string($con,trim($_POST['old_image']));

	//echo $_FILES['userfile']['name'];

	

	if(!file_exists("../../uploads/banner/"))

	{

		mkdir("../../uploads/banner/",0777,true);

	}

	

	if($_FILES['userfile']['size']!=0)

		{

			$img="";

			$type=$_FILES['userfile']['type'];

			$ext=get_image_type($type);

			$rand=$id."_".time()."_".$_FILES['userfile']['name'];

			$temp=$_FILES['userfile']['tmp_name'];

			$target="../../uploads/banner/".$rand;

			$target1="uploads/banner/".$rand;

			$img.=$target1;

			move_uploaded_file($temp,$target);

			$temp='';

			$target='';

			$rand='';

			$ext='';

		}

		else

		{

			$img=$old_image;

		}

	if($action=="save")

	{

		$sql=mysqli_query($con,"insert into banner_master(banner_title,banner_desc,banner_img,created_date) 

				values('".$title."','".$desc."','".$img."',NOW())");

	}

	else if($action=="update")

	{

		$sql=mysqli_query($con,"update banner_master set banner_title='".$title."',banner_desc='".$desc."',

    	banner_img='".$img."',last_updated=NOW() where b_id=$id");	

	}

	echo "success";

}

if($type=="update_order")

{

	$id=$_POST['id'];

	$val=$_POST['val'];

	$carrier=$_POST['carrier'];

	$track=$_POST['track'];

	$amount = $_POST['amount'];

	$refund_amount = $_POST['refund_amount'];

	$sql=mysqli_query($con,"update order_master set order_status='".$val."',

	carrier_name='".$carrier."',track_id='".$track."' where order_id='$id'");

		

	if($val=='Shipped')

	{

		$sql=mysqli_query($con,"select a.email from user_master a,order_master b 

			where a.user_id=b.userid and b.order_id='$id'");

		$r=mysqli_fetch_array($sql);

		$email=$r['email'];

		$message="Your order ".$id." has been shipped by ".$carrier." and tracking ID id ".$track.".";

		$subject="Order Shipped";

		$headers = "From: Custom Clothiers <info@dccustom.com> \r\n";

		$headers .= "MIME-Version: 1.0\r\n";

		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		mail($email,$subject,$message,$headers);

	}

	else if($val=='Refunded')

	{

		$user_sql=mysqli_query($con,"select a.email from user_master a,order_master b 

			where a.user_id=b.userid and b.order_id='$id'");

		$date=date('Y-m-d H:i:s');

		$sql=mysqli_query($con,"insert into refund_order_master(order_id,refund_amount,created_date,last_updated)
        values('".$id."','".$refund_amount."','".$date."','".$date."')");

        $r=mysqli_fetch_array($user_sql);

		$email=$r['email'];

		$message="Your order ".$id." has been refunded successfully. Your Refunded Amount is $ ".$refund_amount."";

		$subject="Order Refund";

		$headers = "From: Custom Clothiers <info@dccustom.com> \r\n";

		$headers .= "MIME-Version: 1.0\r\n";

		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		mail($email,$subject,$message,$headers);


	}

}

if($type=="showroom")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$id=mysqli_real_escape_string($con,trim($_POST['id']));
	$old_image=mysqli_real_escape_string($con,trim($_POST['old_image']));
	$title=mysqli_real_escape_string($con,trim($_POST['title']));
	$address=mysqli_real_escape_string($con,trim($_POST['address']));
	$email=mysqli_real_escape_string($con,trim($_POST['email']));
	$mon_sel=mysqli_real_escape_string($con,trim($_POST['mon_sel']));
	$tue_sel=mysqli_real_escape_string($con,trim($_POST['tue_sel']));
	$wed_sel=mysqli_real_escape_string($con,trim($_POST['wed_sel']));
	$thu_sel=mysqli_real_escape_string($con,trim($_POST['thu_sel']));
	$fri_sel=mysqli_real_escape_string($con,trim($_POST['fri_sel']));
	$sat_sel=mysqli_real_escape_string($con,trim($_POST['sat_sel']));
	$sun_sel=mysqli_real_escape_string($con,trim($_POST['sun_sel']));
	$monday_start=mysqli_real_escape_string($con,trim($_POST['monday_start']));
	$monday_close=mysqli_real_escape_string($con,trim($_POST['monday_close']));
	$tuesday_start=mysqli_real_escape_string($con,trim($_POST['tuesday_start']));
	$tuesday_close=mysqli_real_escape_string($con,trim($_POST['tuesday_close']));
	$wednesday_start=mysqli_real_escape_string($con,trim($_POST['wednesday_start']));
	$wednesday_close=mysqli_real_escape_string($con,trim($_POST['wednesday_close']));
	$thursday_start=mysqli_real_escape_string($con,trim($_POST['thursday_start']));
	$thursday_close=mysqli_real_escape_string($con,trim($_POST['thursday_close']));
	$friday_start=mysqli_real_escape_string($con,trim($_POST['friday_start']));
	$friday_close=mysqli_real_escape_string($con,trim($_POST['friday_close']));
	$saturday_start=mysqli_real_escape_string($con,trim($_POST['saturday_start']));
	$saturday_close=mysqli_real_escape_string($con,trim($_POST['saturday_close']));
	$sunday_start=mysqli_real_escape_string($con,trim($_POST['sunday_start']));
	$sunday_close=mysqli_real_escape_string($con,trim($_POST['sunday_close']));
	if($mon_sel=="0"){$monday=$monday_start." - ".$monday_close;}else{$monday="Closed";}
	if($tue_sel=="0"){$tuesday=$tuesday_start." - ".$tuesday_close;}else{$tuesday="Closed";}
	if($wed_sel=="0"){$wednesday=$wednesday_start." - ".$wednesday_close;}else{$wednesday="Closed";}
	if($thu_sel=="0"){$thursday=$thursday_start." - ".$thursday_close;}else{$thursday="Closed";}
	if($fri_sel=="0"){$friday=$friday_start." - ".$friday_close;}else{$friday="Closed";}
	if($sat_sel=="0"){$saturday=$saturday_start." - ".$saturday_close;}else{$saturday="Closed";}
	if($sun_sel=="0"){$sunday=$sunday_start." - ".$sunday_close;}else{$sunday="Closed";}
	$image=$_FILES['userfile']['tmp_name'];
    $ratio=getimagesize($image);
	$date=date("Y-m-d H:i:s");
	
 	if(!file_exists("../../uploads/showrooms/"))
	{
		mkdir("../../uploads/showrooms/",0777,true);
	}
	if($_FILES['userfile']['size']!='0')
	{
		$img="";
		$type=$_FILES['userfile']['type'];
		$ext=get_image_type($type);
		$rand=$id."_".time()."_".$_FILES['userfile']['name'];
		$temp=$_FILES['userfile']['tmp_name'];
		$target="../../uploads/showrooms/".$rand;
		$target1="uploads/showrooms/".$rand;
		$img.=$target1;
		move_uploaded_file($temp,$target);
		$temp='';
		$target='';
		$rand='';
		$ext='';
	}
	else
	{
		$img=$old_image;
	}

	if($action=="save")

	{

		$sql=mysqli_query($con,"INSERT INTO `showroom_master`(`sr_title`,`sr_email`,`sr_image`,

		 `sr_address`,`sr_monday`, `sr_tuesday`, `sr_wednesday`, `sr_thursday`, `sr_friday`,

		  `sr_saturday`, `sr_sunday`,`created_date`) VALUES ('".$title."','".$email."','".$img."',

		  '".$address."','".$monday."','".$tuesaday."','".$wednesday."','".$thursday."','".$friday."',

		  '".$saturday."','".$sunday_start."','".$date."')");

	}

	if($action=="update")

	{

		$sql=mysqli_query($con,"UPDATE `showroom_master` SET `sr_title`='".$title."',

			`sr_email`='".$email."',`sr_image`='".$img."',`sr_address`='".$address."',

			`sr_monday`='".$monday."',`sr_tuesday`='".$tuesday."',`sr_wednesday`='".$wednesday."',

			`sr_thursday`='".$thursday."',`sr_friday`='".$friday."',`sr_saturday`='".$saturday."',

			`sr_sunday`='".$sunday."',`last_updated`='".$date."' WHERE sr_id=$id");

	}

}

if($type=="faqs")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

    $title=mysqli_real_escape_string($con,trim($_POST['title']));

	$description=mysqli_real_escape_string($con,trim($_POST['description']));

	if($action=="save")

	{

		$sql=mysqli_query($con,"INSERT INTO `faqs_master`(`f_title`, `f_desc`,`created_date`)

		 VALUES ('".$title."','".$description."','".$date."')");

	}

	if($action=="update")

	{

		$sql=mysqli_query($con,"UPDATE `faqs_master` SET `f_title`='".$title."',

		`f_desc`='".$description."',`last_updated`='".$date."' WHERE f_id=$id");

	}

}

if($type=="works")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$old_image=mysqli_real_escape_string($con,trim($_POST['old_image']));

	$title=mysqli_real_escape_string($con,trim($_POST['title']));

	$desc=mysqli_real_escape_string($con,trim($_POST['desc']));

	$image=$_FILES['userfile']['tmp_name'];

	$ratio=getimagesize($image);

    $date=date("Y-m-d H:i:s");

	//$old_image="";

	if(!file_exists("../../uploads/works/"))

	{

		mkdir("../../uploads/works/",0777,true);

	}

	if($_FILES['userfile']['size']!=0)

		{

		/*	if($ratio[0] <= 400 && $ratio[1] <= 400)

			{*/

				$img="";

				$type=$_FILES['userfile']['type'];

				$ext=get_image_type($type);

				$rand=time()."_".$_FILES['userfile']['name'];

				$temp=$_FILES['userfile']['tmp_name'];

				$target="../../uploads/works/".$rand;

				$target1="uploads/works/".$rand;

				$img.=$target1;

				move_uploaded_file($temp,$target);

				$temp='';

				$target='';

				$rand='';

				$ext='';

		/*	}

			else

			{

				echo "img_fail";

			}*/

		}

		else

		{

			$img=$old_image;

		}

	if($action=="save")

	{

		$sql=mysqli_query($con,"INSERT INTO `works_master`(`w_title`, `w_image`, `w_desc`,`created_date`)

		 VALUES ('".$title."','".$img."','".$desc."','".$date."')");

	}

	if($action=="update")

	{

		$sql=mysqli_query($con,"UPDATE `works_master` SET `w_title`='".$title."',

			`w_image`='".$img."',`w_desc`='".$desc."',`last_updated`='".$date."' WHERE w_id=$id");

	}

}

if($type=="why-us")
{
	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$id=mysqli_real_escape_string($con,trim($_POST['id']));
	$old_image=mysqli_real_escape_string($con,trim($_POST['old_image']));
	$title=mysqli_real_escape_string($con,trim($_POST['title']));
	$desc=mysqli_real_escape_string($con,trim($_POST['desc']));
	$image=$_FILES['userfile']['tmp_name'];
	$ratio=getimagesize($image);
  $date=date("Y-m-d H:i:s");
	//$old_image="";
	if(!file_exists("../../uploads/whyus/"))
	{
		mkdir("../../uploads/whyus/",0777,true);
	}
	if($_FILES['userfile']['size']!=0)
	{
		/*	if($ratio[0] <= 400 && $ratio[1] <= 400)
			{*/
				$img="";
				$type=$_FILES['userfile']['type'];
				$ext=get_image_type($type);
				$rand=time()."_".$_FILES['userfile']['name'];
				$temp=$_FILES['userfile']['tmp_name'];
				$target="../../uploads/whyus/".$rand;
				$target1="uploads/whyus/".$rand;
				$img.=$target1;
				move_uploaded_file($temp,$target);
				$temp='';$target='';$rand='';$ext='';
			/*}
			else
			{
				echo "img_fail";
			}*/
		}
		else
		{
			$img=$old_image;
		}
	if($action=="save")
	{
		$sql=mysqli_query($con,"INSERT INTO `whyus_master`(`w_title`, `w_image`, `w_desc`,`created_date`)
		 VALUES ('".$title."','".$img."','".$desc."','".$date."')");
	}
	if($action=="update")
	{
		$sql=mysqli_query($con,"UPDATE `whyus_master` SET `w_title`='".$title."',
			`w_image`='".$img."',`w_desc`='".$desc."',`last_updated`='".$date."' WHERE w_id=$id");
	}
}

if($type=="gallery")
{
	$action=mysqli_real_escape_string($con,trim($_POST['action']));
	$id=mysqli_real_escape_string($con,trim($_POST['id']));
	$old_image=mysqli_real_escape_string($con,trim($_POST['old_image']));
	$title=mysqli_real_escape_string($con,trim($_POST['title']));
	$desc=mysqli_real_escape_string($con,trim($_POST['desc']));
	$image=$_FILES['userfile']['tmp_name'];
	$ratio=getimagesize($image);
  $date=date("Y-m-d H:i:s");
	//$old_image="";
	if(!file_exists("../../uploads/gallery/"))
	{
		mkdir("../../uploads/gallery/",0777,true);
	}
	if($_FILES['userfile']['size']!=0)
	{
		/*	if($ratio[0] <= 400 && $ratio[1] <= 400)
			{*/
				$img="";
				$type=$_FILES['userfile']['type'];
				$ext=get_image_type($type);
				$rand=time()."_".$_FILES['userfile']['name'];
				$temp=$_FILES['userfile']['tmp_name'];
				$target="../../uploads/gallery/".$rand;
				$target1="uploads/gallery/".$rand;
				$img.=$target1;
				move_uploaded_file($temp,$target);
				$temp='';$target='';$rand='';$ext='';
			/*}
			else
			{
				echo "img_fail";
			}*/
		}
		else
		{
			$img=$old_image;
		}
	if($action=="save")
	{
		$sql=mysqli_query($con,"INSERT INTO `gallery_master`(`w_title`, `w_image`, `w_desc`,`created_date`)
		 VALUES ('".$title."','".$img."','".$desc."','".$date."')");
	}
	if($action=="update")
	{
		$sql=mysqli_query($con,"UPDATE `gallery_master` SET `w_title`='".$title."',
			`w_image`='".$img."',`w_desc`='".$desc."',`last_updated`='".$date."' WHERE w_id=$id");
	}
}


if($type=="wedding")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$old_image=mysqli_real_escape_string($con,trim($_POST['old_image']));

	$title=mysqli_real_escape_string($con,trim($_POST['title']));

	$desc=mysqli_real_escape_string($con,trim($_POST['desc']));

	$image=$_FILES['userfile']['tmp_name'];

	$ratio=getimagesize($image);

    $date=date("Y-m-d H:i:s");

	//$old_image="";

	if(!file_exists("../../uploads/wedding/"))

	{

		mkdir("../../uploads/wedding/",0777,true);

	}

	if($_FILES['userfile']['size']!=0)

		{

		/*	if($ratio[0] <= 400 && $ratio[1] <= 400)

			{*/

				$img="";

				$type=$_FILES['userfile']['type'];

				$ext=get_image_type($type);

				$rand=time()."_".$_FILES['userfile']['name'];

				$temp=$_FILES['userfile']['tmp_name'];

				$target="../../uploads/wedding/".$rand;

				$target1="uploads/wedding/".$rand;

				$img.=$target1;

				move_uploaded_file($temp,$target);

				$temp='';

				$target='';

				$rand='';

				$ext='';

		/*	}

			else

			{

				echo "img_fail";

			}*/

		}

		else

		{

			$img=$old_image;

		}

	if($action=="save")

	{

		$sql=mysqli_query($con,"INSERT INTO `wedding_master`(`w_title`, `w_image`, `w_desc`,`created_date`)

		 VALUES ('".$title."','".$img."','".$desc."','".$date."')");

	}

	if($action=="update")

	{

		$sql=mysqli_query($con,"UPDATE `wedding_master` SET `w_title`='".$title."',

			`w_image`='".$img."',`w_desc`='".$desc."',`last_updated`='".$date."' WHERE w_id=$id");

	}

}





if($type=="wedding_banner")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$old_image=mysqli_real_escape_string($con,trim($_POST['old_image']));

	

	$image=$_FILES['userfile']['tmp_name'];

	$ratio=getimagesize($image);

    $date=date("Y-m-d H:i:s");

	//$old_image="";

	if(!file_exists("../../uploads/wedding_banner/"))

	{

		mkdir("../../uploads/wedding_banner/",0777,true);

	}

	if($_FILES['userfile']['size']!=0)

		{

		/*	if($ratio[0] <= 400 && $ratio[1] <= 400)

			{*/

				$img="";

				$type=$_FILES['userfile']['type'];

				$ext=get_image_type($type);

				$rand=time()."_".$_FILES['userfile']['name'];

				$temp=$_FILES['userfile']['tmp_name'];

				$target="../../uploads/wedding_banner/".$rand;

				$target1="uploads/wedding_banner/".$rand;

				$img.=$target1;

				move_uploaded_file($temp,$target);

				$temp='';

				$target='';

				$rand='';

				$ext='';

		/*	}

			else

			{

				echo "img_fail";

			}*/

		}

		else

		{

			$img=$old_image;

		}

	if($action=="save")

	{

		$sql=mysqli_query($con,"INSERT INTO `wedding_banner_master`(`w_image`,`created_date`)

		 VALUES ('".$img."','".$date."')");

	}

	if($action=="update")

	{

		$sql=mysqli_query($con,"UPDATE `wedding_banner_master` SET 

			`w_image`='".$img."',`last_updated`='".$date."' WHERE w_id=$id");

	}

}

if($type=="order-received-form")

{

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$old_image=mysqli_real_escape_string($con,trim($_POST['old_image']));

	$title=mysqli_real_escape_string($con,trim($_POST['ord_reciv_succ_msg']));

	$desc=mysqli_real_escape_string($con,trim($_POST['ord_desc']));

	$image=$_FILES['ord_banner_image']['tmp_name'];

	$ratio=getimagesize($image);

    $date=date("Y-m-d H:i:s");

	//$old_image="";

	if(!file_exists("../../uploads/ord-banner-image/"))

	{

		mkdir("../../uploads/ord-banner-image/",0777,true);

	}

	if($_FILES['ord_banner_image']['size']!=0)

		{

		/*	if($ratio[0] <= 400 && $ratio[1] <= 400)

			{*/

				$img="";

				$type=$_FILES['ord_banner_image']['type'];

				$ext=get_image_type($type);


				$rand=time()."_".$_FILES['ord_banner_image']['name'];

				$temp=$_FILES['ord_banner_image']['tmp_name'];

				$target="../../uploads/ord-banner-image/".$rand;

				$target1="uploads/ord-banner-image/".$rand;

				$img.=$target1;

				if($old_image!='')
				  unlink("../../".$old_image."");

				move_uploaded_file($temp,$target);

				$temp='';

				$target='';

				$rand='';

				$ext='';

		/*	}

			else

			{

				echo "img_fail";

			}*/

		}

		else

		{

			$img=$old_image;

		}

	if($action=="save")

	{

		$sql=mysqli_query($con,"INSERT INTO `order_received_master`(`ord_title`, `ord_image`, `ord_desc`,`created_date`)

		 VALUES ('".$title."','".$img."','".$desc."','".$date."')");

	}

	if($action=="update")

	{

		$sql=mysqli_query($con,"UPDATE `order_received_master` SET `ord_title`='".$title."',

			`ord_image`='".$img."',`ord_desc`='".$desc."',`last_updated`='".$date."' WHERE id=$id");

	}

}

if($type=="measurement")

{

	$id=mysqli_real_escape_string($con,trim($_POST['m_id']));

	$title=mysqli_real_escape_string($con,trim($_POST['title']));

	$height=mysqli_real_escape_string($con,trim($_POST['height']));

	$weight=mysqli_real_escape_string($con,trim($_POST['weight']));

	$param_chest=mysqli_real_escape_string($con,trim($_POST['param_chest']));

	$param_abdomen=mysqli_real_escape_string($con,trim($_POST['param_abdomen']));

	$param_buttocks=mysqli_real_escape_string($con,trim($_POST['param_buttocks']));

	$param_hip=mysqli_real_escape_string($con,trim($_POST['param_hip']));

	$field_value=$_POST['field']['value'];

	$field_name=$_POST['field']['name'];	



	for($i=0;$i<count($field_name);$i++)

	{

		//if($field_value[$i]!='')

		//

		$a=$field_name[$i];

		if($field_value[$i]!='')

			$b=$field_value[$i];

		else

			$b=0;

		$sql1=mysqli_query($con,"update measurement_profile_value set mpf_value='".$b."' where mpfid=$a");

		//}

	}



	//echo "<pre>";print_r($_POST);

	 $sql=mysqli_query($con,"update measurement_profile_master set 

		mp_name='".$title."',mp_height='".$height."',mp_weight='".$weight."',mp_chest='".$param_chest."',

		mp_abdomen='".$param_abdomen."',mp_buttocks='".$param_buttocks."',mp_hips='".$param_hip."'

		where mp_id=$id");

	

}

if($type=="measurement_add")

{

	$userid=mysqli_real_escape_string($con,trim($_POST['user_id']));

	$title=mysqli_real_escape_string($con,trim($_POST['title']));

	$height=mysqli_real_escape_string($con,trim($_POST['height']));

	$weight=mysqli_real_escape_string($con,trim($_POST['weight']));

	$param_chest=mysqli_real_escape_string($con,trim($_POST['param_chest']));

	$param_abdomen=mysqli_real_escape_string($con,trim($_POST['param_abdomen']));

	$param_buttocks=mysqli_real_escape_string($con,trim($_POST['param_buttocks']));

	$param_hip=mysqli_real_escape_string($con,trim($_POST['param_hip']));

	$field_value=$_POST['field']['value'];

	$field_name=$_POST['field']['name'];



	 $sql=mysqli_query($con,"insert into measurement_profile_master(`mp_userid`, `mp_name`,

	 `mp_height`, `mp_weight`, `mp_chest`, `mp_abdomen`, `mp_buttocks`, `mp_hips`,`gender`, `created_date`)

	values('".$userid."','".$title."','".$height."','".$weight."','".$param_chest."','".$param_abdomen."',

		'".$param_buttocks."','".$param_hip."','Male',NOW())");

	  $mpid=mysqli_insert_id($con);



	for($i=0;$i<count($field_value);$i++)

	{

		if($field_value[$i]!='')

		{

			$a=$field_name[$i];

			$b=$field_value[$i];

		}

		else

		{

			$a=$field_name[$i];

			$b='0';

			

		}

		$sql1=mysqli_query($con,"insert into measurement_profile_value(userid,mpid,mpfid,mpf_value)

				values('".$userid."','".$mpid."','".$a."','".$b."')");

	}

}

if($type=="update_mp")

{

	$oid=$_POST['oid'];

	$id=$_POST['id'];

	$sql=mysqli_query($con,"update order_master set mpid=$id where om_id=$oid");

}

if($type=="users")

{

	$user_id=mysqli_real_escape_string($con,trim($_POST['user_id']));

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$email=mysqli_real_escape_string($con,trim($_POST['email']));

	$password=mysqli_real_escape_string($con,trim($_POST['password']));

	$mobile=mysqli_real_escape_string($con,trim($_POST['mobile']));

	$firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));

	$lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));

	$address1=mysqli_real_escape_string($con,trim($_POST['address1']));

	$address2="";

	$city=mysqli_real_escape_string($con,trim($_POST['city']));

	$province=mysqli_real_escape_string($con,trim($_POST['state']));

	$country=mysqli_real_escape_string($con,trim($_POST['country']));

	$zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));

	$username=substr($firstname, 0,3).substr($lastname, 0,3).rand(0,99999);

	$hash=md5(uniqid(rand(), true));

	$j_date=date('Y-m-d');

	$old_image_1=mysqli_real_escape_string($con,trim($_POST['old_image_1']));

	$old_image_2=mysqli_real_escape_string($con,trim($_POST['old_image_2']));

	$old_image_3=mysqli_real_escape_string($con,trim($_POST['old_image_3']));



	



	if($action=="save")

	{

		 $sql=mysqli_query($con,"insert into user_master(firstname,lastname,username,mobile,email,

		 	password,address1,address2,city,province,country,zipcode,user_type,hash_token,created_date)

			values('".$firstname."','".$lastname."','".$username."','".$mobile."','".$email."',

			'".$password."','".$address1."','".$address2."','".$city."','".$province."','".$country."',

			'".$zipcode."',2,'".$hash."',NOW())");

		 $user_id=mysqli_insert_id($con);

		$sql1=mysqli_query($con,"insert into member (first_name,last_name,email,join_date)

			values('".$firstname."','".$lastname."','".$email."','".$j_date."')");

		$m_id=mysqli_insert_id($con);

		$sql2=mysqli_query($con,"insert into member_group(member_id,group_id)values('".$m_id."','4')");

			$message="Thanks for registering.<br>Please <a href='".$homeurl."includes/action/action.php?activate=".$hash."'>click here</a> to activate your account.";

		$subject="Registration Success";

		$headers = "From: Custom Clothiers <info@dccustom.com> \r\n";

		$headers .= "MIME-Version: 1.0\r\n";

		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		mail($email,$subject,$message,$headers);

			

	}

	elseif($action=="update")

	{

		$sql=mysqli_query($con,"update user_master set firstname='".$firstname."',lastname='".$lastname."',mobile='".$mobile."',email='".$email."',password='".$password."',address1='".$address1."',
			address2='".$address2."',city='".$city."',last_updated=NOW(),province='".$province."',
			country='".$country."',zipcode='".$zipcode."' where user_id=$user_id");

	}



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

	else{$img1=$old_image_1;}

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

	else{$img2=$old_image_2;}

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

	else{$img3=$old_image_3;}



	$img_up=mysqli_query($con,"update user_master set last_updated='".$date."',img='".$img1."',img2='".$img2."',

		img3='".$img3."' where user_id='".$user_id."'");



}

elseif($type=="seo_add")

{

	$page_name=mysqli_real_escape_string($con,trim($_POST['page_name']));

	$page_title=mysqli_real_escape_string($con,trim($_POST['page_title']));

	$keyword=mysqli_real_escape_string($con,trim($_POST['keyword']));

	$desc=mysqli_real_escape_string($con,trim($_POST['desc']));

	$sql=mysqli_query($con,"select * from seo_master where sm_page='".$page_name."'");

	if(mysqli_num_rows($sql) > 0)

	{

		$sql1=mysqli_query($con,"update seo_master set sm_page_title='".$page_title."',

			sm_keyword='".$keyword."',sm_description='".$desc."',last_updated=NOW() where sm_page='".$page_name."'");

	}

	else

	{

		$sql1=mysqli_query($con,"insert into seo_master(sm_page,sm_page_title,sm_keyword,sm_description,

			created_date) values('".$page_name."','".$page_title."','".$keyword."','".$desc."',NOW())");

	}

}

if($type=="del_cart1")

{

	$id=$_POST['id'];
	$order_id = $_POST['order_id'];
	$r_count = $_POST['r_count'];
	$userid=$_POST['userid'];

	
	 $sql=mysqli_query($con,"delete from order_master where om_id=$id");
	
	if($r_count==1)
    {
	   $sql12=mysqli_query($con,"delete from order_id_generate where order_id='$order_id'");

	   $sql1=mysqli_query($con,"delete from coupon_applied where userid='".$userid."' and status=0");
		$query = mysqli_query($con,"select * from gift_card_applied where userid='".$userid."' and status=0");
		$r=mysqli_fetch_array($query);
		/*while ($r=mysqli_fetch_array($query))
		{*/
			$amount = $r['amount'];$gid=$r['gcid'];
			$bal = mysqli_query($con,"select * from gift_card_master where gc_id=$gid");
			$balance = mysqli_fetch_array($bal);
			$net_amt = $balance['balance'];
			$org_amt = $net_amt + $amount;
			$up_gift = mysqli_query($con,"update gift_card_master set balance='$org_amt' where gc_id=$gid");
			$sql2=mysqli_query($con,"delete from gift_card_applied where gcid=$gid");
    }

}

if($type=="del_mp")

{

	$id=$_POST['id'];

	$sql=mysqli_query($con,"delete from measurement_profile_master where mp_id=$id");

}

else if($type=="get_seo")

{

	$res=array();

	$val=$_POST['val'];

	$sql=mysqli_query($con,"select * from seo_master where sm_page='".$val."'");

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

		echo json_encode($res);

	}

	else

	{

		return 0;

	}

}

elseif($type=="contact")

{

	$email=mysqli_real_escape_string($con,trim($_POST['email']));

	$phone=mysqli_real_escape_string($con,trim($_POST['phone']));

	$fax=mysqli_real_escape_string($con,trim($_POST['fax']));

	$street1=mysqli_real_escape_string($con,trim($_POST['street1']));

	$street2=mysqli_real_escape_string($con,trim($_POST['street2']));

	$city=mysqli_real_escape_string($con,trim($_POST['city']));

	$state=mysqli_real_escape_string($con,trim($_POST['state']));

	$zipcode=mysqli_real_escape_string($con,trim($_POST['zipcode']));

	$country=mysqli_real_escape_string($con,trim($_POST['country']));

	$sql=mysqli_query($con,"update contact_master set cm_email='".$email."',cm_phone='".$phone."',

	cm_fax='".$fax."',cm_street1='".$street1."',cm_street2='".$street2."',cm_city='".$city."',

	cm_state='".$state."',cm_zipcode='".$zipcode."',cm_country='".$country."',last_updated=NOW()

	 WHERE cm_id=1");

}

elseif ($type=="note")

 {



 	$oid=$_POST['order_id'];

 	$desc=$_POST['desc'];

 	$old_image=$_POST['old_image'];



 	if ($_FILES['userfile']['size']!=0) 

	{ 

		$tmp=$_FILES['userfile']['tmp_name'];

		if(!file_exists("../../uploads/notes/"))

		{

			mkdir("../../uploads/notes/",0777,true);

		}

		$img="uploads/notes/".$_FILES['userfile']['name'];

		$dir="../../uploads/notes/".$_FILES['userfile']['name'];

		move_uploaded_file($tmp, $dir);

	}

	else{$img=$old_image;}



 	$sql=mysqli_query($con,"update order_history_master set notes='".$desc."',attachment='".$img."'

 	 where orderid='$oid'");

}

elseif ($type=="get_note")

 {

 	$oid=$_POST['val'];

 	$sql=mysqli_query($con,"select notes,attachment from order_history_master where orderid='$oid'");

 	$r=mysqli_fetch_array($sql);

 	$img = explode(".",$r['attachment']);

 	$img_name = explode("/",$r['attachment']);

 	if(end($img)=="jpg" || end($img)=="gif" || end($img)=="jpeg" || end($img)=="png")

 	{

 		$att="<img src='".$homeurl.$r['attachment']."' style='height:100px;width:100px;'>";

 	}

 	else if(end($img)=="pdf")

 	{

 		$att="<a target='_blank' href='".$homeurl.$r['attachment']."'><img src='../../assets/images/pdf.png'><br>

 		".$img_name[2]."</a>";

 	}

 	else if(end($img)=="doc" || end($img)=="docx")

 	{

 		$att="<a target='_blank' href='".$homeurl.$r['attachment']."'><img src='../../assets/images/word.jpg'><br>

 		".$img_name[2]."</a>";

 	}

 	else if(end($img)=="xlsx" || end($img)=="xls")

 	{

 		$att="<a target='_blank' href='".$homeurl.$r['attachment']."'><img src='../../assets/images/excel.png'>

 		<br>".$img_name[2]."</a>";

 	}

 	else if(end($img)=="txt")

 	{

 		$att="<a target='_blank' href='".$homeurl.$r['attachment']."'><img src='../../assets/images/text.png'>

 		<br>".$img_name[2]."</a>";

 	}

 	echo $r['notes']."@@@".$att."@@@".$r['attachment'];

}

else if($type=="review")

{

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$email=mysqli_real_escape_string($con,trim($_POST['email']));

	$name=mysqli_real_escape_string($con,trim($_POST['name']));

	$title=mysqli_real_escape_string($con,trim($_POST['title']));

	$description=mysqli_real_escape_string($con,trim($_POST['desc']));

	$rating=mysqli_real_escape_string($con,trim($_POST['rating']));

	$category=mysqli_real_escape_string($con,trim($_POST['category']));

	$product=mysqli_real_escape_string($con,trim($_POST['product']));

	$state=mysqli_real_escape_string($con,trim($_POST['state']));

	$city=mysqli_real_escape_string($con,trim($_POST['city']));

	$sql=mysqli_query($con,"update reviews set subcatid='".$category."',name='".$name."',email='".$email."',title='".$title."',state='".$state."',city='".$city."',

		description='".$description."',score='".$rating."',pid='".$product."' where r_id='".$id."'");

}

else if($type=="fields")

{

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$label_name=mysqli_real_escape_string($con,trim($_POST['label_name']));

	if($action=="save")

	{

		$sql=mysqli_query($con,"insert into measurement_profile_fields(labelname,status,created_date)

			value('".$label_name."',1,NOW())");

	}

	else if($action=="update")

	{

	$sql=mysqli_query($con,"update measurement_profile_fields set labelname='".$label_name."',

		last_updated=NOW() where mpf_id='".$id."'");

	}

}



else if($type=="payment")

{

	$paypal_id=mysqli_real_escape_string($con,trim($_POST['paypal_id']));

	$payment_mode=mysqli_real_escape_string($con,trim($_POST['payment_mode']));

	$cash_delivery=mysqli_real_escape_string($con,trim($_POST['cash_delivery']));

	$in_store=mysqli_real_escape_string($con,trim($_POST['in_store']));

	$shipping_cost=mysqli_real_escape_string($con,trim($_POST['shipping_cost']));

	$ship_price=mysqli_real_escape_string($con,trim($_POST['ship_price']));

	$tax_state=mysqli_real_escape_string($con,trim($_POST['tax_state']));

	$tax_per=mysqli_real_escape_string($con,trim($_POST['tax_per']));



	$price= $shipping_cost ? "0" : $ship_price;

	$sql=mysqli_query($con,"update payment_information set  paypal_id='".$paypal_id."',

		payment_mode='".$payment_mode."',cash_on_delivery='".$cash_delivery."',

		in_store_credit='".$in_store."',shipping_cost='".$price."' where pi_id=1");





	$sql1=mysqli_query($con,"select * from tax_master where t_state='$tax_state'");

	if(mysqli_num_rows($sql1))

	{

		$sql2=mysqli_query($con,"update tax_master set t_percent=$tax_per where t_state='$tax_state'");

	}

	else

	{

		$sql2=mysqli_query($con,"insert into tax_master(t_state,t_percent,created_date)

			values('".$tax_state."','".$tax_per."',NOW())");

	}



}





else if($type=="colors")

{

	$subcat=$_POST['subcat_name'];

	$style=$_POST['style_name'];

	$name=implode(",",$_POST['color_name']);

    $style_id=$_POST['style_id'];

	$value=implode(",",$_POST['color_value']);

	$colimg=$_FILES['col_img']['name'];

	$old_image=$_POST['old_image'];

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$img="";

	$path="../../assets/custom_colors/";

	$path1="assets/custom_colors/";

	if(!file_exists($path))

	{

		mkdir($path,0777,true);

	}

	for ($k=0; $k <count($_POST['color_name']) ; $k++) 

	{ 

		if($_FILES['col_img']['size'][$k]!=0)

		{

			$type=$_FILES['col_img']['type'][$k];

			$ext=get_image_type($type);

			$rand=time()."_".$_FILES['col_img']['name'][$k];

			$temp=$_FILES['col_img']['tmp_name'][$k];

			$target=$path.$rand;

			$target1=$path1.$rand;

			$img.=$target1.",";

			move_uploaded_file($temp,$target);

			$temp='';

			$target='';

			$rand='';

			$ext='';

		}

		else

		{

			$img.=$old_image[$k].",";

		}

	}



	if($action=="save")

	{

		/*for ($i=0; $i <count($subcat) ; $i++) 

		{ */

			$sql=mysqli_query($con,"insert into custom_color_master(subcatid,style_id,color_value,

				color_name,color_img,created_date)values($subcat,$style,'$value','$name',

					'".trim($img,",")."',NOW())");

		//}

	}

	else

	{

		$id=$_POST['id'];

		/*for ($i=0; $i <count($subcat) ; $i++) 

		{ */



			$sql=mysqli_query($con,"update custom_color_master set subcatid=$subcat,

			color_value='$value',color_name='$name',color_img='".trim($img,",")."',

			last_updated=NOW() where cc_id=$id");

		//}

	}



}









else if($type=="quotes")

{

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$desc=mysqli_real_escape_string($con,trim(strip_tags($_POST['desc'])));

	$q_name=mysqli_real_escape_string($con,trim($_POST['q_name']));

	$q_email=mysqli_real_escape_string($con,trim($_POST['q_email']));

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	if($action=="save")

	{

		$sql=mysqli_query($con,"insert into quote_master(q_text,q_name,q_mail,created_date)

			values('".$desc."','".$q_name."','".$q_email."',NOW())");

	}

	else

	{

		$sql=mysqli_query($con,"update quote_master set q_text='".$desc."',q_name='".$q_name."',

			q_mail='".$q_email."',last_updated=NOW() where qid=$id");

	}

}



else if($type=="carousel")

{

	$id=mysqli_real_escape_string($con,trim($_POST['id']));

	$desc=mysqli_real_escape_string($con,addslashes($_POST['desc']));

	$heading=mysqli_real_escape_string($con,trim($_POST['heading']));
        
        $heading2=mysqli_real_escape_string($con,trim($_POST['heading2']));

	$link=mysqli_real_escape_string($con,trim($_POST['link']));

	$action=mysqli_real_escape_string($con,trim($_POST['action']));

	$old_image=mysqli_real_escape_string($con,trim($_POST['old_image']));





	$img="";

	$path="../../assets/carousel/";

	if($_FILES['userfile']['name']!='')

		$img="assets/carousel/".$_FILES['userfile']['name'];

/*	if(!file_exists($path))

	{

		mkdir($path,0777,true);

	}



*if($_FILES['userfile']['size']!=0)

		{

			$type=$_FILES['userfile']['type'];

			$ext=get_image_type($type);

			$rand=time()."_".$_FILES['userfile']['name'];

			$temp=$_FILES['userfile']['tmp_name'];

			$target=$path.$rand;

			$target1=$path1.$rand;

			$img=$target1;

			move_uploaded_file($temp,$target);

			$temp='';

			$target='';

			$rand='';

			$ext='';

		}*/

		else

			$img=$old_image;





	if($action=="save")

	{

		$sql=mysqli_query($con,"insert into carousel_master(c_heading,c_heading2,c_img,c_desc,c_link,created_date)

			values('".$heading."','".$heading2."','".$img."','".$desc."','".$link."',NOW())");

	}

	else

	{

		$sql=mysqli_query($con,"update carousel_master set c_heading='".$heading."',c_heading2='".$heading2."',c_desc='".$desc."',

			c_link='".$link."',c_img='".$img."',last_updated=NOW() where cm_id=$id");

	}

}



else if($type=="add_gift_card")

{

	$amount=mysqli_real_escape_string($con,trim($_POST['amount']));

	$quantity=mysqli_real_escape_string($con,trim($_POST['quantity']));

	$admin_id=mysqli_real_escape_string($con,trim($_POST['admin_id']));



	$balance=$quantity * $amount;

	

	for ($i=0; $i <$quantity; $i++) 

	{ 

		$rand="GC".$amount.rand(0,999999999999);



		$sql=mysqli_query($con,"INSERT INTO gift_card_master (userid, sess_id, orderid, gift_code, amount, balance, quantity, gift_type, recipient_name, recipient_mail, recipient_address,status,created_date) 

			                    VALUES('".$admin_id."', '0', '0', '".$rand."', '".$amount."', '".$amount."', 1, 'myself', '', '', '', '1',NOW())");

		

	}

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

?>