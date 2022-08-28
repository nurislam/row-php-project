<?php
session_start();

if($_SESSION['se_id']){
	
}else {
	
	 header('Location:index.php');
	//include('index.php');
	exit();
}
