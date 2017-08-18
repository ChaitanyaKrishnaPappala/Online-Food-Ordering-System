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
<a href="localhost:8080/items.php" style="color:blue">Home</a>
<pre style='color:yellow;'><h2>Enter username</h2></pre>
<form action="userHistory.php" method="post">
<input type="text" name="username" id="username"/>
<br/><br/>
<input type="submit" name="submit" id="submit"/>
</form>
<?php
session_start();
$checkUsername=$_POST['username'];
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

$query="SELECT * FROM user_history WHERE username='$checkUsername'";
$result=mysql_query($query);
echo "<table border='1' cellpadding='5' style='color:yellow;background-color:gray;'>";

echo "<tr><td>Username</td><td>Order Details</td></tr>";
while($row = mysql_fetch_array($result)){
	echo '<tr>';
	echo '<td>' . $row['username'].'</td>';
	echo '<td>' . $row['pizza_history'] . '</td>';
	echo '</tr>';
}

echo '</table>';
?>
</body>
</html>