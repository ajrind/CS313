<?php require 'dbConnect.php';?>

<?php
  // insert verification to make sure that they are signed in before they can create a character.  
  // If not, create page that says "you must be signed in to create a character" with a link to sign_up.php


  // Forward to Character viewer after dones

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
  
  <div>
    <h2> Sign Up and Start Playing </h2>
    <p>Enter the following information to create your account.</p>
    <br />

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <table>
        <tr>
          <td class ="bold_right" >
            Character Name:
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
            Class:  <br />
          </td>
          <td>
            <select name="characterClass" id="characterClass">
             <option value="none"></option>
             <option value="3">Warrior</option>
             <option value="1">Traveler</option>
             <option value="2">Mage</option>
            </select>
          </td>
        </tr>
        <tr>
          <td> <br /></td>
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