<?php

//connect to the database server
require_once("../db_connect.php");
	
if($_GET['id'])
{
$id=$_GET['id'];

 $sql = "delete from resume where resume_id ='$id'";
	 mysql_query( $sql);

$service = "delete from applicants_services  where resume_id='$id'";
	mysql_query($service);

$education = "delete from education where resume_id='$id'";
	mysql_query($education);

$jobapply = "delete from jobapply where resume_id='$id'";
	mysql_query($jobapply);

$work = "delete from workexperience where resume_id='$id'";
	mysql_query($work);
	

}else{
header('Location:home.php');
}