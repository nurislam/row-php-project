<?php
 session_start();
 //connect to the database server
require_once("db_connect.php");

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
  <div class="forget">
  	<?php
// This is displayed if all the fields are not filled in
$empty_fields_message = "<p>Please go back and complete all the fields in the form.</p>Click <a class=\"two\" href=\"javascript:history.go(-1)\">here</a> to go back";
// Convert to simple variables  
$email_address = $_POST['email_address'];
if (!isset($_POST['email_address'])) {
?>

<h2>Recover a forgotten password!</h2>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  <p class="style3">
    <label for="email_address">Email:</label>
    <input type="text" title="Please enter your email address" name="email_address" size="30"/>
  </p>
  <p class="btn-forget">
    <label title="Reset Password">&nbsp</label>
	<input type="submit" value="Submit" class="submit-button btn"/>
  </p>
</form>
<?php
}
elseif (empty($email_address)) {
    echo $empty_fields_message;
}
else {
$email_address=mysql_real_escape_string($email_address);
$status = "OK";
$msg="";
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
if (!stristr($email_address,"@") OR !stristr($email_address,".")) {
$msg="Your email address is not correct<BR>"; 
$status= "NOTOK";}

echo "<br><br>";
if($status=="OK"){  $query="SELECT * FROM resume WHERE email = '$email_address'";
$st=mysql_query($query);
$recs=mysql_num_rows($st);
$row=mysql_fetch_object($st);
$em=$row->email_address;// email is stored to a variable
 if ($recs == 0) {  echo "<center><font face='Verdana' size='2' color=red><b>No Password</b><br> Sorry Your address is not there in our database . You can signup and login to use our site. <BR><BR><a href='http://career.askbangladesh.com/'>Register</a> </center>"; exit;}
function makeRandomPassword() { 
          $salt = "abchefghjkmnpqrstuvwxyz0123456789"; 
          srand((double)microtime()*1000000);  
          $i = 0; 
          while ($i <= 7) { 
                $num = rand() % 33; 
                $tmp = substr($salt, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
          } 
          return $pass; 
    } 
    $random_password = makeRandomPassword(); 
    $db_password = md5($random_password); 
     
    $sql = mysql_query("UPDATE resume SET password='$db_password'  
                WHERE email='$email_address'"); 
     
    $subject = "Your password at careeraskbangladesh.com"; 
    $message = "Hi, we have reset your password. 
     
    New Password: $random_password 
     
    http://career.askbangladesh.com
    Once logged in you can change your password 
     
    Thanks! 
     Admin  
	career.askbangladesh
     
    This is an automated response, please do not reply!"; 
     
    mail($email_address, $subject, $message, "From:<admin.career@askbangladesh.com>\n 
        X-Mailer: PHP/" . phpversion()); 
    echo "Your password has been sent! Please check your email!<br />"; 
    echo "<br><br>Click <a href='http://career.askbangladesh.com'>here</a> to login";
 } 
 else {echo "<center><font face='Verdana' size='2' color=red >$msg <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center></font>";}
}
?>
    <div class="clear"></div>
  <!-- main body End-->
  </div>
 
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
