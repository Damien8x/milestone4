
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



$sql = "SELECT * 
FROM GAME_INFO
WHERE release_date =
(SELECT MAX(release_date)
FROM GAME_INFO)";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
echo "<table class = \"blueTable\" border = '1'>\n";
// output data of each row

echo "<tr>\n";
echo "<th>game_id</th>\n<th>title</th>\n<th>parental_guidance</th>\n<th>cover_art</th>\n<th>synopsis</th>\n<th>genre</th>\n<th>release_date</th>\n<th>last_view</th>\n";
echo "</tr>\n"; 


while($row = mysqli_fetch_row($result)){
	
	echo"<tr>\n";
	for($i=0;$i<mysqli_num_fields($result);$i++){
		echo "<td>".$row[$i]."</td>\n";
	}
	echo "</tr>\n";
}
echo "</table>\n";
} else {

echo "0 results";
}
mysqli_free_result($result);
mysqli_close($conn);
?>