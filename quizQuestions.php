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
		<h1><a href="storiesIndex.html">Stories for the Cosmos</a></h1>
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
    <div class="quiz-form">
    	<form method="post" action="quizQuestions.php">
    		<br>
    		Name: <input type="text" name="name" required/>
    		<br>
    		<label">When was Sparta founded?</label>
         <br>
             <label><input type="radio" name="q1" value="correct"> 900 BCE</label>
             <label><input type="radio" name="q1" value=""> 800 BCE</label>
             <label><input type="radio" name="q1" value=""> 200 BCE</label>
             <label><input type="radio" name="q1" value=""> 1000 BCE</label>
         <br> <br>
         <label>What constellation is not an offical constellation, but rather a small part of a larger one?</label>
         <br>
             <label><input type="radio" name="q2" value=""> Draco</label>
             <label><input type="radio" name="q2" value=""> Ursa Major</label>
             <label><input type="radio" name="q2" value=""> Andromeda</label>
             <label><input type="radio" name="q2" value="correct"> The Big Dipper</label>
         <br> <br>
         <label>Who are the twin Gods?</label>
         <br>
             <label><input type="radio" name="q3" value="correct"> Apollo & Artemis</label>
             <label><input type="radio" name="q3" value=""> Poseidon & Hades</label>
             <label><input type="radio" name="q3" value=""> Aphrodite & Ares</label>
             <label><input type="radio" name="q3" value=""> Chaos & Heaven</label>
         <br> <br>
         <label for="">Which adaptation is inspired the myth of Prometheus?</label>
         <br>
             <label><input type="radio" name="q4" value="">Lore Olympus</label>
             <label><input type="radio" name="q4" value="correct">Frankenstein</label>
             <label><input type="radio" name="q4" value="">Hercules</label>
             <label><input type="radio" name="q4" value="">Battlestar Galactica</label>
         <br>
         <br> <br>
         <input type="submit" value="Submit"/>
    	</form>
    </div>
</body>
</html>


<?php
if (!isset($_POST['name'])) {
}
else {
	$name = $_POST['name'];
	setcookie('name', $name);

	// Optionally store the parameters in variables
	$server = "spring-2021.cs.utexas.edu";
	$user = "cs329e_bulko_fsp1020";
	$pwd = "moody7abbot2Gloom";
	$dbName = "cs329e_bulko_fsp1020";

	$mysqli = new mysqli($server, $user, $pwd, $dbName);
	$result = $mysqli->query("SELECT name FROM scores WHERE name = '$name'");
	if(!$result->num_rows == 0) {
	     echo "<script>alert('You have already taken the quiz!');</script>";
	} else {
	    $q1 = $_POST['q1'];
		$q2 = $_POST['q2'];
		$q3 = $_POST['q3'];
		$q4 = $_POST['q4'];
		$numCorrect = 0;
		if ($q1 == 'correct') {
		$numCorrect++;
		}
		if ($q2 == 'correct') {
			$numCorrect++;
		}
		if ($q3 == 'correct') {
			$numCorrect++;
		}
		if ($q3 == 'correct') {
			$numCorrect++;
		}

		$mysqli = new mysqli ($server,$user,$pwd,$dbName);
		// If it returns a non-zero error number, print a
		// message and stop execution immediately
		if ($mysqli->connect_errno) {
		die('Connect Error: ' . $mysqli->connect_errno .
		": " . $mysqli->connect_error);
		}

		$sql = "INSERT INTO scores
		VALUE ('$name', $numCorrect)";

		if ($mysqli->query($sql) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $mysqli->error;
		}

		$mysqli->close();


		setcookie('score', $numCorrect);
		header('Location: ./quizScore.php');


	}
	$mysqli->close();




}




?>
