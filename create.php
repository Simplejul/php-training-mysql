<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>

	<?php
		function createHike() {
			
			if (isset($_POST)){
				$name=$_POST['name'];
				$difficulty=$_POST['difficulty'];
				$distance=$_POST['distance'];
				$duration=$_POST['duration'];
				$height=$_POST['height_difference'];

				$pdo = new PDO('mysql:host=localhost;dbname=reunion_island','root','toor',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

				$statement = $pdo->prepare("INSERT INTO hiking(id,name,difficulty,distance,duration,height_difference) 
				VALUES(:name, :difficulty, :distance, :duration, :height_difference)");

				$statement->execute([
					"name" => $name,
					"difficulty" => $difficulty,
					"distance" => $distance,
					"duration" => $duration,
					"height_difference" => $height
				]);
			}
		};
		createHike();
		// function checkResult () {
		// 	try {
		// 		createHike();
		// 		echo "La randonnée a été ajoutée avec succès";
		// 	} catch (Exception $e) {
		// 		die("Error :: ".$e);
		// 	}
		// }
		// createHike();

			// $pdo = new PDO('mysql:host=localhost;dbname=reunion_island','root','toor',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			//   $sql = 'INSERT INTO hiking(name,difficulty,distance,duration,height_difference)
			//    VALUES ("$name3","Très facile","32","03:00:00","33")';
			//   $req = $pdo -> query($sql);
			  //$req -> closeCursor();

			// echo $_POST['name'];
			// echo gettype($duration);

			// $servername = "localhost";
			// $database = "reunion_island";
			// $username = "root";
			// $password = "toor";

			// // Create connection

			// $conn = mysqli_connect($servername, $username, $password, $database);

			// // Check connection

			// if (!$conn) {
			// 	die("Connection failed: " . mysqli_connect_error());
			// }
			
			// echo "Connected successfully";
			
			// $sql = "INSERT INTO hiking (name,difficulty,distance,duration,height_difference) VALUES ($name, $difficulty, $distance, $duration, $height)";
			
			// if (mysqli_query($conn, $sql)) {
			// 	echo "New record created successfully";
			// } else {
			// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			// }
			// mysqli_close($conn);
		


	?>

</body>
</html>
