<?php



$hostname="localhost";
$database="pizza_ordering";
$pizzaName=$_POST["deletepizzaname"];






$con = mysql_connect($hostname,"root","root",$database);
if (!$con) {
    die('Could not connect: ' . mysql_error($con));


	}
	
	
$db=mysql_select_db($database,$con);


	
	
	$query="DELETE FROM pizza_category_mappings WHERE subcat_name='$pizzaName'";
    $result=mysql_query($query);
	if($result)
        header("Location: adminOperations.php");
	



	


?>

