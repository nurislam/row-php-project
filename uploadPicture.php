<?php
	session_start();
	
	// connecting to the database
	require_once("db_connect.php");

		$query = mysql_query("SELECT picture FROM resume WHERE resume_id = '{$_SESSION['resume_id']}'");

	 $result = mysql_fetch_array($query);
	 
	 
		$file = $result['picture'];
		
		unlink($file);
	 
if (!empty($_FILES)) {
	
		
				$tempFile = $_FILES['image']['tmp_name'];
				$targetPath = 'profile/';
				$targetFile =  $targetPath .uniqid() . $_FILES['image']['name'];
				//echo'<pre>';var_dump(is_writable($s_pathFichier)); echo'</pre>';
				move_uploaded_file ($tempFile, $targetFile);
	
				//$datab = 'http://localhost/career/'.$targetFile;
				
				echo $targetFile;
				//profile picture
			
				
	 	mysql_query($update, $link); 
	 	
	 	
	 	//profile picture
			$update = "update resume set
					picture ='$targetFile'
			where resume_id = {$_SESSION['resume_id']} ";	
				
	 	mysql_query($update, $link);
				
			} else {
				
				echo header('Location:home.php');
			}
