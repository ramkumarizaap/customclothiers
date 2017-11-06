<?php
require_once("../../includes/action/config.php");
require("../../includes/action/functions.php");
$site=new Site();
?>

 <div class="row">
  <div class="col-md-5">
    <div class="form-group">
        <label for="exampleInputEmail1">Category</label>
          <select class="form-control" name="category[]">
            <?php $sub=$site->get_all_sub_category();
            foreach ($sub as $key => $value) {
              ?>
              <option <?php if($category==$sub[$key]['id']) {?> selected <?php }?>
               value="<?php echo $sub[$key]['id'];?>"><?php echo $sub[$key]['subcat_name'];?></option>
            <?php
            }
            ?>
          </select>
    </div>
  </div>
  <div class="col-md-5">
	<div class="form-group">
	  <label for="exampleInputEmail1">Default Product Image</label>
	  <input type="file" class="form-control" name="default_img[]"><br>
	</div>
  </div>
  <div class="col-md-2">
   <label for="exampleInputEmail1">Option</label>
  	<button type="button" class="btn btn-danger btn-xs remove_fab">Remove</button>
  </div>
 </div>

 <script type="text/javascript">
$(".remove_fab").click(function(){
	$(this).parent().parent().remove();
});
 </script>