<?php
$servername = “cssql.seattleu.edu";
$username = "username";
$password = "password";
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);

$sql = "SELECT * FROM USERS";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
echo "<table border = '1'>\n";
// output data of each row
echo "<tr>\n";
echo "<th>Course Code</th>\n<th>Course
Name</th>\n";
echo "</tr>\n";
while($row = mysqli_fetch_row($result)) {
echo "<tr>\n";
echo "<td>" . $row[0] . "</td>\n" . "<td>".
$row[1] . "</td>\n";
echo "</tr>\n";
}
echo "</table>\n";
} else {
echo "0 results";
}
mysqli_free_result($result);
mysqli_close($conn);
?>

?> 
