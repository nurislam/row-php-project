<?php
session_start();
	//connect to the database server
require_once("db_connect.php");

$query = mysql_query("SELECT education.resume_id, workexperience.resume_id FROM education, workexperience");
	 
	 $blank = mysql_fetch_array($query , $link);
	 
if($blank['resume_id']){
//insert data in "education" table
	$update_education = "UPDATE education  SET
					   secondary = '$_POST[secondary]', se_major = '$_POST[se_major]',
					   se_insname = '$_POST[se_insname]', se_result = '$_POST[se_result]', se_passyear = '$_POST[se_passyear]',
					   higher_secondary = '$_POST[higher_secondary]', hi_major = '$_POST[hi_major]', hi_insname = '$_POST[hi_insname]',
					   hi_result = '$_POST[hi_result]', hi_passyear = '$_POST[hi_passyear]', diploma = '$_POST[diploma]',
					   di_major = '$_POST[di_major]', di_insname = '$_POST[di_insname]', di_result = '$_POST[di_result]',
					   di_passyear = '$_POST[di_passyear]', bachelor = '$_POST[bachelor]', ba_major = '$_POST[ba_major]',
					   ba_insname = '$_POST[ba_insname]', ba_result = '$_POST[ba_result]', ba_passyear = '$_POST[ba_passyear]',
					   masters = '$_POST[masters]', ma_major = '$_POST[ma_major]', ma_insname = '$_POST[ma_insname]',
					   ma_result = '$_POST[ma_result]', ma_passyear = '$_POST[ma_passyear]'
					   
 		where resume_id = {$_SESSION['resume_id']}";
	
	 mysql_query($update_education, $link);
	 
}else{
	
	    $insert_education = "INSERT INTO education (resume_id, secondary, se_major, se_insname, se_result, se_passyear, higher_secondary, hi_major,
		 hi_insname, hi_result, hi_passyear, diploma, di_major, di_insname, di_result, di_passyear, bachelor, ba_major, ba_insname, ba_result,
		 ba_passyear, masters, ma_major, ma_insname, ma_result, ma_passyear)
 			VALUES
 			('".$_SESSION['resume_id']."','".$_POST['secondary']."', '".$_POST['se_major']."', '".$_POST['se_insname']."', '".$_POST['se_result']."',
			'".$_POST['se_passyear']."', '".$_POST['higher_secondary']."', '".$_POST['hi_major']."', '".$_POST['hi_insname']."', '".$_POST['hi_result']."',
			'".$_POST['hi_passyear']."', '".$_POST['diploma']."', '".$_POST['di_major']."', '".$_POST['di_insname']."', '".$_POST['di_result']."',
			'".$_POST['di_passyear']."', '".$_POST['bachelor']."', '".$_POST['ba_major']."', '".$_POST['ba_insname']."', '".$_POST['ba_result']."',
			'".$_POST['ba_passyear']."', '".$_POST['masters']."', '".$_POST['ma_major']."', '".$_POST['ma_insname']."', '".$_POST['ma_result']."',
			'".$_POST['ma_passyear']."')";
	
	 mysql_query($insert_education, $link);
}

