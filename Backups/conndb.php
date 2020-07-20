<?php

function OpenCon()
{

$dbhost = "localhost";
$dbuser = "ray";
$dbpass = "password";
$db = "reports";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
 
return $conn;
}

function CloseCon($conn)
{
$conn -> close();
}
  
?>