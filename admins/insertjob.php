<?php
session_start();

//connect to the database server
require_once("../db_connect.php");

$date = date('Y-m-d');
if(isset($_POST['submit'])){
	
	//insert data in "jobinformation" table
	$query = "INSERT INTO jobinformation (job_title, job_vacancies, job_source, job_location, posting_date, expr_date, salary_range,
				
				job_description, educational_requirements, experience_requirements, additional_requirements, other_benefits, apply_instruction, entry_date , admin_id, status )
 			
			VALUES

 			('".$_POST['job_title']."', '".$_POST['job_vacancies']."', '".$_POST['job_source']."', '".$_POST['job_location']."',
 			
 			'".$_POST['posting_date']."','".$_POST['expr_date']."','".$_POST['salary_range']."', '".$_POST['job_description']."',
 			
 			'".$_POST['educational_requirements']."','".$_POST['experience_requirements']."', '".$_POST['additional_requirements']."',
 			
 			'".$_POST['other_benefits']."','".$_POST['apply_instruction']."', '".$date."',  '".$_SESSION['admin_id']."','".$_POST['publish']."')";
	
	 mysql_query($query);
	 
	 echo '<div style="color:#F00; font-size:12px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">
				Job Post Complete !</div>';
	 include ('all_jobs.php');
}else {
	
	header('Location:home.php');
}