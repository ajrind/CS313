<?php
 function loadDatabase() { 
  $hostName = 'localhost';
  $dbName = 'midvale';
  $userName = 'php';
  $password = 'php-pass';
  
  try
  {
    $db = new PDO("mysql:host=$hostName;dbname=$dbName",$userName, $password);
  }
  
  catch (PDOException $ex) 
  {
    echo "Error!: " . $ex->getMessage();
    die(); 
  }
  return $db;
}
?>