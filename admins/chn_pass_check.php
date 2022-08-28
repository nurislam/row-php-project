<?php
include('check.php');
//connect to the database server
require_once("../db_connect.php");

if(isset($_POST['submit'])){
	
	$check = mysql_query("SELECT admin_id, password FROM admin WHERE admin_id = '{$_SESSION['admin_id']}'")
	or die(mysql_error());
	$checkpass = mysql_fetch_array($check);

	$pass = $_POST['old_pass'];
	#$checkpass['password'] == md5('$pass');
	#echo $_POST['old_pass'];
	if( $checkpass['password'] == md5($pass)):
             
	$_POST['password'] = md5($_POST['password']);
	 $query = "UPDATE admin
			 SET
			 email = '$_POST[email]',full_name = '$_POST[full_name]',password = '$_POST[password]'
			 WHERE admin_id = '{$_SESSION['admin_id']}'";
			
	 mysql_query($query);
	 
	 ?><div style="color:#FFF; font-size:12px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">
			Save Change Complete ! </div>
				<?php
				
	 include ('signup_login.php');
	 
		else:
				
				?><div style="color:#F00; font-size:12px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">
				Your old password is not correct ! </div>
				<?php
				
			include ('chn_pass.php');
		endif;
}