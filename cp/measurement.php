<?php 

require('../includes/action/config.php');

$id=$_POST['id'];

 $sql = mysqli_query($con,"select b.*,a.mp_id,a.mp_weight,a.mp_height,a.mp_name,a.mp_name,a.mp_chest,a.mp_abdomen,a.mp_buttocks,a.mp_hips,c.labelname FROM measurement_profile_master a,measurement_profile_value b,measurement_profile_fields c  WHERE a.mp_id=$id  and a.mp_id=b.mpid and b.mpfid=c.mpf_id");

    if(mysqli_num_rows($sql)) {

      $r=mysqli_fetch_array($sql);

      }

?>

<input type="hidden" value="measurement" name="type">

<input type="hidden" value="<?php echo $id;?>" name="m_id">

<div class="row">

        <div class="col-md-12">

            <div class="form-group col-md-4">

             <label for="exampleInputEmail1">Name</label>

         <input type="text" class="form-control" name="title" placeholder="Enter Name"

              value="<?php echo $r['mp_name'];?>">

        </div>

        <div class="form-group col-md-4">

             <label for="exampleInputEmail1">Height</label>

         <input type="text" class="form-control num_only" name="height" placeholder="Enter Height"

              value="<?php echo $r['mp_height'];?>">

        </div>

        <div class="form-group col-md-4">

             <label for="exampleInputEmail1">Weight</label>

         <input type="text" class="form-control num_only" name="weight" placeholder="Enter Weight"

              value="<?php echo $r['mp_weight'];?>">

        </div>

        <div class="form-group col-md-6">

             <label for="exampleInputEmail1">Chest</label>

            <input type="radio" <?php if($r['mp_chest']=="very_small"){?> checked="checked" <?php }?> value="very_small" name="param_chest">Very Small

            <input type="radio" <?php if($r['mp_chest']=="small"){?> checked="checked" <?php }?> value="small"  name="param_chest">Small

            <input type="radio" <?php if($r['mp_chest']=="normal"){?> checked="checked" <?php }?> value="normal"name="param_chest">Normal

            <input type="radio" <?php if($r['mp_chest']=="big"){?> checked="checked" <?php }?> value="big"  name="param_chest">Large

            <input type="radio" <?php if($r['mp_chest']=="very_big"){?> checked="checked" <?php }?> value="very_big"  name="param_chest">Very Large

        </div>

        <div class="form-group col-md-6">

             <label for="exampleInputEmail1">Abdomen</label>

         <input type="radio" <?php if($r['mp_abdomen']=="very_small"){?> checked <?php }?>  value="very_small" name="param_abdomen">Very Flat

            <input type="radio" <?php if($r['mp_abdomen']=="small"){?> checked <?php }?>  value="small" name="param_abdomen">Flat

            <input type="radio" <?php if($r['mp_abdomen']=="normal"){?> checked <?php }?>  value="normal" name="param_abdomen">Normal

            <input type="radio" <?php if($r['mp_abdomen']=="big"){?> checked <?php }?>  value="big" name="param_abdomen">Large

            <input type="radio" <?php if($r['mp_abdomen']=="very_big"){?> checked <?php }?>  value="very_big" name="param_abdomen">Very Large

        </div>

        <div class="form-group col-md-6">

             <label for="exampleInputEmail1">Buttocks</label>

        <input type="radio" name="param_buttocks" <?php if($r['mp_buttocks']=="very_small"){?> checked <?php }?> value="very_small" >Very Flat

            <input type="radio" <?php if($r['mp_buttocks']=="small"){?> checked <?php }?> name="param_buttocks"  value="small">Flat

            <input type="radio" <?php if($r['mp_buttocks']=="normal"){?> checked <?php }?> name="param_buttocks"  value="normal">Normal

            <input type="radio" <?php if($r['mp_buttocks']=="big"){?> checked <?php }?> name="param_buttocks"  value="big">Large

            <input type="radio" <?php if($r['mp_buttocks']=="very_big"){?> checked <?php }?> name="param_buttocks"  value="very_big">Very Large

        </div>

         <div class="form-group col-md-6">

             <label for="exampleInputEmail1">Hips</label>

        <input type="radio" name="param_hip" <?php if($r['mp_hips']=="very_small"){?> checked <?php }?>  value="very_small" >Very Narrow

            <input type="radio" <?php if($r['mp_hips']=="small"){?> checked <?php }?> name="cheparam_hipst"  value="small">Narrow

            <input type="radio" <?php if($r['mp_hips']=="normal"){?> checked <?php }?> name="param_hip"  value="normal">Normal

            <input type="radio" <?php if($r['mp_hips']=="big"){?> checked <?php }?> name="param_hip"  value="big">Wide

            <input type="radio" <?php if($r['mp_hips']=="very_big"){?> checked <?php }?> name="param_hip"  value="very_big">Very Wide

        </div>

        <div class="mp_div col-md-12" style="max-height:300px;overflow:auto;">

