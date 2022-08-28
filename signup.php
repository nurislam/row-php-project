<?php
 session_start();
 //connect to the database server
require_once("db_connect.php");

$query = mysql_query("SELECT email FROM resume WHERE resume_id = {$_SESSION['se_id']}");

$email_pass = mysql_fetch_array($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>index</title>
<link rel="stylesheet" type="text/css" href="stylesheets/app.css" />
<!-- javascript -->
<script type="text/javascript" src="javascripts/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="javascripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="javascripts/ajax.js"></script>
<script  type="text/javascript" src="javascripts/jquery.validate.js"></script>
<script type="text/javascript" src="javascripts/jquery.metadata.js" ></script>
<script type="text/javascript" src="javascripts/validation.js" ></script>
<script type="text/javascript" src="javascripts/jquery.corner.js"></script>
<script type="text/javascript">

$(document).ready(function() {
		// Case 1:
		$('#mainbody').corner("8px");
		
});
</script>
</head>

<body>
<div id="container-body">
  <div id="header"> 
    <!-- header start-->
    <div class="hader_left">
   <a href="http://www.askbangladesh.com/"> <div class="logo"><embed src="images/final-logo-animation.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" play="true" loop="true" scale="showall" wmode="transparent" devicefont="false" bgcolor="#051b45" name="final-logo-animation" menu="true" allowfullscreen="false" allowscriptaccess="sameDomain" salign="" type="application/x-shockwave-flash" width="61" align="middle" height="61"> </embed></div>
    <img src="images/askbangladesh-logo.png" /></a>
    <div class="clear"></div>
    </div>
    <?php 
	include('header.php');
	?>
    <div class="clear"></div>
    <!-- header End--> 
  </div>
  <div id="mainbody">
  <!-- main body-->
  <div class="mainbody_error">
  <?php
session_start();
	//connect to the database server
require_once("db_connect.php");
if(isset($_POST['submit'])){

//Birthday
	$birthday = $_POST['month'].'-'.$_POST['day'].'-'.$_POST['y'] ;
		//Upate data in "resme" table
	
$update = "UPDATE resume SET
			alt_email ='$_POST[alt_email]', full_name='$_POST[full_name]',  gender='$_POST[gender]',
			birthday = '$birthday', nationality='$_POST[nationality]',  present_address='$_POST[present_address]',
			contact_number ='$_POST[contact_number]', home_phone='$_POST[home_phone]', country_name='$_POST[country_name]',
			position_preference ='$_POST[position_preference]', career_summary='$_POST[career_summary]',
			other_qualifications='$_POST[other_qualifications]', status ='$_POST[status]'
			
where resume_id = {$_SESSION['se_id']}";		
	 
mysql_query($update, $link);

//insert data in "workexperience" table
	$insert_work = "INSERT INTO workexperience (resume_id, com_name, com_address, com_type, designation, position, year_experience, area_experience,
					work_details, com_name_2, com_address_2, com_type_2, designation_2, position_2, year_experience_2, area_experience_2, work_details_2)
 			VALUES
 			('".$_SESSION['se_id']."','".$_POST['com_name']."','".$_POST['com_address']."','".$_POST['com_type']."', '".$_POST['designation']."',
 			'".$_POST['position']."','".$_POST['year_experience']."','".$_POST['area_experience']."', '".$_POST['work_details']."','".$_POST['com_name_2']."',
 			'".$_POST['com_address_2']."','".$_POST['com_type_2']."', '".$_POST['designation_2']."', '".$_POST['position_2']."','".$_POST['year_experience_2']."',
 			'".$_POST['area_experience_2']."', '".$_POST['work_details_2']."')";
	 mysql_query($insert_work, $link);
	 
	  //insert data in "education" table
	$insert_education = "INSERT INTO education (resume_id, secondary, se_major, se_insname, se_result, se_passyear, higher_secondary,
						hi_major, hi_insname, hi_result, hi_passyear, diploma, di_major, di_insname, di_result, di_passyear, bachelor,
						ba_major, ba_insname, ba_result, ba_passyear, masters, ma_major, ma_insname, ma_result, ma_passyear)
 			VALUES
 			('".$_SESSION['se_id']."', '".$_POST['secondary']."','".$_POST['se_major']."','".$_POST['se_insname']."','".$_POST['se_result']."',
 			'".$_POST['se_passyear']."','".$_POST['higher_secondary']."','".$_POST['hi_major']."','".$_POST['hi_insname']."',
 			'".$_POST['hi_result']."','".$_POST['hi_passyear']."','".$_POST['diploma']."','".$_POST['di_major']."',
 			'".$_POST['di_insname']."','".$_POST['di_result']."','".$_POST['di_passyear']."','".$_POST['bachelor']."','".$_POST['ba_major']."',
 			'".$_POST['ba_insname']."','".$_POST['ba_result']."','".$_POST['ba_passyear']."','".$_POST['masters']."','".$_POST['ma_major']."',
 			'".$_POST['ma_insname']."','".$_POST['ma_result']."','".$_POST['ma_passyear']."')";
	
	 mysql_query($insert_education, $link);
	 //send mail
	 $to = $email_pass['email'];
			$subject = "CareerAskbangladesh Signup confirmation";
			$message = "Thank You For Create an Account in CareerAskbangladesh.com 
						   Your Email:'".$email_pass['email']."'
						  ======================================
						 Go to signin.. http://career.askbangladesh.com/";
			$from = "admin.career@askbangladesh.com";
			$headers = "From:" . $from;
			mail($to,$subject,$message,$headers);
	 echo "Your account has been created successfully Check your email.";
	 
		session_unset();
		session_destroy();
}else {
	
	echo header('Location:index.php');
}
	?>
  </div>    
    <div class="clear"></div>
  <!-- main body End-->
 
  </div>
   <!--Footer -->
  <div class="footer">
  	<div class="footer_resize">
        <p class="leftt">
		             <a href="http://www.askbangladesh.com/cms/index/terms-and-conditions">Terms and Conditions</a>
                     <a href="http://www.askbangladesh.com/cms/index/privacy-policy">Privacy Policy</a>
                     <a href="http://www.askbangladesh.com/cms/index/return-and-cancellation-policy">Return and Cancellation Policy</a>
                     <a href="http://www.askbangladesh.com/cms/index/hosting-paid-terms-and-conditions">Terms and Conditions</a>
                     <a href="http://www.askbangladesh.com/cms/index/hosting-free-terms-and-conditions">Terms and Conditions</a>
        <br>
        Copyright © 2010 Ask Bangladesh.com Limited. All Rights Reserved.<br>
         Visitor Count :<img src="images/counter.gif" alt="Ask Bangladesh hit counters" width="80" border="0" height="15"></p>        
<p class="rightt">      
<img style="cursor: pointer;" src="images/siteseal_gd_3_h_d_m.gif" onclick="verifySeal();" width="132" height="31"><br><a style="font-family: arial; font-size: 9px; display: none;" href="http://www.godaddy.com/ssl/ssl-certificates.aspx" target="_blank">SSL Certificates</a>
</p>        
<p class="rightt"><a href="#"><img src="images/paypal.jpg" alt="paypal logo" width="303" border="0" height="45"></a></p>
        <div class="clear"></div>
      </div>
      
  </div>
</div>
</body>
</html>
