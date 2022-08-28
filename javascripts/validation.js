
$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();
	
	// validate signup form on keyup and submit
	$("#form").validate({
		rules: {
			full_name: "required",
			publish: "required",
			old_pass: "required",
			status: "required",
			services_name: "required",
			services_type: "required",
			job_title: "required",
			title: "required",
			companyname:"required",
			educational_requirements:"required",
			jobtitle:"required",
			zipcode:"required",
			lastname: "required",
			country: "required",
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 6
			},
			confirm_password: {
				required: true,
				minlength: 6,
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
			full_name: " Enter your full name",
			publish: "Your job must be publish or unpublish",
			status: "Your Service must be publish or unpublish",
			lastname: " Enter your lastname",
			services_name: " Enter Service name",
			services_type: " Select Service Type",
			companyname: "Enter your Company Name",
			zipcode:"Enter your Zip Code",
			jobtitle: "Enter your Job Title",
			job_title: "Enter your Job Title",
			old_pass: "Provide a password",
			title: "Enter your Resume Type Title",
			educational_requirements: "Educational requirements",
			old_pass: {
				required: "Provide a password"
			},
			password: {
				required: "Provide a password",
				minlength: "At least 6 characters"
			},
			confirm_password: {
				required: "Provide a password",
				minlength: "At least 6 characters",
				equalTo: "Please type same password and retype password field"
			},
			email: "Invalid email address",
			agree: "Please accept our policy",
		}
	});
	
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
});
