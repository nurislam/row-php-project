<?php
include('check.php');
//connect to the database server
require_once("../db_connect.php");

$query = mysql_query("SELECT full_name FROM admin WHERE admin_id = '{$_SESSION['admin_id']}' ");

$admin = mysql_fetch_array($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>careerAdmin</title>
<link rel="stylesheet" type="text/css" href="../stylesheets/app.css" />
<!-- javascript -->
<script type="text/javascript" src="../javascripts/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../javascripts/checkall.js"  ></script>
<script type="text/javascript" src="../javascripts/jquery-1.4.4.js"></script>
<script  type="text/javascript" src="../javascripts/jquery.validate.js"></script>
<script type="text/javascript" src="../javascripts/jquery.metadata.js" ></script>
<script type="text/javascript" src="../javascripts/jquery.watermark.js"></script>
<script type="text/javascript" src="../javascripts/jquery.corner.js"></script>
<script type="text/javascript">

$(document).ready(function() {
		// Case 1:
		$('#mainbody').corner("8px top");
		$('.left-menu').corner("5px");
		
		$("#commentForm").validate();
	
	// validate signup form on keyup and submit
	$("#form_1").validate({
		rules: {
			message: "required",
			
		},
		messages: {
			
			message: "Please Write Message ",
			
		}
	});		
});
</script>
</head>

<body>
<div id="container-body">
  <div id="header"> 
    <!-- header start-->
    <div class="hader_left"> <a href="http://www.askbangladesh.com/">
      <div class="logo">
        <embed src="images/final-logo-animation.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" play="true" loop="true" scale="showall" wmode="transparent" devicefont="false" bgcolor="#051b45" name="final-logo-animation" menu="true" allowfullscreen="false" allowscriptaccess="sameDomain" salign="" type="application/x-shockwave-flash" width="61" align="middle" height="61"> </embed>
      </div>
      <img src="images/askbangladesh-logo.png" /></a>
      <div class="clear"></div>
    </div>
    <div class="hader_right">
      <div class="login">
        <?php 
		include("header.php");
		?>
      </div>
    </div>
    <div class="clear"></div>
    <!-- header End--> 
  </div>
  <div id="mainbody"> 
    <!-- main body-->
    <div id="admin">
      <div class="left-menu">
        <ul>
          <li><a href="home.php"  >Home</a></li>
          <li>
            <hr />
          </li>
          <li><a href="postjobs.php" >Post jobs</a></li>
          <li>
            <hr />
          </li>
          <li><a href="all_jobs.php" >View Jobs</a></li>
          <li>
            <hr />
          </li>
          <li><a href="all_applicants.php" >View Applicants</a></li>
          <li>
            <hr />
          </li>
          <li><a href="signup_login.php" >Create Admin Account</a></li>
          <li>
            <hr />
          </li>
          <li><a href="search.php" >Advance Search</a></li>
          <li>
            <hr />
          </li>
          <li><a href="email.php" >Send Email</a></li>
          <li>
            <hr />
          </li>
          <li><a href="post_service.php" >Post Services</a></li>
          <li>
            <hr />
          </li>
          <li><a href="postresume_type.php" >Post Resume Type</a></li>
          <li>
            <hr />
          </li>
          <li><a href="reset_pass.php" class="active">Convert User</a></li>
          <li>
            <hr />
          </li>
          <li><a href="messages.php" >Messages</a></li>
          <li>
            <hr />
          </li>
        </ul>
      </div>
      <div class="admin-body">
        <h1>CareerAskBangladesh</h1>
        <hr/>
        <div class="work-admin">
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
            Select file (CSV) for create new user :
            <input type="file" accept="text/csv" name="sel_file">
            <input type="submit" value="Submit" name="submit1"  class="btn" />
          </form>
          <div class="email">
            <?php
         if(isset($_POST['submit1']))
    	{
			
         $fname = $_FILES['sel_file']['name'];
        #echo '<pre>'; print_r($_FILES); '</pre>';
         $chk_ext = explode(".",$fname);
        #echo '<pre>'; print_r(strtolower($chk_ext[1])); '</pre>';
         if(strtolower($chk_ext[1]) == "csv")
         {
        
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
       
             while ((list($full_name,$country_name,$city,$email,$contact_number,$home_phone,$occupation,$resume_type)= fgetcsv($handle, 1000, ",")) !== FALSE)
             {
                //$full_name = $data[0];
//				$country_name = $data[1];
//				$city = $data[2];
//				$email = $data[3];
//				$contact_number = $data[4];
//				$home_phone = $data[5];
//				$occupation = $data[6];
				
							$usercheck = $email;
							$check = mysql_query("SELECT email FROM resume WHERE email= '$usercheck'")
							or die(mysql_error());
							$checkmail = mysql_num_rows($check);
							if($checkmail){
								 echo $email,'&nbsp;<span style="font-size:15px; color:#F00;"> Already in use !</span><br />'; 
							}else{
							$sql = "INSERT into resume(full_name,country_name,city,email,contact_number,home_phone,occupation,resume_type,status)
									                  VALUES('$full_name','$country_name','$city','$email','$contact_number','$home_phone[5]','$occupation','$resume_type', '1')";
									mysql_query($sql) or die(mysql_error());
							}
             }
       
             fclose($handle);
             echo 'Successfully Imported';
         }else{
             echo '<span style="color:#FFF;">Invalid File</span>';
         }   
    }
?>
            <br />
            <br  />
            <?php
	$empty_fields_message = "<p>Please go back and Add new user.</p>Click <a class=\"two\" href=\"javascript:history.go(-1)\">here</a> to go back";
    
$sql = "SELECT full_name, email FROM resume WHERE password = '0'";
 $resumeinfo = mysql_query($sql);

if (!isset($_POST['submit2'])) {
			
	?>
            <strong>New User :</strong> (
            <?php 
	   
	   $coun = mysql_num_rows($resumeinfo);
	   if($coun == 0):
	   	
			echo '<span style="color:red;">'.'Empty'.'</span>';
		
		else:
			
			echo $coun;
			endif;
	  ?>
            )<br />
            <br />
            <div id="myselect">
              <ul>
                <?php
			  $resumeinfo = mysql_query($sql);
              while ($resume = mysql_fetch_array ($resumeinfo))
					{
						//echo "<option value=\"{$jobtitle['id']}\">{$jobtitle['job_title']}</option>";
						echo '<li>'. $resume['email'].'</li>';
					}
                 ?>
              </ul>
            </div>
            <br />
            <form  action="" method="POST">
              <table>
                <tr>
                  <td valign="top" align="right">From:</td>
                  <td><input name="from" type="text" class="text-large" /></td>
                </tr>
                <tr>
                  <td width="73" align="right">Subject:</td>
                  <td width="415" ><input name="subject" type="text" class="text-large" /></td>
                </tr>
                <tr>
                  <td valign="top" align="right">Message:</td>
                  <td><textarea name="message" rows="10" cols="60"  > </textarea></td>
                </tr>
                <tr>
                  <td valign="top" align="right"></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="submit" value="Send" name="submit2"  class="btn" />
                    Process user account and send mail</td>
                </tr>
              </table>
            </form>
            <?php
	}else{
		
	$subjet = $_POST['subject'];
	$message = $_POST['message'];
	$fromname ='Askbangladesh';
	$headers = 'From: "'.$fromname.'"<'.$_POST['from'].'>"\r\n"';
$res = mysql_query($sql) or die(mysql_error());

	$sendEmails=array();
	
	while( $row = mysql_fetch_assoc($res) ):
	
		$email_address = '"'.$row['full_name'].'"<'.$row['email'].'>';
				
				//create password

    $random_password = randomPassword(); 
    $db_password = md5($random_password); 
	
		$email = $row['email'];
	 #echo '<pre>',$email,'</pre>';	
    $sql = mysql_query("UPDATE resume SET password ='$db_password'  
                WHERE email='$email'");
    
     $mess_body = $message.'\n
	 
	 
	 Your user/email:'.$email.'	 
	 Your Password:'.$random_password.'
	 
    Once logged in you can change your password 
	http://career.askbangladesh.com';
	
	
	if(mail($email_address, $subjet, $mess_body, $headers))
	
		$sendEmails[]=	$row['email'];
	
	endwhile;
	if(count($sendEmails)):
	echo count($sendEmails). ' Messages has been send !';
		else:
		echo '<span style="color:red;">New user Empty, messages dont send  </span>'.$empty_fields_message;
		endif;
		}
					function randomPassword() { 
				  $salt = "abchefghjkmnpqrstuvwxyz0123456789"; 
				  srand((double)microtime()*1000000);  
				  $i = 0; 
				  while ($i <= 7) : 
						$num = rand() % 33; 
						$tmp = substr($salt, $num, 1); 
						$pass = $pass . $tmp; 
						$i++; 
				  endwhile;
				  return $pass; 
			} 
			
?>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <!-- main body End--> 
    
  </div>
  <!--Footer -->
  <div class="footer">
    <div class="footer_resize">
      <p class="leftt"> <a href="http://www.askbangladesh.com/cms/index/terms-and-conditions">Terms and Conditions</a> <a href="http://www.askbangladesh.com/cms/index/privacy-policy">Privacy Policy</a> <a href="http://www.askbangladesh.com/cms/index/return-and-cancellation-policy">Return and Cancellation Policy</a> <a href="http://www.askbangladesh.com/cms/index/hosting-paid-terms-and-conditions">Terms and Conditions</a> <a href="http://www.askbangladesh.com/cms/index/hosting-free-terms-and-conditions">Terms and Conditions</a> <br>
        Copyright © 2010 Ask Bangladesh.com Limited. All Rights Reserved.<br>
        Visitor Count :<img src="images/counter.gif" alt="Ask Bangladesh hit counters" width="80" border="0" height="15"></p>
      <p class="rightt"> <img style="cursor: pointer;" src="images/siteseal_gd_3_h_d_m.gif" onclick="verifySeal();" width="132" height="31"><br>
        <a style="font-family: arial; font-size: 9px; display: none;" href="http://www.godaddy.com/ssl/ssl-certificates.aspx" target="_blank">SSL Certificates</a> </p>
      <p class="rightt"><a href="#"><img src="images/paypal.jpg" alt="paypal logo" width="303" border="0" height="45"></a></p>
      <div class="clear"></div>
    </div>
  </div>
</div>
</body>
</html>
