<?php require 'dbConnect.php';


// get the data from the POST
$name = $_GET['name'];
$className = $_GET['characterClass'];
$owner = $_GET['owner'];

echo "name=$name <br />";
echo "className=$className<br />";

// determine the base stats

$max_hp = 0;
$max_ep = 0;
$level = 1;
$class_id = 0;
$str = 0;
$agi = 0;
$mag = 0;


// Traveler
if ($className == "traveler")
{
	echo "Traveler!<br />";
	$max_hp = 40;
	$max_ep = 8;
	$str = 5;
	$agi = 7;
	$mag = 3;
	$class_id = 1;
}

// Mage
else if ($className == "mage")
{
	echo "Mage!<br />";
	$max_hp = 30;
	$max_ep = 12;
	$str = 3;
	$agi = 3;
	$mag = 9;
	$class_id = 2;
}

// Warrior
else if ($className == "warrior")
{
	echo "Warrior!<br />";
	$max_hp = 50;
	$max_ep = 5;
	$str = 7;
	$agi = 5;
	$mag = 3;
    $class_id = 3;
}

// Error
else
{
	echo "COULDN'T FIND CLASS!<br />";
}


try
{
	$db = loadDatabase();

	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	$query = 'INSERT INTO heroes(name,level,class,max_hp,max_ep,current_hp, current_ep,str,agi,mag,owner) 
		VALUES(:name,:level,:class,:max_hp,:max_ep,:current_hp,:current_ep,
		:str,:agi,:mag,:owner)';

	$statement = $db->prepare($query);

	$statement->bindParam(':name', $name);
	$statement->bindParam(':level', $level);
	$statement->bindParam(':class', $class_id);
	$statement->bindParam(':max_hp', $max_hp);
	$statement->bindParam(':max_ep', $max_ep);
	$statement->bindParam(':current_hp', $max_hp);
	$statement->bindParam(':current_ep', $max_ep);
	$statement->bindParam(':str', $str);
	$statement->bindParam(':agi', $agi);
	$statement->bindParam(':mag', $mag);
	$statement->bindParam(':owner',$owner);

	$statement->execute();
}
catch (Exception $ex)
{
	//echo "Error with DB. Details: $ex";
	die();
}

header("Location: leaderboard.php");
die();
?>