<?php
session_start();
include 'items.php';


$hostname="localhost";
$database="pizza_ordering";



    

$con = mysql_connect($hostname,"root","root",$database);
if (!$con) {
    die('Could not connect: ' . mysql_error($con));
}

$username=$_POST["username"];
$password=$_POST["password"];
$_SESSION["session_username"]=$username;
$db = mysql_select_db($database, $con);
$query="SELECT * FROM user_details where username='$username' and password='$password'";
$result=mysql_query($query);
$number=mysql_num_rows($result);
echo $number;
 if($number==1)
	 header("Location: items.php");
 else
	 header("Location: index.html");
 
 
 
 



?>