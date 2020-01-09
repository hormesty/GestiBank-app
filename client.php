<?php
    header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// connexion a la BDD
require_once 'connexion_bdd.php';

$request_method = $_SERVER["REQUEST_METHOD"];

function getClients()
{
    global $conn;

    // $query = "SELECT * FROM client";
    $query = "SELECT * FROM client, utilisateur WHERE client.id_utilisateur = utilisateur.id_utilisateur AND type = 'client' ";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function getClient($id)
	{
		global $conn;
		// $query = "SELECT * FROM client WHERE id_client=".$id."";
		$query = "SELECT * FROM client, utilisateur WHERE client.id_client=".$id." AND (client.id_utilisateur = utilisateur.id_utilisateur AND type = 'client')" ;
		
		$response = array();
		$result = mysqli_query($conn, $query);
		
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}

// getProducts();

function AddClient()
	{
		global $conn;
		// $name = $_POST["name"];
		// $description = $_POST["description"];
		// $price = $_POST["price"];
		// $category = $_POST["category_id"];
        $data = json_decode(file_get_contents("php://input"), true);
        
		$situation_matr = $data["situation_matr"];
		$nb_enfant = $data["nb_enfant"];
		$revenu_mensuel = $data["revenu_mensuel"];
		$mat_conseiller = $data["mat_conseiller"];
		$justif_identite = $data["justif_identite"];
		$justif_domicile = $data["justif_domicile"];
		$justif_salaire = $data["justif_salaire"];
		$id_utilisateur = $data["id_utilisateur"];
		
		 $query="INSERT INTO client (situation_matr, nb_enfant, revenu_mensuel, mat_conseiller, justif_identite, justif_domicile, justif_salaire, id_utilisateur) VALUES ('".$situation_matr."', '".$nb_enfant."', '".$revenu_mensuel."', '".$mat_conseiller."', '".$justif_identite."', '".$justif_domicile."' , '".$justif_salaire."', '".$id_utilisateur."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Client ajouté avec succes.'
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
    


	function updateClient($id)
	{
		global $conn;
        $data = json_decode(file_get_contents("php://input"),true);
        
		
		$situation_matr = $data["situation_matr"];
		$nb_enfant = $data["nb_enfant"];
		$revenu_mensuel = $data["revenu_mensuel"];
		$mat_conseiller = $data["mat_conseiller"];
		$justif_identite = $data["justif_identite"];
		$justif_domicile = $data["justif_domicile"];
		$justif_salaire = $data["justif_salaire"];
		
		$query="UPDATE client SET situation_matr = '".$situation_matr."', nb_enfant = '".$nb_enfant."', revenu_mensuel = '".$revenu_mensuel."', mat_conseiller = '".$mat_conseiller."' , justif_identite = '".$justif_identite."', justif_salaire ='".$justif_salaire."', justif_domicile='".$justif_domicile."' WHERE id_client=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'client mise à jour avec succés.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'échec de la mise à jour du client. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
    }
    
    function deleteClient($id)
	{
		global $conn;
		$query = "DELETE FROM client WHERE id_client=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Client supprimé avec succés.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'La suppression du client a échoué. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
    

    switch($request_method)
	{
		
		case 'GET':
			// Retrive Products
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				getClient($id);
			}
			else
			{
				getClients();
			}	
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			// Ajouter un produit
			AddClient();
			break;
			
		case 'PUT':
			// Modifier un produit
			$id = intval($_GET["id"]);
			updateClient($id);
			break;
			
		case 'DELETE':
			// Supprimer un produit
			$id = intval($_GET["id"]);
			deleteClient($id);
			break;

    }
