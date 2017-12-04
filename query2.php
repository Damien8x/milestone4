
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



$sql = "SELECT game_id, AVG(star_rating) AS AVG_RATING, COUNT(game_id) AS NUMBER_OF_REVIEWS
FROM REVIEWS 
GROUP BY  game_id
HAVING AVG(star_rating) > 3";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
echo "<table border = '1'>\n";
// output data of each row

echo "<tr>\n";
echo "<th>game_id</th>\n<th>Average_Rating</th>\n<th>Number_Of_Reviews</th>\n";
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