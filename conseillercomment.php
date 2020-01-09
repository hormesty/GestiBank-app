<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	// Connect to database
	include("connexion_bdd.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getConseillers()
	{
		global $conn;
		$query = "SELECT * FROM conseiller, utilisateur WHERE conseiller.id_utilisateur = utilisateur.id_utilisateur AND type = 'conseiller' ";
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function getConseiller($id)
	{
		global $conn;
		// $query = "SELECT * FROM conseiller";
		// if($id != 0)
		// {
		// 	$query .= " WHERE mat_conseiller=".$id." LIMIT 1";
		// }
		$query = "SELECT * FROM conseiller, utilisateur WHERE conseiller.mat_conseiller=".$id." AND (conseiller.id_utilisateur = utilisateur.id_utilisateur AND type = 'conseiller')" ;
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function AddConseiller()
	{
		global $conn;
		// $name = $_POST["name"];
		// $description = $_POST["description"];
		// $price = $_POST["price"];
		// $category = $_POST["category"];
		// $created = date('Y-m-d H:i:s');
		// $modified = date('Y-m-d H:i:s');
		$data = json_decode(file_get_contents("php://input"),true);
		$id_utilisateur = $data["id_utilisateur"]; 
		$id_admin = $data["id_admin"]; 
		$datedebut = $data["datedebut"];
		$datefin = $data["datefin"];
		
		echo $query="INSERT INTO conseiller (id_utilisateur,id_admin,datedebut,datefin) VALUES ('".$id_utilisateur."','".$id_admin."','".$datedebut."','".$datefin."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit ajouté avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function updateConseiller($id)
	{
		global $conn;
		$data = json_decode(file_get_contents("php://input"),true);
		$id_utilisateur = $data["id_utilisateur"]; 
		$id_admin = $data["id_admin"]; 
		$datedebut = $data["datedebut"];
		$datefin = $data["datefin"];
		$query="UPDATE conseiller SET id_admin='".$id_admin."', datedebut='".$datedebut."', datefin='".$datefin."' WHERE mat_conseiller=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'conseiller mis à jour avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'échec de la mise à jour de produit. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function deleteConseiller($id)
	{
		global $conn;
		$query = "DELETE FROM conseiller WHERE mat_conseiller=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Conseiller supprimé avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'La suppression du produit a échoué. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
// getConseiller();
// AddConseiller();
	switch($request_method)
	{
		case 'GET':
			// Retrive Products
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				getConseiller($id);
			}
			else
			{
				getConseillers();
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	
			
		case 'POST':
			// Ajouter un produit
			AddConseiller();
			break;
			
		case 'PUT':
			// Modifier un produit
			$id = intval($_GET["id"]);
			updateConseiller($id);
			break;
			
		case 'DELETE':
			// Supprimer un produit
			$id = intval($_GET["id"]);
			deleteConseiller($id);
			break;

	}
?>