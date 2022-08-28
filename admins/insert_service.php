<?php
session_start();
//connect to the database server
require_once("../db_connect.php");

$date = date('Y-m-d');
if(isset($_POST['submit'])){
	
	//insert data in "jobinformation" table
	$query = "INSERT INTO services (services_name, description, remark, services_type, status, entry_date, admin_id)
 			
			VALUES

 			('".$_POST['services_name']."', '".$_POST['description']."', '".$_POST['remark']."', '".$_POST['services_type']."','".$_POST['status']."',
			 '".$date."', '".$_SESSION['admin_id']."')";
	
	 mysql_query($query);
	 
	 echo '<div style="color:#FFF; font-size:12px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">
				Insert your service !</div>';
	 include ('post_service.php');
}else {
	
	header('Location:home.php');
}