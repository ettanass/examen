<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "personne":
		createPersonne($_GET);
		break;
	case "score":
		createColis($_GET);
		break;
				
	default:
		;
	break;
}



function createPersonne($data){ 	
	global $conn;



	$sql = "SELECT * FROM personne where id_perso=".$data["id_perso"];
	$result = $conn->query($sql);

	if ($result->num_rows==0) {
		$sql = "INSERT INTO personne ( nom , prenom )
		VALUES ( '".$data["nom"]."' , '".$data["prenom"]."' )";
					//echo $sql."<br>".$result->num_rows."<br>";
					//echo $sql;
		if ($conn->query($sql) === TRUE) {
			return mysqli_insert_id($conn);

			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
}




function createColis($data){
	global $conn;
	
	$sql = "SELECT * FROM personne where id_perso=".$data["id_perso"];
	$result = $conn->query($sql);

	if ($result->num_rows==0) {
		$sql = "INSERT INTO colis ( nom_colis , id_perso )
		VALUES ( ".$data["nom_colis"]." , ".$data["id_perso"]." )";
					//echo $sql."<br>".$result->num_rows."<br>";
					//echo $sql;
		if ($conn->query($sql) === TRUE) {
			return mysqli_insert_id($conn);

			//echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}


$conn->close();
