<?php

require('../../includes/action/config.php');

require('../includes/action/functions.php');

$site=new Site();

$id=$_POST['id'];

?>

<tr>

    <td style="padding-bottom: 20px;">

    

        <select class="form-control variant_type" data-class="<?php echo $id;?>" name="variant_name[]">

            <option value="">--Select Variant--</option>

             <?php 

                $var=$site->get_all_variants();

                if($var)

                {

                  foreach ($var as $key => $value) {

                ?>

                <option <?php if($var[$key]['id']=="99"){?> selected <?php }?>

                  value="<?php echo $var[$key]['id']?>"><?php echo $var[$key]['name']?></option>

                }

                <?php

                  }

                }

                ?>

        </select>

        <input id="tags_1" type="hidden" name="var_options[]" class="tags<?php echo $id;?> form-control col-md-12" />

    </td>

    <td>&nbsp;</td>

    <td class="var_options_<?php echo $id;?>" style="padding-bottom: 20px;">

     <!--<input id="tags_1" type="text" name="variant_options[]" class="tags_1 form-control col-md-12" />-->

        <!--<input type="text" class="form-control col-md-12" placeholder="Separate options with comma" />-->

    </td>

    <td style="text-align: center;padding-bottom: 20px;">

        <a href="javascript:;" class="del_row btn btn-danger"><i class="fa fa-trash"></i></a>

    </td>

</tr>

<script>

 $(".del_row").click(function(){

        t_class=$(this).parent().parent().parent().parent().attr("class");

        t_class=t_class.split(' ');

        t_class=t_class[0];

        len=$("."+t_class+" tbody tr").length;

        //alert(len);

        if(len > 3)

        {

            $(".del_row").show();

        }

        else

        {

            $(".del_row").hide();

            

        }

        $(this).parent().parent().remove();

      });

</script>

<script type="text/javascript">

$(document).ready(function(){

      $('.tags_1').tagsInput({width:'auto'});

    });



$(".variant_type").change(function(){

  val=$(this).val();

  cs=$(this).attr("data-class");

  $.ajax({

    type:"POST",url:"<?php echo $adminurl;?>ajax/get_options.php",

    data:{val:val,id:cs},

    success:function(data)

    {

      $(".var_options_"+cs).html(data);

    }

  });

});

      </script>

