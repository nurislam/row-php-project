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
        <?php include("header.php"); ?>
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
          <li><a href="all_jobs.php" class="active">View Jobs</a></li>
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
       <li><a href="messages.php" >Messages</a></li>
        <li><hr /></li>

        </ul>
      </div>
      <div class="admin-body">
        <h1>Update Job</h1>
        <hr />
        <?php 
	  	$jobs = mysql_query("SELECT * FROM jobinformation WHERE jobinformation_id = '{$_GET['id']}'");
		
		$alljob = mysql_fetch_array($jobs)
	  ?>
        <form  id="form" action="update.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $alljob['jobinformation_id']; ?>" />
          <table>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Job title <span>*</span> :</td>
              <td width="381"><input type="text" name="job_title" value="<?php echo $alljob['job_title'];?>"  class="text-large"/></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Job vacancies :</td>
              <td width="381"><input type="text" name="job_vacancies" value="<?php echo $alljob['job_vacancies'];?>" class="small"/>
                <span>Must be use Digit </span></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Job source :</td>
              <td width="381"><input name="job_source" type="text" value="<?php echo $alljob['job_source'];?>" /></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Job location :</td>
              <td width="381"><input name="job_location" type="text"  value="<?php echo $alljob['job_location'];?>" /></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Posting date :</td>
              <td width="381"><input name="posting_date" type="text" value="<?php echo $alljob['posting_date'];?>" />
                <span>Year-Month-Day </span></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Expr date :</td>
              <td width="381"><input name="expr_date" type="text" value="<?php echo $alljob['expr_date'];?>" />
                <span>Year-Month-Day </span></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Salary range :</td>
              <td width="381"><input name="salary_range" type="text"  value="<?php echo $alljob['salary_range'];?>" /></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Job description :</td>
              <td width="381"><textarea name="job_description" cols="" rows=""  class="textarea"><?php echo $alljob['job_description'];?></textarea></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Educational requirements<span>*</span> :</td>
              <td width="381"><textarea name="educational_requirements" cols="" rows=""  class="textarea"><?php echo $alljob['educational_requirements'];?></textarea></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Experience requirements :</td>
              <td width="381"><textarea name="experience_requirements" cols="" rows=""  class="textarea"><?php echo $alljob['experience_requirements'];?></textarea></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Additional requirements :</td>
              <td width="381"><textarea name="additional_requirements" cols="" rows=""  class="textarea"><?php echo $alljob['additional_requirements'];?></textarea></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Other benefits :</td>
              <td width="381"><textarea name="other_benefits" cols="" rows=""  class="textarea"><?php echo $alljob['other_benefits'];?></textarea></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Apply instruction :</td>
              <td width="381"><textarea name="apply_instruction" cols="" rows=""  class="textarea"><?php echo $alljob['apply_instruction'];?></textarea></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right">Publish :</td>
              <td width="381"><select name="publish">
                  <option  value="<?php echo $alljob['status'];?>"selected="selected">
                  <?php if($alljob['status']== 0){
			   
			   echo "Unpublished";
			   
			   }else{
				   echo "Published";
				}
				?>
                  </option>
                  <option value="1">Publish</option>
                  <option value="0">Unpublish</option>
                </select></td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right"></td>
              <td width="381" align="center">&nbsp;</td>
              <td width="12"></td>
            </tr>
            <tr>
              <td width="27">&nbsp;</td>
              <td width="199" align="right"></td>
              <td width="381" align="center"><input type="submit" value="Submit" name="submit"  class="btn"/></td>
              <td width="12"></td>
            </tr>
          </table>
        </form>
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
