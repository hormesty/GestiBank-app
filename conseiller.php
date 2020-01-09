<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: POST, PUT");

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
		// $response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response = $row;
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
		$datedebut = $data["datedebut"];
		$datefin = $data["datefin"];
		$nom = $data["nom"];
		$prenom = $data["prenom"];
		$adresse = $data["adresse"];
		$cp = $data["cp"];
		$ville = $data["ville"];
		$email = $data["email"];
		$telephone = $data["telephone"];
		$pseudo = $data["pseudo"];
		$mdp = $data["mdp"];
		$type=$data["type"];
		
		echo $query="INSERT INTO utilisateur (nom, prenom, email, adresse, cp, ville, telephone, pseudo, mdp, type) VALUES('".$nom."', '".$prenom."', '".$email."', '".$adresse."', '".$cp."', '".$ville."', '".$telephone."', '".$pseudo."', '".$mdp."', 'conseiller')";
	
		if(mysqli_query($conn, $query))
    	{
        $requete= "INSERT INTO conseiller (id_utilisateur, datedebut, datefin) values ((SELECT MAX(id_utilisateur) FROM utilisateur), '".$datedebut."', '".$datefin."')";
     
        	if(mysqli_query($conn,$requete))
         	 	{
            $response=array(
            'status' => 1,
            'status_message' =>'Produit ajout� avec succ�s.'
            );
          		}
          else
        {
          $response=array(
          'status' => 0,
          'status_message' =>'ERREUR!.'. mysqli_error($conn)
          );
        }
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
	
	function updateConseiller()
	{
		global $conn;
		$data = json_decode(file_get_contents("php://input"),true);
		$id_utilisateur = $data["id_utilisateur"]; 
		// $id_admin = $data["id_admin"]; 
		// $datedebut = $data["datedebut"];
		$datefin = $data["datefin"];
		$nom = $data["nom"];
		$prenom = $data["prenom"];
		$adresse = $data["adresse"];
		$cp = $data["cp"];
		$ville = $data["ville"];
		$email = $data["email"];
		$telephone = $data["telephone"];
		$pseudo = $data["pseudo"];
		$mdp = $data["mdp"];
		$query="UPDATE utilisateur INNER JOIN conseiller
		ON (utilisateur.id_utilisateur = conseiller.id_utilisateur)
		SET utilisateur.nom='".$nom."', utilisateur.prenom='".$prenom."', utilisateur.adresse='".$adresse."', utilisateur.cp='".$cp."', utilisateur.ville='".$ville."', utilisateur.email='".$email."', utilisateur.telephone='".$telephone."', utilisateur.pseudo='".$pseudo."' , utilisateur.mdp='".$mdp."', conseiller.datefin='".$datefin."'
		Where utilisateur.id_utilisateur=".$id_utilisateur." AND (conseiller.id_utilisateur=$id_utilisateur)" ;
			
		

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
			// $id = intval($_GET["id"]);
			updateConseiller();
			break;
		
		case 'OPTIONS':
			header('Content-Type: application/json');
			break;

		case 'DELETE':
			// Supprimer un produit
			$id = intval($_GET["id"]);
			deleteConseiller($id);
			break;

	}
?>