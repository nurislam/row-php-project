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
<script type="text/javascript" src="../javascripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="../javascripts/ajax.js"></script>
<script  type="text/javascript" src="../javascripts/jquery.validate.js"></script>
<script type="text/javascript" src="../javascripts/jquery.metadata.js" ></script>
<script type="text/javascript" src="../javascripts/validation.js" ></script>
<script type="text/javascript" src="../javascripts/jquery.corner.js"></script>
<script type="text/javascript">

$(document).ready(function() {
		// Case 1:
		$('#mainbody').corner("8px top");
		$('.left-menu').corner("5px");
		$('.add_service').corner("5px");
		
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
          <li><a href="all_applicants.php" class="active">View Applicants</a></li>
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
       <li><a href="messages.php" >Messages</a></li>
        <li><hr /></li>

        </ul>
      </div>
      <div class="admin-body">
        <h1>Add resume type and services </h1>
        <hr/>
        <div class="work-admin">
          <?php

		if (!isset($_POST['submit'])) {
			
			?>
          <form action="" method="post">
            <?php 
	  $type = mysql_query("SELECT * FROM resume 
INNER JOIN resume_type ON resume_type.resume_type_id = resume.resume_type
WHERE resume.resume_id = '{$_GET['id']}'");
	   $resume = mysql_fetch_array($type);
	   
	   	   ?>
            <input type="hidden" value="<?php echo $_GET['id'];?>" name="id" />
            <table>
              <tr>
                <td width="344" align="center"><strong>
                  <?php 
			if($resume['title']){
			
			echo $resume['full_name'],'&nbsp;&nbsp;|&nbsp;',$resume['title'];
			
			}else{
				echo "Please Select Resume type";
				
				}?>
                  </strong></td>
                <td width="346" align="right">Change type :
                  <select name="resume_type">
                 <option value="<?php echo $resume['resume_type'];?>">Select</option>
                    <?php 
			$query = mysql_query("SELECT * FROM resume_type");
			
			while($retitle = mysql_fetch_array($query)){
				
				echo "<option value=\"{$retitle['resume_type_id']}\">{$retitle['title']}</option>";
				}
			?>
                  </select>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><strong>Your services</strong> (
                  <?php 
		$applicant = mysql_query("SELECT * FROM applicants_services  
	INNER JOIN resume ON applicants_services.resume_id = resume.resume_id 
	INNER JOIN services ON applicants_services.services_id = services.services_id 
	WHERE resume.resume_id = '{$_GET['id']}'");

		$coun = mysql_num_rows($applicant);
	   if($coun == 0):
	   	
			echo '<span style="color:#F00;">Empty</span>';
		
		else:
			
			echo $coun;
			
			endif;
		?>
                  )
                  <hr />
                  <br />
                  <div class="show_service">
                    <ul>
                      <?php
	
   while($app = mysql_fetch_array($applicant)){
	 
	   echo '<li class="remove">'.$app['services_name'].' <a href="javascript:subscribe('.$app['applicants_services_id'].')" onclick="subscribe ('.$app['applicants_services_id'].');  return false" id="'.$app['applicants_services_id'].'" class="minus" title="Unsubsccribe">-</a></li>';
	 
 }
	
?>
                    </ul>
                  </div></td>
              </tr>
            </table>
            <div class="add_service"> <strong>Add To Available Service</strong> (
              <?php 
		$query = mysql_query("select * from services where services_id not in (select services_id from applicants_services where resume_id = '{$_GET['id']}')");
					$coun = mysql_num_rows($query);
					   if($coun == 0):
						
							echo '<span style="color:#F00;"><em>Empty</em></span>';
						
						else:
			
			echo $coun;
			
			endif;
		?>
              )
              <table>
                <tr>
                  <td width="689"><ul>
                      <?php 
		
		while($service = mysql_fetch_array($query)){
	 
	   echo '<li class="remove"><input name="serviceid[]" type="checkbox" value="'.$service['services_id'].'" />'.$service['services_name'].'</li>';
	 
		 }
		?>
                    </ul></td>
                </tr>
              </table>
            </div>
            <div class="service_add">
              <input type="submit" value="Done" name="submit"  class="btn"/>
            </div>
          </form>
          <?php
			}else{
				
		 ?>
          <?php
	$empty_fields_message = "<p> </p>Click <a class=\"two\" href=\"javascript:history.go(-1)\">here</a> to go back";

$date = date('Y-m-d');

$serviceid = $_POST['serviceid'];

 
if(isset($_POST['submit'])){
	
	//insert data in "jobinformation" table
	for($i=0; $i<sizeof($serviceid); $i++){
		
		$query = "INSERT INTO applicants_services (resume_id, services_id, admin_id, entry_date)
 			
			VALUES

 			('".$_POST['id']."', '".$serviceid[$i]."', '".$_SESSION['admin_id']."', '".$date."')";
	 
mysql_query($query) or die(mysql_error());
}
	
	 
	 $query = "UPDATE resume SET
					resume_type = '$_POST[resume_type]'
					WHERE resume_id = {$_POST['id']}";
	
	mysql_query($query, $link);
	 
	echo ' insert Service and resume type!<br />';
   echo	$empty_fields_message;
 
	 
}
		 }
		 ?>
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
<script>
   function dell (id)
{

//Built a url to send
var info = 'id=' + id;
 if(confirm("Are you sure do this !!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_service.php",
   data: info,
   success: function(){
   	
   }
 });
         $('#'+id).parents(".remove").animate({ backgroundColor: "#5B0000" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

}
//unsubscribe
   function subscribe (id)
{

//Built a url to send
var info = 'id=' + id;
 if(confirm("Are you sure do this !!"))
		  {

 $.ajax({
   type: "GET",
   url: "unsubscribe.php",
   data: info,
   success: function(){
   	
   }
 });
         $('#'+id).parents(".remove").animate({ backgroundColor: "#5B0000" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

}
        </script>
</body>
</html>
