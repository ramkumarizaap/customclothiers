<?php
if(!isset($_SESSION['admin_user_id']))
{
    header("Location:{$adminurl}");
}
else
{
	$id=$_GET['id'];
	$oid=$_GET['oid'];
	if($id=="measurement")
	{
	?>
		<body onload="window.print();">
			<?php 
			$sql=mysqli_query($con,"select a.order_id,b.*,c.p_name from order_master a,measurement_profile_master b,
				product_master c where a.om_id='$oid' and a.mpid=b.mp_id and a.pid=c.p_id");
			$r=mysqli_fetch_array($sql);
			?>
			<h3>ORDER ID - <?php echo $r['order_id'];?></h3><br>
			<div class="col-md-6">
				<h4>Product - <strong><?php echo $r['p_name'];?></strong></h4>
				<h4><strong><p>Measurement Profile</p></strong></h4>
						<p><strong>Name:</strong> <?php echo $r['mp_name']; ?> </p>

                                      <p><strong>Height:</strong> <?php echo $r['mp_height']; ?> </p>

                                      <p><strong>Weight:</strong> <?php echo $r['mp_weight']; ?> </p>

                                      <p><strong>Chest:</strong> <?php echo $r['mp_chest']; ?> </p>

                                      <p><strong>Abdomen:</strong> <?php echo $r['mp_abdomen']; ?> </p>

                                      <p><strong>Buttocks:</strong> <?php echo $r['mp_buttocks']; ?></p>

                                      <p><strong>Hips:</strong> <?php echo $r['mp_hips']; ?></p>

                                      <?php if(!empty($r['coat_length'])) { ?>

                                      <p><strong>Coat Length:</strong> <?php echo $r['coat_length']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['torso_length'])) { ?>

                                      <p><strong>Torso Length:</strong> <?php echo $r['torso_length']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['dress_length'])) { ?>

                                      <p><strong>Dress Length:</strong> <?php echo $r['dress_length']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['sleeve_length'])) { ?>

                                      <p><strong>Sleeve Length:</strong> <?php echo $r['sleeve_length']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['shoulder_width'])) { ?>

                                      <p><strong>Shoulder Width:</strong> <?php echo $r['shoulder_width']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['neck'])) { ?>

                                      <p><strong>Neck:</strong> <?php echo $r['neck']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['chest_around'])) { ?>

                                      <p><strong>Chest Around:</strong> <?php echo $r['chest_around']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['stomach'])) { ?>

                                      <p><strong>Stomach:</strong> <?php echo $r['stomach']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['breast_point'])) { ?>

                                      <p><strong>Breast Point:</strong> <?php echo $r['breast_point']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['waist_point'])) { ?>

                                      <p><strong>Waist Point:</strong> <?php echo $r['waist_point']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['pant_length'])) { ?>

                                      <p><strong>Pants Length:</strong> <?php echo $r['pant_length']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['skirt_length'])) { ?>

                                      <p><strong>Skirt Length:</strong> <?php echo $r['skirt_length']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['hips'])) { ?>

                                      <p><strong>Hips:</strong> <?php echo $r['hips']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['waist'])) { ?>

                                      <p><strong>Waist:</strong> <?php echo $r['waist']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['rise'])) { ?>

                                      <p><strong>Rise:</strong> <?php echo $r['rise']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['thigh'])) { ?>

                                      <p><strong>Thigh:</strong> <?php echo $r['thigh']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['bicep_around'])) { ?>

                                      <p><strong>Bicep Around:</strong> <?php echo $r['bicep_around']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['pant_waist'])) { ?>

                                      <p><strong>Pants Waist:</strong> <?php echo $r['pant_waist']; ?> <span>cm</span></p>

                                      <?php } ?>

                                      <?php if(!empty($r['skirt_position'])) { ?>

                                      <p><strong>Skirt Position:</strong> <?php echo $r['skirt_position']; ?> <span>cm</span></p>

                                      <?php } ?>
			</div>
		</body>
	<?php
	}
}
?>