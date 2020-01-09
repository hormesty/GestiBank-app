<?php

    header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: DELETE");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	// Connect to database
	include("db_connect.php");
    $request_method = $_SERVER["REQUEST_METHOD"];
    
  
	function getcomptes()
	{
		global $conn;
        // $query = "SELECT * FROM comptes";
        $query = "SELECT * FROM comptes , client WHERE comptes.id_client = client.id_client  AND type = 'comptes' ";
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}

	
	function getcompte($id=0)
	{
		global $conn;
	// 	$query = "SELECT * FROM comptes";
	// 	if($id != 0)
	// 	{
	// 		$query .= " WHERE num_compte =".$id." LIMIT 1";
    // 	}
    $query = "SELECT * FROM comptes, client WHERE comptes.num_compte=".$id." AND (comptes.id_client = client.id_client AND type = 'comptes')" ;
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	
	function Addcomptes()
	{
		global $conn;
		
		$data = json_decode(file_get_contents("php://input"),true);

		$date_creation = $data["date_creation"];
		$solde_compte = $data["solde_compte"];
		$type_compte = $data["type_compte"];
		$debit_autor = $data["debit_autor"];
		$id_client = $data["id_client"];
	

		echo $query="INSERT INTO comptes (date_creation, , solde_compte, type_compte, debit_autor, id_client) VALUES('".$date_creation."', '".$solde_compte."', '".$type_compte."', '".$debit_autor."', '".$id_client."')";
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
	
	function updatecomptes($id)
	{
		global $conn;
		$data = json_decode(file_get_contents("php://input"),true);
		$date_creation = $data["date_creation"];
		$solde_compte = $data["solde_compte"];
		$type_compte = $data["type_compte"];
		$debit_autor = $data["debit_autor"];
		$id_client = $data["id_client"];

		$query="UPDATE comptes SET date_creation='".$date_creation."', solde_compte='".$solde_compte."', type_compte='".$type_compte."', debit_autor='".$debit_autor."', id_client='".$id_client."' WHERE num_compte=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'compte mis à jour avec succés.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise à jour du compte. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function deletecomptes($id)
	{
		global $conn;
		$query = "DELETE FROM comptes WHERE num_compte=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Compte est supprimé avec succés.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>"La suppression du compte a échoué. ". mysqli_error($conn)
			);
		}
	// 	header('Content-Type: application/json');
	// 	echo json_encode($response);
	}


	
	switch($request_method)
	{
		
			case 'GET':
				// Retrive Products
				if(!empty($_GET["num_compte"]))
				{
					$id=intval($_GET["num_compte"]);
					getcompte($id);
				}
				else
				{
					getcomptes();
				}
				break;

			
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			// Ajouter un utilisateur
			Addcomptes();
			break;
			
		case 'PUT':
			// Modifier un utilisateur
			$id = intval($_GET["num_compte"]);
			updatecomptes($id);
			break;
			
		case 'DELETE':
			// Supprimer un utilisateur
			$id = intval($_GET["num_compte"]);
			deletecomptes($id);
			break;
	}
?>