<?php



$hostname="localhost";
$database="pizza_ordering";
$pizzaSerial=$_POST["addpizzanumber"];
$pizzaName=$_POST["addpizzaname"];
$pizzaCategoryCode=$_POST["addpizzacategorycode"];
$pizzaCategoryName=$_POST["addpizzacategoryname"];
$price=$_POST["price"];





$con = mysql_connect($hostname,"root","root",$database);
if (!$con) {
    die('Could not connect: ' . mysql_error($con));


	}
	
	
$db=mysql_select_db($database,$con);


	
	
	$query="INSERT INTO pizza_category_mappings (subcat_id, subcat_name, cat_id, cat_name, price)  VALUES ('$pizzaSerial', '$pizzaName', '$pizzaCategoryCode', '$pizzaCategoryName', '$price')";
    $result=mysql_query($query);
	if($result)
        header("Location: adminOperations.php");
	



	


?>

