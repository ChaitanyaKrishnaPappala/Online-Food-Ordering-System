<?php
session_start();



$hostname="localhost";
$database="pizza_ordering";



    

$con = mysql_connect($hostname,"root","root",$database);
if (!$con) {
    die('Could not connect: ' . mysql_error($con));
}

$username=$_POST["username"];
// $_SESSION["session_username"]=$username;
$db = mysql_select_db($database, $con);
$query="SELECT * FROM user_details where username='$username'";
$result=mysql_query($query);
$number=mysql_num_rows($result);
echo $number;

 
 
 
 



?>