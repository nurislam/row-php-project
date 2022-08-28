<?php
	session_start();
	
	// connecting to the database
	require_once("db_connect.php");
	 
if (!empty($_FILES)) {
	
		
				$tempFile = $_FILES['image']['tmp_name'];
				$targetPath = 'profile/';
				$targetFile =  $targetPath .uniqid() . $_FILES['image']['name'];
				//echo'<pre>';var_dump(is_writable($s_pathFichier)); echo'</pre>';
				move_uploaded_file ($tempFile, $targetFile);
	
				//$datab = 'http://localhost/career/'.$targetFile;
				
				echo $targetFile;
				//profile picture
			$update = "update resume set
					picture ='$targetFile'
			where resume_id = {$_SESSION['se_id']} ";	
				
	 	mysql_query($update, $link); 
	 	
	 	
	 	
				
	 	mysql_query($update, $link);
				
			} else {
				
				echo header('Location:home.php');
			}
