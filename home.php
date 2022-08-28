<?php
	include('check.php');
	//connect to the database server
require_once("db_connect.php");
 
$query = mysql_query("SELECT *FROM resume
						LEFT OUTER JOIN education AS education ON education.resume_id = resume.resume_id
						LEFT OUTER JOIN workexperience AS workexperience ON workexperience.resume_id = resume.resume_id
						WHERE resume.resume_id = '{$_SESSION['resume_id']}'");

	 $result = mysql_fetch_array($query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CareerAskBangladesh</title>
<link rel="stylesheet" type="text/css" href="stylesheets/app.css"/>
<link  rel="stylesheet" type="text/css" href="stylesheets/layout.css"/>
<!--javascript -->
<script type="text/javascript" src="javascripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="javascripts/jquery-1.3.2.min.js" ></script>
<script type="text/javascript" src="javascripts/tabs.js" ></script>
<script type="text/javascript" src="javascripts/ajax.js"></script>
<script  type="text/javascript" src="javascripts/jquery.validate.js"></script>
<script type="text/javascript" src="javascripts/jquery.metadata.js" ></script>
<script type="text/javascript" src="javascripts/validation.js" ></script>
<script type="text/javascript" src="javascripts/jquery.corner.js"></script>
<script type="text/javascript" src="javascripts/ajaxupload.js"></script>

  <script type="text/javascript">
		$(document).ready(function(){
				$('#file').each(function(index){                    
					new AjaxUpload(this, {
                        action		: 'uploadPicture.php',		//Assign your upload script url
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
		});
		
//delete 
function dell (id)
{

//Built a url to send
var info = 'id=' + id;
 if(confirm("Sure you want to delete this Picture!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete.php",
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
      <div class="main"> 
        <!--header -->
        <div class="header-bg">
          <div class="middle-tab">
            <div id="container-1">
              <ul>
                <li style="padding-left:15px"><a href="#fragment-1"><span>Home</span></a></li>
                <li><a href="#fragment-2"><span>View Resume</span></a></li>
                <li><a href="#fragment-3"><span>Edit Resume</span></a></li>
                <li><a href="#fragment-4"><span>Messages</span></a></li>
              </ul>
              <div id="fragment-1"> 
                <!-- home page -->
                <?php
                	$apply = mysql_query("SELECT *FROM jobapply, jobinformation WHERE jobapply.jobinformation_id = jobinformation.jobinformation_id and resume_id = '{$_SESSION['resume_id']}'");
                	
                ?>
                <div class="summary"><strong>Resume Summary </strong> <span>Number of Jobs Applied (
                  <?php $count = mysql_num_rows($apply);
										if($count == 0){
											echo'Empty';
											}else{
												echo $count;	
											}
                 				?>
                  )</span> </div>
                <table align="center">
                  <tr valign="bottom" bgcolor="#CCCCCC">
                    <td width="450"> Job Title </td>
                    <td width="302"> Post Date </td>
                    <td width="202"></td>
                  </tr>
                  <?php 
                 		 	while ($jobdate = mysql_fetch_array($apply)){
                 		 
                
                        echo '<tr bgcolor="#f5f6f5">';
                     echo '<td>'.$jobdate['job_title'].' </td>';
                     echo '<td>'.$jobdate['apply_date'].' </td>';
                     echo '<td><img src="images/arrow-icon.png" /><a href="jobview.php?id='.$jobdate['jobinformation_id'].'"> Detail..</a> </td>';
                    echo '</tr>';
                   }?>
                </table>
                <div class="apply-job">
                 <a href="index.php"> <div class="button-apply">Job View</div></a>
                </div>
                <!-- home page --> 
              </div>
              <div id="fragment-2"> 
              <!-- <div class="delete"><strong><a href="javascript:dell('<?php #$result['id'];?>')" onclick="dell ('<?php #$result['id'];?>');  return false" id=" <?php #echo $result['id'];?>">Delete Resume</a> </strong>
                  <div class="clear"></div>
                </div> -->
                <table align="center">
                  <tr valign="bottom" bgcolor="#CCCCCC">
                    <td colspan="2"> Mailling Address </td>
                  </tr>
                  <tr bgcolor="#f5f6f5">
                    <td width="409" height="161" align="center" valign="top"><h1><?php echo $result['full_name'];?></h1>
                      <?php echo $result['present_address'];?><br />
                      <br />
                      <strong>Contact number : <?php echo $result['contact_number'];?><br />
                      Email address : <?php echo $result['email'];?></strong></td>
                    <td width="259" align="center" valign="top"><div class="proimg"><img src="<?php echo $result['picture'];?>" width="150" height="150" /></div></td>
                  </tr>
                </table>
                <table align="center">
                  <tr bgcolor="#CCCCCC">
                    <td colspan="2"> Career Summary </td>
                  </tr>
                  <tr bgcolor="#f5f6f5">
                    <td height="47" colspan="2" valign="top"><?php echo $result['career_summary'];?></td>
                  </tr>
                  <tr bgcolor="#CCCCCC">
                        <td colspan="2"> Personal Details </td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td  align="right">Date of Birth:</td>
                        <td width="457"><?php echo $result['birthday'];?></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right"> Gender:</td>
                        <td width="457"><?php echo $result['gender'];?></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right"> Nationality:</td>
                        <td width="457"><?php echo $result['nationality'];?></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right">Contact Number:</td>
                        <td width="457"><?php echo $result['contact_number'];?></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right">Home Phone:</td>
                        <td width="457"><?php echo $result['home_phone'];?></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right">Country:</td>
                        <td width="457"><?php echo $result['country_name'];?></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right">Alternate Email:</td>
                        <td width="457"><?php echo $result['alt_email'];?></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right"> Present Address:</td>
                        <td width="457"><?php echo $result['present_address'];?></td>
                        </tr>
                  <tr valign="bottom" bgcolor="#CCCCCC">
                    <td colspan="2"> Academic Qualification </td>
                  </tr>
                  <tr valign="bottom" bgcolor="#f5f6f5">
                    <td colspan="2"><table bgcolor="#FFFFFF">
                        <tr align="center" valign="middle" bgcolor="#f5f6f5">
                          <td width="97"><strong>Exam Title</strong></td>
                          <td width="182"><strong>Concentration/Major</strong></td>
                          <td width="163"><strong>Institute Name</strong></td>
                          <td width="102"><strong>Result</strong></td>
                          <td width="111" ><strong>Passing Year</strong></td>
                        </tr>
                        <tr align="center" bgcolor="#f5f6f5">
                          <td width="97"><?php echo $result['secondary'];?></td>
                          <td width="182"><?php echo $result['se_major'];?></td>
                          <td width="163"><?php echo $result['se_insname'];?></td>
                          <td width="102"><?php echo $result['se_result'];?></td>
                          <td width="111" ><?php echo $result['se_passyear'];?></td>
                        </tr>
                        <tr align="center" bgcolor="#f5f6f5">
                          <td width="97"><?php echo $result['higher_secondary'];?></td>
                          <td width="182"><?php echo $result['hi_major'];?></td>
                          <td width="163"><?php echo $result['hi_insname'];?></td>
                          <td width="102"><?php echo $result['hi_result'];?></td>
                          <td width="111" ><?php echo $result['hi_passyear'];?></td>
                        </tr>
                        <tr align="center" bgcolor="#f5f6f5">
                          <td width="97"><?php echo $result['diploma'];?></td>
                          <td width="182"><?php echo $result['di_major'];?></td>
                          <td width="163"><?php echo $result['di_insname'];?></td>
                          <td width="102"><?php echo $result['di_result'];?></td>
                          <td width="111" ><?php echo $result['di_passyear'];?></td>
                        </tr>
                        <?php 
						if($result['bachelor']){
							
							echo'<tr align="center" bgcolor="#f5f6f5">
                          <td width="97">'.$result['bachelor'].'</td>
                          <td width="182">'.$result['ba_major'].'</td>
                          <td width="163">'.$result['ba_insname'].'</td>
                          <td width="102">'.$result['ba_result'].'</td>
                          <td width="111" >'.$result['ba_passyear'].'</td>
                        </tr>';
							}
						if($result['masters']){
							
							echo'<tr align="center" bgcolor="#f5f6f5">
                          <td width="97">'.$result['masters'].'</td>
                          <td width="182">'.$result['ma_major'].'</td>
                          <td width="163">'.$result['ma_insname'].'</td>
                          <td width="102">'.$result['ma_result'].'</td>
                          <td width="111" >'.$result['ma_passyear'].'</td>
                        </tr>';
							}
						?>
                      </table></td>
                  </tr>
                  
                    <?php 
                    if($result['com_name']){
                    
                    	echo '<tr valign="bottom" bgcolor="#CCCCCC">
                    <td colspan="2"> Work Experience</td>
                    </tr>
                  <tr bgcolor="#f5f6f5">
                    <td width="206" colspan="2">
                    	1. <strong>'.$result['designation'].'</strong> ('.$result['year_experience'].' years)
                    </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Name:</td>
                    <td width="457"> '.$result['com_name'].'</td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Adddress:</td>
                    <td width="457"> '.$result['com_address'].'</td>
                  </tr> <tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Position:</td>
                    <td width="457"> '.$result['position'].' </td>
                  </tr>';}
                    	if($result['area_experience']){
                    		
                    		echo '<tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Area of Experience:</td>
                    <td width="457"> '.$result['area_experience'].'</td>
                  </tr>';
                    	}
                    	if($result['work_details']){
                    	echo '<tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Work Details:</td>
                    <td width="457">'.$result['work_details'].' </td>
                  </tr>';}
                    	
                    ?>
                    <?php 
                    if($result['com_name_2']){
                    
                    	echo '</tr>
                  <tr bgcolor="#f5f6f5">
                    <td width="206" colspan="2">
                    	2. <strong>'.$result['designation_2'].'</strong> ('.$result['year_experience_2'].' years)
                    </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Name:</td>
                    <td width="457"> '.$result['com_name_2'].'</td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Adddress:</td>
                    <td width="457"> '.$result['com_address_2'].'</td>
                  </tr> <tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Position:</td>
                    <td width="457"> '.$result['position_2'].' </td>
                  </tr>';}
                    	if($result['area_experience_2']){
                    		
                    		echo '<tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Area of Experience:</td>
                    <td width="457"> '.$result['area_experience_2'].'</td>
                  </tr>';
                    	}
                    	if($result['work_details_2']){
                    	echo '<tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Work Details:</td>
                    <td width="457">'.$result['work_details_2'].' </td>
                  </tr>';}
                    ?>
                  <tr valign="bottom" bgcolor="#CCCCCC">
                    <td colspan="2">General Information</td>
                  </tr>
                  <tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Position Preference:</td>
                    <td width="457"><?php echo $result['position_preference'];?></td>
                  </tr>
                  <tr bgcolor="#f5f6f5">
                    <td width="206" align="right" valign="top">Other qualifications:</td>
                    <td width="457"><?php echo $result['other_qualifications'];?></td>
                  </tr>
                </table>
              </div>
              <div id="fragment-3">
                <div class="edit-post"> 

               <!-- <div id="container">
    	          <div id="failed">Failed</div>
        	      <div id="loading">Loading</div>
            	  <div id="loader"></div>
              		<div class="clear"></div>
	   		 </div> onsubmit="sendForm(); return false;"-->
                  <form id="form" action="update.php" method="post"  >
                    <table align="center">
                      <tr valign="bottom" bgcolor="#CCCCCC">
                        <td colspan="2"> User Information</td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="213"  align="right">Email Address:</td>
                        <td width="466"><?php echo $result['email'];?></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td  align="right">Password:</td>
                        <td width="466"><input type="password" name="password"  value="<?php echo $result['password'];?>" class="nice" /></td>
                      </tr>
                    </table>
                    <table align="center">
                      <tr bgcolor="#CCCCCC">
                        <td width="679" colspan="2">General Information</td>
                      <tr bgcolor="#f5f6f5">
                        <td width="185" align="right">Career Summary :</td>
                        <td align="left" valign="middle" ><textarea name="career_summary" cols="50" rows="3" class="textarea" ><?php echo $result['career_summary'];?></textarea></td>
                      </tr> <tr bgcolor="#f5f6f5">
                        <td width="185" align="right">Other Qualifications :</td>
                        <td align="left" valign="middle" ><textarea name="other_qualifications" cols="50" rows="3" class="textarea" >
						<?php echo $result['other_qualifications'];?></textarea></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td align="right">Position Preference:</td>
                        <td><select name="position_preference">
                            <option value="<?php echo $result['position_preference'];?>" selected="selected"><?php echo $result['position_preference'];?></option>
                            <option value="Entry">Entry Level</option>
                            <option value="Mid">Mid Level</option>
                            <option value="Top">Top Level</option>
                          </select></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td align="right">Country Name :</td>
                        <td align="left" valign="middle" colspan="3"><select name="country_name">
                            <option value="<?php echo $result['country_name'];?>" selected="selected"><?php echo $result['country_name'];?></option>
                            <?php
                	//connect to the database server
					require_once("db_connect.php");

					$sql = "select * from country order by Name";
					$re = mysql_query ($sql);
					while ($row = mysql_fetch_array ($re))
					{
						echo "<option value=\"{$row['Code']}\">{$row['Name']}</option>";
					}
                 ?>
                          </select></td>
                      </tr>
                      <tr bgcolor="#CCCCCC">
                        <td colspan="2"> Personal Details </td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td  align="right">Full Name:</td>
                        <td width="457"><input type="text" name="full_name" value="<?php echo $result['full_name'];?>"  class="nice" /></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td  align="right">Date of Birth:</td>
                        <td width="457"><input type="text" name="birthday" value="<?php echo $result['birthday'];?>"  class="nice" /></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right"> Gender:</td>
                        <td width="457"><select name="gender">
              <option value="<?php echo $result['gender'];?>" selected><?php echo $result['gender'];?></option>
              <option value='male' >Male</option>
              <option value='female' >Female</option>
            </select></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right"> Nationality:</td>
                        <td width="457"><input type="text" name="nationality" value="<?php echo $result['nationality'];?>"  class="nice" /></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right">Contact Number:</td>
                        <td width="457"><input type="text" name="contact_number" value="<?php echo $result['contact_number'];?>"  class="nice" /></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right">Home Phone:</td>
                        <td width="457"><input type="text" name="home_phone" value="<?php echo $result['home_phone'];?>"  class="nice" /></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right">Country:</td>
                        <td width="457"><input type="text" name="country_name" value="<?php echo $result['country_name'];?>"  class="nice" /></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right">Alternate Email:</td>
                        <td width="457"><input type="text" name="alt_email"  value="<?php echo $result['alt_email'];?>"class="nice" /></td>
                      </tr>
                      <tr bgcolor="#f5f6f5">
                        <td width="206" align="right"> Present Address:</td>
                        <td width="457"><textarea name="present_address" cols="50" rows="3" class="textarea" ><?php echo $result['present_address'];?></textarea></td>
                        </tr>
                      <tr valign="bottom" bgcolor="#CCCCCC">
                        <td colspan="2"> Academic Qualification </td>
                      </tr>
                      <tr valign="bottom" bgcolor="#f5f6f5">
                        <td colspan="2"><table bgcolor="#FFFFFF">
                            <tr align="center" valign="middle" bgcolor="#f5f6f5">
                              <td width="97"><strong>Exam Title</strong></td>
                              <td width="182"><strong>Concentration/Major</strong></td>
                              <td width="163"><strong>Institute Name</strong></td>
                              <td width="102"><strong>Result</strong></td>
                              <td width="111" ><strong>Passing Year</strong></td>
                            </tr>
                            <tr align="center" bgcolor="#f5f6f5">
                              <td width="97"><input type="text" name="secondary"  value="<?php echo $result['secondary'];?>" class="nice small" /></td>
                              <td width="182"><input type="text" name="se_major"  value="<?php echo $result['se_major'];?>" class="nice" /></td>
                              <td width="163"><input type="text" name="se_insname"  value="<?php echo $result['se_insname'];?>" class="nice" /></td>
                              <td width="102"><input type="text" name="se_result"  value="<?php echo $result['se_result'];?>" class="nice small" /></td>
                              <td width="111" ><input type="text" name="se_passyear"  value="<?php echo $result['se_passyear'];?>" class="nice small" /></td>
                            </tr>
                            <tr align="center" bgcolor="#f5f6f5">
                              <td width="97"><input type="text" name="higher_secondary"  value="<?php echo $result['higher_secondary'];?>" class="nice small" /></td>
                              <td width="182"><input type="text" name="hi_major"  value="<?php echo $result['hi_major'];?>" class="nice" /></td>
                              <td width="163"><input type="text" name="hi_insname"  value="<?php echo $result['hi_insname'];?>" class="nice" /></td>
                              <td width="102"><input type="text" name="hi_result"  value="<?php echo $result['hi_result'];?>" class="nice small" /></td>
                              <td width="111" ><input type="text" name="hi_passyear"  value="<?php echo $result['hi_passyear'];?>" class="nice small" /></td>
                            </tr>
                            <tr align="center" bgcolor="#f5f6f5">
                              <td width="97"><input type="text" name="diploma"  value="<?php echo $result['diploma'];?>" class="nice small" /></td>
                              <td width="182"><input type="text" name="di_major"  value="<?php echo $result['di_major'];?>" class="nice" /></td>
                              <td width="163"><input type="text" name="di_insname"  value="<?php echo $result['di_insname'];?>" class="nice" /></td>
                              <td width="102"><input type="text" name="di_result"  value="<?php echo $result['di_result'];?>" class="nice small" /></td>
                              <td width="111" ><input type="text" name="di_passyear"  value="<?php echo $result['di_passyear'];?>" class="nice small" /></td>
                            </tr>
                            
          <tr align="center"  bgcolor="#f5f6f5">
          <td width="97"><input type="text" name="bachelor"  value="<?php echo $result['bachelor'];?>" class="nice small" /></td>
          <td width="182"><input type="text" name="ba_major"  value="<?php echo $result['ba_major'];?>" class="nice" /></td>
          <td width="163"><input type="text" name="ba_insname"  value="<?php echo $result['ba_insname'];?>" class="nice" /></td>
          <td width="102"><input type="text" name="ba_result"  value="<?php echo $result['ba_result'];?>" class="nice small" /></td>
          <td width="111" ><input type="text" name="ba_passyear"  value="<?php echo $result['ba_passyear'];?>" class="nice small" /></td>
          </tr>
          <tr align="center"  bgcolor="#f5f6f5">          
          <td width="187"><input type="text" name="masters" value="<?php echo $result['masters'];?>" class="nice small" /></td>
          <td width="200"><input type="text" name="ma_major" value="<?php echo $result['ma_major'];?>" class="nice" /></td>
          <td width="188"><input type="text" name="ma_insname" value="<?php echo $result['ma_insname'];?>" class="nice" /></td>
          <td width="123"><input type="text" name="ma_result" value="<?php echo $result['ma_result'];?>" class="nice small" /></td>
          <td width="116"><input type="text" name="ma_passyear" value="<?php echo $result['ma_passyear'];?>" class="nice small" /></td>
          </tr>
                          </table></td>
                      </tr>
                      <tr valign="bottom" bgcolor="#CCCCCC">
                        <td colspan="2"> Work Experience</td>
                       </tr>
                        <?php 
                    
                    	echo '
                  <tr bgcolor="#f5f6f5">
                    <td width="206" colspan="2">
                    	1. <strong></strong>
                    </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Name:</td>
                    <td width="457"> <input type="text" name="com_name" value="'.$result['com_name'].'" class="nice" /></td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Adddress:</td>
                    <td width="457"> <textarea name="com_address" class="textarea" >'.$result['com_address'].'</textarea></td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Designation:</td>
                    <td width="457"> <input type="text" name="designation" value="'.$result['designation'].'" class="nice" /></td>
                  </tr> <tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Position:</td>
                    <td width="457"> 
								<select name="position">
						  <option value="Mid" selected="selected">'.$result['position'].'</option>
						  <option value="Entry">Entry Level</option>
						  <option value="Mid">Mid Level</option>
						  <option value="Top">Top Level</option>
						</select></td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Year of Experience:</td>
                    <td width="457"><input type="text" name="year_experience" value=" '.$result['year_experience'].'" class="nice" /> </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Area of Experience:</td>
                    <td width="457"><textarea name="area_experience" class="textarea" >'.$result['area_experience'].'</textarea> </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Work Details:</td>
                    <td width="457"><textarea name="work_details" class="textarea" >'.$result['work_details'].'</textarea></td>
                  </tr>';
                  
                    if($result['com_name_2']){
                    
                    	echo '</tr>
                  <tr bgcolor="#f5f6f5">
                    <td width="206" colspan="2">
                    	2. <strong></strong>
                    </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Name:</td>
                    <td width="457"> <input type="text" name="com_name_2" value="'.$result['com_name_2'].'" class="nice" /></td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Adddress:</td>
                    <td width="457"> <textarea name="com_address_2" class="textarea" >'.$result['com_address_2'].'</textarea></td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Designation:</td>
                    <td width="457"> <input type="text" name="designation_2" value="'.$result['designation_2'].'" class="nice" /></td>
                  </tr> <tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Position:</td>
                    <td width="457"> 
								<select name="position_2">
						  <option value="'.$result['position_2'].'" selected="selected">'.$result['position_2'].'</option>
						  <option value="Entry">Entry Level</option>
						  <option value="Mid">Mid Level</option>
						  <option value="Top">Top Level</option>
						</select></td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Year of Experience:</td>
                    <td width="457"><input type="text" name="year_experience_2" value=" '.$result['year_experience_2'].'" class="nice" /> </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Area of Experience:</td>
                    <td width="457"><textarea name="area_experience_2" class="textarea" >'.$result['area_experience_2'].'</textarea> </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Work Details:</td>
                    <td width="457"><textarea name="work_details_2" class="textarea" >'.$result['work_details_2'].'</textarea></td>
                  </tr>';}else{
					  	echo '<tr >
                    <td width="206" align="right"></td>
                    <td width="457"><div id="add_expr" class="add_button">Add more</div>
                  		<div id="hide_expr_button" class="add_button" style="display:none">Hide</div></td>
                  </tr><tr id="hide_expr" style="display:none">
                    
                    <td width="457" colspan="2"><table>
					</tr>
                  <tr bgcolor="#f5f6f5">
                    <td width="206" colspan="2">
                    	2. <strong></strong>
                    </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Name:</td>
                    <td width="457"> <input type="text" name="com_name_2" value="'.$result['com_name_2'].'" class="nice" /></td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Adddress:</td>
                    <td width="457"> <textarea name="com_address_2" class="textarea" >'.$result['com_address_2'].'</textarea></td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Designation:</td>
                    <td width="457"> <input type="text" name="designation_2" value="'.$result['designation_2'].'" class="nice" /></td>
                  </tr> <tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Position:</td>
                    <td width="457"> 
								<select name="position_2">
						  <option value="'.$result['position_2'].'" selected="selected">'.$result['position_2'].'</option>
						  <option value="Entry">Entry Level</option>
						  <option value="Mid">Mid Level</option>
						  <option value="Top">Top Level</option>
						</select></td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Year of Experience:</td>
                    <td width="457"><input type="text" name="year_experience_2" value=" '.$result['year_experience_2'].'" class="nice" /> </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Area of Experience:</td>
                    <td width="457"><textarea name="area_experience_2" class="textarea" >'.$result['area_experience_2'].'</textarea> </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Work Details:</td>
                    <td width="457"><textarea name="work_details_2" class="textarea" >'.$result['work_details_2'].'</textarea></td>
                  </tr></table>
					</td>
                  </tr>';
					  }
                    ?>
                    <tr valign="bottom" bgcolor="#CCCCCC">
                        <td colspan="2"> Change Picture</td>
                       </tr>
                       <tr bgcolor="#f5f6f5">
                    	<td width="206" align="center">
                        <input id="file" type="file" name="file"  />
					<span>
                  	<p><u>Dimensions:</u></p>
                  	width : 150 <br />
                  	height : 150 
                  	</span>
                        </td>
                    	<td width="457" align="center"><div class="proimg"><img src="<?php echo $result['picture'];?>" id="img" width="150" height="150" /></div> </td>
                      </tr>
                    </table>
                    <div class="button">
                      <input type="submit" value="Update" name="submit"  class="btn"/>
                    </div>
                  </form>
                </div>
              </div>
              <div id="fragment-4">
              <div class="msg">
              <table align="center">
                  
			  <?php 

			  $query = mysql_query("SELECT *
FROM messages INNER JOIN resume
ON messages.tomsg = resume.resume_id
WHERE messages.status = '1' AND messages.tomsg = '{$_SESSION['resume_id']}' ORDER BY messages_id DESC");
$counrow = mysql_num_rows($query);
		 if($counrow):
		 ?>
		 	<tr >
                   <td width="233" align="right">Total messages</td>
                   <td width="134" >(<?php echo $counrow;?>)</td>
                   <td colspan="3"></td>
                   </tr>
            <tr bgcolor="#CCCCCC">
                   <td width="233" >From</td>
                   <td width="134" >Subject</td>
                   <td colspan="3">messages</td>
                   </tr>
		 <?php
				
		else:
				echo ' <tr bgcolor="#f5f6f5" >
                   <td  colspan="5"><span style="color:#F00">Empty message</span></td>
                   </tr>
				   ';
		endif;
			  
			  while($msg = mysql_fetch_array($query)):
				if($msg['isread']== 0):
				?>
                  
                  <tr bgcolor="#f5f6f5" class="isread remove">
                    <td > <?php echo $msg['email'];?></td>
                    <td > <?php echo $msg['subject'];?></td>
                    <td width="285" ><div class="read"><a href="javascript:makeRequest('read.php?id=<?php echo $msg['messages_id'];?>')"><?php echo $msg['body'];?></a></div></td>
                    <td ><a href="javascript:makeRequest('read.php?id=<?php echo $msg['messages_id'];?>')">Read</a></td>
                    <td width="23" align="center"><a href="javascript:dell(<?php echo $msg['messages_id'];?>)" onclick="dell (<?php echo $msg['messages_id'];?>);  return false" id="<?php echo $msg['messages_id'];?>"><img src="images/delete.png" title="Delete message" /></a></td>
                <?php
					else:
					 ?>
					 <tr bgcolor="#f5f6f5" class="remove">
                    <td > <?php echo $msg['email'];?></td>
                    <td > <?php echo $msg['subject'];?></td>
                    <td width="285" ><div class="read"><a href="javascript:makeRequest('read.php?id=<?php echo $msg['messages_id'];?>')"><?php echo $msg['body'];?></a></div></td>
                    <td ><a href="javascript:makeRequest('read.php?id=<?php echo $msg['messages_id'];?>')">Read</a></td>
                    <td width="23" align="center"><a href="javascript:dell(<?php echo $msg['messages_id'];?>)" onclick="dell (<?php echo $msg['messages_id'];?>);  return false" id="<?php echo $msg['messages_id'];?>"><img src="images/delete.png" title="Delete resume" /></a></td>
					 <?php
					endif;	
				endwhile;
			  ?>
                </tr>
                </table>
                </div>
                <div id="container">
    	          <div id="failed">Failed</div>
        	      <div id="loading">Loading</div>
            	  <div id="loader"></div>
              		<div class="clear"></div>
	   		 </div> 
              </div>
              <!-- <div id="fragment-5"></div>
                                <div id="fragment-6"></div>
                                <div id="fragment-7"></div> --> 
            </div>
          </div>
        </div>
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
<script>
        $('#container-1').tabs();
		$('#scrolling-banner').cycle({
						 timeout		:	0,			 
						 next			: 	"#ctrl_next", 
						 prev			: 	"#ctrl_prev"
						 });
   <!--
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
