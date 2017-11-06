<script id="imageTemplate" type="text/x-jquery-tmpl"> 

    <div class="imageholder">

    <figure>

      <img src="${filePath}" alt="${fileName}"/>

      <figcaption>

        ${fileName} <br/>

        <span>Original Size: ${fileOriSize} KB</span><br/>

        <span>Upload Size: ${fileUploadSize} KB</span>

      </figcaption>

    </figure>

  </div>

</script>

<script src="<?php echo $homeurl;?>assets/js/jQuery-2.1.4.min.js"></script>



<script type="text/javascript" src="https://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>



    <!-- Bootstrap 3.3.5 -->

<script src="<?php echo $homeurl;?>assets/js/moment.js"></script>

<script src="<?php echo $homeurl;?>assets/js/bootstrap.min.js"></script>

    <!-- FastClick -->

    <!-- AdminLTE App -->

<script src="<?php echo $homeurl;?>assets/js/icheck.min.js"></script>

<script src="<?php echo $homeurl;?>assets/js/jquery.dataTables.min.js"></script>

<script src="<?php echo $homeurl;?>assets/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo $homeurl;?>assets/js/tinymce/tinymce.min.js"></script>

<script src="<?php echo $homeurl;?>assets/js/jquery.validate.js"></script>

<script src="<?php echo $homeurl;?>assets/js/cp-validation.js"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/jquery.tagsinput.js"></script>

<script src="<?php echo $homeurl;?>assets/js/select2.full.min.js"></script>

<?php  if($page=="discounts-add" || $page=="showroom-add"){?>

<script src="<?php echo $homeurl;?>assets/js/bootstrap-datetimepicker.min.js"></script>   

<script type="text/javascript">

  $(".date-time").datetimepicker({sideBySide:true,format:"YYYY-MM-DD HH:mm"});

  $(".time-example").datetimepicker({

  format: 'LT'

});

</script>



<?php }?>



<script src="<?php echo $homeurl;?>assets/js/jquery.stepframemodal.js"></script>

 <script src="<?php echo $homeurl;?>assets/js/app.min.js"></script>

<script src="https://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>

<script src="<?php echo $homeurl;?>assets/js/upload-script.js"></script>



<script src="<?php echo $homeurl;?>assets/js/form-wizard.js"></script>

<?php if($page=="customize" || $page=="tab2_fabric" || $page=="tab3_accents") {?>





 <!--<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/default.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_suit.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/layerManager2.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_suit_3d.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/jquery.uniform.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/blazy.min.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/select2.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/j.magnifier.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/j.tooltip.js" charset="utf-8"></script>-->



 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/default.js" charset="utf-8"></script>

 <script src="<?php echo $homeurl;?>assets/js/app.min.js"></script>


 <?php if($_SESSION['p_dtl']['sub_category']=='Suits' || $_SESSION['p_dtl']['sub_category']=='Blazers') { ?>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_suit.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/layerManager2.js" charset="utf-8"></script>



<?php } else if($_SESSION['p_dtl']['sub_category']=='Trousers') { ?>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_pants.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/layerManager2.js" charset="utf-8"></script>





<?php } else if($_SESSION['p_dtl']['sub_category']=='Shirts') { ?>



<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_shirt.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/layerManager.js" charset="utf-8"></script>



<?php } ?>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/raphael-min.js" charset="utf-8"></script>



<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_suit_3d.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/jquery.uniform.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/reflection.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/j.tooltip.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/j.thickbox.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/select2.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/j.magnifier.js" charset="utf-8"></script>



<?php } ?>



<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/jquery.hideseek.min.js"></script>



<script>

$(document).ready(function(){

  $('.search_fabric').hideseek();

});

</script>



<?php if($page=="dashboard" || $page=="appointments"){

require ('calendar.php');

require ('chart.php');

}

?>



  <script type="text/javascript">

$(".close,.close-btn").click(function(){

  $(".modal").hide();

});



   



$(".fabric-class").change(function(){

  val=$(this).val();

  $.ajax({

    type:"POST",url:"<?php echo $adminurl;?>ajax/fabric.php",

    data:{val:val},

    success:function(data)

    {

     $(".fab_images").html(data);

    }

  });

  

});



