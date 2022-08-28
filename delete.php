<?php
//connect to the database server
 require_once("db_connect.php");
	
if($_GET['id'])
{
$id=$_GET['id'];

   
   $query2 =mysql_query("UPDATE messages SET 
						status = '0'
						WHERE messages_id = {$_GET['id']}",$link); 
   

}else{
header('Location:home.php');
}