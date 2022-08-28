<?php
//connect to the database server
require_once("../db_connect.php");

if(isset($_POST)){
	
//$resumeinfo =mysql_query("select resume_id from resume");
//$resumerow = mysql_fetch_assoc($resumeinfo);

	$date = date('Y-m-d');
	$tomsg = $_POST['tomsg'];
	$subjet = $_POST['subject'];
	$body = $_POST['message']; #"Askbangladesh <".$_POST['from'].">\n";
	$frommsg =$_POST['from'];
	
	
	//messages
	$query = "INSERT INTO messages (subject, frommsg, body, tomsg, send_date, status)
 			
			VALUES

 			('".$subjet."', '".$frommsg."', '".$body."', '".$tomsg."','".$date."', '1')";
	
	 mysql_query($query);
	
		$sendEmails[]=	$row['resume_id'];
		echo '&nbsp;'.count($sendEmails).'&nbsp; Message has been send !';
}else{
	echo '<span style="color:#F00;">No message send</span>';
	}
	
?>