<html>
<head>
  <link rel="stylesheet" href="table.css">
</head>
</html>




<?php
$servername = "cssql.seattleu.edu";
$username = "sudold";
$password = "sudold";
$dbname = "sudold";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}



$sql = $_POST["query"];
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
echo "<table class = \"blueTable\" border = '1'>\n";
// output data of each row
while($row = mysqli_fetch_row($result)){
	
	echo"<tr>\n";
	for($i=0;$i<mysqli_num_fields($result);$i++){
		echo "<td>".$row[$i]."</td>\n";
	}
	echo "</tr>\n";
}
echo "</table>\n";
} else{
if(mysqli_num_rows($result) == 0 AND $result == true) 
{
echo "<img src=\"sorry.png\" alt=\"sorry\">";
}else{
	echo "<img src=\"sorry1.png\" alt=\"sorry1\">";
}

}
mysqli_free_result($result);
mysqli_close($conn);
?>