<?php

//connect to the database server
require_once("../db_connect.php");
	
if($_GET['id'])
{
$id=$_GET['id'];


$appservice = "delete from applicants_services where applicants_services_id='$id'";
	mysql_query($appservice);
	
$service = "delete from services where services_id='$id'";

	mysql_query($service);
	

$resume_type = "delete from resume_type where resume_type_id= {$_GET['type_id']}";
	mysql_query($resume_type);


}else{
header('Location:home.php');
}