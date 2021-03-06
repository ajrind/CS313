<?php require 'dbConnect.php';?>

<?php
  $forwardLocation = "login.php";

session_start();

if (isset($_SESSION['username']))
{
  // left blank intentionally
}
else
{
  header("Location:$forwardLocation");
  die(); // we always include a die after redirects.
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Midvale</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="collapse navbar-collapse bs-navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="index.html">About Me</a>
        </li>
        <li>
          <a href="assignments.html">Assignments</a>
        </li>
        <li>
          <a href="resume.html">Resume and Links</a>
        </li>
      </ul>
    </nav>
<div class="container">
  <div class="jumbotron">
    <h1 class = "center">Midvale</h1>
  </div>
  <div class="center">
      <h2> Play Game </h2>
      <h4> (coming soon) </h4>
      <h2> <a href="sign_up.php">Create Account </a></h2>
      <h2> <a href="create_character.php">Create Character </a></h2>
      <h4> Create a character to explore Midvale </h4>
      <h2> <a href="leaderboard.php">Leaderboard </a></h2>
      <h4> See how other players are doing </h4>
      <h2> <a href="armory.php"> Armory </a></h2>
      <h4> Discover new gear </h4>
   </div>
</div>

</body>
</html>
