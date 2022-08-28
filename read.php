 <?php
    	  //connect to the database server
		 	include('check.php');

   require_once("db_connect.php");
   
   $query2 =mysql_query("UPDATE messages SET 
						isread = '1'
						WHERE messages_id = {$_GET['id']}",$link); 
   
   if(isset($_GET['id'])){


   $query = mysql_query("SELECT *
FROM messages INNER JOIN resume
ON messages.tomsg = resume.resume_id
WHERE messages_id = {$_GET['id']}",$link);

	 $result = mysql_fetch_assoc($query);
	 
	 
	?> 
	 <table width="495" align="center">
 	 <tr valign="bottom" bgcolor="#CCCCCC">
  	<td width="105" align="right">Date:</td>
    <td width="378" align="left"> <?php echo $result['send_date'];?></td>
    </tr><tr bgcolor="#CCCCCC">
    <td align="right">From:</td>
    <td align="left"> <?php echo $result['frommsg'];?></td>
    </tr><tr bgcolor="#CCCCCC">
    <td align="right">To:</td>
    <td align="left"> <?php echo $result['email'];?></td>
    </tr><tr bgcolor="#CCCCCC">
    <td align="right">Subject:</td>
    <td align="left"> <?php echo $result['subject'];?></td>
  </tr><tr bgcolor="#f5f6f5">
    <td align="left" colspan="2"> <?php echo $result['body'];?></td>
  </tr>
 </table> 
<?php }?>	 