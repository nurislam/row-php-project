<?php
 session_start();
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CareerAskBangladesh</title>
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
  <div class="job-title-view"><img src="images/bulletarrow.png" /> <a href="index.php">Back Job view page</a></div>
  <div class="mainbody_error">
 
  <div class="email-error">
      <?php
session_start();
//connect to the database server
require_once("db_connect.php");

	$check = mysql_query("SELECT jobinformation_id FROM jobapply WHERE jobinformation_id = '{$_REQUEST['id']}' and resume_id = '{$_SESSION['resume_id']}'")
	
	or die(mysql_error());
	
	$checkmail = mysql_num_rows($check);
	
if(isset($_SESSION['resume_id']))
	{
		if ($checkmail)
		{
			echo "already apply this job !";
		}else {
$query = "INSERT INTO jobapply (jobinformation_id, resume_id, apply_date)

 			VALUES
 			
 			('".$_REQUEST['id']."', '".$_SESSION['resume_id']."', '".date('Y-m-d')."')";

	 mysql_query($query);
	 
	 echo '<span style=" font-weight:bold; color:#0a214d;">job apply Successfully!!!</span>';
		}
	}else {
		
		header('Location:apply-error.php');
	}
	?>
</div>
  </div>    
    <div class="clear"></div>
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
