<?php
include('check.php');
//connect to the database server
require_once("../db_connect.php");

if(isset($_GET['keyword'])){
    $keyword = 	trim($_GET['keyword']) ;
$keyword = mysqli_real_escape_string($dbc, $keyword);



$query = "select job_title,job_description, entry_date from jobinformation where job_title like '%$keyword%' or job_description like '%$keyword%' or entry_date like '%$keyword%'";

//echo $query;
$result = mysqli_query($dbc,$query);
if($result){
    if(mysqli_affected_rows($dbc)!=0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
     echo '<p> <b>'.$row['job_title'].'</b>&nbsp('.$row['entry_date'].')<br /> '.$row['job_description'].'</p>'   ;
    }
    }else {
        echo 'No Results for :"'.$_GET['keyword'].'"';
    }
  
}
}else {
    echo 'Parameter Missing';
}




?>