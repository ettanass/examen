<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "personne":
		selectAllScores();
		break;
	case "colis":
		selectColis($_GET);
		break;
	default:
		;
	break;
}
function selectAllScores(){
	global $conn;
	$list= array();
	$sql = "SELECT *, id_perso recid FROM personne ";
	//echo $sql."<br>".$result->num_rows."<br>";
	$result = $conn->query($sql);
	if ($result && $result->num_rows) {
		while($row = $result->fetch_assoc()) {
			$list[] = $row;
		}

		echo json_encode($list);

	} else {
	    echo "";
	}	
	
}



function selectColis($data){
	global $conn;
	
	$sql = "SELECT * FROM colis where id_perso=".$data["id_perso"] ;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$list[] = $row;
		}

		echo json_encode($list);

	} else {
	    echo "";
	}	
}




$conn->close();