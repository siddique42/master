<?php
 $DBhost = "localhost";
  $DBuser = "test";
  $DBpass = "test";
  $DBname = "register";
  
  $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
if ($DBcon->connect_errno) 
{
	die("ERROR : -> ".$DBcon->connect_error);
}
print_r($DBcon);
?>