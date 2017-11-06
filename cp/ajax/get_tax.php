<?php 
require_once("../../includes/action/config.php");
$val=$_POST['val'];
$sql=mysqli_query($con,"select * from tax_master where t_state='$val'");
if(mysqli_num_rows($sql))
{
  $r=mysqli_fetch_array($sql);
  $per=$r['t_percent'];
  $st=$r['status'];
}
else
{
  $per="0";
  $st="0";
}
?>

<div class="col-md-2">
  <label>Percent</label>
    <div class="input-group  col-md-12">
      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
      <input type="text" class="form-control" placeholder="Percentage" name="tax_per" 
        value="<?php echo $per;?>">
    </div>
</div>
<div class="col-md-2">
  <label>Status</label><br>
   <div class="input-group  col-md-12">
    <?php if($st=="0"){?>
      <a href="javascript:void(0)" class="btn tax-succ tax_visible btn-success " data-val="1">
        <i class="ion ion-checkmark"></i>
      </a>
      <a href="javascript:void(0)" class="btn tax-fail hide tax_visible btn-danger " data-val="1">
        <i class="ion ion-close"></i>
      </a>  
      <?php 
    } else{?>
    <a href="javascript:void(0)" class="btn tax-succ tax_visible hide btn-success " data-val="1">
      <i class="ion ion-checkmark"></i>
    </a>
    <a href="javascript:void(0)" class="btn tax-fail tax_visible btn-danger " data-val="0">
      <i class="ion ion-close"></i>
    </a>
    <?php }?>
   </div>
</div>
<script type="text/javascript">
  $(".tax_visible").click(function(){
    val=$(this).attr("data-val");
    state=$(".tax_state").val();
    $.ajax({
      type:"POST",url:"<?php echo $adminurl;?>ajax/tax_visible.php",
      data:{val:val,state:state},
      success:function(data)
      {
        $(".tax_visible").toggleClass("hide");
      }
    });
});
</script>