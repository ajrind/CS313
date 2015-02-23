<?php 
require 'dbConnect.php';
require 'password.php';
?>

<?php

  // make sure the session is active
$forwardLocation = "midvale_main.php";

session_start();

if (isset($_SESSION['username']))
{
  header("Location:$forwardLocation");
  die(); // we always include a die after redirects.
}


else
{
  // left blank intentionally
}


$loginError = false;

if (isset($_POST["username"]) && isset($_POST["password"]))
{
  // they have submitted a username and password for us to check
  $username = $_POST["username"];
  $password = $_POST["password"];

  try
  {
    $db = loadDatabase();


    // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $query = 'SELECT password FROM users WHERE username=:username';

    $statement = $db->prepare($query);
    $statement->bindParam(':username', $username);

    $result = $statement->execute();

    // if the entry exists, then check the password
    if ($result)
    {
      $row = $statement->fetch();
      $hashedPasswordFromDB = $row['password'];

      // check password
      if (password_verify($password, $hashedPasswordFromDB))
      {
        // password was correct, put the user on the session, and redirect to home
        $_SESSION['username'] = $username;
        header("Location:$forwardLocation");
        die(); // we always include a die after redirects.
      }
      else
      {
        $loginError = true;
      }

    }
    else
    {
      $loginError = true;
    }
  }
  catch (Exception $ex)
  {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
  }

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
          	<input name="password" type="password"> </input>
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
            if ($loginError)
            {
            	echo "<h4 style=\"color:red\"> Incorrect username / password combination! </h4>";
            }
          	?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>