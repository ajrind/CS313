<?php 
require 'dbConnect.php';
require 'password.php';

// get the data from the POST
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$email = htmlspecialchars($_POST['email']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$is_admin = false;


$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try
{
	$db = loadDatabase();

	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	$query = 'INSERT INTO users(username, password, email, first_name, last_name, is_admin) 
		                 VALUES(:username, :password, :email, :first_name, :last_name, :is_admin)';

	$statement = $db->prepare($query);

	$statement->bindParam(':first_name', $first_name);
	$statement->bindParam(':last_name', $last_name);
	$statement->bindParam(':username', $username);
	$statement->bindParam(':password', $hashedPassword);
	$statement->bindParam(':email', $email);
	$statement->bindParam(':is_admin', $is_admin);

	$statement->execute();
}
catch (Exception $ex)
{
	//echo "Error with DB. Details: $ex";
	die();
}

header("Location: sign_up.php");
die();
?>