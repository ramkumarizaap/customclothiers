<script src="<?php echo $homeurl;?>assets/js/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo $homeurl;?>assets/js/moment.js"></script>

<!-- !core -->



<!-- plugins -->

<script src="<?php echo $homeurl;?>assets/js/jquery.flexslider-min.js"></script>



<script src="<?php echo $homeurl;?>assets/js/jquery.isotope.min.js"></script>

<script src="<?php echo $homeurl;?>assets/js/jquery.ba-bbq.min.js"></script>

<!-- !plugins -->

  <script src="<?php echo $homeurl;?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>

  <script src="<?php echo $homeurl;?>assets/js/jquery.raty.min.js"></script>

  <script src="<?php echo $homeurl;?>assets/js/jquery.prettyPhoto.js"></script>

  <script src="<?php echo $homeurl;?>assets/js/chosen.jquery.min.js"></script>

    <script src="<?php echo $homeurl;?>assets/js/bootstrap-datepicker.js"></script>  

    <script type="text/javascript">

    /*$(document).ready(function(){

        $("body .wrapper").hide();

        $(".page_load").show();

    });

    $(window).load(function(){

      $("body .wrapper").show();

      $(".page_load").hide();

    });

    */

    $('.flexslider').flexslider({slideshow: true,slideshowSpeed: 3000});

    $(".date-example").datepicker({

        format:"mm/dd/yyyy",

        showTodayButton:true,

        startDate: '-0m',

          defaultDate: new Date(),

        autoclose: true,          

    }).on('changeDate', function(ev){

         //    $(this).datepicker('hide');

             srid=$(".sr_id").val();

             $.ajax({

                type:"POST",url:"<?php echo $homeurl;?>get_timings.php",

                data:{srid:srid,srdate:ev.format("yyyy-mm-dd")},

                success:function(data){

                    //alert(data);

                    if(data!="Fail")

                      {

                        $("#app_timings").html(data);

                      }

                      else

                      {

                        alert("Sorry!!! On that day showroom is closed.");

                        $(".date-example").val('');

                      }

                }

             });

        });

</script>

<script src="<?php echo $homeurl;?>assets/js/main.js"></script>

<script src="<?php echo $homeurl;?>assets/js/jquery.validate.js"></script>

<script src="<?php echo $homeurl;?>assets/js/validation1.js"></script>

<?php if($page=="add-profile") { ?>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/default1.js" charset="utf-8"></script>

<script src="<?php echo $homeurl;?>assets/js/measures2.js"></script>

<script src="<?php echo $homeurl;?>assets/js/jquery.history.js"></script>



<?php

if(!empty($measurement_full_dtl['mp_height']) && strpos($measurement_full_dtl['mp_height'],'cm')!== FALSE) { ?>

  <script type="text/javascript">

    $('span.iso').trigger('click');

    //$('input[name="height"]').val('');

    

    </script>

<?php } }?>



<?php if($page=="how-it-works" || $page=="wedding") { ?>

  <script src="<?php echo $homeurl; ?>assets/js/jquery.min.js"></script>



  <script src="<?php echo $homeurl; ?>assets/js/jquery.bxslider.js"></script>

  <script type="text/javascript">

$(document).ready(function(){

  $('.slider4').bxSlider({

    slideWidth: 220,

    minSlides: 2,

    auto:true,

    autoStart:true,

    autoDirection:'next',

    maxSlides: 5,

    moveSlides: 1,

    slideMargin: 10

  });

});

</script>

  <?php } ?>



