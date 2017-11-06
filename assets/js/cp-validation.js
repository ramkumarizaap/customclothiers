$(document).ready(function(){

	$("#new-customer,#customer-form,#vendor-form,#emp-form").validate({
		ignore:'',
		rules: {
			vendor_name:"required",
			firstname:"required",
			lastname:"required",
			mobile:
				{
					required:true,
					number:true
				},
			email:{
					required:true,
					email:true
				},
			primary_email:{
					required:true,
					email:true
				},
            primary_phone:
            {
            	required:true,
                number:true
            },
			password:"required",
			address1:"required",
			//address2:"required",
			city:"required",
			province:"required",
			state:"required",
			country:"required",
			zipcode:
				{
					required:true,
					number:true
				},
			username:"required",
			password:"required",
			
		},
		messages:{
			vendor_name:"Please Enter Name",
			firstname:"Please Enter the Firstname",
			lastname:"Please Enter the Lastname",
			mobile:
				{
					required:"Please Enter the Mobile Number",
					number:"Only Numbers will Accepted"
				},
			email:
				{
					required:"Please Enter the Email-ID",
					email:"Please Enter valid Email-ID"
				},
			primary_email:
				{
					required:"Please Enter the Email-ID",
					email:"Please Enter valid Email-ID"
				},
            primary_phone:
                { 
                       required: "Please Enter Primary Phone Number",
                       number: "Only Numbers will Accepted"
                },
			password:"Please Enter the Password",
			address1:"Please Enter the Address 1",
			city:"Please Enter the City",
			province:"Please Enter the Province/State/Region",
			state:"Please Enter the Province/State/Region",
			country:"Please Enter the Country",
			zipcode:
				{
					required:"Please Enter the Zipcode",
					number:"Only Numbers will Accepted"
				},
			username:"Please Enter username",
			password:"Please Enter Password",
			
		}
	});

	$("#faq-form").validate({
		ignore: '',
		rules: {
			title:"required",
			description:"required",
		},
		messages:{
			title:"Please Enter Title",
			description:"Please Enter Description",	
		}
		
	});

	$("#seo-form").validate({
		
		rules: {
			page_name:"required",
			page_title:"required",
		},
		messages:{
			page_name:"Please Select Page Name",
			page_title:"Please Enter the Page Title",	
		}
		
	});

	$("#work-form").validate({
		ignore: '',
		rules: {
			title:"required",
			desc:"required",
			userfile:
			{
				required:function(element)
					{
						return $('input[name="old_image"]').val()=="";
					},
			}
		},
		messages:{
			title:"Please Enter Title",
			desc:"Please Enter Description",
			userfile:
			{
				required:"Please Upload Image"
			}
		}
		
	});



	$("#contact-form").validate({
		rules: {
			email:
			{
				required:true,
				email:true
			},
			phone:"required",
			fax:
			{
				required:true,
				number:true
			},
			street1:"required",
			street2:"required",
			city:"required",
			zipcode:
			{
				required:true,
				number:true
			},
			state:"required",
			country:"required",
		},
		messages:{
			email:
			{
				required:"Please Enter Email-ID",
				email:"Please Enter valid Email-ID"
			},
			phone:"Please Enter Phone Number",
			fax:
			{
				required:"Please Enter Fax Number",
				number:"Accepts only numbers."
			},
			street1:"Please Enter Street 1",
			street2:"Please Enter Street 2",
			city:"Please Enter City",
			zipcode:
			{
				required:"Please Enter Zipcode",
				number:"Accepts only numbers."
			},
			state:"Please Enter State/Province/Region",
			country:"Please Enter Country"
		}
		
	});


	$("#color-form").validate({
		ignore: [],
		rules: {
			"subcat_name[]":"required",
			style_name:"required",
			//"color_name[]":"required",
			//"col_img[]":"required"
		},
		messages:{
			"subcat_name[]":"Please choose atleast one Sub Category",
			style_name:"Please Select Style Name",
			//"color_name[]":"Please Enter Color Name",
			//"col_img[]":"Please Upload Image Color"
		}
	});


	$("#product-add").validate({
		ignore: '',
		rules: {

			product_title:"required",
			product_desc:"required",
			product_info:"required",
			price:"required",
			"userfile[]":
				{
					required:function(element){
						return $('input[name="pro_img"]').val()=="";
					},
				},
			"fabric[]":
			{
				required:function(element){
						return $('select[name="sub_category"]').val()!="5";
					},
			},
			category:"required",
			sub_category:"required"
           },
            messages:{
            	product_title:"Please Enter Product Title",
            	product_desc:"Please Enter Product Desc",
            	product_info:"Please Enter Product Additional Information",
            	price:"Please Enter Product Price",
            	"userfile[]":
            		{
            			required:"Please Select Product Images",
            		},
            	"fabric[]":"Select atleast one fabric",
            	category:"Please Select Category",
            	sub_category:"Please Select Sub Category"
            }

        });


	$("#banner-form").validate({
		ignore: '',
		rules: {
			"title":"required",
			desc:"required",
			"userfile":
			{
				required:function(element)
					{
						return $('input[name="old_image"]').val()=="";
					},
			},
		},
		messages:{
			"title":"Please enter banner title.",
			desc:"Please enter banner description.",
			"userfile":
			{
				required:"Please upload banner image."
			}
		}
	});


	$("#showroom-form").validate({
			ignore: '',
			rules: {
				"title":"required",
				"email":
				{
					required:true,
					email:true
				},
				address:"required",
				"userfile":
				{
					required: function(element) 
					 {
				        return $('input[name="olg_image"]').val()=="0";
				     }
				},
				monday_start:
				{
					 required: function(element) 
					 {
				        return $('select[name="mon_sel"]').val()=="0";
				     }
				},
				monday_close:
				{
					required: function(element) 
					 {
				        return $('select[name="mon_sel"]').val()=="0";
				     }
				},

				tuesday_start:
				{
					 required: function(element) 
					 {
				        return $('select[name="tue_sel"]').val()=="0";
				     }
				},
				tuesday_close:
				{
					required: function(element) 
					 {
				        return $('select[name="tue_sel"]').val()=="0";
				     }
				},

				wednesday_start:
				{
					 required: function(element) 
					 {
				        return $('select[name="wed_sel"]').val()=="0";
				     }
				},
				wednesday_close:
				{
					required: function(element) 
					 {
				        return $('select[name="wed_sel"]').val()=="0";
				     }
				},

				thursday_start:
				{
					 required: function(element) 
					 {
				        return $('select[name="thu_sel"]').val()=="0";
				     }
				},
				thursday_close:
				{
					required: function(element) 
					 {
				        return $('select[name="thu_sel"]').val()=="0";
				     }
				},

				friday_start:
				{
					 required: function(element) 
					 {
				        return $('select[name="fri_sel"]').val()=="0";
				     }
				},
				friday_close:
				{
					required: function(element) 
					 {
				        return $('select[name="fri_sel"]').val()=="0";
				     }
				},

				saturday_start:
				{
					 required: function(element) 
					 {
				        return $('select[name="sat_sel"]').val()=="0";
				     }
				},
				saturday_close:
				{
					required: function(element) 
					 {
				        return $('select[name="sat_sel"]').val()=="0";
				     }
				},

				sunday_start:
				{
					 required: function(element) 
					 {
				        return $('select[name="sun_sel"]').val()=="0";
				     }
				},
				sunday_close:
				{
					required: function(element) 
					 {
				        return $('select[name="sun_sel"]').val()=="0";
				     }
				}
			},
			messages:{
				"title":"Please enter showroom name.",
				"email":
				{
					required:"Please Enter Email-ID",
					email:"Please Enter valid Email-ID"
				},
				address:"Please enter showromm address.",
				"userfile":
				{
					required:"Please upload showroom image.",
				},
				monday_start:
				{
					required:"Please Enter Starting Time",
				},
				monday_close:
				{
					required:"Please Enter Closing Time",
				},
				tuesday_start:
				{
					required:"Please Enter Starting Time",
				},
				tuesday_close:
				{
					required:"Please Enter Closing Time",
				},
				wednesday_start:
				{
					required:"Please Enter Starting Time",
				},
				wednesday_close:
				{
					required:"Please Enter Closing Time",
				},
				thursday_start:
				{
					required:"Please Enter Starting Time",
				},
				thursday_close:
				{
					required:"Please Enter Closing Time",
				},
				friday_start:
				{
					required:"Please Enter Starting Time",
				},
				friday_close:
				{
					required:"Please Enter Closing Time",
				},
				saturday_start:
				{
					required:"Please Enter Starting Time",
				},
				saturday_close:
				{
					required:"Please Enter Closing Time",
				},
				sunday_start:
				{
					required:"Please Enter Starting Time",
				},
				sunday_close:
				{
					required:"Please Enter Closing Time",
				}
			}
	});

		$("#fabric-form").validate({
		ignore: '',
		rules: {
			"fabric_name":"required",
			fabric_desc:"required",
			"userfile":
				{	
					required:function(element){
						return $("input[name='old_image']").val()=="";
					},
				},
			fabric_price:"required",
			"default_img[]":"required"
		},
		messages:{
			"fabric_name":"Please enter fabric name.",
			fabric_desc:"Please enter fabric description.",
			"userfile":
				{
					required:"Please upload fabric image.",
				},
			fabric_price:"Please enter fabric price.",
			"default_img[]":"Please Upload fabric default product image."
		}
	});


		$("#discount-form").validate({
		ignore: '',
		rules: {
			"code_name":"required",
			discount_type:"required",
			"discount_amount":
			{
				required:function(element){
					return $("select[name='discount_type']").val()=="Rs.";
				}
			},
			discount_percentage:
			{
				required:function(element){
					return $("select[name='discount_type']").val()=="Discount";
				}
			},
			"order_type":"required",
			order_amount:
			{
				required:function(element){
					return $("select[name='order_type']").val()=="order-over";
				}
			},
			"order_products[]":
			{
				required:function(element){
					return $("select[name='order_type']").val()=="specific-product";
				}
			},
			start_date:"required",
			end_date:"required",
		},
		messages:{
			"code_name":"Please enter code name.",
			discount_type:"Please select discount type.",
			"discount_amount":
			{
				required:"Please enter discount amount.",
			},
			discount_percentage:
			{
				required:"Please enter discount percentage.",
			},
			"order_type":"Please select order type.",
			"order_amount":
			{
				required:"Please enter order over amount.",
			},
			"order_products[]":
			{
				required:"Please choose atleast one product.",
			},
			"start_date":"Please select start date.",
			"end_date":"Please select end date.",
		}
	});
$("#quote-form").validate({
		ignore:'',
		rules:
		 {
			desc:"required",
			q_name:"required",
			q_email:
			{
				required:true,
				email:true
			}
		},
		messages:
		{
			desc:"Please Enter Quote Description",
			q_name:"Please Enter Quoter's Name ",
			q_email:
			{
				required:"Please Enter Quoter's Email-ID",
				email:"Please Enter Valid Email-ID"
			}
		}
	});


	$("#carousel-form").validate({
		ignore:'',
		rules:
		{
			heading:"required",
			userfile:
			{
				required:function(element)
				{
					return $("input[name='old_image']").val()=="";
				}
			},
			desc:"required",
			link:"required",
		},
		messages:
		{
			heading:"Please Enter Carousel Heading",
			userfile:
			{
				required:"Please Upload Carousel Image",
			},
			desc:"Please Enter Carousel Description",
			link:"Please Enter Learn More Link",
		}
	});
	$("#field-form").validate({
		ignore:'',
		rules:
		{
			label_name:"required"
		},
		messages:
		{
			label_name:"Please Enter Measuerement Field Label name"
		}
	});

	$(".checkout-form").validate({
		rules:
		{
			firstname:"required",
			lastname:"required",
			address1:"required",
			city:"required",
			zipcode:
			{
				required:true,
				number:true,
			},
			province:"required",
			country:"required",
		},
		messages:
		{
			firstname:"Please Enter Firstname",
			lastname:"Please Enter Lastname",
			address1:"Please Enter Address 1",
			city:"Please Enter City",
			zipcode:
			{
				required:"Please Enter Zipcode",
				number:"Only Numbers are Accepted"
			},
			province:"Please Select Province",
			country:"Please Select Country",
		},
		submitHandler:function()
		{
			$("#modal1").modal();
		}
	});

});	

