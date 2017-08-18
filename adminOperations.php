<html>
<head>
<style>
body{
	background-image: url(images/pizza.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	}
</style>
</head>
<body>
<form action="" method="post">
<table border="1" cellpadding="5" style="color:yellow;background-color:gray;">
<tr>
<th>Pizza Id</th>
<th>Pizza name</th>
<th>Pizza type Id</th>
<th>Pizza type</th>
<th>Price</th>
</tr>
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

<form action="items.php" method="post">
<input type='text' name='fname'>
<input type="submit" name="search" value="search" />
<br/>
</form>

<?php
echo "<br/>";
$se='';
if (isset($_POST['search'])) 
    $se=$_POST['fname'];
 $sql="SELECT * FROM pizza_category_mappings where subcat_name like '%".$se."%'";
#$sql="SELECT * FROM pizza_category_mappings";
$result = mysql_query($sql);
$j=mysql_num_rows($result);
while($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['subcat_id'] . "</td>";
  echo "<td>" . $row['subcat_name'] . "</td>";
  echo "<td>" . $row['cat_id'] . "</td>";
  echo "<td>" . $row['cat_name'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "</tr>";
}

echo "</table>";
echo "<br/>";


echo "</form>";

?>

<table border="1" cellpadding="5" style="color:yellow;background-color:gray;">
<p style='color:blue;font-size:12pt;'>Pizza category codes</p>
<tr><td>Pizza category</td><td>Category code</td></tr>
<tr><td>chicken</td><td>1</td></tr>
<tr><td>cheese</td><td>2</td></tr>
<tr><td>veggie</td><td>3</td></tr>
<tr><td>pork</td><td>4</td></tr>
</table>
<a href='http://localhost:8080/adminLogin.html' style='color:red;font-size:15pt;position:absolute;left:1200px;top:20px;'>Log out</a>
<br/>
<form action="addPizza.php" method="post">
<table cellpadding="10" border="1" style="color:yellow;background-color:gray;">
<tr><h3>Add a pizza</h3></tr>
<tr>
<td>Pizza Serial number</td>
<td>Pizza name</td>
<td>Pizza category code</td>
<td>Pizza category name</td>
<td>Price</td>
</tr>
<tr>
<td><input type="text" name="addpizzanumber" id="addpizzanumber"/></td>
<td><input type="text" name="addpizzaname" id="addpizzaname"/></td>
<td><input type="text" name="addpizzacategorycode" id="addpizzacategorycode"/></td>
<td><input type="text" name="addpizzacategoryname" id="addpizzacategoryname"/></td>
<td><input type="text" name="price" id="price"/></td>
</tr>
</table>
<br/>
<input type="submit" value="Add" name="add" id="add"/>
</form>
<br/>
<br/>
<form action="updatePizza.php" method="post">
<table cellpadding="10" border="1" style="color:yellow;background-color:gray;">
<tr><h3>Update a pizza</h3></tr>
<tr>
<td>Old Pizza Serial number</td>
<td>Old Pizza name</td>
<td>Old Pizza category code</td>
<td>Old Pizza category name</td>
<td>Old Price</td>
</tr>
<tr>
<td><input type="text" name="updateoldpizzanumber" id="updateoldpizzanumber"/></td>
<td><input type="text" name="updateoldpizzaname" id="updateoldpizzaname"/></td>
<td><input type="text" name="updateoldpizzacategorycode" id="updateoldpizzacategorycode"/></td>
<td><input type="text" name="updateoldpizzacategoryname" id="updateoldpizzacategoryname"/></td>
<td><input type="text" name="oldprice" id="oldprice"/></td>
</tr>
<tr>
<td>New Pizza Serial number</td>
<td>New Pizza name</td>
<td>New Pizza category code</td>
<td>New Pizza category name</td>
<td>New Price</td>
</tr>
<tr>
<td><input type="text" name="updatenewpizzanumber" id="updatenewpizzanumber"/></td>
<td><input type="text" name="updatenewpizzaname" id="updatenewpizzaname"/></td>
<td><input type="text" name="updatenewpizzacategorycode" id="updatenewpizzacategorycode"/></td>
<td><input type="text" name="updatenewpizzacategoryname" id="updatenewpizzacategoryname"/></td>
<td><input type="text" name="newprice" id="newprice"/></td>
</tr>
</table>
<br/>
<input type="submit" value="Update" name="update" id="update"/>
</form>
<br/>
<br/>
<form action="deletePizza.php" method="post">
<table cellpadding="10" border="1" style="color:yellow;background-color:gray;">
<tr><h3>Delete a pizza</h3></tr>
<tr>
<td>Pizza name</td>
</tr>
<tr>
<td><input type="text" name="deletepizzaname" id="deletepizzaname"/></td>
</tr>
</table>
<br/>
<input type="submit" value="Delete" name="delete" id="delete"/>
</form>
</html>