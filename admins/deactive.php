<?php
//connect to the database server
require_once("../db_connect.php");

if(isset($_GET['id'])){
	
	
	$active= "UPDATE resume SET  status = '0' 
				
		      WHERE	resume_id = {$_GET['id']}";
	
			mysql_query($active, $link);
	
	header('Location:all_applicants.php');
	
}else {
	
 header('Location:home.php');

}
	 
	
//function updateresume($id, $status)
	//{
		//$result;
		
	//	$result = "UPDATE resume SET  status = $status 
		//			
			//      WHERE	id = $id";
		
		//		mysql_query($result, $link);
		
	//	return $result;
//	}




