<?php
//connect to the database server
require_once("../db_connect.php");

$date = date('Y-m-d');
if(isset($_POST['submit'])){
	
	$_POST['password'] = md5($_POST['password']);
	if (!get_magic_quotes_gpc()) {
		$_POST['password'] = addslashes($_POST['password']);
		$_POST['email'] = addslashes($_POST['email']);
	}
	$usercheck = $_POST['email'];
	$check = mysql_query("SELECT email FROM admin WHERE email= '$usercheck'")
	or die(mysql_error());
	$checkmail = mysql_num_rows($check);
	if($checkmail){
		echo '<div style="color:#F00; font-size:12px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">
				Your email adrress already in used !</div>';
	 include ('signup_login.php');
	}else{
	//insert data in "jobinformation" table
	$query = "INSERT INTO admin (full_name, email, password, entry_date)
	
			VALUES

 			('".$_POST['full_name']."', '".$_POST['email']."', '".$_POST['password']."', '".$date."')";
	
	 mysql_query($query);
	 
	 echo '<div style="color:#FFF; font-size:12px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">
				Signup complete !</div>';
	 include ('signup_login.php');
	}
}else {
	
	header('Location:index.php');
}