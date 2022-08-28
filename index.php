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
    <div class="hader_left"> <a href="http://www.askbangladesh.com/">
      <div class="logo">
        <embed src="images/final-logo-animation.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" play="true" loop="true" scale="showall" wmode="transparent" devicefont="false" bgcolor="#051b45" name="final-logo-animation" menu="true" allowfullscreen="false" allowscriptaccess="sameDomain" salign="" type="application/x-shockwave-flash" width="61" align="middle" height="61"> </embed>
      </div>
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
    <div class="mainbody_left">
      <h1>Build your Career with AskBangladesh.com</h1>
      <br />
      We believe, with the emerging need for more and more information sharing knowledge, awareness, resource sharing, and e-business, the IT application will grow day by day to bring the whole world together in growth and prosperity. Such a demand for growth, learning and achievements will create demand for advance ICT infrastructure so that people can use IT enabled services for the betterment of socio-economic status. This cycle of information and resource flow, generating the demand for better standards and improved ICT infrastructure is the key to development and worldwide digitalization and thus, Ask Bangladesh.Com introduces specialized services with aims to bring a new wave of change and revolution the ICT world. </div>
    <div class="mainbody_right">
      <div class="signup-width">
      <?php 
	  if($_SESSION['resume_id']):
	  
	  echo'
      	<table align="center">
		<tr>
          <td valign="middle"><a href="http://www.akashmail.com"><img src="images/1295762549.png" /></a></td>
          <td valign="middle"><a href="http://www.dressbazar.com"><img src="images/1289631481.jpg" /></a></td>
        </tr>
        <tr>
          <td valign="middle"><a href="http://www.loginbd.com"><img src="images/1289631452.jpg" /></a></td>
          <td valign="middle"><a href="http://www.itbidding.com"><img src="images/1289631443.jpg" border="0" /></a></td>
        </tr>
        <tr>
          <td valign="middle"><a href="http://www.askbazar.com"><img src="images/1289631463.jpg" /></a></td>
          <td valign="middle"><a href="http://www.akashmail.com"><img src="images/1289631452.jpg" /></a></td>
        </tr>
        <tr>
          <td valign="middle"><a href="http://www.itreel.com"><img src="images/1289631470.jpg" /></a></td>
          <td valign="middle"></td>
        </tr>
       
		</table>
		
	  	';
		 else:
		 echo '
		 	<div class="signup">Sign up</div>
			 <form id="form" action="index-error.php" method="POST">
          <table width="304" align="center">
            <tr valign="top">
              <td width="138" align="right">Email</td>
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
			
		 ';
		 endif;
	  ?>
     
      </div>
    </div>
    <div class="clear"></div>
    <div class="joblist">
      <div class="avjob">Available job <span>(
      
      
      <?php 
    //connect to the database server
   require_once("db_connect.php");
   
    $query = "SELECT *FROM jobinformation WHERE status =1 ORDER BY ( jobinformation.jobinformation_id ) DESC";
    	$job = mysql_query($query);
		
    	$coun = mysql_num_rows($job);
		if($coun){
			echo $coun;
			}else{
				echo "Empty Jobs";
				}
    ?>
    )</span></div>
      <table width="545">
        <tr bgcolor="#CCCCCC">
          <td width="322" class="t" align="center"><strong>Job Title</strong></td>
          <td width="84" ><strong>Vacancy</strong></td>
          <td width="123"></td>
        </tr>
      </table>
      <div class="job-over">
        <table width="514" >
          <?php 
       if ($job == null){
       	
       	echo "Empty";
       	
       }else {
       	
       	while ($jobview = mysql_fetch_array($job)){
       		
       		echo '<tr bgcolor="#f5f6f5">';
       		echo '<td width="640" >'.$jobview['job_title'].'</td>';
       		if ($jobview['job_vacancies']>0){
       			
       			echo '<td width="210" align="center" valign="middle" >'.$jobview['job_vacancies'].'</td>';
       			
       		}else {
       			
       			echo '<td width="210" align="center" valign="middle" >&nbsp;</td>';
       			
       		}
       		echo '<td width="144">
            	<img src="images/arrow-icon.png" /><a href="jobview.php?id='.$jobview['jobinformation_id'].'"> Detail..</a>
            </td>';
       		echo "</tr>";
       	}
       	
       }
       ?>         
        </table>
      </div>
    </div>
    <div class="admnt">
      <table align="center">
        <tr>
          <td width="276"><a href="#"><img src="images/Job-offer.jpg" /></a></td>
        </tr>
        <tr>
          <td height="148"><a href="http://www.askbangladesh.com/cms/index/ask-bd-hosting"><img src="images/askbd_hosting.jpg" /></a></td>
        </tr>
		
        <tr>
          <td><a href="http://www.askbangladesh.com/cms/index/ask-bangladesh-software"><img src="images/Reseller_Dealer_Wanted.jpg" /></a></td>
        </tr>
        <tr>
          <td height="81"><a href="http://www.askbangladesh.com/authorize/signup/affiliate"><img src="images/membership.jpg" /></a></td>
        </tr>
        <tr>
          <td height="81"><a href="http://www.askbangladesh.com/authorize/signup/agent"><img src="images/agent.jpg" /></a></td>
        </tr>
        
      </table>
      
    </div>
    <div class="clear"></div>
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
