<?php require 'dbConnect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Midvale - Armory</title>
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
    <h3 class = "center"> Armory</h3>
  </div>
  
  <div class = "center">
    <h2> Current Leaderboard: </h2>
    <?php

      $db = loadDatabase();

        // get data from database
      $stmt = $db->query("SELECT name, level, class, owner FROM heroes ORDER BY name, class, level DESC");
      $stmt2 = $db->query("SELECT username FROM users");

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
      //$stmt = $db->query("SELECT h\.name, h\.level, h\.class, h\.owner, u\.username FROM heroes h JOIN users u ON h\.owner = u\.user_id ORDER BY h\.name, h\.class, h\.level DESC");
//$stmt = $db->query("SELECT h\.name, h\.level, h\.class, h\.owner, u\.username FROM heroes h JOIN users u ON h\.owner = u\.user_id ORDER BY h\.name, h\.class, h\.level DESC");

      // header
      echo "<table>";
      echo "<tr>";
      echo "  <th class = \"col-md-2\"> <h3>Rank</h3> </th>";
      echo "  <th class = \"col-md-3\"> <h3>Name</h3> </th>";
      echo "  <th class = \"col-md-2\"> <h3>Level</h3> </th>";
      echo "  <th class = \"col-md-3\"> <h3>Class</h3> </th>";
      echo "  <th class = \"col-md-2\"> <h3>User</h3> </th>";
      echo "</tr>";


      $userinfo = array(0 => 'ERROR_USER');
      
      foreach ($results2 as $var)
      {
        $userinfo[] = $var['username'];
      }


      $count = 1;
      // populate table with rows
      foreach ($results as $col)
      {
        
      

        switch($col['class'])
        {
          case(1):
          {
            $col['class'] = "Traveler";
            break;
          }

          case(2):
          {
            $col['class'] = "Mage";
          break;
          }

          case(3):
          {
            $col['class'] = "Warrior";
            break;
          }

          case(4):
          {
            $col['class'] = "Game Master";
            break;
          }

          default:
          {
            $col['class'] = "NOTHING DETECTED!";
          }
        }

        echo "<tr>";
        echo "  <td class = \"col-md-2\">" . $count . " </td>";
        echo "  <td class = \"col-md-3\">" . $col['name'] . " </td>";
        echo "  <td class = \"col-md-2\">" . $col['level'] . " </td>";
        echo "  <td class = \"col-md-3\">" . $col['class'] . " </td>";
        echo "  <td class = \"col-md-2\">" . $userinfo[intval($col['owner'])] . " </td>";
        echo "</tr>";
        $count++;
      }

      echo "</table>";  
    ?>

  </div>
</div>
</body>
</html>