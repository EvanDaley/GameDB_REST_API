<?php
	include_once("creds.php");
	include_once("log.php");
		
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: *");
	header("Content-Type: application/json");
	
	$mysqli = new mysqli($host, $user , $pw, $db);
	if ($mysqli->connect_errno) 
	{
		echo json_encode("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
		header('Bad Request', true, 400);
		die("Bad Request");
	}
		
	$request = $_SERVER['REQUEST_URI'];
	
	$id = mysqli_real_escape_string($mysqli, htmlspecialchars($_GET["id"]));
	$term = mysqli_real_escape_string($mysqli, htmlspecialchars($_GET["term"]));
	$count = mysqli_real_escape_string($mysqli, htmlspecialchars($_GET["count"]));
		
	$title = mysqli_real_escape_string($mysqli, htmlspecialchars($_GET["title"]));
	$year = mysqli_real_escape_string($mysqli, htmlspecialchars($_GET["year"]));
	$studio = mysqli_real_escape_string($mysqli, htmlspecialchars($_GET["studio"]));
	$price = mysqli_real_escape_string($mysqli, htmlspecialchars($_GET["price"]));

	$request_parts = explode('/', $_SERVER['REQUEST_URI']); // array('users', 'show', 'abc')
	
	if($request_parts[2] == "post")
	{		
		$sql = $mysqli->prepare("INSERT INTO movie (title,studio,year,price) VALUES (?,?,?,?)");
		$sql->bind_param('ssis', $title, $studio, $year, $price);
		
		$sql->execute();
		$sql->close();
		
		header('', true, 200);
		echo json_encode('');
	}
	else if($request_parts[2] == "put")
	{
		$sql = "SELECT * FROM movie WHERE id='$id'";
		$results = $mysqli->query($sql);
		
		if ($results->num_rows > 0) 
		{
			echo json_encode("ID found, entry updated");
			$sql = $mysqli->prepare("UPDATE movie set title=?, studio=?, year=?, price=? WHERE id=?");
			$sql->bind_param('ssisi', $title, $studio, $year, $price, $id);
			$sql->execute();
		}
		else
		{
			echo json_encode("ID not found. Inserting new record");
			$sql = $mysqli->prepare("INSERT INTO movie (title,studio,year,price) VALUES (?,?,?,?)");
			$sql->bind_param('ssis', $title, $studio, $year, $price);
			$sql->execute();
		}
		
		header('', true, 200);
		
		$sql->close();	
	}
	else if($request_parts[2] == "delete")
	{
		$mysqli = new mysqli($host, $user , $pw, $db);
		if ($mysqli->connect_errno) 
		{
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		
		$sql = $mysqli->prepare("DELETE FROM movie where id = ?");
		$sql->bind_param('i', $id);
		
		if($sql->execute())
		{
			echo json_encode('Successful deletion');
			header(null, true, 200);
		}
		else
		{
			header('Bad Request', true, 400);
			die("Bad Request");
		}
		$sql->close();
	}
	else if($request_parts[2] == "options")
	{
		// send back a list of options
		$options = array(
			'GET' => 'Retrieve items from the service. Parameters: id (to search by id), term (to search for similar terms in title and studio), count (to return a count of results)',
			'POST' => 'Add Movie to table',
			'PUT' => 'Update movie. Parameters: id (to update movie by id) and the fields to update: title, studio, year, price',
			'DELETE' => 'Delete a movie. Parameters: id (to delete by id)',
			'OPTIONS' => 'Get the list list of options'
		);
		
		echo json_encode($options);
	}
	else if($request_parts[2] == "get"){
		$mysqli = new mysqli($host, $user , $pw, $db);
		if ($mysqli->connect_errno) 
		{
			echo json_encode("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
			header('Bad Request', true, 400);
			die("Bad Request");
		}
		
		$sql = '';
		if($id == "")
		{
			$sql = 'SELECT * FROM movie ORDER BY title';
		}
		else
		{
			$sql = "SELECT * FROM movie WHERE id='$id' ORDER BY id";
		}
		
		if(strlen($term) > 0)
		{
			$sql = "SELECT * FROM movie WHERE studio LIKE '$term' OR title LIKE '$term' ORDER BY id";
		}

		if(!$results = $mysqli->query($sql))
		{
			die("Error running query");
		}

		if ($results->num_rows > 0) 
		{
			$summation = array();
			
			// store each line in an array and then push it into 'summation'
			while($row = $results->fetch_assoc())
			{
				$entry = array(
					"id"=>$row["id"],
					"title"=>$row["title"],
					"year"=>$row["year"],
					"studio"=>$row["studio"],
					"price"=>$row["price"]
				);
				array_push($summation, $entry);
			}
			
			// take the giant array we just built and encode it into json, then echo it
			$output = json_encode($summation);
			
			if($count == "true")
			{
				echo json_encode(count($summation));
			}
			else
			{
				echo $output;
			}
		} 
		else
		{
			echo json_encode("0 results");
		}
	}
	else
	{
		header('Bad Request', true, 400);
		die("Bad Request");
	}
	
	$mysqli ->close();
?>