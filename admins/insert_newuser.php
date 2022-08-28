
<?php
//connect to the database server
require_once("../db_connect.php");

#echo '<pre>'; print_r(); '</pre>';


    if(isset($_POST['submit']))
    {
         $fname = $_FILES['sel_file']['name'];
        #echo '<pre>'; print_r($_FILES); '</pre>';
         $chk_ext = explode(".",$fname);
        #echo '<pre>'; print_r(strtolower($chk_ext[1])); '</pre>';
         if(strtolower($chk_ext[1]) == "csv")
         {
        
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
       
             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
             {
                $sql = "INSERT into resume(full_name,country_name,city,email,contact_number,home_phone,occupation)
				 values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
                mysql_query($sql) or die(mysql_error());
             }
       
             fclose($handle);
             echo '<div style="color:#FFF; font-size:12px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">Successfully Imported</div>';
			 include('reset_pass.php');
         }
         else
         {
             echo '<div style="color:#F00; font-size:12px; position:absolute; right: 500px; top: 80px; font-family:Verdana, Geneva, sans-serif;">Invalid File</div>';
			 include('reset_pass.php');
         }   
    }
?>
