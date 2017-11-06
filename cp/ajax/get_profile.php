<?php 
require('../../includes/action/config.php');
$val=mysqli_real_escape_string($con,trim($_POST['val']));

$sql=mysqli_query($con,"select * from measurement_profile_master where mp_userid=$val");
while($r=mysqli_fetch_array($sql))
{
?>
<tr>
<td><input type="radio" name="mp_id" value="<?php echo $r['mp_id'];?>"></td>
<td><?php echo $r['mp_name'];?></td>
<td><?php echo $r['mp_height'];?></td>
<td><?php echo $r['mp_weight'];?></td>
</tr>
<?php }?>
@@@@@
<?php 
$sql1=mysqli_query($con,"select * from shipping_address where userid=$val");
$r1=mysqli_fetch_array($sql1);
$ship_id=$r1['sa_id'];
$address1=$r1['sa_address1'];$address2=$r1['sa_address2'];$city=$r1['sa_city'];
$zipcode=$r1['sa_zipcode'];$province=$r1['sa_province'];$country=$r1['sa_country'];
?>
 <input type="hidden" name="ship_id" value="<?php echo $ship_id;?>" />
<h3> Shipping Address</h3>
                            <div class="form-group col-md-12">
                                <label class="control-label">Address 1</label>
                                <input maxlength="200" type="text" required="required" 
                                class="form-control" placeholder="Address 1" name="address1"
                                value="<?php echo $address1;?>" />
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Address 2</label>
                                <input maxlength="200" type="text" required="required" 
                                class="form-control" placeholder="Address 2" name="address2"
                                value="<?php echo $address2;?>" />
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">City</label>
                                <input maxlength="200" type="text" required="required" 
                                class="form-control" placeholder="City" name="city"
                                value="<?php echo $city;?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Zipcode</label>
                                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Zipcode" name="zipcode"
                                value="<?php echo $zipcode;?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Province</label>
                                <input maxlength="200" type="text" required="required" 
                                class="form-control" placeholder="Province" name="province" 
                                value="<?php echo $province;?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Country</label>
                                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Country" name="country" 
                                value="<?php echo $country;?>"/>
                            </div>