<?php

    header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: DELETE");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	// Connect to database
	include("connexion_bdd.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getutilisateurs()
	{
		global $conn;
		$query = "SELECT * FROM utilisateur";
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function getutilisateur($id=0)
	{
		global $conn;
		$query = "SELECT * FROM utilisateur";
		if($id != 0)
		{
			$query .= " WHERE id_utilisateur=".$id." LIMIT 1";
		}
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function Addutilisateur()
	{
		global $conn;
		// $name = $_POST["name"];
		// $description = $_POST["description"];
		// $price = $_POST["price"];
		// $category = $_POST["category"];

		$data = json_decode(file_get_contents("php://input"),true);
		$nom = $data["nom"];
		$prenom = $data["prenom"];
		$adresse = $data["adresse"];
		$cp = $data["cp"];
		$ville = $data["ville"];
		$email = $data["email"];
		$telephone = $data["telephone"];
		$pseudo = $data["pseudo"];
		$mdp = $data["mdp"];
		$type = $data["type"];
	

		echo $query="INSERT INTO utilisateur(nom, prenom, adresse, cp, ville, email, telephone, pseudo, mdp, type) VALUES('".$nom."', '".$prenom."', '".$adresse."', '".$cp."', '".$ville."', '".$email."', '".$telephone."', '".$pseudo."','".$mdp."','".$type."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit ajout avec succes.'
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
	
	function updateutilisateur($id)
	{
		global $conn;
		$data = json_decode(file_get_contents("php://input"),true);
		$nom = $data["nom"];
		$prenom = $data["prenom"];
		$adresse = $data["adresse"];
		$cp = $data["cp"];
		$ville = $data["ville"];
		$email = $data["email"];
		$telephone = $data["telephone"];
		$pseudo = $data["pseudo"];
		$mdp = $data["mdp"];
		$type = $data["type"];
		$query="UPDATE utilisateur SET nom='".$nom."', prenom='".$prenom."', adresse='".$adresse."', cp='".$cp."', ville='".$ville."', email='".$email."', telephone='".$telephone."', pseudo='".$pseudo."' , mdp='".$mdp."', type='".$type."' WHERE id_utilisateur=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'utilisateur mis à jour avec succés.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise à jour de l utilisateur. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function deleteutilisateur($id)
	{
		global $conn;
		$query = "DELETE FROM utilisateur WHERE id_utilisateur=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Utilisateur supprimé avec succés.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>"La suppression de l'utilisateur a échoué. ". mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	//getutilisateur();

	
	switch($request_method)
	{
		
			case 'GET':
				// Retrive Products
				if(!empty($_GET["id_utilisateur"]))
				{
					$id=intval($_GET["id_utilisateur"]);
					getutilisateur($id);
				}
				else
				{
					getutilisateurs();
				}
				break;

			
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			// Ajouter un utilisateur
			Addutilisateur();
			break;
			
		case 'PUT':
			// Modifier un utilisateur
			$id = intval($_GET["id_utilisateur"]);
			updateutilisateur($id);
			break;
			
		case 'DELETE':
			// Supprimer un utilisateur
			$id = intval($_GET["id_utilisateur"]);
			deleteutilisateur($id);
			break;

	}
?>