<?php

$query1= mysqli_query($con,"select b.*,a.mp_weight,a.mp_name,c.labelname FROM measurement_profile_master a,measurement_profile_value b,measurement_profile_fields c  WHERE a.mp_id=$id  and a.mp_id=b.mpid and b.mpfid=c.mpf_id");

    while($qr1=mysqli_fetch_array($query1))

    {

        ?>



          <div class="col-sm-2 col-md-3  input input_coat_length form-group">

              <?php if($qr1['labelname']=='Neck') { 
                        $m_type='cm';
                    }
                    else
                    {
                      $m_type="inches";
                    }
                 ?>

              <label class="col-md-12 name"><?php echo $qr1['labelname'];?></label>

              <div class="col-md-8">

              <input type="text" class="num text num_only form-control mx-330" value="<?php echo $qr1['mpf_value'];?>" size="4" name="field[value][]" /> 

              <input type="hidden" class="" value="<?php echo $qr1['mpfid'] ?>" size="4" name="field[name][]" /> 

              </div>

              <span class="units1"><?php echo $m_type; ?></span>

          </div>



        <?php 

    }

?>        

    </div>



    

     <!--   <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Coat Length</label>

         <input type="text" class="form-control" name="coat_length" placeholder="Inches"

              value="<?php echo $r['coat_length'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Torso length</label>

         <input type="text" class="form-control" name="body_length" placeholder="Inches"

              value="<?php echo $r['torso_length'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Dress length</label>

         <input type="text" class="form-control" name="dress_length" placeholder="Inches"

              value="<?php echo $r['dress_length'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Sleeves length</label>

         <input type="text" class="form-control" name="sleeves_length" placeholder="Inches"

              value="<?php echo $r['sleeve_length'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Shoulder width</label>

         <input type="text" class="form-control" name="shoulders" placeholder="Inches"

              value="<?php echo $r['shoulder_width'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Neck</label>

         <input type="text" class="form-control" name="neck" placeholder="Inches"

              value="<?php echo $r['neck'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Chest Around</label>

         <input type="text" class="form-control" name="chest" placeholder="Inches"

              value="<?php echo $r['chest_around'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Stomach</label>

         <input type="text" class="form-control" name="stomach" placeholder="Inches"

              value="<?php echo $r['stomach'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Breast Point</label>

         <input type="text" class="form-control" name="breast_point" placeholder="Inches"

              value="<?php echo $r['breast_point'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Waist Point</label>

         <input type="text" class="form-control" name="waist_point" placeholder="Inches"

              value="<?php echo $r['waist_point'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Pants Length</label>

         <input type="text" class="form-control" name="pants_length" placeholder="Inches"

              value="<?php echo $r['pant_length'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Skirt length</label>

         <input type="text" class="form-control" name="skirt_length" placeholder="Inches"

              value="<?php echo $r['skirt_length'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Hips</label>

         <input type="text" class="form-control" name="hips" placeholder="Inches"

              value="<?php echo $r['hips'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Waist</label>

         <input type="text" class="form-control" name="waist" placeholder="Inches"

              value="<?php echo $r['waist'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Rise</label>

         <input type="text" class="form-control" name="crotch" placeholder="Inches"

              value="<?php echo $r['rise'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Thigh</label>

         <input type="text" class="form-control" name="thigh" placeholder="Inches"

              value="<?php echo $r['thigh'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Bicep around</label>

         <input type="text" class="form-control" name="biceps" placeholder="Inches"

              value="<?php echo $r['bicep_around'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Pants Waist</label>

         <input type="text" class="form-control" name="pants_position" placeholder="Inches"

              value="<?php echo $r['pant_waist'];?>">

        </div>

        <div class="form-group col-md-2">

       <label for="exampleInputEmail1">Skirt position</label>

         <input type="text" class="form-control" name="skirt_position" placeholder="Inches"

              value="<?php echo $r['skirt_position'];?>">

        </div>-->

        

  </div>

</div>

<script type="text/javascript">

  $(document).ready(function(){



  $(".num_only").keypress(function(e){

      

      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 

      {

          return false;

        }

    });



  });

</script>