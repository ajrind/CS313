<!DOCTYPE html>
<html>
	<head>
		<title>Personal Survey Results</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</head>
	<body>
	<?php
   		$results = array(
   			"blue" => 0,
			"green" => 0,
			"red" => 0,
			"yellow" => 0,
			"pink" => 0,
			"orange" => 0,
			"purple" => 0,
			"classical" => 0,
			"rock" => 0,
			"country" => 0,
			"jazz" => 0,
			"world" => 0,
			"other" => 0,
			"cat" => 0,
			"dog" => 0,
			"giraffe" => 0,
			"bear" => 0,
			"pig" => 0,
			"monkey" => 0,
			"bird" => 0,
			"dinosaur" => 0,
			"yes" => 0,
			"no" => 0);


  		$file = fopen("results.txt", "r") or die("Could not open $filename.");
		$total = 0;

		

		$line = fgets($file);
		$data = explode(" ", $line);

		foreach($data as $key => $value)
		{
			//echo"results[$line] = " . $results[$value];
			$total++;
			$results[$value]++;
		}
		
		$total /= 4;
	?>

	<nav class="collapse navbar-collapse bs-navbar-collapse">
	<ul class="nav navbar-nav">
		<li>
	    	<a href="index.html">About Me</a>
		</li>
		<li class="active">
	    	<a href="assignments.html">Assignments</a>
		</li>
		<li>
		    <a href="resume.html">Resume and Links</a>
		</li>
	</ul>
	</nav>
    
    <div class="container">
    <div class="jumbotron">
      <h1>Survey Results</h1>
    </div>
   
	<div class="row">
	    <div class="col-sm-6">
	      <h4>Which of these colors do you like most?</h4>
	      Blue: <?php echo $results["blue"]?> (<?php echo (int)($results["blue"] / $total * 100) ?>%) <br />
	      Green: <?php echo $results["green"]?> (<?php echo (int)($results["green"] / $total * 100) ?>%) <br />
	      Red: <?php echo $results["red"]?> (<?php echo (int)($results["red"] / $total * 100) ?>%) <br />
	      Yellow: <?php echo $results["yellow"]?> (<?php echo (int)($results["yellow"] / $total * 100) ?>%) <br />
	      Pink: <?php echo $results["pink"]?> (<?php echo (int)($results["pink"] / $total * 100) ?>%) <br />
	      Orange: <?php echo $results["orange"]?> (<?php echo (int)($results["orange"] / $total * 100) ?>%) <br />
	      Purple: <?php echo $results["purple"]?> (<?php echo (int)($results["purple"] / $total * 100) ?>%) <br />
	      <br />
		  
		  <h4>What is your favorite kind of music?</h4>
		  Classical: <?php echo $results["classical"]?> (<?php echo (int)($results["classical"] / $total * 100) ?>%) <br />
		  Rock: <?php echo $results["rock"]?> (<?php echo (int)($results["rock"] / $total * 100) ?>%) <br />
		  Country: <?php echo $results["country"]?> (<?php echo (int)($results["country"] / $total * 100) ?>%) <br />
		  Jazz: <?php echo $results["jazz"]?> (<?php echo (int)($results["jazz"] / $total * 100) ?>%) <br />
		  World: <?php echo $results["world"]?> (<?php echo (int)($results["world"] / $total * 100) ?>%) <br />
		  Other: <?php echo $results["other"]?> (<?php echo (int)($results["other"] / $total * 100) ?>%) <br />
		</div>
	
	    <div class="col-sm-6">
	      <h4>Which of these animals do you identify with the most?</h4>
	      Cat: <?php echo $results["cat"]?> (<?php echo (int)($results["cat"] / $total * 100) ?>%) <br />
	      Dog: <?php echo $results["dog"]?> (<?php echo (int)($results["dog"] / $total * 100) ?>%) <br />
	      Giraffe: <?php echo $results["giraffe"]?> (<?php echo (int)($results["giraffe"] / $total * 100) ?>%) <br />
	      Bear: <?php echo $results["bear"]?> (<?php echo (int)($results["bear"] / $total * 100) ?>%) <br />
	      Pig: <?php echo $results["pig"]?> (<?php echo (int)($results["pig"] / $total * 100) ?>%) <br />
	      Monkey: <?php echo $results["monkey"]?> (<?php echo (int)($results["monkey"] / $total * 100) ?>%) <br />
	      Bird: <?php echo $results["bird"]?> (<?php echo (int)($results["bird"] / $total * 100) ?>%) <br />
	      Dinosaur: <?php echo $results["dinosaur"]?> (<?php echo (int)($results["dinosaur"] / $total * 100) ?>%) <br />
	      <br />
		  
		  <h4>Was this survey fun?</h4>
		  Yes: <?php echo $results["yes"]?> (<?php echo (int)($results["yes"] / $total * 100) ?>%) <br />
     	  No: <?php echo $results["no"]?> (<?php echo (int)($results["no"] / $total * 100) ?>%) <br />
		</div>

	</div>
	<h3 class = "center">Thank you for taking this survey.</h3>

	</div>
	</body>

</html> 