<?php
session_start();

$hostname="localhost";
$database="pizza_ordering";
$username=$_POST['usernamesignup'];
$password=$_POST['passwordsignup'];
$confirmpassword=$_POST["passwordsignup_confirm"];




$con = mysql_connect($hostname,"root","root",$database);
if (!$con) {
    die('Could not connect: ' . mysql_error($con));


	}
	
	
$db=mysql_select_db($database,$con);

if($password==$confirmpassword){
	
	
	$query="INSERT INTO user_details (username, password) VALUES ('$username', '$password')";
    $result=mysql_query($query);
	
	 header("Location: index.html");
	
}

else{
	header("Location: index.html#toregister");
}

?>