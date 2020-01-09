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

function getdemandes()
{
  global $conn;
  $query = "SELECT * FROM demandeouverture, clientpotentiel WHERE demandeouverture.id_cp=clientpotentiel.id_cp AND statut='En attente'";
  $response = array();
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    $response[] = $row;
  }
  header('Content-Type: application/json');
  echo json_encode($response, JSON_PRETTY_PRINT);
}

switch($request_method)
  {

    case 'GET':
    // Retrive Products
    
    
      getdemandes();
    
    break;
    default:
    // Invalid Request Method
    header("HTTP/1.0 405 Method Not Allowed");
    break;

  }
