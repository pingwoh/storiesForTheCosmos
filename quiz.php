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
		  <li><a href="quiz.php">Quiz</a></li>
		  <li style="float:right"><a href="contactUs.html">About</a></li>
		</ul>
	</div>
    <div class="header">
        <h2>Greek Mythology Quiz</h2>
    </div>
    <div class="contact-form">
 <?php

 if(isset($_COOKIE["played"])) {
     //you've already played - display score? or just scoreboard?
     showScores();
 } else if($_POST["page"] == "submitted"){
     //check scores and set cookie
    $playerScore = checkAnswers($_POST["q1"],$_POST["q2"],$_POST["q3"],$_POST["q4"]); //take the post values and checks them
    setcookie("played", $playerScore, time()+ (5 * 60)); //sets a cookie for 5 minutes
 } else {
     //play the game :)
     playQuiz();
 }

 function showScores()
 {
    $score = $_COOKIE["played"];
    print <<<SCOREBOARD
    <h3>You submitted the quiz!</h3>
    <p>
        we don't believe in second chances
        <br>
        u already got a chance and u got a $score :)
        <br>
        for testing purposes, im going to delete the cookie now.
    </p>
SCOREBOARD;
    setcookie("played", $score, time() - (20 * 60)); //delete cookie
 }
 
 function checkAnswers($ques1, $ques2, $ques3, $ques4){
    $totalScore = 0; 
    print <<<SUBMITTED
     <h3>You submitted the quiz!</h3>
     <p> 
        here's a cookie to celebrate :)
        <br>
        don't come back now :)))
        <br>
        your score is : $totalScore, but don't worry bc that doesn't work yet
     </p>
SUBMITTED;
    return $totalScore;
 }
 
 function playQuiz(){
     $script = $_SERVER['PHP_SELF'];
     print <<<QUIZ
     <h3>Let's take a quiz!</h3>
     <form method = "post" action = "$script" id="aForm">
         <label">When was Sparta founded?</label>
         <br>
             <label><input type="radio" name="q1" value="correct1"> 900 BCE</label>
             <label><input type="radio" name="q1" > 800 BCE</label>
             <label><input type="radio" name="q1" > 200 BCE</label>
             <label><input type="radio" name="q1" > 1000 BCE</label>
         <br> <br>
         <label>What constellation is not an offical constellation, but rather a small part of a larger one?</label>
         <br>
             <label><input type="radio" name="q2" > Draco</label>
             <label><input type="radio" name="q2" > Ursa Major</label>
             <label><input type="radio" name="q2" > Andromeda</label>
             <label><input type="radio" name="q2" value="correct2"> The Big Dipper</label>
         <br> <br>
         <label>Who are the twin Gods?</label>
         <br>
             <label><input type="radio" name="q3" value="correct3"> Apollo & Artemis</label>
             <label><input type="radio" name="q3"> Poseidon & Hades</label>
             <label><input type="radio" name="q3"> Aphrodite & Ares</label>
             <label><input type="radio" name="q3"> Chaos & Heaven</label>
         <br> <br>
         <label for="">Which adaptation is inspired the myth of Prometheus?</label>
         <br>
             <label><input type="radio" name="q4">Lore Olympus</label>
             <label><input type="radio" name="q4" value="correct4">Frankenstein</label>
             <label><input type="radio" name="q4">Hercules</label>
             <label><input type="radio" name="q4">Battlestar Galactica</label>
         <br>
         <br> <br>
         <input type = "hidden" name = "page" value = "submitted" />
         <input type="submit" value="Submit"/>
     </form>
QUIZ;
    }
 
 ?>
    </div>

</body>
</html>