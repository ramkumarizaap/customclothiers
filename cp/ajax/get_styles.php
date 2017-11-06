<?php
require('../../includes/action/config.php');

$val=mysqli_real_escape_string($con,trim($_POST['val']));
if ($val=="1")
{
	$i=0;
	echo "<h4><strong>Jacket</strong></h4><br>";
	$sql=mysqli_query($con,"select ps_id,ps_label from property_style_master where subcatid like '%1%'");
	while($r=mysqli_fetch_array($sql))
	{
		$p_label=str_replace(' ','_',strtolower($r['ps_label']));
	?>
		<div class="form-group">
		<input type="hidden" value="<?php echo $p_label;?>" name="ps_id[]">
		  <label style="width:150px;" for="exampleInputEmail1"><?php echo $r['ps_label'];?></label>
		  <?php 
		  $sql1=mysqli_query($con,"select psd_value from property_style_details where psid=".$r['ps_id']." and subcatid like '%1%'");
			while($r1=mysqli_fetch_array($sql1))
			{	
				$psd_name=$r1['psd_value'];
				?>
		  <label class="" style="margin-left:10px;">
			  <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
				  <input type="radio" checked name="style[<?php echo $p_label;?>][]" value="<?php echo $psd_name;?>" class="flat-red"  style="position: absolute; opacity: 0;">		  	
				  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 
				  	height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
				  </ins>
			  </div><?php echo $r1['psd_value'];?>
		  </label>
		  <?php }?>
		</div>
	<?php
	}
	echo "<h4><strong>Pant</strong></h4><br>";
	$sql11=mysqli_query($con,"select ps_id,ps_label from property_style_master where subcatid like '%4%'");
	while($r11=mysqli_fetch_array($sql11))
	{
		$p_label1=str_replace(' ','_',strtolower($r11['ps_label']));
	?>
		<div class="form-group">
		<input type="hidden" value="<?php echo $p_label1;?>" name="ps_id[]">
		  <label style="width:150px;" for="exampleInputEmail1"><?php echo $r11['ps_label'];?></label>
		  <?php 
		  $sql21=mysqli_query($con,"select psd_value from property_style_details where psid=".$r11['ps_id']." and subcatid like '%4%'");
			while($r21=mysqli_fetch_array($sql21))
			{	
				$psd_name1=$r21['psd_value'];
				?>
		  <label class="" style="margin-left:10px;">
			  <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
				  <input type="radio" checked name="style[<?php echo $p_label1;?>][]" value="<?php echo $psd_name1;?>" class="flat-red"  style="position: absolute; opacity: 0;">		  	
				  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 
				  	height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
				  </ins>
			  </div><?php echo $r21['psd_value'];?>
		  </label>
		  <?php }?>
		</div>
	<?php
	}
}
elseif ($val=="13")
{
	$i=0;
	echo "<h4><strong>Jacket</strong></h4><br>";
	$sql=mysqli_query($con,"select ps_id,ps_label from property_style_master where subcatid like '%15%'");
	while($r=mysqli_fetch_array($sql))
	{
		$p_label=str_replace(' ','_',strtolower($r['ps_label']));
	?>
		<div class="form-group">
		<input type="hidden" value="<?php echo $p_label;?>" name="ps_id[]">
		  <label style="width:150px;" for="exampleInputEmail1"><?php echo $r['ps_label'];?></label>
		  <?php 
		  $sql1=mysqli_query($con,"select psd_value from property_style_details where psid=".$r['ps_id']." and subcatid like '%15%'");
			while($r1=mysqli_fetch_array($sql1))
			{	
				$psd_name=$r1['psd_value'];
				?>
		  <label class="" style="margin-left:10px;">
			  <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
				  <input type="radio" name="style[<?php echo $p_label;?>][]" value="<?php echo $psd_name;?>" class="flat-red"  style="position: absolute; opacity: 0;">		  	
				  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 
				  	height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
				  </ins>
			  </div><?php echo $r1['psd_value'];?>
		  </label>
		  <?php }?>
		</div>
	<?php
	}
	echo "<h4><strong>Skirt</strong></h4><br>";
	$sql11=mysqli_query($con,"select ps_id,ps_label from property_style_master where subcatid like '%11%'");
	while($r11=mysqli_fetch_array($sql11))
	{
		$p_label1=str_replace(' ','_',strtolower($r11['ps_label']));
	?>
		<div class="form-group">
		<input type="hidden" value="<?php echo $p_label1;?>" name="ps_id[]">
		  <label style="width:150px;" for="exampleInputEmail1"><?php echo $r11['ps_label'];?></label>
		  <?php 
		  $sql21=mysqli_query($con,"select psd_value from property_style_details where psid=".$r11['ps_id']." and subcatid like '%11%'");
			while($r21=mysqli_fetch_array($sql21))
			{	
				$psd_name1=$r21['psd_value'];
				?>
		  <label class="" style="margin-left:10px;">
			  <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
				  <input type="radio" name="style[<?php echo $p_label1;?>][]" value="<?php echo $psd_name1;?>" class="flat-red"  style="position: absolute; opacity: 0;">		  	
				  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 
				  	height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
				  </ins>
			  </div><?php echo $r21['psd_value'];?>
		  </label>
		  <?php }?>
		</div>
	<?php
	}
}
else
{
$i=0;
$sql=mysqli_query($con,"select ps_id,ps_label from property_style_master where subcatid like '%".$val."%'");
while($r=mysqli_fetch_array($sql))
{
	$p_label=str_replace(' ','_',strtolower($r['ps_label']));
?>
<div class="form-group">
<input type="hidden" value="<?php echo $p_label;?>" name="ps_id[]">
  <label style="width:150px;" for="exampleInputEmail1"><?php echo $r['ps_label'];?></label>
  <?php 
  $sql1=mysqli_query($con,"select psd_value from property_style_details where psid=".$r['ps_id']." and subcatid like '%".$val."%'");
	while($r1=mysqli_fetch_array($sql1))
	{	
		$psd_name=$r1['psd_value'];
		?>
  <label class="" style="margin-left:10px;">
	  <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
		  <input type="radio" checked name="style[<?php echo $p_label;?>][]" value="<?php echo $psd_name;?>" class="flat-red"  style="position: absolute; opacity: 0;">		  	
		  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 
		  	height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
		  </ins>
	  </div><?php echo $r1['psd_value'];?>
  </label>
  <?php }?>
</div>
<?php
$i++;
}
}
?>
<script type="text/javascript">
$(document).ready(function(){
	 $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-pink',
          radioClass: 'iradio_flat-pink'
        });
	});

</script>