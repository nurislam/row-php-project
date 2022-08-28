<?php
session_start();
//connect to the database server
require_once("../db_connect.php");

if(isset($_POST['submit'])){
	//insert data in "jobinformation" table
	$query = "INSERT INTO resume_type (title, description)
 			
			VALUES

 			('".$_POST['title']."', '".$_POST['description']."')";
	
	 mysql_query($query);
	 echo '<div style="color:#FFF; font-size:12px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">
				Insert Your Resume type!</div>';
	 include ('postresume_type.php');
}else {
	
	header('Location:home.php');
}