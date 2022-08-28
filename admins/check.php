<?php
session_start();

if($_SESSION['admin_id']){
	
}else {
	
	header('Location:index.php');
	//include('index.php');
	exit();
}
