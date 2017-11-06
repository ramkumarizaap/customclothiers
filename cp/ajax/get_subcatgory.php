 <?php 

 require('../../includes/action/functions.php');

 $site=new Site();

 $cat_id=$_POST['id'];

$cat=$site->get_all_sub_category('',$cat_id);

 ?>



 <div class="form-group">

  <label for="exampleInputEmail1">Sub Category</label>

    <select class="form-control sub_category" name="sub_category">

      <option value="">--Select Sub Category--</option>

      <?php 

      foreach($cat as $key=>$val)

      {

      ?>

        <option value="<?php echo $cat[$key]['id'];?>"><?php echo $cat[$key]['subcat_name'];?></option>

      <?php 

      }

      ?>

    </select>

</div>

<script type="text/javascript">

$(document).ready(function(){

  $(".sub_category").change(function(){

      $(".select2-selection__rendered,.fab_images").html('');

    val=$(this).val();

    if(val=="1")

      $(".waist_div").removeClass("hide");

      else

        $(".waist_div").addClass("hide");


      if(val=="6")
        $(".style_properties,.fab-div").hide();
      else
        $(".style_properties,.fab-div").show();
    $.ajax({

      type:"POST",url:"<?php echo  $adminurl;?>ajax/get_styles.php",

      data:{val:val},

      success:function(data)

      {

        console.log(data);

      //  $(".style_properties").toggleClass("hide");    

        $(".style_div").html(data);

      }

    });





    $.ajax({

      type:"POST",url:"<?php echo $adminurl;?>ajax/get_fabrics.php",

      data:{val:val},

      success:function(data)

      {

        $(".fabric-class").html(data);

      }

    });



  });

}); 



</script>

