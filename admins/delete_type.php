<?php

//connect to the database server
require_once("../db_connect.php");
	
if($_GET['id'])
{
$id=$_GET['id'];

$resume_type = "delete from resume_type where resume_type_id= '$id'";
	mysql_query($resume_type);


}else{
header('Location:home.php');
}