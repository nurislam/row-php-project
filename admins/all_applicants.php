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
<link type="text/css" href="../stylesheets/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	

<!-- javascript -->
<script type="text/javascript" src="../javascripts/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../javascripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="../javascripts/ajax.js"></script>
<script  type="text/javascript" src="../javascripts/jquery.validate.js"></script>
<script type="text/javascript" src="../javascripts/jquery.metadata.js" ></script>
<script type="text/javascript" src="../javascripts/jquery.corner.js"></script>
<script type="text/javascript" src="../javascripts/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../javascripts/jquery-ui-1.8.16.custom.min.js"></script> 	

<script>
	$(function() {
		$( "#dialog-message" ).dialog({
			modal: true,
			autoOpen:false,
			
		});
		//var ajax = "<img class='loading' src='img/load.gif' alt='loading...' />";
		
});
			
			
			function msg(msgid){
			
			//alert(loadUrl);
			//$("#dialog-message").html(loadUrl);			
			$( "#dialog-message" ).dialog("open");
			
			var loadUrl='ajaxload.php';
			$.get(
			loadUrl,
			{id: msgid},
			function(responseText){
				$("#dialog-message").html(responseText);
			});
		//	$("#result").html(loadUrl).load(ajax_load);
			
				return false;
			
			}
			//send message
			$(function() {				
				$(".btn").click(function() {
				var from = $("#from").val();
				var tomsg = $("#tomsg").val();
				var subject = $("#subject").val();
				var message = $("#message").val();
				var dataString = 'from='+ from + '&tomsg=' + tomsg + '&subject=' + subject + '&message=' + message;
				
				if(from=='' || tomsg=='' || subject=='' || message=='')
				{
				
				$('.error').fadeOut(200).show();
				}
				else
				{
				$.ajax({
				type: "POST",
				url: "messages_check.php",
				data: dataString,
				success: function(){
						$( this ).dialog( "close" );
						$('.error').fadeOut(200).hide();
						}
					});
				}
				return false;
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
        <!-- message dialog-->

<div id="dialog-message" title="complete" style="display:none;">
</div>
 
  <h1><strong>View All Applicants</strong><span> (
          <?php 
		  $coun = mysql_query("SELECT resume_id, email FROM resume");
  
		 $counrow = mysql_num_rows($coun);
		 if($counrow):
				echo $counrow;
		else:
				echo '<span style="color:#F00">empty</span>';
		endif;
		?>
          ) </span></h1>
        <hr />
<div class="work-admin">
          <table>
            <tr bgcolor="#cccccc">
              <td width="158" height="26" align="center"><strong>Full Name</strong></td>
              <td width="216" align="center"><strong>Email Address</strong></td>
              <td width="65" align="center"><strong>Type</strong></td>
              <td width="85" align="center"><strong>App jobs</strong></td>
              <td width="152" align="center" colspan="5"><strong>Action</strong></td>
            </tr>
          </table>
          <div class="work-admin-scroll">
            <table>
              <?php
			  $applicants = mysql_query("SELECT resume.resume_id ,resume.full_name, resume.email, resume.status, rt.title,  COUNT( ja.resume_id ) AS TotalJob
					FROM resume
					LEFT OUTER JOIN jobapply AS ja ON ja.resume_id = resume.resume_id 
					LEFT OUTER JOIN resume_type AS rt ON rt.resume_type_id = resume.resume_type 
					GROUP BY resume.full_name, resume.email, rt.title"); 
	  	while($app = mysql_fetch_array($applicants)){
		
				if($app['status']){
		echo '<tr bgcolor="#f5f6f5" class="remove">';
			echo '<td  width="143" height="26" align="left"><a href="javascript:makeRequest('."'file.php?id=".$app['resume_id']."'".')">'.$app['full_name'].'</a></td>';
			echo '<td align="left">'.$app['email'].'</td>';
			echo '<td  width="83" align="left">'.$app['title'].'</td>';
			if($app['TotalJob']){
							echo '<td width="104" align="center"><a href="javascript:makeRequest('."'jobs.php?id=".$app['resume_id']."'".')">'.$app['TotalJob'].'</a></td>';

				}else{
							echo '<td width="104" align="center" class="decolor">Empty</td>';

				}
			
				echo '<td width="43" align="center"><a href="deactive.php?id= '.$app['resume_id'].'">Active</a></td>';
				echo '<td align="center"><a href="add_service.php?id='.$app['resume_id'].'" title="Add Service"><img src="images/plus.png" title="Add Service" /></a></td>';
			}else{
				echo '<tr bgcolor="#f5f6f5" class="remove decolor">';
				echo '<td  width="145" height="26" align="left"><a href="javascript:makeRequest('."'file.php?id=".$app['resume_id']."'".')">'.$app['full_name'].'</a></td>';
				echo '<td align="left">'.$app['email'].'</td>';
				echo '<td  width="86" align="left">'.$app['title'].'</td>';
			
			if($app['TotalJob']){
							echo '<td width="82" align="center"><a href="javascript:makeRequest('."'jobs.php?id=".$app['resume_id']."'".')">'.$app['TotalJob'].'</a></td>';

				}else{
							echo '<td width="82" align="center">Empty</td>';

				}
				echo '<td width="43" align="center" ><a href="active.php?id= '.$app['resume_id'].'">Inactive</a></td>';
				echo '<td align="center"><a href="" title="Not Service"><img src="images/minus.png" title="No Service" /></a></td>';
				}
			echo '<td align="center"><a onclick="msg('.$app['resume_id'].');return false" href="#" class="show" ><img src="images/sms.png" title="Send message" /></a></td>';	
			echo '<td align="center" class="muse"><a href="javascript:dell('.$app['resume_id'].')" onclick="dell ('.$app['resume_id'].');  return false" id="'.$app['resume_id'].'"><img src="images/delete.png" title="Delete resume" /></a></td>';
			
	 echo '</tr>';
			}
			
			  ?>
            </table>
          </div>
          <!-- ajax load-->
          <div id="container">
            <div id="failed">Failed</div>
            <div id="loading">Loading</div>
            <div id="loader"></div>
          </div>
          <!-- ajax load--> 
        </div>
</div>
<div class="clear"></div>
</div>
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
<script type="text/javascript">

function dell (id){

//Built a url to send
var info = 'id=' + id;
 if(confirm("Sure you want to delete this !!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete.php",
   data: info
 });
         $('#'+id).parents(".remove").animate({ backgroundColor: "#5B0000" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;
	
}

</script>
</body>
</html>

</div>
</body>
</html>
