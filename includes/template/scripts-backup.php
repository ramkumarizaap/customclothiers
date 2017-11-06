<script src="<?php echo $homeurl;?>assets/js/jQuery-2.1.4.min.js"></script>
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
    <script src="<?php echo $homeurl;?>assets/js/bootstrap-datetimepicker.min.js"></script>  
    <script type="text/javascript">
    $(".date-example").datetimepicker({
      icons:{
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
      }
    });   date=new Date();
            $('.past_date').data("DateTimePicker").minDate(date);
</script>
<script src="<?php echo $homeurl;?>assets/js/main.js"></script>
<script src="<?php echo $homeurl;?>assets/js/jquery.validate.js"></script>
<script src="<?php echo $homeurl;?>assets/js/validation.js"></script>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
<?php if($page=="add-profile" || $page=="customize"){?>

<?php require_once('customizer-js.php');?>
<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/default.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $homeurl;?>assets/js/garment.js" charset="utf-8"></script>
<script src="<?php echo $homeurl;?>assets/js/measures2.js"></script>
<script src="<?php echo $homeurl;?>assets/js/jquery.history.js"></script>

<?php
if(!empty($measurement_full_dtl['mp_height']) && strpos($measurement_full_dtl['mp_height'],'cm')!== FALSE) { ?>
  <script type="text/javascript">
    $('span.iso').trigger('click');
    //$('input[name="height"]').val('');
    
    </script>
<?php } }?>
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

$(".profile_image").change(function(){
    len=this.files.length;
    if(len > 3)
    {
      alert("Allowed only 3 files to Upload");
      $(this).val('');
    }
    else
    {
      return true;
    }
});



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
        //alert(id);
        $.ajax({
            type:"POST",url:"<?php echo $homeurl;?>includes/action/ajax.php",
            data:{id:id,type:"del_cart"},
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

 $("a.confirm-measure").one('click',function() {
     var order_id = $('input[name="order_id"]').val(),
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
            window.location.href="<?php echo $homeurl; ?>shopping-cart/"+orderid+"/";
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
                $(".apt_msg").html("Something went wrong.");
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
    //e.preventDefault();
    $.ajax({
        type:"POST",url:"<?php echo $homeurl;?>includes/action/action.php",
        data:$("form#newsletter-form").serialize(),
        success:function(data)
        {
            if(data=="success")
            {
                $(".successMessage").toggleClass('hide');
                 $("form#newsletter-form").trigger('reset');
                //$("form#newsletter-form").reset();

            }
            else
            {
                $(".errorMessage").toggleClass('hide');
                 $("form#newsletter-form").trigger('reset');
              // $("form#newsletter-form").reset();
            }
        }
    });
    return false;
  });

</script>
</body>
</html>



