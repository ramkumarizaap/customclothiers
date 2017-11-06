 <?php 
require("../../includes/action/config.php");
 $id=$_POST['id'];?>
 <a href="javascript:void(0);" class="new_profile btn btn-primary">Add New Profile</a><br><br>
  <table id="example1" class="table table-striped">
    <thead>
      <th>Name</th><th>Gender</th><th>Weight</th>
      <th>Height</th><th>Options</th>
    </thead>
    <tbody class="tbody_measure">
    <?php 
    $sql=mysqli_query($con,"select * from measurement_profile_master where mp_userid=".$id);
    while ($r=mysqli_fetch_array($sql))
    {
    ?>
      <tr class="tr_<?php echo $r['mp_id'];?>">
        <td><?php echo $r['mp_name'];?></td>
        <td><?php echo $r['gender']; ?></td>
        <td><?php echo $r['mp_height'];?></td>
        <td><?php echo $r['mp_weight'];?></td>
        <td>
         <a href="javascript:void(0)" data-id="<?php echo $r['mp_id'];?>" class="select_mp btn btn-xs btn-danger">
                                            Select</a>
           <a href="javascript:void(0)" data-id="<?php echo $r['mp_id'];?>"class="up_mp btn btn-xs btn-danger">
                                            Modify</a>
          <a href="javascript:void(0)" data-id="<?php echo $r['mp_id'];?>" class="btn btn-xs btn-danger del_mp">
          Delete</a>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>

  <script type="text/javascript">
 $("#example1,.example1").DataTable();

$(".del_mp").click(function(){
  id=$(this).attr("data-id");
  con=confirm("Are you sure want to delete?");
  if(con)
  {
  $.ajax({
    type:"POST",url:"<?php echo $adminurl;?>ajax/form-post.php",
    data:{type:"del_mp",id:id},
    success:function(data)
    {
      $("tbody.tbody_measure tr.tr_"+id).remove();
    }
  });
}
});


$(".new_profile").click(function(){
  $(this).hide();
  $(".mp_table").html("");
  $.ajax({
    type:"POST",url:"<?php echo $adminurl;?>ajax/get_mp.php",
    data:"",
    success:function(data)
    {
      $(".save_mp_btn").toggleClass("hide");
      $(".mp_table").html(data);
    }
  });
});

$(".up_mp").click(function(){
  id=$(this).attr("data-id");
  $(".mp_table").html("");
  $.ajax({
    type:"POST",url:"<?php echo $adminurl;?>ajax/get_mp.php",
    data:{id:id},
    success:function(data)
    {
      $(".save_mp_btn").toggleClass("hide");
      $(".mp_table").html(data);
    }
  });
});


$(".mp_pop_btn").click(function(){
  id=$(this).attr("data-oid");
  $(".o_id").val(id);
});

$(".select_mp").click(function(){
  oid=$(".o_id").val();
  id=$(this).attr("data-id");
  $.ajax({
    type:"POST",url:"<?php echo $adminurl;?>ajax/form-post.php",
    data:{oid:oid,id:id,type:"update_mp"},
    success:function(data)
    {
     // console.log(data);
      location.reload();
    }
  });
});

  </script>