<?php require 'dbConnect.php';?>

<?php
  $tries = 0;
  $cookieName = "loggedIn";
  $cookieValue = "NULL";
  $forwardLocation = "midvale_main.php";

  if(isset($_COOKIE[$cookieName]) && $_COOKIE[$cookieName] != "NULL")
  {
    header("Location:$forwardLocation");
  }

  else
  {
    setcookie($cookieName,$cookieValue);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Midvale - Character Creation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php

	  $error = false;
      $loginError = ""; 
	  if($_SERVER["REQUEST_METHOD"] == "POST")
      {
         // login information
      	 $username = $_POST["username"]; 
         $password = $_POST["password"];
      	 $tries++;
         // retreive from database
      	 $db = loadDatabase();
      	 $request = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password ."';";

		 $stmt = $db->query($request);

         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

         $size = count($results);
         //echo "size = " . $size;

         // successful login
         if ($size == 1)
         {
         	$cookieValue = $_POST["username"];
         	setcookie($cookieName, $cookieValue);
     		header("Location:$forwardLocation");
     		$loginError ="";
         }

         // unsuccessful login attempt
         else
         {
         	if(empty($_POST["username"]))
         	{
         		$loginError = "You must enter a username!";
         	}

         	else if(empty($_POST["password"]))
         	{
         		$loginError = "You must enter a password!";
         	}

         	else
         	{
         		$loginError = "Invalid username / password combination!";
         		$cookieValue = "NULL";
         	}
         }
	   }
     ?>

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
      <h3 class = "center">Admin Login</h3>
    </div>
	<form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <table>
        <tr>
          <td class ="bold_right" >
            Username:
          </td>
          <td>
            <input name="username"> </input>
          </td>
        </tr>
        <tr>
          <td> <br /></td>
        </tr>
        <tr>
          <td class ="bold_right" >
            Password:  <br />
          </td>
          <td>
          	<input name="password"> </input>
          </td>
        </tr>
        <tr>
          <td> <br /></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input name="done" type="submit" value="Login"></input>
          </td>
        </tr>
        <tr>
          <td> <br /></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <?php 
            	echo "<h4 style=\"color:red\">" . $loginError . "</h4>";
          	?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>