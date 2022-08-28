<?php
//connect to the database server
require_once("../db_connect.php");

if(isset($_GET['id'])){	
	
	$applicant = mysql_query("SELECT * FROM jobapply  
INNER JOIN resume ON jobapply.resume_id = resume.resume_id 
INNER JOIN jobinformation ON jobapply.jobinformation_id = jobinformation.jobinformation_id 
WHERE resume.resume_id = '{$_GET['id']}'");

	 ?>
<html>
<header>
<title></title>

<body>
<div id="admin">
  <table>
    <tr bgcolor="#cccccc">
      <td width="442" height="26" align="center"><strong>Job Title</strong></td>
      <td width="246" align="center"><strong>Job Entry Date</strong></td>
    </tr>
    <?php
            while($app = mysql_fetch_array($applicant)){
			
			echo '<tr bgcolor="#f5f6f5">';
		 	echo '<td width="442" height="26" align="left">'.$app['job_title'].'</td>';
			echo '<td width="442" height="26" align="center">'.$app['entry_date'].'</td>';
		 echo '</tr>';
		 }
			?>
  </table>
</div>
</body>
</html>
<?php
	 
	}else {
		
	 header('Location:home.php');
}
