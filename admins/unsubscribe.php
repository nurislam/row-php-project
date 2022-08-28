<?php

//connect to the database server
require_once("../db_connect.php");
	
if($_GET['id'])
{
$id=$_GET['id'];


$appservice = "delete from applicants_services where applicants_services_id='$id'";
	mysql_query($appservice);
}else{
header('Location:home.php');
}