$(document).ready(function(){

	//alert();

	$("#shipping-form").validate({

		ignore:".select2",

		rules: {

			country: {

                required: true

            },

			firstname:"required",

			lastname:"required",

			address:"required",

			city:"required",

			region:"required",

			state:"required",

			zipcode:"required",

			email:{

				required:true,

				email:true

			},

			phone:"required",

			},

		messages: {

			country:{

				required:"Please Select Your Country",

			},

			firstname:"Please Enter Your Firstname",

			lastname:"Please Enter Your Lastname",

			address:"Please Enter Your Street Address",

			city:"Please Enter Your City",

			region:"Please Enter Your Region",

			zipcode:"Please Enter Your Zipcode",

			email:{

				required:"Please Enter Your Email",

				email:"Please Enter valid Email-ID"

			},

			phone:"Please Enter Your Phone Number",

			state:"Please Enter Your State",

		},

		submitHandler:function(form)

		{

			$.ajax({

	            type:"POST",url:"../../includes/action/ajax.php",

	            data:$("form#shipping-form").serialize(),

	            success:function(data)

	            {

	            	a_id = $("input[name='a_id']").val();
	              //console.log(data);
	               data=data.split("@@@");
	                if(data[0]!='')
	                 	$("input[name='a_id']").val(data[0]);
	                 else
	                 	$("input[name='a_id']").val(a_id);

	               // $(".cart-summary tbody tr.cart_"+id).remove();

	               //location.reload();
	               setTimeout(function(){

	                $(".pay-method1").addClass("hide"); $(".pay-method2").removeClass("hide");

	               $(".pay-method2").addClass("checkout-step-current");

	               $(".pay-method2").removeClass("element-emphasis-weak");

	               $(".pay-method2").removeClass("checkout-step-next");

	               $(".pay-method2").addClass("element-emphasis-strong");

	                 $(".addr2").addClass("hide"); $(".addr1").removeClass("hide");
	                 $(".profile-upload2").addClass("hide"); $(".profile-upload1").removeClass("hide");
	                
	                },1000);

	            }

	        });

		}



		});



	$("#review-form").validate({

		ignore: "not:hidden",

		rules: {

			firstname:"required",

			email:{

				required:true,

				email:true

			},
			city:"required",
			state:"required",
			comments:"required",
			title:"required",

			score_rate:"required"

		},

		messages: {

			firstname:"Please Enter Your Firstname",

			email:{

				required:"Please Enter Your Email-ID",

				email:"Please Enter Valid Email-ID"

			},
			city:"Please Enter Your City",
			state:"Please Enter Your State",
			comments:"Please Enter Your Comments",
			title:"Please Enter Title",

			score_rate:"Please Rate Your Ratings"

		},

		submitHandler:function(form)

		{

			

			$.ajax({

		    			type:"POST",url:"https://customclothiers.com/includes/action/action.php",

		    			data:$("form#review-form").serialize(),

		    			cache:false,

		    			 contentType: "application/x-www-form-urlencoded",

		    			success:function(data)

		    			{
                            $(".post-msg").html("<p style='padding:0px 0px 20px 0px;color:green;font-size:16px;font-weight:bold;margin-top:-25px;float:left;'>Review Added Successfully</p>");
		    				setTimeout(function() {
                                 window.location.href='https://customclothiers.com/reviews/';
                            },2000);
                              
						}
				});
		    }
	   });



	$("#shipping-address").validate({

		rules: {

			country:"required",

			firstname:"required",

			lastname:"required",

			address:"required",

			city:"required",

			region:"required",

			zipcode:"required",

			order_notes:"required"

			},

		messages: {

			country:"Please Select Your Country",

			firstname:"Please Enter Your Firstname",

			lastname:"Please Enter Your Lastname",

			address:"Please Enter Your Street Address",

			city:"Please Enter Your City",

			region:"Please Enter Your Region",

			zipcode:"Please Enter Your Zipcode",

			order_notes:"Please Enter Order Notes",

		}

		});

	$("#payment-options").validate({

		rules: {

			payment_method:"required",

		},

		messages: {

			payment_method:"Please Select One payment Method",

		}

	});





$("#register-form").validate({

		rules: {

			firstname:"required",

			lastname:"required",

			email:{

				required:true,

				email:true

			},
                        mobile:{
                             number:true,
                              required:true,
                            },

			password:{

				required:true,

				maxlength:15,

				minlength:6,

				//pwcheck:true

			},

			cpassword:{

				required:true,

				minlength:6,

				maxlength:15,

				equalTo:"#password",

			},

		},

		messages: {

					firstname:"Please Enter Your Firstname",

					lastname:"Please Enter Your Lastname",

					email:{

						required:"Please Enter Email Address",

						email:"Please Enter valid Email-ID"

					},
                                         mobile:{
                                           number:"Accept Only Numerics",
                                           required:"Please Enter Mobile Number",
                                          },

					password:{

						required:"Please Enter Password",

						minlength:"Atleast 6 Characters to be used.",

						maxlength:"Not Allowed more than 15 Chatracters.",

						//pwcheck:"Allows Aplhebetic Characters Only"

					},

					cpassword:{

						required:"Please Enter Confirm Password",

						equalTo:"Password Mismatch",

						minlength:"Atleast 6 Characters to be used.",

						maxlength:"Not Allowed more than 15 Chatracters."

				},

			}

		});





		$.validator.addMethod("pwcheck", function(value) {

			   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these

			       && /[a-z]/.test(value) // has a lowercase letter

			       && /\d/.test(value) // has a digit

			});

				





				$("#login-form").validate({

					rules: {

						email:{

							required:true,

							email:true

						},

						password:"required"

					},

					messages: {

							email:{

									required:"Please Enter Your Email-ID",

									email:"Please Enter Valid Email-ID"

							},

							password:"Please Enter Your Password"

						}

				});





				$("#ajax-login-form").validate({

					rules: {

						email:{

							required:true,

							email:true

						},

						password:"required"

					},

					messages: {

							email:{

									required:"Please Enter Your Email-ID",

									email:"Please Enter Valid Email-ID"

							},

							password:"Please Enter Your Password"

						},

						submitHandler:function(form)

						{

							$.ajax({

								type:"POST",url:"../../includes/action/action.php",

								data:$("#ajax-login-form").serialize(),

								success:function(data)

								{

									if(data=="log_success")

									{

										location.reload();

									}

									else

									{

										if(data=="not_activated")

										{

											msg="This account is not yet activated!!!";

										}

										else if(data=="log_fail")

										{

											msg="Invalid Username or Password!!!";

										}

										

										$(".error-msg").toggleClass("hide");

										$(".error-msg").html(msg);

									}

								}

							});

						}

				});

				

				$("#account-information").validate({

					rules: {

						firstname:"required",

						lastname:"required",
						email:{

							required:true,

							email:true

						},

						password:{

							required:false,

							maxlength:15,

							minlength:6,

							//pwcheck:true

						},

						password_repeat:{

							required:false,

							minlength:6,

							maxlength:15,

							equalTo:"#password",

						},

					},

					messages: {

						firstname:"Please Enter Your Firstname",

						lastname:"Please Enter Your Lastname",

							email:{

									required:"Please Enter Your Email-ID",

									email:"Please Enter Valid Email-ID"

							},

							password:{

									//required:"Please Enter Password",

									minlength:"Atleast 6 Characters to be used.",

									maxlength:"Not Allowed more than 15 Chatracters.",

									//pwcheck:"Allows Aplhebetic Characters Only"

								},

								password_repeat:{

									//required:"Please Enter Confirm Password",

									equalTo:"Password Mismatch",

									minlength:"Atleast 6 Characters to be used.",

									maxlength:"Not Allowed more than 15 Chatracters."

							},

						}

				});
		$("#track-order-form").validate({
						rules:{
							order_id:"required",
							email:{
								email:true,
								required:true
							}
						},
						messages:{
							order_id:"Please Enter Order ID",
							email:{
								email:"Please Enter Valid Email-ID",
								required:"Please Enter Email-ID "
							}
						}
					});
	$("#gift-card-form").validate({
						rules:{
							amount: {
						      required: true,
						      number: true
						    },
							recp_mail:{
								email:true,
								required:true
							},
							quantity:"required",
							recp_name:"required",
							post_address:"required"
						},
						messages:{
							amount:{
								required:"Please Enter Amount",
								number:"Accpet Only Numbers"
							},
							recp_mail:{
								email:"Please Enter Valid Email-ID",
								required:"Please Enter Recipient Email-ID "
							},
							quantity:"Please Select Quantity",
							recp_name:"Please Enter Recipient Name",
							post_address:"Please Enter Recipient Address",
						}
					});
$("#contact-us-form").validate({
		ignore:'',
						rules:{
							name:"required",
							email:{
								email:true,
								required:true
							},
							subject:"required",
							message:"required",
						},
						messages:{
							name:"Please Enter Name",
							email:{
								email:"Please Enter Valid Email-ID",
								required:"Please Enter Email-ID "
							},
							subject:"Please Enter Subject",
							message:"Please Enter Message",
						}
					});




	});
