<?php

  $cookieName = "surveyTaken";
  $cookieValue = 0;
  $forwardLocation = "results.php";
  
  if(isset($_COOKIE[$cookieName]) && $_COOKIE[$cookieName] == 1)
  {
    
    header("Location:$forwardLocation");
  }
  else
  {
   setcookie($cookieName,$cookieValue,time()+10*365*24*3600);
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Personal Survey</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body>


<?php

$color ="";
$animal ="";
$liked = "";
$colorError = "";
$animalError = "";
$musicError = "";
$likedError = "";
$error = false;

if($_SERVER["REQUEST_METHOD"] == "POST")
 { 
   // color
   if(empty($_POST["color"]))
   {
     $colorError = "You must choose a favorite color.";
     $error = true;
   }
   else
   {
     $color = $_POST["color"];
   }

   // animal
   if(empty($_POST["animal"]))
   {
     $animalError = "You must choose a favorite animal.";
     $error = true;
   }
   else
   {
     $animal = $_POST["animal"];
   }

   //liked
   if(empty($_POST["liked"]))
   {
     $likedError = "You must choose whether or not you liked this survey.";
     $error = true;
   }
   else
   {
     $liked = $_POST["liked"];
   }

   //music
   if(empty($_POST["music"]))
   {
     $musicError = "You must choose whether or not you liked this survey.";
     $error = true;
   }
   else
   {
     $music = $_POST["music"];
   }


   if($error == false)
   {
     $data = array("color"=>$_POST["color"], "animal"=>$_POST["animal"], "music"=>$_POST["music"], "liked"=>$_POST["liked"]);
     writeAnswers($data);

      setcookie($cookieName, 1, time()+10*365*24*3600);
      header("Location:$forwardLocation");
   }
}

function writeAnswers($data)
{

   $file = fopen("results.txt","a+") or die("Could not open $filename.");
   
   foreach($data as $key => $value)
   {
     $writeme = $value;
     
     if ($key == "color" && 0 != filesize("results.txt"))
     {
       $writeme = " " . $writeme . " ";
     }

     else if ($key != "liked")
     {
       $writeme = $writeme . " ";
     }

     fwrite($file, $writeme);
   }

   fclose($file);
}

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
      <h1>Survey</h1>
      <h3>Please answer a few questions about yourself.</h3>
      Or go to the results <a href="results.php">here</a>.
    </div>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="row">
    <div class="col-sm-6">
      <h4>Which of these colors do you like most?</h4>
      <input name="color" type="radio" value="blue"> Blue </input> <br />
      <input name="color" type="radio" value="green"> Green </input> <br />
      <input name="color" type="radio" value="red"> Red </input> <br />
      <input name="color" type="radio" value="yellow"> Yellow </input> <br />
      <input name="color" type="radio" value="pink"> Pink </input> <br />
      <input name="color" type="radio" value="orange"> Orange </input> <br />
      <input name="color" type="radio" value="purple"> Purple </input> <br />
      <?php echo $colorError; ?>
      <br />
      
      <h4>What is your favorite kind of music?</h4>
      <input name="music" type="radio" value="classical"> Classical </input> <br />
      <input name="music" type="radio" value="rock"> Rock </input> <br />
      <input name="music" type="radio" value="country"> Country </input> <br />
      <input name="music" type="radio" value="jazz"> Jazz </input> <br />
      <input name="music" type="radio" value="world"> World </input> <br />
      <input name="music" type="radio" value="other"> Other </input> <br />
      <?php echo $musicError; ?>
    </div>

    <div class="col-sm-6">
      <h4>Which of these animals do you identify with the most?</h4>
      <input name="animal" type="radio" value="cat"> Cat </input> <br />
      <input name="animal" type="radio" value="dog"> Dog </input> <br />
      <input name="animal" type="radio" value="giraffe"> Giraffe </input> <br />
      <input name="animal" type="radio" value="bear"> Bear </input> <br />
      <input name="animal" type="radio" value="pig"> Pig </input> <br />
      <input name="animal" type="radio" value="monkey"> Monkey </input> <br />
      <input name="animal" type="radio" value="bird"> Bird </input> <br />
      <input name="animal" type="radio" value="dinosaur"> Dinosaur </input> <br />
      <?php echo $animalError; ?>
      <br />

      <h4>Was this survey fun?</h4>
      <input name="liked" type="radio" value="yes"> Yes </input> <br />
      <input name="liked" type="radio" value="no"> No </input> <br />
      <?php echo $likedError; ?>
      <br />
    </div>
  </div>

    <div class="center">
    <input name="done" type="submit" value="Submit Results"></input>
    </div>
  
  </form>
  </div>

</body>
</html>
