<?php
session_start();
	//connect to the database server
require_once("db_connect.php");
	 	$query = mysql_query("SELECT education.resume_id, workexperience.resume_id FROM education, workexperience 
							WHERE 
								education.resume_id =  '{$_SESSION['resume_id']}'");
	 
	 $blank = mysql_fetch_array($query , $link);
	 
 if(isset($_POST['submit'])){
// here we encrypt the password and add slashes if needed
	$_POST['password'] = md5($_POST['password']);
	if (!get_magic_quotes_gpc()) {
		$_POST['password'] = addslashes($_POST['password']);
		$_POST['email'] = addslashes($_POST['email']);
	}
	
			
		$update = "UPDATE resume SET
			password = '$_POST[password]', alt_email ='$_POST[alt_email]', full_name='$_POST[full_name]',  gender ='$_POST[gender]',
			birthday = '$_POST[birthday]', nationality='$_POST[nationality]',  present_address='$_POST[present_address]',
			contact_number ='$_POST[contact_number]', home_phone='$_POST[home_phone]', country_name='$_POST[country_name]',
			position_preference = '$_POST[position_preference]', career_summary='$_POST[career_summary]', other_qualifications='$_POST[other_qualifications]'
			
where resume_id = {$_SESSION['resume_id']}";		
	 
mysql_query($update, $link);
	 

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
if($blank['resume_id']){
	//insert data in "workexperience" table
	$update_work = "UPDATE workexperience SET
					 com_name = '$_POST[com_name]', com_address = '$_POST[com_address]',
					 com_type = '$_POST[com_type]', designation = '$_POST[designation]', position = '$_POST[position]',
					 year_experience ='$_POST[year_experience]', area_experience = '$_POST[area_experience]',
					 work_details = '$_POST[work_details]',
					 com_name_2 = '$_POST[com_name_2]', com_address_2 = '$_POST[com_address_2]',
					 com_type_2 = '$_POST[com_type_2]', designation_2 = '$_POST[designation_2]',
					 position_2 = '$_POST[position_2]', year_experience_2 = '$_POST[year_experience_2]', 
					 area_experience_2 = '$_POST[area_experience_2]', work_details_2 = '$_POST[work_details_2]'
					 
					where resume_id = {$_SESSION['resume_id']}";
	
	mysql_query($update_work, $link);
	
	}else{
 $insert_work = "INSERT INTO workexperience (resume_id, com_name, com_address, com_type, designation, position, year_experience, area_experience, work_details,
 					com_name_2, com_address_2, com_type_2, designation_2, position_2, year_experience_2, area_experience_2, work_details_2)
 			VALUES
 			('".$_SESSION['resume_id']."', '".$_POST['com_name']."', '".$_POST['com_address']."', '".$_POST['com_type']."', '".$_POST['designation']."',
			 '".$_POST['position']."', '".$_POST['year_experience']."', '".$_POST['area_experience']."', '".$_POST['work_details']."', 
			 '".$_POST['com_name_2']."', '".$_POST['com_address_2']."',
			'".$_POST['com_type_2']."', '".$_POST['designation_2']."', '".$_POST['position_2']."', '".$_POST['year_experience_2']."',
			 '".$_POST['area_experience_2']."','".$_POST['work_details_2']."')";
			 
			 mysql_query($insert_work, $link);

 }

	
  echo '<div style="color:#F00; font-size:14px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">
			<div class="update-mess">Update Complete !</div></div>';
	include_once('home.php');
		
 }else {

	echo header('Location:home.php');
 }