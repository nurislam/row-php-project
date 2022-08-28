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
          <li><a href="home.php" >Home</a></li>
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
         <li><a href="postresume_type.php" class="active">Post Resume Type</a></li>
        <li><hr /></li>
        <li><a href="reset_pass.php" >Convert User</a></li>
        <li><hr /></li>
       <li><a href="messages.php" >Messages</a></li>
        <li><hr /></li>

        </ul>
      </div>
      <div class="admin-body">
        <h1>Post Resume Type</h1>
        <hr/>
        <div class="post_type">
        <form  id="form" action="insert_type.php" method="post">
        <table>
            <tr>
              <td width="31">&nbsp;</td>
              <td width="178" align="right">Resume Type Title <span>*</span> :</td>
              <td width="358"><input type="text" name="title" /></td>
              <td width="13"></td>
            </tr>
            <tr>
              <td width="31">&nbsp;</td>
              <td width="178" align="right">Description :</td>
              <td width="358"><input type="text" name="description" /></td>
              <td width="13"></td>
            </tr>
           
            <tr>
              <td width="31">&nbsp;</td>
              <td width="178" align="right"></td>
              <td width="358" ><input type="submit" value="Submit" name="submit"  class="btn"/></td>
              <td width="13"></td>
            </tr>
          </table>
          </form>
          <div class="add_service"> <strong>All Type</strong> (
              <?php 
		$type = mysql_query("select * from resume_type");
		
					$coun = mysql_num_rows($type);
					   if($coun == 0):
						
							echo '<span style="color:#F00;"><em>Empty</em></span>';
						
						else:
			
			echo $coun;
			
			endif;
		?>
              )
              
              <table>
               <tr>
              <td width="291" align="center"></td>
              <td width="275" align="center"></td>
              <td align="center">&nbsp;</td>
               <tr bgcolor="#cccccc">
              <td width="291" height="26" align="center"><strong>Resume Type Title</strong></td>
              <td width="275" align="center"><strong>Description</strong></td>
              <td align="center"><strong>Action</strong></td>
            </tr>
            <?php 
		
		while($service = mysql_fetch_array($type)){
	 
	 	echo '<tr class="remove" bgcolor="#f5f6f5">';
		echo '<td width="291" height="26" align="center">'.$service['title'].'</td>';
		echo '<td width="291" height="26" align="center">'.$service['description'].'</td>';
		echo '<td width="291" height="26" align="center"><a href="javascript:dell('.$service['resume_type_id'].')" onclick="dell ('.$service['resume_type_id'].');  return false" id="'.$service['resume_type_id'].'"><img src="images/delete.png" title="Delete type" /></a></td>';
	 
	echo '</tr>'; 
		 }
		?>
        </table>
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
<script>
       function dell (id)
{

//Built a url to send
var info = 'id=' + id;
 if(confirm("Are you sure do this !!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_type.php",
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
