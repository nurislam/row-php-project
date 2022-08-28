<?php
session_start();

if($_SESSION['resume_id']){
	
}else {
	
	header('Location:index.php');
	//include('index.php');
	exit();
}
