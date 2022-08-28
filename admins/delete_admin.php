<?php

//connect to the database server
require_once("../db_connect.php");
	
if($_GET['id'])
{
$id=$_GET['id'];

$work = "delete from admin where admin_id='$id'";
	mysql_query($work);
	

}else{
header('Location:home.php');
}