$(".category12").on("change",function(){





    var id=$(this).val(),

        id1=$("input[name='subcatid']").val(),

        pid=$("input[name='pid']").val();



    if(id!='')

      id=id;

    else

      id=id1;



    $.ajax({

      type:"POST",

      url:"<?php echo $homeurl;?>get_subcat.php",

      data:{id:id,pid:pid},

      success:function(data)

      {

        $(".sub_cat").html('');

        $(".sub_cat").html(data);

      }

   });

});



<?php if($page!="customize") { ?>





  $('.modal-popup-type2').setupModal({id: 'popMod2', modal: false, transition:'slideDown'});





    $(function() {







      $('.tags_1').tagsInput({width:'auto'});







       $(".select2").select2();







      });







  







    </script>







    <script>tinymce.init({

      selector:'.description',

     plugins: [

                "link image lists charmap print preview hr anchor pagebreak spellchecker",

                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

                "table contextmenu directionality emoticons template textcolor paste textcolor"

        ],

        toolbar1: "fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",

        toolbar2: " bullist numlist | outdent indent blockquote | undo redo | inserttime preview | forecolor backcolor ",

        toolbar3: "table | hr removeformat | subscript superscript | ltr rtl | spellchecker | visualchars visualblocks nonbreaking image media ",

          menu: {

      //  file: {title: 'File', items: 'newdocument'},

        edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},

        //insert: {title: 'Insert', items: 'link media | template hr'},

        //view: {title: 'View', items: 'visualaid'},

        format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},

        table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},

        tools: {title: 'Tools', items: 'spellchecker code'}

      },

	   relative_urls: false

	  

      });</script>







     <script>







     







      $(function () {







        $("#example1,.example1").DataTable({

             "order": [],

              "autoWidth": true

});







        







      });



</script>

<?php  if($page!="discounts-add" || $page!="colors-add"){?>



<script src="<?php echo $homeurl;?>assets/js/bootstrap-datepicker.js"></script>   

<script type="text/javascript">





 $(".date-example").datepicker({

        format:"mm/dd/yyyy",

        showTodayButton:true,

         startDate: '-0m',

           defaultDate: new Date(),

        autoclose: true

    }).on('changeDate', function(ev){

         //    $(this).datepicker('hide');

             srid=$(".select_rooms").val();

             $.ajax({

                type:"POST",url:"<?php echo $homeurl;?>get_timings.php",

                data:{srid:srid,srdate:ev.format("yyyy-mm-dd")},

                success:function(data){

                  if(data!="Fail")

                  {

                    $("#app_timings").html(data);

                  }

                  else

                  {

                    alert("Sorry!!! On that day showroom is closed.")

                  }

                }

             });

        });









 $(".date-example2").datepicker({

        format:"mm/dd/yyyy",

        showTodayButton:true,

         startDate: '-0m',

           defaultDate: new Date(),

        autoclose: true

    }).on('changeDate', function(ev){

         //    $(this).datepicker('hide');

             srid=$(".sr_id").val();

             $.ajax({

                type:"POST",url:"<?php echo $homeurl;?>get_timings.php",

                data:{srid:srid,srdate:ev.format("yyyy-mm-dd")},

                success:function(data){

                  $("#up_timings").html(data);

                }

             });

        });







</script>

<?php }?>

