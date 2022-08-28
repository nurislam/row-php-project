 <?php 
 //connect to the database server
require_once("db_connect.php");
 
 $query = mysql_query("SELECT full_name FROM resume WHERE resume_id = '{$_SESSION['resume_id']}'");
 
 	$name = mysql_fetch_array($query);
 	
		if($_SESSION['resume_id'])
		
		{
			echo '<div class="hader_right">
      <div class="logout"> <a href="home.php">'.$name['full_name'].'</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="logout.php">Logout</a> </div>
    </div>';
			
			}else{
				
				echo '<div class="hader_right">
      <div class="login-text">Login</div>
      <div class="login">
        <form action="login.php" method="POST" >
          <table>
            <tr>
              <td class="login-text2">Email Address</td>
              <td>&nbsp;</td>
              <td class="login-text2">Password</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><input type="text"  name="email" /></td>
              <td>&nbsp;</td>
              <td><input type="password"  name="password" /></td>
              <td>&nbsp;</td>
              <td align="center" valign="middle"><input type="submit" value="Submit" name="submit"  class="btn"/></td>
            </tr>
          </table>
        </form>
		<div class="forgot"><a href="forget.php">Forgot your password ! </a></div>
      </div>
	  
    </div>';
				
			}
	?>