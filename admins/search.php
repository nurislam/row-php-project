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
<link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
<!-- javascript -->
<script type="text/javascript" src="../javascripts/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../javascripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="../javascripts/ajax.js"></script>
<script  type="text/javascript" src="../javascripts/jquery.validate.js"></script>
<script type="text/javascript" src="../javascripts/jquery.metadata.js" ></script>
<script type="text/javascript" src="../javascripts/validation.js" ></script>
<script type="text/javascript" src="../javascripts/jquery.corner.js"></script>
<script type="text/javascript" src="../javascripts/jquery.watermark.js"></script>
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
        <li><a href="search.php" class="active">Advance Search</a></li>
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
        <h1>Search Job And Applicants</h1>
        <hr/>
        <div class="work-admin"> 
          <!-- search DIV -->
          <div id="prod-content">
            <div class="prod-subsubhead">
              <h4 id="faq_title"> <strong>Search Results For : </strong> <span id="faq_category_title">Keyword </span> </h4>
              <div class="clear"></div>
            </div>
            <div class="prod-subcontent">
              <div class="prod-lcol fl-left">
                <div class="prod-content">
                  <div class="faqsearch">
                    <div class="faqsearchinputbox"> 
                      <!-- The Searchbox Starts Here  -->
                      <input  name="query" type="text" id="faq_search_input" class="search-text" />
                      <!-- The Searchbox Ends  Here  --> 
                    </div>
                  </div>
                  <div id="searchresultdata" class="faq-articles"> </div>
                </div>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
          <!-- search DIV end--> 
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
<script type="text/javascript">
 
 
 $(document).ready(function() {
		
		$("#faq_search_input").watermark("Write Job Title to Search");
		
		$("#faq_search_input").keyup(function()
		{
		var faq_search_input = $(this).val();
		var dataString = 'keyword='+ faq_search_input;
		if(faq_search_input.length>3)
		
		{
		$.ajax({
		type: "GET",
		url: "ajax-search.php",
		data: dataString,
		beforeSend:  function() {
		
		$('input#faq_search_input').addClass('loading');
		
		},
		success: function(server_response)
		{
		
		$('#searchresultdata').html(server_response).show();
		$('span#faq_category_title').html(faq_search_input);
		
		if ($('input#faq_search_input').hasClass("loading")) {
		 $("input#faq_search_input").removeClass("loading");
				} 
		
		}
});
}return false;
});
});
	  
</script>
</body>
</html>