<script type="text/javascript">





      $(".product_image").change(function(){







        img=$(this).attr("data-img");







      if(img=="fabric"){$(".pro_images").html("");}







        var fileList = this.files;    







    $(".image-div").toggleClass("hide");







            var anyWindow = window.URL || window.webkitURL;







        







                for(var i = 0; i < fileList.length; i++){







                  //get a blob to play with







                  var objectUrl = anyWindow.createObjectURL(fileList[i]);







                  // for the next line to work, you need something class="preview-area" in your html







                  $('.pro_images').append('<img src="' + objectUrl + '" style="margin-left:10px;margin-top:10px;height:100px;wedth:100px;" />');







                  // get rid of the blob







                  window.URL.revokeObjectURL(fileList[i]);







                }















      });







      







      







      $(".add_row").click(function(){







        t_class=$(this).attr("table-class");







        id=parseInt($(".row_id").val()) + parseInt(1);







        $(".row_id").val(id);







        len=$("."+t_class+" tbody tr").length;







        if(len >= 2)







        {







            $(".del_row").show();







        }







        else







        {







            $(".del_row").hide();







        }







        $.ajax({







            type:"POST",url:"<?php echo $adminurl;?>ajax/ajax.php",







            data:{id:id},







            success:function(data)







            {







                $("."+t_class+" tbody:last").append(data);                







            }







            







        });







        







      });







      







      







      $(".del_row").click(function(){







        t_class=$(this).parent().parent().parent().parent().attr("class");







        t_class=t_class.split(' ');







        t_class=t_class[0];







        len=$("."+t_class+" tbody tr").length;







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















      















      $("a[href^=#]").click(function(e){







          e.preventDefault();







      });







      $(".popup").click(function(){







        href=$(this).attr("data-href");







        $(".example-modal#"+href+" .modal").show();







      });







      $(".delete-data").click(function(){

        table=$(this).attr("data-table");

        field=$(this).attr("data-field");

        id=$(this).attr("data-id");

        $.ajax({







          type:"POST",url:"<?php echo $adminurl;?>ajax/delete.php",







          data:{table:table,id:id,field:field},







          success:function(data)







          {







              location.reload();







              //alert(data);







          }







        });







      });

   

$("form").submit(function(){

  $(this).validate()

  valid=$(this).valid();

  $(".note-msg").html("Please Wait....");

  //return false;

  if(valid!=false)

  {



         tinyMCE.triggerSave();



       class1=$(this).attr("class");

       if(class1=="create-order" || class1=="admin-login" || class1=="customer" || class1=="checkout-form"

        || class1=="admin-photo" || class1=="admin-profile" || class1=="admin-password")

       {

            $(this).submit();

       }



        if(class1!="admin-login" || class1!="create-order")

        {

          $(".popup.save").trigger('click');

               $(".modal-footer").hide();

            $(".popup-body").html("Please Wait.....");



           $.ajax({

              type:"POST",url:"<?php echo $adminurl;?>ajax/form-post.php",

             data: new FormData( this ),

            processData: false,

            contentType: false,

              success:function(data)

              {

//console.log(data);

                if(class1=="create-order")

                {

                  window.location.href="<?php echo $adminurl;?>orders/";

                }

                else if(class1=="note-form")

                {

                  alert("Note has been saved successfully!!!");

                  location.reload();

                }

                if(data=="img_fail")

               {



                     $('html, body').animate({scrollTop: '0px'}, 300);



                  $(".help-block").addClass("alert-danger");



                }

              else

             {

              console.log(data);

                $(".popup.save").trigger('click');

               $(".modal-footer").show();

                $(".popup-body").html("<p>Information has been successfully saved !!!</p>");

             }

              }



           });

             return false;

        }

        else

        { 



        $("form").submit();

       }

  }



      }); 













$(".price-ip").blur(function(){















  var a=this.value.replace(/,/g, "");







    var a=addCommas(a);







    $(this).val(a);







}); 







//$(".price-ip").val(ReplaceNumberWithCommas(2000000000000));







addCommas = function(input){







  // If the regex doesn't match, `replace` returns the string unmodified







  return (input.toString()).replace(







    // Each parentheses group (or 'capture') in this regex becomes an argument 







    // to the function; in this case, every argument after 'match'







    /^([-+]?)(0?)(\d+)(.?)(\d+)$/g, function(match, sign, zeros, before, decimal, after) {















      // Less obtrusive than adding 'reverse' method on all strings







      var reverseString = function(string) { return string.split('').reverse().join(''); };















      // Insert commas every three characters from the right







      var insertCommas  = function(string) { 















        // Reverse, because it's easier to do things from the left







        var reversed           = reverseString(string);















        // Add commas every three characters







        var reversedWithCommas = reversed.match(/.{1,3}/g).join(',');















        // Reverse again (back to normal)







        return reverseString(reversedWithCommas);







      };















      // If there was no decimal, the last capture grabs the final digit, so







      // we have to put it back together with the 'before' substring







      return sign + (decimal ? insertCommas(before) + decimal + after : insertCommas(before + after));







    }







  );







};























$(".image-list").mouseover(function(){







  $(this).find('.image-hover').show();







});







$(".image-list").mouseout(function(){







  $(".image-hover").hide();







});















$(".view-image-btn").click(function(){







    img=$(this).attr("data-img");







    $(".image-div-view").html("<img src='"+img+"'  style='display:block;margin:0 auto;'>");







});















$(".order_type").change(function(){



  val=$(this).val();



  cs=$(" option:selected", this).attr("data-class");



  //alert(cs);

  $(".orderchange-ip").addClass("hide");

  $("."+cs).removeClass("hide");

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







 $(".var_name").change(function(){







          val=$(this).val();















          id=$(this).attr("data-id");







          a=$(".tags"+id).val();







          $(".tags"+id).val(val);















       });















 $(".category").change(function(){







    id=$(this).val();







    $.ajax({







      type:"POST",url:"<?php echo $adminurl;?>ajax/get_subcatgory.php",







      data:{id:id},







      success:function(data)







      {







          $(".sub_cat").html(data);







      }







    });







 });







 $(".do_visible").click(function(){







  table=$(this).attr("data-table");







  field=$(this).attr("data-field");







  where=$(this).attr("data-where");







  value=$(this).attr("data-value");







  id=$(this).attr("data-id");







  $.ajax({







    type:"POST",url:"<?php echo $adminurl;?>ajax/do_visible.php",







    data:{table:table,value:value,id:id,field:field,where:where},







    success:function(data)







    {







      //console.log(data);







      location.reload();







    }







  });







 });















$('.h_pro').on('ifChecked', function(event){







  $(".highlight_product").toggleClass("hide");







});







$('.h_pro').on('ifUnchecked', function(event){







  $(".highlight_product").toggleClass("hide");







  $(".new_img").toggleClass("hide");







});







$(".change_img,.cancel_img").click(function(){







    $(".new_img,.old_img").toggleClass("hide");







});















$(".change_status").click(function(){



  id=$(this).attr("data-id");

  val=$(".st_"+id).val();

  carrier=$(".carrier_"+id).val();

  track=$(".track_"+id).val();

  id=$(this).attr("data-id");

  refund_amount=$(".refund_"+id).val();

  amount = $(this).attr("data-amount");

  $.ajax({

    type:"POST",url:"<?php echo $adminurl;?>ajax/form-post.php",

    data:{id:id,val:val,type:"update_order",carrier:carrier,track:track,amount:amount,refund_amount:refund_amount},

    success:function(data)

    {

      //alert(data);

      location.reload();

    }

  });

});







$(".change_st_btn").click(function(){







  id=$(this).attr("data-id");







  $(this).addClass("hide");





  $(".st_"+id).toggleClass("hide");

  $(".up_"+id).toggleClass("hide");







  







});





$(".apply_promo").click(function()

{

  val=$("#promo-code").val();

  if(val!='')

  {

      $(".coup_msg").html("Please Wait....<br><br>");

      oid=$(this).attr("data-oid");

      user=$(this).attr("data-user-id");

      amt=$(this).attr("data-amt");

      $.ajax({

        type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

        data:{type:"apply_promo",val:val,oid:oid,amt:amt,user:user},

        success:function(data)

        {

          data=data.split("@@@@@");

          $(".coup_msg").html(data[0]+"<br><br>");

          setTimeout(function(){location.reload();},2000);

        }

      });

  }

});





$(".order_discount").on("keyup",function(){

  var discount_val = $(this).val(),

      discount_val = discount_val.replace('$',''),

      order_tot = $(".order_tot").val(),

      order_tot = order_tot - discount_val; 

      ship =  $(".order_tot").attr("data-ship");

      tax =  $(".order_tot").attr("data-tax");

      tax = parseFloat((order_tot / 100) * tax);

      order_tot = parseFloat(order_tot) + parseFloat(tax) + parseFloat(ship),



      len = $("table.price-calc tbody tr td.sub_tot1").length,



      len1 = $("table.price-calc tbody tr td.sub_tot").length;



      if(len!=0)

      {

        var sub_tot = $("table.price-calc tbody tr td.sub_tot1").attr("subtot");

        var sub_tot = parseFloat(sub_tot) - parseFloat(discount_val);

      }

      else

      { 

        var sub_tot = $("table.price-calc tbody tr td.sub_tot").attr("subtot");

        var sub_tot = parseFloat(sub_tot) - parseFloat(discount_val);

      }



      $(".order_tot1").html("<strong>$"+(parseFloat(order_tot)).toFixed(2)+"</strong>");

      //$(".gift_apply,.apply_promo").attr("data-amt",parseFloat(sub_tot).toFixed(2));

});





$(".select_st").change(function(){

  val=$(this).val();

  id=$(this).attr("data-id");

    if(val=="Shipped")

        $(".ip_"+id).toggleClass("hide");

    else if(val=="Refunded")

        $(".refund_"+id).toggleClass("hide");  

});





      </script>















<script type="text/javascript">







$(document).ready(function(){





$(".category12").trigger("change");





   $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({







          checkboxClass: 'icheckbox_flat-pink',







          radioClass: 'iradio_flat-pink'







        });











   });







  $("form#newsletter-form").submit(function(e){



    //e.preventDefault();



    $.ajax({



        type:"POST",url:"<?php echo $homeurl;?>includes/action/action.php",



        data:$("form#newsletter-form").serialize(),



        success:function(data)



        {



            if(data=="success")



            {



                $(".successMessage").toggleClass('hide');



                $(".newsletter-input").val('');



            }



            else



            {



                $(".errorMessage").toggleClass('hide');



                $(".newsletter-input").val('');



            }



        }



    });



    return false;



  });





$(".sales_class").change(function(){

    val=$(this).val();

    $.ajax({

      type:"POST",url:"<?php echo $homeurl;?>cp/ajax-chart.php",

      data:{val:val},

      success:function(data)

      {

        $(".chart").html("");

        $(".chart").html('<canvas id="barChart" style="height: 330px; width: 510px;" width="510" height="230"></canvas>'+data+'</canvas>');

      }

    });

});



$(".p_type").click(function(){

  

  if($(this).val()=="all")

  {

   $(".p_list").removeClass("hide");

   $(".p_type").prop("checked",false);

   $(this).prop("checked",true);

  }

  else

  {



    $('input:checkbox[value="all"]').prop('checked', false);

        if($(".p_type:checked").length > 0)

        {

          $(".p_list").addClass("hide");

          //alert($(this).val());

          $.each($(".p_type:checked"),function(){

            if($(this).val()!='')

            $("."+$(this).val()).toggleClass("hide");

          else

            $(".p_list").toggleClass("hide");

            //alert($(this).val());

          });

        }

        else

        {

          $(".p_list").removeClass("hide");

        }

  }

});





$('input[name="customer"]').click(function(){

  val=$(this).val();

  if(val=="New")

  {

    $(".new_customer").toggleClass("hide");

    $(".old_customer").toggleClass("hide");

  }

  else

  {

    $(".step_4").show();

    $(".new_customer").toggleClass("hide");

    $(".old_customer").toggleClass("hide");

  }

});



$(".user_radio").click(function(){

  val=$(this).val();

    $.ajax({

      type:"POST",url:"<?php echo $adminurl;?>ajax/get_profile.php",

      data:{val:val},

      success:function(data)

      {

        data=data.split("@@@@@");

        $(".user_profile").html(data[0]);

        $(".old_shipping").html(data[1]);

      }

    });

});



$('.select_rooms').on('change',function(){

    $('.calendar2').fullCalendar('rerenderEvents');

    val=$(this).val();

    if(val!=""){

    $(".sr-email-div").removeClass("hide");

    $(".sr-email-div p").addClass("hide");

    $(".sr-email-div p.sr_email_"+val).removeClass("hide");

  }

  else

  {

    $(".sr-email-div").addClass("hide");

  }

})



$(".create-apt").click(function(){

  

  $.ajax({

    type:"POST",url:"<?php echo $homeurl;?>includes/action/action.php",

    data:$("form#apt-add").serialize(),

    success:function(data)

    {

      if(data=='Fail')

      {

       alert("Sorry!!! Already apoointment booked at that time.");

      }

      else

      {

        alert("Appointment booked successfully!!!");

        location.reload();

      }

    }

  });



});





$(".edit_mp").click(function(){

  id=$(this).attr("data-id");



  $.ajax({

    type:"POST",url:"<?php echo $adminurl;?>measurement.php",

    data:{id:id},

    success:function(data)

    {

      $(".mp_body").html(data);

    }

  });

});



$(".save_mp").click(function(){

  $.ajax({

    type:"POST",url:"<?php echo $adminurl;?>ajax/form-post.php",

    data:$("form#mp-form").serialize(),

    success:function(data)

    {

      alert("Measurement Saved Sucessfully!!!");

      location.reload();

    }

  });

});



$(".check_mail").blur(function(){

    val=$(this).val();

    $.ajax({

      type:"POST",url:"<?php echo $adminurl;?>ajax/get_email.php",

      data:{val:val},

      success:function(data)

        {

        if(data=="Fail")

        {

          $(".check_mail_div").html("<span style='color:red;'>Email-ID Already Exists!!!</span>");

          $(".save_btn").hide();

        }

        else if(data=="Success")

        {

          $(".check_mail_div").html("<span style='color:green;'>Email-ID Available</span>");

          $(".save_btn").show(); 

        }

      }

    });

});







$(".add_cart").click(function(){

  pid=$(this).attr("data-pid");

  user=$(this).attr("data-user");

  subid=$(this).attr("data-sid");

  $.ajax({

      type:"POST",url:"<?php echo $adminurl;?>ajax/cart.php",

      data:{pid:pid,userid:user,subid:subid},

      success:function(data)

      {

        $(".cart_succ").toggleClass("hide");

         setTimeout(function(){location.reload();},2000);

      }

  });

});



$(".del_cart").click(function(){

    id=$(this).attr("data-id");
    userid=$(this).attr("data-user-id");
    orderid = $(this).attr("data-order-id");
    rw_count = $("table.cartdiv tr").length-1;

    rw_count1 = $("ul.dropdown-cart li").length-2;

    if(rw_count > 0)
      rw_count=rw_count;
    else
      rw_count=rw_count1;

    console.log(rw_count);

    $.ajax({

      type:"POST",url:"<?php echo $adminurl;?>ajax/form-post.php",

      data:{id:id,order_id:orderid,userid:userid,type:"del_cart1",r_count:rw_count},

      success:function(data)

      {

        location.reload();

      }

    });

});



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

    data:{userid:"<?php echo $_GET['id'];?>"},

    success:function(data)

    {

      $(".save_mp_btn").toggleClass("hide");

      $(".mp_table").html(data);

    }

  });

});



