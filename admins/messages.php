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
		
		
	function onmess()
	{
		if(confirm('Message flield blank?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
$(".check_field").click(function() {
	
		if ($(".check_field").is(":checked"))	{
	
		$(".otherDevText").attr("disabled", true);
		
		} else {
	
		$(".otherDevText").removeAttr("disabled");
		}
	});
$(".otherDevText").change(function(){
		
		if(($("#item").val() == '0')){
		
			$(".check_field").removeAttr("disabled");
		
		}else{
		
			$(".check_field").attr("disabled" , true);
		}
	});
$("#commentForm").validate();
	
	// validate signup form on keyup and submit
	$("#form_1").validate({
		rules: {
			message: "required",
			from: "required"
			
		},
		messages: {
			
			message: "Please Write Message ",
			from: "Please Write Sender email "
			
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
        <?php include("header.php");?>
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
        <li><hr />
        </li>
        <li><a href="email.php" >Send Email</a></li>
        <li><hr /></li>
        <li><a href="post_service.php" >Post Services</a></li>
        <li><hr /></li>
         <li><a href="postresume_type.php" >Post Resume Type</a></li>
        <li><hr /></li>
        <li><a href="reset_pass.php" >Convert User</a></li>
        <li><hr /></li>
       <li><a href="messages.php" class="active">Messages</a></li>
        <li><hr /></li>

        </ul>
      </div>
      <div class="admin-body">
        <h1>Send Messages</h1>
        <hr/>
        <div class="work-admin">
        <div class="email">
        <?php 
$empty_fields_message = "Click <a class=\"two\" href=\"javascript:history.go(-1)\">here</a> to go back";
#$tem = $_POST['jobid'];
#echo '<pre>'; print_r(implode(",",$_POST['jobid'])); echo '</pre>';

$jobid = @implode(",",$_POST['jobid']);

$sql = "SELECT * FROM jobapply  
INNER JOIN resume ON jobapply.resume_id = resume.resume_id 
INNER JOIN jobinformation ON jobapply.jobinformation_id = jobinformation.jobinformation_id 
WHERE  FIND_IN_SET(jobinformation.jobinformation_id,'$jobid')";

$message = $_POST['message'];
#$all = $_POST['all'];
if (!isset($_POST['submit'])) {
?>

<form  id="form_1" action="" method="POST">

        <?php #echo '<pre>', print_r(),'</pre>';?> 
        <div class="all">
        <span style="float:right;"><strong>Select resume</strong> <select class="otherDevText" id="item" name="all">
        										<option selected="selected" value="0" >Select</option>
                                                <option  value="total" >All resume </option>
                                                </select></span>
        <strong><input  type="checkbox" class="check_field" value="javascript: void(0);" onclick="checkedAll('form_1')"/>
        <!--<a href="javascript: void(0);" onclick="checkedAll('form_1')" class="otherDevText"></a> -->Select All Jobs Categories</strong>
        <div class="clear"></div>
        </div>
        <span style="font-size:14px;">Name All Jobs Categories:</span>
        
        <div id="myselect">
             
              <?php
			  $jobinfo =mysql_query("select jobinformation_id, job_title from jobinformation");
              while ($jobtitle = mysql_fetch_array ($jobinfo))
					{
						//echo "<option value=\"{$jobtitle['id']}\">{$jobtitle['job_title']}</option>";
						echo '<input name="jobid[]" type="checkbox" class="check_field" value="'.$jobtitle['jobinformation_id'].'" /> '.$jobtitle['job_title'].'<br />';
					}
                 ?>
            </div><br />
            <table>
	  	
      <tr>
      <tr>
	   <td valign="top" align="right">From:</td>
	  <td><input name="from" type="text" class="text-large" /></td>
	  </tr>
	   <td width="128" align="right">Subject:</td>
	   <td width="412" > <input name="subject" type="text" class="text-large" /></td>
	   </tr><tr>
	   <td valign="top" align="right">Message:</td>
	  <td><textarea name="message" rows="10" cols="60"  > </textarea></td>
	  </tr><tr>
	  <td></td>
	  <td>&nbsp;</td>
	  </tr><tr>
	  <td></td>
	  <td><input type="submit" value="Send" name="submit"  class="btn" /></td>
	  </tr></table>
            </form>
<?php
}elseif (empty($message)) {
   echo $empty_fields_message;
}elseif ($jobid == 0 && $_POST['all'] == 'total') {
	  $resumeinfo =("select resume_id, full_name, email from resume");
              
	$date = date('Y-m-d');
	$subjet = $_POST['subject'];
	$body = $_POST['message']; #"Askbangladesh <".$_POST['from'].">\n";
	$frommsg =$_POST['from'];
	$resume = mysql_query($resumeinfo) or die(mysql_error());
	$sendEmails=array();
	while( $resumerow = mysql_fetch_assoc($resume) )
	{

		#echo '<pre>',print_r($row),'</pre>';
		
	 $tomsg = $resumerow['resume_id']; 
	  
	//messages
	$query = "INSERT INTO messages (subject, frommsg, body, tomsg, send_date, status )
 			
			VALUES

 			('".$subjet."', '".$frommsg."', '".$body."', '".$tomsg."','".$date."', '1')";
	
	 mysql_query($query);
	
		$sendEmails[]=	$row['resume_id'];
	
	}
	
	echo '&nbsp;'.count($sendEmails).'&nbsp; Email has been send !';
	echo $empty_fields_message ;
  
}else{

	$date = date('Y-m-d');
	$subjet = $_POST['subject'];

	$body = $_POST['message']; #"Askbangladesh <".$_POST['from'].">\n";
	$frommsg =$_POST['from'];
	
	$res = mysql_query($sql) or die(mysql_error());
	$sendEmails=array();
	while( $row = mysql_fetch_assoc($res) )
	{

		#echo '<pre>',print_r($row),'</pre>';
		
	 $tomsg = $row['resume_id']; 
	  
	//messages
	$query = "INSERT INTO messages (subject, frommsg, body, tomsg, send_date, status )
 			
			VALUES

 			('".$subjet."', '".$frommsg."', '".$body."', '".$tomsg."','".$date."', '1')";
	
	 mysql_query($query);
	
		$sendEmails[]=	$row['resume_id'];
	
	}
	
	echo count($sendEmails).'&nbsp; Email has been send !';
	echo $empty_fields_message ;
	}
	
?>
</div>
        </div>
      </div>
      <div class="clear" ></div>
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
