<?php 
session_start();
require_once ('includes/action/config.php');

$pname=$_POST['pname'];$date=explode("-",$_POST['date']);
if($pname!="all")
{
	$where=" and subcatid=$pname";
}
if($date[0]=="date")
{
	$where1 =" order by created_date ".$date[1];
}
else
{
		$where1 =" order by score ".$date[1];
}

$sql=mysqli_query($con,"select * from reviews where status=1
	$where $where1");


if(mysqli_num_rows($sql) > 0){
while ($r=mysqli_fetch_array($sql))
{
  if(!empty($r['pid'])) 
  {
    $get_product = mysqli_query($con,"select p_name from product_master where p_id='".$r['pid']."'");
      if(mysqli_num_rows($get_product) > 0) 
      {
        $p_dtl = mysqli_fetch_array($get_product);
        $p_name = $p_dtl['p_name'];
      }
  }
  else
  {
    $get_cat = mysqli_query($con,"select sub_cat_name from sub_category_master where sub_cat_id='".$r['subcatid']."'");
       if(mysqli_num_rows($get_cat) > 0) 
       {
         $p_dtl = mysqli_fetch_array($get_cat);
         $p_name = $p_dtl['sub_cat_name'];
       }
  }
?>
 <div class="reviews-container">
   <div class="inner-reviews">
    <ul class="list-reviews">
      <li>
        <div class="grid grid-rev">              
             
          <div class="inner-page-review">
                <h5><strong>Purchased:</strong></h5>
             <ul>
               <li><a href="javascript:void(0);"><?php echo $p_name;?></a></li>
             </ul>
          </div>
          <div class="inner-page-review1">                
            <div class="stars">
            <?php for ($i=0; $i < $r['score']; $i++) { ?>
              <span><i class="fa fa-star"></i>                          
            <?php
            }?>
            
              <span content="2015-06-18" itemprop="datePublished" class="date">
                  <?php echo date('M d, Y',strtotime($r['created_date']));?>
                  </span>
           </div>
            <h3><?php echo $r['title'];?></h3>
            <h4>
              <span itemprop="author"><?php echo $r['name'];?>,</span>
              <span><?php echo $r['email'];?></span>
            </h4>
            <div itemprop="description" class="content">
              <p><?php echo $r['description'];?></p>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>  
<?php
}
}
else
{
	echo "<br><br><strong>No Records Found.</strong>";
}
?>