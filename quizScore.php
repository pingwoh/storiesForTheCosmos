<!DOCTYPE html>

<html lang="en">

<head>
	<title>Mythology Quiz</title>
	<meta charset="UTF-8">
	<meta name="description" content="ENTER DESCRIPTION HERE">
    <link href="greek.css" rel="stylesheet">
    <link href="quiz.css" rel="stylesheet">
    <link rel="icon" href="IMG_1845.png">
</head> 

<body>
<div class="header">
		<h1><a href="storiesIndex.html">Stories for the Cosmos<img src ="IMG_1845.png"></a></h1>
	</div>
	<div class="navbar">
		<ul>
		  <li><a href="storiesIndex.html">Home</a></li>
		  <li><a href="greekGods.html">Greek Gods</a></li>
		  <li><a href="constellations.html">Constellations</a></li>
		  <li><a href="history.html">History</a></li>
		  <li><a href="mediaRepresent.html">Media</a></li>
		  <li><a href="quizQuestions.php">Quiz</a></li>
		  <li style="float:right"><a href="contactUs.html">About</a></li>
		</ul>
	</div>
    <div class="header">
        <h2>Greek Mythology Quiz</h2>
    </div>
    <div class="score">


<?php
if(!isset($_COOKIE['name'])) {
  header("Location: ./quizQuestions.php");
} else {
  //echo "Cookie '" . 'name' . "' is set!<br>";
  //echo "Value is: " . $_COOKIE['name'] . "<br>";
  echo "<p style='text-align: center; font-size: 1.5rem;'>" . $_COOKIE['name'] . " scored a " . $_COOKIE['score'] . "/4!<br>" . "</p>";
  echo "<p style='text-align: center; font-size: 1.5rem;'>" . "You have been added to the scores list below." . "</p>";
}


?>

</div>
<div>
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
	</div>
</body>
</html>