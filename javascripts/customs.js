/*
Md. Nur Islam Khan.
mail: nurislam.cse@gmail.com
*/
$(document).ready (function (){
	
	$('.picture img').corner("5px");
	$('.change_pic').corner("3px");
	$('#add_expr').corner("5px");
	$('#hide_expr_button').corner("5px");
	$('#add_edu').corner("5px");
	$('#hide_edu_button').corner("5px");
	$('#Add_diploma').corner("5px");

	$('#add_expr').click (function (){
	
			$('#hide_expr').show ();
			$('#hide_expr_button').show ();
			$('#add_expr').hide();
			
	});
	$('#hide_expr_button').click (function (){
	
			$('#add_expr').show ();
			$('#hide_expr_button').hide ();
			$('#hide_expr').hide();
			
	});
	$('#add_edu').click (function (){
	
			$('#hide_edu_history').show ();
			$('#show_diploma_button').show();
			$('#add_edu').hide ();
			$('#hode-td').hide ();
			
			
	});
	$('#Add_diploma').click (function (){
	
			$('#hide_diploma_history').show ();
			$('#show_hide_button').show();
			$('#show_diploma_button').hide();
			
	});
	
	
	// validate the comment form when it is submitted
	$("#commentForm").validate();
	
	// validate signup form on keyup and submit
	$("#form").validate({
		rules: {
			full_name: "required",
			country_name:"required",
			contact_number: "required",
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			full_name: " Enter your Full name",
			contact_number: "your Contact Number",
			country_name: "Enter your country name",
			username: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			password: {
				required: "Provide a password",
				minlength: "At least 5 characters"
			},
			confirm_password: {
				required: "Provide a password",
				minlength: "At least 5 characters",
				equalTo: "Same password as above"
			},
			email: "Invalid email address",
			agree: "Please accept our policy"
		}
	});
	
});
