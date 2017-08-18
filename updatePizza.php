<?php



$hostname="localhost";
$database="pizza_ordering";


$oldPizzaSerial=$_POST["updateoldpizzanumber"];
$oldPizzaName=$_POST["updateoldpizzaname"];
$oldPizzaCategoryCode=$_POST["updateoldpizzacategorycode"];
$oldPizzaCategoryName=$_POST["updateoldpizzacategoryname"];
$oldPrice=$_POST["oldprice"];


$newPizzaSerial=$_POST["updatenewpizzanumber"];
$newPizzaName=$_POST["updatenewpizzaname"];
$newPizzaCategoryCode=$_POST["updatenewpizzacategorycode"];
$newPizzaCategoryName=$_POST["updatenewpizzacategoryname"];
$newPrice=$_POST["newprice"];






$con = mysql_connect($hostname,"root","root",$database);
if (!$con) {
    die('Could not connect: ' . mysql_error($con));


	}
	
	
$db=mysql_select_db($database,$con);

$query1="UPDATE pizza_category_mappings SET subcat_id='$newPizzaSerial' WHERE subcat_id='$oldPizzaSerial'";
$query2="UPDATE pizza_category_mappings SET subcat_name='$newPizzaName' WHERE subcat_name='$oldPizzaName'";
$query3="UPDATE pizza_category_mappings SET cat_id='$newPizzaCategoryCode' WHERE cat_id='$oldPizzaCategoryCode'";
$query4="UPDATE pizza_category_mappings SET cat_name='$newPizzaCategoryName' WHERE cat_name='$oldPizzaCategoryName'";
$query5="UPDATE pizza_category_mappings SET price='$newPrice' WHERE price='$oldPrice'";
	
	
	
    $result1=mysql_query($query1);
	$result2=mysql_query($query2);
	$result3=mysql_query($query3);
	$result4=mysql_query($query4);
	$result5=mysql_query($query5);
	if($result1&&$result2&&$result3&&$result4&&$result5)
        header("Location: adminOperations.php");

	



	


?>

