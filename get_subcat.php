 <?php 
 require('includes/action/functions.php');
 $site1=new Site();
 $cat_id=$_POST['id'];
 $pid=$_POST['pid'];
 $pro=$site1->get_all_products1($cat_id);
 ?>

  <label for="exampleInputEmail1">Product You've Purchased</label>
    <select name="product" class="form-control">
      <option value="">--Select Product--</option>
      <?php 
      foreach($pro as $key=>$val)
      {
      ?>
        <option value="<?php echo $pro[$key]['id'];?>" <?php if($pro[$key]['id']==$pid) { ?> selected <?php } ?>><?php echo $pro[$key]['product_name'];?></option>
      <?php 
      }
      ?>
    </select>

