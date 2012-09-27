<?php
require 'connect.php';
  
//get the username  
$agent_num = $_GET['mob_num_check'];  
$num_rows=-1;
//mysql query to select field username if it's equal to the username that we check '  
$result = mysql_query("select count(*) from agent where mob_num='$agent_num'");  
$result = mysql_fetch_array($result);
//if number of rows fields is bigger them 0 that means it's NOT available '  
if($result[0]==0)
{  
    echo 1;  
}
else
{  
    echo 0;  
}  

?>