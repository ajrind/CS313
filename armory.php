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
  
  <div>
    <h2> What New Gear Awaits You? </h2>
    <p>Use the search engine below to look for new items to use in outfitting your character.</p>
    <br />
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      
      Search for: 
      <select name="searchRequest" id="searchRequest">
       <option value="none"></option>
       <option value="all">All Gear</option>
       <option value="armor">Armor</option>
       <option value="weapon">Weapons</option>
      </select>
      <input name="done" type="submit" value="Submit Results"></input>
    </form>
  </div>

  <div id="tableResults">

   
    <?php

      function showArmors()
      {
        $db = loadDatabase();

        echo "<h3> Armor </h3>";

        // get data from database
        $stmt = $db->query("SELECT name, type, level_required, defense, description FROM armors");

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // header
        echo "<table>";
        echo "<tr>";
        echo "  <th class = \"col-md-3\"> Name </th>";
        echo "  <th class = \"col-md-2\"> Type </th>";
        echo "  <th class = \"col-md-1\"> Level </th>";
        echo "  <th class = \"col-md-2\"> Defense </th>";
        echo "  <th class = \"col-md-3\"> Description </th>";
        echo "</tr>";

        // populate table with rows
        foreach ($results as $col)
        {
          /*
          if (is_null($col['description']))
          {
            $col['description'] = "";
          }
          */

          echo "<tr>";
          echo "  <td class = \"col-md-3\">" . $col['name'] . " </td>";
          echo "  <td class = \"col-md-2\">" . $col['type'] . " </td>";
          echo "  <td class = \"col-md-1\">" . $col['level_required'] . " </td>";
          echo "  <td class = \"col-md-2\">" . $col['defense'] . " </td>";
          echo "  <td class = \"col-md-3\">" . $col['description'] . " </td>";
          echo "</tr>";
        }

        echo "</table>";

      }

      function showWeapons()
      {
        echo "<h3> Weapons </h3>";
        
        $db = loadDatabase();

        // get data from database
        $stmt = $db->query("SELECT name, type, level_required, damage, description FROM weapons");

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // header
        echo "<table>";
        echo "<tr>";
        echo "  <th class = \"col-md-3\"> Name </th>";
        echo "  <th class = \"col-md-2\"> Type </th>";
        echo "  <th class = \"col-md-1\"> Level </th>";
        echo "  <th class = \"col-md-2\"> Damage </th>";
        echo "  <th class = \"col-md-3\"> Description </th>";
        echo "</tr>";

        // populate table with rows
        foreach ($results as $col)
        {
          if (is_null($col['description']))
          {
            $col['description'] = "";
          }

          echo "<tr>";
          echo "  <td class = \"col-md-3\">" . $col['name'] . " </td>";
          echo "  <td class = \"col-md-2\">" . $col['type'] . " </td>";
          echo "  <td class = \"col-md-1\">" . $col['level_required'] . " </td>";
          echo "  <td class = \"col-md-2\">" . $col['damage'] . " </td>";
          echo "  <td class = \"col-md-3\">" . $col['description'] . " </td>";
          echo "</tr>";
        }

        echo "</table>";
      }


      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
        $requestType = $_POST["searchRequest"]; 
        
        /*
        if ($requestType = "none")
        {
          // left blank intentionally
        }
        */
          if ($requestType == "none")
          {

          ?>
            <script type="text/javascript">$('#tableResults').hide()</script>
          <?php
          
          }

          if ($requestType == "armor")
          {
            showArmors();
          }

          else if($requestType == "weapon")
          {
            showWeapons();
          }

          else if($requestType == "all")
          {
            showWeapons();
            echo "<br />";
            showArmors();
          }
      }

     ?>
  </div>
  </div>
</div>
</body>
</html>