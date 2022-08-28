<?php
include('check.php');
//connect to the database server
require_once("../db_connect.php");

   $message = mysql_query("SELECT resume_id, email FROM resume WHERE resume_id = '{$_GET['id']}'");
  $email = mysql_fetch_assoc($message);
  
  ?>
  <script>
	
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
					$('.error').fadeOut(200).hide();
					$( '#dialog-message' ).dialog( "close" );
				
						}
					});
				}
				return false;
				});
				});
	</script>
<div style="padding:7px;"><span class="error" style="display:none; color:red; background:#FFC6C6; border:solid #F00 1px; padding:5px;"> Please Enter Valid Data All Field </span>
<span class="success" style="display:none; background:#ffffff; border:#333 solid 1px; padding:5px;"> Your Message Successfully Send !</span>
<div  style="clear:both"></div>
</div>
	<form name="from" method="POST" action="#">
    
   <table>
   		<!--<tr>
        	<td align="right"><strong>
       	    <input name="email" type="checkbox" value="eml" class="msgeml" />
       	  </strong></td>
            <td><strong>&nbsp;Send email
       	    <input name="email" type="checkbox" value="msg" class="msgeml"/>&nbsp;Send message
          </strong></td>
        </tr>-->
   		<tr>
        	<td align="right">From:</td>
            <td><input name="from" id="from" type="text"  value="career.admin@askbangladesh.com"class="" /></td>
        </tr>
        <tr>
        	<td align="right">To:</td>
            <td><?php echo $email['email'];?>
            <input name="tomsg" id="tomsg" type="hidden" class="" value="<?php echo $email['resume_id'];?>"/></td>
        </tr>
        <tr>
        	<td align="right">Subject:</td>
            <td><input name="subject" id="subject" type="text" /></td>
        </tr>
        <tr>
        	<td align="right" valign="top">message:</td>
            <td><textarea name="message" id="message" rows="2" cols="28"  > </textarea></td>
        </tr>
        <tr>
        	<td align="right" valign="top"></td>
            <td><input type="submit" name="submit" value="Submit" class="btn" /></td>
        </tr>
    </table>
    
    </form>
