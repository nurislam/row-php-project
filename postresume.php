<?php
 include('check2.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CareerAskBangladesh</title>
<link rel="stylesheet" href="stylesheets/app.css" />

<!-- javascript -->
<script type="text/javascript" src="javascripts/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="javascripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="javascripts/ajax.js"></script>
<script  type="text/javascript" src="javascripts/jquery.validate.js"></script>
<script type="text/javascript" src="javascripts/jquery.metadata.js" ></script>
<script type="text/javascript" src="javascripts/jquery.corner.js"></script>
<script type="text/javascript" src="javascripts/customs.js"></script>
<script type="text/javascript" src="javascripts/ajaxupload.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		// Case 1:
		$('#mainbody').corner("8px top");
		$('.left-menu').corner("8px");
		$('.registration img').corner("3px");
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
    <div class="hader_right">
      <div class="logout"> Post Your Resume </div>
    </div>
    <div class="clear"></div>
    <!-- header End--> 
  </div>
  <div id="mainbody">
  	<div class="registration">
    <form id="form" action="signup.php" method="POST" >
    <input type="hidden" name="status" value="1" />
      <fieldset>
        <legend>General Information</legend>
        
        <table align="center">
          <tr>
          <td width="185" align="right">Career Summary</td>
          <td width="19">:</td>
          <td align="left" valign="middle" colspan="3"><textarea name="career_summary" cols="50" rows="3" class="textarea" ></textarea></td>
          <td width="10"></td>
        </tr>
        <tr>
          <td align="right">Position Preference </td>
          <td>:</td>
          <td width="424" align="left" valign="middle"><select name="position_preference">
              <option value="" selected="selected">Choice Level</option>
              <option value="Entry">Entry Level</option>
              <option value="Mid">Mid Level</option>
              <option value="Top">Top Level</option>
            </select></td>
          <td width="26">&nbsp;</td>
          <td width="149" align="right"></td>
          <td></td>
        </tr>
        <tr>
          <td align="right">Country Name <span>*</span></td>
          <td>:</td>
          <td align="left" valign="middle" colspan="3">
          
          <select name="country_name">
              <option value="" selected="selected">Choice Country</option>
              <?php
                	//connect to the database server
					require_once("db_connect.php");

					$sql = "select * from country order by Name";
					$result = mysql_query ($sql);
					while ($row = mysql_fetch_array ($result))
					{
						echo "<option value=\"{$row['Code']}\">{$row['Name']}</option>";
					}
                 ?>
            </select></td>
          
          <td></td>
        </tr>
    </table>
  </fieldset>
    <fieldset>
      <legend>Work Experience</legend>
      <table>
      	<tr>
          <td width="175"  align="right">Company Name </td>
          <td width="11">:</td>
          <td width="221" align="left"><input type="text" name="com_name" class="nice" /></td>
          <td width="190" align="right">Designation</td>
          <td width="15" align="center">:</td>
          <td width="198"><input type="text" name="designation"  class="nice" /></td>
        </tr>
        <tr>
          <td width="175"  align="right">Company Type</td>
          <td width="11">:</td>
          <td width="221" align="left" ><input type="text" name="com_type"  class="nice small" /></td>
          <td width="190" align="right">Position</td>
          <td width="15" align="center">:</td>
          <td width="198"><select name="position">
              <option value="Mid" selected="selected">Choice Level</option>
              <option value="Entry">Entry Level</option>
              <option value="Mid">Mid Level</option>
              <option value="Top">Top Level</option>
            </select></td>
        </tr>
        <tr>
          <td width="175"  align="right">Company Adddress</td>
          <td width="11">:</td>
          <td width="221" align="left"><textarea name="com_address" class="textarea_small" ></textarea></td>
          <td width="190" align="right">Area of Experience </td>
          <td width="15" align="center">:</td>
          <td width="198"><textarea name="area_experience" class="textarea_small" ></textarea></td>
        </tr>
        <tr>
          <td width="175"  align="right">Year of Experience</td>
          <td width="11">:</td>
          <td width="221" align="left" colspan="2"><input type="text" name="year_experience"  class="nice small" /> <span>Use Digit</span></td>
          <td width="15" align="center"></td>
          <td width="198">&nbsp;</td>
        </tr>
        <tr>
			<td align="right">Work Details</td>
					<td width="11">:</td>
				  <td align="left" valign="middle" colspan="4"> <textarea name="work_details" cols="50" rows="3" class="textarea" ></textarea></td>
			     </tr>
                 <tr>
			<td align="right"></td>
					<td width="11"></td>
				  <td width="221" align="right" valign="middle"> </td>
                  <td width="190" align="right"></td>
                  <td width="15" align="center"></td>
					<td width="198"><div id="add_expr" class="add_button">Add more</div>
                  		<div id="hide_expr_button" class="add_button" style="display:none">Hide</div></td>
			     </tr>
      </table>
      <div id="hide_expr" style="display:none">
      <div class="work_expr"><strong>Work Experience 2</strong></div>
      	<table>
      	<tr>
          <td width="175"  align="right" >Company Name</td>
          <td width="11">:</td>
          <td width="221" align="left"><input type="text" name="com_name_2"  class="nice" /></td>
          <td width="190" align="right">Designation </td>
          <td width="15" align="center">:</td>
          <td width="198"><input type="text" name="designation_2"  class="nice" /></td>
        </tr>
        <tr>
          <td width="175"  align="right">Company Adddress</td>
          <td width="11">:</td>
          <td width="221" align="left"><input type="text" name="com_address_2"  class="nice" /></td>
          <td width="190" align="right">Position</td>
          <td width="15" align="center">:</td>
          <td width="198"><select name="position_2">
              <option value="Mid" selected="selected">Choice Level</option>
              <option value="Entry">Entry Level</option>
              <option value="Mid">Mid Level</option>
              <option value="Top">Top Level</option>
            </select></td>
        </tr>
        <tr>
          <td width="175"  align="right">Company Type</td>
          <td width="11">:</td>
          <td width="221" align="left"><input type="text" name="com_type_2"  class="nice small" /></td>
          <td width="190" align="right">Area of Experience </td>
          <td width="15" align="center">:</td>
          <td width="198"><input type="text" name="area_experience_2"  class="nice" /></td>
        </tr>
        <tr>
          <td width="175"  align="right">Year of Experience</td>
          <td width="11">:</td>
          <td width="221" align="left"><input type="text" name="year_experience_2"  class="nice" /></td>
          <td width="190" align="right"></td>
          <td width="15" align="center"></td>
          <td width="198"></td>
        </tr>
        <tr>
			<td align="right">Work Details</td>
					<td width="11">:</td>
				  <td align="left" valign="middle" colspan="4"> <textarea name="work_details_2" cols="50" rows="3" class="textarea" ></textarea></td>
			     </tr>
                 
      </table>
      </div>
  </fieldset>
    
    <fieldset>
      <legend>Educational History</legend>
      <div class="academic">Academic Qualification</div>
      <table align="center">
        <tr align="center" valign="middle" bgcolor="#CCCCCC">
          <td width="187">Exam Title</td>
          <td width="200">Concentration/Major</td>
          <td width="188">Institute Name</td>
          <td width="123">Result</td>
          <td width="116" >Passing Year</td>
          </tr>
        <tr align="center">
          <td width="187"><input type="text" name="secondary"  class="nice" /> </td>
          <td width="200"><input type="text" name="se_major"  class="nice" /></td>
          <td width="188"><input type="text" name="se_insname"  class="nice" /></td>
          <td width="123"><input type="text" name="se_result"  class="nice small" /></td>
          <td width="116" ><input type="text" name="se_passyear"  class="nice small" /></td>
          </tr>
        <tr align="center">
          <td width="187"><input type="text" name="higher_secondary"  class="nice" /></td>
          <td width="200"><input type="text" name="hi_major"  class="nice" /></td>
          <td width="188"><input type="text" name="hi_insname"  class="nice" /></td>
          <td width="123"><input type="text" name="hi_result"  class="nice small" /></td>
          <td width="116" ><input type="text" name="hi_passyear"  class="nice small" /></td>
          </tr>
        <tr align="center">
          <td width="187"><input type="text" name="diploma"  class="nice" /></td>
          <td width="200"><input type="text" name="di_major"  class="nice" /></td>
          <td width="188"><input type="text" name="di_insname"  class="nice" /></td>
          <td width="123"><input type="text" name="di_result"  class="nice small" /></td>
          <td width="116"><input type="text" name="di_passyear"  class="nice small" /></td>
          </tr>
          <tr align="center" id="hode-td">
          <td width="187"></td>
          <td width="200"></td>
          <td width="188"></td>
          <td width="123"></td>
          <td width="116">
          	<div id="add_edu" class="add_button">Add more</div>
                  		
          </td>
          </tr>
          <tr align="center" id="hide_edu_history" style="display:none">
          <td width="187"><input type="text" name="bachelor"  class="nice" /></td>
          <td width="200"><input type="text" name="ba_major"  class="nice" /></td>
          <td width="188"><input type="text" name="ba_insname"  class="nice" /></td>
          <td width="123"><input type="text" name="ba_result"  class="nice small" /></td>
          <td width="116"><input type="text" name="ba_passyear"  class="nice small" /></td>
          </tr>
          <tr align="center" id="show_diploma_button" style="display:none" >
          <td width="187">&nbsp;</td>
          <td width="200"></td>
          <td width="188"></td>
          <td width="123"></td>
          <td width="116">
          	
                  		<div id="Add_diploma" class="add_button" >Add more</div>
          </td>
          </tr>
          <tr align="center" id="hide_diploma_history" style="display:none">          
          <td width="187"><input type="text" name="masters"  class="nice" /></td>
          <td width="200"><input type="text" name="ma_major"  class="nice" /></td>
          <td width="188"><input type="text" name="ma_insname"  class="nice" /></td>
          <td width="123"><input type="text" name="ma_result"  class="nice small" /></td>
          <td width="116"><input type="text" name="ma_passyear"  class="nice small" /></td>
          </tr>
      </table>
    </fieldset>
    
    
    <fieldset>
      <legend>Personal Details</legend>
      <table align="center">
        <tr>
          <td width="168" align="right">Full Name <span>*</span></td>
          <td width="17">:</td>
          <td width="308" align="left" valign="middle"><input type="text" name="full_name"  class="nice" /></td>
          <td width="21">&nbsp;</td>
          <td width="124" align="right">Contact Number <span>*</span></td>
          <td width="12">:</td>
          <td width="156" align="left" valign="middle"><input type="text" name="contact_number"  class="nice" /></td>
        </tr>
        <tr>
          <td  align="right">Date of Birth</td>
          <td>:</td>
          <td align="left"><select name="day" >
              <option value="0">Day</option>
              <option value='01' >01</option>
              <option value='02' >02</option>
              <option value='03' >03</option>
              <option value='04' >04</option>
              <option value='05' >05</option>
              <option value='06' >06</option>
              <option value='07' >07</option>
              <option value='08' >08</option>
              <option value='09' >09</option>
              <option value='10' >10</option>
              <option value='11' >11</option>
              <option value='12' >12</option>
              <option value='13' >13</option>
              <option value='14' >14</option>
              <option value='15' >15</option>
              <option value='16' >16</option>
              <option value='17' >17</option>
              <option value='18' >18</option>
              <option value='19' >19</option>
              <option value='20' >20</option>
              <option value='21' >21</option>
              <option value='22' >22</option>
              <option value='23' >23</option>
              <option value='24' >24</option>
              <option value='25' >25</option>
              <option value='26' >26</option>
              <option value='27' >27</option>
              <option value='28' >28</option>
              <option value='29' >29</option>
              <option value='30' >30</option>
              <option value='31' >31</option>
            </select>
            <select name="month" >
              <option value="0"  >Month</option>
              <option value='01' >January</option>
              <option value='02' >February</option>
              <option value='03' >March</option>
              <option value='04' >April</option>
              <option value='05' >May</option>
              <option value='06' >June</option>
              <option value='07' >July</option>
              <option value='08' >August</option>
              <option value='09' >September</option>
              <option value='10' >October</option>
              <option value='11' >November</option>
              <option value='12' >December</option>
            </select>
            <select name="y" >
              <option >Year</option>
              <?php
					for ($y = 1970; $y <= date('Y'); $y++)
					
					{
					
					    echo '<option value="'. $y .'">'. $y .'</option>';
					
					} ?>
            </select></td>
          <td>&nbsp;</td>
          <td align="right">Home Phone</td>
          <td>:</td>
          <td align="left" valign="middle"><input type="text" name="home_phone"  class="nice" /></td>
        </tr>
        <tr>
          <td align="right">Gender</td>
          <td>:</td>
          <td align="left" valign="middle"><select name="gender">
              <option value="" selected>Select </option>
              <option value='male' >Male</option>
              <option value='female' >Female</option>
            </select></td>
          <td>&nbsp;</td>
          <td align="right">Alternate Email</td>
          <td>:</td>
          <td align="left" valign="middle"><input type="text" name="alt_email"  class="nice" /></td>
        </tr>
        <tr>
        	<td align="right">Nationality</td>
          <td>:</td>
          <td align="left" valign="middle"><input type="text" name="nationality"  class="nice" /></td>
          
          <td>&nbsp;</td>
          <td align="right"></td>
          <td>&nbsp;</td>
          <td align="left" valign="middle"></td>
        </tr>
        <tr>
        	<td align="right">Present Address</td>
          <td>:</td>
          <td align="left" valign="middle" colspan="5"><textarea name="present_address" cols="50" rows="3" class="textarea" ></textarea></td>
        </tr>
      </table>
    </fieldset>
    
    <fieldset>
   
      <legend>Specialization
      </legend><table>
        <td width="163" align="right">Other qualifications</td>
					<td width="10">:</td>
				  <td width="448" align="left" valign="middle"> <textarea name="other_qualifications" cols="50" rows="3" class="textarea" ></textarea></td>
                  <td width="48">&nbsp;</td>
                  <td width="92" align="right"></td>
					<td width="49"></td>
			     </tr>
                 <td align="right"></td>
					<td width="10"></td>
				  <td width="448" align="left" valign="middle"> </td>
                  <td width="48"></td>
                  <td width="92" align="right"></td>
					<td width="49"></td>
			     </tr>
      </table>
    </fieldset>
    <fieldset>
   
      <legend>Upload Picture
      </legend><table>
        <td width="120" align="right"></td>
					<td width="220"><input id="file" type="file" name="file"  />
					<span>
                  	<p><u>Dimensions:</u></p>
                  	width : 150 <br />
                  	height : 150 
                  	</span>	</td>
				  <td width="91" align="left" valign="middle"></td>
                  <td width="271">
                  	<img src="" id="img" width="150" height="150" />
                  	
                  	</td>
                  <td width="68" align="right"></td>
					<td width="40"></td>
			     </tr>
                 <td align="right"></td>
					<td width="220"></td>
				  <td width="91" align="left" valign="middle"> </td>
                  <td width="271"></td>
                  <td width="68" align="right"></td>
					<td width="40"></td>
			     </tr>
      </table>
    </fieldset>
    <div class="button"><input type="reset" value="Reset" class="btn"/>&nbsp; &nbsp; <input type="submit" value="Submit" name="submit"  class="btn"/></div>
    </form>
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
      
  </div></div>
  <script type="text/javascript">
		$(document).ready(function(){
				$('#file').each(function(index){                    
					new AjaxUpload(this, {
                        action		: 'signuppicture.php',		//Assign your upload script url
						name		:"image",
						onSubmit : function(file , ext){		//Check for image only, this may help you to  reduce server task
								var allowedExt='jpg|jpeg|gif|png|bmp|pct|psd|psp|thm|tif|ai|drw|dxf|eps|ps|svg|3dm|dwg|pln';
								allowedExt =allowedExt.replace(/,/g, '|');
								if (!file.match(new RegExp(".(" + allowedExt + ")$", "i"))){ 
										// extension is not allowed
										alert('Error: invalid file extension');
										// cancel upload
										return false;
								}else{
									$('#img').attr ('src', 'images/loading.gif');
									//elImg.attr("src","loading.gif");
								}
						},
                        onComplete: function(file, x){                        
                            //x is the response from ser ver do whatever you need with it							
							//for example let assume x==-1 is happend when an error in uploading
							if(x=="-1"){
								alert(" your Upload error ");
							}else{
								$('#img').attr("src", x);	//elImg.attr("src",x);
								//Now time to change the link
								
								
							}
                        }
                    });
                });
		$('.upload').corner("10px");		
		})
</script>
</body>
</html>
