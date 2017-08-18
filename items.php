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
   
}
else {
    die ('Can\'t select database: ' . mysql_error());
}

?>
<a href="http://localhost:8080/pizzaCategorize.php"> To check the categories</a>
<a href='http://localhost:8080/index.html' style='color:red;font-size:15pt;position:relative;left:1000px;'>Log out</a>

<br/>
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
<form action="items.php" method="post">
<input type='text' name='fname'>
<input type="submit" name="search" value="search" />
</form>

<?php
$se='';
if (isset($_POST['search'])) 
    $se=$_POST['fname'];
 $sql="SELECT * FROM pizza_category_mappings where subcat_name like '%".$se."%'";
$result = mysql_query($sql);
$j=mysql_num_rows($result);

?>
<form action="items.php" method="post">
<table border="1" cellpadding="5" style="color:yellow;background-color:gray;">
<tr>
<th>Pizza Id</th>
<th>Pizza name</th>
<th>Pizza type Id</th>
<th>Pizza type</th>
<th>Price</th>
</tr>
<?php

while($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['subcat_id'] . "</td>";
  echo "<td>" . $row['subcat_name'] . "</td>";
  echo "<td>" . $row['cat_id'] . "</td>";
  echo "<td>" . $row['cat_name'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td><input type='text' name= 'user[]' value='0' ></td>";
  echo "</tr>";
}

echo "</table>";
echo "<br/>";
echo '<input type="submit" name="cart" value="add to cart" />';
echo '<br/>';
#echo 'Cart updated Successfully!!!';

echo "</form>";

?>
<?php

if (isset($_POST['cart']))
{
     echo 'Cart updated Successfully!!!';
     $alTxt= $_POST['user'];
	 $N = count($alTxt);
	 $_SESSION['qty']=$alTxt;
	 foreach($_SESSION['qty'] as $key=>$value)
    {
    
    #echo $value ;
    }
  
	 
	$i=$j;
	
} 
echo "<br/>";  
#echo $_SESSION['session_username']; 
 ?>




</form>
<form action="cart.php">
    <input type="submit" value="Go to cart">
</form>

</body>
</html>