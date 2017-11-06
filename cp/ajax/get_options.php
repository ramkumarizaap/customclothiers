<?php 
require('../../includes/action/config.php');
global $con;

$val=isset($_POST['val'])!="" ? $_POST['val'] : 0;
$id=isset($_POST['id'])!="" ? $_POST['id'] : 0;
$sql=mysqli_query($con,"select options from variants where id=$val");
if($sql){
if(mysqli_num_rows($sql) > 0)
{
$r=mysqli_fetch_array($sql);
$options=explode(",",$r['options']);
}
}
?>

<select class="form-control select2 select2-hidden-accessible var_name" data-id="<?php echo $id;?>" name="variant_options[]" multiple="" data-placeholder="Choose a Options" style="width: 100%;" tabindex="-1" aria-hidden="true">
<?php if(count($options)>0){for($i=0;$i<count($options);$i++) {?>
<option 
value="<?php echo $options[$i];?>"><?php echo $options[$i];?></option>
<?php }}?>
</select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0"><ul class="select2-selection__rendered"></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>


 <script type="text/javascript">
    
      $('.tags_1').tagsInput({width:'auto'});
       $(".select2").select2();
       $(".var_name").change(function(){
       		val=$(this).val();
       		id=$(this).attr("data-id");
       		a=$(".tags"+id).val();
       		$(".tags"+id).val(val);

       });
    
    </script>