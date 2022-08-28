<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CareerAskBangladesh</title>
<link rel="stylesheet" href="stylesheets/app.css">
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
		$('#mainbody').corner("8px top");
		
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
    <div id="home">
      <?php
    	  //connect to the database server
   require_once("db_connect.php");
				
    	$query = mysql_query("SELECT *FROM jobinformation WHERE jobinformation_id ='{$_GET['id']}'");
    	
    		if( $show = mysql_fetch_array($query))
				{	
    				?>
      <div class="job-title-view">
          <div class="posdatea"> <img src="images/bulletarrow.png" /> <a href="index.php">Back Job view page</a>&nbsp;&nbsp;
        Posting Date: <?php echo $show['posting_date'];?></div>
        <div><strong><?php echo $show['job_title'];?></strong></div>
         <div class="clear"></div>
        <hr />
        <div style="text-align:right; color:#F00; height:30px; ">Application Deadline: <?php echo $show['expr_date'];?></div>
        <div class="clear"></div>
      </div>
      <div id="job-view">
        <table>
           
				<?php if ($show['job_vacancies']>0){
       			
       			echo '<tr>
            <td width="683" height="31" valign="top"><strong>Jobs Vacancies</strong> :'.$show['job_vacancies'].'</td>
          </tr>';
       			
       		}else {
       			
       		}?> 
          <tr>
            <td width="662" ><p><strong>Job Description / Responsibility </strong></p></td>
          </tr>
          <tr>
            <td><ul>
                <li> <?php echo $show['job_description'];?>.</li>
              </ul></td>
          </tr>
          <tr>
            <td width="662" ><strong>Educational Requirements </strong></td>
          </tr>
          <tr>
            <td><ul>
                <li><?php echo $show['educational_requirements'];?>.</li>
              </ul></td>
          </tr>
          <tr>
            <td width="662" ><strong>Experience Requirements</strong></td>
          </tr>
          <tr>
            <td><ul>
                <li> <?php echo $show['experience_requirements'];?>.</li>
              </ul></td>
          </tr>
          <tr>
            <td width="662" ><strong>Salary Range</strong></td>
          </tr>
          <tr>
            <td><ul>
                <li> <?php echo $show['salary_range'];?></li>
              </ul></td>
          </tr>
          <?php 
                	if($show['other_benefits']){
                		
                	echo '<tr>
        	<td width="683" ><strong>Other Benefits</strong></td>
	        </tr>
	        <tr>
        	<td>
            	<ul><li>'.$show['other_benefits'].'</li></ul>
            </td>
        	</tr>';
                	
                	}
                	?>
          <tr>
            <td width="662" ><strong>Job Source</strong></td>
          </tr>
          <tr>
            <td><ul>
                <li><?php echo $show['job_source'];?>.</li>
              </ul></td>
          </tr>
          <?php
		  if($show['job_location'])
		  {
		   echo'<tr>
            <td width="683" ><strong>Job Location </strong></td>
          </tr>
          <tr>
            <td><ul>
                <li>'. $show['job_location'].'.</li>
              </ul></td>
          </tr>';
          }?>
          <tr>
            <td width="662" height="36" align="center" valign="bottom"><a href="apply-message.php?id=<?php echo $show['jobinformation_id'];?>"><div class="button-apply">Apply</div></a></td>
          </tr>
            <?php 
                	if($show['apply_instruction']){
                		
                	echo '
	        <tr align="center" class="ins-text">
        	<td>'.$show['apply_instruction'].'</td>
        	</tr>';
                	
                	}
                	?>
          <tr>
            <td width="662" height="36" align="center" valign="bottom"><div class="address-text">Dhaka Trade Center (15th Floor),
                99 - Kazi Nazrul Islam Avenue,
                Kawran Bazar,
                Dhaka-1215,
                Bangladesh. </div></td>
          </tr>
        </table>
        <?php
      	}else{
				
					echo "Empty";
				}
      	
      ?>
      </div>
    </div>
    <div class="admnt-home">
      <table align="center">
        <tr>
          <td height="61" valign="middle"><a href="http://www.sromobazar.com"><img src="images/1289631433.jpg" /></a></td>
        </tr>
        <tr>
          <td valign="middle"><a href="http://www.akashmail.com"><img src="images/1295762549.png" /></a></td>
        </tr>
        <tr>
          <td valign="middle"><a href="http://www.loginbd.com"><img src="images/1289631452.jpg" /></a></td>
        </tr>
        <tr>
          <td valign="middle"><a href="http://www.askbazar.com"><img src="images/1289631463.jpg" /></a></td>
        </tr>
        <tr>
          <td valign="middle"><a href="http://www.itreel.com"><img src="images/1289631470.jpg" /></a></td>
        </tr>
        <tr>
          <td valign="middle"><a href="http://www.dressbazar.com"><img src="images/1289631481.jpg" /></a></td>
        </tr>
        <tr>
          <td valign="middle"><a href="http://www.itbidding.com"><img src="images/1289631443.jpg" border="0" /></a></td>
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