<?php if($page=="customize" || $page=="tab2_fabric" || $page=="tab3_accents") {?>





 <!--

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_suit.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/layerManager2.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_suit_3d.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/jquery.uniform.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/blazy.min.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/select2.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/j.magnifier.js" charset="utf-8"></script>

 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/j.tooltip.js" charset="utf-8"></script>-->



 <script type="text/javascript" src="<?php echo $homeurl;?>assets/js/default.js" charset="utf-8"></script>

 <?php if($_SESSION['p_dtl']['sub_category']=='Suits' || $_SESSION['p_dtl']['sub_category']=='Blazers') { ?>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_suit.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/layerManager2.js" charset="utf-8"></script>



<?php } else if($_SESSION['p_dtl']['sub_category']=='Trousers') { ?>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_pants.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/layerManager2.js" charset="utf-8"></script>





<?php } else if($_SESSION['p_dtl']['sub_category']=='Shirts') { ?>



<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_shirt.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/layerManager.js" charset="utf-8"></script>



<?php } else if($_SESSION['p_dtl']['sub_category']=='Coat') { ?>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_coat.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/man_coat_3d.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/layerManager3.js" charset="utf-8"></script>



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

$(function() {

  var pageTransitions = [['lg-window',1599],['md-window',991],['sm-window',767],['xs-window',766]]; // number shows minimum size - must be from high to low

  function resize() {

    var target = 0,

        w = $(window).width(),

        h = $('html');

    $.each(pageTransitions, function(index, pageTransition) {

        if( w > pageTransition[1]) {

            target = index;

            return false;

        }

    });

    $.each(pageTransitions, function(index, pageTransition) {

        h.removeClass(pageTransition[0]);

    });

    h.addClass(pageTransitions[target][0]);

  }

  resize();

  $(window).on('resize', function() {

    resize();

  });

});

</script>

   

    <script type="text/javascript">

    $(document).ready(function(){



   $('.search_fabric').hideseek();





   		$('a').click(function(e){

 //           e.preventDefault();

        });

    	

    			$.ajax({

    				type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

    				data:{type:"get_cart"},

    				success:function(data)

    				{

    					//console.log(data);

    					data=data.split("@@@@@");

    					$(".cart-div").html(data[0]);

    					$(".item-count").html(data[1]);

    					$(".item-price").html(data[2]);

                        $(".checkout_buttons").html(data[3]);

                        if(data[1]=="0")

                        {

                            $(".checkout_buttons").html("No Items Found.");

                        }

    				}

    			});

    			

    		



    	$(".add-cart").click(function(){



            //pid="<?php echo isset($pro_id[0]['id']);?>";

            id=$(this).attr("data-pid");

            subid=$(this).attr("data-subid");

          //alert(id);

    		$.ajax({

    				type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

        				data:{type:"cart_insert",pid:id,subid:subid},

    				success:function(data)

    				{

                         //alert(data);

                         $.ajax({

                            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

                            data:{type:"get_cart"},

                            success:function(data)

                            {

                                //console.log(data);

                                data=data.split("@@@@@");

                                $(".cart-div").html(data[0]);

                                $(".item-count").html(data[1]);

                                $(".item-price").html(data[2]);

                                $(".checkout_buttons").html(data[3]);

                                if(data[1]=="0")

                                {

                                    $(".checkout_buttons").html("No Items Found.");

                                }

                            }

                        }); 



                        $(".cart_body").html("<img src='<?php echo $homeurl;?>assets/images/loader.gif' style='display:block;margin:0 auto;padding-bottom:20px;'>");

 

                         $('html, body').animate({scrollTop: '0px'}, 300);

    					   $.ajax({

                            type:"POST",url:"<?php echo $homeurl;?>includes/action/cart.php",

                                data:{pid:id,subid:subid},

                            success:function(data)

                            {

                                 console.log(data);

                                $(".cart_body").html(data);

                                $(".modal#cart-poup").modal();

                            }

                        });

    				}

    			});

    	});

    	

    

    $(".del-cart").click(function(){



        id=$(this).attr("data-id");

        table=$(this).attr("data-table");

        field=$(this).attr("data-field");

        orderid=$(this).attr("data-order-id");

       rw_count = $(".cart-summary table tr").length -2;

       console.log(rw_count);

      

        //alert(id);

        $.ajax({

            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

            data:{id:id,type:"del_cart",order_id:orderid,table:table,field:field,r_count:rw_count},

            success:function(data)

            {

                //alert(data);

                $(".cart-summary tbody tr.cart_"+id).remove();

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



    



    $(".add-wishlist").click(function(){

        s_id="";

       if(s_id=="")

        {

            $(".modal-btn").trigger('click');

        }

        else

        {

            pid=$(this).attr("data-pid");id=$(this).attr("data-id");

            $.ajax({

                type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

                data:{type:"add_wishlist",id:id,pid:pid},

                success:function(data)

                {

                    $(".wish-span"+id).html("<a href='<?php echo $homeurl;?>wishlist/' class='btn btn-info btn-mini'>Added to Wishlist</a>");        

                }

            });

        }

    });



$(".del_wish").click(function(){

        

        id=$(this).attr("data-id");

        $.ajax({

            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

            data:{type:"del_wish",id:id},

            success:function(data)

            {

                location.reload();

            }

        });

    });

});



 $("a.confirm-measure").click(function() {

     var order_id = $('input[name="order_id"]').val(),

         orderid1 = $('input[name="order_id1"]').val(),

         id=$('input[name="from_id"]').val(), 

         order_id1=order_id.split("mid-");

         orderid=order_id1[0];mid=order_id1[1];

    

    $.ajax({

      url:"<?php echo $homeurl;?>includes/action/ajax.php",

      type:'POST',

      data: $('#measure_wizard_form').serialize(),

      success: function(data) {

        data=data.split("@@@@@");

        data=data[0];

        if(data == 'Success') {

           if(order_id!='' && id=='cart')

            window.location.href="<?php echo $homeurl; ?>my-measurements/"+mid+"/"+orderid+"/";

           else if(order_id!='' && id!='cart')

            window.location.href="<?php echo $homeurl; ?>shopping-cart/"+orderid1+"/";

          else

           window.location.href="<?php echo $homeurl;?>my-measurements/";

        }

        else {

            alert('Failed to Save');

        }

      }

    });



});





// confirm that it should be deleted

  

$(".confirm").click(function(){



    id=$(this).attr("data-id");

    //alert(id);

    //var del_meaurement = confirm ("Are you sure you want to delete the prfoile?");

    //if(del_meaurement) {

    $.ajax({

        type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

        data:{id:id,type:"del_measurement"},

        success:function(data)

        {

            data=data.split('@@@@@');

            if(data[0] == 'Success')

              location.reload();

            else

              alert('Failed to Delete');

        }

    });

  //}



});



$(".select_measurement").click(function(){



    id=$(this).attr("data-id");

    order_id=$(this).attr("order-id");

    profile_id = $(this).attr("profile-id");

    //alert(id);

    $.ajax({

        type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

        data:{id:id,order_id:order_id,profile_id:profile_id,type:"select_measurement"},

        success:function(data)

        {

            data=data.split("@@@@@");

            if(data[0] == 'Success') 

                window.location.href="<?php echo $homeurl; ?>shopping-cart/"+order_id+"/";            

            else

              alert('Failed to Select Measurement');

        }

    });

  

});



  $(".proceed_to_checkout").click(function() {



        var count = 0;

        $('input[name="add-measurement"]').each(function(i, val) {

            count++;

        });



        var order_id = $('input[name="o_id"]').val();

        if (count <= 0)

            window.location.href = "<?php echo $homeurl; ?>checkout/" + order_id + "/";

        else

            $('#myModals').modal('show');





    });



  $(".customize-product").on('click',function(){



    $("#customize-form").submit();

  });



  $(".custom-edit").on('click',function(){

    var id = $(this).attr('data-id');

    $('.edit_customizer_'+id).submit();

  });





 

  $(".appointment").click(function(){

    id=$(this).attr("data-id");

    $(".sr_id").val(id);

    $("#appointment").modal();

});





   $("form#ajax-apt-form").validate({

    rules:{

        name:"required",

        email:{

            email:true,

            required:true

        },

        phone:"required",

        timings:"required",

        address:"required"

    },

    messages:{

        name:"Please Enter Your Name",

        email:{

            email:"Please Enter Valid Email",

            required:"Please Enter Your Email-ID",

        },

        phone:"Please Enter Your Phone Number",

        timings:"Please Enter Timings",

        address:"Please Enter Your Address"

    },

    submitHandler:function(form){

        $.ajax({

        type:"POST",url:"<?php echo $homeurl;?>includes/action/action.php",

        data:$("#ajax-apt-form").serialize(),

        success:function(data)

        {

            $(".apt_alert").toggleClass("hide");

            if(data=="Success")

            {

                $(".apt_alert").toggleClass("alert-info");

                $(".apt_msg").html("Congrats!!! Appointment has been booked.");

                setTimeout(function(){

                    location.reload();

                },1000);

            }

            else if(data=="Fail")

            {

                $(".apt_alert").toggleClass("alert-danger");

                $(".apt_msg").html("Appointment has been booked on this time.");



            }

            

        }

    }); 

    }



  });





$("input[name='payment-methods']").click(function(){

    val=$(this).val();

    if(val=="paypal")

    {

        url="<?php echo $homeurl;?>paypal/paypal.php";

    }

    else

    {

        url="<?php echo $homeurl;?>includes/action/action.php";

    }

    $(".checkout-form").attr("action",url);

});



  

$('#profile_upload_form').on('submit',function(e){

    e.preventDefault();

    var formObj = $(this);

    var formData = new FormData(this);



    $.ajax({



        type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

        data:formData,

        mimeType:"multipart/form-data",

        contentType: false,

        cache: false,

        processData:false,



        success:function(data)

        {



              $(".addr1").addClass("hide"); $(".addr2").removeClass("hide");



              $(".addr2").addClass("checkout-step-current");



              $(".addr2").removeClass("element-emphasis-weak");



              $(".addr2").removeClass("checkout-step-next");



              $(".addr2").addClass("element-emphasis-strong");



              $(".profile-upload2").addClass("hide"); $(".profile-upload1").removeClass("hide");

              $(".pay-method2").addClass("hide"); $(".pay-method1").removeClass("hide");



          }



    });



});

  

  $(".p_name,.r_date").change(function(){

  pname=$(".p_name").val();

  date=$(".r_date").val();

  $.ajax({

      type:"POST",url:"<?php echo $homeurl;?>get_reviews.php",

      data:{pname:pname,date:date},

      success:function(data)

      {

        console.log(data);

        $(".review-loop").html(data);

      }

  });

});





</script>





<script type="text/javascript">



<?php if($page!="customize"){?>



$(document).ready(function() {

	var s = $("#MainNav");

	var pos = s.position();	

	var stickermax = $(document).outerHeight() - $("#Content").outerHeight() - s.outerHeight() - 0; //40 value is the total of the top and bottom margin

	$(window).scroll(function() {

		var windowpos = $(window).scrollTop();

		//s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);

		if (windowpos >= pos.top && windowpos < stickermax) {

			//s.attr("style", ""); //kill absolute positioning

			$('body').addClass("stick"); //stick it

		} else if (windowpos >= stickermax) {

			$('body').removeClass("stick"); //un-stick

			$('body').addClass("stick"); //stick it

			

		} else {

			$('body').removeClass("stick"); //top of page

		}

	});

	//alert(stickermax); //uncomment to show max sticker postition value on doc.ready

});



<?php } ?>



$("form#newsletter-form").submit(function(e){

    

    $.ajax({

        type:"POST",url:"<?php echo $homeurl;?>includes/action/action.php",

        data:$("form#newsletter-form").serialize(),

        success:function(data)

        {
           console.log(data);
            if(data=="success")

            {

                //$(".successMessage").toggleClass('hide');

                    $(".successMessage").fadeIn('slow');

                    setTimeout(function(){$(".successMessage").fadeOut('slow');},4000);

                 $("form#newsletter-form").trigger('reset');

                //$("form#newsletter-form").reset();



            }

            else

            {

                $(".errorMessage").fadeIn('slow');

                 $("form#newsletter-form").trigger('reset');

                 setTimeout(function(){$(".errorMessage").fadeOut('slow');},4000);

              // $("form#newsletter-form").reset();

            }

        }

    });

    e.preventDefault();

  });







/*Gift Card*/



       $(".del-gift").click(function(){



        id=$(this).attr("data-id");

        orderid=$(this).attr("data-order");

        rw_count = $(".cart-summary table tr").length -2;

       console.log(rw_count);

        

        //alert(id);

        $.ajax({

            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

            data:{id:id,order_id:orderid,type:"del_gift",r_count:rw_count},

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



    $(".gift_check").click(function(){

      if($(this).is(":checked"))

          $(".gift_check_div").removeClass("hide");

      else

        $(".gift_check_div").addClass("hide");

    });





  $(".gift_apply").click(function(){

    val=$("#gift-code").val();

    if(val!='')

    {

        amt=$(this).attr("data-amt");

        oid=$(this).attr("data-oid");

        $.ajax({

          type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

          data:{type:"gift_code",val:val,amt:amt,oid:oid},

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

    }

    else

    {

        $(".gift_msg").html("<span style='color:red;'>Please Enter Gift Voucher Code</span><br><br>");

        $("#gift-code").focus();

    }

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



$("input[name='email_type'],input[name='mail_type']").click(function(){

  type=$(this).attr("data-type");

  val=$(this).val();

  if(val=="email_my" || val=="mail_my")

    $(".mail_div,.email_div").addClass("hide");

  else

  {

    if(type=="mail")

    {

      $(".email_div").addClass("hide");

      $(".mail_div").removeClass("hide");

    }

   else

    {

      $(".mail_div").addClass("hide");

      $(".email_div").removeClass("hide");

    }



  }

});





$(".category").change(function(){







    id=$(this).val();





    $.ajax({







      type:"POST",url:"<?php echo $homeurl;?>get_subcat.php",







      data:{id:id},







      success:function(data)







      {



          $(".sub_cat").html(data);







      }







    });







 });



/*Gift Card*/







$(".apply_promo").click(function()

{

  val=$("#promo-code").val();

  if(val!='')

  {

      $(".coup_msg").html("Please Wait....<br><br>");

      oid=$(this).attr("data-oid");

      amt=$(this).attr("data-amt");

      $.ajax({

        type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",

        data:{type:"apply_promo",val:val,oid:oid,amt:amt},

        success:function(data)

        {



          data=data.split("@@@@@");

        //  alert(data[0]);

        /*  switch(data[0])

          {

            case "Success":

            msg="<span style='color:green;'>Success!!! Coupon has been Applied.</span>";

            break;

            case "Expired":

              msg="<span style='color:red;'>Sorry!!! This coupon has been Expired.</span>";

            break;

            case "Not Activated":

              msg="<span style='color:red;'>Sorry!!! Coupon has not been Activated.</span>";

            break;

            case "Invalid":

              msg="<span style='color:red;'>Sorry!!! Invalid Coupon Code.</span>";

            break;

            case "Already Activated":

              msg="<span style='color:red;'>Sorry!!! You already activated this coupon.</span>";

            break;

          }*/

          $(".coup_msg").html(data[0]+"<br><br>");

          setTimeout(function(){location.reload();},2000);

        }

      });

    }

    else

    {

        $(".coup_msg").html("<span style='color:red;'>Please Enter Coupon Code</span><br><br>");

        $("#promo-code").focus();

    }

});





</script>





<!--<script src="<?php echo $homeurl;?>assets/js/jquery.flexslider1-min.js"></script>-->

<script src="<?php echo $homeurl;?>assets/js/masonry.pkgd.min.js"></script>  

<script src="<?php echo $homeurl;?>assets/js/testimonials.js"></script>  



</body>

</html>







