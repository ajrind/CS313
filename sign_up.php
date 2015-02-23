<?php require 'dbConnect.php';?>

<?php
  // make sure the session is active

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
  <title>Midvale - Account Creation</title>
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
    <h3 class = "center">Account Creation</h3>
  </div>
  
 <div class="col-sm-6">
    <h2> Admin: </h2>
    <p>Enter the following information to create an account for a user.</p>
    <br />

    <form action="process_account.php" method="POST">
      <table>
        <tr>
          <td class ="bold_right" >
            First Name:
          </td>
          <td>
            <input name="first_name"> </input> 
          </td>
        </tr> 
        <tr>
          <td> <br /></td>
        </tr>
        <tr>
          <td class ="bold_right" >
            Last Name:  <br />
          </td>
          <td>
            <input name="last_name"> </input> 
          </td>
        </tr>
        <tr>
          <td> <br /></td>
        </tr>
        <tr>
          <td class ="bold_right" >
            Email:
          </td>
          <td>
            <input name="email"> </input> 
          </td>
        </tr>
        <tr>
          <td> <br /></td>
        </tr>
        <!--
        <tr>
          <td class ="bold_right" >
            Verify Email:
          </td>
          <td>
            <input name="email2"> </input> 
          </td>
        </tr>
        <tr>
          <td> <br /></td>
        </tr>
        -->
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
            Password:
          </td>
          <td>
            <input name="password"> </input> 
          </td>
        </tr>
        <tr>
          <td> <br /></td>
        </tr>
        <!--
        <tr>
          <td class ="bold_right" >
            Verify Password:
          </td>
          <td>
            <input name="password2"> </input> 
          </td>
        </tr>
        -->
        <tr>
          <td> <br /></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input name="done" type="submit" value="Sign Up"></input>
          </td>
        </tr>
      </table>
    </form>
  </div>

  <div class="col-sm-5">
    <h3> List of current user accounts:</h3>
    <?php
        $db = loadDatabase();
        // get users data from database
        $stmt = $db->query("SELECT username, user_id FROM users ORDER BY username ASC");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // populate options
        foreach ($results as $row)
        {
          echo $row['username'] . "<br />\n";
        }
    ?>
</div>
</body>
</html>