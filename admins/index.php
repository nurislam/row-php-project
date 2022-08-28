
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>careerAdmin</title>
<link rel="stylesheet" type="text/css" href="../stylesheets/app.css" />
<!-- javascript -->
<script type="text/javascript" src="../javascripts/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../javascripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="../javascripts/ajax.js"></script>
<script  type="text/javascript" src="../javascripts/jquery.validate.js"></script>
<script type="text/javascript" src="../javascripts/jquery.metadata.js" ></script>
<script type="text/javascript" src="../javascripts/jquery.corner.js"></script>
<script type="text/javascript">
$().ready(function() {
	
	$('#signup').click (function(){
		
	$('.sign_fld').show();
	$('#signup').hide();
	
	});
	// validate the comment form when it is submitted
	$("#commentForm").validate();
	
	// validate signup form on keyup and submit
	$("#form").validate({
		rules: {
			full_name: "required",
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
			password: {
				required: "Provide a password",
				minlength: "At least 6 characters"
			},
			confirm_password: {
				required: "Provide a password",
				minlength: "At least 6 characters",
				equalTo: "type same password"
			},
			email: "Invalid email address",
			agree: "Please accept our policy",
		}
	});
	
	
	
});

</script>
</head>

<body>
<div id="container-body">
 
  <div id="admin-mainbody"> 
    <!-- main body-->
    <div class="admin-login">
    <form  action="login.php" method="POST">
    <table align="center">
    	<tr>
        	<td width="151" height="32" align="right" valign="top">Email Address :</td>
            <td width="144" valign="top"><input name="email" type="text" /></td>
        	<td width="91">&nbsp;</td>
        </tr>
        <tr>
        	<td height="30" align="right" valign="top">Password :</td>
            <td valign="top"><input name="password" type="password" id="password" /></td>
            <td>&nbsp;</td>
        
        </tr>
       
        <tr>
        	<td align="right" valign="top"></td>
            <td align="center" valign="top"><input type="submit" value="Submit" name="submit"  class="btn"/></td>
            <td>&nbsp;</td>
        
        </tr>
    </table>
    </form>
    
    </div>
    <!-- main body End--> 
    
  </div>
<!--Footer --></div>
</body>
</html>
