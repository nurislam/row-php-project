<?php

//connect to the database server
require_once("../db_connect.php");
	
if($_GET['id'])
{
$id=$_GET['id'];

$jobin = "delete from jobinformation where jobinformation_id='$id'";
	mysql_query($jobin);
	
$job = "delete from jobapply where jobinformation_id='$id'";
	mysql_query($job);

}else{
header('Location:home.php');
}