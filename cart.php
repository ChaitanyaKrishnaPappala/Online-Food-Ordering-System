<html>
<head>
<STYLE>
	body{
	background-image: url(images/pizza.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	}
	</STYLE>
	</head>
<body>
<a href='http://localhost:8080/index.html' style='color:red;font-size:15pt;position:relative;left:1200px;'>Log out</a>
<br/>
<pre style='color:blue;font-size:15pt'>Cart</pre>
<?php
session_start();
$hostname="localhost";
$database="pizza_ordering";
$username="root";
$password="root";

$link = mysql_connect($hostname, $username, $password);
if (!$link) {
die('Connection failed: ' . mysql_error());
}
else{
     
}
$db_selected = mysql_select_db($database, $link);
if ($db_selected) {
    #echo 'Database ' . $database . ' successfully selected!';
}
else {
    die ('Can\'t select database: ' . mysql_error());
}
foreach($_SESSION['qty'] as $key=>$value)
    {
    
    #echo $value ;
    }
	
	
foreach($_SESSION['qty'] as $key=>$value)
    {
    $itm[$key]=$value;
    
    }
	$i=count($itm);

$k=0;
for($j=0;$j<$i;$j++){
	if($itm[$j]!=0)
$cart[$k++]=$j;
}


//echo $cart[1];
//echo "item ids added:";
for($j=0;$j<$k;$j++)
{
	$cart[$j]=$cart[$j]+1;
//echo $cart[$j];
}	
	
	$sql="SELECT * FROM pizza_category_mappings" ;
	$result = mysql_query($sql);
$products = array(); 
while (($row = mysql_fetch_array($result, MYSQL_ASSOC)) !== false){
  $products[] = $row; 
}
$co=count($itm);
for($i=0;$i<$co;$i++)
	$products[$i][5]=$itm[$i];

//print_r($products);
$c1=0;
$rows=count($products);
//echo "ids";
$finprods=array();
for($a=0;$a<$rows;$a++)
	for($b=0;$b<$k;$b++)
	{
		if($cart[$b]==$products[$a]['subcat_id'])
			$finprods[]=$products[$a];
		
		$c1++;
	}
	
	#echo "final prods";
$n=0;

	$out  = "";
$out .= "<table border='1' cellpadding='5' style='color:yellow;background-color:gray;'>";
$out .="<tr><td>Pizza Id</td><td>Pizza name</td><td>Category Id</td><td>Pizza type</td><td>Price</td><td>Quantity</td></tr>";
foreach($finprods as $key => $element){
    $out .= "<tr>";
    foreach($element as $subkey => $subelement){
        $out .= "<td>$subelement</td>";
		
    }
	
    $out .= "</tr>";
}
$out .= "</table>";



$pizza_names='';
for($i=0;$i<$k;$i++)
$pizza_names = $pizza_names.$finprods[$i]['subcat_name'];
echo "<br>";
#echo $pizza_names;
#echo $_SESSION['session_username'];
$sessionUser=$_SESSION['session_username'];


echo $out;

$total=0;
$k=0;
for($i=0;$i<$co;$i++)
	if($itm[$i]!=0)
		$itm1[$k++]=$itm[$i];
	$co=count($itm1);
for($i=0;$i<$co;$i++){
	
$total=$total+$finprods[$i]['price']*$itm1[$i];
}

echo "<p style='color:blue;'>Total amount is ".$total."</p>";


 $historyInsertQuery = "INSERT INTO user_history (username, pizza_history) VALUES ('$sessionUser', '$pizza_names')";
 $historyResult=mysql_query($historyInsertQuery);
 





?>
<form action="items.php">
    <input type="submit" value="Go back to items">
</form>
</body>
</html>
<br/>
<form action="http://localhost:8080/userHistory.php">
<input type="submit" value="Make an order" />
</form>