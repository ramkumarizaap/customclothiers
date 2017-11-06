<?php 
$con=mysqli_connect("localhost","customclothiers","CustomClothiers@123#") or die("Can't Connect Server");
mysqli_select_db($con,"customclothiers_db") or die("Can't Connect DB");
if(isset($_POST['id'])){
	$id=$_POST['id'];
	$sql=mysqli_query($con,"select * from measurement_profile_master where mp_id=$id");
	$r=mysqli_fetch_array($sql);
	$name=$r['mp_name'];$height=$r['mp_height'];$weight=$r['mp_weight'];$mp_chest=$r['mp_chest'];
	$mp_abdomen=$r['mp_abdomen'];
	$mp_buttocks=$r['mp_buttocks'];$mp_hips=$r['mp_hips'];
	$coat_length=$r['coat_length'];$torso_length=$r['torso_length'];$dress_length=$r['dress_length'];
	$sleeve_length=$r['sleeve_length'];$shoulder_width=$r['shoulder_width'];$neck=$r['neck'];
	$chest_around=$r['chest_around'];$stomach=$r['stomach'];
	$breast_point=$r['breast_point'];$waist_point=$r['waist_point'];$pant_length=$r['pant_length'];
	$skirt_length=$r['skirt_length'];$hips=$r['hips'];
	$waist=$r['waist'];$rise=$r['rise'];$thigh=$r['thigh'];$bicep_around=$r['bicep_around'];
	$pant_waist=$r['pant_waist'];
	$skirt_position=$r['skirt_position'];
	$action="measurement";$id=$r['mp_id'];
}
else
{
	$id=$_POST['userid'];$name="";$height="";$weight="";$mp_chest="";$mp_abdomen="";$mp_buttocks="";$mp_hips="";
	$coat_length="";$torso_length="";$dress_length="";$sleeve_length="";$shoulder_width="";$neck="";
	$chest_around="";$stomach="";$breast_point="";$waist_point="";$pant_length="";
	$skirt_length="";$hips="";$waist="";$rise="";$thigh="";$bicep_around="";
	$pant_waist="";$skirt_position="";$action="measurement_add";
}
?>

<form action="" method="post" class="mp_form">
<input type="hidden" name="m_id" value="<?php echo $id;?>">
<input type="hidden" name="type" value="<?php echo $action;?>">
<input type="hidden" name="user_id" value="<?php echo $id;?>">
<div class="row">
 <div class="form-group col-md-4">
        <label class="control-label">Name</label>
        <input maxlength="20" type="text" required="required" 
        class="form-control" placeholder="Enter Name" name="title" value="<?php echo $name;?>" />
    </div>
     <div class="form-group col-md-4">
        <label class="control-label">Height</label>
        <input maxlength="3" type="text" required="required" class="form-control"
         placeholder="Enter Height" name="height"  value="<?php echo $height;?>" />
    </div>
	 <div class="form-group col-md-4">
        <label class="control-label">Weight</label>
        <input maxlength="3" type="text" required="required" class="form-control" 
        placeholder="Enter Weight" name="weight" value="<?php echo $weight;?>"  />
    </div>
     <div class="form-group col-md-6">
        <label class="control-label"> Chest</label><br>
        <input type="radio" name="param_chest" value="very_small">Very Small
        <input type="radio" name="param_chest" value="small">Small
        <input type="radio" name="param_chest" checked value="normal">Normal
        <input type="radio" name="param_chest" value="big">Large
        <input type="radio" name="param_chest" value="very_big">Very Large
    </div>
    <div class="form-group col-md-6">
        <label class="control-label"> Abdomen</label><br>
        <input type="radio" name="param_abdomen" value="very_small">Very Flat
        <input type="radio" name="param_abdomen" value="small">Flat
        <input type="radio" name="param_abdomen" checked value="normal">Normal
        <input type="radio" name="param_abdomen" value="big">Large
        <input type="radio" name="param_abdomen" value="very_big">Very Large
    </div>
    <div class="form-group col-md-6">
        <label class="control-label"> Buttocks</label><br>
        <input type="radio" name="param_buttocks" value="very_small">Very Flat
        <input type="radio" name="param_buttocks" value="small">Flat
        <input type="radio" name="param_buttocks" checked value="normal">Normal
        <input type="radio" name="param_buttocks" value="big">Large
        <input type="radio" name="param_buttocks" value="very_big">Very Large
    </div>
    <div class="form-group col-md-6">
        <label class="control-label"> Hips</label><br>
        <input type="radio" name="param_hip" value="very_small">Very Narrow
        <input type="radio" name="param_hip" value="small">Narrow
        <input type="radio" name="param_hip" checked value="normal">Normal
        <input type="radio" name="param_hip" value="big">Wide
        <input type="radio" name="param_hip" value="very_big">Very Wide
    </div>
    <div class="col-md-12" style="max-height: 250px;overflow: auto;">
<?php
     $sql1=mysqli_query($con,"select * from measurement_profile_fields");
     while($r1=mysqli_fetch_array($sql1))
     {
            ?>

            <div class="col-sm-2 col-md-4  input input_coat_length form-group">
              <label class="col-md-12 name"><?php echo $r1['labelname'];?></label>
              <div class="col-md-8">
              <input type="text" class="num text  form-control mx-330"  size="4" name="field[value][]" /> 
              <input type="hidden" class=""  size="4" name="field[name][]" /> 
              </div>
              <span class="units1">inches</span>
          </div>
        <?php
        
    }
        ?>
    </div>
    
</div>
</form>
