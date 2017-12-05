
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



$sql = "SELECT designer_name AS 'Designer Company',  genre AS 'Genre', COUNT(genre) AS 'Genre Count'
FROM GAME_INFO, GAMES, DESIGNERS
WHERE GAME_INFO.game_id = GAMES.game_id AND
GAMES.designer_id = DESIGNERS.designer_id
GROUP BY DESIGNERS.designer_name, GAME_INFO.genre";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
echo "<table class = \"blueTable\" border = '1'>\n";
// output data of each row

echo "<tr>\n";
echo "<th>Designer_Company</th>\n<th>genre</th>\n<th>genre_count</th>\n";
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