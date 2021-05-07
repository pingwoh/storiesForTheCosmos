<?php
// Optionally store the parameters in variables
$server = "spring-2021.cs.utexas.edu";
$user = "cs329e_bulko_fsp1020";
$pwd = "moody7abbot2Gloom";
$dbName = "cs329e_bulko_fsp1020";

$mysqli = new mysqli ($server,$user,$pwd,$dbName);
// If it returns a non-zero error number, print a
// message and stop execution immediately
if ($mysqli->connect_errno) {
die('Connect Error: ' . $mysqli->connect_errno .
": " . $mysqli->connect_error);
}

$sql = "SELECT * FROM scores ORDER BY score DESC";
$result = $mysqli->query($sql);

echo "<table style='width: 75%;
	margin: auto;'>";
echo "<tr style='font-size: 1.5rem; padding: 20px;'><th>Name</th><th>Score</th></tr>";
while ($resultRow = $result->fetch_row()) {
    echo "<tr>";
    for($i = 0; $i < $result->field_count; $i++){
        echo "<td style='border-radius: 0px;
	font-size: 1.5rem;
	border: 1px solid black;
	background: #b8d2ff;
	padding: 20px;
	color: black;
	text-align: center;'>$resultRow[$i]</td>";
    }
    echo "</tr>";
}
echo "</table>";


$mysqli->close();
?>