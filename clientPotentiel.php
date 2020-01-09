<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Connect to database
include("connexion_bdd.php");
$request_method = $_SERVER["REQUEST_METHOD"];

function getclientpotentiels()
{
  global $conn;
  $query = "SELECT  * FROM clientpotentiel, demandeouverture WHERE clientpotentiel.id_cp = demandeouverture.id_cp";
  $response = array();
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    $response[] = $row;
  }
  header('Content-Type: application/json');
  echo json_encode($response, JSON_PRETTY_PRINT);
}

function getclientpotentiel($id_cp)
{
  global $conn;
  $query = "SELECT * FROM clientpotentiel WHERE id_cp=".$id_cp."";
  // if($id_admin!= 0)
  // {
  // 	$query .= " WHERE id_cp=".$id." LIMIT 1";
  // }
  $response = array();
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    $response[] = $row;
  }
  header('Content-Type: application/json');
  echo json_encode($response, JSON_PRETTY_PRINT);
}

function Addclientpotentiel()
{
  global $conn;
  $data = json_decode(file_get_contents("php://input"),true);
  $nom = $data["nom"];
  $prenom = $data["prenom"];
  $email = $data["email"];
  $adresse = $data["adresse"];
  $cp = $data["cp"];
  $ville = $data["ville"];
  $telephone = $data["telephone"];
  $revenu_mensuel = $data["revenu_mensuel"];
  // $justif_identite = $data["justif_identite"];
  // $justif_salaire = $data["justif_salaire"];
  // $justif_domicile = $data["justif_domicile"];
  $query="INSERT INTO clientpotentiel(nom, prenom, email, adresse, cp, ville, telephone, revenu_mensuel) VALUES('".$nom."', '".$prenom."', '".$email."', '".$adresse."', '".$cp."', '".$ville."', '".$telephone."'
    , '".$revenu_mensuel."')";
    if(mysqli_query($conn, $query))
    {
        $requete= "INSERT INTO demandeouverture (id_cp) values ((SELECT MAX(id_cp) FROM clientpotentiel))";
      
        if(mysqli_query($conn,$requete))
          {
            $response=array(
            'status' => 1,
            'message' =>'demande envoyé'
            );
          }
          else
        {
          $response=array(
          'status' => 0,
          'message' =>'ERREUR!.'. mysqli_error($conn)
          );
        }
    }
    else
    {
      $response=array(
        'status' => 0,
        'message' =>'ERREUR!.'. mysqli_error($conn)
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }




  switch($request_method)
  {

    case 'GET':
    // Retrive Products
    if(!empty($_GET["id_cp"]))
    {
      $id=intval($_GET["id_cp"]);
      getclientpotentiel($id);
    }
    else
    {
      getclientpotentiels();
    }
    break;
    default:
    // Invalid Request Method
    header("HTTP/1.0 405 Method Not Allowed");
    break;

    case 'POST':
    // Ajouter un clientpotentiel
    echo "ajout clientpotentiel";
    Addclientpotentiel();
    break;
    
    case 'OPTIONS':
			header('Content-Type: application/json');
			break;

  }