<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>index</title>
<link rel="stylesheet" type="text/css" href="stylesheets/app.css" />
<!-- javascript -->
<script type="text/javascript" src="javascripts/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="javascripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="javascripts/ajax.js"></script>
<script  type="text/javascript" src="javascripts/jquery.validate.js"></script>
<script type="text/javascript" src="javascripts/jquery.metadata.js" ></script>
<script type="text/javascript" src="javascripts/validation.js" ></script>
<script type="text/javascript" src="javascripts/jquery.corner.js"></script>

<?php

	// connecting to the database
	
	require("login_check.php");
	//$query = "SELECT status FORM resume WHERE id = {$_POST['email']}";
		
		// $status = mysql_query($query);
		

 if(log_in_check($_POST['email'], $_POST['password']))
 {
	 	header("Location:home.php");
	 	
	 } elseif (!$_POST['email'] | $_POST['pasword'])
	 
		 {
		 	echo '<div style="color:#F00; font-size:12px; position:absolute; right: 230px; top: 8px; font-family:Verdana, Geneva, sans-serif;">
						Email or Password field is Empty</div>';
		 	include('index.php');
		 }
	 else {
	 	
	 	echo '<div style="color:#F00; font-size:12px; position:absolute; right: 230px; top: 8px; font-family:Verdana, Geneva, sans-serif;">
				Email or password is not valid</div>';
	 	include('index.php');
 		
 }
 ?>
</body>
</html>
