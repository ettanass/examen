<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "personne":
		deletePersonne($_GET);
		break;
	case "colis":
		deleteColis($_GET);
		break;		
	default:
		;
	break;
}

function deletePersonne($data){
	global $conn;
	$sql = "DELETE FROM personne WHERE  id_perso =".$data["id_perso"];

	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "score deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$sql1 = "DELETE FROM colis WHERE  id_perso =".$data["id_perso"];

	//echo $sql;
	if ($conn->query($sql1) === TRUE) {
	    echo "score deleted successfully";
	} else {
	    echo "Error: " . $sql1 . "<br>" . $conn->error;
	}	
}

function deleteColis($data){
	global $conn;
	
	$sql = "DELETE FROM personnes WHERE  id_colis =".$data["id_colis"];
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	

}



$conn->close();