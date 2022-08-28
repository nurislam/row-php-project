<?php

//connect to the database server
require_once("../db_connect.php");


if(isset($_POST['submit'])){
	
	//insert data in "jobinformation" table
	$query = "UPDATE jobinformation SET 
					job_title = '$_POST[job_title]',
					job_vacancies = '$_POST[job_vacancies]',
					job_source = '$_POST[job_source]',
					job_location = '$_POST[job_location]',
					posting_date = '$_POST[posting_date]',
					expr_date = '$_POST[expr_date]',
					salary_range = '$_POST[salary_range]',
					job_description = '$_POST[job_description]',
					educational_requirements = '$_POST[educational_requirements]',
					experience_requirements = '$_POST[experience_requirements]',
					additional_requirements = '$_POST[additional_requirements]',
					other_benefits = '$_POST[other_benefits]',
					apply_instruction = '$_POST[apply_instruction]',
					status = '$_POST[publish]'
					WHERE jobinformation_id = {$_REQUEST['id']}";
	
	mysql_query($query, $link);
	 
	 echo '<div style="color:#FFF; font-size:12px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">
				Update Complete !</div>';
	 include ('all_jobs.php');
	
}else {
	
	 header('Location:home.php');
}