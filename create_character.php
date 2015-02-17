<?php require 'dbConnect.php';?>

<?php

  $cookieName = "loggedIn";
  $cookieValue = "NULL";
  $forwardLocation = "login.php";

  // If login worked
  if(isset($_COOKIE[$cookieName]) && $_COOKIE[$cookieName] != "NULL")
  {
    // left blank intentionally
  }

  else
  {
    header("Location:$forwardLocation");
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
        <h3 class = "center">Character Creation</h3>
      </div>
  
    <div>
    <h2> Sign Up and Start Playing </h2>
    <p>Enter the following information to create your account.</p>
    <br />

    <form id="mainForm" action="process_character.php" method="GET">
    
    <?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
      <table>
        <tr>
          <td class ="bold_right" >
            Character Name:
          </td>
          <td>
            <input name="name"> </input> 
          </td>
        </tr> 
        <tr>
          <td> <br /></td>
        </tr>
        <tr>
          <td class ="bold_right" >
            Class:  <br />
          </td>
          <td>
            <select name="characterClass" id="characterClass">
             <option value="traveler">Traveler</option>
             <option value="mage">Mage</option>
             <option value="warrior">Warrior</option>
            </select>
          </td>
        </tr>
        <tr>
          <td> <br /></td>
        </tr>
        <tr>
          <td class ="bold_right" >
            Owner:
          </td>
          <td>

            <select name="owner" id="owner">
            <?php
             
              $db = loadDatabase();
              // get users data from database
              $stmt = $db->query("SELECT username, user_id FROM users ORDER BY username ASC");

              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

              // populate options
              foreach ($results as $row)
              {
                echo "  <option value =\"" . $row['user_id'] . "\"> ". $row['username'] . "</option>\n";
              }
            ?>
            </select>
          </td>
        </tr> 
        <tr>
          <td></td>
          <td>
            <input name="done" type="submit" value="Create Character"></input>
          </td>
        </tr>
      </table>
    </form>
  </div>
  </div>
</body>
</html>