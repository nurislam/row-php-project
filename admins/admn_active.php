<?php
//connect to the database server
require_once("../db_connect.php");

		$query = mysql_query("SELECT *FROM admin WHERE admin_id= {$_GET['id']}");
			  
			 $showadmin = mysql_fetch_array($query);
			 
if(isset($_GET['id'])){
	
	
	if( $showadmin ['status'] == 1):
	
	$active= "UPDATE admin SET  status = '0' 
				
		      WHERE	admin_id = {$_GET['id']}";
	
			mysql_query($active, $link);
			
	elseif($showadmin ['status'] == 0):
	
	$active= "UPDATE admin SET  status = '1' 
			
		      WHERE	admin_id = {$_GET['id']}";
	
			mysql_query($active, $link);
	endif;
		header('Location:signup_login.php');
	
}else {
	
 header('Location:home.php');
}
