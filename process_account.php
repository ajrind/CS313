<?php require 'dbConnect.php';

// get the data from the POST
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$is_admin = false;

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
	$statement->bindParam(':password', $password);
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