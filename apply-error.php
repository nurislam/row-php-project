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
  <div class="mainbody_error">
  <div class="email-error">
      <?php
//connect to the database server
require_once("db_connect.php");

	// here we encrypt the password and add slashes if needed
	$_POST['password'] = md5($_POST['password']);
	if (!get_magic_quotes_gpc()) {
		$_POST['password'] = addslashes($_POST['password']);
		$_POST['email'] = addslashes($_POST['email']);
	}
	$usercheck = $_POST['email'];
	$check = mysql_query("SELECT email FROM resume WHERE email= '$usercheck'")
	
	or die(mysql_error());
	$checkmail = mysql_num_rows($check);
	if($checkmail){
		
		echo"Please Signup to apply for this job";
	
	?>
</div>
    <div class="signup-width">
    	<div class="signup">Sign up</div>
        <form id="form" action="insert.php" method="POST">
        <table align="center">
        	<tr valign="top">
            	<td width="134" align="right">Email</td>
                <td width="10">:</td>
              <td width="144"><input name="email" type="text" /></td>
            </tr>
            <tr valign="top">
           	  <td align="right">Password</td>
              <td>:</td>
              <td><input name="password" type="password" id="password" /></td>
          </tr>
            <tr valign="top">
           	  <td align="right">Retype-password</td>
              <td>:</td>
              <td><input name="confirm_password" type="password" /></td>
          </tr>
          <tr valign="top">
           	  <td align="right"></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
          <tr>
           	  <td align="right"></td>
              <td>&nbsp;</td>
              <td><input type="submit" value="Submit" name="submit"  class="btn"/></td>
          </tr>
        </table>
        </form>
        </div>
            <?php
}else{
		//insert data in "resme" table
	$insert_resume = "INSERT INTO resume (email, password)
 			VALUES
 			('".$_POST['email']."', '".$_POST['password']."')";
	 mysql_query($insert_resume);
	 
	  $_SESSION ['se_id'] = mysql_insert_id();
	  
	  header('Location:postresume.php'); 
	}

?>

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
