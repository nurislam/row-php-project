<?php
include('check.php');
	//connect to the database server
require_once("../db_connect.php");
if(isset($_GET['id'])){	


$query = mysql_query("SELECT *FROM resume
						LEFT OUTER JOIN education AS education ON education.resume_id = resume.resume_id
						LEFT OUTER JOIN workexperience AS workexperience ON workexperience.resume_id = resume.resume_id
						WHERE resume.resume_id = '{$_GET['id']}'");

	 $result = mysql_fetch_array($query);
?>
<html>
<header>
<title></title>
<body>
<table align="center">
  <tr valign="bottom" bgcolor="#CCCCCC">
    <td colspan="2" align="left"> Mailling Address
    </td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td width="409" height="161" align="center" valign="top"><h1><?php echo $result['full_name'];?></h1>
      <?php echo $result['present_address'];?><br />
      <br />
      <strong>Contact number : <?php echo $result['contact_number'];?><br />
      Email address : <?php echo $result['email'];?></strong></td>
    <td width="325" align="center" valign="top"><div class="proimg"><img src="../<?php echo $result['picture'];?>" width="150" height="150" /></div></td>
  </tr>
</table>
<table align="center">
  <tr bgcolor="#CCCCCC">
    <td colspan="2" align="left"> Career Summary </td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td height="47" colspan="2" valign="top" align="left"><?php echo $result['career_summary'];?></td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td colspan="2" align="left"> Personal Details </td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td  align="right">Date of Birth:</td>
    <td width="526" align="left"><?php echo $result['birthday'];?></td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td width="210" align="right"> Gender:</td>
    <td width="526" align="left"><?php echo $result['gender'];?></td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td width="210" align="right"> Nationality:</td>
    <td width="526" align="left"><?php echo $result['nationality'];?></td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td width="210" align="right">Contact Number:</td>
    <td width="526" align="left"><?php echo $result['contact_number'];?></td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td width="210" align="right">Home Phone:</td>
    <td width="526" align="left"><?php echo $result['home_phone'];?></td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td width="210" align="right">Country:</td>
    <td width="526" align="left"><?php echo $result['country_name'];?></td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td width="210" align="right">Alternate Email:</td>
    <td width="526" align="left"><?php echo $result['alt_email'];?></td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td width="210" align="right"> Present Address:</td>
    <td width="526" align="left"><?php echo $result['present_address'];?></td>
  </tr>
  <tr valign="bottom" bgcolor="#CCCCCC">
    <td colspan="2" align="left"> Academic Qualification </td>
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
                    <td colspan="2" align="left"> Work Experience</td>
                    </tr>
                  <tr bgcolor="#f5f6f5">
                    <td width="206" colspan="2" align="left">
                    	1. <strong>'.$result['designation'].'</strong> ('.$result['year_experience'].' years)
                    </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Name:</td>
                    <td width="457" align="left"> '.$result['com_name'].'</td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Adddress:</td>
                    <td width="457" align="left"> '.$result['com_address'].'</td>
                  </tr> <tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Position:</td>
                    <td width="457" align="left"> '.$result['position'].' </td>
                  </tr>';}
                    	if($result['area_experience']){
                    		
                    		echo '<tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Area of Experience:</td>
                    <td width="457" align="left"> '.$result['area_experience'].'</td>
                  </tr>';
                    	}
                    	if($result['work_details']){
                    	echo '<tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Work Details:</td>
                    <td width="457" align="left">'.$result['work_details'].' </td>
                  </tr>';}
                    	
                    ?>
  <?php 
                    if($result['com_name_2']){
                    
                    	echo '</tr>
                  <tr bgcolor="#f5f6f5">
                    <td width="206" colspan="2" align="left">
                    	2. <strong>'.$result['designation_2'].'</strong> ('.$result['year_experience_2'].' years)
                    </td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Name:</td>
                    <td width="457" align="left"> '.$result['com_name_2'].'</td>
                  </tr><tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Company Adddress:</td>
                    <td width="457" align="left"> '.$result['com_address_2'].'</td>
                  </tr> <tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Position:</td>
                    <td width="457" align="left"> '.$result['position_2'].' </td>
                  </tr>';}
                    	if($result['area_experience_2']){
                    		
                    		echo '<tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Area of Experience:</td>
                    <td width="457" align="left"> '.$result['area_experience_2'].'</td>
                  </tr>';
                    	}
                    	if($result['work_details_2']){
                    	echo '<tr bgcolor="#f5f6f5">
                    <td width="206" align="right">Work Details:</td>
                    <td width="457" align="left">'.$result['work_details_2'].' </td>
                  </tr>';}
                    ?>
  <tr valign="bottom" bgcolor="#CCCCCC">
    <td colspan="2" align="left">General Information</td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td width="210" align="right">Position Preference:</td>
    <td width="526" align="left"><?php echo $result['position_preference'];?></td>
  </tr>
  <tr bgcolor="#f5f6f5">
    <td width="210" align="right">Other qualifications:</td>
    <td width="526" align="left"><?php echo $result['other_qualifications'];?></td>
  </tr>
</table>
</body>
</html>
<?php }else {
	
 header('Location:home.php');
}   
?>