$(".save_mp_btn").click(function(){

  $.ajax({

    type:"POST",url:"<?php echo $adminurl;?>ajax/form-post.php",

    data:$("form.mp_form").serialize(),

    success:function(data)

    {

       alert("Measurement Saved Sucessfully!!!");

       $.ajax({

        type:"POST",url:"<?php echo $adminurl;?>ajax/get_mp_table.php",

        data:{id:"<?php echo $_GET['id'];?>"},

        success:function(data)

        {

           $(".save_mp_btn").toggleClass("hide");

          $(".mp_table").html(data);

        }

       });

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



 $(".update_qty").click(function(){



        id=$(this).attr("data-id");

        qty=$(".q_"+id).val();



        $.ajax({

            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

            data:{id:id,type:"update_cart",qty:qty},

            success:function(data)

            {

                //alert(data);

               // $(".cart-summary tbody tr.cart_"+id).remove();

                location.reload();

            }

        });

    });



  $(".proceed_to_checkout").click(function() {



        var count = 0,

            discount = $("input[name='discount']").val();



        $('input[name="add-measurement"]').each(function(i, val) {

            count++;

        });

    



        var order_id = $('input[name="o_id"]').val();

        if (count <= 0)

        {

          $.ajax({

            type:"POST",

            async:false,

            url: "<?php echo $adminurl; ?>/includes/discountdtl.php",

            data: {discount: discount},

            /*success:function(data) {

                alert(data);

            }*/

        });

           return true;

        }

        else {

            $('#select_mp').modal('show');

          $('#select_mp .modal').show();

            return false;

        }



        



    });



$(".add_fab").click(function(){

$(".loading").append("<p style='text-align:center;'><strong>Please Wait...</strong></p>");

  $.ajax({

    type:"POST",url:"<?php echo $adminurl;?>ajax/default.php",

    data:"",

    success:function(data)

    {

$(".loading").html("");

      console.log(data);

      $(".more_fab").append(data);

    }

  });

});



$(".remove_fab").click(function(){

  $(this).parent().parent().remove();

});



$(".seo_page").change(function(){

  val=$(this).val();

  $.ajax({

    type:"POST",url:"<?php echo $adminurl;?>ajax/form-post.php",

    data:{val:val,type:"get_seo"},

    success:function(data)

    {

      console.log(data);

      if(data!='')

      {

        data=JSON.parse(data);

        $(".p_title").val(data[0]['page_title']);

        $(".p_keyword").val(data[0]['keyword']);

        $(".p_desc").val(data[0]['desc']);

      }

      else

      {

        $(".p_title").val('');

        $(".p_keyword").val('');

        $(".p_desc").val('');

      }

    }

  });

});



$(".create_note").click(function(){

   

   val=$(this).attr("data-id");

    $(".order_id").val(val);

    $.ajax({

      type:"POST",url:"<?php echo $adminurl;?>ajax/form-post.php",

      data:{val:val,type:"get_note"},

      success:function(data)

      {

        //console.log(data);

        data = data.split("@@@");

        if(data[0]!='')

        {

          img_name=data[2].split("/");

          $(".att_img").html(data[1]);

          $(".old_image").val(data[2]);

        }

        $(".note_desc").val(data[0]);

      }

    });

  });





val1=$("input[name='shipping_cost']:checked").val();

if(val1=="0")

{

  $(".ship_price_div").removeClass("hide");

}

else{

  $(".ship_price_div").addClass("hide");

}





$("input[name='shipping_cost']").on('ifChecked', function(event){

  val=$(this).val();

  if(val=="0")

    $(".ship_price_div").toggleClass("hide");

  else

    $(".ship_price_div").toggleClass("hide");



});



$(".sel_option").each(function(){

  day=$(this).attr("data-day");

   val=$(this).val();

   if(val=="1")

    $("."+day+"_div").addClass("hide");

  else

    $("."+day+"_div").removeClass("hide");

});

$(".sel_option").change(function(){

  day=$(this).attr("data-day");

  val=$(this).val();

  if(val=="Closed")

  {

    $("."+day+"_div").toggleClass("hide");

  }

  else

  {

   $("."+day+"_div").toggleClass("hide"); 

  }

});



 $(".sub_category").change(function(){

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

  });



$(".delete-order").click(function()
   {

    var orderid = $(this).attr("data-order-id"),
        omid = $(this).attr("data-om-id"),
        userid=$(this).attr("data-user-id");



    $.ajax({

            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

            data:{omid:omid,order_id:orderid,userid:userid,type:"delete_order"},

            success:function(data)
            {
              location.reload();
            }

        });    


   });

   $(".delete-gift-order").click(function()
   {

    var gcode = $(this).attr("data-gift-code"),
        orderid = $(this).attr("data-order-id"),
        userid = $(this).attr("data-user-id");

    $.ajax({

            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

            data:{gcode:gcode,order_id:orderid,userid:userid,type:"delete_gift_order"},

            success:function(data)
            {
               //alert(data);
              location.reload();
            }

        });    


   });



    $(".del-gift").click(function(){



        id=$(this).attr("data-id");
        userid=$(this).attr("data-user-id");
        orderid = $(this).attr("data-order-id");
        rw_count = $("table.cartdiv tr").length-1;

        rw_count1 = $("ul.dropdown-cart li").length-2;

        if(rw_count > 0)
          rw_count=rw_count;
        else
          rw_count=rw_count1;

    console.log(rw_count);

        //alert(id);

        $.ajax({

            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

            data:{id:id,order_id:orderid,userid:userid,type:"del_gift",r_count:rw_count},

            success:function(data)

            {

                //alert(data);

                $(".cart-summary tbody tr.gift_"+id).remove();

                location.reload();

            }

        });



    });







    $(".update_qty1").click(function(){



        id=$(this).attr("data-id");

        qty=$(".qf_"+id).val();



        $.ajax({

            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

            data:{id:id,type:"update_gift",qty:qty},

            success:function(data)

            {

                //alert(data);

               // $(".cart-summary tbody tr.cart_"+id).remove();

                location.reload();

            }

        });

    });



   $('.gift_check').on('ifChecked', function(event){

  $(".gift_check_div").toggleClass("hide");

});



$('.gift_check').on('ifUnchecked', function(event){

  $(".gift_check_div").toggleClass("hide"); 

});





  $(".gift_apply").click(function(){

    val=$("#gift-code").val();

    amt=$(this).attr("data-amt");

    oid=$(this).attr("data-oid");

    userid=$(this).attr("data-user-id");

    $.ajax({

      type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

      data:{type:"gift_code",val:val,amt:amt,oid:oid,userid:userid},

      success:function(data)

      {

         data=data.split("@@@@@");

        if(data[0]=="Success")

        {

          $(".ordertotal").html("$0.00");

          $(".gift_msg").html("<span style='color:green;'>Congrats!!! Gift Voucher has been applied.</span>");

          setTimeout(function(){location.reload();},1000);

        }

        else

        {

          $(".gift_msg").html(data[0]);

        }

      }

    });

  });





$(".remove_gift").click(function(){

    val=$(this).attr("data-id");

    gid=$(this).attr("data-gid");

    $.ajax({

      type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

      data:{type:"remove_gift",val:val,gid:gid},

      success:function(data)

      {

        alert("Gift Card Voucher removed successfully.");

        location.reload();

      }

    });

});



$(".remove_coupon").click(function(){

    val=$(this).attr("data-cid");

    $.ajax({

      type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

      data:{type:"remove_coupon",val:val},

      success:function(data)

      {

        alert("Coupon removed successfully.");

        location.reload();

      }

    });

});



$(".update-apt").click(function()

{

  aid=$(".a_id").val();

  email=$(".ip_email").val();

  srid=$(".sr_id").val();

  time=$(".ip_time").val();

  time1=$("#up_timings").val();

  date=$(".up_date").val();



  $.ajax({

    type:"POST",url:"<?php echo $homeurl;?>includes/action/action.php",

    data:{type:"update-apt",aid:aid,email:email,srid:srid,time:time,time1:time1,date:date},

    success:function(data)

    {

        if(data=="Fail")

        {

          alert("Sorry !!! Some other appointment has been booked at that time.");

        }

        else

        {

          alert("Success!!! Appointment has been rescheduled.");

          location.reload();

        }

    }

  });



});





$(".resch_btn").click(function(){

  $(".reschedule_div").toggleClass("hide");

});













$(".dis_type").change(function(){



  val=$(this).val();

  cs=$(" option:selected", this).attr("data-class");

  $(".onchange-ip").hide();

  $("."+cs).show();

});

<?php } ?>

</script>







<?php if($page=="colors-add"){?>

<script src="<?php echo $homeurl;?>assets/js/jquery.minicolors.js"></script>

<script type="text/javascript">

 





$(".add_color").click(function(){



  row='<tr>'+

      '<td><input type="text" class="form-control" name="color_name[]" placeholder="Color Name"></td>'+

      '<td><input type="text"  class="form-control my-color" name="color_value[]"'+

            'data-control="hue" value="#000000"></td>'+

      '<td><input type="file" class="form-control" name="col_img[]" placeholder="Color Name"></td>'+

      '<td><a href="javascript:void(0);" class="rem_col btn btn-danger btn-xs">'+

            '<i class="fa fa-trash"></i> Remove'+

          '</a>'+

        '</td>'+

      '</tr>';

      $(".color_table tbody").append(row);

      $(".my-color").minicolors();



});





$(".color_table").on("click",".rem_col",function(){

    $(this).parent().parent().remove();

});

      $(".my-color").minicolors();

</script>

<?php }?>



<script type="text/javascript">

  



$(".sub_category").change(function(){

  val=$(this).val();

    

$.ajax({

  type:"POST",url:"<?php echo $adminurl;?>ajax/get_fabrics.php",

  data:{val:val},

  success:function(data)

  {

    $(".fabric-class").html(data);  

  }

});

  

});





$(".tax_state").change(function(){

  val=$(this).val();

  $.ajax({

    type:"POST",url:"<?php echo $adminurl;?>ajax/get_tax.php",

    data:{val:val},

    success:function(data)

    {

      if(val!='')

        $(".tax_div1").html(data);

      else

        $(".tax_div1").html("");



    }

  });

  

});

$("select[name='subcat_name']").change(function(){
    val = $(this).val();
    if(val=='1' || val=='5')
    {
      $("select[name='style_name']").append("<option value='11'>Jacket Lining</option>");
    }

  });



</script>